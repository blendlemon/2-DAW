<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>
</head>

<body>
    <h1>Búsqueda de libros</h1>

    <form method="GET">
        <label for="busqueda">Introduzca los términos de búsqueda: </label>
        <input type="search" name="busqueda" id="busqueda" required>
        <button type="submit">Buscar</button>
    </form>
</body>

</html>
<?php
if (isset($_GET["busqueda"])) {
    $terminos_busqueda = $_GET["busqueda"];
    if (trim($terminos_busqueda) !== "") {

        require_once "connection.php";
        require_once "util.php";

        try {
            showResults(buscarLibros($terminos_busqueda));

            //(6) Capturar excepciones
        } catch (Exception $e) {
            echo "<p>Ha ocurrido una excepción: " . $e->getMessage() . "</p>";
        } finally {
            //(7) 
            // Liberar los recursos
            $con = null;
            $stmt = null;
        }
    } else {
        echo "<p> Introduzca una cadena no vacía </p>";
    }
}

?>