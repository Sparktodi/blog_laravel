<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaceController;
use App\Models\Post;


class DestroyController extends BaceController
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
