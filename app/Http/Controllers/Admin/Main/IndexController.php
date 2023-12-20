<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();
        $users = User::all();
        $tags = Tag::all();
        $category = Category::all();

        return view('admin.main.index', compact('posts', 'users', 'tags', 'category'));
    }
}
