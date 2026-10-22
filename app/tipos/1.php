<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estiloBono.css">
    <title>BonoLoto</title>
</head>
<body>
<h1>Lotería Bonoloto</h1>
<fieldset>
    <legend>Numeros premiados:</legend>
    <?php
    $numeros = [];
    for ($i = 0; $i < 6; $i++) {
        $n = rand(1, 49);
        if (!in_array($n, $numeros)) {
            $numeros[$i] = $n;
            echo "<p class='bonoloto'>" . $n . "</p>";
        } else {
            $i--;
        }
    }
    ?>
</fieldset>
</body>
</html>