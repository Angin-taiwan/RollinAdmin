--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Course`
--

DROP TABLE IF EXISTS `Course`;

CREATE TABLE `Course`(
   CourseID  	      INT     	         NOT NULL   AUTO_INCREMENT,
   Title             VARCHAR(20) ,
   Description       varchar(1000),
   StartDate         DATETIME,
   EndDate           DATETIME,
   CreateDate        DATETIME,
   UpdateDate        DATETIME,
   Price             INT               NOT NULL  DEFAULT 0,
   PRIMARY KEY ( CourseID )
);

--
-- Dumping data for table `Course`
--