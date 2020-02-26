--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `UserCoupon`
--

DROP TABLE IF EXISTS `UserCoupon`;

CREATE TABLE `Rollin`.`UserCoupon` (
  `UserID` INT NOT NULL,
  `CouponID` INT NOT NULL,
  `OrderID` INT NULL,
  PRIMARY KEY (`UserID`, `CouponID`),
  CONSTRAINT `FK_UserCoupon_User` FOREIGN KEY (`UserID`) REFERENCES `Rollin`.`User` (`UserID`), 
  CONSTRAINT `FK_UserCoupon_Coupon` FOREIGN KEY (`CouponID`) REFERENCES `Rollin`.`Coupon` (`CouponID`),
  CONSTRAINT `FK_UserCoupon_Order` FOREIGN KEY (`OrderID`) REFERENCES `Rollin`.`Order` (`OrderID`));

--
-- Dumping data for table `UserCoupon`
--