<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Rutina Usuario</title>

    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/CSS/infoRutinas.css">
</head>

<body>

<?php include 'views/header.php'; ?>

<main class="pagina">

    <div class="pagina-acciones">

        <a class="boton" onclick="history.back()">
            Volver
        </a>

    </div>

    <?php if (!empty($_SESSION['mensaje'])): ?>

        <p class="correcto">

            <?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>

        </p>

    <?php endif; ?>

    <?php if (!empty($_SESSION['error'])): ?>

        <p class="error">

            <?= $_SESSION['error']; unset($_SESSION['error']); ?>

        </p>

    <?php endif; ?>

    <?php if (!empty($_SESSION['error_fatal'])): ?>

        <p class="error">

            <?= $_SESSION['error_fatal']; unset($_SESSION['error_fatal']); ?>

        </p>

    <?php endif; ?>

    <?php foreach ($rutinas as $rutina): ?>

        <div class="panel">

            <h2>
                <?= htmlspecialchars($rutina->nombre_rutina) ?>
            </h2>

            <h3>
                <?= $rutina->calorias_total ?> kcal
            </h3>

            <p>
                <?= $rutina->objetivo ?>
            </p>

            <p>
                Tiempo estimado:
                <?= $rutina->fechaTiempo ?>
            </p>

            <p>
                Calorías ejercicios:
                <?= $rutina->calorias_ejercicios ?> kcal
            </p>

            <p>
                Calorías sesiones:
                <?= $rutina->calorias_sesiones ?> kcal
            </p>

            <p>
                Calorías platos:
                <?= $rutina->calorias_platos ?> kcal
            </p>

            <div>

                <?php foreach($rutina->ejercicios as $ejercicio): ?>

                    <a class="nombre-item"
                       href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>">

                        <p>
                            <?= $ejercicio->nombreEjercicio ?>
                        </p>

                        <p>
                            <?= $ejercicio->calorias ?> kcal
                        </p>

                        <p>
                            <?= $ejercicio->series ?> series
                        </p>

                        <p>
                            <?= $ejercicio->repeticiones ?> repeticiones
                        </p>

                        <p>
                            <?= $ejercicio->peso ?> kg
                        </p>

                        <img src="views/gymFotos/ejercicios/<?= $ejercicio->foto ?>"/>

                    </a>

                <?php endforeach; ?>

            </div>

            <div>

                <?php foreach($rutina->platos as $plato): ?>

                    <a class="nombre-item"
                       href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id ?>">

                        <p>
                            <?= $plato->nombrePlato ?>
                        </p>

                        <p>
                            <?= $plato->proteinas ?> g proteína
                        </p>

                        <p>
                            <?= $plato->calorias ?> kcal
                        </p>

                        <img src="views/gymFotos/alimentacion/<?= $plato->foto ?>"/>

                    </a>

                <?php endforeach; ?>

            </div>

            <div>

                <?php foreach($rutina->sesiones as $sesiones): ?>

                    <a class="nombre-item"
                       href="index.php?controller=Sesiones&action=getId&id=<?= $sesiones->id ?>">

                        <p>
                            <?= $sesiones->nombreClase ?>
                        </p>

                        <p>
                            <?= $sesiones->tipoDeClases ?>
                        </p>

                        <p>
                            <?= $sesiones->nombreUsuario ?>
                        </p>

                        <img src="views/gymFotos/sesiones/<?= $sesiones->foto ?>"/>

                    </a>

                <?php endforeach; ?>

            </div>

            <a href="index.php?controller=Rutinas&action=getRutinaActualizar&id=<?= $rutina->id_rutina ?>"
               class="boton">

                Actualizar

            </a>

            <a href="index.php?controller=Rutinas&action=eliminarRutinaDef&id=<?= $rutina->id_rutina ?>"
               class="boton">

                Borrar

            </a>

            <a href="index.php?controller=Rutinas&action=crearRutinaDiaria&id=<?= $rutina->id_rutina ?>"
               class="boton">

                Rutina del día

            </a>

        </div>

    <?php endforeach; ?>

</main>

<?php include 'views/footer.php'; ?>

</body>
</html>