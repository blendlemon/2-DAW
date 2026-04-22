<?php
header('Content-Type: application/json');

// Simulación de recepción de datos
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
$importe = isset($_POST['importe']) ? $_POST['importe'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";

// Validación básica
if ($nombre == "" || $direccion == "" || $telefono == "" || $importe == "" || $email == "") {
    echo json_encode([
        "ok" => false,
        "error" => "Faltan datos"
    ]);
    exit;
}

// Simulación de inserción en BBDD
// Generamos un ID aleatorio como si fuera AUTO_INCREMENT
$idNuevo = rand(1000, 9999);

// Respuesta
echo json_encode([
    "ok" => true,
    "id" => $idNuevo
]);
?>