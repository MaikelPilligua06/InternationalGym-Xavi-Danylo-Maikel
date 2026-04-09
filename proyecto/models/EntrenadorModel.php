<?php
require_once "db.php";
require_once "Entrenador.php";

class EntrenadorModel{
    public function getAll(){
        $db = conectar();
        $stmt = $db->query("SELECT nombre, apellido, correoElectronico, descripcion FROM Entrenadores");
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entrenadores = [];
        foreach($resultado as $entrenador){
            $entrenadores[] = new Entrenador($entrenador);
        }
        return $entrenadores;
    }
}