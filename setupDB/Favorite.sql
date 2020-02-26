--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Brand`
--

DROP TABLE IF EXISTS `Favorite`;
CREATE TABLE `Favorite`(
   UserID INT NOT NULL PRIMARY KEY,
   ProductID INT  NOT NULL PRIMARY KEY, 
   SizeID INT  NOT NULL PRIMARY KEY ,  
   ColorID INT NOT NULL PRIMARY KEY  
);

--
-- Dumping data for table `brand`
--

LOCK TABLES `Favorite` WRITE;

INSERT INTO `Favorite` (UserID, ProductID, SizeID, ColorID) 
VALUES ("3", "2","1","2");




UNLOCK TABLES;