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

INSERT INTO `Recipient` (`OrderID`, `RecipientName`, `RecipientPhone`, `RecipientCountry`, `RecipientCity`, `RecipientDistrict`, `RecipientAddress`, `RecipientPostalCode`) VALUES ('1', 'james', '0958222222', 'Taiwan', 'Taipei', '文山區', '興隆路二段', '11603');
INSERT INTO `Recipient` (`OrderID`, `RecipientName`, `RecipientPhone`, `RecipientCountry`, `RecipientCity`, `RecipientDistrict`, `RecipientAddress`, `RecipientPostalCode`) VALUES ('2', 'Gato', '0933221003', 'Taiwan', 'Taichung', '南屯區', '文心南路192號', '19933');

UNLOCK TABLES;