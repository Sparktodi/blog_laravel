<?php

namespace App\Http\Controllers\Personal\Follower;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
        $followers = auth()->user()->followers;
       

        return view('personal.followers.index', compact('followers'));
    }
}
