<?php

require_once __DIR__ . "/../models/ResumenModel.php";

class ResumenController
{
    public function index()
    {
        $idUsuario = $_SESSION['usuario'] ?? null;

        if (!$idUsuario) {
            header("Location: index.php?controller=Auth&action=login");
            exit;
        }

        $fechaInicio = $_GET['fecha_inicio'] ?? date('Y-m-01');
        $fechaFin = $_GET['fecha_fin'] ?? date('Y-m-d');

        $model = new ResumenModel();

        $resumen = $model->getCaloriasConsumidasPorFechas(
            $idUsuario,
            $fechaInicio,
            $fechaFin
        );

        require_once __DIR__ . "/../views/Objetivo/resumen_ver.php";
    }
    public function verResumen()
    {
    	$this->index();
}
}
