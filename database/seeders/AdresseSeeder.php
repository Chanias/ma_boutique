<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Adresse;

class AdresseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adresse::create([
            'user_id'=>1,
            'adresse'=>'2 rue du stade',
            'code_postal'=>'79410',
            'ville'=>'Saint maxire'
        ]);
        
        Adresse::create([
            'user_id'=>2,
            'adresse'=>'test',
            'code_postal'=>'79410',
            'ville'=>'test'
        ]);
    }
}
