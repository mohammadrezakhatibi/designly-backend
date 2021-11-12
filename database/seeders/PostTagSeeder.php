<?php

namespace Database\Seeders;

use App\Models\PostsTag;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostsTag::factory(60)->create();
    }
}
