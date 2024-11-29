<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\MusicLessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimeSlotController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;

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

// Lessons page route
Route::get('/lessons', function () {
    return view('lessons');
})->name('lessons')->middleware('guest');

// User creation routes
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user', [UserController::class, 'store'])->name('users.store');

// Profile editing routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Agenda routes
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/agenda/store', [AgendaController::class, 'store'])->name('agenda.store');

    // Music lessons routes
    Route::get('/musiclessons/create', [MusicLessonController::class, 'create'])->name('musiclessons.create');
    Route::post('/musiclessons', [MusicLessonController::class, 'store'])->name('musiclessons.store');
    Route::patch('/musiclessons/update', [MusicLessonController::class, 'update'])->name('musiclessons.update');


    // Admin user management routes
    Route::get('/users/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/users/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');

    Route::get('/admin/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/admin/register', [AdminController::class, 'register']);
});
