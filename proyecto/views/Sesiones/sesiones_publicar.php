<?php
include 'views/header.php'
?>

<head>
    <link rel="stylesheet" href="views/styles.css">
</head>

<div class="crear-publicacion">


<h1>Crear nueva publicación</h1>

<form action="index.php?controller=Sesiones&action=publicar" method="POST" enctype="multipart/form-data" >
    <label>Nombre de la Sesión</label>
        <input type="text" name="nombreClase"/><br/>
    <label>Tipo de la Sesión</label>
    <select name="tipoDeClases">
        <option value="Cardio">Cardio</option>
        <option value="Cycling">Cycling</option>
        <option value="trenSuperior">Tren Superior</option>
        <option value="trenInferior">Tren inferior</option>
    </select>
    <label>Fecha de la Sesión</label>
        <input type="date" name="fechaClases"/>

    <label>Duración de la clase</label>
        <input type="time" name="duracion"/>
    <p>
        <label>Descripción de tu sesión:</label><br>
        <textarea name="descripcion" rows="4" cols="50"
                  placeholder="" required></textarea>
    </p>
    <br/>
    <label>Imagen de la sesión</label>
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
    include 'views/footer.php';
    ?>

