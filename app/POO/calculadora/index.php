<?php

if (isset($_POST['submit'])) {
    $carga = fn($clase) => require_once("./class/$clase.php");

    spl_autoload_register($carga);
}
    $op1= new Racional( htmlspecialchars($_POST['op1']) );
    $op2= new Racional( htmlspecialchars($_POST['op1']) );
    $operador = htmlspecialchars($_POST['operador']);
    $rtdo = match ($operador) {
        '+' => $op1->sumar($op2),
        '-' => $op1->restar($op2),
        '*' => $op1->multiplicar($op2),
        '/' => $op1->dividir($op2),
    };
    $msj = "$op1 $operador ";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="POST">
    <fieldset style="margin:10%;background-color: antiquewhite;width:60%;border: solid blue">
        <legend>Calculadora</legend>
        <input type="text" value=<?=$op1??"">
        <input type="submit" value="Enviar" name="submit">
    </fieldset>
    <?=$mensaje?>
</form>
</body>
</html>



