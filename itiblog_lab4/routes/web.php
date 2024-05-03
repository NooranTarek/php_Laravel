<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\PostController;
Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
//create should come before show because otherwise it will be 404 (laravel checks routes seq)
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
Route::post('/posts/restore-all', [PostController::class, 'restoreAll'])->name('posts.restoreAll')->middleware('auth');



use App\Http\Controllers\UserController;
Route::get('/users', [UserController::class, 'index'])->name('users.index');
//create should come before show because otherwise it will be 404 (laravel checks routes seq)
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/user/{user}', [UserController::class, 'showProfile'])->name('user.showProfile');




use App\Http\Controllers\CommentController;

Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');

Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');

Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');

Route::post('/comments/{postId}', [CommentController::class, 'store'])->name('comments.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
