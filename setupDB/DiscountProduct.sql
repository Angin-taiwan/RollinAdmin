  --
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `DiscountProduct`
--

DROP TABLE IF EXISTS `DiscountProduct`;

CREATE TABLE `DiscountProduct`(
   DiscountGroupID  	  INT     NOT NULL  AUTO_INCREMENT,
   ProductID            INT  	  NOT NULL,
   PRIMARY KEY ( DiscountGroupID, ProductID )
);

--
-- Dumping data for table `DiscountProduct`
--