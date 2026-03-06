INSERT INTO Alimentacion (objetivo, id_usuario, calorias, nombrePlato, descripcion, proteinas, carbohidratos, grasas) VALUES ('ganar fuerza', 1, 750, 'Pan de pita con patatas y champiñones', 'Plato sabroso gracias a las verduras frescas.', 30, 134, 10);
INSERT INTO Ejercicios (nombre, descripcion, series, repeticiones, peso) VALUES ('Press Inclinado con Mancuernas','Ejercicio para trabajar la parte superior del pecho, empujando mancuernas hacia arriba en un banco inclinado entre 30-45 grados', 
3, 8, 20);
INSERT INTO Rutina (id_usuario, nombre_rutina, objetivo) VALUES (1, 'Tren Superior', 'ganar fuerza');
INSERT INTO Contiene (id_rutina, id_ejercicio) VALUES (1, 1);
INSERT INTO Chat (id_usuario, id_entrenador, mensaje, fechaHora) VALUES (1, 1, 'Como ejecutar correctamente el press inclinado con mancuernas', '2026-03-04 12:04:00');
INSERT INTO Pago (id_usuario, metodoPago, tipoPlan, precio, fechaPago, estado) VALUES (1, 'Tarjeta', 'Premium', 40, '2026-01-22', 'Aceptado');
INSERT INTO ResumenDiario (id_usuario, fecha, entrenamientosRealizados, caloriasConsumidas, notas) VALUES (1, '2026-03-04', 1, 2600, 'Hoy hice Press inclinado con mancuernas: 3x8, 20kg. Buen trabajo en pecho superior');
INSERT INTO SesionesDeClases (tipoDeClases, fechaClases, duracion, id_entrenador, descripcion) VALUES ('trenSuperior', '2026-03-04', '01:00:00', 1, 'Clase enfocada al entreno del tren superior');
INSERT INTO Usuario_Sesion (id_usuario, id_sesion) VALUES (1, 1);
