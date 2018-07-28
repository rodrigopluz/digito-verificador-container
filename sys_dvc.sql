/*
SQLyog Enterprise - MySQL GUI v6.5
MySQL - 5.7.14 : Database - sys_dvc
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

create database if not exists `sys_dvc`;

USE `sys_dvc`;

/*Table structure for table `num_prefixo` */

DROP TABLE IF EXISTS `num_prefixo`;

CREATE TABLE `num_prefixo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix_letra` char(1) DEFAULT NULL,
  `prefix_numero` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Data for the table `num_prefixo` */

LOCK TABLES `num_prefixo` WRITE;

insert  into `num_prefixo`(`id`,`prefix_letra`,`prefix_numero`) values (1,'A','10'),(2,'B','12'),(3,'C','13'),(4,'D','14'),(5,'E','15'),(6,'F','16'),(7,'G','17'),(8,'H','18'),(9,'I','19'),(10,'J','20'),(11,'K','21'),(12,'L','23'),(13,'M','24'),(14,'N','25'),(15,'O','26'),(16,'P','27'),(17,'Q','28'),(18,'R','29'),(19,'S','30'),(20,'T','31'),(21,'U','32'),(22,'V','34'),(23,'W','35'),(24,'X','36'),(25,'Y','37'),(26,'Z','38');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
