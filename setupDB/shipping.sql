--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Shipping`
--

DROP TABLE IF EXISTS `Shipping`;

CREATE TABLE `rollin`.`shipping` ( 
  `ShippingID`      INT             NOT NULL    AUTO_INCREMENT, 
  `ShippingName`    VARCHAR(20)     NOT NULL, 
  `ShippingPrice`   INT             NOT NULL    , 
  PRIMARY KEY (`ShippingID`)
);

--
-- Dumping data for table `Shipping`
--

LOCK TABLES `Shipping` WRITE;

INSERT INTO `Shipping` (`ShippingName`, `ShippingPrice`) VALUES ('宅配', '80');
INSERT INTO `Shipping` (`ShippingName`, `ShippingPrice`) VALUES ('宅配貨到付款', '100');
INSERT INTO `Shipping` (`ShippingName`, `ShippingPrice`) VALUES ('7-11取貨付款', '60');
INSERT INTO `Shipping` (`ShippingName`, `ShippingPrice`) VALUES ('全家取貨付款', '60');

UNLOCK TABLES;