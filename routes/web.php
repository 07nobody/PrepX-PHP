<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResultController;

// User Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Mock Test Management Routes
Route::middleware('auth')->group(function () {
    Route::get('tests', [TestController::class, 'index'])->name('tests.index');
    Route::get('tests/create', [TestController::class, 'create'])->name('tests.create');
    Route::post('tests', [TestController::class, 'store'])->name('tests.store');
    Route::get('tests/{test}/edit', [TestController::class, 'edit'])->name('tests.edit');
    Route::put('tests/{test}', [TestController::class, 'update'])->name('tests.update');
    Route::post('tests/{test}/verify', [TestController::class, 'verify'])->name('tests.verify');
    Route::get('tests/{test}/attempt', [TestController::class, 'attempt'])->name('tests.attempt');
});

// User Dashboard Routes
Route::middleware('auth')->group(function () {
    Route::get('dashboard/student', [DashboardController::class, 'studentDashboard'])->name('dashboard.student');
    Route::get('dashboard/teacher', [DashboardController::class, 'teacherDashboard'])->name('dashboard.teacher');
    Route::get('dashboard/admin', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');
});

// Test Result Management Routes
Route::middleware('auth')->group(function () {
    Route::post('results', [ResultController::class, 'store'])->name('results.store');
    Route::get('results/{result}', [ResultController::class, 'show'])->name('results.show');
});
