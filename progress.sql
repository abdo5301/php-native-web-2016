-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 04:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `progress`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_users`
--

CREATE TABLE IF NOT EXISTS `adm_users` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `big_adm` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `adm_users`
--

INSERT INTO `adm_users` (`adm_id`, `first_name`, `last_name`, `email`, `username`, `password`, `big_adm`) VALUES
(27, 'عبدالرحمن', 'سعيد', 'pop_pop5304@yahoo.com', 'بوب', '202cb962ac59075b964b07152d234b70', 1),
(29, 'Abdelrahman', 'saeed', 'pop_pop5301@yahoo.com', 'pop', '202cb962ac59075b964b07152d234b70', 1),
(31, 'dsfdsfs', 'fghghe', 'pop_pop5303@yahoo.com', 'lolo', '202cb962ac59075b964b07152d234b70', 0),
(32, 'lolo', 'dfsdrry', 'pop_pop5309@yahoo.com', 'dodo', '202cb962ac59075b964b07152d234b70', 1),
(33, 'koloo', 'lolos', 'pop_pop5366@yahoo.com', 'ppaaaaa', '202cb962ac59075b964b07152d234b70', 0),
(39, 'qeqweqw', 'qweeqwer', 'pop_pop5318@yahoo.com', 'wqwqewwwwww', '202cb962ac59075b964b07152d234b70', 0),
(40, 'dfhdfhdf', 'gdsfh', 'pop_pop5205@yahoo.com', 'eeeeeeeeee', '202cb962ac59075b964b07152d234b70', 0),
(41, 'samy', 'walid', 'pop5301@yahoo.com', 'solo', '202cb962ac59075b964b07152d234b70', 1),
(42, 'admin', 'admin', 'pop_pop5301@hotmail.com', 'admin', '4297f44b13955235245b2497399d7a93', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Message` longtext,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `name`, `city`, `email`, `Message`) VALUES
(5, 'erwry', 'Loxor', 'pop_pop5309@yahoo.com', 'At vero eos et accusamus et iusto odio dignissimo ducimu qui blanditiis praesentium voluptatum sdeleniti.'),
(6, 'erwr', 'Londen', 'pop_pop5308@yahoo.com', 'At vero eos et accusamus et iusto odio dignissimo ducimu qui blanditiis praesentium voluptatum deleniti.'),
(7, 'erwr', 'dasldk.', 'pop_pop5304@yahoo.com', 'dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.dasldk.\r\n\r\ndasldk.dasldk.dasldk.dasldk.dasldk.'),
(8, 'erwr', 'Eraq.', 'pop_pop5305@yahoo.com', 'hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.\r\n\r\nhello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.'),
(9, 'erwr', 'Aswan', 'pop_pop5308@yahoo.com', 'hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.hello.sssss.ssss.ssss.'),
(10, 'abdo', 'cairo', 'pop_pop5301@yahoo.com', 'Hi all. help me please!'),
(11, 'abood', 'cairo', 'pop_pop5303@yahoo.com', 'lol...answer me.'),
(13, 'erwr', 'Aswan', 'pop_pop5303@yahoo.com', 'asdshdd.dsdfhd.sadaas..dgg.'),
(14, 'wqewqe', 'asdasda', 'pop_pop5301@yahoo.com', 'asfasfasfasfasfas');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `desc` text,
  `content` longtext,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active_news` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `desc`, `content`, `date`, `image`, `active_news`) VALUES
(5, 'Aubergine Asparagus Maize', 'Aubergine Asparagus Maize', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', '2016-03-31', '2015-07-30_00003.jpg', 1),
(6, 'fafasfhhh', 'Aubergine Asparagus Maize', 'Catsear corn gumbo leek chickpea summer purslane chicory. Taro azuki bean broccoli rabe soybean endive chicory. Pumpkin salsify horseradish avocado cabbage tomatillo ricebean caulie turnip greens eggplant.\r\n\r\nSweet pepper pea sprouts mung bean cabbage radicchio silver beet coriander lentil groundnut jÃ­cama wattle seed black-eyed pea chicory broccoli rabe bamboo shoot. Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut. Wakame watercress swiss chard bamboo shoot garlic wakame azuki bean lentil lettuce chicory horseradish eggplant gumbo. Swiss chard turnip jÃ­cama courgette fennel salsify brussels sprout zucchini sea lettuce desert raisin fava bean artichoke kale bell pepper watercress wakame black-eyed pea garlic. Lentil spring onion caulie welsh onion sweet pepper quandong potato wakame carrot taro artichoke prairie turnip eggplant.\r\n\r\nScallion burdock silver beet water spinach turnip watercress aubergine. Komatsuna scallion bush tomato prairie turnip amaranth cress fennel parsnip plantain rutabaga lettuce chickweed radish. Yarrow bell pepper radish tomatillo avocado brussels sprout leek garlic salad pea sprouts sorrel courgette chickweed courgette carrot fennel cress lotus root.', '2016-03-31', '10686608_427706647405964_4406926590559358150_n.jpg', 1),
(8, 'hhhhhh', 'Aubergine Asparagus Maize', 'Catsear corn gumbo leek chickpea summer purslane chicory. Taro azuki bean broccoli rabe soybean endive chicory. Pumpkin salsify horseradish avocado cabbage tomatillo ricebean caulie turnip greens eggplant.\r\n\r\nSweet pepper pea sprouts mung bean cabbage radicchio silver beet coriander lentil groundnut jÃ­cama wattle seed black-eyed pea chicory broccoli rabe bamboo shoot. Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut. Wakame watercress swiss chard bamboo shoot garlic wakame azuki bean lentil lettuce chicory horseradish eggplant gumbo. Swiss chard turnip jÃ­cama courgette fennel salsify brussels sprout zucchini sea lettuce desert raisin fava bean artichoke kale bell pepper watercress wakame black-eyed pea garlic. Lentil spring onion caulie welsh onion sweet pepper quandong potato wakame carrot taro artichoke prairie turnip eggplant.\r\n\r\nScallion burdock silver beet water spinach turnip watercress aubergine. Komatsuna scallion bush tomato prairie turnip amaranth cress fennel parsnip plantain rutabaga lettuce chickweed radish. Yarrow bell pepper radish tomatillo avocado brussels sprout leek garlic salad pea sprouts sorrel courgette chickweed courgette carrot fennel cress lotus root.', '2016-03-30', '2015-03-07_00001.jpg', 1),
(9, 'jkjkssttesgf', 'Hello.every one!', 'Catsear corn gumbo leek chickpea summer purslane chicory. Taro azuki bean broccoli rabe soybean endive chicory. Pumpkin salsify horseradish avocado cabbage tomatillo ricebean caulie turnip greens eggplant.\r\n\r\nSweet pepper pea sprouts mung bean cabbage radicchio silver beet coriander lentil groundnut jÃ­cama wattle seed black-eyed pea chicory broccoli rabe bamboo shoot. Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut. Wakame watercress swiss chard bamboo shoot garlic wakame azuki bean lentil lettuce chicory horseradish eggplant gumbo. Swiss chard turnip jÃ­cama courgette fennel salsify brussels sprout zucchini sea lettuce desert raisin fava bean artichoke kale bell pepper watercress wakame black-eyed pea garlic. Lentil spring onion caulie welsh onion sweet pepper quandong potato wakame carrot taro artichoke prairie turnip eggplant.\r\n\r\nScallion burdock silver beet water spinach turnip watercress aubergine. Komatsuna scallion bush tomato prairie turnip amaranth cress fennel parsnip plantain rutabaga lettuce chickweed radish. Yarrow bell pepper radish tomatillo avocado brussels sprout leek garlic salad pea sprouts sorrel courgette chickweed courgette carrot fennel cress lotus root.', '2016-03-31', 'CATPLE_WALLPAPERS_867.jpg', 1),
(10, 'Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.Vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', '2016-04-07', 'page2_img1.jpg', 1),
(11, 'askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .', 'askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .', 'askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .', '2016-04-07', 'CATPLE_WALLPAPERS_937.jpg', 1),
(12, 'gdsgdsgd dlsdhfj jdkfwief  wehekwf .', 'askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .', 'askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .', '2016-04-06', 'CATPLE_WALLPAPERS_1118.jpg', 1),
(13, 'yiwqi uqwqe qweqwer gsaf ddsafg sddada asdasda asdjaa .', 'asdas as lasdadaskldhaslkfahsklask ksh ahsfl ashfha las ksafhal .\r\naskldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .vasfasfaaf.', 'askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .askldhaslkfahsklask ksh ahsfl ashfha las ksafhal .', '2016-04-07', 'CATPLE_WALLPAPERS_874.jpg', 1),
(14, 'afa afkafhasf kasfgasf afa i qiowoqwi q oqiw qwyruqwr.', 'afa afkafhasf kasfgasf afa i qiowoqwi q oqiw qwyruqwr.afa afkafhasf kasfgasf afa i qiowoqwi q oqiw qwyruqwr.', 'afa afkafhasf kasfgasf afa i qiowoqwi q oqiw qwyruqwr.afa afkafhasf kasfgasf afa i qiowoqwi q oqiw qwyruqwr.afa afkafhasf kasfgasf afa i qiowoqwi q oqiw qwyruqwr.vafa afkafhasf kasfgasf afa i qiowoqwi q oqiw qwyruqwr.', '2016-04-07', 'CATPLE_WALLPAPERS_975.jpg', 1),
(15, 'fgdhlkgsdgoj', 'fwjeifwheifwefjweld.dfdsfd sfsdfsdfllfkj  . dsfdsfh hald ;fadf.d.fsdfsdfdasgha.', 'fwjeifwheifwefjweld.dfdsfd sfsdfsdfllfkj  . dsfdsfh hald ;fadf.d.fsdfsdfdasgha.fwjeifwheifwefjweld.dfdsfd sfsdfsdfllfkj  . dsfdsfh hald ;fadf.d.fsdfsdfdasgha.fwjeifwheifwefjweld.dfdsfd sfsdfsdfllfkj  . dsfdsfh hald ;fadf.d.fsdfsdfdasgha.', '2016-04-08', 'CATPLE_WALLPAPERS_779.jpg', 1),
(16, 'Wakame watercress swiss chard bamboo.', 'Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo.', 'Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo. Wakame watercress swiss chard bamboo.', '2016-04-08', 'CATPLE_WALLPAPERS_1105.jpg', 1),
(17, 'Scallion burdock silver beet water spinach turnip watercress aubergine.', 'Scallion burdock silver beet water spinach turnip watercress aubergine.Scallion burdock silver beet water spinach turnip watercress aubergine.Scallion burdock silver beet water spinach turnip watercress aubergine.', 'Scallion burdock silver beet water spinach turnip watercress aubergine.Scallion burdock silver beet water spinach turnip watercress aubergine.Scallion burdock silver beet water spinach turnip watercress aubergine.Scallion burdock silver beet water spinach turnip watercress aubergine.Scallion burdock silver beet water spinach turnip watercress aubergine.Scallion burdock silver beet water spinach turnip watercress aubergine.Scallion burdock silver beet water spinach turnip watercress aubergine.Scallion burdock silver beet water spinach turnip watercress aubergine.', '2016-04-08', 'CATPLE_WALLPAPERS_992.jpg', 1),
(18, 'Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut.', 'Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut. Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut.', 'Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut. Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut. Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut. Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut. Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut. Kombu garlic watercress garbanzo squash plantain amaranth wattle seed tomatillo tigernut.', '2016-04-08', 'CATPLE_WALLPAPERS_959.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE IF NOT EXISTS `news_letter` (
  `news_letter_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`news_letter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news_letter`
