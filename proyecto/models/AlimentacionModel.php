<?php
require_once "db.php";
require_once "Alimentacion.php";
class AlimentacionModel{
    public function getAll ($objetivo){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Alimentacion where objetivo = :objetivo");
        $stmt->execute([":objetivo" => $objetivo]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Alimentacion($fila);
    }
    public function alimentacionUsuario ($usuario){
        $db = conectar();
        $stmt = $db->prepare("");
    }
}