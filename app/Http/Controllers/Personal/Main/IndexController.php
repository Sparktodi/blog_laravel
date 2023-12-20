<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $posts = auth()->user()->posts->sortByDesc('created_at');
  
        return view('personal.main.index', compact('user', 'posts'));
    }
}
