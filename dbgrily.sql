CREATE DATABASE  IF NOT EXISTS `dbgrilyofficial` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbgrilyofficial`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbgrily
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.37-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
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
 SET character_set_client = utf8mb4 ;
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
 SET character_set_client = utf8mb4 ;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudantes`
--

LOCK TABLES `estudantes` WRITE;
/*!40000 ALTER TABLE `estudantes` DISABLE KEYS */;
INSERT INTO `estudantes` VALUES (3,46387,10,'19996024377','2001-11-22','Rua das rosas, 336','Giovanni Padilha','Eu sou ninguém, ninguém eu sou.                                              ',1,'giovanni1.png'),(2,14121,42,'(19) 12345-6789','2001-11-22','Rua das laras, 123','Lara Nogueira','Eu sou a larinha, e tenho uma varinha, dentro da sua bundinha.',5,'user-icon.png');
/*!40000 ALTER TABLE `estudantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscricoes`
--

DROP TABLE IF EXISTS `inscricoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `inscricoes` (
  `idinscricao` int(10) NOT NULL AUTO_INCREMENT,
  `fone` varchar(45) NOT NULL,
  `dtnascimento` date NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `biografia` varchar(500) DEFAULT NULL,
  `idcurso` int(10) NOT NULL,
  PRIMARY KEY (`idinscricao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscricoes`
--

LOCK TABLES `inscricoes` WRITE;
/*!40000 ALTER TABLE `inscricoes` DISABLE KEYS */;
INSERT INTO `inscricoes` VALUES (2,'1231342131','2001-11-22','ruadasdkwakd','giovanndiwadj','dwakmdawojdjoiuj1o23eomd',2),(3,'1313123','2020-12-01','fodaseeeee','cuuuu','anussssssss',1),(4,'(19) 12345-6789','2001-11-22','Rua das laras, 123','Lara Nogueira','Eu sou a larinha, e tenho uma varinha, dentro da sua bundinha.',2);
/*!40000 ALTER TABLE `inscricoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `idusuario` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `login` varchar(32) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `dtregistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (10,'Giovanni Padilha','giovanni.padilha6174@grily.art','123456789','Estudante','2018-11-15 22:58:57'),(11,'Lara Nogueira','lara.nogue2108@grily.art','72889','Estudante','2018-11-16 03:53:01'),(12,'Lara Nogueira','lara.nogue6621@grily.art','53233','Estudante','2018-11-16 03:54:57'),(13,'Lara Nogueira','lara.nogue3685@grily.art','67402','Estudante','2018-11-16 03:54:59'),(14,'Lara Nogueira','lara.nogue8969@grily.art','58674','Estudante','2018-11-16 03:54:59'),(15,'Lara Nogueira','lara.nogue4295@grily.art','31402','Estudante','2018-11-16 03:55:19'),(16,'Lara Nogueira','lara.nogue6367@grily.art','24539','Estudante','2018-11-16 03:55:52'),(17,'Lara Nogueira','lara.nogue2996@grily.art','55382','Estudante','2018-11-16 03:58:23'),(18,'Lara Nogueira','lara.nogueira8177@grily.art','49408','Estudante','2018-11-16 03:58:53'),(26,'lara','larinha','12345678','Administrador','2018-12-03 20:12:31'),(27,'Giovanniii','giovanni123','12345678','Organizador','2018-12-03 20:12:52'),(28,'Isabella Adorno Malvezzi','isabella.malvezzi1276@grily.art','16930','Estudante','2018-12-04 00:19:27'),(29,'Isabella Adorno Malvezzi','isabella.malvezzi8565@grily.art','57499','Estudante','2018-12-04 00:20:50'),(30,'Isabella Adorno Malvezzi','isabella.malvezzi3419@grily.art','15526','Estudante','2018-12-04 00:21:29'),(31,'Isabella Adorno Malvezzi','isabella.malvezzi1205@grily.art','33368','Estudante','2018-12-04 00:23:09'),(32,'Isabella Adorno Malvezzi','isabella.malvezzi1559@grily.art','77420','Estudante','2018-12-04 00:24:52'),(33,'Isabella Adorno Malvezzi','isabella.malvezzi3389@grily.art','84291','Estudante','2018-12-04 00:27:03'),(34,'Lara Nogueira','lara.nogueira8033@grily.art','13027','Estudante','2018-12-04 00:31:31'),(35,'Lara Nogueira','lara.nogueira3880@grily.art','83341','Estudante','2018-12-04 00:32:30'),(36,'Lara Nogueira','lara.nogueira9412@grily.art','49952','Estudante','2018-12-04 00:33:00'),(37,'Lara Nogueira','lara.nogueira8793@grily.art','62328','Estudante','2018-12-04 00:33:41'),(38,'Lara Nogueira','lara.nogueira3528@grily.art','35782','Estudante','2018-12-04 00:39:13'),(39,'Lara Nogueira','lara.nogueira6918@grily.art','14056','Estudante','2018-12-04 00:42:07'),(40,'Lara Nogueira','lara.nogueira5177@grily.art','15579','Estudante','2018-12-04 00:42:24'),(42,'Lara Nogueira','lara.nogueira4528@grily.art','75139','Estudante','2018-12-04 01:13:46'),(44,'admin','admin','12345678','Administrador','2018-12-04 01:15:09'),(45,'org','org1','12345678','Organizador','2018-12-04 01:15:26');
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

-- Dump completed on 2018-12-03 23:43:15
