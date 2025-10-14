<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="get" action="">
    <h1>Reservas lunch</h1>

    <label for="fecha">Introduzca la fecha: </label>
    <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
    <br>
    <label for="hora">Introduzca la hora: </label>
    <input type="time" id="hora" name="hora" value="13:00" min="13:00" max="15:00">
    <fieldset>
        <legend>Ubicación</legend>
        <input type="radio" name="Ubicación" value="Interior"> Interior
        <input type="radio" name="Ubicación" value="Terraza" checked> Terraza
    </fieldset>
    <label for="alergenos">Introduzca si es alérgico a alguno de los siguientes elementos: </label>
    <select name="alergenos[]" multiple id="alergenos">
        <option value="" disabled>--</option>
        <option value="leche">Leche</option>
        <option value="huevo">Huevo</option>
        <option value="Gluten">Gluten</option>
    </select>
    <br>
    <input type="submit">
    </form>

    <?php 
    
        foreach ($_GET as $clave => $valor) {
            echo "<pre>";
            if (is_array($valor)) {
                echo "$clave: " . implode(", ", $valor);
            } else {
                echo "$clave: $valor";
            }
            echo "</pre>";
        }
    
    ?>
</body>
</html>