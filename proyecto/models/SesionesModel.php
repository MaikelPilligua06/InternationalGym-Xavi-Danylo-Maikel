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

    public function save(SesionesDeClases $sesiones){
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO SesionesDeClases (tipoDeClases, fechaClases, duracion, id_entrenador)  VALUES (:tipoDeClase, :fechaClases, :duracion, :entrenador)");
        $stmt->execute([
            'tipoDeClases' => $sesiones->tipoDeClases,
            'fechaClases' => $sesiones->fechaClases,
            'duracion' => $sesiones->duracion,
            'id_entrenador' => $sesiones->id_entrenador
        ]);
    }
}
