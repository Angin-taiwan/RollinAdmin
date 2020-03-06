--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Payment`
--

DROP TABLE IF EXISTS `Payment`;

CREATE TABLE `rollin`.`Payment` ( 
   `PaymentID`       INT            NOT NULL      AUTO_INCREMENT, 
   `PaymentName`     VARCHAR(20)    NOT NULL, 
   PRIMARY KEY (`PaymentID`)
);

--
-- Dumping data for table `Payment`
--

LOCK TABLES `Payment` WRITE;

INSERT INTO `Payment` (`PaymentName`) VALUES ('信用卡');
INSERT INTO `Payment` (`PaymentName`) VALUES ('ATM轉帳');
INSERT INTO `Payment` (`PaymentName`) VALUES ('貨到付款');

UNLOCK TABLES;