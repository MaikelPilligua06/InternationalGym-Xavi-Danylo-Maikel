<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Crear Rutina</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/sesionadmin.css">
</head>
<body>
<?php
include 'views/header.php';
?>

<div class="pagina dividir">
    <div class="panel">
        <h1>Detalles de la Sesion - <?= $sesion->nombreClase?></h1>
        <h3>Calorias: <?= $sesion->calorias?></h3>
        <h3>Tipo de clase: <?= $sesion->tipoDeClases?></h3>
        <h3>Fecha de la clase: <?= $sesion->fechaClases?></h3>
        <h3>Duración: <?= $sesion->duracion?></h3>
        <h3>Descripción: <?= $sesion->descripcion?></h3>

        <img src="views/gymFotos/sesiones/<?= $sesion->foto?>"/>

        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'usuario'): ?>
            <?php if ($apuntado): ?>
                <form action="index.php?controller=Sesiones&action=eliminarSesion&id=<?= $sesion->id ?>" method="POST">
                    <button class="boton boton-principal">Desapuntarme</button>
                </form>
            <?php else: ?>
                <form action="index.php?controller=Sesiones&action=apuntarme&id=<?= $sesion->id ?>" method="POST">
                    <button class="boton boton-principal">Apuntarme</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
        <button class="boton boton-volver" onclick="history.back()">Volver</button>
    </div>
</div>

<?php
include 'views/footer.php';
?>
