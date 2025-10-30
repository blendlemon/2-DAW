<?php 

echo "Introduce un entero: ";

fscanf(STDIN, "%d", $n);

$suma=0;

for($i=1; $i<=(2*$n-1); $i+=2){

    $suma += $i;
    echo "$i\n";
}

printf("%d",$suma);
?>