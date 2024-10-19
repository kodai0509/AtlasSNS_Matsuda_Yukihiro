<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function search(Request $request)
    {

        $authUserId = auth()->id();

        // １つ目の処理
        $keyword = $request->input('keyword');
        // ２つ目の処理
        if(!empty($keyword)){
            $users = User::where('username', 'like', '%' . $keyword . '%')
            ->where('id', '!=', $authUserId)
            ->get();
        }else{
             $users = User::where('id', '!=', $authUserId)->get();
        }

        return view('users.search',compact('users'));
    }

    // フォロー機能
    public function follow(User $user)
    {
        $follower = auth()->user();
        if (!$follower->isFollowing($user->id))
        {
            $follower->follow($user->id);
        }

        return back();
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if ($follower->isFollowing($user->id))
        {
            $follower->unfollow($user->id);
        }

        return back();
    }
}
