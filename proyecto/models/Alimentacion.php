<?php
class Alimentacion{
    public $id_Alimentacion;
    public $objetivo;
    public $id_usuario;
    public $calorias;
    public $nombrePlato;
    public $proteinas;
    public $carbohidratos;
    public $grasas;
    public function __construct($datos = []) {
        $this->id_Alimentacion      = $datos["id_Alimentacion"];
        $this->objetivo             = $datos["objetivo"];
        $this->id_usuario           = $datos["id_usuario"];
        $this->calorias             = $datos["calorias"];
        $this->nombrePlato          = $datos["nombrePlato"];
        $this->proteinas            = $datos["proteinas"];
        $this->carbohidratos        = $datos["carbohidratos"];
        $this->grasas               = $datos["grasas"];

    }
}
