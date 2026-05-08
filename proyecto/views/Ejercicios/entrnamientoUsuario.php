<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Entreno</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'views/header.php';
?>
<div>
<h2>Ejercicios</h2>
    <ul>
        <a href="index.php?controller=Ejercicios&action=agregarEjercicio">
            <li>Crear</li>
        </a>
        <a href="index.php?controller=Ejercicios&action=verEjercicios">
            <li>Ver todos los Ejercicios, borrar o actualizar</li>
        </a>
    </ul>
</div>
    <hr>

<div>
    <h2>Tu Playlist</h2>
        <ul>
            <?php foreach($lista as $fila): ?>
                <li>
                    <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $fila->id ?>">
                        <p><?= $fila->nombreEjercicio ?></p>
                    </a>
                    <a href="index.php?controller=Ejercicios&action=eliminarEjercicio&id=<?= $fila->id ?>">
                        <button>Eliminar</button>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
</div>
<div>
    <h2>Añadir Ejercicio</h2>
    <?php foreach($ejercicio as $sesion): ?>
        <ul>
            <li>
                <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $sesion->id ?>">
                    <p><?= $sesion->nombreEjercicio ?></p>
                </a>
                <a href="index.php?controller=Ejercicios&action=addEjercicio&id=<?= $sesion->id ?>">
                    <button>Añadir ejercicio</button>
                </a>
            </li>
        </ul>
    <?php endforeach; ?>
</div>
<?php
include 'views/footer.php';
?>
</body>
</html>
