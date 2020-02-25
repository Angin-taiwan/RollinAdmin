--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Brand`
--

DROP TABLE IF EXISTS `Brand`;
CREATE TABLE `Brand`(
   BrandID INT NOT NULL AUTO_INCREMENT,
   BrandName VARCHAR(50) NOT NULL,
   Description VARCHAR(500),
   PRIMARY KEY ( BrandID )
);

--
-- Dumping data for table `brand`
--

LOCK TABLES `Brand` WRITE;

INSERT INTO `Brand` (BrandName, Description) VALUES ("DC", "DC Description");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Toy Machine", "Toy Machine Description");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Vans", "Vanse Description");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Element", "Element Description");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Spitfire", "Spitfire Description");

UNLOCK TABLES;