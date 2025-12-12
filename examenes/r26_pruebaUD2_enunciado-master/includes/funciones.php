<?php
//Añade aquí las funciones para completar la prueba UD2

/**
 * Comprueba si los datos recibidos por el formulario son válidos
 *
 * @return bool
 */ 
function validar(array $registro)
{
    $valida = true;
    if ($registro["nombre"] == "") {
        $valida = false;
    }
    if ($registro["edad"] <= 0 || $registro["edad"] == "") {
        $valida = false;
    }
    if ($registro["curso"] != "2025-26") {
        $valida = false;
    }
    if ($registro["tipo"] == "") {
        $valida = false;
    }
    return $valida;
}

function inserta(array $estudiantes, array $registro)
{
    array_push($estudiantes, $registro);
    return $estudiantes;
}



//Completa la función para mostrar el listado de estudiantes
function mostrarListado($estudiantes)
{
    echo "<h2>Listado final de estudiantes registrados:</h2>";
    //Completa aquí la condición para comprobar si el array está vacío
    if (count($estudiantes) == 0) {
        echo "<p>No se registró ningún estudiante.</p>";
    } else {
        echo "<table class='table' border='1' cellpadding='5'>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Curso</th>
                    <th>Tipo</th>
                </tr>";
        //Completar aquí para mostrar los datos del array
        for ($i = 0; $i < count($estudiantes); $i++) {
            echo "<tr>
                    <td>{$estudiantes[$i]["nombre"]}</td>
                    <td>{$estudiantes[$i]["edad"]}</td>
                    <td>{$estudiantes[$i]["curso"]}</td>
                    <td>{$estudiantes[$i]["tipo"]}</td>
                </tr>";
        }




        echo "</table>";
    }
}
