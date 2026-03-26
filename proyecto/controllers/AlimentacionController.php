<?php
require_once "models/AlimentacionModel.php";
class AlimentacionController{
    public function index(){
        $model = new AlimentacionModel();
        $usuarioId = $_SESSION['id'];
        $objetivo = $_SESSION['objetivo'];
        $alimentacion = $model->getPlatosUsuario($usuarioId);
        $todosLosPlatos = $model->getTodosLosPlatos($objetivo);
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'tipoDeClases' => $_POST['tipoDeClases'],
                'fechaClases' => $_POST['fechaClases'],
                'duracion' => $_POST['duracion'],
                'id_entrenador' => $_SESSION['id']
            ];
        }
    }
    public function addPlatoUsuario(){
        $model = new AlimentacionModel();
        $usuarioId = $_SESSION['id'];
        $alimentacion = $model->agregarPlato($_GET["id"], $usuarioId);
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

    // funciones a futuro de editar, contar calorias entre todos los platos
    public function editPlato(){
        $model = new AlimentacionModel();


    }
    public function contarCalorias(){
        $model = new AlimentacionModel();
        $usuarioId = $_SESSION['id'];
        $alimentacion = $model->getCalorias($usuarioId);
    }
}