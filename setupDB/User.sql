--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User`(
   UserID         INT                  NOT NULL       AUTO_INCREMENT,
   UserName       VARCHAR(20)          NOT NULL,
   NickName       VARCHAR(20),
   Gender         ENUM('U','M','F')    NOT NULL       DEFAULT 'U',
   Birthdate      DATE                 NOT NULL,
   Phone          VARCHAR(20)          NOT NULL,   
   Email          VARCHAR(50)          NOT NULL       UNIQUE,
   Password       VARCHAR(30)          NOT NULL,
   Country        VARCHAR(20),
   City           VARCHAR(20),
   District       VARCHAR(20),
   Address        VARCHAR(50),
   PostalCode     VARCHAR(10),
   CreateDate     DATETIME             NOT NULL       DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY ( UserID )
);


--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;

INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("陳大明", "阿明","F","19880110","0988765666","aming1@gmail.com","1111aaaa","台灣","台北市","中正區","思源街16號","10087","20200226");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("陳二明", "阿二","M","19890210","0988765668","aming2@gmail.com","1111aaaa","台灣","台北市","中正區","思源街16號","10087","20200227");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("陳三明", "阿三","F","19901210","0988765667","aming3@gmail.com","1111aaaa","台灣","台北市","中正區","思源街16號","10087","20200228");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("陳小明", "阿小","M","19911010","0988765669","aming4@gmail.com","1111aaaa","台灣","台北市","中正區","思源街16號","10087","20200228");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("陳五明", "阿五","F","19920710","0988765660","aming5@gmail.com","1111aaaa","台灣","台北市","中正區","思源街16號","10087","20200228");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("林大明", "阿明","M","19880110","0911765666","lin1@gmail.com","1111aaaa","台灣","台中市","西屯區","青海路二段278號","407","20200301");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("林二明", "阿二","F","19890210","0912765668","lin2@gmail.com","1111aaaa","台灣","台中市","西屯區","青海路二段278號","407","20200302");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("林三明", "阿三","M","19901210","0913765667","lin3@gmail.com","1111aaaa","台灣","台中市","西屯區","青海路二段278號","407","20200303");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("林小明", "阿小","F","19911010","0915765669","lin4@gmail.com","1111aaaa","台灣","台中市","西屯區","青海路二段278號","407","20200304");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("林五明", "阿五","M","19920812","0931742660","lin5@gmail.com","1111aaaa","台灣","台中市","西屯區","青海路二段278號","407","20200305");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("王東東", "阿東","M","19880120","0911765657","weast@gmail.com","1111aaaa","台灣","台南市","安南區","北安路三段180號","709","20200305");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("王西西", "阿西","F","19891222","0912762138","wsisi@gmail.com","1111aaaa","台灣","台南市","安南區","北安路三段180號","709","20200305");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("王南南", "阿南","F","19900310","0913707327","nanawa@gmail.com","1111aaaa","台灣","台南市","安南區","北安路三段180號","709","20200306");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("王北北", "阿北","M","19910503","0915211009","nono@gmail.com","1111aaaa","台灣","台南市","安南區","北安路三段180號","709","20200306");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("王中中", "阿中","F","19920729","0931722885","chch@gmail.com","1111aaaa","台灣","台南市","安南區","北安路三段180號","709","20200307");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("賴大明", "阿明","U","19880110","0988765666","laming1@gmail.com","1111aaaa","台灣","台北市","中正區","思源街16號","10087","20200226");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("賴二明", "阿二","F","19890210","0988765668","laming2@gmail.com","1111aaaa","台灣","台北市","中正區","思源街16號","10087","20200227");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("賴三明", "阿三","F","19901210","0988765667","laming3@gmail.com","1111aaaa","台灣","台北市","中正區","思源街16號","10087","20200228");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("賴小明", "阿小","M","19911010","0988765669","laming4@gmail.com","1111aaaa","台灣","台北市","中正區","思源街16號","10087","20200228");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("賴五明", "阿五","F","19920710","0988765660","laming5@gmail.com","1111aaaa","台灣","台北市","中正區","思源街16號","10087","20200228");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("蔡大明", "阿明","M","19880110","0911765666","chewwlin1@gmail.com","1111aaaa","台灣","台中市","西屯區","青海路二段278號","407","20200301");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("蔡二明", "阿二","F","19890210","0912765668","cheddlin2@gmail.com","1111aaaa","台灣","台中市","西屯區","青海路二段278號","407","20200302");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("蔡三明", "阿三","U","19901210","0913765667","chegglin3@gmail.com","1111aaaa","台灣","台中市","西屯區","青海路二段278號","407","20200303");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("蔡小明", "阿小","F","19911010","0915765669","cheaalin4@gmail.com","1111aaaa","台灣","台中市","西屯區","青海路二段278號","407","20200304");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("蔡五明", "阿五","M","19920812","0931742660","chennlin5@gmail.com","1111aaaa","台灣","台中市","西屯區","青海路二段278號","407","20200305");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("沈東東", "小東","F","19880120","0911765657","senweast@gmail.com","1111aaaa","台灣","台南市","安南區","北安路三段180號","709","20200305");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("沈西西", "小西","U","19891222","0912762138","senwsisi@gmail.com","1111aaaa","台灣","台南市","安南區","北安路三段180號","709","20200305");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("沈南南", "小南","F","19900310","0913707327","sennanawa@gmail.com","1111aaaa","台灣","台南市","安南區","北安路三段180號","709","20200306");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("沈北北", "小北","U","19910503","0915211009","sennono@gmail.com","1111aaaa","台灣","台南市","安南區","北安路三段180號","709","20200306");
INSERT INTO `User` (UserName, NickName, Gender,Birthdate,Phone, Email,Password,Country,City,District,Address,PostalCode,CreateDate) 
VALUES ("沈中中", "小中","F","19920729","0931722885","senchch@gmail.com","1111aaaa","台灣","台南市","安南區","北安路三段180號","709","20200307");


UNLOCK TABLES;