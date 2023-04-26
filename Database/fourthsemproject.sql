-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 09:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fourthsemproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `productID` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`productID`, `productQuantity`, `userID`) VALUES
(56, 1, 2),
(52, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `cathash_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category_name`, `cathash_name`) VALUES
(1, 'Graphics Card', 'gpu'),
(2, 'Processor', 'processor'),
(3, 'MotherBoard', 'motherboard'),
(4, 'RAM/Storage', 'ramstorage'),
(5, 'PC Cases', 'cases');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `orderdate` varchar(50) NOT NULL,
  `order_progress` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `InvoiceNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`userID`, `productID`, `productQuantity`, `orderdate`, `order_progress`, `payment`, `InvoiceNo`) VALUES
(2, 73, 1, '2022-08-05', 'Pending', '', ''),
(1, 54, 1, '2022-12-12', 'Pending', '', ''),
(1, 52, 2, '2022-12-12', 'Pending', '', ''),
(1, 53, 1, '2022-12-12', 'Pending', '', ''),
(1, 52, 1, '2022-12-12', 'Pending', '', ''),
(0, 0, 0, '', '', '', ''),
(1, 62, 1, '2023-03-28 21:54:39', 'Pending', 'Esewa Paid', ''),
(1, 52, 3, '2023-04-09', 'Pending', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(150) NOT NULL,
  `prodtype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `name`, `price`, `description`, `category`, `image`, `stock`, `prodtype`) VALUES
