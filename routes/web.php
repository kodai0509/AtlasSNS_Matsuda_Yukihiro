<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

require __DIR__ . '/auth.php';

// ミドルウェア設定//
Route::middleware('auth')->group(function () {

// トップページのルート
    Route::get('/index', [PostsController::class, 'index'])->name('posts.index');

    // 投稿の保存
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

    // 編集
    Route::put('/posts/update/{id}', [PostsController::class, 'update'])->name('posts.update');

    // 削除
    Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');


// プロフィール画面
Route::get('profile',[ProfileController::class, 'profile'])->name('profiles.profile');

// 検索画面
Route::match(['get', 'post'], '/search', [UsersController::class, 'search'])->name('search');

// フォロー・フォロワーリストページ
Route::get('follow-list',[FollowsController::class, 'followList'])->name('follow.list');
Route::get('follower-list', [FollowsController::class, 'followerList'])->name('follower.list');

// 相手ユーザーのプロフィールページ
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// ログアウト//
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
