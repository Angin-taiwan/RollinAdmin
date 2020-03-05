--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `OrderDetail`
--

DROP TABLE IF EXISTS `OrderDetail`;

CREATE TABLE `rollin`.`OrderDetail` (
   `OrderID`            INT      NOT NULL ,
   `ProductID`          INT      NOT NULL ,
   `SizeID`             INT      NOT NULL ,
   `ColorID`            INT      NOT NULL ,
   `DiscountGroupID`    INT      NOT NULL ,
   `UnitPrice`          INT      NOT NULL ,
   `Quantity`           INT      NOT NULL ,
   PRIMARY KEY (`OrderID`, `ProductID`, `SizeID`, `ColorID`)
);

--
-- Dumping data for table `OrderDetail`
--
INSERT INTO `orderdetail` (`OrderID`, `ProductID`, `SizeID`, `ColorID`, `DiscountGroupID`, `UnitPrice`, `Quantity`) VALUES
(1, 2, 0, 0, 0, 2580, 1),
(2, 2, 0, 0, 0, 2580, 2),
(3, 2, 0, 0, 0, 2580, 1),
(4, 2, 0, 0, 0, 2580, 1);