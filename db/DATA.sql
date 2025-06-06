USE gasinspect;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gasinspect
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargo` (
  `id_cargo` int(2) NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `nombre_cargo` (`nombre_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (5,'AUXILIAR'),(2,'DIRECTOR'),(1,'GERENTE'),(4,'INSPECTOR'),(3,'SUPERVISOR');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depto`
--

DROP TABLE IF EXISTS `depto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depto` (
  `id_depto` int(2) NOT NULL AUTO_INCREMENT,
  `depto` varchar(20) NOT NULL,
  PRIMARY KEY (`id_depto`),
  UNIQUE KEY `depto` (`depto`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depto`
--

LOCK TABLES `depto` WRITE;
/*!40000 ALTER TABLE `depto` DISABLE KEYS */;
INSERT INTO `depto` VALUES (1,'Amazonas\r'),(2,'Antioquia\r'),(3,'Arauca\r'),(4,'Atlantico\r'),(5,'Bogota_DC\r'),(6,'Bolivar\r'),(7,'Boyaca\r'),(8,'Caldas\r'),(9,'Caqueta\r'),(10,'Casanare\r'),(11,'Cauca\r'),(12,'Cesar\r'),(13,'Choco\r'),(14,'Cordoba\r'),(15,'Cundinamarca\r'),(16,'Guainia\r'),(17,'Guaviare\r'),(18,'Huila\r'),(19,'La_Guajira\r'),(20,'Magdalena\r'),(21,'Meta\r'),(22,'Narino\r'),(23,'Norte_de_Santander\r'),(24,'Putumayo\r'),(25,'Quindio\r'),(26,'Risaralda\r'),(28,'Santander\r'),(27,'San_Andres\r'),(29,'Sucre\r'),(30,'Tolima\r'),(31,'Valle_del_Cauca\r'),(32,'Vaupes\r'),(33,'Vichada\r');
/*!40000 ALTER TABLE `depto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribuidora`
--

DROP TABLE IF EXISTS `distribuidora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distribuidora` (
  `id_distribuidora` int(2) NOT NULL AUTO_INCREMENT,
  `distribuidora` varchar(30) NOT NULL,
  PRIMARY KEY (`id_distribuidora`),
  UNIQUE KEY `distribuidora` (`distribuidora`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribuidora`
--

LOCK TABLES `distribuidora` WRITE;
/*!40000 ALTER TABLE `distribuidora` DISABLE KEYS */;
INSERT INTO `distribuidora` VALUES (1,'Alcanos\r'),(2,'CHILCO\r'),(3,'COLGAS\r'),(4,'CUSIANAGAS\r'),(5,'DISTICON\r'),(6,'EFIGAS\r'),(7,'ENERCA\r'),(8,'ENERCER\r'),(9,'EPM\r'),(10,'ESPIGAS\r'),(13,'Gases_del_Caribe\r'),(12,'Gases_del_oriente\r'),(11,'Gases_de_Antioquia\r'),(14,'GASNET\r'),(15,'GASUR\r'),(16,'GAZ\r'),(17,'GDO\r'),(18,'GUISIANA\r'),(19,'INPROGAS\r'),(20,'INS\r'),(21,'JADAPE\r'),(22,'LLANOGAS\r'),(23,'MADIGAS\r'),(24,'METROGAS\r'),(25,'Nacional_de_servicios_publicos'),(26,'NORGAS\r'),(27,'Proviservicios\r'),(28,'REDEGAS\r'),(29,'REDNOVA\r'),(30,'SURGAS\r'),(31,'SURTIGAS\r'),(32,'UNIGAS\r'),(33,'VANTI\r');
/*!40000 ALTER TABLE `distribuidora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `id_estado` int(2) NOT NULL AUTO_INCREMENT,
  `tipo_estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id_estado`),
  UNIQUE KEY `tipo_estado` (`tipo_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (3,'AUSENTE'),(4,'CANCELADA'),(1,'CONFORME'),(2,'NO CONFORME');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_permiso`
--

DROP TABLE IF EXISTS `estado_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_permiso` (
  `id_estado_permiso` int(2) NOT NULL AUTO_INCREMENT,
  `estado_permiso` varchar(15) NOT NULL,
  PRIMARY KEY (`id_estado_permiso`),
  UNIQUE KEY `estado_permiso` (`estado_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_permiso`
--

LOCK TABLES `estado_permiso` WRITE;
/*!40000 ALTER TABLE `estado_permiso` DISABLE KEYS */;
INSERT INTO `estado_permiso` VALUES (1,'ACTIVO'),(2,'INACTIVO');
/*!40000 ALTER TABLE `estado_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inspeccion`
--

DROP TABLE IF EXISTS `inspeccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inspeccion` (
  `id_inspeccion` int(11) NOT NULL AUTO_INCREMENT,
  `numero_acta` int(10) DEFAULT NULL,
  `fachada` blob DEFAULT NULL,
  `informe_condiciones` blob DEFAULT NULL,
  `medidor_inicio` blob DEFAULT NULL,
  `cuenta_servicios` blob DEFAULT NULL,
  `valvula_abierta` blob DEFAULT NULL,
  `valvula_cerrada` blob DEFAULT NULL,
  `conexion_artefactos` blob DEFAULT NULL,
  `trazado` blob DEFAULT NULL,
  `puntos_taponados` blob DEFAULT NULL,
  `metodo_ventilacion` blob DEFAULT NULL,
  `co_ambiente` blob DEFAULT NULL,
  `medidor_fin` blob DEFAULT NULL,
  `ubicacion_equipos` blob DEFAULT NULL,
  `foto1` blob DEFAULT NULL,
  `foto2` blob DEFAULT NULL,
  `foto3` blob DEFAULT NULL,
  `sticker_informativo` blob DEFAULT NULL,
  `sticker_centro_medicion` blob DEFAULT NULL,
  `informe_inspeccion` blob DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `id_estado` int(2) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_visita` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inspeccion`),
  UNIQUE KEY `uq_inspeccion_visita` (`id_visita`),
  KEY `fk_id_estado` (`id_estado`),
  KEY `fk_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `fk_inspeccion_visita` FOREIGN KEY (`id_visita`) REFERENCES `visita` (`id_visita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inspeccion`
--

LOCK TABLES `inspeccion` WRITE;
/*!40000 ALTER TABLE `inspeccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `inspeccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mupio`
--

DROP TABLE IF EXISTS `mupio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mupio` (
  `id_mupio` int(4) NOT NULL AUTO_INCREMENT,
  `mupio` varchar(40) DEFAULT NULL,
  `id_depto` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_mupio`),
  KEY `fk_id_depto` (`id_depto`),
  CONSTRAINT `fk_id_depto` FOREIGN KEY (`id_depto`) REFERENCES `depto` (`id_depto`)
) ENGINE=InnoDB AUTO_INCREMENT=1145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mupio`
--

LOCK TABLES `mupio` WRITE;
/*!40000 ALTER TABLE `mupio` DISABLE KEYS */;
INSERT INTO `mupio` VALUES (1,'El_Encanto',1),(2,'La_Chorrera',1),(3,'La_Pedrera',1),(4,'La_Victoria',1),(5,'Leticia',1),(6,'Miriti_Parana',1),(7,'Puerto_Alegria',1),(8,'Puerto_Arica',1),(9,'Puerto_Narino',1),(10,'Puerto_Santander',1),(11,'Tarapaca',1),(12,'Abejorral',2),(13,'Abriaqui',2),(14,'Alejandria',2),(15,'Amaga',2),(16,'Amalfi',2),(17,'Andes',2),(18,'Angelopolis',2),(19,'Angostura',2),(20,'Anori',2),(21,'Anza',2),(22,'Apartado',2),(23,'Arboletes',2),(24,'Argelia',2),(25,'Armenia',2),(26,'Barbosa',2),(27,'Bello',2),(28,'Belmira',2),(29,'Betania',2),(30,'Betulia',2),(31,'Briceno',2),(32,'Buritica',2),(33,'Caceres',2),(34,'Caicedo',2),(35,'Caldas',2),(36,'Campamento',2),(37,'Canasgordas',2),(38,'Caracoli',2),(39,'Caramanta',2),(40,'Carepa',2),(41,'Carolina_del_Principe',2),(42,'Caucasia',2),(43,'Chigorodo',2),(44,'Cisneros',2),(45,'Ciudad_Bolivar',2),(46,'Cocorna',2),(47,'Concepcion',2),(48,'Concordia',2),(49,'Copacabana',2),(50,'Dabeiba',2),(51,'Don_Matias',2),(52,'Ebejico',2),(53,'El_Bagre',2),(54,'El_Carmen_de_Viboral',2),(55,'El_Retiro',2),(56,'El_Santuario',2),(57,'Entrerrios',2),(58,'Envigado',2),(59,'Fredonia',2),(60,'Frontino',2),(61,'Giraldo',2),(62,'Girardota',2),(63,'Gomez_Plata',2),(64,'Granada',2),(65,'Guadalupe',2),(66,'Guarne',2),(67,'Guatape',2),(68,'Heliconia',2),(69,'Hispania',2),(70,'Itagui',2),(71,'Ituango',2),(72,'Jardin',2),(73,'Jerico',2),(74,'La_Ceja',2),(75,'La_Estrella',2),(76,'La_Pintada',2),(77,'La_Union',2),(78,'Liborina',2),(79,'Maceo',2),(80,'Marinilla',2),(81,'Medellin',2),(82,'Montebello',2),(83,'Murindo',2),(84,'Mutata',2),(85,'Narino',2),(86,'Nechi',2),(87,'Necocli',2),(88,'Olaya',2),(89,'Penol',2),(90,'Peque',2),(91,'Pueblo_Rico',2),(92,'Puerto_Berrio',2),(93,'Puerto_Nare',2),(94,'Puerto_Triunfo',2),(95,'Remedios',2),(96,'Rionegro',2),(97,'Sabanalarga',2),(98,'Sabaneta',2),(99,'Salgar',2),(100,'San_Andres_de_Cuerquia',2),(101,'San_Carlos',2),(102,'San_Francisco',2),(103,'San_Jeronimo',2),(104,'San_Jose_de_La_Montana',2),(105,'San_Juan_de_Uraba',2),(106,'San_Luis',2),(107,'San_Pedro_de_los_Milagros',2),(108,'San_Pedro_de_Uraba',2),(109,'San_Rafael',2),(110,'San_Roque',2),(111,'San_Vicente',2),(112,'Santa_Barbara',2),(113,'Santa_Fe_de_Antioquia',2),(114,'Santa_Rosa_de_Osos',2),(115,'Santo_Domingo',2),(116,'Segovia',2),(117,'Sonson',2),(118,'Sopetran',2),(119,'Tamesis',2),(120,'Taraza',2),(121,'Tarso',2),(122,'Titiribi',2),(123,'Toledo',2),(124,'Turbo',2),(125,'Uramita',2),(126,'Urrao',2),(127,'Valdivia',2),(128,'Valparaiso',2),(129,'Vegachi',2),(130,'Venecia',2),(131,'Versalles',2),(132,'Vigia_del_Fuerte',2),(133,'Yali',2),(134,'Yarumal',2),(135,'Yolombo',2),(136,'Yondo',2),(137,'Zaragoza',2),(138,'Arauca',3),(139,'Arauquita',3),(140,'Cravo_Norte',3),(141,'Fortul',3),(142,'Puerto_Rondon',3),(143,'Saravena',3),(144,'Tame',3),(145,'Baranoa',4),(146,'Barranquilla',4),(147,'Campo_de_La_Cruz',4),(148,'Candelaria',4),(149,'Galapa',4),(150,'Juan_de_Acosta',4),(151,'Luruaco',4),(152,'Malambo',4),(153,'Manati',4),(154,'Palmar_de_Varela',4),(155,'Piojo',4),(156,'Polonuevo',4),(157,'Ponedera',4),(158,'Puerto_Colombia',4),(159,'Repelon',4),(160,'Sabanagrande',4),(161,'Sabanalarga',4),(162,'Santa_Lucia',4),(163,'Santo_Tomas',4),(164,'Soledad',4),(165,'Suan',4),(166,'Tubara',4),(167,'Usiacuri',4),(168,'Antonio_Narino',5),(169,'Barrios_Unidos',5),(170,'Bogota_DC',5),(171,'Bosa',5),(172,'Candelaria',5),(173,'Chapinero',5),(174,'Ciudad_Bolivar',5),(175,'Engativa',5),(176,'Fontibon',5),(177,'Kennedy',5),(178,'Los_Martires',5),(179,'Puente_Aranda',5),(180,'Rafael_Uribe_Uribe',5),(181,'San_Cristobal',5),(182,'Santa_Fe',5),(183,'Suba',5),(184,'Sumapaz',5),(185,'Teusaquillo',5),(186,'Tunjuelito',5),(187,'Usaquen',5),(188,'Usme',5),(189,'Achi',6),(190,'Altos_del_Rosario',6),(191,'Arenal',6),(192,'Arjona',6),(193,'Arroyohondo',6),(194,'Barranco_de_Loba',6),(195,'Calamar',6),(196,'Cantagallo',6),(197,'Cartagena',6),(198,'Cicuco',6),(199,'Clemencia',6),(200,'Cordoba',6),(201,'El_Carmen_de_Bolivar',6),(202,'El_Guamo',6),(203,'Hatillo_de_Loba',6),(204,'Magangue',6),(205,'Mahates',6),(206,'Margarita',6),(207,'Maria_la_Baja',6),(208,'Mompos',6),(209,'Montecristo',6),(210,'Morales',6),(211,'Norosi',6),(212,'Pinillos',6),(213,'Regidor',6),(214,'Rio_Viejo',6),(215,'San_Cristobal',6),(216,'San_Estanislao',6),(217,'San_Fernando',6),(218,'San_Jacinto',6),(219,'San_Jacinto_del_Cauca',6),(220,'San_Juan_Nepomuceno',6),(221,'San_Martin_de_Loba',6),(222,'San_Pablo_de_Borbur',6),(223,'Santa_Catalina',6),(224,'Santa_Rosa',6),(225,'Santa_Rosa_del_Sur',6),(226,'Simiti',6),(227,'Soplaviento',6),(228,'Talaigua_Nuevo',6),(229,'Tiquisio',6),(230,'Turbaco',6),(231,'Turbana',6),(232,'Villanueva',6),(233,'Zambrano',6),(234,'Almeida',7),(235,'Aquitania',7),(236,'Arcabuco',7),(237,'Belen',7),(238,'Berbeo',7),(239,'Beteitiva',7),(240,'Boavita',7),(241,'Boyaca',7),(242,'Briceno',7),(243,'Buena_Vista',7),(244,'Busbanza',7),(245,'Caldas',7),(246,'Campohermoso',7),(247,'Cerinza',7),(248,'Chinavita',7),(249,'Chiquinquira',7),(250,'Chiquiza',7),(251,'Chiscas',7),(252,'Chita',7),(253,'Chitaraque',7),(254,'Chivata',7),(255,'Chivor',7),(256,'Cienega',7),(257,'Combita',7),(258,'Coper',7),(259,'Corrales',7),(260,'Covarachia',7),(261,'Cubara',7),(262,'Cucaita',7),(263,'Cuitiva',7),(264,'Duitama',7),(265,'El_Cocuy',7),(266,'El_Espino',7),(267,'El_Penon',7),(268,'Firavitoba',7),(269,'Floresta',7),(270,'Gachantiva',7),(271,'Gameza',7),(272,'Garagoa',7),(273,'Guacamayas',7),(274,'Guateque',7),(275,'Guayata',7),(276,'G?ican',7),(277,'Iza',7),(278,'Jenesano',7),(279,'Jerico',7),(280,'La_Capilla',7),(281,'La_Uvita',7),(282,'La_Victoria',7),(283,'Labranzagrande',7),(284,'Macanal',7),(285,'Maripi',7),(286,'Miraflores',7),(287,'Mongua',7),(288,'Mongui',7),(289,'Moniquira',7),(290,'Motavita',7),(291,'Muzo',7),(292,'Nobsa',7),(293,'Nuevo_Colon',7),(294,'Oicata',7),(295,'Otanche',7),(296,'Pachavita',7),(297,'Paez',7),(298,'Paipa',7),(299,'Pajarito',7),(300,'Panqueba',7),(301,'Pauna',7),(302,'Paya',7),(303,'Paz_de_Rio',7),(304,'Pesca',7),(305,'Pisba',7),(306,'Puerto_Boyaca',7),(307,'Quipama',7),(308,'Ramiriqui',7),(309,'Raquira',7),(310,'Rondon',7),(311,'Saboya',7),(312,'Sachica',7),(313,'Samaca',7),(314,'San_Eduardo',7),(315,'San_Jose_de_Pare',7),(316,'San_Luis_de_Gaceno',7),(317,'San_Mateo',7),(318,'San_Miguel_de_Sema',7),(319,'San_Pablo_de_Borbur',7),(320,'Santa_Maria',7),(321,'Santa_Rosa_de_Viterbo',7),(322,'Santa_Sofia',7),(323,'Santana',7),(324,'Sativanorte',7),(325,'Sativasur',7),(326,'Siachoque',7),(327,'Soata',7),(328,'Socha',7),(329,'Socota',7),(330,'Sogamoso',7),(331,'Somondoco',7),(332,'Sora',7),(333,'Soraca',7),(334,'Sotaquira',7),(335,'Susacon',7),(336,'Sutamarchan',7),(337,'Sutatenza',7),(338,'Tasco',7),(339,'Tenza',7),(340,'Tibana',7),(341,'Tibasosa',7),(342,'Tinjaca',7),(343,'Tipacoque',7),(344,'Toca',7),(345,'Tog?i',7),(346,'Topaga',7),(347,'Tota',7),(348,'Tunja',7),(349,'Tunungua',7),(350,'Turmeque',7),(351,'Tuta',7),(352,'Tutaza',7),(353,'Umbita',7),(354,'Ventaquemada',7),(355,'Villa_de_Leyva',7),(356,'Viracacha',7),(357,'Zetaquira',7),(358,'Aguadas',8),(359,'Anserma',8),(360,'Aranzazu',8),(361,'Belalcazar',8),(362,'Chinchina',8),(363,'Filadelfia',8),(364,'La_Dorada',8),(365,'La_Merced',8),(366,'Manizales',8),(367,'Manzanares',8),(368,'Marmato',8),(369,'Marquetalia',8),(370,'Marulanda',8),(371,'Neira',8),(372,'Norcasia',8),(373,'Pacora',8),(374,'Palestina',8),(375,'Pensilvania',8),(376,'Riosucio',8),(377,'Risaralda',8),(378,'Salamina',8),(379,'Samana',8),(380,'San_Jose',8),(381,'Supia',8),(382,'Victoria',8),(383,'Villamaria',8),(384,'Viterbo',8),(385,'Albania',9),(386,'Belen_de_Los_Andaquies',9),(387,'Cartagena_del_Chaira',9),(388,'Curillo',9),(389,'El_Doncello',9),(390,'El_Paujil',9),(391,'Florencia',9),(392,'La_Montanita',9),(393,'Milan',9),(394,'Morelia',9),(395,'Puerto_Rico',9),(396,'San_Jose_del_Fragua',9),(397,'San_Vicente_del_Caguan',9),(398,'Solano',9),(399,'Solita',9),(400,'Valparaiso',9),(401,'Aguazul',10),(402,'Chameza',10),(403,'Hato_Corozal',10),(404,'La_Salina',10),(405,'Mani',10),(406,'Monterrey',10),(407,'Nunchia',10),(408,'Orocue',10),(409,'Paz_de_Ariporo',10),(410,'Pore',10),(411,'Recetor',10),(412,'Sabanalarga',10),(413,'Sacama',10),(414,'San_Luis_de_Gaceno',10),(415,'Tamara',10),(416,'Tauramena',10),(417,'Trinidad',10),(418,'Villanueva',10),(419,'Yopal',10),(420,'Almaguer',11),(421,'Argelia',11),(422,'Balboa',11),(423,'Bolivar',11),(424,'Buenos_Aires',11),(425,'Cajibio',11),(426,'Caldono',11),(427,'Caloto',11),(428,'Corinto',11),(429,'El_Tambo',11),(430,'Florencia',11),(431,'Guachene',11),(432,'Guapi',11),(433,'Inza',11),(434,'Jambalo',11),(435,'La_Sierra',11),(436,'La_Vega',11),(437,'Lopez',11),(438,'Mercaderes',11),(439,'Miranda',11),(440,'Morales',11),(441,'Padilla',11),(442,'Paez',11),(443,'Patia',11),(444,'Piamonte',11),(445,'Piendamo',11),(446,'Popayan',11),(447,'Puerto_Tejada',11),(448,'Purace',11),(449,'Rosas',11),(450,'San_Sebastian',11),(451,'Santa_Rosa',11),(452,'Santander_de_Quilichao',11),(453,'Silvia',11),(454,'Sotara',11),(455,'Suarez',11),(456,'Sucre',11),(457,'Timbio',11),(458,'Timbiqui',11),(459,'Toribio',11),(460,'Totoro',11),(461,'Villa_Rica',11),(462,'Aguachica',12),(463,'Agustin_Codazzi',12),(464,'Astrea',12),(465,'Becerril',12),(466,'Bosconia',12),(467,'Chimichagua',12),(468,'Chiriguana',12),(469,'Curumani',12),(470,'El_Copey',12),(471,'El_Paso',12),(472,'Gamarra',12),(473,'Gonzalez',12),(474,'La_Gloria',12),(475,'La_Jagua_de_Ibirico',12),(476,'La_Paz',12),(477,'Manaure',12),(478,'Pailitas',12),(479,'Pelaya',12),(480,'Pueblo_Bello',12),(481,'Rio_de_Oro',12),(482,'San_Alberto',12),(483,'San_Diego',12),(484,'San_Martin',12),(485,'Tamalameque',12),(486,'Valledupar',12),(487,'Acandi',13),(488,'Alto_Baudo',13),(489,'Atrato',13),(490,'Bagado',13),(491,'Bahia_Solano',13),(492,'Bajo_Baudo',13),(493,'Belen_de_Bajira',13),(494,'Bojaya',13),(495,'Carmen_del_Darien',13),(496,'Certegui',13),(497,'Condoto',13),(498,'El_Canton_del_San_Pablo',13),(499,'El_Carmen_de_Atrato',13),(500,'El_Litoral_del_San_Juan',13),(501,'Istmina',13),(502,'Jurado',13),(503,'Lloro',13),(504,'Medio_Atrato',13),(505,'Medio_Baudo',13),(506,'Medio_San_Juan',13),(507,'Novita',13),(508,'Nuqui',13),(509,'Quibdo',13),(510,'Rio_Iro',13),(511,'Rio_Quito',13),(512,'Riosucio',13),(513,'San_Jose_del_Palmar',13),(514,'Sipi',13),(515,'Tado',13),(516,'Unguia',13),(517,'Union_Panamericana',13),(518,'Ayapel',14),(519,'Buenavista',14),(520,'Canalete',14),(521,'Cerete',14),(522,'Chima',14),(523,'Chinu',14),(524,'Cienaga_de_Oro',14),(525,'Cotorra',14),(526,'La_Apartada',14),(527,'Lorica',14),(528,'Los_Cordobas',14),(529,'Momil',14),(530,'Monitos',14),(531,'Montelibano',14),(532,'Monteria',14),(533,'Planeta_Rica',14),(534,'Pueblo_Nuevo',14),(535,'Puerto_Escondido',14),(536,'Puerto_Libertador',14),(537,'Purisima',14),(538,'Sahagun',14),(539,'San_Andres_Sotavento',14),(540,'San_Antero',14),(541,'San_Bernardo_del_Viento',14),(542,'San_Carlos',14),(543,'San_Jose_de_Ure',14),(544,'San_Pelayo',14),(545,'Tierralta',14),(546,'Tuchin',14),(547,'Valencia',14),(548,'Agua_de_Dios',15),(549,'Alban',15),(550,'Anapoima',15),(551,'Anolaima',15),(552,'Apulo',15),(553,'Arbelaez',15),(554,'Beltran',15),(555,'Bituima',15),(556,'Bojaca',15),(557,'Cabrera',15),(558,'Cachipay',15),(559,'Cajica',15),(560,'Caparrapi',15),(561,'Caqueza',15),(562,'Carmen_de_Carupa',15),(563,'Chaguani',15),(564,'Chia',15),(565,'Chipaque',15),(566,'Choachi',15),(567,'Choconta',15),(568,'Cogua',15),(569,'Cota',15),(570,'Cucunuba',15),(571,'El_Colegio',15),(572,'El_Penon',15),(573,'El_Rosal',15),(574,'Facatativa',15),(575,'Fomeque',15),(576,'Fosca',15),(577,'Funza',15),(578,'Fuquene',15),(579,'Fusagasuga',15),(580,'Gachala',15),(581,'Gachancipa',15),(582,'Gacheta',15),(583,'Gama',15),(584,'Girardot',15),(585,'Granada',15),(586,'Guacheta',15),(587,'Guaduas',15),(588,'Guasca',15),(589,'Guataqui',15),(590,'Guatavita',15),(591,'Guayabal_de_Siquima',15),(592,'Guayabetal',15),(593,'Gutierrez',15),(594,'Jerusalen',15),(595,'Junin',15),(596,'La_Calera',15),(597,'La_Mesa',15),(598,'La_Palma',15),(599,'La_Pena',15),(600,'La_Vega',15),(601,'Lenguazaque',15),(602,'Macheta',15),(603,'Madrid',15),(604,'Manta',15),(605,'Medina',15),(606,'Mosquera',15),(607,'Narino',15),(608,'Nemocon',15),(609,'Nilo',15),(610,'Nimaima',15),(611,'Nocaima',15),(612,'Pacho',15),(613,'Paime',15),(614,'Pandi',15),(615,'Paratebueno',15),(616,'Pasca',15),(617,'Puerto_Salgar',15),(618,'Puli',15),(619,'Quebradanegra',15),(620,'Quetame',15),(621,'Quipile',15),(622,'Ricaurte',15),(623,'San_Antonio_del_Tequendama',15),(624,'San_Bernardo',15),(625,'San_Cayetano',15),(626,'San_Francisco',15),(627,'San_Juan_de_Rio_Seco',15),(628,'Sasaima',15),(629,'Sesquile',15),(630,'Sibate',15),(631,'Silvania',15),(632,'Simijaca',15),(633,'Soacha',15),(634,'Sopo',15),(635,'Subachoque',15),(636,'Suesca',15),(637,'Supata',15),(638,'Susa',15),(639,'Sutatausa',15),(640,'Tabio',15),(641,'Tausa',15),(642,'Tena',15),(643,'Tenjo',15),(644,'Tibacuy',15),(645,'Tibirita',15),(646,'Tocaima',15),(647,'Tocancipa',15),(648,'Topaipi',15),(649,'Ubala',15),(650,'Ubaque',15),(651,'Une',15),(652,'utica',15),(653,'Venecia',15),(654,'Vergara',15),(655,'Viani',15),(656,'Villa_de_San_Diego_de_Ubate',15),(657,'Villagomez',15),(658,'Villapinzon',15),(659,'Villeta',15),(660,'Viota',15),(661,'Yacopi',15),(662,'Zipacon',15),(663,'Zipaquira',15),(664,'Barranco_Minas',16),(665,'Cacahual',16),(666,'Inirida',16),(667,'La_Guadalupe',16),(668,'Mapiripana',16),(669,'Morichal',16),(670,'Pana_Pana',16),(671,'Puerto_Colombia',16),(672,'San_Felipe',16),(673,'Calamar',17),(674,'El_Retorno',17),(675,'Miraflores',17),(676,'San_Jose_del_Guaviare',17),(677,'Acevedo',18),(678,'Agrado',18),(679,'Aipe',18),(680,'Algeciras',18),(681,'Altamira',18),(682,'Baraya',18),(683,'Campoalegre',18),(684,'Colombia',18),(685,'Elias',18),(686,'Garzon',18),(687,'Gigante',18),(688,'Guadalupe',18),(689,'Hobo',18),(690,'Iquira',18),(691,'Isnos',18),(692,'La_Argentina',18),(693,'La_Plata',18),(694,'Nataga',18),(695,'Neiva',18),(696,'Oporapa',18),(697,'Paicol',18),(698,'Palermo',18),(699,'Palestina',18),(700,'Pital',18),(701,'Pitalito',18),(702,'Rivera',18),(703,'Saladoblanco',18),(704,'San_Agustin',18),(705,'Santa_Maria',18),(706,'Suaza',18),(707,'Tarqui',18),(708,'Tello',18),(709,'Teruel',18),(710,'Tesalia',18),(711,'Timana',18),(712,'Villavieja',18),(713,'Yaguara',18),(714,'Albania',19),(715,'Barrancas',19),(716,'Dibula',19),(717,'Distraccion',19),(718,'El_Molino',19),(719,'Fonseca',19),(720,'Hatonuevo',19),(721,'La_Jagua_del_Pilar',19),(722,'Maicao',19),(723,'Manaure',19),(724,'Riohacha',19),(725,'San_Juan_del_Cesar',19),(726,'Uribia',19),(727,'Urumita',19),(728,'Villanueva',19),(729,'Algarrobo',20),(730,'Aracataca',20),(731,'Ariguani',20),(732,'Cerro_San_Antonio',20),(733,'Chivolo',20),(734,'Cienaga',20),(735,'Concordia',20),(736,'El_Banco',20),(737,'El_Pinon',20),(738,'El_Reten',20),(739,'Fundacion',20),(740,'Guamal',20),(741,'Nueva_Granada',20),(742,'Pedraza',20),(743,'Pijino_del_Carmen',20),(744,'Pivijay',20),(745,'Plato',20),(746,'Pueblo_Viejo',20),(747,'Remolino',20),(748,'Sabanas_de_San_Angel',20),(749,'Salamina',20),(750,'San_Sebastian_de_Buenavista',20),(751,'San_Zenon',20),(752,'Santa_Ana',20),(753,'Santa_Barbara_de_Pinto',20),(754,'Santa_Marta',20),(755,'Sitionuevo',20),(756,'Tenerife',20),(757,'Zapayan',20),(758,'Zona_Bananera',20),(759,'Acacias',21),(760,'Barranca_de_Upia',21),(761,'Cabuyaro',21),(762,'Castilla_la_Nueva',21),(763,'Cubarral',21),(764,'Cumaral',21),(765,'El_Calvario',21),(766,'El_Castillo',21),(767,'El_Dorado',21),(768,'Fuente_de_Oro',21),(769,'Granada',21),(770,'Guamal',21),(771,'La_Macarena',21),(772,'Lejanias',21),(773,'Mapiripan',21),(774,'Mesetas',21),(775,'Puerto_Concordia',21),(776,'Puerto_Gaitan',21),(777,'Puerto_Lleras',21),(778,'Puerto_Lopez',21),(779,'Puerto_Rico',21),(780,'Restrepo',21),(781,'San_Carlos_de_Guaroa',21),(782,'San_Juan_de_Arama',21),(783,'San_Juanito',21),(784,'San_Martin',21),(785,'Uribe',21),(786,'Villavicencio',21),(787,'Vista_Hermosa',21),(788,'Alban',22),(789,'Aldana',22),(790,'Ancuya',22),(791,'Arboleda',22),(792,'Barbacoas',22),(793,'Belen',22),(794,'Buesaco',22),(795,'Chachag?i',22),(796,'Colon',22),(797,'Consaca',22),(798,'Contadero',22),(799,'Cordoba',22),(800,'Cuaspud',22),(801,'Cumbal',22),(802,'Cumbitara',22),(803,'El_Charco',22),(804,'El_Penol',22),(805,'El_Rosario',22),(806,'El_Tablon_de_Gomez',22),(807,'El_Tambo',22),(808,'Francisco_Pizarro',22),(809,'Funes',22),(810,'Guachucal',22),(811,'Guaitarilla',22),(812,'Gualmatan',22),(813,'Iles',22),(814,'Imues',22),(815,'Ipiales',22),(816,'La_Cruz',22),(817,'La_Florida',22),(818,'La_Llanada',22),(819,'La_Tola',22),(820,'La_Union',22),(821,'Leiva',22),(822,'Linares',22),(823,'Los_Andes',22),(824,'Mag?i',22),(825,'Mallama',22),(826,'Mosquera',22),(827,'Narino',22),(828,'Olaya_Herrera',22),(829,'Ospina',22),(830,'Pasto',22),(831,'Policarpa',22),(832,'Potosi',22),(833,'Providencia',22),(834,'Puerres',22),(835,'Pupiales',22),(836,'Ricaurte',22),(837,'Roberto_Payan',22),(838,'Samaniego',22),(839,'San_Andres_de_Tumaco',22),(840,'San_Bernardo',22),(841,'San_Lorenzo',22),(842,'San_Pablo',22),(843,'San_Pedro_de_Cartago',22),(844,'Sandona',22),(845,'Santa_Barbara',22),(846,'Santacruz',22),(847,'Sapuyes',22),(848,'Taminango',22),(849,'Tangua',22),(850,'Tuquerres',22),(851,'Yacuanquer',22),(852,'Abrego',23),(853,'Arboledas',23),(854,'Bochalema',23),(855,'Bucarasica',23),(856,'Cachira',23),(857,'Cacota',23),(858,'Chinacota',23),(859,'Chitaga',23),(860,'Convencion',23),(861,'Cucuta',23),(862,'Cucutilla',23),(863,'Durania',23),(864,'El_Carmen',23),(865,'El_Tarra',23),(866,'El_Zulia',23),(867,'Gramalote',23),(868,'Hacari',23),(869,'Herran',23),(870,'La_Esperanza',23),(871,'La_Playa',23),(872,'Labateca',23),(873,'Los_Patios',23),(874,'Lourdes',23),(875,'Mutiscua',23),(876,'Ocana',23),(877,'Pamplona',23),(878,'Pamplonita',23),(879,'Puerto_Santander',23),(880,'Ragonvalia',23),(881,'Salazar',23),(882,'San_Calixto',23),(883,'San_Cayetano',23),(884,'Santiago',23),(885,'Sardinata',23),(886,'Silos',23),(887,'Teorama',23),(888,'Tibu',23),(889,'Toledo',23),(890,'Villa_Caro',23),(891,'Villa_del_Rosario',23),(892,'Colon',24),(893,'Leguizamo',24),(894,'Mocoa',24),(895,'Orito',24),(896,'Puerto_Asis',24),(897,'Puerto_Caicedo',24),(898,'Puerto_Guzman',24),(899,'San_Francisco',24),(900,'San_Miguel',24),(901,'Santiago',24),(902,'Sibundoy',24),(903,'Valle_de_Guamez',24),(904,'Villagarzon',24),(905,'Armenia',25),(906,'Buenavista',25),(907,'Calarca',25),(908,'Circasia',25),(909,'Cordoba',25),(910,'Filandia',25),(911,'Genova',25),(912,'La_Tebaida',25),(913,'Montenegro',25),(914,'Pijao',25),(915,'Quimbaya',25),(916,'Salento',25),(917,'Apia',26),(918,'Balboa',26),(919,'Belen_de_Umbria',26),(920,'Dosquebradas',26),(921,'Guatica',26),(922,'La_Celia',26),(923,'La_Virginia',26),(924,'Marsella',26),(925,'Mistrato',26),(926,'Pereira',26),(927,'Pueblo_Rico',26),(928,'Quinchia',26),(929,'Santa_Rosa_de_Cabal',26),(930,'Santuario',26),(931,'Providencia',27),(932,'San_Andres',27),(933,'Aguada',28),(934,'Albania',28),(935,'Aratoca',28),(936,'Barbosa',28),(937,'Barichara',28),(938,'Barrancabermeja',28),(939,'Betulia',28),(940,'Bolivar',28),(941,'Bucaramanga',28),(942,'Cabrera',28),(943,'California',28),(944,'Capitanejo',28),(945,'Carcasi',28),(946,'Cepita',28),(947,'Cerrito',28),(948,'Charala',28),(949,'Charta',28),(950,'Chima',28),(951,'Chipata',28),(952,'Cimitarra',28),(953,'Concepcion',28),(954,'Confines',28),(955,'Contratacion',28),(956,'Coromoro',28),(957,'Curiti',28),(958,'El_Carmen_de_Chucuri',28),(959,'El_Guacamayo',28),(960,'El_Penon',28),(961,'El_Playon',28),(962,'Encino',28),(963,'Enciso',28),(964,'Florian',28),(965,'Floridablanca',28),(966,'Galan',28),(967,'Gambita',28),(968,'Giron',28),(969,'Guaca',28),(970,'Guadalupe',28),(971,'Guapota',28),(972,'Guavata',28),(973,'G?epsa',28),(974,'Hato',28),(975,'Jesus_Maria',28),(976,'Jordan',28),(977,'La_Belleza',28),(978,'La_Paz',28),(979,'Landazuri',28),(980,'Lebrija',28),(981,'Los_Santos',28),(982,'Macaravita',28),(983,'Malaga',28),(984,'Matanza',28),(985,'Mogotes',28),(986,'Molagavita',28),(987,'Ocamonte',28),(988,'Oiba',28),(989,'Onzaga',28),(990,'Palmar',28),(991,'Palmas_del_Socorro',28),(992,'Paramo',28),(993,'Piedecuesta',28),(994,'Pinchote',28),(995,'Puente_Nacional',28),(996,'Puerto_Parra',28),(997,'Puerto_Wilches',28),(998,'Rionegro',28),(999,'Sabana_de_Torres',28),(1000,'San_Andres',28),(1001,'San_Benito',28),(1002,'San_Gil',28),(1003,'San_Joaquin',28),(1004,'San_Jose_de_Miranda',28),(1005,'San_Miguel',28),(1006,'San_Vicente_de_Chucuri',28),(1007,'Santa_Barbara',28),(1008,'Santa_Helena_del_Opon',28),(1009,'Simacota',28),(1010,'Socorro',28),(1011,'Suaita',28),(1012,'Sucre',28),(1013,'Surata',28),(1014,'Tona',28),(1015,'Valle_de_San_Jose',28),(1016,'Velez',28),(1017,'Vetas',28),(1018,'Villanueva',28),(1019,'Zapatoca',28),(1020,'Buenavista',29),(1021,'Caimito',29),(1022,'Chalan',29),(1023,'Coloso',29),(1024,'Corozal',29),(1025,'Covenas',29),(1026,'El_Roble',29),(1027,'Galeras',29),(1028,'Guaranda',29),(1029,'La_Union',29),(1030,'Los_Palmitos',29),(1031,'Majagual',29),(1032,'Morroa',29),(1033,'Ovejas',29),(1034,'Palmito',29),(1035,'Sampues',29),(1036,'San_Benito_Abad',29),(1037,'San_Juan_de_Betulia',29),(1038,'San_Luis_de_Since',29),(1039,'San_Marcos',29),(1040,'San_Onofre',29),(1041,'San_Pedro',29),(1042,'Santiago_de_Tolu',29),(1043,'Sincelejo',29),(1044,'Sucre',29),(1045,'Tolu_Viejo',29),(1046,'Alpujarra',30),(1047,'Alvarado',30),(1048,'Ambalema',30),(1049,'Anzoategui',30),(1050,'Armero',30),(1051,'Ataco',30),(1052,'Cajamarca',30),(1053,'Carmen_de_Apicala',30),(1054,'Casabianca',30),(1055,'Chaparral',30),(1056,'Coello',30),(1057,'Coyaima',30),(1058,'Cunday',30),(1059,'Dolores',30),(1060,'Espinal',30),(1061,'Falan',30),(1062,'Flandes',30),(1063,'Fresno',30),(1064,'Guamo',30),(1065,'Herveo',30),(1066,'Honda',30),(1067,'Ibague',30),(1068,'Icononzo',30),(1069,'Lerida',30),(1070,'Libano',30),(1071,'Mariquita',30),(1072,'Melgar',30),(1073,'Murillo',30),(1074,'Natagaima',30),(1075,'Ortega',30),(1076,'Palocabildo',30),(1077,'Piedras',30),(1078,'Planadas',30),(1079,'Prado',30),(1080,'Purificacion',30),(1081,'Rio_Blanco',30),(1082,'Roncesvalles',30),(1083,'Rovira',30),(1084,'Saldana',30),(1085,'San_Antonio',30),(1086,'San_Luis',30),(1087,'Santa_Isabel',30),(1088,'Suarez',30),(1089,'Valle_de_San_Juan',30),(1090,'Venadillo',30),(1091,'Villahermosa',30),(1092,'Villarrica',30),(1093,'Alcala',31),(1094,'Andalucia',31),(1095,'Ansermanuevo',31),(1096,'Argelia',31),(1097,'Bolivar',31),(1098,'Buenaventura',31),(1099,'Buga',31),(1100,'Caicedonia',31),(1101,'Cali',31),(1102,'Calima',31),(1103,'Candelaria',31),(1104,'Cartago',31),(1105,'Dagua',31),(1106,'El_aguila',31),(1107,'El_Cairo',31),(1108,'El_Cerrito',31),(1109,'El_Dovio',31),(1110,'Florida',31),(1111,'Ginebra',31),(1112,'Guacari',31),(1113,'Guadalajara_de_Buga',31),(1114,'Jamundi',31),(1115,'La_Cumbre',31),(1116,'La_Union',31),(1117,'La_Victoria',31),(1118,'Obando',31),(1119,'Palmira',31),(1120,'Pradera',31),(1121,'Restrepo',31),(1122,'Riofrio',31),(1123,'Roldanillo',31),(1124,'San_Pedro',31),(1125,'Sevilla',31),(1126,'Toro',31),(1127,'Trujillo',31),(1128,'Tulua',31),(1129,'Ulloa',31),(1130,'Versalles',31),(1131,'Vijes',31),(1132,'Yotoco',31),(1133,'Yumbo',31),(1134,'Zarzal',31),(1135,'Caruru',32),(1136,'Mitu',32),(1137,'Pacoa',32),(1138,'Papunaua',32),(1139,'Taraira',32),(1140,'Yavarate',32),(1141,'Cumaribo',33),(1142,'La_Primavera',33),(1143,'Puerto_Carreno',33),(1144,'Santa_Rosalia',33);
/*!40000 ALTER TABLE `mupio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pc`
--

DROP TABLE IF EXISTS `pc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pc` (
  `id_pc` int(2) NOT NULL AUTO_INCREMENT,
  `id_pc_permiso` int(2) DEFAULT NULL,
  `id_pc_cargo` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_pc`),
  KEY `fk_pc_permiso` (`id_pc_permiso`),
  KEY `fk_pc_cargo` (`id_pc_cargo`),
  CONSTRAINT `fk_pc_cargo` FOREIGN KEY (`id_pc_cargo`) REFERENCES `cargo` (`id_cargo`),
  CONSTRAINT `fk_pc_permiso` FOREIGN KEY (`id_pc_permiso`) REFERENCES `permisos` (`id_permisos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pc`
--

LOCK TABLES `pc` WRITE;
/*!40000 ALTER TABLE `pc` DISABLE KEYS */;
/*!40000 ALTER TABLE `pc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `id_permisos` int(2) NOT NULL AUTO_INCREMENT,
  `id_estado_permiso` int(2) DEFAULT NULL,
  `permiso` varchar(50) NOT NULL,
  PRIMARY KEY (`id_permisos`),
  UNIQUE KEY `permiso` (`permiso`),
  KEY `fk_estado_permiso` (`id_estado_permiso`),
  CONSTRAINT `fk_estado_permiso` FOREIGN KEY (`id_estado_permiso`) REFERENCES `estado_permiso` (`id_estado_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(2) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`),
  UNIQUE KEY `tipo_documento` (`tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documento`
--

LOCK TABLES `tipo_documento` WRITE;
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` VALUES (5,'AS'),(1,'CC'),(2,'CE'),(6,'NIT'),(4,'PA'),(3,'PT');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_gas`
--

DROP TABLE IF EXISTS `tipo_gas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_gas` (
  `id_tipo_gas` int(2) NOT NULL AUTO_INCREMENT,
  `tipo_gas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_gas`),
  UNIQUE KEY `tipo_gas` (`tipo_gas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_gas`
--

LOCK TABLES `tipo_gas` WRITE;
/*!40000 ALTER TABLE `tipo_gas` DISABLE KEYS */;
INSERT INTO `tipo_gas` VALUES (2,'GLP'),(1,'GN');
/*!40000 ALTER TABLE `tipo_gas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_instalacion`
--

DROP TABLE IF EXISTS `tipo_instalacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_instalacion` (
  `id_tipo_instalacion` int(2) NOT NULL AUTO_INCREMENT,
  `tipo_instalacion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_instalacion`),
  UNIQUE KEY `tipo_instalacion` (`tipo_instalacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_instalacion`
--

LOCK TABLES `tipo_instalacion` WRITE;
/*!40000 ALTER TABLE `tipo_instalacion` DISABLE KEYS */;
INSERT INTO `tipo_instalacion` VALUES (2,'Comercial'),(3,'Linea Matriz'),(1,'Residencial');
/*!40000 ALTER TABLE `tipo_instalacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_servicio`
--

DROP TABLE IF EXISTS `tipo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_servicio` (
  `id_tipo_servicio` int(2) NOT NULL AUTO_INCREMENT,
  `tipo_servicio` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_servicio`),
  UNIQUE KEY `tipo_servicio` (`tipo_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_servicio`
--

LOCK TABLES `tipo_servicio` WRITE;
/*!40000 ALTER TABLE `tipo_servicio` DISABLE KEYS */;
INSERT INTO `tipo_servicio` VALUES (1,'Periodica'),(8,'Periodica a la vista'),(9,'Periodica oculta'),(2,'Periodica taponado'),(3,'Previa'),(4,'Puesta en Servicio'),(5,'Reforma'),(6,'Reforma taponado'),(7,'Solicitud usuario');
/*!40000 ALTER TABLE `tipo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_cargo` int(2) DEFAULT NULL,
  `identificacion` int(15) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `telefono` int(10) NOT NULL,
  `direccion` text DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `foto` blob DEFAULT NULL,
  `id_tipo_documento` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `identificacion` (`identificacion`),
  KEY `fk_cargo_usuario` (`id_cargo`),
  KEY `fk_usuario_tipo_documento` (`id_tipo_documento`),
  CONSTRAINT `fk_cargo_usuario` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  CONSTRAINT `fk_usuario_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visita`
--

DROP TABLE IF EXISTS `visita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visita` (
  `id_visita` int(11) NOT NULL AUTO_INCREMENT,
  `identificacion` int(15) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `telefono` int(10) NOT NULL,
  `direccion` text NOT NULL,
  `fecha` date DEFAULT NULL,
  `numero_contrato` int(11) NOT NULL,
  `valor_revicion` int(11) DEFAULT NULL,
  `id_tipo_documento` int(2) DEFAULT NULL,
  `id_depto` int(2) DEFAULT NULL,
  `id_mupio` int(2) DEFAULT NULL,
  `id_distribuidora` int(2) DEFAULT NULL,
  `id_tipo_gas` int(2) DEFAULT NULL,
  `id_tipo_instalacion` int(2) DEFAULT NULL,
  `id_tipo_servicio` int(2) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `id_estado` int(2) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_visita`),
  UNIQUE KEY `identificacion` (`identificacion`),
  UNIQUE KEY `numero_contrato` (`numero_contrato`),
  KEY `fk_tipo_documento` (`id_tipo_documento`),
  KEY `fk_depto` (`id_depto`),
  KEY `fk_mupio` (`id_mupio`),
  KEY `fk_distribuidora` (`id_distribuidora`),
  KEY `fk_tipo_gas` (`id_tipo_gas`),
  KEY `fk_tipo_instalacion` (`id_tipo_instalacion`),
  KEY `fk_tipo_servicio` (`id_tipo_servicio`),
  KEY `fk_estado` (`id_estado`),
  KEY `fk_usuario` (`id_usuario`),
  CONSTRAINT `fk_depto` FOREIGN KEY (`id_depto`) REFERENCES `depto` (`id_depto`),
  CONSTRAINT `fk_distribuidora` FOREIGN KEY (`id_distribuidora`) REFERENCES `distribuidora` (`id_distribuidora`),
  CONSTRAINT `fk_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  CONSTRAINT `fk_mupio` FOREIGN KEY (`id_mupio`) REFERENCES `mupio` (`id_mupio`),
  CONSTRAINT `fk_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`),
  CONSTRAINT `fk_tipo_gas` FOREIGN KEY (`id_tipo_gas`) REFERENCES `tipo_gas` (`id_tipo_gas`),
  CONSTRAINT `fk_tipo_instalacion` FOREIGN KEY (`id_tipo_instalacion`) REFERENCES `tipo_instalacion` (`id_tipo_instalacion`),
  CONSTRAINT `fk_tipo_servicio` FOREIGN KEY (`id_tipo_servicio`) REFERENCES `tipo_servicio` (`id_tipo_servicio`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visita`
--

LOCK TABLES `visita` WRITE;
/*!40000 ALTER TABLE `visita` DISABLE KEYS */;
/*!40000 ALTER TABLE `visita` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-26 17:59:06
