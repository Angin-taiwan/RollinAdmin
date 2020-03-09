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

 -- 鞋子 CategoryID = '11','12','13' ; US 7- ~ US 13+
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '23');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '24');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '25');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '26');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '27');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '28');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '29');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '30');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '31');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '32');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '33');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '34');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '35');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '36');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('11', '37');

    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '23');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '24');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '25');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '26');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '27');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '28');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '29');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '30');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '31');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '32');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '33');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '34');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '35');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '36');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('12', '37');

    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '23');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '24');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '25');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '26');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '27');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '28');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '29');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '30');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '31');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '32');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '33');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '34');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '35');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '36');
    INSERT INTO `CategorySize` (`CategoryID`, `SizeID`) VALUES ('13', '37');

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