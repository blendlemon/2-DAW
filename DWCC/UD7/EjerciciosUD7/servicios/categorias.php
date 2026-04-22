<?php
header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json');

$categorias = [
    ["id" => 1, "nombre" => "Electrónica"],
    ["id" => 2, "nombre" => "Ropa"],
    ["id" => 3, "nombre" => "Libros"]
];

echo json_encode($categorias);
?>
