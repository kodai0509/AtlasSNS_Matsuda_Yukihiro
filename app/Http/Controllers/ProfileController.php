<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        // 認証済みユーザーを取得
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $followModel = new Follow();

        // フォロー数とフォロワー数をリレーションを使って取得
        $followCount = $user->following()->count(); // フォローしているユーザーの数
        $followerCount = $user->followers()->count(); // フォロワーの数

        // ビューにカウントを渡す
        return view('profiles.profile', [
            'followCount' => $followCount,
            'followerCount' => $followerCount,
            'user' => $user,
        ]);
    }
}
