<?php
require_once "models/SesionesModel.php";
class SesionesController
{

    // Ver las sesiones
    public function index()
    {
        $model = new SesionesModel();
        $usuario = $_SESSION['id'];
        $sesiones = $model->getAll();
        $lista = ($usuario) ? $model->sesionUsuario($usuario) : [];
        require "views/Sesiones/sesiones_listado.php";
    }


    public function crear()
    {
        if ($_SESSION['rol'] !== 'entrenador') {
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'tipoDeClases' => $_POST['tipoDeClases'],
                'calorias' => $_POST['calorias'],
                'fechaClases' => $_POST['fechaClases'],
                'duracion' => $_POST['duracion'],
                'id_entrenador' => $_SESSION['id'],
                'foto' => $_FILES['foto']
            ];
        }
        $model = new SesionesModel();
        $sesiones = new SesionesDeClases($datos);
        $model->save($sesiones);
        header("Location: index.php?controller=Sesiones&action=index");
        exit;
    }

    // 2. Que un usuario se pueda apuntar a la session
    public function apuntarme()
    {
        $usuario = $_SESSION['id'];
        $model = new SesionesModel();
        $sesion = $model->asignarSesion($_GET['id'], $usuario);
        header("Location: index.php?controller=Sesiones&action=index");
        exit;
    }

    public function ver()
    {
        $sesiones = new SesionesDeClases();
        require "views/Sesiones/sesiones_publicar.php";
    }

    public function getId()
    {
        $model = new SesionesModel();
        $sesion = $model->ver($_GET["id"]);
        require "views/Sesiones/sesiones_ver.php";
    }


    public function publicar()
    {
        if ($_SESSION['rol'] !== 'entrenador') {
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        }
        if (!empty($_POST)) {
            $datos = [
                'nombreClase' => $_POST['nombreClase'],
                'calorias' => $_POST ['calorias'],
                'tipoDeClases' => $_POST['tipoDeClases'],
                'fechaClases' => $_POST['fechaClases'],
                'duracion' => $_POST['duracion'],
                'descripcion' => $_POST['descripcion'],
                'foto' => $_FILES['foto']
            ];
        }
        $id_entrenador = $_SESSION['id'];
        $model = new SesionesModel();
        $sesiones = new SesionesDeClases($datos);
        $model->sesionesCrear($sesiones, $id_entrenador);
        header("Location: index.php?controller=Sesiones&action=index");
        exit;
    }

    public function misPublicaciones()
    {
        if ($_SESSION['rol'] !== 'entrenador') {
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        }
        $model = new SesionesModel();
        $usuario = $_SESSION['id'];
        $sesiones = $model->misPub($usuario);
        require "views/Sesiones/publicaciones_listado.php";
    }

    public function eliminarSesion()
    {
        if ($_SESSION['rol'] !== 'entrenador') {
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        }
        $model = new SesionesModel();
        $model->delete($_GET["id"]);
        header("Location: index.php?controller=Sesiones&action=index");
        exit;
    }

    public function eliminarEntrenador()
    {
        if ($_SESSION['rol'] !== 'entrenador') {
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        }
        $model = new SesionesModel();
        $id_entrenador = $_SESSION['id'];
        $model->deleteEntrenador($id_entrenador, $_GET['id']);
        header("Location: index.php?controller=Sesiones&action=misPublicaciones");
        exit;
    }

    public function getSesionActualizar()
    {
        if ($_SESSION['rol'] !== 'entrenador') {
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        }
        $model = new SesionesModel();
        $sesion = $model->ver($_GET["id"]);
        require 'views/Sesiones/sesiones_actualizar.php';
    }

    public function actulizarSesion()
    {
        if ($_SESSION['rol'] !== 'entrenador') {
            header("Location: index.php?controller=Sesiones&action=index");
            exit;
        }
        if (!empty($_POST)) {
            $sesiones = new SesionesDeClases($_POST);
            $model = new SesionesModel();
            $sesiones->foto = $_POST['foto_actual'];
            $model->update($_GET['id'], $sesiones);

            header("Location: index.php?controller=Sesiones&action=misPublicaciones");
            exit;
        }
    }
}