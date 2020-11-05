-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 10:01 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagination`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_animal`
--

CREATE TABLE `tbl_animal` (
  `id` int(11) UNSIGNED NOT NULL,
  `common_name` varchar(255) NOT NULL DEFAULT '',
  `scientific_name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_animal`
--

INSERT INTO `tbl_animal` (`id`, `common_name`, `scientific_name`) VALUES
(1, 'Bison', 'Bos gaurus\r\n'),
(2, 'Black buck', 'Antelope cervicapra'),
(3, 'Chinkara', 'Gazella bennettii'),
(4, 'Nilgai', 'Boselaphus tragocamelus'),
(5, 'Wolf', 'Canis lupus'),
(6, 'Lion', 'Panthera leo'),
(7, 'Elephant', 'Elephas maximus'),
(8, 'Wild Ass', 'Equus africanus asinus'),
(9, 'Panther', 'Panthera pardus'),
(10, 'Kashmir stag', 'Cervus canadensis hanglu'),
(11, 'Peacock', 'Pavo cristatus'),
(12, 'Siberian crane', 'Grus leucogeranus'),
(13, 'Fox', 'Vulpes vulpes'),
(14, 'Rhinoceros', 'Rhinoceros unicornis'),
(15, 'Tiger', 'Panthera Tigris'),
(16, 'Crocodile', 'Crocodylus palustris'),
(17, 'Gavial or Gharial', 'Gavialis gangeticus'),
(18, 'Horse', 'Equus caballus'),
(19, 'Zebra', 'Equus quagga'),
(20, 'Buffalow', 'Babalus bubalis'),
(21, 'Wild boar', 'Sus scrofa'),
(22, 'Arabian camel', 'Camelus dromedaries'),
(23, 'Giraffe', 'GiraffaÊcamelopardalis'),
(24, 'House wall Lizard', 'Hemidactylus flaviviridis'),
(25, 'Hippopotamus', 'Hippopotamus amphibius'),
(26, 'Rhesus monkey', 'Macaca mulatta'),
(27, 'Dog', 'Canis lupus familiaris'),
(28, 'Cat', 'Felis domesticus'),
(29, 'Cheetah', 'Acinonyx jubatus'),
(30, 'Black rat', 'Rattus rattus'),
(31, 'House mouse', 'Mus musculus'),
(32, 'Rabbit', 'Oryctolagus cuniculus'),
(33, 'Great horned owl', 'Bubo virginianus'),
(34, 'House sparrow', 'Passer domesticus'),
(35, 'House crow', 'Corvus splendens'),
(36, 'Common myna', 'Acridotheres tristis'),
(37, 'Indian parrot', 'Psittacula eupatria'),
(38, 'Bulbul', 'Molpastes cafer'),
(39, 'Koel', 'Eudynamis scolopaccus'),
(40, 'Pigeon', 'Columba livia'),
(41, 'Indian Cobra', 'Naja naja'),
(42, 'King cobra', 'Ophiophagus hannah'),
(43, 'Sea snake', 'Hydrophiinae'),
(44, 'Indian python', 'Python molurus'),
(45, 'Rat snake', 'Rat snake');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_animal`
--
ALTER TABLE `tbl_animal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_animal`
--
ALTER TABLE `tbl_animal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
