<?php
class SesionesDeClases
{
    public $id;
    public $tipoDeClases;
    public $fechaClases;
    public $duracion;
    public $id_entrenador;

    public function __construct($datos = [])
    {

        $this->id = $datos["id"] ?? null;
        $this->tipoDeClases = $datos["tipoDeClases"] ?? null;
        $this->fechaClases = $datos["fechaClases"] ?? null;
        $this->duracion = $datos["duracion"] ?? null;
        $this->id_entrenador = $datos["id_entrenador"] ?? null;
    }
}