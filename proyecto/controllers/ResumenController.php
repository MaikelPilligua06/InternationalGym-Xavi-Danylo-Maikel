<?php
require_once __DIR__ . "/../models/ResumenModel.php";

class ResumenController
{
    public function index() {
        $model = new ResumenModel();
        $resumen = $model->getAll();
        require "views/mainpage/main_page.php";

    }
    public function verResumen() {
        $usuarioSesion = $_SESSION['usuario'] ?? null;
        if (is_array($usuarioSesion)) {
            $idUsuario = $usuarioSesion['id'] ?? $usuarioSesion['id_usuario'] ?? null;
        } else {
            $idUsuario = $usuarioSesion;
        }
        if (!$idUsuario) {
            header("Location: index.php?controller=Auth&action=login");
            exit;
        }


        $fechaInicio = $_GET['fecha_inicio'] ?? date('Y-m-01');
        $fechaFin = $_GET['fecha_fin'] ?? date('Y-m-d');

        $model = new ResumenModel();

        $resumen = $model->getCaloriasConsumidasPorFechas($idUsuario);

        require_once __DIR__ . "/../views/Objetivo/resumen_ver.php";

    }
}