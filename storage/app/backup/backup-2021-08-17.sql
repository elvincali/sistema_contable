-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_enfermeria
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `backups`
--

DROP TABLE IF EXISTS `backups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backups`
--

LOCK TABLES `backups` WRITE;
/*!40000 ALTER TABLE `backups` DISABLE KEYS */;
/*!40000 ALTER TABLE `backups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacoras`
--

DROP TABLE IF EXISTS `bitacoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacoras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacoras`
--

LOCK TABLES `bitacoras` WRITE;
/*!40000 ALTER TABLE `bitacoras` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_civ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ocupacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientes_user_id_foreign` (`user_id`),
  CONSTRAINT `clientes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,4,'masculino','nacionalidad','casado','zapatero','2021-08-17 04:50:17','2021-08-17 04:50:17'),(2,5,'Masculino','Boliviano','soltero','Secretaria','2021-08-17 04:50:17','2021-08-17 04:56:02'),(3,6,'femenino','Boliviano','soltera','Cocinera','2021-08-17 04:50:17','2021-08-17 04:50:17'),(4,6,'masculino','Boliviano','soltero','Banquero','2021-08-17 04:50:17','2021-08-17 04:50:17'),(5,7,'femenino','Boliviano','soltero','Secretaria','2021-08-17 04:50:17','2021-08-17 04:50:17'),(6,8,'masculino','Boliviano','casado','Ingeniero','2021-08-17 04:50:17','2021-08-17 04:50:17'),(7,9,'femenino','Boliviano','casado','Arquitecto','2021-08-17 04:50:17','2021-08-17 04:50:17'),(8,10,'masculino','Boliviano','soltero','Doctor','2021-08-17 04:50:17','2021-08-17 04:50:17');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_cuenta_id` bigint(20) unsigned NOT NULL,
  `cliente_id` bigint(20) unsigned NOT NULL,
  `num_cuenta` bigint(20) unsigned NOT NULL,
  `fecha_apertura` date NOT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `saldo` double(8,2) NOT NULL,
  `retiros_mes` int(11) NOT NULL DEFAULT 0,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuentas_tipo_cuenta_id_foreign` (`tipo_cuenta_id`),
  KEY `cuentas_cliente_id_foreign` (`cliente_id`),
  CONSTRAINT `cuentas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`),
  CONSTRAINT `cuentas_tipo_cuenta_id_foreign` FOREIGN KEY (`tipo_cuenta_id`) REFERENCES `tipo_cuentas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (1,1,4,10001234155487943,'2020-03-09',NULL,5000.00,0,1,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(2,1,4,10001234155487956,'2021-03-09',NULL,5000.00,0,1,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(3,1,5,10001234155267956,'2021-04-09',NULL,5000.00,0,1,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(4,2,5,10001234265487956,'2021-06-09',NULL,5000.00,0,1,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(5,1,6,10001234155486556,'2021-09-09',NULL,5000.00,0,1,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(6,1,6,10001234155537956,'2021-10-09',NULL,5000.00,0,1,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(7,1,7,10001234195487956,'2020-03-09',NULL,5000.00,0,1,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(8,1,8,10001234155467956,'2021-11-09',NULL,5000.00,0,1,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(9,1,9,10001234155697956,'2021-05-09',NULL,5000.00,0,1,'2021-08-17 04:50:17','2021-08-17 04:50:17');
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_07_01_031136_create_permission_tables',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2021_07_02_015517_create_sucursals_table',1),(6,'2021_07_07_170233_create_monedas_table',1),(7,'2021_07_07_195021_create_tipo_cuentas_table',1),(8,'2021_07_23_020226_create_clientes_table',1),(9,'2021_07_24_023335_create_cuentas_table',1),(10,'2021_07_24_141433_create_transaccions_table',1),(11,'2021_08_06_190252_create_backups_table',1),(12,'2021_08_09_151751_create_bitacoras_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(2,'App\\User',2),(2,'App\\User',3),(3,'App\\User',4),(3,'App\\User',5),(3,'App\\User',6),(3,'App\\User',7),(3,'App\\User',8),(3,'App\\User',9),(3,'App\\User',10),(3,'App\\User',11);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monedas`
--

DROP TABLE IF EXISTS `monedas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monedas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monedas`
--

LOCK TABLES `monedas` WRITE;
/*!40000 ALTER TABLE `monedas` DISABLE KEYS */;
INSERT INTO `monedas` VALUES (1,'Boliviano','BOB','2021-08-17 04:50:16','2021-08-17 04:50:16'),(2,'Dolar','DOL','2021-08-17 04:50:16','2021-08-17 04:50:16');
/*!40000 ALTER TABLE `monedas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'ver dashboard','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(2,'ver sucursal','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(3,'crear sucursal','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(4,'editar sucursal','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(5,'mostrar sucursal','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(6,'desactivar sucursal','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(7,'ver moneda','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(8,'crear moneda','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(9,'editar moneda','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(10,'mostrar moneda','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(11,'desactivar moneda','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(12,'ver usuario','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(13,'crear usuario','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(14,'editar usuario','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(15,'mostrar usuario','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(16,'desactivar usuario','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(17,'ver permiso','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(18,'crear permiso','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(19,'editar permiso','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(20,'mostrar permiso','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(21,'desactivar permiso','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(22,'ver rol','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(23,'crear rol','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(24,'editar rol','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(25,'mostrar rol','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(26,'desactivar rol','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(27,'ver tipo cuenta','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(28,'crear tipo cuenta','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(29,'editar tipo cuenta','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(30,'mostrar tipo cuenta','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(31,'desactivar tipo cuenta','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(32,'ver cuenta','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(33,'crear cuenta','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(34,'editar cuenta','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(35,'mostrar cuenta','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(36,'desactivar cuenta','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(37,'ver cliente','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(38,'crear cliente','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(39,'editar cliente','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(40,'mostrar cliente','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(41,'desactivar cliente','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(42,'ver transaccion','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(43,'crear transaccion','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(44,'editar transaccion','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(45,'mostrar transaccion','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(46,'desactivar transaccion','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(47,'ver deposito','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(48,'crear deposito','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(49,'editar deposito','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(50,'mostrar deposito','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(51,'desactivar deposito','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(52,'ver retiro','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(53,'crear retiro','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(54,'editar retiro','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(55,'mostrar retiro','web','2021-08-17 04:50:16','2021-08-17 04:50:16'),(56,'desactivar retiro','web','2021-08-17 04:50:16','2021-08-17 04:50:16');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(2,'funcionario','web','2021-08-17 04:50:15','2021-08-17 04:50:15'),(3,'cliente','web','2021-08-17 04:50:15','2021-08-17 04:50:15');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursals`
--

DROP TABLE IF EXISTS `sucursals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicio_atencion` time NOT NULL,
  `fin_atencion` time NOT NULL,
  `codigo` int(11) NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sitio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sucursals_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursals`
--

LOCK TABLES `sucursals` WRITE;
/*!40000 ALTER TABLE `sucursals` DISABLE KEYS */;
INSERT INTO `sucursals` VALUES (1,'Sucursal 1','1.jpg','08:00:00','16:00:00',1234,'-17.793935176396246','-63.17243244926048','Calle 8 Este, Santa Cruz de la Sierra','UV-5',NULL,NULL),(2,'Sucursal 2','2.jpg','08:00:00','16:00:00',157,'-17.771588685678825','-63.16406116574146','Av. Cañada Pailita o Avenida Paurito, Santa Cruz de la Sierra','UV-18',NULL,NULL),(3,'Sucursal 3','3.jpg','08:00:00','16:00:00',4565,'-17.761588685678825','-63.15406116574146','Cuellar, Santa Cruz de la Sierra','UV-18',NULL,NULL),(4,'Sucursal 4','4.jpg','08:00:00','16:00:00',4560,'-17.761588685678825','-63.15406116574146','Av. Irala esquina, Santa Cruz de la Sierra','UV-18',NULL,NULL);
/*!40000 ALTER TABLE `sucursals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cuentas`
--

DROP TABLE IF EXISTS `tipo_cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_cuentas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caracteristicas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ventajas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tasa_interes` double NOT NULL,
  `apertura_minima` double NOT NULL,
  `retiros_mes` int(11) NOT NULL DEFAULT 0,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `moneda_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_cuentas_moneda_id_foreign` (`moneda_id`),
  CONSTRAINT `tipo_cuentas_moneda_id_foreign` FOREIGN KEY (`moneda_id`) REFERENCES `monedas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cuentas`
--

LOCK TABLES `tipo_cuentas` WRITE;
/*!40000 ALTER TABLE `tipo_cuentas` DISABLE KEYS */;
INSERT INTO `tipo_cuentas` VALUES (1,'CAJA DE AHORROS','caja-de-ahorros.JPG','Es un producto de ahorro, que permite al cliente realizar depósitos y retiros de forma ilimitada, los fondos depositados son de disponibilidad inmediata y generan intereses que son capitalizados mensualmente','Disponible para Personas Naturales y Jurídicas.\n            Sin límite de retiros o depósitos a través de cajas.\n            Sin costo de mantenimiento de cuenta o tarjeta de débito.\n            Disponible en bolivianos y dólares.\n            Puedes abrir tu cuenta de manera individual o colectiva con orden de manejo conjunto o indistinto','Tarjeta de Débito, con la que puedes hacer compras por internet y POS.\n            Acceso a la red más grande del País con más de 190 agencias y más de 440 cajeros automáticos.\n            Manejo de la cuenta y acceso a información de los movimientos a nivel nacional.\n            Contamos con puntos de atención desde las 7 a.m. y nuestras agencias 7 días.\n            Acceso a los servicios de Banca Electrónica UNInet plus y UNImóvil plus las 24 horas del día.\n            Consulta tu saldo y movimientos fácil y sin costo través de nuestra Banca Electrónica UNInet plus, UNImóvil plus y Cajeros Automático.\n            Atención sin hacer filas a través del servicio UNIticket',2,0,0,1,1,'2021-08-17 04:50:16','2021-08-17 04:50:16'),(2,'CAJAS DE AHORRO UNIPLUS','Uniplus.JPG','Nuestra cuenta UNIPLUS, es la caja de ahorro que otorga el más alto rendimiento para tus ahorros.','Disponible para Personas Naturales.\n            Máximo de 4 retiros al mes por cualquier canal\n            Disponible en bolivianos y dólares.\n            Puedes abrir tu cuenta de manera individual o colectiva con orden de manejo conjunto o indistinto.\n            Sin costo de mantenimiento de cuenta o tarjeta de débito','Tarjeta de Débito, con la que puedes hacer compras por internet y POS.\n            Acceso a la red más grande del País con más de 190 agencias y más de 440 cajeros automáticos.\n            Contamos con puntos de atención desde las 7 am y nuestras agencias 7 días.\n            Acceso a los servicios de Banca Electrónica UNInet plus y UNImóvil plus.\n            Consulta tu saldo y movimientos fácil y sin costo a través de nuestra Banca Electrónica UNInet plus, UNImóvil plus y Cajeros Automáticos.\n            Atención sin hacer filas a través del servicio UNIticket',3.75,5000,4,1,1,'2021-08-17 04:50:16','2021-08-17 04:50:16');
/*!40000 ALTER TABLE `tipo_cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccions`
--

DROP TABLE IF EXISTS `transaccions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `monto` double(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ci_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('DEPOSITO','RETIRO','TRANSACCION') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_funcionario` int(11) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_cuenta_destino` int(11) DEFAULT NULL,
  `num_cuenta_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaccions_num_cuenta_id_foreign` (`num_cuenta_id`),
  CONSTRAINT `transaccions_num_cuenta_id_foreign` FOREIGN KEY (`num_cuenta_id`) REFERENCES `cuentas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccions`
--

LOCK TABLES `transaccions` WRITE;
/*!40000 ALTER TABLE `transaccions` DISABLE KEYS */;
INSERT INTO `transaccions` VALUES (1,1200.00,'2021-06-12','00:50:17',8754878,'RAFAEL GARCIA ARIAS','DEPOSITO',1234,'Deposito en caja de ahorro',NULL,2,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(2,110.00,'2021-06-15','00:50:17',87548681,'ROBERTO APAZA GONZALES','DEPOSITO',1234,'Deposito en caja de ahorro',NULL,4,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(3,1100.00,'2021-06-10','00:50:17',8754868,'CARMEN RIOS ROJAS','DEPOSITO',1234,'Deposito en caja de ahorro',NULL,3,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(4,100.00,'2021-06-20','00:50:17',8754868,'CARMEN RIOS ROJAS','DEPOSITO',1234,'Deposito en caja de ahorro',NULL,5,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(5,1200.00,'2021-06-12','00:50:17',8754878,'RAFAEL GARCIA ARIAS','RETIRO',1234,'Retiro en caja de ahorro',NULL,2,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(6,110.00,'2021-06-15','00:50:17',87548681,'ROBERTO APAZA GONZALES','RETIRO',1234,'Retiro en caja de ahorro',NULL,4,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(7,1100.00,'2021-06-10','00:50:17',8754868,'CARMEN RIOS ROJAS','RETIRO',1234,'Retiro en caja de ahorro',NULL,3,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(8,100.00,'2021-06-20','00:50:17',8754868,'CARMEN RIOS ROJAS','RETIRO',1234,'Retiro en caja de ahorro',NULL,5,'2021-08-17 04:50:17','2021-08-17 04:50:17');
/*!40000 ALTER TABLE `transaccions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_pat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_mat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nac` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitud` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitud` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin.jpg',0,0,'ADMIN',NULL,NULL,'2021-09-01',5487987,'los lotes','5487987sdd','5487987sdd','admin@admin.com',NULL,'$2y$10$4azI7sNYWVta4gfHMBLOo.5XcJmKnTCoGnfClM25YCGZXjfyeUl8e',1,NULL,'2021-08-17 04:50:16','2021-08-17 04:50:16'),(2,'funcionario1.jpg',9795297,5297,'Roxana','Aramayo','Saldias','2021-09-01',5487987,'los lotes, av Nuevo Palmar','5487987sdd','5487987sdd','user1@user.com',NULL,'$2y$10$yVRUir0t.4EsbJOsDa09W.MvVHk5ho0LqJb93eGqPa5uXrY5UHXpi',1,NULL,'2021-08-17 04:50:16','2021-08-17 04:50:16'),(3,'funcionario2.jpg',959784,9698,'Damian','Cortez','Mariscal','2021-09-01',5487987,'Plan 3000, av Paurito','5487987sdd','5487987sdd','user2@user.com',NULL,'$2y$10$FVSfA3Y69nrbpIVPSuCks.ASQVsdOP2e99jlWZAaHgexbzwsApy4O',1,NULL,'2021-08-17 04:50:16','2021-08-17 04:50:16'),(4,'cliente1.jpg',9787542,9752,'ALBERTO','RAMONES','CASTRO','2021-09-01',5487987,'km 6, doble via a la Guardia','5487987sdd','5487987sdd','user3@user.com',NULL,'$2y$10$yAr3uxOxb85tqHrWghb13.KBD92bR6p1TrRRZcqVFPT.mNacgf5kC',1,NULL,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(5,'public/EzZ1hrfs3erOXNk00EGjdGxMBH4VgodqW2xobbQz.jpg',9787513,9722,'ROBERTO','APAZA','GONZALES','2021-01-08',69854521,'Av. Las Americas','5487987sdd','5487987sdd','user4@user.com',NULL,'$2y$10$BHp7QRJPxG2QvdcoIx7EReCaUzZrqOsVua0YxZVgPl1FnrOuUlAia',1,NULL,'2021-08-17 04:50:17','2021-08-17 04:56:01'),(6,'cliente3.jpg',9787512,9733,'CARMEN','RIOS','ROJAS','2021-04-08',69854521,'Villa primero de mayo','5487787sdd','5487487sdd','user5@user.com',NULL,'$2y$10$4.KGnqUNvM3hjjq29S2n9.RPlLDeXrtXGs0W7T.Uix9P5s4nUDmvO',1,NULL,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(7,'cliente4.jpg',9787513,9755,'ROBERTO','APAZA','GONZALES','2021-01-08',69854521,'Av. Las Americas','5487167sdd','5487787sdd','user6@user.com',NULL,'$2y$10$trveiO.JQg3i1HMjNPikfO4ko6ETNuf.YIU6JlBfuQ0uD8B39nfvy',1,NULL,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(8,'cliente5.jpg',9787514,9766,'CELIA','BLANCO','RAMIREZ','2021-08-14',69854781,'Urb. Las retamas','5487160sdd','5481787sdd','user7@user.com',NULL,'$2y$10$7V50Qu7BRQHafJPhHxyOfufkBTeAAKSm2nVYFETeSuAOVngAOJDxa',1,NULL,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(9,'cliente6.jpg',9787515,9777,'CARLOS','FLORES','APAZA','2021-01-10',69854429,'Urb. Satelite','5407160sdd','5481717sdd','user8@user.com',NULL,'$2y$10$qmxJv4ScOk2TGKUwQsIvpunV88R0gIWQberbJQs40bPRh6dVYHKoC',1,NULL,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(10,'cliente7.jpg',9787516,9788,'ROCIO','MORALES','CALLEJAS','2021-09-01',69854409,'Av. Virgen de Cotoca','5307160sdd','5481711sdd','user9@user.com',NULL,'$2y$10$D/LDNnIiyJo8d9GFEZu64OQ1XnnmmV3s2XqV5ZWycfiTbTgreg1nW',1,NULL,'2021-08-17 04:50:17','2021-08-17 04:50:17'),(11,'cliente8.jpg',9787516,9788,'ALBERTO','CUELLAR','ROCA','2021-10-01',69454212,'Av. Roca y Coronado','5307161sdd','5421711sdd','user10@user.com',NULL,'$2y$10$id0tevI/42m68vrVYpxxWeqJIPf4LPY1hhKg9gfIOoANoYm/UMMRq',1,NULL,'2021-08-17 04:50:17','2021-08-17 04:50:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-17  1:07:28
