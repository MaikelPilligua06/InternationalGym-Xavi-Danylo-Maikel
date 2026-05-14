<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Listado de sesiones</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="views/CSS/sesion.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'views/header.php'; ?>

<?php if ($_SESSION['rol'] === 'entrenador' || $_SESSION['rol'] === 'admin'): ?>
    <div class="publicaciones">
        <h1>Lista de Publicaciones</h1>
        <a href="index.php?controller=Sesiones&action=ver">
            <img src="/views/gymFotos/GYM-sesion.jpg"/>
        </a>
        <a href="index.php?controller=Sesiones&action=misPublicaciones">
            <p>Ver mis publicaciones</p>
        </a>
    </div>
<?php endif; ?>

<h1>Mis sesiones</h1>
<div class="carrusel">
    <?php if (!empty($_SESSION['mensaje'])): ?>
        <p class="correcto"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error_fatal'])): ?>
        <p class="error"><?= $_SESSION['error_fatal']; unset($_SESSION['error_fatal']); ?></p>
    <?php endif; ?>
    <div class="pista">
        <?php if (!empty($lista)) : ?>
            <?php foreach($lista as $fila): ?>
                <div class="tarjeta">
                    <a href="index.php?controller=Sesiones&action=getId&id=<?= $fila->id ?>">
                        <p class="tarjeta-titulo">Nombre: <?= $fila->nombreClase ?></p>
                        <p>Calorias: <?= $fila->calorias ?></p>
                        <p>Tipo: <?= $fila->tipoDeClases ?></p>
                        <p>Duración: <?= $fila->duracion ?></p>
                        <p>Fecha: <?= $fila->fechaClases ?></p>
                    </a>
                    <a href="index.php?controller=Sesiones&action=eliminarSesion&id=<?= $fila->id ?>">
                        <button class="btn-eliminar">Eliminar</button>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="vacio">
                <h3>No tienes ninguna sesión añadida. ¡Comienza agregando uno!</h3>
            </div>
        <?php endif; ?>
    </div>
</div>
<h1>Sesiones Disponibles</h1>

<div class="carrusel">
    <div class="pista">
        <?php if (!empty($sesiones)) : ?>
            <?php foreach ($sesiones as $sesion): ?>
                <div class="tarjeta">
                    <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>">
                        <p class="tarjeta-titulo"><?= $sesion->nombreClase ?></p>
                        <p class="tarjeta-subtitulo"><?= $sesion->tipoDeClases ?></p>
                        <p><strong>Calorías:</strong> <?= $sesion->calorias ?></p>
                        <p><strong>Fecha:</strong> <?= $sesion->fechaClases ?></p>
                        <p><strong>Duración:</strong> <?= $sesion->duracion ?></p>
                        <p><strong>Entrenador:</strong> <?= $sesion->nombreEntrenador ?></p>
                    </a>
                    <a href="index.php?controller=Sesiones&action=apuntarme&id=<?= $sesion->id ?>">
                        <button class="btn-apuntar">Apúntate</button>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="vacio">
                <h3>No hay ninguna sesión disponible.</h3>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'views/footer.php'; ?>
</body>
</html>


