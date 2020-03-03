-- made by AGC

--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `Color`;

CREATE TABLE  `Color` ( 
    ColorID     INT             NOT NULL        AUTO_INCREMENT, 
    Color       VARCHAR(20)     NOT NULL, 
    PRIMARY KEY (`ColorID`)
    );

--
-- Dumping data for table `color`
--

LOCK TABLES `Color` WRITE;

INSERT INTO Color (Color) VALUES ('Black');
INSERT INTO Color (Color) VALUES ('White');
INSERT INTO Color (Color) VALUES ('Grey'); 
INSERT INTO Color (Color) VALUES ('Red'); 
INSERT INTO Color (Color) VALUES ('Green'); 
INSERT INTO Color (Color) VALUES ('Blue'); 
INSERT INTO Color (Color) VALUES ('Yellow'); 
INSERT INTO Color (Color) VALUES ('Brown'); 
INSERT INTO Color (Color) VALUES ('Pink'); 
INSERT INTO Color (Color) VALUES ('Orange');
INSERT INTO Color (Color) VALUES ('Purple'); 
INSERT INTO Color (Color) VALUES ('Burgundy'); 
INSERT INTO Color (Color) VALUES ('Tan'); 
INSERT INTO Color (Color) VALUES ('Gold');
INSERT INTO Color (Color) VALUES ('Camo'); 
INSERT INTO Color (Color) VALUES ('Tie-Dye');

UNLOCK TABLES;