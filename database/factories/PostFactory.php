<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Source;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstNameMale();
        $lastname = $this->faker->lastName();
        $fullname = $name ." " .$lastname;

        $title = $this->faker->sentence;
        $slug = Str::slug($title, '-');

        return [
            'category_id' => rand(1,30),
            'source_id' => rand(1,30),
            'title' => $title,
            'slug' => $slug,
            'creator' => $fullname,
            'link' => $this->faker->url(),
            'is_external_link' => true,
            'image_url' => $this->getImage(),
        ];
    }

    function getImage()
    {
        $client = Http::get('https://api.unsplash.com/photos/random?orientation=landscape&client_id=1Sxgmkf9T0g9P1YWQk6TXWl_zSLU7Fub9Jfqc21oths');
        $states = $client->getBody();
        $states = json_decode($states, true);
        
        return $states['urls']['full'];
    }
}