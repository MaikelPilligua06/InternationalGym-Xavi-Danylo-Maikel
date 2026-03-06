<?php
    include 'header.php'
?>
<h1>Crear nueva publicación</h1>

<form action="index.php?controller=Sesiones&action=publicar" method="POST" >

    <label>Nombre de la Sesión</label>
        <input type="text" name="nombre"/></br>
    <label>Tipo de la Sesión</label>
    <select name="tipoDeClases">
        <option value="Cardio">Cardio</option>
        <option value="Cycling">Cycling</option>
        <option value="trenSuperior">Tren Superior</option>
        <option value="trenInferior">Tren inferior</option>
    </select>
    <label>Fecha de la Sesión</label>
        <input type="date" name="fechaClases"/>
</br>
    <label>Duración de la clase</label>
        <input type="time" name="duracion"/>
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

