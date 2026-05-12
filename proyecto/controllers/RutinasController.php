<?php
require_once "models/RutinasModel.php";

class RutinasController{
    public function redirectRutinas(){
        $id = $_SESSION['id'];
        $modelo = new RutinasModel();
        $ver = $modelo->verRutinas($id);
        $rutinas   = ($id) ? $modelo->getRutinaUsuario($id) : [];
        $diaRutina = ($id) ? $modelo->getRutinaDiaria($id)  : [];
        require "views/Rutinas/rutinas_ver.php";
    }
    public function crearRutinaDiaria(){
        $usuarioId = $_SESSION['id'];
        $model = new RutinasModel();
        $rutinaDiaria = $model->rutinaDiaria($_GET['id'], $usuarioId);
        header('Location: index.php?controller=Rutinas&action=redirectRutinas');
        exit();
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
        $usuarioSesiones = $rutinas->getUsuarioSesion($id);
        $todasLasSesiones = $rutinas->getTodasLasSesiones();
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
        header('Location: index.php?controller=Rutinas&action=crearRutina');
        exit;
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
    public function agregarSesion(){
        if (isset($_POST['id'])) {
            $id       = $_POST['id'];
            $nombreClase = $_POST['nombreClase'];
            $tipoDeClases = $_POST['tipoDeClases'];
            $fechaClases = $_POST['fechaClases'];
            $duracion = $_POST['duracion'];
            $id_entrenador = $_POST['id_entrenador'];
            $descripcion = $_POST['descripcion'];
            $foto = $_POST['foto'];
            $calorias = $_POST['calorias'];

            $rutinaSesiones = new RutinasModel();
            $rutinaSesiones->agregarSesion($id, $nombreClase, $tipoDeClases, $fechaClases, $duracion, $id_entrenador, $descripcion, $foto, $calorias);
        }
        header('Location: index.php?controller=Rutinas&action=crearRutina');
        exit;
    }
    public function quitarSesion(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $quitarSesion = new RutinasModel();
            $quitarSesion->eliminarSesion($index);
        }
        header('Location: index.php?controller=Rutinas&action=crearRutina');
        exit;

    }
    public function guardar() {
        if (!empty($_POST)) {
            $nombre_rutina = $_POST['nombreRutina'];
            $fechaTiempo   = $_POST['fechaTiempo'];
            $objetivo      = $_POST['objetivo'];
            $ejercicios    = $_POST['id_ejercicio'] ?? [];
            $platos        = $_POST['id_plato'] ?? [];
            $sesiones      = $_POST['id_sesion'] ?? [];
            $peso          = $_POST['peso'] ?? [];
            $series        = $_POST['series'] ?? [];
            $repeticiones  = $_POST['repeticiones'] ?? [];
        }
        $id = $_SESSION['id'];
        $rutinas = new RutinasModel();
        $rutinas->guardarRutina($nombre_rutina, $ejercicios, $platos, $sesiones, $id, $fechaTiempo, $objetivo, $series, $repeticiones, $peso);
        unset($_SESSION['rutina_ejercicios']);
        unset($_SESSION['rutina_platos']);
        unset($_SESSION['rutina_sesiones']);
        header('Location: index.php?controller=Rutinas&action=redirectRutinas');
        exit;
    }
    public function volver(){
        unset($_SESSION['rutina_ejercicios']);
        unset($_SESSION['rutina_platos']);
        unset($_SESSION['rutina_sesiones']);
        header('Location: index.php?controller=Rutinas&action=redirectRutinas');
        exit;
    }
    public function deleteRutinaDiaria(){
        $usuarioId = $_SESSION['id'];
        $model = new RutinasModel();
        $rutinaDiaria = $model->eliminarRutinaDia($_GET['id'], $usuarioId);
        header('Location: index.php?controller=Rutinas&action=redirectRutinas');
        exit;
    }
    public function eliminarRutinaDef(){
        $usuarioId = $_SESSION['id'];
        $model = new RutinasModel();
        $delete = $model->deleteRutina($_GET['id'], $usuarioId);
        header('Location: index.php?controller=Rutinas&action=redirectRutinas');
        exit;
    }
    public function verRutina(){
        $modelo = new RutinasModel();
        $rutinas = $modelo->getById($_GET['id']) ;
        require "views/Rutinas/rutinasInfo.php";
    }
    public function getRutinaActualizar()
    {
        if (!isset($_SESSION['rutina_ejercicios'])) {
            $_SESSION['rutina_ejercicios'] = [];
        }
        if (!isset($_SESSION['rutina_platos'])) {
            $_SESSION['rutina_platos'] = [];
        }
        if (!isset($_SESSION['rutina_sesiones'])) {
            $_SESSION['rutina_sesiones'] = [];
        }

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $_SESSION['rutinaId'] = $_GET['id'];
        }
        $id    = $_SESSION['id'];
        $model = new RutinasModel();
        $rutinas             = $model->getById($_SESSION['rutinaId']);
        $usuarioEjercicios   = $model->getUsuariosEjercicios($id);
        $todoslosEjercicios  = $model->getTodosLosEjercicios();
        $usuarioAlimentacion = $model->getUsuarioAlimentacion($id);
        $todosLosPlatos      = $model->getTodosLosPlatos();
        $usuarioSesiones     = $model->getUsuarioSesion($id);
        $todasLasSesiones    = $model->getTodasLasSesiones();
        require 'views/Rutinas/rutinasEditar.php';
    }
    public function actualizarRutiar()
    {
        if (!empty($_POST)) {
            $id            = $_GET['id'];
            $nombre_rutina = $_POST['nombreRutina'];
            $fechaTiempo   = $_POST['fechaTiempo'];
            $objetivo      = $_POST['objetivo'];
            $ejercicios    = $_POST['id_ejercicio']   ?? [];
            $platos        = $_POST['id_plato']        ?? [];
            $sesiones      = $_POST['id_sesion']       ?? [];
            $peso          = $_POST['peso']            ?? [];
            $series        = $_POST['series']          ?? [];
            $repeticiones  = $_POST['repeticiones']    ?? [];

            $model = new RutinasModel();
            $model->updateRutina($id, $nombre_rutina, $fechaTiempo, $objetivo,
                $ejercicios, $platos, $sesiones,
                $series, $repeticiones, $peso);

            header('Location: index.php?controller=Rutinas&action=redirectRutinas');
            exit;
        }
    }

    public function editAgregarEjercicio(){
        if (isset($_POST['id'])) {
            $_SESSION['rutinaId'] = $_POST['id_rutina'];
            $id              = $_POST['id'];
            $nombreEjercicio = $_POST['nombreEjercicio'];
            $descripcion     = $_POST['descripcion'];
            $foto            = $_POST['foto'];
            $calorias        = $_POST['calorias'];
            $rutinaEjercicio = new RutinasModel();
            $rutinaEjercicio->guardarEjercicio($id, $nombreEjercicio, $descripcion, $foto, $calorias);
        }
        header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
        exit;
    }
    public function quitarEditEjercicio(){
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $quitarEjercicio = new RutinasModel();
            $quitarEjercicio->eliminarEjercicio($index);
        }
        header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
        exit;
    }
    public function editAgregarPlato(){
        if (isset($_POST['id'])) {
            $_SESSION['rutinaId'] = $_POST['id_rutina'];
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
        header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
        exit;
    }
    public function quitarEditPlato(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $quitarPlato = new RutinasModel();
            $quitarPlato->eliminarPlato($index);
        }
        header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
        exit;
    }
    public function agregarEditSesion(){
        if (isset($_POST['id'])) {
            $_SESSION['rutinaId'] = $_POST['id_rutina'];
            $id       = $_POST['id'];
            $nombreClase = $_POST['nombreClase'];
            $tipoDeClases = $_POST['tipoDeClases'];
            $fechaClases = $_POST['fechaClases'];
            $duracion = $_POST['duracion'];
            $id_entrenador = $_POST['id_entrenador'];
            $descripcion = $_POST['descripcion'];
            $foto = $_POST['foto'];
            $calorias = $_POST['calorias'];

            $rutinaSesiones = new RutinasModel();
            $rutinaSesiones->agregarSesion($id, $nombreClase, $tipoDeClases, $fechaClases, $duracion, $id_entrenador, $descripcion, $foto, $calorias);
        }
        header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
        exit;
    }
    public function quitarEditSesion()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $quitarSesion = new RutinasModel();
            $quitarSesion->eliminarSesion($index);
        }
        header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
        exit;
    }
}
