<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelicula', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("titulo");
            $table->text("descripcion");
            $table->string("imagen");
            $table->integer("stock");
            $table->float("precio_al");
            $table->float("precio_com");
            $table->string("disponivilidad");
            $table->integer("likes");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelicula');
    }
}