--

INSERT INTO `news_letter` (`news_letter_id`, `email`) VALUES
(1, 'pop_pop545@yahoo.com'),
(2, 'pop_pop345@yahoo.com'),
(3, 'pop_pop555@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) DEFAULT NULL,
  `desc` text,
  `content` longtext,
  `image` varchar(255) DEFAULT NULL,
  `active_prod` tinyint(1) DEFAULT NULL,
  `in_home` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `desc`, `content`, `image`, `active_prod`, `in_home`) VALUES
(1, 'microphone', 'handfree microphones.\r\nhandfree microphones.\r\nhandfree microphones.', 'alot of handfree microphones which you can get from here', 'CATPLE_WALLPAPERS_58.jpg', 1, 1),
(2, 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'CATPLE_WALLPAPERS_6834.jpg', 1, 0),
(4, 'Ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'CATPLE_WALLPAPERS_975.jpg', 1, 0),
(5, 'adipisicing elit.', 'consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit', 'consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit consectetur adipisicing elit', 'CATPLE_WALLPAPERS_6260.jpg', 1, 1),
(6, 'sed do eiusmod.', 'sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore.tempor incididunt ut labore.tempor incididunt ut labore.tempor.', 'sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore. sed do eiusmod tempor incididunt ut labore.', 'CATPLE_WALLPAPERS_6851.jpg', 1, 1),
(7, 'tempor incididunt.', 'tempor incididunt.tempor incididunt.\r\ntempor incididunt.tempor incididunt.\r\ntempor incididunt.', 'tempor incididunt.tempor incididunt.tempor incididunt.tempor incididunt.tempor incididunt.tempor incididunt.tempor incididunt.tempor incididunt.tempor incididunt.', 'CATPLE_WALLPAPERS_9314.jpg', 1, 0),
(8, 'adipisicing elit .', 'adipisicing elit adipisicing elit adipisicing elit adipisicing elit .', 'adipisicing elit adipisicing elit adipisicing elit .adipisicing elit adipisicing elit adipisicing elit .adipisicing elit adipisicing elit adipisicing elit .adipisicing elit adipisicing elit adipisicing elit .adipisicing elit adipisicing elit .', 'CATPLE_WALLPAPERS_7057.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `adm_id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` mediumtext,
  `contact_email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`answer_id`, `contact_id`, `adm_id`, `title`, `content`, `contact_email`) VALUES
(1, 8, 29, 'Hello', 'help please ..I need more info about lol', 'pop_pop5301@yahoo.com'),
(2, 10, 41, 'hhhhhh', 'hello.how are you?', 'pop_pop5301@yahoo.com'),
(3, 10, 29, 'yes', 'go there.', 'pop_pop5301@yahoo.com'),
(5, 10, 29, 'microphone', 'go away man ...lol.', 'pop_pop5301@yahoo.com'),
(6, 8, 29, 'hi there!', 'are you here?!', 'pop_pop5305@yahoo.com'),
(7, 13, 29, 'Helllooooooo!', 'jkhgkjj;ld.asdasdasdalsdas.asdas.', 'pop_pop5303@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `serv_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `desc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `active_serv` tinyint(1) DEFAULT NULL,
  `in_home` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`serv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serv_id`, `title`, `desc`, `image`, `active_serv`, `in_home`) VALUES
(1, 'microphone service.', 'alot of handfree microphones which you can get from here.alot of handfree microphones which you can get from here.', 'CATPLE_WALLPAPERS_874.jpg', 1, 1),
(3, 'Vero eos.', 'At vero eos et accusamus et iusto odio dignissimo ducimu qui blanditiis praesentium voluptatum deleniti.At vero eos et accusamus et iusto odio dignissimo.', 'CATPLE_WALLPAPERS_779.jpg', 1, 1),
(4, 'Transporting service.', 'Nobis eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas.Nobis eligendi optio cumque nihil impedit quo minus id quod maxime placeat.', 'CATPLE_WALLPAPERS_1149.jpg', 1, 1),
(5, 'voluptatum deleniti.', 'voluptatum deleniti.voluptatum deleniti.voluptatum deleniti.voluptatum deleniti.voluptatum deleniti.voluptatum deleniti.', 'CATPLE_WALLPAPERS_959.jpg', 1, 1),
(6, 'Nobis eligendi.', 'Nobis eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas.Nobis eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas.', 'CATPLE_WALLPAPERS_6082.jpg', 1, 1),
(7, 'omnis voluptas.', 'omnis voluptas.Nobis eligendi optio cumque nihil impedit quo minus id quod maxime placeat. omnis voluptas.Nobis eligendi optio cumque nihil impedit quo minus id quod maxime placeat.', 'CATPLE_WALLPAPERS_9366.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `key`, `desc`) VALUES
(2, 'Country', 'Egypt'),
(6, 'Welcome, dear visitor!', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa.'),
(8, 'Phone', '8 800 154-45-67'),
(9, 'Email', 'www.google.com'),
(10, 'Facebook', 'https://www.facebook.com/Fekra.Ama/'),
(11, 'Twitter', 'news.php'),
(12, 'LinkedIn', 'news.php'),
(13, 'Delicious', 'news.php'),
(14, 'Lorem ipsum dolor sit', 'news.php'),
(15, 'Dmet, consectetur', 'news.php'),
(16, 'Adipisicing elit eiusmod', 'news.php'),
(17, 'Tempor incididunt ut', 'news.php'),
(18, 'City', 'Cairo'),
(19, 'footer_Email_title', 'pop_pop5301@yahoo.com'),
(20, 'footer_Email_link', 'https://www.facebook.com/'),
(21, 'footer_title1', 'See this'),
(22, 'footer_link1_link', 'https://www.facebook.com/'),
(23, 'footer_link1_title', 'Link 1'),
(24, 'footer_title2', 'Important :'),
(25, 'footer_title3', 'Links :'),
(26, 'footer_link2_link', 'https://www.facebook.com/'),
(27, 'footer_link2_title', 'Link 2'),
(28, 'footer_link3_link', 'https://www.facebook.com/'),
(29, 'footer_link3_title', 'Link 3'),
(30, 'footer_link4_link', 'https://www.facebook.com/'),
(31, 'footer_link4_title', 'Link 4'),
(32, 'Welcome_title', 'Hellow every one :'),
(33, 'Welcome_content', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.'),
(34, 'Welcome_image', 'CATPLE_WALLPAPERS_959.jpg'),
(35, 'Contacts_Email_link', 'https://www.facebook.com/'),
(36, 'Contacts_Email_title', 'Write to me'),
(37, 'Contacts_Note_title', 'Read this :'),
(38, 'Contacts_Note_content', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium volupta- tum deleniti atque corrupti quos dolores et quas molestias excep- turi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `testimo_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `desc` mediumtext,
  `content` longtext,
  `active_testimo` tinyint(1) DEFAULT NULL,
  `in_home` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`testimo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimo_id`, `name`, `job`, `desc`, `content`, `active_testimo`, `in_home`) VALUES
(2, 'abdelrahman', 'Developer', 'Very good wepsite with API only.', 'Very good wepsite with API only...I hope you like it.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `welcome`
--

CREATE TABLE IF NOT EXISTS `welcome` (
  `welcome_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `desc` text,
  `content` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `in_home` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`welcome_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
