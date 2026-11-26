<?php
session_start();
$nombre = $_SESSION["nombre"] ?? "";

// Si NO hay usuario en sesión ($nombre == ""), expulsamos al index
if ($nombre == "") {
    header("Location: index.php?mensaje=Debes de autenticarte");
    exit;
}

// El if() que se quedó a medias: cerrar sesión al pulsar el botón
if (isset($_POST['logout'])) {
    header("Location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sitio 1</title>
</head>
<body>
conectado como <?= $nombre ?>
<form action="sitio.php" method="POST" style="display:inline;">
    <input type="submit" name="logout" value="Cerrar sesión">
</form>
<hr />
<h1>Página sitio 1</h1>
<h1>Página sitio 1</h1>
<h1>Página sitio 1</h1>
<h1>Página sitio 1</h1>
<h1>Página sitio 1</h1>
</body>
</html>