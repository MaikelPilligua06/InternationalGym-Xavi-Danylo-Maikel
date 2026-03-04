<!DOCTYPE html>
<html lang="es">
<head>
    <title>Listado Sesiones</title>
</head>
<body>
<?php include 'header.php'; ?>

<h1>Sesiones</h1>

<?php foreach($sesiones as $sesion): ?>
    <p><?= $sesion->tipoDeClases ?> - <?= $sesion->fechaClases ?></p>
<?php endforeach; ?>

<?php include 'footer.php'; ?>
</body>
</html>


