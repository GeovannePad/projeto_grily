CREATE DATABASE  IF NOT EXISTS `dbgrily` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbgrily`;
-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: dbgrily
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

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
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `idcurso` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Teatro'),(2,'Dança'),(3,'Música'),(4,'Artes');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudantes`
--

DROP TABLE IF EXISTS `estudantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudantes` (
  `idcurso` int(10) NOT NULL,
  `rm` int(10) NOT NULL,
  `idusuario` int(10) NOT NULL,
  `fone` varchar(45) NOT NULL,
  `dtnascimento` varchar(45) NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `biografia` varchar(500) DEFAULT NULL,
  `idestudante` int(10) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idestudante`),
  KEY `idusuario` (`idusuario`),
  KEY `idcurso` (`idcurso`),
  CONSTRAINT `estudantes_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  CONSTRAINT `estudantes_ibfk_2` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudantes`
--

LOCK TABLES `estudantes` WRITE;
/*!40000 ALTER TABLE `estudantes` DISABLE KEYS */;
INSERT INTO `estudantes` VALUES (3,46387,10,'19996024377','2001-11-22','Rua das rosas, 336','Giovanni Padilha','Eu sou ninguém, ninguém eu sou.                    ',1,'giovanni1.png'),(1,88666,19,'123192391','2201-01-11','rua das lara','Lara Nogueira','dwadeawea',2,'lara3.png'),(4,86981,20,'13213123132','2001-11-22','rua dos testes 123','Lara Noggueira','dwadwad',3,NULL);
/*!40000 ALTER TABLE `estudantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscricoes`
--

DROP TABLE IF EXISTS `inscricoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscricoes` (
  `idinscricao` int(10) NOT NULL AUTO_INCREMENT,
  `fone` varchar(45) NOT NULL,
  `dtnascimento` date NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `biografia` varchar(500) DEFAULT NULL,
  `idcurso` int(10) NOT NULL,
  PRIMARY KEY (`idinscricao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscricoes`
--

LOCK TABLES `inscricoes` WRITE;
/*!40000 ALTER TABLE `inscricoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscricoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idusuario` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `login` varchar(32) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `dtregistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (8,'Giovanni Padilha','geovanne','123434567','Organizador','2018-11-11 22:07:57'),(9,'giovanni','geovannepad','123','Administrador','2018-11-11 22:08:16'),(10,'Giovanni Padilha','giovanni.padilha6174@grily.art','35678','Estudante','2018-11-15 22:58:57'),(11,'Lara Nogueira','lara.nogue2108@grily.art','72889','Estudante','2018-11-16 03:53:01'),(12,'Lara Nogueira','lara.nogue6621@grily.art','53233','Estudante','2018-11-16 03:54:57'),(13,'Lara Nogueira','lara.nogue3685@grily.art','67402','Estudante','2018-11-16 03:54:59'),(14,'Lara Nogueira','lara.nogue8969@grily.art','58674','Estudante','2018-11-16 03:54:59'),(15,'Lara Nogueira','lara.nogue4295@grily.art','31402','Estudante','2018-11-16 03:55:19'),(16,'Lara Nogueira','lara.nogue6367@grily.art','24539','Estudante','2018-11-16 03:55:52'),(17,'Lara Nogueira','lara.nogue2996@grily.art','55382','Estudante','2018-11-16 03:58:23'),(18,'Lara Nogueira','lara.nogue4564@grily.art','49408','Estudante','2018-11-16 03:58:53'),(19,'Lara Nogueira','lara.nogue6912@grily.art','22982','Estudante','2018-11-16 04:01:54'),(20,'Lara Noggueira','lara.noggu3776@grily.art','72741','Estudante','2018-11-16 04:47:10');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbgrily'
--

--
-- Dumping routines for database 'dbgrily'
--
/*!50003 DROP PROCEDURE IF EXISTS `return_last_insert_id` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `return_last_insert_id`(
	inome VARCHAR(45),
    ilogin VARCHAR(32),
    isenha VARCHAR(32),
    itipo VARCHAR(45)
)
BEGIN
	INSERT INTO usuarios (nome, login, senha, tipo) VALUES (inome, ilogin, isenha, itipo);
    SELECT * FROM usuarios WHERE idusuario = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-26  2:25:13
