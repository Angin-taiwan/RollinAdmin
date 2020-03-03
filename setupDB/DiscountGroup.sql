--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `DiscountGroup`
--

DROP TABLE IF EXISTS `DiscountGroup`;

CREATE TABLE `DiscountGroup`(
   DiscountGroupID  	  INT     	    NOT NULL   AUTO_INCREMENT,
   DiscountGroupName   VARCHAR(20)   NOT NULL,
   DiscountTypeID      INT           NOT NULL,
   DiscountPrice       DECIMAL       NOT NULL,
   StartDate		     DATETIME 	    NOT NULL,
   EndDate			     DATETIME      NOT NULL,
   PRIMARY KEY ( DiscountGroupID )
);

--
-- Dumping data for table `DiscountGroup`
--