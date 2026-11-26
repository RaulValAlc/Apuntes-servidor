<?php
session_start();
session_destroy();
session_start();

// Recogemos el mensaje si venimos redirigidos desde sitio.php sin autenticar
$mensaje = isset($_GET['mensaje']) ? htmlspecialchars($_GET['mensaje']) : "";

if (isset($_POST['submit'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $password = htmlspecialchars($_POST['password']);

    if ($nombre === $password && $nombre != "") {
        $_SESSION['nombre'] = $nombre;
        header("Location: sitio.php");
        exit;
    } else {
        $mensaje = "<span style='color:red'>Datos incorrectos</span>";
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
    <form action="index.php" method="POST">
        <legend>Datos de acceso</legend>
        Nombre <input type="text" name="nombre"> <br/>
        Password <input type="password" name="password"><br/>
        <input type="submit" value="Enviar" name="submit">
    </form>
    <?= $mensaje ?>
</fieldset>

</body>
</html>