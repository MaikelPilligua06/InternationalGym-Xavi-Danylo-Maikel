<html>
<head>

</head>
<body>
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


