<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Teacher\Http\Controllers\TeacherController;
use Modules\Teacher\Http\Controllers\AuthController;
use Modules\Teacher\Http\Controllers\StudentController;
use Modules\Teacher\Http\Controllers\CourseController;
use Modules\Teacher\Http\Controllers\ExerciesController;
use Modules\Teacher\Http\Controllers\GradesController;
use Modules\Teacher\Http\Controllers\LessonController;

Route::prefix('teacher')->as('teacher.')->group(function() {
    Route::middleware('auth.teacher')->group(function(){
        Route::get('/', [TeacherController::class, 'index'])->name('home');
        Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
    });

    Route::middleware('guest.teacher')->group(function(){
        Route::get('/login',[AuthController::class, 'showLogin'])->name('showLogin');
        Route::post('/login',[AuthController::class, 'login'])->name('login');
    });
    Route::resources([
        'students' => StudentController::class ,
        'courses' => CourseController::class,
    ]);
    Route::get('/setting', [TeacherController::class, 'show'])->name('showTeacher');

    Route::get('courses/{courseId?}/lessons', [LessonController::class, 'index'])
        ->name('lessons.index');

    Route::get('/courses/{courseId?}/lessons/{lessonId?}/exercises', [ExerciesController::class, 'index'])
        ->name('exercises.index');
    Route::get('/courses/{courseId?}/lessons/{lessonId?}/exercises/create', [ExerciesController::class, 'create'])
        ->name('exercises.create');
    Route::post('/courses/{courseId?}/lessons/{lessonId?}/exercises', [ExerciesController::class, 'store'])
        ->name('exercises.store');
    Route::get('/courses/{courseId?}/lessons/{lessonId?}/exercises/{exerciseId}/update', [ExerciesController::class, 'edit'])
        ->name('exercises.edit');
    Route::post('/courses/{courseId?}/lessons/{lessonId?}/exercises/{exerciseId}', [ExerciesController::class, 'update'])
        ->name('exercises.update');


    Route::get('/courses/{courseId?}/lessons/{lessonId?}/exercises/{exerciseId?}', [GradesController::class, 'index'])
        ->name('grades.index');
});


