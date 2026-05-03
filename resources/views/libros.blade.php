<!DOCTYPE html>
<!-- Aquí indico que estoy usando HTML5 -->

<html lang="es">
<!-- Defino que el idioma de la página es español -->

<head>
    <meta charset="UTF-8">
    <!-- Permite usar caracteres especiales como tildes -->

    <title>Biblioteca</title>
    <!-- Este es el título que aparece en la pestaña del navegador -->

    <!-- Importo Bootstrap para darle estilos modernos a la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<!-- Le doy un fondo claro a toda la página -->

<div class="container mt-5">
<!-- Creo un contenedor con margen arriba -->

    <h2 class="text-center mb-4">Sistema de Biblioteca</h2>
    <!-- Título principal centrado -->

    <!-- MENSAJE DE ÉXITO -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Aquí muestro un mensaje cuando se guarda un libro -->

    <!-- FORMULARIO -->
    <div class="card shadow mb-4">
        <!-- Creo una tarjeta con sombra -->

        <div class="card-header bg-primary text-white">
            Registrar Libro
        </div>
        <!-- Encabezado azul -->

        <div class="card-body">
            <form method="POST" action="/guardar">
                <!-- Envío los datos al controlador para guardarlos -->

                @csrf
                <!-- Token de seguridad de Laravel -->

                <!-- CAMPO TÍTULO -->
                <div class="mb-3">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control" required>
                    <!-- Campo donde el usuario escribe el título -->
                </div>

                <!-- CAMPO AUTOR -->
                <div class="mb-3">
                    <label>Autor</label>
                    <input type="text" name="autor" class="form-control" required>
                    <!-- Campo donde se escribe el autor -->
                </div>

                <!-- CAMPO AÑO -->
                <div class="mb-3">
                    <label>Año</label>
                    <input type="number" name="anio" class="form-control" required>
                    <!-- Campo numérico para el año -->
                </div>

                <!-- BOTÓN GUARDAR -->
                <button class="btn btn-success">Guardar</button>
                <!-- Este botón envía el formulario -->
            </form>
        </div>
    </div>

    <!-- TABLA -->
    <div class="card shadow">
        <!-- Otra tarjeta para mostrar los libros -->

        <div class="card-header bg-dark text-white">
            Lista de Libros
        </div>
        <!-- Encabezado oscuro -->

        <div class="card-body">
            <table class="table table-striped table-bordered text-center">
                <!-- Tabla con estilos -->

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Año</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($libros as $libro)
                    <!-- Recorro todos los libros -->

                    <tr>
                        <td>{{ $libro->id }}</td>
                        <!-- Muestro el ID -->

                        <td>{{ $libro->titulo }}</td>
                        <!-- Muestro el título -->

                        <td>{{ $libro->autor }}</td>
                        <!-- Muestro el autor -->

                        <td>{{ $libro->anio }}</td>
                        <!-- Muestro el año -->
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>

</body>
</html>