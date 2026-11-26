<?php
require_once "./vendor/autoload.php";

use Utilidades\A;
use Utilidades\B;
use Utilidades\Views\C;
use Utilidades\Controllers\D;
use Utilidades\Controllers\E;
use Utilidades\Controllers\F as F_controll;
use Utilidades\Models\G;
use Utilidades\Models\F;
use Utilidades\Models\J;

use Stichoza\GoogleTranslate\GoogleTranslate;
$translate = new GoogleTranslate("en","esp");
ob_start();
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
<h1>Hola como estás</h1>
<h2>Esto son frases en otro idioma:</h2>
</body>
</html>
<?php

$contenido = ob_get_clean();
echo $translate->translate($contenido);


?>


