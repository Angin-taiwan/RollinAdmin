--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `News`
--

DROP TABLE IF EXISTS `Course`;

CREATE TABLE `Course`(
   CourseID  	  INT     	    NOT NULL   AUTO_INCREMENT,
   Title    VARCHAR(20) ,
   Description varchar(100),
   StartDate date,
   EndDate date,
   CreateDate date,
   UpdateDate date,
   Price int,
   PRIMARY KEY ( CourseID )
);