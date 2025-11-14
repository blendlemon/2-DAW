<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
</head>
<body>

    <h1>Listado de editoriais</h1>
    <a href="add_editor.php">Añadir editorial</a>
    <?php
        
        require_once "util.php";
            
        $data = getEditorial();
        showPublishers($data);

        echo "<table>";

    ?>
</body>
</html>