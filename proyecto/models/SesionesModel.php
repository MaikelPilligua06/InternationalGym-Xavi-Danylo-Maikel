<?php

require_once "db.php";
require_once "SesionesDeClases.php";
class SesionesModel{
    public function getAll(){
        $db = conectar();
        $stmt = $db->query("SELECT * FROM SesionesDeClases Order by fechaClases DESC");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sesiones = [];
        foreach ($resultado as $fila) {
            $sesiones[] = new SesionesDeClases($fila);
        }
        return $sesiones;
    }

    public function asignarSesion($id, $usuario){
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO Usuario_Sesion (id_usuario, id_sesion) VALUES (:id_usuario, :id_sesion)");
        $stmt->execute([
            ':id_usuario' => $usuario,
            ':id_sesion' => $id
        ]);
    }

    public function sesionUsuario($usuario) {
        $db = conectar();
        $stmt = $db->prepare("
SELECT sesiones.*, usuario_sesion.id_usuario
FROM SesionesDeClases sesiones
JOIN Usuario_Sesion usuario_sesion 
ON sesiones.id = usuario_sesion.id_sesion
WHERE usuario_sesion.id_usuario = :id;
    ");

        $stmt->execute([':id' => $usuario]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function sesionesCrear($sesion, $id_entrenador){
        $db = conectar();
        $stmt = $db->prepare("
        INSERT INTO SesionesDeClases
        (nombre, tipoDeClases, fechaClases, duracion, descripcion, id_entrenador)
        VALUES
        (:nombre, :tipoDeClases, :fechaClases, :duracion, :descripcion, :id_entrenador)
    ");
        $stmt->execute([
            ':nombre' => $sesion->nombre,
            ':tipoDeClases' => $sesion->tipoDeClases,
            ':fechaClases' => $sesion->fechaClases,
            ':duracion' => $sesion->duracion,
            ':descripcion' => $sesion->descripcion,
            ':id_entrenador' => $id_entrenador
        ]);
    }
    public function ver($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM SesionesDeClases where id = :id");
        $stmt->execute([':id' => $id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return new SesionesDeClases($fila);
    }
    public function delete($id){
        $db = conectar();
        $stmt = $db->prepare("DELETE FROM Usuario_Sesion WHERE id_sesion = :id");
        $stmt->execute([':id' => $id]);
    }
    public function misPub($usuario){
        $db = conectar();
        $stmt = $db->prepare("
            SELECT s.id, s.nombre, s.tipoDeClases, s.fechaClases, s.duracion, s.descripcion
            FROM SesionesDeClases s
            INNER JOIN Entrenadores e ON s.id_entrenador = e.id
            WHERE e.id = :id
            ");
        $stmt->execute([':id' => $usuario]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sesiones = [];
        foreach ($resultado as $sesion) {
            $sesiones[] = new SesionesDeClases($sesion);
        }
        return $sesiones;
    }
}
