<!DOCTYPE html>
<html lang="es">
<head>
    <title>Publicaciones Entrenador</title>
    <link rel="stylesheet" href="views/styles.css">
</head>
<?php
    include 'views/header.php';
    ?>
<h1>Mis publicaciones</h1>



<?php if (isset($sesiones) && !empty($sesiones)): ?>
    <?php foreach ($sesiones as $publicacion): ?>
        <div class="carrusel-movil">
        <div class="pista">
            <div class="tarjeta-movil">

            <h2><?php echo $publicacion->nombreClase;?></h2>
                <p><?php echo $publicacion->tipoDeClases;?></p>
                <p><?php echo $publicacion->fechaClases;?></p>
                <p><?php echo $publicacion->duracion;?></p>
                <p><?php echo $publicacion->descripcion;?></p>
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