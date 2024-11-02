<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;

class FollowsController extends Controller
{
    public function followList()
    {
        $user = Auth::user();
        $followCount = $user->following()->count();
         $followerCount = $user->followers()->count();

        return view('follows.followList',compact('followCount', 'followerCount'));
    }

    public function followerList()
    {
        $user = Auth::user();
        $followCount = $user->following()->count();
        $followerCount = $user->followers()->count();

        return view('follows.followerList',compact('followCount', 'followerCount'));
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
