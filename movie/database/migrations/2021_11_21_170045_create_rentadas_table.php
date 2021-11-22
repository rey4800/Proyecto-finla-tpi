<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentadas', function (Blueprint $table) {
            
            $table->integer('user_id');
            $table->integer('pelicula_id');
            $table->string("titulo");
            $table->float('precio_al');
            $table->string ('rentada');
            $table->date('fecha_i');
            $table->date('fecha_f');
            $table->date('fecha_e')->nullable();
            $table->string('multa')->nullable();
            $table->float('monto_multa')->nullable();
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
        Schema::dropIfExists('rentadas');
    }
}
