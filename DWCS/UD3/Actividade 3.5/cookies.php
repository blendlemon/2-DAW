<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de cookies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 class="h1">Introduzca datos para crear una cookie</h1>
    <form method="post" action="">
        <div class="form-group mb4">
            <label for="name" class="form-label">Cookie name:</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group mb4">
            <label for="value" class="form-label">Cookie value:</label>
            <input type="text" name="value" class="form-control">
        </div>

        <div class="form-group mb4">
            <label for="expiration" class="form-label">Cookie expiration seconds:</label>
            <input type="number" name="expiration" class="form-control" min="0" value="0">
        </div>

        <input type="submit" class="btn btn-primary btn-block mb-4" value="Añadir cookie">
    </form>

    <?php
    ini_set("output_buffering", 0);
    require_once "tabla_cookies.php";
    if (isset($_POST['name'], $_POST['value'])) {
        $name = $_POST['name'];
        $value = $_POST['value'];
        $expiration = $_POST['expiration'];
        if ($expiration > 0) {
            setcookie($name, $value, time() + $expiration);
        } else {
            setcookie($name, $value);
        }

        header('location: cookies.php');
    }
    ob_end_flush();
    ?>
</body>

</html>