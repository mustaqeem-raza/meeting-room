<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/calendar', [MeetingController::class, 'showCalendar'])->name('calendar');
// Route::post('/calendar/access', [MeetingController::class, 'validateToken'])->name('calendar.access');
Route::get('/api/meetings', [MeetingController::class, 'getMeetings'])->name('api.meetings');

Route::get('/meetings', 'MeetingController@getMeetings'); // Get meetings for the calendar
Route::post('/meetings', 'MeetingController@addMeeting'); // Add a new meeting
Route::get('/meetings/{id}', 'MeetingController@getMeetingDetails'); // Get details of a meeting

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
