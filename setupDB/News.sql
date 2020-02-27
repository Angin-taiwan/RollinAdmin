--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `News`
--

DROP TABLE IF EXISTS `News`;

CREATE TABLE `News`(
   NewsID  	  INT     	    NOT NULL   AUTO_INCREMENT,
   Title    VARCHAR(20) ,
   Description varchar(100),
   CreateDate date,
   UpdateDate date,
   photo blob,
   PRIMARY KEY ( NewsID )
);