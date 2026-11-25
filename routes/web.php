<?php

use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiplomaController as AdminDiplomaController;
use App\Http\Controllers\Admin\EnrollmentController as AdminEnrollmentController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\ConsultancyController as AdminConsultancyController;
use App\Http\Controllers\Public\ConsultancyController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\DiplomaController;
use App\Http\Controllers\Public\EnrollmentController;
use App\Http\Controllers\Public\HomeController;
use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/achievements', [HomeController::class, 'achievements'])->name('achievements');

Route::get('/consultancy', [ConsultancyController::class, 'create'])->name('consultancy');
Route::post('/consultancy', [ConsultancyController::class, 'store'])->name('consultancy.store');

Route::get('/diplomas', [DiplomaController::class, 'index'])->name('diplomas.index');
Route::get('/diplomas/{diploma:slug}', [DiplomaController::class, 'show'])->name('diplomas.show');

Route::get('/enroll', [EnrollmentController::class, 'create'])->name('enroll.create');
Route::post('/enroll', [EnrollmentController::class, 'store'])->name('enroll.store');
Route::get('/enroll/success/{enrollment:reference_code}', [EnrollmentController::class, 'success'])->name('enroll.success');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Auth
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes (adjust middleware name if yours differs, e.g. 'admin.auth')
    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('diplomas', AdminDiplomaController::class)->except(['show']);
        Route::resource('achievements', AdminAchievementController::class)->except(['show']);

        Route::get('/enrollments', [AdminEnrollmentController::class, 'index'])->name('enrollments.index');
        Route::get('/enrollments/{enrollment}', [AdminEnrollmentController::class, 'show'])->name('enrollments.show');
        Route::patch('/enrollments/{enrollment}', [AdminEnrollmentController::class, 'update'])->name('enrollments.update');

        Route::get('/messages', [AdminMessageController::class, 'index'])->name('messages.index');
        Route::patch('/messages/{message}/read', [AdminMessageController::class, 'markRead'])->name('messages.read');
        Route::delete('/messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');
        
        Route::get('/consultancy', [AdminConsultancyController::class, 'index'])->name('consultancy.index');
        Route::patch('/consultancy/{message}/read', [AdminConsultancyController::class, 'markRead'])->name('consultancy.read');
        Route::delete('/consultancy/{message}', [AdminConsultancyController::class, 'destroy'])->name('consultancy.destroy');

        Route::get('/profile', [AuthController::class, 'editProfile'])->name('profile');
        Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    });
});