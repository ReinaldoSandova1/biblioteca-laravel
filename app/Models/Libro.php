<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    // Campos permitidos para guardar en la base de datos
    protected $fillable = [
        'titulo',   // Nombre del libro
        'autor',    // Autor del libro
        'anio'      // Año de publicación
    ];
}