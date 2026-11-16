<?php

$carga = fn($clase)=>require_once ("./class/$clase.php");

spl_autoload_register($carga);

try {
    $r1 = new Racional();
    $r2 = new Racional(6);
    $r3 = new Racional(7,6);
    $r4 = new Racional("9/87");
    $r5 = new Racional("31");
    echo "<h1>$r1+$r2</h1>";
}catch (Exception $e){
    echo "Error ".$e->getMessage();
}
echo "<h1>$r1</h1>";
echo "<h1>$r2</h1>";
echo "<h1>$r3</h1>";
echo "<h1>$r4</h1>";
echo "<h1>$r5</h1>";

$op1 = new Operacion ("5344/7");  // + - * /
$op2 = new Operacion (5,545645,"*");



echo "<h1>$op1</h1>";
echo "<h1>$op2</h1>";




