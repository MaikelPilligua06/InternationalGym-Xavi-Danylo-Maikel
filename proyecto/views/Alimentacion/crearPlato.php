<?php
    include 'views/header.php';
?>
<div>
    <h2>Crea un plato</h2>
    <div>
        <form action="index.php?controller=Alimentacion&action=crear" method="POST" enctype="multipart/form-data">
            <label>Nombre del plato</label>
            <input type="input" name="nombrePlato" placeholder="Introduzca el nombre del plato"/>
            <label>Objetivo del plato</label>
                <select name="objetivo">
                    <option value="perder peso">Perder peso</option>
                    <option value="ganar fuerza">Ganar fuerza</option>
                    <option value="estabilidad">Estabilidad</option>
                </select>
            <lable>Descripción</lable>
            <textarea name="descripcion" rows="4" cols="50" placeholder="Introduzca la descripcion" required></textarea>
            <label>Calorias</label>
            <input type="number" name="calorias" placeholder="Introduzca las calorias"/>
            <label>Proteinas</label>
            <input type="number" name="proteinas" placeholder="Introduzca las calorias"/>
            <label>Cabohidratos</label>
            <input type="number" name="carbohidratos" placeholder="Introduzca las calorias"/>
            <label>Grasas</label>
            <input type="number" name="grasas" placeholder="Introduzca las calorias"/>
            <input type="file" name="foto" accept="image/*"/>
            <button type="button" onclick="history.back()">← Volver atrás</button>
            <button type="submit">Publicar</button>
        </form>
    </div>
</div>
<?php
    include 'views/footer.php';
?>
