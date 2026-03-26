<?php
require_once "db.php";
require_once "Alimentacion.php";
class AlimentacionModel{
    public function getAll ($usuarioId){
        $db = conectar();
        $stmt = $db->prepare(
            "
                SELECT a.nombrePlato, a.calorias, a.proteinas, a.descripcion, u.usuario
                FROM Alimentacion a
                JOIN Usuario_Alimentacion ua ON a.id = ua.id_alimentacion
                JOIN Usuarios u ON u.id = ua.id_usuario
                WHERE ua.id_usuario = :usuarioId
                "
        );
        $stmt->execute([":usuarioId" => $usuarioId]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $alimentacion = [];
        foreach ($resultado as $fila) {
            $alimentacion = new Alimentacion($fila);
        }
        return $alimentacion;
    }
    //
    //public function alimentacionUsuario ($usuario){
    //    $db = conectar();
     //   $stmt = $db->query("
            // Falta hacer un select donde se recogerian los siguientes datos:
            // select donde se recogerian el id del usuario y de los platos entre 3 tablas. 
       // ");
        //$stmt->execute(['id' => $usuario]);
        //return $stmt->fetch(PDO::FETCH_ASSOC);
    //}
    public function getPlato($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Alimentacion WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Alimentacion($fila);
    }
    public function agregarPlato($id, $usuarioId){
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO Usuario_Alimentacion (id_usuario, id_alimentacion) VALUES (:id, :id_alimentacion)");
        $stmt->execute([
            ':id' => $usuarioId,
            ':id_alimentacion' => $id
        ]);
    }
    public function eliminarPlatoUsuario($id, $usuarioId){
        $db = conectar();
        $stmt = $db->prepare("DELETE FROM Usuario_Alimentacion WHERE id_alimentacion = :id AND id_usuario = :id_usuario");
        $stmt->execute([
            ':id' => $usuarioId,
            ':id_alimentacion' => $id
        ]);
    }
    public function getCalorias($usuarioId){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Usuario_Alimentacion");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {

        }
    }
}