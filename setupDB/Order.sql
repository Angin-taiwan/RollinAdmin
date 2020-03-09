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
   `OrderDate`     DATETIME    NOT NULL    DEFAULT CURRENT_TIMESTAMP ,
   `CheckedDate`   DATETIME                 DEFAULT NULL ,
   `ShippedDate`   DATETIME                 DEFAULT NULL ,
   `DeliverDate`   DATETIME                 DEFAULT NULL ,
   `CancelDate`    DATETIME                 DEFAULT NULL ,
   `MarketingID`   VARCHAR(20)              DEFAULT NULL ,
   `CouponID`      VARCHAR(20)              DEFAULT NULL ,
   `FinalPrice`    INT         NOT NULL ,
   PRIMARY KEY ( `OrderID` )
);

--
-- Dumping data for table `Order`
--


INSERT INTO `Order`
(`UserID`, `PaymentID`, `ShippingID`, `OrderDate`, `CheckedDate`, `ShippedDate`, `DeliverDate`, `CancelDate`, `MarketingID`, `CouponID`, `FinalPrice`) VALUES 
(1, 1, 2, NOW(), NULL, NULL, NULL, NULL, NULL, NULL, 7580),
(2, 2, 1, NOW(), NOW(), NULL, NULL, NULL, NULL, NULL, 5160),
(3, 3, 2, NOW(), NOW(), NOW(), NULL, NULL, NULL, NULL, 2580),
(4, 3, 1, NOW(), NOW(), NOW(), NOW(), NULL, NULL, NULL, 2580),
(16, 2, 2, '2020-02-03 19:13:29', NULL, NULL, NULL, NULL, NULL, NULL, 2580),
(7, 3, 3, '2020-03-01 19:13:29', NULL, NULL, NULL, NULL, NULL, NULL, 7740), 
(12, 2, 2, '2020-02-19 19:13:29', NULL, NULL, NULL, NULL, NULL, NULL, 10320), 
(20, 2, 2, '2020-03-02 19:13:29', NULL, NULL, NULL, NULL, NULL, NULL, 2580), 
(14, 2, 2, '2020-01-22 19:13:29', NULL, NULL, NULL, NULL, NULL, NULL, 2580),
(27, 2, 2, '2020-01-22 19:13:29', NULL, NULL, NULL, NULL, NULL, NULL, 2580);

