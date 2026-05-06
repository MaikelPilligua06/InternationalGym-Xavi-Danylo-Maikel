CREATE DATABASE IF NOT EXISTS InternationalGym;
USE InternationalGym;

CREATE TABLE Entrenadores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombreEntrenador VARCHAR(80),
  apellido VARCHAR(80),
  numeroTelefono VARCHAR(20),
  tipoDocumento ENUM('Pasaporte','DNI','NIE'),
  numeroDocumento VARCHAR(50),
  correoElectronico VARCHAR(80),
  contrasenia VARCHAR(255),
  descripcion TEXT,
  disponibilidadHoraria ENUM('diurno','vespertino','nocturno')
);

CREATE TABLE Usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
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
  FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id)
);

CREATE TABLE Alimentacion (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT NULL,
  fecha DATE NULL,
  objetivo ENUM('perder peso','ganar fuerza','estabilidad'),
  calorias FLOAT,
  nombrePlato VARCHAR(100),
  descripcion VARCHAR(100),
  proteinas INT,
  carbohidratos INT,
  grasas INT,
  foto VARCHAR(255)
);

CREATE TABLE Usuario_Alimentacion (
                                   id_usuario INT,
                                   id_alimentacion INT,
                                   FOREIGN KEY (id_usuario) REFERENCES Usuarios(id),
                                   FOREIGN KEY (id_alimentacion) REFERENCES Alimentacion(id)
);

CREATE TABLE Ejercicios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombreEjercicio VARCHAR(100),
  descripcion VARCHAR(255),
  series INT,
  repeticiones INT,
  peso INT
);

CREATE TABLE Usuario_Ejercicio (
  id_usuario INT,
  id_ejercicio INT,
  PRIMARY KEY (id_usuario, id_ejercicio),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id),
  FOREIGN KEY (id_ejercicio) REFERENCES Ejercicios(id)
);

CREATE TABLE Rutina (
  id_rutina INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  nombre_rutina VARCHAR(255),
  objetivo ENUM('perder peso','ganar fuerza','estabilidad'),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

CREATE TABLE Contiene (
  id_rutina INT,
  id_ejercicio INT,
  PRIMARY KEY (id_rutina, id_ejercicio),
  FOREIGN KEY (id_rutina) REFERENCES Rutina(id_rutina),
  FOREIGN KEY (id_ejercicio) REFERENCES Ejercicios(id)
);

CREATE TABLE Chat (
  id_chat INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  id_entrenador INT,
  mensaje VARCHAR(255),
  enviado_por ENUM('usuario', 'entrenador') NOT NULL DEFAULT 'usuario',
  fechaHora DATETIME,
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id),
  FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id)
);

CREATE TABLE Pago (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  metodoPago VARCHAR(255),
  tipoPlan ENUM('Basico','Premium'),
  precio FLOAT,
  fechaPago DATE,
  estado VARCHAR(255),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

CREATE TABLE ResumenDiario (
  id_resumen INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  fecha DATE,
  entrenamientosRealizados INT,
  caloriasConsumidas FLOAT,
  notas TEXT,
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

CREATE TABLE SesionesDeClases (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombreClase VARCHAR(255),
  tipoDeClases ENUM('Cardio','Cycling','trenSuperior','trenInferior'),
  fechaClases DATE,
  duracion TIME,
  id_entrenador INT,
  descripcion VARCHAR(8000),
  foto VARCHAR(255),
  FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id)
);

CREATE TABLE Usuario_Sesion (
  id_usuario INT,
  id_sesion INT,
  PRIMARY KEY (id_usuario, id_sesion),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id),
  FOREIGN KEY (id_sesion) REFERENCES SesionesDeClases(id)
);

CREATE USER IF NOT EXISTS 'intgym'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON InternationalGym.* TO 'intgym'@'localhost';
FLUSH PRIVILEGES;

