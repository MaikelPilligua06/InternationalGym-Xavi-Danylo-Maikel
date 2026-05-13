<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title><?php echo $entrenador->nombreUsuario;?></title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/entrenador2.css">
</head>
<body>
<?php
include 'views/header.php';
?>
<main>
    <?php if (!empty($_SESSION['mensaje'])): ?>
        <p class="correcto"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>
    <div class="publicaciones">
        <h1><?php echo $entrenador->nombreUsuario, ' ',  $entrenador->apellido;?></h1>
        <div class="tarjeta">
            <p class="tarjeta-subtitulo">Correo Electrónico: <?php echo $entrenador->correoElectronico;?></p>
            <p><?php echo $entrenador->descripcion;?></p>
        </div>
        <img src="views/gymFotos/<?= $entrenador->foto?>" alt="Entrenador">
    </div>

    <div class="carrusel">
        <h1>Sesiones del entrenador</h1>
        <div class="pista">
            <?php if(!empty($sesiones)) :?>
                <?php foreach ($sesiones as $sesion): ?>
                    <div class="tarjeta">
                        <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>">
                            <h3 class="tarjeta-titulo"><?= $sesion->nombreClase ?></h3>
                            <p class="tarjeta-subtitulo">Tipo: <?= $sesion->tipoDeClases ?></p>
                            <p>Calorías: <?= $sesion->calorias ?></p>
                            <p>Fecha: <?= $sesion->fechaClases ?></p>
                            <p>Duración: <?= $sesion->duracion ?></p>
                        </a>
                        <a href="index.php?controller=Entrenador&action=apuntarme&id=<?= $sesion->id ?>">
                            <button class="btn-apuntar">Apúntate</button>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="vacio">
                    <h3>No tiene sesiones actualmente</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="carrusel" style="text-align: center;">
        <form style="display: inline-flex; gap: 16px;">
            <button class="btn-eliminar" type="button" onclick="history.back()">Volver</button>
        </form>
        <a href="index.php?controller=Entrenador&action=cambiarEntrenador&id=<?= $entrenador->id?>">
            <button class="btn-apuntar" type="button">Cambiar de entrenador</button>
        </a>
    </div>
</main>
<?php
include 'views/footer.php';
?>
</body>
</html>
