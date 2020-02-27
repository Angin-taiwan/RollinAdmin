-- made by AGC

--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Product`
--

DROP TABLE IF EXISTS `Product`;

CREATE TABLE `Rollin`.`Product` ( 
    `ProductID` INT(10) NOT NULL AUTO_INCREMENT , 
    `ProductName` VARCHAR(20) NOT NULL , 
    `BrandID` INT(10) NOT NULL , 
    `CategoryID` INT(10) NOT NULL , 
    `Description` TEXT NOT NULL , 
    `Discontinued` VARCHAR(1) BINARY NOT NULLDEFAULT '0' COMMENT '預設0為販售中,1:停售' , 
    `UnitPrice` INT(20) NOT NULL , 
    `Date` VARCHAR(20) NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`ProductID`)
    --   ,CONSTRAINT `FK_Product_Brand` FOREIGN KEY (`BrandID`) REFERENCES `Rollin`.`Brand` (`BrandID`),
    --   CONSTRAINT `FK_Product_Category` FOREIGN KEY (`CategoryID`) REFERENCES `Rollin`.`Category` (`CategoryID`)
      ) ENGINE = InnoDB;

INSERT INTO `product` (`ProductID`, `ProductName`, `BrandID`, `CategoryID`, `Description`, `Discontinued`, `UnitPrice`, `Date`) 
    VALUES (NULL, 'Fashion Board', '1', '1', 'Skate really fast!!', '0', '3000', 'current_timestamp()'),
           (NULL, 'Biggy Bag', '2', '21', 'Reeeeeally Big man!', '0', '2580', 'current_timestamp()')
--
-- Dumping data for table `product`
--