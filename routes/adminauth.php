<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\StudentClassesController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\RoutineGroupController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectSelectController;
use App\Models\Attendance;

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
    Route::get('student_delete/{id}',[StudentController::class, 'createDelete'])->name('student_delete');
    Route::get('view_student/{id}',[StudentController::class, 'show'])->name('view_student');
    Route::get('ban_student/{id}',[StudentController::class, 'banCreate'])->name('ban_student');
  });

  Route::prefix('modules/student_classes')->group(function(){
    Route::get('class_index',[StudentClassesController::class, 'index'])->name('class_index');
  });

  Route::prefix('modules/subject')->group(function(){
    Route::get('subject_index',[SubjectController::class, 'index'])->name('subject_index');
    Route::get('create_subject',[SubjectController::class, 'create'])->name('create_subject');
    Route::post('store_subject',[SubjectController::class, 'store'])->name('store_subject');
    Route::get('edit_subject/{id}',[SubjectController::class, 'edit'])->name('edit_subject');
    Route::post('update_subject/{id}',[SubjectController::class, 'update'])->name('update_subject');
  });

  Route::prefix('modules/seat')->group(function(){
    Route::get('seat_index',[SeatController::class, 'index'])->name('seat_index');
    Route::get('create_seat',[SeatController::class, 'create'])->name('create_seat');
    Route::post('store_seat',[SeatController::class, 'store'])->name('store_seat');
    Route::get('revoke_seat/{id}',[SeatController::class, 'showrevoke'])->name('revoke_seat');
  });

  Route::prefix('modules/attendance')->group(function(){
    Route::get('attendance_index',[AttendanceController::class, 'index'])->name('attendance_index');
    Route::get('create_attendance/{id}', [AttendanceController::class, 'create'])->name('create_attendance');
    Route::post('store_attendance',[AttendanceController::class, 'store'])->name('store_attendance');
  });

  Route::prefix('modules/routine')->group(function(){
    Route::get('routine_index',[RoutineController::class, 'index'])->name('routine_index');
    Route::get('routine_list_index',[RoutineController::class, 'list_index'])->name('routine_list_index');
    Route::get('create_routine',[RoutineController::class, 'create'])->name('create_routine');
    Route::post('store_routine',[RoutineController::class, 'store'])->name('store_routine');
    Route::get('routine_delete/{id}',[RoutineController::class, 'destroy'])->name('routine_delete');
  });


  Route::prefix('modules/group_routine')->group(function(){
    Route::get('group_routine_index',[RoutineGroupController::class, 'index'])->name('group_routine_index');
    Route::get('create_group_routine',[RoutineGroupController::class, 'create'])->name('create_group_routine');
    Route::post('store_group_routine',[RoutineGroupController::class, 'store'])->name('store_group_routine');
    Route::get('routine_group_delete/{id}',[RoutineGroupController::class, 'destroy'])->name('routine_group_delete');
    Route::get('view_group_routine/{id}',[RoutineGroupController::class, 'show'])->name('view_group_routine');
  });


  Route::prefix('modules/fees')->group(function(){
    Route::get('fees_index',[FeesController::class,'index'])->name('fees_index');
    Route::get('fees_collection/{id}',[FeesController::class, 'get_fees'])->name('fees_collection');
    Route::get('create_fees',[FeesController::class, 'create'])->name('create_fees');
    Route::get('get_subject_id/{id}',[FeesController::class, 'getID'])->name('get_subject_id');
    Route::post('store_fees',[FeesController::class, 'store'])->name('store_fees');
    Route::get('fees_payment/{id}',[FeesController::class, 'fees_pay'])->name('fees_payment');
    Route::get('fees_pay_view/{id}',[FeesController::class, 'fees_pay_create'])->name('fees_pay_view');
    Route::get('fees_card/{id}',[FeesController::class, 'getCard'])->name('fees_card');
  });


  Route::prefix('modules/courses')->group(function(){
    Route::get('course_index',[CourseController::class,'index'])->name('course_index');
    Route::get('create_course',[CourseController::class, 'create'])->name('create_course');
    Route::get('get_ids/{id}',[CourseController::class, 'getInfo'])->name('get_ids');
    Route::post('store_course',[CourseController::class, 'store'])->name('store_course');
    Route::get('routine_setup/{id}',[CourseController::class, 'show'])->name('routine_setup');
    Route::post('update_course/{id}',[CourseController::class,'update'])->name('update_course');
  });

  Route::prefix('modules/subject_select')->group(function(){
    Route::get('subject_select_index',[SubjectSelectController::class, 'index'])->name('subject_select_index');
    Route::get('create_subject_select',[SubjectSelectController::class, 'create'])->name('create_subject_select');
    Route::post('store_subject_select',[SubjectSelectController::class, 'store'])->name('store_subject_select');
  });




    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
?>