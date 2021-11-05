-- MySQL dump 10.19  Distrib 10.3.31-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: WildRadio
-- ------------------------------------------------------
-- Server version	10.3.31-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `img` varchar(100) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `is_online` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlist`
--

/*!40000 ALTER TABLE `playlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `playlist` ENABLE KEYS */;

--
-- Table structure for table `track`
--

DROP TABLE IF EXISTS `track`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `duration` time DEFAULT NULL,
  `mp3` varchar(300) NOT NULL,
  `is_in_flux` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `track`
--

/*!40000 ALTER TABLE `track` DISABLE KEYS */;
INSERT INTO `track` VALUES (5,'Fiche individuelle playlist','Maria KArré','Top','03:35:00','/assets/audio/audiohub__4066141002255_zombie-invasion-2015__testversion.mp3',1),(6,'super','Maria KArré','Top','03:35:00','/assets/audio/audiohub__4066141002255_zombie-invasion-2015__testversion.mp3',1),(8,'super','Maria KArré','Top','03:35:00','/assets/audio/audiohub__4066141002255_zombie-invasion-2015__testversion.mp3',1),(9,'hello','Lena','Top','05:17:00','/assets/audio/audiohub__4066141002255_zombie-invasion-2015__testversion.mp3',1),(11,'toto','tutu','tonton','06:45:00','/assets/audio/6182a28784298mp3',1),(12,'cannelé','Julien Doré','Aimée','05:17:00','/assets/audio/6182ab637788a.',0),(13,'cannelé','Julien Doré','Aimée','05:17:00','/assets/audio/6182ab8eb8358.',0),(14,'cannelé','Julien Doré','Aimée','06:45:00','/assets/audio/6182ac1149d3e.mp3',0),(15,'cannelé','Julien Doré','Aimée','03:35:00','/assets/audio/6182adbf97da8.mp3',0),(16,'Ceci est une chanson','tutu','Top','06:45:00','/assets/audio/6182b2ec2d6c5.mp3',0),(17,'Ceci est une chanson','tutu','Top','06:45:00','/assets/audio/6182b300eef40.mp3',0),(18,'Ceci est une chanson','tutu','Top','06:45:00','/assets/audio/6182b31603545.mp3',0),(19,'Ceci est une chanson','tutu','Top','06:45:00','/assets/audio/6182b3363d2c9.mp3',0),(20,'Ceci est une chanson','tutu','Top','06:45:00','/assets/audio/6182b35244892.mp3',0),(21,'cannelé','Julien Doré','Aimée','03:35:00','/assets/audio/6182b35c59347.mp3',1),(22,'cannelé','Julien Doré','Aimée','03:35:00','/assets/audio/6182b3943a1d7.mp3',1),(23,'cannelé','Julien Doré','Aimée','05:17:00','/assets/audio/6182b3a2ca6b5.mp3',0),(24,'Accueil','Julien Doré','Aimée','03:35:00','/assets/audio/6182b3af9b41d.mp3',1),(25,'cannelé','tutu','Aimée',NULL,'/assets/audio/6183b8345e0d4.mp3',0),(26,'cannelé','Julien Doré','Aimée',NULL,'/assets/audio/6183b83c5599f.mp3',0),(27,'tarte au citron','tutu tito','Top',NULL,'/assets/audio/6184f1c3eb81c.mp3',0),(28,'Fiche individuelle playlist','Maria Carre','Top du top',NULL,'/assets/audio/618510fbac67f.',0),(29,'toto','tutu','tata',NULL,'/assets/audio/618514967e307.',1),(30,'tototiti','tutu','tata',NULL,'/assets/audio/61851602c1592.',0),(31,'tototititutu','tutu','tata',NULL,'/assets/audio/618516c001e28.',0),(32,'tototititututoto','tutu','tata',NULL,'/assets/audio/618517b21bde1.',0),(33,'tototiti','tutu','tata',NULL,'/assets/audio/6185183d17f8a.',0),(34,'cannele modifiee','tutu','Aimee',NULL,'/assets/audio/618518b47d498.',0),(35,'super','Maria Rond','Top',NULL,'/assets/audio/618530b604189.',0);
/*!40000 ALTER TABLE `track` ENABLE KEYS */;

--
-- Table structure for table `trackPlaylist`
--

DROP TABLE IF EXISTS `trackPlaylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trackPlaylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `track_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trackPlaylist`
--

/*!40000 ALTER TABLE `trackPlaylist` DISABLE KEYS */;
/*!40000 ALTER TABLE `trackPlaylist` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-05 15:46:19
