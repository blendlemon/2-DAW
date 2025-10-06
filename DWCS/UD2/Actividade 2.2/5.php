<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    fscanf(STDIN, "%f", $nota);

    $nota = int($nota);

    switch ($nota){
        case 10:
            echo "Matrícula de honor";
            break;
        case 9:
            echo "Sobresaliente";
            break;
        case 8:
        case 7:
            echo "Notable";
            break;
        case 6:
        case 5:
            echo "Aprobado";
            break;
        default:
            echo "Suspenso";
            
    }

    ?>
</body>
</html>