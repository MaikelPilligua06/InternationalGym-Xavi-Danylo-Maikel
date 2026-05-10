<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Rutina Usuario</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/Rutinas/rutinas.css">
</head>
<body>
<?php
    include 'views/header.php';
?>
<main>
        <?php if (!empty($rutinas)) : ?>
            <?php foreach ($rutinas as $rutina) : ?>
                <div class="panel">
                    <h3><?= htmlspecialchars($rutina->nombre_rutina) ?> — <?= $rutina->calorias_total ?> kcal</h3>
                    <p><?= $rutina->objetivo?></p>
                    <p>Tiempo estimado haciendo la rutina: <?= $rutina->fechaTiempo?></p>
                    <p>Calorias consumidas por ejercicios: <?= $rutina->calorias_ejercicios ?></p>
                    <p>Calorias consumidas por sesiones: <?= $rutina->calorias_sesiones ?></p>
                    <p>Calorias ingeridas por platos: <?= $rutina->calorias_platos ?></p>

                    <a href="index.php?controller=Rutinas&action=actualizarRutina" class="boton boton-volver">Actualizar</a>
                    <a href="index.php?controller=Rutinas&action=borrarRutina" class="boton boton-volver"
                       onclick="return confirm('Al volver se borraran esta rutina que no has guardado')">Borrar</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
        <h3>No tienes ninguna rutina, crea una:
            <a href="index.php?controller=Rutinas&action=crearRutina">
                <button>Crear una rutina</button>
            </a></h3></h1>
        <?php endif; ?>

    <div>
        <h3>Tu rutina de hoy</h3>
        <p>Total de calorias consumidas (alimentación): </p>
        <p>Total de calorias quemadas (entrenos): </p>
        <p>Total de proteinas</p>
        <p>Total de carbohidrados</p>
        <p>Duración: </p>
        <p>Listado de Ejercicios: </p>
        <p>Listado de Comida: </p>
    </div>
    <div>
        <h3>Crea una Rutina</h3>
        <a href="index.php?controller=Rutinas&action=crearRutina">
            <button>Crear una rutina</button>
        </a>
    </div>

</main>
<?php
    include 'views/footer.php';
?>
</body>
</html>
