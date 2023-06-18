<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;


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

Route::get('/', [PostController::class, 'index'])->middleware('auth');
Route::get('/posts/{post:id}', [PostController::class, 'show'])->middleware('auth');
Route::post('/posts/{post:id}', [PostController::class, 'comment'])->middleware('auth');
Route::delete('/posts/{post:id}', [PostController::class, 'destroy'])->middleware('auth');

Route::get('/users/{user:username}', [PostController::class, 'user_profile'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::resource('/dashboard', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/edit-user/{user:id}', [DashboardPostController::class, 'edit_user'])->middleware('auth');
Route::put('/dashboard/edit-user/update/{user:id}', [DashboardPostController::class, 'update_user'])->middleware('auth');
