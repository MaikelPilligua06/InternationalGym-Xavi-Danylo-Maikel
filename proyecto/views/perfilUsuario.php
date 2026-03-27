<!DOCTYPE html>
<html lang="es"
<body>
<?php
    include 'views/header.php';
?>

<div>
    <h2>Mi Perfil</h2>
    <h3>Nombre: </h3>
    <p><?php echo $usuario->nombre ;?></p>

    <h3>Apellido: </h3>
    <p><?php echo $usuario->apellido ;?></p>


    <h3>Numero Telefono: </h3>
    <form action="funcion" method="POST">
        Numero Telefono: <input type="tel" name="numeroTel" value="<?php echo $usuario->numeroTelefono ;?>">
    </form>

    <h3>Correo Electronico: </h3>
    <form action="funcion" method="POST">
        Correo Electronico: <input type="email" name="correoEle" value="<?php echo $usuario->correoElectronico ;?>">
    </form>

    <h3>Peso: </h3>
    <form action="funcion" method="POST">
        Peso: <input type="number" name="peso" value="<?php echo $usuario->peso ;?>">
    </form>

    <h3>Altura: </h3>
    <form action="funcion" method="POST">
        Altura: <input type="number" name="altura" value="<?php echo $usuario->altura ;?>">
    </form>


    <h3>Objetivo: </h3>
    <select name="objetivo">
        <option value="perder peso">Perder peso</option>
        <option value="ganar fuerza">Ganar Fuerza</option>
        <option value="estabilidad">Estabilidad</option>
    </select>

    <h3>Entrenador: </h3>
    <p>Tu entrenador es :</p>
    <p>Quieres cambiar?</p>
    <a>
        <p>Todos los entrenadores</p>
        <img/>
    </a>
</div>
<?php
    include 'views/footer.php';
?>