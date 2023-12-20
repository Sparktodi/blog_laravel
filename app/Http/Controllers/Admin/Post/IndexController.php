<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaceController;
use App\Models\Post;

class IndexController extends BaceController
{
    public function __invoke()
    {
        $posts = Post::paginate(15);
        return view('admin.posts.index', compact('posts'));
    }
}
