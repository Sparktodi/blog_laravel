<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $data = Carbon::parse($post->created_at);


        $tags = $post->tags;

        $relatedPosts = Post::whereHas('tags', function ($query) use ($tags) {
            $query->whereIn('title', $tags->pluck('title'));
        })->where('id', '!=', $post->id)->get()->random(3);


         



        return view('post.show', compact('post', 'data', 'relatedPosts'));
    }
}
