<?php

namespace Database\Factories;

use App\Models\Source;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Source::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->domainWord();
        $slug = Str::slug($title, '-');
        
        return [
            'title' => $title,
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'logo' => $this->faker->imageUrl($width = 800, $height = 800),
            'slug' => $slug,
        ];
    }
}
