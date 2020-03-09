<?php

use App\Article;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1; $i <= 5; $i++)
        {
            Article::create([
                'title'     => $faker->sentence,
                'full_text' => $faker->paragraph,
            ]);
        }
    }
}
