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
   NewsID  	      INT     	         NOT NULL   AUTO_INCREMENT,
   Title          VARCHAR(20)       NOT NULL,
   Description    VARCHAR(1000),
   CreateDate     DATETIME,
   UpdateDate     DATETIME,
   PRIMARY KEY ( NewsID )
);

--
-- Dumping data for table `News`
--

LOCK TABLES `News` WRITE;

INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('Title21', 'Description21', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('Title22', 'Description22', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('Title23', 'Description23', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('Title24', 'Description24', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('Title25', 'Description25', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('Title26', 'Description26', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('Title27', 'Description27', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('Title28', 'Description28', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('Title29', 'Description29', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('Title30', 'Description30', '2020-03-10', '2020-03-25');

UNLOCK TABLES;