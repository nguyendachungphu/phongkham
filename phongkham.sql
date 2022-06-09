-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: phongkham
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `bacsy`
--

DROP TABLE IF EXISTS `bacsy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bacsy` (
  `bacsy_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bacsy_ten` varchar(250) NOT NULL,
  `khoa_id` int(10) NOT NULL,
  `trangthai` int(1) NOT NULL,
  PRIMARY KEY (`bacsy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bacsy`
--

LOCK TABLES `bacsy` WRITE;
/*!40000 ALTER TABLE `bacsy` DISABLE KEYS */;
INSERT INTO `bacsy` VALUES (1,'ThS.BS Lê Ngọc Trâm',1,1),(2,'ThS.BS Lê Hoàng Ngọc Nam',1,1),(3,'ThS.BS Nguyễn Phước Lộc',2,1),(4,'BS Mai Thị Hương Thảo',2,1),(5,'BS Nguyễn Tấn Đức',3,1);
/*!40000 ALTER TABLE `bacsy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `benhnhan`
--

DROP TABLE IF EXISTS `benhnhan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `benhnhan` (
  `benhnhan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(250) NOT NULL,
  `tuoi` int(10) NOT NULL,
  `que` varchar(250) NOT NULL,
  `bacsy_kham` varchar(255) NOT NULL,
  `ngaykham` date NOT NULL,
  `chuandoan` text NOT NULL,
  PRIMARY KEY (`benhnhan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `benhnhan`
--

LOCK TABLES `benhnhan` WRITE;
/*!40000 ALTER TABLE `benhnhan` DISABLE KEYS */;
INSERT INTO `benhnhan` VALUES (1,'Nguyễn Trần Long Hảo',22,'Đà Nẵng','ThS.BS Lê Ngọc Trâm','2022-06-04',''),(2,'Nguyễn Văn Thương',22,'Đà Nẵng','ThS.BS Lê Ngọc Trâm','2022-06-07',''),(3,'Nguyễn Đắc Hùng Phú',22,'Huế','ThS.BS Lê Ngọc Trâm','2022-06-13','Sốt'),(4,'Nguyễn Duy Phong',24,'Hà Nội','ThS.BS Lê Ngọc Trâm','2022-07-07','Viêm Amidam'),(5,'Ngô Bảo Trung Kiên',23,'Hà Nội','ThS.BS Lê Ngọc Trâm','2022-07-07','Rối loạn tiền đình'),(6,'Võ Văn Phúc Trí',24,'Hà Nội','ThS.BS Lê Ngọc Trâm','2022-07-13','Viêm họng');
/*!40000 ALTER TABLE `benhnhan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chuyenkhoa`
--

DROP TABLE IF EXISTS `chuyenkhoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chuyenkhoa` (
  `khoa_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_khoa` varchar(250) NOT NULL,
  `trangthai` int(1) NOT NULL,
  PRIMARY KEY (`khoa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chuyenkhoa`
--

LOCK TABLES `chuyenkhoa` WRITE;
/*!40000 ALTER TABLE `chuyenkhoa` DISABLE KEYS */;
INSERT INTO `chuyenkhoa` VALUES (1,'khoa Tổng Thế',1),(2,'khoa Mắt',1),(3,'khoa Tai Mũi Họng',1);
/*!40000 ALTER TABLE `chuyenkhoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `danhmuc` (
  `danhmuc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `danhmuc_ten` varchar(100) NOT NULL,
  `danhmuc_oder` int(10) NOT NULL,
  `danhmuc_trangthai` int(1) NOT NULL,
  PRIMARY KEY (`danhmuc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc`
--

LOCK TABLES `danhmuc` WRITE;
/*!40000 ALTER TABLE `danhmuc` DISABLE KEYS */;
INSERT INTO `danhmuc` VALUES (1,'Lời giới thiệu',1,1),(2,'Cơ sở vật chất',2,1),(5,'Cam kết của chúng tôi',3,1),(6,'Dịch vụ',4,1),(7,'Tin tức',5,1),(8,'Bác sỹ',6,1),(9,'Chi phí',7,1),(10,'Đặt hẹn',9,1),(11,'Hình ảnh',10,1),(12,'Quảng cáo',11,1),(13,'slile',12,1),(14,'Logo',13,1);
/*!40000 ALTER TABLE `danhmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lichkham`
--

DROP TABLE IF EXISTS `lichkham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lichkham` (
  `lichkham_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_nguoikham` varchar(250) NOT NULL,
  `bacsy_id` int(10) NOT NULL,
  `ngaykham` date NOT NULL,
  `giokham` varchar(10) NOT NULL,
  `dienthoai_lienlac` varchar(100) NOT NULL,
  PRIMARY KEY (`lichkham_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lichkham`
--

LOCK TABLES `lichkham` WRITE;
/*!40000 ALTER TABLE `lichkham` DISABLE KEYS */;
INSERT INTO `lichkham` VALUES (1,'dũng',1,'2014-05-17','1','000000111'),(2,'Nguyễn trung tiến',9,'2014-05-30','1','0986632971'),(3,'Nguyễn trung tiến',1,'2014-05-16','1','0986632971'),(4,'Nguyễn trung tiến',9,'2014-05-16','1','0986632971'),(5,'Nguyễn trung tiến',9,'2014-05-16','0','0986632971'),(6,'Nguyễn Văn Trung ',6,'2014-05-16','1','01675641876'),(7,'Lê lai',12,'2014-05-16','1','0989765839'),(8,'vũ văn dũng',18,'2014-05-16','0','0988776543'),(9,'Hà Thị linh',6,'2014-05-16','0','01766987256'),(10,'Nguyễn trung tiến',4,'2014-05-16','0','0986632971'),(11,'Hà Hương',16,'2014-05-23','1','0988726484'),(12,'lê thị thúy',10,'2014-05-31','1','0166837645'),(13,'nguyễn thành đạt',17,'2014-05-31','0','0988746792'),(14,'Nguyễn trung tiến',16,'2014-05-30','1','0988776543'),(15,'nguyễn lương vĩnh',14,'2014-05-31','1','0974279246'),(16,'phan văn hiểu',5,'2014-05-30','1','0988765432'),(17,'Lê du bi',17,'2014-05-30','1','0988777666'),(18,'Bùi văn vũ',4,'2014-06-07','1','0986632971'),(19,'Bùi Thị Vân',4,'2014-06-07','1','01694761884'),(21,'Nguyễn Văn Trung ',4,'2014-06-07','1','0988776543'),(22,'Nguyễn Văn Trung ',4,'2014-06-07','1','0166837645'),(23,'Nguyễn trung tiến',5,'2014-06-07','1','0986632971'),(24,'Nguyễn Văn Trung ',5,'2014-06-07','1','0988776543'),(25,'Nguyễn trung tiến',5,'2014-06-07','1','0986632971'),(26,'vũ văn dũng',5,'2014-05-16','1','0166837645'),(27,'Nguyễn trung tiến',5,'2014-06-07','1','0986632971'),(28,'asdasd',3,'2022-06-15','10:54','1231231231');
/*!40000 ALTER TABLE `lichkham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) NOT NULL,
  `menu_order` int(10) NOT NULL,
  `menu_trangthai` int(10) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (2,'Giới thiệu',2,1),(3,'Dịch vụ',3,1),(4,'Tin tức',4,1),(5,'Bác sỹ',5,1),(9,'Chi Phí',12,1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_taikhoan` varchar(100) NOT NULL,
  `user_matkhau` varchar(100) NOT NULL,
  `user_tendaydu` varchar(150) NOT NULL,
  `user_gioitinh` char(1) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_level` int(10) NOT NULL,
  `user_trangthai` int(1) NOT NULL,
  `bacsy_id` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','e99a18c428cb38d5f260853678922e03','','1','01675641992','caominhtung64@gmail.com',1,1,1),(2,'1','c4ca4238a0b923820dcc509a6f75849b','Tùng lò gạch','1','0988887777','tungmail@.com',1,1,0),(5,'123','c4ca4238a0b923820dcc509a6f75849b','tiến gay','0','11112221133','121212@mail.com',2,0,0),(6,'2','c81e728d9d4c2f636f067f89cc14862c','2','','01675641876','',1,1,0),(7,'dat','c4ca4238a0b923820dcc509a6f75849b','đạt 09','','01694761884','',1,1,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'phongkham'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-07 22:23:03
