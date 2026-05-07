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
            SELECT e. id, e.nombreEntrenador, e.apellido, e.correoElectronico, e.descripcion
            FROM Entrenadores e
            JOIN Usuarios u ON e.id = u.id_entrenador
            WHERE u.id = :usuarioId;
        ");
        $stmt->execute([":usuarioId" => $usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function save($usuario){
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO Usuarios (nombreUsuario, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, edad, genero, peso, altura, objetivo, fechaDeAlta, foto, id_entrenador)");
        $stmt->execute();
    }
    public function getEntrenadores(){
        $db = conectar();
        $stmt = $db->query("SELECT id, nombreEntrenador, apellido, correoElectronico, descripcion FROM Entrenadores");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entrenadores = [];
        foreach($resultado as $entrenador){
            $entrenadores[] = new Entrenador($entrenador);
        }
        return $entrenadores;
    }
}
