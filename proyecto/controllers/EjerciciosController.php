<?php

require_once "models/EjerciciosModel.php";

class EjerciciosController{
    public function listadoEjercicios() {
        $model = new EjerciciosModel();
        $usuarioId = $_SESSION['id'];
        $ejercicio = $model->getAll();
        $lista = ($usuarioId) ? $model->informacionUsuario($usuarioId) : [];
        require "views/Ejercicios/entrnamientoUsuario.php";
    }

    public function addEjercicio(){
        $model = new EjerciciosModel();
        $usuario = $_SESSION['id'];
        $model->guardar($_GET['id'], $usuario);
        header("Location: index.php?controller=Ejercicios&action=listadoEjercicios");
        exit();

    }
    public function infoEjercicio(){
        $model = new EjerciciosModel();
        $ejercicios = $model->getById($_GET["id"]);
        require "views/Ejercicios/ejercicios_ver.php";
    }
    public function eliminarEjercicio(){
        $model = new EjerciciosModel();
        $model->delete($_GET["id"]);
        header("Location: index.php?controller=Ejercicios&action=listadoEjercicios");
        exit;
    }
}
