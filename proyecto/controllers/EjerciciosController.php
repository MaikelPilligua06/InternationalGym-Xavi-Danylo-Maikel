<?php

require_once "models/EjerciciosModel.php";

class EjerciciosController{
    // Función para obtener la vista donde se muestran los ejercicios y listado
    public function listadoEjercicios() {
        try {
            $model = new EjerciciosModel();
            $usuarioId = $_SESSION['id'];
            $ejercicio = $model->getAll();
            $lista = ($usuarioId) ? $model->informacionUsuario($usuarioId) : [];
            require "views/Ejercicios/entrnamientoUsuario.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    // Función para añadir un ejercicio
    public function addEjercicio(){
        try {
            $model = new EjerciciosModel();
            $usuario = $_SESSION['id'];
            $model->guardar($_GET['id'], $usuario);
            $_SESSION['mensaje'] = "Ejercicio añadido correctamente";
            header("Location: index.php?controller=Ejercicios&action=listadoEjercicios");
            exit();
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }

    }
    public function addPreferenciaRutina(){
        try {
            $model = new EjerciciosModel();
            $usuario = $_SESSION['id'];
            $model->guardar($_GET['id'], $usuario);
            $_SESSION['mensaje'] = "Ejercicio añadido a la rutina correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit();
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    // Función para ver la informacion de un ejercicio
    public function infoEjercicio(){
        try {
            $model = new EjerciciosModel();
            $usuarioId = $_SESSION['id'];
            $ejercicios = $model->getById($_GET["id"]);
            $apuntado = $model->estaApuntado($_GET["id"], $usuarioId);
            require "views/Ejercicios/ejercicios_ver.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    // Función para eliminar el ejercicio del usuario
    public function eliminarEjercicio(){
        try {
            $model = new EjerciciosModel();
            $model->delete($_GET["id"]);
            $_SESSION['mensaje'] = "Ejercicio eliminado correctamente";
            header("Location: index.php?controller=Ejercicios&action=listadoEjercicios");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function eliminarRutinaEjercicio(){
        try {
            $model = new EjerciciosModel();
            $model->delete($_GET["id"]);
            $_SESSION['mensaje'] = "Ejercicio eliminado de la rutina correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    // Función para añadir ejercicio admin
    public function agregarEjercicio()
    {
        try {
            $model = new EjerciciosModel();
            require "views/Ejercicios/ejercicios_agregar.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function verEjercicios(){
        try {
            $model = new EjerciciosModel();
            $ejercicio = $model->getAll();
            require "views/Ejercicios/getTodosLosEjercicios.php";
        } catch (Exception $e) {
                $_SESSION['error_fatal'] = $e->getMessage();
                require "views/error_fatal.php";
            }
    }
    public function borrarEjercicioApp(){
        try {
            $model = new EjerciciosModel();
            $model->borrarEjercicio($_GET["id"]);
            $_SESSION['mensaje'] = "Ejercicio borrado correctamente";
            header("Location: index.php?controller=Ejercicios&action=verEjercicios");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    // Función para crear un ejercicio
    public function publicar(){
        try {
            if (!empty($_POST)) {
                $datos = [
                    'nombreEjercicio' => trim(htmlspecialchars($_POST['nombreEjercicio'])),
                    'descripcion' => trim(htmlspecialchars($_POST['descripcion'])),
                    'calorias' => trim(htmlspecialchars($_POST['calorias'])),
                    'foto' => $_FILES['foto']
                ];
            }
            $model = new EjerciciosModel();
            $ejercicio = new Ejercicios($datos);
            $model->publicarEjercicio($ejercicio);
            $_SESSION['mensaje'] = "Ejercicio publicado correctamente";
            header("Location: index.php?controller=Ejercicios&action=listadoEjercicios");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function getEjerciciosActualizar()
    {
        try{
            $model = new EjerciciosModel();
            $ejercicios = $model->getById($_GET["id"]);
            require 'views/Ejercicios/ejerciciosUpdate.php';
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function actualizarEjercicio() {
        try {
            if ($_SESSION['rol'] !== 'admin') {
                header("Location: index.php?controller=Ejercicios&action=listadoEjercicios");
                exit;
            }
            $datos = [
                'nombreEjercicio' => trim(htmlspecialchars($_POST['nombreEjercicio'])),
                'descripcion'     => trim(htmlspecialchars($_POST['descripcion'])),
                'calorias'        => trim(htmlspecialchars($_POST['calorias'])),
            ];
            $ejercicio = new Ejercicios($datos);
            $ejercicio->foto = trim($_POST['foto_actual']);
            $model = new EjerciciosModel();
            $model->update($id, $ejercicio);
            $_SESSION['mensaje'] = "Ejercicio actualizado correctamente";
            header("Location: index.php?controller=Ejercicios&action=verEjercicios");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
}
