<?php

function get_form($productos)
{
    $html = "<form method='post' action=''>";
    foreach ($productos as $nombre => $producto) {
        $html .= "<label>Producto: " . $nombre . " - Quedan: " . $producto['unidades'] . " unidades a " . $producto['precio'] . "€ cada una. </label>";
        $html .= "<input type='number' name='cantidades[" . $nombre . "]' value='0' min='0'><br>    ";
    }
    $html .= "<input type='submit' name='submit' value='Comprar'><br>";
    $html .= "</form>";
    return $html;
}

function get_invoice(&$productos)
{
    $cantidades = $_POST["cantidades"] ?? [];
    $html = "";
    $total = 0;
    foreach ($cantidades as $nombre => $cantidad) {
        if ($cantidad > 0) {
            $precio = $cantidad * $productos[$nombre]['precio'];
            $total += $precio;
            $html .= $nombre . " x " . $cantidad . " = " . $precio . "$<br>";
            $productos[$nombre]['unidades'] = $productos[$nombre]['unidades'] - $cantidad;
        }
    }
    $html .= "Total: $total $";
    return $html;
}

function get_report($productos)
{
    $html = "";
    foreach ($productos as $nombre => $datos) {
            $html .= $nombre . " quedan: " . $datos['unidades'] . " unidades<br>";
    }
    return $html;
}

$productos = [
        'lechuga' => ['unidades' => 200, 'precio' => 0.90],
        'tomates' => ['unidades' => 2000, 'precio' => 2.15],
        'cebollas' => ['unidades' => 3200, 'precio' => 0.49],
        'fresas' => ['unidades' => 4800, 'precio' => 4.50],
        'manzanas' => ['unidades' => 2500, 'precio' => 2.10],
];

$opcion = $_POST["submit"] ?? null;

switch ($opcion) {
    case 'Comprar':
        $invoice = get_invoice($productos);
        $report = get_report($productos);
        break;
    default:
        $form = get_form($productos);
}

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilos.css">
    <title>Tienda</title>
</head>
<body class="tienda">

<?php if (isset($form)): ?>
    <fieldset>
        <legend>Productos disponibles</legend>
            <?= $form ?>
    </fieldset>

<?php else: ?>
    <h1>Detalles de la compra</h1>
    <?= $invoice ?>

    <h2>Stock restante</h2>
    <?= $report ?>

<?php endif; ?>

</body>
</html>
