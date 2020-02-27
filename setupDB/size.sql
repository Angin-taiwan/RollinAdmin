-- made by AGC

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

--
-- Dumping data for table `size`
--