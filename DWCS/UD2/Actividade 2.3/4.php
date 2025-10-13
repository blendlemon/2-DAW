<?php 

// echo "Numero entero positivo entre 1 y 10";
// fscanf(STDIN, "%d", $n);
$n = 2;
$array = array();

if ($n>0 && $n<11){
for ($i=0;$i<=10;$i++){

    $array["$n"."x"."$i"]=$n*$i;
}

echo "<pre>";
print_r ($array);
echo "</pre>";
}
?> 