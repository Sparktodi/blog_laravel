<?php

namespace App\Http\Controllers\Personal\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::where('id', '!=', auth()->user()->id)->paginate(12);
      
        return view('personal.users.index', compact('users'));
    }
}
