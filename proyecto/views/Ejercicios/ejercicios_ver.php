<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta charset=""
    <meta name="author" content="InternationalGYM">
    <title>Ejercicio <?= $ejercicios->nombreEjercicio?></title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/Ejercicios/ejercicios.css">
</head>
<body>
<?php
    include 'views/header.php';
    ?>
<main class="pagina-info">
    <button class="boton-volver" onclick="history.back()">Volver</button>
    <div class="tarjeta-info">
        <h2><?= $ejercicios->nombreEjercicio ?></h2>
        <h3><?= $ejercicios->descripcion ?></h3>
        <h3>Calorías: <?= $ejercicios->calorias ?></h3>
        <img class="imagen-actual" src="views/gymFotos/ejercicios/<?= $ejercicios->foto ?>"/>
    </div>
    <form action="index.php?controller=Ejercicios&action=addEjercicio&id=<?= $ejercicios->id ?>" method="POST">
        <button class="boton-actualizar">Añadir a mi entrenamiento</button>
    </form>
</main>
<?php
    include 'views/footer.php';
?>
</body>
</html>