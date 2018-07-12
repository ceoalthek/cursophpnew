-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: prueba
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `nombre`
--

DROP TABLE IF EXISTS `nombre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nombre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `paterno` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `materno` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `pass` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `ip` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nombre`
--

LOCK TABLES `nombre` WRITE;
/*!40000 ALTER TABLE `nombre` DISABLE KEYS */;
INSERT INTO `nombre` VALUES (1,'simon','hernandez','granados',NULL,NULL,NULL),(2,'enrique','acevedo','catalan',NULL,NULL,NULL),(3,'eniek','leon','vergara',NULL,NULL,NULL),(4,'Pedro','Pica','Piedra',NULL,NULL,NULL),(5,'Pedro','Pica','Piedra',NULL,NULL,NULL),(6,'Pedro','Pica','Piedra',NULL,NULL,NULL),(7,'Pedro','Pica','Piedra',NULL,NULL,NULL),(8,'Pedro','Pica','Piedra',NULL,NULL,NULL),(9,'Pedro','Pica','Piedra',NULL,NULL,NULL),(10,'Pedro','Pica','Piedra',NULL,NULL,NULL),(11,'Pedro','Pica','Piedra',NULL,NULL,NULL),(12,'Pedro','Pica','Piedra',NULL,NULL,NULL),(13,'Pedro','Pica','Piedra',NULL,NULL,NULL),(14,'Pedro','Pica','Piedra',NULL,NULL,NULL),(15,'Pedro','Pica','Piedra',NULL,NULL,NULL),(16,'Pedro','Pica','Piedra',NULL,NULL,NULL),(17,'Pedro','Pica','Piedra',NULL,NULL,NULL),(18,'Pedro','Pica','Piedra',NULL,NULL,NULL),(19,'Pedro','Pica','Piedra',NULL,NULL,NULL),(20,'Pedro','Pica','Piedra',NULL,NULL,NULL),(21,'Pedro','Pica','Piedra',NULL,NULL,NULL),(22,'Pedro','Pica','Piedra',NULL,NULL,NULL),(23,'Pedro','Pica','Piedra',NULL,NULL,NULL),(24,'Pedro','Pica','Piedra',NULL,NULL,NULL),(25,'Pedro','Pica','Piedra',NULL,NULL,NULL),(26,'Pedro','Pica','Piedra',NULL,NULL,NULL),(27,'{','{','{',NULL,NULL,NULL),(28,'{','{','{',NULL,NULL,NULL),(29,'NOE','ENRRIQUE','SON NOVIOS',NULL,NULL,NULL),(30,'','111111','',NULL,NULL,NULL),(31,'d41d8cd98f00b204e9800998ecf8427e',NULL,NULL,NULL,'d41d8cd98f00b204e9800998ecf842','192.168.33.1'),(32,'d41d8cd98f00b204e9800998ecf8427e',NULL,NULL,NULL,'d41d8cd98f00b204e9800998ecf842','192.168.33.1'),(33,'d41d8cd98f00b204e9800998ecf8427e',NULL,NULL,NULL,'d41d8cd98f00b204e9800998ecf842','192.168.33.1');
/*!40000 ALTER TABLE `nombre` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-12 13:41:32
