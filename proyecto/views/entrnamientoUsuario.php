<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>International GYM</title>
</head>
<body>
<?php
include 'header.php';
?>
<h2>Lista Rutinas</h2>
<hr>

<div>
    <h2>Tu lista</h2>
    <?php

    ?>
</div>
<div>
    <h2>Añadir Ejercicio</h2>
    <?php foreach($ejercicio as $sesion): ?>
        <p><?= $sesion->nombre ?></p>
    <?php endforeach; ?>
</div>
<?php
include 'footer.php';
?>
</body>
</html>
