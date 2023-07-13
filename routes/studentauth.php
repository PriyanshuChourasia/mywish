<?php

use App\Http\Controllers\FeesController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\Student\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\SubjectSelectController;
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


  Route::prefix('student/subjectSelect')->group(function(){
    Route::get('subject_select_index',[SubjectSelectController::class, 'index'])->name('subject_select_index');
    Route::get('create_subject_select',[SubjectSelectController::class, 'create'])->name('create_subject_select');
    Route::post('save_subject_select',[SubjectSelectController::class, 'store'])->name('save_subject_select');
    Route::get('get_fees/{id}',[SubjectSelectController::class, 'getFees'])->name('get_fees');
    Route::get('get_permit/{id}',[SubjectSelectController::class, 'getInfo'])->name('get_permit');
  });


  Route::prefix('student/profile')->group(function(){
    Route::get('profile_index',[StudentController::class, 'profile'])->name('profile_index');
    Route::get('change_password/{id}',[StudentController::class, 'changePassword'])->name('change_password');
    Route::post('save_password/{id}',[StudentController::class, 'store'])->name('save_password');
  });

  Route::prefix('modules/fees')->group(function(){
    Route::get('fees_card', [FeesController::class, 'studentIndex'])->name('fees_card');
    Route::get('fees_pay_view/{id}',[FeesController::class, 'studentPay'])->name('fees_pay_view');
    Route::get('get_subs/{id}',[FeesController::class, 'IdInfo'])->name('get_subs');
    Route::post('fee_paid/{id}',[FeesController::class, 'feesPay'])->name('fee_paid');
  });
  
  
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
?>