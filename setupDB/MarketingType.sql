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
