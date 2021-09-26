-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 01:54 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `ruang` varchar(30) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `nama`, `kota`, `ruang`, `reg_date`) VALUES
('001', 'Abigail', 'Pelican Town', 'Lavender', '2021-09-26 11:45:51'),
('002', 'Elliot', 'Honeywood', 'Rose', '2021-09-26 11:51:41'),
('003', 'Pierre', 'Alberta', 'Violet', '2021-09-26 11:50:42'),
('004', 'George', 'Honeywood', 'Lavender', '2021-09-26 11:51:50'),
('005', 'Sebastian', 'Alberta', 'Rose', '2021-09-26 11:52:18'),
('111', 'Ahmad Rolandi Hernafahreza', 'Tulungagung', 'Admin Room', '2021-09-26 11:52:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
