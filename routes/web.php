<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'Authlogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/teachers', [TeacherController::class, 'index']);



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/teachers', [TeacherController::class, 'index']);