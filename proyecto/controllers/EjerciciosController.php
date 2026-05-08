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
    public function verEjercicios(){
        $model = new EjerciciosModel();
        $ejercicio = $model->getAll();
        require "views/Ejercicios/getTodosLosEjercicios.php";
    }
    public function borrarEjercicioApp(){
        $model = new EjerciciosModel();
        $model->borrarEjercicio($_GET["id"]);
        header("Location: index.php?controller=Ejercicios&action=verEjercicios");
    }
    // Función para crear un ejercicio
    public function publicar(){
        if(!empty($_POST)){
            $datos = [
                'nombreEjercicio' => $_POST["nombreEjercicio"],
                'descripcion' => $_POST["descripcion"],
                'calorias' => $_POST["calorias"],
                'foto' => $_FILES["foto"]
            ];
        }
        $model = new EjerciciosModel();
        $ejercicio = new Ejercicios($datos);
        $model->publicarEjercicio($ejercicio);
        header("Location: index.php?controller=Ejercicios&action=listadoEjercicios");
        exit;
    }
    public function getEjerciciosActualizar()
    {
        $model = new EjerciciosModel();
        $ejercicios = $model->getById($_GET["id"]);
        require 'views/Ejercicios/ejerciciosUpdate.php';
    }
    public function actualizarEjercicio(){
        if (!empty($_POST)) {
            $ejercicio = new Ejercicios($_POST);
            $model = new EjerciciosModel();
            $ejercicio->foto = $_POST['foto_actual'];
            $model->update($_GET['id'], $ejercicio);

            header("Location: index.php?controller=Sesiones&action=misPublicaciones");
            exit;
        }
    }
}
