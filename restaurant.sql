# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.5-10.1.21-MariaDB)
# Database: restaurant
# Generation Time: 2017-06-03 09:00:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table customerdetails
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customerdetails`;

CREATE TABLE `customerdetails` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `customerName` varchar(100) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerMobile` varchar(100) NOT NULL,
  `CustomerAge` varchar(100) NOT NULL,
  `CustomerGender` varchar(100) NOT NULL,
  `customerAddress` varchar(100) NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `customerdetails` WRITE;
/*!40000 ALTER TABLE `customerdetails` DISABLE KEYS */;

INSERT INTO `customerdetails` (`customerId`, `customerName`, `customerEmail`, `customerMobile`, `CustomerAge`, `CustomerGender`, `customerAddress`)
VALUES
	(1,'Shaun Djuhari','shaundjuhari@gmail.com','83363572','25','male','154 bishan');

/*!40000 ALTER TABLE `customerdetails` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(100) NOT NULL,
  `itemPrice` varchar(100) NOT NULL,
  PRIMARY KEY (`itemId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;

INSERT INTO `items` (`itemId`, `itemName`, `itemPrice`)
VALUES
	(2,'Roti','700'),
	(3,'Buah','200');

/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table login
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `loginId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`loginId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;

INSERT INTO `login` (`loginId`, `username`, `password`)
VALUES
	(1,'admin','123');

/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orderitems
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orderitems`;

CREATE TABLE `orderitems` (
  `orderItemId` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `orderId` int(11) NOT NULL,
  PRIMARY KEY (`orderItemId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `orderitems` WRITE;
/*!40000 ALTER TABLE `orderitems` DISABLE KEYS */;

INSERT INTO `orderitems` (`orderItemId`, `itemName`, `quantity`, `price`, `orderId`)
VALUES
	(3,'Dosa','1','700',8),
	(4,'Dosa','2','700',9),
	(5,'idli','2','200',9),
	(6,'Dosa','1','700',10),
	(7,'Dosa','1','700',11);

/*!40000 ALTER TABLE `orderitems` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `customerMobile` varchar(100) NOT NULL,
  `totalAmount` varchar(100) NOT NULL,
  `paymentType` varchar(100) NOT NULL,
  `orderStatus` varchar(100) NOT NULL,
  `orderDate` datetime NOT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`orderId`, `customerMobile`, `totalAmount`, `paymentType`, `orderStatus`, `orderDate`)
VALUES
	(1,'8656823023','120','cash','pending','2017-05-30 06:24:24'),
	(8,'8656823023','700','cash','pending','2017-05-29 14:06:39'),
	(9,'8656823023','1800','bank','pending','2017-05-29 14:06:33'),
	(10,'8656823023','700','cash','pending','2017-06-01 14:06:41'),
	(11,'8656823023','700','cash','pending','2017-06-03 12:06:50');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
