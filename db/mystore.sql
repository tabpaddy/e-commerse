-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 01:21 AM
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
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `username`, `user_email`, `user_password`, `user_image`) VALUES
(1, 'mimi', 'mimi@gmail.com', '$2y$10$mmIaCafNEAKHhFfGYiaxauH1MlPX2.OgjvWYh7ECjcfTqhHO/R9XC', '6050605246792710599_121.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'samsung'),
(2, 'boAt'),
(3, 'nikon'),
(4, 'sony'),
(5, 'SJCAM'),
(6, 'Osaka'),
(7, 'Asus'),
(8, 'Lenova'),
(9, 'Hp'),
(10, 'realme'),
(11, 'acer'),
(12, 'Lg'),
(13, 'oneplus'),
(14, 'panasonic'),
(15, 'Nova'),
(16, 'stone'),
(17, 'haier'),
(18, 'rockers'),
(19, 'philips');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(17, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'mobile'),
(2, 'Tv'),
(3, 'camera'),
(4, 'airpodes'),
(5, 'speaker'),
(6, 'Trimmers'),
(7, 'refrigerator'),
(8, 'mouse');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 2, 1469256757, 15, 1, 'pending'),
(2, 2, 560896906, 2, 3, 'pending'),
(9, 2, 1350936122, 11, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'SAMSUNG Galaxy A23', 'SAMSUNG Galaxy A23 (Peach, 128 GB) (8 GB RAM)', 'samsung, samsung galaxy, 5G, 128GB, 8GB ', 1, 1, 'SAMSUNG Galaxy A23 (Peach, 128 GB) (8 GB RAM) 1.webp', 'SAMSUNG Galaxy A23 (Peach, 128 GB) (8 GB RAM) 2.webp', 'SAMSUNG Galaxy A23 (Peach, 128 GB) (8 GB RAM) 3.webp', 500000, '2024-05-02 05:15:33', 'true'),
(2, 'SAMSUNG Galaxy Z Flip3', 'SAMSUNG Galaxy Z Flip3 5G (Cream, 128 GB) (8 GB RAM)', 'samsung, samsung galaxy, 5G, 128GB, 8GB RAM', 1, 1, 'SAMSUNG Galaxy Z Flip3 5G (Cream, 128 GB) (8 GB RAM) 1.webp', 'SAMSUNG Galaxy Z Flip3 5G (Cream, 128 GB) (8 GB RAM) 2.webp', 'SAMSUNG Galaxy Z Flip3 5G (Cream, 128 GB) (8 GB RAM) 3.webp', 1000000, '2024-05-02 05:15:56', 'true'),
(3, 'boAt Airdopes 111 ', 'boAt Airdopes 111 ', 'baAt, Airdopes', 4, 2, 'boAt Airdopes 111 1.webp', 'boAt Airdopes 111 2.webp', 'boAt Airdopes 111 3.webp', 19000, '2024-05-02 05:16:18', 'true'),
(4, 'boAt Airdopes 511 V2 ', 'boAt Airdopes 511 V2 ', 'boAt, Airdopes, V2 ', 4, 2, 'boAt Airdopes 511 V2 1.webp', 'boAt Airdopes 511 V2 2.webp', 'boAt Airdopes 511 V2 3.webp', 23000, '2024-05-02 05:16:37', 'true'),
(5, 'acer I Series 127 cm (50 inch) ', 'acer I Series 127 cm (50 inch) Ultra HD (4K) LED Smart Android TV with Android 11, 30W Dolby Audio, MEMC (2022 Model) (AR50AR2851UDFL) ', 'acer, smart, tv, andriod', 2, 11, 'acer I Series 127 cm (50 inch) Ultra HD (4K) LED Smart Android TV with Android 11, 30W Dolby Audio, MEMC (2022 Model) (AR50AR2851UDFL) 1.webp', 'acer I Series 127 cm (50 inch) Ultra HD (4K) LED Smart Android TV with Android 11, 30W Dolby Audio, MEMC (2022 Model) (AR50AR2851UDFL) 2.webp', 'acer I Series 127 cm (50 inch) Ultra HD (4K) LED Smart Android TV with Android 11, 30W Dolby Audio, MEMC (2022 Model) (AR50AR2851UDFL) 4.webp', 700000, '2024-05-12 20:04:54', 'true'),
(6, 'LG 164 cm (65 inch) OLED Ultra HD (4K) Smart TV ', 'LG 164 cm (65 inch) OLED Ultra HD (4K) Smart TV ', 'LG, smart, TV, oled', 2, 12, 'LG 164 cm (65 inch) OLED Ultra HD (4K) Smart TV 1.webp', 'LG 164 cm (65 inch) OLED Ultra HD (4K) Smart TV 2.webp', 'LG 164 cm (65 inch) OLED Ultra HD (4K) Smart TV 3.webp', 750000, '2024-05-02 05:17:55', 'true'),
(7, 'OnePlus Y1 100 cm (40 inch) ', 'OnePlus Y1 100 cm (40 inch) Full HD LED Smart Android TV with Dolby Audio (40FA1A00) ', 'onePlus, smart, android, tv', 2, 13, 'OnePlus Y1 100 cm (40 inch) Full HD LED Smart Android TV with Dolby Audio (40FA1A00) 1.webp', 'OnePlus Y1 100 cm (40 inch) Full HD LED Smart Android TV with Dolby Audio (40FA1A00) 2.webp', 'OnePlus Y1 100 cm (40 inch) Full HD LED Smart Android TV with Dolby Audio (40FA1A00) 4.webp', 800000, '2024-05-02 05:17:55', 'true'),
(8, 'SAMSUNG 108 cm (43 inch)', 'SAMSUNG 108 cm (43 inch) Ultra HD (4K) LED Smart Tizen TV (UA43TU8570UXXL) ', 'samsung, smart, tv, HD', 2, 1, 'SAMSUNG 108 cm (43 inch) Ultra HD (4K) LED Smart Tizen TV (UA43TU8570UXXL) 3.webp', 'SAMSUNG 108 cm (43 inch) Ultra HD (4K) LED Smart Tizen TV (UA43TU8570UXXL) 2.webp', 'SAMSUNG 108 cm (43 inch) Ultra HD (4K) LED Smart Tizen TV (UA43TU8570UXXL) 4.webp', 850000, '2024-05-02 05:17:55', 'true'),
(9, 'PHILIPS MG3710-65', 'PHILIPS MG3710-65 Trimmer 60 min Runtime 8 Length Settings (Black) ', 'philips, trimmer', 6, 19, 'PHILIPS MG3710-65 Trimmer 60 min Runtime 8 Length Settings (Black) 1.webp', 'PHILIPS MG3710-65 Trimmer 60 min Runtime 8 Length Settings (Black) 3.webp', 'PHILIPS MG3710-65 Trimmer 60 min Runtime 8 Length Settings (Black) 4.webp', 45000, '2024-05-02 05:17:55', 'true'),
(10, 'NOVA NHT 1058', 'NOVA NHT 1058 Waterproof Trimmer 200 min Runtime 40 Length Settings (Grey) 1', 'nova, trimmer, waterproof', 6, 15, 'NOVA NHT 1058 Waterproof Trimmer 200 min Runtime 40 Length Settings (Grey) 1.webp', 'NOVA NHT 1058 Waterproof Trimmer 200 min Runtime 40 Length Settings (Grey) 2.webp', 'NOVA NHT 1058 Waterproof Trimmer 200 min Runtime 40 Length Settings (Grey) 3.webp', 75000, '2024-05-02 05:20:52', 'true'),
(11, 'SAMSUNG Galaxy F23 ', 'SAMSUNG Galaxy F23 5G (Aqua Blue, 128 GB) (6 GB RAM)  ', 'samsung, f23, 5G', 1, 1, 'SAMSUNG Galaxy F23 5G (Aqua Blue, 128 GB) (6 GB RAM) 1.webp', 'SAMSUNG Galaxy F23 5G (Aqua Blue, 128 GB) (6 GB RAM) 2.webp', 'SAMSUNG Galaxy F23 5G (Aqua Blue, 128 GB) (6 GB RAM) 4.webp', 990000, '2024-05-12 19:42:24', 'true'),
(12, 'Haier 195 L ', 'Haier 195 L Direct Cool Single Door 4 Star Refrigerator (Prism Glass, HRD-1954CPG-E) ', 'Haier, refrigerator', 7, 17, 'Haier 195 L Direct Cool Single Door 4 Star Refrigerator (Prism Glass, HRD-1954CPG-E) 1.webp', 'Haier 195 L Direct Cool Single Door 4 Star Refrigerator (Prism Glass, HRD-1954CPG-E) 2.webp', 'Haier 195 L Direct Cool Single Door 4 Star Refrigerator (Prism Glass, HRD-1954CPG-E) 3.webp', 300000, '2024-05-02 05:20:52', 'true'),
(13, 'Stone 350 ', 'Stone 350 is a music box player', 'stone, speaker', 5, 16, 'Stone 350 1.webp', 'Stone 350 2.webp', 'Stone 350 3.webp', 15000, '2024-05-02 05:20:52', 'true'),
(14, 'boAt Stone 190 ', 'boAt Stone 190 is a music box player', 'boAt, speakers', 5, 2, 'boAt Stone 190 1.webp', 'boAt Stone 190 2.webp', 'boAt Stone 190 3.webp', 16000, '2024-05-02 05:20:52', 'true'),
(15, 'Nikon D780 ', 'Nikon D780 DSLR Body with 24-120mm VR Lens, 3X Optical Zoom, Black 1', 'nikon, camera', 3, 3, 'Nikon D780 DSLR Body with 24-120mm VR Lens, 3X Optical Zoom, Black 1.jpg', 'Nikon D780 DSLR Body with 24-120mm VR Lens, 3X Optical Zoom, Black 2.jpg', 'Nikon D780 DSLR Body with 24-120mm VR Lens, 3X Optical Zoom, Black 3.jpg', 300000, '2024-05-02 05:20:52', 'true'),
(17, 'SJCAM SJ4000 ', 'SJCAM SJ4000 WiFi 12MP Optical Full HD WiFi Sports Action Camera 170°Wide FOV 30M Waterproof DV Camcorder, Gold ', 'SJCAM, camera, waterproof, HD', 3, 5, 'SJCAM SJ4000 WiFi 12MP Optical Full HD WiFi Sports Action Camera 170°Wide FOV 30M Waterproof DV Camcorder, Gold 1.jpg', 'SJCAM SJ4000 WiFi 12MP Optical Full HD WiFi Sports Action Camera 170°Wide FOV 30M Waterproof DV Camcorder, Gold 4.jpg', 'SJCAM SJ4000 WiFi 12MP Optical Full HD WiFi Sports Action Camera 170°Wide FOV 30M Waterproof DV Camcorder, Gold 3.jpg', 150000, '2024-05-02 05:20:52', 'true'),
(18, 'Osaka OS 550 Tripod ', 'Osaka OS 550 Tripod 55 Inches (140 cm) with Mobile Holder and Carry Case for Smartphone & DSLR Camera Portable Lightweight Aluminium Tripod ', 'Osaka, camera, tripod, ', 3, 6, 'Osaka OS 550 Tripod 55 Inches (140 cm) with Mobile Holder and Carry Case for Smartphone & DSLR Camera Portable Lightweight Aluminium Tripod 3.jpg', 'Osaka OS 550 Tripod 55 Inches (140 cm) with Mobile Holder and Carry Case for Smartphone & DSLR Camera Portable Lightweight Aluminium Tripod 4.jpg', 'Osaka OS 550 Tripod 55 Inches (140 cm) with Mobile Holder and Carry Case for Smartphone & DSLR Camera Portable Lightweight Aluminium Tripod 1.jpg', 90000, '2024-05-02 05:20:52', 'true'),
(19, 'ASUS Marshmallow', 'ASUS Marshmallow - Silent, Adj. DPI, Multi-Mode, With Solar Cover Wireless Optical Mouse (2.4GHz Wireless, Bluetooth, Quiet Blue) ', 'ASUS, mouse', 8, 7, 'ASUS Marshmallow - Silent, Adj. DPI, Multi-Mode, With Solar Cover Wireless Optical Mouse (2.4GHz Wireless, Bluetooth, Quiet Blue) 1.webp', 'ASUS Marshmallow - Silent, Adj. DPI, Multi-Mode, With Solar Cover Wireless Optical Mouse (2.4GHz Wireless, Bluetooth, Quiet Blue) 2.webp', 'ASUS Marshmallow - Silent, Adj. DPI, Multi-Mode, With Solar Cover Wireless Optical Mouse (2.4GHz Wireless, Bluetooth, Quiet Blue) 3.webp', 50000, '2024-05-02 05:20:52', 'true'),
(20, 'HP 250 Wireless Optical Mouse', 'HP 250 Wireless Optical Mouse (2.4GHz Wireless, Black) ', 'HP, mouse', 8, 9, 'HP 250 Wireless Optical Mouse (2.4GHz Wireless, Black) 2.webp', 'HP 250 Wireless Optical Mouse (2.4GHz Wireless, Black) 3.webp', 'HP 250 Wireless Optical Mouse (2.4GHz Wireless, Black) 4.webp', 30000, '2024-05-02 05:14:04', 'true'),
(21, 'Lenovo 130 Wireless Optical Mouse', 'Lenovo 130 Wireless Optical Mouse (2.4GHz Wireless, Black)', 'Lenovo, mouse', 8, 8, 'Lenovo 130 Wireless Optical Mouse (2.4GHz Wireless, Black) 1.webp', 'Lenovo 130 Wireless Optical Mouse (2.4GHz Wireless, Black) 2.webp', 'Lenovo 130 Wireless Optical Mouse (2.4GHz Wireless, Black) 4.webp', 20000, '2024-05-02 05:13:39', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 2, 1300000, 1469256757, 2, '2024-05-10 07:25:09', 'Complete'),
(2, 2, 3000000, 560896906, 1, '2024-05-10 06:36:01', 'Complete'),
(6, 2, 990000, 1350936122, 1, '2024-05-14 19:56:33', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(100) NOT NULL,
  `invoice_number` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 2, 560896906, 3000000, 'paypal', '2024-05-10 06:39:37'),
(2, 1, 1469256757, 1300000, 'cash on delivery', '2024-05-10 07:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'praise', 'praise@gmail.com', '$2y$10$NASizP0WgJNQzeOJ6XuDw.TM1bCo0R8Mt294QDsD6g7hAqQQh0bum', '5837058918784809594_120.jpg', '::1', 'asaba', '09066605427');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
