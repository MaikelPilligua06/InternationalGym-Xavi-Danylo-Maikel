CREATE DATABASE InternationalGym;
USE InternationalGym;

CREATE TABLE Usuarios (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          nombre VARCHAR(80),
                          apellido VARCHAR(80),
                          numeroTelefono VARCHAR(20),
                          tipoDocumento ENUM('Pasaporte','DNI','NIE'),
                          numeroDocumento VARCHAR(30),
                          correoElectronico VARCHAR(70),
                          password VARCHAR(255),
                          edad INT,
                          genero ENUM('masculino','femenino'),
                          peso FLOAT,
                          altura FLOAT,
                          objetivo ENUM('perder peso','ganar fuerza','estabilidad'),
                          fechaDeAlta DATE,
                          id_entrenador INT,
                          FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id)
);

CREATE TABLE Entrenadores (
                              id INT AUTO_INCREMENT PRIMARY KEY,
                              nombre VARCHAR(80),
                              apellido VARCHAR(80),
                              numeroTelefono VARCHAR(20),
                              tipoDocumento ENUM('Pasaporte','DNI','NIE'),
                              numeroDocumento VARCHAR(50),
                              correoElectronico VARCHAR(80),
                              password VARCHAR(255),
                              disponibilidadHoraria ENUM('diurno','vespertino','nocturno')
);

CREATE TABLE Alimentacion (
                              id INT AUTO_INCREMENT PRIMARY KEY,
                              objetivo ENUM('perder peso','ganar fuerza','estabilidad'),
                              id_usuario INT,
                              calorias FLOAT,
                              nombrePlato VARCHAR(100),
                              descripcion VARCHAR(100),
                              proteinas INT,
                              carbohidratos INT,
                              grasas INT,
                              FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

CREATE TABLE Ejercicios (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            nombre VARCHAR(100),
                            descripcion VARCHAR(255),
                            series INT,
                            repeticiones INT,
                            peso INT
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
                          FOREIGN KEY (id_rutina) REFERENCES Rutina(id_rutina),
                          FOREIGN KEY (id_ejercicio) REFERENCES Ejercicios(id)
);

CREATE TABLE Chat (
                      id_chat INT AUTO_INCREMENT PRIMARY KEY,
                      id_usuario INT,
                      id_entrenador INT,
                      mensaje VARCHAR(255),
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
    -- entrenamientosRealizados parece un contador, no FK a Ejercicios
);

CREATE TABLE SesionesDeClases (
                                  id INT AUTO_INCREMENT PRIMARY KEY,
                                  tipoDeClases ENUM('Cardio','Cycling','trenSuperior','trenInferior'),
                                  fechaClases DATE,
                                  duracion TIME,
                                  id_entrenador INT,
                                  id_usuario INT,
                                  FOREIGN KEY (id_entrenador) REFERENCES Entrenadores(id),
                                  FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

CREATE TABLE Usuario_Sesion (
                                id_usuario INT,
                                id_sesion INT,
                                FOREIGN KEY (id_usuario) REFERENCES Usuarios(id),
                                FOREIGN KEY (id_sesion) REFERENCES SesionesDeClases(id)
);

CREATE USER 'intgym'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON Usuarios TO 'intgym'@'localhost';
GRANT ALL PRIVILEGES ON Entrenadores TO 'intgym'@'localhost';
GRANT ALL PRIVILEGES ON Alimentacion TO 'intgym'@'localhost';
GRANT ALL PRIVILEGES ON Ejercicios TO 'intgym'@'localhost';
GRANT ALL PRIVILEGES ON Rutina TO 'intgym'@'localhost';
GRANT ALL PRIVILEGES ON Contiene TO 'intgym'@'localhost';
GRANT ALL PRIVILEGES ON Chat TO 'intgym'@'localhost';
GRANT ALL PRIVILEGES ON Pago TO 'intgym'@'localhost';
GRANT ALL PRIVILEGES ON ResumenDiario TO 'intgym'@'localhost';
GRANT ALL PRIVILEGES ON SesionesDeClases TO 'intgym'@'localhost';
GRANT ALL PRIVILEGES ON Usuario_Sesion TO 'intgym'@'localhost';
FLUSH PRIVILEGES;

