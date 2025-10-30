<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        echo ("Introduce el valor de n: ");

        fscanf(STDIN, "%d", $n);

        $suma = 1;
        $ter = 1;

        for ($k = 1; $k <= $n; $k++) {
            $ter = $ter / 2;
            $suma = $suma + $ter;
        }
        echo "La suma vale: $suma\n";
    ?>


</body>
</html>

