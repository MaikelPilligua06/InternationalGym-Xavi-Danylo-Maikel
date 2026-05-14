<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Perfil</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/CSS/perfil.css">
</head>
<body>
<?php
    include 'views/header.php';
?>

<div class="perfil">
    <h2>Mi Perfil</h2>

    <form method="POST" action="index.php?controller=Usuario&action=actualizar">
        <h3>Nombre: </h3>
        <p><?= $usuario->nombreUsuario ?></p>

        <h3>Apellido: </h3>
        <p><?php echo $usuario->apellido ;?></p>


        <h3>Numero Telefono: </h3>
        <input type="tel"   name="numeroTelefono"    value="<?= $usuario->numeroTelefono ?>">

        <h3>Correo Electronico: </h3>
        <p><input type="email" name="correoElectronico"  value="<?= $usuario->correoElectronico ?>"></p>

        <h3>Peso: </h3>
        <p><input type="number" name="peso" value="<?php echo $usuario->peso ;?>"></p>

        <h3>Altura: </h3>
        <p><input type="number" name="altura" value="<?php echo $usuario->altura ;?>"></p>

        <h3>Nivel de Actividad: </h3>
        <select name="nivelActividad">
            <option value="sedentario" <?= $usuario->nivelActividad === 'sedentario' ? 'selected' : '' ?>>Sedentario (0,8 g/kg)</option>
            <option value="moderado"   <?= $usuario->nivelActividad === 'moderado'   ? 'selected' : '' ?>>Moderadamente activo (1,2 g/kg)</option>
            <option value="activo"     <?= $usuario->nivelActividad === 'activo'     ? 'selected' : '' ?>>Activo / Deportista (1,5–2,2 g/kg)</option>
        </select>

        <h3>Proteína diaria recomendada: </h3>
        <p>
            <?php
            $factores = ['sedentario' => 0.8, 'moderado' => 1.2, 'activo' => 1.85];
            $factor = $factores[$usuario->nivelActividad] ?? null;
            $proteina = ($factor && $usuario->peso) ? round($usuario->peso * $factor, 1) . ' g/día' : 'N/A';
            echo $proteina;
            ?>
        </p>

        <h3>Objetivo: </h3>
        <select name="objetivo">
            <option value="perder peso">Perder peso</option>
            <option value="ganar fuerza">Ganar Fuerza</option>
            <option value="estabilidad">Estabilidad</option>
        </select>

    <div class="button">
        <button type="submit" name="actualizar">Guardar</button>
    </div>


    </form>

    <div class="button">
        <a href="index.php?controller=Auth&action=logout">
            <button type value="submit">Cerrar sesión</button>
        </a>
    </div>

</div>
<div class="entrenador-info">


    <h3>Tu entrenador es :
        <?php foreach($entrenadores as $entrenador): ?>
            <span><?= $entrenador->nombreUsuario . ' ' . $entrenador->apellido; ?></span>
        <?php endforeach; ?>
    </h3>

    <?php foreach($entrenadores as $entrenador): ?>
        <a href="index.php?controller=Entrenador&action=getEntrenador&id=<?= $entrenador->id;?>">
            <h3>Correo Electronico: <span><?= $entrenador->correoElectronico; ?></span></h3>
            <hr>
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
