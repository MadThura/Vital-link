<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonorController as AdminDonorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorFileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::middleware(['auth', 'verified'])->group(function () {
Route::get('/donor-files/{path}', [DonorFileController::class, 'show'])->where('path', '.*')->name('donor.files.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('/donor')->name('donor.')->group(function () {
        Route::get('/complete', [DonorController::class, 'showCompletionForm'])->name('complete');
        Route::post('/complete', [DonorController::class, 'storeCompletion'])->name('storeComplete');
        Route::put('/update', [DonorController::class, 'updateCompletion'])->name('updateComplete');
    });

    Route::get('/home', function () {
        return view('home-page', [
            'donor' => auth()->user()->donor
        ]);
    })->name('home');
});


Route::middleware(['auth', 'role:blood_bank_admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/donors')->name('donors.')->group(function () {
        Route::get('/', [AdminDonorController::class, 'index'])->name('index');
        Route::patch('/{donor}/{action}', [AdminDonorController::class, 'updateStatus'])
            ->where('action', 'approve|reject|suspend')
            ->name('updateStatus');
        Route::delete('/{donor}/destroy', [AdminDonorController::class, 'destroy'])->name('destroy');
    });
});
