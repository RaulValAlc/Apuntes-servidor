<?php

function get_form($productos){
    $html = "<form method='post' action=''>";
    foreach ($productos as $nombre => $producto) {
        $html .= "<label input type='number' value=" . $nombre . " Quedan: " . $producto['unidades'] . " unidades a " . $producto['precio'] . " cada una></label></br>";
        $html .= "<input type='number' name=" . $nombre . "></input></br>";
    }
    $html .= "<input type='submit' value='Comprar'></input></br>";
    return $html;
}

function get_invoice($productos){

}

function get_report($productos){

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
    <link rel="stylesheet" href="estilos.css">
    <title>Tienda</title>
</head>
<body class="tienda">

<?php if (isset($form)): ?>
    <fieldset>
        <legend>Productos disponibles</legend>
        <form action="index2.php" method="post">
            <?= $form ?>
        </form>
    </fieldset>

<?php else: ?>
    <h1>Detalles de la compra</h1>
    <?= $invoice ?>

    <h2>Stock restante</h2>
    <?= $report ?>

<?php endif; ?>

</body>
</html>
