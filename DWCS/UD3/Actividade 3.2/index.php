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
    <a href="editor.php">Engadir unha editorial</a>

    <?php
    require_once "connection.php";
    try {
        $con = getConnection();
        $stmt = $con->prepare("SELECT *
        FROM publishers");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($array){
            echo "<table class=\"table\">";
            echo "<th>id</th>";
            echo "<th>Nome</th>";
            foreach($array as $row){
                echo "<tr><td>". htmlspecialchars($row['publisher_id'])."</td><td>". htmlspecialchars($row['name'])."</td></tr>";
            }
            echo "</table>";
        }
        else {
            echo "<div class=\"alert alert-primary\" role=\"alert\">No existe ninguna editorial</div>";
        }
    } catch (Exception $e) {
        error_log("Ha ocurrido una excepción". $e->getMessage());
        echo "<div class=\"alert\">Ha ocurrido un Error Inesperado</div>";
    }
    //Cerramos los recursos
    $con = null;
    $stmt = null;
    ?>
</body>

</html>