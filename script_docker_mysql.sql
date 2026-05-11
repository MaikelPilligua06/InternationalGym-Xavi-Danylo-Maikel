CREATE DATABASE IF NOT EXISTS InternationalGym;
USE InternationalGym;

DROP TABLE IF EXISTS UsuarioEntrenador;
DROP TABLE IF EXISTS Usuario_Sesion;
DROP TABLE IF EXISTS Usuario_Ejercicio;
DROP TABLE IF EXISTS Usuario_Alimentacion;
DROP TABLE IF EXISTS Chat;
DROP TABLE IF EXISTS SesionesDeClases;
DROP TABLE IF EXISTS Contiene;
DROP TABLE IF EXISTS Rutina;
DROP TABLE IF EXISTS ResumenDiario;
DROP TABLE IF EXISTS Pago;
DROP TABLE IF EXISTS Usuarios;


SET NAMES 'utf8mb4';
SET CHARACTER SET utf8mb4;


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
  rol ENUM('usuario', 'entrenador', 'admin'),
  descripcion TEXT,
  fechaDeAlta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  foto VARCHAR(255),
  nivelActividad ENUM('sedentario', 'moderado', 'activo')
);

CREATE TABLE UsuarioEntrenador (
  id_usuario    INT NOT NULL,
  id_entrenador INT NOT NULL,
  fechaAsignacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_usuario, id_entrenador),
  FOREIGN KEY (id_usuario)    REFERENCES Usuarios(id),
  FOREIGN KEY (id_entrenador) REFERENCES Usuarios(id)
);

CREATE TABLE Alimentacion (
  id INT AUTO_INCREMENT PRIMARY KEY,
  objetivo ENUM('perder peso','ganar fuerza','estabilidad'),
  calorias FLOAT,
  nombrePlato VARCHAR(100),
  descripcion TEXT,
  proteinas INT,
  carbohidratos INT,
  grasas INT,
  foto VARCHAR(255)
);

CREATE TABLE Usuario_Alimentacion (
  id_usuario      INT,
  id_alimentacion INT,
  FOREIGN KEY (id_usuario)      REFERENCES Usuarios(id),
  FOREIGN KEY (id_alimentacion) REFERENCES Alimentacion(id)
);

CREATE TABLE Ejercicios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombreEjercicio VARCHAR(100),
  descripcion VARCHAR(255),
  calorias INT,
  foto VARCHAR(255)
);

CREATE TABLE Usuario_Ejercicio (
  id_usuario   INT,
  id_ejercicio INT,
  series       INT,
  repeticiones INT,
  peso         INT,
  PRIMARY KEY (id_usuario, id_ejercicio),
  FOREIGN KEY (id_usuario)   REFERENCES Usuarios(id),
  FOREIGN KEY (id_ejercicio) REFERENCES Ejercicios(id)
);

CREATE TABLE Rutina (
  id_rutina    INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario   INT,
  nombre_rutina VARCHAR(255),
  objetivo     ENUM('perder peso','ganar fuerza','estabilidad'),
  fecha_inicio DATE DEFAULT (CURRENT_DATE()),
  fechaTiempo  TIME,
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

CREATE TABLE SesionesDeClases (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  calorias     INT,
  nombreClase  VARCHAR(255),
  tipoDeClases ENUM('Cardio','Cycling','trenSuperior','trenInferior'),
  fechaClases  DATE,
  duracion     TIME,
  id_entrenador INT,
  descripcion  VARCHAR(8000),
  foto         VARCHAR(255),
  FOREIGN KEY (id_entrenador) REFERENCES Usuarios(id)
);

CREATE TABLE Contiene (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  id_rutina       INT NOT NULL,
  id_ejercicio    INT NULL,
  id_alimentacion INT NULL,
  id_sesion       INT NULL,
  series          INT,
  repeticiones    INT,
  peso            INT,
  FOREIGN KEY (id_rutina)       REFERENCES Rutina(id_rutina),
  FOREIGN KEY (id_ejercicio)    REFERENCES Ejercicios(id),
  FOREIGN KEY (id_alimentacion) REFERENCES Alimentacion(id),
  FOREIGN KEY (id_sesion)       REFERENCES SesionesDeClases(id)
);

CREATE TABLE Chat (
  id_chat       INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario    INT,
  id_entrenador INT,
  mensaje       VARCHAR(255),
  fechaHora     DATETIME,
  FOREIGN KEY (id_usuario)    REFERENCES Usuarios(id),
  FOREIGN KEY (id_entrenador) REFERENCES Usuarios(id)
);

CREATE TABLE Pago (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario  INT,
  metodoPago  VARCHAR(255),
  tipoPlan    ENUM('Basico','Premium'),
  precio      FLOAT,
  fechaPago   DATE,
  estado      VARCHAR(255),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

CREATE TABLE ResumenDiario (
  id_resumen             INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario             INT,
  fecha                  DATE,
  entrenamientosRealizados INT,
  caloriasConsumidas     FLOAT,
  notas                  TEXT,
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

CREATE TABLE Usuario_Sesion (
  id_usuario INT,
  id_sesion  INT,
  PRIMARY KEY (id_usuario, id_sesion),
  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id),
  FOREIGN KEY (id_sesion)  REFERENCES SesionesDeClases(id)
);

CREATE USER IF NOT EXISTS 'intgym'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON InternationalGym.* TO 'intgym'@'localhost';
FLUSH PRIVILEGES;
