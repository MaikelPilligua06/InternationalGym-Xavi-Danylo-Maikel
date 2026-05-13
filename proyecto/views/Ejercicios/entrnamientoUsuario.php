<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Entreno</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/Ejercicios/ejercicios.css">
</head>
<body>
<?php
    include 'views/header.php';
    ?>
<main class="pagina-ejercicios">
    <?php if ($_SESSION['rol'] === 'entrenador' || $_SESSION['rol'] === 'admin'): ?>
        <div>
        <h2 class="titulo-seccion">Ejercicios</h2>
        <ul class="lista-enlaces">
            <a class="enlace-accion" href="index.php?controller=Ejercicios&action=agregarEjercicio">
                <li>Crear</li>
            </a>
            <a class="enlace-accion" href="index.php?controller=Ejercicios&action=verEjercicios">
                <li>Ver todos los Ejercicios, borrar o actualizar</li>
            </a>
        </ul>
    </div>
    <hr class="separador">
    <?php endif;?>
    <div>
        <h2 class="titulo-seccion">Tu Playlist</h2>
        <?php if (!empty($_SESSION['mensaje'])): ?>
            <p class="correcto"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></p>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error'])): ?>
            <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error_fatal'])): ?>
            <p class="error"><?= $_SESSION['error_fatal']; unset($_SESSION['error_fatal']); ?></p>
        <?php endif; ?>
        <?php if (!empty($lista)) : ?>
            <ul class="lista-items">
            <?php foreach($lista as $fila): ?>
                <li class="fila-item">
                    <img class="foto-ejercicio" src="views/gymFotos/ejercicios/<?= $fila->foto ?>"/>
                    <a class="nombre-item" href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $fila->id ?>">
                        <p>Nombre Ejercicio: <?= $fila->nombreEjercicio ?></p>
                        <p>Calorias: <?= $fila->calorias ?></p>
                    </a>
                    <a href="index.php?controller=Ejercicios&action=eliminarEjercicio&id=<?= $fila->id ?>">
                        <button class="boton-borrar">Eliminar</button>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
        <div class="tarjeta-listado">
            <div class="estado-vacio">
                <h3>No tienes ningún ejercicio añadido. ¡Comienza agregando uno!</h3>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div>
        <h2 class="titulo-seccion">Añadir Ejercicio</h2>
        <ul class="lista-items">
            <?php if (!empty($ejercicio)) : ?>
            <?php foreach($ejercicio as $sesion): ?>
                <li class="fila-item">
                    <img class="foto-ejercicio" src="views/gymFotos/ejercicios/<?= $sesion->foto ?>"/>
                    <a class="nombre-item" href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $sesion->id ?>">
                        <p>Nombre Ejercicio: <?= $sesion->nombreEjercicio ?></p>
                        <p>Calorias: <?= $sesion->calorias ?></p>
                    </a>
                    <a href="index.php?controller=Ejercicios&action=addEjercicio&id=<?= $sesion->id ?>">
                        <button class="boton-guardar">Añadir</button>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
            <div class="tarjeta-listado">
                <div class="estado-vacio">
                    <h3>No está disponible ningún ejercicio por el momento.</h3>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php
    include 'views/footer.php';
    ?>
</body>
</html>