-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 02:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `product_id` int(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `discount_price` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`product_id`, `category_id`, `brand_name`, `product_name`, `product_type`, `image`, `quantity`, `price`, `discount_price`) VALUES
(3, 6, 'Apple', 'Apple Adapter', 'Adapter', 'Assets/uploadedImage/img-65d87189226736.35569837apple_adapter.jpg', 49, 1500, 1299),
(4, 6, 'Wringle', 'Wringle Stick S1', 'SelfiStick', 'Assets/uploadedImage/img-65d871ff418e17.52462468selfistick.jpg', 10, 300, 189);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email_id`, `mobile_no`, `image`, `position`, `password`) VALUES
(5, 'JAY', 'Heruwala', 'j@gamil.com', '9985647110', 'profileImage/img-65d879ab509da9.71068042Darshanimg.jpg', 'Admin', '$2y$10$pejQb3n0GEIAJfdnMHCtT.F57o1IYUZF9Vc8aLUGpZL3YRil1mB4G'),
(7, 'Jay', 'Heruwala', 'jay@gmail.com', '1234567890', 'profileImage/img-660fc2e7cf7d63.77789805Koala.jpg', 'Owner', '$2y$10$3lEp9rp2sNjVCBmT6T1tk.rv8wcZWAT61cxBGvtRhz6/n42yCQb5m');

-- --------------------------------------------------------

--
-- Table structure for table `card_info`
--

CREATE TABLE `card_info` (
  `card_id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `card_number` bigint(255) NOT NULL,
  `cvv` int(255) NOT NULL,
  `exp_month` int(255) NOT NULL,
  `exp_year` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_info`
--

INSERT INTO `card_info` (`card_id`, `order_id`, `card_number`, `cvv`, `exp_month`, `exp_year`) VALUES
(1, 1, 1111111111111111, 123, 12, 2024),
(2, 2, 1111111111111111, 999, 11, 2024),
(3, 3, 1111111111111111, 111, 12, 2024),
(4, 1, 1111111111111111, 123, 1, 2024),
(5, 3, 1111111111111111, 111, 12, 2028),
(6, 7, 1111111111111111, 111, 12, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `table_name`, `quantity`, `price`) VALUES
(1, 9, 'mobile', 1, 15499),
(1, 8, 'mobile', 1, 44999),
(1, 7, 'mobile', 1, 69599),
(1, 6, 'mobile', 1, 76999),
(1, 5, 'laptop', 1, 41599),
(1, 4, 'laptop', 1, 48999),
(1, 3, 'laptop', 1, 86999);

-- --------------------------------------------------------

--
-- Table structure for table `categories_info`
--

CREATE TABLE `categories_info` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_info`
--

INSERT INTO `categories_info` (`category_id`, `category_name`, `image`) VALUES
(1, 'mobile', 'Assets/upload_imageimg-6597d68b10c542.73326436Screenshot (11).png'),
(2, 'laptop', 'Assets/upload_imageimg-6597de850e19f8.52081861Screenshot (7).png'),
(3, 'wirelessaccessories', 'Assets/upload_imageimg-6597e341acba74.14469382Screenshot (7).png'),
(7, 'cpu', 'Assets/upload_imageimg-659bcb47a41c67.78821965Screenshot (7).png'),
(6, 'accessories', 'Assets/upload_imageimg-6597e653627ae1.22140781Screenshot (3).png');

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `product_id` int(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `processer` varchar(255) NOT NULL,
  `graphics_card` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `rom` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `discount_price` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`product_id`, `category_id`, `brand_name`, `product_name`, `image`, `quantity`, `processer`, `graphics_card`, `ram`, `rom`, `price`, `discount_price`) VALUES
