<?php
require_once "models/SesionesModel.php";
class SesionesController
{

    // Ver las sesiones
    public function index()
    {
        $model = new SesionesModel();
        $sesiones = $model->getAll();
        require "views/sesiones_listado.php";
    }

    public function crear_form()
    {
        require "views/sesiones_crear.php";
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'tipoDeClases' => $_POST['tipoDeClases'],
                'fechaClases' => $_POST['fechaClases'],
                'duracion' => $_POST['duracion'],
                'id_entrenador' => $_SESSION['id']
            ];
        }
        $model = new SesionesModel();
        $sesiones = new SesionesDeClases($datos);
        $model->save($sesiones);
        header("Location: index.php?controller=Sesiones&action=index");
        exit;
    }

    // 2. Que un usuario se pueda apuntar a la session
    public function apuntar()
    {
        $model = new SesionesModel();
        $id_usuario = 1;
        $id_sesion = $_POST['idSesion'];

        if ($model->asignarSesion($id_sesion, $id_usuario)) {
            $_SESSION['mensaje'] = "Sesion apuntada correctamente";
        }

        header("Location: index.php?controller=Sesiones&action=index");
        exit;
    }


    public function ver() {
        $sesiones = new SesionesDeClases();

        require "views/sesiones_publicar.php";
    }

    public function publicar() {
        if(!empty($_POST)) {
            $datos = [
                'nombre'  => $_POST['nombre'],
                'tipoDeClases' => $_POST['tipoDeClases'],
                'fechaClases' => $_POST['fechaClases'],
                'duracion' => $_POST['duracion'],
                'descripcion' => $_POST['descripcion']
            ];
        }
        $id_entrenador = $_SESSION['id'];
        $model = new SesionesModel();
        $sesiones = new SesionesDeClases($datos);
        $model->sesionesCrear($sesiones, $id_entrenador);
        header("Location: index.php?controller=Sesiones&action=index");
        exit;
    }
    public function misPublicaciones() {
        require "views/publicaciones_listado.php";
    }

}
