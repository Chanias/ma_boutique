<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandesArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commandes_articles')->insert([
            'commande_id' => '1',
            'article_id' => '1',
            'quantite'=>1,
            'reduction'=>20
        ]);
        DB::table('commandes_articles')->insert([
            'commande_id' => '1',
            'article_id' => '2',
            'quantite'=>1,
            'reduction'=>20
        ]);
        DB::table('commandes_articles')->insert([
            'commande_id' => '1',
            'article_id' => '3',
            'quantite'=>1,
            'reduction'=>20
        ]);

        DB::table('commandes_articles')->insert([
            'commande_id' => '2',
            'article_id' => '1',
            'quantite'=>3,
            'reduction'=>20
        ]);
        DB::table('commandes_articles')->insert([
            'commande_id' => '2',
            'article_id' => '2',
            'quantite'=>4,
            'reduction'=>20
        ]);
        DB::table('commandes_articles')->insert([
            'commande_id' => '2',
            'article_id' => '3',
            'quantite'=>1,
            'reduction'=>20
        ]);

        DB::table('commandes_articles')->insert([
            'commande_id' => '3',
            'article_id' => '1',
            'quantite'=>1,
            'reduction'=>20
        ]);
        DB::table('commandes_articles')->insert([
            'commande_id' => '3',
            'article_id' => '2',
            'quantite'=>1,
            'reduction'=>20
        ]);
        DB::table('commandes_articles')->insert([
            'commande_id' => '3',
            'article_id' => '3',
            'quantite'=>1,
            'reduction'=>20
        ]);

        DB::table('commandes_articles')->insert([
            'commande_id' => '4',
            'article_id' => '1',
            'quantite'=>1,
            'reduction'=>20
        ]);
        DB::table('commandes_articles')->insert([
            'commande_id' => '4',
            'article_id' => '2',
            'quantite'=>1,
            'reduction'=>20
        ]);
        DB::table('commandes_articles')->insert([
            'commande_id' => '4',
            'article_id' => '3',
            'quantite'=>1,
            'reduction'=>20
        ]);

        DB::table('commandes_articles')->insert([
            'commande_id' => '5',
            'article_id' => '3',
            'quantite'=>1,
            'reduction'=>20
        ]);
        DB::table('commandes_articles')->insert([
            'commande_id' => '5',
            'article_id' => '3',
            'quantite'=>1,
            'reduction'=>20
        ]);
        DB::table('commandes_articles')->insert([
            'commande_id' => '5',
            'article_id' => '3',
            'quantite'=>1,
            'reduction'=>20
        ]);
    }
}
