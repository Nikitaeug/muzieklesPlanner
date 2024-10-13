<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\MusicLessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimeSlotController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

// Homepage route
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('homepage');
})->name('homepage')->middleware('guest');

// Dashboard (alleen toegankelijk voor geverifieerde gebruikers)
Route::get('/dashboard', function () {
    return view('ingelogd.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Help pagina
Route::get('/help', function () {
    return view('ingelogd.help');
})->middleware(['auth', 'verified'])->name('help');

// Contact en About pagina's
Route::get('/contact', function () {
    return view('contact');
})->name('contact')->middleware('guest');

Route::get('/about', function () {
    return view('about');
})->name('about')->middleware('guest');

Route::get('/lessons', function () {
    return view('lessons');
})->name('lessons')->middleware('guest');



Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user', [UserController::class, 'store'])->name('users.store');

// Profiel bewerkingen (alleen toegankelijk voor ingelogde gebruikers)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

// Agenda routes
Route::middleware('auth')->group(function () {
    // Agenda overzicht en tijdslots aanmaken
    Route::get('/agenda', [AgendaController::class, 'showAgenda'])->name('agenda.index');
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/agenda/store', [AgendaController::class, 'store'])->name('agenda.store');
});


Route::get('/api/timeslots', [MusicLessonController::class, 'getLessons']);

require __DIR__.'/auth.php';
