<?php

$opcion = $_POST["submit"] ?? null;

switch ($opcion) {
    case "Enviar":
        $msj = "Has presionado Enviar";
        break;
    case "Primero":
        $msj = "Has presionado Primero";
        break;
    case "Imprimir":
        $msj = "Has presionado Imprimir";
        break;
    case "Saludar":
        $msj = "Has presionado Saludar";
        break;
    default:
        $msj = " Has ESCRITO EN LA URL";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularios</title>
</head>
<body>
<h1><?= $msj ?></h1>
<form action="index.php" method="post">
    <input type="submit" value="Enviar" name="submit">
    <input type="submit" value="Primero" name="submit">
    <input type="submit" value="Imprimir" name="submit">
    <input type="submit" value="Saludar" name="submit">


</form>
</body>
</html>

