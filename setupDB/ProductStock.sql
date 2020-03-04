-- made by AGC

--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `ProductStock`
--

DROP TABLE IF EXISTS `ProductStock`;

CREATE TABLE `rollin`.`ProductStock` ( 
  `ProductID`       INT(10)    NOT NULL, 
  `SizeID`          INT(10)    NOT NULL     DEFAULT 0, 
  `ColorID`         INT(10)    NOT NULL     DEFAULT 0, 
  `UnitInStock`     INT(10)    NOT NULL     DEFAULT 0, 
  `UnitsOnOrder`    INT(10)    NOT NULL     DEFAULT 0, 
  PRIMARY KEY (`ProductID`, `SizeID`, `ColorID`)
);
    
--
-- Dumping data for table `ProductStock`
--
