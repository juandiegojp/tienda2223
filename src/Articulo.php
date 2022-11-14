<?php

class Articulo
{
    public $id;
    public $codigo;
    public $descripcion;
    public $precio;
    
    public function __construct($id, $codigo, $descripcion, $precio)
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }

    public function existe(int $id, )
}
