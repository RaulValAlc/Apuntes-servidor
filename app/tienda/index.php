<?php
function get_form($productos) {
    $html = "";
    foreach ($productos as $nombre => $datos) {
        $html .= "<p>";
        $html .= "<label style='text-transform: capitalize;'>$nombre (Precio: {$datos['precio']}€) - Stock: {$datos['unidades']}: </label>";
        $html .= "<input type='number' name='cantidades[$nombre]' min='0' max='{$datos['unidades']}' value='0'>";
        $html .= "</p>";
    }
    return $html;
}

function get_invoice($productos) {
    $cantidades = $_POST['cantidades'] ?? [];
    $html = "<table border='1' cellpadding='5'>";
    $html .= "<tr><th>Producto</th><th>Cantidad</th><th>Precio Unid.</th><th>Total</th></tr>";

    $totalFactura = 0;
    foreach ($cantidades as $nombre => $cantidad) {
        $cantidad = (int)$cantidad;
        if ($cantidad > 0 && isset($productos[$nombre])) {
            $subtotal = $cantidad * $productos[$nombre]['precio'];
            $totalFactura += $subtotal;
            $html .= "<tr>
                        <td>$nombre</td>
                        <td>$cantidad</td>
                        <td>{$productos[$nombre]['precio']} €</td>
                        <td>" . number_format($subtotal, 2) . " €</td>
                      </tr>";
        }
    }

    $html .= "<tr><td colspan='3'><strong>Total a Pagar</strong></td><td><strong>" . number_format($totalFactura, 2) . " €</strong></td></tr>";
    $html .= "</table>";

    return $html;
}

function get_report($productos) {
    $cantidades = $_POST['cantidades'] ?? [];
    $html = "<ul>";
    foreach ($productos as $nombre => $datos) {
        $comprado = (int)($cantidades[$nombre] ?? 0);
        $stockRestante = $datos['unidades'] - $comprado;
        $html .= "<li><strong>$nombre</strong>: Comprados $comprado pcs. Quedan en stock: $stockRestante pcs.</li>";
    }
    $html .= "</ul>";
    return $html;
}

// LÓGICA PRINCIPAL

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
    <link rel="stylesheet" href="estilos.css">
    <title>Tienda</title>
</head>
<body class="tienda">

<?php if (isset($form)): ?>
    <fieldset>
        <legend>Productos disponibles</legend>
        <form action="index.php" method="post">
            <?= $form ?>
            <input type="submit" name="submit" value="Comprar">
        </form>
    </fieldset>

<?php else: ?>
    <h2>Factura</h2>
    <?= $invoice ?>

    <h2>Informe de Stock</h2>
    <?= $report ?>

    <p><a href="index.php" class="btn">Volver a comprar</a></p>

<?php endif; ?>

</body>
</html>