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
<form action="index.php?controller=Sesiones&action=actulizarSesion" method="POST" enctype="multipart/form-data" >
    <label>Detalles de la Sesion</label>
    <input type="text" name="nombreClase" value="<?= $sesion->nombreClase?>">
    <label> Tipo de Clases</label>
    <select name="tipoDeClases">
        <option value="Cardio" <?= $sesion->tipoDeClases == 'Cardio' ? 'selected' : '' ?>>Cardio</option>
        <option value="Cycling" <?= $sesion->tipoDeClases == 'Cycling' ? 'selected' : '' ?>>Cycling</option>
        <option value="trenSuperior" <?= $sesion->tipoDeClases == 'trenSuperior' ? 'selected' : '' ?>>Tren Superior</option>
        <option value="trenInferior" <?= $sesion->tipoDeClases == 'trenInferior' ? 'selected' : '' ?>>Tren inferior</option>
    </select>
    <label>Fecha de la clase</label>
    <input type="date" name="fechaClases" value="<?= $sesion->fechaClases?>">
    <label>Duración: </label>
    <input type="time" name="duracion" value="<?= $sesion->duracion?>">
    <label>Descripcion</label>
    <textarea name="descripcion" rows="4" cols="50" placeholder="Descripción de tu sesión" required><?= htmlspecialchars($sesion->descripcion) ?>
    </textarea>
    <label>Foto actual</label>
    <img src="views/gymFotos/sesiones/<?= $sesion->foto?>"/>
    <label>Actualizarla: </label>
    <input type="file" name="foto" accept="image/*"/>
</form>
<?php
    include 'views/footer.php';
?>
</body>
</html>
