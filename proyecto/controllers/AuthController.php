<?php

require_once "models/AuthModel.php";

class AuthController
{
    public function login()
    {
        require "views/login/login.php";
    }

    public function loginProcess()
    {
        $correo = trim($_POST['correo'] ?? '');
        $password = trim($_POST['password'] ?? '');

        $model = new AuthModel();
        $user = $model->login($correo, $password);

        if ($user) {
            $_SESSION['usuario'] = $user['id'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['nombre'] = $user['nombreUsuario'] ?? '';
            $_SESSION['rol'] = $user['rol'];


            header("Location: index.php?controller=Resumen&action=index");
            exit;
        }
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