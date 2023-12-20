<?php

namespace App\Http\Controllers\Personal\Following;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
       
        $followings = auth()->user()->followings;
        
        
        return view('personal.followings.index', compact('followings'));
    }
}
