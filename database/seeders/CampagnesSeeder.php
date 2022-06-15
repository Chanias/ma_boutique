<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campagne;

class CampagnesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campagne::create([
            'titre'=>'Solde Promo de Printemps',
            'reduction'=>'20',
            'date_debut'=>'2022-03-20',
            'date_fin'=>'2022-04-20'
        ]);
        Campagne::create([
            'titre'=>'Solde Promo de Eté',
            'reduction'=>'50',
            'date_debut'=>'2022-06-21',
            'date_fin'=>'2022-09-01'
        ]);
        Campagne::create([
            'titre'=>'Solde Promo Automne',
            'reduction'=>'15',
            'date_debut'=>'2022-09-23',
            'date_fin'=>'2022-12-12'
        ]);
        Campagne::create([
            'titre'=>'Solde Promo Hiver',
            'reduction'=>'50',
            'date_debut'=>'2022-12-21',
            'date_fin'=>'2022-03-03'
        ]);
    }
}
