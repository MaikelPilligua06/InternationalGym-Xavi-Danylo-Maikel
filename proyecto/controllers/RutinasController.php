<?php
require_once "models/RutinasModel.php";

class RutinasController{
    public function redirectRutinas(){
        try{
            $id = $_SESSION['id'];
            $modelo = new RutinasModel();
            $ver = $modelo->verRutinas($id);
            $rutinas   = ($id) ? $modelo->getRutinaUsuario($id) : [];
            $diaRutina = ($id) ? $modelo->getRutinaDiaria($id)  : [];
            require "views/Rutinas/rutinas_ver.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function crearRutinaDiaria(){
        try{
        $usuarioId = $_SESSION['id'];
        $model = new RutinasModel();
        $rutinaDiaria = $model->rutinaDiaria($_GET['id'], $usuarioId);
        header('Location: index.php?controller=Rutinas&action=redirectRutinas');
        exit();
        }  catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    // Función para crear una rutina Usuario
    public function crearRutina(){
        try {
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
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function agregarEjercicio(){
        try {
            if (isset($_POST['id'])) {
                $id = trim(htmlspecialchars($_POST['id']));
                $nombreEjercicio = trim(htmlspecialchars($_POST['nombreEjercicio']));
                $descripcion = trim(htmlspecialchars($_POST['descripcion']));
                $foto = trim(htmlspecialchars($_POST['foto']));
                $calorias = trim(htmlspecialchars($_POST['calorias']));

                $rutinaEjercicio = new RutinasModel();
                $rutinaEjercicio->guardarEjercicio($id, $nombreEjercicio, $descripcion, $foto, $calorias);
            }
            $_SESSION['mensaje'] = "Ejercicio añadido correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function quitarEjercicio(){
        try{
            if (isset($_GET['index'])) {
                $index = trim(htmlspecialchars($_GET['index']));

                $quitarEjercicio = new RutinasModel();
                $quitarEjercicio->eliminarEjercicio($index);
            }
            $_SESSION['mensaje'] = "Ejercicio eliminado correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function agregarPlato()
    {
        try {
            if (isset($_POST['id'])) {
                $id = trim(htmlspecialchars($_POST['id']));
                $objetivo = trim(htmlspecialchars($_POST['objetivo']));
                $calorias = trim(htmlspecialchars($_POST['calorias']));
                $nombrePlato = trim(htmlspecialchars($_POST['nombrePlato']));
                $descripcion = trim(htmlspecialchars($_POST['descripcion']));
                $proteinas = trim(htmlspecialchars($_POST['proteinas']));
                $carbohidratos = trim(htmlspecialchars($_POST['carbohidratos']));
                $grasas = trim(htmlspecialchars($_POST['grasas']));
                $foto = trim(htmlspecialchars($_POST['foto']));

                $rutinaPlato = new RutinasModel();
                $rutinaPlato->guardarPlato($id, $objetivo, $calorias, $nombrePlato, $descripcion, $proteinas, $carbohidratos, $grasas, $foto);
            }
            $_SESSION['mensaje'] = "Plato añadido correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function quitarPlato(){
        try{
            if(isset($_GET['index'])){
                $index = trim(htmlspecialchars($_GET['index']));
                $quitarPlato = new RutinasModel();
                $quitarPlato->eliminarPlato($index);
            }
            $_SESSION['mensaje'] = "Plato quitado correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function agregarSesion(){
        try{
            if (isset($_POST['id'])) {
                $id            = trim(htmlspecialchars($_POST['id']));
                $nombreClase   = trim(htmlspecialchars($_POST['nombreClase']));
                $tipoDeClases  = trim(htmlspecialchars($_POST['tipoDeClases']));
                $fechaClases   = trim(htmlspecialchars($_POST['fechaClases']));
                $duracion      = trim(htmlspecialchars($_POST['duracion']));
                $id_entrenador = trim(htmlspecialchars($_POST['id_entrenador']));
                $descripcion   = trim(htmlspecialchars($_POST['descripcion']));
                $foto          = trim(htmlspecialchars($_POST['foto']));
                $calorias      = trim(htmlspecialchars($_POST['calorias']));

                $rutinaSesiones = new RutinasModel();
                $rutinaSesiones->agregarSesion($id, $nombreClase, $tipoDeClases, $fechaClases, $duracion, $id_entrenador, $descripcion, $foto, $calorias);
            }
            $_SESSION['mensaje'] = "Sesion añadida correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function quitarSesion(){
        try{
            if(isset($_GET['index'])){
                $index = trim(htmlspecialchars($_GET['index']));
                $quitarSesion = new RutinasModel();
                $quitarSesion->eliminarSesion($index);
            }
            $_SESSION['mensaje'] = "Sesion quitada correctamente";
            header('Location: index.php?controller=Rutinas&action=crearRutina');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function guardar() {
        try{
            if (!empty($_POST)) {
                $nombre_rutina = trim(htmlspecialchars($_POST['nombreRutina']));
                $fechaTiempo   = trim(htmlspecialchars($_POST['fechaTiempo']));
                $objetivo      = trim(htmlspecialchars($_POST['objetivo']));
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
            $_SESSION['mensaje'] = "Rutina guardada correctamente";
            header('Location: index.php?controller=Rutinas&action=redirectRutinas');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function volver(){
        unset($_SESSION['rutina_ejercicios']);
        unset($_SESSION['rutina_platos']);
        unset($_SESSION['rutina_sesiones']);
        header('Location: index.php?controller=Rutinas&action=redirectRutinas');
        exit;
    }
    // Unicamente se borra la rutina del dia, pero se podrá asignar de nuevo como la del dia
    public function deleteRutinaDiaria(){
        try {
            $usuarioId = $_SESSION['id'];
            $model = new RutinasModel();
            $rutinaDiaria = $model->eliminarRutinaDia($_GET['id'], $usuarioId);
            $_SESSION['mensaje'] = "Rutina diaria eliminada";
            header('Location: index.php?controller=Rutinas&action=redirectRutinas');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    // Se borra la rutina del sistema
    public function eliminarRutinaDef(){
        try{
            $usuarioId = $_SESSION['id'];
            $model = new RutinasModel();
            $delete = $model->deleteRutina($_GET['id'], $usuarioId);
            $_SESSION['mensaje'] = "Rutina eliminada";
            header('Location: index.php?controller=Rutinas&action=redirectRutinas');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    // Ver los detalles de una Rutina
    public function verRutina()
    {
        try {
            $modelo = new RutinasModel();
            $rutinas = $modelo->getById($_GET['id']);
            require "views/Rutinas/rutinasInfo.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function getRutinaActualizar()
    {
        try {
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
            $id = $_SESSION['id'];
            $model = new RutinasModel();
            $rutinas = $model->getById($_SESSION['rutinaId']);
            $usuarioEjercicios = $model->getUsuariosEjercicios($id);
            $todoslosEjercicios = $model->getTodosLosEjercicios();
            $usuarioAlimentacion = $model->getUsuarioAlimentacion($id);
            $todosLosPlatos = $model->getTodosLosPlatos();
            $usuarioSesiones = $model->getUsuarioSesion($id);
            $todasLasSesiones = $model->getTodasLasSesiones();
            require 'views/Rutinas/rutinasEditar.php';
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function actualizarRutiar()
    {
        try {
            if (!empty($_POST)) {
                $id = $_GET['id'];
                $nombre_rutina = trim(htmlspecialchars($_POST['nombreRutina']));
                $fechaTiempo   = trim(htmlspecialchars($_POST['fechaTiempo']));
                $objetivo      = trim(htmlspecialchars($_POST['objetivo']));
                $ejercicios = $_POST['id_ejercicio'] ?? [];
                $platos = $_POST['id_plato'] ?? [];
                $sesiones = $_POST['id_sesion'] ?? [];
                $peso = $_POST['peso'] ?? [];
                $series = $_POST['series'] ?? [];
                $repeticiones = $_POST['repeticiones'] ?? [];

                $model = new RutinasModel();
                $model->updateRutina($id, $nombre_rutina, $fechaTiempo, $objetivo,
                    $ejercicios, $platos, $sesiones,
                    $series, $repeticiones, $peso);
                $_SESSION['mensaje'] = "Rutina actualizada";
                header('Location: index.php?controller=Rutinas&action=redirectRutinas');
                exit;
            }
        } catch (Exception $e) {
                $_SESSION['error_fatal'] = $e->getMessage();
                require "views/error_fatal.php";
            }
    }

    public function editAgregarEjercicio(){
        try {
            if (isset($_POST['id'])) {
                $_SESSION['rutinaId'] = $_POST['id_rutina'];
                $id = $_POST['id'];
                $nombreEjercicio = trim(htmlspecialchars($_POST['nombreEjercicio']));
                $descripcion     = trim(htmlspecialchars($_POST['descripcion']));
                $foto            = trim(htmlspecialchars($_POST['foto']));
                $calorias        = trim(htmlspecialchars($_POST['calorias']));
                $rutinaEjercicio = new RutinasModel();
                $rutinaEjercicio->guardarEjercicio($id, $nombreEjercicio, $descripcion, $foto, $calorias);
            }
            $_SESSION['mensaje'] = "Ejercicio añadido correctamente";
            header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function quitarEditEjercicio(){
        try {
            if (isset($_GET['index'])) {
                $index = trim(htmlspecialchars($_GET['index']));
                $quitarEjercicio = new RutinasModel();
                $quitarEjercicio->eliminarEjercicio($index);
            }
            $_SESSION['mensaje'] = "Ejercicio eliminado correctamente";
            header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function editAgregarPlato(){
        try {
            if (isset($_POST['id'])) {
                $_SESSION['rutinaId'] = $_POST['id_rutina'];
                $id = $_POST['id'];
                $objetivo      = trim(htmlspecialchars($_POST['objetivo']));
                $calorias      = trim(htmlspecialchars($_POST['calorias']));
                $nombrePlato   = trim(htmlspecialchars($_POST['nombrePlato']));
                $descripcion   = trim(htmlspecialchars($_POST['descripcion']));
                $proteinas     = trim(htmlspecialchars($_POST['proteinas']));
                $carbohidratos = trim(htmlspecialchars($_POST['carbohidratos']));
                $grasas        = trim(htmlspecialchars($_POST['grasas']));
                $foto          = trim(htmlspecialchars($_POST['foto']));
                $rutinaPlato = new RutinasModel();
                $rutinaPlato->guardarPlato($id, $objetivo, $calorias, $nombrePlato, $descripcion, $proteinas, $carbohidratos, $grasas, $foto);
            }
            $_SESSION['mensaje'] = "Plato añadido correctamente";
            header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function quitarEditPlato(){
        try {
            if (isset($_GET['index'])) {
                $index = trim(htmlspecialchars($_GET['index']));
                $quitarPlato = new RutinasModel();
                $quitarPlato->eliminarPlato($index);
            }
            $_SESSION['mensaje'] = "Plato quitado correctamente";
            header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
            exit;
        }  catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function agregarEditSesion(){
        try {
            if (isset($_POST['id'])) {
                $_SESSION['rutinaId'] = $_POST['id_rutina'];
                $id = $_POST['id'];
                $nombreClase = trim(htmlspecialchars($_POST['nombreClase']));
                $tipoDeClases = trim(htmlspecialchars($_POST['tipoDeClases']));
                $fechaClases = trim(htmlspecialchars($_POST['fechaClases']));
                $duracion = trim(htmlspecialchars($_POST['duracion']));
                $id_entrenador = trim(htmlspecialchars($_POST['id_entrenador']));
                $descripcion = trim(htmlspecialchars($_POST['descripcion']));
                $foto = trim(htmlspecialchars($_POST['foto']));
                $calorias = trim(htmlspecialchars($_POST['calorias']));

                $rutinaSesiones = new RutinasModel();
                $rutinaSesiones->agregarSesion($id, $nombreClase, $tipoDeClases, $fechaClases, $duracion, $id_entrenador, $descripcion, $foto, $calorias);
            }
            $_SESSION['mensaje'] = "Sesion añadida correctamente";
            header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function quitarEditSesion()
    {
        try {
            if (isset($_GET['index'])) {
                $index = trim(htmlspecialchars($_GET['index']));
                $quitarSesion = new RutinasModel();
                $quitarSesion->eliminarSesion($index);
            }
            $_SESSION['mensaje'] = "Sesion quitada correctamente";
            header('Location: index.php?controller=Rutinas&action=getRutinaActualizar&id=' . $_SESSION['rutinaId']);
            exit;
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
}
