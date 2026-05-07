<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<?php include 'views/header.php'; ?>

    <section class="resumen-page">
        <h1>Pérdida Calórica</h1>

        <form method="GET" action="index.php">
            <input type="hidden" name="controller" value="Resumen">
            <input type="hidden" name="action" value="index">

            <label>Fecha inicio:</label>
            <input type="date" name="fecha_inicio" value="<?= htmlspecialchars($fechaInicio) ?>">

            <label>Fecha fin:</label>
            <input type="date" name="fecha_fin" value="<?= htmlspecialchars($fechaFin) ?>">

            <button type="submit">Consultar</button>
        </form>

        <hr>

        <h2>Calorías consumidas</h2>

        <p>
            Entre el <strong><?= htmlspecialchars($fechaInicio) ?></strong>
            y el <strong><?= htmlspecialchars($fechaFin) ?></strong>
            has consumido:
        </p>

        <h2>
            <?= htmlspecialchars($resumen['totalCalorias'] ?? 0) ?> KCAL
        </h2>
    </section>

<?php include  'views/footer.php'; ?>