<?php
$d1 = 0;
$d2 = 0;
$d3 = 0;
$d4 = 0;
$d5 = 0;
$d6 = 0;
for ($n = 0; $n < 6000000; $n++) {
    $resultado = rand(1,6);
    switch ($resultado) {
        case 1:
            $d1++;
            break;
        case 2:
            $d2++;
            break;
        case 3:
            $d3++;
            break;
        case 4:
            $d4++;
            break;
        case 5:
            $d5++;
            break;
        case 6:
            $d6++;
            break;
    }
}
echo "<h1>1: " . $d1 . " 2: " . $d2 . " 3: " . $d3 . " 4: " . $d4 . " 5: " . $d5 . " 6: " . $d6 . "</h1>";
?>
