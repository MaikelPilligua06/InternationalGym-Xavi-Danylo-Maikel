<?php
require_once "db.php";
require_once "Entrenador.php";

class EntrenadorModel{
    // Función en la que se recoje el nombre, apellido, descripcion, y correo electronico del entrenador para que se le
    // muestre al usuario asignado
    public function getUsuarioEntrenador($userId){
        $db = conectar();
        $stmt = $db->prepare("
            SELECT e.nombre, e.apellido, e.correoElectronico, e.descripcion
            FROM Entrenadores e
            JOIN Usuarios u ON e.id = u.id_entrenador
            WHERE u.id = :usuarioId;
        ");
        $stmt->execute([":usuarioId" => $userId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAll(){
        $db = conectar();
        $stmt = $db->query("SELECT nombre, apellido, correoElectronico, descripcion FROM Entrenadores");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entrenadores = [];
        foreach($resultado as $entrenador){
            $entrenadores[] = new Entrenador($entrenador);
        }
        return $entrenadores;
    }
}