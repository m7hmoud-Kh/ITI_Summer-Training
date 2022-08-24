<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix'=>'posts'],function(){
    Route::get('/index',[PostController::class,'index'])->name('posts.index');
    Route::get('/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/store',[PostController::class,'store'])->name('posts.store');
    Route::get('/{id}',[PostController::class,'show'])->name('posts.show');
});