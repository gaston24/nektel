<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Distribuidor extends Authenticatable
{
    protected $table = 'distribuidores';
    
    protected $fillable = ['login', 'email', 'password'];

    // Relación con las tareas
    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
