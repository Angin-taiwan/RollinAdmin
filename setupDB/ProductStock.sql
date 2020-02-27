-- made by AGC

--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `productStock`
--

DROP TABLE IF EXISTS `productStock`;

CREATE TABLE `rollin`.`productStock` ( 
    `ProductID` INT(10) NULL DEFAULT NULL , 
    `SizeID` INT(10) NULL DEFAULT NULL , 
    `ColorID` INT(10) NULL DEFAULT NULL , 
    `UnitInStock` INT(10) UNSIGNED NOT NULL DEFAULT '0' , 
    `UnitsOnOrder` INT(10) UNSIGNED NOT NULL DEFAULT '0' , 
    PRIMARY KEY (`ProductID`, `SizeID`, `ColorID`)
    -- ,CONSTRAINT `FK_productStock_Size` FOREIGN KEY (`SizeID`) REFERENCES `Rollin`.`Size` (`SizeID`),
    -- CONSTRAINT `FK_productStock_Color` FOREIGN KEY (`ColorID`) REFERENCES `Rollin`.`Color` (`ColorID`)
    ) ENGINE = InnoDB;

ALTER TABLE `productstock` ADD CONSTRAINT `FK_productStock_Product` FOREIGN KEY (`ProductID`) REFERENCES `product`(`ProductID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
    
--
-- Dumping data for table `productStock`
--
