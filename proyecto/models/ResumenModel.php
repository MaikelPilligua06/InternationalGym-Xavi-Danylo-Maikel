<?php

require_once __DIR__ . "/db.php";

class ResumenModel
{

    private PDO $db;

    public function getAll() {
        try {
            $db = conectar();
            $stmt = $db->prepare("SELECT * FROM ResumenDiario");
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $resumen = [];
            foreach ($resultado as $fila) {
                $resumen = new ResumenDiario($fila);
            }
            return $resumen;
        }  catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener el resumen");
        }
    }

    public function __construct()
    {
        try {
            $this->db = conectar();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al conectarse");
        }
    }

    // Se eliminan los parámetros de fecha de la función para que coincida con el execute
    public function getCaloriasConsumidasPorFechas($idUsuario, $fechaInicio, $fechaFin) {
        try {
            $db = conectar();
            $stmt = $db->prepare("
            SELECT r.id_rutina, r.nombre_rutina, r.objetivo, r.fechaTiempo, fr.fecha_inicio
            FROM Rutina r
            JOIN FechaRutina fr ON r.id_rutina = fr.id_rutina
            WHERE fr.id_usuario = :id
            AND fr.fecha_inicio BETWEEN :fecha_inicio AND :fecha_fin
            ORDER BY fr.fecha_inicio DESC
        ");
            $stmt->execute([
                ':id'           => $idUsuario,
                ':fecha_inicio' => $fechaInicio,
                ':fecha_fin'    => $fechaFin
            ]);
            $rutinas = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($rutinas as $rutina) {
                $stmt = $db->prepare("
                SELECT e.nombreEjercicio, e.foto, c.series, c.repeticiones, c.peso,
                (e.calorias * c.series * c.repeticiones) AS calorias
                FROM Contiene c
                JOIN Ejercicios e ON c.id_ejercicio = e.id
                WHERE c.id_rutina = :id_rutina
                AND c.id_ejercicio IS NOT NULL
            ");
                $stmt->execute([':id_rutina' => $rutina->id_rutina]);
                $rutina->ejercicios = $stmt->fetchAll(PDO::FETCH_OBJ);

                $stmt = $db->prepare("
                SELECT s.nombreClase, s.tipoDeClases, s.calorias, s.duracion
                FROM Contiene c
                JOIN SesionesDeClases s ON c.id_sesion = s.id
                WHERE c.id_rutina = :id_rutina
                AND c.id_sesion IS NOT NULL
            ");
                $stmt->execute([':id_rutina' => $rutina->id_rutina]);
                $rutina->sesiones = $stmt->fetchAll(PDO::FETCH_OBJ);

                $stmt = $db->prepare("
                SELECT a.nombrePlato, a.calorias, a.proteinas, a.carbohidratos, a.grasas, a.foto
                FROM Contiene c
                JOIN Alimentacion a ON c.id_alimentacion = a.id
                WHERE c.id_rutina = :id_rutina
                AND c.id_alimentacion IS NOT NULL
            ");
                $stmt->execute([':id_rutina' => $rutina->id_rutina]);
                $rutina->platos = $stmt->fetchAll(PDO::FETCH_OBJ);

                $rutina->calorias_ejercicios = 0;
                $rutina->calorias_sesiones   = 0;
                $rutina->calorias_ingeridas  = 0;

                foreach ($rutina->ejercicios as $e) $rutina->calorias_ejercicios += $e->calorias;
                foreach ($rutina->sesiones   as $s) $rutina->calorias_sesiones   += $s->calorias;
                foreach ($rutina->platos     as $p) $rutina->calorias_ingeridas  += $p->calorias;

                $rutina->calorias_gastadas = $rutina->calorias_ejercicios + $rutina->calorias_sesiones;
            }
            return $rutinas;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error al obtener el resumen por fechas");
        }
    }
}