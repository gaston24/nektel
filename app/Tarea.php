<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = ['fecha', 'nombre', 'direccion', 'latitud', 'longitud', 'mercancia', 'distribuidor'];

    // Relación con el distribuidor
    public function distribuidor()
    {
        return $this->belongsTo(Distribuidor::class);
    }
}

