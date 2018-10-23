CREATE DATABASE  IF NOT EXISTS `CONCRETA` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `CONCRETA`;
-- MySQL dump 10.13  Distrib 5.7.21, for osx10.9 (x86_64)
--
-- Host: localhost    Database: CONCRETA
-- ------------------------------------------------------
-- Server version	5.7.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AMIGOS`
--

DROP TABLE IF EXISTS `AMIGOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AMIGOS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID_1` int(11) NOT NULL,
  `USUARIO_ID_2` int(11) NOT NULL,
  `FECHA` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `AMIGO_1_idx` (`USUARIO_ID_1`),
  KEY `AMIGO_2_idx` (`USUARIO_ID_2`),
  CONSTRAINT `AMIGO_1` FOREIGN KEY (`USUARIO_ID_1`) REFERENCES `USUARIOS` (`ID`) ON UPDATE NO ACTION,
  CONSTRAINT `AMIGO_2` FOREIGN KEY (`USUARIO_ID_2`) REFERENCES `USUARIOS` (`ID`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AMIGOS`
--

LOCK TABLES `AMIGOS` WRITE;
/*!40000 ALTER TABLE `AMIGOS` DISABLE KEYS */;
/*!40000 ALTER TABLE `AMIGOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MENSAJES`
--

DROP TABLE IF EXISTS `MENSAJES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MENSAJES` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID_1` int(11) NOT NULL,
  `USER_ID_2` int(11) NOT NULL,
  `MENSAJE` text NOT NULL,
  `FECHA_INIT` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `EMISOR_idx` (`USER_ID_1`),
  KEY `RECEPTOR_idx` (`USER_ID_2`),
  CONSTRAINT `EMISOR` FOREIGN KEY (`USER_ID_1`) REFERENCES `USUARIOS` (`ID`) ON UPDATE NO ACTION,
  CONSTRAINT `RECEPTOR` FOREIGN KEY (`USER_ID_2`) REFERENCES `USUARIOS` (`ID`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MENSAJES`
--

LOCK TABLES `MENSAJES` WRITE;
/*!40000 ALTER TABLE `MENSAJES` DISABLE KEYS */;
/*!40000 ALTER TABLE `MENSAJES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RUBRO`
--

DROP TABLE IF EXISTS `RUBRO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RUBRO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_RUBRO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NOMBRE_UNIQUE` (`NOMBRE_RUBRO`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RUBRO`
--

LOCK TABLES `RUBRO` WRITE;
/*!40000 ALTER TABLE `RUBRO` DISABLE KEYS */;
INSERT INTO `RUBRO` VALUES (1,'Albanileria'),(3,'Electricidad'),(5,'Estructuras'),(2,'Gas'),(4,'Pisos y revestimientos'),(6,'Transporte,cargas,descargas');
/*!40000 ALTER TABLE `RUBRO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIOS`
--

DROP TABLE IF EXISTS `USUARIOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIOS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NAME` varchar(45) NOT NULL,
  `EMAIL` varchar(45) NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `APELLIDO` varchar(45) DEFAULT NULL,
  `DNI` varchar(45) DEFAULT NULL,
  `PASS` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `USER_NAME_UNIQUE` (`USER_NAME`),
  UNIQUE KEY `EMAIL_UNIQUE` (`EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIOS`
--

LOCK TABLES `USUARIOS` WRITE;
/*!40000 ALTER TABLE `USUARIOS` DISABLE KEYS */;
INSERT INTO `USUARIOS` VALUES (1,'carlangas','pascual@gmail.com','carlos','pascual',NULL,'$2y$10$vkaafuCfpO5RHRXinSs/UuKxtyiWoXEKIQX.4HSNOxsZ3aI3w9bie'),(2,'Pepo','pepe@gmail.com','pepe','argento','12323212','$2y$10$GD6pxdFo3hL7ZUd6fuZJuu.NX2MOvrdipfcfXX3wSUOovMQbk0B/a'),(3,'PEPE123','pepeargento@gmail.com','Pepe','argento','32675273','$2y$10$PFlq9xpJoFH0VuHd7w4gqexCnnlMJvu3qZ38z0/CjZ9NPxJtG161O'),(4,'IJASDJAHS','sanata@gmail.com','CARLOS','SANATA','32123321','$2y$10$CK1xuQ2gGRXMxDrVfXgYOe.JsPyfE/0yuy/OsjmCtLQRQS1utM6Ni'),(5,'IJASDJAHS22','sanatita@gmail.com','CARLA','SANATero','32123354','$2y$10$ikDO1iMxNVMgRB5cVOGaeuQqF5Hps1SRlMnMwWoQYQilbEm7cLLD.'),(6,'IJASDJAHS21','carlos@papas.com','CARLANGAS','SANATero','32123312','$2y$10$dtR5Ye9dgM1P2biwGkqRLuW6rDcJSaFRZYIz0jNRyDicUTN74iAdG'),(7,'Julieta23','julirada@gmail.com','Julieta','Rada','23456786','$2y$10$1G6hR6OLp3fW883EwBPwwuN2qgYm6M2G/gizU0eLuB2sRk5YvtAfC'),(9,'Julietita','julietita@gmail.com','Julieta','Rada','21543765','$2y$10$i4s0cPg.XYMoJX1lv5e.L.NWs4mJowiUi/MpRx9gFk6MkHMFexwUy'),(10,'Pedrito54','elpedrito@gmail.com','Pedro','Grasi','43567765','$2y$10$sUROrEynQUS2HV53Pb6oa.XQ8i85FguAdVkFP1y8YtSj1kfh1gIIm'),(11,'Master32','marianito@gmail.com','Mariano','Caraballo','32720676','$2y$10$M56FuhM6aQwEgZvmzru5f.9C.h27nhmeVX1xQ/snIZ7aHC.z7H/hm');
/*!40000 ALTER TABLE `USUARIOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIO_RUBRO`
--

DROP TABLE IF EXISTS `USUARIO_RUBRO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIO_RUBRO` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID` int(11) NOT NULL,
  `RUBRO_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USUARIO_ID_idx` (`USUARIO_ID`),
  KEY `RUBRO_ID_idx` (`RUBRO_ID`),
  CONSTRAINT `RUBRO_ID` FOREIGN KEY (`RUBRO_ID`) REFERENCES `RUBRO` (`ID`) ON UPDATE NO ACTION,
  CONSTRAINT `USUARIO_ID_2` FOREIGN KEY (`USUARIO_ID`) REFERENCES `USUARIOS` (`ID`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIO_RUBRO`
--

LOCK TABLES `USUARIO_RUBRO` WRITE;
/*!40000 ALTER TABLE `USUARIO_RUBRO` DISABLE KEYS */;
/*!40000 ALTER TABLE `USUARIO_RUBRO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIO_ZONA`
--

DROP TABLE IF EXISTS `USUARIO_ZONA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIO_ZONA` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID` int(11) NOT NULL,
  `ZONA_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USUARIO_ID_idx` (`USUARIO_ID`),
  KEY `ZONA_ID_idx` (`ZONA_ID`),
  CONSTRAINT `USUARIO_ID` FOREIGN KEY (`USUARIO_ID`) REFERENCES `USUARIOS` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ZONA_ID` FOREIGN KEY (`ZONA_ID`) REFERENCES `ZONA` (`ID`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIO_ZONA`
--

LOCK TABLES `USUARIO_ZONA` WRITE;
/*!40000 ALTER TABLE `USUARIO_ZONA` DISABLE KEYS */;
/*!40000 ALTER TABLE `USUARIO_ZONA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ZONA`
--

DROP TABLE IF EXISTS `ZONA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ZONA` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ZONA` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nombre_UNIQUE` (`NOMBRE_ZONA`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ZONA`
--

LOCK TABLES `ZONA` WRITE;
/*!40000 ALTER TABLE `ZONA` DISABLE KEYS */;
INSERT INTO `ZONA` VALUES (4,'Zona centro'),(1,'Zona norte'),(3,'Zona oeste'),(2,'Zona sur ');
/*!40000 ALTER TABLE `ZONA` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-23 19:37:09
