<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 

        $contador = 0;

        do{

            $dado = rand(1,6);
            $contador++;
            echo "<h1>Ha salido un: $dado</h1>";
        }while($dado!=5);

        echo "<h2>Hemos tirado un total de $contador veces</h2>"
    ?>

</body>
</html>