(3, 7, 'Asus', 'Asus ROG  GM 1', 'Assets/uploadedImage/img-65d86777797b95.49010959CPU1.jpg', 93, '', 'Nvidia GeForce RTX 4080 8GB LPDDR6', '32GB', '2TB', 199999, 190999),
(4, 7, 'Lenovo ', 'Lonove Legion 5', 'Assets/uploadedImage/img-65d867e2ebc5a5.82832707CPU2.jpg', 200, 'Intel i5 13th 10597H', 'Nvidia GeForce RTX 3080 6GB DDR6', '16GB', '1TB', 99599, 98999),
(5, 7, 'HP ', 'HP Hellion H1', 'Assets/uploadedImage/img-65d868959dd0c3.46085777CPU3.jpg', 75, 'Intel i7 13th 13700P', 'Nvidia GeForce RTX 3060 6GB LPDDR6', '16GB', '512GB', 85000, 82999),
(6, 7, 'Asus', 'Asus Tuf X1', 'Assets/uploadedImage/img-65d8691510d8f1.58003295CPu4.jpg', 50, 'Ryzen 7 AMD 7700', 'Nvidia  GFX 2080 4GB DDR6', '8GB', '512GB', 72999, 69999);

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `product_id` int(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `processer` varchar(255) NOT NULL,
  `graphics_card` varchar(255) NOT NULL,
  `front_camera` varchar(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `rom` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `discount_price` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`product_id`, `category_id`, `brand_name`, `product_name`, `image`, `quantity`, `processer`, `graphics_card`, `front_camera`, `battery`, `display`, `ram`, `rom`, `price`, `discount_price`) VALUES
(3, 2, 'Asus', 'Asus ROG Strix G16', 'Assets/uploadedImage/img-65d86999d29595.54412093laptop_Asus_Rog_strix_g16.jpg', 100, 'Intel 14th 14905HX', 'Nvidia GeForce RTX 4080 8GB LPDDR6', '32MP', '5 Cell Lithum', '38.99 CM HDR+ OLED Display', '16GB', '1TB', 90000, 86999),
(4, 2, 'HP', 'HP Victus 5', 'Assets/uploadedImage/img-65d869fba35fc1.80490840laptop_hp_victus.jpg', 100, 'Ryzen 5 AMD 5500', 'Nvidia  GFX 2080 4GB DDR6', '16MP', '3 Cell', '16 Inch HDR+  Display', '8GB', '512GB', 58999, 48999),
(5, 2, 'Realme', 'Realme Book 1', 'Assets/uploadedImage/img-65d86a83ceb2d4.94379991laptop_realmeBook.jpg', 148, 'Intel i5 13th 13597H', 'Intel iris XE', '16MP', '4 Cell', '15.99 CM Full HD+', '8GB', '512GB', 45999, 41599),
(6, 2, 'Samsung', 'Samsung Galaxy Book 3', 'Assets/uploadedImage/img-65d86ac88a5478.67664214laptop_samsun_galaxybook.jpg', 0, 'Intel i7 13th 13797H', 'Nvidia GeForce RTX 3080 6GB DDR6', '32MP', '5 Cell Lithum', '38.99 CM HDR+ OLED Display', '16GB', '1TB', 80000, 76999);

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE `mobile` (
  `product_id` int(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `processer` varchar(255) NOT NULL,
  `back_camera` varchar(255) NOT NULL,
  `front_camera` varchar(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `rom` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `discount_price` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`product_id`, `category_id`, `brand_name`, `product_name`, `image`, `quantity`, `processer`, `back_camera`, `front_camera`, `battery`, `display`, `ram`, `rom`, `price`, `discount_price`) VALUES
(6, 1, 'Google', 'Google Pixel 7A', 'Assets/uploadedImage/img-65d8609c2b5986.66802108mobile_google_pixel_7a.jpg', 99, 'Google Terson T3 Chip', '64MP + 16MP + 16MP', '32MP', '4500MAH', '6.7 inch HDR+ AMLOAD Display', '8GB', '256GB', 79999, 76999),
(7, 1, 'Apple', 'Iphone 15 Pro', 'Assets/uploadedImage/img-65d861ae74fd58.49610905mobile_iphone15.jpg', 147, 'Apple A17 Chip', '48MP + 12MP', '16MP', '4000MAH', '6.0 inch XHR Display', '6GB', '128GB', 72999, 69599),
(8, 1, 'Oppo', 'Oppo Reno 11 5G', 'Assets/uploadedImage/img-65d862694dfaa9.78854695mobile_OPPO_Reno_11_5g.jpg', 195, 'Snapdragon 8 Gen 3', '50MP + 64MP + 16MP', '32MP', '5200MAH', '6.7 Inch 120HZ OLED HDR+ Display', '16GB', '256GB', 48999, 44999),
(9, 1, 'Realme', 'Realme 11X', 'Assets/uploadedImage/img-65d8663f53c391.07030248mobile_realme11X.jpg', 75, 'Snapdragon 7 Gen 1', '64MP + 16MP', '16MP', '5000MAH', '6.7 Inch 90HZ AMLOAD Display', '6GB', '64GB', 17999, 15499);

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `product_id` int(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `processer` varchar(255) NOT NULL,
  `back_camera` varchar(255) NOT NULL,
  `front_camera` varchar(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `rom` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `discount_price` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`product_id`, `category_id`, `brand_name`, `product_name`, `image`, `quantity`, `processer`, `back_camera`, `front_camera`, `battery`, `display`, `ram`, `rom`, `price`, `discount_price`) VALUES
(45, 19, 'Realme', 'Realme 12 Pro', 'Assets/uploadedImage/img-65d4fb14656178.93115958mobile_realme12.jpg', 100, 'Snapdragon 8 gen 3', '200MP + 64MP', '32MP', '5500MAH', '6.7 inch Amload Display', '16GB', '128GB', 50000, 46999),
(33, 19, 'Realme', 'Realme 11x', 'Assets/uploadedImage/img-6593086ba634d2.82184354realme 11.jpg', 700, 'Midiatech 6200 ultra', '64MP + 8MP', '16MP', '5000MAH', '6.7 inch HDR 10Bit Display', '6GB', '128GB', 11000, 10599),
(32, 19, 'Samsung', 'Samsung Galaxy s23', 'Assets/uploadedImage/img-659307ffbac735.02407486galaxy s23 ultra.jpg', 26, 'Snapdragon 8 gen 3 ultra', '64MP + 64MP + 32MP', '32MP', '5000MAH', '10Bit HDR Amload', '16GB', '256GB', 80000, 76999),
(31, 19, 'Vivo ', 'Vivo v29e', 'Assets/uploadedImage/img-6593078f368483.46894005vivo.jpg', 721, 'Midiatech 8200 ultra', '64MP + 64MP', '16MP', '4500MAH', '10Bit HDR', '8GB', '128GB', 25999, 23999),
(46, 19, 'Realme', 'Realme 11x Pro', 'Assets/uploadedImage/img-65d4fbb0a2a506.20934484mobile_realme11X.jpg', 100, 'Snapdragon 6 gen 1', '64MP + 8MP', '18MP', '5000MAH', '6.7 inch LCD', '6GB', '128GB', 19999, 17999);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `tableName` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `userid`, `product_id`, `tableName`, `quantity`, `price`, `orderDateTime`, `status`, `payment_method`) VALUES
(1, 1, 7, 'mobile', 3, 69599, '2024-02-23 10:39:04', 'Confirm', 'Credit Card-4'),
(2, 1, 5, 'laptop', 2, 41599, '2024-02-23 16:09:45', 'Confirm', 'COD'),
(2, 1, 8, 'mobile', 4, 44999, '2024-02-23 16:09:45', 'Confirm', 'COD'),
(2, 1, 3, 'cpu', 2, 190999, '2024-02-23 16:09:45', 'Confirm', 'COD'),
(3, 1, 3, 'accessories', 1, 1299, '2024-02-23 16:11:14', 'Cancelled', 'Credit Card-5'),
(4, 1, 4, 'accessories', 5, 189, '2024-02-23 10:41:59', 'Confirm', 'COD'),
(5, 1, 6, 'mobile', 1, 76999, '2024-02-24 08:58:14', 'Confirm', 'COD'),
(6, 1, 4, 'accessories', 5, 189, '2024-02-24 09:27:22', 'Cancelled', 'COD'),
(7, 1, 6, 'laptop', 3, 76999, '2024-03-21 21:53:26', 'Confirm', 'Credit Card-6'),
(7, 1, 8, 'mobile', 1, 44999, '2024-03-21 21:53:26', 'Cancelled', 'Credit Card-6');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_id` int(225) NOT NULL,
  `product_id` int(255) NOT NULL,
  `tableName` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_id`, `product_id`, `tableName`, `Quantity`, `price`, `status`) VALUES
(1, 7, 'mobile', 3, 69599, 'Confirm'),
(2, 5, 'laptop', 2, 41599, 'Confirm'),
(2, 8, 'mobile', 4, 44999, 'Confirm'),
(2, 3, 'cpu', 2, 190999, 'Confirm'),
(3, 3, 'accessories', 1, 1299, 'Cancelled'),
(4, 4, 'accessories', 5, 189, 'Confirm'),
(5, 6, 'mobile', 1, 76999, 'Confirm'),
(6, 4, 'accessories', 5, 189, 'Cancelled'),
(7, 6, 'laptop', 3, 76999, 'Confirm'),
(7, 8, 'mobile', 1, 44999, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `order_id` int(225) NOT NULL,
  `user_id` int(255) NOT NULL,
  `order_Date_Time` date NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`order_id`, `user_id`, `order_Date_Time`, `payment_method`, `payment_id`) VALUES
(1, 1, '2024-02-23', 'Credit Card', 1),
(2, 1, '2024-02-23', 'COD', 0),
(3, 1, '2024-02-23', 'Credit Card', 5),
(4, 1, '2024-02-23', 'COD', 6),
(5, 1, '2024-02-24', 'COD', 7),
(6, 1, '2024-02-24', 'COD', 8),
(7, 1, '2024-03-21', 'Credit Card', 6);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` bigint(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `name`, `mobile_no`, `email_id`, `address`, `city`, `pin_code`, `password`) VALUES
(1, 'Jay', 9988776654, 'jay@gmail.com', 'Surya nagar ', 'Deesa', 385535, 'A1!#z2!#');

-- --------------------------------------------------------

--
-- Table structure for table `wirelessaccessories`
--

CREATE TABLE `wirelessaccessories` (
  `product_id` int(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `playback` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `discount_price` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wirelessaccessories`
--

INSERT INTO `wirelessaccessories` (`product_id`, `category_id`, `brand_name`, `product_name`, `product_type`, `image`, `quantity`, `battery`, `playback`, `price`, `discount_price`) VALUES
(3, 3, 'Apple', 'Apple Airpods 2', 'Earbuds', 'Assets/uploadedImage/img-65d86b3ddbef90.82152977wireless_apple_airpods.jpg', 75, '600MAH', '30 Hours', 19999, 16999),
(4, 3, 'Realme', 'Realme Tech', 'Earbuds', 'Assets/uploadedImage/img-65d86b894f2a31.58122353wireless_realme_tech.jpg', 50, '450 MAH', '40 Hours', 2500, 2199),
(5, 3, 'Oneplus', 'Oneplus Oman O1', 'Neckband', 'Assets/uploadedImage/img-65d870eade2cb9.78747586wireless_oneplus_nechBand.jpg', 100, '500MAH', '20 Hours', 1299, 999),
(6, 3, 'Boat', 'Boat Neckband 1', 'Neckband', 'Assets/uploadedImage/img-65d87136074d55.57352893wireless_boat_nechBand.jpg', 50, '400MAH', '12 Hour', 1100, 999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_info` (`category_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories_info`
--
ALTER TABLE `categories_info`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_info` (`category_id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_info` (`category_id`);

--
-- Indexes for table `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_info` (`category_id`);

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `caregory_id` (`category_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wirelessaccessories`
--
ALTER TABLE `wirelessaccessories`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_info` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories_info`
--
ALTER TABLE `categories_info`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mobile`
--
ALTER TABLE `mobile`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `wirelessaccessories`
--
ALTER TABLE `wirelessaccessories`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
