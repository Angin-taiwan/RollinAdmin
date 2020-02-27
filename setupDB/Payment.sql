--
-- Create database "rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `rollin`.`payment` ( 
   `PaymentID` INT NOT NULL AUTO_INCREMENT , 
   `PaymentName` VARCHAR(20) NOT NULL , PRIMARY KEY 
   (`PaymentID`)
   
);

--
-- Dumping data for table `brand`
--

-- LOCK TABLES `Brand` WRITE;
INSERT INTO `payment` (`PaymentID`, `PaymentName`) VALUES (NULL, '信用卡付款'), (NULL, 'ATM轉帳');

-- INSERT INTO `Brand` (BrandName, Description) VALUES ("DC", "Skate shoes & sneakers by DC Shoes stand for high quality and innovation. Founded by Ken Block, DC Shoes is sitting pretty atop the skate scene and are excited about their top-notch skate team. In addition to skate shoes, DC Shoes also offers you high-quality streetwear and accessories.");
-- INSERT INTO `Brand` (BrandName, Description) VALUES ("Toy Machine", "Since its conception in 1993, Toy Machine has established itself as an integral part of the skateboarding community and has a loyal following. This is, to a large extent, thanks to the founder and driving force behind Toy Machine, skateboard legend Ed Templeton. Through his interest in art and his own artistic talents, it’s obvious why Templeton’s responsible for all of the deck graphics at Toy Machine. Both the devilish logo and the figures of the so-called “Transistor Sect” have high recognition value and give Toy Machine (also known as “The Blood Sucking Company”) their own artistic direction.");
-- INSERT INTO `Brand` (BrandName, Description) VALUES ("Vans", "Skateboarding classics like the Vans Authentic and the Vans Era as well as loads of apparel can be found in the Vans Online Shop at skatedeluxe. Because when it comes to skate shoes, you can’t ignore Vans. The sneakers from the Van Doren brothers have always been legendary and are considered the ultimate in the skating scene. The current cult label - like so many big brands – began as a small shoe factory in southern California. At skatedeluxe, you can shop all the popular skate shoes, sneakers, and apparel from Vans online.");
-- INSERT INTO `Brand` (BrandName, Description) VALUES ("Element", "Thanks to high-quality workmanship and great durability, Element skateboard decks have developed a solid fan base. Element's success is assured by a series of sophisticated deck technology combined with artful and innovative graphics from artists like French Fred or Chad Eaton. The designs using glass fiber reinforced plastic strips which are embedded in the top layer of the wood are an absolute highlight. This not only ensures a very good deck response, but also gives it more tension and stability.");
-- INSERT INTO `Brand` (BrandName, Description) VALUES ("Spitfire", "Spitfire skateboard wheels come in many different shapes and forms. For the most part, Spitfire Wheels differ in material mixture, shape and the degree of hardness. You will find the perfect Spitfire wheels for every area of use, your personal preference and setup. Spitfire skateboard wheels, bearings, streetwear and accessories can be found online at the skatedeluxe skate shop.");
-- INSERT INTO `Brand` (BrandName, Description) VALUES ("Girl", "Girl Skateboards has been providing you with superb skateboard decks, streetwear, and accessories since 1993, and is one of the biggest names in the skate scene. With 25 years under their belt, Girl Skateboards is one of the longest-serving brands and yet remains young in its designs, footage and mindset. You can quickly and easily order your new Girl Skateboard Deck as well as the fitting streetwear in the skatedeluxe Online Shop.");
-- INSERT INTO `Brand` (BrandName, Description) VALUES ("Enjoi", "Enjoi skateboards offer a line of professionally endorsed skateboard decks as their primary product. After Johnson's departure, Matt Eversole took over as head of the company. They released their first video, Bag of Suck in 2006, which won TWS (Transworld Skateboarding) Video of the Year Award. Enjoi is owned and distributed by Dwindle Distribution.");
-- INSERT INTO `Brand` (BrandName, Description) VALUES ("Chocolate", "It's no longer possible to imagine the skateboarding world without Chocolate Skateboards. Next to their very influential team, subsequent video classics, the high-quality Chocolate decks with their memorable graphics really set them apart from the rest. You can get your new Chocolate skateboard deck, as well as a tonne of T-shirts and streetwear, here in the skatedeluxe Online Skate Shop.");
-- INSERT INTO `Brand` (BrandName, Description) VALUES ("Real", "Real is now one of the oldest existing skateboard brands. This rock of a company, headquartered in San Francisco, dates back to a time when skateboarders did not have much say in the industry. Above all, decks had to sell, and it wasn’t about trying to please the skaters. This is exactly why Tommy Guerrero and Jim Thiebaud decided to go against the grain in the early 1990s. When the two of them saw their time at Powell-Peralta coming to an end, they took things into their own hands and founded a company that would reflect the real and raw character of skateboarding. With the help of skateboard legend Fausto Vitello, who is, among other things, the father of the world-renowned Thrasher Magazine, Real Skateboards was able to establish themselves in a short period of time.");


-- UNLOCK TABLES;