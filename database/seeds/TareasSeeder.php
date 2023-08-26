<?php

use Illuminate\Database\Seeder;
use App\Tarea;

class TareasSeeder extends Seeder
{
    public function run()
    {
        Tarea::create([
            'fecha' => '2023-08-25',
            'nombre' => 'Tarea 1',
            'direccion' => 'Dirección 1',
            'latitud' => '123.456',
            'longitud' => '789.012',
            'mercancia' => 'Producto A',
            'distribuidor_id' => 1
        ]);

        Tarea::create([
            'fecha' => '2023-08-26',
            'nombre' => 'Tarea 2',
            'direccion' => 'Dirección 2',
            'latitud' => '234.567',
            'longitud' => '890.123',
            'mercancia' => 'Producto B',
            'distribuidor_id' => 2
        ]);

    
    }
}
