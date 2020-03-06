--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Favorite`
--

DROP TABLE IF EXISTS `Favorite`;

CREATE TABLE `Favorite`(
   UserID      INT   NOT NULL,
   ProductID   INT   NOT NULL,
   SizeID      INT   NOT NULL ,
   ColorID     INT   NOT NULL,
   PRIMARY KEY ( UserID, ProductID, SizeID, ColorID )
);

--
-- Dumping data for table `Favorite`
--