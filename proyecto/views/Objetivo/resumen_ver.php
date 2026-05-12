<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/resumen.css">
</head>
<?php include 'views/header.php'; ?>

<section class="resumen-page">
    <div class="contenedor-plato">
        <h1>Pérdida Calórica</h1>

        <form method="GET" action="index.php">
            <input type="hidden" name="controller" value="Resumen">
            <input type="hidden" name="action" value="index">

            <div>
                <label for="fecha_inicio">Fecha inicio:</label>
                <input id="fecha_inicio" type="date" name="fecha_inicio" value="<?=($fechaInicio) ?>">
            </div>

            <div>
                <label for="fecha_fin">Fecha fin:</label>
                <input id="fecha_fin" type="date" name="fecha_fin" value="<?=($fechaFin) ?>">
            </div>

            <div>
                <button type="submit">Consultar</button>
            </div>
        </form>

        <hr>

        <h2>Calorías consumidas</h2>

        <p class="descripcion-plato">
            Entre el <strong><?=($fechaInicio) ?></strong>
            y el <strong><?=($fechaFin) ?></strong>
            has consumido:
        </p>

        <div class="calorias-valor">
            <?=($resumen['totalCalorias'] ?? 0) ?> KCAL
        </div>

        <div class="botones-plato">
            <button class="btn-volver" onclick="history.back(); return false;">Volver</button>
            <button class="btn-agregar">Exportar</button>
        </div>
    </div>
</section>

<?php include  'views/footer.php'; ?>