--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Cart`
--

DROP TABLE IF EXISTS `Cart`;

CREATE TABLE `Cart`(
   UserID       INT 	NOT NULL,
   ProductID    INT 	NOT NULL,
   SizeID       INT 	NOT NULL,
   ColorID      INT 	NOT NULL,
   CartQuantity INT 	NOT NULL,
   PRIMARY KEY ( UserID, ProductID, SizeID, ColorID, CartQuantity )
);