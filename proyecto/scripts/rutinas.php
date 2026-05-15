<?php
require_once __DIR__ . '/../models/db.php';
$db = conectar();

$sql = "INSERT INTO Rutina (id_usuario, nombre_rutina, objetivo, fechaTiempo) 
        VALUES (?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->execute([6, 'Rutina Estabilidad', 'estabilidad', '01:00:00']);

$id_rutina = $db->lastInsertId();

$sql = "INSERT INTO FechaRutina (id_rutina, id_usuario, fecha_inicio) 
        VALUES (?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->execute([$id_rutina, 6, '2026-05-15']);


$sql = "INSERT INTO Contiene (id_rutina, id_ejercicio, id_alimentacion, id_sesion, series, repeticiones, peso) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);

$contenido = [
    [$id_rutina, 5, null, null, 4, 12, 60],
    [$id_rutina, 1, null, null, 3, 10, 50],
    [$id_rutina, null, 7, null, null, null, null],
    [$id_rutina, null, 8, null, null, null, null],
    [$id_rutina, null, null, 1, null, null, null],
    [$id_rutina, null, null, 5, null, null, null],
];

foreach ($contenido as $item) {
    $stmt->execute($item);
}

echo "Rutina creada correctamente";
exit;
?>
