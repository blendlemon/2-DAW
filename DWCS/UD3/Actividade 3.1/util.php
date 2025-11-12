<?php
function buscarLibros(string $termo_busqueda): array {
     try{// (1) Crear la conexión
            $con = getConnection();
            // (2) Preparar la consulta
            //En la bd bookdb no importan mayúsculas/minúsculas porque está usando collation caseinsensitive, pero no está demás que nuestro código no dependa de la collation de la base de datos
            $stmt = $con->prepare("SELECT DISTINCT b.title
                                    FROM books b
                                    JOIN book_authors ba ON ba.book_id = b.book_id
                                    JOIN authors a ON a.author_id = ba.author_id
                                    WHERE b.title LIKE :q
                                    OR a.first_name LIKE :q");

            // (3) Sustituir de los parámetros
            $pattern = '%' . strtoupper($termo_busqueda) . '%';
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
    if ($fila){
    do {
        array_push($array, $fila);

    } while ($fila = $stmt->fetch(PDO::FETCH_ASSOC) !== false);

    return $array;
    }else{
        return [];
    }
    }finally {
            //(7) 
            // Liberar los recursos
            $con = null;
            $stmt = null;
        }
}

function showResults(array $array){
    if($array){
        echo "<ol>";
        foreach ($array as $fila){
            echo "<li>{$fila["title"]}</li>";
        }
        echo "</ol>";

    }else{
        echo "<p>Non se atoparon resultados</p>";
    }
}
?>