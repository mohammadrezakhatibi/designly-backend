<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Source;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'category_id' => rand(1,30),
            'source_id' => rand(1,30),
            'title' => $this->faker->sentence($nbWords = rand(4,7), $variableNbWords = true),
            'creator' => $fullname,
            'link' => $this->faker->url(),
            'is_external_link' => true,
            'image_url' => $this->getImage(),
        ];
    }

    function getImage()
    {
        $client = Http::get('https://api.unsplash.com/photos/random?orientation=landscape&client_id=UnCFM7EGllg-1R3VbdSgJIS9pIZSx-iHhZDKUtdBPwQ');
        $states = $client->getBody();
        $states = json_decode($states, true);
        
        return $states['urls']['full'];
    }
}