<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostUserLike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostUserLikeFactory extends Factory
{
    protected $model = PostUserLike::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::get()->random()->id,
            'post_id' => Post::get()->random()->id,
        ];
    }
}
