<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserLike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message' => $this->faker->text(50),
            'user_id' => User::get()->random()->id,
            'post_id' => Post::get()->random()->id,
        ];
    }
}
