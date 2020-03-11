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
        Article::create([
            'en' => [
                'title'     => 'Only English article example',
                'full_text' => 'Only English article example\'s text',
            ]
        ]);

        Article::create([
            'lt' => [
                'title'     => 'Tik lietuviško straipsnio pavyzdys',
                'full_text' => 'Tik lietuviško straipsnio pavyzdžio tekstas',
            ],
        ]);

        Article::create([
            'en' => [
                'title'     => 'English and Lithuanian article example',
                'full_text' => 'English and Lithuanian article example\'s text',
            ],
            'lt' => [
                'title'     => 'Angliško ir lietuviško straipsnio pavyzdys',
                'full_text' => 'Angliško ir lietuviško straipsnio pavyzdžio tekstas',
            ],
        ]);
    }
}
