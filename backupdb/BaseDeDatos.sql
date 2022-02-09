-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_proyeto3
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `tbl_fotos`
--

DROP TABLE IF EXISTS `tbl_fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_fotos` (
  `id_foto` int NOT NULL AUTO_INCREMENT,
  `url_foto_principal` varchar(200) DEFAULT NULL,
  `id_restaurante` int DEFAULT NULL,
  `url_foto1` varchar(100) DEFAULT NULL,
  `url_foto2` varchar(100) DEFAULT NULL,
  `url_foto3` varchar(100) DEFAULT NULL,
  `url_foto4` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `fotos_restaurantes_idx` (`id_restaurante`),
  CONSTRAINT `fotos_restaurantes` FOREIGN KEY (`id_restaurante`) REFERENCES `tbl_restaurantes` (`id_restaurante`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fotos`
--

LOCK TABLES `tbl_fotos` WRITE;
/*!40000 ALTER TABLE `tbl_fotos` DISABLE KEYS */;
INSERT INTO `tbl_fotos` VALUES (1,'img/española.jpg',1,'img/default.png','img/default.png','img/default.png','img/default.png'),(2,'img/mexicana.jpg',2,'img/default.png','img/default.png','img/default.png','img/default.png'),(3,'img/N4XbPmoXfaYTS3YU31BhdrrXOKg1zHgyuxFlD52O.jpg',3,'img/default.png','img/default.png','img/default.png','img/default.png'),(4,'img/arabe.jpg',4,'img/default.png','img/default.png','img/default.png','img/default.png'),(5,'img/italia.jpg',5,'img/default.png','img/default.png','img/default.png','img/default.png'),(6,'img/española.jpg',1,'img/default.png','img/default.png','img/default.png','img/default.png'),(7,'img/65PlSaqcAqxHoq0M0GLjURQauid736cJ6InGzHez.jpg',7,'img/default.png','img/default.png','img/default.png','img/default.png'),(8,'img/jYzFSurcSpaHZrQcCV7RZBO7h8NqjTo766TZ1vCW.jpg',8,'img/default.png','img/default.png','img/default.png','img/default.png'),(9,'img/DnSyK3xKIHFFuaER5BYRJh5jZDuFf5KLzoxsrvwL.jpg',9,'img/default.png','img/default.png','img/default.png','img/default.png'),(10,'img/T5yKfzw0uADO0NwFSReMnjPlfPF0ckmNdCS2e2Du.jpg',11,'img/default.png','img/default.png','img/default.png','img/default.png'),(11,'img/0laa8MOJnj80XAQxNpYbOaKiPcwXlFvePVPArYRu.jpg',12,'img/default.png','img/default.png','img/default.png','img/default.png'),(12,'img/jq6xUqxsd7xCUKm6rvZVuyDvIcQzEuY77L9Cjie3.jpg',14,'img/default.png','img/default.png','img/default.png','img/default.png'),(13,'img/x37HRJhhp2OBSW2heycsVBwXvixVE8ZB4Di8LTjl.jpg',15,'img/default.png','img/default.png','img/default.png','img/default.png'),(14,'img/WtDZhjodHSLBTmUqCKw8rmQ3XRRMCSLOMx25sZwJ.jpg',16,'img/default.png','img/default.png','img/default.png','img/default.png');
/*!40000 ALTER TABLE `tbl_fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_perfiles`
--

DROP TABLE IF EXISTS `tbl_perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_perfiles` (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_perfiles`
--

LOCK TABLES `tbl_perfiles` WRITE;
/*!40000 ALTER TABLE `tbl_perfiles` DISABLE KEYS */;
INSERT INTO `tbl_perfiles` VALUES (1,'admin'),(2,'usuario');
/*!40000 ALTER TABLE `tbl_perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_restaurantes`
--

DROP TABLE IF EXISTS `tbl_restaurantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_restaurantes` (
  `id_restaurante` int NOT NULL AUTO_INCREMENT,
  `nombre_restaurante` varchar(45) DEFAULT NULL,
  `loc_lat_restaurante` decimal(7,5) DEFAULT NULL,
  `descripcion_restaurante` varchar(300) DEFAULT NULL,
  `email_dueño` varchar(100) DEFAULT NULL,
  `loc_alt_restaurante` decimal(7,5) DEFAULT NULL,
  `loc_restaurante` varchar(45) DEFAULT NULL,
  `tipo_restaurante` varchar(200) DEFAULT NULL,
  `dieta_especial` varchar(200) DEFAULT NULL,
  `comidas_restaurante` varchar(200) DEFAULT NULL,
  `desc_larga` varchar(400) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `activo_restaurante` int DEFAULT NULL,
  `precio_restaurante` int DEFAULT NULL,
  PRIMARY KEY (`id_restaurante`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_restaurantes`
--

LOCK TABLES `tbl_restaurantes` WRITE;
/*!40000 ALTER TABLE `tbl_restaurantes` DISABLE KEYS */;
INSERT INTO `tbl_restaurantes` VALUES (1,'Restaurante Paco',41.38780,'Bar español de TEST','EstoesunTest@gmail.com',2.16992,'calle falsa num 69','Española','TestSI','Mediodia y cenas TEST','TEST un restaurante clasico español nuestra comida es española de españa con todos los ingredientes clasicos de nuestra comida, como dios manda arriba españa.','607041199',1,1),(2,'Andele Tacos',44.38790,'Buenisimos tacos para toda la familia','pepeman@gmail.com',3.16994,'calle falsa num 4','Mexicana',NULL,NULL,NULL,NULL,1,2),(3,'John xinaa',45.38790,'Es un buffet libre','restaurantelord@gmail.com',5.16994,'calle falsa num 5','China','Puto','Mediodia y cenas','Nos encanta la comida rapida XDD','607043316',1,3),(4,'Halal Time',46.38790,'Kebab barato!!','restaurantelvn@gmail.com',3.16994,'calle falsa num 4','Arabe',NULL,NULL,NULL,NULL,1,1),(5,'Pizza place',46.38790,'Las mejores pizzas de Barcelona','restaurantelvn@gmail.com',3.16994,'calle falsa num 4','Italiana',NULL,NULL,NULL,NULL,1,2),(6,'La española',45.38790,'Bar español de españa2','restaurantelord2@gmail.com',3.16994,'calle falsa num 9','Española',NULL,NULL,NULL,NULL,1,1),(7,'TEST CREAR1',22.89400,'Semos gordos','testsi@gmail.com',22.89900,'ESPAÑA','China','gordo','mucha','Venid a comer','607948864',1,3),(8,'TEST CREAR1',22.89400,'Semos gordos','testsi@gmail.com',22.89900,'ESPAÑA','China','gordo','mucha','Venid a comer','607948864',1,3),(9,'TEST CREAR',22.89400,'Semos gordos','testsi@gmail.com',22.89900,'ESPAÑA','Italiana','gordo','mucha','Venid a comer','478963486',1,3),(11,'TEST CREAR',22.89400,'Semos gordos','testsi@gmail.com',22.89900,'ESPAÑA','Española','gordo','mucha','Venid a comer','7656546',1,3),(12,'Si',22.89400,'Semos gordos','testsi@gmail.com',22.89900,'ESPAÑA','Mexicana','gordo','mucha','Venid a comer','7656546',0,1),(14,'Siasd',22.89400,'Semos gordos','testsi@gmail.com',22.89900,'ESPAÑA','Mexicana','gordo','mucha','Venid a comer','7656546',1,1),(15,'elPepe',22.89400,'Semos gordos','testsi@gmail.com',22.89900,'ESPAÑA','Arabe','gordo','mucha','Venid a comer','607946680',0,2),(16,'elPepe',22.89400,'Semos gordos','testsi@gmail.com',22.89900,'ESPAÑA','Arabe','gordo','mucha','Venid a comer','607946680',0,2);
/*!40000 ALTER TABLE `tbl_restaurantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `mail_usuario` varchar(45) DEFAULT NULL,
  `contraseña_usuario` varchar(45) DEFAULT NULL,
  `foto_usuario` varchar(200) DEFAULT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `perfil_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `usuario_perfil_idx` (`perfil_usuario`),
  CONSTRAINT `usuario_perfil` FOREIGN KEY (`perfil_usuario`) REFERENCES `tbl_perfiles` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (1,'admin@gmail.com','qweQWE123',NULL,'admin',1),(2,'pepe@gmail.com','qweQWE123',NULL,'pepe',2),(3,'Test1@gmail.com','qweQWE123','img/XQA0H4DjGOhvgZQAuLgnrSow4M7ho2DAngS06g6n.jpg','Test',1),(4,'1@gmail.com','123',NULL,'user1',2),(5,'TheRealpepe@gmail.com','qweQWE123','img//NMOiz4b3i74FfwU3JqYkhVRRYtJ7s6Fs3nlh2czf.jpg','Pepe1',1);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_valoraciones`
--

DROP TABLE IF EXISTS `tbl_valoraciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_valoraciones` (
  `id_valoracion` int NOT NULL AUTO_INCREMENT,
  `cuerpo_valoracion` varchar(400) DEFAULT NULL,
  `puntuacion_valoracion` int DEFAULT NULL,
  `id_restaurante` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id_valoracion`),
  KEY `valoraciones_usuario_idx` (`id_usuario`),
  KEY `valoraciones_restaurante_idx` (`id_restaurante`),
  CONSTRAINT `valoraciones_restaurante` FOREIGN KEY (`id_restaurante`) REFERENCES `tbl_restaurantes` (`id_restaurante`),
  CONSTRAINT `valoraciones_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_valoraciones`
--

LOCK TABLES `tbl_valoraciones` WRITE;
/*!40000 ALTER TABLE `tbl_valoraciones` DISABLE KEYS */;
INSERT INTO `tbl_valoraciones` VALUES (1,'Muy buen servicio',10,1,1),(2,'Nada mal',8,1,2),(3,'Terrible',4,1,2);
/*!40000 ALTER TABLE `tbl_valoraciones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-09 19:24:24
