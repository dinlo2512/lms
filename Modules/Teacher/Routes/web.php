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
use Modules\Teacher\Http\Controllers\AnnouncementController;
use Modules\Teacher\Http\Controllers\StatisticController;
use Modules\Teacher\Http\Controllers\AdminController;

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
    Route::post('/setting/{id?}/account',[TeacherController::class, 'update'])
        ->name('setting.account');
    Route::get('/setting/password', [TeacherController::class, 'editPassword'])
        ->name('setting.editpassword');
    Route::post('/setting/password/{id?}', [TeacherController::class, 'updatePassword'])
        ->name('setting.password');

//Lesson
    Route::get('courses/{courseId?}/lessons', [LessonController::class, 'index'])
        ->name('lessons.index');
    Route::get('courses/{courseId?}/lessons/create', [LessonController::class, 'create'])
        ->name('lessons.create');
    Route::post('courses/{courseId?}/lessons/store', [LessonController::class, 'store'])
        ->name('lessons.store');
    Route::get('courses/{courseId?}/lessons/{lessonId?}/edit', [LessonController::class, 'show'])
        ->name('lessons.show');
    Route::post('courses/{courseId?}/lessons/{lessonId?}/update', [LessonController::class, 'update'])
        ->name('lessons.update');
    Route::get('courses/{courseId?}/lessons/{lessonId?}/delete', [LessonController::class, 'destroy'])
        ->name('lessons.delete');
    Route::get('/courses/{courseId?}/lessons/{lessonId?}/view', [LessonController::class, 'view'])
        ->name('lessons.view');
//Course
    Route::post('/courses/{courseId?}/attendance', [CourseController::class, 'attendanceStore'])
        ->name('course.attendance');
    Route::post('/courses/{courseId?}/attendance/update', [CourseController::class, 'attendanceUpdate'])
        ->name('course.attendance.update');
//Exercies
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
    Route::get('/courses/{courseId?}/lessons/{lessonId?}/exercises/{exerciseId}/delete', [ExerciesController::class, 'destroy'])
        ->name('exercises.delete');
    Route::get('/courses/{courseId?}/lessons/{lessonId?}/exercises/{exerciseId}/give', [ExerciesController::class, 'give'])
        ->name('exercises.give');
//Grades
    Route::get('/courses/{courseId?}/lessons/{lessonId?}/exercises/{exerciseId?}', [GradesController::class, 'index'])
        ->name('grades.index');
    Route::get('/exercises/{id?}', [GradesController::class, 'show'])
        ->name('grades.view');
    Route::post('/courses/{courseId?}/lessons/{lessonId?}/exercises/{exerciseId?}/update', [GradesController::class, 'update'])
        ->name('grades.update');
//Announcement
    Route::get('/courses/{courseId?}/announcements',[AnnouncementController::class, 'index'])
    ->name('announcements.index');
    Route::get('/courses/{courseId?}/announcements/create',[AnnouncementController::class, 'create'])
        ->name('announcements.create');
    Route::post('/courses/{courseId?}/announcements/store',[AnnouncementController::class, 'store'])
        ->name('announcements.store');
    Route::get('/courses/{courseId?}/announcements/{announcementId?}/delete',[AnnouncementController::class, 'destroy'])
        ->name('announcements.delete');
//Statistic
    Route::get('/courses/{courseId?}/statistic', [StatisticController::class, 'index'])
        ->name('statistic.index');
//Admin
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');
    Route::get('/admin/courses', [AdminController::class, 'allCourse'])
        ->name('admin.allCourse');
    Route::get('/admin/user', [AdminController::class, 'allUser'])
        ->name('admin.allUser');
    Route::get('/admin/teacher', [AdminController::class, 'allTeacher'])
        ->name('admin.allTeacher');
    Route::get('/admin/notification', [AdminController::class, 'allNotification'])
        ->name('admin.allNotification');
    Route::get('/admin/roles', [AdminController::class, 'role'])
        ->name('admin.roles');
    Route::post('/admin/roles', [AdminController::class, 'saveRole'])
        ->name('admin.saveRole');
//Admin Course
    Route::get('/admin/courses/create', [AdminController::class, 'createCourse'])
        ->name('admin.createCourse');
    Route::post('/admin/courses/store', [AdminController::class, 'storeCourse'])
        ->name('admin.storeCourse');
    Route::get('/admin/courses/edit/{id?}', [AdminController::class, 'editCourse'])
        ->name('admin.editCourse');
    Route::get('/admin/courses/delete/{id?}', [AdminController::class, 'deleteCourse'])
        ->name('admin.deleteCourse');

//Admin User
    Route::get('/admin/user/create', [AdminController::class, 'createUser'])
        ->name('admin.createUser');
    Route::post('/admin/user/store', [AdminController::class, 'storeUser'])
        ->name('admin.storeUser');
    Route::get('/admin/user/delete/{id?}', [AdminController::class, 'deleteUser'])
        ->name('admin.deleteUser');
    Route::get('/admin/user/reset-password/{id?}', [AdminController::class, 'passwordUser'])
        ->name('admin.passwordUser');

//Admin Teacher
    Route::get('/admin/teacher/create', [AdminController::class, 'createTeacher'])
        ->name('admin.createTeacher');
    Route::post('/admin/teacher/store', [AdminController::class, 'storeTeacher'])
        ->name('admin.storeTeacher');
    Route::get('/admin/teacher/delete/{id?}', [AdminController::class, 'deleteTeacher'])
        ->name('admin.deleteTeacher');

//Admin Notification
    Route::get('/admin/notification/create', [AdminController::class, 'createNotification'])
        ->name('admin.createNotification');
    Route::post('/admin/notification/store', [AdminController::class, 'storeNotification'])
        ->name('admin.storeNotification');
});


