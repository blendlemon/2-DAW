<?php
function Busqueda(string $terminos_busqueda) : array
{

    require_once "connection.php";

    $con = getConnection();

    $stmt = $con->prepare("SELECT DISTINCT b.title
            FROM books b
            JOIN book_authors ba ON ba.book_id = b.book_id
            JOIN authors a ON ba.author_id = a.author_id
            WHERE b.title LIKE :nombre
            OR a.first_name LIKE :nombre");
    $filtro = "%" . strtoupper($terminos_busqueda) . "%";
    $stmt->bindParam("nombre", $filtro);

    $stmt->execute();

    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $array;
}
