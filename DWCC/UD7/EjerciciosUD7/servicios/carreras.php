<?php
header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json');

$facultad = $_GET['facultad'] ?? null;

$carreras = [
    "FCE" => [
        ["codigo" => "CONT", "nombre" => "Contador Público"],
        ["codigo" => "ADMI", "nombre" => "Administración de Empresas"]
    ],
    "FADU" => [
        ["codigo" => "ARQ", "nombre" => "Arquitectura"],
        ["codigo" => "DISE", "nombre" => "Diseño Industrial"]
    ],
    "FI" => [
        ["codigo" => "SIST", "nombre" => "Ingeniería en Sistemas"],
        ["codigo" => "ELEC", "nombre" => "Ingeniería Eléctrica"]
    ]
];

echo json_encode($carreras[$facultad] ?? []);
?>