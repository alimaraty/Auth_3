<?php

use App\Http\Controllers\Api\TeacherApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("index", [TeacherApiController::class, "index"]);
Route::post("loginn", [TeacherApiController::class, "login"]);
Route::prefix('teacher')->middleware('teacher_api')->group(function () {
    Route::get('info', [TeacherApiController::class, 'getTeacher']);
});
