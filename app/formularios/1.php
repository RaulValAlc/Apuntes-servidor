<?php
$nombre = trim($_POST['Nombre'] ?? '');
$usuarios = $_POST['usuarios'] ?? [];
if (isset($_POST['submit']) && $nombre !== '') {
    if (array_key_exists($nombre, $usuarios)) {
        $usuarios[$nombre]++;
    } else {
        $usuarios[$nombre] = 1;
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador con Arreglo Asociativo</title>
</head>
<body>

<form action="" method="POST">
    <label for="nombre">Nombre de usuario:</label><br>
    <input type="text" name="Nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>" required><br><br>
    <?php foreach ($usuarios as $user => $clics): ?>
        <input type="hidden" name="usuarios[<?= htmlspecialchars($user) ?>]" value="<?= $clics ?>">
    <?php endforeach; ?>

    <input type="submit" name="submit" value="Acceder / Sumar Clic">
</form>

<hr>

<h3>Contenido del arreglo asociativo (Usuarios y Clics):</h3>

<?php if (!empty($usuarios)): ?>
    <ul>
        <?php foreach ($usuarios as $user => $clics): ?>
            <?php $plural = ($clics === 1) ? "" : "s"; ?>
            <li>
                <strong><?= htmlspecialchars($user) ?></strong>: <?= $clics ?> clic<?= $plural ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No hay datos guardados aún.</p>
<?php endif; ?>

</body>
</html>