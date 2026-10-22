<?php

$mes = rand(1,12);

$dias = match ($mes) {
    1,3,5,7,8,10,12=>"31",
    4,6,9,11=>30,
    2=>"29 o 28",
    default=>"error"
};

echo "<h1>El mes $mes tiene $dias dias</h1>";