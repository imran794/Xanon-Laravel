<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
Use App\Http\Controllers\Admin\FrontendController;
Use App\Http\Controllers\Admin\AboutController;
Use App\Http\Controllers\Admin\BannerController;
Use App\Http\Controllers\Admin\ServicesController;
Use App\Http\Controllers\Admin\ProjectController;
Use App\Http\Controllers\Admin\TimelineController;
Use App\Http\Controllers\Admin\ClientController;
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

Route::get('/',[FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware' =>['admin','auth']], function(){
    Route::get('dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
    // banner
    Route::resource('banner', BannerController::class);
    Route::get('inactive/{id}',[BannerController::class, 'inactive']);
    Route::get('active/{id}',[BannerController::class, 'active']);

    // about
    Route::resource('about', AboutController::class);
    Route::get('inactive/{id}',[AboutController::class, 'inactive']);
    Route::get('active/{id}',[AboutController::class, 'active']);

    // services

    Route::resource('services', ServicesController::class);
    Route::get('inactive/{id}',[ServicesController::class, 'inactive']);
    Route::get('active/{id}',[ServicesController::class, 'active']);

    // Project
    Route::resource('project', ProjectController::class);
    Route::get('inactive/{id}',[ProjectController::class, 'inactive']);
    Route::get('active/{id}',[ProjectController::class, 'active']);

     // Timeline
    Route::resource('timeline', TimelineController::class);
    Route::get('inactive/{id}',[TimelineController::class, 'inactive']);
    Route::get('active/{id}',[TimelineController::class, 'active']);

    // Clinet
    Route::resource('client', ClientController::class);
    Route::get('inactive/{id}',[ClientController::class, 'inactive']);
    Route::get('active/{id}',[ClientController::class, 'active']);
});

Route::group(['prefix'=>'user','middleware' =>['user','auth']], function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
});
