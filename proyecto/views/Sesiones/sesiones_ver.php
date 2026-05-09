<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Crear Rutina</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include 'views/header.php';
    ?>

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
                <button>Desapuntarme</button>
            </form>
        <?php else: ?>
            <form action="index.php?controller=Sesiones&action=apuntarme&id=<?= $sesion->id ?>" method="POST">
                <button>Apuntarme</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>
<button onclick="history.back()">Volver</button>



<?php
    include 'views/footer.php';
    ?>


