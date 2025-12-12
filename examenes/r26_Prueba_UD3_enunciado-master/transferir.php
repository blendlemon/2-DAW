<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Transferir – MiniBank</title>
</head>

<body class="bg-light">

    <div class="container mt-5">

        <h2 class="mb-4">Transferencia bancaria</h2>


       

        <form action="" method="POST" class="card p-4 shadow-sm">

            <div class="mb-3">
                <label class="form-label">Cuenta origen</label>
                <select name="cuenta_origen" class="form-select" required>
                    <!-- Cambiar el for por un foreach que recorra las cuentas del usuario y las muestre -->
                    <?php
                    require_once "util.php";
                    $array_cuentas = getCuentasUsuario();
                    foreach($array_cuentas as $row) {?>
                        <option value="<?= $row?>">
                            Cuenta <?=$row["id"]?> <?= $row["importe"] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Cuenta destino (ID)</label>
                <input type="number" class="form-control" name="cuenta_destino" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Importe (€)</label>
                <input type="number" step="0.01" class="form-control" name="importe" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Transferir</button>
        </form>

        <a href="listado.php" class="btn btn-secondary mt-3">Volver</a>
    </div>

    <?php
    if(isset($_POST)){
        $origen = $_POST["cuenta_origen"];
        $destino = $_POST["cuenta_destino"];
        $destino = compruebaCuenta($destino);
        $importe = $_POST["importe"];
        if($destino){
            if($origen["importe"]>= $importe){
                
            }
        }

    } 
    ?>

</body>

</html>