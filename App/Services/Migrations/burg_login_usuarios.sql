-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: burg_login
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (4,'test','$2y$10$ofey8vTEDlc955Cyv/J4purNB9/C6MdXbq1XDaaH8/6hBbiFFxOZu','1'),(6,'prueba','$2y$10$H8oIx7e6X66czG7nLSBYqOH7fVdeYalxYLaoOnlDQbfthqH/sCcLG','1'),(7,'test2','$2y$10$PSYQmV863vxP4RvRzA4Oz.Uc9H.NaEvPCc9H5iEAZZOmQhF7Ego1a','1'),(8,'test3','$2y$10$63sde3ujQ/h0.WSk5DUVJ.LXE6IkEdqobQd4RvTTKxQYcyFLO1mGy','1'),(9,'test4','$2y$10$ZxinsVYHTJkRFGFO/j0iKu8s7hTcS/ILkySEb/n3F80nCFKs51h/G','1'),(10,'test5','$2y$10$cahEZEBwusaSl30oCuThEeDNw.NhgdLNwwe33pTAdgO5R8m9DgP0S','1'),(11,'test6','$2y$10$F22lnr/LqC5jyoh7v4DU5eUK4AlZQktHDOFG3tgB6zJTu0RQyDRVO','1'),(12,'test8','$2y$10$D1m6ppmlSQOkPNh2MkbGjuB3Qa2OKfqTPzY0mx7cCKVbSxlxgOsUG','1'),(13,'test11','$2y$10$E9FWlTtIirBHV1MTsoAmfO40J/cLzKTFB6XkF0wuHPiDB8yDh71Nq','1');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-24  2:11:45
