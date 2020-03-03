--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Order`
--

DROP TABLE IF EXISTS `Order`;

CREATE TABLE `Order` (
   `OrderID`       INT         NOT NULL     AUTO_INCREMENT ,
   `UserID`        INT         NOT NULL ,
   `PaymentID`     INT         NOT NULL ,
   `ShippingID`    INT         NOT NULL ,
   `OrderDate`     DATETIME    NOT NULL     DEFAULT CURRENT_TIMESTAMP ,
   `ShippedDate`   DATETIME                 DEFAULT NULL ,
   `DeliverDate`   DATETIME                 DEFAULT NULL ,
   `CancelDate`    DATETIME                 DEFAULT NULL ,
   `MarketingID`   VARCHAR(20)              DEFAULT NULL ,
   `CouponID`      VARCHAR(20)              DEFAULT NULL ,
   `FinalPrice`    INT         NOT NULL ,
   PRIMARY KEY ( OrderID )
);

--
-- Dumping data for table `Order`
--

LOCK TABLES `Order` WRITE;

INSERT INTO `Order` (`OrderID`, `UserID`, `PaymentID`, `ShippingID`, `OrderDate`, `ShippedDate`, `DeliverDate`, `CancelDate`, `MarketingID`, `CouponID`, `FinalPrice`) VALUES (NULL, '1', '1', '2', current_timestamp(), NULL, NULL, NULL, NULL, NULL, '10000'), (NULL, '4', '1', '1', current_timestamp(), NULL, NULL, NULL, NULL, NULL, '1003');

UNLOCK TABLES;