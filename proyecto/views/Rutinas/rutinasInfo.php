<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Rutina Usuario</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/rutinas2.css">
</head>
<body>
<?php
include 'views/header.php';
?>
<main class="pagina">
    <div class="pagina-acciones">
        <a href="index.php?controller=Rutinas&action=volver" class="boton boton-volver">Volver</a>
    </div>
    <?php foreach ($rutinas as $rutina) : ?>
        <div class="panel">
            <h2>Nombre: <?= htmlspecialchars($rutina->nombre_rutina) ?></h2>
            <h3>Total de calorias consumidas: <?= $rutina->calorias_total ?> kcal</h3>
            <p><?= $rutina->objetivo?></p>
            <p>Tiempo estimado haciendo la rutina: <?= $rutina->fechaTiempo?></p>
            <p>Calorias consumidas por ejercicios: <?= $rutina->calorias_ejercicios ?></p>
            <p>Calorias consumidas por sesiones: <?= $rutina->calorias_sesiones ?></p>
            <p>Calorias ingeridas por platos: <?= $rutina->calorias_platos ?></p>

            <div>
                <?php foreach($rutina->ejercicios as $ejercicio) : ?>
                <a class="nombre-item" href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>">
                <p><?= $ejercicio->nombreEjercicio ?></p>
                    <p><?= $ejercicio->calorias ?></p>
                    <p><?= $ejercicio->series ?></p>
                    <p><?= $ejercicio->repeticiones ?></p>
                    <p><?= $ejercicio->peso ?></p>
                    <img src="views/gymFotos/ejercicios/<?= $ejercicio->foto ?>"/>
                </a>
                <?php endforeach;?>
            </div>
            <div>
                <?php foreach($rutina->platos as $plato): ?>
                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id ?>">
                <p><?= $plato->nombrePlato ?></p>
                    <p><?= $plato->proteinas ?></p>
                    <p><?= $plato->calorias ?></p>
                <img src="views/gymFotos/alimentacion/<?= $plato->foto ?>"/>
                </a>
                <?php endforeach; ?>
            </div>

            <div>
                <?php foreach($rutina->sesiones as $sesiones): ?>
                    <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesiones->id ?>">
                        <p><?= $sesiones->nombreClase ?></p>
                        <p><?= $sesiones->tipoDeClases ?></p>
                        <p><?= $sesiones->nombreUsuario ?></p>
                        <img src="views/gymFotos/sesiones/<?= $sesiones->foto ?>"/>
                    </a>
                <?php endforeach; ?>
            </div>
            <a href="index.php?controller=Rutinas&action=actualizarRutina" class="boton boton-volver">Actualizar</a>
            <a href="index.php?controller=Rutinas&action=eliminarRutinaDef&id=<?= $rutina->id_rutina ?>"
               class="boton boton-volver">Borrar
            </a>
            <a href="index.php?controller=Rutinas&action=crearRutinaDiaria&id=<?= $rutina->id_rutina ?>" class="boton boton-volver">Rutina del día</a>
        </div>
    <?php endforeach; ?>
</main>
<?php
include 'views/footer.php';
?>
</body>
</html>
