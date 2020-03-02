-- made by AGC 2020-03-02

--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;

CREATE TABLE `rollin`.`size` ( 
    `SizeID` INT(10) NOT NULL AUTO_INCREMENT ,
    `CategoryID` INT(10) NOT NULL , 
    `SizeName` VARCHAR(20) NOT NULL , 
    PRIMARY KEY (`SizeID`)
    ) ENGINE = InnoDB;

-- 板身CategoryID = '5' ; 6.5 ~ 10.25 O=One Size
    INSERT INTO `size` (`SizeID`, `CategoryID`, `SizeName`) VALUES (NULL, '5', '6.5\"'), (NULL, '5', '6.75\"'), (NULL, '5', '7\"'), (NULL, '5', '7.25\"'), (NULL, '5', '7.375'), (NULL, '5', '7.5\"'), (NULL, '5', '7.625\"'), (NULL, '5', '7.75\"'), (NULL, '5', '7.875\"'), (NULL, '5', '8\"'), (NULL, '5', '8.125\"'), (NULL, '5', '8.25\"'), (NULL, '5', '8.375\"'), (NULL, '5', '8.5\"'), (NULL, '5', '8.625\"'), (NULL, '5', '8.75\"'), (NULL, '5', '8.875\"'), (NULL, '5', '9\"'), (NULL, '5', '9.25\"'), (NULL, '5', '9.5'), (NULL, '5', '10\"'), (NULL, '5', '10.25\"'), (NULL, '5', 'O') ;
    
 -- 鞋子 CategoryID = '2' ; US 7- ~ US 13+
    INSERT INTO `size` (`SizeID`, `CategoryID`, `SizeName`) VALUES (NULL, '2', 'US 7-'), (NULL, '2', 'US 7'), (NULL, '2', 'US 7.5'), (NULL, '2', 'US 8'), (NULL, '2', 'US 8.5'), (NULL, '2', 'US 9'), (NULL, '2', 'US 9.5'), (NULL, '2', 'US 10'), (NULL, '2', 'US 10.5'), (NULL, '2', 'US 11'), (NULL, '2', 'US 11.5'), (NULL, '2', 'US 12'), (NULL, '2', 'US 12.5'), (NULL, '2', 'US 13'), (NULL, '2', 'US 13+') ;
         
-- 衣服CategoryID = '3' 
    -- 上身 xxS ~ xxL 
        INSERT INTO `size` (`SizeID`, `CategoryID`, `SizeName`) VALUES (NULL, '3', 'XXS'), (NULL, '3', 'XS'), (NULL, '3', 'S'), (NULL, '3', 'M'), (NULL, '3', 'L'), (NULL, '3', 'XL'), (NULL, '3', 'XXL') ;
    -- 褲子 W24 ~ W38
        INSERT INTO `size` (`SizeID`, `CategoryID`, `SizeName`) VALUES (NULL, '3', 'W24'), (NULL, '3', 'W25'), (NULL, '3', 'W26'), (NULL, '3', 'W27'), (NULL, '3', 'W28'), (NULL, '3', 'W29'), (NULL, '3', 'W30'), (NULL, '3', 'W31'), (NULL, '3', 'W32'), (NULL, '3', 'W33'), (NULL, '3', 'W34'), (NULL, '3', 'W35'), (NULL, '3', 'W36'), (NULL, '3', 'W37'), (NULL, '3', 'W38') ;


        

--
-- Dumping data for table `size`
--