(50, 'NVIDIA GEFORCE RTX 2080 SUPER 8GB', 120000, 'The RTX 2080 Super is a solid premium-priced GPU. The RTX 2080 Super is ~9% faster on average than the GTX 1080Ti at both 1440p and 4K', 'gpu', 'images/gpu/2080 super 12gb.png', 3, 'featured'),
(52, 'COOLER MASTER COSMOS C700P WHITE', 43000, 'Item Height ?25.6 Inches : Item Width ?16.2 Inches : Product Dimensions ?64.01 x 41.15 x 65.02 cm; 22.23 Kilograms. Cooler Master Cosmos C700P Black Edition PC CaseThe Cooler Master Cosmos C700P Case featuring E-ATX, ATX, Micro-ATX, & Mini-ITX, 1 x 5.25.', 'cases', 'images/cases/Cooler Master Cosmos C700P.jpeg', 87, 'featured'),
(53, 'Western Digital 256GB Black Nvme SSD', 8250, 'Western Digital WD BLACK SN750 NVMe M.2 2280 250GB PCI-Express 3.0 x4 64-layer 3D NAND Internal Solid State Drive (SSD) WDS250G3X0C. Max Sequential Read: Up to 3100 MBps; Max Sequential Write: Up to 1600 MBps; 4KB Random Read: Up to 220,000 IOPS', 'ramstorage', 'images/ramstorage/250gbblack.png', 97, ''),
(54, 'AMD RYZEN THREADRIPPER 3990X', 560000, '64 Cores & 128 Threads\r\nBase Clock: 2.9GHz, Max Boost Clock: up to 4.3GHz, 288MB Cache, TDP: 280W\r\nSystem Memory Specification: 3200MHz, System Memory Type: DDR4, Memory Channels: 4\r\nSocket: sTRX4, Motherboard Compatibility: AMD TRX40 chipset based mother', 'processor', 'images/processor/AMD Ryzen Threadripper 3990X.png', 99, ''),
(55, 'INTEL I9 10900K 20M CACHE UPTO 5.3GHZ', 84800, '10 Cores Total Threads 20. Max Turbo Frequency 5.30 GHz. Intel Thermal Velocity Boost Frequency 5.30 GHz. Intel Turbo Boost Max Technology 3.0 Frequency 5.20 GHz. Intel® Turbo Boost Technology 2.0 Frequency 5.10 ', 'processor', 'images/processor/intel i9 10900k.jpeg', 3, 'featured'),
(56, 'INTEL CORE I5 10400F 12M CACHE UPTO 4.3GHZ', 34200, 'Intel Core i5-10400F Processor 12M Cache, up to 4.30 GHz. Intel Core™ i5-10400F Processor 10th Generation Intel Core i5 Processors', 'processor', 'images/processor/Intel-Core-i5-10400F-10th-Generation-Desktop-Processor-Eitimad-2048x1987.jpg', 96, ''),
(57, 'GIGABYTE X570 AORUS PRO DUAL NVME PCIE', 41000, 'Supports AMD 3rd Gen Ryzen/ 2nd Gen Ryzen/ 2nd Gen Ryzen with Radeon Vega Graphics/ Ryzen with Radeon Vega Graphics Processors.\r\nDual Channel ECC/ Non-ECC Unbuffered DDR4, 4 DIMMs.\r\nAdvanced Thermal Design with Fins-Array Heatsink and Direct Touch Heatpip', 'motherboard', 'images/motherboard/gigabyte-x570-aorus-pro-amd-am4-ddr4-x570-chipset-atx-motherboard.jpg', 96, ''),
(58, 'CLX GROUNDBREAKING I1000 RADIATOR SLOT', 17000, 'Support dual 240mm liquid cooling,\r\n18 mm Side Space, U-shape remove panel quickly, 3 mm thick tempered glass window with stunning viewing\r\nThree removable dust proof mesh, install front fan without removing front panel\r\nHide-cable management Space', 'cases', 'images/cases/CLX groundbreaking I1000.png', 100, 'normal'),
(59, 'GIGABYTE RX6700 XT EAGLE 12GB', 126200, 'The WINDFORCE 3X cooling system features 3x80mm unique blade fans, alternate spinning, 3 composite copper heat pipes direct touch GPU, 3D active fan and Screen cooling, which together provide high efficiency heat dissipation.', 'gpu', 'images/gpu/GIGABYTE-RX6700-XT-EAGLE-12GB.png', 100, 'featured'),
(61, 'Thermaltake H-One Ram 8gb', 7240, 'Featuring a unique and elegant design, the H-ONE is constructed using a high-quality aluminum heat spreader with a durable PCB structure for utmost reliability.', 'ramstorage', 'images/ramstorage/Thermaltake H One Ram 8gb,.png', 99, ''),
(62, 'ZOTAC GAMING GEFORCE RTX 3050 8GB', 23, 'Built with enhanced RT Cores and Tensor Cores.\r\nNew streaming multiprocessors, and high-speed GDDR6 memory.\r\nTwin Edge 8GB GDDR6 128-bit 14 Gbps PCIE 4.0', 'gpu', 'images/gpu/rtx 3050 8gb.png', 99, 'featured'),
(63, 'PHANTEKS EVOLV X TAMPERED CASE', 31500, 'Strongly enhanced airflow Design.\r\nFront I/O support USB 3. 1 Type-C, 2x USB 3. 0, mic, headphone, LED control\r\nClean interior design.\r\nCable management. \r\nsmart space utilization for ultimate flexibility', 'cases', 'images/cases/Phanteks Evolv X-es518etg-1z.png', 100, ''),
(68, 'GIGABYTE GEFORCE RTX 2060 12GB', 112000, 'The NVIDIA GeForce RTX 2060 for desktops is a fast mid range graphics card in the GeForce Turing line-up. It uses a TU106 chip with 1,920 shader, 45 ROPs, 120 TMUs, 240 KI-cores and a 192 Bit memory bus that connects 6 GB of GDDR6.', 'gpu', 'images/gpu/2060 12gb.png', 99, ''),
(69, 'Corsair Carbide 275R FULL WHITE', 32000, 'Corsair Carbide 275R is a Full White Themed Computer Case With Full Air Cooling Support And Water Cooling Can Also Be Installed. ', 'cases', 'images/cases/Corsair Carbide 275R.png', 100, ''),
(70, 'ASROCK B660 PRO MOTHERBOARD', 490000, 'Supports 12th Gen Intel Core Processors\r\n8 Phase Power Design\r\nSupports DDR4 4800MHz (OC)\r\n1 PCIe 4.0 x16, 1 PCIe 3.0 x16, 2 PCIe 3.0 x1 Ports\r\n1 M.2 Key-E for WiFi\r\nGraphics Output Options: HDMI, DisplayPort', 'motherboard', 'images/motherboard/ASRock B660 Pro.png', 100, ''),
(71, 'ASUS TRX40 PRO DDR4 4666+MHZ', 73400, 'The ASUS ROG Strix TRX40-EX Gaming motherboard supports 3rd gen AMD Ryzen Threadripper processors\r\nTRX4 sockets, features up to 8 x DDR4 memory slots\r\nPCI-E 4.0, 3 x M.2 slots, 8 x SATA 6GB/s ports\r\n6 x USB 2.0 (4 rear, 2 front), 8 x USB 3.2 Gen 2 (rear, ', 'motherboard', 'images/motherboard/asus-trx40-pro-box-large.png', 100, 'featured'),
(72, 'AMD RYZEN 7 5800X', 74000, 'The processor AMD Ryzen 7 5800X is developed on the 7 nm technology node and architecture Vermeer (Zen 3). Its base clock speed is 3.80 GHz, and maximum clock speed in turbo boost - 4.40 GHz. AMD Ryzen 7 5800X contains 8 processing cores', 'processor', 'images/processor/amd_100_100000063wof_ryzen_7_5800x_3_8_1598376.jpg', 100, ''),
(73, 'ASUS ROG STRIX B660 GAMING', 58000, 'ROG Strix B660 Gaming WiFi D4 offers premium power delivery and optimized cooling to unleash the full force of the latest 12th Gen Intel Core processors. Onboard PCIe 5.0, WiFi 6 and three PCIe 4.0 M.2 slots provide lightning-fast data transfers for an en', 'motherboard', 'images/motherboard/rog_strix_b660-i_gaming_wifi_2_1140x1140.png', 99, '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `imageID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_dir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`imageID`, `name`, `img_dir`) VALUES
(1, 'slider1', 'images/slider/slider1.png'),
(2, 'slider2', 'images/slider/slider2.png'),
(3, 'slider4', 'images/slider/slider3.png'),
(4, 'slider5', 'images/slider/slider4.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `regdate` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `email`, `phone`, `password`, `address`, `type`, `regdate`) VALUES
(1, 'admin', 'nepal4972@gmail.com', '9862517280', 'nepal4972', 'Biratnagar', 'admin', 2022),
(2, 'Saugat Nepal', 'sandnnepal4972@gmail.com', '9862517280', 'nepal4972', 'Biratnagar', 'client', 2022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
