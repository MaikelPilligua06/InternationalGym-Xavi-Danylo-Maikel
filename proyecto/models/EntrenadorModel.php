<?php
require_once "db.php";
require_once "Usuario.php";
require_once "SesionesDeClases.php";

class EntrenadorModel{
    // Función en la que se recoje el nombre, apellido, descripcion, y correo electronico del entrenador para que se le
    // muestre al usuario asignado
    public function getUsuarioEntrenador($userId){
        try{
            $db = conectar();
            $stmt = $db->prepare("
                SELECT u.id, u.nombreUsuario, u.apellido, u.correoElectronico, u.foto, u.descripcion
                FROM Usuarios u
                JOIN UsuarioEntrenador ue ON u.id = ue.id_entrenador
                WHERE ue.id_usuario = :usuarioId
            ");
            $stmt->execute([":usuarioId" => $userId]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener tu entrenador");
        }
    }
    public function getAll(){
        try{
            $db = conectar();
            $stmt = $db->query("
                SELECT id, nombreUsuario, descripcion, apellido, correoElectronico, foto
                FROM Usuarios
                WHERE rol = 'entrenador'
                ");
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $entrenadores = [];
            foreach($resultado as $entrenador){
                $entrenadores[] = new Usuario($entrenador);
            }
            return $entrenadores;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener los entrenadores");
        }
    }
    public function verEntrenador($id){
        try{
            $db = conectar();
            $stmt = $db->prepare("            
                SELECT id, nombreUsuario, apellido, correoElectronico, foto
                FROM Usuarios
                WHERE id = :id AND rol = 'entrenador'");
            $stmt->execute([":id" => $id]);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!$resultado) {
                throw new Exception("Entrenador no encontrado.");
            }
            foreach($resultado as $entrenadores){
                $entrenador = new Usuario($entrenadores);
            }
            return $entrenador;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener el entrenador");
        }
    }
    public function verSesiones($id){
        try {
            $db = conectar();
            $stmt = $db->prepare("
                SELECT s.id, s.nombreClase, s.calorias, s.tipoDeClases, s.fechaClases, s.duracion, s.descripcion
                FROM SesionesDeClases s
                WHERE s.id_entrenador = :id
                ");
            $stmt->execute([':id' => $id]);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sesiones = [];
            foreach ($resultado as $sesion) {
                $sesiones[] = new SesionesDeClases($sesion);
            }
            return $sesiones;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error las sesiones del entrenador");
        }
    }
    public function updateEntrenador($id, $usuario) {
        try {
            $db = conectar();
            $stmt = $db->prepare("UPDATE UsuarioEntrenador SET id_entrenador = :id_entrenador WHERE id_usuario = :id_usuario");
            $stmt->execute([
                ":id_entrenador" => $id,
                ":id_usuario"    => $usuario
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al cambiar el entrenador");
        }
    }
}