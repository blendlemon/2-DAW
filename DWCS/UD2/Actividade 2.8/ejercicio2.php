<?php 

    function aplicar_descuento(&$valor){
        $valor -= ($valor * 0.1);

        
    }

    $productos = [
    "pan" => 1.20,
    "leche" => 0.95,
    "huevos" => 2.10,
    "queso" => 3.50
    ];

    
    foreach($productos as $clave => $valor){
            aplicar_descuento($valor);
            echo "$clave: $valor <br>";
        }


?>