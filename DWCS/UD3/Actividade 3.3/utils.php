<?php
require_once "connection.php";
function getPublishers(): array
{
    try {
        $con = getConnection();
        $stmt = $con->prepare("SELECT *
        FROM publishers");
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log("Ha ocurrido una excepción obteniendo publishers" . $e->getMessage());
        throw $e;
    } finally {
        $con = null;
        $stmt = null;
        return $array;
    }
}

function showPublishers(array $publishers): void
{
    if ($publishers) {
        echo "<table class=\"table\">";
        echo "<th>id</th>";
        echo "<th>Nome</th>";
        foreach ($publishers as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['publisher_id']) . "</td><td>" . htmlspecialchars($row['name']) . "</td>";
            echo '<td> <form action="edit_editor.php" method="GET" class="d-inline">';

            echo "<input type=\"hidden\" name=\"id\" value=\"{$row['publisher_id']}\">";

            echo '<button type="submit" class="btn btn-primary mx-1">Editar</button>';

            echo '</form>';

            echo '<form action="index.php" method="POST" class="d-inline" onsubmit="return confirm(\'¿Eliminar esta editorial con id '.$row['publisher_id'].' ?\');">';

            echo "<input type=\"hidden\" name=\"id\" value=\"{$row['publisher_id']}\">";

            echo '<button type="submit" name="accion" value="borrar" class="btn btn-danger">Eliminar</button>';

            echo '</form>';

            echo '</td>';

            echo '</tr>';
        }
        echo "</table>";
    } else {
        showMsg("No existe ninguna editorial", "primary");
    }
}

function showMsg(string $msg, string $cssClass)
{
    echo "<div class=\"alert alert-$cssClass\" role=\"alert\">$msg</div>";
}

function insertPublisher(string $nombre): bool | string
{
    try {
        $con = getConnection();
        $con->beginTransaction();
        $stmt = $con->prepare("INSERT INTO publishers(name) VALUES(?)");
        $stmt->bindParam(1, $nombre);
        $stmt->execute();
        $id = $con->lastInsertId();
        $con->commit();
        return $id;
    } catch (PDOException $e) {
        error_log("Ha ocurrido una excepción en insertPublisher" . $e->getMessage());
        $con->rollBack();
        throw $e;
    } finally {
        $con = null;
        $stmt = null;
    }
}

function deletePublisher(int $id)
{
    try {
        $con = getConnection();
        $con->beginTransaction();
        $stmt = $con->prepare("DELETE FROM publishers
        WHERE publisher_id = ?
        ");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $con->commit();
    } catch (PDOException $e) {
        $con->rollBack();
        error_log("Ocurrió una excepción en delete publisher" . $e->getMessage());
    } finally {
        $con = null;
        $stmt = null;
    }
}
function updatePublisher(int $id, string $new_name)
{
    try {
        $con = getConnection();
        $stmt = $con->prepare("UPDATE publishers SET
        name = ?
        WHERE publisher_id = ?
        ");
        $stmt->bindParam(1, $new_name);
        $stmt->bindParam(2, $id);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Ocurrió una excepción en  updatePublisher" . $e->getMessage());
        throw $e;
    } finally {
        $con = null;
        $stmt = null;
    }
}

function getPublisherById (int $id){
    try{
        $con = getConnection();
        $stmt = $con->prepare("SELECT *
        FROM publishers
        WHERE publisher_id = ?
        ");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }catch(PDOException $e){
        showMsg("Ha ocurrido una excepción en getPublisherById", "danger");
        throw $e;
    }finally{
        $con = null;
        $stmt = null;
    }
}
