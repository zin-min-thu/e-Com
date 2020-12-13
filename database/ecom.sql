-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: ecom
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (16,'Admin','admin','09977899363','admin@gmail.com',NULL,'$2y$10$gYx1Ezi69tgZw4yfo82EE.Ar.1uxnepe6Yjx95XoKEIBgMbnaL69m','2020-12-01-06:12:50.jpeg',1,NULL,'2020-11-30 22:19:07','2020-12-01 00:02:50'),(17,'KoZin','user','3333','kozin@gmail.com',NULL,'$2y$10$E7vvEhdZTOqK4xwhniIoUeez0tJUfG3QN.anvZqMxkEwiRzWg8bHS','',0,NULL,'2020-11-30 23:00:31','2020-11-30 23:00:31');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Arrow',1,'2020-09-20 22:34:32','2020-09-20 22:34:32'),(2,'Gap',1,'2020-09-20 22:34:32','2020-09-20 22:34:32'),(3,'Lee',1,'2020-09-20 22:34:32','2020-09-20 22:34:32'),(4,'Monte Carlo',1,'2020-09-20 22:34:32','2020-11-26 04:07:21');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `bunners`
--

LOCK TABLES `bunners` WRITE;
/*!40000 ALTER TABLE `bunners` DISABLE KEYS */;
INSERT INTO `bunners` VALUES (1,'bunner1.png','https://www.youtube.com/','Black Jacket','Black Jacket',1,'2020-09-25 04:05:16','2020-09-28 02:25:35'),(2,'bunner2.png','','Half Sleeve T-Shirt','Half Sleeve T-Shirt',1,'2020-09-25 04:05:16','2020-09-25 04:05:16'),(3,'bunner3.png','','Full Sleeve T-Shirt','Full Sleeve T-Shirt',1,'2020-09-25 04:05:16','2020-11-26 03:49:04'),(4,'2020-09-27-10-28-23.png','Link','Bunner Title','',0,'2020-09-26 13:31:07','2020-11-13 01:08:08'),(5,'2020-09-27-10-25-31.png','sdfa update','Bunner Title update','hello update',0,'2020-09-26 13:32:33','2020-11-13 01:02:45'),(6,'2020-09-27-10-30-19.png','bunner link','Test Bunner','alter',0,'2020-09-27 03:59:56','2020-11-13 01:00:27');
/*!40000 ALTER TABLE `bunners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,7,'n4ZignWmext61LQw4RPA3c2LeLTm0Nu219boNGEI',1,1,'Medium','2020-12-09 05:13:22','2020-12-09 05:14:02'),(2,7,'n4ZignWmext61LQw4RPA3c2LeLTm0Nu219boNGEI',4,2,'Large','2020-12-09 05:13:34','2020-12-09 05:14:02'),(3,7,'1dNpFXXm99gcbZX8n4lsIWP8iwad3ctttf5mx2XH',5,1,'Medium','2020-12-09 05:14:32','2020-12-09 05:14:32');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,0,1,'T-Shirts','',NULL,NULL,'t-shirts',NULL,NULL,NULL,1,'2020-09-20 22:37:35','2020-11-08 14:05:43'),(2,0,1,'Shirts','',NULL,NULL,'shirts',NULL,NULL,NULL,1,'2020-09-20 22:38:37','2020-09-20 22:55:45'),(3,0,1,'Denims','',NULL,NULL,'denims',NULL,NULL,NULL,1,'2020-09-20 22:56:00','2020-09-20 22:56:19'),(4,1,1,'Casual T-Shirts','',NULL,NULL,'casual-t-shirts',NULL,NULL,NULL,1,'2020-09-20 22:57:05','2020-11-12 02:12:19'),(5,0,2,'Denims','',NULL,NULL,'denims-women',NULL,NULL,NULL,1,'2020-09-20 22:57:45','2020-09-20 22:57:50'),(6,0,3,'TShirts','',NULL,NULL,'t-shirts-kids',NULL,NULL,NULL,1,'2020-09-20 23:12:01','2020-09-21 01:07:11'),(7,1,1,'Formal T-Shirts','',50.00,'This is formal T-Shirts','formal-t-shirts',NULL,NULL,NULL,1,'2020-09-20 23:14:06','2020-11-08 14:15:22'),(8,0,1,'Test','',NULL,NULL,'test',NULL,NULL,NULL,1,'2020-09-21 03:59:38','2020-09-21 03:59:42'),(9,8,1,'testa','2020-27-09-09:50:52.png',NULL,NULL,'testa',NULL,NULL,NULL,1,'2020-09-21 04:00:06','2020-09-27 03:20:52'),(14,8,1,'testb','',NULL,NULL,'testb',NULL,NULL,NULL,1,'2020-09-21 04:09:54','2020-09-21 04:10:01');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_07_28_061210_create_admins_table',1),(5,'2020_08_01_141513_create_sections_table',1),(6,'2020_08_02_053639_create_categories_table',1),(7,'2020_08_06_061511_create_products_table',1),(8,'2020_08_17_164738_create_product_attributes_table',1),(9,'2020_08_25_133522_create_product_images_table',1),(10,'2020_08_26_182013_create_brands_table',1),(11,'2020_08_27_161800_add_brand_id_column_to_products_table',1),(14,'2020_09_24_073320_create_bunners_table',2),(18,'2020_10_31_062413_create_carts_table',3),(22,'2020_11_27_052059_create_permission_tables',4),(24,'2020_12_03_053716_add_columns_to_users_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (4,'App\\Admin',16),(5,'App\\Admin',17);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (13,'admin-list','web','2020-12-01 22:48:34','2020-12-01 22:48:34'),(14,'admin-create','web','2020-12-01 22:48:34','2020-12-01 22:48:34'),(15,'admin-edit','web','2020-12-01 22:48:34','2020-12-01 22:48:34'),(16,'admin-delete','web','2020-12-01 22:48:34','2020-12-01 22:48:34'),(17,'role-list','web','2020-12-01 22:48:34','2020-12-01 22:48:34'),(18,'role-create','web','2020-12-01 22:48:35','2020-12-01 22:48:35'),(19,'role-edit','web','2020-12-01 22:48:35','2020-12-01 22:48:35'),(20,'role-delete','web','2020-12-01 22:48:35','2020-12-01 22:48:35'),(21,'product-list','web','2020-12-01 22:48:35','2020-12-01 22:48:35'),(22,'product-create','web','2020-12-01 22:48:36','2020-12-01 22:48:36'),(23,'product-edit','web','2020-12-01 22:48:36','2020-12-01 22:48:36'),(24,'product-delete','web','2020-12-01 22:48:36','2020-12-01 22:48:36'),(25,'section-list','web','2020-12-01 22:48:36','2020-12-01 22:48:36'),(26,'section-create','web','2020-12-01 22:48:36','2020-12-01 22:48:36'),(27,'section-edit','web','2020-12-01 22:48:36','2020-12-01 22:48:36'),(28,'section-delete','web','2020-12-01 22:48:37','2020-12-01 22:48:37'),(29,'brand-list','web','2020-12-01 22:48:37','2020-12-01 22:48:37'),(30,'brand-create','web','2020-12-01 22:48:37','2020-12-01 22:48:37'),(31,'brand-edit','web','2020-12-01 22:48:37','2020-12-01 22:48:37'),(32,'brand-delete','web','2020-12-01 22:48:37','2020-12-01 22:48:37'),(33,'category-list','web','2020-12-01 22:48:37','2020-12-01 22:48:37'),(34,'category-create','web','2020-12-01 22:48:37','2020-12-01 22:48:37'),(35,'category-edit','web','2020-12-01 22:48:38','2020-12-01 22:48:38'),(36,'category-delete','web','2020-12-01 22:48:38','2020-12-01 22:48:38'),(37,'bunner-list','web','2020-12-01 22:48:38','2020-12-01 22:48:38'),(38,'bunner-create','web','2020-12-01 22:48:38','2020-12-01 22:48:38'),(39,'bunner-edit','web','2020-12-01 22:48:38','2020-12-01 22:48:38'),(40,'bunner-delete','web','2020-12-01 22:48:39','2020-12-01 22:48:39');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product_attributes`
--

LOCK TABLES `product_attributes` WRITE;
/*!40000 ALTER TABLE `product_attributes` DISABLE KEYS */;
INSERT INTO `product_attributes` VALUES (1,1,'Small',2000.00,5,'S01',1,'2020-10-25 05:53:30','2020-11-26 04:08:11'),(2,1,'Medium',3000.00,10,'M01',1,'2020-10-25 05:54:15','2020-11-04 03:14:50'),(3,1,'Large',5000.00,20,'L01',1,'2020-10-25 05:54:16','2020-11-04 03:14:50'),(4,4,'Small',4000.00,5,'SM001',1,'2020-11-03 01:39:33','2020-11-04 03:14:19'),(5,4,'Medium',5000.00,6,'ME001',0,'2020-11-03 01:39:33','2020-11-19 10:46:09'),(6,4,'Large',7000.00,10,'LA001',1,'2020-11-03 01:39:33','2020-11-04 03:14:20'),(7,6,'Small',1000.00,5,'MCT001 -S',1,'2020-11-04 03:33:57','2020-11-04 03:34:24'),(8,7,'Small',1000.00,3,'BLT010-S',1,'2020-11-08 14:17:26','2020-11-08 14:17:26'),(9,7,'Medium',2000.00,2,'BLT010-M',1,'2020-11-08 14:17:26','2020-11-08 14:17:26'),(10,7,'Large',3000.00,5,'BLT010-L',1,'2020-11-08 14:17:27','2020-11-08 14:17:27'),(11,5,'Small',2000.00,3,'PU10001-S',1,'2020-11-11 11:01:06','2020-11-11 11:01:06'),(12,5,'Medium',3000.00,2,'PU10001-M',1,'2020-11-11 11:01:06','2020-11-11 11:01:06'),(13,5,'Large',4000.00,4,'PU10001-L',1,'2020-11-11 11:01:06','2020-11-11 11:01:06'),(14,6,'Medium',2000.00,4,'MCT001-M',1,'2020-11-12 02:13:07','2020-11-12 02:13:07');
/*!40000 ALTER TABLE `product_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (2,1,'8344582020-10-26-09-04-38.jpeg',1,'2020-10-26 02:34:38','2020-10-26 02:34:38'),(3,1,'4352902020-10-26-09-41-47.jpeg',1,'2020-10-26 03:11:47','2020-10-26 03:11:47');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,4,1,1,'Blue Casual T-Shirt','BT001','Blue',2000.00,0.00,200.00,'','2020-09-22-07-14-25.jpeg','This is the product description','asdf','Cotton','Checked','Full Sleeve','Slim','Casual',NULL,NULL,NULL,'Yes',1,'2020-09-20 22:34:21','2020-11-13 01:01:47'),(2,4,1,2,'Red Casual T-Shirt','R001','Red',2000.00,10.00,200.00,'','',NULL,'asdf','Polyester','Plain','Half Sleeve','Regular','Formal',NULL,NULL,NULL,'Yes',1,'2020-09-20 22:34:21','2020-11-13 01:01:55'),(3,4,1,1,'Red Casual T-Shirts','RD101','Red',300.00,10.00,10.00,'','',NULL,'df','Cotton','Plain','Full Sleeve','Regular','Casual',NULL,NULL,NULL,'Yes',1,'2020-09-21 03:47:19','2020-09-22 00:23:28'),(4,4,1,1,'Black Casual T-Shirts','BL1001','Black',200.00,10.00,2.00,'','2020-09-22-07-14-55.jpeg',NULL,'afsd','Cotton','Plain','Full Sleeve','Regular','Casual',NULL,NULL,NULL,'Yes',1,'2020-09-21 03:48:50','2020-11-08 14:11:59'),(5,4,1,1,'Purple Casual T-Shirts','PU10001','Purple',2000.00,3.00,20.00,'','2020-09-22-07-13-54.jpeg',NULL,'sdfa','Cotton','Plain','Full Sleeve','Slim','Casual',NULL,NULL,NULL,'Yes',1,'2020-09-21 03:52:43','2020-11-11 11:01:53'),(6,4,1,1,'MC Casual T-Shirts','MCT001','Blue',1000.00,0.00,2.00,'','2020-09-22-07-11-43.jpeg',NULL,'adf','Polyester','Plain','Full Sleeve','Regular','Casual',NULL,NULL,NULL,'Yes',1,'2020-09-22 00:41:43','2020-11-12 02:11:45'),(7,7,1,1,'Blue Formal-T-Shirts','BLT010','Blue',1000.00,20.00,10.00,'','2020-09-30-06-31-01.jpeg',NULL,'sdfa','Cotton','Printed','Full Sleeve','Regular','Casual',NULL,NULL,NULL,'Yes',1,'2020-09-30 00:01:01','2020-11-08 14:18:36'),(8,7,1,1,'Red Formal-T-Shirts','RDF001','Red',3000.00,2.00,2.00,'','',NULL,'sdaf','Cotton','Plain','Full Sleeve','Regular','Casual',NULL,NULL,NULL,'Yes',1,'2020-10-07 07:19:59','2020-10-07 07:19:59');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (13,4),(14,4),(15,4),(16,4),(17,4),(18,4),(19,4),(20,4),(21,4),(22,4),(23,4),(24,4),(25,4),(26,4),(27,4),(28,4),(29,4),(30,4),(31,4),(32,4),(33,4),(34,4),(35,4),(36,4),(37,4),(38,4),(39,4),(40,4),(13,5),(14,5),(15,5),(16,5),(21,5),(22,5),(23,5),(24,5),(25,5),(26,5),(27,5),(28,5),(29,5),(30,5),(31,5),(32,5),(33,5),(34,5),(35,5),(36,5),(37,5),(38,5),(39,5),(40,5);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (4,'admin','web','2020-12-01 22:53:40','2020-12-01 22:53:40'),(5,'user','web','2020-12-01 22:55:33','2020-12-01 22:55:33');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,'Men',1,'2020-09-20 22:34:06','2020-09-21 04:33:27'),(2,'Women',1,'2020-09-20 22:34:06','2020-09-20 22:34:06'),(3,'Kids',1,'2020-09-20 22:34:06','2020-11-26 04:07:07');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User One','','','','','','1234','userone@gmail.com',NULL,'$2y$10$uwHZeaaDRXuVilN8kmygxeVBQc/PQKlxRoQBRSmHp1taHgTEkRKFy',0,'8Y5nbM5zIu3cAJ8VoyKwvFx4lSnjdpgWaXZXBgHkf37x5VNPKgjDsW291LSX','2020-12-03 02:20:12','2020-12-07 01:42:03'),(2,'User two','','','','','','4324','usertwo@gmail.com',NULL,'$2y$10$iR3ymEFgE2BzmBurv703OuTcmFdkAX5B.C/eXFMKwjtS1dN5yEDGq',0,NULL,'2020-12-03 02:25:11','2020-12-03 02:25:11'),(3,'User three','','','','','','4434343','userthree@gmail.com',NULL,'$2y$10$hNvUcMYPLSXx5KV0yRAZfOl.18Q97/zx97oS0dg60ya/E9BoU67rK',0,NULL,'2020-12-03 02:59:27','2020-12-03 02:59:27'),(4,'KoZin','','','','','','123222','useron@gmail.com',NULL,'$2y$10$lqlhZNeVvKTRnN0rwIWuDO9xQruPKEgWDL71.5.2.5rSZ.n56Bsp.',0,NULL,'2020-12-03 23:32:29','2020-12-03 23:32:29'),(5,'KoZin','','','','','','111111111','minthuphyo3@gmail.com',NULL,'$2y$10$ljA.a3/GAWOTrTy6QToR9OvXsnTgtXj68V.zhokmghgvzjEPxKsFu',0,'DXH7vULZnhRLo9XGWgdXABUv6RAWiGiz70IFJQPj2wt9VUe3fXVm1F0t0wii','2020-12-07 01:46:48','2020-12-08 03:22:11'),(6,'User four','','','','','','499499','userfour@gmail.com',NULL,'$2y$10$xWbIvg7f0OUHGJGynz1Yj.VG0Dbn..rgnxz/VxhB7yBiTnvFFmlAa',0,NULL,'2020-12-09 04:55:11','2020-12-09 04:55:11'),(7,'User Five','','','','','','4994949','userfive@gmail.com',NULL,'$2y$10$a4c.c.n4ET1cmoJx7NLkNe0vu9HoCge3PUCmsKm7dz7rnrSRRK6YW',0,NULL,'2020-12-09 05:14:02','2020-12-09 05:14:02');
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

-- Dump completed on 2020-12-13 12:31:38
