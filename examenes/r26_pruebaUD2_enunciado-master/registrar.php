<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de estudiantes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Registro de Estudiantes</h1>
        <hr>

        <form method="POST">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control">

            <label class="form-label">Edad:</label>
            <input type="number" name="edad" class="form-control">

            <label class="form-label">Curso:</label>
            <input type="text" name="curso" class="form-control">

            <label class="form-label">Tipo de estudiante:</label>
            <select class="form-select" name="tipo">
                <option value="alumno">Alumno</option>
                <option value="oyente">Oyente</option>
                <option value="becado">Becado</option>
            </select>

            <button class="btn btn-primary mt-3" type="submit" name="accion" value="registrar">Registrar</button>
        </form>

        <hr>

        <form action="listado.php" method="post">
            <button class="btn btn-secondary mt-3" type="submit">Mostrar Estudiantes</button>
        </form>

        <!-- Completar el código para procesar los datos del formulario -->
        <?php
        ini_set("display_errors", "On");
        require_once "includes/persistencia.php";
        require_once "includes/funciones.php";
        if (isset($_POST["nombre"])) {
            $estudiantes = cargarEstudiantes();
            $registro = array(
                "nombre" => $_POST["nombre"],
                "edad" => $_POST["edad"],
                "curso" => $_POST["curso"],
                "tipo" => $_POST["tipo"]
            );
            $valida = validar($registro);
            if ($valida) {
                $estudiantes = inserta($estudiantes, $registro);
                guardarEstudiantes($estudiantes);
                switch ($registro["tipo"]) {
                    case "alumno":
                        echo "Registro estándar";
                        break;
                    case "oyente":
                        echo "Acceso sin evaluación";
                        break;
                    case "becado":
                        echo "Exento de matrícula";
                        break;
                    default:
                        echo "Tipo no reconocido";
                }
            } else {
                echo "<br>Se introdujeron datos no válidos<br>";
            }
        }
        ?>
        <footer>Aplicación de prácticas de PHP - Desarrollo Web Entorno Servidor</footer>
    </div>
</body>

</html>