<?php 

echo "Introduzca un entero\n";
fscanf(STDIN, "%d", $n);

$start = 0;
$end = $n;
if ($n<0){
    $start = $n;
    $end = 0;
}
$array = range($n,$end);

echo "<pre>";
print_r ($array);
echo "</pre>";
?>