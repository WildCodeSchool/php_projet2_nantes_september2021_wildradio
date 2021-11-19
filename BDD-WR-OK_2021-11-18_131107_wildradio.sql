-- MySQL dump 10.13  Distrib 8.0.26, for macos10.14 (x86_64)
--
-- Host: localhost    Database: wildradio
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `playlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `img` varchar(100) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `is_online` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlist`
--

/*!40000 ALTER TABLE `playlist` DISABLE KEYS */;
INSERT INTO `playlist` VALUES (27,'Sweet music','Voici que la saison décline,L’ombre grandit, l’azur décroît,Le vent fraîchit sur la colline,L’oiseau frissonne, l’herbe a froid.La mouche, comme prise au piège,Est immobile à mon plafond ;Et comme un blanc flocon de neige,Petit à petit, l’été fond.','/assets/images/6196321d3a11f.jpg','',1),(28,'LoFi et Cie','L’aurore automnale amène la nostalgie\r\nDe la Bretagne et de son ocre névralgie.\r\nLa campagne y commence l’effilochement\r\nAu quotidien de sa couverture verte ;\r\n\r\nLe début du crépusculaire épanchement\r\nDes feuillages dont la vitalité offerte\r\nSe posera, dense, comme l’effigie brune\r\nDe la vie en déclin, sa substance importune.','/assets/images/6194313e2f09a.jpg','',1),(29,'Electrophonie','Tapi dans les rochers qui regardent la plage,\r\nAu pied de la falaise est le petit village.\r\nSur les vagues ses toits ont l’air de se pencher,\r\nEt ses mâts de bateaux entourent son clocher.\r\nC’est en mai. – L’Océan, dans ces belles journées,\r\nA l’azur tiède et clair des méditerranées.\r\nIl chante, et le soleil rend plus brillante encor\r\nSon écume glissant le long des sables d’or.','/assets/images/6194345997f2f.jpg','',1);
/*!40000 ALTER TABLE `playlist` ENABLE KEYS */;

--
-- Table structure for table `track`
--

DROP TABLE IF EXISTS `track`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `track` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `duration` time DEFAULT NULL,
  `mp3` varchar(300) NOT NULL,
  `is_in_flux` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `track`
--

/*!40000 ALTER TABLE `track` DISABLE KEYS */;
INSERT INTO `track` VALUES (50,'Evening','Mr Brady','Speechless',NULL,'/assets/audio/61940801d2d78.mp3',0),(52,'Us','Chris McClenney','Soulection White Label',NULL,'/assets/audio/6194086a0f9d2.mp3',1),(53,'Heirloom','Apollo Brown','Clouds',NULL,'/assets/audio/619408a10ff28.mp3',1),(54,'Lonesome Lover','Jesse Futerman','Basement Cuts',NULL,'/assets/audio/619408e2b5072.mp3',1),(55,'N Calvert','JPEGMAFIA','Veteran',NULL,'/assets/audio/619409431ed73.mp3',1),(56,'Smoke With Me','Children of Zeus','The Story so Far',NULL,'/assets/audio/619409ce1ab83.mp3',1),(57,'Skit Skate','Lomepal','FLIP',NULL,'/assets/audio/61940a461e71b.mp3',1),(58,'Amuni','Laboreal','Le Carre Bleu',NULL,'/assets/audio/61940a994aef7.mp3',1),(59,'Haiku','Hatti Vatti','SZUM',NULL,'/assets/audio/61940acbcca37.mp3',1),(60,'Pulse','Maya Jane Cole','Take Flight',NULL,'/assets/audio/61940b3609f69.mp3',1),(61,'La Cosecha','Nicola Cruz','Prender el Alma',NULL,'/assets/audio/61940b6e533db.mp3',1),(62,'Kamehouse','Nepal','Nuit',NULL,'/assets/audio/61940bca117c4.mp3',1),(63,'Fahrenheit','Coelho','Philadelphia',NULL,'/assets/audio/61940c07a3780.mp3',1),(64,'Plat Principal','Zuntyh','Zuntyh',NULL,'/assets/audio/61940ca181bb2.mp3',1),(65,'Not About That','Van Jones','Time Has Made Me New',NULL,'/assets/audio/61940cf17452d.mp3',1),(66,'Risk','Tom Misch','Soulection Label',NULL,'/assets/audio/61940d3326f53.mp3',1),(67,'Origami','Rone','Mirapolis',NULL,'/assets/audio/61940da0c0300.mp3',1),(68,'Endless Chain','Tanika Charles','Soul Run',NULL,'/assets/audio/61940de310ba9.mp3',1),(69,'De Los Andes','Orieta Chrem','Makinmovs x Matraca',NULL,'/assets/audio/61940e4098e9d.mp3',1),(70,'Lowrider','Yussef Kaamal','Black Focus',NULL,'/assets/audio/61940ea4a6e81.mp3',1),(71,'Rosa','Sonnig','KPD Tradition',NULL,'/assets/audio/61940f31c0489.mp3',1),(72,'Chucum','El Buho','Unknown album',NULL,'/assets/audio/619410cfbe342.mp3',1);
/*!40000 ALTER TABLE `track` ENABLE KEYS */;

--
-- Table structure for table `trackPlaylist`
--

DROP TABLE IF EXISTS `trackPlaylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trackPlaylist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `track_id` int NOT NULL,
  `playlist_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trackPlaylist`
--

/*!40000 ALTER TABLE `trackPlaylist` DISABLE KEYS */;
INSERT INTO `trackPlaylist` VALUES (16,52,27),(17,72,27),(18,58,27),(19,57,27),(20,56,27),(21,49,28),(22,55,28),(23,66,28),(24,71,28),(25,60,29),(26,59,29),(27,67,29),(28,54,29),(29,58,29),(30,40,28),(31,40,27),(32,40,27),(33,40,27),(34,50,29);
/*!40000 ALTER TABLE `trackPlaylist` ENABLE KEYS */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'Johan','johan@gmail.com','$2y$10$DkTNNVWWDDQ3uP3MN5/RpODx7VdrdBTbNGAZYD1lGim405FdAKeRm');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-18 13:11:12
