<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Personal\Post\BaceController;
use App\Models\Post;


class DestroyController extends BaceController
{
    public function __invoke(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('personal.main.index');
    }
}
