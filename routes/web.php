<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BloodBankAdmin\BloodInventoryController;
use App\Http\Controllers\BloodBankAdmin\DashboardController as BBADashboardController;
use App\Http\Controllers\BloodBankAdmin\DonorController as BBADonorController;
use App\Http\Controllers\BloodBankAdmin\DonationRequestController as BBADonationRequestController;
use App\Http\Controllers\BloodBankAdmin\ProfileController as BBAProfileController;
use App\Http\Controllers\BloodBankAdmin\DonationRecordController as BBADonationRecordController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorFileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SuperAdmin\BlogController as SuperAdminBlogController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Models\Blog;
use App\Models\Donor;
use App\Models\Notification;
use App\Models\User;
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

Route::get('/me', function (Request $request) {
    return response()->json([
        'id'   => $request->user()->id,
        'name' => $request->user()->name,
        'role' => $request->user()->role,
    ]);
})->middleware('auth');

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

    if (auth()->user()->role === 'blood_bank_admin') {
        return redirect()->route('bba.dashboard');
    } else {
        return redirect()->route('donor.complete');
    }
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
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);
});

Route::middleware(['auth', 'verified', 'role:donor'])->group(function () {

    Route::get('/home', [DonorController::class, 'index'])->name('home');

    Route::post('/donation-requests', [DonationRequestController::class, 'store'])
        ->name('donation-requests.store');
    Route::get('/notifications/{notification}/approve', function (Notification $notification) {
        $user = auth()->user()->donor;
        $qr = $user->donationRequest->appointment_id;
        $name = $user->user->name;
        $code = $user->donor_code;
        $nrc = $user->nrc;
        $dob = $user->dob;
        $date = $user->donationRequest->appointment_date;
        $qrText = sprintf(
            "Appointment ID:      %s\nDonor Name:           %s\nDonor Code:            %s\nNRC Number:           %s\nDOB:                        %s\nAppointment Date:  %s",
            $qr,
            $name,
            $code,
            $nrc,
            $dob,
            $date
        );
        $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qrText);

        return view('approved-notification', compact('notification', 'qrCodeUrl'));
    });
});

Route::middleware(['auth', 'role:blood_bank_admin'])->prefix('blood-bank-admin')->name('bba.')->group(function () {

    Route::get('/profile', function () {
        $bloodBank = auth()->user()->bloodBank()->with('user')->firstOrFail();
        return view('bloodBankAdmin.profile', compact('bloodBank'));
    })->name('profile');
    Route::get('/dashboard', [BBADashboardController::class, 'index'])->name('dashboard');
    Route::get('/donation-requests', [BBADonationRequestController::class, 'index'])->name('donation-requests.index');
    Route::put('/donation-requests/{donationRequest}/{action}', [BBADonationRequestController::class, 'updateStatus'])->name('donation-requests.updateStatus');

    Route::get('/blood-inventory', function () {
        return view('bloodBankAdmin.blood-inventory');
    })->name('blood-inventory');
    Route::get('/blood-inventory', function () {
        return view('bloodBankAdmin.blood-inventory');
    })->name('blood-inventory');
    Route::get('/dashboard', [BBADashboardController::class, 'index'])->name('dashboard');
    Route::get('/donation-requests', [BBADonationRequestController::class, 'index'])->name('donation-requests.index');
    Route::put('/donation-requests/{donationRequest}/{action}', [BBADonationRequestController::class, 'updateStatus'])->name('donation-requests.updateStatus');

    Route::get('/donation-records', [BBADonationRecordController::class, 'index'])->name('donation-record');
    Route::post('/donation-records/{donor}/{appointment}', [BBADonationRecordController::class, 'store'])->name('donation-records.store');
    Route::get('/blood-inventory', [BloodInventoryController::class, 'index'])->name('blood-inventory');

    Route::get('/profile', [BBAProfileController::class, 'index'])->name('profile');
    Route::patch('/set-operating-hours', [BBAProfileController::class, 'updateOperatingHours'])->name('updateOperatingHours');
    Route::patch('/max-persons-per-day/update', [BBAProfileController::class, 'updateMaxPPDay'])->name('updateMaxPPDay');
    Route::patch('/contact-info/update', [BBAProfileController::class, 'updateContactInfo'])->name('updateContactInfo');
    Route::post('/set-closed-days', [BBAProfileController::class, 'storeClosedDays'])->name('setClosedDays');

    Route::prefix('/donors')->name('donors.')->group(function () {
        Route::get('/', [BBADonorController::class, 'index'])->name('index');
        Route::patch('/{donor}/{action}', [BBADonorController::class, 'updateStatus'])
            ->where('action', 'approve|reject|suspend')
            ->name('updateStatus');
        Route::delete('/{donor}/destroy', [BBADonorController::class, 'destroy'])->name('destroy');
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


// test
Route::get('/donation/{id}/certificate', [BBADonationRecordController::class, 'downloadCertificate'])
    ->name('downloadCertificate');
