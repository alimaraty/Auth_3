<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\TeacherAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Teachers
Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('login', [TeacherAuthController::class, 'loginForm'])->name('login');
    Route::post('login', [TeacherAuthController::class, 'login'])->name('login.post');
    Route::get('dashboard', [TeacherAuthController::class, 'dashboard'])->name('dashboard')->middleware('teacher');
    Route::post('logout', [TeacherAuthController::class, 'logout'])->name('logout');
    Route::get('register', [TeacherAuthController::class, 'registerForm'])->name('register.form');
    Route::post('register', [TeacherAuthController::class, 'register'])->name('register');
});

// students
Route::prefix('student')->name('student.')->group(function () {
    Route::get('login', [StudentAuthController::class, 'loginForm'])->name('login');
    Route::post('login', [StudentAuthController::class, 'login'])->name('login.post');
    Route::get('dashboard', [StudentAuthController::class, 'dashboard'])->name('dashboard')->middleware('student');
    Route::post('logout', [StudentAuthController::class, 'logout'])->name('logout')->middleware('student');
    Route::get('register', [StudentAuthController::class, 'registerForm'])->name('register.form');
    Route::post('register', [StudentAuthController::class, 'register'])->name('register');
});


require __DIR__.'/auth.php';
