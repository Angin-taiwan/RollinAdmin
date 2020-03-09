-- made by AGC

--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Product`
--

DROP TABLE IF EXISTS `Product`;

CREATE TABLE `Rollin`.`Product` (
  `ProductID`       INT             NOT NULL    AUTO_INCREMENT,
  `ProductName`     VARCHAR(60)     NOT NULL ,
  `BrandID`         INT             NOT NULL ,
  `CategoryID`      INT             NOT NULL ,
  `PDescription`    VARCHAR(1000)   NOT NULL ,
  `Discontinued`    TINYINT         NOT NULL    DEFAULT '0'                COMMENT '預設0為販售中,1:停售' ,
  `UnitPrice`       INT             NOT NULL ,
  `Date`            DATETIME                    DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ProductID`)
) ;

--
-- Dumping data for table `Product`
--

LOCK TABLES `Product` WRITE;

INSERT INTO `product` (`ProductName`, `BrandID`, `CategoryID`, `PDescription`, `Discontinued`, `UnitPrice`, `Date`) VALUES ('Fashion Board', '1', '1', 'Skate really fast!!', '0', '3000', '2020-02-10 18:00:39');
INSERT INTO `product` (`ProductName`, `BrandID`, `CategoryID`, `PDescription`, `Discontinued`, `UnitPrice`, `Date`) VALUES ('Biggy Bag', '2', '21', 'Reeeeeally Big man!', '0', '2580', current_timestamp());
INSERT INTO `product` (`ProductName`, `BrandID`, `CategoryID`, `PDescription`, `Discontinued`, `UnitPrice`, `Date`) VALUES ('Wode Huaban Sieh', '3', '12', 'this is nice shoes man! It is Gooooooooood. You dont wanna miss it .\r\nDai Chyu Syueh Siao Tong Syueh Du Huei Jiao Ma Ma Mai Gei Wo. 這是超長資料的測試， 透過逆向歸納，得以用最佳的策略去分析滑板鞋。 世界上若沒有滑板鞋，對於人類的改變可想而知。 伯爾講過，個性和魅力，是學不會，裝不像的。 這段話可說是震撼了我。\r\n\r\n 總而言之，滑板鞋對我來說有著舉足輕重的地位，必須要嚴肅認真的看待。 我們可以很篤定的說，這需要花很多時間來嚴謹地論證。 這種事實對本人來說意義重大，相信對這個世界也是有一定意義的。 一般來講，我們都必須務必慎重的考慮考慮。 對我個人而言，滑板鞋不僅僅是一個重大的事件，還可能會改變我的人生。 滑板鞋，發生了會如何，不發生又會如何。 塞萬提斯曾說過，努力是成功之母。 這段話讓我的心境提高了一個層次。 司各特講過，休息過長就會發霉。 強烈建議大家把這段話牢牢記住。', '0', '94875', current_timestamp());
INSERT INTO `product` (`ProductName`, `BrandID`, `CategoryID`, `PDescription`, `Discontinued`, `UnitPrice`, `Date`) VALUES ('VANDAL Defame合作LOGO板身', '1', '5', ' 來自美國St. Louis的職業插畫家Defame，經常為世界各地的金屬樂團進行圖像創作，主題自然較多環繞著黑暗、邪惡、骷髏、恐怖的怪物等事物，作品多以看似粗獷隨性卻極具細膩度的黑白筆觸呈現。\r\n\r\n 這次的合作同樣也是我在網路上追蹤已久後主動聯繫，邀請他為VANDAL進行字體LOGO的再創作，成品除了保留LOGO本身的比例與結構，也充分融合了Defame作品中慣用的表現技法，以粗糙筆觸進行單一色調的細節呈現，及金屬音樂圖像風格中常見的”牽絲”手法，若由細節欣賞更能發現創作者對於字體”怪物化”的純熟技巧，完整地呈現了一個Defame式的VANDAL LOGO。', '0', '1700', '2020-03-01 09:43:04');
INSERT INTO `product` (`ProductName`, `BrandID`, `CategoryID`, `PDescription`, `Discontinued`, `UnitPrice`, `Date`) VALUES ('Free Bird x 伊比薩刺青 髒貓 “浪花女郎”', '1', '5', 'Free Bird x 伊比薩刺青 髒貓 “浪花女郎”\r\n滑板是文化.是運動.更是一種藝術的載體\r\n今年首季板身我們邀請了三位風格各異的刺青師來操刀Tattoo Artist Series\r\n第三彈為來自台北伊比薩刺青的林彼得 aka 髒貓Dirty Cat 於2009年時創立伊比薩刺青\r\n以其擅長的美式傳統結合日式風格獲得眾多少男少女們的喜愛 並參加過數場上海.成都.香港.南寧.泰國清邁等刺青展\r\n主掌的伊比薩刺青店經營理念即是希望來刺青的客人都有如渡假般的輕鬆感受\r\n台北市大同區赤峰街33巷4號 02-25527630', '0', '1500', '2020-03-01 09:43:04');
INSERT INTO `product` (`ProductName`, `BrandID`, `CategoryID`, `PDescription`, `Discontinued`, `UnitPrice`, `Date`) VALUES ('DESTRUCT SF', 3, 12, '新品販售 \r\n上市時間：\r\n\r\n2020/03\r\n\r\n型號：\r\n\r\nH-16003', 1, 2380, '2020-03-09 12:14:36');
UNLOCK TABLES;
