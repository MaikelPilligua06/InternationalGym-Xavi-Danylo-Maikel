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
        $this->id                   = $datos["id"] ?? null;
        $this->objetivo             = $datos["objetivo"] ?? null;
        $this->calorias             = $datos["calorias"] ?? null;
        $this->nombrePlato          = $datos["nombrePlato"] ?? null;
        $this->proteinas            = $datos["proteinas"] ?? null;
        $this->carbohidratos        = $datos["carbohidratos"] ?? null;
        $this->descripcion          = $datos["descripcion"] ?? null;
        $this->grasas               = $datos["grasas"] ?? null;
    }
}
