<?php
require_once "models/AlimentacionModel.php";
class AlimentacionController{
    public function index(){
        $model = new AlimentacionModel();
        $usuarioId = $_SESSION['id'];
        $objetivo = $_SESSION['objetivo'];
        $alimentacion = $model->getPlatosUsuario($usuarioId);
        $todosLosPlatos = $model->getTodosLosPlatosPorObjetivo($objetivo);
        require "views/Alimentacion/alimentacionUsuario.php";
    }
    public function verPlato(){
        $model = new AlimentacionModel();
        $alimentacion = $model->getPlato($_GET["id"]);
        require "views/Alimentacion/verPlato.php";
    }
    public function crear_plato_form(){
        require "views/Alimentacion/crearPlato.php";
    }
    public function crear(){
        if (!empty($_POST)) {
            $datos = [
                'nombrePlato'   => $_POST['nombrePlato'],
                'objetivo'      => $_POST['objetivo'],
                'descripcion'   => $_POST['descripcion'],
                'calorias'      => $_POST['calorias'],
                'proteinas'     => $_POST['proteinas'],
                'carbohidratos' => $_POST['carbohidratos'],
                'grasas'        => $_POST['grasas']
            ];
        }
        $model = new AlimentacionModel();
        $plato = new Alimentacion($datos);
        $model->guardar($plato);
        header("Location: index.php?controller=Alimentacion&action=index");
        exit;
    }
    public function addPlatoUsuario(){
        $model = new AlimentacionModel();
        $usuarioId = $_SESSION['id'];
        $alimentacion = $model->agregarPlato($_GET['id'], $usuarioId);
        header("Location: index.php?controller=Alimentacion&action=index");
        exit;
    }
    public function eliminarPlato(){
        $model = new AlimentacionModel();
        $usuarioId = $_SESSION['id'];
        $model->eliminarPlatoUsuario($_GET["id"], $usuarioId);
        header("Location: index.php?controller=Alimentacion&action=index");
        exit;
    }

    // funciones a futuro de editar, contar calorias entre todos los platos, SOLO ADMIN
    public function editPlato(){
        $model = new AlimentacionModel();
    }
    // funcion para eliminar platos, SOLO ADMIN
    public function getTodosLosPlatos(){
        $model = new AlimentacionModel();
        $todoslosPlatos = $model->getTodosLosPlatosAdmin();
        require "views/Alimentacion/platosEliminar.php";
    }
    public function borrarPlato(){
        $model = new AlimentacionModel();
        $plato = $model->deletePlato($_GET["id"]);
        header("Location: index.php?controller=Alimentacion&action=getTodosLosPlatos");
    }
    public function contarCalorias(){
        $model = new AlimentacionModel();
        $usuarioId = $_SESSION['id'];
        $alimentacion = $model->getCalorias($usuarioId);
    }
}