<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;

class FollowsController extends Controller
{
    public function followList()
    {
        return view('follows.followList');
    }

    public function followerList()
    {
        return view('follows.followerList');
    }

    public function postCounts()
    {
        $posts = Post::get();
        return view('yyyy', compact('posts'));
    }

    public function show()
    {
        $user = Auth::user();

        $followCount = Follow::countFollowing($user->id);
        $followerCount = Follow::countFollowers($user->id);

        return view('profiles.profile', compact('user', 'followCount', 'followerCount'));
    }
}
