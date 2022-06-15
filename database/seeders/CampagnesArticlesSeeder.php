<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampagnesArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campagnes_articles')->insert([
            'campagne_id' => '1',
            'article_id' => '1',
        ]);
        DB::table('campagnes_articles')->insert([
            'campagne_id' => '1',
            'article_id' => '2',
        ]);
        DB::table('campagnes_articles')->insert([
            'campagne_id' => '1',
            'article_id' => '3',
        ]);

        DB::table('campagnes_articles')->insert([
            'campagne_id' => '2',
            'article_id' => '1',
        ]);
        DB::table('campagnes_articles')->insert([
            'campagne_id' => '2',
            'article_id' => '2',
        ]);
        DB::table('campagnes_articles')->insert([
            'campagne_id' => '2',
            'article_id' => '3',
        ]);

        DB::table('campagnes_articles')->insert([
            'campagne_id' => '3',
            'article_id' => '1',
        ]);
        DB::table('campagnes_articles')->insert([
            'campagne_id' => '3',
            'article_id' => '2',
        ]);
        DB::table('campagnes_articles')->insert([
            'campagne_id' => '3',
            'article_id' => '3',
        ]);

        DB::table('campagnes_articles')->insert([
            'campagne_id' => '4',
            'article_id' => '1',
        ]);
        DB::table('campagnes_articles')->insert([
            'campagne_id' => '4',
            'article_id' => '2',
        ]);
        DB::table('campagnes_articles')->insert([
            'campagne_id' => '4',
            'article_id' => '3',
        ]);

    }
}
