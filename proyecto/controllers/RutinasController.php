<?php
require_once "models/RutinasModel.php";

class RutinasController{
    public function redirectRutinas(){
        $id = $_SESSION['id'];
        $rutinas = new RutinasModel();
        $ver = $rutinas->verRutinas($id);
        require "views/Rutinas/rutinas_ver.php";
    }
    // funciones simplemente para redirigir a otras páginas
    public function redirectEntrenamiento(){
        $rutinas = new RutinasModel();
        $entrenamiento = $rutinas->verEntrenamiento($_SESSION['id']);
        require "views/Ejercicios/entrnamientoUsuario.php";
    }
    public function rediretAlimentacion(){
        $alimentacion = new RutinasModel();
        $rutinaAlimentacion = $alimentacion->verAlimentacion($_SESSION['id']);
        require "views/Alimentacion/alimentacionUsuario.php";
    }
    public function redirectObjetivo(){
        $verObjetivos = new RutinasModel();
        $objetivo = $verObjetivos->verObjetivo($_SESSION['id']);
        require "views/Objetivo/objetivoUsuario.php";
    }
}