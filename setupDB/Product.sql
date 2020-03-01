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
    `ProductID` INT(10) NOT NULL AUTO_INCREMENT , 
    `ProductName` VARCHAR(20) NOT NULL , 
    `BrandID` INT(10) NOT NULL , 
    `CategoryID` INT(10) NOT NULL , 
    `PDescription` TEXT NOT NULL , 
    `Discontinued` VARCHAR(1) BINARY NOT NULL DEFAULT '0' COMMENT '預設0為販售中,1:停售' , 
    `UnitPrice` INT(20) NOT NULL , 
    `Date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`ProductID`)
    --   ,CONSTRAINT `FK_Product_Brand` FOREIGN KEY (`BrandID`) REFERENCES `Rollin`.`Brand` (`BrandID`),
    --   CONSTRAINT `FK_Product_Category` FOREIGN KEY (`CategoryID`) REFERENCES `Rollin`.`Category` (`CategoryID`)
      ) ENGINE = InnoDB;

INSERT INTO `product` (`ProductID`, `ProductName`, `BrandID`, `CategoryID`, `PDescription`, `Discontinued`, `UnitPrice`, `Date`) 
    VALUES (NULL, 'Fashion Board', '1', '1', 'Skate really fast!!', '0', '3000', '2020-02-10 18:00:39'),
           (NULL, 'Biggy Bag', '2', '21', 'Reeeeeally Big man!', '0', '2580', current_timestamp()),
           (NULL, 'Wode Huaban Sieh', '3', '12', 'this is nice shoes man! It is Gooooooooood. You dont wanna miss it .\r\nDai Chyu Syueh Siao Tong Syueh Du Huei Jiao Ma Ma Mai Gei Wo. 這是超長資料的測試， 透過逆向歸納，得以用最佳的策略去分析滑板鞋。 世界上若沒有滑板鞋，對於人類的改變可想而知。 伯爾講過，個性和魅力，是學不會，裝不像的。 這段話可說是震撼了我。\r\n\r\n 總而言之，滑板鞋對我來說有著舉足輕重的地位，必須要嚴肅認真的看待。 我們可以很篤定的說，這需要花很多時間來嚴謹地論證。 這種事實對本人來說意義重大，相信對這個世界也是有一定意義的。 一般來講，我們都必須務必慎重的考慮考慮。 對我個人而言，滑板鞋不僅僅是一個重大的事件，還可能會改變我的人生。 滑板鞋，發生了會如何，不發生又會如何。 塞萬提斯曾說過，努力是成功之母。 這段話讓我的心境提高了一個層次。 司各特講過，休息過長就會發霉。 強烈建議大家把這段話牢牢記住。', '0', '94875', current_timestamp())
--
-- Dumping data for table `product`
--