<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::group(['middleware'=>['auth','active']],function(){
    Route::resource('books', BookController::class);

});

Auth::routes();
Route::group(['middleware'=>['auth','inject-user-id']],function(){
    Route::resource('posts', PostController::class);
    Route::resource('users', UserController::class);

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
