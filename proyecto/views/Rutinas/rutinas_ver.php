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
<?php
    include 'views/header.php';
?>
<main class="pagina">
    <a href="index.php?controller=Rutinas&action=crearRutina">
        <h2 class="boton boton-volver">Crear una rutina</h2>
    </a>
        <?php if (!empty($rutinas)) : ?>
            <?php foreach ($rutinas as $rutina) : ?>
                <div class="panel">
                    <a href="index.php?controller=Rutinas&action=verRutina&id=<?= $rutina->id_rutina?>">
                        <h2>Todas tus Rutinas</h2>
                        <h3><?= htmlspecialchars($rutina->nombre_rutina) ?> — <?= $rutina->calorias_total ?> kcal</h3>
                        <p><?= $rutina->objetivo?></p>
                        <p>Tiempo estimado haciendo la rutina: <?= $rutina->fechaTiempo?></p>
                        <p>Calorias consumidas por ejercicios: <?= $rutina->calorias_ejercicios ?></p>
                        <p>Calorias consumidas por sesiones: <?= $rutina->calorias_sesiones ?></p>
                        <p>Calorias ingeridas por platos: <?= $rutina->calorias_platos ?></p>
                    </a>
                    <a href="index.php?controller=Rutinas&action=getRutinaActualizar&id=<?= $rutina->id_rutina?>" class="boton boton-volver">Actualizar</a>
                    <a href="index.php?controller=Rutinas&action=eliminarRutinaDef&id=<?= $rutina->id_rutina ?>"
                       class="boton boton-volver">Borrar
                    </a>
                    <a href="index.php?controller=Rutinas&action=crearRutinaDiaria&id=<?= $rutina->id_rutina ?>" class="boton boton-volver">Rutina del día</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h3>No tienes ninguna rutina, crea una:</h3>
            <a href="index.php?controller=Rutinas&action=crearRutina">
                <button>Crear una rutina</button>
            </a>
        <?php endif; ?>

    <?php if (!empty($diaRutina)) : ?>
    <?php foreach ($diaRutina as $rutina) : ?>
        <div class="panel">
            <h2>Rutina del dia: </h2>
            <h3><?= htmlspecialchars($rutina->nombre_rutina) ?> — <?= $rutina->calorias_total ?> kcal</h3>
            <p><?= $rutina->objetivo?></p>
            <p>Tiempo estimado haciendo la rutina: <?= $rutina->fechaTiempo?></p>
            <p>Calorias consumidas por ejercicios: <?= $rutina->calorias_ejercicios ?></p>
            <p>Calorias consumidas por sesiones: <?= $rutina->calorias_sesiones ?></p>
            <p>Calorias ingeridas por platos: <?= $rutina->calorias_platos ?></p>
            <a href="index.php?controller=Rutinas&action=deleteRutinaDiaria&id=<?= $rutina->id_rutina ?>"
               onclick="return confirm('Estas seguro de borrar esta rutina?')"
               class="boton boton-volver">Eliminar Rutina Diaria</a>
            <a href="index.php?controller=Rutinas&action=getRutinaActualizar&id=<?= $rutina->id_rutina?>" class="boton boton-volver">Actualizar</a>
        </div>
        <?php endforeach; ?>
    <?php else : ?>
    <div>
        <h3>No tienes una Rutina seleccionada para el dia de hoy, crea una o agrega una</h3>
            <a href="index.php?controller=Rutinas&action=crearRutina">
                <button>Crear una rutina</button>
            </a>
    </div>
    <?php endif; ?>
</main>
<?php
    include 'views/footer.php';
?>
</body>
</html>
