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

INSERT INTO `productstock` (`ProductID`, `SizeID`, `ColorID`, `UnitInStock`, `UnitsOnOrder`) VALUES
(1, 0, 1, 50, 0),
(1, 0, 2, 11, 0),
(1, 0, 3, 5, 0),
(2, 0, 1, 20, 0),
(3, 0, 0, 0, 0),
(4, 0, 0, 0, 0),
(5, 0, 0, 0, 0);


INSERT INTO `productstock` (`ProductID`, `SizeID`, `ColorID`, `UnitInStock`, `UnitsOnOrder`) VALUES
(6, 26, 1, 13, 0),
(6, 26, 2, 13, 0),
(6, 26, 3, 13, 0),
(6, 27, 1, 20, 0),
(6, 27, 2, 20, 0),
(6, 27, 3, 20, 0),
(6, 28, 1, 20, 0),
(6, 28, 2, 20, 0),
(6, 28, 3, 20, 0),
(6, 29, 1, 10, 0),
(6, 29, 2, 10, 0),
(6, 29, 3, 10, 0),
(6, 30, 1, 6, 0),
(6, 30, 2, 6, 0),
(6, 30, 3, 6, 0);
--
-- Dumping data for table `ProductStock`
--
