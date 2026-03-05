<?php

require_once "models/EjerciciosModel.php";

class EjerciciosController{
    public function listadoEjercicios(){
        $model = new EjerciciosModel();
        $ejercicio = $model->getAll();
        require "views/entrnamientoUsuario.php";
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