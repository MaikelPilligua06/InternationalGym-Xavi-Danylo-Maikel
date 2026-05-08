<!DOCTYPE HTML>
<html lang="es">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="InternationalGYM">
        <title>Publicaciones del entrenador</title>
        <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
        <link rel="stylesheet" href="styles.css">
    </head>
</head>
<body>
<?php
    include 'views/header.php';
?>
<form action="index.php?controller=Sesiones&action=apuntarme&id=<?= $sesion->id ?>" method="POST">
    <button onclick="history.back()">Volver</button>
    <button>Actualizar</button>
</form>
<form>
    <label>Detalles de la Sesion</label>
    <input type="text" name="nombreClase" value="<?= $sesion->nombreClase?>">
    <label> Tipo de Clases</label>
    <select name="tipoDeClases" value="<?= $sesion->tipoDeClases?>">
        <option value="Cardio">Cardio</option>
        <option value="Cycling">Cycling</option>
        <option value="trenSuperior">Tren Superior</option>
        <option value="trenInferior">Tren inferior</option>
    </select>
    <h3>Tipo de clase: <?= $sesion->tipoDeClases?></h3>
    <h3>Fecha de la clase: <?= $sesion->fechaClases?></h3>
    <h3>Duración: <?= $sesion->duracion?></h3>
    <h3>Descripción: <?= $sesion->descripcion?></h3>
    <img src="views/gymFotos/sesiones/<?= $sesion->foto?>"/>
</form>
<?php
    include 'views/footer.php';
?>
</body>
</html>
