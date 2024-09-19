-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: coffee
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `accounting_years`
--

DROP TABLE IF EXISTS `accounting_years`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounting_years` (
  `acc_year_id` int NOT NULL AUTO_INCREMENT,
  `fpo` int NOT NULL COMMENT 'The company Id',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`acc_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Accounting years for companies and fpos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounting_years`
--

LOCK TABLES `accounting_years` WRITE;
/*!40000 ALTER TABLE `accounting_years` DISABLE KEYS */;
INSERT INTO `accounting_years` VALUES (1,1,'2023-10-01','2024-09-30');
/*!40000 ALTER TABLE `accounting_years` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_categories`
--

DROP TABLE IF EXISTS `client_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client_categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `fpo_id` int NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_categories`
--

LOCK TABLES `client_categories` WRITE;
/*!40000 ALTER TABLE `client_categories` DISABLE KEYS */;
INSERT INTO `client_categories` VALUES (1,1,'Association','Associations comprised of farmer groups or individual farmers'),(2,1,'Cooperative','A company made up of farmer associations'),(3,1,'Exporter','A local company exporting coffee'),(4,1,'Importer','A foreign company to which coffee is exported'),(5,1,'Roaster','A large scale roaster abroad'),(6,1,'Trader','A local company mainly trading in coffee');
/*!40000 ALTER TABLE `client_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `fpo` int NOT NULL,
  `client_type` varchar(1) NOT NULL COMMENT 'Whether Supplier or Buyer. S for Supplier and B for Buyer',
  `name` varchar(200) NOT NULL,
  `contact_person` varchar(45) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `telephone_1` varchar(17) DEFAULT NULL,
  `telephone_2` varchar(17) DEFAULT NULL,
  `email_1` varchar(100) DEFAULT NULL,
  `email_2` varchar(100) DEFAULT NULL,
  `category_id` int DEFAULT NULL COMMENT 'Exporter, Local',
  `currency_id` int DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL COMMENT 'The role of the contact person',
  `country_id` int DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `subcounty` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4  COMMENT='Suppliers who supply coffee. Can be registered as groups, associations, coops etc';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,1,'S','Mabira Coffee Farmers Association','Kabimba Adams','Mukono','0706053465','0782363573','isaacwasukira@gmail.com',NULL,1,1,'Manager',1,NULL,'Mabira','Katosi Road'),(2,1,'S','Kabonera Coffee Farmers Association','Kabimba Adams','Mukono','0706053465','0782363573','isaacwasukira@gmail.com',NULL,0,1,'Manager',1,NULL,'Mabira','Katosi Road'),(3,1,'S','Lwamagwa CFA','Kato','Mpigi','07845451545','85965556','kato@lwmagwa.com',NULL,2,1,'Manager',1,NULL,'','Masaka Road'),(4,1,'B','Carico Cafe','Isaac Wasukira',NULL,'7845124152','254152415','test@gmail.com',NULL,3,1,'Manager',1,'Nairobi',NULL,'1'),(5,1,'B','Cafe River SPA','Marco',NULL,'+12 4152 25632','+12 4521 23584 ','caferiver@gmail.com',NULL,5,1,'CEO',1,'Inter Milan',NULL,'1'),(6,1,'B','EFICO','Daniels',NULL,'+13 4152 25632','+13 4521 23584 ','efico@gmail.com',NULL,4,2,'Operations Manager',2,'Inter Milan',NULL,'2');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coffee_category`
--

DROP TABLE IF EXISTS `coffee_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coffee_category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `fpo` int NOT NULL COMMENT 'Farmer Producer Organisation',
  `category_name` varchar(45) NOT NULL,
  `type_id` int NOT NULL COMMENT 'Can be Robusta or Arabica',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4  COMMENT='Coffee categories';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_category`
--

LOCK TABLES `coffee_category` WRITE;
/*!40000 ALTER TABLE `coffee_category` DISABLE KEYS */;
INSERT INTO `coffee_category` VALUES (9,1,'Natural Robusta Coffee',1),(10,1,'Washed Robusta Coffee',1),(11,1,'Wastes and Losses',3),(12,1,'Washed Arabica Coffee',2);
/*!40000 ALTER TABLE `coffee_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coffee_types`
--

DROP TABLE IF EXISTS `coffee_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coffee_types` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coffee_types`
--

LOCK TABLES `coffee_types` WRITE;
/*!40000 ALTER TABLE `coffee_types` DISABLE KEYS */;
INSERT INTO `coffee_types` VALUES (1,'Robusta'),(2,'Arabica'),(3,'None');
/*!40000 ALTER TABLE `coffee_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `company_id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(45) NOT NULL,
  `contact_person` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4  COMMENT='Companies using this system';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'NUCAFE','Mercy Kemigisha','mercy.kemigisha@nucafe.org','07887878787');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counties`
--

DROP TABLE IF EXISTS `counties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counties` (
  `county_id` int NOT NULL,
  `district_id` int NOT NULL,
  `county_name` varchar(45) NOT NULL,
  PRIMARY KEY (`county_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counties`
--

LOCK TABLES `counties` WRITE;
/*!40000 ALTER TABLE `counties` DISABLE KEYS */;
INSERT INTO `counties` VALUES (1,3,'Agago '),(2,98,'Agule '),(3,4,'Ajuri '),(4,7,'Amuria '),(5,108,'Aringa '),(6,10,'Arua Municipal Council'),(7,97,'Aruu '),(8,30,'Aswa '),(9,10,'Ayivu '),(10,68,'Bamunanika '),(11,50,'Bbaale '),(12,88,'Bokora '),(13,72,'Bubulo '),(14,105,'Budadiri '),(15,11,'Budaka '),(16,27,'Budiope East '),(17,27,'Budiope West '),(18,85,'Budyebo '),(19,56,'Bufumbira '),(20,44,'Bugabula '),(21,31,'Bugahya '),(22,51,'Bugangaizi '),(23,51,'Bugangaizi East '),(24,20,'Bughendera '),(25,34,'Bugweri '),(26,31,'Buhaguzi '),(27,14,'Buhweju '),(28,15,'Buikwe '),(29,75,'Bujenje '),(30,41,'Bujumba '),(31,35,'Bukanga '),(32,16,'Bukedea '),(33,16,'Bukomansimbi '),(34,48,'Bukonzo '),(35,13,'Bukooli '),(36,86,'Bukooli Island '),(37,86,'Bukooli South '),(38,70,'Bukoto '),(39,74,'Bukoto Central '),(40,74,'Bukoto East '),(41,18,'Bulambuli '),(42,42,'Bulamogi '),(43,18,'Buliisa '),(44,75,'Bungokho '),(45,75,'Bunya '),(46,39,'Bunyangabu '),(47,100,'Bunyaruguru '),(48,24,'Bunyole '),(49,39,'Burahya '),(50,75,'Buruuli '),(51,22,'Bushenyi-Ishaka Municipal Council'),(52,23,'Busia Municipal Council'),(53,87,'Busiki '),(54,107,'Busiro '),(55,48,'Busongora '),(56,78,'Busujju '),(57,25,'Butambala '),(58,98,'Butebo '),(59,36,'Butembe '),(60,26,'Buvuma Islands '),(61,82,'Buwekula '),(62,51,'Buyaga '),(63,51,'Buyaga West '),(64,51,'Buyanja '),(65,44,'Buzaaya '),(66,20,'Bwamba '),(67,83,'Chekwii (Kadam) '),(68,57,'Chua '),(69,37,'Dodoth East '),(70,37,'Dodoth West '),(71,28,'Dokolo '),(72,2,'East Moyo '),(73,107,'Entebbe Municipal Council'),(74,67,'Erute '),(75,39,'Fort Portal Municipal Council'),(76,29,'Gomba '),(77,30,'Gulu Municipal Council'),(78,31,'Hoima Municipal Council'),(79,32,'Ibanda '),(80,34,'Iganga Municipal Council'),(81,22,'Igara '),(82,37,'Ik '),(83,11,'Iki-Iki '),(84,35,'Isingiro '),(85,60,'Jie '),(86,36,'Jinja Municipal Council'),(87,89,'Jonam '),(88,38,'Kabale Municipal Council'),(89,40,'Kaberamaido '),(90,71,'Kabula '),(91,36,'Kagoma '),(92,93,'Kajara '),(93,99,'Kakuuto '),(94,40,'Kalaki '),(95,43,'Kalungu '),(96,43,'Kampala Capital City'),(97,7,'Kapelebyong '),(98,82,'Kasambya '),(99,48,'Kasese Municipal Council'),(100,76,'Kashari '),(101,103,'Kasilo '),(102,82,'Kassanda '),(103,100,'Katerera '),(104,68,'Katikamu '),(105,54,'Kazo '),(106,45,'Kibale '),(107,55,'Kibanda '),(108,52,'Kiboga East '),(109,63,'Kiboga West '),(110,53,'Kibuku '),(111,34,'Kigulu '),(112,8,'Kilak '),(113,46,'Kinkiizi '),(114,5,'Kioga '),(115,45,'Kitagwenda '),(116,58,'Koboko '),(117,59,'Kole '),(118,17,'Kongasis '),(119,99,'Kooki '),(120,61,'Kumi '),(121,9,'Kwania '),(122,62,'Kween '),(123,107,'Kyadondo '),(124,64,'Kyaka '),(125,41,'Kyamuswa '),(126,99,'Kyotera '),(127,1,'Labwor '),(128,66,'Lamwo '),(129,67,'Lira Municipal Council'),(130,68,'Luuka '),(131,102,'Lwemiyaga '),(132,10,'Madi-Okollo '),(133,12,'Manjiya '),(134,73,'Maracha '),(135,9,'Maruzi '),(136,74,'Masaka Municipal Council'),(137,75,'Masindi Municipal Council'),(138,79,'Matheniko '),(139,102,'Mawogola '),(140,81,'Mawokota '),(141,75,'Mbale Municipal Council'),(142,76,'Mbarara Municipal Council'),(143,78,'Mityana '),(144,4,'Moroto '),(145,79,'Moroto Municipal Council'),(146,83,'Mukono '),(147,83,'Mukono Municipal Council'),(148,65,'Mwenge '),(149,84,'Nakaseke North '),(150,84,'Nakaseke South '),(151,39,'Nakasongola '),(152,85,'Nakasongola '),(153,83,'Nakifuma Council'),(154,38,'Ndorwa '),(155,90,'Ngora '),(156,50,'Ntenjeru '),(157,92,'Ntoroko '),(158,93,'Ntungamo Municipal Council'),(159,94,'Nwoya '),(160,54,'Nyabushozi '),(161,80,'Obongi '),(162,109,'Okoro '),(163,30,'Omoro '),(164,95,'Otuke '),(165,96,'Oyam '),(166,89,'Padyere '),(167,98,'Pallisa '),(168,83,'Pian '),(169,101,'Rubabo '),(170,38,'Rubanda '),(171,93,'Ruhaama '),(172,77,'Ruhinda '),(173,101,'Rujumbura '),(174,38,'Rukiga '),(175,101,'Rukungiri Municipal Council'),(176,93,'Rushenyi '),(177,76,'Rwampara '),(178,23,'Samia-Bugwe '),(179,103,'Serere '),(180,104,'Sheema '),(181,106,'Soroti '),(182,106,'Soroti Municipal Council'),(183,10,'Terego '),(184,47,'Tingey '),(185,49,'Toroma '),(186,106,'Tororo '),(187,106,'Tororo Municipal Council'),(188,6,'Upe '),(189,49,'Usuk '),(190,10,'Vurra '),(191,106,'West Budama '),(192,80,'West Moyo ');
/*!40000 ALTER TABLE `counties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `country_id` int NOT NULL,
  `continent` varchar(45) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `country_rank` int DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Africa','Uganda',1),(2,'Africa','Algeria',2),(3,'Africa','Angola',3),(4,'Africa','Benin',4),(5,'Africa','Botswana',5),(6,'Africa','Burkina Faso',6),(7,'Africa','Burundi',7),(8,'Africa','Cabo Verde/Cape Verde',8),(9,'Africa','Cameroon',9),(10,'Africa','Central African Republic',10),(11,'Africa','Chad',11),(12,'Africa','Comoros',12),(13,'Africa','Congo/Republic of the Congo',13),(14,'Africa','Democratic Republic of the Congo',14),(15,'Africa','Djibouti',15),(16,'Africa','Egypt',16),(17,'Africa','Equatorial Guinea',17),(18,'Africa','Eritrea',18),(19,'Africa','Eswatini',19),(20,'Africa','Ethiopia',20),(21,'Africa','Gabon',21),(22,'Africa','Gambia',22),(23,'Africa','Ghana',23),(24,'Africa','Guinea',24),(25,'Africa','Guinea-Bissau',25),(26,'Africa','Ivory Coast',26),(27,'Africa','Kenya',27),(28,'Africa','Lesotho',28),(29,'Africa','Liberia',29),(30,'Africa','Libya',30),(31,'Africa','Madagascar',31),(32,'Africa','Malawi',32),(33,'Africa','Mali',33),(34,'Africa','Mauritania',34),(35,'Africa','Mauritius',35),(36,'Africa','Morocco',36),(37,'Africa','Mozambique',37),(38,'Africa','Namibia',38),(39,'Africa','Niger',39),(40,'Africa','Nigeria',40),(41,'Africa','Rwanda',41),(42,'Africa','Sao Tome and Principe',42),(43,'Africa','Senegal',43),(44,'Africa','Seychelles',44),(45,'Africa','Sierra Leone',45),(46,'Africa','Somalia',46),(47,'Africa','South Africa',47),(48,'Africa','South Sudan',48),(49,'Africa','Sudan',49),(50,'Africa','Tanzania',50),(51,'Africa','Togo',51),(52,'Africa','Tunisia',52),(53,'Africa','Zambia',53),(54,'Africa','Zimbabwe',54),(55,'Asia','Afghanistan',1),(56,'Asia','Armenia',2),(57,'Asia','Azerbaijan',3),(58,'Asia','Bahrain',4),(59,'Asia','Bangladesh',5),(60,'Asia','Bhutan',6),(61,'Asia','Brunei',8),(62,'Asia','Cambodia',9),(63,'Asia','China',10),(64,'Asia','Cyprus',11),(65,'Asia','Egypt',12),(66,'Asia','Georgia',13),(67,'Asia','Hong Kong',14),(68,'Asia','India',15),(69,'Asia','Indonesia',16),(70,'Asia','Iran',17),(71,'Asia','Iraq',18),(72,'Asia','Israel',19),(73,'Asia','Japan',20),(74,'Asia','Jordan',21),(75,'Asia','Kazakhstan',22),(76,'Asia','Kuwait',23),(77,'Asia','Kyrgyzstan',24),(78,'Asia','Laos',25),(79,'Asia','Lebanon',26),(80,'Asia','Macau',27),(81,'Asia','Malaysia',28),(82,'Asia','Maldives',29),(83,'Asia','Mongolia',30),(84,'Asia','Myanmar',31),(85,'Asia','Nepal',32),(86,'Asia','North Korea',33),(87,'Asia','Oman',34),(88,'Asia','Pakistan',35),(89,'Asia','Palestine',36),(90,'Asia','Philippines',37),(91,'Asia','Qatar',38),(92,'Asia','Russia',39),(93,'Asia','Saudi Arabia',40),(94,'Asia','Singapore',41),(95,'Asia','South Korea',42),(96,'Asia','Sri Lanka',43),(97,'Asia','Syria',44),(98,'Asia','Taiwan',45),(99,'Asia','Tajikistan',46),(100,'Asia','Thailand',47),(101,'Asia','Timor-Leste/East Timor',48),(102,'Asia','Turkey',49),(103,'Asia','Turkmenistan',50),(104,'Asia','United Arab Emirates',51),(105,'Asia','Uzbekistan',52),(106,'Asia','Vietnam',53),(107,'Asia','Yemen',54),(108,'Europe','Albania',1),(109,'Europe','Andorra',2),(110,'Europe','Armenia',3),(111,'Europe','Austria',4),(112,'Europe','Azerbaijan',5),(113,'Europe','Belarus',6),(114,'Europe','Belgium',7),(115,'Europe','Bosnia and Herzegovina',8),(116,'Europe','Bulgaria',9),(117,'Europe','Croatia',10),(118,'Europe','Cyprus',11),(119,'Europe','Czechia/Czech Republic',12),(120,'Europe','Denmark',13),(121,'Europe','Estonia',14),(122,'Europe','Finland',15),(123,'Europe','France',16),(124,'Europe','Georgia',17),(125,'Europe','Germany',18),(126,'Europe','Greece',19),(127,'Europe','Hungary',20),(128,'Europe','Iceland',21),(129,'Europe','Ireland',22),(130,'Europe','Italy',23),(131,'Europe','Kazakhstan',24),(132,'Europe','Latvia',25),(133,'Europe','Liechtenstein',26),(134,'Europe','Lithuania',27),(135,'Europe','Luxembourg',28),(136,'Europe','Malta',29),(137,'Europe','Moldova',30),(138,'Europe','Monaco',31),(139,'Europe','Montenegro',32),(140,'Europe','Netherlands',33),(141,'Europe','North Macedonia',34),(142,'Europe','Norway',35),(143,'Europe','Poland',36),(144,'Europe','Portugal',37),(145,'Europe','Romania',38),(146,'Europe','Russia',39),(147,'Europe','San Marino',40),(148,'Europe','Serbia',41),(149,'Europe','Slovakia',42),(150,'Europe','Slovenia',43),(151,'Europe','Spain',44),(152,'Europe','Sweden',45),(153,'Europe','Switzerland',46),(154,'Europe','Turkey',47),(155,'Europe','Ukraine',48),(156,'Europe','United Kingdom',49),(157,'Europe','Vatican City',50),(158,'North America','Antigua and Barbuda',1),(159,'North America','Bahamas',2),(160,'North America','Barbados',3),(161,'North America','Belize',4),(162,'North America','Canada',5),(163,'North America','Costa Rica',6),(164,'North America','Cuba',7),(165,'North America','Dominica',8),(166,'North America','Dominican Republic',9),(167,'North America','El Salvador',10),(168,'North America','Grenada',11),(169,'North America','Guatemala',12),(170,'North America','Haiti',13),(171,'North America','Honduras',14),(172,'North America','Jamaica',15),(173,'North America','Mexico',16),(174,'North America','Nicaragua',17),(175,'North America','Panama',18),(176,'North America','Saint Kitts and Nevis',19),(177,'North America','Saint Lucia',20),(178,'North America','Saint Vincent and the Grenadines',21),(179,'North America','Trinidad and Tobago',22),(180,'North America','United States of America',23),(181,'Australia','Australia',1),(182,'Australia','Fiji',2),(183,'Australia','Kiribati',3),(184,'Australia','Marshall Islands',4),(185,'Australia','Micronesia',5),(186,'Australia','Nauru',6),(187,'Australia','New Zealand',7),(188,'Australia','Palau',8),(189,'Australia','Papua New Guinea',9),(190,'Australia','Samoa',10),(191,'Australia','Solomon Islands',11),(192,'Australia','Tonga',12),(193,'Australia','Tuvalu',13),(194,'Australia','Vanuatu',14),(195,'South America','Argentina',1),(196,'South America','Bolivia',2),(197,'South America','Brazil',3),(198,'South America','Chile',4),(199,'South America','Colombia',5),(200,'South America','Ecuador',6),(201,'South America','Guyana',7),(202,'South America','Paraguay',8),(203,'South America','Peru',9),(204,'South America','Suriname',10),(205,'South America','Uruguay',11),(206,'South America','Venezuela',12);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencies` (
  `currency_id` int NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(45) NOT NULL,
  `curency_code` varchar(4) NOT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4  COMMENT='Currencies';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'Uganda Shillings','UGX','Shs'),(2,'United States Dollar','USD','$'),(3,'Euros','EUR','€');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliveries`
--

DROP TABLE IF EXISTS `deliveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deliveries` (
  `grn` int NOT NULL AUTO_INCREMENT,
  `fpo` int NOT NULL,
  `quality_remarks` varchar(100) DEFAULT NULL,
  `delivery_person` varchar(50) DEFAULT NULL,
  `truck_no` varchar(10) DEFAULT NULL,
  `prepared_by` int DEFAULT '0' COMMENT 'Staff Id who prepared',
  `time_prepared` datetime DEFAULT CURRENT_TIMESTAMP,
  `approved_by` int DEFAULT '0' COMMENT 'Staff Id who approved',
  `time_approved` datetime DEFAULT NULL,
  `reference` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`grn`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4  COMMENT='Deliveries by suppliers';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliveries`
--

LOCK TABLES `deliveries` WRITE;
/*!40000 ALTER TABLE `deliveries` DISABLE KEYS */;
INSERT INTO `deliveries` VALUES (1,1,'Mositure is okay','Kato Chrisesto','UAJ 237K',1,NULL,2,NULL,'DN7856');
/*!40000 ALTER TABLE `deliveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `districts` (
  `district_id` int(3) unsigned zerofill NOT NULL,
  `region` varchar(25) DEFAULT NULL,
  `district_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (000,'None','None'),(001,'NORTH','Abim'),(002,'NORTH','Adjumani'),(003,'NORTH','Agago'),(004,'NORTH','Alebtong'),(005,'NORTH','Amolatar'),(006,'NORTH','Amudat'),(007,'EAST','Amuria'),(008,'NORTH','Amuru'),(009,'NORTH','Apac'),(010,'NORTH','Arua'),(011,'EAST','Budaka'),(012,'EAST','Bududa'),(013,'EAST','Bugiri'),(014,'WEST','Buhweju'),(015,'CENTRAL','Buikwe'),(016,'EAST','Bukedea'),(017,'EAST','Bukwa'),(018,'EAST','Bulambuli'),(019,'WEST','Bulindo'),(020,'WEST','Bulisa'),(021,'CENTRAL','Buomansimbi'),(022,'WEST','Bushenyi'),(023,'EAST','Busia'),(024,'EAST','Butalega'),(025,'CENTRAL','Butambala'),(026,'CENTRAL','Buvuma'),(027,'EAST','Buyenda'),(028,'NORTH','Dokolo'),(029,'CENTRAL','Gomba'),(030,'NORTH','Gulu'),(031,'WEST','Hoima'),(032,'WEST','Ibanda'),(033,'EAST','Iganga'),(034,'EAST','Iganga'),(035,'WEST','Insingiro'),(036,'EAST','Jinja'),(037,'NORTH','Kaabong'),(038,'WEST','Kabale'),(039,'WEST','Kabarole'),(040,'EAST','Kaberamaido'),(041,'CENTRAL','kalangala'),(042,'EAST','Kaliro'),(043,'CENTRAL','kalungu'),(044,'EAST','Kamuli'),(045,'WEST','Kamwenge'),(046,'WEST','Kanungu'),(047,'EAST','Kapchorwa'),(048,'WEST','Kasese'),(049,'EAST','Katakwi'),(050,'CENTRAL','Kayunga'),(051,'WEST','Kibaale'),(052,'CENTRAL','Kiboga'),(053,'EAST','Kibuku'),(054,'WEST','Kiruhura'),(055,'WEST','Kiryandongo'),(056,'WEST','Kisoro'),(057,'NORTH','Kitgum'),(058,'NORTH','Koboko'),(059,'NORTH','Kole'),(060,'NORTH','Kotido'),(061,'EAST','Kumi'),(062,'EAST','Kween'),(063,'CENTRAL','Kyankwanzi'),(064,'WEST','Kyegegwa'),(065,'WEST','Kyejonjo'),(066,'NORTH','Lamwo'),(067,'NORTH','Lira'),(068,'EAST','Luuka'),(069,'CENTRAL','Luwero'),(070,'CENTRAL','Lwengo'),(071,'CENTRAL','Lyantonde'),(072,'EAST','Manafwa'),(073,'NORTH','Maracha'),(074,'CENTRAL','Masaka'),(075,'WEST','Masindi'),(076,'WEST','Mbarara'),(077,'WEST','Mitooma'),(078,'CENTRAL','Mityana'),(079,'NORTH','Moroto'),(080,'NORTH','Moyo'),(081,'CENTRAL','Mpigi'),(082,'CENTRAL','Mubende'),(083,'CENTRAL','Mukono'),(084,'NORTH','Nakapiripiriti'),(085,'CENTRAL','Nakasongola'),(086,'EAST','Namayingo'),(087,'EAST','Namutumba'),(088,'NORTH','Napak'),(089,'NORTH','Nebbi'),(090,'EAST','Ngora'),(091,'CENTRAL','Nkaseke'),(092,'WEST','Ntoroko'),(093,'WEST','Ntungamo'),(094,'NORTH','Nwoya'),(095,'NORTH','Otuke'),(096,'NORTH','Oyam'),(097,'NORTH','Pader'),(098,'EAST','Pallisa'),(099,'CENTRAL','Rakai'),(100,'WEST','Rubirizi'),(101,'WEST','Rukungiri'),(102,'CENTRAL','Sembabule'),(103,'EAST','Serere'),(104,'WEST','Sheema'),(105,'EAST','Sironko'),(106,'EAST','Soroti'),(107,'CENTRAL','Wakiso'),(108,'NORTH','Yumbe'),(109,'NORTH','Zombo');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_groups`
--

DROP TABLE IF EXISTS `grade_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_groups` (
  `group_id` int NOT NULL AUTO_INCREMENT,
  `fpo` varchar(45) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4  COMMENT='Grade groups such as high grades, low grades, undergrades, wastes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_groups`
--

LOCK TABLES `grade_groups` WRITE;
/*!40000 ALTER TABLE `grade_groups` DISABLE KEYS */;
INSERT INTO `grade_groups` VALUES (1,'1','High Grades',NULL),(2,'1','Low Grades',NULL),(3,'1','Undergrades',NULL),(4,'1','Wastes & Losses',NULL);
/*!40000 ALTER TABLE `grade_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grades` (
  `grade_id` int NOT NULL AUTO_INCREMENT,
  `grade_code` varchar(7) DEFAULT NULL COMMENT 'Grade Code',
  `grade_name` varchar(50) NOT NULL,
  `category_id` int NOT NULL,
  `unit` varchar(10) DEFAULT 'Kg',
  `group_id` int DEFAULT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4  COMMENT='Coffee grades ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,'NRSC18','Natural Robusta Screen 1800',9,'Kg',1),(2,'NRSC17','Natual Robusta Screen 1700',9,'Kg',1),(3,'NRSC15','Natural Robusta Screen 1500',9,'Kg',1),(4,'NRSC12','Natural Robusta Screen 1200',9,'Kg',1),(5,'WUGAA','Washed Arabica AA',12,'Kg',1);
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `transaction_type_id` int NOT NULL COMMENT 'Whether Purchase, Sale, Return etc',
  `transaction_id` int NOT NULL,
  `trans_date` date NOT NULL,
  `client_id` int NOT NULL,
  `item_no` int NOT NULL,
  `grade_id` varchar(15) NOT NULL,
  `store_id` varchar(45) NOT NULL,
  `qty_in` decimal(10,2) DEFAULT '0.00',
  `qty_out` decimal(10,2) DEFAULT '0.00',
  `currency_id` varchar(15) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `exch_rate` decimal(10,4) DEFAULT NULL,
  `moisture` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`transaction_type_id`,`transaction_id`,`item_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  COMMENT='For storing inventory transactions ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,1,'2024-08-22',1,1,'1','1',60000.00,0.00,'1',8700.00,1.0000,12.30),(1,5,'2024-08-26',2,1,'1','1',100.00,0.00,'1',4500.00,1.0000,NULL),(1,5,'2024-08-26',2,2,'2','1',350.00,0.00,'1',5000.00,1.0000,NULL),(1,6,'2024-08-01',3,1,'5','1',140.00,0.00,'1',5000.00,1.0000,13.50),(1,6,'2024-08-01',3,2,'4','1',40.00,0.00,'1',6500.00,1.0000,13.50),(1,6,'2024-08-01',3,3,'2','1',60.00,0.00,'1',8700.00,1.0000,13.50),(1,7,'2024-08-26',2,1,'3','1',1230.00,0.00,'1',5600.00,1.0000,12.90),(1,7,'2024-08-26',2,2,'2','1',4100.00,0.00,'1',6500.00,1.0000,12.90),(1,7,'2024-08-26',2,3,'1','1',230.00,0.00,'1',15000.00,1.0000,12.90),(2,1,'2024-09-04',5,1,'1','1',0.00,100.00,'1',12000.00,1.0000,13.50),(2,1,'2024-09-04',5,2,'2','1',0.00,200.00,'1',8500.00,1.0000,13.50),(2,3,'2024-08-27',6,1,'4','1',0.00,100.00,'2',6800.00,1.0000,0.00),(2,3,'2024-08-27',6,2,'2','1',0.00,250.00,'2',7500.00,1.0000,0.00),(2,3,'2024-08-27',6,3,'3','1',0.00,5600.00,'2',9000.00,1.0000,0.00),(2,5,'2024-09-10',6,1,'1','1',0.00,1.00,'2',100.00,1.0000,12.00),(2,5,'2024-09-10',6,2,'2','1',0.00,1.00,'2',500.00,1.0000,12.00),(2,5,'2024-09-10',6,3,'5','1',0.00,120.00,'2',8000.00,1.0000,12.00);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2024-07-29-155108','App\\Database\\Migrations\\CreateUsersTable','default','App',1722277904,1),(2,'2024-09-08-174522','App\\Database\\Migrations\\CreatePasswordResetsTable','default','App',1725828760,2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parishes`
--

DROP TABLE IF EXISTS `parishes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parishes` (
  `parish_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `county_id` varchar(45) NOT NULL,
  PRIMARY KEY (`parish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  COMMENT='Parishes in Counties';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parishes`
--

LOCK TABLES `parishes` WRITE;
/*!40000 ALTER TABLE `parishes` DISABLE KEYS */;
/*!40000 ALTER TABLE `parishes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES (1,'devjajja@gmail.com','c1e5a5b86ead1a46683fc4b117d519288f0737d4f7ae4a029dc1cac45891b8dab18d13a817cfdb66b351f2ad16485ee5a8e5','2024-09-08 20:53:23');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `sales_id` int NOT NULL AUTO_INCREMENT,
  `fpo` int NOT NULL,
  `sales_report_no` varchar(45) DEFAULT NULL,
  `date` date NOT NULL,
  `client_id` varchar(45) NOT NULL,
  `market` varchar(45) DEFAULT 'Local' COMMENT 'Whether Local or Export Sale',
  `prepared_by` int DEFAULT NULL COMMENT 'Staff Id who prepared',
  `time_prepared` datetime DEFAULT CURRENT_TIMESTAMP,
  `approved_by` int DEFAULT NULL COMMENT 'Staff Id who approved',
  `time_approved` datetime DEFAULT NULL,
  `reference` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Sales to buyers';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,1,'S2024/0001','2024-09-04','5','Local',1,'2024-09-04 21:36:15',NULL,NULL,'Just Ref'),(2,1,'SR0001','2024-08-29','5','Local',1,'2024-09-04 22:23:49',NULL,NULL,'S28399'),(3,1,NULL,'2024-08-27','6','Local',1,'2024-09-05 21:32:06',NULL,NULL,''),(4,1,'SR0001','2024-09-04','5','Export',1,'2024-09-06 00:04:50',NULL,NULL,'Final Sale'),(5,1,NULL,'2024-09-10','6','Export',1,'2024-09-09 23:42:32',NULL,NULL,'Changed');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stores` (
  `store_id` int NOT NULL AUTO_INCREMENT,
  `store_name` varchar(50) NOT NULL,
  `location` varchar(45) NOT NULL,
  `manager` varchar(45) NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4  COMMENT='Stores where coffee is stored';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
INSERT INTO `stores` VALUES (1,'Main Warehouse','Factory Premises','Scovia');
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_types`
--

DROP TABLE IF EXISTS `transaction_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction_types` (
  `transaction_type_id` int NOT NULL AUTO_INCREMENT,
  `transaction_name` varchar(45) NOT NULL,
  `transaction_code` varchar(2) NOT NULL,
  `comment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`transaction_type_id`),
  UNIQUE KEY `transaction_name_UNIQUE` (`transaction_name`),
  UNIQUE KEY `transaction_code_UNIQUE` (`transaction_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4  COMMENT='Categories of transactions such as sales, purchases, returns stc';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_types`
--

LOCK TABLES `transaction_types` WRITE;
/*!40000 ALTER TABLE `transaction_types` DISABLE KEYS */;
INSERT INTO `transaction_types` VALUES (1,'Purchases','PI',NULL),(2,'Sales','SI',NULL);
/*!40000 ALTER TABLE `transaction_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Mr.','Jajja','Guga','devjajja@gmail.com','$2y$10$49xWqsVCg/Sj8oSKQR0UuOIV8rFykBrD.ZmTK/vH5E83KMnUdgRxC','2024-07-29 18:35:05','2024-07-29 18:35:05',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valuations`
--

DROP TABLE IF EXISTS `valuations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `valuations` (
  `valuation_id` int NOT NULL AUTO_INCREMENT,
  `valuation_date` date NOT NULL,
  `fpo` int NOT NULL,
  `client_id` int NOT NULL,
  `grn` varchar(45) DEFAULT NULL,
  `prepared_by` int DEFAULT NULL,
  `time_prepared` datetime DEFAULT CURRENT_TIMESTAMP,
  `approved_by` int DEFAULT NULL,
  `time_approved` datetime DEFAULT NULL,
  PRIMARY KEY (`valuation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4  COMMENT='Final valuations ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valuations`
--

LOCK TABLES `valuations` WRITE;
/*!40000 ALTER TABLE `valuations` DISABLE KEYS */;
INSERT INTO `valuations` VALUES (1,'2024-08-27',1,1,'4123',1,NULL,NULL,NULL),(2,'2024-08-27',1,1,'4123',1,'2024-08-26 22:38:14',NULL,NULL),(3,'2024-08-27',1,1,'4123',1,'2024-08-26 22:50:32',NULL,NULL),(4,'2024-08-27',1,1,'4123',1,'2024-08-26 22:50:43',NULL,NULL),(5,'2024-08-26',1,2,'2341',1,'2024-08-26 23:14:40',NULL,NULL),(6,'2024-08-01',1,3,'5412, 3652',1,'2024-08-27 20:35:14',NULL,NULL),(7,'2024-08-26',1,2,'963',1,'2024-08-27 21:10:38',NULL,NULL);
/*!40000 ALTER TABLE `valuations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-18  0:38:30
