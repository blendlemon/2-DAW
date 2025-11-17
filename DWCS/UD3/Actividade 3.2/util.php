<?php 
function getEditorial(){
    try{
        require_once "connection.php";
        $con = getconnection();
        $stmt = $con->prepare("SELECT * FROM publishers");
        $stmt->execute();
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }finally{
        $con = null;
        $stmt = null;
    }
}
function getPublisherById(int $id){
    try{
        require_once "connection.php";
        $con = getconnection();
        $stmt = $con->prepare("SELECT * FROM publishers WHERE publisher_id=?");
        $stmt->bindValue(1, $id);

        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }finally{
        $con = null;
        $stmt = null;
    }
}

function showPublishers(array $data){
    if($data){
        echo "<table class='table'><tr><th>Id</th><th>Nombre</th></tr><tbody>";
        
        foreach($data as $fila){
            $id = htmlspecialchars($fila["publisher_id"], ENT_QUOTES | ENT_HTML5, "UTF-8");
            $nombre = htmlspecialchars($fila["name"], ENT_QUOTES | ENT_HTML5, "UTF-8");
            echo "<tr><td>{$id}</td><td>{$nombre}</td>";

            echo '<td> <form action="edit_editor.php" method="GET" class="d-inline">';

            echo "<input type=\"hidden\" name=\"id\" value=\"{$id}\">";

            echo '<button type="submit" class="btn btn-primary mx-1">Editar</button>';

            echo '</form>';

            echo '<form action="index.php" method="POST" class="d-inline" onsubmit="return confirm(\'¿Eliminar esta editorial con id '.$id.' ?\');">';

            echo "<input type=\"hidden\" name=\"id\" value=\"{$id}\">";

            echo '<button type="submit" name="accion" value="borrar" class="btn btn-danger">Eliminar</button>';

            echo '</form>';

            echo '</td>';

            echo '</tr>';
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
    $con = getconnection();
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
        $con = getconnection();
        $stmt = $con->prepare("DELETE FROM publishers WHERE publisher_id=?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $con->commit();
    }catch(PDOException $e){
        $con->rollBack();
        error_log("Ha ocurrido un error borrando publishers: " . $e->getMessage());
        throw $e;
    }finally{
        $con = null;
        $stmt = null;
    }
}

function updatePublisher (int $id, string $new_name){
    try{
        require_once "connection.php";
        $con = getconnection();
        $stmt = $con->prepare("UPDATE publishers SET name=? WHERE publisher_id=?");
        $stmt->bindParam(1, $new_name);
        $stmt->bindValue(2, $id);
        $stmt->execute();
        return $con->commit();
    }catch(PDOException $e){
        error_log("Ha ocurrido un error actualizando publishers: " . $e->getMessage());
        throw $e ;
    }finally{
        $con = null;
        $stmt = null;
    }
}
?>