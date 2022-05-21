<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SiteHomeController;
use App\Http\Controllers\ContactController;
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
})->name('welcome');
Route::post('/contact', [ContactController::class, 'store'])
->name('contact.store');

Route::get('/site-home', [SiteHomeController::class, 'index'])
    ->name('sitehome');
Route::prefix('/my')->name('my.')->group(function (){
    Route::get('/',[UserCourseController::class, 'index'])
        ->name('dashboard');
    Route::get('/course/{id?}',[UserCourseController::class, 'show'])
        ->name('course');
    Route::get('/course/{id?}/view',[UserCourseController::class, 'view'])
        ->name('lesson.view');
    Route::get('/user-profile',[UserProfileController::class, 'index'])
        ->name('profile');

    Route::get('/setting-profile', [UserSettingController::class, 'index'])
        ->name('setting-profile');
    Route::post('/setting-profle/{id?}/update', [UserSettingController::class, 'update'])
        ->name('setting-profile.update');

    Route::get('/setting-password', [UserSettingController::class, 'password'])
        ->name('setting-password');
    Route::post('/setting-password/{id?}/update', [UserSettingController::class, 'passwordUpdate'])
        ->name('setting-password.update');

    Route::get('/course/{courseId?}/lesson/{lessonId?}', [UserCourseController::class, 'lesson'])
        ->name('lesson');
    Route::get('/course/{courseId?}/lesson/{lessonId?}/exercise/{exerciseId?}', [UserCourseController::class, 'exercise'])
        ->name('exercise');
    Route::post('exercise/{exerciseId?}/{userId?}', [UserCourseController::class, 'store'])
        ->name('exercises.post');
    Route::get('exercise/{id?}/view', [UserCourseController::class, 'viewExercises'])
        ->name('exercises.view');

});




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
