<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Fatal error</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="views/styles.css">
</head>
<body>
<?php
    include 'header.php';
    ?>
<main>
    <div class="contenedor-error">
        <div class="bloque-error">
            <h1 class="error-mensaje">Algo ha salido mal</h1>

            <?php if (!empty($_SESSION['error_fatal'])): ?>
                <p class="error-mensaje"><?= $_SESSION['error_fatal']; unset($_SESSION['error_fatal']); ?></p>
            <?php else: ?>
                <p class="error-mensaje">Ha ocurrido un error inesperado.</p>
            <?php endif; ?>

            <button class="btn-errores" onclick="history.back()">Volver atrás</button>
            <a href="index.php?controller=Resumen&action=index">
                <button class="btn-errores">Ir al inicio</button>
            </a>
        </div>
    </div>
</main>
<?php
include 'footer.php';
?>
</body>
</html>