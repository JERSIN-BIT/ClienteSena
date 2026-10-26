<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrainingCenterController;

/*
|--------------------------------------------------------------------------
| Rutas Principales / Autenticación
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/admin/dashboard', 'dashboard.admin')->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Recursos del Sistema (Equivalente a todas las rutas de ClienteAdminSena)
|--------------------------------------------------------------------------
*/
Route::resource('area', AreaController::class);
Route::resource('training_center', TrainingCenterController::class);
Route::resource('computer', ComputerController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('course', CourseController::class);
Route::resource('apprentice', ApprenticeController::class);

// Alias de conveniencia para las listas en plural (por si tus botones o vistas llaman 'areas', 'centers', etc.)
Route::get('areas', [AreaController::class, 'index']);
Route::get('centers', [TrainingCenterController::class, 'index']);
Route::get('computers', [ComputerController::class, 'index']);
Route::get('teachers', [TeacherController::class, 'index']);
Route::get('courses', [CourseController::class, 'index']);
