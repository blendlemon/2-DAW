<?php
header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json');

$categoria = $_GET['categoria'] ?? null;

$productos = [
    1 => [
        ["codigo" => "TV01", "nombre" => "Televisor 42''"],
        ["codigo" => "PH01", "nombre" => "Smartphone"]
    ],
    2 => [
        ["codigo" => "SH01", "nombre" => "Camisa"],
        ["codigo" => "PA01", "nombre" => "Pantalón"]
    ],
    3 => [
        ["codigo" => "BK01", "nombre" => "El Principito"],
        ["codigo" => "BK02", "nombre" => "1984 - George Orwell"]
    ]
];

echo json_encode($productos[$categoria] ?? []);
?>

