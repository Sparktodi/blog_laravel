<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
 
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
      $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
      $posts = Post::filter($filter)->paginate(12);
      $categories = Category::all();
        
 
       
        $likedUsers = Post::withCount('likedUsers')->orderBy('liked_users_count', 'desc')->get()->take(3);
        $randomPosts = Post::get()->random(5);
        return view('post.index', compact('posts', 'randomPosts', 'likedUsers', 'categories'));


    }
}
