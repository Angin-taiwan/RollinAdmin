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
   CourseID    INT     NOT NULL,
   UserID      INT     NOT NULL,
   PRIMARY KEY ( CourseID , UserID)
);

--
-- Dumping data for table `Student`
--

INSERT INTO Student (CourseID, UserID) VALUES (1, 1);
INSERT INTO Student (CourseID, UserID) VALUES (1, 2);
INSERT INTO Student (CourseID, UserID) VALUES (1, 3);
INSERT INTO Student (CourseID, UserID) VALUES (1, 4);
INSERT INTO Student (CourseID, UserID) VALUES (1, 5);
INSERT INTO Student (CourseID, UserID) VALUES (1, 6);
INSERT INTO Student (CourseID, UserID) VALUES (1, 7);
INSERT INTO Student (CourseID, UserID) VALUES (1, 8);
INSERT INTO Student (CourseID, UserID) VALUES (1, 9);
INSERT INTO Student (CourseID, UserID) VALUES (1, 10);
INSERT INTO Student (CourseID, UserID) VALUES (1, 11);
INSERT INTO Student (CourseID, UserID) VALUES (1, 12);
INSERT INTO Student (CourseID, UserID) VALUES (1, 13);
INSERT INTO Student (CourseID, UserID) VALUES (1, 14);
INSERT INTO Student (CourseID, UserID) VALUES (1, 15);
INSERT INTO Student (CourseID, UserID) VALUES (1, 16);
INSERT INTO Student (CourseID, UserID) VALUES (1, 17);
INSERT INTO Student (CourseID, UserID) VALUES (1, 18);
INSERT INTO Student (CourseID, UserID) VALUES (1, 19);
INSERT INTO Student (CourseID, UserID) VALUES (1, 20);
INSERT INTO Student (CourseID, UserID) VALUES (2, 18);
INSERT INTO Student (CourseID, UserID) VALUES (2, 19);
INSERT INTO Student (CourseID, UserID) VALUES (2, 20);
INSERT INTO Student (CourseID, UserID) VALUES (2, 21);
INSERT INTO Student (CourseID, UserID) VALUES (3, 3);
INSERT INTO Student (CourseID, UserID) VALUES (3, 4);
INSERT INTO Student (CourseID, UserID) VALUES (3, 5);
INSERT INTO Student (CourseID, UserID) VALUES (3, 6);
INSERT INTO Student (CourseID, UserID) VALUES (4, 3);
INSERT INTO Student (CourseID, UserID) VALUES (4, 4);
INSERT INTO Student (CourseID, UserID) VALUES (4, 5);
INSERT INTO Student (CourseID, UserID) VALUES (4, 6);
INSERT INTO Student (CourseID, UserID) VALUES (5, 3);
INSERT INTO Student (CourseID, UserID) VALUES (5, 4);
INSERT INTO Student (CourseID, UserID) VALUES (5, 5);
INSERT INTO Student (CourseID, UserID) VALUES (6, 2);
INSERT INTO Student (CourseID, UserID) VALUES (6, 3);
INSERT INTO Student (CourseID, UserID) VALUES (6, 4);
INSERT INTO Student (CourseID, UserID) VALUES (6, 5);
INSERT INTO Student (CourseID, UserID) VALUES (6, 6);