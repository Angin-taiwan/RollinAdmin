--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `Payment`;

CREATE TABLE `rollin`.`Payment` ( 
   `PaymentID` INT NOT NULL AUTO_INCREMENT , 
   `PaymentName` VARCHAR(20) NOT NULL , 
   `PaymentFee` INT UNSIGNED NOT NULL ,
   PRIMARY KEY 
   (`PaymentID`)
   
   
);

--
-- Dumping data for table `Payment`
--

-- LOCK TABLES `Payment` WRITE;

INSERT INTO `payment` (`PaymentID`, `PaymentName`, `PaymentFee`) VALUES (NULL, 'ATM轉帳', '15'), (NULL, '711取貨付款', '30'), (NULL, '宅配貨到付款', '30');

-- UNLOCK TABLES;