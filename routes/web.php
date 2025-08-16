<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BloodBankAdmin\DashboardController as BloodBankAdminDashboardController;
use App\Http\Controllers\BloodBankAdmin\DonorController as BloodBankAdminDonorController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorFileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SuperAdmin\BlogController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Models\Blog;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'blogs' => Blog::latest()->get()
    ]);
})->name('welcome');

// User Register & Login
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login');

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


Route::get('/notifications', [NotificationController::class, 'index']);

Route::get('/donor-files/{path}', [DonorFileController::class, 'show'])->where('path', '.*')->name('donor.files.show');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('/donor')->name('donor.')->group(function () {
        Route::get('/complete', [DonorController::class, 'showCompletionForm'])->name('complete');
        Route::post('/complete', [DonorController::class, 'storeCompletion'])->name('storeComplete');
        Route::put('/update', [DonorController::class, 'updateCompletion'])->name('updateComplete');
    });
});

Route::middleware(['auth', 'verified', 'role:donor'])->group(function () {
    Route::get('/home', function () {
        return view('home-page', [
            'donor' => auth()->user()->donor,
            'blogs' => Blog::latest()->get()
        ]);
    })->name('home');
});

Route::middleware(['auth', 'role:blood_bank_admin'])->group(function () {

    Route::get('/dashboard', [BloodBankAdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/donation-record', function () {
        return view('bloodBankAdmin.donation-record');
    })->name('donation-record');
    Route::get('/blood-inventory', function () {
        return view('bloodBankAdmin.blood-inventory');
    })->name('blood-inventory');

    Route::prefix('/donors')->name('donors.')->group(function () {
        Route::get('/', [BloodBankAdminDonorController::class, 'index'])->name('index');
        Route::patch('/{donor}/{action}', [BloodBankAdminDonorController::class, 'updateStatus'])
            ->where('action', 'approve|reject|suspend')
            ->name('updateStatus');
        Route::delete('/{donor}/destroy', [BloodBankAdminDonorController::class, 'destroy'])->name('destroy');
    });
});

Route::middleware(['auth', 'role:super_admin'])->group(function () {

    Route::get('/superadmin-dashboard', function () {
        return view("superAdmin.dashboard");
    })->name('super-admin');
    Route::get('/blogboard', [BlogController::class, 'index'])->name('blog-board');
    Route::get('/user-management', function () {
        return view("superAdmin.operator-admin-show");
    })->name('user-management');

    Route::prefix('/users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::post('/{user}/{action}', [UserController::class, 'updateStatus'])
            ->where('action', 'suspend|active')
            ->name('updateStatus');
    });

    Route::prefix('/blogs')->name('blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::post('/', [BlogController::class, 'store'])->name('store');
        Route::delete('/{blog}', [BlogController::class, 'destroy'])->name('destroy');
    });
});

Route::get('/blogs-show/{blog}', function (Blog $blog) {
    return view('blog', [
        'blog' => $blog,
        'randomBlogs' => Blog::inRandomOrder()->limit(3)->get()
    ]);
});

Route::get('/blogs', function() {
    return view('blogs',[
        'blogs' => Blog::latest()->paginate(6)
    ]);
});

Route::get('/home-test', function() {
    return view('home-page',[
        'blogs' => Blog::latest()->paginate(6)
    ]);
});
