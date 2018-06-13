-- phpMyAdmin SQL Dump


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_product_id` int(15) NOT NULL auto_increment,
  `order_id` int NOT NULL, 
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY  (`order_product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;


--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL auto_increment,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'J1', 'Antique Gold Neckless', 'Very valuable neckless made of gold and small plastic sea stones', 'Jew1.jpeg', 6, 280.00),
(2, 'J2', 'Antique Red Earings', 'Made of precious stones,these earings are the best choice for your favorite formal dinner. Made in Italy', 'Jew2.jpg', 8, 250.00),
(3, 'J3', 'Gold Neckless', 'Made of 10% gold this neckless is the perfect choice for people who like to shine in formal events.', 'Jew3.jpg', 4, 300.00),
(4, 'J4', 'Artificially Colored Stones', 'Nice looking precisious stones made of sea minerals and 0.2% valuable diamonds. Made in India. ', 'Jew4.jpg', 2, 1000.00),
(5, 'J5', 'Green Camp Ring', 'Made of 10% white gold and other synthetic materials. The perfect choice for your formal and casual events.','Jew5.jpeg', 4, 350.00),
(6, 'J6', 'Sea Color Bracelet', 'Perfect fit for every age who likes sea color. The perfect choice for your summer vacations. Made in Spain', 'Jew6.jpg', 1, 69.99),
(7, 'Fr1', 'Gold Shining Square Frame', 'Antique frame, made of 10% gold. Perfect for your old pictures or paintings. Made In USA', 'Frame1.jpeg', 3, 135.99),
(8, 'Fr2', 'Thick Antique Frame', 'Made of 1% gold and a special combination of other materials. Made in USA','Frame2.jpeg', 4, 89.00),
(9, 'Fr3', 'Rectanglular Antique Frame', 'The best choice for your old pictures,painting or degrees. Made in Vietnam', 'Frame3.jpeg', 5, 55.00),
(10, 'Fr4', 'Aluminum Antique Frame', 'Made of Durable Aluminum this frame will last a lifetime. Made in USA', 'Frame4.jpeg', 6, 45.00),
(11, 'Fr5', 'Curly Shape Frame', 'An Antique Frame made of pure copper and aluminum. The best choice for a nice looking picture.', 'Frame5.jpg', 2, 39.99),
(12, 'Fr6', 'Square Copper Frame', 'Made of clean cooper this is the perfect frame for your 200x200 picture.', 'Frame6.jpeg', 2, 35.00),
(13, 'P1', 'Aluminum and Copper Pot', 'Made in Italy. This is the coolest pot to use as a decoration for your house. Very light and a really nice looking pot for a very reasonable price.', 'Pot1.jpeg', 7, 66.00),
(14, 'P2', 'Short Round-Shape Pot', 'Brown colored pot. Very light, small and perfect for your home or store decor. Made in India.', 'Pot2.jpeg', 4, 39.99),
(15, 'P3', 'Ceramic circular Pot', 'Made in Greece. The perfect choice for your home decor. This pot is a little bit heavy but extremely durable.', 'Pot3.jpg',8, 55.00),
(16, 'P4', 'Clay Pot', 'Used Pot. Made in Scotland. The perfect choice for your backyard decoration. It is extremely durable.', 'Pot4.jpg', 26, 100.00),
(17, 'P5', 'Kings head Pot', 'Made of gold and copper. Made in China. This is one of the oldest pots around made of gold.', 'Pot5.jpg', 1, 345.00),
(18, 'P6', 'Flower Pot', 'Made of dark Clay, this is the rarest kind of pot made in Lithuania.', 'Pot6.jpeg', 1, 179.00),
(19, 'Furn1', 'Antique Triple Char', 'Very Durable, shiny, and classy. The perfect choice for people who are passionate about antique furniture. Made in Spain.', 'Furn1.jpeg', 2, 200.00),
(20, 'Furn2', 'Two Antique King Chairs', 'These chairs come as a package. Pay one get two. Made in Scotland. ', 'Furn2.jpeg', 2, 230.00),
(21, 'Furn3', 'Antique shiny Dresser', 'The perfect purchase for people who love antique room decoration. Very light and not too big. Made in Italy.', 'Furn3.jpg', 7, 200.00),
(22, 'Furn4', 'Small table-drawer', 'Two small drawers that do not take a lot of space but look really nice. Not a shiny material but a very durable one. Made in Mexico.', 'Furn4.jpg', 1, 200.00),
(23, 'Furn5', 'Round Table', 'The perfect coffee table for your small living room. Made of high quality wood.Made in Italy' ,'Furn5.jpeg', 7, 200.00),
(24, 'Furn6', 'Small Elephant statue', 'Shiny little furniture made in India. The best choice for people who love decorating their house with antique furniture from centuries ago.', 'Furn6.jpg', 1, 89.00),
(25, 'W1', 'Small Antique Watch', 'Small antique table watch. It works great and it looks really nice. Made in Italy.', 'Watch1.jpeg', 1, 88.00),
(26, 'W2', 'Roman Antique Watch', 'A light, nice looking and shiny watch with alarm clock and calendar. Adequate for people who love antique watches. Made in Rome', 'Watch2.jpg', 2, 100.00),
(27, 'W3', 'Horizontal Gold Watch', 'Made of pure gold and copper this is the best choice for your home decor. Accurate watch that comes with alarm clock and hanging chain. Made in France', 'Watch3.jpeg', 1, 260.00),
(28, 'W4', 'White Field Antique Watch', 'This is small round watch with a white field, made of copper and aluminum. Made in Italy ', 'Watch4.jpg', 3, 100.00),
(29, 'W5', 'Black standing Antique Watch', 'A small and nice looking watch, perfect for your room decor. Alarm clock and compass are incorporated. Made in USA.', 'Watch5.jpg', 4, 200.00),
(30, 'W6', ' Antique wrist Watch', 'Antique watch with a perfect combination of copper and gold. Made in Italy. ', 'Watch6.jpg', 1, 240.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(65) NOT NULL,
  `type` varchar(20) NOT NULL default 'user',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES
(1, 'Livio', 'Beqiri', '233 Midland Ave', 'New Jersey', 07026, 'liviob@live.com', '$2y$10$bktZNvLmQS1iFLhTqy30YecbTbce5Fwo0vyZHGA9sUoGTIuEkhjD2', 'user'),
(2, 'Admin', 'Webmaster', 'Montclair', '', 07003, 'admin@admin.com', '$2y$10$kzHJJ7JEAUmIoBQ5GRxbleFIX6kEgs2NldLWG6RptbX.p1ORZeOKa', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
