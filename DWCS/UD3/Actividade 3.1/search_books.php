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
        require_once "search_functions.php";

        try {
            // (1) Crear la conexión
            $con = getConnection();
            $resultados = buscarLibros($con, $terminos_busqueda);
            // (2) Preparar la consulta
            //En la bd bookdb no importan mayúsculas/minúsculas porque está usando collation caseinsensitive, pero no está demás que nuestro código no dependa de la collation de la base de datos
            $stmt = $con->prepare("SELECT DISTINCT b.title
                                    FROM books b
                                    JOIN book_authors ba ON ba.book_id = b.book_id
                                    JOIN authors a ON a.author_id = ba.author_id
                                    WHERE b.title LIKE :q
                                    OR a.first_name LIKE :q");

            // (3) Sustituir de los parámetros
            $pattern = '%' . strtoupper($terminos_busqueda) . '%';
            $stmt->bindParam(':q', $pattern, PDO::PARAM_STR);

            //Antes de ejecutar: 
            // echo "<p style='color:blue;'> Información de <code>debugDumpParams</code> <span style='color:red'> antes </span> de llamar a  <code>execute()</code>:</p>";
            // echo "<pre>";
            // $stmt->debugDumpParams();
            // echo "</pre>";

            // (4) Ejecutar la consulta
            $stmt->execute();

            //Después de ejecutar
            // echo "<p style='color:blue;'> Información de <code>debugDumpParams</code> <span style='color:red'> después </span> de llamar a  <code>execute()</code>:</p>";
            // echo "<pre>";
            // $stmt->debugDumpParams();
            // echo "</pre>";

            // (5) Recuperar los resultados
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            // if (($array !== false)) {
            if ($fila) {

                echo "<ol>";
                do {
                    // un único valor: el title
                    echo "<li>" . $fila["title"] ."</li>";
                }while($fila = $stmt->fetch(PDO::FETCH_ASSOC));
                echo "</ol>";
            } else {
                echo "<p>No se han encontrado resultados</p>";
            }
            //}

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