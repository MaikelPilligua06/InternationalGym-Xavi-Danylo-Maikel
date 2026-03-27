<?php
require_once "models/UsuarioModel.php";

class UsuarioController{
    public function index(){
        $model = new UsuarioModel();
        $usuarioId = $_SESSION['id'];
        $usuario = $model->getAll($usuarioId);
        require "views/perfilUsuario.php";
    }


    public function actualizar(){
        if (isset($_POST['actualizar'])) {
            $numeroTelefono = $_POST['numeroTelefono'];
            $correoElectronico = $_POST['correoElectronico'];
            $objetivo = $_POST['objetivo'];

            $model = new UsuarioModel();
            $model->actualizar($numeroTelefono, $correoElectronico, $objetivo);

            header("Location: index.php?controller=Usuario&action=index");
            exit();
        }
    }
}
