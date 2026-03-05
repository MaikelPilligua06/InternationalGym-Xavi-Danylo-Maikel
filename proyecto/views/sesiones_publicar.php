<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Publicar sesión</title>
</head>
<body>
<?php include 'header.php'; ?>

<h1>Publicar sesión</h1>

<form action="index.php?controller=Sesiones&action=publicar"
      method="post"
      enctype="multipart/form-data">

    <!-- id de la sesión que viene por GET -->
    <input type="hidden" name="id_sesion"
           value="<?= htmlspecialchars($_GET['id_sesion'] ?? '', ENT_QUOTES, 'UTF-8') ?>">

    <p>
        Foto:
        <input type="file" name="foto" accept="image/*">
    </p>

    <p>
        Descripción de la sesión:<br>
        <textarea name="texto" rows="4" cols="50"></textarea>
    </p>

    <p>
        <button type="button" onclick="history.back()">Volver atrás</button>
        <button type="submit">Publicar</button>
    </p>

</form>

<?php include 'footer.php'; ?>
</body>
</html>

