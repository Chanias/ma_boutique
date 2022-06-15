<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commande;

class CommandesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commande::create([
            'numero'=>'1',
            'prix'=>'40',
            'user_id'=>1,
            'adresse_id'=>1

        ]);
        Commande::create([
            'numero'=>'2',
            'prix'=>'120',
            'user_id'=>1,
            'adresse_id'=>1
        ]);
        Commande::create([
            'numero'=>'3',
            'prix'=>'88',
            'user_id'=>1,
            'adresse_id'=>1
        ]);
        Commande::create([
            'numero'=>'4',
            'prix'=>'66',
            'user_id'=>1,
            'adresse_id'=>1
        ]);
        Commande::create([
            'numero'=>'5',
            'prix'=>'25',
            'user_id'=>1,
            'adresse_id'=>1
        ]);
    }
}
