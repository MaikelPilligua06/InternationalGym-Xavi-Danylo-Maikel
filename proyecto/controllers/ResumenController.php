<?php
require_once "models/ResumenModel.php";

class ResumenController{
    public function index(){
        $model = new ResumenModel();
        $resumen = $model->getAll();
        require "views/main_page.php";
    }
    public function verResumen() {
        $usuario = $_SESSION['id'];
        $model = new ResumenModel();
        $resumen = $model->getResumen($usuario);
        require "views/resumen_ver.php";
    }
    public function masMenos(){
        $usuario = $_SESSION['id'];
        $model = new ResumenModel();
        $resumen = $model->getResumen($usuario);
    }
}
