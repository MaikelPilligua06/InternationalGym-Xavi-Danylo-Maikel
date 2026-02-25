<?php
class SesionesDeClases{
    public $id;
    public $tipoDeClases;
    public $fechaClases;
    public $duracion;
    public $id_entrenador;

    public function __construct($datos = []) {
        $this->id               = $datos["id"];
        $this->tipoDeClases     = $datos["tipoDeClases"];
        $this->fehcaClases      = $datos["fechaClases"];
        $this->duracion         = $datos["duracion"];
        $this->id_entrenador    = $datos["id_entrenador"];
    }
}
?>