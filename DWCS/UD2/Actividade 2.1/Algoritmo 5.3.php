<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        echo "Introduce un valor para x: ";

        fscanf(STDIN, "%d", $x);
        $f = 0;

        if ($x>0){
            $f = $x**2;
        }

        printf("El valor de la funcion es: %d", $f);

    ?>


</body>
</html>

