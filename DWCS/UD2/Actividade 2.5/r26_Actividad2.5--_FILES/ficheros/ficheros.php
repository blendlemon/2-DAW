<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body><div class="container">
    
        <h1>Formulario con ficheros</h1>
        <form  method="post" enctype="multipart/form-data">
    
    
            <div class="mb-3"><label class="form-label" for="ficheros">Adjunte uno o varios ficheros (Solo se aceptan imágenes: jpg, png, etc.):</label>
                <!-- MAX_FILE_SIZE must precede the file input field, but it is not reliable -->
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                <input type="file" name="ficheros" id="ficheros"  accept="image/*"  class="form-control" >
            </div>
    
            <div ><input type="submit" value="Enviar" class="btn btn-primary"></div>
    
        </form>
</div>


<?php







/*
Estructura del array recibido en el servidor, en caso de múltiples ficheros:

Array(["nombre_input"] =>   Array (
							["name"] => Array(
											[0] => nombre_fichero_0.ext
											[1] => nombre_fichero_1.ext	
											...
											),
							["type"] => Array(
											[0] => tipo_fichero_0
											[1] => tipo_fichero_1
											....
											),
							["tmp_name"] => Array(
											[0] => C:\xampp\tmp\algo_0.tmp
											[1] => C:\xampp\tmp\algo_1.tmp
											....
											), 
							["error"] => Array(
											[0] =>Código de error fichero_0 https://www.php.net/manual/en/features.file-upload.errors.php
											[1] =>Código de error fichero_1
											....
											), 
							["size"] => Array(
											[0] => tamaño en bytes
											[1] => tamaño en bytes
											....
                                            ),
                                            // a partir de PHP 8.1.0
                            ["full_path"] => Array(
											[0] => ruta enviada por el navegador del fichero 0
											[1] => ruta enviada por el navegador del fichero 1
											....
											)                

							)
	)

*/
?>

</body>

</html>
