--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;

CREATE TABLE `Student`(
   StudentID  	INT     NOT NULL  AUTO_INCREMENT,
   CourseID    INT,
   UserID      int,
   PRIMARY KEY ( StudentID )
);

--
-- Dumping data for table `Student`
--