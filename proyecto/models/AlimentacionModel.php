<?php
require_once "db.php";
require_once "Alimentacion.php";
class AlimentacionModel{
    public function getPlatosUsuario ($usuarioId){
        try {
            $db = conectar();
            $stmt = $db->prepare(
                "
                SELECT a.id, a.nombrePlato, a.calorias, a.proteinas, a.descripcion, u.id
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
                $alimentacion[] = new Alimentacion($fila);
            }
            return $alimentacion;
        } catch (PDOException $e) {
            throw new Exception("Error al obtener los platos del usuario");
        }
    }

    public function getTodosLosPlatos(){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Alimentacion");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $todosLosPlatos = [];
        foreach ($resultado as $fila) {
            $todosLosPlatos[] = new Alimentacion($fila);
        }
        return $todosLosPlatos;
    }
    public function agregarPlato($id, $usuarioId){
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO Usuario_Alimentacion (id_usuario, id_alimentacion) VALUES (:id_usuario, :id_alimentacion)");
        $stmt->execute([
            ':id_usuario' => $usuarioId,
            ':id_alimentacion' => $id
        ]);
    }
    public function eliminarPlatoUsuario($id, $usuarioId){
        $db = conectar();
        $stmt = $db->prepare("DELETE FROM Usuario_Alimentacion WHERE id_alimentacion = :id_alimentacion AND id_usuario = :id_usuario");
        $stmt->execute([
            ':id_usuario' => $usuarioId,
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
        $base_dir = "/var/www/html";
        $db = conectar();
        $stmt = $db->prepare("
            INSERT INTO Alimentacion (objetivo, calorias, nombrePlato, descripcion, proteinas, carbohidratos, grasas, foto) 
            VALUES (:objetivo, :calorias, :nombrePlato, :descripcion, :proteinas, :carbohidratos, :grasas, :foto)");
        $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
        $max_tamanyo = 1024 * 1024 * 8;

        $ruta_indexphp = dirname(realpath(__FILE__));
        $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
       // $ruta_nuevo_destino = $ruta_indexphp . "/../views/gymFotos/" . $_FILES['foto']['name'];
        $ruta_nuevo_destino = $base_dir . "/views/gymFotos/alimentacion/" . $_FILES['foto']['name'];
        if (in_array($_FILES['foto']['type'], $extensiones)) {
            if ($_FILES['foto']['size'] < $max_tamanyo) {
                if (move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    $plato->foto = $_FILES['foto']['name'];
                    $stmt->execute([
                        ':objetivo' => $plato->objetivo,
                        ':calorias' => $plato->calorias,
                        ':nombrePlato' => $plato->nombrePlato,
                        ':descripcion' => $plato->descripcion,
                        ':proteinas' => $plato->proteinas,
                        ':carbohidratos' => $plato->carbohidratos,
                        ':grasas' => $plato->grasas,
                        ':foto' => $plato->foto
                    ]);
                    return "Plato creado correctamente";
                }
            } else {
                return "Error: el archivo es demasiado grande.";
            }
        }
    }
    //* Función para ver la información de un plato/
    public function getPlato($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Alimentacion WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $plato){
            $alimentacion = new Alimentacion($plato);
        }
        return $alimentacion;
    }
    // Funcion para ver todos los platos para borrar
    public function getTodosLosPlatosAdmin(){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM Alimentacion");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $todosLosPlatos = [];
        foreach ($resultado as $fila) {
            $todosLosPlatos[] = new Alimentacion($fila);
        }
        return $todosLosPlatos;
    }
    public function deletePlato($id){
        $db = conectar();
        $stmt = $db->prepare("DELETE FROM Usuario_Alimentacion WHERE id_alimentacion = :id");
        $stmt->execute([':id' => $id]);
        $stmt = $db->prepare("DELETE FROM Alimentacion WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}