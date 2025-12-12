<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 class="display-1">Búsqueda de libros</h1>

    <form method="GET">
        <label for="busqueda">Introduzca los términos de búsqueda: </label>
        <input type="search" class="form-control-search" name="busqueda" id="busqueda" required>
        <button type="submit" class="btn btn-outline-primary">Buscar</button>
    </form>
</body>

</html>
<?php
if (isset($_GET["busqueda"])) {
    $terminos_busqueda = $_GET["busqueda"];
    if (trim($terminos_busqueda) !== "") {

        require_once "utils.php";

        try {


            $array = Busqueda($terminos_busqueda);

            if (!$array) {
                echo "<p>No se han encontrado resultados</p>";
            } else {
                echo "<ol class=\"list-group\">";
                foreach ($array as $fila_array){
                    echo "<li class =\"list-group-item\">". htmlspecialchars($fila_array["title"]) . "</li>";
                }
                echo "</ol>";
            }

        } catch (Exception $e) {
            echo "<p>Ha ocurrido una excepción: " . $e->getMessage() . "</p>";
        }
        //Cerramos los recursos
        $con = null;
        $stmt = null;
    } else {
        echo "<p> Introduzca una cadena no vacía </p>";
    }
}

?>