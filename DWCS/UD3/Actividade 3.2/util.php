<?php 
function getEditorial(){
    try{
        require_once "connection.php";
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM publishers");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }finally{
        $conn = null;
        $stmt = null;
    }
}

function showPublishers(array $data){
    if($data){
        echo "<table class='table'><tr><th>Id</th><th>Nombre</th></tr><tbody>";
        
        foreach($data as $fila){
            $id = htmlspecialchars($fila["publisher_id"], ENT_QUOTES | ENT_HTML5, "UTF-8");
            $nombre = htmlspecialchars($fila["name"], ENT_QUOTES | ENT_HTML5, "UTF-8");
            echo "<tr><td>{$id}</td><td>{$nombre}</td><td><button name=\"eliminar\" class=\"btn btn-primary mt-3\" value=\"Eliminar\">Eliminar</button></td></tr>";
        }
        echo "</tbody></table>";
    }
    else{
        showMsg("No se han encontrado editoriales", "primary");
    }
}

function showMsg(string $msg,string $claseCSS ){
    echo "<div class=\"alert alert-$claseCSS\" role=\"alert\">$msg</div>";
}

function insertPublisher(string $nombre){
try{
    require_once "connection.php";
    $con = getConnection();
        $con->beginTransaction();
    $stmt = $con->prepare("INSERT INTO publishers(name) VALUES(?)");

    $stmt->bindParam(1, $nombre);

    $stmt->execute();
    $con->commit();
    $id = $con->lastInsertId();
    return $id;
} catch(PDOException $e){
    $con -> rollBack();
    error_log("Ha ocurrido una excepción insertando en publishers: ". $e->getMessage());
    throw $e;
} finally{
        $con = null;
        $stmt = null;
}
}

function deletePublisher(int $id){
    try{
        require_once "connection.php";
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM publishers WHERE publisher_id=$id");
        $stmt->execute();
    }finally{
        $conn = null;
        $stmt = null;
    }
}
?>