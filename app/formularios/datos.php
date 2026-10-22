<?php
// leer datos del formulario

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$mayor = false;
if($edad >= 18){
    $mayor = true;
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
    <h1>Estoy en datos</h1>
    <h2>Tu nombre es <?=$nombre?></h2>
    <?php
    if($mayor){
        echo '<h2 style="color:green">Bienvenido a la web</h2>';
    }else{
        echo '<h2 style="color:red">No tienes permiso para estar aquí</h2>';
    }
    ?>
</body>
</html>
