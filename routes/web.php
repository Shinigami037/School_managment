<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');;

// Teachers
Route::controller(TeacherController::class)->group(function () {
    Route::get('/admin/addteacher', 'index')->name('teacher.add_teacher')->middleware(['auth:web', 'check_role:admin,null,null']);
    Route::get('/admin/teacher',  'display')->name('teacher.display_teacher')->middleware(['auth:web', 'check_role:admin,teacher,null']);
    Route::get('/admin/teacher/{tid}/edit', 'edit')->name('teacher.edit_teacher')->middleware(['auth:web', 'check_role:admin,teacher,null']);
    Route::post('/admin/addteacher', 'addteacher')->name('teacher.add_teacher_form')->middleware(['auth:web', 'check_role:admin,null,null']);
    Route::post('/admin/update/{tid}', 'update')->name('teacher.update_teacher')->middleware(['auth:web', 'check_role:admin,teacher,null']);
    Route::post('/admin/delete', 'delete')->name('teacher.delete_teacher')->middleware(['auth:web', 'check_role:admin,null,null']);
    Route::post('/admin/status', 'updateStatus')->name('teacher.update_status')->middleware(['auth:web', 'check_role:admin,null,null']);

    Route::get('/admin/teacher/single/{id}',  'viewCard')->name('teacher.viewCard_teacher')->middleware(['auth:web', 'check_role:admin,teacher,null']);
});

// Class
Route::controller(ClassController::class)->group(function () {
    Route::get('/admin/addclass', 'index')->name('class.class_add')->middleware(['auth:web', 'check_role:admin,null,null']);
    Route::get('/admin/class', 'display')->name('class.class')->middleware(['auth:web', 'check_role:admin,teacher,user']);
    Route::get('/admin/editclass/{id}', 'editDisplay')->name('class.class_editDisplay')->middleware(['auth:web', 'check_role:admin,null,null']);
    // Route::get('/admin/deleteclass/{id}', 'delete')->name('class.class_delete')->middleware(['auth:web', 'check_role:admin,null,null']);
    Route::post('/admin/updateclass', 'update')->name('class.update_class')->middleware(['auth:web', 'check_role:admin,null,null']);
    Route::post('/admin/{id}/edit', 'edit')->name('class.class_edit')->middleware(['auth:web', 'check_role:admin,null,null']);
});

// Student
Route::controller(StudentController::class)->group(function () {
    Route::get('/admin/student', 'display')->name('student.student_display')->middleware(['auth:web', 'check_role:admin,teacher,user']);
    Route::get('/admin/addstudent', 'index')->name('student.student_add')->middleware(['auth:web', 'check_role:admin,teacher,null']);
    Route::post('/admin/addstuent', 'addstudent')->name('student.add_student_form')->middleware(['auth:web', 'check_role:admin,teacher,null']);
    // /student_order_by
    // Route::get('/admin/studentorderby', 'displayOrder')->name('student.student_display')->middleware(['auth:web', 'check_role:admin,teacher,user']);
    // Route::get('/admin/class', 'display')->name('class.class')->middleware(['auth:web', 'check_role:admin,teacher,user']);
    // Route::post('/admin/updateclass', 'update')->name('class.update_class')->middleware(['auth:web', 'check_role:admin,null,null']);
});
