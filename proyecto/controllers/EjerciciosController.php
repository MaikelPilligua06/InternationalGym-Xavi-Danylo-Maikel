<?php

require_once "models/EjerciciosModel.php";

class EjerciciosController{
    // Función para obtener la vista donde se muestran los ejercicios y listado
    public function listadoEjercicios() {
        $model = new EjerciciosModel();
        $usuarioId = $_SESSION['id'];
        $ejercicio = $model->getAll();
        $lista = ($usuarioId) ? $model->informacionUsuario($usuarioId) : [];
        require "views/Ejercicios/entrnamientoUsuario.php";
    }
    // Función para añadir un ejercicio
    public function addEjercicio(){
        $model = new EjerciciosModel();
        $usuario = $_SESSION['id'];
        $model->guardar($_GET['id'], $usuario);
        header("Location: index.php?controller=Ejercicios&action=listadoEjercicios");
        exit();

    }
    // Función para ver la informacion de un ejercicio
    public function infoEjercicio(){
        $model = new EjerciciosModel();
        $ejercicios = $model->getById($_GET["id"]);
        require "views/Ejercicios/ejercicios_ver.php";
    }

    // Función para eliminar el ejercicio del usuario
    public function eliminarEjercicio(){
        $model = new EjerciciosModel();
        $model->delete($_GET["id"]);
        header("Location: index.php?controller=Ejercicios&action=listadoEjercicios");
        exit;
    }
    // Función para añadir ejercicio admin
    public function agregarEjercicio(){
        $model = new EjerciciosModel();
        require "views/Ejercicios/ejercicios_agregar.php";
    }
}
