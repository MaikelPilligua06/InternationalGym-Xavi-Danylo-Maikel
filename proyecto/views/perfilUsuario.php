<!DOCTYPE html>
<html lang="es">
<head>
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
        <p><?php echo $usuario->nombre ;?></p>

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
        <h3>Entrenador: </h3>
        <p>Tu entrenador es :</p>
        <p>Quieres cambiar?</p>
        <a>
            <p>Todos los entrenadores</p>
            <img/>
        </a>

<?php
    include 'views/footer.php';
?>