<?php
require_once "models/UsuarioModel.php";

class UsuarioController {

    public function index() {
        $model = new UsuarioModel();
        $usuarioId = $_SESSION['id'] ?? null;
        $usuario = $usuarioId ? $model->getAll($usuarioId) : [];
        $entrenadores = $usuarioId ? $model->getEntrenadorUsuario($usuarioId) : [];
        require "views/perfilUsuario.php";
    }

    public function actualizar() {
        try{
            if (isset($_POST['actualizar'])) {
                $numeroTelefono = trim(htmlspecialchars($_POST['numeroTelefono']));
                $correoElectronico = trim(htmlspecialchars($_POST['correoElectronico']));
                $objetivo = trim(htmlspecialchars($_POST['objetivo']));
                $nivelActividad = trim(htmlspecialchars($_POST['nivelActividad']));

                $model = new UsuarioModel();
                $model->actualizar($numeroTelefono, $correoElectronico, $objetivo, $nivelActividad);
                $_SESSION['mensaje'] = "Perfile actualizado correctamente";
                header("Location: index.php?controller=Usuario&action=index");
                exit();
            }
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }

    public function crear()
    {
        try {
            if (!empty($_POST)) {
                $nombreUsuario = trim(htmlspecialchars($_POST['nombreUsuario'])) ?? trim(htmlspecialchars(null));
                $apellido = trim(htmlspecialchars($_POST['apellido'])) ?? trim(htmlspecialchars(null));
                $numeroTelefono = trim(htmlspecialchars($_POST['numeroTelefono'])) ?? trim(htmlspecialchars(null));
                $tipoDocumento = trim(htmlspecialchars($_POST['tipoDocumento'])) ?? trim(htmlspecialchars(null));
                $numeroDocumento = trim(htmlspecialchars($_POST['numeroDocumento'])) ?? trim(htmlspecialchars(null));
                $correoElectronico = trim(htmlspecialchars($_POST['correoElectronico'])) ?? trim(htmlspecialchars(null));
                $contrasenia = trim(htmlspecialchars($_POST['contrasenia'])) ?? trim(htmlspecialchars(null));
                $edad = trim(htmlspecialchars($_POST['edad'])) ?? trim(htmlspecialchars(null));
                $genero = trim(htmlspecialchars($_POST['genero'])) ?? trim(htmlspecialchars(null));
                $peso = trim(htmlspecialchars($_POST['peso'])) ?? trim(htmlspecialchars(null));
                $altura = trim(htmlspecialchars($_POST['altura'])) ?? trim(htmlspecialchars(null));
                $objetivo = trim(htmlspecialchars($_POST['objetivo'])) ?? trim(htmlspecialchars(null));

                $foto = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : '';
                $id_entrenador = $_POST['entrenador_id'] ?? $_POST['id_entrenador'] ?? null;

                $model = new UsuarioModel();

                $model->save(
                    $nombreUsuario,
                    $apellido,
                    $numeroTelefono,
                    $tipoDocumento,
                    $numeroDocumento,
                    $correoElectronico,
                    $contrasenia,
                    $edad,
                    $genero,
                    $peso,
                    $altura,
                    $objetivo,
                    $foto,
                    $id_entrenador
                );
            }
            $_SESSION['mensaje'] = "Usuario correctamente";

            header("Location: index.php");
            exit();
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }


    public function registro() {
        try {
            $model = new UsuarioModel();
            $entrenadores = $model->getEntrenadores();
            require "views/login/registro.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
}