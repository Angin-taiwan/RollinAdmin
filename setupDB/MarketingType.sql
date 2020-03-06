--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `MarketingType`
--

DROP TABLE IF EXISTS `MarketingType`;

CREATE TABLE `MarketingType`(
   MarketingTypeID  	   INT     	     NOT NULL     AUTO_INCREMENT,
   MarketingTypeName    VARCHAR(20)   NOT NULL,
   PRIMARY KEY ( MarketingTypeID )
);

--
-- Dumping data for table `MarketingType`
--

LOCK TABLES `MarketingType` WRITE;

INSERT INTO MarketingType (MarketingTypeName) VALUES ("全店免運");
INSERT INTO MarketingType (MarketingTypeName) VALUES ("全店滿額免運");


UNLOCK TABLES;