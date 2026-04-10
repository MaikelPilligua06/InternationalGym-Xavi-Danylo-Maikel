<?php
require_once "models/EntrenadorModel.php";
class EntrenadorController{
    public function getAllEntrenadores(){
        $model = new EntrenadorModel();
        $entrenadores = $model->getAll();
        $usuario = $_SESSION["id"];
        $lista = ($usuario) ? $model->getUsuarioEntrenador($usuario) : [];
        require "views/Entrenadores/todosLosEntrenadores.php";
    }
    public function getEntrenadorUsuario(){

    }
    public function getSesionesEntrenador(){

    }
}