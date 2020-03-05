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
   `CheckedDate`   DATETIME                 DEFAULT NULL ,
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

INSERT INTO `Order`
(UserID, PaymentID, ShippingID, OrderDate, CheckedDate, ShippedDate, DeliverDate, CancelDate, MarketingID, CouponID, FinalPrice) VALUES 
(1, 1, 2, NOW(), NULL, NULL, NULL, NULL, NULL, NULL, 7580),
(2, 2, 1, NOW(), NOW(), NULL, NULL, NULL, NULL, NULL, 1003),
(3, 3, 2, NOW(), NOW(), NOW(), NULL, NULL, NULL, NULL, 3333),
(4, 4, 1, NOW(), NOW(), NOW(), NOW(), NULL, NULL, NULL, 4444);

UNLOCK TABLES;