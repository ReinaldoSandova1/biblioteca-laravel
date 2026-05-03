<?php

namespace App\Http\Controllers;
// Aquí defino el espacio de nombres donde está mi controlador

use App\Models\Libro;
// Importo el modelo Libro para poder interactuar con la base de datos

use Illuminate\Http\Request;
// Importo Request para manejar los datos que vienen del formulario

class LibroController extends Controller
{
    // Este método muestra el formulario para crear un libro
    public function create()
    {
        return view('crear');
        // Retorno la vista donde el usuario ingresa los datos del libro
    }

    // Este método guarda un nuevo libro en la base de datos
    public function store(Request $request)
    {
        // Utilizo Eloquent para crear un nuevo registro
        Libro::create([
            'titulo' => $request->titulo, // Obtengo el título del formulario
            'autor' => $request->autor,   // Obtengo el autor
            'anio' => $request->anio     // Obtengo el año
        ]);

        // Redirecciono a la lista de libros con un mensaje de éxito
        return redirect('/libros')->with('success', 'Libro guardado correctamente');
    }

    // Este método lista todos los libros (con buscador)
    public function index(Request $request)
    {
        // Obtengo el valor escrito en el buscador
        $buscar = $request->buscar;

        // Aplico filtro si el usuario escribe algo
        $libros = Libro::when($buscar, function ($query, $buscar) {
            return $query->where('titulo', 'LIKE', "%$buscar%")
                         ->orWhere('autor', 'LIKE', "%$buscar%");
        })->get();
        // Si hay texto, filtra; si no, muestra todo

        // Envío los datos a la vista listar
        return view('listar', compact('libros'));
    }

    // Este método elimina un libro
    public function destroy($id)
    {
        // Busco el libro por su ID
        $libro = Libro::find($id);

        // Verifico si existe
        if (!$libro) {
            return redirect('/libros')->with('error', 'Libro no encontrado');
        }

        // Elimino el registro
        $libro->delete();

        // Redirecciono con mensaje de éxito
        return redirect('/libros')->with('success', 'Libro eliminado correctamente');
    }

    // Este método muestra el formulario de edición
    public function edit($id)
    {
        // Busco el libro por ID
        $libro = Libro::find($id);

        // Retorno la vista con los datos del libro
        return view('editar', compact('libro'));
    }

    // Este método actualiza los datos del libro
    public function update(Request $request, $id)
    {
        // Busco el libro por ID
        $libro = Libro::find($id);

        // Verifico si existe
        if (!$libro) {
            return redirect('/libros')->with('error', 'Libro no encontrado');
        }

        // Actualizo los datos del libro
        $libro->update([
            'titulo' => $request->titulo, // Nuevo título
            'autor' => $request->autor,   // Nuevo autor
            'anio' => $request->anio     // Nuevo año
        ]);

        // Redirecciono con mensaje de éxito
        return redirect('/libros')->with('success', 'Libro actualizado correctamente');
    }
}