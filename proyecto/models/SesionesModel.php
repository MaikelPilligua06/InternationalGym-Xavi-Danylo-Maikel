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

    public function asignarSesion($id_usuario, $id_sesion): bool
    {
        $stmt = $this->db->prepare("INSERT IGNORE INTO Usuario_Sesion (id_usuario, id_sesion) VALUES (?, ?)");
        return $stmt->execute([$id_usuario, $id_sesion]);
    }

    //public function getSesionesUsuario($id_usuario) {
        // $stmt = $this->pdo->prepare("
            //SELECT s.* FROM SesionesDeClases s
            //INNER JOIN Usuario_Sesion us ON s.id = u.id_sesion
            //WHERE u.id_usuario = ?
        //");
        //$stmt->execute([$id_usuario]);
        //return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //}

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
}
