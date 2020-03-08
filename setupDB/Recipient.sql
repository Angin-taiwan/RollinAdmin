--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Recipient`
--

DROP TABLE IF EXISTS `Recipient`;

CREATE TABLE `rollin`.`Recipient` (
   `OrderID`               INT            NOT NULL ,
   `RecipientName`         VARCHAR(20)    NOT NULL ,
   `RecipientPhone`        VARCHAR(20)    NOT NULL ,
   `RecipientCountry`      VARCHAR(20)    NOT NULL ,
   `RecipientCity`         VARCHAR(20)    NOT NULL ,
   `RecipientDistrict`     VARCHAR(20)    NOT NULL ,
   `RecipientAddress`      VARCHAR(50)    NOT NULL ,
   `RecipientPostalCode`   VARCHAR(10)    NOT NULL ,
   PRIMARY KEY (`OrderID`)
);

--
-- Dumping data for table `Recipient`
--

LOCK TABLES `Recipient` WRITE;

INSERT INTO `Recipient` 
(`OrderID`, `RecipientName`, `RecipientPhone`, `RecipientCountry`, `RecipientCity`, `RecipientDistrict`, `RecipientAddress`, `RecipientPostalCode`) VALUES 
('1', 'james', '0958222222', 'Taiwan', 'Taipei', '文山區', '興隆路二段', '11603'),
('2', 'Gato', '0933221003', 'Taiwan', 'Taichung', '南屯區', '文心南路192號', '19933'),
('3', '陳瑞克', '093322331', '台灣', '台北市', '大安區', '信義路二段', '11608'), 
('4', '玄野', '0932229111', '台灣', '台北市', '中正區', '赤峰街', '19191'), 
('5', '麗香', '0932199339', '台灣', '台北市', '信義區', '基隆路', '11122'), 
('6', '西丈', '0922339220', '台灣', '台北市', '大安區', '新生南路', '11203'), 
('7', '岸本惠', '0938832222', '台灣', '台中市', '西區', '市政北七路', ''), 
('8', '和泉紫音', '0918122199', '台灣', '台北市', '萬華區', '廈門街', '22222'), 
('9', '多惠', '0983829110', '台灣', '台北市', '大安區', '信義路', '12311'), 
('10', 'Vivian', '0977383821', '台灣', '台北市', '文山區', '景華街', '11644');

UNLOCK TABLES;