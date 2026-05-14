<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/CSS/resumen.css">
</head>
<?php include 'views/header.php'; ?>
<main>
<section class="resumen-page">
    </div>
    <div class="contenedor-plato">
        <div class="botones-plato">
            <button class="btn-volver" onclick="history.back(); return false;">Volver</button>
        </div>
        <h1>Pérdida Calórica</h1>
        <?php if (!empty($_SESSION['mensaje'])): ?>
            <p class="correcto"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></p>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error'])): ?>
            <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error_fatal'])): ?>
            <p class="error"><?= $_SESSION['error_fatal']; unset($_SESSION['error_fatal']); ?></p>
        <?php endif; ?>
        <form method="GET" action="index.php">
            <input type="hidden" name="controller" value="Resumen">
            <input type="hidden" name="action" value="index">
        </form>

        <form method="get" action="index.php">
            <input type="hidden" name="controller" value="Resumen">
            <input type="hidden" name="action" value="verResumen">
            <input type="date" name="fecha_inicio" value="<?= date('Y-m-01') ?>">
            <input type="date" name="fecha_fin" value="<?= date('Y-m-d') ?>">
            <button type="submit">Consultar</button>
        </form>

        <hr>

        <h2>Calorías consumidas</h2>
        <p class="descripcion-plato">
            Entre el <strong><?=($fechaInicio) ?></strong>
            y el <strong><?=($fechaFin) ?></strong>
            has consumido:
        </p>
        <?php if(!empty($resumen)): ?>
            <div class="calorias-valor">
                <?php foreach ($resumen as $rutina): ?>
                    <a href="index.php?controller=Rutinas&action=verRutina&id=<?= $rutina->id_rutina ?>" class="panel-enlace">
                        <h3>Nombre Rutina: <?= $rutina->nombre_rutina ?></h3>
                        <p>Día que se realizó: <?= $rutina->fecha_inicio ?></p>
                        <p>Calorías gastadas (ejercicios): <?= $rutina->calorias_ejercicios ?> kcal</p>
                        <p>Calorías gastadas (sesiones): <?= $rutina->calorias_sesiones ?> kcal</p>
                        <p>Calorías ingeridas: <?= $rutina->calorias_ingeridas ?> kcal</p>
                        <p>Total gastado: <?= $rutina->calorias_gastadas ?> kcal</p>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="calorias-valor">
                <h4>No has realizado ninguna rutina entre estas fechas</h4>
            </div>
        <?php endif; ?>
</section>
</main>
<?php include  'views/footer.php'; ?>
</html>
