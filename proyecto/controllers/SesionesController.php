<?php
require_once "models/SesionesModel.php";
class SesionesController
{

    // Ver las sesiones
    public function index()
    {
        try{
            $model = new SesionesModel();
            $usuario = $_SESSION['id'];
            $sesiones = $model->getAll();
            $lista = ($usuario) ? $model->sesionUsuario($usuario) : [];
            require "views/Sesiones/sesiones_listado.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }


    public function crear()
    {
        try {
            if ($_SESSION['rol'] !== 'entrenador' && $_SESSION['rol'] !== 'admin') {
                header("Location: index.php?controller=Sesiones&action=index");
                exit;
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datos = [
                    'tipoDeClases' => trim(htmlspecialchars($_POST['tipoDeClases'])),
                    'calorias' => trim(htmlspecialchars($_POST['calorias'])),
                    'fechaClases' => trim(htmlspecialchars($_POST['fechaClases'])),
                    'duracion' => trim(htmlspecialchars($_POST['duracion'])),
                    'id_entrenador' => trim(htmlspecialchars($_SESSION['id'])),
                    'foto' => $_FILES['foto']
                ];
            }
            $model = new SesionesModel();
            $sesiones = new SesionesDeClases($datos);
            $model->save($sesiones);
            $_SESSION['mensaje'] = "Sesión creada correctamente";
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    // 2. Que un usuario se pueda apuntar a la session
    public function apuntarme()
    {
        try {
            $usuario = $_SESSION['id'];
            $model = new SesionesModel();
            $sesion = $model->asignarSesion($_GET['id'], $usuario);
            $_SESSION['mensaje'] = "Te has apuntado correctamente";
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    public function ver()
    {
        try{
            $sesiones = new SesionesDeClases();
            require "views/Sesiones/sesiones_publicar.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    public function getId()
    {
        try {
            $model = new SesionesModel();
            $sesion = $model->ver($_GET["id"]);
            $apuntado = $model->estaApuntado($_GET["id"], $_SESSION['id']);
            require "views/Sesiones/sesiones_ver.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function publicar()
    {
        try {
            if ($_SESSION['rol'] !== 'entrenador' && $_SESSION['rol'] !== 'admin') {
                header("Location: index.php?controller=Sesiones&action=index");
                exit;
            }
            if (!empty($_POST)) {
                $datos = [
                    'nombreClase' => trim(htmlspecialchars($_POST['nombreClase'])),
                    'calorias' => trim(htmlspecialchars($_POST ['calorias'])),
                    'tipoDeClases' => trim(htmlspecialchars($_POST['tipoDeClases'])),
                    'fechaClases' => trim(htmlspecialchars($_POST['fechaClases'])),
                    'duracion' => trim(htmlspecialchars($_POST['duracion'])),
                    'descripcion' => trim(htmlspecialchars($_POST['descripcion'])),
                    'foto' => trim(htmlspecialchars($_FILES['foto']['name']))
                ];
            }
            $id_entrenador = $_SESSION['id'];
            $model = new SesionesModel();
            $sesiones = new SesionesDeClases($datos);
            $model->sesionesCrear($sesiones, $id_entrenador);
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    public function misPublicaciones()
    {
        try {

            if ($_SESSION['rol'] !== 'entrenador' && $_SESSION['rol'] !== 'admin') {
                header("Location: index.php?controller=Sesiones&action=index");
                exit;
            }

            $model = new SesionesModel();
            $usuario = $_SESSION['id'];
            $sesiones = $model->misPub($usuario);

            require "views/Sesiones/publicaciones_listado.php";

        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    // Eliminar la sesion de las preferencias del usuario
    public function eliminarSesion()
    {
        try{
            $model = new SesionesModel();
            $model->delete($_GET["id"]);
            $_SESSION['mensaje'] = "Has eliminado la sesion correctamente";
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function eliminarSesionRutina()
    {
        try{
            $model = new SesionesModel();
            $model->delete($_GET["id"]);
            $_SESSION['mensaje'] = "Has eliminado la sesion correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function apuntarmeRutina()
    {
        try {
            $usuario = $_SESSION['id'];
            $model = new SesionesModel();
            $sesion = $model->asignarSesion($_GET['id'], $usuario);
            $_SESSION['mensaje'] = "Te has apuntado correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function eliminarEntrenador()
    {
        try {
            if ($_SESSION['rol'] !== 'entrenador' && $_SESSION['rol'] !== 'admin') {
                header("Location: index.php?controller=Sesiones&action=index");
                exit;
            }
            $model = new SesionesModel();
            $id_entrenador = $_SESSION['id'];
            $model->deleteEntrenador($id_entrenador, $_GET['id']);
            header("Location: index.php?controller=Sesiones&action=misPublicaciones");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    public function getSesionActualizar()
    {
        try {
            if ($_SESSION['rol'] !== 'entrenador' && $_SESSION['rol'] !== 'admin') {
                header("Location: index.php?controller=Sesiones&action=index");
                exit;
            }
            $model = new SesionesModel();
            $sesion = $model->ver($_GET["id"]);
            require 'views/Sesiones/sesiones_actualizar.php';
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    public function actulizarSesion()
    {
        try{
            if ($_SESSION['rol'] !== 'entrenador' && $_SESSION['rol'] !== 'admin') {
                header("Location: index.php?controller=Sesiones&action=index");
                exit;
            }
            if (!empty($_POST)) {
                $sesiones = new SesionesDeClases($_POST);
                $model = new SesionesModel();
                $sesiones->foto = trim($_POST['foto_actual']);
                $model->update($_GET['id'], $sesiones);
                header("Location: index.php?controller=Sesiones&action=misPublicaciones");
                exit;
            }
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
}