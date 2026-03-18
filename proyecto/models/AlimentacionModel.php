<?php
require_once "db.php";
require_once "Alimentacion.php";
class AlimentacionModel{
    public function getAll ($objetivo){
        $db = conectar();
        $stmt = db->query("SELECT * FROM Alimentacion where objetivo = :objetivo");
        $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
        $alimentacion = [];
        foreach ($resultado as $fila) {
            $alimentacion [] = new Alimentacion($fila);
        }
        return $alimentacion;
    }
    public function alimentacionUsuario ($usuario){
        $db = conectar();
        $stmt = $db->prepare("");
    }
}