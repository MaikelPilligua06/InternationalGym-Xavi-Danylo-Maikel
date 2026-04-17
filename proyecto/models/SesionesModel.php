<?php

require_once "db.php";
require_once "SesionesDeClases.php";
class SesionesModel{
    public function getAll(){
        $db = conectar();
        $stmt = $db->query("
                SELECT s.*, e.id, e.nombreEntrenador 
                FROM SesionesDeClases s 
                JOIN Entrenadores e ON s.id = e.id
                Order by fechaClases DESC");

        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function asignarSesion($id, $usuario){
        $db = conectar();
        $stmt = $db->prepare("INSERT INTO Usuario_Sesion (id_usuario, id_sesion) VALUES (:id_usuario, :id_sesion)");
        $stmt->execute([
            ':id_usuario' => $usuario,
            ':id_sesion' => $id
        ]);
    }

    public function sesionUsuario($usuario) {
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
    }

    public function sesionesCrear($sesion, $id_entrenador){
        $db = conectar();
        $stmt = $db->prepare("
        INSERT INTO SesionesDeClases
        (nombreClase, tipoDeClases, fechaClases, duracion, descripcion, id_entrenador, foto)
        VALUES
        (:nombreClase, :tipoDeClases, :fechaClases, :duracion, :descripcion, :id_entrenador, :foto)
    ");
        $base_dir = "/var/www/html";
        $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
        $max_tamanyo = 1024 * 1024 * 8;
        $ruta_indexphp = dirname(realpath(__FILE__));
        $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
        $ruta_nuevo_destino = $base_dir . "/views/gymFotos/sesiones/" . $_FILES['foto']['name'];
        if (in_array($_FILES['foto']['type'], $extensiones)) {
            if ($_FILES['foto']['size'] < $max_tamanyo) {
                if (move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                    $sesion->foto = $_FILES['foto']['name'];
                    $stmt->execute([
                        ':nombreClase' => $sesion->nombreClase,
                        ':tipoDeClases' => $sesion->tipoDeClases,
                        ':fechaClases' => $sesion->fechaClases,
                        ':duracion' => $sesion->duracion,
                        ':descripcion' => $sesion->descripcion,
                        ':foto' => $sesion->foto,
                        ':id_entrenador' => $id_entrenador
                    ]);
                } return "Plato creado correctamente";
            } else{
                return "Error la imagen es demasiado grande";
            }
        }
    }

    public function ver($id){
        $db = conectar();
        $stmt = $db->prepare("SELECT * FROM SesionesDeClases where id = :id");
        $stmt->execute([':id' => $id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return new SesionesDeClases($fila);
    }
    public function delete($id){
        $db = conectar();
        $stmt = $db->prepare("DELETE FROM Usuario_Sesion WHERE id_sesion = :id");
        $stmt->execute([':id' => $id]);
    }
    public function misPub($usuario){
        $db = conectar();
        $stmt = $db->prepare("
            SELECT s.id, s.nombreClase, s.tipoDeClases, s.fechaClases, s.duracion, s.descripcion
            FROM SesionesDeClases s
            INNER JOIN Entrenadores e ON s.id_entrenador = e.id
            WHERE e.id = :id
            ");
        $stmt->execute([':id' => $usuario]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sesiones = [];
        foreach ($resultado as $sesion) {
            $sesiones[] = new SesionesDeClases($sesion);
        }
        return $sesiones;
    }
}