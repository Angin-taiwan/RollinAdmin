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
   OrderID       INT         NOT NULL     AUTO_INCREMENT ,
   UserID        INT         NOT NULL ,
   PaymentID     INT         NOT NULL ,
   ShippingID    INT         NOT NULL ,
   OrderDate     DATETIME    NOT NULL     DEFAULT CURRENT_TIMESTAMP ,
   ShippedDate   DATETIME                 DEFAULT NULL ,
   DeliverDate   DATETIME                 DEFAULT NULL ,
   CancelDate    DATETIME                 DEFAULT NULL ,
   MarketingID   VARCHAR(20)              DEFAULT NULL ,
   CouponID      VARCHAR(20)              DEFAULT NULL ,
   FinalPrice    INT         NOT NULL ,
   PRIMARY KEY ( OrderID )
);


LOCK TABLES `Order` WRITE;

INSERT INTO `Order` (`OrderID`, `UserID`, `PaymentID`, `ShippingID`, `OrderDate`, `ShippedDate`, `DeliverDate`, `CancelDate`, `MarketingID`, `CouponID`, `FinalPrice`) VALUES (NULL, '1212', '1212', '1212', current_timestamp(), '2020-02-28 19:45:32', NULL, NULL, 'mar88', 'cou20202', '10000');
INSERT INTO `Order` (`OrderID`, `UserID`, `PaymentID`, `ShippingID`, `OrderDate`, `ShippedDate`, `DeliverDate`, `CancelDate`, `MarketingID`, `CouponID`, `FinalPrice`) VALUES (NULL, '121233', '12123112', '12121221', current_timestamp(), '2020-02-29 19:46:07', NULL, NULL, 'mar8833', 'cou2122', '1003');

UNLOCK TABLES;