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
  `nome_cidade` varchar(50) NOT NULL,
  `id_estado_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_cidade`),
  UNIQUE KEY `nome_cidade` (`nome_cidade`),
  UNIQUE KEY `nome_cidade_2` (`nome_cidade`),
  KEY `id_estado_fk` (`id_estado_fk`),
  CONSTRAINT `CIDADE_ibfk_1` FOREIGN KEY (`id_estado_fk`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (1,'São Paulo',1),(2,'Guarujá',1),(3,'Cotia',1),(4,'Santos',1),(5,'Ribeirão Preto',1),(6,'Campinas',1),(9,'Marília',1),(11,'Forn City',1),(12,'Teste FLP',1),(14,'TTT',1),(16,'io',1),(18,'z',1),(19,'za',1),(21,'s',1),(22,'dd',1),(23,'ss',1),(24,'oiu',1),(25,'gjhgj',1),(27,'tangamandapio',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coluna`
--

LOCK TABLES `coluna` WRITE;
/*!40000 ALTER TABLE `coluna` DISABLE KEYS */;
INSERT INTO `coluna` VALUES (1,'coluna 1',1),(2,'coluna 2',1),(3,'coluna 3',1),(4,'coluna 4',1),(5,'coluna 5',1),(6,'coluna 6',2),(7,'coluna 7',2),(8,'coluna 8',2),(9,'coluna 9',2),(10,'coluna 10',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corredor`
--

LOCK TABLES `corredor` WRITE;
/*!40000 ALTER TABLE `corredor` DISABLE KEYS */;
INSERT INTO `corredor` VALUES (1,'corredor 1'),(2,'corredor 2');
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
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalhe_pedido`
--

LOCK TABLES `detalhe_pedido` WRITE;
/*!40000 ALTER TABLE `detalhe_pedido` DISABLE KEYS */;
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
  `email_forn` varchar(100) NOT NULL,
  `id_forn_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_email_forn`),
  UNIQUE KEY `email_forn` (`email_forn`),
  KEY `id_forn_fk` (`id_forn_fk`),
  CONSTRAINT `EMAIL_ibfk_1` FOREIGN KEY (`id_forn_fk`) REFERENCES `fornecedor` (`id_forn`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES (1,'contato@pedrix.com.br',1),(2,'porto@gmail.com',2),(3,'pavmax@yahoo.com.br',3),(4,'hidromax@gmail.com',4),(5,'construmark@gmail.com',5),(6,'fernandoepis@gmail.com',6),(7,'a@a',8),(8,'o@o',9),(10,'alv@alv.com',11),(11,'O@Oo',12),(12,'forn@forn.com',13),(13,'s@s',14),(15,'TTT@TTT',16),(19,'z@z',20),(20,'za@za',21),(22,'o@2',23),(23,'iu@iu',24),(25,'poi@pi',26),(26,'tuyt@tuyt',27),(27,'alv@alvaro.com',28),(28,'forn@99',29);
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
  `id_flp` int(11) NOT NULL AUTO_INCREMENT,
  `id_forn_fk` int(4) NOT NULL,
  `cep_fk` varchar(10) NOT NULL,
  PRIMARY KEY (`id_flp`),
  KEY `id_forn_fk` (`id_forn_fk`),
  KEY `cep_fk` (`cep_fk`),
  CONSTRAINT `FORN_LOGRA_POSSUI_ibfk_1` FOREIGN KEY (`id_forn_fk`) REFERENCES `fornecedor` (`id_forn`),
  CONSTRAINT `FORN_LOGRA_POSSUI_ibfk_2` FOREIGN KEY (`cep_fk`) REFERENCES `logradouro` (`CEP`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forn_logra_possui`
--

LOCK TABLES `forn_logra_possui` WRITE;
/*!40000 ALTER TABLE `forn_logra_possui` DISABLE KEYS */;
INSERT INTO `forn_logra_possui` VALUES (1,1,'06655678'),(2,2,'06666666'),(3,3,'06676666'),(4,4,'06679876'),(5,5,'06720120'),(6,6,'08888999'),(15,24,'90'),(16,25,'9898'),(17,26,'998'),(18,27,'089'),(19,28,'123'),(20,29,'10'),(21,30,'989898');
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'Pedrix',25,''),(2,'Porto Fortaleza',245,''),(3,'Pav Max',900,'a'),(4,'Hidro Max',887,''),(5,'Constru Mark',12,'b'),(6,'Fernando EPIs',80,'a'),(7,'joao',200,'A'),(8,'alvaro',308,'a'),(9,'a',1,'a'),(10,'o',309,'a'),(11,'o',309,'a'),(12,'Álvaro',11,'a'),(13,'OO',11,'w'),(14,'Forn',11,'oo'),(15,'Teste FLP',1,'a'),(16,'Teste FLP',1,'a'),(17,'TTT',1,'TTT'),(18,'TTT',1,'TTT'),(19,'p',9,'o9'),(20,'p',9,'o9'),(21,'z',9090,'z'),(22,'za',90,'za'),(23,'za',90,'za'),(24,'orrr',2,'s'),(25,'iu',9,'s'),(26,'d',11,'ss'),(27,'poi',11,'oiu'),(28,'utyut',7676,'hh'),(29,'Álvaro',9,'a'),(30,'forn',9,'w');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logradouro`
--

DROP TABLE IF EXISTS `logradouro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logradouro` (
  `id_logra` int(11) NOT NULL AUTO_INCREMENT,
  `CEP` varchar(20) NOT NULL,
  `nome_logra` varchar(50) NOT NULL,
  `tipo_logra` varchar(50) NOT NULL,
  `id_cidade_fk` int(4) NOT NULL,
  PRIMARY KEY (`id_logra`),
  UNIQUE KEY `nome_logra` (`nome_logra`),
  UNIQUE KEY `CEP` (`CEP`),
  KEY `id_cidade_fk` (`id_cidade_fk`),
  CONSTRAINT `LOGRADOURO_ibfk_1` FOREIGN KEY (`id_cidade_fk`) REFERENCES `cidade` (`id_cidade`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logradouro`
--

LOCK TABLES `logradouro` WRITE;
/*!40000 ALTER TABLE `logradouro` DISABLE KEYS */;
INSERT INTO `logradouro` VALUES (1,'1','a','Rua',6),(2,'06679876','America','avenida',3),(3,'06720120','Assis Valente','rua',1),(4,'08888999','da Paz','rua',5),(5,'06655678','dra. Aparecida','rua',6),(6,'06666666','Epitacio Pessoa','avenida',4),(7,'11111','Rua Epitacio','Rua',9),(8,'06676666','Sao Joao','rua',2),(9,'9898989','do Forn','Rua',11),(10,'2','teste','Rua',12),(12,'11','TTT','Rua',14),(14,'99','p','Rua',16),(16,'9090','z','Rua',18),(17,'90','za','Rua',19),(20,'9898','oioi','Rua',22),(21,'998','ss','Rua',23),(22,'089','poi','Rua',24),(23,'123','uyuyiy','Rua',25),(24,'10','Rua 1','Rua',25),(25,'989898','Rua do teste','Rua',27);
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'Tubo PVC','100mm',98,1,1,'c4ca4238a0b923820dcc509a6f75849b.jpg'),(2,'Válvula de pressão','50mm',100,2,1,'c81e728d9d4c2f636f067f89cc14862c.jpg'),(3,'Abraçadeira','100mm',90,3,2,'eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg'),(4,'Cotovelo PVC','90mm',100,4,2,'a87ff679a2f3e71d9181a67b7542122c.jpg'),(5,'TE PVC','100mm',140,5,3,'e4da3b7fbbce2345d7772b0674a318d5.png'),(6,'Tubo PVC','50mm',29,6,3,'1679091c5a880faf6fb5e6087eb1b2dc.jpg'),(7,'Tampa de registro','Tam. único',76,7,4,'8f14e45fceea167a5a36dedd4bea2543.jpg'),(8,'Cimento','50kg',50,8,4,'c9f0f895fb98ab9159f51fd0297e236d.jpg'),(9,'Argamassa','50kg',28,9,5,'45c48cce2e2d7fbdea1afc51c7c6ad26.jpg'),(10,'Pá','Aço inox',20,10,5,'d3d9446802a44259755d38e6d163e820.png'),(11,'Bota bico de aço','Tam. 40',30,11,6,'6512bd43d9caa6e02c990b0a82652dca.jpg'),(12,'Alicate de corte','15 polegadas',9,3,1,'c20ad4d76fe97759aa27a0c99bff6710.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_cancelado`
--

DROP TABLE IF EXISTS `pedido_cancelado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_cancelado` (
  `id_pedido_cancelado` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido_original` int(11) NOT NULL,
  `data_abertura` datetime NOT NULL,
  `vencimento` datetime NOT NULL,
  `data_fechamento` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status_pedido` varchar(20) NOT NULL,
  `id_usuario_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_pedido_cancelado`),
  KEY `id_usuario_fk` (`id_usuario_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_cancelado`
--

LOCK TABLES `pedido_cancelado` WRITE;
/*!40000 ALTER TABLE `pedido_cancelado` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido_cancelado` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prateleira`
--

LOCK TABLES `prateleira` WRITE;
/*!40000 ALTER TABLE `prateleira` DISABLE KEYS */;
INSERT INTO `prateleira` VALUES (1,'a',1),(2,'b',1),(3,'c',1),(4,'d',1),(5,'a',2),(6,'b',2),(7,'c',2),(8,'d',2),(9,'a',3),(10,'b',3),(11,'c',3),(12,'d',3),(13,'a',4),(14,'b',4),(15,'c',4),(16,'d',4),(17,'a',5),(18,'b',5),(19,'c',5),(20,'d',5),(21,'a',6),(22,'b',6),(23,'c',6),(24,'d',6),(25,'a',7),(26,'b',7),(27,'c',7),(28,'d',7),(29,'a',8),(30,'b',8),(31,'c',8),(32,'d',8),(33,'a',9),(34,'b',9),(35,'c',9),(36,'d',9),(37,'a',10),(38,'b',10),(39,'c',10),(40,'d',10),(41,'a',5),(42,'b',5),(43,'c',5),(44,'d',5),(45,'a',6),(46,'b',6),(47,'c',6),(48,'d',6),(49,'a',7),(50,'b',7),(51,'c',7),(52,'d',7),(53,'a',8),(54,'b',8),(55,'c',8),(56,'d',8),(57,'a',9),(58,'b',9),(59,'c',9),(60,'d',9),(61,'a',10),(62,'b',10),(63,'c',10),(64,'d',10);
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone`
--

LOCK TABLES `telefone` WRITE;
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
INSERT INTO `telefone` VALUES (1,'33444477',1),(2,'33244666',2),(3,'34567889',3),(4,'31440099',4),(5,'33778877',5),(6,'21124227',6),(7,'21123337',7),(8,'1',8),(9,'1',9),(10,'1',10),(11,'11111',11),(12,'1',12),(13,'99999999',13),(14,'1',14),(15,'1',15),(16,'111',16),(17,'111',17),(18,'0',18),(19,'0',19),(20,'0',20),(21,'9898',21),(22,'9898',22),(23,'0',23),(25,'8',25),(28,'9999999',28),(29,'99',29);
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
  `imagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `id_acesso_fk` (`id_acesso_fk`),
  CONSTRAINT `USUARIO_ibfk_1` FOREIGN KEY (`id_acesso_fk`) REFERENCES `acesso` (`id_acesso`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ze','1234','José','Gonçalves',998,1,'4.jpg'),(2,'joao','1111','João','Santos',2228,1,'2.jpg'),(3,'kl','4321','Kleber','Alves',221,2,'5.jpg'),(4,'fernando','3344','Fernando','Souza',989,2,'1.jpg'),(27,'alvaro','123','Álvaro','Campos',80,1,'1.jpg'),(28,'usu','123','usuário','usuario',2000,1,'4.jpg'),(29,'usuarioteste','123','AAAA','TESTE',34343,1,'3.jpg'),(30,'a1','123','Álvaro','Campos',2221,1,'2.jpg'),(35,'alvaro','123','Álvarooooo','Campos',143,1,'1.jpg'),(36,'usuarionovo','123','usuário','usuario',1989,1,'4.jpg');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_coluna`
--

DROP TABLE IF EXISTS `view_coluna`;
/*!50001 DROP VIEW IF EXISTS `view_coluna`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_coluna` AS SELECT 
 1 AS `id_coluna`,
 1 AS `nome_coluna`,
 1 AS `id_corr_fk`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_prat`
--

DROP TABLE IF EXISTS `view_prat`;
/*!50001 DROP VIEW IF EXISTS `view_prat`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_prat` AS SELECT 
 1 AS `id_prat`,
 1 AS `nome_prat`,
 1 AS `id_coluna_fk`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_coluna`
--

/*!50001 DROP VIEW IF EXISTS `view_coluna`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`estudo`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_coluna` AS select `coluna`.`id_coluna` AS `id_coluna`,`coluna`.`nome_coluna` AS `nome_coluna`,`coluna`.`id_corr_fk` AS `id_corr_fk` from `coluna` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_prat`
--

/*!50001 DROP VIEW IF EXISTS `view_prat`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`estudo`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_prat` AS select `prateleira`.`id_prat` AS `id_prat`,`prateleira`.`nome_prat` AS `nome_prat`,`prateleira`.`id_coluna_fk` AS `id_coluna_fk` from `prateleira` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-15 20:51:31
