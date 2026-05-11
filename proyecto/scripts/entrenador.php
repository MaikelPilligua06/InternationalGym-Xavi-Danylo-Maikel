<?php
require_once __DIR__ . '/../models/db.php';
$db = conectar();

$passwordEntrenador = password_hash('entrenador', PASSWORD_DEFAULT);


$sql = "INSERT INTO Usuarios (nombreUsuario, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, edad, genero, peso, altura, objetivo, rol, descripcion, fechaDeAlta, foto) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $db->prepare($sql);

// 2. Definimos la lista con los datos de todos els entrenadors
$entrenadores = [
    ['manuel', 'molina', '34631772378', 'DNI', '52566487A', 'mmolina@institutmvm.cat', $passwordEntrenador, 20, 'masculino', 70, 1.40, 'estabilidad', 'entrenador', '¡Hola soy un Entrenador!', '2026-02-27', 'default.jpeg'],
    ['Danylo', 'Peliak', '34662234196', 'DNI', '22360176D', 'dpeliak@institutmvm.cat', $passwordEntrenador, 21, 'masculino', 72, 1.80, 'ganar fuerza', 'entrenador', '¡Hola soy un Entrenador!', '2026-01-29', 'default.jpeg'],
    ['Maikel', 'Pilligua', '34652195322', 'DNI', '42123051P', 'mpilligua@institutmvm.cat', $passwordEntrenador, 20, 'masculino', 60, 1.72, 'perder peso', 'entrenador', '¡Hola soy un Entrenador!', '2026-01-15', 'default.jpeg'],
    ['Xavier', 'Busca', '34692123534', 'DNI', '21361237C', 'xbusca@institutmvm.cat', $passwordEntrenador, 20, 'masculino', 65, 1.70, 'estabilidad', 'entrenador', '¡Hola soy un Entrenador!', '2026-01-20', 'default.jpeg']
];


foreach ($entrenadores as $entrenador) {
    $stmt->execute($entrenador);
}
echo "Entrenadores insertados correctamente.";
exit;
?>