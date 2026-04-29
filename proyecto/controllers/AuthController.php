<?php
require_once "models/AuthModel.php";

class AuthController {
    public function login() {
        require "views/login/login.php";
    }
    public function loginProcess() {
        $model = new AuthModel();
        $correo = $_POST['correo'] ?? null;
        $password = $_POST['password'] ?? null;
        $user = $model->login($correo, $password);
        if ($user) {
            $_SESSION['usuario'] = $user;
            $_SESSION['id'] = $user['id'];
            $_SESSION['objetivo'] = $user['objetivo'];
            $_SESSION['correo'] = $user['correoElectronico'];
            header("Location: index.php?controller=Resumen&action=index");
            exit;
        } else if($entrenador) {
            $_SESSION['usuario'] = $entrenador;
            $_SESSION['id'] = $entrenador['id'];
            $_SESSION['correo'] = $entrenador['correoElectronico'];
            header("Location: index.php?controller=Resumen&action=index");
        }
        return false;
        $error = "Usuario o contraseña incorrectos";
        require "views/login/login.php";
    }

    public function registro() {
        require_once "views/registro.php";
    }

    public function registroProcess() {

    }
    public function logout() {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}



