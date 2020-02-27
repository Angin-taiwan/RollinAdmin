--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Review`
--

DROP TABLE IF EXISTS `Review`;
CREATE TABLE `Review`(
   ProductID INT NOT NULL PRIMARY KEY,
   UserID INT NOT NULL, 
   Star INT NOT NULL,  
   CommentTitle VARCHAR(20) NOT NULL, 
   CommentContent  VARCHAR(200),
   CommentDate DATE NOT NULL,
   
);


--
-- Dumping data for table `Review`
--

LOCK TABLES `Review` WRITE;

INSERT INTO `Review` (ProductID, UserID, Star,CommentTitle,CommentContent, CommentDate) 
VALUES ("2", "6","3","aaaaa","zxdxcvbsdfagwewea","2020-02-26");
INSERT INTO `Review` (ProductID, UserID, Star,CommentTitle,CommentContent, CommentDate) 
VALUES ("1", "3","3","bbbb","zxdxcvbsdfagwewea","2020-02-26");
INSERT INTO `Review` (ProductID, UserID, Star,CommentTitle,CommentContent, CommentDate) 
VALUES ("3", "2","3","ccccc","zxdxcvbsdfagwewea","2020-02-26");
INSERT INTO `Review` (ProductID, UserID, Star,CommentTitle,CommentContent, CommentDate) 
VALUES ("4", "5","3","ddddd","zxdxcvbsdfagwewea","2020-02-26");



UNLOCK TABLES;