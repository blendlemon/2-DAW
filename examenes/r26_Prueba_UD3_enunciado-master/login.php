<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Acceso a MiniBank</title>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center mb-4">MiniBank</h3>



                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Acceder</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    require_once "util.php";
    if (isset($_POST)) {
        try {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $array_usuario = getUsuario($email);
            if (!empty($array_usuario)) {
                //if (password_verify($pass, $array_usuario["password"] ) ){
                echo "<div class='alert alert-success' role='alert'>Login correcto</div>";
                session_start();
                $_SESSION["user_id"] = $array_usuario["id"];
                if (isset($_COOKIE["vistoPubli"])) {
                    header('location: listado.php');
                } else {
                    header('location: publi.php');
                }

                //}else{
                //    echo "<div class='alert alert-danger' role='alert'>Email o contraseña no válido2</div>";
                //}
            } else {
                echo "<div class='alert alert-danger' role='alert'>Email o contraseña no válido</div>";
            }
        } catch (Exception $e) {
            error_log("Ha ocurrido una excepción" . $e->getMessage());
        }
    }
    ?>

</body>

</html>