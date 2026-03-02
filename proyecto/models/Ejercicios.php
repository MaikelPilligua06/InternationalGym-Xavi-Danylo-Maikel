<?php
class Ejercicios{
    public $id;
    public $nombre;
    public $series;
    public $repeticiones;
    public $peso;

    public function __construct($datos = []) {
        $this->id               = $datos["id"];
        $this->nombre           = $datos["nombre"];
        $this->descripcion      = $datos["descripcion"];
        $this->series           = $datos["series"];
        $this->repeticiones     = $datos["repeticiones"];
        $this->peso             = $datos["peso"];
    }
}
?>
