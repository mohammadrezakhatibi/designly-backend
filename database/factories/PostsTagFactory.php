<?php

namespace Database\Factories;

use App\Models\PostsTag;
use Database\Factories\PostsTagFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostsTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => rand(1,30),
            'tag_id' => rand(1,30),
        ];
    }
}
