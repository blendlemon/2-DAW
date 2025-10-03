<?php 

echo "Introduce A, B y C";
list($A, $B, $C) = fscanf(STDIN, "%f %f %f");

$D = ($B**2) - 4*$A*$C;
$AA = $A * 2;

if ($D>=0){
    $DD = sqrt($D);
    $x1 = (-$B+$DD)/$AA;
    $x2 = (-$B-$DD)/$AA;

    printf("La ecuación tiene raíces reales: %.2f, %.2f", $x1,$x2);
}else{
    $DD = sqrt(-$D);
    $Re = -$B/$AA;
    $Im = $DD/($AA);
    printf("La ecuación tiene raíces complejas conjugadas:\nParte real: %.2f\nParte imaginaria: %2.f", $Re, $Im);
}
?>