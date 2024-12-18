-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2024 at 05:46 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webmohinh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id_category`, `name`) VALUES
(28, 'Fairy Tail'),
(29, 'Pokemon'),
(37, 'One Piece'),
(68, 'DragonBall');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `customer_address` text,
  `customer_phone` varchar(15) DEFAULT NULL,
  `notes` text,
  `total_price` decimal(10,2) DEFAULT NULL,
  `payment_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_user_ord` (`id_user`),
  KEY `fk_user_pay` (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `id_user`, `customer_name`, `customer_address`, `customer_phone`, `notes`, `total_price`, `payment_id`, `created_at`) VALUES
(24, 13, 'aBen', '377', '0253568152', 'Note', 1000000.00, 5, '2024-12-09 21:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `fk_prod_itemOrd` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(21, 24, 34, 3, 750000.00),
(22, 24, 35, 1, 250000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

DROP TABLE IF EXISTS `tbl_payments`;
CREATE TABLE IF NOT EXISTS `tbl_payments` (
  `id_payment` int NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`id_payment`, `payment_method`) VALUES
(5, 'Thanh toán khi nhận hàng'),
(6, 'Momo'),
(9, 'VN Pay'),
(12, 'Spay');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `namepro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `id_category` int NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id_product`, `namepro`, `description`, `price`, `stock`, `id_category`, `image`) VALUES
(34, 'luffy1', 'Monkey D. Luffy (/ˈluːfi/ LOO-fee) (Nhật: モンキー・D・ルフィ Hepburn: Monkī Dī Rufi?, [ɾɯɸiː]), còn gọi là Luffy \"Mũ Rơm\"[2] là nhân vật chính trong bộ manga One Piece của Nhật Bản do Oda Eiichiro sáng tạo. Luffy lần đầu ra mắt khi còn là một cậu nhóc có được đặc tính của cao su sau khi vô tình ăn phải Trái Ác Quỷ mà Shanks \"Tóc Đỏ\" sở hữu.', 250000.00, 39, 37, 'Luffy.jpeg'),
(35, 'luffy2', 'Monkey D. Luffy (/ˈluːfi/ LOO-fee) (Nhật: モンキー・D・ルフィ Hepburn: Monkī Dī Rufi?, [ɾɯɸiː]), còn gọi là Luffy \"Mũ Rơm\"[2] là nhân vật chính trong bộ manga One Piece của Nhật Bản do Oda Eiichiro sáng tạo. Luffy lần đầu ra mắt khi còn là một cậu nhóc có được đặc tính của cao su sau khi vô tình ăn phải Trái Ác Quỷ mà Shanks \"Tóc Đỏ\" sở hữu.', 250000.00, 37, 37, 'luffy2.jpeg'),
(40, 'Natsu', 'Natsu Dragneel (ナツ・ドラグニル, Natsu Doraguniru), là một Pháp Sư của Hội Fairy Tail và là thành viên của Đội Natsu. Ban đầu, anh đã qua đời cách đây 400 năm do một con Rồng tấn công, nhưng Natsu đã được anh trai của mình hồi sinh trong thân phận Ác Quỷ mạnh nhất trong số những con Quỷ của Zeref có tên là Etherious Natsu Dragneel, gọi tắt là E.N.D. (ＥＮＤ, イーエヌディー, Ī Enu Dī). Anh cũng là một trong năm Sát Long Nhân được gửi đến tương lai 400 năm sau bằng Cổng Nhật Thực qua sự trợ giúp của Anna Heartfilia nhằm mục đích đánh bại Acnologia.', 350000.00, 30, 28, 'vn-11134211-7r98o-lziypxz07esh41.jpg'),
(43, 'Pokemon', 'Pocket Monsters viết tắt là Pokémon, hay còn được biết đến như là Pokémon the Series với khán giả phương Tây từ năm 2013, là loạt anime truyền hình dựa trên loạt trò chơi điện tử Pokémon.', 450000.00, 17, 29, 'mo-hinh-prime-figure-mini-mew-funism-pf2056_1.webp'),
(54, 'Vegeto', '7 vien ngoc rong', 23000000.00, 32, 68, 'efwfe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `name`, `email`, `password`, `role`) VALUES
(3, 'vy', 'vy@gmail.com', '123', 'user'),
(4, 'Trí Quỳnh', 'ds@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
(5, 'ben', 'ben', '$2y$10$azw/ut4DzVnpxwgbCvEPIedKFoJOVZS9Ni.0dZRWPv.WcMMzw2lly', 'admin'),
(12, 'bennn', 'ben@gmail.com', '$2y$12$1aeHIlQUGWNF2edgmwplSOFSHcsByTHFBRTK6IWvj7a6u/HKxh/Lm', 'user'),
(13, 'Ben', 'b', '$2y$10$AjTf3hwo5WnwzIMRBDd9bu4GDhYBajf8wwJto/P6EF4pPWOexTlpu', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_user_ord` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_pay` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payments` (`id_payment`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prod_itemOrd` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`id_product`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tbl_categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
