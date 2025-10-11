<?php

use App\Http\Controllers\User\InstructorDashboardController;
use App\Http\Controllers\User\StudentDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Instructor Routes
 */
Route::middleware(['auth:web', 'verified', 'role:instructor'])
    ->prefix('instructor')
    ->name('instructor.')
    ->group(function () {
        Route::get('dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard');
    });

/**
 * Student Routes
 */
Route::middleware(['auth:web', 'verified', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    });

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
