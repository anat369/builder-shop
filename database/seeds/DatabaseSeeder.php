<?php

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
        DB::table('companies')->insert([
            'title' => str_random(10),
            'logo' => str_random(10),
            'description' => str_random(10),
            'content' => str_random(10),
            'address' => str_random(10),
            'work_time' => str_random(10),
            'phone' => str_random(10),
            'email' => str_random(10),
            'instagram' => str_random(10),
            'facebook' => str_random(10),
            'vkontakte' => str_random(10),
            'meta_title' => str_random(10),
            'meta_description' => str_random(10),
            'meta_keywords' => str_random(10),
        ]);

        factory(\App\User::class, 1)->create();
        factory(\App\Service::class, 4)->create();
        factory(\App\Project::class, 10)->create();
        factory(\App\Category::class, 5)->create();
        factory(\App\Product::class, 15)->create();

    }
}
