<?php
require_once "conexion.php";

function getUsuario($email)
{
    try {
        $con = getConnection();
        $stmt = $con->prepare("SELECT *
        FROM usuarios
        WHERE email = ?
        ");
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    } catch (PDOException $e) {
        error_log("Ha ocurrido una excepcion en getUsuario");
    } finally {
        $con = null;
        $stmt = null;
    }
}

function Autentifica (){
    $autentificado = false;
    if(session_status()==PHP_SESSION_ACTIVE && isset($_SESSION["user"])){
        $autentificado = true;
    }
    return $autentificado;
}

function getCuentasUsuario(){
    try{
        $con = getConnection();
        $titular_id = $_SESSION["user_id"];
        $titular_id = "1"; 
        $stmt = $con->prepare("SELECT * FROM cuentas WHERE titular_id = ?");
        $stmt->bindParam(1, $titular_id);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }catch(PDOException $e){
        error_log("Ha ocurrido una excepcion en getCuentasUsuario" . $e->getMessage());
    }finally {
        $con = null;
        $stmt = null;
    }
}

function compruebaCuenta(int $cuenta){
    try {
        $con = getConnection();
        $stmt = $con->prepare("SELECT *
        FROM cuentas
        WHERE id = ?
        ");
        $stmt->bindParam(1, $cuenta);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    } catch (PDOException $e) {
        error_log("Ha ocurrido una excepcion en compruebaCuenta");
    } finally {
        $con = null;
        $stmt = null;
    }
}
function Transfiere($origen, $destino, $importe){
    try {
        $con = getConnection();
        $id_origen = $origen["id"];
        $id_destino = $destino["id"];
        $importe_origen = $origen["importe"] - $importe;
        $importe_destino = $destino["importe"] + $importe;
        $stmt = $con->prepare("UPDATE cuentas(importe)  
        ");
        $stmt->bindParam(1, $cuenta);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    } catch (PDOException $e) {
        error_log("Ha ocurrido una excepcion en compruebaCuenta");
    } finally {
        $con = null;
        $stmt = null;
    }
}