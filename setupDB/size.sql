-- made by AGC 2020-03-02

--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Size`
--

DROP TABLE IF EXISTS `Size`;

CREATE TABLE `rollin`.`Size` ( 
  `SizeID`          INT            NOT NULL      AUTO_INCREMENT,
  `CategoryID`      INT            NOT NULL, 
  `SizeName`        VARCHAR(20)    NOT NULL, 
  PRIMARY KEY (`SizeID`)
  )
;

--
-- Dumping data for table `Size`
--

LOCK TABLES `Size` WRITE;

-- 板身CategoryID = '5' ; 6.5 ~ 10.25 O=One Size
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '6.5');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '6.75');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '7');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '7.25');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '7.375');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '7.5');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '7.625');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '7.75');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '7.875');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '8');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '8.125');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '8.25');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '8.375');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '8.5');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '8.625');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '8.75');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '8.875');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '9');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '9.25');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '9.5');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '10');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('5', '10.25');
    
 -- 鞋子 CategoryID = '2' ; US 7- ~ US 13+
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 7-');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 7'); 
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 7.5'); 
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 8'); 
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 8.5'); 
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 9');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 9.5'); 
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 10');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 10.5'); 
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 11');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 11.5'); 
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 12'); 
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 12.5'); 
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 13');
    INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('2', 'US 13+');
         
-- 衣服CategoryID = '3', T-Shirts = '14'
    -- 上身 xxS ~ xxL 
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('14', 'XXS');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('14', 'XS');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('14', 'S');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('14', 'M');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('14', 'L');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('14', 'XL');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('14', 'XXL');
    -- 褲子 W24 ~ W38 , Pants = "18"
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W24'); 
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W25');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W26');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W27'); 
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W28'); 
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W29'); 
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W30'); 
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W31'); 
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W32');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W33');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W34'); 
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W35');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W36'); 
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W37');
        INSERT INTO `Size` (`CategoryID`, `SizeName`) VALUES ('18', 'W38');

UNLOCK TABLES;