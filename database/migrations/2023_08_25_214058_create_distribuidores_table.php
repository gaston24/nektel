<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribuidoresTable extends Migration
{
    public function up()
    {
        Schema::create('distribuidores', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('login');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('distribuidores');
    }
}

