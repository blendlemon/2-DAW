<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="Actividade 2.4/css">
</head>

<body>
    <h1>Tienda de ropa</h1>

    <form action="" method="get">
        <div>
            <lablel for="koprenda" class="form-label"></lablel>
            <select name="prenda" id="prenda" multiple class="form-select">
                <option value="value1">Abrigos</option>
                <option value="value2">Tops</option>
                <option value="value3">Camisas</option>
            </select>
        </div>

        <div>
            <div><label class="form-label" for="color">color</label></div>
            <input type="color" name="color" class="form-control form-color">
        </div>

        <div><input type="submit"></div>
    </form>

    <?php
    //cambiar $_POST por $_GET en función del método HTTP utilizado
    foreach ($_GET as $clave => $valor) {

        echo "<strong>$clave</strong>:";

        if (!is_array($valor)) {
            if ($clave == "color") {
                $color = $valor;

                echo "<span style=\"background-color:$color\">$valor</span>";
            } else {
                echo " $valor";
            }
        } else {
            echo "<pre>";
            print_r($valor);
            echo "</pre>";
        }

        echo "<br/>";
    }


    ?>
</body>

</html>