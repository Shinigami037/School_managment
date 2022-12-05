<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeacherController;
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
    Route::get('/admin/addteacher', 'index')->middleware(['auth:web', 'check_role:admin,null,null']);
    Route::get('/admin/teacher',  'display')->middleware(['auth:web', 'check_role:admin,null,user']);
    Route::get('/admin/teacher/{tid}/edit', 'edit')->middleware(['auth:web', 'check_role:admin,null,user']);
    Route::post('/admin/addteacher', 'addteacher')->middleware(['auth:web', 'check_role:admin,null,null']);
    Route::post('/admin/update/{tid}', 'update')->name('teacher.update')->middleware(['auth:web', 'check_role:admin,null,user']);
    Route::get('/admin/delete/{tid}', 'delete')->name('teacher.delete')->middleware(['auth:web', 'check_role:admin,null,null']);
});
