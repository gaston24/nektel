<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';

    protected $fillable = ['fecha', 'nombre', 'direccion', 'latitud', 'longitud', 'mercancia', 'distribuidor_id'];

    // Relación con el distribuidor
    public function distribuidor()
    {
        return $this->belongsTo(Distribuidor::class);
    }
    
}


