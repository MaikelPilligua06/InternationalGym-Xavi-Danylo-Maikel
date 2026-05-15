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
        try {
            $correo = trim(htmlspecialchars($_POST['correo'] ?? ''));
            $password = trim(htmlspecialchars($_POST['password'] ?? ''));
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
            $_SESSION['error'] = 'Correo o contraseña incorrectos';
            header("Location: index.php?controller=Auth&action=login&error=1");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    public function logout()
    {
        try {
            $_SESSION['mensaje'] = 'Sesion cerrada con exito';
            session_unset();
            session_destroy();
            header("Location: index.php?controller=Auth&action=login");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
}