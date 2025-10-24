<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        function intercambiar(&$a, &$b){
        $aux = $a;
        $a = $b;
        $b = $aux;
        }
        $a = 2;
        $b = 3;

        echo "$a $b";
        intercambiar($a,$b);
        echo "<br>";
        echo "$a $b";

    ?>
</body>
</html>