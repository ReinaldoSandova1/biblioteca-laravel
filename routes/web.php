<?php

use Illuminate\Support\Facades\Route;
// Aquí estoy importando la clase Route para definir las rutas de mi aplicación

use App\Http\Controllers\LibroController;
// Importo el controlador LibroController que contiene toda la lógica

// RUTA PRINCIPAL (FORMULARIO)
Route::get('/', [LibroController::class, 'create']);
// Cuando el usuario entra a la página principal (/), muestro el formulario para registrar libros


// GUARDAR LIBRO
Route::post('/guardar', [LibroController::class, 'store']);
// Esta ruta recibe los datos del formulario y los envía al método store para guardarlos en la base de datos


// LISTAR LIBROS
Route::get('/libros', [LibroController::class, 'index']);
// Esta ruta muestra todos los libros registrados (incluye el buscador)


// ELIMINAR LIBRO
Route::delete('/eliminar/{id}', [LibroController::class, 'destroy']);
// Aquí elimino un libro específico usando su ID


// EDITAR LIBRO (MOSTRAR FORMULARIO)
Route::get('/editar/{id}', [LibroController::class, 'edit']);
// Esta ruta muestra el formulario con los datos del libro para poder editarlo


// ACTUALIZAR LIBRO
Route::put('/actualizar/{id}', [LibroController::class, 'update']);
// Esta ruta recibe los datos editados y actualiza el libro en la base de datos