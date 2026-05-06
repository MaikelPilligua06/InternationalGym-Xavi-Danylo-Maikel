<?php
require_once "models/RutinasModel.php";

class RutinasController{
    public function redirectRutinas(){
        $id = $_SESSION['id'];
        $rutinas = new RutinasModel();
        $ver = $rutinas->verRutinas($id);
        require "views/Rutinas/rutinas_ver.php";
    }
    // Función para crear una rutina Usuario
    public function crearRutina(){
        if (!isset($_SESSION['rutina_ejercicios'])) {
            $_SESSION['rutina_ejercicios'] = [];
        }
        if (!isset($_SESSION['rutina_platos'])) {
            $_SESSION['rutina_platos'] = [];
        }
        if (!isset($_SESSION['rutina_sesiones'])) {
            $_SESSION['rutina_sesiones'] = [];
        }

        $id = $_SESSION['id'];
        $rutinas = new RutinasModel();
        $usuarioEjercicios = $rutinas->getUsuariosEjercicios($id);
        $todoslosEjercicios = $rutinas->getTodosLosEjercicios();
        $usuarioAlimentacion = $rutinas->getUsuarioAlimentacion($id);
        $todosLosPlatos = $rutinas->getTodosLosPlatos();
        require "views/Rutinas/crearRutina.php";
    }
    public function agregarEjercicio(){
        if (isset($_POST['id'])) {
            $id       = $_POST['id'];
            $nombreEjercicio   = $_POST['nombreEjercicio'];
            $descripcion =  $_POST['descripcion'];
            $foto = $_POST['foto'];
            $calorias = $_POST['calorias'];

            $rutinaEjercicio = new RutinasModel();
            $rutinaEjercicio->guardarEjercicio($id, $nombreEjercicio, $descripcion, $foto, $calorias);
        }
        header('Location: index.php?controller=Rutinas&action=crearRutina');
        exit;
    }
    public function quitarEjercicio(){
        if (isset($_GET['index'])) {
            $index = $_GET['index'];

            $quitarEjercicio = new RutinasModel();
            $quitarEjercicio->eliminarEjercicio($index);
        }
    }
    public function agregarPlato(){
        if (isset($_POST['id'])) {
            $id       = $_POST['id'];
            $objetivo = $_POST['objetivo'];
            $calorias = $_POST['calorias'];
            $nombrePlato = $_POST['nombrePlato'];
            $descripcion = $_POST['descripcion'];
            $proteinas = $_POST['proteinas'];
            $carbohidratos = $_POST['carbohidratos'];
            $grasas = $_POST['grasas'];
            $foto = $_POST['foto'];

            $rutinaPlato = new RutinasModel();
            $rutinaPlato->guardarPlato($id, $objetivo, $calorias, $nombrePlato, $descripcion, $proteinas, $carbohidratos, $grasas, $foto);
        }
        header('Location: index.php?controller=Rutinas&action=crearRutina');
        exit;
    }
    public function quitarPlato(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $quitarPlato = new RutinasModel();
            $quitarPlato->eliminarPlato($index);
        }
        header('Location: index.php?controller=Rutinas&action=crearRutina');
        exit;
    }

    public function guardar() {
        $nombreRutina = $_POST['nombre_rutina'];
        $ejercicios   = $_SESSION['rutina_ejercicios'] ?? [];
        $platos       = $_SESSION['rutina_platos']     ?? [];
        if (empty($ejercicios) && empty($platos)) {
            header('Location: index.php?controller=Rutinas&action=crearRutina&error=vacia');
            exit;
        }
        $rutinas = new RutinasModel();
        $rutinas->guardarRutina($nombreRutina, $ejercicios, $platos, $_SESSION['id']);
        unset($_SESSION['rutina_ejercicios']);
        unset($_SESSION['rutina_platos']);

        header('Location: index.php?controller=Rutinas&action=redirectRutinas');
        exit;
    }
}