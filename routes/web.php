<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/calendar', [MeetingController::class, 'showCalendar'])->name('calendar.access');

Route::get('/meetings', [MeetingController::class, 'index'])->name('meetings.index'); // Fetch events
Route::post('/meetings', [MeetingController::class, 'store'])->name('meetings.store'); // Add new event

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('employees', EmployeeController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
