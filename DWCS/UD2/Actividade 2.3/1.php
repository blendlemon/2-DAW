<?php 

const HORA_EXTRA = 12.5;
$horas_extra = [3, 0, 4, 1.5, 0, 0, 0];

// foreach($horas_extra as $value){
//     $total_horas_extra += $value;
// }

$total_horas_extra = array_sum($horas_extra);
$paga_extra = $total_horas_extra * HORA_EXTRA;

echo "La paga extra es $paga_extra"

?>