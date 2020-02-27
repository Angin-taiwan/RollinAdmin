--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Brand`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User`(
   UserID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   UserName VARCHAR(20) NOT NULL, --真實姓名
   NickName VARCHAR(20),  --選填
   Gender ENUM("M","F") NOT NULL,  --只能選男或女 
   Birthdate DATE NOT NULL,
   Phone VARCHAR(20),
   Email VARCHAR(50) NOT NULL UNIQUE,
   Password VARCHAR(30) NOT NULL,
   Country  VARCHAR(20), --選填
   City VARCHAR(20),
   District VARCHAR(20),
   Address VARCHAR(50),
   PostalCode VARCHAR(10), --(郵遞區號) 進階:填寫District跑出該區PostalCode，需再建立地區-郵遞區號資料庫?
   CreateDate DATE NOT NULL 

);


--
-- Dumping data for table `brand`
--

LOCK TABLES `User` WRITE;

INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("陳大明", "阿明","F","19881010","0988765666","aming1@gmail.com","1111aaaa","台灣","台北","中正區","思源街16號","10087","20200226");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("陳二明", "阿二","F","19881010","0988765668","aming2@gmail.com","1111aaaa","台灣","台北","中正區","思源街16號","10087","20200226");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("陳三明", "阿三","F","19881010","0988765667","aming3@gmail.com","1111aaaa","台灣","台北","中正區","思源街16號","10087","20200226");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("陳小明", "阿小","F","19881010","0988765669","aming4@gmail.com","1111aaaa","台灣","台北","中正區","思源街16號","10087","20200226");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("陳五明", "阿五","F","19881010","0988765660","aming5@gmail.com","1111aaaa","台灣","台北","中正區","思源街16號","10087","20200226");




UNLOCK TABLES;