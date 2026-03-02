<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>International GYM</title>
</head>
<body>
<?php
include 'header.php';
?>


<?php

foreach ($sesiones as $sesion): ?>
    <li>
        <?=htmlspecialchars($sesion->tipoDeClases)?>
        (<?= $sesion->fechaClases ?> - <?= $sesion->duracion ?>)
    </li>
<?php endforeach; ?>

<?php
include 'footer.php';
?>
</body>
</html>

