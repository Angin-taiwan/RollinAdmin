--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `CategorySize`
--

DROP TABLE IF EXISTS `CategorySize`;

CREATE TABLE `rollin`.`CategorySize` ( 
  `CategoryID`      INT            NOT NULL,
  `SizeID`          INT            NOT NULL,
  PRIMARY KEY (`CategoryID`, `SizeID` )
  );

--
-- Dumping data for table `CategorySize`
--

LOCK TABLES `CategorySize` WRITE;

-- 板身CategoryID = '5' ; 6.5 ~ 10.25 O=One Size
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '1');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '2');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '3');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '4');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '5');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '6');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '7');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '8');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '9');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '10');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '11');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '12');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '13');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '14');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '15');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '16');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '17');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '18');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '19');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '20');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '21');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('5', '22');
    
 -- 鞋子 CategoryID = '2' ; US 7- ~ US 13+
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '23');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '24'); 
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '25'); 
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '26'); 
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '27'); 
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '28');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '29'); 
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '30');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '31'); 
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '32');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '33'); 
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '34'); 
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '35'); 
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '36');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('2', '37');
         
-- 衣服CategoryID = '3', T-Shirts = '14', Hoodies = "15", Jackets= "16", Long Sleeves = "17"
    -- 上身 xxS ~ xxL 
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('14', '38');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('14', '39');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('14', '40');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('14', '41');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('14', '42');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('14', '43');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('14', '44');

        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('15', '38');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('15', '39');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('15', '40');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('15', '41');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('15', '42');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('15', '43');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('15', '44');

        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('16', '38');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('16', '39');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('16', '40');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('16', '41');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('16', '42');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('16', '43');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('16', '44');

        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('17', '38');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('17', '39');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('17', '40');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('17', '41');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('17', '42');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('17', '43');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('17', '44');
    -- 褲子 W24 ~ W38 , Pants = "18"
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '45'); 
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '46');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '47');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '48'); 
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '49'); 
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '50'); 
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '51'); 
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '52'); 
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '53');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '54');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '55'); 
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '56');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '57'); 
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '58');
        INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('18', '59');

UNLOCK TABLES;