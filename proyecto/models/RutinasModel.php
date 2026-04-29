<?php
require_once "db.php";
require_once "Rutinas.php";
require_once "Ejercicios.php";
require_once "Alimentacion.php";

class RutinasModel{
    // Funcion para ver los ejercicios del usuario(rutina)
    public function verRutinas($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Rutina where id_usuario = :id");
        $stmt->execute([":id" => $id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function getUsuariosEjercicios($id){
        $db = conectar();
        $stmt = $db->prepare("
                SELECT ejercicio.*, usuario_ejercicio.id_usuario
        FROM Ejercicios ejercicio
        JOIN Usuario_Ejercicio usuario_ejercicio 
        ON ejercicio.id = usuario_ejercicio.id_ejercicio
        WHERE usuario_ejercicio.id_usuario = :id
        ");
        $stmt->execute([":id" => $id]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarioEjercicios = [];
        foreach($resultado as $fila){
            $usuarioEjercicios[] = new Ejercicios($fila);
        }
        return $usuarioEjercicios;
    }
    public function getTodosLosEjercicios(){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Ejercicios");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $todoslosEjercicios = [];
        foreach($resultado as $fila){
            $todoslosEjercicios[] = new Ejercicios($fila);
        }
        return $todoslosEjercicios;
    }
    public function getUsuarioAlimentacion($id){
        $db = conectar();
        $stmt = $db->prepare("
                      SELECT a.id, a.nombrePlato, a.calorias, a.proteinas, a.descripcion, u.id
                FROM Alimentacion a
                JOIN Usuario_Alimentacion ua ON a.id = ua.id_alimentacion
                JOIN Usuarios u ON u.id = ua.id_usuario
                WHERE ua.id_usuario = :usuarioId
                ");
        $stmt->execute([":usuarioId" => $id]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarioAlimentacion = [];
        foreach($resultado as $fila){
            $usuarioAlimentacion[] = new Alimentacion($fila);
        }
        return $usuarioAlimentacion;
    }
    public function getTodosLosPlatos(){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Alimentacion");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $todosLosPlatos = [];
        foreach($resultado as $fila){
            $todosLosPlatos[] = new Alimentacion($fila);
        }
        return $todosLosPlatos;
    }

    public function guardarEjercicio($id, $nombreEjercicio, $descripcion, $foto, $calorias){
        foreach ($_SESSION['rutina_ejercicios'] as $ejercicio) {
            if ($ejercicio['id'] == $id) {
                return false;
            }
        }
        $_SESSION['rutina_ejercicios'][] = [
            'id'       => $id,
            'nombreEjercicio'   => $nombreEjercicio,
            'descripcion' => $descripcion,
            'foto' => $foto,
            'calorias' => $calorias
        ];
        return true;
    }
    public function eliminarEjercicio($index){
        if (isset($_SESSION['rutina_ejercicios'][$index])) {
            unset($_SESSION['rutina_ejercicios'][$index]);
            $temporal = [];
            foreach ($_SESSION['rutina_ejercicios'] as $ejercicio) {
                $temporal[] = $ejercicio;
            }
            $_SESSION['rutina_ejercicios'] = $temporal;
            return true;
        } else {
            return false;
        }
    }
}