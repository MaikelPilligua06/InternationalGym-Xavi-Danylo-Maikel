<?php
require_once "models/AuthModel.php";

class AuthController {

    public function login() {
        require "views/login.php";
    }

    public function loginProcess() {
        $model = new AuthModel();
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $user = $model->login($usuario, $password);

        if ($user) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['rol'] = $user['rol'];
            header("Location: index.php");
            exit;
        }

        $error = "Usuario o contraseña incorrectos";
        require "views/login.php";
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>