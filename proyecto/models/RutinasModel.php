<?php
require_once "db.php";
require_once "Rutinas.php";
require_once "Ejercicios.php";
require_once "Alimentacion.php";
require_once "SesionesDeClases.php";

class RutinasModel{
    // Funcion para ver los ejercicios del usuario(rutina)
    public function verRutinas($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Rutina where id_usuario = :id");
        $stmt->execute([":id" => $id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function getRutinaUsuario($id){
        $db = conectar();
        $stmt = $db->prepare("
            SELECT id_rutina, id_usuario, nombre_rutina, objetivo, fechaTiempo
            FROM Rutina
            WHERE id_usuario = :id
        ");
        $stmt->execute([':id' => $id]);
        $rutinas = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($rutinas as $rutina) {
            $stmt = $db->prepare("
                SELECT  e.nombreEjercicio, e.calorias, e.foto, c.series, c.repeticiones, c.peso,
                (e.calorias * c.series * c.repeticiones) AS calorias
                FROM Contiene c
                JOIN Ejercicios e ON c.id_ejercicio = e.id
                WHERE c.id_rutina = :id_rutina
        ");
            $stmt->execute([':id_rutina' => $rutina->id_rutina]);
            $rutina->ejercicios = $stmt->fetchAll(PDO::FETCH_OBJ);

            $stmt = $db->prepare("
                SELECT s.calorias
                FROM Contiene c
                JOIN SesionesDeClases s ON c.id_sesion = s.id
                WHERE c.id_rutina = :id_rutina
            ");
            $stmt->execute([':id_rutina' => $rutina->id_rutina]);
            $rutina->sesiones = $stmt->fetchAll(PDO::FETCH_OBJ);

            $stmt = $db->prepare("
                SELECT a.calorias, a.nombrePlato, a.proteinas, a.foto
                FROM Contiene c
                JOIN Alimentacion a ON c.id_alimentacion = a.id
                WHERE c.id_rutina = :id_rutina
            ");
            $stmt->execute([':id_rutina' => $rutina->id_rutina]);

            $rutina->platos = $stmt->fetchAll(PDO::FETCH_OBJ);
            $rutina->calorias_ejercicios = 0;
            $rutina->calorias_sesiones   = 0;
            $rutina->calorias_platos     = 0;
            foreach ($rutina->ejercicios as $e) $rutina->calorias_ejercicios += $e->calorias;
            foreach ($rutina->sesiones   as $s) $rutina->calorias_sesiones   += $s->calorias;
            foreach ($rutina->platos     as $p) $rutina->calorias_platos     += $p->calorias;
            $rutina->calorias_total = $rutina->calorias_ejercicios + $rutina->calorias_sesiones + $rutina->calorias_platos;
        }
        return $rutinas;
    }
    public function rutinaDiaria($id){

    }
    public function rutinaVer($id){

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
        $stmt = $db->prepare("SELECT * FROM Ejercicios ORDER BY RAND() LIMIT 5");
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
        $stmt = $db->prepare("SELECT * FROM Alimentacion ORDER BY RAND() LIMIT 5");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $todosLosPlatos = [];
        foreach($resultado as $fila){
            $todosLosPlatos[] = new Alimentacion($fila);
        }
        return $todosLosPlatos;
    }
    public function getUsuarioSesion($id){
        $db = conectar();
        $stmt = $db->prepare("
            SELECT sesiones.*, usuario_sesion.id_usuario
            FROM SesionesDeClases sesiones
            JOIN Usuario_Sesion usuario_sesion 
            ON sesiones.id = usuario_sesion.id_sesion
            WHERE usuario_sesion.id_usuario = :id;
        ");
        $stmt->execute([":id" => $id]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarioSesiones = [];
        foreach($resultado as $fila){
            $usuarioSesiones[] = new SesionesDeClases($fila);
        }
        return $usuarioSesiones;
    }
    public function getTodasLasSesiones(){
        $db = conectar();
        $stmt = $db->query("
            SELECT s.*, u.nombreUsuario AS nombreEntrenador
            FROM SesionesDeClases s
            JOIN Usuarios u ON s.id_entrenador = u.id
            WHERE DATE(s.fechaClases) = CURDATE()
            ORDER BY RAND()
            LIMIT 5;
        ");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $todasLasSesiones = [];
        foreach($resultado as $fila){
            $todasLasSesiones[] = new SesionesDeClases($fila);
        }
        return $todasLasSesiones;
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
    public function guardarPlato($id, $objetivo, $calorias, $nombrePlato, $descripcion, $proteinas, $carbohidratos, $grasas, $foto){
        foreach($_SESSION['rutina_platos'] as $plato){
            if($plato['id'] == $id){
                return false;
            }
        }
        $_SESSION['rutina_platos'][] = [
            'id'       => $id,
            'objetivo'   => $objetivo,
            'calorias' => $calorias,
            'nombrePlato'   => $nombrePlato,
            'descripcion' => $descripcion,
            'proteinas' => $proteinas,
            'carbohidratos' => $carbohidratos,
            'grasas' => $grasas,
            'foto' => $foto
        ];
        return true;
    }
    public function eliminarPlato($index){
        if (isset($_SESSION['rutina_platos'][$index])) {
            unset($_SESSION['rutina_platos'][$index]);
            $temporal = [];
            foreach ($_SESSION['rutina_platos'] as $plato) {
                $temporal[] = $plato;
            }
            $_SESSION['rutina_platos'] = $temporal;
            return true;
        } else{
            return false;
        }
    }
    public function agregarSesion($id, $nombreClase, $tipoDeClases, $fechaClases, $duracion, $id_entrenador, $descripcion, $foto, $calorias){
        foreach($_SESSION['rutina_sesiones'] as $sesiones){
            if($sesiones['id'] == $id){
                return false;
            }
        }
        $_SESSION['rutina_sesiones'][] = [
            'id'       => $id,
            'nombreClase'   => $nombreClase,
            'tipoDeClases' => $tipoDeClases,
            'fechaClases'   => $fechaClases,
            'duracion' => $duracion,
            'id_entrenador' => $id_entrenador,
            'descripcion' => $descripcion,
            'foto' => $foto,
            'calorias' => $calorias
        ];
        return true;
    }
    public function eliminarSesion($index){
        if (isset($_SESSION['rutina_sesiones'][$index])) {
            unset($_SESSION['rutina_sesiones'][$index]);
            $temporal = [];
            foreach ($_SESSION['rutina_sesiones'] as $quitarSesion) {
                $temporal[] = $quitarSesion;
            }
            $_SESSION['rutina_sesiones'] = $temporal;
            return true;
        } else{
            return false;
        }
    }
    public function guardarRutina($nombre_rutina, $ejercicios, $platos, $sesiones, $id, $fechaTiempo, $objetivo, $series, $repeticiones, $peso) {
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO Rutina (id_usuario, nombre_rutina, objetivo, fechaTiempo) VALUES (:id_usuario, :nombre_rutina, :objetivo, :fechaTiempo) ");
        $stmt->execute([
            ':id_usuario'    => $id,
            ':nombre_rutina' => $nombre_rutina,
            ':objetivo'      => $objetivo,
            ':fechaTiempo'   => $fechaTiempo
        ]);
        $stmt = $db->prepare("SELECT id_rutina FROM Rutina WHERE id_usuario = :id_usuario AND nombre_rutina = :nombre_rutina ORDER BY id_rutina DESC LIMIT 1");
        $stmt->execute([':id_usuario' => $id, ':nombre_rutina' => $nombre_rutina]);
        $rutina = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_rutina = $rutina['id_rutina'];

        foreach ($ejercicios as $ejercicio => $id_ejercicio) {
            if ($id_ejercicio != '') {
                $stmt = $db->prepare("INSERT INTO Contiene (id_rutina, id_ejercicio, series, repeticiones, peso) VALUES (:id_rutina, :id_ejercicio, :series, :repeticiones, :peso)");
                $stmt->execute([
                    ':id_rutina' => $id_rutina,
                    ':id_ejercicio' => $id_ejercicio,
                    ':series'       => $series[$ejercicio],
                    ':repeticiones' => $repeticiones[$ejercicio],
                    ':peso'         => $peso[$ejercicio]
                ]);
            }
        }
        foreach ($platos as $id_plato) {
            if ($id_plato != '') {
                $stmt = $db->prepare("INSERT INTO Contiene (id_rutina, id_alimentacion) VALUES (:id_rutina, :id_alimentacion)");
                $stmt->execute([':id_rutina' => $id_rutina, ':id_alimentacion' => $id_plato]);
            }
        }

        foreach ($sesiones as $id_sesion) {
            if ($id_sesion != '') {
                $stmt = $db->prepare("INSERT INTO Contiene (id_rutina, id_sesion) VALUES (:id_rutina, :id_sesion)");
                $stmt->execute([':id_rutina' => $id_rutina, ':id_sesion' => $id_sesion]);
            }
        }
    }
}
