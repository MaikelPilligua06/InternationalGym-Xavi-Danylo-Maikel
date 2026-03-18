<?php
require_once "models/AlimentacionModel.php";
class AlimentacionController{
    public function index(){
        $model = new AlimentacionModel();
        $usuarioId = $_SESSION['id'];
        $alimentacion = $model->getAll($usuarioId);
    }
}