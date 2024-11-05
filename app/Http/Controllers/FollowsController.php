<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\User;
use App\Models\Follow;

class FollowsController extends Controller
{
    public function followList() //フォローしているユーザーの表示
    {
        // ログインしているユーザーの情報取得
        $user = Auth::user();

        // フォローしているユーザーのidを取得
        $following_id = Auth::user()->following()->pluck('followed_id');

        // フォローしているユーザーの投稿表示
         $posts = Post::with('user')->whereIn('user_id',$following_id)->get();

        return view('follows.followList',compact('user','posts'));
    }

    public function followerList() //フォロワー情報の表示
    {
        $user = Auth::user();
        return view('follows.followerList');
    }


    public function show()
    {
        $user = Auth::user();
        // フォロー数のカウント
        $followCount = $user->following()->count();
        // フォロワー数のカウント
        $followerCount = $user->followers()->count();

        return view('login', compact('user', 'followCount', 'followerCount'));
    }
}
