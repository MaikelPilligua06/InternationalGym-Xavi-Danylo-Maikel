<?php
require_once "models/ResumenModel.php";

class ResumenController{
    public function index(){
        $model = new ResumenModel();
        $resumen = $model->getAll();
        require "views/main.php";
    }


}
?>
