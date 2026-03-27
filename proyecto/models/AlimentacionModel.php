<?php
require_once "db.php";
require_once "Alimentacion.php";
class AlimentacionModel{
    public function getPlatosUsuario ($usuarioId){
        $db = conectar();
        $stmt = $db->prepare(
            "
                SELECT a.nombrePlato, a.calorias, a.proteinas, a.descripcion, u.id
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

    public function getTodosLosPlatos($objetivo){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Alimentacion WHERE objetivo = :objetivo");
        $stmt->execute([':objetivo' => $objetivo]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $todosLosPlatos = [];
        foreach ($resultado as $fila) {
            $todosLosPlatos[] = new Alimentacion($fila);
        }
        return $todosLosPlatos;
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
    public function guardar($plato){
        $db = conectar();
        $stmt = $db->prepare("
            INSERT INTO Alimentacion 
            (objetivo, calorias, nombrePlato, descripcion, proteinas, carbohidratos, grasas) 
            VALUES 
            (:objetivo, :calorias, :nombrePlato, :descripcion, :proteinas, :carbohidratos, :grasas)
        ");
        $stmt->execute([
           ':objetivo' => $plato->objetivo,
           ':calorias' => $plato->calorias,
           ':nombrePlato' => $plato->nombrePlato,
           ':descripcion' => $plato->descripcion,
           ':proteinas' => $plato->proteinas,
           ':carbohidratos' => $plato->carbohidratos,
           ':grasas' => $plato->grasas
        ]);
    }
}