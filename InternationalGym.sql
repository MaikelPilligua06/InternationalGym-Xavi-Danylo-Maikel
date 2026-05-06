DROP DATABASE IF EXISTS InternationalGym;
CREATE DATABASE InternationalGym;
USE InternationalGym;

CREATE TABLE Entrenadores (
  id INT NOT NULL AUTO_INCREMENT,
  nombreEntrenador VARCHAR(80),
  apellido VARCHAR(80),
  numeroTelefono VARCHAR(20),
  tipoDocumento ENUM('Pasaporte','DNI','NIE'),
  numeroDocumento VARCHAR(50),
  correoElectronico VARCHAR(80),
  contrasenia VARCHAR(255),
  disponibilidadHoraria ENUM('diurno','vespertino','nocturno'),
  PRIMARY KEY (id)
);

INSERT INTO Entrenadores VALUES
(1,'manuel','molina','+34631772378','DNI','52566487A','mmolina@institutmvm.cat','$2y$10$gZmKxcBRQ9NyomWPnLyaqeloNMRKRRCn7Yi2oYyCoMwNlwTUpyCtu','vespertino');

CREATE TABLE Usuarios (
  id INT NOT NULL AUTO_INCREMENT,
  nombreUsuario VARCHAR(80),
  apellido VARCHAR(80),
  numeroTelefono VARCHAR(20),
  tipoDocumento ENUM('Pasaporte','DNI','NIE'),
  numeroDocumento VARCHAR(30),
  correoElectronico VARCHAR(70),
  contrasenia VARCHAR(255),
  edad INT,
  genero ENUM('masculino','femenino'),
  peso FLOAT,
  altura FLOAT,
  objetivo ENUM('perder peso','ganar fuerza','estabilidad'),
  fechaDeAlta DATE,
  id_entrenador INT,
  PRIMARY KEY (id),
  KEY id_entrenador (id_entrenador),
  FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id)
);

INSERT INTO Usuarios VALUES
(1,'usuario','institut','+34631004233','DNI','48042187A','mvp@institutmvm.cat','$2y$10$GbsqgDVAlkMRodSJp1dgs.U7A1SXkcVcKjFFpxXckF8WPvxSqgRkC',20,'masculino',70,1.4,'estabilidad','2026-02-27',1);

CREATE TABLE Alimentacion (
  id INT NOT NULL AUTO_INCREMENT,
  objetivo ENUM('perder peso','ganar fuerza','estabilidad'),
  id_usuario INT,
  fecha_registro DATE,
  calorias FLOAT,
  nombrePlato VARCHAR(100),
  descripcion VARCHAR(100),
  proteinas INT,
  carbohidratos INT,
  grasas INT,
  foto VARCHAR(255),
  PRIMARY KEY (id),
  KEY id_usuario (id_usuario),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

INSERT INTO Alimentacion VALUES
(1,'ganar fuerza',1,'2026-03-04',750,'Pan de pita con patatas y champiñones','Plato sabroso gracias a las verduras frescas.',30,134,10,NULL);

CREATE TABLE Chat (
  id_chat INT NOT NULL AUTO_INCREMENT,
  id_usuario INT,
  id_entrenador INT,
  mensaje VARCHAR(255),
  fechaHora DATETIME,
  enviado_por ENUM('usuario','entrenador') NOT NULL DEFAULT 'usuario',
  PRIMARY KEY (id_chat),
  KEY id_usuario (id_usuario),
  KEY id_entrenador (id_entrenador),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id),
  FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id)
);

INSERT INTO Chat VALUES
(1,1,1,'Como ejecutar correctamente el press inclinado con mancuernas','2026-03-04 12:04:00','usuario');

CREATE TABLE Ejercicios (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100),
  descripcion VARCHAR(255),
  series INT,
  repeticiones INT,
  peso INT,
  PRIMARY KEY (id)
);

INSERT INTO Ejercicios VALUES
(1,'Press Inclinado con Mancuernas','Ejercicio para trabajar la parte superior del pecho, empujando mancuernas hacia arriba en un banco inclinado entre 30-45 grados',3,8,20);

CREATE TABLE Rutina (
  id_rutina INT NOT NULL AUTO_INCREMENT,
  id_usuario INT,
  nombre_rutina VARCHAR(255),
  objetivo ENUM('perder peso','ganar fuerza','estabilidad'),
  PRIMARY KEY (id_rutina),
  KEY id_usuario (id_usuario),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

INSERT INTO Rutina VALUES
(1,1,'Tren Superior','ganar fuerza');

CREATE TABLE Contiene (
  id_rutina INT,
  id_ejercicio INT,
  KEY id_rutina (id_rutina),
  KEY id_ejercicio (id_ejercicio),
  FOREIGN KEY (id_rutina) REFERENCES Rutina(id_rutina),
  FOREIGN KEY (id_ejercicio) REFERENCES Ejercicios(id)
);

INSERT INTO Contiene VALUES
(1,1);

CREATE TABLE SesionesDeClases (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255),
  tipoDeClases ENUM('Cardio','Cycling','trenSuperior','trenInferior'),
  fechaClases DATE,
  duracion TIME,
  id_entrenador INT,
  descripcion VARCHAR(8000),
  PRIMARY KEY (id),
  KEY id_entrenador (id_entrenador),
  FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id)
);

INSERT INTO SesionesDeClases VALUES
(1,'Tren Superior','trenSuperior','2026-03-04','01:00:00',1,'Clase enfocada al entreno del tren superior');

CREATE TABLE Usuario_Ejercicio (
  id_usuario INT,
  id_ejercicio INT,
  KEY id_usuario (id_usuario),
  KEY id_ejercicio (id_ejercicio),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id),
  FOREIGN KEY (id_ejercicio) REFERENCES Ejercicios(id)
);

INSERT INTO Usuario_Ejercicio VALUES
(1,1);

CREATE TABLE Usuario_Sesion (
  id_usuario INT,
  id_sesion INT,
  KEY id_usuario (id_usuario),
  KEY id_sesion (id_sesion),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id),
  FOREIGN KEY (id_sesion) REFERENCES SesionesDeClases(id)
);

INSERT INTO Usuario_Sesion VALUES
(1,1);

CREATE TABLE Pago (
  id INT NOT NULL AUTO_INCREMENT,
  id_usuario INT,
  metodoPago VARCHAR(255),
  tipoPlan ENUM('Basico','Premium'),
  precio FLOAT,
  fechaPago DATE,
  estado VARCHAR(255),
  PRIMARY KEY (id),
  KEY id_usuario (id_usuario),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

INSERT INTO Pago VALUES
(1,1,'Tarjeta','Premium',40,'2026-01-22','Aceptado');

CREATE TABLE ResumenDiario (
  id_resumen INT NOT NULL AUTO_INCREMENT,
  id_usuario INT,
  fecha DATE,
  entrenamientosRealizados INT,
  caloriasConsumidas FLOAT,
  notas TEXT,
  PRIMARY KEY (id_resumen),
  KEY id_usuario (id_usuario),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

INSERT INTO ResumenDiario VALUES
(1,1,'2026-03-04',1,2600,'Hoy hice Press inclinado con mancuernas: 3x8, 20kg. Buen trabajo en pecho superior');
