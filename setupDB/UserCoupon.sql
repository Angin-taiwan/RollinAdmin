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
  PRIMARY KEY (`UserID`, `CouponID`));

--
-- Dumping data for table `UserCoupon`
--

insert into `userCoupon` (UserID, CouponID, OrderID) values(1,1,null);
insert into `userCoupon` (UserID, CouponID, OrderID) values(1,2,null);
insert into `userCoupon` (UserID, CouponID, OrderID) values(2,2,null);
insert into `userCoupon` (UserID, CouponID, OrderID) values(3,2,null);
-- new
update `userCoupon` set OrderID='1' where UserID=1 and CouponID=1;
insert into `userCoupon` (UserID, CouponID, OrderID) values(4,1,null);
insert into `userCoupon` (UserID, CouponID, OrderID) values(4,2,null);
insert into `userCoupon` (UserID, CouponID, OrderID) values(2,1,null);
insert into `userCoupon` (UserID, CouponID, OrderID) values(2,3,null);