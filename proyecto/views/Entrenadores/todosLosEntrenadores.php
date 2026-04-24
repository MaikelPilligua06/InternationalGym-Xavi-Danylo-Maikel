<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="views/entrenador.css">
    <link rel="stylesheet" href="views/entrenadores.css"
</head>
<div>
<?php
    include 'views/header.php';
?>

<div class="contenido">

    <h1>Tu Entrenador es</h1>
        <?php foreach($lista as $entrenadorUsuario): ?>
            <a href="index.php?controller=Entrenador&action=getEntrenador&id=<?= $entrenadorUsuario->id;?>">
                <div class="texto">
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
    <hr/>
<div class="contenido-oscuro">
        <?php foreach ($entrenadores as $entrenador): ?>
        <a href="index.php?controller=Entrenador&action=getEntrenador&id=<?= $entrenador->id;?>">

            <div class="texto"
            <h3>Todos los entrenadores</h3>
            <h3><?php echo $entrenador->nombreEntrenador, ' ', $entrenador->apellido;?></h3>
            <h3><?php echo $entrenador->descripcion;?></h3>
        </div>
            <div class="imagen">
            <img src="views/gymFotos/entrenador.png" alt="Entrenador"">
            </div>
        </a>
        <?php endforeach; ?>
</div>
<?php
    include 'views/footer.php';
?>
</body>