<?php

class Producto
{
    private string $nombre;
    private float $precio;
    private int $cantidad;

    public function __construct(string $nombre, float $precio, int $cantidad)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;

    }
    public function getSubtotal(): float
    {
        return $this->precio * $this->cantidad;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getPrecio(): float
    {
        return $this->precio;
    }
    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function añadirCantidad(int $n){
        $this->cantidad += $n;
    }

}