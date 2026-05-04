<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Perfil</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/styles.css">
</head>
<body>
<?php
    include 'views/header.php';
?>

<div class="perfil">
    <h2>Mi Perfil</h2>

    <form>
        <h3>Nombre: </h3>
        <p><?= $usuario->nombreUsuario ?></p>

        <h3>Apellido: </h3>
        <p><?php echo $usuario->apellido ;?></p>


        <h3>Numero Telefono: </h3>
        <p><input type="tel" name="numeroTel" value="<?php echo $usuario->numeroTelefono ;?>"></p>


        <h3>Correo Electronico: </h3>
        <p><input type="email" name="correoEle" value="<?php echo $usuario->correoElectronico ;?>"></p>


        <h3>Peso: </h3>
        <p><input type="number" name="peso" value="<?php echo $usuario->peso ;?>"></p>

        <h3>Altura: </h3>
        <p><input type="number" name="altura" value="<?php echo $usuario->altura ;?>"></p>


        <h3>Objetivo: </h3>
        <select name="objetivo">
            <option value="perder peso">Perder peso</option>
            <option value="ganar fuerza">Ganar Fuerza</option>
            <option value="estabilidad">Estabilidad</option>
        </select>

    <div class="button">
        <button type value="submit">Guardar</button>
    </div>


    </form>

    <div class="button">
        <a href="index.php?controller=Auth&action=logout">
            <button type value="submit">Cerrar sesión</button>
        </a>
    </div>

</div>
<div class="entrenador-info">

    <h3>Tu entrenador es :</h3>
    <?php foreach($entrenadores as $entrenador): ?>
        <a href="index.php?controller=Entrenador&action=getEntrenador&id=<?= $entrenador->id;?>">
            <p><?= $entrenador->nombreEntrenador . ' ' . $entrenador->apellido; ?></p>
            <h3>Correo Electronico:</h3> <p><?= $entrenador->correoElectronico; ?></p>
            <p><?= $entrenador->descripcion; ?></p>
        </a>
    <?php endforeach; ?>

        <h3>Quieres cambiar?</h3>
        <a href="index.php?controller=Entrenador&action=getAllEntrenadores">
            <img src="views/gymFotos/entrenador.png"/>
        </a>

</div>
<?php
    include 'views/footer.php';
?>
</body>
</html>
