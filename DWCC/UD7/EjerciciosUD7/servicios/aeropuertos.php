<?php
// aeropuertos.php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

// Lista simulada de aeropuertos
$aeropuertos = [
    ["codigo" => "JFK", "nombre" => "John F. Kennedy International Airport"],
    ["codigo" => "LAX", "nombre" => "Los Angeles International Airport"],
    ["codigo" => "CDG", "nombre" => "Charles de Gaulle Airport"],
    ["codigo" => "MAD", "nombre" => "Adolfo Suárez Madrid–Barajas Airport"],
    ["codigo" => "EZE", "nombre" => "Ministro Pistarini International Airport"]
];

// Devolver JSON
echo json_encode($aeropuertos);
?>
