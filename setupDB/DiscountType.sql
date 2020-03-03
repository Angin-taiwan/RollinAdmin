  --
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `DiscountType`
--

DROP TABLE IF EXISTS `DiscountType`;

CREATE TABLE `DiscountType`(
   DiscountTypeID  	  INT     	    NOT NULL    AUTO_INCREMENT,
   DiscountName       VARCHAR(20)   NOT NULL,
   PRIMARY KEY ( DiscountTypeID )
);

--
-- Dumping data for table `DiscountType`
--