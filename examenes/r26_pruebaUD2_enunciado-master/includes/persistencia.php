<?php

/**
 * Carga y devuelve el array asociativo de estudiantes almacenado en un fichero JSON
 *
 * @return array
 */
function cargarEstudiantes() {
    $file = "estudiantes.json";
    if (!file_exists($file)) {
        return [];
    }
    $json = file_get_contents($file);
    return json_decode($json, true) ?? [];
}

/**
 * Guarda el array de estudiantes en el archivo JSON
 *
 * @param array $estudiantes
 * @return void
 */
function guardarEstudiantes($estudiantes) {
    $json = json_encode($estudiantes, JSON_PRETTY_PRINT);
    file_put_contents("estudiantes.json", $json);
}
