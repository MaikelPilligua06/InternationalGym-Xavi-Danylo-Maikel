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

}