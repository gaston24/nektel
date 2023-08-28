<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Distribuidor extends Authenticatable
{
    protected $table = 'distribuidores';
    public $rememberTokenName = false;
    
    protected $fillable = ['login', 'email', 'password'];


    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }

    
}
