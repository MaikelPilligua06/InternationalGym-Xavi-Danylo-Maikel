<?php
require_once "models/SesionesModel.php";
<<<<<<< HEAD
class SesionesController {
=======
class SesionesController{

    // Ver las sesiones
>>>>>>> 58d213019d5755e6d2a42d132e4e61c72d60c57f
    public function index() {
        $model = new SesionesModel();
        $sesiones = $model->getAll();
        require_once "views/sesiones_listado.php";
    }

<<<<<<< HEAD



    public function crear_form() {
        require_once "views/sesiones_crear.php";
    }

    public function crear() {
=======
    // El usuario pueda crear sesiones
 public function crear() {
>>>>>>> 58d213019d5755e6d2a42d132e4e61c72d60c57f

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
<<<<<<< HEAD
}


=======
}
>>>>>>> 58d213019d5755e6d2a42d132e4e61c72d60c57f
