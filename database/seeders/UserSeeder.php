<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'password'=>Hash::make('Azerty89!'),
            'role_id'=>1
        ]);
        User::create([
            'nom'=>'Siedlecki',
            'prenom'=>'Floriane',
            'email'=>'florianesiedlecki@gmail.com',
            'password'=>Hash::make('Diablo18!!'),
            'role_id'=>1
        ]);
     
    }
}
