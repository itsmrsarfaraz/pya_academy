<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiplomaController as AdminDiplomaController;
use App\Http\Controllers\Admin\EnrollmentController as AdminEnrollmentController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProfileController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/diplomas', [PublicController::class, 'diplomas'])->name('diplomas.index');
Route::get('/diplomas/{diploma:slug}', [PublicController::class, 'diploma'])->name('diplomas.show');
Route::get('/achievements', [PublicController::class, 'achievements'])->name('achievements');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');
Route::get('/enroll/{diploma:slug?}', [EnrollmentController::class, 'create'])->name('enroll.create');
Route::post('/enroll', [EnrollmentController::class, 'store'])->middleware('throttle:5,1')->name('enroll.store');
Route::get('/application-received/{reference}', [EnrollmentController::class, 'success'])->name('enroll.success');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest.admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
    });

    Route::middleware('admin.auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('diplomas', AdminDiplomaController::class)->except(['show']);
        Route::resource('achievements', AchievementController::class)->except(['show']);
        Route::get('/enrollments', [AdminEnrollmentController::class, 'index'])->name('enrollments.index');
        Route::get('/enrollments/{enrollment}', [AdminEnrollmentController::class, 'show'])->name('enrollments.show');
        Route::patch('/enrollments/{enrollment}/status', [AdminEnrollmentController::class, 'status'])->name('enrollments.status');
        Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::patch('/messages/{message}/read', [MessageController::class, 'read'])->name('messages.read');
        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});
