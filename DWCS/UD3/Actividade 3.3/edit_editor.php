<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engadir editorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<?php
require_once "utils.php";
$name = "";
$id = 0;
$accion = "Crear";
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $id = $_GET["id"] ?? 0;
    if ($id > 0) {
        $accion = "Editar";
        $fila = getPublisherById($id);
        $name = $fila["name"];
        $name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, "UTF-8");
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = (int)($_POST["id"] ?? 0);
    $nombre = $_POST["editorial"] ?? "";
    if (trim($nombre) !== "") {
        if ($id > 0) {
            vwUpdate($id, $nombre);
        } else {
            vwInsert($nombre);
        }
    }
}
?>

<body>
    <h1 class="h1"><?= $accion ?></h1>
    <a href="index.php">Volver ao listado</a>
    <form method="post" action="">
        <label for="editorial">Nome editorial</label>
        <input type="text" name="editorial" id="editorial" class="form-control" value="<?= $name ?>">
        <?php
        if ($id > 0) {
            echo "<input type='hidden' name='id' value='$id'>";
        }
        ?>
        <br>
        <button type="submit" class="btn btn-primary"><?= $accion ?></button>
    </form>

    <?php
    function vwInsert (string $nombre) {
        try {
            if (($id = insertPublisher($nombre)) !== false) {
                showMsg("Se ha creado una nueva editorial con la id $id", "success");
            } else {
                showMsg("Ha ocurrido un error y no ha podido crearse el registro", "danger");
            }
        } catch (Exception $e) {
            showMsg("Ha ocurrido un error inesperado", "danger");
        }
    }
    function vwUpdate (int $id, $nombre) {
        try {
            if (updatePublisher($id,$nombre)) {
                showMsg("Se ha modificado con exito", "success");
            } else {
                showMsg("Ha ocurrido un error y no se ha podido modifcar el registro", "danger");
            }
        } catch (Exception $e) {
            showMsg("Ha ocurrido un error inesperado", "danger");
        }
    }
    ?>
</body>

</html>