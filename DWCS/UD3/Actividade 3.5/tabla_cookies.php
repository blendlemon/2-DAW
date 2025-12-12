<?php

if (isset($_POST["eliminar"])) {
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, "", time() - 3600);
    }
    header('location: cookies.php');
    exit;
}


if (!empty($_COOKIE)) {
?>
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Valor</th>
        </tr>
        <?php

        foreach ($_COOKIE as $nombre => $valor) {

            echo "<tr> <td>$nombre </td> <td>$valor</td></tr>";
        }
        ?>

    </table>

    <form action="" method="post">
        <button class="btn btn-secondary" name="eliminar"> Eliminar cookies</button>
    </form>
<?php


}

?>