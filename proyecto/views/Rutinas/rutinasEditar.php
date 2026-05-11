<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="InternationalGYM">
    <title>Rutina Usuario</title>
    <link rel="icon" href="views/gymFotos/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="views/Rutinas/rutinas.css">
</head>
<body>
<?php
include 'views/header.php';
?>
<main class="pagina">
    <div class="pagina-cabecera">
        <div class="pagina-acciones">
            <a href="index.php?controller=Rutinas&action=volver" class="boton boton-volver"
               onclick="return confirm('Al volver no se guardaran los datos')">Volver</a>
        </div>
    </div>
    <?php foreach ($rutinas as $rutina) : ?>
        <div class="rutina-form">
            <form id="formRutina" action="index.php?controller=Rutinas&action=guardar" method="POST">
                <div class="panel">
                    <h2>Nombre</h2>
                    <div class="rutina-campos">
                        <input type="text" name="nombreRutina" value="<?= $rutina->nombre_rutina; ?>">
                    </div>
                    <h2>Objetivo</h2>
                    <div class="rutina-campos">
                    <select name="objetivo">
                            <option value="perder peso" <?= $rutina->objetivo == 'Perder peso' ? 'selected' : '' ?>>Perder peso</option>
                            <option value="ganar fuerza" <?= $rutina->objetivo == 'ganar fuerza' ? 'selected' : '' ?>>Ganar fuerza</option>
                            <option value="estabilidad" <?= $rutina->objetivo == 'Estabilidad' ? 'selected' : '' ?>>Estabilidad</option>
                    </select>
                    </div>
                    <h2>Tiempo estimado</h2>
                    <div class="rutina-campos">
                        <input type="time" name="fechaTiempo" value="<?= $rutina->fechaTiempo; ?>">
                    </div>
                    <?php foreach ($_SESSION['rutina_platos'] as $i => $p) : ?>
                        <input type="hidden" name="id_plato[]" value="<?= htmlspecialchars($p['id']) ?>">
                    <?php endforeach; ?>
                    <?php foreach ($_SESSION['rutina_sesiones'] as $i => $s) : ?>
                        <input type="hidden" name="id_sesion[]" value="<?= htmlspecialchars($s['id']) ?>">
                    <?php endforeach; ?>

                    <div class="rutina-form-acciones">
                        <button class="boton boton-principal">Actualizar Rutina</button>
                    </div>
                </div>


                <?php if (!empty($_SESSION['rutina_ejercicios'])) : ?>
                    <div class="panel">
                        <div class="panel-titulo">Ejercicios Seleccionados</div>
                        <div class="rutina-seleccionados">
                            <?php foreach ($_SESSION['rutina_ejercicios'] as $i => $e) : ?>
                                <div class="resumen-elemento">
                                    <input type="hidden" name="id_ejercicio[]" value="<?= htmlspecialchars($e['id']) ?>">
                                    <div class="resumen-elemento-cabecera">
                                        <span class="elemento-nombre"><?= htmlspecialchars($e['nombreEjercicio']) ?></span>
                                        <span class="elemento-calorias"><?= htmlspecialchars($e['calorias']) ?> kcal</span>
                                    </div>
                                    <div class="resumen-elemento-campos">
                                        <div class="campo-input-grupo">
                                            <input type="number" name="series[]" placeholder="0" min="1" max="100" required>
                                            <label>Series</label>
                                        </div>
                                        <div class="campo-input-grupo">
                                            <input type="number" name="repeticiones[]" placeholder="0" min="1" max="100" required>
                                            <label>Reps</label>
                                        </div>
                                        <div class="campo-input-grupo">
                                            <input type="number" name="peso[]" placeholder="0" min="0" max="500" required>
                                            <label>Kg</label>
                                        </div>
                                    </div>
                                    <a href="index.php?controller=Rutinas&action=quitarEditEjercicio&index=<?= $i ?>"
                                       class="boton-quitar">Quitar</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </form>
            <?php endforeach; ?>







            <!-- Sesiones seleccionadas -->
            <?php if (!empty($_SESSION['rutina_sesiones'])) : ?>
                <div class="panel">
                    <div class="panel-titulo">Sesiones Seleccionadas</div>
                    <div class="rutina-seleccionados">
                        <?php foreach ($_SESSION['rutina_sesiones'] as $i => $s) : ?>
                            <div class="resumen-elemento">
                                <div class="resumen-elemento-cabecera">
                                    <span class="elemento-nombre"><?= htmlspecialchars($s['nombreClase']) ?></span>
                                    <span class="elemento-calorias"><?= htmlspecialchars($s['calorias']) ?> kcal</span>
                                </div>
                                <a href="index.php?controller=Rutinas&action=quitarEditSesion&index=<?= $i ?>"
                                   class="boton-quitar">Quitar</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Platos seleccionados -->
            <?php if (!empty($_SESSION['rutina_platos'])) : ?>
                <div class="panel">
                    <div class="panel-titulo">Platos Seleccionados</div>
                    <div class="rutina-seleccionados">
                        <?php foreach ($_SESSION['rutina_platos'] as $i => $p) : ?>
                            <div class="resumen-elemento">
                                <div class="resumen-elemento-cabecera">
                                    <span class="elemento-nombre"><?= htmlspecialchars($p['nombrePlato']) ?></span>
                                    <span class="elemento-calorias"><?= htmlspecialchars($p['calorias']) ?> kcal</span>
                                </div>
                                <a href="index.php?controller=Rutinas&action=quitarEditPlato&index=<?= $i ?>"
                                   class="boton-quitar">Quitar</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <hr/><br/>

    <section>
        <a href="index.php?controller=Rutinas&action=crearRutina" class="boton boton-volver">
            Actualizar ejercicios, alimentación y sesiones
        </a>
        <h3>Ejercicios</h3>
        <div class="dividir">
            <div class="panel">
                <div class="panel-titulo">Tus ejercicios</div>
                <?php if (!empty($usuarioEjercicios)) : ?>
                    <?php foreach ($usuarioEjercicios as $ejercicio) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($ejercicio->nombreEjercicio) ?></div>
                                    <div class="elemento-meta"><?= $ejercicio->calorias ?> kcal</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=editAgregarEjercicio">
                                <input type="hidden" name="id"              value="<?= htmlspecialchars($ejercicio->id)?>">
                                <input type="hidden" name="nombreEjercicio" value="<?= htmlspecialchars($ejercicio->nombreEjercicio) ?>">
                                <input type="hidden" name="descripcion"     value="<?= htmlspecialchars($ejercicio->descripcion) ?>">
                                <input type="hidden" name="calorias"        value="<?= htmlspecialchars($ejercicio->calorias) ?>">
                                <input type="hidden" name="foto"            value="<?= htmlspecialchars($ejercicio->foto) ?>">
                                <button type="submit" class="boton boton-principal">Añadir</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No tienes ejercicios guardados.</p>
                <?php endif; ?>
            </div>
            <div class="panel">
                <div class="panel-titulo">Explorar ejercicios</div>
                <?php if (!empty($todoslosEjercicios)) : ?>
                    <?php foreach ($todoslosEjercicios as $ejercicio) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Ejercicios&action=infoEjercicio&id=<?= $ejercicio->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($ejercicio->nombreEjercicio) ?></div>
                                    <div class="elemento-meta"><?= $ejercicio->calorias ?> kcal</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=editAgregarEjercicio&id=<?= $ejercicio->id ?>">
                                <input type="hidden" name="id"              value="<?= $ejercicio->id ?>">
                                <input type="hidden" name="nombreEjercicio" value="<?= htmlspecialchars($ejercicio->nombreEjercicio) ?>">
                                <input type="hidden" name="descripcion"     value="<?= htmlspecialchars($ejercicio->descripcion) ?>">
                                <input type="hidden" name="calorias"        value="<?= $ejercicio->calorias ?>">
                                <input type="hidden" name="foto"            value="<?= htmlspecialchars($ejercicio->foto) ?>">
                                <button type="submit" class="boton boton-principal">Añadir</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No hay ejercicios disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="seccion-alimentacion">
        <h3>Alimentación</h3>
        <div class="dividir">
            <div class="panel">
                <div class="panel-titulo">Tus platos</div>
                <?php if (!empty($usuarioAlimentacion)) : ?>
                    <?php foreach ($usuarioAlimentacion as $plato) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($plato->nombrePlato) ?></div>
                                    <div class="elemento-meta"><?= $plato->calorias ?> kcal · <?= $plato->proteinas ?>g prot.</div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No tienes platos guardados.</p>
                <?php endif; ?>
            </div>

            <div class="panel">
                <div class="panel-titulo">Explorar platos</div>
                <?php if (!empty($todosLosPlatos)) : ?>
                    <?php foreach ($todosLosPlatos as $plato) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Alimentacion&action=verPlato&id=<?= $plato->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($plato->nombrePlato) ?></div>
                                    <div class="elemento-meta"><?= $plato->calorias ?> kcal · <?= $plato->proteinas ?>g prot.</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=editAgregarPlato">
                                <input type="hidden" name="id"            value="<?= $plato->id ?>">
                                <input type="hidden" name="objetivo"      value="<?= htmlspecialchars($plato->objetivo) ?>">
                                <input type="hidden" name="calorias"      value="<?= $plato->calorias ?>">
                                <input type="hidden" name="nombrePlato"   value="<?= htmlspecialchars($plato->nombrePlato) ?>">
                                <input type="hidden" name="descripcion"   value="<?= htmlspecialchars($plato->descripcion) ?>">
                                <input type="hidden" name="proteinas"     value="<?= $plato->proteinas ?>">
                                <input type="hidden" name="carbohidratos" value="<?= $plato->carbohidratos ?>">
                                <input type="hidden" name="grasas"        value="<?= $plato->grasas ?>">
                                <input type="hidden" name="foto"          value="<?= htmlspecialchars($plato->foto) ?>">
                                <button type="submit" class="boton boton-principal">Añadir</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No hay platos disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="seccion-sesiones">
        <h3>Sesiones</h3>
        <div class="dividir">
            <div class="panel">
                <div class="panel-titulo">Tus sesiones</div>
                <?php if (!empty($usuarioSesiones)) : ?>
                    <?php foreach ($usuarioSesiones as $sesion) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($sesion->nombreClase) ?></div>
                                    <div class="elemento-meta"><?= $sesion->duracion ?> min · <?= $sesion->calorias ?> kcal</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=agregarEditSesion">
                                <input type="hidden" name="id"            value="<?= $sesion->id ?>">
                                <input type="hidden" name="nombreClase"   value="<?= htmlspecialchars($sesion->nombreClase) ?>">
                                <input type="hidden" name="tipoDeClases"  value="<?= htmlspecialchars($sesion->tipoDeClases) ?>">
                                <input type="hidden" name="fechaClases"   value="<?= $sesion->fechaClases ?>">
                                <input type="hidden" name="duracion"      value="<?= $sesion->duracion ?>">
                                <input type="hidden" name="id_entrenador" value="<?= $sesion->id_entrenador ?>">
                                <input type="hidden" name="descripcion"   value="<?= htmlspecialchars($sesion->descripcion) ?>">
                                <input type="hidden" name="calorias"      value="<?= $sesion->calorias ?>">
                                <input type="hidden" name="foto"          value="<?= htmlspecialchars($sesion->foto) ?>">
                                <button type="submit" class="boton boton-principal">Añadir a tu Rutina</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No tienes sesiones guardadas.</p>
                <?php endif; ?>
            </div>

            <div class="panel">
                <div class="panel-titulo">Explorar sesiones</div>
                <?php if (!empty($todasLasSesiones)) : ?>
                    <?php foreach ($todasLasSesiones as $sesion) : ?>
                        <div class="fila-elemento">
                            <div>
                                <a href="index.php?controller=Sesiones&action=getId&id=<?= $sesion->id ?>">
                                    <div class="elemento-nombre"><?= htmlspecialchars($sesion->nombreClase) ?></div>
                                    <div class="elemento-meta"><?= $sesion->duracion ?> min · <?= $sesion->calorias ?> kcal</div>
                                </a>
                            </div>
                            <form method="POST" action="index.php?controller=Rutinas&action=agregarEditSesion">
                                <input type="hidden" name="id"            value="<?= $sesion->id ?>">
                                <input type="hidden" name="nombreClase"   value="<?= htmlspecialchars($sesion->nombreClase) ?>">
                                <input type="hidden" name="tipoDeClases"  value="<?= htmlspecialchars($sesion->tipoDeClases) ?>">
                                <input type="hidden" name="fechaClases"   value="<?= $sesion->fechaClases ?>">
                                <input type="hidden" name="duracion"      value="<?= $sesion->duracion ?>">
                                <input type="hidden" name="id_entrenador" value="<?= $sesion->id_entrenador ?>">
                                <input type="hidden" name="descripcion"   value="<?= htmlspecialchars($sesion->descripcion) ?>">
                                <input type="hidden" name="calorias"      value="<?= $sesion->calorias ?>">
                                <input type="hidden" name="foto"          value="<?= htmlspecialchars($sesion->foto) ?>">
                                <button type="submit" class="boton boton-principal">Añadir a tu Rutina</button>
                            </form>
                            <button type="submit" class="boton boton-principal">Añadir a tus preferencias</button>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No hay sesiones disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php
include 'views/footer.php';
?>
</body>
</html>
