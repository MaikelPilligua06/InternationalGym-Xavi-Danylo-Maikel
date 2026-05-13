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
        if (isset($_POST['actualizar'])) {
            $numeroTelefono = $_POST['numeroTelefono'];
            $correoElectronico = $_POST['correoElectronico'];
            $objetivo = $_POST['objetivo'];
            $nivelActividad = $_POST['nivelActividad'];

            $model = new UsuarioModel();
            $model->actualizar($numeroTelefono, $correoElectronico, $objetivo, $nivelActividad);

            header("Location: index.php?controller=Usuario&action=index");
            exit();
        }
    }

    public function crear() {
        if (!empty($_POST)) {
            $nombreUsuario = $_POST['nombreUsuario'] ?? null;
            $apellido = $_POST['apellido'] ?? null;
            $numeroTelefono = $_POST['numeroTelefono'] ?? null;
            $tipoDocumento = $_POST['tipoDocumento'] ?? null;
            $numeroDocumento = $_POST['numeroDocumento'] ?? null;
            $correoElectronico = $_POST['correoElectronico'] ?? null;
            $contrasenia = $_POST['contrasenia'] ?? null;
            $edad = $_POST['edad'] ?? null;
            $genero = $_POST['genero'] ?? null;
            $peso = $_POST['peso'] ?? null;
            $altura = $_POST['altura'] ?? null;
            $objetivo = $_POST['objetivo'] ?? null;

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

        header("Location: index.php");
        exit();
    }

    public function registro() {
        $model = new UsuarioModel();
        $entrenadores = $model->getEntrenadores();
        require "views/login/registro.php";
    }
}
