<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Publicaciones del entrenador</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/CSS/sesion2.css"
</head>
<body>
<?php
    include 'views/header.php';
    ?>
<div class="titulo-publicaciones">
    <h1>Mis publicaciones</h1>
</div>


<?php if (isset($sesiones) && !empty($sesiones)): ?>
    <?php foreach ($sesiones as $publicacion): ?>
        <div class="carrusel-movil">
        <div class="pista">
            <div class="tarjeta-movil">

            <h2><?php echo $publicacion->nombreClase;?></h2>
                <p><?php echo $publicacion->calorias;?></p>
                <p><?php echo $publicacion->tipoDeClases;?></p>
                <p><?php echo $publicacion->fechaClases;?></p>
                <p><?php echo $publicacion->duracion;?></p>
                <p><?php echo $publicacion->descripcion;?></p>
                <a href="index.php?controller=Sesiones&action=eliminarEntrenador&id=<?= $publicacion->id; ?>">
                    <button>Eliminar Sesion</button>
                </a>
                <a href="index.php?controller=Sesiones&action=getSesionActualizar&id=<?= $publicacion->id; ?>">
                    <button>Actualizas Sesion</button>
                </a>
            </div>
        </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No tienes publicaciones aún.</p>
<?php endif; ?>

<p>
    <a href="index.php?controller=Sesiones&action=ver">
        <button>Crear nueva publicación</button>
    </a>
    <button onclick="history.back()">Volver</button>
</p>
<?php
include 'views/footer.php';
?>
</body>
</html>
