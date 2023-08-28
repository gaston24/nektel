<?php

namespace App\Services;

use App\Tarea;

class TareaService
{

    public function getTareasByDistribuidorId($distribuidorId)
    {
        return Tarea::where('distribuidor_id', $distribuidorId)->get();
    }

    public function create(array $data)
    {
        Tarea::create($data);
    }

    public function findById($id)
    {
        return Tarea::findOrFail($id);
    }

    public function update(Tarea $tarea, array $data)
    {
        $tarea->update([
            'fecha' => $data['fecha'],
            'nombre' => $data['nombre'],
            'direccion' => $data['direccion'],
            'latitud' => $data['latitud'],
            'longitud' => $data['longitud'],
            'mercancia' => $data['mercancia'],
            'distribuidor_id' => $data['distribuidor_id'],
        ]);
    }

    public function delete($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();
    }


}