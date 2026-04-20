<!DOCTYPE HTML>
<html lang="es">
<head>
    <link rel="stylesheet" href="views/styles.css">
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
        <label>Series</label>
            <input type="number" name="series" placeholder="Introduce el número de sesiones"/>
        <label>Repeticiones</label>
            <input type="number" name="repeticiones" placeholder="Introduce el número de repeticiones"/>
        <label>Peso</label>
            <input type="number" name="peso" placeholder="Introducir si hay existencia de peso"/>
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