<?php
require_once './class/Producto.php';
session_start();
$nombre = $_SESSION['nombre'];
if (!isset($_SESSION['nombre']) || $nombre = "") {
    header('Location: index.php?mensaje="Acceso denegado. Inicia Sesion"');
    exit;
}


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
<h1>Bienvenido <?= $nombre ?></h1>
<form action="login.php" method="POST" style="display:inline;">
    <input type="submit" name="logout" value="Cerrar sesión">
</form>
<hr />

</body>
</html>


