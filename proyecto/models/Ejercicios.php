<?php
class Ejercicios{
    public $id;
    public $nombreEjercicio;
    public $foto;
    public $descripcion;
    public $calorias;


    public function __construct($datos = []) {
        $this->id               = $datos["id"];
        $this->nombreEjercicio  = $datos["nombreEjercicio"];
        $this->descripcion      = $datos["descripcion"];
        $this->foto             = $datos["foto"];
        $this->calorias          = $datos["calorias"];
    }
}
?>
