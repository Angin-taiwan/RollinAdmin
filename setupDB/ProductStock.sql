CREATE TABLE `rollin`.`productStock` ( 
    `ProductID` INT(10) NOT NULL AUTO_INCREMENT , 
    `SizeID` INT(10) NULL DEFAULT NULL , 
    `ColorID` INT(10) NULL DEFAULT NULL , 
    `UnitInStock` INT(10) UNSIGNED NOT NULL DEFAULT '0' , 
    `UnitsOnOrder` INT(10) UNSIGNED NOT NULL DEFAULT '0' , 
    PRIMARY KEY (`ProductID`, `SizeID`, `ColorID`)
    ) ENGINE = InnoDB;