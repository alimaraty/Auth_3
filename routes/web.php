<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Auth\TeacherAuthController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
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
    
    // Course management routes for teachers
    Route::middleware(['teacher'])->group(function () {
        Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
        Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
        Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
        Route::get('courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        Route::put('courses/{course}', [CourseController::class, 'update'])->name('courses.update');
        Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
        Route::post('courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
        Route::post('courses/{course}/unenroll', [CourseController::class, 'unenroll'])->name('courses.unenroll');
    });
});

// Students
Route::prefix('student')->name('student.')->group(function () {
    Route::get('login', [StudentAuthController::class, 'loginForm'])->name('login');
    Route::post('login', [StudentAuthController::class, 'login'])->name('login.post');
    Route::get('dashboard', [StudentAuthController::class, 'dashboard'])->name('dashboard')->middleware('student');
    Route::post('logout', [StudentAuthController::class, 'logout'])->name('logout')->middleware('student');
    Route::get('register', [StudentAuthController::class, 'registerForm'])->name('register.form');
    Route::post('register', [StudentAuthController::class, 'register'])->name('register');
});

require __DIR__.'/auth.php';