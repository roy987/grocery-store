-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 01:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `unit_price` float(8,2) DEFAULT NULL,
  `unit_quantity` varchar(15) DEFAULT NULL,
  `in_stock` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `unit_price`, `unit_quantity`, `in_stock`, `image`, `category`) VALUES
(1, 'Bannana', 2.10, '100g', 18, 'bannana.png', 'fruits'),
(2, 'Cucumber', 2.00, '200g', 16, 'cucumber.jpg', 'fruits'),
(3, 'Carrot', 2.20, '200g', 0, 'carrot.png', 'fruits'),
(4, 'Grape', 4.00, '100g', 8, 'grape.png', 'fruits'),
(5, 'Pringles', 3.00, '500g', 20, 'pringles.png', 'snacks'),
(6, 'MnMs', 4.50, '200g', 9, 'mnm.png', 'snacks'),
(7, 'Jelly Sticks', 2.50, '100g', 14, 'jelly-sticks.png', 'snacks'),
(8, 'Popcorn', 2.70, '100g', 21, 'popcorn.png', 'snacks'),
(9, 'Pancakes', 3.50, '500g', 10, 'pancakes.jpg', 'breakfast'),
(10, 'Eggs', 4.80, '100g', 7, 'egg.png', 'breakfast'),
(11, 'Cereal', 7.50, '400g', 14, 'cereal.jpeg', 'breakfast'),
(12, 'Yogurt', 2.10, '200g', 20, 'yogurt.png', 'breakfast'),
(13, 'Beef Mince', 8.50, '800g', 25, 'beef-mince.jpg', 'meat_seafood'),
(14, 'Fish', 12.50, '1kg', 8, 'fish.jpg', 'meat_seafood'),
(15, 'Chicken', 7.50, '2kg', 4, 'chicken.jpg', 'meat_seafood'),
(16, 'Sausage', 4.50, '200g', 16, 'sausage.jpg', 'meat_seafood'),
(17, 'Cheesecake', 10.00, '600g', 7, 'cheesecake.jpg', 'bakery'),
(18, 'Baguette', 2.50, '200g', 20, 'baguette.jpg', 'bakery'),
(19, 'Donuts', 2.80, '200g', 21, 'donuts.png', 'bakery'),
(20, 'Croissant', 2.50, '100g', 11, 'croissant.jpg', 'bakery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
