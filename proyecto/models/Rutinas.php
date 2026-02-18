<?php
class Rutinas{
    public $id;
    public $nombre_rutina;
    public $objetivo;
    public $usuario_rutina;
    public $recomendacion;

    public function __construct($datos = []) {
        $this->id               = $datos['id'];
        $this->nombre_rutina    = $datos["nombre_rutina"];
        $this->objetivo         = $datos["objetivo"];
        $this->usuario_rutia    = $datos["usuario_rutina"];
        $this->recomendacion    = $datos["recomendacion"];
    }
}
?>