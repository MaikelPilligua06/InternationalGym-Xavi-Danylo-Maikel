<h1>Crear nueva publicación</h1>

<form action="index.php?controller=Sesiones&action=publicar"
      method="post" enctype="multipart/form-data">

    <p>
        <label>Foto de tu sesión:</label><br>
        <input type="file" name="foto" accept="image/*" required>
    </p>

    <p>
        <label>Descripción de tu sesión:</label><br>
        <textarea name="texto" rows="4" cols="50"
                  placeholder="" required></textarea>
    </p>

    <p>
        <button type="button" onclick="history.back()">← Volver atrás</button>
        <button type="submit">Publicar</button>
    </p>
</form>


