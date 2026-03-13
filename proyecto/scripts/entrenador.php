<?php
require_once '../models/db.php';

$db = conectar();
$passwordAdmin = password_hash("entrenador", PASSWORD_DEFAULT);

$sql = "INSERT INTO Entrenadores (nombre, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, disponibilidadHoraria) 

VALUES ('manuel', 'molina', '+34631772378', 'DNI', '52566487A', 'mmolina@institutmvm.cat', '$passwordAdmin', 'vespertino')";

$db->exec($sql);
echo "Usuario insertado correctamente.";
exit;
?>
