<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class = "container">
        <form method="post">
            <label for="nombre" class="form-label"></label>
            <input id="nombre" type ="text" class="form-control" name = "nombre" required>

            <button name="crear" class="btn btn-primary mt-3" value="Crear">Crear</button>
        </form>
    </div>

    <?php
    require_once 'util.php';
    if (isset($_POST["nombre"])) {
        try {
            $nombre = $_POST["nombre"];
            $id = insertPublisher($nombre);
            if ( $id!== false) {
                showMsg("se ha creado una nueva editorial con id: $id", "success");
            } else {
                showMsg("Ha ocurrido un error y no ha podido crearse el registro", "danger");
            }
        }catch(PDOException $e){
            error_log("Ha ocurrido error inesperado: ". $e->getMessage());
        }
    }
    ?>
</body>
</html>