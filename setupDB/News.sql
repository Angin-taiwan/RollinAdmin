--
-- Create database "Rollin" if not exists
--

CREATE DATABASE IF NOT EXISTS Rollin DEFAULT character set utf8;

use Rollin;

--
-- Table structure for table `News`
--

DROP TABLE IF EXISTS `News`;

CREATE TABLE `News`(
   NewsID  	      INT     	         NOT NULL   AUTO_INCREMENT,
   Title          VARCHAR(100)      NOT NULL,
   Description    VARCHAR(1000),
   CreateDate     DATETIME          NOT NULL   DEFAULT   CURRENT_TIMESTAMP,
   UpdateDate     DATETIME                     ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY ( NewsID )
);

--
-- Dumping data for table `News`
--

LOCK TABLES `News` WRITE;

INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('LOADED CHUBBY UNICORN BLOOD SLAYER', '本已經絕版且停產的白色獨角獸Chubby Unicorn這次以Chubby Unicorn Blood Slayer黑色獨角獸的塗裝再次歸來Dancing / Freestyle / Freeride / Downhill這張十項全能的獨角獸擁有十四項專利囊括這麼多優點的它絕對值得你擁有一張但獨角獸畢竟是珍禽異獸珍貴稀有的東西總是得來不易提醒各位，限量是殘酷的歡迎前來店裡馴服獨角獸噢！', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('BHANGRA 歷久不衰的經典款', '長板界最經典也最歷久不衰的一款長板Dancing / Freestyle 樣樣行板頭與板尾不對稱的設計讓愛嘗試的你玩法更具樂趣也更有挑戰性擁有了一張 Loaded Bhangra卻如同擁有了兩張板這麽高的CP值說它是經典實在是當之無愧啊！', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('The Tarab 驚艷抵台', '2020 最新發表作品47" 全新對稱板型Dancing/ Freestyle輕量化設計頭尾加強結構特殊軟木表面Grab rails手招不溜手🤙太多新優點我只能說你們快點來帶它肥家吧', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('來自美國加州經典長板品牌LOADED', 'LOADED BOARDS來自美國加州的經典長板品牌Loaded Boards熱愛滑板的你，你不能不認識它！Loaded Boards以竹子製成的板身聞名全世界，竹子的板身因具備良好的彈性與支撐性，給予玩家更舒適的腳感，同時也能讓玩家享受更多的樂趣與層次，讓你一踩就愛上！Loaded Boards到底有多好玩？竹子的板身踩起來到底多有舒服？玩起來到底多有趣？等你來店裡體驗嘍！', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('滑板女孩專屬', 'Roxy 成立於1990年是Quiksilver 旗下的女性品牌-輕鬆休閒的生活風格-總是在女孩的生活圈-輕鬆展現出自我的態度', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('[Quiksilver]長板新選擇', '新貨到~Quiksilver成立於澳洲總部-位於美國Huntington beach-是世界上最大的衝浪與滑板運動服飾用品公司之一-喜歡簡約風格外貌協會的朋友-快點來帶他們肥家溜', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('[Landyachtz] Stratus Hollow Tech Longboard', 'Landyachtz StratusDancing女孩兒最愛-板身採用6層加拿大楓木🇨🇦-Hollow Tech簍空設計輕量化-2層玻璃纖維增強板身結構-讓你不再擔心重量的困擾-Free style不再需要使出洪荒之力-完成度與自信心可同時提升-文字形容有限-歡迎來店詢問', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('[Anker] iPhone Lightning Wire', '隨身小物新利用來自美國Anker 原廠商品-高耐用且具認證的 iPhone Lighting 充電線-不只可以讓你手機快速充電-必要時也可以讓你牽著你的滑板到處溜搭溜搭-全商品原廠皆提供18個月保固!!!-柔弱的少女們-不要再擔心長板拿不動這件事了-你看腦娘拖得多輕鬆', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('[Bern Helmet]', '你們知道你們所購買的Bern安全帽是2用的嗎?最近陸續有好幾位板友開心出國去滑雪-(也好多朋友跟我們分享, 平常練長板, 真的有幫助耶!!!)-只要將安全帽換上冬季內襯, 鎖上雪鏡鉤 (需另外加購)-你在雪場上就能保暖又保護你的頭部安全❤-實在是一頂非常值得投資的2用安全護具呢!!!-我們的腦袋不是空固力-請好好保護它喔', '2020-03-10', '2020-03-25');
INSERT INTO `news` (`Title`, `Description`, `CreateDate`, `UpdateDate`) VALUES ('[G-Form] Pro-X Compression Shirt ', '任何刺激運動都有一定的風險多一分防護 少一位看護--🇱🇷G-Form🇱🇷-100% Made in USA-Pro-X Compression Shirt-新款防摔衣', '2020-03-10', '2020-03-25');

UNLOCK TABLES;