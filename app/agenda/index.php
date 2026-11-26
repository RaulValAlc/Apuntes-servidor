<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once __DIR__ . "/vendor/autoload.php";

use Stichoza\GoogleTranslate\GoogleTranslate;

$traductor = new GoogleTranslate("en", "es");
$traductor->preserveParameters("#<[^>]+>#");

$idioma = $_GET["idioma"]??"es";

$nombre = trim($_POST["nombre"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$agenda = isset($_POST["agenda"]) ? unserialize($_POST["agenda"]) : [];
$mensajeError = "";

function procesarContacto($nombre, $telefono, &$agenda): string
{
    if ($nombre === "") {
        return "Debe ingresar el nombre del contacto.";
    }
    if ($telefono !== "" && !is_numeric($telefono)) {
        return "El teléfono debe ser un número.";
    }
    if ($telefono === "" && !isset($agenda[$nombre])) {
        return "El teléfono está vacío y el nombre no existe en la agenda.";
    }

    if (isset($agenda[$nombre])) {
        if ($telefono === "") {
            unset($agenda[$nombre]);
        } else {
            $agenda[$nombre] = $telefono;
        }
    } else {
        if ($telefono !== "") {
            $agenda[$nombre] = $telefono;
        }
    }

    return "";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = $_POST['submit'] ?? '';

    if ($accion == 'Eliminar contactos') {
        $agenda = [];
    } elseif ($accion == 'Añadir contacto') {
        $mensajeError = procesarContacto($nombre, $telefono, $agenda);
    }
}
ob_start();
?>

    <!DOCTYPE HTML>
    <html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="/css/style.css" type="text/css">
        <script src='https://unpkg.com/vue'></script>
        <title> Agenda de contactos</title>
    </head>
    <header>

    </header>
    <body>

    <?php if (!empty($agenda)) {
        echo "<ul>";
        foreach ($agenda as $nombre => $telefono) {
            echo "<li>$nombre: $telefono</li> <br />\n";
        }
        echo "</ul>";
    }
    ?>

    <fieldset>
        <legend>Nuevo Contacto</legend>
        <form action="" method="post">
            <br>
            <label for="nombre">Nombre</label><input type="text" name="nombre" size="15"/><br/>
            <label for="telefono">Teléfono</label><input type="text" name="telefono" size="15"/><br/>
            <button class="boton" type="submit" name="submit" value="Añadir contacto">Añadir contacto</button>
            <button class="boton" type="submit" name="submit" value="Eliminar contactos" <?php echo empty($agenda) ? 'disabled' : ''; ?>>Eliminar contactos</button>
            <input type="hidden" name="agenda" value='<?php echo htmlspecialchars(serialize($agenda)); ?>'>
        </form>
        <div class="mensaje">
            <?php
            echo "<p>" . $mensajeError . "</p>";
            ?>
        </div>
    </fieldset>
    <div style="clear:both ">


        <hr/>
    </div>

    </body>

    </html>
<?php
$traductor->setTarget($idioma);
$contenido = ob_get_clean();

$contenido = $traductor->translate($contenido);
echo $contenido;
?>