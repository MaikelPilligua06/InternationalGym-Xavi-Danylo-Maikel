<?php
    include 'header.php'
?>
<h1>Crear nueva publicación</h1>

<form action="index.php?controller=Sesiones&action=publicar"
      method="post" enctype="multipart/form-data">

    <label>Nombre de la Sesión</label>
        <input type="text" name="nombre"/></br>

    <label>Fecha de la Sesión</label>
        <input type="date" name="fechaClases"/>
</br>
    <label>Duración de la clase</label>
        <input type="tine" name="duración"
    <p>
    </br>
        <label>Descripción de tu sesión:</label><br>
        <textarea name="descripcion" rows="4" cols="50"
                  placeholder="" required></textarea>
    </p>

    <p>
        <button type="button" onclick="history.back()">← Volver atrás</button>
        <button type="submit">Publicar</button>
    </p>
</form>
<?php
    include 'footer.php';
    ?>




