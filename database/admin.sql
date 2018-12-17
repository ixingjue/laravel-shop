-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: laravel-shop
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'首页','fa-bar-chart','/',NULL,'2018-12-06 05:13:45'),(2,0,6,'系统管理','fa-tasks',NULL,NULL,'2018-12-16 12:04:40'),(3,2,7,'管理员','fa-users','auth/users',NULL,'2018-12-16 12:04:40'),(4,2,8,'角色','fa-user','auth/roles',NULL,'2018-12-16 12:04:40'),(5,2,9,'权限','fa-ban','auth/permissions',NULL,'2018-12-16 12:04:40'),(6,2,10,'菜单','fa-bars','auth/menu',NULL,'2018-12-16 12:04:40'),(7,2,11,'操作日志','fa-history','auth/logs',NULL,'2018-12-16 12:04:40'),(8,0,2,'用户管理','fa-users','/users','2018-12-06 19:49:00','2018-12-06 19:50:42'),(9,0,3,'商品管理','fa-cubes','/products','2018-12-06 22:38:56','2018-12-06 22:39:11'),(10,0,4,'订单管理','fa-rmb','/orders','2018-12-12 09:52:25','2018-12-12 09:52:35'),(11,0,5,'优惠券管理','fa-tags','/coupon_codes','2018-12-16 12:04:01','2018-12-16 12:04:40');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'用户管理','users','','/users*','2018-12-06 21:21:26','2018-12-06 21:21:26'),(7,'商品管理','products','','/products*','2018-12-17 09:00:55','2018-12-17 09:00:55'),(8,'订单管理','orders','','/orders*','2018-12-17 09:01:52','2018-12-17 09:01:52'),(9,'优惠券管理','coupon_codes','','/coupon_codes*','2018-12-17 09:03:36','2018-12-17 09:03:36');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(2,3,NULL,NULL),(2,4,NULL,NULL),(2,6,NULL,NULL),(2,7,NULL,NULL),(2,8,NULL,NULL),(2,9,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(2,4,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2018-12-06 05:07:03','2018-12-06 05:07:03'),(2,'运营','operator','2018-12-06 21:24:02','2018-12-06 21:24:02');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
INSERT INTO `admin_user_permissions` VALUES (4,3,NULL,NULL);
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$rNRBOU/GAQt7k7V/Ur7fz.XebncTdNdgKRnAMl/sUmuwTd5soCShG','Administrator',NULL,'GNZVCS4wa6rJNU8E7J5lQ4h7qdmDiWp5zBcMrTbf2JhW7F8v8P7ch5YqIcu7','2018-12-06 05:07:03','2018-12-06 05:07:03'),(2,'operator','$2y$10$k8eA5VVM9g959W0SMN54dek5m7P5WWNA5prx1xPRSciyAvTQrSjT2','运营','images/情缘证新版-恢复的.png','7jTivgNey3imtEStG3X1GEtq2YZ2bjReqvEedzi4oI7MMJs40Waz6uqGZOrc','2018-12-06 21:31:11','2018-12-06 21:40:11'),(4,'826739558@qq.com','$2y$10$uRBRqfobPPE8hJbpvELtw.u81I2WlhfkdIXRPOXaZrdeUay0UPyuC','826739558@qq.com',NULL,'HFyUCUAMMJrcTkMOyODwWCqOO7whpTNroXpDDTeSTfMotQ7KEklQvj9PmDkz','2018-12-06 21:47:23','2018-12-06 21:47:23');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-17 18:59:17
