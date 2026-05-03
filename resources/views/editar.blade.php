<!DOCTYPE html>
<!-- Aquí estoy indicando que estoy usando HTML5 -->

<html lang="es">
<!-- Defino que el idioma de la página es español -->

<head>
    <meta charset="UTF-8">
    <!-- Permite usar caracteres especiales como tildes -->

    <title>Editar Libro</title>
    <!-- Este es el título que aparece en la pestaña del navegador -->

    <!-- Importo Bootstrap para darle estilo profesional -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Importo iconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">
<!-- Aplico un fondo claro a toda la página -->

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark shadow">
    <!-- Creo una barra de navegación con fondo oscuro -->

    <div class="container">
        <!-- Contenedor centrado -->

        <span class="navbar-brand mb-0 h1">
            Sistema de Biblioteca
        </span>
        <!-- Nombre del sistema -->
    </div>
</nav>

<!-- CONTENIDO -->
<div class="container mt-5">
    <!-- Contenedor principal con margen superior -->

    <div class="row justify-content-center">
        <!-- Fila centrada -->

        <div class="col-md-8">
            <!-- Ocupo 8 columnas del grid -->

            <!-- TARJETA -->
            <div class="card shadow-lg border-0">
                <!-- Creo una tarjeta con sombra -->

                <!-- ENCABEZADO -->
                <div class="card-header bg-primary text-white text-center">
                    <!-- Encabezado azul -->

                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square"></i> Editar Libro
                    </h4>
                    <!-- Título con icono -->
                </div>

                <!-- CUERPO -->
                <div class="card-body p-4">

                    <!-- FORMULARIO -->
                    <form method="POST" action="/actualizar/{{ $libro->id }}">
                        <!-- Envío los datos al método update del controlador -->

                        @csrf
                        <!-- Token de seguridad de Laravel -->

                        @method('PUT')

                        <!-- TÍTULO -->
                        <div class="mb-3">
                            <label class="form-label">Título</label>

                            <div class="input-group">
                                <!-- Agrupo icono + input -->

                                <span class="input-group-text">
                                    <i class="bi bi-journal-text"></i>
                                </span>

                                <input 
                                    type="text" 
                                    name="titulo" 
                                    value="{{ $libro->titulo }}" 
                                    class="form-control" 
                                    required
                                >
                                <!-- Campo para editar el título -->
                            </div>
                        </div>

                        <!-- AUTOR -->
                        <div class="mb-3">
                            <label class="form-label">Autor</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>

                                <input 
                                    type="text" 
                                    name="autor" 
                                    value="{{ $libro->autor }}" 
                                    class="form-control" 
                                    required
                                >
                                <!-- Campo para editar el autor -->
                            </div>
                        </div>

                        <!-- AÑO -->
                        <div class="mb-4">
                            <label class="form-label">Año</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>

                                <input 
                                    type="number" 
                                    name="anio" 
                                    value="{{ $libro->anio }}" 
                                    class="form-control" 
                                    required
                                >
                                <!-- Campo para editar el año -->
                            </div>
                        </div>

                        <!-- BOTONES -->
                        <div class="d-flex justify-content-between">

                            <!-- BOTÓN ACTUALIZAR -->
                            <button class="btn btn-primary px-4">
                                <i class="bi bi-save"></i> Actualizar
                            </button>
                            <!-- Guarda los cambios -->

                            <!-- BOTÓN VOLVER -->
                            <a href="/libros" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-arrow-left"></i> Volver
                            </a>
                            <!-- Regresa a la lista -->
                        </div>

                    </form>

                </div>

                <!-- PIE -->
                <div class="card-footer text-center text-muted">
                    Edición de registros
                </div>
                <!-- Texto inferior -->

            </div>

        </div>
    </div>

</div>

</body>
</html>