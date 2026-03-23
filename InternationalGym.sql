-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: localhost    Database: InternationalGym
-- ------------------------------------------------------
-- Server version	8.0.45-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Alimentacion`
--

DROP TABLE IF EXISTS `Alimentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Alimentacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `objetivo` enum('perder peso','ganar fuerza','estabilidad') DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `calorias` float DEFAULT NULL,
  `nombrePlato` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `proteinas` int DEFAULT NULL,
  `carbohidratos` int DEFAULT NULL,
  `grasas` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `Alimentacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Alimentacion`
--

LOCK TABLES `Alimentacion` WRITE;
/*!40000 ALTER TABLE `Alimentacion` DISABLE KEYS */;
INSERT INTO `Alimentacion` VALUES (1,'ganar fuerza',1,750,'Pan de pita con patatas y champiñones','Plato sabroso gracias a las verduras frescas.',30,134,10);
/*!40000 ALTER TABLE `Alimentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Chat`
--

DROP TABLE IF EXISTS `Chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Chat` (
  `id_chat` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `id_entrenador` int DEFAULT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  `fechaHora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_chat`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_entrenador` (`id_entrenador`),
  CONSTRAINT `Chat_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id`),
  CONSTRAINT `Chat_ibfk_2` FOREIGN KEY (`id_entrenador`) REFERENCES `Entrenadores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chat`
--

LOCK TABLES `Chat` WRITE;
/*!40000 ALTER TABLE `Chat` DISABLE KEYS */;
INSERT INTO `Chat` VALUES (1,1,1,'Como ejecutar correctamente el press inclinado con mancuernas','2026-03-04 12:04:00');
/*!40000 ALTER TABLE `Chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contiene`
--

DROP TABLE IF EXISTS `Contiene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Contiene` (
  `id_rutina` int DEFAULT NULL,
  `id_ejercicio` int DEFAULT NULL,
  KEY `id_rutina` (`id_rutina`),
  KEY `id_ejercicio` (`id_ejercicio`),
  CONSTRAINT `Contiene_ibfk_1` FOREIGN KEY (`id_rutina`) REFERENCES `Rutina` (`id_rutina`),
  CONSTRAINT `Contiene_ibfk_2` FOREIGN KEY (`id_ejercicio`) REFERENCES `Ejercicios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contiene`
--

LOCK TABLES `Contiene` WRITE;
/*!40000 ALTER TABLE `Contiene` DISABLE KEYS */;
INSERT INTO `Contiene` VALUES (1,1);
/*!40000 ALTER TABLE `Contiene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ejercicios`
--

DROP TABLE IF EXISTS `Ejercicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Ejercicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `series` int DEFAULT NULL,
  `repeticiones` int DEFAULT NULL,
  `peso` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ejercicios`
--

LOCK TABLES `Ejercicios` WRITE;
/*!40000 ALTER TABLE `Ejercicios` DISABLE KEYS */;
INSERT INTO `Ejercicios` VALUES (1,'Press Inclinado con Mancuernas','Ejercicio para trabajar la parte superior del pecho, empujando mancuernas hacia arriba en un banco inclinado entre 30-45 grados',3,8,20);
/*!40000 ALTER TABLE `Ejercicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Entrenadores`
--

DROP TABLE IF EXISTS `Entrenadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Entrenadores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `apellido` varchar(80) DEFAULT NULL,
  `numeroTelefono` varchar(20) DEFAULT NULL,
  `tipoDocumento` enum('Pasaporte','DNI','NIE') DEFAULT NULL,
  `numeroDocumento` varchar(50) DEFAULT NULL,
  `correoElectronico` varchar(80) DEFAULT NULL,
  `contrasenia` varchar(255) DEFAULT NULL,
  `disponibilidadHoraria` enum('diurno','vespertino','nocturno') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Entrenadores`
--

LOCK TABLES `Entrenadores` WRITE;
/*!40000 ALTER TABLE `Entrenadores` DISABLE KEYS */;
INSERT INTO `Entrenadores` VALUES (1,'manuel','molina','+34631772378','DNI','52566487A','mmolina@institutmvm.cat','$2y$10$gZmKxcBRQ9NyomWPnLyaqeloNMRKRRCn7Yi2oYyCoMwNlwTUpyCtu','vespertino');
/*!40000 ALTER TABLE `Entrenadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pago`
--

DROP TABLE IF EXISTS `Pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Pago` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `metodoPago` varchar(255) DEFAULT NULL,
  `tipoPlan` enum('Basico','Premium') DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fechaPago` date DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `Pago_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pago`
--

LOCK TABLES `Pago` WRITE;
/*!40000 ALTER TABLE `Pago` DISABLE KEYS */;
INSERT INTO `Pago` VALUES (1,1,'Tarjeta','Premium',40,'2026-01-22','Aceptado');
/*!40000 ALTER TABLE `Pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ResumenDiario`
--

DROP TABLE IF EXISTS `ResumenDiario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ResumenDiario` (
  `id_resumen` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `entrenamientosRealizados` int DEFAULT NULL,
  `caloriasConsumidas` float DEFAULT NULL,
  `notas` text,
  PRIMARY KEY (`id_resumen`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `ResumenDiario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ResumenDiario`
--

LOCK TABLES `ResumenDiario` WRITE;
/*!40000 ALTER TABLE `ResumenDiario` DISABLE KEYS */;
INSERT INTO `ResumenDiario` VALUES (1,1,'2026-03-04',1,2600,'Hoy hice Press inclinado con mancuernas: 3x8, 20kg. Buen trabajo en pecho superior');
/*!40000 ALTER TABLE `ResumenDiario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rutina`
--

DROP TABLE IF EXISTS `Rutina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Rutina` (
  `id_rutina` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `nombre_rutina` varchar(255) DEFAULT NULL,
  `objetivo` enum('perder peso','ganar fuerza','estabilidad') DEFAULT NULL,
  PRIMARY KEY (`id_rutina`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `Rutina_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rutina`
--

LOCK TABLES `Rutina` WRITE;
/*!40000 ALTER TABLE `Rutina` DISABLE KEYS */;
INSERT INTO `Rutina` VALUES (1,1,'Tren Superior','ganar fuerza');
/*!40000 ALTER TABLE `Rutina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SesionesDeClases`
--

DROP TABLE IF EXISTS `SesionesDeClases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SesionesDeClases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `tipoDeClases` enum('Cardio','Cycling','trenSuperior','trenInferior') DEFAULT NULL,
  `fechaClases` date DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `id_entrenador` int DEFAULT NULL,
  `descripcion` varchar(8000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_entrenador` (`id_entrenador`),
  CONSTRAINT `SesionesDeClases_ibfk_1` FOREIGN KEY (`id_entrenador`) REFERENCES `Entrenadores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SesionesDeClases`
--

LOCK TABLES `SesionesDeClases` WRITE;
/*!40000 ALTER TABLE `SesionesDeClases` DISABLE KEYS */;
INSERT INTO `SesionesDeClases` VALUES (1,'Tren Superir','trenSuperior','2026-03-04','01:00:00',1,'Clase enfocada al entreno del tren superior'),(2,'Maikel','Cardio','0001-02-15','21:51:00',1,'asfba'),(3,'xavi','Cardio','0005-02-15','12:51:00',1,'buscar chicas');
/*!40000 ALTER TABLE `SesionesDeClases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario_Ejercicio`
--

DROP TABLE IF EXISTS `Usuario_Ejercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Usuario_Ejercicio` (
  `id_usuario` int DEFAULT NULL,
  `id_ejercicio` int DEFAULT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `id_ejercicio` (`id_ejercicio`),
  CONSTRAINT `Usuario_Ejercicio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id`),
  CONSTRAINT `Usuario_Ejercicio_ibfk_2` FOREIGN KEY (`id_ejercicio`) REFERENCES `Ejercicios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario_Ejercicio`
--

LOCK TABLES `Usuario_Ejercicio` WRITE;
/*!40000 ALTER TABLE `Usuario_Ejercicio` DISABLE KEYS */;
INSERT INTO `Usuario_Ejercicio` VALUES (1,1);
/*!40000 ALTER TABLE `Usuario_Ejercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario_Sesion`
--

DROP TABLE IF EXISTS `Usuario_Sesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Usuario_Sesion` (
  `id_usuario` int DEFAULT NULL,
  `id_sesion` int DEFAULT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `id_sesion` (`id_sesion`),
  CONSTRAINT `Usuario_Sesion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id`),
  CONSTRAINT `Usuario_Sesion_ibfk_2` FOREIGN KEY (`id_sesion`) REFERENCES `SesionesDeClases` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario_Sesion`
--

LOCK TABLES `Usuario_Sesion` WRITE;
/*!40000 ALTER TABLE `Usuario_Sesion` DISABLE KEYS */;
INSERT INTO `Usuario_Sesion` VALUES (1,NULL),(1,NULL),(1,NULL),(1,NULL),(1,NULL),(1,NULL),(1,NULL),(1,NULL),(1,NULL),(1,3);
/*!40000 ALTER TABLE `Usuario_Sesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `apellido` varchar(80) DEFAULT NULL,
  `numeroTelefono` varchar(20) DEFAULT NULL,
  `tipoDocumento` enum('Pasaporte','DNI','NIE') DEFAULT NULL,
  `numeroDocumento` varchar(30) DEFAULT NULL,
  `correoElectronico` varchar(70) DEFAULT NULL,
  `contrasenia` varchar(255) DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `genero` enum('masculino','femenino') DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `altura` float DEFAULT NULL,
  `objetivo` enum('perder peso','ganar fuerza','estabilidad') DEFAULT NULL,
  `fechaDeAlta` date DEFAULT NULL,
  `id_entrenador` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_entrenador` (`id_entrenador`),
  CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`id_entrenador`) REFERENCES `Entrenadores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'usuario','instiut','+34 6310042233','DNI','48042187A','mvp@institutmvm.cat','$2y$10$GbsqgDVAlkMRodSJp1dgs.U7A1SXkcVcKjFFpxXckF8WPvxSqgRkC',20,'masculino',70,1.4,'estabilidad','2026-02-27',1);
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-09 19:33:21
