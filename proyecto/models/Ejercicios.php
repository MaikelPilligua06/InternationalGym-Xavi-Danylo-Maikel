<?php
class Ejercicios{
    public $id_ejercicio;
    public $nombre;
    public $series;
    public $repeticiones;
    public $peso;

    public function __construct($datos = []) {
        $this->id_ejercicio     = $datos["id_ejercicio"];
        $this->nombre           = $datos["nombre"];
        $this->series           = $datos["series"];
        $this->repeticiones     = $datos["repeticiones"];
        $this->peso             = $datos["peso"];
    }
}
?>
