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


INSERT INTO `news` (`NewsID`, `Title`, `Description`, `CreateDate`, `UpdateDate`, `photo`) VALUES (NULL, 'Title21', 'Description21', '2020-03-10', '2020-03-25', NULL);
INSERT INTO `news` (`NewsID`, `Title`, `Description`, `CreateDate`, `UpdateDate`, `photo`) VALUES (NULL, 'Title22', 'Description22', '2020-03-10', '2020-03-25', NULL);
INSERT INTO `news` (`NewsID`, `Title`, `Description`, `CreateDate`, `UpdateDate`, `photo`) VALUES (NULL, 'Title23', 'Description23', '2020-03-10', '2020-03-25', NULL);
INSERT INTO `news` (`NewsID`, `Title`, `Description`, `CreateDate`, `UpdateDate`, `photo`) VALUES (NULL, 'Title24', 'Description24', '2020-03-10', '2020-03-25', NULL);
INSERT INTO `news` (`NewsID`, `Title`, `Description`, `CreateDate`, `UpdateDate`, `photo`) VALUES (NULL, 'Title25', 'Description25', '2020-03-10', '2020-03-25', NULL);
INSERT INTO `news` (`NewsID`, `Title`, `Description`, `CreateDate`, `UpdateDate`, `photo`) VALUES (NULL, 'Title26', 'Description26', '2020-03-10', '2020-03-25', NULL);
INSERT INTO `news` (`NewsID`, `Title`, `Description`, `CreateDate`, `UpdateDate`, `photo`) VALUES (NULL, 'Title27', 'Description27', '2020-03-10', '2020-03-25', NULL);
INSERT INTO `news` (`NewsID`, `Title`, `Description`, `CreateDate`, `UpdateDate`, `photo`) VALUES (NULL, 'Title28', 'Description28', '2020-03-10', '2020-03-25', NULL);
INSERT INTO `news` (`NewsID`, `Title`, `Description`, `CreateDate`, `UpdateDate`, `photo`) VALUES (NULL, 'Title29', 'Description29', '2020-03-10', '2020-03-25', NULL);
INSERT INTO `news` (`NewsID`, `Title`, `Description`, `CreateDate`, `UpdateDate`, `photo`) VALUES (NULL, 'Title30', 'Description30', '2020-03-10', '2020-03-25', NULL);