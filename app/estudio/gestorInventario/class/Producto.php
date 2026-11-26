<?php

class Producto
{
    private string $nombre;
    private float $precio;
    private int $cantidad;

    public function __construct(string|null $nombre = null, float|null $precio = 0, int|null $cantidad = 0)
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

}