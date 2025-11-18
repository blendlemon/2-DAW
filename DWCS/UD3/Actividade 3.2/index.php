<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
</head>
<body>
    <div class="container">
        <h1>Listado de editoriais</h1>
        <a href="edit_editor.php">Añadir editorial</a>
    </div>
    <?php
        require_once "util.php";
         if (isset($_POST["accion"])){
            $accion = $_POST["accion"];
            if($accion=="borrar"){
            $id = $_POST["id"] ?? 0;
            if($id > 0){
                try{
                    deletePublisher($id);
                }catch (Exception $e) {
                    showMsg("Ha ocurrido un herror inesperado", "danger");
                }
            }
            }
         }
        $data = getEditorial();
        showPublishers($data);

        echo "<table>";

    ?>
</body>
</html>