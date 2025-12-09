<?php
/**
 * Util: helper para búsquedas.
 *
 * Proporciona la función fetch_search_results que acepta una conexión mysqli
 * y términos de búsqueda y devuelve un array de filas con índices numéricos
 * (equivalente a PDO::FETCH_NUM o MYSQLI_NUM).
 *
 * Firma:
 *   function fetch_search_results(mysqli $con, string $terminos_busqueda): array
 *
 * Lanza Exception en caso de error.
 */

function fetch_search_results($con, $terminos_busqueda): array
{
    if (!($con instanceof mysqli)) {
        throw new InvalidArgumentException('Se necesita una conexión mysqli válida.');
    }

    $sql = "SELECT title AS resultado
            FROM books
            WHERE UPPER(title) LIKE ?
            UNION
            SELECT CONCAT(first_name, ' ', last_name) AS resultado
            FROM authors
            WHERE UPPER(CONCAT(first_name, ' ', last_name)) LIKE ?";

    $stmt = $con->prepare($sql);
    if ($stmt === false) {
        throw new Exception('Error al preparar la consulta: ' . $con->error);
    }

    $filtro = '%' . strtoupper($terminos_busqueda) . '%';

    if (!$stmt->bind_param('ss', $filtro, $filtro)) {
        $err = $stmt->error;
        $stmt->close();
        throw new Exception('Error en bind_param: ' . $err);
    }

    if (!$stmt->execute()) {
        $err = $stmt->error;
        $stmt->close();
        throw new Exception('Error al ejecutar la consulta: ' . $err);
    }

    $rows = [];

    // Si está disponible get_result() (mysqlnd), usar fetch_all(MYSQLI_NUM)
    if (method_exists($stmt, 'get_result')) {
        $res = $stmt->get_result();
        if ($res !== false) {
            // fetch_all devuelve arrays con índices numéricos si usamos MYSQLI_NUM
            $rows = $res->fetch_all(MYSQLI_NUM);
            $res->free();
        }
    } else {
        // Fallback cuando no hay mysqlnd: bind_result y construir arrays numéricos
        // Asumimos que la consulta devuelve una sola columna (resultado)
        $stmt->bind_result($col0);
        while ($stmt->fetch()) {
            $rows[] = [$col0];
        }
    }

    $stmt->close();

    return $rows;
}
