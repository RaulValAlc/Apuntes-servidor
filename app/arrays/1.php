<?php
$notas = array_fill(0, 10, 0);

$inicializa = function () {
    return rand(1, 10);
};
$notas = array_map($inicializa, $notas);
var_dump($notas);
$min = min($notas);
$max = max($notas);
$size = sizeof($notas);
$cont = count($notas);
$total = array_sum($notas);
$avg = $total / $size;
var_dump("Media: " . $avg);
var_dump("Máxima: " . $max);
var_dump("Mínima: " . $min);
?>