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
-- new
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(2,'1YearAnniversary','1YA',2000,0.1,5000,'2020-01-01 01:00:00','2020-02-01 01:00:00','2021-04-01 00:00:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(3,'Dragon boat festival','625zongzi',625,625,650,'2020-06-25 01:00:00','2020-06-26 00:00:00','2020-06-30 00:00:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(1,'summer','',100,0.85,850,'2020-07-01 00:00:00','2020-08-01 00:00:00','2020-09-01 00:00:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(3,'moonfestival','1001moon',2147483647,0.77,1001,'2020-10-01 00:00:00',	'2020-10-02 00:00:00',	'2020-10-03 00:00:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(3,'double10','1010',	1010,101,	1010,	'2020-10-10 00:00:00',	'2020-10-14 00:00:00',	'2020-10-31 00:00:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(3,'SkateboardingDay','621IASC',2147483647,0.62,1000,'2020-06-21 00:00:00','2020-06-30 00:00:00','2020-06-30 00:00:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(1,'xmas','',1225,1225,2000,'2020-12-24 00:00:00','2020-12-26 00:00:00','2021-01-01 00:00:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(3,'111','1111',2147483647,111,1111,'2020-11-11 00:00:00','2020-11-13 00:00:00','2020-11-13 00:00:00');
insert into `Coupon` (CouponTypeID, CouponName, CouponCode, Quantity, Price, PriceCondition, StartDate, EndDate, ExpEndDate) values(2	,'oupon2','',200,200,1000,'2020-01-01 00:00:00','2020-05-01 00:00:00','2021-01-01 00:00:00');

