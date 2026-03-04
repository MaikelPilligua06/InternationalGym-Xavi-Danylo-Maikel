<?php
require_once "models/SesionesModel.php";
class SesionesController{

    // Ver las sesiones
    public function index() {
        $model = new SesionesModel();
        $sesiones = $model->getAll();
        require_once "views/sesiones_listado.php";
    }

    // El usuario pueda crear sesiones
 public function crear() {

        $model = new SesionesModel();
        $datos = $_POST["datos"];
        $sesiones = new SesionesDeClases($datos);
        $model->save($sesiones);
        $_SESSION['mensaje'] = "Sesion creada correctamente";
        header("Location: index.php?controller=Sesiones&action=index");
        require_once "views/sesiones.php";
        exit;
    }
    // 2. Que un usuario se pueda apuntar a la session
    public function apuntar() {
        $model = new SesionesModel();
        $id_usuario = 1;
        $id_sesion = $_POST['idSesion'];

        if ($model->asignarSesion($id_sesion, $id_usuario)) {
            $_SESSION['mensaje'] = "Sesion apuntada correctamente";
        }

        header("Location: index.php?controller=Sesiones&action=index");
        exit;
    }
}


