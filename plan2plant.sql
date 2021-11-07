-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2021 at 06:05 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plan2plant`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `size` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `soil` varchar(200) COLLATE utf8_bin NOT NULL,
  `temp` int NOT NULL,
  `max_temp` varchar(200) COLLATE utf8_bin NOT NULL,
  `min_temp` varchar(200) COLLATE utf8_bin NOT NULL,
  `humidity` int NOT NULL,
  `kml` varchar(200) COLLATE utf8_bin NOT NULL,
  `longitude` varchar(200) COLLATE utf8_bin NOT NULL,
  `latitude` varchar(200) COLLATE utf8_bin NOT NULL,
  `altitude` varchar(200) COLLATE utf8_bin NOT NULL,
  `banana` mediumtext COLLATE utf8_bin NOT NULL,
  `corn` mediumtext COLLATE utf8_bin NOT NULL,
  `avocado` mediumtext COLLATE utf8_bin NOT NULL,
  `current_growing` mediumtext COLLATE utf8_bin NOT NULL,
  `harvest` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `size`, `soil`, `temp`, `max_temp`, `min_temp`, `humidity`, `kml`, `longitude`, `latitude`, `altitude`, `banana`, `corn`, `avocado`, `current_growing`, `harvest`) VALUES
(1, 'גונגל מזרח', '101 דונם', 'clay loam', 1, '39.5', '7.55555', 61, '1.kml', '35.58644568026617', '32.6454856061015', '231.2725903313523', '', 'Growing corn, desirable planting date: November 2021, estimated harvest time: March 2022', 'Growing Avocado Haas, Desirable Planting Date: September 2021, Estimated Harvest Time: November 2024', '', ''),
(2, 'אנדרטה מערב', '90 דונם', 'clay', 2, '36.232554', '7.50000', 57, '2.kml', '35.58000914728155', '32.65256157993829', '359.9999991404968', '', 'Growing corn, desirable planting date: November 2021, estimated harvest time: March 2022', 'Growing Avocado Haas, Desirable Planting Date: September 2021, Estimated Harvest Time: November 2024', '', ''),
(3, 'דושן א', '150 דונם', 'clay', 3, '32.000555', '7.5056543', 60, '3.kml', '35.54150521271467', '32.54635456196131', '-226.5623086532972', '', 'Growing corn, desirable planting date: November 2021, estimated harvest time: March 2022', 'Growing Avocado Haas, Desirable Planting Date: September 2021, Estimated Harvest Time: November 2024', '', ''),
(4, 'המעיין', '50 דונם', 'heavy clay', 4, '28.33333333', '7.556532', 68, '4.kml', '35.53948171356924', '32.63321480708429', '15.18833269175954', '', 'Growing corn, desirable planting date: November 2021, estimated harvest time: March 2022', 'Growing Avocado Haas, Desirable Planting Date: September 2021, Estimated Harvest Time: November 2024', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id` int NOT NULL,
  `2015` int NOT NULL,
  `2016` int NOT NULL,
  `2017` int NOT NULL,
  `2018` int NOT NULL,
  `2019` int NOT NULL,
  `2020` int NOT NULL,
  `2021` int NOT NULL,
  `2022` int NOT NULL,
  `2023` int NOT NULL,
  `2024` int NOT NULL,
  `2025` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id`, `2015`, `2016`, `2017`, `2018`, `2019`, `2020`, `2021`, `2022`, `2023`, `2024`, `2025`) VALUES
(1, 50, 59, 60, 80, 75, 66, 50, 40, 45, 35, 36),
(2, 53, 64, 65, 56, 40, 35, 52, 68, 65, 48, 70),
(3, 62, 59, 78, 58, 65, 55, 45, 54, 66, 53, 72),
(4, 54, 55, 63, 72, 44, 45, 71, 52, 70, 50, 72);

-- --------------------------------------------------------

--
-- Table structure for table `current_growing`
--

CREATE TABLE `current_growing` (
  `id` int NOT NULL,
  `area_id` int NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `current_growing`
--

INSERT INTO `current_growing` (`id`, `area_id`, `name`) VALUES
(1, 1, 'Bannana');

-- --------------------------------------------------------

--
-- Table structure for table `humidity`
--

CREATE TABLE `humidity` (
  `id` int NOT NULL,
  `january` int NOT NULL,
  `february` int NOT NULL,
  `march` int NOT NULL,
  `april` int NOT NULL,
  `may` int NOT NULL,
  `june` int NOT NULL,
  `july` int NOT NULL,
  `august` int NOT NULL,
  `september` int NOT NULL,
  `october` int NOT NULL,
  `november` int NOT NULL,
  `december` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `humidity`
--

INSERT INTO `humidity` (`id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES
(1, 71, 72, 68, 62, 57, 59, 60, 62, 61, 60, 61, 70),
(2, 71, 72, 68, 62, 57, 59, 60, 62, 61, 60, 61, 70),
(3, 75, 73, 66, 56, 51, 52, 52, 54, 53, 54, 57, 68),
(4, 68, 70, 65, 57, 52, 55, 59, 61, 58, 55, 55, 64);

-- --------------------------------------------------------

--
-- Table structure for table `max_temp`
--

CREATE TABLE `max_temp` (
  `id` int NOT NULL,
  `january` int NOT NULL,
  `february` int NOT NULL,
  `march` int NOT NULL,
  `april` int NOT NULL,
  `may` int NOT NULL,
  `june` int NOT NULL,
  `july` int NOT NULL,
  `august` int NOT NULL,
  `september` int NOT NULL,
  `october` int NOT NULL,
  `november` int NOT NULL,
  `december` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `max_temp`
--

INSERT INTO `max_temp` (`id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES
(1, 19, 20, 23, 27, 35, 37, 40, 40, 37, 31, 26, 21),
(2, 19, 20, 23, 27, 33, 35, 38, 38, 36, 31, 26, 21),
(3, 18, 19, 23, 28, 34, 38, 40, 40, 36, 32, 26, 20),
(4, 18, 19, 22, 26, 31, 33, 36, 36, 34, 29, 25, 20);

-- --------------------------------------------------------

--
-- Table structure for table `min_temp`
--

CREATE TABLE `min_temp` (
  `id` int NOT NULL,
  `january` int NOT NULL,
  `february` int NOT NULL,
  `march` int NOT NULL,
  `april` int NOT NULL,
  `may` int NOT NULL,
  `june` int NOT NULL,
  `july` int NOT NULL,
  `august` int NOT NULL,
  `september` int NOT NULL,
  `october` int NOT NULL,
  `november` int NOT NULL,
  `december` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `min_temp`
--

INSERT INTO `min_temp` (`id`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES
(1, 8, 8, 9, 12, 17, 20, 24, 24, 22, 18, 13, 10),
(2, 9, 9, 10, 13, 17, 20, 24, 24, 22, 18, 14, 11),
(3, 8, 8, 10, 14, 18, 21, 24, 25, 22, 19, 14, 10),
(4, 8, 8, 9, 12, 15, 18, 22, 22, 20, 16, 13, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_growing`
--
ALTER TABLE `current_growing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `humidity`
--
ALTER TABLE `humidity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `max_temp`
--
ALTER TABLE `max_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `min_temp`
--
ALTER TABLE `min_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `current_growing`
--
ALTER TABLE `current_growing`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `humidity`
--
ALTER TABLE `humidity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `max_temp`
--
ALTER TABLE `max_temp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `min_temp`
--
ALTER TABLE `min_temp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
