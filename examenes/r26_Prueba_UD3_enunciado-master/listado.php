<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Cuentas – MiniBank</title>
</head>
<?php
require_once "util.php";
// if (Autentifica() == false) {
//     header("location: login.php");
// }
?>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">Mis cuentas</h2>



        <div class="mb-3">
            <a href="transferir.php" class="btn btn-primary">Nueva transferencia</a>
        </div>

        <?php if (empty($cuentas)): ?>
            <p>No tienes cuentas asociadas.</p>
        <?php else: ?>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Importe (€)</th>

                </tr>

                <!-- Completar aquí-->
                <?php
                $array_cuentas = getCuentasUsuario();
                foreach ($array_cuentas as $row){
                    echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['importe']}</td>
                    </tr>";
                }
                ?>
            </table>
        <?php endif; ?>

        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>

</body>

</html>