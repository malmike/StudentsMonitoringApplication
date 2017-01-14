CREATE DATABASE  IF NOT EXISTS `sma_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sma_db`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: sma_db
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` varchar(10) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent`
--

LOCK TABLES `parent` WRITE;
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
INSERT INTO `parent` VALUES (1,'PAR001','James Kayero','0784548392','jkayero@gmail.com','Active','qwe123'),(3,'PAR004','Mikolo Lemo','098766432','mikolo@gmail.com','Active','qwerty123'),(4,'PAR005','Timothy Magee','0798474873','tmagee@yahoo.com','Active','qwerty123'),(5,'PAR006','Floid Limo','0793847387','floid@gmail.com','Active','qwerty123'),(6,'PAR007','Hilton James','0793846384','hilton@gmail.com','Active','qwerty123'),(7,'PAR002','Klaid Swon','0794874848','klaid@gmail.com','Active','qwerty123'),(9,'PAR009','Kean Shaul','0798573832','kshaul@gmail.com','Active','qwe123'),(11,'PAR003','Kuebya Jollie','0794739274','jkuebya@gmail.com','Active','qwe123');
/*!40000 ALTER TABLE `parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent_has_student`
--

DROP TABLE IF EXISTS `parent_has_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parent_has_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parent_has_student_student1_idx` (`student_id`),
  KEY `fk_parent_has_student_parent1_idx` (`parent_id`),
  CONSTRAINT `fk_parent_has_student_parent1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_parent_has_student_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent_has_student`
--

LOCK TABLES `parent_has_student` WRITE;
/*!40000 ALTER TABLE `parent_has_student` DISABLE KEYS */;
INSERT INTO `parent_has_student` VALUES (1,1,1),(4,3,2),(5,1,3),(6,5,4),(7,7,5),(8,4,6),(9,5,7),(10,7,8),(11,4,9),(12,5,10),(13,9,11),(14,11,12);
/*!40000 ALTER TABLE `parent_has_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results_per_paper`
--

DROP TABLE IF EXISTS `results_per_paper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results_per_paper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Marks` float NOT NULL,
  `student_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `subject_paper_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_results_per_paper_student1_idx` (`student_id`),
  KEY `fk_results_per_paper_class1_idx` (`stream_id`),
  KEY `fk_results_per_paper_subject_paper1_idx` (`subject_paper_id`),
  KEY `fk_results_per_paper_test1_idx` (`test_id`),
  CONSTRAINT `fk_results_per_paper_class1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_results_per_paper_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_results_per_paper_subject_paper1` FOREIGN KEY (`subject_paper_id`) REFERENCES `subject_paper` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_results_per_paper_test1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results_per_paper`
--

LOCK TABLES `results_per_paper` WRITE;
/*!40000 ALTER TABLE `results_per_paper` DISABLE KEYS */;
/*!40000 ALTER TABLE `results_per_paper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stream`
--

DROP TABLE IF EXISTS `stream`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stream` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(10) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stream`
--

LOCK TABLES `stream` WRITE;
/*!40000 ALTER TABLE `stream` DISABLE KEYS */;
INSERT INTO `stream` VALUES (1,'Senior 1','S1 A',2010),(2,'Senior 1','S1 B',2010),(3,'Senior 1','S1 C',2010),(4,'Senior 2','S2 A',2010),(5,'Senior 2','S2 B',2010),(6,'Senior 2','S2 C',2010),(7,'Senior 3','S3 A',2010),(8,'Senior 3','S3 B',2010),(9,'Senior 3','S3 C',2010);
/*!40000 ALTER TABLE `stream` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stream_has_subject`
--

DROP TABLE IF EXISTS `stream_has_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stream_has_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stream_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stream_has_subject_subject1_idx` (`subject_id`),
  KEY `fk_stream_has_subject_stream1_idx` (`stream_id`),
  KEY `fk_stream_has_subject_teacher1_idx` (`teacher_id`),
  CONSTRAINT `fk_stream_has_subject_stream1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_stream_has_subject_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_stream_has_subject_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stream_has_subject`
--

LOCK TABLES `stream_has_subject` WRITE;
/*!40000 ALTER TABLE `stream_has_subject` DISABLE KEYS */;
INSERT INTO `stream_has_subject` VALUES (1,1,1,1),(2,4,1,1),(3,7,1,1),(4,2,2,3),(5,2,3,2),(6,3,2,3);
/*!40000 ALTER TABLE `stream_has_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `student_first_name` varchar(45) DEFAULT NULL,
  `student_last_name` varchar(45) DEFAULT NULL,
  `parent_name` varchar(45) DEFAULT NULL,
  `parent_email` varchar(45) DEFAULT NULL,
  `parent_phone_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id_UNIQUE` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'STUD001','Mukasa','Derrick','James Kayero','jkayero@gmail.com','0784548392'),(2,'STUD003','James','Kalendo','Mikolo Lemo','mikolo@gmail.com','098766432'),(3,'STUD004','Simon','Kireso','James Kayero','jkayero@gmail.com','0784548392'),(4,'STUD005','Jimo','Leslie','Floid Limo','floid@gmail.com','0793847387'),(5,'STUD009','Hully','Tremon','Klaid Swon','klaid@gmail.com','0794874848'),(6,'STUD010','Remon','Huyot','Timothy Magee','tmagee@yahoo.com','0798474873'),(7,'STUD013','Kishuti','Jeremiah','Floid Limo','floid@gmail.com','0793847387'),(8,'STUD014','Julie','Ganuke','Klaid Swon','klaid@gmail.com','0794874848'),(9,'STUD015','Hulion','Termen','Timothy Magee','tmagee@yahoo.com','0798474873'),(10,'STUD089','Yumen','Huylon','Floid Limo','floid@gmail.com','0793847387'),(11,'STUD067','Jean','Lolye','Kean Shaul','kshaul@gmail.com','0798573832'),(12,'STUD027','Huilton','Kenema','Kuebya Jollie','jkuebya@gmail.com','0794739274'),(13,'STUD035','Junye','Kuneme','Jielse Nuoma','jnuoma@gmail.com','0784738329');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_has_subject`
--

DROP TABLE IF EXISTS `student_has_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_has_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_has_subject_subject1_idx` (`subject_id`),
  KEY `fk_student_has_subject_student1_idx` (`student_id`),
  CONSTRAINT `fk_student_has_subject_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_subject_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_has_subject`
--

LOCK TABLES `student_has_subject` WRITE;
/*!40000 ALTER TABLE `student_has_subject` DISABLE KEYS */;
INSERT INTO `student_has_subject` VALUES (1,1,7),(2,1,2),(3,1,3),(4,2,7),(5,2,3),(6,3,4),(7,3,1),(8,4,1),(9,4,7),(10,2,6),(11,1,6),(12,1,4),(13,1,5),(14,2,1),(15,2,4),(16,2,5),(18,3,2),(19,3,3),(20,3,5),(21,3,6),(22,4,2),(23,4,3),(24,4,4),(25,4,5),(26,4,6),(27,5,1),(28,5,2),(29,5,3),(30,5,4),(31,5,5),(32,5,6),(33,5,7),(34,6,1),(35,6,2),(36,6,3),(37,6,4),(38,6,5),(39,6,6),(40,6,7),(41,7,1),(42,8,1),(43,9,1),(44,10,1);
/*!40000 ALTER TABLE `student_has_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_in_stream`
--

DROP TABLE IF EXISTS `student_in_stream`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_in_stream` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stream_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_has_class_class1_idx` (`stream_id`),
  KEY `fk_student_in_stream_student1_idx` (`student_id`),
  CONSTRAINT `fk_student_has_class_class1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_in_stream_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_in_stream`
--

LOCK TABLES `student_in_stream` WRITE;
/*!40000 ALTER TABLE `student_in_stream` DISABLE KEYS */;
INSERT INTO `student_in_stream` VALUES (1,1,1),(2,1,2),(3,1,4),(4,1,6),(5,1,10),(6,2,3),(7,2,5),(8,3,7),(9,3,8),(10,7,9);
/*!40000 ALTER TABLE `student_in_stream` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `number_of_papers` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,'BIO001','Biology',2),(2,'CHEM002','Chemistry',3),(3,'PHY003','Physics',3),(4,'MTH004','Mathematics',2),(5,'ENG001','English',2),(6,'HIST089','History',2),(7,'GEO093','Geography',2);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_paper`
--

DROP TABLE IF EXISTS `subject_paper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_paper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `number` int(11) NOT NULL,
  `final_score_average` int(11) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  KEY `fk_subject_paper_subject1_idx` (`subject_id`),
  CONSTRAINT `fk_subject_paper_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_paper`
--

LOCK TABLES `subject_paper` WRITE;
/*!40000 ALTER TABLE `subject_paper` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_paper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_results`
--

DROP TABLE IF EXISTS `subject_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marks` float DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_results_student1_idx` (`student_id`),
  KEY `fk_subject_results_class1_idx` (`stream_id`),
  KEY `fk_subject_results_test1_idx` (`test_id`),
  KEY `fk_subject_results_subject1_idx` (`subject_id`),
  CONSTRAINT `fk_subject_results_class1` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_results_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_results_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_results_test1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_results`
--

LOCK TABLES `subject_results` WRITE;
/*!40000 ALTER TABLE `subject_results` DISABLE KEYS */;
INSERT INTO `subject_results` VALUES (1,56,4,1,1,1),(2,78,2,1,1,1),(3,89,6,1,1,1),(4,73,10,1,1,1),(5,66,4,1,2,1),(6,83,2,1,2,1),(7,74,6,1,2,1),(8,27,10,1,2,1),(9,81,4,1,3,1),(10,68,2,1,3,1),(11,93,6,1,3,1),(12,67,10,1,3,1),(13,87,4,1,4,1),(14,78,2,1,4,1),(15,67,6,1,4,1),(16,82,10,1,4,1),(17,37,4,1,5,1),(18,83,6,1,5,1),(19,48,2,1,5,1),(20,74,10,1,5,1),(21,89,4,1,6,1),(22,68,6,1,6,1),(23,49,2,1,6,1),(24,85,10,1,6,1),(25,78,2,1,1,7),(26,83,2,1,1,3),(27,92,2,1,1,6),(28,64,2,1,1,4),(29,79,2,1,1,5);
/*!40000 ALTER TABLE `subject_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'InActive',
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teacher_id_UNIQUE` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'TCH001','Sam Fisher','0712751541','samf@gmail.com','Active','qwe123'),(2,'TCH002','James Kalingo','0752837849','jkalingo@gmail.com','Active','qwe123'),(3,'TCH003','Chris Solina','0712947783','csolina@gmail.com','Active','qwe123'),(4,'TCH004','James Kalingo','0785973748','jkalingo@gmail.com','Active','qwerty123'),(5,'TCH005','Paul Kaliso','0773484874','pkaliso@gmail.com','Active','qwerty123'),(6,'TCH006','Phillip Keyune','0784859384','pkeyune@gmail.com','Active','qwerty123'),(7,'TCH007','Ameliya Joram','0797583658','ameliyaj@gmail.com','InActive','qwerty123'),(8,'TCH009','Mal Mike','905873832','malmike21@outlook.com','Admin','qwerty123'),(19,'TCH190','Miko Lombo','078965076','miko@gmail.com','InActive','qwerty123');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_teaches`
--

DROP TABLE IF EXISTS `teacher_teaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher_teaches` (
  `teacher_id` int(11) NOT NULL,
  `stream_has_subject_paper_has_teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_id`,`stream_has_subject_paper_has_teacher_id`),
  KEY `fk_teacher_has_stream_has_subject_paper_has_teacher_teacher_idx` (`teacher_id`),
  CONSTRAINT `fk_teacher_has_stream_has_subject_paper_has_teacher_teacher1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_teaches`
--

LOCK TABLES `teacher_teaches` WRITE;
/*!40000 ALTER TABLE `teacher_teaches` DISABLE KEYS */;
/*!40000 ALTER TABLE `teacher_teaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term` int(11) NOT NULL,
  `test_type` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,1,'BOT',2010),(2,1,'Assign 1',2010),(3,1,'Assign 2',2010),(4,1,'Assign 2',2010),(5,1,'MOT',2010),(6,1,'Assign 3',2010),(7,1,'Assign 4',2010),(8,1,'EOT',2010),(9,2,'MOT',2010),(10,2,'BOT',2010),(11,2,'Assign 1',2010),(12,2,'Assign 2',2010),(13,2,'Assign 2',2010),(14,2,'MOT',2010),(15,2,'Assign 3',2010),(16,2,'Assign 4',2010),(17,2,'EOT',2010),(18,3,'BOT',2010),(19,3,'Assign 1',2010),(20,3,'Assign 2',2010),(21,3,'Assign 2',2010),(22,3,'MOT',2010),(23,3,'Assign 3',2010),(24,3,'Assign 4',2010),(25,3,'EOT',2010);
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-21  6:02:31
