<?php 

echo "Introduce x:";
fscanf(STDIN, "%f", $x);

if ($x>0){
    printf("El número tiene signo positivo");
}elseif($x<0){
    printf("El número tiene signo negativo");
}else{
    printf("El número es nulo");
}

?>