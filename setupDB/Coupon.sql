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
