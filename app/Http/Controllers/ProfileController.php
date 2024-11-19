<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class ProfileController extends Controller
{
    //その他のユーザーのプロフィール
    public function profile()
    {
        // 認証済みユーザーを取得
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // フォロー数とフォロワー数を取得
        $followCount = $user->following()->count();
        $followerCount = $user->followers()->count();

        // ポストを表示
        $posts = Post::with('user')->where('user_id', $user->id)->get();

        return view('profiles.profile', compact('user','followCount', 'followerCount','posts'));
    }

}
