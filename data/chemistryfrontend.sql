-- MySQL dump 10.13  Distrib 5.7.10, for Win64 (x86_64)
--
-- Host: localhost    Database: chemistryfrontend
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
-- Current Database: `chemistryfrontend`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `chemistryfrontend` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `chemistryfrontend`;

--
-- Table structure for table `costs`
--

DROP TABLE IF EXISTS `costs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `costs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `gun_powder` int(11) NOT NULL DEFAULT '0',
  `h2o` int(11) NOT NULL DEFAULT '0',
  `peanuts` int(11) NOT NULL DEFAULT '0',
  `lithium` int(11) NOT NULL DEFAULT '0',
  `hydrochloric_acid` int(11) NOT NULL DEFAULT '0',
  `eggs` int(11) NOT NULL DEFAULT '0',
  `milk` int(11) NOT NULL DEFAULT '0',
  `vanilla_extract` int(11) NOT NULL DEFAULT '0',
  `flour` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costs`
--

LOCK TABLES `costs` WRITE;
/*!40000 ALTER TABLE `costs` DISABLE KEYS */;
INSERT INTO `costs` VALUES (1,'C4',3,1,0,1,0,2,0,0,0),(2,'Methamphetamine',0,1,0,0,0,4,0,0,6),(3,'Advil',0,0,5,0,2,0,0,3,0),(4,'Vitamins',0,0,0,0,5,0,0,0,0),(5,'Stink Bomb',3,0,2,0,0,0,4,0,0),(6,'Smoke Bomb',30,0,0,0,0,1,0,0,5);
/*!40000 ALTER TABLE `costs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `numberYielded` int(11) NOT NULL,
  `recipe` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (1,'C4',1,'Mix lithium, gun powder, H20, and 2 eggs and let it solidify'),(2,'Methamphetamine',1,'Mix the eggs with the flour while adding water and slowly sift till it hardens'),(3,'Advil',4,'Add vanilla extract to hydrochloric acid and once it changes color, add 5 peanuts'),(4,'Vitamins',3,'Encapsulate large amounts of hydrochloric acid'),(5,'Stink Bomb',1,'Mix milk and peanuts with gun powder'),(6,'Smoke Bomb',2,'Mix gun powder with sifted flour and 1 egg');
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `num_sold` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,'C4','Remote controlled explosive device',14.95,12,100),(2,'Methamphetamine','Inject into bloodstream to feel good',50.00,31,250),(3,'Advil','Swallow to relieve headaches and pain',2.50,31,1200),(4,'Vitamins','Eat once a day to get all necessary vitamins',5.70,253,850),(5,'Stink Bomb','Throw to stink things up',50.00,25,350),(6,'Smoke Bomb','Throw to provide a large amount of smoke',50.00,88,650);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-08 15:19:50
