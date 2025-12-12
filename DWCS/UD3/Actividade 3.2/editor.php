<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engadir editorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <h1 class="h1">Engadir editorial</h1>
    <a href="index.php">Volver ao listado</a>
    <form method="get" action="">
        <label for="editorial">Nome editorial</label>
        <input type="text" name="editorial" id="editorial" class="form-control">
        <br>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>

    <?php
    require_once "connection.php";
    if (isset($_GET["editorial"]) && $_GET["editorial"] !== "") {
        try {
            $con = getConnection();
            $nombre = htmlspecialchars($_GET["editorial"]);
            $stmt = $con->prepare("INSERT INTO publishers (name) VALUES(?)");
            $stmt->bindParam(1, $nombre);
            $stmt->execute();
        } catch (Exception $e) {
            error_log("Ha ocurrido un error inesperado: " . $e->getMessage());
            echo "<div class=\"alert alert-primary\">Ha ocurrido un error inesperado</div>";
        }
    }
    ?>
</body>

</html>