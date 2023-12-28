-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 01:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdev_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`) VALUES
(1234, '$2y$10$vdCpZaUBafv.3f43SYZoxOaFgX8eZELMuHIrtAhADKPPJIWHFE/62');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `respond` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_us_id`, `first_name`, `last_name`, `email`, `note`, `country`, `respond`) VALUES
(1, 'cs', 'ss', 'lingchiisung@gmail.com', 'asdf', 'Malaysia', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventTitle` varchar(255) NOT NULL,
  `eventDescription` varchar(255) NOT NULL,
  `eventImg` varchar(255) NOT NULL,
  `eventTime` datetime NOT NULL,
  `eventId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventTitle`, `eventDescription`, `eventImg`, `eventTime`, `eventId`) VALUES
('WWDC', 'Introducing the new 15‑inch MacBook Air with M2, Mac Studio with M2 Max and M2 Ultra, Mac Pro with M2 Ultra, and previews of iOS 17, iPadOS 17, macOS Sonoma and watchOS 10.\r\n\r\n', 'https://www.lowyat.net/wp-content/uploads/2023/10/apple-october-scary-fast-event-1-1024x576.jpg', '2023-12-28 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newproduct`
--

CREATE TABLE `newproduct` (
  `eventId` int(100) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDescription` varchar(1000) NOT NULL,
  `productImg` varchar(1000) NOT NULL,
  `productUrl` varchar(1000) NOT NULL,
  `newProductId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newproduct`
--

INSERT INTO `newproduct` (`eventId`, `productName`, `productDescription`, `productImg`, `productUrl`, `newProductId`) VALUES
(1, 'MacBook Pro', 'Supercharged by M3, M3 Pro or M3 Max — the most advanced chips ever built for a personal computer. The world’s best laptop display. Up to 22 hours of battery life. Now available in Space Black.', 'https://down-my.img.susercontent.com/file/my-11134207-7r98v-lo6dxg4150ds0a', 'https://www.apple.com/my/shop/buy-mac/macbook-pro', 1),
(1, 'iMac', 'The ultimate all‑in‑one computer. A stunning 24‑inch Retina display with room for all you love. Advanced camera, mics and speakers. Supercharged by the M3 chip.', 'https://down-my.img.susercontent.com/file/my-11134207-7r990-lo6fc0vomjnq64', 'https://www.apple.com/my/shop/buy-mac/imac', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` decimal(7,2) NOT NULL,
  `productDescription` varchar(10000) NOT NULL,
  `imgPath` varchar(255) NOT NULL,
  `productUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `productPrice`, `productDescription`, `imgPath`, `productUrl`) VALUES
(7, 'Ipad', 300.00, 'This is Ipad', '../images/E4otrX3VUAw-vgN.jpg', 'https://www.apple.com/my/shop/buy-ipad'),
(10, 'Apple iPhone 14', 3499.00, 'iPhone 14. With the most impressive dual-camera system on iPhone. Capture stunning photos in low light and bright light. Crash Detection,[1] a new safety feature, calls for help when you can’t.\r\n\r\n\r\n\r\nKey feature \r\n\r\n·   6.1-inch Super Retina XDR display[', 'https://down-my.img.susercontent.com/file/my-11134211-7qukz-li0a03rziz1p2d', 'https://shopee.com.my/Apple-iPhone-14-i.304504082.19244660196?sp_atk=6c19acc1-0a73-4b4d-bc90-796b565e9af2'),
(11, 'Apple iPhone 13', 2999.00, 'iPhone 13. The most advanced dual-camera system ever on iPhone. Lightning-fast A15 Bionic chip. A big leap in battery life. Durable design. And a brighter Super Retina XDR display.\n\n\n\nFeature\n\n• 6.1-inch Super Retina XDR display [1]\n\n• Cinematic m', 'https://down-my.img.susercontent.com/file/my-11134211-7qul3-li09wsx7t3od46', 'https://shopee.com.my/Apple-iPhone-13-i.304504082.13813728221?xptdk=547c3337-e181-46f6-8575-bfcc0a5a1283'),
(12, 'Apple iPhone 15 Pro', 5449.00, 'iPhone 15 Pro Max. Forged in titanium and featuring the groundbreaking A17 Pro chip, a customisable Action button and the most powerful iPhone camera system ever.\n\nKey feature\n\n• FORGED IN TITANIUM — iPhone 15 Pro Max has a strong and light aerospace-grade titanium design with a textured matt glass back. It also features a Ceramic Shield front that’s tougher than any smartphone glass. And it’s splash, water and dust resistant.1\n\n• ADVANCED DISPLAY — The 6.7″ Super Retina XDR display2 with ProMotion ramps up refresh rates to 120Hz when you need exceptional graphics performance. Dynamic Island bubbles up alerts and Live Activities. Plus, with Always-On display, your Lock Screen stays glanceable, so you don’t have to tap it to stay in the know.\n\n• GAME-CHANGING A17 PRO CHIP — A Pro-class GPU makes mobile games feel so immersive, with rich environments and realistic characters. A17 Pro is also incredibly efficient and helps to deliver amazing all-day battery life.3\n\n• POWERFUL PRO CAMERA SYSTEM — Get incredible framing flexibility with seven pro lenses. Capture super-high-resolution photos with more colour and detail using the 48MP Main camera. And take sharper close-ups from farther away with the 5x Telephoto camera on iPhone 15 Pro Max.\n\n• CUSTOMISABLE ACTION BUTTON — Action button is a fast track to your favourite feature. Just set the one you want, like Silent mode, Camera, Voice Memo, Shortcut and more. Then press and hold to launch the action.\n\n\n\n• PRO CONNECTIVITY — The new USB-C connector lets you charge your Mac or iPad with the same cable you use to charge iPhone 15 Pro Max. With USB 3, you get a huge leap in data transfer speeds.4 And you can download files up to 2x faster using Wi-Fi 6E.5\n\n• VITAL SAFETY FEATURES — With Crash Detection, iPhone can detect a severe car crash and call for help if you can’t.6\n\n• DESIGNED TO MAKE A DIFFERENCE — iPhone comes with privacy protections that help keep you in control of your data. It’s made from more recycled materials to minimise environmental impact. And it has built-in features that make iPhone more accessible to all.\n\n• COMES WITH APPLECARE WARRANTY — Every iPhone comes with a one-year limited warranty and up to 90 days of complimentary technical support.\n\nLegal\n\n1 iPhone 15, iPhone 15 Plus, iPhone 15 Pro and iPhone 15 Pro Max are splash, water and dust resistant and were tested under controlled laboratory conditions with a rating of IP68 under IEC standard 60529 (maximum depth of 6 metres up to 30 minutes). Splash, water and dust resistance are not permanent conditions. Resistance might decrease as a result of normal wear. Do not attempt to charge a wet iPhone; refer to the user guide for cleaning and drying instructions. Liquid damage not covered under warranty.\n\n2 The display has rounded corners. When measured as a standard rectangle, the screen is 6.12 inches (iPhone 15 Pro, iPhone 15) or 6.69 inches (iPhone 15 Pro Max, iPhone 15 Plus) diagonally. Actual viewable area is less.\n\n3 Battery life varies by use and configuration; see apple.com/my/batteries for more information.\n\n4 USB 3 cable with 10 Gbps speeds required for up to 20x faster transfers on iPhone 15 Pro models.\n\n5 Wi-Fi 6E available in countries and regions where supported.\n\n6 iPhone 15 and iPhone 15 Pro can detect a severe car crash and call for help. Requires a mobile network connection or Wi-Fi calling.\n\nKey feature\n\n• FORGED IN TITANIUM — iPhone 15 Pro has a strong and light aerospace-grade titaniu', 'https://down-my.img.susercontent.com/file/my-11134211-7r98z-lm7ousd537ir73', 'https://shopee.com.my/-Ready-Stock-Apple-iPhone-15-Pro-i.304504082.22855111174?xptdk=c0b71f3a-c4bf-42e1-98cd-3f22848812d6'),
(13, 'Apple iPhone 14 Plus', 4099.00, 'iPhone 14. With the most impressive dual-camera system on iPhone. Capture stunning photos in low light and bright light. Crash Detection,[1] a new safety feature, calls for help when you can’t.\r\n\r\n\r\n\r\nKey feature \r\n\r\n·   6.1-inch Super Retina XDR display[', 'https://down-my.img.susercontent.com/file/my-11134211-7r98y-llqjj3r94dqu50', 'https://shopee.com.my/Apple-iPhone-14-Plus-i.304504082.14992598697?sp_atk=86bfb349-6db0-452a-b687-f77bdbac3e33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `newproduct`
--
ALTER TABLE `newproduct`
  ADD PRIMARY KEY (`newProductId`),
  ADD KEY `eventId` (`eventId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newproduct`
--
ALTER TABLE `newproduct`
  MODIFY `newProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
