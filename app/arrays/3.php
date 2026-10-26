<?php

$notas = array_fill(0,10,0);
$inicializa = fn()=>rand(1,10);
$notas = array_map($inicializa, $notas);
$contador = 1;
foreach ($notas as $nota ) {
    echo "<h1>Nota : ".$nota." en la posicion: ".$contador."</h1>";
    $contador++;
}

?>
