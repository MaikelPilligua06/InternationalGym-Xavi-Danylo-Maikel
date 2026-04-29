<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Ejercicio eliminar</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<?php
include "views/header.php"
?>
<!-- Bucle para ver todos los ejercicios de la aplicacion-->
<?php foreach($ejercicio as $sesion): ?>
    <ul>
        <li>
            <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $sesion->id ?>">
                <p><?= $sesion->nombreEjercicio ?></p>
            </a>
            <a href="index.php?controller=Ejercicios&action=borrarEjercicioApp&id=<?= $sesion->id ?>">
                <button id="borrar">Borrar ejercicio</button>
            </a>
        </li>
    </ul>
<?php endforeach; ?>
<button onclick="history.back()">Volver</button>
<?php
    include "views/footer.php";
?>
</body>
</html>


