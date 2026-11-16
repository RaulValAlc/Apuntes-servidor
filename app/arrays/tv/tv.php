<?php
require_once "controlador.php";
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
<form action="tv.php" method="POST">
    <h1>Canales de TV</h1>
    <select name="categorias" id="">
        <?=$opciones?>
    </select>
    <input type="submit" value="Ver Canales" name="submit">
</form>
<?=$images??""?>

</body>
</html>
