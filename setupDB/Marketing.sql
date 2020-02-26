--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Marketing`
--

DROP TABLE IF EXISTS `Marketing`;

CREATE TABLE `Marketing`(
   MarketingID  	INT     	  NOT NULL  AUTO_INCREMENT,
   MarketingName    VARCHAR(20)   NOT NULL,
   MarketingTypeID  INT           NOT NULL,
   MarketingValue   DECIMAL       NOT NULL,
   StartDate		DATETIME 	  NOT NULL,
   EndDate			DATETIME      NOT NULL,
   PRIMARY KEY ( MarketingID )
);
