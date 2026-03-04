<?php
require_once "db.php";
// Para poder ver las rutinas y ejercicios
require_once "Rutinas.php";
require_once "Ejercicios.php";
// Para poder ver la alimetación
require_once "Alimentacion.php";
// Para poder ver los objetivos cáloricos
require_once "ResumenDiario.php";
class RutinasModel{
    // Funcion para ver los ejercicios del usuario(rutina)
    public function verEntrenamiento(){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Rutina");
        $stmt->execute();
        $entrenamientos = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Rutinas($entrenamientos);
    }
    // Funcion para ver la alimentacion de un usuario
    public function verAlimentacion($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Alimentacion where id_usuario = :id ");
        $stmt->execute([":id" => $id]);
        $alimentacion = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Alimentacion($alimentacion);;
    }
    // Funcion para ver la alimentacion de un usuari
    public function verObjetivo($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM ResumenDiario where id_usuario = :id ");
        $stmt->execute([":id" => $id]);
        $objetivo = $stmt->fetch(PDO::FETCH_ASSOC);
        return new ($objetivo);

    }

}