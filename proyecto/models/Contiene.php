<?php
class Contiene{
    public $id_rutina;
    public $id_ejercicio;
    public $id_alimentacion;

    public function __construct($datos = []) {
        $this->id_rutina           = $datos["id_rutina"];
        $this->id_ejercicio          = $datos["id_ejercicio"];
        $this->id_alimentacion       = $datos["id_alimentacion"];
    }
}
