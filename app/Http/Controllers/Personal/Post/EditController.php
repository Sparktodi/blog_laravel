<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Personal\Post\BaceController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends BaceController
{
    public function __invoke(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        $tags = Tag::all();
        return view('personal.posts.edit', compact('post', 'tags', 'categories'));
    }
}
