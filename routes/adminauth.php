<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\StudentClassesController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\SubjectController;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

 
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
  Route::get('dashboard',[AdminController::class, 'index'])->name('dashboard');

  Route::prefix('modules/student')->group(function(){
    Route::get('student_index',[StudentController::class, 'index'])->name('student_index');
    Route::get('create_student',[StudentController::class, 'create'])->name('create_student');
    Route::post('store_student',[StudentController::class, 'store'])->name('store_student');
    Route::get('edit_student/{id}',[StudentController::class, 'edit'])->name('edit_student');
    Route::post('update_student/{id}',[StudentController::class, 'update'])->name('update_student');
    Route::get('student_delete/{id}',[StudentController::class, 'destroy'])->name('student_delete');
  });

  Route::prefix('modules/student_classes')->group(function(){
    Route::get('class_index',[StudentClassesController::class, 'index'])->name('class_index');
  });

  Route::prefix('modules/subject')->group(function(){
    Route::get('subject_index',[SubjectController::class, 'index'])->name('subject_index');
    Route::get('create_subject',[SubjectController::class, 'create'])->name('create_subject');
    Route::post('store_subject',[SubjectController::class, 'store'])->name('store_subject');
  });

  Route::prefix('modules/seat')->group(function(){
    Route::get('seat_index',[SeatController::class, 'index'])->name('seat_index');
    Route::get('create_seat',[SeatController::class, 'create'])->name('create_seat');
    Route::post('store_seat',[SeatController::class, 'store'])->name('store_seat');
    Route::get('revoke_seat/{id}',[SeatController::class, 'showrevoke'])->name('revoke_seat');
  });
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
?>