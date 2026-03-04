<?php
require_once "models/RutinasModel.php";

class RutinasController{
    // funciones simplemente para redirigir a otras páginas
    public function redirectEntrenamiento(){
        $rutinas = new RutinasModel();
        $entrenamiento = $rutinas->verEntrenamiento();
        require "views/entrnamientoUsuario.php";
    }
    public function rediretAlimentacion(){
        $alimentacion = new RutinasModel();
        $rutinaAlimentacion = $alimentacion->verAlimentacion($_POST['id']);
        require "views/alimentacionUsuario.php";
    }
    public function redirectObjetivo(){
        $verObjetivos = new RutinasModel();
        $objetivo = $verObjetivos->verObjetivo($_POST['id']);
        require "views/objetivoUsuario.php";
    }
}