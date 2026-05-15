<?php
require_once "models/AlimentacionModel.php";
class AlimentacionController{
    public function index(){
        try{
            $model = new AlimentacionModel();
            $usuarioId = $_SESSION['id'];
            $alimentacion = $model->getPlatosUsuario($usuarioId);
            $todosLosPlatos = $model->getTodosLosPlatos();
            require "views/Alimentacion/alimentacionUsuario.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function verPlato(){
        try {
            $model = new AlimentacionModel();
            $usuarioId = $_SESSION['id'];
            $alimentacion = $model->getPlato($_GET['id']);
            $apuntado = $model->verificarPlato($_GET['id'], $usuarioId);
            require "views/Alimentacion/verPlato.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function crear_plato_form(){
        try{
            if ($_SESSION['rol'] !== 'admin' && $_SESSION['rol'] !== 'entrenador') {
                header("Location: index.php?controller=Sesiones&action=index");
                exit;
            }
        require "views/Alimentacion/crearPlato.php";

        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function crear(){
        try {
            if ($_SESSION['rol'] !== 'admin' && $_SESSION['rol'] !== 'entrenador') {
                header("Location: index.php?controller=Sesiones&action=index");
                exit;
            }
            if (!empty($_POST)) {
                $datos = [
                    'nombrePlato' =>  trim(htmlspecialchars($_POST['nombrePlato'])),
                    'objetivo' =>  trim(htmlspecialchars($_POST['objetivo'])),
                    'descripcion' =>  trim(htmlspecialchars($_POST['descripcion'])),
                    'calorias' =>  trim(htmlspecialchars($_POST['calorias'])),
                    'proteinas' =>  trim(htmlspecialchars($_POST['proteinas'])),
                    'carbohidratos' =>  trim(htmlspecialchars($_POST['carbohidratos'])),
                    'grasas' =>  trim(htmlspecialchars($_POST['grasas'])),
                    'foto' => $_FILES['foto']
                ];
            }
            $model = new AlimentacionModel();
            $plato = new Alimentacion($datos);
            $model->guardar($plato);
            $_SESSION['mensaje'] = "Plato creado correctamente";
            header("Location: index.php?controller=Alimentacion&action=index");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function addPlatoUsuario(){
        try {
            $model = new AlimentacionModel();
            $usuarioId = $_SESSION['id'];
            $model->agregarPlato($_GET['id'], $usuarioId);
            $_SESSION['mensaje'] = "Plato agregado correctamente";
            header("Location: index.php?controller=Alimentacion&action=index");
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header("Location: index.php?controller=Alimentacion&action=index");
            exit;
        }
    }
    public function addPlatoUsuarioRutina(){
        try {
            $model = new AlimentacionModel();
            $usuarioId = $_SESSION['id'];
            $model->agregarPlato($_GET['id'], $usuarioId);
            $_SESSION['mensaje'] = "Plato agregado correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header("Location: index.php?controller=Alimentacion&action=index");
            exit;
        }
    }

    public function eliminarPlato(){
        try {
            $model = new AlimentacionModel();
            $usuarioId = $_SESSION['id'];
            $model->eliminarPlatoUsuario($_GET["id"], $usuarioId);
            $_SESSION['mensaje'] = "Plato eliminado correctamente";
            header("Location: index.php?controller=Alimentacion&action=index");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function eliminarRutinaPlato(){
        try {
            $model = new AlimentacionModel();
            $usuarioId = $_SESSION['id'];
            $model->eliminarPlatoUsuario($_GET["id"], $usuarioId);
            $_SESSION['mensaje'] = "Plato eliminado correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function borrarPlatoPref(){
        try {
            $model = new AlimentacionModel();
            $usuarioId = $_SESSION['id'];
            $model->eliminarPlatoUsuario($_GET["id"], $usuarioId);
            $_SESSION['mensaje'] = "Plato eliminado correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    // funciones a futuro de editar, contar calorias entre todos los platos, SOLO ADMIN
    public function editPlato(){
        try {
            if ($_SESSION['rol'] !== 'admin') {
                header("Location: index.php?controller=Alimentacion&action=index");
                exit;
            }
            $model = new AlimentacionModel();
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    // funcion para eliminar platos, SOLO ADMINc
    public function getTodosLosPlatos(){
        try {
            if ($_SESSION['rol'] !== 'admin') {
                header("Location: index.php?controller=Sesiones&action=index");
                exit;
            }
            $model = new AlimentacionModel();
            $todoslosPlatos = $model->getTodosLosPlatosAdmin();
            require "views/Alimentacion/platosEliminar.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function borrarPlato(){
        try {
            if ($_SESSION['rol'] !== 'admin') {
                header("Location: index.php?controller=Sesiones&action=index");
                exit;
            }
            $model = new AlimentacionModel();
            $plato = $model->deletePlato($_GET["id"]);
            $_SESSION['mensaje'] = "Plato eliminado correctamente";
            header("Location: index.php?controller=Alimentacion&action=getTodosLosPlatos");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function contarCalorias(){
        try {
            $model = new AlimentacionModel();
            $usuarioId = $_SESSION['id'];
            $alimentacion = $model->getCalorias($usuarioId);
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
}