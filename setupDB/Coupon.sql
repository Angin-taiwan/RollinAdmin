--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Coupon`
--

DROP TABLE IF EXISTS `Coupon`;

CREATE TABLE `Rollin`.`Coupon` (
  `CouponID`        INT           NOT NULL    AUTO_INCREMENT,
  `CouponTypeID`    INT           NOT NULL,
  `CouponName`      VARCHAR(45)               DEFAULT NULL,
  `CouponCode`      VARCHAR(15)               DEFAULT NULL,
  `Quantity`        INT           NOT NULL                      COMMENT '全店可用數量',
  `Price`           FLOAT         NOT NULL                      COMMENT 'x>1 -price 折價, 0<x<1 *discount 打折',
  `PriceCondition`  INT                                         COMMENT '滿額可用',
  `StartDate`       DATETIME      NOT NULL                      COMMENT '領取/開始使用時間',
  `EndDate`         DATETIME      NOT NULL                      COMMENT '領取結束時間',
  `ExpEndDate`      DATETIME      NOT NULL                      COMMENT '使用結束時間',
  PRIMARY KEY (`CouponID`)
  );


--
-- Dumping data for table `Coupon`
--

insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(1,'228','rollin228',100, 100, 500, '2020-02-27 03:00:00', '2020-02-28 00:00:00','2020-06-01 00:00:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(2,'birth','happyhbd',2147483647, 100, 1000, '2020-01-01 01:00:00', '2022-01-01 00:00:00','9999-01-01 01:01:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(3,'308','rollin38',2147483647, 0.38, 1000, '2020-03-08 00:00:00', '2020-03-11 00:00:00','2020-03-11 00:00:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(1,'mother','mother555',555, 0.55, 500, '2020-05-01 00:00:00', '2020-05-15 00:00:00','2020-06-30 00:00:00');

