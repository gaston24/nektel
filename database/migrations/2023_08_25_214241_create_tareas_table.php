<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('fecha');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('mercancia');
            $table->integer('distribuidor_id')->unsigned(); 
            $table->foreign('distribuidor_id')->references('id')->on('distribuidores'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
