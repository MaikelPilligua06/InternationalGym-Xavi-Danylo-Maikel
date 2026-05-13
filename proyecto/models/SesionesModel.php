<?php

require_once "db.php";
require_once "SesionesDeClases.php";
class SesionesModel{
    public function getAll(){
        try {
            $db = conectar();
            $stmt = $db->query("
                SELECT s.*, u.nombreUsuario AS nombreEntrenador
                FROM SesionesDeClases s
                JOIN Usuarios u ON s.id_entrenador = u.id
                ORDER BY fechaClases DESC
        ");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener las sesiones");
        }
    }
    // Apuntarse a una sesion
    public function asignarSesion($id, $usuario)
    {
        try {
            $db = conectar();
            $stmt = $db->prepare("
                SELECT COUNT(*) FROM Usuario_Sesion WHERE id_usuario = :id_usuario AND id_sesion = :id_sesion
                ");
            $stmt->execute([':id_usuario' => $usuario, ':id_sesion' => $id]);
            if ($stmt->fetchColumn() > 0) {
                throw new Exception("Ya estás apuntado a esta sesión.");
            }
            $stmt = $db->prepare("
                INSERT INTO Usuario_Sesion (id_usuario, id_sesion) VALUES (:id_usuario, :id_sesion)
                ");
            $stmt->execute([':id_usuario' => $usuario, ':id_sesion' => $id]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }

    public function sesionUsuario($usuario) {
        try {
            $db = conectar();
            $stmt = $db->prepare("
                SELECT sesiones.*, usuario_sesion.id_usuario
                FROM SesionesDeClases sesiones
                JOIN Usuario_Sesion usuario_sesion 
                ON sesiones.id = usuario_sesion.id_sesion
                WHERE usuario_sesion.id_usuario = :id;
            ");
            $stmt->execute([':id' => $usuario]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener tus sesiones");
        }
    }

    public function sesionesCrear($sesion, $id_entrenador){
        try{
            $db = conectar();
            $stmt = $db->prepare("
            INSERT INTO SesionesDeClases
            (nombreClase, calorias, tipoDeClases, fechaClases, duracion, descripcion, id_entrenador, foto)
            VALUES
            (:nombreClase, :calorias, :tipoDeClases, :fechaClases, :duracion, :descripcion, :id_entrenador, :foto)
        ");
            $base_dir = "/var/www/html";
            $extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            if (!in_array($_FILES['foto']['type'], $extensiones)) {
                throw new Exception("Usa una imagen jpg, jpeg o png");
            }
            if ($_FILES['foto']['size'] >= $max_tamanyo) {
                throw new Exception("La foto es demasiado grande");
            }

            $ruta_fichero_origen  = $_FILES['foto']['tmp_name'];
            $ruta_nuevo_destino   = $base_dir . "/views/gymFotos/sesiones/" . $_FILES['foto']['name'];

            if (!move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                throw new Exception("Error al subir la imagen");
            }
            $stmt->execute([
                ':nombreClase' => $sesion->nombreClase,
                ':calorias' => $sesion->calorias,
                ':tipoDeClases' => $sesion->tipoDeClases,
                ':fechaClases' => $sesion->fechaClases,
                ':duracion' => $sesion->duracion,
                ':descripcion' => $sesion->descripcion,
                ':foto' => $sesion->foto,
                ':id_entrenador' => $id_entrenador
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al crear la sesión");
        }
    }


    public function ver($id)
    {
        try {
            $db = conectar();
            $stmt = $db->prepare("SELECT * FROM SesionesDeClases where id = :id");
            $stmt->execute([':id' => $id]);
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$fila) {
                throw new Exception("Sesión no encontrada");
            }
            return new SesionesDeClases($fila);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener la sesión");
        }
    }
    // Función para borrar las sesiones del usuario
    public function delete($id){
        try{
            $db = conectar();
            $stmt = $db->prepare("DELETE FROM Usuario_Sesion WHERE id_sesion = :id");
            $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al borrar la sesión");
        }
    }
    public function misPub($usuario){
        try{
            $db = conectar();
            $stmt = $db->prepare("
                SELECT s.id, s.nombreClase, s.calorias, s.tipoDeClases, s.fechaClases, s.duracion, s.descripcion
                FROM SesionesDeClases s
                WHERE s.id_entrenador = :id
                ");
            $stmt->execute([':id' => $usuario]);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sesiones = [];
            foreach ($resultado as $sesion) {
                $sesiones[] = new SesionesDeClases($sesion);
            }
            return $sesiones;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener tus publicaciones");
        }
    }
    // Eliminar la sesión del entrenador
    public function deleteEntrenador($id_entrenador, $id){
        try{
            $db = conectar();
            $stmt = $db->prepare("DELETE FROM SesionesDeClases WHERE id_entrenador = :id_entrenador AND id = :id");
            $stmt->execute([
                ':id_entrenador' => $id_entrenador,
                'id' => $id
            ]);
            $stmt = $db->prepare("DELETE FROM Usuario_Sesion WHERE id_sesion = :id_sesion");
            $stmt->execute([
                'id_sesion' => $id
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al eliminar la sesión");
        }
    }
    public function sesionesUsuarioEntrenador($usuario)
    {
        try {
            $db = conectar();
            $stmt = $db->prepare("
                SELECT s.id, s.nombreClase, s.calorias, s.tipoDeClases, 
                s.fechaClases, s.duracion, s.descripcion, s.id_entrenador
                FROM SesionesDeClases s
                INNER JOIN UsuarioEntrenador ue ON ue.id_entrenador = s.id_entrenador
                WHERE ue.id_usuario = :id
            ");
            $stmt->execute([':id' => $usuario]);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $entrenadorSesiones = [];
            foreach ($resultado as $fila) {
                $entrenadorSesiones[] = new SesionesDeClases($fila);
            }
            return $entrenadorSesiones;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener las sesiones del entrenador");
        }
    }
    public function update($id, $sesiones)
    {
        try {
            $db = conectar();
            $stmt = $db->prepare("
                UPDATE SesionesDeClases SET nombreClase = :nombreClase, calorias = :calorias, tipoDeClases = :tipoDeClases, 
                fechaClases = :fechaClases, duracion = :duracion, descripcion = :descripcion, foto = :foto WHERE id = :id
                ");
            $base_dir = "/var/www/html";
            $extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            if (!in_array($_FILES['foto']['type'], $extensiones)) {
                throw new Exception("Usa una imagen jpg, jpeg o png.");
            }
            if ($_FILES['foto']['size'] >= $max_tamanyo) {
                throw new Exception("La foto es demasiado grande");
            }
            $ruta_fichero_origen  = $_FILES['foto']['tmp_name'];
            $ruta_nuevo_destino   = $base_dir . "/views/gymFotos/sesiones/" . $_FILES['foto']['name'];
            if (!move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                throw new Exception("Error al subir la imagen.");
            }
            $stmt->execute([
                ':id' => $id,
                ':nombreClase' => $sesiones->nombreClase,
                ':calorias' => $sesiones->calorias,
                ':tipoDeClases' => $sesiones->tipoDeClases,
                ':fechaClases' => $sesiones->fechaClases,
                ':duracion' => $sesiones->duracion,
                ':descripcion' => $sesiones->descripcion,
                ':foto' => $sesiones->foto
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al actualizar la sesión");
        }
    }
    public function estaApuntado($id_sesion, $id_usuario) {
        try{
            $db = conectar();
            $stmt = $db->prepare("
            SELECT * FROM Usuario_Sesion 
            WHERE id_sesion = :id_sesion AND id_usuario = :id_usuario
        ");
            $stmt->execute([
                ':id_sesion' => $id_sesion,
                ':id_usuario' => $id_usuario
            ]);
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al comprobar la sesión");
        }
    }
}

