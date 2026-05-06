<?php

require_once __DIR__ . "/db.php";

class ChatModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = conectar();
    }

    public function obtenerMensajes($idUsuario, $idEntrenador)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM Chat
            WHERE id_usuario = ?
              AND id_entrenador = ?
            ORDER BY fechaHora ASC
        ");

        $stmt->execute([
            $idUsuario,
            $idEntrenador
        ]);

        return $stmt->fetchAll();
    }

    public function guardarMensaje($idUsuario, $idEntrenador, $enviadoPor, $mensaje)
    {
        $stmt = $this->db->prepare("
            INSERT INTO Chat (
                id_usuario,
                id_entrenador,
                enviado_por,
                mensaje,
                fechaHora
            ) VALUES (
                ?,
                ?,
                ?,
                ?,
                NOW()
            )
        ");

        return $stmt->execute([
            $idUsuario,
            $idEntrenador,
            $enviadoPor,
            $mensaje
        ]);
    }

    public function obtenerClientesConChat($idEntrenador)
    {
        $stmt = $this->db->prepare("
            SELECT DISTINCT
                u.id,
                u.nombreUsuario,
                u.apellido,
                u.correoElectronico
            FROM Usuarios u
            INNER JOIN Chat c ON c.id_usuario = u.id
            WHERE c.id_entrenador = ?
            ORDER BY u.nombreUsuario ASC
        ");

        $stmt->execute([$idEntrenador]);

        return $stmt->fetchAll();
    }

    public function obtenerClientesAsignados($idEntrenador)
    {
        $stmt = $this->db->prepare("
            SELECT
                id,
                nombreUsuario,
                apellido,
                correoElectronico
            FROM Usuarios
            WHERE id_entrenador = ?
            ORDER BY nombreUsuario ASC
        ");

        $stmt->execute([$idEntrenador]);

        return $stmt->fetchAll();
    }
}
