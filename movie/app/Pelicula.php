<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    //
    protected $table = 'pelicula';
    protected $fillable = ['titulo', 'descripcion', 'imagen','stock','precio_al','precio_com','disponivilidad','likes'];
}
