<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BloodBankAdmin\DashboardController as BloodBankAdminDashboardController;
use App\Http\Controllers\BloodBankAdmin\DonorController as BloodBankAdminDonorController;
use App\Http\Controllers\BloodBankAdmin\DonationRequestController as BloodBankAdminDonationRequestController;
use App\Http\Controllers\BloodBankAdmin\ProfileController as BloodBankAdminProfileController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorFileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SuperAdmin\BlogController as SuperAdminBlogController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Models\Blog;
use App\Models\BloodBank;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $donor = null;

    if (auth()->check() && auth()->user()->donor) {
        $donor = auth()->user()->donor;
    }
    return view('welcome', [
        'blogs' => Blog::latest()->get(),
        'donor' => $donor
    ]);
})->name('welcome');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// User Register & Login
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');

// Verification Notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Verification Handler (clicked from email)
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // marks email as verified
    return redirect()->route('donor.complete');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/donor-files/{path}', [DonorFileController::class, 'show'])->where('path', '.*')->name('donor.files.show');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('/donor')->name('donor.')->group(function () {
        Route::get('/complete', [DonorController::class, 'showCompletionForm'])->name('complete');
        Route::post('/complete', [DonorController::class, 'storeCompletion'])->name('storeComplete');
        Route::put('/update', [DonorController::class, 'updateCompletion'])->name('updateComplete');
    });
    Route::get('/notifications', [NotificationController::class, 'index']);
});

Route::middleware(['auth', 'verified', 'role:donor'])->group(function () {

    Route::get('/home', [DonorController::class, 'index'])->name('home');

    Route::post('/donation-requests', [DonationRequestController::class, 'store'])
        ->name('donation-requests.store');
});

Route::middleware(['auth', 'role:blood_bank_admin'])->prefix('blood-bank-admin')->name('bba.')->group(function () {

    Route::get('/profile', function () {
        $bloodBank = auth()->user()->bloodBank()->with('user')->firstOrFail();
        return view('bloodBankAdmin.profile', compact('bloodBank'));
    })->name('profile');
    Route::get('/dashboard', [BloodBankAdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/donation-requests', [BloodBankAdminDonationRequestController::class, 'index'])->name('donation-requests.index');
    Route::put('/donation-requests/{donationRequest}/{action}', [BloodBankAdminDonationRequestController::class, 'updateStatus'])->name('donation-requests.updateStatus');

    Route::get('/donation-records')->name('donation-record');
    Route::get('/blood-inventory', function () {
        return view('bloodBankAdmin.blood-inventory');
    })->name('blood-inventory');

    Route::get('/profile', [BloodBankAdminProfileController::class, 'index'])->name('profile');
    Route::post('/set-closed-days', [BloodBankAdminProfileController::class, 'storeClosedDays'])->name('setClosedDays');

    Route::prefix('/donors')->name('donors.')->group(function () {
        Route::get('/', [BloodBankAdminDonorController::class, 'index'])->name('index');
        Route::patch('/{donor}/{action}', [BloodBankAdminDonorController::class, 'updateStatus'])
            ->where('action', 'approve|reject|suspend')
            ->name('updateStatus');
        Route::delete('/{donor}/destroy', [BloodBankAdminDonorController::class, 'destroy'])->name('destroy');
    });
});

Route::middleware(['auth', 'role:super_admin'])
    ->prefix('/super-admin')
    ->name('superAdmin.')->group(function () {

        Route::get('/profile',)->name('profile');
        Route::get('/dashboard', [SuperAdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/blogboard', [SuperAdminBlogController::class, 'index'])->name('blog-board');
        Route::get('/user-management', function () {
            return view('superAdmin.operator-admin-show', [
                'users' => User::whereIn('role', ['blood_bank_admin', 'ward_operator'])->get()
            ]);
        })->name('user-management');

        Route::prefix('/users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::patch('/{user}/{action}', [UserController::class, 'updateStatus'])
                ->where('action', 'suspend|active')
                ->name('updateStatus');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('/blogs')->name('blogs.')->group(function () {
            Route::get('/', [SuperAdminBlogController::class, 'index'])->name('index');
            Route::post('/', [SuperAdminBlogController::class, 'store'])->name('store');
            Route::put('/{blog}/update', [SuperAdminBlogController::class, 'update'])->name('update');
            Route::delete('/{blog}', [SuperAdminBlogController::class, 'destroy'])->name('destroy');
        });
    });
