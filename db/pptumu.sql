-- MySQL dump 10.13  Distrib 5.6.21, for Linux (i686)
--
-- Host: localhost    Database: pptumu
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `tm_action`
--

DROP TABLE IF EXISTS `tm_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_action` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `objectType` varchar(30) NOT NULL DEFAULT '',
  `objectID` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `product` varchar(255) NOT NULL,
  `project` mediumint(9) NOT NULL,
  `actor` varchar(30) NOT NULL DEFAULT '',
  `action` varchar(30) NOT NULL DEFAULT '',
  `date` datetime NOT NULL,
  `comment` text NOT NULL,
  `extra` varchar(255) NOT NULL,
  `read` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=554 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_action`
--

LOCK TABLES `tm_action` WRITE;
/*!40000 ALTER TABLE `tm_action` DISABLE KEYS */;
INSERT INTO `tm_action` VALUES (1,'user',20,',0,',0,'azhi','logout','2012-06-05 09:24:52','','','0'),(2,'user',1,',0,',0,'admin','login','2012-06-05 09:25:00','','','0'),(3,'user',1,',0,',0,'admin','logout','2012-06-05 09:51:10','','','0'),(4,'user',2,',0,',0,'productManager','login','2012-06-05 09:51:33','','','0'),(5,'user',2,',0,',0,'productManager','logout','2012-06-05 09:53:05','','','0'),(6,'user',1,',0,',0,'admin','login','2012-06-05 09:53:10','','','0'),(7,'user',1,',0,',0,'admin','logout','2012-06-05 09:53:52','','','0'),(8,'user',2,',0,',0,'productManager','login','2012-06-05 09:54:07','','','0'),(9,'product',1,',1,',0,'productManager','opened','2012-06-05 09:57:07','','','0'),(10,'productplan',1,',1,',0,'productManager','opened','2012-06-05 10:02:49','','','0'),(11,'story',1,',1,',0,'productManager','opened','2012-06-05 10:09:49','','','0'),(12,'story',2,',1,',0,'productManager','opened','2012-06-05 10:16:37','','','0'),(13,'story',3,',1,',0,'productManager','opened','2012-06-05 10:18:10','','','0'),(14,'story',3,',1,',0,'productManager','changed','2012-06-05 10:19:06','','','0'),(15,'story',4,',1,',0,'productManager','opened','2012-06-05 10:20:16','','','0'),(16,'story',5,',1,',0,'productManager','opened','2012-06-05 10:21:39','','','0'),(17,'story',6,',1,',0,'productManager','opened','2012-06-05 10:23:11','','','0'),(18,'story',7,',1,',0,'productManager','opened','2012-06-05 10:24:19','','','0'),(19,'story',1,',1,',0,'productManager','reviewed','2012-06-05 10:25:19','','Pass','0'),(20,'story',2,',1,',0,'productManager','reviewed','2012-06-05 10:25:33','','Pass','0'),(21,'story',3,',1,',0,'productManager','reviewed','2012-06-05 10:25:38','','Pass','0'),(22,'story',4,',1,',0,'productManager','reviewed','2012-06-05 10:25:42','','Pass','0'),(23,'user',2,',0,',0,'productManager','logout','2012-06-05 10:26:20','','','0'),(24,'user',3,',0,',0,'projectManager','login','2012-06-05 10:26:38','','','0'),(25,'project',1,',1,',1,'projectManager','opened','2012-06-05 10:28:36','','','0'),(26,'story',4,',1,',1,'projectManager','linked2project','2012-06-05 10:31:02','','1','0'),(27,'story',3,',1,',1,'projectManager','linked2project','2012-06-05 10:31:02','','1','0'),(28,'story',2,',1,',1,'projectManager','linked2project','2012-06-05 10:31:02','','1','0'),(29,'story',1,',1,',1,'projectManager','linked2project','2012-06-05 10:31:02','','1','0'),(30,'task',1,',1,',1,'projectManager','opened','2012-06-05 10:32:03','','','0'),(31,'task',2,',1,',1,'projectManager','opened','2012-06-05 10:32:23','','','0'),(32,'task',3,',1,',1,'projectManager','opened','2012-06-05 10:33:01','','','0'),(33,'task',4,',1,',1,'projectManager','opened','2012-06-05 10:33:21','','','0'),(34,'task',5,',1,',1,'projectManager','opened','2012-06-05 10:33:44','','','0'),(35,'task',6,',1,',1,'projectManager','opened','2012-06-05 10:33:59','','','0'),(36,'task',7,',1,',1,'projectManager','opened','2012-06-05 10:34:25','','','0'),(37,'task',8,',1,',1,'projectManager','opened','2012-06-05 10:34:45','','','0'),(38,'task',9,',1,',1,'projectManager','opened','2012-06-05 10:35:01','','','0'),(39,'user',3,',0,',0,'projectManager','logout','2012-06-05 10:37:30','','','0'),(40,'user',4,',0,',0,'dev1','login','2012-06-05 10:37:40','','','0'),(41,'task',1,',1,',1,'dev1','started','2012-06-05 10:37:54','','','0'),(42,'task',1,',1,',1,'dev1','finished','2012-06-05 10:38:00','','','0'),(43,'task',8,',1,',1,'dev1','finished','2012-06-05 10:39:14','','','0'),(44,'task',9,',1,',1,'dev1','edited','2012-06-05 10:41:20','','','0'),(45,'task',8,',1,',1,'dev1','edited','2012-06-05 10:41:20','','','0'),(46,'task',7,',1,',1,'dev1','edited','2012-06-05 10:41:20','','','0'),(47,'task',6,',1,',1,'dev1','edited','2012-06-05 10:41:20','','','0'),(48,'task',5,',1,',1,'dev1','edited','2012-06-05 10:41:20','','','0'),(49,'task',4,',1,',1,'dev1','edited','2012-06-05 10:41:20','','','0'),(50,'task',3,',1,',1,'dev1','edited','2012-06-05 10:41:20','','','0'),(51,'task',2,',1,',1,'dev1','edited','2012-06-05 10:41:20','','','0'),(52,'task',1,',1,',1,'dev1','edited','2012-06-05 10:41:20','','','0'),(53,'user',4,',0,',0,'dev1','logout','2012-06-05 10:41:50','','','0'),(54,'user',5,',0,',0,'dev2','login','2012-06-05 10:41:56','','','0'),(55,'task',4,',1,',1,'dev2','edited','2012-06-05 10:42:56','','','0'),(56,'task',3,',1,',1,'dev2','edited','2012-06-05 10:42:57','','','0'),(57,'user',5,',0,',0,'dev2','logout','2012-06-05 10:43:02','','','0'),(58,'user',6,',0,',0,'dev3','login','2012-06-05 10:43:07','','','0'),(59,'task',6,',1,',1,'dev3','edited','2012-06-05 10:43:32','','','0'),(60,'task',5,',1,',1,'dev3','edited','2012-06-05 10:43:32','','','0'),(61,'user',6,',0,',0,'dev3','logout','2012-06-05 10:43:42','','','0'),(62,'user',3,',0,',0,'projectManager','login','2012-06-05 10:44:05','','','0'),(63,'user',3,',0,',0,'projectManager','logout','2012-06-05 10:50:03','','','0'),(64,'user',10,',0,',0,'testManager','login','2012-06-05 10:50:09','','','0'),(65,'user',10,',0,',0,'testManager','logout','2012-06-05 10:50:14','','','0'),(66,'user',10,',0,',0,'testManager','login','2012-06-05 10:50:23','','','0'),(67,'user',10,',0,',0,'testManager','logout','2012-06-05 10:50:32','','','0'),(68,'user',1,',0,',0,'admin','login','2012-06-05 10:50:36','','','0'),(69,'user',1,',0,',0,'admin','logout','2012-06-05 10:50:53','','','0'),(70,'user',10,',0,',0,'testManager','login','2012-06-05 10:51:01','','','0'),(71,'user',10,',0,',0,'testManager','logout','2012-06-05 10:51:33','','','0'),(72,'user',7,',0,',0,'tester1','login','2012-06-05 10:51:38','','','0'),(73,'bug',1,',1,',1,'tester1','opened','2012-06-05 10:56:11','','','0'),(74,'bug',2,',1,',1,'tester1','opened','2012-06-05 10:57:11','','','0'),(75,'user',7,',0,',0,'tester1','logout','2012-06-05 10:57:13','','','0'),(76,'user',8,',0,',0,'tester2','login','2012-06-05 10:57:24','','','0'),(77,'bug',3,',1,',1,'tester2','opened','2012-06-05 10:58:22','','','0'),(78,'user',8,',0,',0,'tester2','logout','2012-06-05 10:58:39','','','0'),(79,'user',9,',0,',0,'tester3','login','2012-06-05 10:58:46','','','0'),(80,'bug',4,',1,',1,'tester3','opened','2012-06-05 11:00:19','','','0'),(81,'case',1,',1,',0,'tester3','opened','2012-06-05 11:02:18','','','0'),(82,'case',1,',1,',0,'tester3','edited','2012-06-05 11:02:47','','','0'),(83,'user',9,',0,',0,'tester3','logout','2012-06-05 11:02:48','','','0'),(84,'user',7,',0,',0,'tester1','login','2012-06-05 11:02:56','','','0'),(85,'case',2,',1,',0,'tester1','opened','2012-06-05 11:03:28','','','0'),(86,'case',3,',1,',0,'tester1','opened','2012-06-05 11:03:54','','','0'),(87,'user',7,',0,',0,'tester1','logout','2012-06-05 11:04:00','','','0'),(88,'user',8,',0,',0,'tester2','login','2012-06-05 11:04:10','','','0'),(89,'case',4,',1,',0,'tester2','opened','2012-06-05 11:04:48','','','0'),(90,'user',8,',0,',0,'tester2','logout','2012-06-05 11:04:52','','','0'),(91,'user',10,',0,',0,'testManager','login','2012-06-05 11:04:58','','','0'),(92,'testtask',1,',1,',1,'testManager','opened','2012-06-05 11:07:41','','','0'),(93,'testtask',1,',1,',1,'testManager','edited','2012-06-05 11:07:52','','','0'),(94,'user',10,',0,',0,'testManager','logout','2012-06-05 11:08:10','','','0'),(95,'user',1,',0,',0,'admin','login','2012-06-05 11:08:15','','','0'),(96,'user',1,',0,',0,'admin','logout','2012-06-05 11:08:23','','','0'),(97,'user',10,',0,',0,'testManager','login','2012-06-05 11:08:35','','','0'),(98,'user',10,',0,',0,'testManager','logout','2012-06-05 11:08:55','','','0'),(99,'user',7,',0,',0,'tester1','login','2012-06-05 11:08:59','','','0'),(100,'user',7,',0,',0,'tester1','logout','2012-06-05 11:09:52','','','0'),(101,'user',1,',0,',0,'admin','login','2012-06-05 11:09:54','','','0'),(102,'user',1,',0,',0,'admin','logout','2012-06-05 11:10:38','','','0'),(103,'user',10,',0,',0,'testManager','login','2012-06-05 11:10:42','','','0'),(104,'user',10,',0,',0,'testManager','logout','2012-06-05 11:11:13','','','0'),(105,'user',3,',0,',0,'projectManager','login','2012-06-05 11:11:16','','','0'),(106,'build',1,',1,',1,'projectManager','opened','2012-06-05 11:11:45','','','0'),(107,'project',2,',1,',2,'projectManager','opened','2012-06-05 11:12:28','','','0'),(108,'user',3,',0,',0,'projectManager','logout','2012-06-05 11:14:40','','','0'),(109,'user',2,',0,',0,'productManager','login','2012-06-05 11:14:43','','','0'),(110,'product',2,',2,',0,'productManager','opened','2012-06-05 11:15:20','','','0'),(111,'user',1,',0,',0,'admin','login','2015-01-11 17:50:51','','','0'),(112,'user',1,',0,',0,'admin','login','2015-01-11 18:10:16','','','0'),(113,'user',1,',0,',0,'admin','login','2015-01-12 22:14:08','','','0'),(114,'user',1,',0,',0,'admin','login','2015-01-12 22:23:17','','','0'),(115,'user',1,',0,',0,'admin','login','2015-01-13 21:55:59','','','0'),(116,'user',1,',0,',0,'admin','logout','2015-01-13 22:02:01','','','0'),(117,'user',1,',0,',0,'admin','login','2015-01-13 22:02:07','','','0'),(118,'user',1,',0,',0,'admin','login','2015-01-14 21:52:58','','','0'),(119,'user',1,',0,',0,'admin','login','2015-01-15 01:07:20','','','0'),(120,'user',1,',0,',0,'admin','login','2015-01-15 20:33:41','','','0'),(121,'user',1,',0,',0,'admin','login','2015-01-16 20:30:53','','','0'),(122,'user',1,',0,',0,'admin','logout','2015-01-16 20:31:31','','','0'),(123,'user',1,',0,',0,'admin','login','2015-01-16 20:32:06','','','0'),(124,'user',1,',0,',0,'admin','login','2015-01-16 23:07:11','','','0'),(125,'user',1,',0,',0,'admin','login','2015-01-19 20:43:39','','','0'),(126,'user',1,',0,',0,'admin','login','2015-01-20 19:32:45','','','0'),(127,'user',1,',0,',0,'admin','login','2015-01-20 21:22:00','','','0'),(128,'material',1,',0,',0,'admin','opened','2015-01-20 23:51:43','','','0'),(129,'material',2,',0,',0,'admin','opened','2015-01-21 00:13:57','','','0'),(130,'material',3,',0,',0,'admin','opened','2015-01-21 00:17:03','','','0'),(131,'material',4,',0,',0,'admin','opened','2015-01-21 00:19:38','','','0'),(132,'user',1,',0,',0,'admin','login','2015-01-21 00:27:23','','','0'),(133,'user',1,',0,',0,'admin','login','2015-01-21 20:26:15','','','0'),(134,'user',1,',0,',0,'admin','login','2015-01-26 21:46:44','','','0'),(135,'user',1,',0,',0,'admin','login','2015-01-29 17:37:15','','','0'),(136,'user',1,',0,',0,'admin','login','2015-01-30 12:30:29','','','0'),(137,'user',1,',0,',0,'admin','logout','2015-01-30 16:00:20','','','0'),(138,'user',1,',0,',0,'admin','login','2015-01-30 16:12:29','','','0'),(139,'user',1,',0,',0,'admin','logout','2015-01-30 16:12:48','','','0'),(140,'user',1,',0,',0,'admin','login','2015-01-30 16:13:54','','','0'),(141,'machine',1,',0,',0,'admin','created','2015-01-30 16:26:10','','','0'),(142,'user',1,',0,',0,'admin','logout','2015-01-30 16:27:50','','','0'),(143,'user',1,',0,',0,'admin','login','2015-01-30 16:27:52','','','0'),(144,'machine',2,',0,',0,'admin','created','2015-01-30 17:01:02','','','0'),(145,'user',1,',0,',0,'admin','login','2015-01-31 15:20:26','','','0'),(146,'user',1,',0,',0,'admin','login','2015-01-31 17:07:23','','','0'),(147,'user',1,',0,',0,'admin','login','2015-01-31 17:27:46','','','0'),(148,'user',1,',0,',0,'admin','login','2015-01-31 19:20:14','','','0'),(149,'user',1,',0,',0,'admin','login','2015-02-01 09:03:13','','','0'),(150,'user',1,',0,',0,'admin','login','2015-02-01 16:18:11','','','0'),(151,'user',1,',0,',0,'admin','login','2015-02-01 21:03:07','','','0'),(152,'material application',1,',0,',0,'admin','created','2015-02-02 23:35:14','','','0'),(153,'material application',2,',0,',0,'admin','created','2015-02-02 23:36:10','','','0'),(154,'user',1,',0,',0,'admin','login','2015-02-03 20:40:07','','','0'),(155,'material application',3,',0,',0,'admin','created','2015-02-03 20:54:43','','','0'),(156,'material',5,',0,',0,'admin','opened','2015-02-03 20:58:04','','','0'),(157,'material',6,',0,',0,'admin','opened','2015-02-03 20:58:48','','','0'),(158,'material',7,',0,',0,'admin','opened','2015-02-03 20:59:54','','','0'),(159,'user',1,',0,',0,'admin','login','2015-02-03 21:07:20','','','0'),(160,'material application detail',1,',0,',0,'admin','created','2015-02-03 21:58:50','','','0'),(161,'material application detail',2,',0,',0,'admin','created','2015-02-03 21:58:50','','','0'),(162,'material application detail',3,',0,',0,'admin','created','2015-02-03 21:58:50','','','0'),(163,'material application detail',1,',0,',0,'admin','edited','2015-02-03 23:13:14','','','0'),(164,'material application detail',2,',0,',0,'admin','edited','2015-02-03 23:13:14','','','0'),(165,'material application detail',3,',0,',0,'admin','edited','2015-02-03 23:13:14','','','0'),(166,'material application detail',1,',0,',0,'admin','edited','2015-02-03 23:14:15','','','0'),(167,'material application detail',2,',0,',0,'admin','edited','2015-02-03 23:14:15','','','0'),(168,'material application detail',3,',0,',0,'admin','edited','2015-02-03 23:14:15','','','0'),(169,'material application detail',1,',0,',0,'admin','edited','2015-02-03 23:16:10','','','0'),(170,'material application detail',2,',0,',0,'admin','edited','2015-02-03 23:16:11','','','0'),(171,'material application detail',3,',0,',0,'admin','edited','2015-02-03 23:16:11','','','0'),(172,'material application detail',1,',0,',0,'admin','edited','2015-02-03 23:17:17','','','0'),(173,'material application detail',2,',0,',0,'admin','edited','2015-02-03 23:17:17','','','0'),(174,'material application detail',3,',0,',0,'admin','edited','2015-02-03 23:17:17','','','0'),(175,'material application detail',1,',0,',0,'admin','edited','2015-02-03 23:17:36','','','0'),(176,'material application detail',2,',0,',0,'admin','edited','2015-02-03 23:17:36','','','0'),(177,'material application detail',3,',0,',0,'admin','edited','2015-02-03 23:17:36','','','0'),(178,'material application detail',1,',0,',0,'admin','edited','2015-02-03 23:19:16','','','0'),(179,'material application detail',2,',0,',0,'admin','edited','2015-02-03 23:19:16','','','0'),(180,'material application detail',3,',0,',0,'admin','edited','2015-02-03 23:19:16','','','0'),(181,'material application detail',1,',0,',0,'admin','edited','2015-02-03 23:19:37','','','0'),(182,'material application detail',2,',0,',0,'admin','edited','2015-02-03 23:19:37','','','0'),(183,'material application detail',3,',0,',0,'admin','edited','2015-02-03 23:19:37','','','0'),(184,'user',1,',0,',0,'admin','login','2015-02-04 20:20:22','','','0'),(185,'machine distributiion',1,',0,',0,'admin','created','2015-02-04 23:23:11','','','0'),(186,'machine distributiion',2,',0,',0,'admin','created','2015-02-04 23:23:47','','','0'),(187,'machine distributiion',3,',0,',0,'admin','created','2015-02-04 23:23:52','','','0'),(188,'machine distributiion',4,',0,',0,'admin','created','2015-02-04 23:26:03','','','0'),(189,'machine distributiion',5,',0,',0,'admin','created','2015-02-04 23:32:57','','','0'),(190,'user',1,',0,',0,'admin','login','2015-02-05 20:45:52','','','0'),(191,'user',1,',0,',0,'admin','login','2015-02-05 21:04:07','','','0'),(192,'user',1,',0,',0,'admin','login','2015-02-05 21:18:20','','','0'),(193,'user',1,',0,',0,'admin','login','2015-02-06 20:16:30','','','0'),(194,'report testation',1,',0,',0,'admin','created','2015-02-06 21:54:32','','','0'),(195,'user',1,',0,',0,'admin','login','2015-02-06 22:53:37','','','0'),(196,'user',1,',0,',0,'admin','login','2015-02-07 09:23:58','','','0'),(197,'report',3,',0,',0,'admin','created','2015-02-07 10:04:26','','','0'),(198,'user',1,',0,',0,'admin','login','2015-02-07 15:14:03','','','0'),(199,'parchase',1,',0,',0,'admin','created','2015-02-07 19:02:23','','','0'),(200,'project',3,',,',3,'admin','opened','2015-02-07 19:51:20','','','0'),(201,'material application',4,',0,',0,'admin','created','2015-02-07 20:03:58','','','0'),(202,'material application detail',5,',0,',0,'admin','created','2015-02-07 20:04:22','','','0'),(203,'material application detail',6,',0,',0,'admin','created','2015-02-07 20:04:22','','','0'),(204,'material application detail',7,',0,',0,'admin','created','2015-02-07 20:04:22','','','0'),(205,'material application detail',8,',0,',0,'admin','created','2015-02-07 20:04:22','','','0'),(206,'material application detail',9,',0,',0,'admin','created','2015-02-07 20:04:22','','','0'),(207,'material application detail',10,',0,',0,'admin','created','2015-02-07 20:04:22','','','0'),(208,'material application detail',5,',0,',0,'admin','edited','2015-02-07 20:04:42','','','0'),(209,'material application detail',6,',0,',0,'admin','edited','2015-02-07 20:04:42','','','0'),(210,'material application detail',7,',0,',0,'admin','edited','2015-02-07 20:04:42','','','0'),(211,'material application detail',8,',0,',0,'admin','edited','2015-02-07 20:04:42','','','0'),(212,'material application detail',9,',0,',0,'admin','edited','2015-02-07 20:04:42','','','0'),(213,'material application detail',10,',0,',0,'admin','edited','2015-02-07 20:04:42','','','0'),(214,'material application',5,',0,',0,'admin','created','2015-02-07 20:07:18','','','0'),(215,'material application detail',11,',0,',0,'admin','created','2015-02-07 20:07:30','','','0'),(216,'material application detail',12,',0,',0,'admin','created','2015-02-07 20:07:30','','','0'),(217,'material application detail',13,',0,',0,'admin','created','2015-02-07 20:07:30','','','0'),(218,'material application detail',11,',0,',0,'admin','edited','2015-02-07 20:07:37','','','0'),(219,'material application detail',12,',0,',0,'admin','edited','2015-02-07 20:07:37','','','0'),(220,'material application detail',13,',0,',0,'admin','edited','2015-02-07 20:07:37','','','0'),(221,'parchase',2,',0,',0,'admin','created','2015-02-07 20:10:38','','','0'),(222,'machine distributiion',6,',0,',0,'admin','created','2015-02-07 20:11:15','','','0'),(223,'machine distributiion',7,',0,',0,'admin','created','2015-02-07 20:18:02','','','0'),(224,'material application',6,',0,',0,'admin','created','2015-02-07 20:20:00','','','0'),(225,'material application detail',14,',0,',0,'admin','created','2015-02-07 20:20:12','','','0'),(226,'material application detail',15,',0,',0,'admin','created','2015-02-07 20:20:12','','','0'),(227,'material application detail',16,',0,',0,'admin','created','2015-02-07 20:20:12','','','0'),(228,'material application detail',17,',0,',0,'admin','created','2015-02-07 20:20:12','','','0'),(229,'material application detail',18,',0,',0,'admin','created','2015-02-07 20:20:12','','','0'),(230,'material application detail',14,',0,',0,'admin','edited','2015-02-07 20:20:25','','','0'),(231,'material application detail',15,',0,',0,'admin','edited','2015-02-07 20:20:25','','','0'),(232,'material application detail',16,',0,',0,'admin','edited','2015-02-07 20:20:25','','','0'),(233,'material application detail',17,',0,',0,'admin','edited','2015-02-07 20:20:25','','','0'),(234,'material application detail',18,',0,',0,'admin','edited','2015-02-07 20:20:25','','','0'),(235,'user',1,',0,',0,'admin','login','2015-02-07 21:52:47','','','0'),(236,'material application',7,',0,',0,'admin','created','2015-02-08 00:09:20','','','0'),(237,'material application detail',19,',0,',0,'admin','created','2015-02-08 00:11:11','','','0'),(238,'material application detail',20,',0,',0,'admin','created','2015-02-08 00:11:11','','','0'),(239,'material application detail',21,',0,',0,'admin','created','2015-02-08 00:11:11','','','0'),(240,'material application detail',22,',0,',0,'admin','created','2015-02-08 00:11:11','','','0'),(241,'material application detail',23,',0,',0,'admin','created','2015-02-08 00:11:11','','','0'),(242,'material application detail',24,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(243,'material application detail',25,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(244,'material application detail',26,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(245,'material application detail',27,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(246,'material application detail',28,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(247,'material application detail',29,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(248,'material application detail',30,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(249,'material application detail',31,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(250,'material application detail',32,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(251,'material application detail',33,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(252,'material application detail',34,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(253,'material application detail',35,',0,',0,'admin','created','2015-02-08 00:11:12','','','0'),(254,'material application detail',19,',0,',0,'admin','edited','2015-02-08 00:12:15','','','0'),(255,'material application detail',20,',0,',0,'admin','edited','2015-02-08 00:12:15','','','0'),(256,'material application detail',21,',0,',0,'admin','edited','2015-02-08 00:12:15','','','0'),(257,'material application detail',22,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(258,'material application detail',23,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(259,'material application detail',24,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(260,'material application detail',25,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(261,'material application detail',26,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(262,'material application detail',27,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(263,'material application detail',28,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(264,'material application detail',29,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(265,'material application detail',30,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(266,'material application detail',31,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(267,'material application detail',32,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(268,'material application detail',33,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(269,'material application detail',34,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(270,'material application detail',35,',0,',0,'admin','edited','2015-02-08 00:12:16','','','0'),(271,'user',1,',0,',0,'admin','login','2015-02-08 08:21:15','','','0'),(272,'parchase',0,',0,',0,'admin','created','2015-02-08 12:04:46','','','0'),(273,'parchase',0,',0,',0,'admin','created','2015-02-08 12:06:18','','','0'),(274,'project',5,',,',5,'admin','opened','2015-02-08 17:27:08','','','0'),(275,'project',6,',,',6,'admin','opened','2015-02-08 17:32:45','','','0'),(276,'project',8,',,',8,'admin','opened','2015-02-08 18:00:45','','','0'),(277,'project',8,',,',8,'admin','editfile','2015-02-08 18:19:32','','mysql_examples11.sql','0'),(278,'project',8,',,',8,'admin','editfile','2015-02-08 18:19:42','','新建 Microsoft Word 文档11.doc','0'),(279,'project',7,',,',7,'admin','edited','2015-02-08 18:23:45','','','0'),(280,'user',1,',0,',0,'admin','logout','2015-02-08 20:57:52','','','0'),(281,'user',1,',0,',0,'admin','login','2015-02-08 20:57:55','','','0'),(282,'user',1,',0,',0,'admin','logout','2015-02-08 20:58:36','','','0'),(283,'user',1,',0,',0,'admin','login','2015-02-08 20:58:39','','','0'),(284,'parchase',0,',0,',0,'admin','created','2015-02-08 21:57:39','','','0'),(285,'user',1,',0,',0,'admin','login','2015-02-09 20:04:37','','','0'),(286,'user',1,',0,',0,'admin','login','2015-02-10 05:38:41','','','0'),(287,'project',1,',,',1,'admin','edited','2015-02-10 05:57:52','','','0'),(288,'project',2,',,',2,'admin','edited','2015-02-10 05:59:11','','','0'),(289,'user',1,',0,',0,'admin','login','2015-02-10 10:40:46','','','0'),(290,'project',7,',,',7,'admin','edited','2015-02-10 17:16:53','','','0'),(291,'project',2,',,',2,'admin','edited','2015-02-10 18:06:44','','','0'),(292,'user',1,',0,',0,'admin','login','2015-02-11 09:35:43','','','0'),(293,'user',1,',0,',0,'admin','login','2015-02-11 09:40:28','','','0'),(294,'user',1,',0,',0,'admin','login','2015-02-11 10:15:52','','','0'),(295,'project',7,',,',7,'admin','edited','2015-02-11 12:09:37','','','0'),(296,'user',1,',0,',0,'admin','login','2015-02-11 20:12:39','','','0'),(297,'user',1,',0,',0,'admin','logout','2015-02-11 20:12:45','','','0'),(298,'user',1,',0,',0,'admin','login','2015-02-11 21:01:12','','','0'),(299,'user',1,',0,',0,'admin','logout','2015-02-11 21:01:21','','','0'),(300,'user',1,',0,',0,'admin','login','2015-02-11 21:01:48','','','0'),(301,'user',1,',0,',0,'admin','logout','2015-02-11 22:22:02','','','0'),(302,'user',1,',0,',0,'admin','login','2015-02-12 06:12:48','','','0'),(303,'report testation',2,',0,',0,'admin','created','2015-02-12 07:22:08','','','0'),(304,'report problem',1,',0,',0,'admin','created','2015-02-12 07:34:54','','','0'),(305,'parchase',0,',0,',0,'admin','created','2015-02-12 16:31:53','','','0'),(306,'parchase',0,',0,',0,'admin','created','2015-02-12 16:32:01','','','0'),(307,'parchase',0,',0,',0,'admin','created','2015-02-12 16:32:48','','','0'),(308,'user',1,',0,',0,'admin','login','2015-02-14 22:04:17','','','0'),(309,'user',1,',0,',0,'admin','login','2015-02-15 11:18:02','','','0'),(310,'user',1,',0,',0,'admin','login','2015-02-15 11:46:49','','','0'),(311,'user',1,',0,',0,'admin','login','2015-02-16 16:12:04','','','0'),(312,'report',3,',0,',0,'admin','created','2015-02-17 05:57:58','','','0'),(313,'report',4,',0,',0,'admin','created','2015-02-17 06:11:46','','','0'),(314,'user',1,',0,',0,'admin','login','2015-02-17 06:26:05','','','0'),(315,'user',1,',0,',0,'admin','logout','2015-02-17 06:59:28','','','0'),(316,'user',1,',0,',0,'admin','login','2015-02-17 06:59:30','','','0'),(317,'user',1,',0,',0,'admin','login','2015-02-17 10:06:58','','','0'),(318,'user',1,',0,',0,'admin','login','2015-02-17 17:08:53','','','0'),(319,'user',1,',0,',0,'admin','login','2015-02-25 09:17:24','','','0'),(320,'user',1,',0,',0,'admin','login','2015-02-28 22:02:20','','','0'),(321,'user',1,',0,',0,'admin','login','2015-02-28 22:03:09','','','0'),(322,'user',1,',0,',0,'admin','login','2015-02-28 22:56:05','','','0'),(323,'user',1,',0,',0,'admin','login','2015-03-01 11:58:28','','','0'),(324,'project',9,',,',9,'admin','opened','2015-03-01 12:23:19','','','0'),(325,'project',8,',,',8,'admin','deleted','2015-03-01 12:23:35','','1','0'),(326,'project',2,',,',2,'admin','deleted','2015-03-01 12:23:41','','1','0'),(327,'material',594,',0,',0,'admin','opened','2015-03-01 12:29:43','','','0'),(328,'material application',8,',0,',0,'admin','created','2015-03-01 12:34:09','','','0'),(329,'material application detail',36,',0,',0,'admin','created','2015-03-01 12:34:22','','','0'),(330,'material application detail',37,',0,',0,'admin','created','2015-03-01 12:34:22','','','0'),(331,'material application detail',38,',0,',0,'admin','created','2015-03-01 12:34:22','','','0'),(332,'material application detail',39,',0,',0,'admin','created','2015-03-01 12:34:22','','','0'),(333,'material application detail',40,',0,',0,'admin','created','2015-03-01 12:34:22','','','0'),(334,'material application detail',36,',0,',0,'admin','edited','2015-03-01 12:34:37','','','0'),(335,'material application detail',37,',0,',0,'admin','edited','2015-03-01 12:34:37','','','0'),(336,'material application detail',38,',0,',0,'admin','edited','2015-03-01 12:34:37','','','0'),(337,'material application detail',39,',0,',0,'admin','edited','2015-03-01 12:34:37','','','0'),(338,'material application detail',40,',0,',0,'admin','edited','2015-03-01 12:34:37','','','0'),(339,'report',4,',0,',0,'admin','created','2015-03-01 12:37:53','','','0'),(340,'report',5,',0,',0,'admin','created','2015-03-01 12:38:03','','','0'),(341,'parchase',0,',0,',0,'admin','created','2015-03-01 12:40:15','','','0'),(342,'parchase',0,',0,',0,'admin','created','2015-03-01 12:41:51','','','0'),(343,'report',4,',0,',0,'admin','created','2015-03-01 12:42:30','','','0'),(344,'report',4,',0,',0,'admin','created','2015-03-01 12:48:19','','','0'),(345,'report testation',3,',0,',0,'admin','created','2015-03-01 12:48:51','','','0'),(346,'report problem',2,',0,',0,'admin','created','2015-03-01 12:49:16','','','0'),(347,'user',1,',0,',0,'admin','login','2015-03-01 15:23:55','','','0'),(348,'user',1,',0,',0,'admin','login','2015-03-01 23:23:06','','','0'),(349,'user',1,',0,',0,'admin','login','2015-03-02 11:43:59','','','0'),(350,'report',6,',0,',0,'admin','created','2015-03-02 11:44:25','','','0'),(351,'report',6,',0,',0,'admin','created','2015-03-02 17:04:05','','','0'),(352,'report',6,',0,',0,'admin','created','2015-03-02 17:04:19','','','0'),(353,'user',1,',0,',0,'admin','login','2015-03-02 20:31:03','','','0'),(354,'report',6,',0,',0,'admin','created','2015-03-02 20:40:37','','','0'),(355,'user',1,',0,',0,'admin','login','2015-03-02 21:41:15','','','0'),(356,'report',6,',0,',0,'admin','created','2015-03-02 21:50:52','','','0'),(357,'report',7,',0,',0,'admin','created','2015-03-02 21:51:03','','','0'),(358,'report',6,',0,',0,'admin','created','2015-03-02 21:51:18','','','0'),(359,'user',1,',0,',0,'admin','login','2015-03-02 21:53:17','','','0'),(360,'machine distributiion',8,',0,',0,'admin','created','2015-03-02 21:53:49','','','0'),(361,'machine distributiion',9,',0,',0,'admin','created','2015-03-02 21:54:14','','','0'),(362,'report',6,',0,',0,'admin','created','2015-03-02 21:54:21','','','0'),(363,'machine distributiion',10,',0,',0,'admin','created','2015-03-02 21:54:52','','','0'),(364,'report',6,',0,',0,'admin','created','2015-03-02 21:54:59','','','0'),(365,'user',1,',0,',0,'admin','login','2015-03-02 22:02:42','','','0'),(366,'report',6,',0,',0,'admin','created','2015-03-02 22:02:59','','','0'),(367,'report',14,',0,',0,'admin','created','2015-03-02 22:17:30','','','0'),(368,'user',1,',0,',0,'admin','login','2015-03-03 11:33:58','','','0'),(369,'user',1,',0,',0,'admin','login','2015-03-03 11:34:17','','','0'),(370,'user',1,',0,',0,'admin','login','2015-03-04 21:51:10','','','0'),(371,'user',1,',0,',0,'admin','logout','2015-03-04 21:52:25','','','0'),(372,'user',1,',0,',0,'admin','login','2015-03-05 11:31:46','','','0'),(373,'project',1,',,',1,'admin','deleted','2015-03-05 11:32:31','','1','0'),(374,'project',4,',,',4,'admin','deleted','2015-03-05 11:32:36','','1','0'),(375,'project',5,',,',5,'admin','deleted','2015-03-05 11:32:39','','1','0'),(376,'project',6,',,',6,'admin','deleted','2015-03-05 11:32:41','','1','0'),(377,'project',7,',,',7,'admin','deleted','2015-03-05 11:32:45','','1','0'),(378,'user',1,',0,',0,'admin','login','2015-03-06 11:43:29','','','0'),(379,'user',1,',0,',0,'admin','login','2015-03-06 21:48:31','','','0'),(380,'user',1,',0,',0,'admin','login','2015-03-06 23:00:49','','','0'),(381,'project',10,',,',10,'admin','opened','2015-03-06 23:01:24','','','0'),(382,'user',1,',0,',0,'admin','logout','2015-03-06 23:03:51','','','0'),(383,'user',1,',0,',0,'admin','login','2015-03-06 23:03:57','','','0'),(384,'project',11,',,',11,'admin','opened','2015-03-06 23:05:06','','','0'),(385,'project',11,',,',11,'admin','deleted','2015-03-06 23:05:17','','1','0'),(386,'project',12,',,',12,'admin','opened','2015-03-06 23:05:49','','','0'),(387,'project',12,',,',12,'admin','deleted','2015-03-06 23:05:53','','1','0'),(388,'project',13,',,',13,'admin','opened','2015-03-06 23:10:01','','','0'),(389,'project',13,',,',13,'admin','edited','2015-03-06 23:11:34','','','0'),(390,'user',1,',0,',0,'admin','logout','2015-03-06 23:12:57','','','0'),(391,'user',1,',0,',0,'admin','login','2015-03-06 23:13:48','','','0'),(392,'user',1,',0,',0,'admin','login','2015-03-06 23:17:23','','','0'),(393,'project',13,',,',13,'admin','edited','2015-03-06 23:18:45','','','0'),(394,'project',14,',,',14,'admin','opened','2015-03-06 23:21:20','','','0'),(395,'material application',9,',0,',0,'admin','created','2015-03-06 23:22:41','','','0'),(396,'project',15,',,',15,'admin','opened','2015-03-06 23:26:01','','','0'),(397,'project',16,',,',16,'admin','opened','2015-03-06 23:29:29','','','0'),(398,'project',15,',,',15,'admin','deleted','2015-03-06 23:29:34','','1','0'),(399,'project',14,',,',14,'admin','deleted','2015-03-06 23:29:38','','1','0'),(400,'material application',10,',0,',0,'admin','created','2015-03-06 23:29:51','','','0'),(401,'material application detail',41,',0,',0,'admin','created','2015-03-06 23:30:31','','','0'),(402,'material application detail',42,',0,',0,'admin','created','2015-03-06 23:30:31','','','0'),(403,'material application detail',43,',0,',0,'admin','created','2015-03-06 23:30:31','','','0'),(404,'material application detail',41,',0,',0,'admin','edited','2015-03-06 23:30:44','','','0'),(405,'material application detail',42,',0,',0,'admin','edited','2015-03-06 23:30:44','','','0'),(406,'material application detail',43,',0,',0,'admin','edited','2015-03-06 23:30:44','','','0'),(407,'parchase',0,',0,',0,'admin','created','2015-03-06 23:32:19','','','0'),(408,'parchase',0,',0,',0,'admin','created','2015-03-06 23:33:08','','','0'),(409,'machine distributiion',11,',0,',0,'admin','created','2015-03-06 23:33:53','','','0'),(410,'user',1,',0,',0,'admin','login','2015-03-06 23:34:06','','','0'),(411,'machine distributiion',12,',0,',0,'admin','created','2015-03-06 23:34:15','','','0'),(412,'report',8,',0,',0,'admin','created','2015-03-06 23:34:28','','','0'),(413,'report',15,',0,',0,'admin','created','2015-03-06 23:35:58','','','0'),(414,'material application',11,',0,',0,'admin','created','2015-03-06 23:36:39','','','0'),(415,'material application detail',44,',0,',0,'admin','created','2015-03-06 23:36:47','','','0'),(416,'material application detail',45,',0,',0,'admin','created','2015-03-06 23:36:47','','','0'),(417,'material application detail',44,',0,',0,'admin','edited','2015-03-06 23:36:56','','','0'),(418,'material application detail',45,',0,',0,'admin','edited','2015-03-06 23:36:56','','','0'),(419,'parchase',0,',0,',0,'admin','created','2015-03-06 23:46:34','','','0'),(420,'parchase',0,',0,',0,'admin','created','2015-03-06 23:47:00','','','0'),(421,'parchase',0,',0,',0,'admin','created','2015-03-06 23:47:17','','','0'),(422,'parchase',0,',0,',0,'admin','created','2015-03-06 23:48:28','','','0'),(423,'parchase',0,',0,',0,'admin','created','2015-03-06 23:49:02','','','0'),(424,'parchase',0,',0,',0,'admin','created','2015-03-06 23:49:41','','','0'),(425,'parchase',0,',0,',0,'admin','created','2015-03-06 23:50:00','','','0'),(426,'parchase',0,',0,',0,'admin','created','2015-03-06 23:50:01','','','0'),(427,'parchase',0,',0,',0,'admin','created','2015-03-06 23:52:20','','','0'),(428,'report',8,',0,',0,'admin','created','2015-03-06 23:52:28','','','0'),(429,'report',16,',0,',0,'admin','created','2015-03-06 23:53:26','','','0'),(430,'user',10,',0,',0,'admin','deleted','2015-03-06 23:55:01','','1','0'),(431,'user',9,',0,',0,'admin','deleted','2015-03-06 23:55:03','','1','0'),(432,'user',8,',0,',0,'admin','deleted','2015-03-06 23:55:06','','1','0'),(433,'user',7,',0,',0,'admin','deleted','2015-03-06 23:55:08','','1','0'),(434,'user',6,',0,',0,'admin','deleted','2015-03-06 23:55:11','','1','0'),(435,'user',5,',0,',0,'admin','deleted','2015-03-06 23:55:14','','1','0'),(436,'user',4,',0,',0,'admin','deleted','2015-03-06 23:55:17','','1','0'),(437,'user',2,',0,',0,'admin','deleted','2015-03-06 23:56:13','','1','0'),(438,'user',1,',0,',0,'admin','login','2015-03-07 05:19:01','','','0'),(439,'user',1,',0,',0,'admin','login','2015-03-07 06:47:46','','','0'),(440,'project',16,',,',16,'admin','deleted','2015-03-07 06:47:52','','1','0'),(441,'project',13,',,',13,'admin','deleted','2015-03-07 06:47:55','','1','0'),(442,'project',10,',,',10,'admin','deleted','2015-03-07 06:47:59','','1','0'),(443,'project',17,',,',17,'admin','opened','2015-03-07 06:48:56','','','0'),(444,'material application',12,',0,',0,'admin','created','2015-03-07 06:49:11','','','0'),(445,'material application detail',46,',0,',0,'admin','created','2015-03-07 06:49:48','','','0'),(446,'material application detail',47,',0,',0,'admin','created','2015-03-07 06:49:48','','','0'),(447,'material application detail',48,',0,',0,'admin','created','2015-03-07 06:49:48','','','0'),(448,'material application detail',46,',0,',0,'admin','edited','2015-03-07 06:50:03','','','0'),(449,'material application detail',47,',0,',0,'admin','edited','2015-03-07 06:50:03','','','0'),(450,'material application detail',48,',0,',0,'admin','edited','2015-03-07 06:50:03','','','0'),(451,'parchase',0,',0,',0,'admin','created','2015-03-07 06:50:28','','','0'),(452,'parchase',0,',0,',0,'admin','created','2015-03-07 06:55:33','','','0'),(453,'machine distributiion',13,',0,',0,'admin','created','2015-03-07 06:56:37','','','0'),(454,'machine distributiion',14,',0,',0,'admin','created','2015-03-07 06:56:56','','','0'),(455,'report',9,',0,',0,'admin','created','2015-03-07 06:57:35','','','0'),(456,'machine distributiion',15,',0,',0,'admin','created','2015-03-07 06:58:35','','','0'),(457,'report',9,',0,',0,'admin','created','2015-03-07 06:58:41','','','0'),(458,'report',17,',0,',0,'admin','created','2015-03-07 06:59:17','','','0'),(459,'report',9,',0,',0,'admin','created','2015-03-07 07:03:20','','','0'),(460,'report',10,',0,',0,'admin','created','2015-03-07 07:03:39','','','0'),(461,'report',18,',0,',0,'admin','created','2015-03-07 07:04:15','','','0'),(462,'user',1,',0,',0,'admin','login','2015-03-07 08:52:24','','','0'),(463,'user',1,',0,',0,'admin','logout','2015-03-07 08:54:00','','','0'),(464,'user',1,',0,',0,'admin','login','2015-03-07 08:54:18','','','0'),(465,'project',18,',,',18,'admin','opened','2015-03-07 08:58:25','','','0'),(466,'material application',13,',0,',0,'admin','created','2015-03-07 08:59:40','','','0'),(467,'material application detail',49,',0,',0,'admin','created','2015-03-07 09:00:09','','','0'),(468,'material application detail',50,',0,',0,'admin','created','2015-03-07 09:00:09','','','0'),(469,'material application detail',51,',0,',0,'admin','created','2015-03-07 09:00:09','','','0'),(470,'material application detail',52,',0,',0,'admin','created','2015-03-07 09:00:09','','','0'),(471,'material application detail',49,',0,',0,'admin','edited','2015-03-07 09:00:37','','','0'),(472,'material application detail',50,',0,',0,'admin','edited','2015-03-07 09:00:37','','','0'),(473,'material application detail',51,',0,',0,'admin','edited','2015-03-07 09:00:37','','','0'),(474,'material application detail',52,',0,',0,'admin','edited','2015-03-07 09:00:37','','','0'),(475,'parchase',0,',0,',0,'admin','created','2015-03-07 09:03:05','','','0'),(476,'parchase',0,',0,',0,'admin','created','2015-03-07 09:03:56','','','0'),(477,'report',11,',0,',0,'admin','created','2015-03-07 09:05:08','','','0'),(478,'parchase',0,',0,',0,'admin','created','2015-03-07 09:05:24','','','0'),(479,'report',11,',0,',0,'admin','created','2015-03-07 09:05:37','','','0'),(480,'machine distributiion',16,',0,',0,'admin','created','2015-03-07 09:07:08','','','0'),(481,'machine distributiion',17,',0,',0,'admin','created','2015-03-07 09:07:24','','','0'),(482,'report',12,',0,',0,'admin','created','2015-03-07 09:08:28','','','0'),(483,'report',19,',0,',0,'admin','created','2015-03-07 09:09:13','','','0'),(484,'report',11,',0,',0,'admin','created','2015-03-07 09:09:46','','','0'),(485,'machine distributiion',18,',0,',0,'admin','created','2015-03-07 09:10:55','','','0'),(486,'report',11,',0,',0,'admin','created','2015-03-07 09:11:03','','','0'),(487,'report',12,',0,',0,'admin','created','2015-03-07 09:11:34','','','0'),(488,'machine',31,',0,',0,'admin','created','2015-03-07 09:14:32','','','0'),(489,'report',11,',0,',0,'admin','created','2015-03-07 09:18:26','','','0'),(490,'report',11,',0,',0,'admin','created','2015-03-07 09:18:47','','','0'),(491,'report',11,',0,',0,'admin','created','2015-03-07 09:19:19','','','0'),(492,'material application',14,',0,',0,'admin','created','2015-03-07 09:23:03','','','0'),(493,'material application detail',53,',0,',0,'admin','created','2015-03-07 09:23:07','','','0'),(494,'material application detail',54,',0,',0,'admin','created','2015-03-07 09:23:07','','','0'),(495,'report',11,',0,',0,'admin','created','2015-03-07 09:24:38','','','0'),(496,'user',1,',0,',0,'admin','logout','2015-03-07 09:29:26','','','0'),(497,'user',11,',0,',0,'wang','login','2015-03-07 09:29:36','','','0'),(498,'user',11,',0,',0,'wang','logout','2015-03-07 09:29:39','','','0'),(499,'user',11,',0,',0,'wang','login','2015-03-07 09:29:45','','','0'),(500,'user',11,',0,',0,'wang','logout','2015-03-07 09:29:54','','','0'),(501,'user',1,',0,',0,'admin','login','2015-03-07 09:30:01','','','0'),(502,'user',1,',0,',0,'admin','logout','2015-03-07 09:30:38','','','0'),(503,'user',11,',0,',0,'wang','login','2015-03-07 09:30:44','','','0'),(504,'user',11,',0,',0,'wang','logout','2015-03-07 09:30:50','','','0'),(505,'user',1,',0,',0,'admin','login','2015-03-07 09:30:56','','','0'),(506,'user',1,',0,',0,'admin','logout','2015-03-07 09:31:44','','','0'),(507,'user',11,',0,',0,'wang','login','2015-03-07 09:31:52','','','0'),(508,'user',11,',0,',0,'wang','logout','2015-03-07 09:33:24','','','0'),(509,'user',1,',0,',0,'admin','login','2015-03-07 09:33:30','','','0'),(510,'report',11,',0,',0,'admin','created','2015-03-07 09:43:12','','','0'),(511,'report testation',4,',0,',0,'admin','created','2015-03-07 09:44:15','','','0'),(512,'user',1,',0,',0,'admin','login','2015-03-10 19:27:15','','','0'),(513,'material application',15,',0,',0,'admin','created','2015-03-10 19:35:22','','','0'),(514,'material application detail',55,',0,',0,'admin','created','2015-03-10 19:35:33','','','0'),(515,'material application detail',56,',0,',0,'admin','created','2015-03-10 19:35:33','','','0'),(516,'material application detail',55,',0,',0,'admin','edited','2015-03-10 19:35:44','','','0'),(517,'material application detail',56,',0,',0,'admin','edited','2015-03-10 19:35:44','','','0'),(518,'parchase',0,',0,',0,'admin','created','2015-03-10 20:33:53','','','0'),(519,'parchase',0,',0,',0,'admin','created','2015-03-10 20:34:01','','','0'),(520,'report',13,',0,',0,'admin','created','2015-03-10 20:34:34','','','0'),(521,'report',13,',0,',0,'admin','created','2015-03-10 20:34:58','','','0'),(522,'report',20,',0,',0,'admin','created','2015-03-10 20:35:13','','','0'),(523,'report',13,',0,',0,'admin','created','2015-03-10 20:35:21','','','0'),(524,'report',21,',0,',0,'admin','created','2015-03-10 20:35:47','','','0'),(525,'report',13,',0,',0,'admin','created','2015-03-10 20:39:25','','','0'),(526,'report',13,',0,',0,'admin','created','2015-03-10 20:50:07','','','0'),(527,'user',1,',0,',0,'admin','login','2015-03-16 15:01:17','','','0'),(528,'report',14,',0,',0,'admin','created','2015-03-16 15:03:23','','','0'),(529,'report',14,',0,',0,'admin','created','2015-03-16 15:03:36','','','0'),(530,'user',1,',0,',0,'admin','logout','2015-03-16 15:36:32','','','0'),(531,'user',1,',0,',0,'admin','login','2015-03-16 15:37:04','','','0'),(532,'user',1,',0,',0,'admin','logout','2015-03-16 15:37:18','','','0'),(533,'user',12,',0,',0,'zhang','login','2015-03-16 15:37:26','','','0'),(534,'user',1,',0,',0,'admin','login','2015-03-16 15:37:52','','','0'),(535,'user',12,',0,',0,'zhang','logout','2015-03-16 15:38:43','','','0'),(536,'user',12,',0,',0,'zhang','login','2015-03-16 15:38:51','','','0'),(537,'user',12,',0,',0,'zhang','logout','2015-03-16 15:39:09','','','0'),(538,'user',3,',0,',0,'luan','login','2015-03-16 15:39:21','','','0'),(539,'user',3,',0,',0,'luan','logout','2015-03-16 15:39:44','','','0'),(540,'user',14,',0,',0,'jxgl','login','2015-03-16 15:40:29','','','0'),(541,'user',14,',0,',0,'jxgl','logout','2015-03-16 15:43:37','','','0'),(542,'user',11,',0,',0,'wang','login','2015-03-16 15:44:33','','','0'),(543,'user',1,',0,',0,'admin','logout','2015-03-16 15:45:05','','','0'),(544,'user',13,',0,',0,'manager','login','2015-03-16 15:45:11','','','0'),(545,'user',11,',0,',0,'wang','logout','2015-03-16 15:45:42','','','0'),(546,'user',1,',0,',0,'admin','login','2015-03-16 15:45:48','','','0'),(547,'user',13,',0,',0,'manager','logout','2015-03-16 15:46:25','','','0'),(548,'user',1,',0,',0,'admin','login','2015-03-16 15:46:44','','','0'),(549,'user',1,',0,',0,'admin','logout','2015-03-16 15:48:37','','','0'),(550,'user',12,',0,',0,'zhang','login','2015-03-16 15:48:42','','','0'),(551,'user',12,',0,',0,'zhang','logout','2015-03-16 20:20:59','','','0'),(552,'user',14,',0,',0,'jxgl','login','2015-03-16 20:21:09','','','0'),(553,'user',14,',0,',0,'jxgl','logout','2015-03-16 20:33:43','','','0');
/*!40000 ALTER TABLE `tm_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_application`
--

DROP TABLE IF EXISTS `tm_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_application` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(30) NOT NULL,
  `object_id` int(11) NOT NULL,
  `object_name` varchar(255) DEFAULT NULL COMMENT '对象名称,如: 工程名称',
  `action` varchar(50) NOT NULL DEFAULT 'edit' COMMENT '申请操作',
  `applicant` varchar(30) NOT NULL COMMENT '申请人',
  `verified` int(2) DEFAULT '0',
  `verified_by` varchar(30) DEFAULT NULL,
  `verified_date` datetime DEFAULT NULL,
  `remark` text COMMENT '备注',
  `finished` int(2) DEFAULT '0' COMMENT '操作是否结束',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_application`
