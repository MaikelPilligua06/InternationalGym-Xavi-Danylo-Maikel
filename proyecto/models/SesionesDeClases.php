<?php
class SesionesDeClases
{
    public $id;
    public $nombre;
    public $tipoDeClases;
    public $fechaClases;
    public $duracion;
    public $id_entrenador;
    public $descripcion;

    public function __construct($datos = [])
    {

        $this->id = $datos["id"] ?? null;
        $this->nombre = $datos["nombre"] ?? null;
        $this->tipoDeClases = $datos["tipoDeClases"] ?? null;
        $this->fechaClases = $datos["fechaClases"] ?? null;
        $this->duracion = $datos["duracion"] ?? null;
        $this->id_entrenador = $datos["id_entrenador"] ?? null;
        $this->descripcion = $datos["descripcion"] ?? null;
    }
}
