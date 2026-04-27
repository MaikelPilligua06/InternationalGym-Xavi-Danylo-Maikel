<?php
require_once "models/ResumenModel.php";

class ResumenController{
    public function index(){
        $model = new ResumenModel();
        $resumen = $model->getAll();
        require "views/mainpage/main_page.php";
    }
    public function verResumen() {
        $model = new ResumenModel();
        $usuario = $_SESSION['id'];
        $resumen = $model->getResumen($usuario);
        require "views/Objetivo/resumen_ver.php";
    }
    public function masMenos(){
        $usuario = $_SESSION['id'];
        $model = new ResumenModel();
        $resumen = $model->getResumen($usuario);
    }
    public function resumenUsuario(){
        $usuario = $_SESSION['id'];
        $model = new ResumenModel();
        $resumen = $model->getUsuarioResumen($usuario);
        require "views/Objetivo/objetivoUsuario.php";
    }
}
