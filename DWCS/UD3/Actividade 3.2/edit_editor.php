<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
    require_once 'util.php';
$name = "";
$id = 0;
$accion = "Crear";
    if($_SERVER["REQUEST_METHOD"]== "GET"){
        $id = $_GET["id"] ?? 0;
        if($id>0){
        $accion = "Editar";
            $fila = getPublisherById($id);
            $name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, "UTF-8");
        }
    }
    ?>

<body>
    <div class = "container">
        <h1><?= $accion ?></h1>
        <form method="post">
            <label for="nombre" class="form-label"></label>
            <input id="nombre" type ="text" class="form-control" name = "nombre" value="<?= $name ?>" required>
            <?php
                if($id>0){
                echo "<input type='hidden' name='id' value='$id'/>";
                }
            ?>

            <button name="<?= $accion?>" class="btn btn-primary mt-3" value="<?= $accion?>"><?= $accion?></button>
        </form>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"] ?? 0;
    if ($id > 0) {
        if (isset($_POST["nombre"])) {
            $nombre = $_POST['nombre'];
            updatePublisher($id,$nombre);
        }else {
            insertPublisher($nombre);
        }
    }
} ?>
    </div>
</body>
</html>