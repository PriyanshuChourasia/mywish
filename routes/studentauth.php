<?php

use App\Http\Controllers\SeatController;
use App\Http\Controllers\Student\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:student')->prefix('student')->name('student.')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

 
});

Route::middleware('auth:student')->prefix('student')->name('student.')->group(function () {
  Route::get('dashboard',[StudentController::class, 'index'])->name('dashboard');

  Route::prefix('modules/seat')->group(function(){
    Route::get('book_seat_index',[SeatController::class, 'bookindex'])->name('book_seat_index');
    Route::get('book_seat',[SeatController::class, 'bookshow'])->name('book_seat');
    Route::get('seat_booking/{id}',[SeatController::class, 'seatbookshow'])->name('seat_booking');
    Route::post('save_seat/{id}',[SeatController::class, 'finalbooking'])->name('save_seat');
  });
  
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
?>