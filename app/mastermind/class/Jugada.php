<?php

class Jugada
{
    private $clave;
    private $correctas;
    private $movidas;

    public function __construct(Clave $cl,array $correctas){
        $this->clave = $cl;
        $this->correctas = $correctas[0];
        $this->movidas = $correctas[1];
    }

}