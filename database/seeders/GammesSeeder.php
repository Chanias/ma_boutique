<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gamme;

class GammesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gamme::create([
            'nom'=>'Sweats'
        ]);
        Gamme::create([
            'nom'=>'Pantalons'
        ]);
        Gamme::create([
            'nom'=>'Robes'
        ]);
        Gamme::create([
            'nom'=>'T-shirts'
        ]);
        Gamme::create([
            'nom'=>'Accessoires'
        ]);
    }
}
