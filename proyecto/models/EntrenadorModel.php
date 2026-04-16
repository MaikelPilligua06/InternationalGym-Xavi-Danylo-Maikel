<?php
require_once "db.php";
require_once "Entrenador.php";
require_once "SesionesDeClases.php";

class EntrenadorModel{
    // Función en la que se recoje el nombre, apellido, descripcion, y correo electronico del entrenador para que se le
    // muestre al usuario asignado
    public function getUsuarioEntrenador($userId){
        $db = conectar();
        $stmt = $db->prepare("
            SELECT e.id, e.nombreEntrenador, e.apellido, e.correoElectronico, e.descripcion
            FROM Entrenadores e
            JOIN Usuarios u ON e.id = u.id_entrenador
            WHERE u.id = :usuarioId;
        ");
        $stmt->execute([":usuarioId" => $userId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAll(){
        $db = conectar();
        $stmt = $db->query("SELECT id, nombre, apellido, correoElectronico, descripcion FROM Entrenadores");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entrenadores = [];
        foreach($resultado as $entrenador){
            $entrenadores[] = new Entrenador($entrenador);
        }
        return $entrenadores;
    }
    public function verEntrenador($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Entrenadores where id = :id");
        $stmt->execute([":id" => $id]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $entrenadores){
            $entrenador = new Entrenador($entrenadores);
        }
        return $entrenador;
    }
    public function verSesiones($id){
        $db = conectar();
        $stmt = $db->prepare("
            SELECT s.id, s.nombre, s.tipoDeClases, s.fechaClases, s.duracion, s.descripcion
            FROM SesionesDeClases s
            INNER JOIN Entrenadores e ON s.id_entrenador = e.id
            WHERE e.id = :id
            ");
        $stmt->execute([':id' => $id]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sesiones = [];
        foreach ($resultado as $sesion) {
            $sesiones[] = new SesionesDeClases($sesion);
        }
        return $sesiones;
    }
}