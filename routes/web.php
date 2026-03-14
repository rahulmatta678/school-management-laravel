<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('teachers', \App\Http\Controllers\Admin\TeacherController::class);
    Route::resource('announcements', \App\Http\Controllers\Admin\AnnouncementController::class)->only(['index', 'create', 'store', 'destroy']);
    
    Route::get('/overview', [\App\Http\Controllers\Admin\OverviewController::class, 'index'])->name('overview');
});

// Teacher routes
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Teacher\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('students', \App\Http\Controllers\Teacher\StudentController::class);
    Route::resource('parents', \App\Http\Controllers\Teacher\ParentController::class);
    Route::resource('announcements', \App\Http\Controllers\Teacher\AnnouncementController::class);
});

require __DIR__.'/auth.php';
