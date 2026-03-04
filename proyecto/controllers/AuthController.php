<?php
require_once "models/AuthModel.php";


class AuthController {
    public function login() {
        require "views/login.php";
    }
    public function loginProcess() {
        $model = new AuthModel();
        $correo = $_POST['correo'] ?? null;
        $password = $_POST['password'] ?? null;
        $user = $model->login($correo, $password);
        if ($user) {
            $_SESSION['usuario'] = $user;
            $_SESSION['id'] = $user['id'];
            $_SESSION['correo'] = $user['correoElectronico'];
            header("Location: index.php?controller=Resumen&action=index");
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



