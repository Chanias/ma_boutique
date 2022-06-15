<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nom'=>'Mcddqsjkdqz',
            'prenom'=>'John',
            'email'=>'john@hdqdjqk',
            'password'=>'Azerty89!',

        ]);
    }
}
