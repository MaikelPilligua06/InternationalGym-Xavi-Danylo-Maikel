<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Todos los Entrenadores</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/entrenador.css">
    <link rel="stylesheet" href="views/entrenadores.css">


</head>
<?php
include 'views/header.php';
?>

<div class="contenido">

    <h1>Tu Entrenador es</h1>
    <?php foreach($lista as $entrenadorUsuario): ?>
        <a href="index.php?controller=Entrenador&action=getEntrenador&id=<?= $entrenadorUsuario->id;?>">
            <div class="texto">
                <h2><?php echo $entrenadorUsuario->nombreUsuario, '', $entrenadorUsuario->apellido;?></h2>
                <h2><?php echo $entrenadorUsuario->correoElectronico;?></h2>
                <h2><?php echo $entrenadorUsuario->descripcion;?></h2>
            </div>

            <div class="imagen">
                <img src="views/gymFotos/entrenadaor1.jpg" alt="Entrenador">
            </div>
        </a>
    <?php endforeach; ?>
</div>
<hr/>

<h3 class="logo">Todos los entrenadores</h3>

<?php foreach ($entrenadores as $entrenador): ?>
    <div class="contenido-oscuro">

        <a href="index.php?controller=Entrenador&action=getEntrenador&id=<?= $entrenador->id; ?>">
            <div class="texto">
                <h3><?= $entrenador->nombreUsuario . ' ' . $entrenador->apellido; ?></h3>
                <p><?= $entrenador->descripcion; ?></p>
            </div>
            <div class="imagen">
                <img src="views/gymFotos/entrenador.png" alt="Entrenador">
            </div>
        </a>
    </div>
<?php endforeach; ?>

<?php
include 'views/footer.php';
?>
</body>
</html>


