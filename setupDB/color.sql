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

INSERT INTO `color` (`ColorID`, `Color`) VALUES (NULL, 'Black'), (NULL, 'White'), (NULL, 'Grey'), 
    (NULL, 'Red'), (NULL, 'Green'), (NULL, 'Blue'), (NULL, 'Yellow'), (NULL, 'Brown'), (NULL, 'Pink'), 
    (NULL, 'Orange'), (NULL, 'Purple'), (NULL, 'Burgundy'), (NULL, 'Tan'), (NULL, 'Gold'), (NULL, 'Camo'), 
    (NULL, 'Tie-Dye');

--
-- Dumping data for table `color`
--
