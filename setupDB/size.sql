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
  `SizeName`        VARCHAR(20)    NOT NULL, 
  PRIMARY KEY (`SizeID`)
  );

--
-- Dumping data for table `Size`
--

LOCK TABLES `Size` WRITE;

-- 板身CategoryID = '5' ; 6.5 ~ 10.25 O=One Size
    INSERT INTO `Size` (`SizeName`) VALUES ('6.5');
    INSERT INTO `Size` (`SizeName`) VALUES ('6.75');
    INSERT INTO `Size` (`SizeName`) VALUES ('7');
    INSERT INTO `Size` (`SizeName`) VALUES ('7.25');
    INSERT INTO `Size` (`SizeName`) VALUES ('7.375');
    INSERT INTO `Size` (`SizeName`) VALUES ('7.5');
    INSERT INTO `Size` (`SizeName`) VALUES ('7.625');
    INSERT INTO `Size` (`SizeName`) VALUES ('7.75');
    INSERT INTO `Size` (`SizeName`) VALUES ('7.875');
    INSERT INTO `Size` (`SizeName`) VALUES ('8');
    INSERT INTO `Size` (`SizeName`) VALUES ('8.125');
    INSERT INTO `Size` (`SizeName`) VALUES ('8.25');
    INSERT INTO `Size` (`SizeName`) VALUES ('8.375');
    INSERT INTO `Size` (`SizeName`) VALUES ('8.5');
    INSERT INTO `Size` (`SizeName`) VALUES ('8.625');
    INSERT INTO `Size` (`SizeName`) VALUES ('8.75');
    INSERT INTO `Size` (`SizeName`) VALUES ('8.875');
    INSERT INTO `Size` (`SizeName`) VALUES ('9');
    INSERT INTO `Size` (`SizeName`) VALUES ('9.25');
    INSERT INTO `Size` (`SizeName`) VALUES ('9.5');
    INSERT INTO `Size` (`SizeName`) VALUES ('10');
    INSERT INTO `Size` (`SizeName`) VALUES ('10.25');
    
 -- 鞋子 CategoryID = '2' ; US 7- ~ US 13+
    INSERT INTO `Size` (`SizeName`) VALUES ('US 7-');
    INSERT INTO `Size` (`SizeName`) VALUES ('US 7'); 
    INSERT INTO `Size` (`SizeName`) VALUES ('US 7.5'); 
    INSERT INTO `Size` (`SizeName`) VALUES ('US 8'); 
    INSERT INTO `Size` (`SizeName`) VALUES ('US 8.5'); 
    INSERT INTO `Size` (`SizeName`) VALUES ('US 9');
    INSERT INTO `Size` (`SizeName`) VALUES ('US 9.5'); 
    INSERT INTO `Size` (`SizeName`) VALUES ('US 10');
    INSERT INTO `Size` (`SizeName`) VALUES ('US 10.5'); 
    INSERT INTO `Size` (`SizeName`) VALUES ('US 11');
    INSERT INTO `Size` (`SizeName`) VALUES ('US 11.5'); 
    INSERT INTO `Size` (`SizeName`) VALUES ('US 12'); 
    INSERT INTO `Size` (`SizeName`) VALUES ('US 12.5'); 
    INSERT INTO `Size` (`SizeName`) VALUES ('US 13');
    INSERT INTO `Size` (`SizeName`) VALUES ('US 13+');
         
-- 衣服CategoryID = '3'
    -- 上身 xxS ~ xxL 
        INSERT INTO `Size` (`SizeName`) VALUES ('XXS');
        INSERT INTO `Size` (`SizeName`) VALUES ('XS');
        INSERT INTO `Size` (`SizeName`) VALUES ('S');
        INSERT INTO `Size` (`SizeName`) VALUES ('M');
        INSERT INTO `Size` (`SizeName`) VALUES ('L');
        INSERT INTO `Size` (`SizeName`) VALUES ('XL');
        INSERT INTO `Size` (`SizeName`) VALUES ('XXL');
    -- 褲子 W24 ~ W38
        INSERT INTO `Size` (`SizeName`) VALUES ('W24'); 
        INSERT INTO `Size` (`SizeName`) VALUES ('W25');
        INSERT INTO `Size` (`SizeName`) VALUES ('W26');
        INSERT INTO `Size` (`SizeName`) VALUES ('W27'); 
        INSERT INTO `Size` (`SizeName`) VALUES ('W28'); 
        INSERT INTO `Size` (`SizeName`) VALUES ('W29'); 
        INSERT INTO `Size` (`SizeName`) VALUES ('W30'); 
        INSERT INTO `Size` (`SizeName`) VALUES ('W31'); 
        INSERT INTO `Size` (`SizeName`) VALUES ('W32');
        INSERT INTO `Size` (`SizeName`) VALUES ('W33');
        INSERT INTO `Size` (`SizeName`) VALUES ('W34'); 
        INSERT INTO `Size` (`SizeName`) VALUES ('W35');
        INSERT INTO `Size` (`SizeName`) VALUES ('W36'); 
        INSERT INTO `Size` (`SizeName`) VALUES ('W37');
        INSERT INTO `Size` (`SizeName`) VALUES ('W38');

UNLOCK TABLES;