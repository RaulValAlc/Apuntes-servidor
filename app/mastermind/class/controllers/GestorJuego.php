<?php

class GestorJuego
{


    public function validarClave($cl1, $cl2): boolean //$cl1 es la clave correcta y $cl2 la de la jugada
    {
        $valido = true;
        $cl1 = $cl1->getClave();
        $cl2 = $cl2->getClave();
        for ($i = 0; $i < 4; $i++) {
            if ($cl1[$i] != $cl2[$i]) {
                $valido = false;
            }
        }
        return $valido;
    }

    public function comporbarAciertos($cl1, $cl2): array //$cl1 es la clave correcta y $cl2 la de la jugada
    {
        $aciertos[0] = 0; // Aciertos exactos
        $aciertos[1] = 0; // Aciertos movidos de sitio
        $cl1 = $cl1->getClave();
        $cl2 = $cl2->getClave();
        for ($i = 0; $i < 4; $i++) {
            if ($cl1[$i] == $cl2[$i]) {
                $aciertos[0]++; // Posicion exacta
            } else {
                if (isset($cl1[$cl2[$i]])) {
                    $aciertos[1]++;
                }
            }
        }
        return $aciertos;
    }

}