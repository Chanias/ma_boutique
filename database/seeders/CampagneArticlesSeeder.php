<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampagneArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campagne_articles')->insert([
            'campagne_id' => '1',
            'article_id' => '1',
        ]);
        DB::table('campagne_articles')->insert([
            'campagne_id' => '1',
            'article_id' => '2',
        ]);
        DB::table('campagne_articles')->insert([
            'campagne_id' => '1',
            'article_id' => '3',
        ]);

        DB::table('campagne_articles')->insert([
            'campagne_id' => '2',
            'article_id' => '1',
        ]);
        DB::table('campagne_articles')->insert([
            'campagne_id' => '2',
            'article_id' => '2',
        ]);
        DB::table('campagne_articles')->insert([
            'campagne_id' => '2',
            'article_id' => '3',
        ]);

        DB::table('campagne_articles')->insert([
            'campagne_id' => '3',
            'article_id' => '1',
        ]);
        DB::table('campagne_articles')->insert([
            'campagne_id' => '3',
            'article_id' => '2',
        ]);
        DB::table('campagne_articles')->insert([
            'campagne_id' => '3',
            'article_id' => '3',
        ]);

        DB::table('campagne_articles')->insert([
            'campagne_id' => '4',
            'article_id' => '1',
        ]);
        DB::table('campagne_articles')->insert([
            'campagne_id' => '4',
            'article_id' => '2',
        ]);
        DB::table('campagne_articles')->insert([
            'campagne_id' => '4',
            'article_id' => '3',
        ]);

    }
}
