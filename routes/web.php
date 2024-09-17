<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
// use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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



require __DIR__ . '/auth.php';

Route::get('top',[PostsController::class, 'index']);

Route::get('profile',[ProfileController::class, 'profile']);

Route::get('search',[UsersController::class, 'index']);

Route::get('follow-list',[PostsController::class, 'index']);
Route::get('follower-list', [PostsController::class, 'index']);

Route::post('register', [RegisteredUserController::class, 'register']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/added', [RegisteredUserController::class, 'added'])->name('added');


Route::get('/login', [AuthenticatedSessionController::class, 'create']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
