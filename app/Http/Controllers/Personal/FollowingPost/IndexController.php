<?php

namespace App\Http\Controllers\Personal\FollowingPost;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
    
        $followings = auth()->user()->followings;
        $followingsposts = $followings->flatMap(function ($followingsusers) {
            return $followingsusers->posts;
        });
        return view('personal.followingsposts.index', compact('followingsposts'));
    }
}
