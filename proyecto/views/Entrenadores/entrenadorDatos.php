<!DOCTYPE html>
<html lang="es">
<head>
    <title>Entrenador - Sesiones</title>
    <link rel="stylesheet" href="views/styles.css">
</head>
<?php
    include 'views/header.php';
    ?>

<div>
    <h1><?php echo $entrenador->nombreEntrenador, ' ',  $entrenador->apellido;?></h1>
    <h2>Correo Electronico: <?php echo $entrenador->correoElectronico;?></h2
        <p>Dispobilidad horaria: <?php echo $entrenador->disponibilidadHoraria;?></p>
    <p><?php echo $entrenador->descripcion;?></p>
</div>

<div class="carrusel-movil">
    <h2>Sesiones del entrenador</h2>
    <div class="pista">

        <?php foreach ($sesiones as $sesion): ?>
            <div class="tarjeta-movil">
                <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>">
                    <h4>Nombre de la clase: <?= $sesion->nombreClase ?></h4>
                    <h4>TIpo de clases: <?= $sesion->tipoDeClases ?></h4>
                    <p><strong>Fecha:</strong> <?= $sesion->fechaClases ?></p>
                    <p><strong>Duracion:</strong> <?= $sesion->duracion ?></p>
`                </a>
                <a href="index.php?controller=Sesiones&action=apuntarme&id=<?= $sesion->id ?>">
                    <button>Apuntate</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<form>
    <button>Cambiar de entrenador</button>
    <button>Volver</button>
</form>
<?php
    include 'views/footer.php';
?>
