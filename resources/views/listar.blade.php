<!DOCTYPE html>
<!-- Aquí estoy indicando que el documento es HTML5 -->

<html lang="es">
<!-- Defino el idioma en español -->

<head>
    <meta charset="UTF-8">
    <!-- Permite usar caracteres especiales como tildes -->

    <title>Lista de Libros</title>
    <!-- Título que aparece en la pestaña del navegador -->

    <!-- Importo Bootstrap para darle estilo moderno a la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Importo iconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
<!-- Le doy un fondo claro a toda la página -->

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark shadow">
    <!-- Creo una barra superior con fondo oscuro -->

    <div class="container">
        <!-- Contenedor para centrar el contenido -->

        <span class="navbar-brand mb-0 h1">
            Sistema de Biblioteca
        </span>
        <!-- Título del sistema -->
    </div>
</nav>

<!-- CONTENIDO PRINCIPAL -->
<div class="container mt-5">
    <!-- Contenedor principal con margen arriba -->

    <div class="row justify-content-center">
        <!-- Fila centrada -->

        <div class="col-lg-10">
            <!-- Ocupa 10 columnas del grid -->

            <!-- TARJETA -->
            <div class="card shadow-lg border-0">
                <!-- Creo una tarjeta con sombra -->

                <!-- ENCABEZADO -->
                <div class="card-header bg-primary text-white text-center">
                    <!-- Encabezado azul -->

                    <h4 class="mb-0">
                        <i class="bi bi-table"></i> Lista de Libros
                    </h4>
                    <!-- Título con icono -->
                </div>

                <!-- CUERPO -->
                <div class="card-body p-4">

                    <!-- MENSAJE DE ÉXITO -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- Aquí muestro mensajes cuando guardo o elimino -->

                    <!-- BUSCADOR Y BOTÓN -->
                    <div class="d-flex justify-content-between mb-3">

                        <!-- FORMULARIO DE BÚSQUEDA -->
                        <form method="GET" action="/libros" class="d-flex w-75">
                            <!-- Envío datos por GET -->

                            <div class="input-group">
                                <!-- Agrupo input y botón -->

                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-search"></i>
                                </span>
                                <!-- Icono de búsqueda -->

                                <input 
                                    type="text" 
                                    name="buscar" 
                                    value="{{ request('buscar') }}" 
                                    class="form-control" 
                                    placeholder="Buscar por título o autor..."
                                >
                                <!-- Campo para escribir lo que quiero buscar -->

                                <button class="btn btn-primary">
                                    Buscar
                                </button>
                                <!-- Botón para ejecutar la búsqueda -->
                            </div>
                        </form>

                        <!-- BOTÓN NUEVO -->
                        <a href="/" class="btn btn-success ms-2">
                            <i class="bi bi-plus-circle"></i> Nuevo
                        </a>
                        <!-- Botón para ir al formulario y agregar libro -->

                    </div>

                    <!-- TABLA -->
                    <div class="table-responsive">
                        <!-- Hace la tabla adaptable -->

                        <table class="table table-hover table-bordered text-center align-middle">
                            <!-- Tabla con estilos -->

                            <thead class="table-dark">
                                <!-- Encabezado oscuro -->
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Año</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($libros as $libro)
                                <!-- Recorro todos los libros -->

                                <tr>
                                    <td>{{ $libro->id }}</td>
                                    <td>{{ $libro->titulo }}</td>
                                    <td>{{ $libro->autor }}</td>
                                    <td>{{ $libro->anio }}</td>

                                    <td>

                                        <!-- BOTÓN EDITAR -->
                                        <a href="/editar/{{ $libro->id }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <!-- Permite editar el libro -->

                                        <!-- BOTÓN ELIMINAR -->
                                        <form id="formEliminar{{ $libro->id }}" action="/eliminar/{{ $libro->id }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminar({{ $libro->id }})">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                        <!-- Elimina el libro con confirmación -->

                                    </td>
                                </tr>

                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>

                <!-- PIE -->
                <div class="card-footer text-center text-muted">
                    Gestión de libros 
                </div>
                <!-- Texto inferior -->

            </div>

        </div>
    </div>

</div>

<!-- LIBRERÍA SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmarEliminar(id) {
    // Función que muestra alerta antes de eliminar

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Este libro se eliminará permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si confirma, envío el formulario
            document.getElementById('formEliminar' + id).submit();
        }
    });
}
</script>

</body>
</html>