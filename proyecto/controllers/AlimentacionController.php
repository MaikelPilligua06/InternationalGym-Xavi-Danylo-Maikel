<?php
require_once "models/AlimentacionModel.php";
class AlimentacionController{
    public function index(){
        $model = new AlimentacionModel();
        $usuarioId = $_SESSION['id'];
        $objetivo = $_SESSION["objetivo"];
        $alimentacion = $model->getAll($usuarioId);
        require "views/Alimentacion/alimentacionUsuario.php";
    }
    public function verPlato(){
        $model = new AlimentacionModel();
        $alimentacion = $model->getPlato($_GET["id"]);
        require "views/Alimentacion/verPlato.php";
    }
    public function addPlato(){
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