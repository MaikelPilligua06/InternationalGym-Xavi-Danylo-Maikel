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
        $correo = trim($_POST['correoElectronico'] ?? '');
        $password = trim($_POST['contrasenia'] ?? '');

        $model = new AuthModel();
        $user = $model->login($correo, $password);

        if ($user) {
            $_SESSION['usuario'] = $user['id'];
            $_SESSION['tipo'] = $user['tipo'];
            $_SESSION['nombre'] = $user['nombre'] ?? '';

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