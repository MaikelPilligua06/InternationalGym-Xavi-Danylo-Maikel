<?php
require_once "models/Alimentacion.php";
class AlimentacionController{
    public function index(){
        $model = new AlimentacionModel();
        $usuario = $_SESSION['id'];
        $objetivo = $_SESSION['objetivo'];
        $alimentacion = $model->getAll($objetivo);
        $lista = ($usuario) ? $model->alimentacionUsuario($usuario) : [];
        require "views/alimentacionUsuario.php";
    }
}