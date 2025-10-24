<?php
// --- Lista de productos ---
$productos = [
    0 => ["nome" => "Teclado", "prezo" => 25, "cantidade" => 2],
    1 => ["nome" => "Rato", "prezo" => 15, "cantidade" => 1],
    2 => ["nome" => "Pantalla", "prezo" => 120, "cantidade" => 1]
];

// incluir utilidades (funcións para subtotal, desconto, total e resumo)
require_once __DIR__ . '/util.php';

// preparar variable para o resumo
$summaryHtml = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['calcular_total'])) {
    $summaryHtml = showSummary($productos);
}







?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="p-5">

    <h2>O meu carrito</h2>
    <form method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio (€)</th>
                    <th>Cantidade</th>
                    <!-- <th>Acción</th> -->
                    <th>Subtotal (€)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $id => $p): ?>
                    <tr>
                        <td><?= $p['nome'] ?></td>
                        <td><?= number_format($p['prezo'], 2) ?></td>
                        <td><?= $p['cantidade'] ?></td>
                        <!-- <td>
                <button type="submit" name="incrementar" value="<?= $id ?>" class="btn btn-sm btn-primary">+</button>
            </td> -->
                        <td><?= number_format($p['prezo'] * $p['cantidade'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button type="submit" name="calcular_total" class="btn btn-success">Calcular Total</button>
    </form>
    </form>

    <?php
    // Mostrar o resumo xenerado por showSummary()
    if (!empty($summaryHtml)) {
        echo $summaryHtml;
    }
    ?>
   

</body>

</html>