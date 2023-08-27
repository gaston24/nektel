<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use DateTimeImmutable;

class Distribuidor extends Authenticatable implements JWTSubject
{
    protected $table = 'distribuidores';
    
    protected $fillable = ['login', 'email', 'password'];


    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    
}
