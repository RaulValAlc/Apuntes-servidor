<?php
session_start();
if(isset($_POST['submit']) && isset($_POST['logout'])){
    session_destroy();
    session_start();
}
$usuariosValidos = [
        'pedro' => '1234',
        'paco' => 'admin',
        'pepita' => '4321'
];
$mensaje = isset($_GET['mensaje']) ? htmlspecialchars($_GET['mensaje']) : "";
if (isset($_SESSION["usuario"])) {
    header("location: panel.php");
    exit;
}

if (isset($_POST['submit'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $password = htmlspecialchars($_POST['password']);
    if ($nombre === "" || $password === "") {
        $mensaje = "No ha ingresado todos los campos";
    } elseif (isset($usuariosValidos[$nombre]) && $password === $usuariosValidos[$nombre]) {
        $_SESSION["usuario"] = $nombre;
        $_SESSION["carrito"] = [];
        header("Location: panel.php");
        exit;
    } else {
        $mensaje = "Datos erroneos";
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

<fieldset style="margin:10%;background-color: antiquewhite;width:60%;border: solid blue">
    <form action="login.php" method="POST">
        <legend>Datos de acceso</legend>
        Nombre <input type="text" name="nombre"> <br/>
        Password <input type="password" name="password"><br/>
        <input type="submit" value="Enviar" name="submit">
    </form>
    <?= $mensaje ?>
</fieldset>

</body>
</html>


