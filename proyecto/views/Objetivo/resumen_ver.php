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

<h2>Perdida Calorica de este mes</h2>
<hr>

<div>
    <h2>Crear mes</h2>
</div>
<div>

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