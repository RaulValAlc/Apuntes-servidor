<?php

class Operacion
{

    private int|string $op1;
    private int $op2;
    private string $operador;

    public function __construct(int|string $op1, int|null $op2 = null, string|null $operador = null)
    {
        if (is_string($op1)) {
            $this->operador = $this->get_operador($op1);
            var_dump($this);

            $this->op1 = substr($op1, 0, strpos($op1, $this->operador));
            var_dump($this);

            $this->op2 = (int)substr($op1, strpos($op1, $this->operador)-1);
            var_dump($this);

        } else {
            $this->op1 = $op1;
            $this->op2 = $op2;
            $this->operador = $operador;
        }
    }

    private function get_operador(string $operacion)
    {
        if (strpos($operacion, "+")) {
         return "+";
        }
        if (strpos($operacion, "-")) {
            return "-";
        }
        if (strpos($operacion, "*")) {
            return "*";
        }
        if (strpos($operacion, "/")) {
            return "/";
        }
    }

    public function __toString(){
        return "$this->op1 $this->operador $this->op2";
    }


}

