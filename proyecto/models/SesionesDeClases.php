<?php
class SesionesDeClases
{
    public $id;
    public $nombreClase;
    public $tipoDeClases;
    public $fechaClases;
    public $duracion;
    public $id_entrenador;
    public $descripcion;
    public $nombreEntrenador;


    public function __construct($datos = [])
    {

        $this->id = $datos["id"] ?? null;
        $this->nombreClase = $datos["nombre"] ?? null;
        $this->tipoDeClases = $datos["tipoDeClases"] ?? null;
        $this->fechaClases = $datos["fechaClases"] ?? null;
        $this->duracion = $datos["duracion"] ?? null;
        $this->id_entrenador = $datos["id_entrenador"] ?? null;
        $this->descripcion = $datos["descripcion"] ?? null;
        $this->nombreEntrenador = $datos["nombreEntrenador"] ?? null;
    }

}
