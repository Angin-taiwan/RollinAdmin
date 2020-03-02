--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE `rollin`.`orderdetail` ( 
   `OrderID`   INT NOT NULL , 
   `ProductID` INT NOT NULL , 
   `SizeID`    INT NOT NULL , 
   `ColorID`   INT NOT NULL , 
   `DiscountGroupID` INT NOT NULL , 
   `UnitPrice` INT NOT NULL , 
   `Quantity`  INT NOT NULL , 
   PRIMARY KEY (`OrderID`, `ProductID`, `SizeID`, `ColorID`));


--
-- Dumping data for table `brand`

-- FK連結
ALTER TABLE `orderdetail` ADD FOREIGN KEY (`OrderID`) REFERENCES `order`(`OrderID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `orderdetail` ADD FOREIGN KEY (`ProductID`) REFERENCES `product`(`ProductID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- LOCK TABLES `Brand` WRITE;




-- UNLOCK TABLES;