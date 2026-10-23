<?php
$numeros = [];
for ($n = 1; $n <= 100; $n++) {
    $numeros[] = $n;
}
$multiplo_5 = function ($n) {
    return $n % 5 == 0;
};
$multiplo = array_filter($numeros, $multiplo_5);
$multiplicar = function ($acumulado, $n) {
    return $acumulado * $n;
};
$mult_total = array_reduce($numeros, fn($acumulador, $multiplo) => $acumulador * $numero, 0);
var_dump($mult_total);
?>