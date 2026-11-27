<?php
require_once './class/Producto.php';
session_start();
$nombre = $_SESSION['usuario'] ?? "";
if ($nombre === "") {
    header('Location: login.php?mensaje="Acceso denegado. Inicia Sesion"');
    exit;
}
if (isset($_GET['eliminar'])) {
    unset($_SESSION['carrito'][$_GET['eliminar']]);
    header('Location: panel.php');
    exit;
}
$mensaje = "";
if (isset($_POST['submit'])) {
    $nombreProducto = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    if ($nombreProducto === "" || $precio == "" || $precio == 0 || $cantidad == "" || $cantidad == 0) {
        $mensaje = "Se deben rellenar todos los campos";
    } else {
        if (isset($_SESSION['carrito'][$nombreProducto])) {
            $_SESSION['carrito'][$nombreProducto]->añadirCantidad($cantidad);
        } else {
            $_SESSION['carrito'][$nombreProducto] = new Producto($nombreProducto, (float)$precio, (int)$cantidad);
        }
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel de inventario</title>
    <style>
        table {
            border-collapse: collapse; /* Une los bordes dobles en una sola línea limpia */
            width: 60%;                /* Mismo ancho que el fieldset */
            margin: 20px auto;         /* Centra la tabla horizontalmente en la página */
        }
        th, td {
            border: 1px solid black;   /* Borde para cada celda */
            padding: 8px;              /* Espacio interior para que no quede apretado */
            text-align: center;        /* Centra el texto dentro de cada celda */
        }
        th {
            background-color: antiquewhite; /* A juego con el fondo del formulario */
        }
    </style>
</head>
<body>
<h1> Bienvenido <?= $nombre ?></h1>
<form action="login.php" method="POST" style="display:inline;">
    <input type="submit" name="logout" value="Cerrar sesión">
</form>
<hr/>
<form action="" method="POST">
    <fieldset style="margin:10%;background-color: antiquewhite;width:60%;border: solid blue">
        <legend>Introducir producto</legend>
        Nombre <input type="text" name="nombre"> <br/>
        Precio <input type="number" min="1" name="precio"><br/>
        Cantidad <input type="number" min="1" name="cantidad"><br/>
        <input type="submit" value="Enviar" name="submit">
        <h3><?= $mensaje ?></h3>
    </fieldset>
</form>
<table>
    <tr>
        <th>Producto</th>
        <th>Precio unitario</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
    </tr>
    <?php
    $total = 0;
    foreach ($_SESSION['carrito'] as $prod) {
        echo "<tr>";
        echo "<td>" . $prod->getNombre() . "</td>";
        echo "<td>" . $prod->getPrecio() . "</td>";
        echo "<td>" . $prod->getCantidad() . "</td>";
        echo "<td>" . $prod->getSubtotal() . "</td>";
        echo "<td><a href='panel.php?eliminar=" . urlencode($prod->getNombre()) . "'>Eliminar</a></td>";
        $total += $prod->getSubtotal();
        echo "</tr>";
    }
    echo "<tr> ";
    echo "<td > Total: " . $total . " </td > ";
    echo "</tr> ";
    ?>
</table>
</body>
</html>


