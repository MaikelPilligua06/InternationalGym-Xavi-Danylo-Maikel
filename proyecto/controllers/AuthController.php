<?php

class AuthController {
    public function login()
    {
        require "views/login/login.php";
    }

    public function loginProcess()
    {
        $correo = trim($_POST['correoElectronico'] ?? '');
        $password = trim($_POST['contrasenia'] ?? '');

        $model = new AuthModel();
        $user = $model->login($correo, $password);

        if ($user) {
            $_SESSION['usuario'] = $user;
            $_SESSION['id'] = $user['id'];
            $_SESSION['objetivo'] = $user['objetivo'];
            $_SESSION['correo'] = $user['correoElectronico'];
            $_SESSION['nombre'] = $user['nombreUsuario'];
            $_SESSION['usuario'] = $user['id'];
            $_SESSION['tipo'] = $user['tipo'];
            $_SESSION['nombre'] = $user['nombre'] ?? '';
            header("Location: index.php?controller=Resumen&action=index");
            exit;
        }
        return false;
        $error = "Usuario o contraseña incorrectos";
        require "views/login/login.php";
    }

    public function registro() {
        require_once "views/registro.php";
    }

    public function registroProcess() {


        header("Location: index.php?controller=Auth&action=login&error=1");
        exit;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: index.php?controller=Auth&action=login");
        exit;
    }
}
