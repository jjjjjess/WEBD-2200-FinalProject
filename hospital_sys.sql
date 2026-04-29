-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: hospital_sys
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `app_id` int(11) NOT NULL AUTO_INCREMENT,
  `pat_id` int(11) DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `app_date` datetime DEFAULT NULL,
  `reason` text DEFAULT NULL,
  PRIMARY KEY (`app_id`),
  KEY `pat_id` (`pat_id`),
  KEY `doc_id` (`doc_id`),
  CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patients` (`pat_id`) ON DELETE CASCADE,
  CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `pat_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` enum('Paid','Unpaid') DEFAULT 'Unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`bill_id`),
  KEY `pat_id` (`pat_id`),
  CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patients` (`pat_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing`
--

LOCK TABLES `billing` WRITE;
/*!40000 ALTER TABLE `billing` DISABLE KEYS */;
/*!40000 ALTER TABLE `billing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medical_records`
--

DROP TABLE IF EXISTS `medical_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medical_records` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `pat_id` int(11) DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `prescription` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`record_id`),
  KEY `pat_id` (`pat_id`),
  KEY `doc_id` (`doc_id`),
  CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patients` (`pat_id`) ON DELETE CASCADE,
  CONSTRAINT `medical_records_ibfk_2` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_records`
--

LOCK TABLES `medical_records` WRITE;
/*!40000 ALTER TABLE `medical_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `medical_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nurses`
--

DROP TABLE IF EXISTS `nurses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nurses` (
  `nurse_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `ward_assigned` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nurse_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `nurses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nurses`
--

LOCK TABLES `nurses` WRITE;
/*!40000 ALTER TABLE `nurses` DISABLE KEYS */;
/*!40000 ALTER TABLE `nurses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `pat_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `status` enum('Admitted','Outgoing','Deceased') NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`pat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'Liam Smith','Male','1995-03-12','Admitted','2026-04-29 16:54:14'),(2,'Noah Johnson','Male','1989-07-22','Admitted','2026-04-29 16:54:14'),(3,'Oliver Williams','Male','1978-11-05','Admitted','2026-04-29 16:54:14'),(4,'James Brown','Male','1971-01-30','Admitted','2026-04-29 16:54:14'),(5,'Elijah Jones','Male','2005-05-14','Admitted','2026-04-29 16:54:14'),(6,'William Garcia','Male','1962-09-08','Admitted','2026-04-29 16:54:14'),(7,'Henry Miller','Male','1991-12-25','Admitted','2026-04-29 16:54:14'),(8,'Lucas Davis','Male','1997-04-10','Admitted','2026-04-29 16:54:14'),(9,'Benjamin Rodriguez','Male','1983-02-18','Admitted','2026-04-29 16:54:14'),(10,'Theodore Martinez','Male','1969-06-30','Admitted','2026-04-29 16:54:14'),(11,'Emma Hernandez','Female','2002-08-11','Admitted','2026-04-29 16:54:14'),(12,'Charlotte Lopez','Female','1994-10-20','Admitted','2026-04-29 16:54:14'),(13,'Amelia Gonzalez','Female','1986-01-05','Admitted','2026-04-29 16:54:14'),(14,'Sophia Wilson','Female','1975-03-14','Admitted','2026-04-29 16:54:14'),(15,'Mia Anderson','Female','1959-12-01','Admitted','2026-04-29 16:54:14'),(16,'Evelyn Thomas','Female','2000-05-22','Admitted','2026-04-29 16:54:14'),(17,'Harper Taylor','Female','1993-07-07','Admitted','2026-04-29 16:54:14'),(18,'Luna Moore','Female','1984-09-19','Admitted','2026-04-29 16:54:14'),(19,'Ella Jackson','Female','1971-11-28','Admitted','2026-04-29 16:54:14'),(20,'Avery Martin','Female','1995-02-12','Admitted','2026-04-29 16:54:14'),(21,'Sebastian Lee','Male','1987-04-25','Outgoing','2026-04-29 16:54:14'),(22,'Jack Perez','Male','1980-06-15','Outgoing','2026-04-29 16:54:14'),(23,'Owen Thompson','Male','1973-08-05','Outgoing','2026-04-29 16:54:14'),(24,'Samuel White','Male','1998-10-12','Outgoing','2026-04-29 16:54:14'),(25,'Daniel Harris','Male','1966-12-30','Outgoing','2026-04-29 16:54:14'),(26,'Matthew Sanchez','Male','1992-02-14','Outgoing','2026-04-29 16:54:14'),(27,'Jackson Clark','Male','2003-04-01','Outgoing','2026-04-29 16:54:14'),(28,'Alexander Ramirez','Male','1977-06-20','Outgoing','2026-04-29 16:54:14'),(29,'Luke Lewis','Male','1985-08-11','Outgoing','2026-04-29 16:54:14'),(30,'David Robinson','Male','1964-10-29','Outgoing','2026-04-29 16:54:14'),(31,'Scarlett Walker','Female','1999-01-15','Outgoing','2026-04-29 16:54:14'),(32,'Victoria Young','Female','1988-03-24','Outgoing','2026-04-29 16:54:14'),(33,'Madison Allen','Female','1982-05-10','Outgoing','2026-04-29 16:54:14'),(34,'Eleanor King','Female','1974-07-18','Outgoing','2026-04-29 16:54:14'),(35,'Grace Wright','Female','2001-09-05','Outgoing','2026-04-29 16:54:14'),(36,'Chloe Scott','Female','1989-11-12','Outgoing','2026-04-29 16:54:14'),(37,'Penelope Torres','Female','1981-01-30','Outgoing','2026-04-29 16:54:14'),(38,'Layla Nguyen','Female','1970-02-14','Outgoing','2026-04-29 16:54:14'),(39,'Riley Hill','Female','2004-04-22','Outgoing','2026-04-29 16:54:14'),(40,'Zoey Flores','Female','1962-06-08','Outgoing','2026-04-29 16:54:14'),(41,'Joseph Green','Male','1947-08-19','Deceased','2026-04-29 16:54:14'),(42,'Levi Adams','Male','1943-10-11','Deceased','2026-04-29 16:54:14'),(43,'Isaac Nelson','Male','1955-12-25','Deceased','2026-04-29 16:54:14'),(44,'Gabriel Baker','Male','1939-02-14','Deceased','2026-04-29 16:54:14'),(45,'Julian Hall','Male','1951-04-30','Deceased','2026-04-29 16:54:14'),(46,'Anthony Rivera','Male','1934-06-22','Deceased','2026-04-29 16:54:14'),(47,'Dylan Campbell','Male','1958-08-05','Deceased','2026-04-29 16:54:14'),(48,'Wyatt Mitchell','Male','1945-10-18','Deceased','2026-04-29 16:54:14'),(49,'Carter Carter','Male','1941-12-01','Deceased','2026-04-29 16:54:14'),(50,'Thomas Phillips','Male','1953-02-12','Deceased','2026-04-29 16:54:14'),(51,'Lily Evans','Female','1949-04-20','Deceased','2026-04-29 16:54:14'),(52,'Addison Turner','Female','1936-06-05','Deceased','2026-04-29 16:54:14'),(53,'Aubrey Diaz','Female','1942-08-14','Deceased','2026-04-29 16:54:14'),(54,'Stella Parker','Female','1954-10-30','Deceased','2026-04-29 16:54:14'),(55,'Natalie Cruz','Female','1932-12-15','Deceased','2026-04-29 16:54:14'),(56,'Leah Edwards','Female','1957-02-28','Deceased','2026-04-29 16:54:14'),(57,'Hazel Collins','Female','1944-04-10','Deceased','2026-04-29 16:54:14'),(58,'Violet Reyes','Female','1940-06-18','Deceased','2026-04-29 16:54:14'),(59,'Aurora Stewart','Female','1950-08-05','Deceased','2026-04-29 16:54:14'),(60,'Savannah Morris','Female','1938-10-22','Deceased','2026-04-29 16:54:14');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receptionists`
--

DROP TABLE IF EXISTS `receptionists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receptionists` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `receptionists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receptionists`
--

LOCK TABLES `receptionists` WRITE;
/*!40000 ALTER TABLE `receptionists` DISABLE KEYS */;
/*!40000 ALTER TABLE `receptionists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Doctor','Nurse','Receptionist') NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vitals`
--

DROP TABLE IF EXISTS `vitals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vitals` (
  `vitals_id` int(11) NOT NULL AUTO_INCREMENT,
  `pat_id` int(11) DEFAULT NULL,
  `nurse_id` int(11) DEFAULT NULL,
  `blood_pressure` varchar(20) DEFAULT NULL,
  `temperature` decimal(4,1) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`vitals_id`),
  KEY `pat_id` (`pat_id`),
  KEY `nurse_id` (`nurse_id`),
  CONSTRAINT `vitals_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patients` (`pat_id`) ON DELETE CASCADE,
  CONSTRAINT `vitals_ibfk_2` FOREIGN KEY (`nurse_id`) REFERENCES `nurses` (`nurse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vitals`
--

LOCK TABLES `vitals` WRITE;
/*!40000 ALTER TABLE `vitals` DISABLE KEYS */;
/*!40000 ALTER TABLE `vitals` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-29 10:16:08
