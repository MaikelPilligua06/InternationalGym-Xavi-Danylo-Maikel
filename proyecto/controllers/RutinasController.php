<?php
require_once "models/RutinasModel.php";

class RutinasController{
    public function redirectRutinas(){
        $rutinas = new RutinasModel();
        $ver = $rutinas->verRutinas($_SESSION['id']);
        require "views/rutinas_ver.php";
    }
    // funciones simplemente para redirigir a otras páginas
    public function redirectEntrenamiento(){
        $rutinas = new RutinasModel();
        $entrenamiento = $rutinas->verEntrenamiento($_SESSION['id']);
        require "views/entrnamientoUsuario.php";
    }
    public function rediretAlimentacion(){
        $alimentacion = new RutinasModel();
        $rutinaAlimentacion = $alimentacion->verAlimentacion($_SESSION['id']);
        require "views/alimentacionUsuario.php";
    }
    public function redirectObjetivo(){
        $verObjetivos = new RutinasModel();
        $objetivo = $verObjetivos->verObjetivo($_SESSION['id']);
        require "views/objetivoUsuario.php";
    }
}