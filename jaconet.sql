-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 05:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaconet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fullname`) VALUES
(1, 'jibach', '1234', 'jibach'),
(2, 'gauravsinghigc', 'gauravsinghigc', 'gauravsinghigc');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attribute_id` int(20) NOT NULL,
  `attribute_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attribute_id`, `attribute_name`) VALUES
(28, 'Weigth :'),
(29, 'Gender :'),
(30, 'Type :'),
(31, 'Carat :');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(5) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(8, 'Mataswari Jwellery');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `product_id` int(200) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `ip_address`, `product_id`, `customer_id`, `date_time`, `quantity`, `total_price`) VALUES
(3, '::1', 3, 13, '2018-12-22 08:02 am', 1, 127),
(4, '::1', 4, 13, '2018-12-22 06:31 am', 1, 235),
(7, '::1', 9, 13, '', 1, 0),
(8, '::1', 11, 13, '', 1, 0),
(9, '::1', 6, 14, '', 1, 0),
(10, '::1', 3, 14, '', 2, 0),
(11, '::1', 12, 0, '2019-06-18 21:07 pm', 2, 0),
(13, '::1', 13, 0, '2019-06-18 21:31 pm', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(33, 'Bangles'),
(34, 'Gold Coins'),
(35, 'Ear Rings'),
(36, 'Finger Ring'),
(37, 'Gold Bracelets'),
(38, 'Gold Chains'),
(39, 'Gold Neck Wear'),
(40, 'Gold Pendent Set'),
(41, 'Nose Pins'),
(42, 'Mangalsutras'),
(43, 'Pendent');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `collection_id` int(10) NOT NULL,
  `collection_title` varchar(30) NOT NULL,
  `collection_desc` varchar(300) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_id` int(5) NOT NULL,
  `brand_id` int(4) NOT NULL,
  `collection_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collection_id`, `collection_title`, `collection_desc`, `cat_id`, `sub_cat_id`, `brand_id`, `collection_img`) VALUES
(31, 'bgfgb', 'gfbvfgxb fx', 26, 23, 3, '2018-02-16-19-46-12-829.jpg'),
(33, 'nghnggn  fgxn bf  fb  dbc dzfv', 'ncjskdb bnvhcsD cbn hcv bhdschgk chsbcvyskvcb cgjsvch scbhsjcv shcjv jhgc\r\nncjsdbchj nbhjv nbsc vy\r\nbchjvshcv bn cgh cbn\r\n hsvchj sbn c hg\r\nn svdhcgvsh cbnyu', 30, 25, 1, '2018-02-16-19-46-12-829.jpg'),
(35, 'CDGSHJBH', 'jhbhjbhh bhb hjhh hghvghvghv hvghvb ghv hg hbgh', 29, 23, 3, '2018-02-16-19-48-31-275.jpg'),
(36, 'dfsafsa', 'sdfsafasdfcsac dfvd cdsfv vfgcx v b trfb vrtcv', 29, 24, 1, 'banner03.jpg'),
(37, 'gfbgfnbfgnb', 'ghbfgnbfg', 29, 23, 3, 'banner12.jpg'),
(38, 'gfnbfgbhd', 'fgbxdhbd xdf vrtshbfg ', 30, 24, 6, 'jocnet-trades-admin-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `cust_first_name` varchar(100) NOT NULL,
  `cust_last_name` varchar(100) NOT NULL,
  `cust_nickname` varchar(20) NOT NULL,
  `cust_email_id` varchar(60) NOT NULL,
  `cust_mobile` varchar(12) NOT NULL,
  `cust_img` varchar(200) NOT NULL,
  `cust_product_id` int(10) NOT NULL,
  `cust_cart_id` int(10) NOT NULL,
  `cust_username` varchar(20) NOT NULL,
  `cust_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `cust_first_name`, `cust_last_name`, `cust_nickname`, `cust_email_id`, `cust_mobile`, `cust_img`, `cust_product_id`, `cust_cart_id`, `cust_username`, `cust_password`) VALUES
(13, 'Gaurav', 'Singh', 'johnyaroraji', 'gauravsinghigc@gmail.com', '08447572565', 'download.jpg', 0, 0, 'gauravsinghigc', 'igc@9810'),
(14, 'onezoefirst', 'aid', '', 'jbcskjsbjcs@gmail.com', '8447572565', 'cropped-02.jpeg', 0, 0, 'onezofirstaid', 'onezoefirst');

-- --------------------------------------------------------

--
-- Table structure for table `customization_product`
--

