<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserLike;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(15)->create();
        Tag::factory()->count(10)->create();
        User::factory()->count(30)->create()->each(function ($user) {
            $followings = User::get()->random(10)->pluck('id');
            $user->followings()->attach($followings);
        });



        Post::factory()->count(150)->create()->each(function ($post) {
            $tags = Tag::get()->random(3)->pluck('id');
            $post->tags()->attach($tags);
        });

        Comment::factory()->count(300)->create();

        PostUserLike::factory()->count(200)->create();
        
        // Post::factory()->count(3)->hasAttached(Tag::factory()->count(5), [])->create();
        
     
    
        
    }
}
