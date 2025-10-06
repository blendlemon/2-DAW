<?php 

fscanf(STDIN, "%d", $n);

$entero = $n/2;
for($i=$entero; $i>=2; $i--){
    if ($n%$i==0){
        printf("%d\n",$i);
    }
}

?>