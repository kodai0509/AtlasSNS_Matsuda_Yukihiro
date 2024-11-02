<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;

class ProfileController extends Controller
{
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


        return view('profiles.profile', compact('user','followCount', 'followerCount'));
    }
}
