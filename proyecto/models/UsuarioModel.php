<?php
require_once 'Usuario.php';
require_once 'db.php';

class UsuarioModel {
    public function getAll($usuarioId){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Usuarios WHERE id = :usuarioId ");
        $stmt->execute(['usuarioid' => $usuarioId]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $usuario = [];
        foreach ($resultado as $fila){
            $usuario = new Usuario($fila);
        }
        return $usuario;
    }
}
