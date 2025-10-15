<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Zodiaco</title>
    </head>
    <body>

        <?php
        const CAPRICORNIO = "Capricornio";
        const ACUARIO = "Acuario";
        const PISCIS = "Piscis";
        const ARIES = "Aries";
        const TAURO = "Tauro";
        const GEMINIS = "Géminis";
        const CANCER = "Cáncer";
        const LEO = "Leo";
        const VIRGO = "Virgo";
        const LIBRA = "Libra";
        const ESCORPIO = "Escorpio";
        const SAGITARIO = "Sagitario";

        //Las claves del día de corte van incluídas. Por ejemplo: los nacidos hasta el 20/01 son capricornio
        $zodiaco = array(
            //enero  
            1 => array(20 => CAPRICORNIO,
                "else" => ACUARIO),
            //febrero
            2 => array(19 => ACUARIO,
                "else" => PISCIS),
            //marzo
            3 => array(20 => PISCIS,
                "else" => ARIES),
            //abril
            4 => array(19 => ARIES,
                "else" => TAURO),
            //mayo
            5 => array(20 => TAURO,
                "else" => GEMINIS),
            //junio
            6 => array(20 => GEMINIS,
                "else" => CANCER),
            //julio
            7 => array(22 => CANCER,
                "else" => LEO),
            //agosto
            8 => array(22 => LEO,
                "else" => VIRGO),
            //septiembre
            9 => array(22 => VIRGO,
                "else" => LIBRA),
            //octubre
            10 => array(22 => LIBRA,
                "else" => ESCORPIO),
                //completar aquí...
            //noviembre
            11 => array(21 => ESCORPIO,
                "else" => SAGITARIO),
            //diciembre
            12 => array(21 => SAGITARIO,
                "else" => CAPRICORNIO)
        );
        ?>
        <form  method="post" >

            Selecciona tu día y mes de nacimiento:

            <p>
                <label for="dia">Día:</label>
                <select name="dia" id="dia" required>
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        $selected = (isset($_POST['dia']) && $_POST['dia'] !== null && $_POST['dia'] == $i) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>


                <label for="mes">Mes</label>
                <select name="mes" id="mes" required>
                    <?php
                    $meses = array(
                        1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril",
                        5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto",
                        9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"
                    );
                    
                    foreach ($meses as $valor => $nombre) {
                        $selected = (isset($_POST['mes']) && $_POST['mes'] !== null && $_POST['mes'] == $valor) ? 'selected' : '';
                        echo "<option value='$valor' $selected>$nombre</option>";
                    }
                    ?>
                </select>



            </p>


            <p>
                <input type="submit" value="Enviar" />
            </p>



        </form>




    </body>
</html>