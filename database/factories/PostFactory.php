<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageMain = $this->faker->image('public/storage/images', 400, 300, 'travel', false);
        $imagePreview = $this->faker->image('public/storage/images', 400, 300, 'travel', false);
        return [
            'content' => $this->faker->text(100),
            'title' => $this->faker->title(3),
            'preview_image' => 'images/'.basename($imagePreview),
            'main_image' => 'images/'.basename($imageMain),
            'category_id' => Category::get()->random()->id,
            'user_id' => User::get()->random()->id,

        ];
    }
}
