<?php
require_once __DIR__ . '/../models/db.php';
$db = conectar();

$sql = "INSERT INTO SesionesDeClases(calorias, nombreClase, tipoDeClases, fechaClases, duracion, id_entrenador, descripcion, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);

$sesiones = [
    [400, 'HIIT Full Body',       'Cardio',       '2026-05-10', '00:45:00', 3, 'Clase de alta intensidad que combina ejercicios de todo el cuerpo con intervalos cortos de descanso para mejorar resistencia y quemar grasa rápidamente.', ''],
    [500, 'Cycling Indoor',       'Cycling',      '2026-05-11', '00:50:00', 2, 'Sesión de bicicleta estática con cambios de ritmo e intensidad, ideal para mejorar la capacidad cardiovascular y la resistencia.', ''],
    [300, 'Fuerza Tren Superior', 'trenSuperior', '2026-05-12', '00:40:00', 4, 'Entrenamiento enfocado en pecho, espalda, hombros y brazos utilizando pesas y ejercicios funcionales.', ''],
    [350, 'Piernas y Glúteos',    'trenInferior', '2026-05-13', '00:45:00', 4, 'Clase centrada en fortalecer piernas y glúteos mediante sentadillas, zancadas y ejercicios de resistencia.', ''],
    [320, 'Cardio Core',          'Cardio',       '2026-05-14', '00:35:00', 3, 'Entrenamiento que combina ejercicios cardiovasculares con trabajo abdominal para mejorar resistencia y estabilidad.', ''],
    [480, 'Cycling Resistencia',  'Cycling',      '2026-05-15', '00:55:00', 5, 'Clase de ciclismo enfocada en resistencia, con ritmos constantes y simulación de subidas prolongadas.', ''],
    [320, 'Upper Body Strength',  'trenSuperior', '2026-05-16', '00:45:00', 5, 'Entrenamiento centrado en pecho, espalda, hombros y brazos usando pesas y ejercicios funcionales.', ''],
    [370, 'Lower Body Power',     'trenInferior', '2026-05-18', '00:50:00', 2, 'Sesión enfocada en potencia de piernas y glúteos, combinando sentadillas, zancadas y ejercicios explosivos.', ''],
];

foreach ($sesiones as $sesion) {
    $stmt->execute($sesion);
}
echo "Sesiones insertadas correctamente.";
exit;
?>