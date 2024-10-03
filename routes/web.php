<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
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

// ミドルウェア設定//
Route::middleware('auth')->group(function () {

//トップページ
Route::get('/index', [RegisteredUserController::class, 'index'])->name('index');

// プロフィール画面
Route::get('profile',[ProfileController::class, 'profile'])->name('profiles.profile');

// 検索画面
Route::get('search',[UsersController::class, 'index']);

// フォロー・フォロワーリストページ
Route::get('follow-list',[PostsController::class, 'followList']);
Route::get('follower-list', [PostsController::class, 'followerList']);

// 相手ユーザーのプロフィールページ
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// ログアウト//
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
