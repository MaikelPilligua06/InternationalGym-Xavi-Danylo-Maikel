<?php
require_once __DIR__ . "/../models/ResumenModel.php";
require_once "models/SesionesModel.php";
require_once "models/RutinasModel.php";

class ResumenController
{
    public function index() {
        try {
            $usuario = $_SESSION['id'];
            $id = $usuario;
            $model = new ResumenModel();
            $sesiones = new SesionesModel();
            $rutina = new RutinasModel();
            $entrenadorSesiones = ($usuario) ? $sesiones->sesionesUsuarioEntrenador($usuario) : [];
            $resumen = $model->getAll();
            $rutinas = ($id) ? $rutina->getRutinaDiaria($id) : [];
            require "views/mainpage/main_page.php";
        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
    public function verResumen()
    {
        try {
            $usuarioId = $_SESSION['usuario'];

            $fechaInicio = trim(htmlspecialchars($_GET['fecha_inicio'] ?? date('Y-m-01')));
            $fechaFin    = trim(htmlspecialchars($_GET['fecha_fin']    ?? date('Y-m-d')));

            $model = new ResumenModel();

            $resumen = $model->getCaloriasConsumidasPorFechas($usuarioId, $fechaInicio, $fechaFin);

            require "views/Objetivo/resumen_ver.php";

        } catch (Exception $e) {
            $_SESSION['error_fatal'] = $e->getMessage();
            require "views/error_fatal.php";
        }
    }
}