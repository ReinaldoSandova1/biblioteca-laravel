<?php

use Illuminate\Database\Migrations\Migration;
// Aquí estoy importando la clase base para crear migraciones

use Illuminate\Database\Schema\Blueprint;
// Esta clase me permite definir la estructura de la tabla

use Illuminate\Support\Facades\Schema;
// Me permite trabajar con la base de datos (crear, eliminar tablas, etc.)

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // En este método creo la tabla en la base de datos

        Schema::create('libros', function (Blueprint $table) {

            $table->id(); 
            // Creo el campo ID autoincremental como llave primaria

            $table->string('titulo'); 
            // Creo el campo título tipo texto

            $table->string('autor'); 
            // Creo el campo autor tipo texto

            $table->year('anio'); 
            // Creo el campo año para guardar el año de publicación

            $table->timestamps(); 
            // Laravel crea automáticamente created_at y updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // En este método elimino la tabla si necesito revertir la migración

        Schema::dropIfExists('libros');
        // Elimina la tabla libros si existe
    }
};
