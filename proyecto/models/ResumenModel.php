<?php
require_once "db.php";
require_once "ResumenDiario.php";
class ResumenModel{
    public function getAll(){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM ResumenDiario");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resumen = [];
        foreach ($resultado as $fila){
            $resumen = new ResumenDiario($fila);
        }
        return $resumen;
    }

}
?>