<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
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
    // return view('welcome');
    return view('home.home');
});
Route::get('/alumnae/login', [App\Http\Controllers\HomeController::class, 'alumnae_login'])->name('alumnae_login.home');
Route::get('/alumnae/registration', [App\Http\Controllers\HomeController::class, 'alumnae_signup'])->name('alumnae_signup.home');
Auth::routes();  

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/alumnae', [HomeController::class, 'alumnae'])->name('alumnae');
Route::post('/send/message', [HomeController::class, 'message_send'])->name('message.send');

Route::group(['prefix' => 'admin','middleware'=>['admin','auth']], function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/user/list', [App\Http\Controllers\Admin\DashboardController::class, 'user_list'])->name('admin.user.list');
        Route::resource('users',UserController::class);
});

Route::group(['prefix' => 'user','middleware'=>['user','auth']], function () {
        Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('user.dashboard');
});

