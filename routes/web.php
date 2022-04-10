<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\UserProfileController;
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

Route::prefix('/my')->name('my.')->group(function (){
    Route::get('/',[UserCourseController::class, 'index'])
        ->name('dashboard');
    Route::get('/course/{id?}',[UserCourseController::class, 'show'])
        ->name('course');
    Route::get('/user-profile',[UserProfileController::class, 'index'])
        ->name('profile');

    Route::get('/setting-profle', [UserSettingController::class, 'index'])
        ->name('setting-profile');
    Route::post('/setting-profle/{id?}/update', [UserSettingController::class, 'update'])
        ->name('setting-profile.update');

    Route::get('/setting-password', [UserSettingController::class, 'password'])
        ->name('setting-password');
    Route::post('/setting-password/{id?}/update', [UserSettingController::class, 'passwordUpdate'])
        ->name('setting-password.update');
});




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
