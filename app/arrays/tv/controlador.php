<?php
$url ="https://raw.githubusercontent.com/MAlejandroR/json_tv/refs/heads/main/tv.json";
$content = file_get_contents($url);
$categorias = json_decode($content, true);

$opciones="";

if (isset($_POST['submit'])){
    $posicion_categoria = $_POST["categorias"]??"";
    $categoria = $categorias[$posicion_categoria]['channels'];
    $images ="";
    foreach ($categoria as $canal) {
        $img = $canal['logo'];
        $url = $canal['web'];
        $name = $canal['name'];
        $images .= "<a href='$url'><img src='$img' alt='$name' ></a>";
    }
}

foreach ($categorias as $pos => $canales) {
    $checked = (isset($posicion_categoria) && $pos == $posicion_categoria) ? "selected" : "";
    $opciones .=  "<option  $checked value='$pos'>{$canales['name']}</option>\n";
}