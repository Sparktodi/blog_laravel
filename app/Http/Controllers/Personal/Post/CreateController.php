<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Personal\Post\BaceController;

use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaceController
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('personal.posts.create', compact('categories', 'tags'));
    }
}
