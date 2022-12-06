<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\ClassController;
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
    Route::get('/admin/teacher/{tid}/edit', 'edit')->name('teacher.edit_teacher')->middleware(['auth:web', 'check_role:admin,null,user']);
    Route::post('/admin/addteacher', 'addteacher')->name('teacher.add_teacher_form')->middleware(['auth:web', 'check_role:admin,null,null']);
    Route::post('/admin/update/{tid}', 'update')->name('teacher.update_teacher')->middleware(['auth:web', 'check_role:admin,null,user']);
    Route::get('/admin/delete/{tid}', 'delete')->name('teacher.delete_teacher')->middleware(['auth:web', 'check_role:admin,null,null']);
});

// Class
Route::controller(ClassController::class)->group(function () {
    Route::get('/admin/class', 'display')->name('class.class')->middleware(['auth:web', 'check_role:admin,teacher,user']);
    Route::post('/admin/updateclass', 'update')->name('class.update_class')->middleware(['auth:web', 'check_role:admin,null,null']);
});
