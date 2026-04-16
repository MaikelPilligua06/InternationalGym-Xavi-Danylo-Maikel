<?php
class Usuario
{
    public $id;

    public $nombreUsuario;
    public $apellido;
    public $numeroTelefono;
    public $correoElectronico;

    public $objetivo;

    public $altura;
    public $peso;

    public $entrenador;

    public function __construct($datos = [])
    {

        $this->id = $datos["id"] ?? null;
        $this->nombre = $datos["nombre"] ?? null;
        $this->apellido = $datos["apellido"] ?? null;
        $this->peso = $datos["peso"] ?? null;
        $this->numeroTelefono = $datos["numeroTelefono"] ?? null;
        $this->correoElectronico = $datos["correoElectronico"] ?? null;
        $this->objetivo = $datos["objetivo"] ?? null;
        $this->altura = $datos["altura"] ?? null;
        $this->entrenador = $datos["entrenador"] ?? null;

    }
}