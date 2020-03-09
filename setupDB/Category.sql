--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;

CREATE TABLE `Category`(
  CategoryID   INT          NOT NULL  AUTO_INCREMENT,
  CategoryName VARCHAR(50)  NOT NULL  UNIQUE,
  ParentID     INT,
  PRIMARY KEY ( CategoryID ),
  FOREIGN KEY ( ParentID ) REFERENCES Category ( CategoryID ) ON DELETE CASCADE ON UPDATE CASCADE 
);

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;

INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Skateboards", null);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Shoes", null);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Clothing", null);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Accessories", null);

INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Desks", 1);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Trucks", 1);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Wheels", 1);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Bearings", 1);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Hardware", 1);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Griptape", 1);

INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Skate Shoes", 2);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Sneakers", 2);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Winter Shoes", 2);

INSERT INTO `Category` (CategoryName, ParentID) VALUES ("T-Shirts", 3);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Hoodies", 3);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Jackets", 3);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Long Sleeves", 3);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Pants", 3);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Shorts", 3);

INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Backpacks", 4);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Bags", 4);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Belts", 4);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Caps / Hats", 4);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Key Chains", 4);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Socks", 4);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Sunglasses", 4);
INSERT INTO `Category` (CategoryName, ParentID) VALUES ("Wallets", 4);

UNLOCK TABLES;