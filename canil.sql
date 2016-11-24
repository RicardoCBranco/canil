-- MySQL dump 10.13  Distrib 5.7.15, for Win32 (AMD64)
--
-- Host: localhost    Database: canil
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `acompanhamento`
--

DROP TABLE IF EXISTS `acompanhamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acompanhamento` (
  `id_acompanhamento` int(11) NOT NULL AUTO_INCREMENT,
  `cio` tinyint(1) DEFAULT '0',
  `data_acompanhamento` date DEFAULT NULL,
  `fezes` int(11) DEFAULT NULL,
  `urina` int(11) DEFAULT NULL,
  `comida` int(11) DEFAULT NULL,
  `vomito` tinyint(1) DEFAULT '0',
  `id_canino` int(11) DEFAULT NULL,
  `cpf` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `banho` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_acompanhamento`),
  KEY `id_canino` (`id_canino`),
  KEY `acompanhamento_ibfk_3` (`fezes`),
  KEY `acompanhamento_ibfk_4` (`urina`),
  KEY `acompanhamento_ibfk_5` (`comida`),
  KEY `acompanhamento_ibfk_1` (`cpf`),
  CONSTRAINT `acompanhamento_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `pessoa` (`cpf`),
  CONSTRAINT `acompanhamento_ibfk_2` FOREIGN KEY (`id_canino`) REFERENCES `canino` (`id_canino`),
  CONSTRAINT `acompanhamento_ibfk_3` FOREIGN KEY (`fezes`) REFERENCES `fezes` (`id_fezes`),
  CONSTRAINT `acompanhamento_ibfk_4` FOREIGN KEY (`urina`) REFERENCES `urina` (`id_urina`),
  CONSTRAINT `acompanhamento_ibfk_5` FOREIGN KEY (`comida`) REFERENCES `comida` (`id_comida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acompanhamento`
--

LOCK TABLES `acompanhamento` WRITE;
/*!40000 ALTER TABLE `acompanhamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `acompanhamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_atividade` text COLLATE utf8_bin,
  PRIMARY KEY (`id_atividade`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (1,'Faro de Entorpecentes'),(2,'Faro de Explosivos'),(3,'Busca e Localização de Pessoas'),(4,'Busca e Captura de Pessoas'),(5,'Agility'),(6,'Guarda');
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividade_canino`
--

DROP TABLE IF EXISTS `atividade_canino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividade_canino` (
  `id_atividade` int(11) DEFAULT NULL,
  `id_canino` int(11) DEFAULT NULL,
  KEY `id_atividade` (`id_atividade`),
  KEY `id_canino` (`id_canino`),
  CONSTRAINT `atividade_canino_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`),
  CONSTRAINT `atividade_canino_ibfk_2` FOREIGN KEY (`id_canino`) REFERENCES `canino` (`id_canino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade_canino`
--

LOCK TABLES `atividade_canino` WRITE;
/*!40000 ALTER TABLE `atividade_canino` DISABLE KEYS */;
/*!40000 ALTER TABLE `atividade_canino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `box`
--

DROP TABLE IF EXISTS `box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `box` (
  `id_box` int(11) NOT NULL AUTO_INCREMENT,
  `cod_box` text COLLATE utf8_bin,
  `solario` tinyint(1) DEFAULT NULL,
  `agua_encanada` tinyint(1) DEFAULT NULL,
  `localizacao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_box`),
  KEY `localizacao` (`localizacao`),
  CONSTRAINT `box_ibfk_1` FOREIGN KEY (`localizacao`) REFERENCES `localizacao` (`id_localizacao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `box`
--

LOCK TABLES `box` WRITE;
/*!40000 ALTER TABLE `box` DISABLE KEYS */;
INSERT INTO `box` VALUES (1,'A1',1,1,NULL);
/*!40000 ALTER TABLE `box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canino`
--

DROP TABLE IF EXISTS `canino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canino` (
  `id_canino` int(11) NOT NULL AUTO_INCREMENT,
  `nome_canino` text COLLATE utf8_bin,
  `data_nascimento` date DEFAULT NULL,
  `pedigree` text COLLATE utf8_bin,
  `microchip` text COLLATE utf8_bin,
  `origem` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sexo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `id_raca` int(11) DEFAULT NULL,
  `id_box` int(11) DEFAULT NULL,
  `cpf` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `cor` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_canino`),
  KEY `id_raca` (`id_raca`),
  KEY `id_box` (`id_box`),
  KEY `canino_ibfk_1` (`cpf`),
  CONSTRAINT `canino_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `pessoa` (`cpf`),
  CONSTRAINT `canino_ibfk_2` FOREIGN KEY (`id_raca`) REFERENCES `raca` (`id_raca`),
  CONSTRAINT `canino_ibfk_3` FOREIGN KEY (`id_box`) REFERENCES `box` (`id_box`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canino`
--

LOCK TABLES `canino` WRITE;
/*!40000 ALTER TABLE `canino` DISABLE KEYS */;
INSERT INTO `canino` VALUES (1,'Nuno','2002-01-01',NULL,NULL,'Doação','Macho',1,NULL,'11111111111','Capa Preta'),(2,'Ninja','2012-12-12',NULL,NULL,'Compra','Macho',1,NULL,'11111111111','CPA'),(3,'Bela','2005-03-01',NULL,NULL,'Paga de cruza','Fêmea',1,NULL,'11111111111','CPA'),(4,'Iris','2004-10-10',NULL,NULL,'Paga de cruza','Fêmea',1,NULL,'11111111111',''),(5,'Bora','2004-10-10',NULL,NULL,'Doação','Fêmea',1,NULL,'11111111111','');
/*!40000 ALTER TABLE `canino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caracteristica_medicamento`
--

DROP TABLE IF EXISTS `caracteristica_medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caracteristica_medicamento` (
  `id_caracteristica` int(11) NOT NULL AUTO_INCREMENT,
  `sigla_caracteristica` varchar(10) COLLATE utf8_bin NOT NULL,
  `caracteristica_medicamento` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_caracteristica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caracteristica_medicamento`
--

LOCK TABLES `caracteristica_medicamento` WRITE;
/*!40000 ALTER TABLE `caracteristica_medicamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `caracteristica_medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text COLLATE utf8_bin,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clima`
--

DROP TABLE IF EXISTS `clima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clima` (
  `id_clima` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_clima` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_clima`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clima`
--

LOCK TABLES `clima` WRITE;
/*!40000 ALTER TABLE `clima` DISABLE KEYS */;
/*!40000 ALTER TABLE `clima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comida`
--

DROP TABLE IF EXISTS `comida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comida` (
  `id_comida` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade_comida` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_comida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comida`
--

LOCK TABLES `comida` WRITE;
/*!40000 ALTER TABLE `comida` DISABLE KEYS */;
/*!40000 ALTER TABLE `comida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `desempenho`
--

DROP TABLE IF EXISTS `desempenho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `desempenho` (
  `id_desempenho` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_desempenho` text COLLATE utf8_bin,
  `valor_desempenho` float DEFAULT NULL,
  PRIMARY KEY (`id_desempenho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desempenho`
--

LOCK TABLES `desempenho` WRITE;
/*!40000 ALTER TABLE `desempenho` DISABLE KEYS */;
/*!40000 ALTER TABLE `desempenho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nome_estado` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sigla_estado` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `FK_estado_pais` (`id_pais`),
  CONSTRAINT `FK_estado_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercicio`
--

DROP TABLE IF EXISTS `exercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercicio` (
  `id_exercicio` int(11) NOT NULL AUTO_INCREMENT,
  `nome_exercicio` text COLLATE utf8_bin,
  `objetivo` text COLLATE utf8_bin,
  `metodologia` text COLLATE utf8_bin,
  PRIMARY KEY (`id_exercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicio`
--

LOCK TABLES `exercicio` WRITE;
/*!40000 ALTER TABLE `exercicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercicio_atividade`
--

DROP TABLE IF EXISTS `exercicio_atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercicio_atividade` (
  `id_exercicio` int(11) DEFAULT NULL,
  `id_atividade` int(11) DEFAULT NULL,
  KEY `id_exercicio` (`id_exercicio`),
  KEY `id_atividade` (`id_atividade`),
  CONSTRAINT `exercicio_atividade_ibfk_1` FOREIGN KEY (`id_exercicio`) REFERENCES `exercicio` (`id_exercicio`),
  CONSTRAINT `exercicio_atividade_ibfk_2` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicio_atividade`
--

LOCK TABLES `exercicio_atividade` WRITE;
/*!40000 ALTER TABLE `exercicio_atividade` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercicio_atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercicio_treinamento`
--

DROP TABLE IF EXISTS `exercicio_treinamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercicio_treinamento` (
  `id_treinamento` int(11) DEFAULT NULL,
  `id_exercicio` int(11) DEFAULT NULL,
  `id_desempenho` int(11) DEFAULT NULL,
  KEY `id_treinamento` (`id_treinamento`),
  KEY `id_exercicio` (`id_exercicio`),
  KEY `exercicio_treinamento_ibfk_3` (`id_desempenho`),
  CONSTRAINT `exercicio_treinamento_ibfk_1` FOREIGN KEY (`id_treinamento`) REFERENCES `treinamento` (`id_treinamento`),
  CONSTRAINT `exercicio_treinamento_ibfk_2` FOREIGN KEY (`id_exercicio`) REFERENCES `exercicio` (`id_exercicio`),
  CONSTRAINT `exercicio_treinamento_ibfk_3` FOREIGN KEY (`id_desempenho`) REFERENCES `desempenho` (`id_desempenho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicio_treinamento`
--

LOCK TABLES `exercicio_treinamento` WRITE;
/*!40000 ALTER TABLE `exercicio_treinamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `exercicio_treinamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fezes`
--

DROP TABLE IF EXISTS `fezes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fezes` (
  `id_fezes` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_fezes` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_fezes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fezes`
--

LOCK TABLES `fezes` WRITE;
/*!40000 ALTER TABLE `fezes` DISABLE KEYS */;
/*!40000 ALTER TABLE `fezes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_farmaceutica`
--

DROP TABLE IF EXISTS `forma_farmaceutica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forma_farmaceutica` (
  `id_forma_farm` int(11) NOT NULL AUTO_INCREMENT,
  `sigla_forma_farm` varchar(5) COLLATE utf8_bin NOT NULL,
  `forma_farmaceutica` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_forma_farm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_farmaceutica`
--

LOCK TABLES `forma_farmaceutica` WRITE;
/*!40000 ALTER TABLE `forma_farmaceutica` DISABLE KEYS */;
/*!40000 ALTER TABLE `forma_farmaceutica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos` (
  `mime` varchar(50) COLLATE utf8_bin NOT NULL,
  `nome_foto` varchar(50) COLLATE utf8_bin NOT NULL,
  `conteudo` longblob NOT NULL,
  `id_canino` int(11) NOT NULL,
  KEY `foto_fk_1` (`id_canino`),
  CONSTRAINT `foto_fk_1` FOREIGN KEY (`id_canino`) REFERENCES `canino` (`id_canino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionalidade`
--

DROP TABLE IF EXISTS `funcionalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionalidade` (
  `id_funcionalidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_funcionalidade` text COLLATE utf8_bin,
  `caminho` text COLLATE utf8_bin,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_funcionalidade`),
  KEY `id_menu` (`id_menu`),
  CONSTRAINT `funcionalidade_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionalidade`
--

LOCK TABLES `funcionalidade` WRITE;
/*!40000 ALTER TABLE `funcionalidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localizacao`
--

DROP TABLE IF EXISTS `localizacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localizacao` (
  `id_localizacao` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` text COLLATE utf8_bin,
  `bairro` text COLLATE utf8_bin,
  `cidade` text COLLATE utf8_bin,
  `uf` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_localizacao`),
  KEY `localizacao_ibfk_1` (`uf`),
  CONSTRAINT `localizacao_ibfk_1` FOREIGN KEY (`uf`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localizacao`
--

LOCK TABLES `localizacao` WRITE;
/*!40000 ALTER TABLE `localizacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `localizacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `quantidade` text COLLATE utf8_bin NOT NULL,
  `destino` text COLLATE utf8_bin,
  `id_tipo` int(11) NOT NULL,
  `id_trabalho` int(11) NOT NULL,
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_material` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_material`),
  KEY `id_trabalho` (`id_trabalho`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `material_ibfk_1` FOREIGN KEY (`id_trabalho`) REFERENCES `trabalho` (`id_trabalho`),
  CONSTRAINT `material_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_material` (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text COLLATE utf8_bin,
  `menu_pai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `menu_fk_1` (`menu_pai`),
  CONSTRAINT `menu_fk_1` FOREIGN KEY (`menu_pai`) REFERENCES `menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origem`
--

DROP TABLE IF EXISTS `origem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `origem` (
  `id_origem` int(11) NOT NULL AUTO_INCREMENT,
  `origem_canino` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_origem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origem`
--

LOCK TABLES `origem` WRITE;
/*!40000 ALTER TABLE `origem` DISABLE KEYS */;
INSERT INTO `origem` VALUES (1,'Cria Própria');
/*!40000 ALTER TABLE `origem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padrao_fci`
--

DROP TABLE IF EXISTS `padrao_fci`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `padrao_fci` (
  `id_padrao` int(11) NOT NULL,
  `content` longblob,
  `id_raca` int(11) DEFAULT NULL,
  `mime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_padrao`),
  KEY `FK_padrao_fci_raca` (`id_raca`),
  CONSTRAINT `FK_padrao_fci_raca` FOREIGN KEY (`id_raca`) REFERENCES `raca` (`id_raca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padrao_fci`
--

LOCK TABLES `padrao_fci` WRITE;
/*!40000 ALTER TABLE `padrao_fci` DISABLE KEYS */;
/*!40000 ALTER TABLE `padrao_fci` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pais` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sigla_pais` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parentesco`
--

DROP TABLE IF EXISTS `parentesco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parentesco` (
  `id_canino` int(11) DEFAULT NULL,
  `parentesco_id` int(11) DEFAULT NULL,
  `tipo_parentesco` text COLLATE utf8_bin,
  KEY `id_canino` (`id_canino`),
  KEY `parentesco_id` (`parentesco_id`),
  CONSTRAINT `parentesco_ibfk_1` FOREIGN KEY (`id_canino`) REFERENCES `canino` (`id_canino`),
  CONSTRAINT `parentesco_ibfk_2` FOREIGN KEY (`parentesco_id`) REFERENCES `canino` (`id_canino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parentesco`
--

LOCK TABLES `parentesco` WRITE;
/*!40000 ALTER TABLE `parentesco` DISABLE KEYS */;
/*!40000 ALTER TABLE `parentesco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_perfil` text COLLATE utf8_bin,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador'),(2,'Adestrador'),(3,'Tratador'),(4,'Veterinária'),(5,'Instrução');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_funcionalidade`
--

DROP TABLE IF EXISTS `perfil_funcionalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_funcionalidade` (
  `id_perfil` int(11) DEFAULT NULL,
  `id_funcionalidade` int(11) DEFAULT NULL,
  KEY `id_perfil` (`id_perfil`),
  KEY `perfil_funcionalidade_ibfk_2` (`id_funcionalidade`),
  CONSTRAINT `perfil_funcionalidade_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  CONSTRAINT `perfil_funcionalidade_ibfk_2` FOREIGN KEY (`id_funcionalidade`) REFERENCES `funcionalidade` (`id_funcionalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_funcionalidade`
--

LOCK TABLES `perfil_funcionalidade` WRITE;
/*!40000 ALTER TABLE `perfil_funcionalidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil_funcionalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `cpf` varchar(11) COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin,
  `nome_pessoa` text COLLATE utf8_bin,
  `senha` text COLLATE utf8_bin,
  `id_perfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`cpf`),
  KEY `id_perfil` (`id_perfil`),
  CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES ('02368666486','ricardo.castelobranco2@gmail.com','ANTONIO RICARDO ANDRADE CASTELO BRANCO','e10adc3949ba59abbe56e057f20f883e',1),('11111111111','pessoa@email.com','Pessoa Geral','e10adc3949ba59abbe56e057f20f883e',2);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raca`
--

DROP TABLE IF EXISTS `raca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raca` (
  `id_raca` int(11) NOT NULL AUTO_INCREMENT,
  `nome_raca` text COLLATE utf8_bin,
  PRIMARY KEY (`id_raca`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raca`
--

LOCK TABLES `raca` WRITE;
/*!40000 ALTER TABLE `raca` DISABLE KEYS */;
INSERT INTO `raca` VALUES (1,'Pastor Alemão');
/*!40000 ALTER TABLE `raca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexo`
--

DROP TABLE IF EXISTS `sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(10) COLLATE utf8_bin DEFAULT '0',
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexo`
--

LOCK TABLES `sexo` WRITE;
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` VALUES (1,'Macho');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefone_contato`
--

DROP TABLE IF EXISTS `telefone_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone_contato` (
  `telefone_contato` text COLLATE utf8_bin,
  `cpf_pessoa` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  KEY `telefone_ibfk_1` (`cpf_pessoa`),
  CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`cpf_pessoa`) REFERENCES `pessoa` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone_contato`
--

LOCK TABLES `telefone_contato` WRITE;
/*!40000 ALTER TABLE `telefone_contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefone_contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terreno`
--

DROP TABLE IF EXISTS `terreno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terreno` (
  `id_terreno` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_terreno` text COLLATE utf8_bin,
  PRIMARY KEY (`id_terreno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terreno`
--

LOCK TABLES `terreno` WRITE;
/*!40000 ALTER TABLE `terreno` DISABLE KEYS */;
/*!40000 ALTER TABLE `terreno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_material`
--

DROP TABLE IF EXISTS `tipo_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_material` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text COLLATE utf8_bin,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_material`
--

LOCK TABLES `tipo_material` WRITE;
/*!40000 ALTER TABLE `tipo_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_medicamento`
--

DROP TABLE IF EXISTS `tipo_medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_medicamento` (
  `id_tipo_med` int(11) NOT NULL AUTO_INCREMENT,
  `nome_med` text COLLATE utf8_bin,
  `substancia` text COLLATE utf8_bin,
  `forma_farm` int(11) DEFAULT NULL,
  `caracteristica` int(11) DEFAULT NULL,
  `via_adm` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_med`),
  KEY `id_categoria` (`id_categoria`),
  KEY `tipo_medicamento_ibfk_2` (`forma_farm`),
  KEY `tipo_medicamento_ibfk_3` (`caracteristica`),
  KEY `tipo_medicamento_ibfk_4` (`via_adm`),
  CONSTRAINT `tipo_medicamento_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `tipo_medicamento_ibfk_2` FOREIGN KEY (`forma_farm`) REFERENCES `forma_farmaceutica` (`id_forma_farm`),
  CONSTRAINT `tipo_medicamento_ibfk_3` FOREIGN KEY (`caracteristica`) REFERENCES `caracteristica_medicamento` (`id_caracteristica`),
  CONSTRAINT `tipo_medicamento_ibfk_4` FOREIGN KEY (`via_adm`) REFERENCES `via_administracao` (`id_via_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_medicamento`
--

LOCK TABLES `tipo_medicamento` WRITE;
/*!40000 ALTER TABLE `tipo_medicamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabalho`
--

DROP TABLE IF EXISTS `trabalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabalho` (
  `data_trabalho` date DEFAULT NULL,
  `endereco` text COLLATE utf8_bin,
  `cidade` text COLLATE utf8_bin,
  `bairro` text COLLATE utf8_bin,
  `uf` text COLLATE utf8_bin,
  `id_trabalho` int(11) NOT NULL AUTO_INCREMENT,
  `documento_origem` text COLLATE utf8_bin,
  `id_atividade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_trabalho`),
  KEY `id_atividade` (`id_atividade`),
  CONSTRAINT `trabalho_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `atividade` (`id_atividade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabalho`
--

LOCK TABLES `trabalho` WRITE;
/*!40000 ALTER TABLE `trabalho` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabalho_canino`
--

DROP TABLE IF EXISTS `trabalho_canino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabalho_canino` (
  `id_trabalho` int(11) DEFAULT NULL,
  `id_canino` int(11) DEFAULT NULL,
  KEY `FK_trabalho_canino_trabalho` (`id_trabalho`),
  KEY `FK_trabalho_canino_canino` (`id_canino`),
  CONSTRAINT `FK_trabalho_canino_canino` FOREIGN KEY (`id_canino`) REFERENCES `canino` (`id_canino`),
  CONSTRAINT `FK_trabalho_canino_trabalho` FOREIGN KEY (`id_trabalho`) REFERENCES `trabalho` (`id_trabalho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabalho_canino`
--

LOCK TABLES `trabalho_canino` WRITE;
/*!40000 ALTER TABLE `trabalho_canino` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabalho_canino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treinamento`
--

DROP TABLE IF EXISTS `treinamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treinamento` (
  `local` text COLLATE utf8_bin,
  `data_treinamento` date DEFAULT NULL,
  `id_treinamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_terreno` int(11) DEFAULT NULL,
  `id_canino` int(11) DEFAULT NULL,
  `horario_inicio` time DEFAULT NULL,
  `id_clima` int(11) DEFAULT NULL,
  `horario_termino` time DEFAULT NULL,
  PRIMARY KEY (`id_treinamento`),
  KEY `id_terreno` (`id_terreno`),
  KEY `id_canino` (`id_canino`),
  KEY `treinamento_ibfk_4` (`id_clima`),
  CONSTRAINT `treinamento_ibfk_1` FOREIGN KEY (`id_terreno`) REFERENCES `terreno` (`id_terreno`),
  CONSTRAINT `treinamento_ibfk_3` FOREIGN KEY (`id_canino`) REFERENCES `canino` (`id_canino`),
  CONSTRAINT `treinamento_ibfk_4` FOREIGN KEY (`id_clima`) REFERENCES `clima` (`id_clima`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treinamento`
--

LOCK TABLES `treinamento` WRITE;
/*!40000 ALTER TABLE `treinamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `treinamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `urina`
--

DROP TABLE IF EXISTS `urina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `urina` (
  `id_urina` int(11) NOT NULL AUTO_INCREMENT,
  `aparencia_urina` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_urina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urina`
--

LOCK TABLES `urina` WRITE;
/*!40000 ALTER TABLE `urina` DISABLE KEYS */;
/*!40000 ALTER TABLE `urina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veterinaria`
--

DROP TABLE IF EXISTS `veterinaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veterinaria` (
  `id_veterinaria` int(11) NOT NULL AUTO_INCREMENT,
  `data_procedimento` date DEFAULT NULL,
  `anamnese` text COLLATE utf8_bin,
  `diagnostico` text COLLATE utf8_bin,
  `tratamento` text COLLATE utf8_bin,
  `canino` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_veterinaria`),
  KEY `veterinaria_fk_1` (`canino`),
  CONSTRAINT `veterinaria_fk_1` FOREIGN KEY (`canino`) REFERENCES `canino` (`id_canino`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veterinaria`
--

LOCK TABLES `veterinaria` WRITE;
/*!40000 ALTER TABLE `veterinaria` DISABLE KEYS */;
/*!40000 ALTER TABLE `veterinaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veterinaria_medicamento`
--

DROP TABLE IF EXISTS `veterinaria_medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veterinaria_medicamento` (
  `qtd_medicamento` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `id_veterinaria` int(11) DEFAULT NULL,
  `id_tipo_med` int(11) DEFAULT NULL,
  `data_medicacao` date DEFAULT NULL,
  KEY `id_veterinaria` (`id_veterinaria`),
  KEY `id_tipo_med` (`id_tipo_med`),
  CONSTRAINT `veterinaria_medicamento_ibfk_1` FOREIGN KEY (`id_veterinaria`) REFERENCES `veterinaria` (`id_veterinaria`),
  CONSTRAINT `veterinaria_medicamento_ibfk_2` FOREIGN KEY (`id_tipo_med`) REFERENCES `tipo_medicamento` (`id_tipo_med`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veterinaria_medicamento`
--

LOCK TABLES `veterinaria_medicamento` WRITE;
/*!40000 ALTER TABLE `veterinaria_medicamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `veterinaria_medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `via_administracao`
--

DROP TABLE IF EXISTS `via_administracao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `via_administracao` (
  `id_via_adm` int(11) NOT NULL AUTO_INCREMENT,
  `sigla_via_adm` varchar(10) COLLATE utf8_bin NOT NULL,
  `via_adm` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_via_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `via_administracao`
--

LOCK TABLES `via_administracao` WRITE;
/*!40000 ALTER TABLE `via_administracao` DISABLE KEYS */;
/*!40000 ALTER TABLE `via_administracao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-24  7:55:43
