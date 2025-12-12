<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">

        <h1>Búsqueda de libros</h1>

        <form method="GET">
            <div class="mb-3">
                <label class="form-label" for="busqueda">Introduzca los términos de búsqueda: </label>
                <input type="search" class="form-control" name="busqueda" id="busqueda" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_GET["busqueda"])) {
    $terminos_busqueda = $_GET["busqueda"];
    if (trim($terminos_busqueda) !== "") {

        require_once "util.php";
        try {

            $resultado = getResultados($terminos_busqueda);

            mostrarResultados($resultado);

        } catch (Exception $e) {
            error_log("Ha ocurrido una una excepción: " . $e->getMessage());
            echo "<p>Ha ocurrido un error inesperado: </p>";
        } finally {
            //Cerramos los recursos
            //Open non-persistent MySQL connections and result sets are automatically closed when their objects are destroyed. Explicitly closing open connections and freeing result sets is optional.
            if (isset($con)) {
                $con->close();
            }
            if (isset($stmt)) {
                $stmt->close();
            }
            if (isset($resultado)) {
                $resultado->free();
            }
        }
    } else {
        echo "<p> Introduzca una cadena no vacía </p>";
    }
}

?>