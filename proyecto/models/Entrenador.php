<?php
class Entrenador{
    public $id;
    public $nombreEntrenador;
    public $apellido;
    public $numeroTelefono;
    public $correoElectronico;
    public $disponibilidadHoraria;
    public $descripcion;


    public function __construct($datos = []) {
        $this->id                       = $datos["id"] ?? null;
        $this->nombreEntrenador         = $datos["nombre"] ?? null;
        $this->apellido                 = $datos["apellido"] ?? null;
        $this->numeroTelefono           = $datos["numeroTelefono"] ?? null;
        $this->correoElectronico        = $datos["correoElectronico"] ?? null;
        $this->disponibilidadHoraria    = $datos["disponibilidadHoraria"] ?? null;
        $this->descripcion              = $datos["descripcion"] ?? null;
    }
}
