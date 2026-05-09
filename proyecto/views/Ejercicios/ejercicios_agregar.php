<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Ejercicio Agregar</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/Ejercicios/ejercicios.css">
</head>
<body>
<?php
    include 'views/header.php';
?>

<div class="crear-ejercicio">
    <button class="boton-volver" onclick="history.back()">Volver</button>
    <h1 class="titulo-formulario">Crea un ejercicio</h1>
    <form class="formulario-crear" action="index.php?controller=Ejercicios&action=publicar" method="POST" enctype="multipart/form-data">
        <label class="etiqueta">Nombre</label>
        <input class="campo-texto" type="text" name="nombreEjercicio" placeholder="Nombre del ejercicio"/>
        <label class="etiqueta">Calorías</label>
        <input class="campo-texto" type="number" name="calorias" placeholder="Calorías"/>
        <label class="etiqueta">Descripción</label>
        <textarea class="campo-texto" name="descripcion" rows="4" placeholder="Descripción" required></textarea>
        <label class="etiqueta">Imagen</label>
        <input type="file" name="foto" accept="image/*"/>
        <button class="boton-guardar" type="submit">Publicar</button>
    </form>
</div>
<?php
    include 'views/footer.php'
?>
</body>
</html>