<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimeSlotController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contact', function () {return view('contact');})->name('contact');
Route::get('/about', function () {return view('about');})->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});
Route::get('/agenda', [TimeSlotController::class, 'showAgenda'])->name('agenda');
Route::get('/agenda/create', [TimeSlotController::class, 'create'])->name('agenda.create');
Route::post('/agenda/store', [TimeSlotController::class, 'store'])->name('timeslots.store');


require __DIR__.'/auth.php';
