-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 08:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sad`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(150) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin1', 'kristoffeedu@gmail.com', 'lizIVE11');

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `id` int(150) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`id`, `name`, `phone`, `email`) VALUES
(6, 'Tacloban City Police Office', '0917 631 7752', 'rpio.pro8@gmail.com'),
(7, 'TACRU', '0935-465-9111', 'taclobanrescueudfdnit02@gmail.com'),
(8, 'BFP VIII Tacloban City Fire Station ', '0995 135 3512', 'taclobancityfirestation@yahoo.com.ph'),
(9, 'National Emergency Hotline', '911', 'panyerongpulis.ls@pnp.gov.ph'),
(10, 'National Bureau of Investigation', '(02) 8524.4269', ' info@nbi.gov.ph'),
(11, 'Philippine Red Cross ', '(02) 8790-2300', 'nbc@redcross.org.ph'),
(12, 'Philippine National Police', '09178562801', 'panyerongpulis.ls@pnp.gov.ph'),
(13, 'Department of Health', '1555', 'dohpau.chu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `report_id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image_data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`report_id`, `name`, `image_data`) VALUES
(1, 'PALO.png', ''),
(2, 'PALO.png', ''),
(3, 'PALO.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `timestamp`) VALUES
(7, 'MAPASAR PO KITA', '2023-12-10 14:32:33'),
(8, 'tetttt', '0000-00-00 00:00:00'),
(9, 'tetttt', '2023-12-10 14:35:45'),
(10, 'tetttt', '2023-12-10 14:39:14'),
(11, 'tetttt', '2023-12-10 14:40:13'),
(12, 'tetttt', '2023-12-10 14:40:34'),
(13, 'tetttt', '2023-12-10 14:40:44'),
(14, 'tetttt', '2023-12-10 14:40:49'),
(15, 'tetttt', '2023-12-10 14:41:05'),
(16, 'tetttt', '2023-12-10 14:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL,
  `emergency_type` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `submission_datetime` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `name`, `description`, `emergency_type`, `status`, `remarks`, `submission_datetime`) VALUES
(38, 'Francis Kyle Noveda', 'Caibaan Barangay 95 - Beriso Heights 1', 'Fire', 'Completed', '', '2023-12-04 14:09:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(150) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `number` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `validation_code` varchar(250) NOT NULL,
  `is_verified` varchar(250) NOT NULL,
  `role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `number`, `address`, `validation_code`, `is_verified`, `role`) VALUES
(18, 'Kian ambe', 'kristoffeedu@gmail.com', '$2y$10$Tl5hd.ZsiBfIKupi3ofhUe3A5BFxjuWb4uzz6MuE8Sfu5FbkLTSRm', '09262945940', 'Beriso Heights 1 Block 6 Lot 1 Tacloban City', 'your_generated_code', '0', ''),
(31, 'Francis Kyle', 'Kainoveda@gmail.com', '$2y$10$oh.n0uPtiS8i7ko2qiKNU.fijlBUCBNbtaC2CgFKqHQCqIJ6TxIka', '09489653278', 'Palo, Leyte', '780799', '', ''),
(36, 'HelpDesk', 'disminhelp@gmail.com', '$2y$10$QVNdbU64Mopj2EiX7gtAGOALChxfjqQeIaq1s1few/J2P3FtqKUY6', '09262945940', 'LNU', '534452', '', 'help'),
(37, 'Admin', 'dismin111@gmail.com', '$2y$10$p5UmGE6aGSjh.4U.e3Gn6uPfoEczVw0/4xx8KRwt8UgRdrynIiVDG', '09262945940', 'LNU', '760864', '', 'admin'),
(38, 'Kian Ambe', '2100782@lnu.edu.ph', '$2y$10$6GGzaTG0BrW/NNR078Ktg.mmBaeEPZqM/VinCSXqZvSIzB8XyqbeK', '09489653278', 'Beriso Heights 1 Block 6 Lot 1 Tacloban City', '449454', '', ''),
(39, 'Sean Pulma', 'sean.pulma@gmail.com', '$2y$10$xkZR1OpCiYc7KJRFdhfiM.MtvKfgncUrR4Q/vRtFQnhZK9w86BRw2', '12345', 'TEST', '202476', '', ''),
(40, 'Jef Lotoc', 'jef.lotoc@gmail.com', '$2y$10$EF0wXnC2JdZzQG5TmPjiGefjjhrz9KvJ.Jtwio9FRE5KdFLH6t1PC', '123456', 'test', '496278', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `report_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
