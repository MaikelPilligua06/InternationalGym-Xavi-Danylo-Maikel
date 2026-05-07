<?php
require_once "models/UsuarioModel.php";

class UsuarioController{
    public function index(){
        $model = new UsuarioModel();
        $usuarioId = $_SESSION['id'];
        $usuario = $model->getAll($usuarioId);
        $entrenadores = ($usuarioId) ? $model->getEntrenadorUsuario($usuarioId) : [];
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
    public function crear(){
        if(!empty($_POST)){
<<<<<<< HEAD
            $datos = [
                'nombreUsuario' => $_POST['nombreUsuario'],
                'apellido' => $_POST['apellido'],
                'numeroTelefono' => $_POST['numeroTelefono'],
                'tipoDocumento' => $_POST['tipoDocumento'],
                'numeroDocumento' => $_POST['numeroDocumento'],
                'correoElectronico' => $_POST['correoElectronico'],
                'contrasenia' => $_POST['contrasenia'],
                'edad' => $_POST['edad'],
                'genero' => $_POST['genero'],
                'peso' => $_POST['peso'],
                'altura' => $_POST['altura'],
                'objetivo' => $_POST['objetivo'],
                'fechaDeAlta' => $_POST['fechaDeAlta'],
                'foto' => $_POST['foto'],
                'id_entrenador' => $_POST['id_entrenador']

            ];
        }

        $model = new UsuarioModel();
        $usuario = new Usuario($datos);
        $model->save($usuario);
        header("Location: index.php");
        exit;
=======
                $nombreUsuario = $_POST['nombreUsuario'];
                $apellido = $_POST['apellido'];
                $numeroTelefono = $_POST['numeroTelefono'];
                $tipoDocumento = $_POST['tipoDocumento'];
                $numeroDocumento = $_POST['numeroDocumento'];
                $correoElectronico = $_POST['correoElectronico'];
                $contrasenia = $_POST['contrasenia'];
                $edad = $_POST['edad'];
                $genero = $_POST['genero'];
                $peso = $_POST['peso'];
                $altura = $_POST['altura'];
                $objetivo = $_POST['objetivo'];
                $foto = $_FILES['foto']['name'];
                $id_entrenador = $_POST['entrenador_id'];

                $model = new UsuarioModel();
                $model->save($nombreUsuario, $apellido, $numeroTelefono, $tipoDocumento, $numeroDocumento, $correoElectronico, $contrasenia, $edad, $genero, $peso, $altura, $objetivo,  $foto, $id_entrenador);

        }
        header("Location: index.php");
        exit();
>>>>>>> 5d2af1755716ccc4a82ebf2380e7034cb6bbe477
    }
    public function registro(){
        $model = new UsuarioModel();
        $entrenadores = $model->getEntrenadores();
        require "views/login/registro.php";
    }
<<<<<<< HEAD




=======
>>>>>>> 5d2af1755716ccc4a82ebf2380e7034cb6bbe477
}
