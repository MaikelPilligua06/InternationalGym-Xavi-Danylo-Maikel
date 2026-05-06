<?php

require_once __DIR__ . "/db.php";

class ResumenModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = conectar();
    }

    public function getCaloriasConsumidasPorFechas($idUsuario, $fechaInicio, $fechaFin)
    {
        $stmt = $this->db->prepare("
            SELECT COALESCE(SUM(calorias), 0) AS totalCalorias
            FROM Alimentacion
            WHERE id_usuario = ?
            AND fecha_registro BETWEEN ? AND ?
        ");

        $stmt->execute([
            $idUsuario,
            $fechaInicio,
            $fechaFin
        ]);

        return $stmt->fetch();
    }
}