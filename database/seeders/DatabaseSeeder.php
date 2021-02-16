<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->admin()->create();
        \App\Models\User::factory(9)->create();
        \App\Models\Category::factory(10)->create();
        $product = \App\Models\Product::factory(20)->create();
        \App\Models\Tag::factory(20)->hasAttached($product)->create();
    }
}
