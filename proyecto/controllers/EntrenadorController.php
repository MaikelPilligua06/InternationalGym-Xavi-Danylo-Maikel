<?php
require_once "models/EntrenadorModel.php";
require_once "models/SesionesModel.php";

class EntrenadorController {

    public function getAllEntrenadores() {
        try {
            $model = new EntrenadorModel();
            $entrenadores = $model->getAll();
            $usuario = $_SESSION['id'] ?? null;
            $lista = $usuario ? $model->getUsuarioEntrenador($usuario) : [];
            require "views/Entrenadores/todosLosEntrenadores.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    public function getEntrenador() {
        try {
            $id = $_GET['id'] ?? null;
            if (!$id) {
                header("Location: index.php?controller=Entrenador&action=getAllEntrenadores");
                exit;
            }
            $model = new EntrenadorModel();
            $entrenador = $model->verEntrenador($id);
            $sesiones = $model->verSesiones($id);
            require "views/Entrenadores/entrenadorDatos.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    public function apuntarme() {
        try {
            $id = $_GET['id'] ?? null;
            $usuario = $_SESSION['id'] ?? null;
            if (!$id || !$usuario) {
                header("Location: index.php?controller=Entrenador&action=getAllEntrenadores");
                exit;
            }
            $model = new SesionesModel();
            $model->asignarSesion($id, $usuario);
            $_SESSION['mensaje'] = "Te has apuntado a la sesión correctamente";
            header("Location: index.php?controller=Entrenador&action=getEntrenador&id=" . $id);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    public function cambiarEntrenador() {
        try {
            $id = $_GET['id'] ?? null;
            $usuario = $_SESSION['id'] ?? null;
            if (!$id || !$usuario) {
                header("Location: index.php?controller=Entrenador&action=getAllEntrenadores");
                exit;
            }
            $model = new EntrenadorModel();
            $model->updateEntrenador($id, $usuario);
            $_SESSION['mensaje'] = "Entrenador cambiado correctamente";
            header("Location: index.php?controller=Entrenador&action=getEntrenador&id=" . $id);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
}