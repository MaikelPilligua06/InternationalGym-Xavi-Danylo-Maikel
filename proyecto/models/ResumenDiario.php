<?php
class ResumenDiario{
    public $id_resumen;
    public $id_usuario;
    public $fecha;
    public $entrenamientosRealizados;
    public $caloriasConsumidas;
    public $notas;

    public function __construct($datos = []) {
        $this->id_resumen                       = $datos["id_resumen"];
        $this->id_usuario                       = $datos["id_usuario"];
        $this->fecha                            = $datos["fecha"];
        $this->entrenamientosRealizados          = $datos["entrenamientosRealizados"];
        $this->caloriasConsumidas               = $datos["caloriasConsumidas"];
        $this->notas                            = $datos["notas"];
    }
}
?>