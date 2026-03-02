<?php
require_once "db.php";
require_once "Ejercicios.php";

class EjerciciosModel{

    //Funcion para ver la información que contiene un ejercicio
    public function getById($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Ejercicios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Ejercicios($fila);
    }

}