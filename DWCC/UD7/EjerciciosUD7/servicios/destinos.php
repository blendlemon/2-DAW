<?php
// destinos.php
header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json');

$origen = $_GET['origen'] ?? null;

$destinos_simulados = [
    "JFK" => [
        ["codigo" => "LAX", "nombre" => "Los Angeles International Airport"],
        ["codigo" => "CDG", "nombre" => "Charles de Gaulle Airport"]
    ],
    "LAX" => [
        ["codigo" => "JFK", "nombre" => "John F. Kennedy International Airport"],
        ["codigo" => "EZE", "nombre" => "Ministro Pistarini International Airport"]
    ],
    "CDG" => [
        ["codigo" => "MAD", "nombre" => "Adolfo Suárez Madrid–Barajas Airport"],
        ["codigo" => "JFK", "nombre" => "John F. Kennedy International Airport"]
    ],
    "MAD" => [
        ["codigo" => "CDG", "nombre" => "Charles de Gaulle Airport"],
        ["codigo" => "LAX", "nombre" => "Los Angeles International Airport"]
    ],
    "EZE" => [
        ["codigo" => "MAD", "nombre" => "Adolfo Suárez Madrid–Barajas Airport"],
        ["codigo" => "JFK", "nombre" => "John F. Kennedy International Airport"]
    ]
];

if ($origen && array_key_exists($origen, $destinos_simulados)) {
    echo json_encode($destinos_simulados[$origen]);
} else {
    echo json_encode([]); // Devuelve vacío si no se encuentra
}
?>
