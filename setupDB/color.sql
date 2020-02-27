-- made by AGC

--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;

CREATE TABLE `rollin`.`color` ( 
    `ColorID` INT(10) NOT NULL AUTO_INCREMENT , 
    `Color` VARCHAR(20) NOT NULL , 
    PRIMARY KEY (`ColorID`)
    ) ENGINE = InnoDB;

--
-- Dumping data for table `color`
--
