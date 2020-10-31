-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: db_ccmed
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `acesso`
--

DROP TABLE IF EXISTS `acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acesso` (
  `id_acesso` int(4) NOT NULL AUTO_INCREMENT,
  `nome_acesso` varchar(20) NOT NULL,
  `desc_acesso` varchar(300) NOT NULL,
  PRIMARY KEY (`id_acesso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acesso`
--

LOCK TABLES `acesso` WRITE;
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
INSERT INTO `acesso` VALUES (1,'Obra','Acesso a consultas e pedidos de materiais do estoque'),(2,'Estoque','Acesso a consultas, reservas, liberação de pedidos e cadastros de materiais e fornecedores'),(3,'Administrador','Acesso a todas as informações do sistema, como consultas, cadastro de materiais, fornecedores e novos usuários');
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `id_cidade` int(4) NOT NULL AUTO_INCREMENT,
  `nome_cidade` varchar(20) NOT NULL,
  `id_estado_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_cidade`),
  KEY `id_estado_fk` (`id_estado_fk`),
  CONSTRAINT `CIDADE_ibfk_1` FOREIGN KEY (`id_estado_fk`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (1,'São Paulo',1),(2,'Guarujá',1),(3,'Cotia',1),(4,'Santos',1),(5,'Ribeirão Preto',1),(6,'Campinas',1);
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coluna`
--

DROP TABLE IF EXISTS `coluna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coluna` (
  `id_coluna` int(4) NOT NULL AUTO_INCREMENT,
  `nome_coluna` varchar(15) NOT NULL,
  `id_corr_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_coluna`),
  KEY `id_corr_fk` (`id_corr_fk`),
  CONSTRAINT `COLUNA_ibfk_1` FOREIGN KEY (`id_corr_fk`) REFERENCES `corredor` (`id_corr`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coluna`
--

LOCK TABLES `coluna` WRITE;
/*!40000 ALTER TABLE `coluna` DISABLE KEYS */;
INSERT INTO `coluna` VALUES (1,'coluna 1',1),(2,'coluna 2',1),(3,'coluna 3',1),(4,'coluna 4',1),(5,'coluna 5',1),(6,'coluna 6',2),(7,'coluna 7',2),(8,'coluna 8',2),(9,'coluna 9',2),(10,'coluna 10',2),(35,'coluna 11',2);
/*!40000 ALTER TABLE `coluna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corredor`
--

DROP TABLE IF EXISTS `corredor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `corredor` (
  `id_corr` int(4) NOT NULL AUTO_INCREMENT,
  `nome_corredor` varchar(15) NOT NULL,
  PRIMARY KEY (`id_corr`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corredor`
--

LOCK TABLES `corredor` WRITE;
/*!40000 ALTER TABLE `corredor` DISABLE KEYS */;
INSERT INTO `corredor` VALUES (1,'corredor 1'),(2,'corredor 2'),(3,'pppppppppppo');
/*!40000 ALTER TABLE `corredor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalhe_pedido`
--

DROP TABLE IF EXISTS `detalhe_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalhe_pedido` (
  `id_detalhe` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(4) NOT NULL,
  `id_material_fk` int(4) NOT NULL,
  `id_pedido_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_detalhe`),
  KEY `id_pedido_fk` (`id_pedido_fk`),
  KEY `id_material_fk` (`id_material_fk`),
  CONSTRAINT `DETALHE_PEDIDO_ibfk_1` FOREIGN KEY (`id_pedido_fk`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE,
  CONSTRAINT `DETALHE_PEDIDO_ibfk_2` FOREIGN KEY (`id_material_fk`) REFERENCES `material` (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalhe_pedido`
--

LOCK TABLES `detalhe_pedido` WRITE;
/*!40000 ALTER TABLE `detalhe_pedido` DISABLE KEYS */;
INSERT INTO `detalhe_pedido` VALUES (37,20,12,36),(38,2,1,36),(39,2,2,36),(40,90,3,37),(41,1,12,37),(42,1,12,37),(43,1,12,37),(44,1,12,37),(45,1,12,37),(46,1,12,37),(47,1,12,37),(48,10,2,38),(49,10,2,38),(50,33,2,38),(51,10,1,40),(52,17,2,40),(53,5,1,41),(54,20,2,41),(55,5,1,49),(56,1,1,50),(57,20,2,50),(58,50,6,50),(59,80,3,51);
/*!40000 ALTER TABLE `detalhe_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `id_email_forn` int(4) NOT NULL AUTO_INCREMENT,
  `email_forn` varchar(50) NOT NULL,
  `id_forn_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_email_forn`),
  KEY `id_forn_fk` (`id_forn_fk`),
  CONSTRAINT `EMAIL_ibfk_1` FOREIGN KEY (`id_forn_fk`) REFERENCES `fornecedor` (`id_forn`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES (1,'contato@pedrix.com.br',1),(2,'porto@gmail.com',2),(3,'pavmax@yahoo.com.br',3),(4,'hidromax@gmail.com',4),(5,'construmark@gmail.com',5),(6,'fernandoepis@gmail.com',6);
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(4) NOT NULL AUTO_INCREMENT,
  `nome_estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'SP');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forn_logra_possui`
--

DROP TABLE IF EXISTS `forn_logra_possui`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forn_logra_possui` (
  `id_forn_fk` int(4) NOT NULL,
  `cep_fk` varchar(10) NOT NULL,
  KEY `id_forn_fk` (`id_forn_fk`),
  KEY `cep_fk` (`cep_fk`),
  CONSTRAINT `FORN_LOGRA_POSSUI_ibfk_1` FOREIGN KEY (`id_forn_fk`) REFERENCES `fornecedor` (`id_forn`),
  CONSTRAINT `FORN_LOGRA_POSSUI_ibfk_2` FOREIGN KEY (`cep_fk`) REFERENCES `logradouro` (`cep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forn_logra_possui`
--

LOCK TABLES `forn_logra_possui` WRITE;
/*!40000 ALTER TABLE `forn_logra_possui` DISABLE KEYS */;
INSERT INTO `forn_logra_possui` VALUES (1,'06655678'),(2,'06666666'),(3,'06676666'),(4,'06679876'),(5,'06720120'),(6,'08888999');
/*!40000 ALTER TABLE `forn_logra_possui` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `id_forn` int(4) NOT NULL AUTO_INCREMENT,
  `nome_forn` varchar(30) NOT NULL,
  `num_endereco` int(6) DEFAULT NULL,
  `complemento_end` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id_forn`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'Pedrix',25,''),(2,'Porto Fortaleza',245,''),(3,'Pav Max',900,'a'),(4,'Hidro Max',887,''),(5,'Constru Mark',12,'b'),(6,'Fernando EPIs',80,''),(7,'joao',200,'A');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logradouro`
--

DROP TABLE IF EXISTS `logradouro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logradouro` (
  `cep` varchar(10) NOT NULL,
  `nome_logra` varchar(50) NOT NULL,
  `tipo_logra` varchar(50) NOT NULL,
  `id_cidade_fk` int(4) NOT NULL,
  PRIMARY KEY (`cep`),
  KEY `id_cidade_fk` (`id_cidade_fk`),
  CONSTRAINT `LOGRADOURO_ibfk_1` FOREIGN KEY (`id_cidade_fk`) REFERENCES `cidade` (`id_cidade`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logradouro`
--

LOCK TABLES `logradouro` WRITE;
/*!40000 ALTER TABLE `logradouro` DISABLE KEYS */;
INSERT INTO `logradouro` VALUES ('06655678','dra. Aparecida','rua',6),('06666666','Epitacio Pessoa','avenida',4),('06676666','Sao Joao','rua',2),('06679876','America','avenida',3),('06720120','Assis Valente','rua',1),('08888999','da Paz','rua',5);
/*!40000 ALTER TABLE `logradouro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id_material` int(4) NOT NULL AUTO_INCREMENT,
  `nome_material` varchar(50) NOT NULL,
  `desc_material` varchar(300) NOT NULL,
  `qtde_estoque` int(11) DEFAULT NULL,
  `id_prat_fk` int(4) NOT NULL,
  `id_forn_fk` int(4) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_material`),
  KEY `id_prat_fk` (`id_prat_fk`),
  KEY `id_forn_fk` (`id_forn_fk`),
  CONSTRAINT `MATERIAL_ibfk_1` FOREIGN KEY (`id_prat_fk`) REFERENCES `prateleira` (`id_prat`),
  CONSTRAINT `MATERIAL_ibfk_2` FOREIGN KEY (`id_forn_fk`) REFERENCES `fornecedor` (`id_forn`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'Tubo PVC','100mm',4,1,1,'c4ca4238a0b923820dcc509a6f75849b.jpg'),(2,'Válvula de pressão','50mm',60,2,1,'c81e728d9d4c2f636f067f89cc14862c.jpg'),(3,'Braçadeira','100mm',10,3,2,'eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg'),(4,'Cotovelo PVC','90mm',50,4,2,'a87ff679a2f3e71d9181a67b7542122c.jpg'),(5,'TE PVC','100mm',40,5,3,'e4da3b7fbbce2345d7772b0674a318d5.png'),(6,'Tubo PVC','50mm',30,6,3,'1679091c5a880faf6fb5e6087eb1b2dc.jpg'),(7,'Tampa de registro','Tam. único',90,7,4,'8f14e45fceea167a5a36dedd4bea2543.jpg'),(8,'Cimento','50kg',50,8,4,'c9f0f895fb98ab9159f51fd0297e236d.jpg'),(9,'Argamassa','50kg',30,9,5,'45c48cce2e2d7fbdea1afc51c7c6ad26.jpg'),(10,'Pá','Aço inox',20,10,5,'d3d9446802a44259755d38e6d163e820.png'),(11,'Bota bico de aço','Tam. 40',30,11,6,'6512bd43d9caa6e02c990b0a82652dca.jpg'),(12,'Alicate de corte','15 polegadas',9,3,1,'c20ad4d76fe97759aa27a0c99bff6710.jpg');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id_pedido` int(4) NOT NULL AUTO_INCREMENT,
  `data_abertura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vencimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_fechamento` datetime DEFAULT NULL,
  `status_pedido` varchar(20) NOT NULL,
  `id_usuario_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_usuario_fk` (`id_usuario_fk`),
  CONSTRAINT `PEDIDO_ibfk_1` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (28,'2020-10-29 23:34:26','2020-10-29 23:34:26',NULL,'Aberto',1),(29,'2020-10-29 23:35:54','2020-10-29 23:35:54',NULL,'Aberto',1),(30,'2020-10-29 23:38:33','2020-10-29 23:38:33',NULL,'Aberto',1),(36,'2020-10-29 23:48:55','2020-10-29 23:48:55',NULL,'Aberto',1),(37,'2020-10-30 01:02:54','2020-10-30 01:02:54',NULL,'Aberto',1),(38,'2020-10-30 01:27:27','2020-10-30 01:27:27',NULL,'Aberto',1),(40,'2020-10-30 02:01:43','2020-10-30 02:01:43',NULL,'Aberto',2),(41,'2020-10-30 02:12:38','2020-10-30 02:12:38',NULL,'Aberto',1),(45,'2020-10-30 03:26:58','2020-10-30 03:26:58',NULL,'Aberto',1),(48,'2020-10-30 03:32:27','2020-10-30 03:32:27',NULL,'Aberto',1),(49,'2020-10-30 03:33:49','2020-10-30 03:33:49',NULL,'Aberto',1),(50,'2020-10-30 03:36:26','2020-10-30 03:36:26',NULL,'Aberto',1),(51,'2020-10-30 03:40:54','2020-10-30 03:40:54',NULL,'Aberto',1),(53,'2020-10-30 03:46:20','2020-10-30 03:46:20',NULL,'Aberto',1);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prateleira`
--

DROP TABLE IF EXISTS `prateleira`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prateleira` (
  `id_prat` int(4) NOT NULL AUTO_INCREMENT,
  `nome_prat` varchar(5) NOT NULL,
  `id_coluna_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_prat`),
  KEY `id_coluna_fk` (`id_coluna_fk`),
  CONSTRAINT `PRATELEIRA_ibfk_1` FOREIGN KEY (`id_coluna_fk`) REFERENCES `coluna` (`id_coluna`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prateleira`
--

LOCK TABLES `prateleira` WRITE;
/*!40000 ALTER TABLE `prateleira` DISABLE KEYS */;
INSERT INTO `prateleira` VALUES (1,'a',1),(2,'b',1),(3,'c',1),(4,'d',1),(5,'a',2),(6,'b',2),(7,'c',2),(8,'d',2),(9,'a',3),(10,'b',3),(11,'c',3),(12,'d',3),(13,'a',4),(14,'b',4),(15,'c',4),(16,'d',4);
/*!40000 ALTER TABLE `prateleira` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone` (
  `id_telefone` int(4) NOT NULL AUTO_INCREMENT,
  `numero_tel` varchar(20) NOT NULL,
  `id_forn_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_telefone`),
  KEY `id_forn_fk` (`id_forn_fk`),
  CONSTRAINT `TELEFONE_ibfk_1` FOREIGN KEY (`id_forn_fk`) REFERENCES `fornecedor` (`id_forn`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone`
--

LOCK TABLES `telefone` WRITE;
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
INSERT INTO `telefone` VALUES (1,'3344-4477',1),(2,'3324-4666',2),(3,'3456-7889',3),(4,'3144-0099',4),(5,'3377-8877',5),(6,'2112-4227',6);
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `matricula` int(4) NOT NULL,
  `id_acesso_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `id_acesso_fk` (`id_acesso_fk`),
  CONSTRAINT `USUARIO_ibfk_1` FOREIGN KEY (`id_acesso_fk`) REFERENCES `acesso` (`id_acesso`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'jose','1234','José','Silva',998,1),(2,'joao','1111','João','Santos',2228,1),(3,'kl','4321','Kleber','Alves',221,2),(4,'fernando','3344','Fernando','Souza',989,2),(5,'marcio','989898','Marcio','Freitas',134,2),(6,'matheus','3331234','Matheus','Castro',11,3),(7,'jorge','9994','Jorge','Santana',98,3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-30 23:48:14
