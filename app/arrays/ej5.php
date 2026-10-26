<?php
    $url = ["https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTh6Q091bBYxQVKd1GbKO92CYwFL7amPhH3_DaOHAWYA&s=10",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrUlK7_DtaDfGMbUR5GKar3_26uk4bwJM98exbJkh9Mg&s=10",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQoE213R_8QXzAXnMascOc8FmpXe4hplnpPNqzJTxP3Bw&s=10",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQo_GF5vHBhdwFor9FPhCgQeXJVUi40kcdnF-NhdjPmRg&s=10",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeTBWbaeFygVMEzHHeKsAzu6vpD9-75qu3D-ZoqabOZg&s=10",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZPYSWmEzIbpz59Z7R94Hbwk9JGkRjmE8hdZBnzIITHA&s=10",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaIqJekUvjwBN_3paStpbER7KIwuKVzAfx3UnzF85GdQ&s=10",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR79qBvWnGXUJrvn7UXesfm9SmRge3v9mRuGlDVBT7gOg&s=10"];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="5">
    <title>Ejercicio 5</title>
</head>
<body>
<?php
    $posicion1 = rand(0,7);
    do {
        $posicion2 = rand(0, 7);
    }while ($posicion2 == $posicion1);
    do {
        $posicion3 = rand(0, 7);
    }while ($posicion3 == $posicion2 || $posicion3 == $posicion1);
    echo "<img src='".$url[$posicion1]."' alt='Imagen de patata 1'>";
    echo "<img src='".$url[$posicion2]."' alt='Imagen de patata 2'>";
    echo "<img src='".$url[$posicion3]."' alt='Imagen de patata 3'>";

?>
</body>
</html>
