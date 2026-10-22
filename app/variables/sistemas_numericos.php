<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de PHP en HTML</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <div class="box">
        <h2>Tabla de diferentes sistemas numéricos</h2>
        <ul>
            <li>Decimal</li>
            <li>Binario</li>
            <li>Octal</li>
            <li>Hexadecimal</li>
        </ul>
    </div>

    <!-- Sección para el resultado de PHP -->
    <div class="box">
        <h2>Resultado</h2>
        <hr>
        <table border="solid 1px">
            <tr>
                <th>Decimal</th>
                <th>Binario</th>
                <th>Octal</th>
                <th>Hexadecimal</th>
                <th>Ascii</th>
                <th>Carácter</th>
            </tr>
       <?php
            for($i = 0; $i <= 15; $i++){
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>".decbin($i)."</td>";
                echo "<td>".decoct($i)."</td>";
                echo "<td>".dechex($i)."</td>";
                $texto = (string)$i;
                $longitud = strlen($texto);
                echo "<td>";
                for ($n = 0; $n < $longitud; $n++) {
                    echo ord($texto[$n]) . " ";
                }
                echo "</td>";
                printf("<td>%c</td>", $i);
                echo "</tr>";
            }
       ?>
        </table>
    </div>

</div>
</body>
</html>