<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonorController as AdminDonorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// User Register & Login
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/donor/complete', [DonorController::class, 'showCompletionForm'])->name('auth.complete');
    Route::post('/donor/complete', [DonorController::class, 'storeCompletion'])->name('auth.storeComplete');
});


Route::middleware(['auth', 'role:blood_bank_admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/donors')->name('donors.')->group(function () {
        Route::get('/', [AdminDonorController::class, 'index'])->name('index');
        Route::patch('/{donor}/approve', [AdminDonorController::class, 'approve'])->name('approve');
        Route::patch('/{donor}/reject', [AdminDonorController::class, 'reject'])->name('reject');
        Route::patch('/{donor}/suspend', [AdminDonorController::class, 'suspend'])->name('suspend');
        Route::delete('/{donor}/destroy', [AdminDonorController::class, 'destroy'])->name('destroy');
    });
});
