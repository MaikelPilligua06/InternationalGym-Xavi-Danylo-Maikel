<?php
class Rutinas{
    public $id_rutina;
    public $id_usuario;
    public $nombre_rutina;
    public $objetivo;
    public $fecha_inicio;
    public $fechaTiempo;

    public function __construct($datos = []) {
        $this->id_rutina           = $datos["id_rutina"];
        $this->id_usuario          = $datos["id_usuario"];
        $this->nombre_rutina       = $datos["nombre_rutina"];
        $this->objetivo            = $datos["objetivo"];
        $this->fecha_inicio        = $datos["fecha_inicio"];
        $this->fechaTiempo         = $datos["fechaTiempo"];

    }
}
?>
