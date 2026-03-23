<?php
require_once "db.php";
require_once "Alimentacion.php";
class AlimentacionModel{
    public function getAll ($objetivo){
        $db = conectar();
        $stmt = $db->query("SELECT * FROM Alimentacion where objetivo = :objetivo");
        $stmt->execute([":objetivo" => $objetivo]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $alimentacion = [];
        foreach ($resultado as $fila) {
            $alimentacion[] = new SesionesDeClases($fila);
        }
        return $alimentacion;
    }
    public function alimentacionUsuario ($usuario){
        $db = conectar();
        $stmt = $db->query("
            // Falta hacer un select donde se recogerian los siguientes datos:
            // select donde se recogerian el id del usuario y de los platos entre 3 tablas. 
        ");
        $stmt->execute(['id' => $usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}