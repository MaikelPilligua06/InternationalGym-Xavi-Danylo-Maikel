<?php
require_once "db.php";
require_once "Ejercicios.php";

class EjerciciosModel{

    //Funcion para ver la información que contiene un ejercicio
    public function getAll(){
        $db = conectar();
        $stmt = $db->query("SELECT * FROM Ejercicios");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $ejercicio = [];
        foreach ($resultado as $fila) {
            $ejercicio[] = new Ejercicios($fila);
        }
        return $ejercicio;
    }
    public function guardar($id, $usuario){
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO Usuario_Ejercicio (id_usuario, id_ejercicio) VALUES (:usuario, :id)");
        $stmt->execute([
            ':usuario' =>$usuario,
            ':id' => $id
        ]);
    }
    public function getById($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Ejercicios WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Ejercicios($fila);
    }
    public function informacionUsuario($usuario){
        $db = conectar();
        $stmt = $db->prepare("
        SELECT ejercicio.*, usuario_ejercicio.id_usuario
        FROM Ejercicios ejercicio
        JOIN Usuario_Ejercicio usuario_ejercicio 
        ON ejercicio.id = usuario_ejercicio.id_ejercicio
        WHERE usuario_ejercicio.id_usuario = :id
    ");

        $stmt->execute([':id' => $usuario]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function delete($id){
        $db = conectar();
        $stmt = $db->prepare("DELETE FROM Usuario_Ejercicio WHERE id_ejercicio = :id");
        $stmt->execute([':id' => $id]);
    }
}
