CREATE DATABASE  IF NOT EXISTS `entornos` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `entornos`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: entornos
-- ------------------------------------------------------
-- Server version	5.7.29-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catedra`
--

DROP TABLE IF EXISTS `catedra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catedra` (
  `cod_catedra` int(11) NOT NULL,
  `nombre_catedra` varchar(45) COLLATE utf8_bin NOT NULL,
  `legajo` int(11) NOT NULL,
  `cod_departamento` int(11) NOT NULL,
  PRIMARY KEY (`cod_catedra`),
  KEY `fk_catedra_jefe-catedra_idx` (`legajo`),
  KEY `fk_catedra_departamento_idx` (`cod_departamento`),
  CONSTRAINT `fk_catedra_departamento` FOREIGN KEY (`cod_departamento`) REFERENCES `departamento` (`cod_departamento`) ON UPDATE CASCADE,
  CONSTRAINT `fk_catedra_jefe` FOREIGN KEY (`legajo`) REFERENCES `jefe_catedra` (`legajo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catedra`
--

LOCK TABLES `catedra` WRITE;
/*!40000 ALTER TABLE `catedra` DISABLE KEYS */;
INSERT INTO `catedra` VALUES (1,'Analisis de Sistemas',11111,2),(2,'Diseño de Sistemas',22222,2),(3,'Proyecto Final',33333,2);
/*!40000 ALTER TABLE `catedra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamento` (
  `cod_departamento` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cod_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Basicas'),(2,'Sistemas'),(3,'Electrica'),(4,'Mecanica'),(5,'Quimica'),(6,'Civil');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jefe_catedra`
--

DROP TABLE IF EXISTS `jefe_catedra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jefe_catedra` (
  `legajo` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`legajo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jefe_catedra`
--

LOCK TABLES `jefe_catedra` WRITE;
/*!40000 ALTER TABLE `jefe_catedra` DISABLE KEYS */;
INSERT INTO `jefe_catedra` VALUES (11111,111111111,'Sebastian','Teysera','sebastian@gmail.com'),(22222,222222222,'Esteban','Cebreiro','esteban@gmail.com'),(33333,333333333,'Juan','Fernandez','juan@gmail.com');
/*!40000 ALTER TABLE `jefe_catedra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postulacion`
--

DROP TABLE IF EXISTS `postulacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postulacion` (
  `dni` int(11) NOT NULL,
  `cod_vacante` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `curriculum` varchar(45) COLLATE utf8_bin NOT NULL,
  `cod_curriculum` int(11) NOT NULL,
  PRIMARY KEY (`dni`,`cod_vacante`),
  KEY `fk_postulacion_vacante_idx` (`cod_vacante`),
  CONSTRAINT `fk_postulacion_usuario` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`) ON UPDATE CASCADE,
  CONSTRAINT `fk_postulacion_vacante` FOREIGN KEY (`cod_vacante`) REFERENCES `vacante` (`cod_vacante`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postulacion`
--

LOCK TABLES `postulacion` WRITE;
/*!40000 ALTER TABLE `postulacion` DISABLE KEYS */;
INSERT INTO `postulacion` VALUES (55555555,1,'2020-07-21 11:35:37',85,'UTN_Entornos_Gráficos_Cookies.pdf',6),(55555555,2,'2020-07-13 13:10:11',NULL,'Proyecto - Apunte General 2020.pdf',2),(55555555,3,'2020-07-13 11:19:19',NULL,'PRESENTATION 1.1.1.pdf',1),(55555555,4,'2020-07-14 19:17:54',NULL,'UTN_Entornos_Gráficos_Práctica6.pdf',3),(77777777,1,'2020-07-21 17:37:38',60,'CV - Augusto De Lisio.pdf',7),(88888888,1,'2020-07-17 17:04:39',80,'UTN_Entornos_Gráficos_Práctica_5.pdf',5);
/*!40000 ALTER TABLE `postulacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(45) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(45) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `ciudad` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `es_admin` tinyint(4) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (12312312,'Esteban','Quito Quito','esteban@gmail.com','esteban','esteban','San Juan 123','Entre Rios',0),(12345678,'Carlos','Gutierrez','carlos@gmail.com','carlos','carlos','San Martin 1400','Rosario',1),(55555555,'Daniel','Druetta','daniel@gmail.com','daniel','daniel','Santiago 1600','Rosario',0),(66666666,'Agustin','Yurescia','agustin@gmail.com','agustin','agustin','Entre Rios 700','Rosario',0),(77777777,'Gianluca','Gatti','gianluca@gmail.com','gianluca','gianluca','Montevideo 2400','Rosario',0),(88888888,'Francisco','Tasso','francisco@gmail.com','francisco','francisco','Bv Segui 2500','Rosario',0),(111111111,'Sebastian','Teysera','sebastian@gmail.com','sebastian','sebastian','Av Pellegrini 1500','Rosario',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacante`
--

DROP TABLE IF EXISTS `vacante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vacante` (
  `cod_vacante` int(11) NOT NULL,
  `fecha_desde` datetime NOT NULL,
  `fecha_hasta` datetime NOT NULL,
  `info_general` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `cod_catedra` int(11) NOT NULL,
  PRIMARY KEY (`cod_vacante`),
  KEY `fk_vacante_catedra_idx` (`cod_catedra`),
  CONSTRAINT `fk_vacante_catedra` FOREIGN KEY (`cod_catedra`) REFERENCES `catedra` (`cod_catedra`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacante`
--

LOCK TABLES `vacante` WRITE;
/*!40000 ALTER TABLE `vacante` DISABLE KEYS */;
INSERT INTO `vacante` VALUES (1,'2020-07-09 11:00:00','2020-10-09 11:00:00','Dos años de experiencia',1),(2,'2020-07-10 11:00:00','2020-11-10 11:00:00','Física 2 aprobada',2),(3,'2020-07-11 10:00:00','2020-12-11 10:00:00','Matemática superior aprobada',3),(4,'2020-07-25 10:00:00','2020-12-25 10:00:00','Mayor de 25 años',3);
/*!40000 ALTER TABLE `vacante` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-22 10:49:36
