<?php
$size = mt_rand(1,6);
$rojo = mt_rand(0,255);
$red = dechex($rojo);
if ($red < 16) {
    $red = "0" . $red;
}
$green = mt_rand(1,99);
$blue = mt_rand(1,99);
$color = $red . $green . $blue;
echo "<h".$size." style='color:#".$color."'>Esto es un titulo en color #".$color."</h".$size.">";
?>

