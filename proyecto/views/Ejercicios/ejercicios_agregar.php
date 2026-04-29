<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Ejercicio Agregar</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include 'views/header.php';
?>
<div class="crear-publicacion">


    <h1>Crea un ejercicio</h1>

    <form action="index.php?controller=Ejercicios&action=publicar" method="POST" enctype="multipart/form-data" >
        <label>Nombre Ejercicio</label>
            <input type="text" name="nombreEjercicio" placeholder="Introduce el nombre del ejercicio"/><br/>
        <label>Calorias</label>
            <input type="number" name="calorias" placeholder="Introducir calorias"/>
        <label>Descripción</label>
        <textarea name="descripcion" rows="4" cols="50"
                  placeholder="Introduce descripción" required></textarea>
        <br/>
        <label>Imagen del ejercicio</label>
        <input type="file" name="foto" accept="image/*"/>
        <div class="button">
            <p>
                <button type="button" onclick="history.back()">← Volver atrás</button>
                <button type="submit">Publicar</button>
            </p>
        </div>
</div>
</form>

<?php
    include 'views/footer.php'
?>
</body>
</html>