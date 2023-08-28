<?php

namespace App\Services;

use App\Distribuidor;

class DistribuidorService
{


    public function getAllDistribuidores()
    {
        return Distribuidor::all();
    }

    public function createDistribuidor(array $data)
    {
        
        Distribuidor::create($data);
        
    }

    public function updateDistribuidor(Distribuidor $distribuidor, array $data)
    {

        $distribuidor->update([
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => bcrypt($data['nueva_contraseña']),
        ]);

    }


    public function deleteDistribuidor($id)
    {
        $distribuidor = Distribuidor::findOrFail($id);
        $distribuidor->tareas()->delete();
        $distribuidor->delete();
    }

}
