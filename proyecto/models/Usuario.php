<?php
class Usuario
{
    public $id;

    public $nombre;
    public $apellido;
    public $numeroTelefono;
    public $correoElectronico;

    public $objetivo;

    public function __construct($datos = [])
    {

        $this->id = $datos["id"] ?? null;
        $this->nombre = $datos["nombre"] ?? null;
        $this->apellido = $datos["apellido"] ?? null;
        $this->numeroTelefono = $datos["numeroTelefono"] ?? null;
        $this->correoElectronico = $datos["correoElectronico"] ?? null;
        $this->objetivo = $datos["objetivo"] ?? null;

    }
}