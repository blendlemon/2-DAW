<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de estudiantes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Listado de Estudiantes</h1>
        <hr>

        <?php

        //Completar el código para cargar y mostrar el listado de estudiantes
        require_once "includes/funciones.php";
        require_once "includes/persistencia.php";

        $estudiantes = cargarEstudiantes();
        mostrarListado($estudiantes);
        ?>
        <hr>
        <footer>Aplicación de prácticas de PHP - Desarrollo Web Entorno Servidor</footer>
    </div>
</body>

</html>