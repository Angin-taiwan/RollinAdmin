--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `CouponType`
--

DROP TABLE IF EXISTS `CouponType`;

CREATE TABLE `Rollin`.`CouponType` (
  `CouponTypeID`    INT           NOT NULL    AUTO_INCREMENT,
  `CouponTypeName`  VARCHAR(45)   NOT NULL                      COMMENT 'coupon領取方式: 領取,註冊,生日, 周年慶..../輸入折扣碼',
  PRIMARY KEY (`CouponTypeID`));

--
-- Dumping data for table `CouponType`
--

insert into `CouponType`(CouponTypeName) values('限量領取');
insert into `CouponType`(CouponTypeName)  values('系統發送');
insert into `CouponType`(CouponTypeName)  values('輸入折扣碼(全店)');