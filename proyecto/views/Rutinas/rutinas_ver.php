<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Rutina Usuario</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/rutiinas.css">
</head>
<body>
<?php include 'views/header.php'; ?>

<main class="pagina">
    <?php if (!empty($rutinas)) : ?>
        <?php foreach ($rutinas as $rutina) : ?>
            <div class="panel">
                <a href="index.php?controller=Rutinas&action=verRutina&id=<?= $rutina->id_rutina?>" class="panel-enlace">
                    <h2>Todas tus Rutinas</h2>
                    <h3><?= htmlspecialchars($rutina->nombre_rutina) ?> — <?= $rutina->calorias_total ?> kcal</h3>
                    <p><strong>Objetivo:</strong> <?= $rutina->objective?></p>
                    <p>Tiempo estimado haciendo la rutina: <?= $rutina->fechaTiempo?></p>
                    <p>Calorias consumidas por ejercicios: <?= $rutina->calorias_ejercicios ?></p>
                    <p>Calorias consumidas por sesiones: <?= $rutina->calorias_sesiones ?></p>
                    <p>Calorias ingeridas por platos: <?= $rutina->calorias_platos ?></p>
                </a>
                <div class="panel-acciones">
                    <a href="index.php?controller=Rutinas&action=getRutinaActualizar&id=<?= $rutina->id_rutina?>" class="boton boton-volver">Actualizar</a>
                    <a href="index.php?controller=Rutinas&action=eliminarRutinaDef&id=<?= $rutina->id_rutina ?>" class="boton boton-eliminar">Borrar</a>
                    <a href="index.php?controller=Rutinas&action=crearRutinaDiaria&id=<?= $rutina->id_rutina ?>" class="boton boton-diaria">Rutina del día</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="panel-vacio">
            <h3>No tienes ninguna rutina guardada en tu perfil.</h3>
        </div>
    <?php endif; ?>

    <?php if (!empty($diaRutina)) : ?>
        <?php foreach ($diaRutina as $rutina) : ?>
            <div class="panel panel-destacado">
                <h2>Rutina del dia: </h2>
                <h3><?= htmlspecialchars($rutina->nombre_rutina) ?> — <?= $rutina->calorias_total ?> kcal</h3>
                <p><strong>Objetivo:</strong> <?= $rutina->objective?></p>
                <p>Tiempo estimado haciendo la rutina: <?= $rutina->fechaTiempo?></p>
                <p>Calorias consumidas por ejercicios: <?= $rutina->calorias_ejercicios ?></p>
                <p>Calorias consumidas por sesiones: <?= $rutina->calorias_sesiones ?></p>
                <p>Calorias ingeridas por platos: <?= $rutina->calorias_platos ?></p>
                <div class="panel-acciones">
                    <a href="index.php?controller=Rutinas&action=deleteRutinaDiaria&id=<?= $rutina->id_rutina ?>" onclick="return confirm('Estas seguro de borrar esta rutina?')" class="boton boton-eliminar">Eliminar Rutina Diaria</a>
                    <a href="index.php?controller=Rutinas&action=getRutinaActualizar&id=<?= $rutina->id_rutina?>" class="boton boton-volver">Actualizar</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="panel-vacio">
            <h3>No has seleccionado ninguna rutina activa para el día de hoy.</h3>
        </div>
    <?php endif; ?>

    <div class="pie-acciones">
        <a href="index.php?controller=Rutinas&action=crearRutina" class="boton boton-principal">Crear una rutina</a>
    </div>
</main>

<?php include 'views/footer.php'; ?>
</body>
</html>
