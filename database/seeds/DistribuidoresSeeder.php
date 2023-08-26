<?php

use Illuminate\Database\Seeder;
use App\Distribuidor;

class DistribuidoresSeeder extends Seeder
{
    public function run()
    {
        Distribuidor::create([
            'login' => 'usuario1',
            'email' => 'usuario1@example.com',
            'password' => bcrypt('password123')
        ]);

        Distribuidor::create([
            'login' => 'usuario2',
            'email' => 'usuario2@example.com',
            'password' => bcrypt('password456')
        ]);

       
    }
}
