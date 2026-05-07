<?php

require_once __DIR__ . "/db.php";

class ResumenModel
{

    private PDO $db;

    public function getAll() {
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM ResumenDiario");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resumen = [];
        foreach ($resultado as $fila) {
            $resumen = new ResumenDiario($fila);
        }
        return $resumen;
    }

    public function __construct()
    {
        $this->db = conectar();
    }

    // Se eliminan los parámetros de fecha de la función para que coincida con el execute
    public function getCaloriasConsumidasPorFechas($idUsuario)
    {
        $stmt = $this->db->prepare("
            SELECT COALESCE(SUM(a.calorias), 0) AS totalCalorias
            FROM Alimentacion a
            JOIN Usuario_Alimentacion ua ON a.id = ua.id_alimentacion
            WHERE ua.id_usuario = ?
        ");

        $stmt->execute([$idUsuario]);

        return $stmt->fetch();
    }
}