--

LOCK TABLES `tm_application` WRITE;
/*!40000 ALTER TABLE `tm_application` DISABLE KEYS */;
INSERT INTO `tm_application` VALUES (3,'project',7,NULL,'edit','admin',-1,'admin','2015-02-25 17:55:04',NULL,1,'2015-02-11 15:07:18','2015-02-25 17:55:04'),(4,'material',4,NULL,'edit','admin',0,NULL,NULL,NULL,0,'2015-02-11 16:39:15','2015-02-11 16:39:15'),(5,'machine',1,NULL,'edit','admin',0,NULL,NULL,NULL,0,'2015-02-11 21:19:33','2015-02-11 21:19:33'),(6,'project',6,NULL,'edit','admin',1,'admin','2015-02-25 16:38:59',NULL,0,'2015-02-25 11:11:51','2015-02-25 16:38:59'),(7,'material',5,NULL,'edit','admin',0,NULL,NULL,NULL,0,'2015-02-25 11:14:34','2015-02-25 11:14:34'),(8,'machine',4,NULL,'edit','admin',0,NULL,NULL,NULL,0,'2015-02-25 11:15:24','2015-02-25 11:15:24'),(9,'report',4,'2015-02-17日报','edit','admin',1,'admin','2015-02-25 20:30:12',NULL,0,'2015-02-25 19:37:38','2015-02-25 20:30:12'),(10,'project',9,'八大湖楼盘改造','edit','admin',1,'admin','2015-03-01 12:24:16',NULL,0,'2015-03-01 12:23:26','2015-03-01 12:24:16'),(11,'material',8,'石硝','edit','admin',1,'admin','2015-03-01 12:25:51',NULL,0,'2015-03-01 12:25:37','2015-03-01 12:25:51'),(12,'machine',5,'上海165','edit','admin',1,'admin','2015-03-01 12:45:20',NULL,0,'2015-03-01 12:45:13','2015-03-01 12:45:20'),(13,'project',13,'世园大道道路项目99','edit','admin',1,'admin','2015-03-06 23:11:17',NULL,0,'2015-03-06 23:11:10','2015-03-06 23:11:17'),(14,'report',16,'2015-03-06日报','edit','admin',0,NULL,NULL,NULL,0,'2015-03-06 23:56:50','2015-03-06 23:56:50'),(15,'report',17,'2015-03-07日报','edit','admin',1,'admin','2015-03-07 07:00:12',NULL,0,'2015-03-07 06:59:44','2015-03-07 07:00:12');
/*!40000 ALTER TABLE `tm_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_bug`
--

DROP TABLE IF EXISTS `tm_bug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_bug` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `module` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `plan` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `story` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `storyVersion` smallint(6) NOT NULL DEFAULT '1',
  `task` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `toTask` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `toStory` mediumint(8) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `severity` tinyint(4) NOT NULL DEFAULT '0',
  `pri` tinyint(3) unsigned NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT '',
  `os` varchar(30) NOT NULL DEFAULT '',
  `browser` varchar(30) NOT NULL DEFAULT '',
  `hardware` varchar(30) NOT NULL,
  `found` varchar(30) NOT NULL DEFAULT '',
  `steps` text NOT NULL,
  `status` enum('active','resolved','closed') NOT NULL DEFAULT 'active',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `activatedCount` smallint(6) NOT NULL,
  `mailto` varchar(255) NOT NULL DEFAULT '',
  `openedBy` varchar(30) NOT NULL DEFAULT '',
  `openedDate` datetime NOT NULL,
  `openedBuild` varchar(255) NOT NULL,
  `assignedTo` varchar(30) NOT NULL DEFAULT '',
  `assignedDate` datetime NOT NULL,
  `resolvedBy` varchar(30) NOT NULL DEFAULT '',
  `resolution` varchar(30) NOT NULL DEFAULT '',
  `resolvedBuild` varchar(30) NOT NULL DEFAULT '',
  `resolvedDate` datetime NOT NULL,
  `closedBy` varchar(30) NOT NULL DEFAULT '',
  `closedDate` datetime NOT NULL,
  `duplicateBug` mediumint(8) unsigned NOT NULL,
  `linkBug` varchar(255) NOT NULL,
  `case` mediumint(8) unsigned NOT NULL,
  `caseVersion` smallint(6) NOT NULL DEFAULT '1',
  `result` mediumint(8) unsigned NOT NULL,
  `testtask` mediumint(8) unsigned NOT NULL,
  `lastEditedBy` varchar(30) NOT NULL DEFAULT '',
  `lastEditedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_bug`
--

LOCK TABLES `tm_bug` WRITE;
/*!40000 ALTER TABLE `tm_bug` DISABLE KEYS */;
INSERT INTO `tm_bug` VALUES (1,1,8,1,0,1,1,1,0,0,'首页页面问题','',3,0,'interface','','','','','<p>[步骤]进入首页</p>\r\n<p>[结果]出现乱码&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>[期望]正常显示</p>','active',0,0,'','tester1','2012-06-05 10:56:11','trunk','dev1','2012-06-05 10:56:11','','','','0000-00-00 00:00:00','','0000-00-00 00:00:00',0,'',0,1,0,0,'','0000-00-00 00:00:00','0'),(2,1,9,1,0,2,1,4,0,0,'新闻中心页面问题','',3,0,'codeerror','','','','','<p>[步骤]进入新闻中心</p>\r\n<p>[结果]页面出现乱码</p>\r\n<p>[期望]正常显示</p>','active',0,0,'','tester1','2012-06-05 10:57:11','trunk','dev2','2012-06-05 10:57:11','','','','0000-00-00 00:00:00','','0000-00-00 00:00:00',0,'',0,1,0,0,'','0000-00-00 00:00:00','0'),(3,1,10,1,0,3,2,6,0,0,'成果展示页面问题','',3,0,'codeerror','','','','','<p>[步骤]进入成果展示&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n<p>[结果]乱码</p>\r\n<p>[期望]正常显示</p>','active',0,0,'','tester2','2012-06-05 10:58:22','trunk','dev3','2012-06-05 10:58:22','','','','0000-00-00 00:00:00','','0000-00-00 00:00:00',0,'',0,1,0,0,'','0000-00-00 00:00:00','0'),(4,1,11,1,0,4,1,9,0,0,'售后服务页面问题','',3,0,'codeerror','','','','','<p>[步骤]进入售后服务</p>\r\n<p>[结果]乱码</p>\r\n<p>[期望]正常显示</p>','active',0,0,'','tester3','2012-06-05 11:00:19','trunk','dev1','2012-06-05 11:00:19','','','','0000-00-00 00:00:00','','0000-00-00 00:00:00',0,'',0,1,0,0,'','0000-00-00 00:00:00','0');
/*!40000 ALTER TABLE `tm_bug` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_build`
--

DROP TABLE IF EXISTS `tm_build`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_build` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` char(150) NOT NULL,
  `scmPath` char(255) NOT NULL,
  `filePath` char(255) NOT NULL,
  `date` date NOT NULL,
  `stories` text NOT NULL,
  `bugs` text NOT NULL,
  `builder` char(30) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_build`
--

LOCK TABLES `tm_build` WRITE;
/*!40000 ALTER TABLE `tm_build` DISABLE KEYS */;
INSERT INTO `tm_build` VALUES (1,1,1,'第一期版本','','','2012-06-05','3,2,1,4','','projectManager','','0');
/*!40000 ALTER TABLE `tm_build` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_burn`
--

DROP TABLE IF EXISTS `tm_burn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_burn` (
  `project` mediumint(8) unsigned NOT NULL,
  `date` date NOT NULL,
  `left` float NOT NULL,
  `consumed` float NOT NULL,
  PRIMARY KEY (`project`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_burn`
--

LOCK TABLES `tm_burn` WRITE;
/*!40000 ALTER TABLE `tm_burn` DISABLE KEYS */;
INSERT INTO `tm_burn` VALUES (1,'2012-06-05',0,38);
/*!40000 ALTER TABLE `tm_burn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_case`
--

DROP TABLE IF EXISTS `tm_case`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_case` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `module` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `path` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `story` mediumint(30) unsigned NOT NULL DEFAULT '0',
  `storyVersion` smallint(6) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL,
  `precondition` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `pri` tinyint(3) unsigned NOT NULL DEFAULT '3',
  `type` char(30) NOT NULL DEFAULT '1',
  `stage` varchar(255) NOT NULL,
  `howRun` varchar(30) NOT NULL,
  `scriptedBy` varchar(30) NOT NULL,
  `scriptedDate` date NOT NULL,
  `scriptStatus` varchar(30) NOT NULL,
  `scriptLocation` varchar(255) NOT NULL,
  `status` char(30) NOT NULL DEFAULT '1',
  `frequency` enum('1','2','3') NOT NULL DEFAULT '1',
  `order` tinyint(30) unsigned NOT NULL DEFAULT '0',
  `openedBy` char(30) NOT NULL DEFAULT '',
  `openedDate` datetime NOT NULL,
  `lastEditedBy` char(30) NOT NULL DEFAULT '',
  `lastEditedDate` datetime NOT NULL,
  `version` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `linkCase` varchar(255) NOT NULL,
  `fromBug` mediumint(8) unsigned NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  `lastRunner` varchar(30) NOT NULL,
  `lastRunDate` datetime NOT NULL,
  `lastRunResult` char(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_case`
--

LOCK TABLES `tm_case` WRITE;
/*!40000 ALTER TABLE `tm_case` DISABLE KEYS */;
INSERT INTO `tm_case` VALUES (1,1,0,0,4,1,'售后服务的测试用例','','',1,'feature','feature','','','0000-00-00','','','normal','1',0,'tester3','2012-06-05 11:02:18','tester3','2012-06-05 11:02:46',1,'',0,'0','testManager','2012-06-05 11:11:00','pass'),(2,1,0,0,1,1,'首页的测试用例','','',3,'feature','','','','0000-00-00','','','normal','1',0,'tester1','2012-06-05 11:03:28','','0000-00-00 00:00:00',1,'',0,'0','testManager','2012-06-05 11:11:05','pass'),(3,1,0,0,2,1,'新闻中心的测试用例','','',3,'feature','feature','','','0000-00-00','','','normal','1',0,'tester1','2012-06-05 11:03:54','','0000-00-00 00:00:00',1,'',0,'0','testManager','2012-06-05 11:11:07','pass'),(4,1,0,0,3,2,'成果展示测试用例','','',3,'feature','feature','','','0000-00-00','','','normal','1',0,'tester2','2012-06-05 11:04:48','','0000-00-00 00:00:00',1,'',0,'0','testManager','2012-06-05 11:11:08','pass');
/*!40000 ALTER TABLE `tm_case` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_casestep`
--

DROP TABLE IF EXISTS `tm_casestep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_casestep` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `case` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `version` smallint(3) unsigned NOT NULL DEFAULT '0',
  `desc` text NOT NULL,
  `expect` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `case` (`case`,`version`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_casestep`
--

LOCK TABLES `tm_casestep` WRITE;
/*!40000 ALTER TABLE `tm_casestep` DISABLE KEYS */;
INSERT INTO `tm_casestep` VALUES (1,1,1,'进入首页','正常显示'),(2,2,1,'进入首页','正常显示'),(3,3,1,'进入新闻中心','正常显示'),(4,4,1,'进入成果展示','正常显示');
/*!40000 ALTER TABLE `tm_casestep` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_company`
--

DROP TABLE IF EXISTS `tm_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_company` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(120) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `fax` char(20) DEFAULT NULL,
  `address` char(120) DEFAULT NULL,
  `zipcode` char(10) DEFAULT NULL,
  `website` char(120) DEFAULT NULL,
  `backyard` char(120) DEFAULT NULL,
  `guest` enum('1','0') NOT NULL DEFAULT '0',
  `admins` char(255) DEFAULT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_company`
--

LOCK TABLES `tm_company` WRITE;
/*!40000 ALTER TABLE `tm_company` DISABLE KEYS */;
INSERT INTO `tm_company` VALUES (1,'三星工程','','','','','','','0',',admin,','0');
/*!40000 ALTER TABLE `tm_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_config`
--

DROP TABLE IF EXISTS `tm_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_config` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `owner` char(30) NOT NULL DEFAULT '',
  `module` varchar(30) NOT NULL,
  `section` char(30) NOT NULL DEFAULT '',
  `key` char(30) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`owner`,`module`,`section`,`key`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_config`
--

LOCK TABLES `tm_config` WRITE;
/*!40000 ALTER TABLE `tm_config` DISABLE KEYS */;
INSERT INTO `tm_config` VALUES (1,'system','common','global','showDemoUsers','1'),(2,'system','common','global','version','6.4'),(3,'system','common','global','flow','full'),(4,'system','common','global','sn','1917d5dfc5bef1d296c0847f89d5d73c');
/*!40000 ALTER TABLE `tm_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_daily`
--

DROP TABLE IF EXISTS `tm_daily`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_daily` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_daily`
--

LOCK TABLES `tm_daily` WRITE;
/*!40000 ALTER TABLE `tm_daily` DISABLE KEYS */;
INSERT INTO `tm_daily` VALUES (1,8,'2015-02-12','admin','2015-02-12 07:22:08','2015-02-12 07:22:08'),(3,8,'2015-02-17','admin','2015-02-17 05:57:58','2015-02-17 05:57:58'),(4,9,'2015-03-01','admin','2015-03-01 12:37:53','2015-03-01 12:37:53'),(5,7,'2015-03-01','admin','2015-03-01 12:38:03','2015-03-01 12:38:03'),(6,9,'2015-03-02','admin','2015-03-02 11:44:25','2015-03-02 11:44:25'),(7,6,'2015-03-02','admin','2015-03-02 21:51:03','2015-03-02 21:51:03'),(8,16,'2015-03-06','admin','2015-03-06 23:34:28','2015-03-06 23:34:28'),(9,17,'2015-03-07','admin','2015-03-07 06:57:35','2015-03-07 06:57:35'),(10,17,'2015-03-06','admin','2015-03-07 07:03:39','2015-03-07 07:03:39'),(11,18,'2015-03-07','admin','2015-03-07 09:05:08','2015-03-07 09:05:08'),(12,18,'2015-03-06','admin','2015-03-07 09:08:28','2015-03-07 09:08:28'),(13,18,'2015-03-10','admin','2015-03-10 20:34:34','2015-03-10 20:34:34'),(14,18,'2015-03-16','admin','2015-03-16 15:03:23','2015-03-16 15:03:23');
/*!40000 ALTER TABLE `tm_daily` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_dept`
--

DROP TABLE IF EXISTS `tm_dept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_dept` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(60) NOT NULL,
  `parent` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `path` char(255) NOT NULL DEFAULT '',
  `grade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `position` char(30) NOT NULL DEFAULT '',
  `function` char(255) NOT NULL DEFAULT '',
  `manager` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_dept`
--

LOCK TABLES `tm_dept` WRITE;
/*!40000 ALTER TABLE `tm_dept` DISABLE KEYS */;
INSERT INTO `tm_dept` VALUES (1,'经理',0,',1,',1,0,'','',''),(2,'财务部门',0,',2,',1,0,'','',''),(3,'机械部',0,',3,',1,0,'','',''),(6,'项目',0,',6,',1,0,'','','projectManager');
/*!40000 ALTER TABLE `tm_dept` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_doc`
--

DROP TABLE IF EXISTS `tm_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_doc` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL,
  `project` mediumint(8) unsigned NOT NULL,
  `lib` varchar(30) NOT NULL,
  `module` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `digest` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `views` smallint(5) unsigned NOT NULL,
  `addedBy` varchar(30) NOT NULL,
  `addedDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_doc`
--

LOCK TABLES `tm_doc` WRITE;
/*!40000 ALTER TABLE `tm_doc` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_doc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_doclib`
--

DROP TABLE IF EXISTS `tm_doclib`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_doclib` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_doclib`
--

LOCK TABLES `tm_doclib` WRITE;
/*!40000 ALTER TABLE `tm_doclib` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_doclib` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_effort`
--

DROP TABLE IF EXISTS `tm_effort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_effort` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user` char(30) NOT NULL DEFAULT '',
  `todo` enum('1','0') NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `begin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` enum('1','2','3') NOT NULL DEFAULT '1',
  `idvalue` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` char(30) NOT NULL DEFAULT '',
  `desc` char(255) NOT NULL DEFAULT '',
  `status` enum('1','2','3') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_effort`
--

LOCK TABLES `tm_effort` WRITE;
/*!40000 ALTER TABLE `tm_effort` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_effort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_extension`
--

DROP TABLE IF EXISTS `tm_extension`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_extension` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `code` varchar(30) NOT NULL,
  `version` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `license` text NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'extension',
  `site` varchar(150) NOT NULL,
  `zentaoCompatible` varchar(100) NOT NULL,
  `installedTime` datetime NOT NULL,
  `depends` varchar(100) NOT NULL,
  `dirs` text NOT NULL,
  `files` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `name` (`name`),
  KEY `addedTime` (`installedTime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_extension`
--

LOCK TABLES `tm_extension` WRITE;
/*!40000 ALTER TABLE `tm_extension` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_extension` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_file`
--

DROP TABLE IF EXISTS `tm_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_file` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pathname` char(50) NOT NULL,
  `title` char(90) NOT NULL,
  `extension` char(30) NOT NULL,
  `size` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `objectType` char(30) NOT NULL,
  `objectID` mediumint(9) NOT NULL,
  `addedBy` char(30) NOT NULL DEFAULT '',
  `addedDate` datetime NOT NULL,
  `downloads` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `extra` varchar(255) NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_file`
--

LOCK TABLES `tm_file` WRITE;
/*!40000 ALTER TABLE `tm_file` DISABLE KEYS */;
INSERT INTO `tm_file` VALUES (1,'201502/0818004505411ugv.sql','mysql_examples11','sql',926,'project',8,'admin','2015-02-08 00:00:00',0,'','0'),(2,'201502/08180045178210lu.doc','新建 Microsoft Word 文档11','doc',20992,'project',8,'admin','2015-02-08 00:00:00',0,'','0'),(3,'201502/0818223403821ugv.doc','新建 Microsoft Word 文档','doc',20992,'project',0,'admin','2015-02-08 00:00:00',0,'','0'),(4,'201502/0818234503215gvs.doc','新建 Microsoft Word 文档','doc',20992,'project',7,'admin','2015-02-08 00:00:00',0,'','0'),(5,'201503/062305490532417.xlsx','1月在家监测记录表','xlsx',22143,'project',12,'admin','2015-03-06 00:00:00',0,'','0'),(6,'201503/0623113406454r2o.xlsx','1月在家监测记录表','xlsx',22143,'project',13,'admin','2015-03-06 00:00:00',0,'','0'),(7,'201503/0623212008230p49.xlsx','1月在家监测记录表','xlsx',22143,'project',14,'admin','2015-03-06 00:00:00',0,'','0'),(8,'201503/0623273405702mu0.png','0623273405702mu0.png','png',1625,'',0,'admin','2015-03-06 00:00:00',0,'','0'),(9,'201503/0623273403921mu0.png','0623273403921mu0.png','png',1625,'',0,'admin','2015-03-06 00:00:00',0,'','0'),(10,'201503/0623273419679u0v.png','0623273419679u0v.png','png',1625,'',0,'admin','2015-03-06 00:00:00',0,'','0'),(11,'201503/0623273404935p49.png','0623273404935p49.png','png',1625,'',0,'admin','2015-03-06 00:00:00',0,'','0'),(12,'201503/0623292803764ta4.png','0623292803764ta4.png','png',1625,'',0,'admin','2015-03-06 00:00:00',0,'','0'),(13,'201503/062329280344191d.png','062329280344191d.png','png',1625,'',0,'admin','2015-03-06 00:00:00',0,'','0'),(14,'201503/06232929081030pt.xlsx','1月在家监测记录表','xlsx',22143,'project',16,'admin','2015-03-06 00:00:00',0,'','0'),(15,'201503/07064856012303tl.xlsx','1月在家监测记录表','xlsx',22143,'project',17,'admin','2015-03-07 00:00:00',0,'','0'),(16,'201503/07085825095241ml.xlsx','1月在家监测记录表','xlsx',22143,'project',18,'admin','2015-03-07 00:00:00',0,'','0'),(17,'201503/0708582519871jvl.xlsx','1月在家监测记录表','xlsx',22143,'project',18,'admin','2015-03-07 00:00:00',0,'','0');
/*!40000 ALTER TABLE `tm_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_financial`
--

DROP TABLE IF EXISTS `tm_financial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_financial` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `applicationdetail_id` int(11) NOT NULL,
  `price` float(11,2) NOT NULL DEFAULT '0.00' COMMENT '单价',
  `remark` text,
  `verified` int(2) NOT NULL DEFAULT '0',
  `verified_by` varchar(30) DEFAULT NULL,
  `distributed` int(2) DEFAULT '0' COMMENT '分配到项目',
  `deleted` int(2) DEFAULT '0',
  `created_by` varchar(30) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_financial`
--

LOCK TABLES `tm_financial` WRITE;
/*!40000 ALTER TABLE `tm_financial` DISABLE KEYS */;
INSERT INTO `tm_financial` VALUES (1,1,6,3,1,1000.00,'&lt;p&gt;备注备注备注备注备注&lt;/p&gt;\r\n&lt;p&gt;备注备注&lt;/p&gt;\r\n&lt;p&gt;备注备注备注备注备注备注备注&lt;/p&gt;',0,NULL,0,0,'admin','2015-02-07 19:02:23','2015-02-07 19:02:23'),(2,3,5,4,5,100.00,'',0,NULL,0,0,'admin','2015-02-07 20:10:38','2015-02-07 20:10:38');
/*!40000 ALTER TABLE `tm_financial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_group`
--

DROP TABLE IF EXISTS `tm_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `role` char(30) NOT NULL DEFAULT '',
  `desc` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_group`
--

LOCK TABLES `tm_group` WRITE;
/*!40000 ALTER TABLE `tm_group` DISABLE KEYS */;
INSERT INTO `tm_group` VALUES (1,'Administrator','admin','for administrator'),(14,'机械管理','',''),(15,'工程上报','',''),(16,'材料管理','',''),(17,'统计管理','',''),(18,'权限管理','',''),(12,'财务管理','','财务部门'),(13,'工程管理/日报审核','','');
/*!40000 ALTER TABLE `tm_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_grouppriv`
--

DROP TABLE IF EXISTS `tm_grouppriv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_grouppriv` (
  `group` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `module` char(30) NOT NULL DEFAULT '',
  `method` char(30) NOT NULL DEFAULT '',
  UNIQUE KEY `group` (`group`,`module`,`method`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_grouppriv`
--

LOCK TABLES `tm_grouppriv` WRITE;
/*!40000 ALTER TABLE `tm_grouppriv` DISABLE KEYS */;
INSERT INTO `tm_grouppriv` VALUES (1,'action','editComment'),(1,'action','hideAll'),(1,'action','hideOne'),(1,'action','trash'),(1,'action','undelete'),(1,'admin','checkDB'),(1,'admin','index'),(1,'api','debug'),(1,'api','getModel'),(1,'bug','activate'),(1,'bug','assignTo'),(1,'bug','batchClose'),(1,'bug','batchConfirm'),(1,'bug','batchCreate'),(1,'bug','batchEdit'),(1,'bug','batchResolve'),(1,'bug','browse'),(1,'bug','close'),(1,'bug','confirmBug'),(1,'bug','confirmStoryChange'),(1,'bug','create'),(1,'bug','delete'),(1,'bug','deleteTemplate'),(1,'bug','edit'),(1,'bug','export'),(1,'bug','index'),(1,'bug','report'),(1,'bug','resolve'),(1,'bug','saveTemplate'),(1,'bug','view'),(1,'build','create'),(1,'build','delete'),(1,'build','edit'),(1,'build','view'),(1,'company','browse'),(1,'company','dynamic'),(1,'company','edit'),(1,'company','index'),(1,'company','view'),(1,'convert','checkBugFree'),(1,'convert','checkConfig'),(1,'convert','checkRedmine'),(1,'convert','convertBugFree'),(1,'convert','convertRedmine'),(1,'convert','execute'),(1,'convert','index'),(1,'convert','selectSource'),(1,'convert','setBugfree'),(1,'convert','setConfig'),(1,'convert','setRedmine'),(1,'custom','index'),(1,'custom','restore'),(1,'custom','set'),(1,'dept','browse'),(1,'dept','delete'),(1,'dept','manageChild'),(1,'dept','updateOrder'),(1,'doc','browse'),(1,'doc','create'),(1,'doc','createLib'),(1,'doc','delete'),(1,'doc','deleteLib'),(1,'doc','edit'),(1,'doc','editLib'),(1,'doc','index'),(1,'doc','view'),(1,'editor','delete'),(1,'editor','edit'),(1,'editor','extend'),(1,'editor','index'),(1,'editor','newPage'),(1,'editor','save'),(1,'extension','activate'),(1,'extension','browse'),(1,'extension','deactivate'),(1,'extension','erase'),(1,'extension','install'),(1,'extension','obtain'),(1,'extension','structure'),(1,'extension','uninstall'),(1,'extension','upgrade'),(1,'extension','upload'),(1,'file','delete'),(1,'file','download'),(1,'file','edit'),(1,'git','apiSync'),(1,'git','cat'),(1,'git','diff'),(1,'group','browse'),(1,'group','copy'),(1,'group','create'),(1,'group','delete'),(1,'group','edit'),(1,'group','manageMember'),(1,'group','managePriv'),(1,'index','index'),(1,'mail','detect'),(1,'mail','edit'),(1,'mail','index'),(1,'mail','reset'),(1,'mail','save'),(1,'mail','test'),(1,'misc','ping'),(1,'my','bug'),(1,'my','changePassword'),(1,'my','dynamic'),(1,'my','editProfile'),(1,'my','index'),(1,'my','profile'),(1,'my','project'),(1,'my','story'),(1,'my','task'),(1,'my','testCase'),(1,'my','testTask'),(1,'my','todo'),(1,'product','batchEdit'),(1,'product','browse'),(1,'product','close'),(1,'product','create'),(1,'product','delete'),(1,'product','doc'),(1,'product','dynamic'),(1,'product','edit'),(1,'product','index'),(1,'product','order'),(1,'product','project'),(1,'product','roadmap'),(1,'product','view'),(1,'productplan','batchUnlinkBug'),(1,'productplan','batchUnlinkStory'),(1,'productplan','browse'),(1,'productplan','create'),(1,'productplan','delete'),(1,'productplan','edit'),(1,'productplan','linkBug'),(1,'productplan','linkStory'),(1,'productplan','unlinkBug'),(1,'productplan','unlinkStory'),(1,'productplan','view'),(1,'project','activate'),(1,'project','batchedit'),(1,'project','browse'),(1,'project','bug'),(1,'project','build'),(1,'project','burn'),(1,'project','burnData'),(1,'project','close'),(1,'project','computeBurn'),(1,'project','create'),(1,'project','delete'),(1,'project','doc'),(1,'project','dynamic'),(1,'project','edit'),(1,'project','grouptask'),(1,'project','importBug'),(1,'project','importtask'),(1,'project','index'),(1,'project','linkStory'),(1,'project','manageMembers'),(1,'project','manageProducts'),(1,'project','order'),(1,'project','putoff'),(1,'project','start'),(1,'project','story'),(1,'project','suspend'),(1,'project','task'),(1,'project','team'),(1,'project','testtask'),(1,'project','unlinkMember'),(1,'project','unlinkStory'),(1,'project','view'),(1,'qa','index'),(1,'release','browse'),(1,'release','create'),(1,'release','delete'),(1,'release','edit'),(1,'release','export'),(1,'release','view'),(1,'report','bugAssign'),(1,'report','bugSummary'),(1,'report','index'),(1,'report','productInfo'),(1,'report','projectDeviation'),(1,'report','workload'),(1,'search','buildForm'),(1,'search','buildQuery'),(1,'search','deleteQuery'),(1,'search','saveQuery'),(1,'search','select'),(1,'story','activate'),(1,'story','batchChangePlan'),(1,'story','batchChangeStage'),(1,'story','batchClose'),(1,'story','batchCreate'),(1,'story','batchEdit'),(1,'story','batchReview'),(1,'story','change'),(1,'story','close'),(1,'story','create'),(1,'story','delete'),(1,'story','edit'),(1,'story','export'),(1,'story','report'),(1,'story','review'),(1,'story','tasks'),(1,'story','view'),(1,'story','zeroCase'),(1,'svn','apiSync'),(1,'svn','cat'),(1,'svn','diff'),(1,'task','activate'),(1,'task','assignTo'),(1,'task','batchClose'),(1,'task','batchCreate'),(1,'task','batchEdit'),(1,'task','cancel'),(1,'task','close'),(1,'task','confirmStoryChange'),(1,'task','create'),(1,'task','delete'),(1,'task','deleteEstimate'),(1,'task','edit'),(1,'task','editEstimate'),(1,'task','export'),(1,'task','finish'),(1,'task','pause'),(1,'task','recordEstimate'),(1,'task','report'),(1,'task','restart'),(1,'task','start'),(1,'task','view'),(1,'testcase','batchCreate'),(1,'testcase','batchEdit'),(1,'testcase','browse'),(1,'testcase','confirmChange'),(1,'testcase','confirmStoryChange'),(1,'testcase','create'),(1,'testcase','createBug'),(1,'testcase','delete'),(1,'testcase','edit'),(1,'testcase','export'),(1,'testcase','exportTemplet'),(1,'testcase','groupCase'),(1,'testcase','import'),(1,'testcase','index'),(1,'testcase','showImport'),(1,'testcase','view'),(1,'testtask','batchAssign'),(1,'testtask','batchRun'),(1,'testtask','browse'),(1,'testtask','cases'),(1,'testtask','close'),(1,'testtask','create'),(1,'testtask','delete'),(1,'testtask','edit'),(1,'testtask','groupCase'),(1,'testtask','index'),(1,'testtask','linkcase'),(1,'testtask','results'),(1,'testtask','runcase'),(1,'testtask','start'),(1,'testtask','unlinkcase'),(1,'testtask','view'),(1,'todo','batchCreate'),(1,'todo','batchEdit'),(1,'todo','batchFinish'),(1,'todo','create'),(1,'todo','delete'),(1,'todo','edit'),(1,'todo','export'),(1,'todo','finish'),(1,'todo','import2Today'),(1,'todo','view'),(1,'tree','browse'),(1,'tree','browseTask'),(1,'tree','delete'),(1,'tree','edit'),(1,'tree','fix'),(1,'tree','manageChild'),(1,'tree','updateOrder'),(1,'user','batchCreate'),(1,'user','batchEdit'),(1,'user','bug'),(1,'user','create'),(1,'user','delete'),(1,'user','deleteContacts'),(1,'user','dynamic'),(1,'user','edit'),(1,'user','manageContacts'),(1,'user','profile'),(1,'user','project'),(1,'user','story'),(1,'user','task'),(1,'user','testCase'),(1,'user','testTask'),(1,'user','todo'),(1,'user','unlock'),(1,'user','view'),(12,'doc','browse'),(12,'doc','create'),(12,'doc','createLib'),(12,'doc','delete'),(12,'doc','deleteLib'),(12,'doc','edit'),(12,'doc','editLib'),(12,'doc','index'),(12,'doc','view'),(12,'financial','index'),(12,'financial','verify'),(12,'index','index'),(12,'my','changePassword'),(12,'my','editProfile'),(12,'my','index'),(12,'my','myProject'),(12,'my','profile'),(13,'dailyreview','index'),(13,'dailyreview','problemreview'),(13,'dailyreview','reportreview'),(13,'dailyreview','testationreview'),(13,'index','index'),(13,'my','changePassword'),(13,'my','editProfile'),(13,'my','index'),(13,'my','profile'),(13,'my','project'),(13,'project','create'),(13,'project','delete'),(13,'project','edit'),(13,'project','index'),(13,'project','view'),(14,'index','index'),(14,'machine','create'),(14,'machine','delete'),(14,'machine','distribute'),(14,'machine','edit'),(14,'machine','index'),(14,'my','changePassword'),(14,'my','editProfile'),(14,'my','index'),(14,'my','profile'),(14,'my','project'),(15,'index','index'),(15,'my','changePassword'),(15,'my','editProfile'),(15,'my','index'),(15,'my','profile'),(15,'my','project'),(15,'project','view'),(15,'report','create'),(15,'report','createproblem'),(15,'report','createtestation'),(15,'report','edit'),(15,'report','history'),(15,'report','historyproblem'),(15,'report','historytestation'),(15,'report','index'),(15,'report','show'),(15,'report','showproblem'),(15,'report','showtestation'),(16,'index','index'),(16,'material','apply'),(16,'material','create'),(16,'material','delete'),(16,'material','edit'),(16,'material','index'),(16,'my','changePassword'),(16,'my','editProfile'),(16,'my','index'),(16,'my','profile'),(16,'my','project'),(17,'index','index'),(17,'my','changePassword'),(17,'my','editProfile'),(17,'my','index'),(17,'my','profile'),(17,'my','project'),(17,'statistics','index'),(17,'statistics','reportlist'),(17,'statistics','viewtotal'),(18,'company','browse'),(18,'company','dynamic'),(18,'company','edit'),(18,'company','index'),(18,'company','view'),(18,'dept','browse'),(18,'dept','delete'),(18,'dept','edit'),(18,'dept','manageChild'),(18,'dept','updateOrder'),(18,'group','browse'),(18,'group','copy'),(18,'group','create'),(18,'group','delete'),(18,'group','edit'),(18,'group','manageMember'),(18,'group','managePriv'),(18,'machine','create'),(18,'machine','delete'),(18,'machine','distribute'),(18,'machine','edit'),(18,'machine','index'),(18,'user','batchCreate'),(18,'user','batchEdit'),(18,'user','bug'),(18,'user','create'),(18,'user','delete'),(18,'user','deleteContacts'),(18,'user','dynamic'),(18,'user','edit'),(18,'user','manageContacts'),(18,'user','profile'),(18,'user','project'),(18,'user','story'),(18,'user','task'),(18,'user','testCase'),(18,'user','testTask'),(18,'user','todo'),(18,'user','unlock'),(18,'user','view');
/*!40000 ALTER TABLE `tm_grouppriv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_history`
--

DROP TABLE IF EXISTS `tm_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_history` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `action` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `field` varchar(30) NOT NULL DEFAULT '',
  `old` text NOT NULL,
  `new` text NOT NULL,
  `diff` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_history`
--

LOCK TABLES `tm_history` WRITE;
/*!40000 ALTER TABLE `tm_history` DISABLE KEYS */;
INSERT INTO `tm_history` VALUES (1,14,'version','1','2',''),(2,14,'spec','&nbsp;作为一名本公司的用户，我希望可以在成果展示看到该公司网站的企业新闻，这样可以方便我进行了解该公司的产品并进行购买。&nbsp;<br />','&nbsp;作为一名本公司的用户，我希望可以在成果展示看到该公司网站的吹产品，这样可以方便我进行了解该公司的产品并进行购买。&nbsp;<br />','001- <del>作为一名本公司的用户，我希望可以在成果展示看到该公司网站的企业新闻，这样可以方便我进行了解该公司的产品并进行购买。<br /></del>\n001+ <ins>作为一名本公司的用户，我希望可以在成果展示看到该公司网站的吹产品，这样可以方便我进行了解该公司的产品并进行购买。<br /></ins>'),(3,41,'consumed','0','1',''),(4,41,'status','wait','doing',''),(6,42,'consumed','1','7',''),(7,42,'left','10','0',''),(8,42,'assignedTo','dev1','projectManager',''),(9,42,'status','doing','done',''),(10,42,'finishedBy','','dev1',''),(11,42,'finishedDate','','2012-06-05 10:38:00',''),(13,43,'consumed','0','6',''),(14,43,'left','8','0',''),(15,43,'assignedTo','dev1','projectManager',''),(16,43,'status','wait','done',''),(17,43,'finishedBy','','dev1',''),(18,43,'finishedDate','','2012-06-05 10:39:14',''),(20,44,'canceledDate','2012-06-05 10:41:12','2012-06-05 10:41:20',''),(21,45,'canceledDate','2012-06-05 10:41:12','2012-06-05 10:41:20',''),(22,46,'canceledDate','2012-06-05 10:41:12','2012-06-05 10:41:20',''),(23,47,'closedDate','2012-06-05 10:41:12','2012-06-05 10:41:20',''),(24,48,'closedDate','2012-06-05 10:41:12','2012-06-05 10:41:20',''),(25,49,'closedDate','2012-06-05 10:41:12','2012-06-05 10:41:20',''),(26,50,'closedDate','2012-06-05 10:41:12','2012-06-05 10:41:20',''),(27,51,'status','wait','done',''),(28,51,'consumed','0','8',''),(29,51,'left','10','0',''),(30,51,'finishedBy','','dev1',''),(31,51,'finishedDate','','2012-06-05 10:41:20',''),(32,52,'finishedDate','2012-06-05 10:38:00','2012-06-05 10:41:20',''),(33,55,'status','closed','done',''),(34,55,'consumed','0','5',''),(35,55,'left','8','0',''),(36,55,'finishedBy','','dev2',''),(37,55,'closedBy','dev1','',''),(38,55,'closedReason','done','',''),(39,55,'finishedDate','','2012-06-05 10:42:56',''),(40,55,'closedDate','2012-06-05 10:41:20','',''),(41,56,'status','closed','done',''),(42,56,'consumed','0','8',''),(43,56,'left','8','0',''),(44,56,'finishedBy','','dev2',''),(45,56,'closedBy','dev1','',''),(46,56,'closedReason','done','',''),(47,56,'finishedDate','','2012-06-05 10:42:56',''),(48,56,'closedDate','2012-06-05 10:41:20','',''),(49,59,'status','closed','done',''),(50,59,'consumed','0','5',''),(51,59,'left','8','0',''),(52,59,'finishedBy','dev1','dev3',''),(53,59,'closedBy','dev1','',''),(54,59,'closedReason','done','',''),(55,59,'finishedDate','','2012-06-05 10:43:32',''),(56,59,'closedDate','2012-06-05 10:41:20','',''),(57,60,'status','closed','done',''),(58,60,'consumed','0','5',''),(59,60,'left','8','0',''),(60,60,'finishedBy','dev1','dev3',''),(61,60,'closedBy','dev1','',''),(62,60,'closedReason','done','',''),(63,60,'finishedDate','','2012-06-05 10:43:32',''),(64,60,'closedDate','2012-06-05 10:41:20','',''),(65,82,'title','首页的测试用例','售后服务的测试用例','001- <del>首页的测试用例</del>\n001+ <ins>售后服务的测试用例</ins>'),(66,82,'story','1','4',''),(67,93,'build','','trunk',''),(68,277,'fileName','mysql_examples.sql','mysql_examples11.sql',''),(69,278,'fileName','新建 Microsoft Word 文档.doc','新建 Microsoft Word 文档11.doc','');
/*!40000 ALTER TABLE `tm_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_lang`
--

DROP TABLE IF EXISTS `tm_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_lang` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(30) NOT NULL,
  `module` varchar(30) NOT NULL,
  `section` varchar(30) NOT NULL,
  `key` varchar(60) NOT NULL,
  `value` text NOT NULL,
  `system` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `lang` (`lang`,`module`,`section`,`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_lang`
--

LOCK TABLES `tm_lang` WRITE;
/*!40000 ALTER TABLE `tm_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_machine`
--

DROP TABLE IF EXISTS `tm_machine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type_id` int(11) NOT NULL COMMENT 'tm_machinetype表',
  `owner` varchar(100) DEFAULT NULL COMMENT '负责人/租赁方',
  `is_rent` int(2) NOT NULL DEFAULT '0' COMMENT '0: 本公司机械; 1: 租赁机械',
  `rend_fee` float(10,2) DEFAULT '0.00' COMMENT '租赁费用',
  `deleted` int(2) NOT NULL DEFAULT '0' COMMENT '0: 未删除; 1: 已删除',
  `created_by` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_machine`
--

LOCK TABLES `tm_machine` WRITE;
/*!40000 ALTER TABLE `tm_machine` DISABLE KEYS */;
INSERT INTO `tm_machine` VALUES (1,'1001','PC450',1,'--',0,0.00,0,'admin','2015-01-30 16:26:09','2015-01-30 16:26:09'),(2,'1002','PC300',1,'--',1,0.00,0,'admin','2015-01-30 17:01:02','2015-01-30 17:01:02'),(3,'1003','PC240',1,'--',0,0.00,0,'admin','2015-02-07 00:17:17','2015-02-07 00:17:17'),(4,'1004','PC128',1,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(5,'1005','上海165',2,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(6,'1005','上海165',2,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(7,'1006','上海165',2,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(8,'1007','上海160',2,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(9,'1008','上海160',2,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(10,'1009','徐工60T',3,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(11,'1010','徐工50T',3,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(12,'1011','山工60T',3,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(13,'1012','190',4,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(14,'1013','7762',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(15,'1014','7852',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(16,'1015','7891',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(17,'1016','7892',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(18,'1017','9397',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(19,'1018','70782',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(20,'1019','70788',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(21,'1020','70733',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(22,'1021','79598',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(23,'1022','79560',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(24,'1023','79562',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(25,'1024','79887',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(26,'1025','70785',5,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(27,'1026','厦工50',6,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(28,'1027','厦工50',6,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(29,'1028','山工50',6,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(30,'1029','山工50',6,'--',0,0.00,0,'admin','2015-02-07 00:25:47','2015-02-07 00:25:47'),(31,'','挖掘机',1,'李师傅',1,0.00,0,'admin','2015-03-07 09:14:32','2015-03-07 09:14:32');
/*!40000 ALTER TABLE `tm_machine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_machinedistribution`
--

DROP TABLE IF EXISTS `tm_machinedistribution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_machinedistribution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `begin` datetime DEFAULT NULL COMMENT '开始时间',
  `end` datetime DEFAULT NULL COMMENT '结束时间',
  `verified` int(11) NOT NULL COMMENT '0: 未处理; 1: 通过审核 -1: 拒绝',
  `verified_by` varchar(30) NOT NULL COMMENT '审核者，用户名',
  `deleted` int(2) DEFAULT '0',
  `created_by` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_machinedistribution`
--

LOCK TABLES `tm_machinedistribution` WRITE;
/*!40000 ALTER TABLE `tm_machinedistribution` DISABLE KEYS */;
INSERT INTO `tm_machinedistribution` VALUES (7,3,4,'2015-02-07 20:20:37','2015-02-05 09:15:37',0,'admin',0,'admin','2015-02-07 20:18:02','2015-02-07 20:18:02'),(6,3,1,'2015-02-07 07:10:46','2015-02-14 11:30:47',0,'admin',0,'admin','2015-02-07 20:11:15','2015-02-07 20:11:15'),(5,1,1,'2015-02-05 23:00:11','2015-02-11 04:00:11',1,'admin',0,'admin','2015-02-04 23:32:56','2015-02-04 23:32:56'),(8,9,1,'2015-03-05 21:25:49','2015-03-25 22:50:49',1,'admin',0,'admin','2015-03-02 21:53:49','2015-03-02 21:53:49'),(9,9,4,'2015-03-05 09:45:14','2015-03-18 14:10:14',1,'admin',0,'admin','2015-03-02 21:54:14','2015-03-02 21:54:14'),(10,9,3,'2015-03-02 04:25:44','2015-03-03 21:50:44',1,'admin',0,'admin','2015-03-02 21:54:52','2015-03-02 21:54:52'),(11,16,1,'2015-03-06 06:30:50','2015-03-26 22:50:50',1,'admin',0,'admin','2015-03-06 23:33:52','2015-03-06 23:33:52'),(12,16,4,'2015-02-07 06:30:17','2015-03-27 18:15:17',1,'admin',0,'admin','2015-03-06 23:34:15','2015-03-06 23:34:15'),(13,17,6,'2015-03-07 07:00:35','2015-03-09 13:00:35',1,'admin',0,'admin','2015-03-07 06:56:37','2015-03-07 06:56:37'),(14,17,7,'2015-03-07 07:00:57','2015-03-20 18:30:57',1,'admin',0,'admin','2015-03-07 06:56:56','2015-03-07 06:56:56'),(15,17,8,'2015-03-06 07:35:34','2015-03-08 15:15:34',1,'admin',0,'admin','2015-03-07 06:58:35','2015-03-07 06:58:35'),(16,18,3,'2015-03-07 07:10:41','2015-03-14 10:10:41',1,'admin',0,'admin','2015-03-07 09:07:08','2015-03-07 09:07:08'),(17,18,9,'2015-03-07 09:10:28','2015-03-20 09:10:28',1,'admin',0,'admin','2015-03-07 09:07:24','2015-03-07 09:07:24'),(18,18,10,'2015-03-06 06:00:25','2015-03-07 09:45:25',1,'admin',0,'admin','2015-03-07 09:10:55','2015-03-07 09:10:55'),(19,18,1,'2015-03-17 12:00:21','2015-03-18 09:45:22',1,'admin',0,'admin','2015-03-16 15:02:57','2015-03-16 15:02:57'),(20,3,1,'2015-03-16 15:00:49','2015-03-17 12:00:22',1,'admin',0,'admin','2015-03-16 15:02:57','2015-03-16 15:02:57'),(21,18,1,'2015-03-15 11:05:22','2015-03-24 12:20:22',1,'admin',0,'admin','2015-03-16 15:02:57','2015-03-16 15:02:57');
/*!40000 ALTER TABLE `tm_machinedistribution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_machinetype`
--

DROP TABLE IF EXISTS `tm_machinetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_machinetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_machinetype`
--

LOCK TABLES `tm_machinetype` WRITE;
/*!40000 ALTER TABLE `tm_machinetype` DISABLE KEYS */;
INSERT INTO `tm_machinetype` VALUES (1,'挖掘机','admin','2015-01-20 00:00:00','2015-01-20 00:00:00'),(2,'推土机','admin','2015-01-20 00:00:00','2015-01-20 00:00:00'),(3,'压路机','admin','2015-01-20 00:00:00','2015-01-20 00:00:00'),(4,'平地车','admin','2015-01-20 00:00:00','2015-01-20 00:00:00'),(5,'自卸车','admin','2015-01-20 00:00:00','2015-01-20 00:00:00'),(6,'铲车','admin','2015-01-20 00:00:00','2015-01-20 00:00:00'),(7,'其他','admin','2015-01-20 00:00:00','2015-01-20 00:00:00');
/*!40000 ALTER TABLE `tm_machinetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_machineusedhistory`
--

DROP TABLE IF EXISTS `tm_machineusedhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_machineusedhistory` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `hours` float(11,2) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_machineusedhistory`
--

LOCK TABLES `tm_machineusedhistory` WRITE;
/*!40000 ALTER TABLE `tm_machineusedhistory` DISABLE KEYS */;
INSERT INTO `tm_machineusedhistory` VALUES (1,1,3,1,6.00,'admin',0,'2015-02-07 10:04:25','2015-02-07 10:04:25'),(2,1,3,1,6.00,'admin',0,'2015-02-07 10:04:25','2015-02-07 10:04:25'),(3,9,14,3,2.00,'admin',0,'2015-03-02 22:17:30','2015-03-02 22:17:30'),(4,16,15,4,5.00,'admin',0,'2015-03-06 23:35:58','2015-03-06 23:35:58'),(5,16,15,1,6.00,'admin',0,'2015-03-06 23:35:58','2015-03-06 23:35:58'),(6,16,16,4,11.00,'admin',0,'2015-03-06 23:53:26','2015-03-06 23:53:26'),(7,16,16,1,11.00,'admin',0,'2015-03-06 23:53:26','2015-03-06 23:53:26'),(8,17,17,8,10.00,'admin',0,'2015-03-07 06:59:17','2015-03-07 06:59:17'),(9,17,18,8,11.00,'admin',0,'2015-03-07 07:04:15','2015-03-07 07:04:15'),(10,17,18,7,11.00,'admin',0,'2015-03-07 07:04:15','2015-03-07 07:04:15'),(11,17,18,6,5.00,'admin',0,'2015-03-07 07:04:15','2015-03-07 07:04:15'),(12,18,19,3,3.00,'admin',0,'2015-03-07 09:09:13','2015-03-07 09:09:13'),(13,18,20,9,112.00,'admin',0,'2015-03-10 20:35:13','2015-03-10 20:35:13'),(14,18,20,3,0.00,'admin',0,'2015-03-10 20:35:13','2015-03-10 20:35:13'),(15,18,21,9,2.00,'admin',0,'2015-03-10 20:35:47','2015-03-10 20:35:47'),(16,18,21,3,2.00,'admin',0,'2015-03-10 20:35:47','2015-03-10 20:35:47');
/*!40000 ALTER TABLE `tm_machineusedhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_material`
--

DROP TABLE IF EXISTS `tm_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL COMMENT '编号',
  `name` varchar(50) NOT NULL COMMENT '材料名称',
  `type_id` int(11) NOT NULL COMMENT '类型（关联 tm_materialtype表 name字段）',
  `unit` varchar(10) DEFAULT NULL,
  `deleted` int(2) DEFAULT '0' COMMENT '0: 未删除; 1: 已删除',
  `created_by` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=595 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_material`
--

LOCK TABLES `tm_material` WRITE;
/*!40000 ALTER TABLE `tm_material` DISABLE KEYS */;
INSERT INTO `tm_material` VALUES (4,'1001','白水泥',1,'吨',0,'','2015-01-21 00:19:38','2015-01-21 00:19:38'),(5,'1003','水泥',1,'吨',0,'admin','2015-02-03 20:58:03','2015-02-03 20:58:03'),(6,'1004','石硝',1,'立方',0,'admin','2015-02-03 20:58:48','2015-02-03 20:58:48'),(7,'1005','石子',1,'立方',0,'admin','2015-02-03 20:59:54','2015-02-03 20:59:54'),(8,'1003','石硝',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(9,'1004','石子',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(10,'1005','细砂',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(11,'1006','中砂',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(12,'1007','冷拔丝',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(13,'1008','圆钢',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(14,'1009','一级钢筋',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(15,'1010','二级钢筋',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(16,'1011','三级钢筋',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(17,'1012','钢筋头',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(18,'1013','粉煤灰砖',1,'块',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(19,'1014','机砖',1,'块',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(20,'1015','煤矸石砖',1,'块',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(21,'1016','泵送剂',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(22,'1017','加气块',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(23,'1018','沙浆宝',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(24,'1019','砂浆王',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(25,'1020','石膏粉',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(26,'1021','石灰',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(27,'1022','石灰膏',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(28,'1023','绑丝',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(29,'1024','防冻剂',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(30,'1025','防水剂',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(31,'1026','膨胀剂',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(32,'1027','界面剂',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(33,'1028','养护剂',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(34,'1029','早强防冻剂',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(35,'1030','早强剂',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(36,'1031','防水卷材',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(37,'1032','防水',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(38,'1033','防水油膏',1,'斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(39,'1034','地面砖',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(40,'1035','外墙瓷砖',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(41,'1036','卫生瓷',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(42,'1037','蘑菇石',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(43,'1038','霹雳砖',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(44,'1039','三色砖',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(45,'1040','大理石',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(46,'1041','大理石脸盆',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(47,'1042','文化石',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(48,'1043','方正石',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(49,'1044','毛石',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(50,'1045','台阶石',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(51,'1046','泰山奇石',1,'块',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(52,'1047','珍珠岩粉',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(53,'1048','珍珠岩块',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(54,'1049','炉渣',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(55,'1050','踢脚线',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(56,'1051','割踢脚线',1,'刀',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(57,'1052','陶粒',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(58,'1053','水泥蛭石',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(59,'1054','水泥花砖',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(60,'1055','盲道砖',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(61,'1056','广场砖',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(62,'1057','渗水砖',1,'块',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(63,'1058','嵌草砖',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(64,'1059','砂岩板',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(65,'1060','鹅卵石',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(66,'1061','雨花石',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(67,'1062','路沿石',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(68,'1063','挤塑板',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(69,'1064','脊瓦',1,'页',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(70,'1065','平瓦',1,'页',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(71,'1066','三曲瓦',1,'片',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(72,'1067','屋面水泥瓦',1,'页',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(73,'1068','外墙涂料',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(74,'1069','水泥管',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(75,'1070','陶瓷管',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(76,'1071','复合井盖',1,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(77,'1072','水泥井盖',1,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(78,'1073','铁井盖',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(79,'1074','铸铁井盖',1,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(80,'1075','井盖座',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(81,'1076','门扇',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(82,'1077','楼梯扶手',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(83,'1078','下水井盖',1,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(84,'1079','上人孔盖',1,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(85,'1080','过梁',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(86,'1081','楼板',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(87,'1082','横撑',1,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(88,'1083','檐板',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(89,'1084','水泥檩条',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(90,'1085','钢构',1,'元',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(91,'1086','页岩板',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(92,'1087','GRC窗套',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(93,'1088','GRC构件',1,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(94,'1089','沉降缝铁板',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(95,'1090','伸缩缝铝板盖',1,'块',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(96,'1091','沉降缝铝板',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(97,'1092','皮灰斗',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(98,'1093','皮灰桶',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(99,'1094','塑料水鼓子',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(100,'1095','塑料水桶',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(101,'1096','塑料托灰板',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(102,'1097','塑料标志牌',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(103,'1098','界格条',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(104,'1099','木垫板',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(105,'1100','密目网',1,'片',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(106,'1101','钢筋案子板',1,'块',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(107,'1102','水平管',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(108,'1103','保温钉',1,'斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(109,'1104','方钢',1,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(110,'1105','工程线',1,'斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(111,'1106','钢尺',1,'把',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(112,'1107','铁水桶',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(113,'1108','工字钢',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(114,'1109','胶粉',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(115,'1110','毛毡',1,'片',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(116,'1111','红土',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(117,'1112','防裂网',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(118,'1113','板房',1,'间',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(119,'1114','马登',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(120,'1115','灰筛',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(121,'1116','网格布',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(122,'1117','烟道',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(123,'1118','管道井',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(124,'1119','管道井面门',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(125,'1120','烟道帽',1,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(126,'1121','801胶',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(127,'1122','107胶',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(128,'1123','防护网绳',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(129,'1124','钢丝网',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(130,'1125','刮板',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(131,'1126','板条子',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(132,'1127','红蓝铅',1,'只',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(133,'1128','墨斗',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(134,'1129','木槎子',1,'把',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(135,'1130','一勾德',1,'盒',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(136,'1131','雨水芘子',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(137,'1132','铸铁比子',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(138,'1133','筛片',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(139,'1134','小细筛',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(140,'1135','沥青',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(141,'1136','轴线',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(142,'1137','铸铁下水口',1,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(143,'1138','板房板',1,'块',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(144,'1139','变形缝',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(145,'1140','木制牌',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(146,'1141','地暖网片',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(147,'1142','垫块',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(148,'1143','防滑槽',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(149,'1144','防水白铁帽',1,'斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(150,'1145','钢板',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(151,'1146','脊瓦卡子',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(152,'1147','聚脂胶',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(153,'1148','沥青油膏',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(154,'1149','铝板',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(155,'1150','铝合金窗',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(156,'1151','皮树杆',1,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(157,'1152','湿度表',1,'块',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(158,'1153','石棉瓦',1,'张',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(159,'1154','铁板',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(160,'1155','铁锨',1,'张',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(161,'1156','铁艺栏杆',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(162,'1157','土车',1,'',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(163,'1158','瓦面漆',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(164,'1159','微晶石',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(165,'1160','橡胶止水带',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(166,'1161','烟道截止阀',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(167,'1162','腰线',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(168,'1163','油毡',1,'捆',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(169,'1164','预埋件',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(170,'1165','铸铁花墙',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(171,'1166','棚布',1,'块',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(172,'1167','多层板',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(173,'1168','竹胶板',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(174,'1169','木胶板',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(175,'1170','三合板',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(176,'1171','铝塑板',1,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(177,'1172','铁钉',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(178,'1173','铁丝',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(179,'1174','合金锯片',1,'片',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(180,'1175','拼板胶',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(181,'1176','隔离剂',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(182,'1177','废机油',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(183,'1178','黄胶带',1,'盘',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(184,'1179','铁皮撑',1,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(185,'1180','螺丝',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(186,'1181','螺丝',1,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(187,'1182','螺帽',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(188,'1183','螺母',1,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(189,'1184','三保险门锁',1,'把',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(190,'1185','圆木',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(191,'1186','三角木条',1,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(192,'1187','螺丝',1,'斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(193,'1188','型钢',1,'t',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(194,'1189','垫木',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(195,'1190','电焊条',1,'kg',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(196,'1191','红丹防锈漆',1,'kg',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(197,'1192','沥青漆',1,'kg',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(198,'1193','石油沥青',1,'kg',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(199,'1194','乙炔气',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(200,'1195','螺栓',1,'kg',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(201,'1196','木柴',1,'kg',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(202,'1197','木脚手板',1,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(203,'1198','PPR冷水管12kg',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(204,'1199','PPR冷水管16kg',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(205,'1200','PPR热水管20kg',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(206,'1201','PPR热水管25kg',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(207,'1202','PPR铝塑热水管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(208,'1203','PPR钢塑热水管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(209,'1204','PPR地暖管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(210,'1205','PERT地暖管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(211,'1206','PPR截止阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(212,'1207','PPR全塑球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(213,'1208','PPR单活节铜球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(214,'1209','PPR双活节铜球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(215,'1210','PVC球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(216,'1211','地板采暖分水器',2,'只',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(217,'1212','PPR等径直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(218,'1213','PPR异径直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(219,'1214','PPR内螺纹直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(220,'1215','PPR外螺纹直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(221,'1216','PPR等径45°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(222,'1217','PPR等径90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(223,'1218','PPR异径90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(224,'1219','PPR内螺纹90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(225,'1220','PPR外螺纹90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(226,'1221','PPR等径三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(227,'1222','PPR异径三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(228,'1223','PPR内螺纹三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(229,'1224','PPR外螺纹三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(230,'1225','PPR内螺纹铜活节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(231,'1226','PPR外螺纹铜活节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(232,'1227','PPR四通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(233,'1228','PPR全塑活节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(234,'1229','PPR法兰连接件(芯)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(235,'1230','PPR法兰连接盘',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(236,'1231','PPR管帽(堵头)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(237,'1232','PPR过桥弯曲管(长)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(238,'1233','PPR过桥弯曲管(短)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(239,'1234','PPR膨胀横卡',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(240,'1235','PPR膨胀立卡',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(241,'1236','PPR伸缩节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(242,'1237','PVC给水管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(243,'1238','PVC给水45°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(244,'1239','PVC给水90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(245,'1240','PVC给水90°三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(246,'1241','PVC给水90°异径三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(247,'1242','PVC给水活接',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(248,'1243','PVC给水管堵',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(249,'1244','PVC给水直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(250,'1245','PVC法兰接头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(251,'1246','PVC铜牙90°三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(252,'1247','PVC铜牙90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(253,'1248','PVC铜牙直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(254,'1249','PVC外螺纹等径直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(255,'1250','PVC外螺纹异径直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(256,'1251','PVC排水实壁管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(257,'1252','PVC排水螺旋管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(258,'1253','PVC排水双壁波纹管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(259,'1254','PVC排水中空螺旋管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(260,'1255','PVC排水发泡管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(261,'1256','PVC雨水管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(262,'1257','雨水管卡固定螺栓',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(263,'1258','PVC排水45°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(264,'1259','PVC排水90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(265,'1260','PVC排水45°弯头带检查口',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(266,'1261','PVC排水90°弯头带检查口',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(267,'1262','PVC排水90°三通带检查口',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(268,'1263','PVC排水90°三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(269,'1264','PVC排水45°三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(270,'1265','PVC斜三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(271,'1266','PVC立体四通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(272,'1267','PVC伸缩节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(273,'1268','PVC伸缩节带检查口',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(274,'1269','PVC清扫口',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(275,'1270','PVC排水直节(管箍)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(276,'1271','PVC正四通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(277,'1272','PVC斜四通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(278,'1273','PVC管夹',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(279,'1274','PVC吊卡',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(280,'1275','PVC吊卡座',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(281,'1276','PPR变径头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(282,'1277','PVC变径头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(283,'1278','PVC立管检查口',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(284,'1279','PVC透气帽',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(285,'1280','PE给水管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(286,'1281','PE承插式等径直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(287,'1282','PE承插式异径直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(288,'1283','PE承插式90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(289,'1284','PE承插式45°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(290,'1285','PE承插式等径三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(291,'1286','PE承插式异径三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(292,'1287','PE承插式内螺纹直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(293,'1288','PE承插式外螺纹直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(294,'1289','PE承插式内螺纹弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(295,'1290','PE承插式外螺纹弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(296,'1291','PE承插式内螺纹三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(297,'1292','PE承插式外螺纹三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(298,'1293','PE承插式堵头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(299,'1294','PE承插式外螺纹活接头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(300,'1295','PE对接式90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(301,'1296','PE对接式45°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(302,'1297','PE对接式等径三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(303,'1298','PE对接式异径三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(304,'1299','PE对接式异径直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(305,'1300','PE对接式堵头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(306,'1301','铁45°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(307,'1302','铁90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(308,'1303','铁三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(309,'1304','铁管固(直节)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(310,'1305','铁内接(内丝)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(311,'1306','铁活接',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(312,'1307','铁补芯',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(313,'1308','铁管堵',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(314,'1309','铁管帽',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(315,'1310','铁根母',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(316,'1311','铁四通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(317,'1312','铁内外丝弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(318,'1313','铁长速接',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(319,'1314','铁短速接',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(320,'1315','镀锌45°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(321,'1316','镀锌90°弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(322,'1317','镀锌三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(323,'1318','镀锌管固',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(324,'1319','镀锌内接',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(325,'1320','镀锌活接',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(326,'1321','镀锌补芯',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(327,'1322','镀锌管堵',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(328,'1323','镀锌管帽',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(329,'1324','镀锌根母',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(330,'1325','镀锌四通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(331,'1326','镀锌过弯',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(332,'1327','镀锌内外丝弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(333,'1328','镀锌短速接',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(334,'1329','镀锌方管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(335,'1330','焊接钢管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(336,'1331','焊接扁管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(337,'1332','铁截止阀门',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(338,'1333','铁球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(339,'1334','铁碟阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(340,'1335','铁蝶阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(341,'1336','铁闸阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(342,'1337','铜等径直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(343,'1338','铜异径直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(344,'1339','铜截止阀门',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(345,'1340','铜球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(346,'1341','铜闸阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(347,'1342','法兰球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(348,'1343','一体铜过滤球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(349,'1344','手压小便冲洗阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(350,'1345','手压大便冲洗阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(351,'1346','白塑料管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(352,'1347','电焊条',2,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(353,'1348','铸铁管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(354,'1349','铸铁透气帽',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(355,'1350','自动放气阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(356,'1351','手动放气阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(357,'1352','三角阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(358,'1353','高压软管',2,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(359,'1354','生料带',2,'盘',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(360,'1355','冷镀管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(361,'1356','热镀管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(362,'1357','PE分水器',2,'只',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(363,'1358','抽芯铆钉',2,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(364,'1359','铜过滤器',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(365,'1360','铜锁闭阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(366,'1361','角铁',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(367,'1362','角铁支架',2,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(368,'1363','角铁U型卡',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(369,'1364','角铁支架带U型卡',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(370,'1365','玛钢球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(371,'1366','玛钢闸阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(372,'1367','膨胀螺丝',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(373,'1368','螺丝',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(374,'1369','铁变径头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(375,'1370','铜三通(铝塑管专用)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(376,'1371','PEX地暖管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(377,'1372','PE喷塑法兰盘',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(378,'1373','PE截止阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(379,'1374','PE注塑法兰头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(380,'1375','PPR管卡',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(381,'1376','PVC快速接头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(382,'1377','PVC法兰盘',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(383,'1378','PVC管帽',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(384,'1379','下水软管(一般)',2,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(385,'1380','不锈钢球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(386,'1381','保温管专用胶',2,'桶',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(387,'1382','保温管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(388,'1383','双头螺栓',2,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(389,'1384','双头螺栓',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(390,'1385','地脚螺栓',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(391,'1386','地脚螺栓',2,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(392,'1387','座便器',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(393,'1388','蹲便器',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(394,'1389','小便器',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(395,'1390','立便斗',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(396,'1391','不锈钢反板下水',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(397,'1392','不锈钢下水',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(398,'1393','拖布池带下水',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(399,'1394','暖气片托钩',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(400,'1395','暖气片夹板螺丝',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(401,'1396','暖气片(铝合金)',2,'组',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(402,'1397','暖气片(钢铝)',2,'片',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(403,'1398','暖气片(铸铁)',2,'片',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(404,'1399','暖气片垫子',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(405,'1400','槽钢',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(406,'1401','活节橡胶垫',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(407,'1402','橡胶垫',2,'片',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(408,'1403','橡胶垫',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(409,'1404','乙炔',2,'瓶',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(410,'1405','氧气',2,'瓶',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(411,'1406','水嘴',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(412,'1407','法兰止回阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(413,'1408','法兰胶垫',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(414,'1409','法兰闸阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(415,'1410','消防栓',2,'只',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(416,'1411','室内消防器材',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(417,'1412','玛钢截止阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(418,'1413','铁丝头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(419,'1414','铁冲压弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(420,'1415','铁方管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(421,'1416','铁法兰盘',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(422,'1417','铁盲板',2,'片',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(423,'1418','铜内丝',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(424,'1419','铜内丝直节(铝塑管专用)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(425,'1420','铜内丝弯头(铝塑管专用)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(426,'1421','铜内丝直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(427,'1422','铜变径头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(428,'1423','铜外丝直节(铝塑管专用)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(429,'1424','铜外丝直节',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(430,'1425','铜异径三通',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(431,'1426','铜浮球阀',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(432,'1427','铜等径弯头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(433,'1428','银粉漆',2,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(434,'1429','银粉膏',2,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(435,'1430','铸铁落水斗(方型)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(436,'1431','铸铁落水斗(圆型)',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(437,'1432','镀锌变径头',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(438,'1433','镀锌钢筋',2,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(439,'1434','镀锌钢管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(440,'1435','镀锌长速接',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(441,'1436','防水套管',2,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(442,'1437','黄夹克管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(443,'1438','麻',2,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(444,'1439','钢网',2,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(445,'1440','钢丝刷子',2,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(446,'1441','透明胶带',2,'盘',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(447,'1442','电镀网',2,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(448,'1443','熔丝',2,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(449,'1444','塑料布包装带',2,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(450,'1445','铝泊胶带',2,'盘',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(451,'1446','发泡剂',2,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(452,'1447','PAP板',2,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(453,'1448','沥清漆',2,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(454,'1449','无缝钢管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(455,'1450','高强螺栓',2,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(456,'1451','角钢',2,'t',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(457,'1452','钢塑管',2,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(458,'1453','101粘结剂',3,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(459,'1454','108胶',3,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(460,'1455','309胶',3,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(461,'1456','502胶',3,'支',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(462,'1457','793胶',3,'支',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(463,'1458','沙比利板',3,'张',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(464,'1459','石膏板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(465,'1460','细木工板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(466,'1461','201透明胶',3,'支',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(467,'1462','壁纸',3,'捆',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(468,'1463','壁纸粉',3,'盒',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(469,'1464','壁纸胶',3,'桶',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(470,'1465','副骨',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(471,'1466','主骨',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(472,'1467','副接头',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(473,'1468','主接头',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(474,'1469','佛手',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(475,'1470','白宝丽板',3,'立方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(476,'1471','密度板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(477,'1472','纸缝带',3,'盘',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(478,'1473','嵌缝带',3,'盘',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(479,'1474','羊毛刷',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(480,'1475','白胶',3,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(481,'1476','吊杆',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(482,'1477','吊件',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(483,'1478','吊筋',3,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(484,'1479','刀厘板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(485,'1480','结构胶',3,'管',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(486,'1481','密封胶',3,'支',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(487,'1482','拉手',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(488,'1483','腻子刀',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(489,'1484','腻子粉',3,'袋',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(490,'1485','支托',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(491,'1486','直钉',3,'盒',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(492,'1487','吊扣',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(493,'1488','羊毛滚子',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(494,'1489','射灯',3,'只',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(495,'1490','自攻丝',3,'斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(496,'1491','装饰条',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(497,'1492','纸胶带',3,'盘',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(498,'1493','沙比利钉眼膏',3,'盒',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(499,'1494','马钉',3,'盒',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(500,'1495','风勾',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(501,'1496','玻璃',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(502,'1497','玻璃夹',3,'付',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(503,'1498','玻璃胶',3,'支',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(504,'1499','玻璃托',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(505,'1500','不锈钢板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(506,'1501','不锈钢管',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(507,'1502','不锈钢碰夹',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(508,'1503','不锈钢压条',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(509,'1504','大理石胶',3,'桶',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(510,'1505','灯绳',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(511,'1506','灯体',3,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(512,'1507','灯箱片',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(513,'1508','底漆',3,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(514,'1509','插泡',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(515,'1510','插销',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(516,'1511','钢排',3,'盒',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(517,'1512','门档线',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(518,'1513','门套线',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(519,'1514','门吸',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(520,'1515','内胀螺丝',3,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(521,'1516','横串',3,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(522,'1517','吊扇',3,'台',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(523,'1518','地板革',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(524,'1519','滑石粉',3,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(525,'1520','角铝',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(526,'1521','铝方管',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(527,'1522','防火皮子',3,'张',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(528,'1523','防火涂料',3,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(529,'1524','防盗门',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(530,'1525','塑钢窗',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(531,'1526','镜钉',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(532,'1527','餐厅灯',3,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(533,'1528','镜前灯',3,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(534,'1529','客厅灯',3,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(535,'1530','卧室灯',3,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(536,'1531','阳台灯',3,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(537,'1532','装饰胶',3,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(538,'1533','孟氏胶',3,'升',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(539,'1534','快粘粉',3,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(540,'1535','聚脂漆',3,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(541,'1536','免瓷膏',3,'盒',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(542,'1537','免漆板',3,'张',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(543,'1538','免漆膏',3,'盒',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(544,'1539','推拉门',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(545,'1540','阳角',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(546,'1541','阴角',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(547,'1542','大阳角',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(548,'1543','包口包窗',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(549,'1544','万能胶',3,'支',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(550,'1545','蚊钉',3,'盒',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(551,'1546','岩棉板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(552,'1547','右角',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(553,'1548','干化瓷',3,'袋',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(554,'1549','内角',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(555,'1550','换气扇',3,'台',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(556,'1551','木地板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(557,'1552','拼接板',3,'张',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(558,'1553','烤漆白板',3,'张',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(559,'1554','烤漆门',3,'扇',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(560,'1555','平板',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(561,'1556','磨砂玻璃',3,'公斤',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(562,'1557','茶几架',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(563,'1558','窗台板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(564,'1559','铜条',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(565,'1560','塑料封边',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(566,'1561','浴霸',3,'台',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(567,'1562','连接件',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(568,'1563','双面贴',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(569,'1564','全盖合页',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(570,'1565','三秒胶',3,'支',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(571,'1566','地板防潮层',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(572,'1567','石膏板包皮',3,'张',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(573,'1568','地柜门',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(574,'1569','铅管',3,'根',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(575,'1570','PVC软片',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(576,'1571','地弹簧',3,'付',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(577,'1572','防水圆球',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(578,'1573','窗户粘贴纸',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(579,'1574','轨道',3,'付',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(580,'1575','铝管',3,'吨',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(581,'1576','面板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(582,'1577','木板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(583,'1578','硅酸钙板',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(584,'1579','卡件',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(585,'1580','色浆',3,'只',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(586,'1581','色精',3,'瓶',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(587,'1582','面漆',3,'套',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(588,'1583','软胶',3,'只',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(589,'1584','钛金字',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(590,'1585','色理石厨具面',3,'平方',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(591,'1586','竖向龙骨',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(592,'1587','天地',3,'米',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(593,'1588','堵头',3,'个',0,'admin','2015-02-07 01:04:08','2015-02-07 01:04:08'),(594,'','石硝A123',1,'m³',0,'admin','2015-03-01 12:29:43','2015-03-01 12:29:43');
/*!40000 ALTER TABLE `tm_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_materialapplication`
--

DROP TABLE IF EXISTS `tm_materialapplication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_materialapplication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL COMMENT '材料申请编号',
  `project_id` int(11) NOT NULL,
  `expect_arrival_date` date DEFAULT NULL COMMENT '期望采购进场时间',
  `remark` text,
  `verified` int(11) NOT NULL COMMENT '0: 未处理; 1: 通过审核 -1: 拒绝',
  `verified_by` varchar(30) DEFAULT NULL COMMENT '审核者，用户名',
  `verified_date` datetime DEFAULT NULL,
  `verified_remark` text COMMENT '审核说明',
  `deleted` int(2) DEFAULT NULL,
  `created_by` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_materialapplication`
--

LOCK TABLES `tm_materialapplication` WRITE;
/*!40000 ALTER TABLE `tm_materialapplication` DISABLE KEYS */;
INSERT INTO `tm_materialapplication` VALUES (1,'150208-70202',1,NULL,NULL,1,NULL,NULL,NULL,0,'admin','2015-02-02 23:35:14','2015-02-02 23:35:14'),(2,'150208-70203',1,NULL,NULL,1,NULL,NULL,NULL,0,'admin','2015-02-02 23:36:10','2015-02-02 23:36:10'),(3,'150208-70204',1,NULL,NULL,1,NULL,NULL,NULL,0,'admin','2015-02-03 20:54:43','2015-02-03 20:54:43'),(4,'150208-70206',3,NULL,NULL,2,'admin','2015-02-12 16:32:48','<p>备注备注备注备注备注备注</p>\r\n<p>备注备注备注</p>\r\n<p>备注备注备注备注备注备注备注</p>\r\n<p>备注备注备注备注备注备注</p>',0,'admin','2015-02-07 20:03:58','2015-02-12 16:32:48'),(5,'150208-70207',3,NULL,NULL,1,'admin','2015-02-12 16:31:53','',0,'admin','2015-02-07 20:07:18','2015-02-12 16:31:53'),(6,'150208-70208',3,NULL,NULL,1,'admin','2015-02-12 16:32:01','',0,'admin','2015-02-07 20:20:00','2015-02-12 16:32:01'),(7,'150208-70201',2,NULL,NULL,1,'admin','2015-02-08 12:04:46','&lt;p&gt;备注备注&lt;/p&gt;\r\n&lt;p&gt;备注&lt;/p&gt;\r\n&lt;p&gt;备注备注备注备注&lt;/p&gt;\r\n&lt;p&gt;备注备注备注&lt;/p&gt;',0,'admin','2015-02-08 00:09:20','2015-02-08 12:04:46'),(8,'150301-19803',9,NULL,NULL,2,'admin','2015-03-01 12:41:51','同意可以发放',0,'admin','2015-03-01 12:34:09','2015-03-01 12:41:51'),(9,'150306-41717',14,NULL,NULL,0,NULL,NULL,NULL,0,'admin','2015-03-06 23:22:41','2015-03-06 23:22:41'),(10,'150306-18779',16,NULL,NULL,2,'admin','2015-03-06 23:50:01','',0,'admin','2015-03-06 23:29:51','2015-03-06 23:50:01'),(11,'150306-31274',16,NULL,NULL,2,'admin','2015-03-06 23:52:20','',0,'admin','2015-03-06 23:36:39','2015-03-06 23:52:20'),(12,'150307-87355',17,NULL,NULL,2,'admin','2015-03-07 06:55:33','',0,'admin','2015-03-07 06:49:11','2015-03-07 06:55:33'),(13,'150307-63709',18,NULL,NULL,2,'admin','2015-03-07 09:05:24','可以发放',0,'admin','2015-03-07 08:59:40','2015-03-07 09:05:24'),(14,'150307-30759',18,NULL,NULL,0,NULL,NULL,NULL,0,'admin','2015-03-07 09:23:03','2015-03-07 09:23:03'),(15,'150310-20661',18,NULL,NULL,2,'admin','2015-03-10 20:34:01','',0,'admin','2015-03-10 19:35:22','2015-03-10 20:34:01');
/*!40000 ALTER TABLE `tm_materialapplication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_materialapplicationdetail`
--

DROP TABLE IF EXISTS `tm_materialapplicationdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_materialapplicationdetail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL COMMENT 'material order ID',
  `material_id` int(11) NOT NULL COMMENT 'material ID',
  `qty` float(11,2) DEFAULT '0.00',
  `price` float(11,2) DEFAULT '0.00' COMMENT '单价,审批时添加',
  `bid_price` float(11,2) DEFAULT '0.00' COMMENT '竞标价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_materialapplicationdetail`
--

LOCK TABLES `tm_materialapplicationdetail` WRITE;
/*!40000 ALTER TABLE `tm_materialapplicationdetail` DISABLE KEYS */;
INSERT INTO `tm_materialapplicationdetail` VALUES (1,3,6,2.00,0.00,0.00),(2,3,7,2.00,0.00,0.00),(3,3,4,2.00,0.00,0.00),(4,3,4,3.00,0.00,0.00),(5,4,5,10.00,0.00,0.00),(6,4,37,100.00,0.00,0.00),(7,4,69,1000.00,0.00,0.00),(8,4,101,1.00,0.00,0.00),(9,4,302,2.00,0.00,0.00),(10,4,465,1005.00,0.00,0.00),(11,5,5,11.00,0.00,0.00),(12,5,229,11.00,0.00,0.00),(13,5,540,11.00,0.00,0.00),(14,6,133,1.00,0.00,0.00),(15,6,5,10.00,0.00,0.00),(16,6,37,100.00,0.00,0.00),(17,6,69,15.00,0.00,0.00),(18,6,283,15.00,0.00,0.00),(19,7,157,2.00,0.00,0.00),(20,7,167,2.00,0.00,0.00),(21,7,182,2.00,0.00,0.00),(22,7,155,30.00,0.00,0.00),(23,7,96,200.00,0.00,0.00),(24,7,101,150.00,0.00,0.00),(25,7,42,180.00,0.00,0.00),(26,7,184,1090.00,0.00,0.00),(27,7,285,200.00,0.00,0.00),(28,7,436,800.00,0.00,0.00),(29,7,290,90.00,0.00,0.00),(30,7,249,100.00,0.00,0.00),(31,7,541,110.00,0.00,0.00),(32,7,496,180.00,0.00,0.00),(33,7,460,2201.00,0.00,0.00),(34,7,543,33.00,0.00,0.00),(35,7,466,44.00,0.00,0.00),(36,8,192,10.00,0.00,0.00),(37,8,25,100.00,0.00,0.00),(38,8,57,100.00,0.00,0.00),(39,8,89,100.00,0.00,0.00),(40,8,416,100.00,0.00,0.00),(41,10,190,10.00,0.00,0.00),(42,10,30,1000.00,0.00,0.00),(43,10,457,100000.00,0.00,0.00),(44,11,176,100.00,0.00,0.00),(45,11,512,100.00,0.00,0.00),(46,12,4,100.00,200.00,0.00),(47,12,9,100000.00,40.00,0.00),(48,12,5,1000.00,1000.00,0.00),(49,13,9,1000.00,0.00,0.00),(50,13,5,10.00,0.00,0.00),(51,13,74,1000.00,0.00,0.00),(52,13,193,2.00,0.00,0.00),(53,14,154,0.00,0.00,0.00),(54,14,113,0.00,0.00,0.00),(55,15,122,100.00,100.00,0.00),(56,15,549,200.00,200.00,0.00);
/*!40000 ALTER TABLE `tm_materialapplicationdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_materialtype`
--

DROP TABLE IF EXISTS `tm_materialtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_materialtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_materialtype`
--

LOCK TABLES `tm_materialtype` WRITE;
/*!40000 ALTER TABLE `tm_materialtype` DISABLE KEYS */;
INSERT INTO `tm_materialtype` VALUES (1,'土木建材','admin','2015-01-20 00:00:00','2015-01-20 00:00:00'),(2,'安装建材','admin','2015-01-20 00:00:00','2015-01-20 00:00:00'),(3,'装饰材料','admin','2015-01-20 00:00:00','2015-01-20 00:00:00'),(4,'其他','admin','2015-01-20 00:00:00','2015-01-20 00:00:00');
/*!40000 ALTER TABLE `tm_materialtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_materialusedhistory`
--

DROP TABLE IF EXISTS `tm_materialusedhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_materialusedhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `existing_qty` float(11,2) NOT NULL DEFAULT '0.00',
  `used_qty` float(11,2) NOT NULL DEFAULT '0.00' COMMENT '当日日报中表示‘实际用量’，明日计划中表示‘计划用量’',
  `remaining_qty` float(11,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(30) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_materialusedhistory`
--

LOCK TABLES `tm_materialusedhistory` WRITE;
/*!40000 ALTER TABLE `tm_materialusedhistory` DISABLE KEYS */;
INSERT INTO `tm_materialusedhistory` VALUES (1,1,3,6,1.00,0.00,0.00,'admin',0,'2015-02-07 10:04:25','2015-02-07 10:04:25'),(2,1,3,4,3.00,0.00,0.00,'admin',0,'2015-02-07 10:04:25','2015-02-07 10:04:25'),(3,1,3,7,2.00,0.00,0.00,'admin',0,'2015-02-07 10:04:25','2015-02-07 10:04:25'),(4,9,14,192,10.00,3.00,0.00,'admin',0,'2015-03-02 22:17:30','2015-03-02 22:17:30'),(5,9,14,25,100.00,4.00,0.00,'admin',0,'2015-03-02 22:17:30','2015-03-02 22:17:30'),(6,9,14,57,100.00,3.00,0.00,'admin',0,'2015-03-02 22:17:30','2015-03-02 22:17:30'),(7,9,14,89,100.00,4.00,0.00,'admin',0,'2015-03-02 22:17:30','2015-03-02 22:17:30'),(8,9,14,416,100.00,4.00,0.00,'admin',0,'2015-03-02 22:17:30','2015-03-02 22:17:30'),(9,16,15,190,10.00,5.00,5.00,'admin',0,'2015-03-06 23:35:58','2015-03-06 23:35:58'),(10,16,15,30,1000.00,200.00,800.00,'admin',0,'2015-03-06 23:35:58','2015-03-06 23:35:58'),(11,16,15,457,100000.00,688.00,99312.00,'admin',0,'2015-03-06 23:35:58','2015-03-06 23:35:58'),(12,16,16,176,100.00,23.00,77.00,'admin',0,'2015-03-06 23:53:26','2015-03-06 23:53:26'),(13,16,16,512,100.00,11.00,89.00,'admin',0,'2015-03-06 23:53:26','2015-03-06 23:53:26'),(14,16,16,190,5.00,5.00,0.00,'admin',0,'2015-03-06 23:53:26','2015-03-06 23:53:26'),(15,16,16,30,800.00,23.00,777.00,'admin',0,'2015-03-06 23:53:26','2015-03-06 23:53:26'),(16,16,16,457,99312.00,23.00,99289.00,'admin',0,'2015-03-06 23:53:26','2015-03-06 23:53:26'),(17,17,17,4,100.00,10.00,90.00,'admin',0,'2015-03-07 06:59:17','2015-03-07 07:00:44'),(18,17,17,9,100000.00,200.00,99800.00,'admin',0,'2015-03-07 06:59:17','2015-03-07 07:00:44'),(19,17,17,5,1000.00,222.00,778.00,'admin',0,'2015-03-07 06:59:17','2015-03-07 07:00:44'),(20,17,18,4,90.00,23.00,67.00,'admin',0,'2015-03-07 07:04:15','2015-03-07 07:04:15'),(21,17,18,9,99800.00,11.00,99789.00,'admin',0,'2015-03-07 07:04:15','2015-03-07 07:04:15'),(22,17,18,5,778.00,26.00,752.00,'admin',0,'2015-03-07 07:04:15','2015-03-07 07:04:15'),(23,18,19,9,1000.00,100.00,900.00,'admin',0,'2015-03-07 09:09:13','2015-03-07 09:09:13'),(24,18,19,5,10.00,5.00,5.00,'admin',0,'2015-03-07 09:09:13','2015-03-07 09:09:13'),(25,18,19,74,1000.00,200.00,800.00,'admin',0,'2015-03-07 09:09:13','2015-03-07 09:09:13'),(26,18,19,193,2.00,1.00,1.00,'admin',0,'2015-03-07 09:09:13','2015-03-07 09:09:13'),(27,18,20,122,100.00,100.00,0.00,'admin',0,'2015-03-10 20:35:13','2015-03-10 20:35:13'),(28,18,20,549,200.00,111.00,89.00,'admin',0,'2015-03-10 20:35:13','2015-03-10 20:35:13'),(29,18,20,9,900.00,111.00,789.00,'admin',0,'2015-03-10 20:35:13','2015-03-10 20:35:13'),(30,18,20,5,5.00,1.00,4.00,'admin',0,'2015-03-10 20:35:13','2015-03-10 20:35:13'),(31,18,20,74,800.00,1.00,799.00,'admin',0,'2015-03-10 20:35:13','2015-03-10 20:35:13'),(32,18,20,193,1.00,0.00,0.00,'admin',0,'2015-03-10 20:35:13','2015-03-10 20:35:13'),(33,18,21,122,0.00,0.00,0.00,'admin',0,'2015-03-10 20:35:47','2015-03-10 20:35:47'),(34,18,21,549,89.00,3.00,86.00,'admin',0,'2015-03-10 20:35:47','2015-03-10 20:35:47'),(35,18,21,9,789.00,343.00,446.00,'admin',0,'2015-03-10 20:35:47','2015-03-10 20:35:47'),(36,18,21,5,4.00,4.00,0.00,'admin',0,'2015-03-10 20:35:47','2015-03-10 20:35:47'),(37,18,21,74,799.00,34.00,765.00,'admin',0,'2015-03-10 20:35:47','2015-03-10 20:35:47'),(38,18,21,193,1.00,1.00,0.00,'admin',0,'2015-03-10 20:35:47','2015-03-10 20:35:47');
/*!40000 ALTER TABLE `tm_materialusedhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_module`
--

DROP TABLE IF EXISTS `tm_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_module` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `root` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` char(60) NOT NULL DEFAULT '',
  `parent` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `path` char(255) NOT NULL DEFAULT '',
  `grade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `type` char(30) NOT NULL,
  `owner` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_module`
--

LOCK TABLES `tm_module` WRITE;
/*!40000 ALTER TABLE `tm_module` DISABLE KEYS */;
INSERT INTO `tm_module` VALUES (1,1,'首页',0,',1,',1,10,'story',''),(2,1,'新闻中心',0,',2,',1,20,'story',''),(3,1,'成果展示',0,',3,',1,30,'story',''),(4,1,'售后服务',0,',4,',1,40,'story',''),(5,1,'诚聘英才',0,',5,',1,50,'story',''),(6,1,'合作洽谈',0,',6,',1,60,'story',''),(7,1,'关于我们',0,',7,',1,70,'story',''),(8,1,'首页',0,',8,',1,10,'bug',''),(9,1,'新闻中心',0,',9,',1,20,'bug',''),(10,1,'成果展示',0,',10,',1,30,'bug',''),(11,1,'售后服务',0,',11,',1,40,'bug',''),(12,1,'诚聘英才',0,',12,',1,50,'bug',''),(13,1,'合作洽谈',0,',13,',1,60,'bug',''),(14,1,'关于我们',0,',14,',1,70,'bug','');
/*!40000 ALTER TABLE `tm_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_problem`
--

DROP TABLE IF EXISTS `tm_problem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_problem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `daily_id` bigint(20) NOT NULL COMMENT '表 Daily',
  `content` text,
  `report_date` date NOT NULL,
  `verified` int(2) DEFAULT '0',
  `verified_by` varchar(30) DEFAULT NULL,
  `verified_date` datetime DEFAULT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `created_by` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_problem`
--

LOCK TABLES `tm_problem` WRITE;
/*!40000 ALTER TABLE `tm_problem` DISABLE KEYS */;
INSERT INTO `tm_problem` VALUES (1,8,1,'存在问题','2015-02-12',0,NULL,NULL,0,'admin','2015-02-12 07:34:54','2015-02-12 07:34:54'),(2,9,4,'土地上冻了','2015-03-01',0,NULL,NULL,0,'admin','2015-03-01 12:49:15','2015-03-01 12:49:15');
/*!40000 ALTER TABLE `tm_problem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_product`
--

DROP TABLE IF EXISTS `tm_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_product` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL,
  `code` varchar(45) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `PO` varchar(30) NOT NULL,
  `QD` varchar(30) NOT NULL,
  `RD` varchar(30) NOT NULL,
  `acl` enum('open','private','custom') NOT NULL DEFAULT 'open',
  `whitelist` varchar(255) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdVersion` varchar(20) NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_product`
--

LOCK TABLES `tm_product` WRITE;
/*!40000 ALTER TABLE `tm_product` DISABLE KEYS */;
INSERT INTO `tm_product` VALUES (1,'公司企业网站建设','companyWebsite','normal','建立公司企业网站，可以更好对外展示。<br />','productManager','testManager','productManager','open','','productManager','2012-06-05 09:57:07','','0'),(2,'企业内部工时管理系统','workhourManage','normal','','productManager','testManager','productManager','open','','productManager','2012-06-05 11:15:20','5.2.1','0');
/*!40000 ALTER TABLE `tm_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_productplan`
--

DROP TABLE IF EXISTS `tm_productplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_productplan` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL,
  `title` varchar(90) NOT NULL,
  `desc` text NOT NULL,
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_productplan`
--

LOCK TABLES `tm_productplan` WRITE;
/*!40000 ALTER TABLE `tm_productplan` DISABLE KEYS */;
INSERT INTO `tm_productplan` VALUES (1,1,'1.0版本','开发出企业网站1.0版本。<br />','2000-01-01','2015-01-01','0');
/*!40000 ALTER TABLE `tm_productplan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_project`
--

DROP TABLE IF EXISTS `tm_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_project` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL COMMENT '项目编号: YYMM+XXXX',
  `name` varchar(90) NOT NULL,
  `client` varchar(255) DEFAULT NULL COMMENT '工程业主',
  `address` varchar(255) DEFAULT NULL COMMENT '项目地址',
  `type` varchar(20) NOT NULL DEFAULT 'sprint' COMMENT '项目类型',
  `pm` varchar(50) DEFAULT NULL COMMENT '项目经理 username',
  `sub_pm` varchar(50) DEFAULT NULL COMMENT '副经理 username',
  `begin` date NOT NULL COMMENT '开工日期',
  `espected_completion` date DEFAULT NULL COMMENT '预计竣工日期',
  `actual_completion` date DEFAULT NULL COMMENT '实际竣工日期',
  `desc` text NOT NULL COMMENT '项目说明',
  `status` enum('wait','doing','done','closed') NOT NULL DEFAULT 'doing',
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_by` varchar(50) DEFAULT NULL COMMENT '创建者 username',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project` (`type`,`begin`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_project`
--

LOCK TABLES `tm_project` WRITE;
/*!40000 ALTER TABLE `tm_project` DISABLE KEYS */;
INSERT INTO `tm_project` VALUES (1,'coWeb1','企业网站第一期','青岛市政府','崂山区李沙路','sprint','projectManager',NULL,'2015-02-11','2016-02-29','2016-03-31','开发企业网站的基本雏形。<br />','doing','1',NULL,NULL,NULL),(2,'coWebsite2','企业网站第二期','青岛市政府','崂山区李沙路','sprint','projectManager',NULL,'2015-02-28','2016-04-30','0000-00-00','<p>企业网站第二期企业网站第二期企业网站第二期企业网站第二期企业网站第二期</p>\r\n<p>企业网站第二期企业网站第二期企业网站第二期</p>\r\n<p>企业网站第二期企业网站第二期企业网站第二期企业网站第二期企业网站第二期企业网站第二期企业网站第二期</p>\r\n<p>企业网站第二期企业网站第二期企业网站第二期企业网站第二期</p>\r\n<p>企业网站第二期企业网站第二期企业网站第二期企业网站第二期企业网站第二期企业网站第二期企业网站第二期企业网站第二期企业网站第二期企业网站第二期</p>','doing','1',NULL,NULL,NULL),(3,'D20150207','世园大道道路项目','青岛市政府','崂山区李沙路','道路','productManager',NULL,'2015-02-07','2016-02-07','2016-02-07','世园大道道路项目崂山区李沙路世园大道道路项目崂山区李沙路世园大道道路项目崂山区李沙路世园大道道路项目崂山区李沙路世园大道道路项目崂山区李沙路世园大道道路项目崂山区李沙路世园大道道路项目崂山区李沙路世园大道道路项目崂山区李沙路世园大道道路项目崂山区李沙路','doing','0',NULL,NULL,NULL),(4,'150208-69368','世园大道道路项目22','青岛市政府','崂山区李沙路','道路','projectManager',NULL,'2015-02-08','2016-02-08','2016-02-08','<p>范德萨发到萨芬</p>\r\n<p>fdsa fdws</p>\r\n<p>范德萨</p>','doing','1',NULL,NULL,NULL),(5,'150208-71106','世园大道道路项目33','青岛市政府','崂山区李沙路','道路','projectManager',NULL,'2015-02-08','2016-02-08','2016-02-08','<p>项目说明项目说明项目说明项目说明项目说明项目说明</p>\r\n<p>项目说明项目说明项目说明</p>\r\n<p>项目说明项目说明项目说明项目说明项目说明项目说明项目说明项目说明</p>\r\n<p>项目说明项目说明</p>','doing','1',NULL,NULL,NULL),(6,'150208-66608','世园大道道路项目44','青岛市政府','崂山区李沙路','道路','projectManager',NULL,'2015-02-08','2016-02-08','2016-02-08','<p>项目说明项目说明项目说明项目说明</p>\r\n<p>项目说明项目说明</p>\r\n<p>项目说明项目说明项目说明项目说明项目说明项目说明</p>\r\n<p>项目说明项目说明项目说明项目说明项目说明项目说明项目说明项目说明项目说明项目说明项目说明项目说明</p>','doing','1',NULL,NULL,NULL),(7,'150208-23670','世园大道道路项目55','青岛市政府','崂山区李沙路','道路','projectManager',NULL,'2015-02-08','2016-02-08','2016-02-08','<p>fdsafdsafdsafdsa</p>\r\n<p>fdsaf</p>\r\n<p>dsafd</p>\r\n<p>safdsafdsafdsafdsafdsa</p>','doing','1',NULL,NULL,NULL),(8,'150208-48369','世园大道道路项目66','青岛市政府','崂山区李沙路','道路','projectManager',NULL,'2015-02-08','2016-02-08','2016-02-08','<p>fdsafdsafdsaf</p>\r\n<p>fdsafdsafdsafdsaf</p>\r\n<p>dsafdsafdsafdsafdsafds</p>\r\n<p>afdsafdsafdsafdsafdsafdsafdsafdsa</p>','doing','1',NULL,NULL,NULL),(9,'150301-89254','八大湖楼盘改造','八大湖社区','市南区八大湖街道','改造','projectManager',NULL,'2015-03-01','2015-05-02','2015-03-05','市南区八大湖街道市南区八大湖街道市南区八大湖街道','doing','0',NULL,NULL,NULL),(10,'150306-18936','世园大道道路项目88','青岛市政府','崂山区李沙路','sprint','',NULL,'2015-03-06','0000-00-00','0000-00-00','工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明','doing','1',NULL,NULL,NULL),(11,'150306-65715','青岛高新区防潮坝工程附属工程','青岛高新区政府','青岛高新区','waterfall','admin',NULL,'2015-03-06','0000-00-00','0000-00-00','青岛高新区防潮坝工程附属工程青岛高新区防潮坝工程附属工程','doing','1',NULL,NULL,NULL),(12,'150306-43377','青岛高新区防潮坝工程附属工程123','青岛高新区政府','青岛高新区','sprint','admin',NULL,'2015-03-06','0000-00-00','0000-00-00','青岛高新区防潮坝工程附属工程青岛高新区防潮坝工程附属工程青岛高新区防潮坝工程附属工程青岛高新区防潮坝工程附属工程青岛高新区防潮坝工程附属工程','doing','1',NULL,NULL,NULL),(13,'150306-85226','世园大道道路项目99','青岛市政府','崂山区李沙路','sprint','dev2',NULL,'2015-03-06','2015-05-30','2015-05-29','工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明','doing','1',NULL,NULL,NULL),(14,'150306-38803','青岛高新区防潮坝工程附属工程234234','青岛高新区政府','青岛高新区','sprint','admin',NULL,'2015-03-06','0000-00-00','0000-00-00','市南区八大湖街道市南区八大湖街道市南区八大湖街道','doing','1',NULL,NULL,NULL),(15,'150306-55604','青岛高新区防潮坝工程附属工程1','青岛高新区政府','市南区八大湖街道','waterfall','dev1',NULL,'2015-03-06','2015-06-28','2015-06-21','工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明工程说明','doing','1',NULL,NULL,NULL),(16,'150306-64848','青岛高新区防潮坝工程附属工程334','青岛高新区政府','青岛高新区','sprint','admin',NULL,'2015-03-06','2015-03-15','0000-00-00','<img src=\"data/upload/1/201503/062329280344191d.png\" alt=\"\" /><img src=\"data/upload/1/201503/0623292803764ta4.png\" alt=\"\" />','doing','1',NULL,NULL,NULL),(17,'150307-75056','青岛高新区防潮坝工程附属工程-C','青岛高新区政府','青岛高新区','sprint','projectManager',NULL,'2015-03-07','2016-03-06','0000-00-00','青岛高新区政府青岛高新区政府青岛高新区政府青岛高新区政府青岛高新区政府青岛高新区政府青岛高新区政府','doing','0',NULL,NULL,NULL),(18,'150307-42631','三星王沙路段道路工程','青岛市政府','王沙路','sprint','projectManager',NULL,'2015-03-07','2015-07-01','2015-06-15','三星王沙路段道路工程三星王沙路段道路工程三星王沙路段道路工程三星王沙路段道路工程三星王沙路段道路工程','doing','0',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tm_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_projectproduct`
--

DROP TABLE IF EXISTS `tm_projectproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_projectproduct` (
  `project` mediumint(8) unsigned NOT NULL,
  `product` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`project`,`product`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_projectproduct`
--

LOCK TABLES `tm_projectproduct` WRITE;
/*!40000 ALTER TABLE `tm_projectproduct` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_projectproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_projectstory`
--

DROP TABLE IF EXISTS `tm_projectstory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_projectstory` (
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `product` mediumint(8) unsigned NOT NULL,
  `story` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `version` smallint(6) NOT NULL DEFAULT '1',
  UNIQUE KEY `project` (`project`,`story`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_projectstory`
--

LOCK TABLES `tm_projectstory` WRITE;
/*!40000 ALTER TABLE `tm_projectstory` DISABLE KEYS */;
INSERT INTO `tm_projectstory` VALUES (1,1,4,1),(1,1,3,2),(1,1,2,1),(1,1,1,1);
/*!40000 ALTER TABLE `tm_projectstory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_release`
--

DROP TABLE IF EXISTS `tm_release`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_release` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `build` mediumint(8) unsigned NOT NULL,
  `name` char(30) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `stories` text NOT NULL,
  `bugs` text NOT NULL,
  `desc` text NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_release`
--

LOCK TABLES `tm_release` WRITE;
/*!40000 ALTER TABLE `tm_release` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_release` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_report`
--

DROP TABLE IF EXISTS `tm_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL COMMENT 'Project ID',
  `daily_id` bigint(20) NOT NULL COMMENT '表 Daily',
  `staff_qty` int(4) DEFAULT '0' COMMENT '公司职员数',
  `extternal_qty` int(4) DEFAULT '0' COMMENT '外聘人员数',
  `lunch_qty` int(4) DEFAULT '0' COMMENT '午饭人数',
  `supper_qty` int(11) DEFAULT '0' COMMENT '晚饭人数',
  `planned_qty` text COMMENT '计划工程量',
  `actual_qty` text COMMENT '实际工程量',
  `type` enum('today','tomorrow') NOT NULL DEFAULT 'today' COMMENT '本日情况/明日计划',
  `material_remark` text COMMENT '明日计划 > 材料备注',
  `machine_remark` text COMMENT '明日计划 > 机械备注',
  `created_by` varchar(30) NOT NULL COMMENT '创建者用户名',
  `report_date` date NOT NULL COMMENT '报告日期',
  `verified` int(2) DEFAULT '0',
  `verified_by` varchar(30) DEFAULT NULL,
  `verified_date` datetime DEFAULT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_report`
--

LOCK TABLES `tm_report` WRITE;
/*!40000 ALTER TABLE `tm_report` DISABLE KEYS */;
INSERT INTO `tm_report` VALUES (1,1,0,10,5,15,15,'计划工程量','实际工程量','today',NULL,NULL,'admin','2015-02-07',0,'',NULL,0,'2015-02-07 10:00:30','2015-02-07 10:00:30'),(2,1,0,10,5,15,15,'计划工程量','实际工程量','today',NULL,NULL,'admin','2015-02-07',0,'',NULL,0,'2015-02-07 10:02:22','2015-02-07 10:02:22'),(3,1,0,10,5,15,15,'计划工程量','实际工程量','today',NULL,NULL,'admin','2015-02-07',0,'',NULL,0,'2015-02-07 10:04:25','2015-02-07 10:04:25'),(4,8,3,10,10,20,20,'fdsafdsaf','dsafdsafdsafdsafdsa','today',NULL,NULL,'admin','2015-02-17',0,'',NULL,0,'2015-02-17 06:11:46','2015-02-17 06:11:46'),(5,9,6,10,5,15,14,'','','',NULL,NULL,'admin','2015-03-02',0,'',NULL,0,'2015-03-02 21:51:18','2015-03-02 21:51:18'),(6,9,6,0,0,0,0,'','','',NULL,NULL,'admin','2015-03-02',0,'',NULL,0,'2015-03-02 21:51:48','2015-03-02 21:51:48'),(7,9,6,0,0,0,0,'ed','AdsaDSAdsa','',NULL,NULL,'admin','2015-03-02',0,'',NULL,0,'2015-03-02 21:52:05','2015-03-02 21:52:05'),(8,9,6,10,5,15,14,'','','',NULL,NULL,'admin','2015-03-02',0,'',NULL,0,'2015-03-02 21:52:09','2015-03-02 21:52:09'),(9,9,6,10,5,15,14,'','','',NULL,NULL,'admin','2015-03-02',0,'',NULL,0,'2015-03-02 21:52:12','2015-03-02 21:52:12'),(10,9,6,10,5,15,14,'','','',NULL,NULL,'admin','2015-03-02',0,'',NULL,0,'2015-03-02 21:52:16','2015-03-02 21:52:16'),(11,9,6,10,5,15,15,'ed','AdsaDSAdsa','',NULL,NULL,'admin','2015-03-02',0,'',NULL,0,'2015-03-02 21:52:21','2015-03-02 21:52:21'),(12,9,6,11,11,22,22,'','','',NULL,NULL,'admin','2015-03-02',0,'',NULL,0,'2015-03-02 21:54:28','2015-03-02 21:54:28'),(13,9,6,11,11,22,22,'FDSAFDS','AFDSAFDSAFDSAFD','',NULL,NULL,'admin','2015-03-02',0,'',NULL,0,'2015-03-02 22:12:22','2015-03-02 22:12:22'),(14,9,6,11,11,22,22,'FDSAFDS','AFDSAFDSAFDSAFD','',NULL,NULL,'admin','2015-03-02',0,'',NULL,0,'2015-03-02 22:17:30','2015-03-02 22:17:30'),(15,16,8,10,5,15,14,'','','today',NULL,NULL,'admin','2015-03-06',0,NULL,NULL,0,'2015-03-06 23:35:58','2015-03-06 23:35:58'),(16,16,8,11,12,1,34,'哈哈','完成计划所有小问题','today',NULL,NULL,'admin','2015-03-06',0,NULL,NULL,0,'2015-03-06 23:53:26','2015-03-06 23:53:26'),(17,17,9,0,0,0,0,'计划工程量100','实际工程量160','today',NULL,NULL,'admin','2015-03-07',1,'admin','2015-03-07 07:02:02',0,'2015-03-07 06:59:17','2015-03-07 07:02:02'),(18,17,10,10,20,1,14,'计划工程量10000','实际工程量345','today',NULL,NULL,'admin','2015-03-06',1,'admin','2015-03-07 07:04:29',0,'2015-03-07 07:04:15','2015-03-07 07:04:29'),(19,18,12,10,5,15,14,'计划工程量:100','实际工程量：200','today',NULL,NULL,'admin','2015-03-06',1,'admin','2015-03-07 09:12:57',0,'2015-03-07 09:09:13','2015-03-07 09:12:57'),(20,18,13,11,2,34,22,'22','2','today',NULL,NULL,'admin','2015-03-10',0,NULL,NULL,0,'2015-03-10 20:35:13','2015-03-10 20:35:13'),(21,18,13,23,33,33,33,'2','2','today',NULL,NULL,'admin','2015-03-10',0,NULL,NULL,0,'2015-03-10 20:35:47','2015-03-10 20:35:47');
/*!40000 ALTER TABLE `tm_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_story`
--

DROP TABLE IF EXISTS `tm_story`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_story` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `module` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `plan` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `source` varchar(20) NOT NULL,
  `fromBug` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT '',
  `pri` tinyint(3) unsigned NOT NULL DEFAULT '3',
  `estimate` float unsigned NOT NULL,
  `status` enum('','changed','active','draft','closed') NOT NULL DEFAULT '',
  `stage` enum('','wait','planned','projected','developing','developed','testing','tested','verified','released') NOT NULL DEFAULT 'wait',
  `mailto` varchar(255) NOT NULL DEFAULT '',
  `openedBy` varchar(30) NOT NULL DEFAULT '',
  `openedDate` datetime NOT NULL,
  `assignedTo` varchar(30) NOT NULL DEFAULT '',
  `assignedDate` datetime NOT NULL,
  `lastEditedBy` varchar(30) NOT NULL DEFAULT '',
  `lastEditedDate` datetime NOT NULL,
  `reviewedBy` varchar(255) NOT NULL,
  `reviewedDate` date NOT NULL,
  `closedBy` varchar(30) NOT NULL DEFAULT '',
  `closedDate` datetime NOT NULL,
  `closedReason` varchar(30) NOT NULL,
  `toBug` mediumint(9) NOT NULL,
  `childStories` varchar(255) NOT NULL,
  `linkStories` varchar(255) NOT NULL,
  `duplicateStory` mediumint(8) unsigned NOT NULL,
  `version` smallint(6) NOT NULL DEFAULT '1',
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product` (`product`,`module`,`plan`,`type`,`pri`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_story`
--

LOCK TABLES `tm_story` WRITE;
/*!40000 ALTER TABLE `tm_story` DISABLE KEYS */;
INSERT INTO `tm_story` VALUES (1,1,1,1,'po',0,'首页设计和开发','','',1,1,'active','developed','','productManager','2012-06-05 10:09:49','productManager','0000-00-00 00:00:00','productManager','2012-06-05 10:25:19','productManager, ','2012-06-05','','0000-00-00 00:00:00','',0,'','',0,1,'0'),(2,1,2,1,'po',0,'新闻中心的设计和开发。','','',1,1,'active','developed','','productManager','2012-06-05 10:16:37','productManager','2012-06-05 10:16:37','productManager','2012-06-05 10:25:33','productManager, ','2012-06-05','','0000-00-00 00:00:00','',0,'','',0,1,'0'),(3,1,3,1,'po',0,'成果展示的设计和开发','','',1,0,'active','developed','','productManager','2012-06-05 10:18:10','productManager','2012-06-05 10:18:10','productManager','2012-06-05 10:25:38','productManager, ','2012-06-05','','0000-00-00 00:00:00','',0,'','',0,2,'0'),(4,1,4,1,'po',0,'售后服务的设计和开发','','',1,1,'active','projected','','productManager','2012-06-05 10:20:16','productManager','2012-06-05 10:20:16','productManager','2012-06-05 10:25:42','productManager, ','2012-06-05','','0000-00-00 00:00:00','',0,'','',0,1,'0'),(5,1,5,1,'po',0,'诚聘英才的设计和开发','','',1,1,'draft','planned','','productManager','2012-06-05 10:21:39','productManager','2012-06-05 10:21:39','','0000-00-00 00:00:00','','0000-00-00','','0000-00-00 00:00:00','',0,'','',0,1,'0'),(6,1,6,1,'po',0,'合作洽谈的设计和开发','','',1,1,'draft','planned','','productManager','2012-06-05 10:23:11','productManager','2012-06-05 10:23:11','','0000-00-00 00:00:00','','0000-00-00','','0000-00-00 00:00:00','',0,'','',0,1,'0'),(7,1,7,1,'po',0,'关于我们的设计和开发','','',1,1,'draft','planned','','productManager','2012-06-05 10:24:19','productManager','2012-06-05 10:24:19','','0000-00-00 00:00:00','','0000-00-00','','0000-00-00 00:00:00','',0,'','',0,1,'0');
/*!40000 ALTER TABLE `tm_story` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_storyspec`
--

DROP TABLE IF EXISTS `tm_storyspec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_storyspec` (
  `story` mediumint(9) NOT NULL,
  `version` smallint(6) NOT NULL,
  `title` varchar(90) NOT NULL,
  `spec` text NOT NULL,
  `verify` text NOT NULL,
  UNIQUE KEY `story` (`story`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_storyspec`
--

LOCK TABLES `tm_storyspec` WRITE;
/*!40000 ALTER TABLE `tm_storyspec` DISABLE KEYS */;
INSERT INTO `tm_storyspec` VALUES (1,1,'首页设计和开发','作为一名本公司的用户，我希望可以在首页看到该公司网站的基本内容，例如最新动态、部分成果展示、联系信息、工商信息等。<br />','开发并通过验收<br />'),(2,1,'新闻中心的设计和开发。','作为一名本公司的用户，我希望可以在新闻中心看到该公司网站的企业新闻，这样可以通过新闻了解企业的最新动态。<br />',''),(3,1,'成果展示的设计和开发','&nbsp;作为一名本公司的用户，我希望可以在成果展示看到该公司网站的企业新闻，这样可以方便我进行了解该公司的产品并进行购买。&nbsp;<br />',''),(3,2,'成果展示的设计和开发','&nbsp;作为一名本公司的用户，我希望可以在成果展示看到该公司网站的吹产品，这样可以方便我进行了解该公司的产品并进行购买。&nbsp;<br />',''),(4,1,'售后服务的设计和开发','作为一名本公司的用户，我希望可以在售后服务看到该公司网站的售后服务，这样可以方便我联系该公司来解决我的问题。&nbsp;<br />',''),(5,1,'诚聘英才的设计和开发','作为一名求职者，我希望可以在诚聘英才里看到该公司的招聘信息，这样可以方便我应聘该公司。&nbsp;<br />',''),(6,1,'合作洽谈的设计和开发','作为一名合作商，我希望可以在合作洽谈里看到该公司对外的合作内容，这样可以方便我和该公司进行合作洽谈。&nbsp;<br />',''),(7,1,'关于我们的设计和开发','我希望可以在关于我们里看到该公司的基本信息，这样可以方便我了解该公司。<br />','');
/*!40000 ALTER TABLE `tm_storyspec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_task`
--

DROP TABLE IF EXISTS `tm_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_task` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `module` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `story` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `storyVersion` smallint(6) NOT NULL DEFAULT '1',
  `fromBug` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `pri` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `estimate` float unsigned NOT NULL,
  `consumed` float unsigned NOT NULL,
  `left` float unsigned NOT NULL,
  `deadline` date NOT NULL,
  `status` enum('wait','doing','done','pause','cancel','closed') NOT NULL DEFAULT 'wait',
  `mailto` varchar(255) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `openedBy` varchar(30) NOT NULL,
  `openedDate` datetime NOT NULL,
  `assignedTo` varchar(30) NOT NULL,
  `assignedDate` datetime NOT NULL,
  `estStarted` date NOT NULL,
  `realStarted` date NOT NULL,
  `finishedBy` varchar(30) NOT NULL,
  `finishedDate` datetime NOT NULL,
  `canceledBy` varchar(30) NOT NULL,
  `canceledDate` datetime NOT NULL,
  `closedBy` varchar(30) NOT NULL,
  `closedDate` datetime NOT NULL,
  `closedReason` varchar(30) NOT NULL,
  `lastEditedBy` varchar(30) NOT NULL,
  `lastEditedDate` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_task`
--

LOCK TABLES `tm_task` WRITE;
/*!40000 ALTER TABLE `tm_task` DISABLE KEYS */;
INSERT INTO `tm_task` VALUES (1,1,0,1,1,0,'首页页面的设计','design',1,10,7,0,'0000-00-00','done','','首页页面的设计<br />','projectManager','2012-06-05 10:32:03','projectManager','2012-06-05 10:41:20','0000-00-00','0000-00-00','dev1','2012-06-05 10:41:20','','0000-00-00 00:00:00','','0000-00-00 00:00:00','','dev1','2012-06-05 10:41:20','0'),(2,1,0,1,1,0,'首页的开发','devel',1,10,8,0,'0000-00-00','done','','首页的开发<br />','projectManager','2012-06-05 10:32:23','dev1','2012-06-05 10:41:20','0000-00-00','0000-00-00','dev1','2012-06-05 10:41:20','','0000-00-00 00:00:00','','0000-00-00 00:00:00','','dev1','2012-06-05 10:41:20','0'),(3,1,0,2,1,0,'新闻中心的设计','design',1,8,8,0,'0000-00-00','done','','新闻中心的设计<br />','projectManager','2012-06-05 10:33:01','dev2','2012-06-05 10:42:56','0000-00-00','0000-00-00','dev2','2012-06-05 10:42:56','','0000-00-00 00:00:00','','0000-00-00 00:00:00','','dev2','2012-06-05 10:42:56','0'),(4,1,0,2,1,0,'新闻中心的开发','devel',1,8,5,0,'0000-00-00','done','','新闻中心的开发<br />','projectManager','2012-06-05 10:33:21','dev2','2012-06-05 10:42:56','0000-00-00','0000-00-00','dev2','2012-06-05 10:42:56','','0000-00-00 00:00:00','','0000-00-00 00:00:00','','dev2','2012-06-05 10:42:56','0'),(5,1,0,3,2,0,'成果展示的设计','design',1,8,5,0,'0000-00-00','done','','成果展示的设计<br />','projectManager','2012-06-05 10:33:44','dev3','2012-06-05 10:43:32','0000-00-00','0000-00-00','dev3','2012-06-05 10:43:32','','0000-00-00 00:00:00','','0000-00-00 00:00:00','','dev3','2012-06-05 10:43:32','0'),(6,1,0,3,2,0,'成果展示的开发','devel',1,8,5,0,'0000-00-00','done','','成果展示的开发<br />','projectManager','2012-06-05 10:33:59','dev3','2012-06-05 10:43:32','0000-00-00','0000-00-00','dev3','2012-06-05 10:43:32','','0000-00-00 00:00:00','','0000-00-00 00:00:00','','dev3','2012-06-05 10:43:32','0'),(7,1,0,4,1,0,'售后服务的设计','design',1,8,0,8,'0000-00-00','cancel','','售后服务的设计<br />','projectManager','2012-06-05 10:34:25','projectManager','2012-06-05 10:41:20','0000-00-00','0000-00-00','','0000-00-00 00:00:00','dev1','2012-06-05 10:41:20','','0000-00-00 00:00:00','','dev1','2012-06-05 10:41:20','0'),(8,1,0,4,1,0,'售后服务的开发','devel',1,8,6,0,'0000-00-00','cancel','','售后服务的开发<br />','projectManager','2012-06-05 10:34:45','projectManager','2012-06-05 10:41:20','0000-00-00','0000-00-00','dev1','0000-00-00 00:00:00','dev1','2012-06-05 10:41:20','','0000-00-00 00:00:00','','dev1','2012-06-05 10:41:20','0'),(9,1,0,4,1,0,'售后服务的开发','devel',1,8,0,8,'0000-00-00','cancel','','售后服务的开发<br />','projectManager','2012-06-05 10:35:01','projectManager','2012-06-05 10:41:20','0000-00-00','0000-00-00','','0000-00-00 00:00:00','dev1','2012-06-05 10:41:20','','0000-00-00 00:00:00','','dev1','2012-06-05 10:41:20','0');
/*!40000 ALTER TABLE `tm_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_taskestimate`
--

DROP TABLE IF EXISTS `tm_taskestimate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_taskestimate` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `task` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `left` float unsigned NOT NULL DEFAULT '0',
  `consumed` float unsigned NOT NULL,
  `account` char(30) NOT NULL DEFAULT '',
  `work` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task` (`task`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_taskestimate`
--

LOCK TABLES `tm_taskestimate` WRITE;
/*!40000 ALTER TABLE `tm_taskestimate` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_taskestimate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_team`
--

DROP TABLE IF EXISTS `tm_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_team` (
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `account` char(30) NOT NULL DEFAULT '',
  `role` char(30) NOT NULL DEFAULT '',
  `join` date NOT NULL DEFAULT '0000-00-00',
  `days` smallint(5) unsigned NOT NULL,
  `hours` float(2,1) unsigned NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`project`,`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_team`
--

LOCK TABLES `tm_team` WRITE;
/*!40000 ALTER TABLE `tm_team` DISABLE KEYS */;
INSERT INTO `tm_team` VALUES (1,'dev3','研发','2013-02-20',184,7.0),(1,'productManager','产品经理','2013-02-20',184,7.0),(1,'tester2','测试','2013-02-20',184,7.0),(1,'tester1','测试','2013-02-20',184,7.0),(2,'projectManager','项目经理','2013-02-20',365,7.0),(2,'tester2','测试','2013-02-20',365,7.0),(2,'tester1','测试','2013-02-20',365,7.0),(2,'dev3','研发','2013-02-20',365,7.0),(2,'dev2','研发','2013-02-20',365,7.0),(2,'dev1','研发','2013-02-20',365,7.0),(1,'dev1','研发','2013-02-20',184,7.0),(1,'dev2','研发','2013-02-20',184,7.0),(1,'projectManager','项目经理','2013-02-20',184,7.0),(1,'testManager','测试主管','2013-02-20',184,7.0),(2,'productManager','产品经理','2013-02-20',365,7.0),(3,'admin','','2015-02-07',0,7.0);
/*!40000 ALTER TABLE `tm_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_testation`
--

DROP TABLE IF EXISTS `tm_testation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_testation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `daily_id` bigint(20) NOT NULL COMMENT '表 Daily',
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `report_date` date NOT NULL,
  `verified` int(2) DEFAULT '0',
  `verified_by` varchar(30) DEFAULT NULL,
  `verified_date` datetime DEFAULT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `created_by` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_testation`
--

LOCK TABLES `tm_testation` WRITE;
/*!40000 ALTER TABLE `tm_testation` DISABLE KEYS */;
INSERT INTO `tm_testation` VALUES (1,1,0,'fdsafdsaf','','2015-02-06',0,NULL,NULL,0,'admin','2015-02-06 21:54:32','2015-02-06 21:54:32'),(2,8,0,'资费标准','内容','2015-02-12',0,NULL,NULL,0,'admin','2015-02-12 07:22:07','2015-02-12 07:22:07'),(3,9,4,'土地情况','土地情况上冻了','2015-03-01',0,NULL,NULL,0,'admin','2015-03-01 12:48:51','2015-03-01 12:48:51'),(4,18,11,'土地情况','土地情况土地情况土地情况土地情况土地情况','2015-03-07',0,NULL,NULL,0,'admin','2015-03-07 09:44:15','2015-03-07 09:44:15');
/*!40000 ALTER TABLE `tm_testation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_testresult`
--

DROP TABLE IF EXISTS `tm_testresult`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_testresult` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `run` mediumint(8) unsigned NOT NULL,
  `case` mediumint(8) unsigned NOT NULL,
  `version` smallint(5) unsigned NOT NULL,
  `caseResult` char(30) NOT NULL,
  `stepResults` text NOT NULL,
  `lastRunner` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `run` (`run`),
  KEY `case` (`case`,`version`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_testresult`
--

LOCK TABLES `tm_testresult` WRITE;
/*!40000 ALTER TABLE `tm_testresult` DISABLE KEYS */;
INSERT INTO `tm_testresult` VALUES (1,4,1,1,'pass','a:1:{i:1;a:2:{s:6:\"result\";s:4:\"pass\";s:4:\"real\";s:0:\"\";}}','testManager','2012-06-05 11:11:00'),(2,3,2,1,'pass','a:1:{i:2;a:2:{s:6:\"result\";s:4:\"pass\";s:4:\"real\";s:0:\"\";}}','testManager','2012-06-05 11:11:05'),(3,2,3,1,'pass','a:1:{i:3;a:2:{s:6:\"result\";s:4:\"pass\";s:4:\"real\";s:0:\"\";}}','testManager','2012-06-05 11:11:07'),(4,1,4,1,'pass','a:1:{i:4;a:2:{s:6:\"result\";s:4:\"pass\";s:4:\"real\";s:0:\"\";}}','testManager','2012-06-05 11:11:08');
/*!40000 ALTER TABLE `tm_testresult` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_testrun`
--

DROP TABLE IF EXISTS `tm_testrun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_testrun` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `task` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `case` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `version` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `assignedTo` char(30) NOT NULL DEFAULT '',
  `lastRunner` varchar(30) NOT NULL,
  `lastRunDate` datetime NOT NULL,
  `lastRunResult` char(30) NOT NULL,
  `status` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `task` (`task`,`case`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_testrun`
--

LOCK TABLES `tm_testrun` WRITE;
/*!40000 ALTER TABLE `tm_testrun` DISABLE KEYS */;
INSERT INTO `tm_testrun` VALUES (1,1,4,1,'','testManager','2012-06-05 11:11:08','pass','done'),(2,1,3,1,'','testManager','2012-06-05 11:11:07','pass','done'),(3,1,2,1,'','testManager','2012-06-05 11:11:05','pass','done'),(4,1,1,1,'','testManager','2012-06-05 11:11:00','pass','done');
/*!40000 ALTER TABLE `tm_testrun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_testtask`
--

DROP TABLE IF EXISTS `tm_testtask`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_testtask` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(90) NOT NULL,
  `product` mediumint(8) unsigned NOT NULL,
  `project` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `build` char(30) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `pri` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `desc` text NOT NULL,
  `report` text NOT NULL,
  `status` enum('blocked','doing','wait','done') NOT NULL DEFAULT 'wait',
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_testtask`
--

LOCK TABLES `tm_testtask` WRITE;
/*!40000 ALTER TABLE `tm_testtask` DISABLE KEYS */;
INSERT INTO `tm_testtask` VALUES (1,'企业网站第一期测试任务',1,1,'trunk','testManager',0,'2012-06-05','2013-06-21','','','wait','0');
/*!40000 ALTER TABLE `tm_testtask` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_todo`
--

DROP TABLE IF EXISTS `tm_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_todo` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(30) NOT NULL,
  `date` date NOT NULL,
  `begin` smallint(4) unsigned zerofill NOT NULL,
  `end` smallint(4) unsigned zerofill NOT NULL,
  `type` char(10) NOT NULL,
  `idvalue` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `pri` tinyint(3) unsigned NOT NULL,
  `name` char(150) NOT NULL,
  `desc` text NOT NULL,
  `status` enum('wait','doing','done') NOT NULL DEFAULT 'wait',
  `private` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_todo`
--

LOCK TABLES `tm_todo` WRITE;
/*!40000 ALTER TABLE `tm_todo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_todo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_user`
--

DROP TABLE IF EXISTS `tm_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_user` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `dept` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `account` char(30) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `role` char(10) NOT NULL DEFAULT '',
  `realname` char(30) NOT NULL DEFAULT '',
  `nickname` char(60) NOT NULL DEFAULT '',
  `commiter` varchar(100) NOT NULL,
  `avatar` char(30) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `gender` enum('f','m') NOT NULL DEFAULT 'f',
  `email` char(90) NOT NULL DEFAULT '',
  `skype` char(90) NOT NULL DEFAULT '',
  `qq` char(20) NOT NULL DEFAULT '',
  `yahoo` char(90) NOT NULL DEFAULT '',
  `gtalk` char(90) NOT NULL DEFAULT '',
  `wangwang` char(90) NOT NULL DEFAULT '',
  `mobile` char(11) NOT NULL DEFAULT '',
  `phone` char(20) NOT NULL DEFAULT '',
  `address` char(120) NOT NULL DEFAULT '',
  `zipcode` char(10) NOT NULL DEFAULT '',
  `join` date NOT NULL DEFAULT '0000-00-00',
  `visits` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  `last` int(10) unsigned NOT NULL DEFAULT '0',
  `fails` tinyint(5) NOT NULL DEFAULT '0',
  `locked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`),
  KEY `dept` (`dept`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_user`
--

LOCK TABLES `tm_user` WRITE;
/*!40000 ALTER TABLE `tm_user` DISABLE KEYS */;
INSERT INTO `tm_user` VALUES (1,0,'admin','7fef6171469e80d32c0559f88b377245','others','超级管理员','','admin','','1970-01-01','m','','','','','','','','','','','2015-03-16',98,'222.43.172.186',1426492004,0,'0000-00-00 00:00:00','0'),(2,5,'productManager','e10adc3949ba59abbe56e057f20f883e','po','张三','','','','0000-00-00','m','','','','','','','','','','','0000-00-00',3,'192.168.0.8',1338866083,0,'0000-00-00 00:00:00','1'),(3,0,'luan','75e266f182b4fa3625d4a4f4f779af54','pm','栾经理','','','','0000-00-00','m','','','','','','','','','','','2015-03-16',4,'222.43.172.186',1426491561,0,'0000-00-00 00:00:00','0'),(4,2,'dev1','e10adc3949ba59abbe56e057f20f883e','dev','开发甲','','','','0000-00-00','m','','','','','','','','','','','0000-00-00',1,'192.168.0.8',1338863860,0,'0000-00-00 00:00:00','1'),(5,2,'dev2','e10adc3949ba59abbe56e057f20f883e','dev','开发乙','','','','0000-00-00','m','','','','','','','','','','','0000-00-00',1,'192.168.0.8',1338864116,0,'0000-00-00 00:00:00','1'),(6,2,'dev3','e10adc3949ba59abbe56e057f20f883e','dev','开发丙','','','','0000-00-00','m','','','','','','','','','','','0000-00-00',1,'192.168.0.8',1338864187,0,'0000-00-00 00:00:00','1'),(7,3,'tester1','e10adc3949ba59abbe56e057f20f883e','qa','测试甲','','','','0000-00-00','m','','','','','','','','','','','0000-00-00',3,'192.168.0.8',1338865739,0,'0000-00-00 00:00:00','1'),(8,3,'tester2','e10adc3949ba59abbe56e057f20f883e','qa','测试乙','','','','0000-00-00','m','','','','','','','','','','','0000-00-00',2,'192.168.0.8',1338865450,0,'0000-00-00 00:00:00','1'),(9,3,'tester3','e10adc3949ba59abbe56e057f20f883e','qa','测试丙','','','','0000-00-00','m','','','','','','','','','','','0000-00-00',1,'192.168.0.8',1338865125,0,'0000-00-00 00:00:00','1'),(10,1,'testManager','e10adc3949ba59abbe56e057f20f883e','qd','测试经理','','','','0000-00-00','m','','','','','','','','','','','0000-00-00',6,'192.168.0.8',1338865842,0,'0000-00-00 00:00:00','1'),(11,2,'wang','75e266f182b4fa3625d4a4f4f779af54','fi','王经理','','','','0000-00-00','m','','','','','','','','','','','2015-03-06',5,'222.43.172.186',1426491873,0,'0000-00-00 00:00:00','0'),(12,0,'zhang','75e266f182b4fa3625d4a4f4f779af54','vr','张经理','','','','0000-00-00','f','','','','','','','','','','','2015-03-16',3,'222.43.172.186',1426492122,0,'0000-00-00 00:00:00','0'),(13,0,'manager','75e266f182b4fa3625d4a4f4f779af54','pm','王总','','','','0000-00-00','m','','','','','','','','','','','2015-03-16',1,'222.43.172.186',1426491911,0,'0000-00-00 00:00:00','0'),(14,3,'jxgl','75e266f182b4fa3625d4a4f4f779af54','mm','机械部经理','','','','0000-00-00','m','','','','','','','','','','','2015-03-16',2,'222.43.172.186',1426508469,0,'0000-00-00 00:00:00','0');
/*!40000 ALTER TABLE `tm_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_usercontact`
--

DROP TABLE IF EXISTS `tm_usercontact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_usercontact` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(30) NOT NULL,
  `listName` varchar(60) NOT NULL,
  `userList` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_usercontact`
--

LOCK TABLES `tm_usercontact` WRITE;
/*!40000 ALTER TABLE `tm_usercontact` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_usercontact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_usergroup`
--

DROP TABLE IF EXISTS `tm_usergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_usergroup` (
  `account` char(30) NOT NULL DEFAULT '',
  `group` mediumint(8) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `account` (`account`,`group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_usergroup`
--

LOCK TABLES `tm_usergroup` WRITE;
/*!40000 ALTER TABLE `tm_usergroup` DISABLE KEYS */;
INSERT INTO `tm_usergroup` VALUES ('jxgl',14),('luan',15),('luan',16),('manager',17),('wang',12),('zhang',13),('zhang',18);
/*!40000 ALTER TABLE `tm_usergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_userquery`
--

DROP TABLE IF EXISTS `tm_userquery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_userquery` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(30) NOT NULL,
  `module` varchar(30) NOT NULL,
  `title` varchar(90) NOT NULL,
  `form` text NOT NULL,
  `sql` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account` (`account`),
  KEY `module` (`module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_userquery`
--

LOCK TABLES `tm_userquery` WRITE;
/*!40000 ALTER TABLE `tm_userquery` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_userquery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tm_usertpl`
--

DROP TABLE IF EXISTS `tm_usertpl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tm_usertpl` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(30) NOT NULL,
  `type` char(30) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account` (`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tm_usertpl`
--

LOCK TABLES `tm_usertpl` WRITE;
/*!40000 ALTER TABLE `tm_usertpl` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_usertpl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-17  6:22:16
