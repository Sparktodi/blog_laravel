<?php

namespace App\Http\Controllers\Personal\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        
        $posts = $user->posts;       
        return view('personal.users.show', compact('user', 'posts'));
    }
}
