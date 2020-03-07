--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `Brand`
--

DROP TABLE IF EXISTS `Brand`;

CREATE TABLE `Brand`(
   BrandID 	   INT 			 NOT NULL  AUTO_INCREMENT,
   BrandName   VARCHAR(50)  NOT NULL  UNIQUE,
   Description VARCHAR(1000),
   PRIMARY KEY ( BrandID )
);

--
-- Dumping data for table `Brand`
--

LOCK TABLES `Brand` WRITE;

INSERT INTO `Brand` (BrandName, Description) VALUES ("DC", "DC Shoes 的滑板鞋和運動鞋代表著高品質和創新。 由 Ken Block 創立的 DC Shoes 正坐在滑板界的最前沿，並對他們的頂尖滑板團隊感到興奮。 除了滑板鞋，DC Shoes 還為您提供高品質的街頭服飾和配件。您可以其生產的街頭服飾中看到90年代的根基。 DC Shoes 始終將早期的風采帶回現代。 高度的舒適性，自由移動的風格和特殊風格都有助於使 DC Shoes 系列成為完美的滑板鞋。");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Toy Machine", "自 1993 年創立以來，Toy Machine 已成為滑板社群不可或缺的一部分，並擁有忠實的追隨者。 這在很大程度上要歸功於 Toy Machine 的創始人和影響力，滑板傳奇人物 Ed Templeton。 通過對藝術的興趣和自己的藝術才能，Templeton 負責了 Toy Machine 的所有板身圖案。 邪惡的徽標和所謂的“Transistor Sect”的圖形都具有很高的識別價值。");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Vans", "在滑板鞋方面，您不能忽略 Vans。 Van Doren 兄弟的運動鞋一向具有傳奇色彩，被認為是滑板界的終極滑板鞋。 像許多大品牌一樣，擁有大量忠實顧客的 Vans 品牌最初是在加州南部的一家小型製鞋廠開始的。 1966年3月，Van Doren 兄弟與商業夥伴和長期一起在加州成立了“ The Van Doren 橡膠公司”。 Vans Authentic 是該品牌的首個款式。您可以在 Rollin Skate Shop 的線上商店選購 Vans 所有流行的滑板鞋、運動鞋和服裝。");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Element", "	由於高品質的工藝和出色的耐用性，Element 滑板已擁有了廣大的支持者。 Element 的成功得益於一系列複雜的製板技術，結合了 French Fred 或 Chad Eaton 等藝術家的精巧創新圖案。 使用嵌在木材頂層的玻璃纖維增強塑料條的設計絕對是亮點。 這不僅確保了非常好的板身反應，而且還賦予了其更大的張力和穩定性。");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Spitfire", "Spitfire 滑板輪有許多不同的形狀和形式。 在大多數情況下，Spitfire 在材質、形狀和硬度方面有所不同。 您會發現適合各種使用情境與領域、符合的個人喜好和設置的完美滑板輪。 Spitfire 的滑板輪、軸承、街頭服飾和配件皆可在 Rollin Skate Shop 的線上商店選購。");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Girl", "自1993年以來，Girl Skateboards 一直為您提供一流的滑板、街頭服飾和配件，並且是滑板界最知名的品牌之一。 擁有25年歷史的 Girl Skateboards 是存在時間最長的品牌之一，但在設計，畫面和思維方式上仍然年輕。 您可以在 Rollin Skate Shop 的線上商店中快速輕鬆地訂購新的 Girl Skateboard 板身以及街頭服飾。");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Enjoi", "Enjoi 滑板提供一系列經過專業認可的滑板板身作為其主要產品，此外還製造滑板配件和服裝。該公司由 Dwindle Distribution 發行，自成立以來一直以其幽默和諷刺的設計而聞名，並採用了風格化的熊貓作為其徽標。");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Chocolate", "再也無法想像沒有 Chocolate 的滑板世界了。 除了他們極具影響力的團隊、經典影片之外，高品質的 Chocolate 板身以及令人難忘的圖案確實使它們與眾不同。 您可以在 Rollin Skate Shop 的線上商店選購 Chocolate 滑板板身和街頭服飾。");
INSERT INTO `Brand` (BrandName, Description) VALUES ("Real", "Real 是現有最古老的滑板品牌之一。 這家總部位於舊金山的公司的歷史可以追溯到滑板選手在該行業沒有太多發言權的時代，公司通常重視銷售多過於滑板選手。這正是 Tommy Guerrero 和 Jim Thiebaud 決定在 1990 年代反其道而行的原因。 當他們兩個在 Powell-Peralta 的合約結束時，他們決定將事情掌握在自己的手中，並成立了一家公司，該公司將反映滑板的真實 (Real) 和原始風格。 在滑板傳奇人物 Fausto Vitello 的幫助下，Real 在短時間內得以建立。");

UNLOCK TABLES;