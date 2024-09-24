<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimeSlotController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Profiel bewerkingen (alleen toegankelijk voor ingelogde gebruikers)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

// Agenda routes
Route::middleware('auth')->group(function () {
    // Agenda overzicht en tijdslots aanmaken
    Route::get('/agenda', [TimeSlotController::class, 'showAgenda'])->name('agenda');
    Route::get('/agenda/create', [TimeSlotController::class, 'create'])->name('agenda.create');
    Route::post('/agenda/store', [TimeSlotController::class, 'store'])->name('agenda.store');
});

require __DIR__.'/auth.php';
