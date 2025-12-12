  <div class="float float-right d-inline-flex mt-2">
    <i class="fa fa-shopping-cart mr-2 fa-2x"></i>
    <?php
    if (isset($_SESSION['cesta'])) {
      // $suma = 0;
      // foreach ($_SESSION["cesta"] as $key => $value) {
      //   $suma += $value;
      // }
      $suma= array_sum($_SESSION["cesta"]);
      //$cantidad = count($_SESSION['cesta']);
      echo "<input type='text' disabled class='form-control mr-2 bg-transparent text-white' value='$suma' size='2px'>";
    } else {
      echo "<input type='text' disabled class='form-control mr-2 bg-transparent text-white' value='0' size='2px'>";
    }

    ?>
    <i class="fas fa-user mr-3 fa-2x"></i>
    <input type="text" size='10px' value="<?php echo $_SESSION['nombre']; ?>" class="form-control
    mr-2 bg-transparent text-white" disabled>
    <a href="cerrar.php" class="btn btn-warning mr-2">Salir</a>
  </div>