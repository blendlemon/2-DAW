<?php
header("Access-Control-Allow-Origin: *"); 
header('Content-Type: application/json');

$facultades = [
    ["id" => "FCE", "nombre" => "Facultad de Ciencias Económicas"],
    ["id" => "FADU", "nombre" => "Facultad de Arquitectura"],
    ["id" => "FI", "nombre" => "Facultad de Ingeniería"]
];

echo json_encode($facultades);
?>
