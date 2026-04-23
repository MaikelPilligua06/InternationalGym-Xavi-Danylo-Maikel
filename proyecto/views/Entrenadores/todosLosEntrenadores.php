<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="views/entrenador.css">
</head>
<body>
<?php
    include 'views/header.php';
?>

<div class="contenido">
        <?php foreach($lista as $entrenadorUsuario): ?>
            <a href="index.php?controller=Entrenador&action=getEntrenador&id=<?= $entrenadorUsuario->id;?>">
                <div class="texto">
                    <h1>Tu Entrenador es</h1>
                    <h2><?php echo $entrenadorUsuario->nombreEntrenador, '', $entrenadorUsuario->apellido;?></h2>
                    <h2><?php echo $entrenadorUsuario->correoElectronico;?></h2>
                    <h2><?php echo $entrenadorUsuario->descripcion;?></h2>
                </div>

                <div class="imagen">
                <img src="views/gymFotos/entrenadaor1.jpg" alt="Entrenador">
                </div>
        </a>
        <?php endforeach; ?>
</div>
<div>
        <h2>Todos los entrenadores</h2>
        <?php foreach ($entrenadores as $entrenador): ?>
        <a href="index.php?controller=Entrenador&action=getEntrenador&id=<?= $entrenador->id;?>">
            <h3><?php echo $entrenador->nombreEntrenador, ' ', $entrenador->apellido;?></h3>
            <p><?php echo $entrenador->descripcion;?></p>
            <img src="">
        </a>
        <?php endforeach; ?>
</div>
<?php
    include 'views/footer.php';
?>
</body>