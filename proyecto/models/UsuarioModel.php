<?php
require_once 'Usuario.php';
require_once 'db.php';

class UsuarioModel {
    public function getAll($usuarioId){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Usuarios WHERE id = :usuarioId ");
        $stmt->execute([':usuarioId' => $usuarioId]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuario = [];

        foreach ($resultado as $fila) {
            $usuario = new Usuario($fila);
        }

        return $usuario;
    }
    public function getEntrenadorUsuario($usuarioId){
        $db = conectar();
        $stmt = $db->prepare("
            SELECT e. id, e.nombre, e.apellido, e.correoElectronico, e.descripcion
            FROM Entrenadores e
            JOIN Usuarios u ON e.id = u.id_entrenador
            WHERE u.id = :usuarioId;
        ");
        $stmt->execute([":usuarioId" => $usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
