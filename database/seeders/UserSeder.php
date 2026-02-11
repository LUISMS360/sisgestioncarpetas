<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i= 0;$i<5;$i++){
            User::create([
                'name'=>'Karen Corilla Quispe',
                'email'=>'a.karencorilla@gmail.com',
                'password'=>'karen12345',
                'rol'=> 'profesor',
                'dni'=>'12345678',
                'telefono'=>'987625412',
            ]);
            User::create([
                'name'=>'Jose Anculle Bernal',
                'email'=>'a.joseanculle@gmail.com',
                'password'=>'jose12345',
                'rol'=> 'profesor',
                'dni'=>'78265123',
                'telefono'=>'982736523',
            ]);
            User::create([
                'name'=>'Niels Arias Campos',
                'email'=>'a.nielsarias@gmail.com',
                'password'=>'niels12345',
                'rol'=> 'profesor',
                'dni'=>'72635123',
                'telefono'=>'983253652',
            ]);
        }
    }
}
