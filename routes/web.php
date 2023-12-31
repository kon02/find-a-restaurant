<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotpepperController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::post('/posts', 'store')->name('store');
    Route::post('/posts/like','like')->name('posts.like');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('index/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    Route::delete('/posts/{post}/edit/destroy', 'destroy')->name('destroy');
});

Route::controller(UserController::class)->middleware(['auth'])->group(function(){
    Route::get('/user', 'index')->name('userindex');
});

Route::controller(HotpepperController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'search')->name('search');
    Route::post('/result', 'index')->name('Hotpepper');
});

Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
