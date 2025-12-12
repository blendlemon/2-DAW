<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Promoción especial MiniBank</title>
</head>
<?php
require_once "util.php";
// if(Autentifica()){
//     setcookie("vistoPubli", "", time() + (3600 * 24));
// }else{
//     header("location: login.php");
// }  
?>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow-sm">
        <h2>¡Nueva promoción MiniBank!</h2>
        <p>
            Contrata nuestro depósito al <strong>3% TAE</strong> a 3 meses.<br>
            Importe máximo: <strong>30.000 €</strong>.
        </p>

        <a href="listado.php" class="btn btn-primary">Continuar</a>
    </div>
</div>

</body>
</html>
