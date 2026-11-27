<?php

class Clave
{
    private $clave;

    public function __construct(string|null $n1, string|null $n2, string|null $n3, string|null $n4)
    {
        if ($n1 == null || $n2 == null || $n3 == null || $n4 == null) {
            $this->generarClave();
        } else {
            $this->clave[0] = $n1;
            $this->clave[1] = $n2;
            $this->clave[2] = $n3;
            $this->clave[3] = $n4;
        }
    }

    public function generarClave(): void
    {
        $colores = ["azul", "rojo", "naranja", "verde", "violeta", "amarillo", "marron", "rosa"];
        for ($i = 0; $i < 4; $i++) {
            $col = random_int(0, 7);
            if (!isset($this->clave[$colores[$col]])) {
                $this->clave[0] = $colores[$col];
            } else {
                $i--;
            }
        }
    }

    public function getClave(): array
    {
        return $this->clave;
    }

}