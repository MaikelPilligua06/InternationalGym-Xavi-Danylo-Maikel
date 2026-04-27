<?php
class Usuario
{
    public $id;

    public $nombreUsuario;
    public $apellido;
    public $numeroTelefono;
    public $correoElectronico;

    public $objetivo;

    public $tipoDocumento;
    public $numeroDocumento;
    public $contrasenia;
    public $edad;
    public $genero;
    public $fechaDeAlta;
    public $foto;

    public $altura;
    public $peso;

    public $entrenador;

    public function __construct($datos = [])
    {

        $this->id = $datos["id"] ?? null;
        $this->nombreUsuario = $datos["nombre"] ?? null;
        $this->apellido = $datos["apellido"] ?? null;
        $this->peso = $datos["peso"] ?? null;
        $this->numeroTelefono = $datos["numeroTelefono"] ?? null;
        $this->tipoDocumento = $datos["tipoDocumento"] ?? null;
        $this->numeroDocumento = $datos["numeroDocumento"] ?? null;
        $this->correoElectronico = $datos["correoElectronico"] ?? null;
        $this->contrasenia = $datos["contrasenia"] ?? null;
        $this->edad = $datos["edad"] ?? null;
        $this->genero = $datos["genero"] ?? null;
        $this->fechaDeAlta = $datos["fechaDeAlta"] ?? null;
        $this->foto = $datos["foto"] ?? null;
        $this->objetivo = $datos["objetivo"] ?? null;
        $this->altura = $datos["altura"] ?? null;
        $this->entrenador = $datos["entrenador"] ?? null;

    }
}