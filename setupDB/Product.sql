CREATE TABLE `rollin`.`product` ( 
    `ProductID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , 
    `ProductName` VARCHAR(20) NOT NULL , 
    `BrandID` INT(10) NOT NULL , 
    `CategoryID` INT(10) NOT NULL , 
    `Description` TEXT NOT NULL , 
    `Discontinued` VARCHAR(1) BINARY NOT NULL DEFAULT '0' , 
    `UnitPrice` INT(20) NOT NULL , 
    `Date` VARCHAR(20) NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`ProductID`)
    ) ENGINE = InnoDB;