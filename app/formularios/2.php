<?php
$usuario = $_POST['nombre'] ?? "";
$usuarios = $_POST['usuarios'] ?? [];
$contenido = "";
if ($usuario != "") {
    if (!isset($usuarios[$usuario])) {
        $usuarios[$usuario] = 0;
    }
    $usuarios[$usuario]++;
}
foreach ($usuarios as $nombre => $clics) {
    $contenido .= "<li>" . $nombre . ": " . $clics . " clicks </li> <br>\n";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clics</title>
</head>
<body>
<p>Nombre de usuario: </p>
<?php
echo "<form action='2.php' method='post'>";
echo "<input type='text' name='nombre' value='$usuario'> <input type='submit' name='submit' value='Sumar clic'> <br />";
foreach ($usuarios as $nombre => $clics) {
    echo "<input type='hidden' name='usuarios[$nombre]' value='$clics'>";
}
echo "</form>";
?>
<hr>
<h3>Usuarios y clics:</h3>
<ul>
    <?php
    echo $contenido;
    ?>
</ul>
</body>
</html>
