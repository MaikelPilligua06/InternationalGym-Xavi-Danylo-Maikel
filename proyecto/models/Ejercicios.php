<?php
class Ejercicios{
    public $id;
    public $nombreEjercicio;
    public $foto;
    public $descripcion;
    public $calorias;


    public function __construct($datos = []) {
        $this->id               = $datos["id"] ?? null;
        $this->nombreEjercicio  = $datos["nombreEjercicio"] ?? null;
        $this->descripcion      = $datos["descripcion"] ?? null;
        $this->foto             = $datos["foto"] ?? null;
        $this->calorias         = $datos["calorias"] ?? null;
    }
}
?>
