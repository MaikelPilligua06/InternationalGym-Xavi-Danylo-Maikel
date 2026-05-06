<<<<<<< HEAD
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Resumen diario</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include 'views/header.php';
    ?>
=======
<?php include __DIR__ . "/../header.php"; ?>
>>>>>>> 40479de8991d3be5a55e23802afbbcef13dac02b

<section class="resumen-page">
    <h1>Pérdida Calórica</h1>

    <form method="GET" action="index.php">
        <input type="hidden" name="controller" value="Resumen">
        <input type="hidden" name="action" value="index">

<<<<<<< HEAD
    <h3>Este dia has perdido un total de <?= $resumen->caloriasConsumidas?>kCAL</h3>
    <h3>Estas a x CAL de alcanzar tu objetivo!!</h3>
    <h3>¿Quieres ajustar tu objetivo calórico?</h3>
    <p>Clica aqui para hacerlo!!</p>
</div>
<?php
    include 'views/footer.php';
?>
</body>
</html>
=======
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

<?php include __DIR__ . "/../footer.php"; ?>
>>>>>>> 40479de8991d3be5a55e23802afbbcef13dac02b
