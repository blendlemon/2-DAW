<?php
const PULGADAS_CM= 2.54;
const PIES_PULGADAS = 12;
echo "Ingresa la altura en cm ";

fscanf(STDIN,"%f", $altura);

$pulgadas = $altura / PULGADAS_CM;
$pies = $pulgadas / PIES_PULGADAS;

printf ("La altura en pulgadas es %.2f \n", $pulgadas);
printf ("La altura en pies es %.2f\n", $pies);

?>