CREATE TABLE `customization_product` (
  `customization_id` int(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `customization` varchar(255) NOT NULL,
  `customization_type` varchar(255) NOT NULL,
  `customized_fee` int(255) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customization_product`
--

INSERT INTO `customization_product` (`customization_id`, `ip_address`, `customer_id`, `product_id`, `customization`, `customization_type`, `customized_fee`, `img_url`) VALUES
(38, '::1', 13, 3, 'Neck customizations', 'Default', 0, 'admin/img/customised_img/As Shown.jpg'),
(39, '::1', 13, 3, 'Sleeve Customizations', 'Bracelet Length', 67, 'admin/img/customised_img/Bracelet length.jpg'),
(40, '::1', 13, 3, 'Length Customizations', 'Knee Length', 60, 'admin/img/customised_img/Knee length.jpg'),
(41, '::1', 13, 4, 'Neck customizations', 'Deep V', 50, 'admin/img/customised_img/Deep V.jpg'),
(42, '::1', 13, 4, 'Sleeve Customizations', 'Extra Long Length', 110, 'admin/img/customised_img/Extra long length.jpg'),
(43, '::1', 13, 4, 'Length Customizations', 'Mid-calf Length', 75, 'admin/img/customised_img/Mid-calf length.jpg'),
(44, '::1', 13, 9, 'Sleeve Customizations', 'Sleeveless', 40, 'admin/img/customised_img/Sleeveless.jpg'),
(45, '::1', 13, 9, 'Length Customizations', 'Mid-calf Length', 75, 'admin/img/customised_img/Mid-calf length.jpg'),
(46, '::1', 14, 3, 'Neck customizations', 'Split Scoop', 65, 'admin/img/customised_img/Split Scoop.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cust_addresses`
--

CREATE TABLE `cust_addresses` (
  `address_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `cust_address` varchar(200) NOT NULL,
  `cust_pincode` int(6) NOT NULL,
  `cust_city` varchar(20) NOT NULL,
  `cust_state` varchar(15) NOT NULL,
  `cust_country` varchar(20) NOT NULL,
  `cust_nearby` varchar(60) NOT NULL,
  `cust_delivery_contact` varchar(30) NOT NULL,
  `cust_delivery_contact_no` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_addresses`
--

INSERT INTO `cust_addresses` (`address_id`, `customer_id`, `cust_address`, `cust_pincode`, `cust_city`, `cust_state`, `cust_country`, `cust_nearby`, `cust_delivery_contact`, `cust_delivery_contact_no`) VALUES
(10, 13, 'House no: 3814-ff, Sector-3', 121004, 'Faridabad', 'Haryana', 'India', 'Near Bypass', 'Saurav Singh', '9654259953'),
(12, 13, 'Plot no: 8, Sector-5, Gurgaon Gaon', 122001, 'Gurugram', 'Haryana', 'India', 'Near Gyan Deep School', 'Umesh Bansal', '09810895713'),
(14, 13, 'House no: 35/5, Gali no: 4', 110011, 'Delhi', 'Delhi', 'India', 'Badarpur Metro Station', 'Gaurav Singh', '9654259953'),
(15, 14, 'shop 190', 121006, 'faridabad', 'haryana', 'india', 'huda market', 'gaurav', '8447572565');

-- --------------------------------------------------------

--
-- Table structure for table `cust_orders`
--

CREATE TABLE `cust_orders` (
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_desc` varchar(2000) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `pro_img1` varchar(200) NOT NULL,
  `product_price` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_desc`, `cat_id`, `sub_cat_id`, `brand_id`, `pro_img1`, `product_price`) VALUES
(12, '22K Bangels', ' 22k Pure Bangles for womens.   ', 33, 29, 8, '51AC71VAC2AP1_2.webp', 24500),
(13, '22K Bangels', '    22k Pure Bangles for womens.	', 33, 30, 8, '500452VHABA12_2.webp', 25690),
(14, '22K Bangels', '    22k Pure Bangles for womens.	', 33, 29, 8, '500452VOA1A11_2.webp', 45678),
(15, '22K Bangels', '    22k Pure Bangles for womens.	', 33, 29, 8, '500481VBABA31_2.webp', 324234),
(16, '22k Earrings ', '    22k gold earrings.\r\nlightweighted, stylist, fasionable and use in dail waer', 35, 29, 8, '510991DXAAAAP1_2.webp', 12432),
(17, '22k Gold Neck Wear', '    22k gold occasionally neck wear', 39, 29, 8, '512P152CFABA00_1.webp', 45466),
(18, '22k Finger Ring', '    22k daily wear finger ring', 36, 29, 8, '512Y14FCLAAP3_2.webp', 243453),
(19, '22k Finger Ring', '        22k finger ring with stone for occasional wear', 36, 31, 8, '512314FORAAP4_2.jpg', 24355),
(20, '22k Ear Rings', '    22k Earings for normal wear', 35, 29, 8, '510991DYAAAAP1_2.webp', 23424);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `pro_att_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `attribute_id` int(10) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`pro_att_id`, `product_id`, `attribute_id`, `value`) VALUES
(11, 3, 1, 'JT-001Plazo'),
(12, 3, 2, '180'),
(13, 3, 3, '3'),
(14, 3, 4, '5'),
(15, 3, 5, '3'),
(16, 3, 0, '185'),
(17, 3, 6, '180'),
(18, 3, 7, '3'),
(19, 3, 8, '5'),
(20, 3, 9, '3'),
(21, 3, 10, 'dark Brown'),
(22, 3, 11, '20'),
(23, 3, 12, '2 Days'),
(24, 3, 13, '1200'),
(25, 3, 14, '3 months'),
(26, 3, 15, 'Mesh'),
(27, 3, 16, 'plazo'),
(28, 3, 17, 'Material: Mesh'),
(29, 3, 18, 'Colour: Grey Firozi'),
(30, 3, 19, 'LifeStyle: Sports'),
(32, 3, 21, 'Specially designed for Womens'),
(33, 3, 22, '0'),
(34, 3, 23, '7'),
(35, 3, 24, '0'),
(36, 3, 25, '0'),
(37, 4, 10, 'red'),
(38, 4, 1, '286312876347826'),
(39, 12, 28, '15gm'),
(40, 12, 29, 'female'),
(41, 12, 30, 'normal wear and daily ear'),
(42, 16, 28, '5.6gm');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `title`) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large'),
(4, 'Extra Large');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) NOT NULL,
  `slider_title` varchar(50) NOT NULL,
  `slider_desc` varchar(200) NOT NULL,
  `slider_img` varchar(300) NOT NULL,
  `slider_off` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_title`, `slider_desc`, `slider_img`, `slider_off`) VALUES
(39, 'fdvdfvdf', 'dfv  dfv dv  dsfvcdsv  fd gf fc ', 'download (7).jpg', 'fvdsfvcdx'),
(40, 'vc c dfvd rvc sd cc', 'c xcd vfd dfsxvfdv ', 'download (4).jpg', 'dsxc sd sdsdc  sdc'),
(42, 'fdv thyt ytnubyt', 'bnbnnbtyn ghn', 'images (2).jpg', 'ythntynj ytnty'),
(43, 'gbhtrsfhe 5hybd fgs', 'gbvfgb gb frs rtgbrstfbv', 'download.jpg', 'rtgrt tgbvrstb '),
(44, 'gb fsbgfb fdsbvsfdbvs', 'gbvfgb gb frs rtgbrstfbv', 'images.jpg', 'bvrtgvbrgvrtgvvb rtbvtvbr'),
(45, 'vervegrv ervervcervc', 'revwrferwfcewcfw', 'images (1).jpg', 'efvercfer ervcaervc'),
(46, 'erfcerqf ewrvcewrvc', 'rewfcewrfcewfcfd', 'download (6).jpg', 'refverwvf revcewrvcwe ervcwerqc');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(5) NOT NULL,
  `sub_cat_title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `sub_cat_title`) VALUES
(29, 'Plan Gold'),
(30, 'Gold and Polky'),
(31, 'Gold and Stone');

-- --------------------------------------------------------

--
-- Table structure for table `temp_sizes`
--

CREATE TABLE `temp_sizes` (
  `temp_sizes_id` int(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `sizes_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_sizes`
--

INSERT INTO `temp_sizes` (`temp_sizes_id`, `product_id`, `ip_address`, `customer_id`, `sizes_id`) VALUES
(5, '3', '::1', '', '2'),
(6, '4', '::1', '', '1'),
(7, '9', '::1', '', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customization_product`
--
ALTER TABLE `customization_product`
  ADD PRIMARY KEY (`customization_id`);

--
-- Indexes for table `cust_addresses`
--
ALTER TABLE `cust_addresses`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `cust_orders`
--
ALTER TABLE `cust_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`pro_att_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `temp_sizes`
--
ALTER TABLE `temp_sizes`
  ADD PRIMARY KEY (`temp_sizes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attribute_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collection_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customization_product`
--
ALTER TABLE `customization_product`
  MODIFY `customization_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `cust_addresses`
--
ALTER TABLE `cust_addresses`
  MODIFY `address_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cust_orders`
--
ALTER TABLE `cust_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `pro_att_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `temp_sizes`
--
ALTER TABLE `temp_sizes`
  MODIFY `temp_sizes_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
