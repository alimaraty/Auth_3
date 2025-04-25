<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'teacher' => \App\Http\Middleware\TeacherMiddleware::class, // add alias for middleware teacher
            'student' => \App\Http\Middleware\StudentMiddleware::class, // add alias for middleware student

            'teacher_api' => \App\Http\Middleware\Api\TeacherApiMiddleware::class,
            // add alias for middleware teacher api

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
