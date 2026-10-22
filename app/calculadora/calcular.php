<?php
function calcular($num1, $num2, $operador) {
    switch ($operador) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            if ($num2 == 0) return "Error: División por cero";
            return round(($num1 / $num2),2);
        default:
            return "Operador no válido";
    }
}

$op1 = $_POST["op1"];
$op2 = $_POST["op2"];
$op = $_POST["operador"];

$resultado = calcular($op1, $op2, $op);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>
<body>
<?php
echo "<h1>El resultado de $op1 $op $op2 es $resultado</h1>";
?>
</body>
</html>