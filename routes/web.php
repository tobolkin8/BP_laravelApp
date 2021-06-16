<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::prefix('admin')->middleware(['auth', 'role:ROLE_ADMIN'])->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\Admin\AdminController::class, 'index']);
    Route::get('/users', [App\Http\Controllers\Dashboard\Admin\AdminController::class, '']);

});
Route::prefix('teacher')->middleware(['auth', 'role:ROLE_TEACHER'])->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\Teacher\TeacherController::class, 'index']);

});
Route::prefix('student')->middleware(['auth', 'role:ROLE_STUDENT'])->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\Student\StudentController::class, 'index']);
});






