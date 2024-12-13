<?php

use App\Http\Controllers\MusicLessonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentGuardianController;

require __DIR__ . '/auth.php';

// Homepage route
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('homepage');
})->name('homepage')->middleware('guest');

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Help page route
Route::get('/help', function () {
    return view('ingelogd.help');
})->middleware(['auth', 'verified'])->name('help');

// Contact and About pages
Route::get('/contact', function () {
    return view('contact');
})->name('contact')->middleware('guest');

Route::get('/about', function () {
    return view('about');
})->name('about')->middleware('guest');




// User creation routes
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user', [UserController::class, 'store'])->name('users.store');

// Profile editing routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Agenda routes
    Route::get('/agenda', [MusicLessonController::class, 'index'])->name('agenda.index');
    Route::get('/agenda/create', [MusicLessonController::class, 'create'])->name('agenda.create');
    Route::post('/agenda/store', [MusicLessonController::class, 'store'])->name('agenda.store');

    // Music lessons routes
    Route::get('/musiclessons/create', [MusicLessonController::class, 'create'])->name('musiclessons.create');
    Route::post('/musiclessons', [MusicLessonController::class, 'store'])->name('musiclessons.store');
    Route::patch('/musiclessons/update', [MusicLessonController::class, 'update'])->name('musiclessons.update');

    Route::get('/studentGuardian', [StudentGuardianController::class, 'index'])->name('studentGuardian.index');
    Route::put('/studentGuardian/{student}', [StudentGuardianController::class, 'update'])->name('studentGuardian.update');


    // Admin user management routes
    Route::get('/users/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/users/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');

    Route::get('/admin/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/admin/register', [AdminController::class, 'register']);

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.index');


    // Lessons page route

    Route::get('/lessons', [MusicLessonController::class, 'index'])->name('agenda.index');
    Route::get('/lessons/create', [MusicLessonController::class, 'create'])->name('agenda.create');
    
    // New routes for availability management
    Route::get('/teacher/availability', [MusicLessonController::class, 'teacherAvailability'])->name('agenda.availability');
    Route::post('/teacher/availability', [MusicLessonController::class, 'store'])->name('agenda.availability.store');
    
    // Routes for students to book lessons
    Route::get('/available-slots', [MusicLessonController::class, 'availableSlots'])
        ->name('agenda.available-slots');
    
    Route::post('/book-lesson/{lesson}', [MusicLessonController::class, 'bookLesson'])
        ->name('agenda.book');
    
    Route::post('/cancel-lesson/{lesson}', [MusicLessonController::class, 'cancelLesson'])
        ->name('agenda.cancel');

    Route::post('/agenda/cancel/{lesson}', [MusicLessonController::class, 'cancelLesson'])->name('agenda.cancel');

});
