<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./estilos/estilostv.css">
    <title>Cadenas televisivas</title>
</head>
<body>

<?php
$url = "https://raw.githubusercontent.com/MAlejandroR/json_tv/refs/heads/main/tv.json";
$content = file_get_contents($url);
$categorias = json_decode($content, true);

foreach ($categorias as $categoria) {
    echo "<details>";
    echo "  <summary> <span class='titulo-cadena'>{$categoria['name']}</span></summary>";

    echo "  <div class='canales'>";
    foreach ($categoria['channels'] as $canal) {
        $img = $canal['logo'];
        $name = $canal['name'];
        $url = $canal['web'];
        echo "    <a href='$url' target='_blank'>";
        echo "      <img src='$img' alt='$name' />";
        echo "    </a>";
    }
    echo "  </div>";
    echo "</details>";
}
?>

</body>
</html>
