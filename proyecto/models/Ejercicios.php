<?php
class Ejercicios{
    public $id;
    public $nombreEjercicio;
    public $series;
    public $repeticiones;
    public $peso;
    public $descripcion;


    public function __construct($datos = []) {
        $this->id               = $datos["id"];
        $this->nombreEjercicio  = $datos["nombre"];
        $this->descripcion      = $datos["descripcion"];
        $this->series           = $datos["series"];
        $this->repeticiones     = $datos["repeticiones"];
        $this->peso             = $datos["peso"];
    }
}
?>
