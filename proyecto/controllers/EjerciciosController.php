<?php

require "models/Ejercicios.php";

class EjerciciosController{
    public function listadoEjercicios(){

    }
    public function addEjercicio(){
        $model = new EjerciciosModel();
        $ejercicio = new Ejercicios($datos);
        $model->guardar($ejercicio);
        header("Location: index.php?controller=Ejercicios&action=listadoEjercicios");
        exit();

    }
    public function infoEjercicio(){
        $model = new EjerciciosModel();
        $ejercicios = $model->getById($_SESSION["id"]);
        require "views/ejercicios_ver.php";
    }
}