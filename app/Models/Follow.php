<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    public function countFollowing($user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }

    public function countFollowers($user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }

    public function getFollowCount($user_id)
    {
        return $this->where('following_id', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
        return $this->where('followed_id', $user_id)->count();
    }
}
