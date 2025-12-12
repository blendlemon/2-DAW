<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de editoriais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>Listado de editoriais</h1>
    <a href="edit_editor.php">Engadir unha editorial</a>

    <?php
    require_once "utils.php";

    if (isset($_POST["accion"])) {
            $accion = $_POST["accion"];
            if ($accion == "borrar") {
                $id = $_POST["id"] ?? 0;
                if ($id > 0) {
                    try {
                        $eliminado = deletePublisher($id);
                        if($eliminado){
                            showMsg("Se ha eliminado la editorial correctamente", "success");
                        }
                        else{
                            showMsg("Ha ocurrido un error y no se ha  podido eliminar la editorial", "danger");
                        }
                    } catch (Exception $e) {
                        showMsg("Ha ocurrido un error inesperado", "danger");
                    }
                }
            }
        }
    try {
        showPublishers(getPublishers());
    } catch (Exception $e) {
        error_log("Ha ocurrido una excepción". $e->getMessage());
        showMsg("Ha ocurrido un error inesperado", "danger");
    }
    ?>
</body>

</html>