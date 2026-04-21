<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); 
$peliculas = [];
for ($i = 1; $i <= 40; $i++) {
    $peliculas[] = [
        "titulo" => "Película $i",
        "director" => "Director $i",
        "anio" => 2000 + ($i % 20),
        "productor" => "Productor $i"
    ];
}

// Obtener parámetro de página
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$porPagina = 10;
$inicio = ($pagina - 1) * $porPagina;

// Recortar los resultados
$paginasTotales = ceil(count($peliculas) / $porPagina);
$peliculasPagina = array_slice($peliculas, $inicio, $porPagina);

echo json_encode([
    "pagina" => $pagina,
    "total_paginas" => $paginasTotales,
    "peliculas" => $peliculasPagina
]);
?>


