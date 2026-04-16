<?php
require_once "db.php";

$db = conectar();
$passwordAdmin = password_hash("entrenador", PASSWORD_DEFAULT);

$sql = "INSERT INTO Entrenadores (nombreEntrenador, apellido, numeroTelefono, tipoDocumento, numeroDocumento, correoElectronico, contrasenia, disponibilidadHora) 

VALUES ('manuel', 'molina', '+34631772378', 'DNI', '52566487A', 'mmolina@institutmvm.cat', '$passwordAdmin', 'tarde')";

$db->exec($sql);  // Direct execution
echo "Usuario insertado correctamente.";
exit;
?>

