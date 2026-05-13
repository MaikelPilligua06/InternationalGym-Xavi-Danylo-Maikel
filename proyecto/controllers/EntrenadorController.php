<?php
require_once "models/EntrenadorModel.php";
require_once "models/SesionesModel.php";
class EntrenadorController{
    public function getAllEntrenadores(){
        try {
            $model = new EntrenadorModel();
            $entrenadores = $model->getAll();
            $usuario = $_SESSION['id'] ?? null;
            $lista = ($usuario) ? $model->getUsuarioEntrenador($usuario) : [];
            require "views/Entrenadores/todosLosEntrenadores.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function getEntrenador(){
        try{
            $model = new EntrenadorModel();
            $entrenador = $model->verEntrenador($_GET['id']);
            $sesiones = $model->verSesiones($_GET['id']);
            require "views/Entrenadores/entrenadorDatos.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function apuntarme(){
        try {
            $usuario = $_SESSION['id'] ?? null;
            $model = new SesionesModel();
            $sesion = $model->asignarSesion($_GET['id'], $usuario);
            header("Location: index.php?controller=Entrenador&action=getEntrenador");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function cambiarEntrenador() {
        try {
            $usuario = $_SESSION['id'];
            $model = new EntrenadorModel();
            $model->updateEntrenador($_GET['id'], $usuario);
            $_SESSION['mensaje'] = "Entrenador cambiado correctamente";
            header("Location: index.php?controller=Entrenador&action=getEntrenador&id=" . $_GET['id']);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
}