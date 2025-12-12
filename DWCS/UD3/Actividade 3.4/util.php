<?php
require_once "connection.php";
function getResultados(string $terminos_busqueda)
{
    try {
        $con =  getConnection();

        //En la bd bookdb no importan mayúsculas/minúsculas porque está usando collation caseinsensitive, pero no está demás que nuestro código no dependa de la collation de la base de datos
        $stmt = $con->prepare("select title as resultado from books where UPPER(title) like ?
                union 
                select Concat(first_name,' ', last_name)
                as resultado from authors where first_name like ?;");

        $filtro = "%" . strtoupper($terminos_busqueda) . "%";
        $stmt->execute([$filtro, $filtro]);

        $resultado = $stmt->get_result();

        $resultados = $resultado->fetch_all(PDO::FETCH_ASSOC);
        return $resultados;
    } finally {
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
}

function mostrarResultados(array $resultados)
{
    if (empty($resultados)) {
        echo "<p>No se han encontrado resultados</p>";
    } else {
        echo "<ol>";
        foreach ($resultados as $key => $fila) {
            echo "<li>$fila[0] </li>";
        }
        echo "</ol>";
    }
}
