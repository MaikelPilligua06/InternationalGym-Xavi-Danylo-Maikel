<html lang="es">
<head>
    <meta charset="UTF-8">
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
<main class="pagina-editar">
    <button class="boton-volver" onclick="history.back()"><strong>Volver</strong></button>
    <div class="tarjeta-formulario">
        <form class="formulario-editar" action="index.php?controller=Ejercicios&action=actualizarEjercicio&id=<?= $ejercicios->id;?>" method="POST" enctype="multipart/form-data">
            <label class="etiqueta">Información del ejercicio</label>
            <input class="campo-texto" type="text" name="nombreEjercicio" value="<?= htmlspecialchars($ejercicios->nombreEjercicio)?>">

            <label class="etiqueta">Descripción</label>
            <textarea class="campo-textarea" name="descripcion" rows="4" cols="50" placeholder="Descripción del ejercicio" required><?= htmlspecialchars($ejercicios->descripcion) ?></textarea>

            <label class="etiqueta">Calorías</label>
            <input class="campo-numero" type="number" name="calorias" value="<?= htmlspecialchars($ejercicios->calorias)?>">

            <label class="etiqueta">Foto actual</label>
            <img class="imagen-actual" src="views/gymFotos/ejercicios/<?= htmlspecialchars($ejercicios->foto)?>" />

            <label class="etiqueta">Actualizar foto</label>
            <input class="campo-archivo" type="file" name="foto" accept="image/*"/>
            <input type="hidden" name="foto_actual" value="<?= $ejercicios->foto ?>"/>

            <button class="boton-guardar" type="submit">Actualizar</button>
        </form>
    </div>
</main>
<?php
    include 'views/footer.php';
    ?>
</body>
</html>
