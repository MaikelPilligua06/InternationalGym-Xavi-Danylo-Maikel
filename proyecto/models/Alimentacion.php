<?php
class Alimentacion{
    public $id;
    public $objetivo;
    public $calorias;
    public $nombrePlato;
    public $proteinas;
    public $carbohidratos;
    public $descripcion;
    public $grasas;
    public function __construct($datos = []) {
        $this->id                   = $datos["$id"];
        $this->objetivo             = $datos["$objetivo"];
        $this->calorias             = $datos["$calorias"];
        $this->nombrePlato          = $datos["$nombrePlato"];
        $this->proteinas            = $datos["$proteinas"];
        $this->carbohidratos        = $datos["$carbohidratos"];
        $this->descripcion          = $datos["$descripcion"];
        $this->grasas               = $datos["$grasas"];
    }
}
