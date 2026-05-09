<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title><?php echo $entrenador->nombreUsuario;?></title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/styles.css">

</head>
<body>
<?php
    include 'views/header.php';
    ?>

<div>
    <h1><?php echo $entrenador->nombreUsuario, ' ',  $entrenador->apellido;?></h1>
    <h2>Correo Electronico: <?php echo $entrenador->correoElectronico;?></h2
    <p><?php echo $entrenador->descripcion;?></p>
    <img src="views/usuarios/<?= $entrenador->foto;?> ?>"
</div>

<div class="carrusel-movil">
    <h2>Sesiones del entrenador</h2>
    <div class="pista">
        <?php if(!empty($sesiones)) :?>
            <?php foreach ($sesiones as $sesion): ?>
                <div class="tarjeta-movil">
                    <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>">
                        <h4>Nombre de la clase: <?= $sesion->nombreClase ?></h4>
                        <h4>TIpo de clases: <?= $sesion->tipoDeClases ?></h4>
                        <p><strong>Calorias:</strong> <?= $sesion->calorias ?></p>
                        <p><strong>Fecha:</strong> <?= $sesion->fechaClases ?></p>
                        <p><strong>Duracion:</strong> <?= $sesion->duracion ?></p>
                    </a>
                    <a href="index.php?controller=Sesiones&action=apuntarme&id=<?= $sesion->id ?>">
                        <button>Apuntate</button>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h1>No tiene sesiones actualmente</h1>
        <?php endif; ?>
    </div>
</div>
<form>
    <button>Cambiar de entrenador</button>
    <button>Volver</button>
</form>
<?php
    include 'views/footer.php';
?>
</body>
</html>