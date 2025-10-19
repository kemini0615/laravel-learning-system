<?php

use App\Http\Controllers\Frontend\InstructorDashboardController;
use App\Http\Controllers\Frontend\StudentDashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

/**
 * Home Route
 */
Route::get('/', [FrontendController::class, 'index'])->name('home');

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
        Route::get('become-instructor', [StudentDashboardController::class, 'becomeInstructor'])->name('become-instructor');
        Route::put('become-instructor/{user}', [StudentDashboardController::class, 'becomeInstructorUpdate'])->name('become-instructor.update');
    });

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
