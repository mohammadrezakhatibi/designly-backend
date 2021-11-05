<?php

namespace Database\Seeders;

use App\Models\FeaturedContent;
use Illuminate\Database\Seeder;

class FeaturedContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeaturedContent::factory(10)->create();
    }
}
