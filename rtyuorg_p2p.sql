-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2021 at 09:27 AM
-- Server version: 10.2.40-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtyuorg_p2p`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `size` varchar(200) COLLATE utf8_bin NOT NULL,
  `soil` varchar(200) COLLATE utf8_bin NOT NULL,
  `temp` int(11) NOT NULL,
  `max_temp` varchar(200) COLLATE utf8_bin NOT NULL,
  `min_temp` varchar(200) COLLATE utf8_bin NOT NULL,
  `humidity` int(11) NOT NULL,
  `kml` varchar(200) COLLATE utf8_bin NOT NULL,
  `longitude` varchar(200) COLLATE utf8_bin NOT NULL,
  `latitude` varchar(200) COLLATE utf8_bin NOT NULL,
  `altitude` varchar(200) COLLATE utf8_bin NOT NULL,
  `current_growing` mediumtext COLLATE utf8_bin NOT NULL,
  `harvest` mediumtext COLLATE utf8_bin NOT NULL,
  `chloride` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `size`, `soil`, `temp`, `max_temp`, `min_temp`, `humidity`, `kml`, `longitude`, `latitude`, `altitude`, `current_growing`, `harvest`, `chloride`) VALUES
(1, '×’×•× ×’×œ ×ž×–×¨×—', '101 דונם', 'clay loam', 1, '39.5', '7.55555', 61, '1.kml', '35.58644568026617', '32.6454856061015', '231.2725903313523', 'Bannana', '2022-11-17', '144'),
(2, '×× ×“×¨×˜×” ×ž×¢×¨×‘', '90 דונם', 'clay', 2, '36.232554', '7.50000', 57, '2.kml', '35.58000914728155', '32.65256157993829', '359.9999991404968', 'Bannana', '2023-01-19', '144'),
(3, '×“×•×©×Ÿ ×', '150 דונם', 'clay', 3, '32.000555', '7.5056543', 60, '3.kml', '35.54150521271467', '32.54635456196131', '-226.5623086532972', 'Bannana', '2024-06-03', '270'),
(4, '×”×ž×¢×™×™×Ÿ', '50 דונם', 'heavy clay', 4, '28.33333333', '7.556532', 68, '4.kml', '35.53948171356924', '32.63321480708429', '15.18833269175954', 'Bannana', '2022-11-09', '144');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `start_date` text COLLATE utf8_bin NOT NULL,
  `harvest_date` text COLLATE utf8_bin NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `start_date`, `harvest_date`, `area_id`) VALUES
(29, '2023-11-28', '2025-03-19', 1),
(35, '2021-10-02', '2023-01-19', 2),
(38, '2021-08-18', '2022-11-12', 4),
(39, '2021-11-29', '2022-12-26', 4),
(40, '2021-10-27', '2022-11-09', 4),
(41, '2023-05-16', '2024-06-03', 3),
(42, '2021-08-26', '2022-11-01', 1),
(43, '2021-10-09', '2022-11-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `current_growing`
--

CREATE TABLE `current_growing` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `current_growing`
--

INSERT INTO `current_growing` (`id`, `area_id`, `name`) VALUES
(1, 1, 'Bannana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_growing`
--
ALTER TABLE `current_growing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `current_growing`
--
ALTER TABLE `current_growing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
