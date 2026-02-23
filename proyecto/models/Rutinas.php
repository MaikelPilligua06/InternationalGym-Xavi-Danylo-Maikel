<?php
class Rutinas{
    public $id_rutina;
    public $id_usuario;
    public $nombre_rutina;
    public $objetivo;

    public function __construct($datos = []) {
        $this->id               = $datos["id_rutina"];
        $this->id_usuario       = $datos["id_usuario"];
        $this->usuario_rutina    = $datos["usuario_rutina"];
        $this->objetivo         = $datos["objetivo"];
    }
}
?>