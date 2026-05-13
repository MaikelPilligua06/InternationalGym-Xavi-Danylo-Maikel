<?php
require_once "db.php";
require_once "Alimentacion.php";
class AlimentacionModel{
    public function getPlatosUsuario ($usuarioId){
        try {
            $db = conectar();
            $stmt = $db->prepare(
                "
                    SELECT a.id, a.nombrePlato, a.calorias, a.proteinas, a.descripcion, u.id AS id_usuario
                    FROM Alimentacion a
                    JOIN Usuario_Alimentacion ua ON a.id = ua.id_alimentacion
                    JOIN Usuarios u ON u.id = ua.id_usuario
                    WHERE ua.id_usuario = :usuarioId
                ");
            $stmt->execute([":usuarioId" => $usuarioId]);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $alimentacion = [];
            foreach ($resultado as $fila) {
                $alimentacion[] = new Alimentacion($fila);
            }
            return $alimentacion;
        } catch (PDOException $e) {
            throw new Exception("Error al obtener los platos del usuario");
        }
    }

    public function getTodosLosPlatos(){
        try {
            $db = conectar();
            $stmt = $db->prepare("SELECT * FROM Alimentacion");
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $todosLosPlatos = [];
            foreach ($resultado as $fila) {
                $todosLosPlatos[] = new Alimentacion($fila);
            }
            return $todosLosPlatos;
        } catch (PDOException $e) {
            throw new Exception("Error al obtener los platos");
        }
    }
    public function agregarPlato($id, $usuarioId){
        try {
            $db = conectar();
            $stmt = $db->prepare("SELECT COUNT(*) FROM Usuario_Alimentacion WHERE id_usuario = :id_usuario AND id_alimentacion = :id_alimentacion");
            $stmt->execute([
                ':id_usuario' => $usuarioId,
                ':id_alimentacion' => $id
            ]);
            $existe = $stmt->fetchColumn();

            if ($existe > 0) {
                throw new Exception("Ya tienes este plato agregado.");
            }
            $stmt = $db->prepare("INSERT INTO Usuario_Alimentacion (id_usuario, id_alimentacion) VALUES (:id_usuario, :id_alimentacion)");
            $stmt->execute([
                ':id_usuario' => $usuarioId,
                ':id_alimentacion' => $id
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception($e->getMessage());        }
    }
    public function eliminarPlatoUsuario($id, $usuarioId){
        try {
            $db = conectar();
            $stmt = $db->prepare("DELETE FROM Usuario_Alimentacion WHERE id_alimentacion = :id_alimentacion AND id_usuario = :id_usuario");
            $stmt->execute([
                ':id_usuario' => $usuarioId,
                ':id_alimentacion' => $id
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception($e->getMessage());
        }
    }
    public function getCalorias($usuarioId)
    {
        try {
            $db = conectar();
            $stmt = $db->prepare("SELECT * FROM Usuario_Alimentacion");
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $fila) {
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener las calorías");
        }
    }
    public function guardar($plato){
        try {
            $base_dir = "/var/www/html";
            $db = conectar();
            $stmt = $db->prepare("
                INSERT INTO Alimentacion (objetivo, calorias, nombrePlato, descripcion, proteinas, carbohidratos, grasas, foto) 
                VALUES (:objetivo, :calorias, :nombrePlato, :descripcion, :proteinas, :carbohidratos, :grasas, :foto)");
            $extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            if (!in_array($_FILES['foto']['type'], $extensiones)) {
                throw new Exception("Usa una imagen jpg, jpeg o png.");
            }
            if ($_FILES['foto']['size'] >= $max_tamanyo) {
                throw new Exception("La foto es demasiado grande");
            }

            $ruta_fichero_origen  = $_FILES['foto']['tmp_name'];
            $ruta_nuevo_destino   = $base_dir . "/views/gymFotos/alimentacion/" . $_FILES['foto']['name'];

            if (!move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                throw new Exception("Error al subir la imagen.");
            }
            $stmt->execute([
                ':objetivo'      => $plato->objetivo,
                ':calorias'      => $plato->calorias,
                ':nombrePlato'   => $plato->nombrePlato,
                ':descripcion'   => $plato->descripcion,
                ':proteinas'     => $plato->proteinas,
                ':carbohidratos' => $plato->carbohidratos,
                ':grasas'        => $plato->grasas,
                ':foto'          => $plato->foto
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al guardar el plato");
        }
    }
    //* Función para ver la información de un plato/
    public function getPlato($id){
        try {
            $db = conectar();
            $stmt = $db->prepare("SELECT * FROM Alimentacion WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!$resultado) {
                throw new Exception("Plato no encontrado.");
            }
            foreach ($resultado as $plato) {
                $alimentacion = new Alimentacion($plato);
            }
            return $alimentacion;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener el plato");
        }
    }
    // Funcion para ver todos los platos para borrar
    public function getTodosLosPlatosAdmin(){
        try {
            $db = conectar();
            $stmt = $db->prepare("SELECT * FROM Alimentacion");
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $todosLosPlatos = [];
            foreach ($resultado as $fila) {
                $todosLosPlatos[] = new Alimentacion($fila);
            }
            return $todosLosPlatos;
        } catch (PDOException $e) {
            throw new Exception("Error al obtener los platos admin");
        }
    }
    public function deletePlato($id){
        try{
            $db = conectar();
            $stmt = $db->prepare("DELETE FROM Usuario_Alimentacion WHERE id_alimentacion = :id");
            $stmt->execute([':id' => $id]);
            $stmt = $db->prepare("DELETE FROM Alimentacion WHERE id = :id");
            $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al eliminar el plato");
        }
    }
}