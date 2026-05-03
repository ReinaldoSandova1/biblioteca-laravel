<!DOCTYPE html>
<!-- Aquí indico que estoy usando HTML5 -->

<html lang="es">
<!-- Defino que el idioma de la página es español -->

<head>
    <meta charset="UTF-8">
    <!-- Permite usar caracteres especiales como tildes -->

    <title>Registrar Libro</title>
    <!-- Título que aparece en la pestaña del navegador -->

    <!-- Importo Bootstrap para darle diseño moderno -->
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

<!-- CONTENIDO PRINCIPAL -->
<div class="container mt-5">
    <!-- Contenedor con margen superior -->

    <div class="row justify-content-center">
        <!-- Fila centrada -->

        <div class="col-md-8">
            <!-- Ocupo 8 columnas del grid -->

            <!-- TARJETA -->
            <div class="card shadow-lg border-0">
                <!-- Creo una tarjeta con sombra para el formulario -->

                <!-- ENCABEZADO -->
                <div class="card-header bg-primary text-white text-center">
                    <!-- Encabezado azul -->

                    <h4 class="mb-0">
                        <i class="bi bi-book"></i> Registrar Libro
                    </h4>
                    <!-- Título con icono -->
                </div>

                <!-- CUERPO -->
                <div class="card-body p-4">

                    <!-- FORMULARIO -->
                    <form method="POST" action="/guardar">
                        <!-- Envío los datos al controlador para guardarlos -->

                        @csrf
                        <!-- Token de seguridad obligatorio en Laravel -->

                        <!-- CAMPO TÍTULO -->
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
                                    class="form-control" 
                                    placeholder="Ej: Don Quijote" 
                                    required
                                >
                                <!-- Campo donde el usuario escribe el título -->
                            </div>
                        </div>

                        <!-- CAMPO AUTOR -->
                        <div class="mb-3">
                            <label class="form-label">Autor</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>

                                <input 
                                    type="text" 
                                    name="autor" 
                                    class="form-control" 
                                    placeholder="Ej: Cervantes" 
                                    required
                                >
                                <!-- Campo para escribir el autor -->
                            </div>
                        </div>

                        <!-- CAMPO AÑO -->
                        <div class="mb-4">
                            <label class="form-label">Año</label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>

                                <input 
                                    type="number" 
                                    name="anio" 
                                    class="form-control" 
                                    placeholder="Ej: 1605" 
                                    required
                                >
                                <!-- Campo numérico para el año -->
                            </div>
                        </div>

                        <!-- BOTONES -->
                        <div class="d-flex justify-content-between">

                            <!-- BOTÓN GUARDAR -->
                            <button class="btn btn-success px-4">
                                <i class="bi bi-save"></i> Guardar
                            </button>
                            <!-- Guarda el libro en la base de datos -->

                            <!-- BOTÓN VER LIBROS -->
                            <a href="/libros" class="btn btn-outline-primary px-4">
                                <i class="bi bi-table"></i> Ver libros
                            </a>
                            <!-- Redirige a la lista de libros -->
                        </div>

                    </form>

                </div>

                <!-- PIE -->
                <div class="card-footer text-center text-muted">
                    Sistema de gestión de libros
                </div>
                <!-- Texto inferior -->

            </div>

        </div>
    </div>

</div>

</body>
</html>