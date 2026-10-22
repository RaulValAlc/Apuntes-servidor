<?php
$e = 5;
switch (true){
    case($e < 3):
        echo "<h1>bebe</h1>";
        break;
    case($e >= 3 && $e < 11):
        echo "<h1>niño</h1>";
        break;
    case($e >= 11 && $e < 17):
        echo "<h1>adolescente</h1>";
        break;
    case($e >= 17 && $e < 25):
        echo "<h1>disfruta la vida</h1>";
        break;
    case($e >= 25 && $e < 60):
        echo "<h1>responsabilidades</h1>";
        break;
    case($e >= 60 && $e < 90):
        echo "<h1>descansar</h1>";
        break;
    case($e >= 90):
        echo "<h1>suertudo</h1>";
        break;
}



/*
if($e < 3){
    echo "<h1>bebe</h1>";
}else{
    if($e < 11){
        echo "<h1>niño</h1>";
    }else{
        if($e < 17){
            echo "<h1>adolescente</h1>";
        }else{
            if($e < 25){
                echo "<h1>disfruta la vida</h1>";
            }else{
                if($e < 60){
                    echo "<h1>responsabilidades</h1>";
                }else{
                    if($e < 90){
                        echo "<h1>descansar</h1>";
                    }else{
                        echo "<h1>suertudo</h1>";
                    }
                }
            }
        }
    }
}
*/

