<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/my',function (){
    return view('content');
});
Route::get('/course',function (){
    return view('course');
});
Route::get('/user-profile',function (){
    return view('user');
});
Route::get('/login',function (){
    return view('login');
});

