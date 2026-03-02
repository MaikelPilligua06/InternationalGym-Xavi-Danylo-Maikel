<?php

require_once "db.php";
require_once "SesionesDeClases.php";
class SesionesModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = conectar();
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM SesionesDeClases Order by fechaClases DESC");
        $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sesiones = [];
        foreach ($filas as $fila) {
            $sesiones = new SesionesDeClases($fila);
        }
        return $sesiones;
    }

    public function asignarSesion($id_usuario, $id_sesion): bool
    {
        $stmt = $this->pdo->prepare("INSERT IGNORE INTO Usuario_Sesion (id_usuario, id_sesion) VALUES (?, ?)");
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

    public function save(SesionesDeClases $sesiones): bool
    {
        $db = conectar();
        $estadosValidos = ['Cardio', 'Cycling', 'trenSuperior', 'trenInferior'];
        $estado = in_array($sesiones->tipoDeClases, $estadosValidos) ? $sesiones->tipoDeClases : 'Cardio';
        $stmt = $db->prepare("INSERT INTO SesionesDeClases (tipoClases, fechaClases, duracion, id_entrenador, id_usuario) VALUES (:tipoClases, :fechaClases, :duracion, :id_entrenador, :id_usuario)");

        return $stmt->execute([
            ':tipoClases'   => $estado,
            ':fechaClases' => $sesiones->fechaClases,
            ':duracion' => $sesiones->duracion,
            ':id_entrenador' => $sesiones->id_entrenador,
            ':id_usuario' => $sesiones->id_usuario

        ]);
        }


}
