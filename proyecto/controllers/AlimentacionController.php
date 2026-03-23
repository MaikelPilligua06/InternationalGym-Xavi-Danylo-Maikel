<?php
require_once "models/AlimentacionModel.php";
class AlimentacionController{
    public function index(){
        $model = new AlimentacionModel();
        $usuarioId = $_SESSION['id'];
        $objetivo = $_SESSION["objetivo"];
        $alimentacion = $model->getAll($usuarioId);
    }
}