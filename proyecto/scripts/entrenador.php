<?php
require_once '../models/db.php';

$db = conectar();
$passwordAdmin = password_hash("entrenador", PASSWORD_DEFAULT);

$sql = "INSERT INTO Entrenadores (nombreEntrenador, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, descripcion, foto, disponibilidadHoraria) 

VALUES ('manuel', 'molina', '+34631772378', 'DNI', '52566487A', 'mmolina@institutmvm.cat', '$passwordAdmin', 'Hola soy un entrenador!', 'default.jpeg', 'dia')";

$db->exec($sql);
echo "Usuario insertado correctamente.";
exit;
?>
