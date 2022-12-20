-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 07:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_room`
--

CREATE TABLE `booked_room` (
  `booked_room_id` int(11) NOT NULL,
  `room_id_fk` int(11) NOT NULL,
  `user_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`id`, `name`, `email`, `mobile`, `password`) VALUES
(1, 'rafi', 'akibakib171244@gmail.com', '', '$2y$10$5EIHtUka4CHh2SJOvrUbg.J3BqdIPUQKq6tA2QQCwQSDyt/ovmR52'),
(2, 'alin', 'alin@gmail.com', '01849665659', '$2y$10$Cs0nEikqKZP2RYqs3p6m3e04Ck2nwEDmLL4ovKTFy5wlvfUDaf/ey'),
(3, 'rafit hasan', 'rafit@iut-dhaka.edu', '', '$2y$10$7uRk3u/ANtkDW6tX8qHkiOkBBf1U51wrxFW40W.VfS/K0QKf22hsC'),
(4, 'shihab', 'shihab@iut-dhaka.edu', '', '$2y$10$wE3xfPOyo7GF.pYCnhlHvuDWOhxHlG7n9pAZxHVdHHtO9S5i7aJV2'),
(5, 'rafi', 'akib@gmail.com', '01849665655', '$2y$10$bhDUL1Dbq/Fo4bZNjqb3J.Om4455IBodv/hmNb1qwahpbUUoa4tQO'),
(6, 'Rafit', 'rafit@gmail.com', '', '$2y$10$gdJOi60S6f1dscwHmdj20.1zQ7XjHqc/2EAcOO9bp8VCrfWRcHz4K'),
(7, 'akibakib171', 'akibakib11244@gmail.com', '', '$2y$10$ucfXGZVEwluSydR1u491EOPIWv/.g4pmfReD/4Iid6yTo.pDWDF7y'),
(8, 'shadid', 'shadid@gmail.com', '', '$2y$10$mOLkL.EFxbmcyQqhCgOwyO/.WbUJDXIhQ8cNjCr29GZ.rh3AX0o7.'),
(9, 'peal', 'peal@gmail.com', '', '$2y$10$/IPnxOQvrXflZBkx/1DWCu1UBmMFKquQSQ7XL4Seedqy.yWKEnrJa'),
(10, 'farabi', 'farabi@gmail.com', '', '$2y$10$myhdjhLJOb6d6b7MVjrWS.vzSe.hnWLLgblxtvaFHN6.kmNenurxe'),
(11, 'rafi', 'lutful@gmail.com', '', '$2y$10$iPMLODwsbIkfTrEC/PejLekkKpiTSk642rvpC5tv0LHdLC8nIkQB2'),
(12, 'maman', 'sayemkhondokar95@gmail.com', '', '$2y$10$Au15t45YEV8GwQYu4ZDKFepoiXqL.4DbVIIVjhIbnzHDQIuiVoYQO'),
(13, 'raiyan', 'raiyan@gmail.com', '', '$2y$10$Fais5MGYUT4j2izbvZyHhOl/TrjepxYFj67TPYI16hxZQnWzPDoKG'),
(14, 'iftykhan', 'khankamal@gmail.com', '', '$2y$10$ArRG2qyAlAxfkjra2SIr9.kgp0fss4uhbQcHPHimAz7drwEjNAuy2'),
(15, 'se', 'se@gmail.com', '', '$2y$10$ReJ4LLFYxherZQu8c2vMI.2piPinejCDMTeiIfYibHE2pfnukJoeW');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `host_id` int(11) NOT NULL,
  `house` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `single_bed` int(11) NOT NULL,
  `double_bed` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `air_condition` varchar(255) NOT NULL DEFAULT 'false',
  `wifi` varchar(255) NOT NULL DEFAULT 'false',
  `toilet` varchar(255) NOT NULL DEFAULT 'false',
  `fare_per_night` int(200) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `host_id`, `house`, `address`, `single_bed`, `double_bed`, `city`, `air_condition`, `wifi`, `toilet`, `fare_per_night`, `image`) VALUES
(27, 2, 'boardbazar', 'IUT', 1, 2, 'Dhaka', 'available', 'available', 'available', 0, '312925696_10167529619160604_575322583571747071_n.jpg,ff7c59afe958bfa4a470754b5943f562.jpg,'),
(28, 5, 'alin', 'boardbazar', 1, 2, 'Dhaka', 'available', 'available', 'available', 0, '312925696_10167529619160604_575322583571747071_n.jpg,ff7c59afe958bfa4a470754b5943f562.jpg,'),
(29, 8, 'reza house', 'IUT', 1, 2, 'Dhaka', 'available', 'available', 'available', 0, 'bedroom3.png,'),
(30, 9, 'Peal house', 'IUT', 1, 0, 'Dhaka', 'available', 'available', 'available', 0, 'bedroom3.png,'),
(31, 10, 'farabi house', 'IUT', 2, 1, 'Dhaka', 'available', 'available', 'available', 0, 'chittagong.png,'),
(32, 11, 'house', 'IUT', 1, 2, 'Dhaka', 'available', 'available', 'available', 0, 'bedroom3.png,'),
(33, 12, 'araaam ghor', 'cheragali', 12, 4, 'Barishal', 'Not available', 'available', 'available', 0, 'bed.jpg,'),
(34, 12, 'hh', 'kochua', 2, 5, 'Chittagong', 'Not available', 'available', 'available', 0, '1918484.jpg,'),
(35, 13, 'dhap', 'Sylhet', 4, 12, 'Sylhet', 'available', 'available', 'Not available', 0, 'g5.jpg,'),
(37, 14, 'ruchiraaj', 'Kolabagan', 2, 12, 'Dhaka', 'available', 'available', 'available', 0, 'g1.jpg,'),
(38, 15, 'jordar bari', 'ruppur', 3, 2, 'Khulna', 'available', 'available', 'available', 0, 'home.png,');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, '0', 'akibakib171244@gmail.com', '$2y$10$wQoPYw6qPpEf3PG2LMbGnuaJ30fmLvpIhvAO3Cih6p/j4q7yoLXUq'),
(2, '0', 'rafi@iut-dhaka.edu', '$2y$10$04YNqG/weatjPFFbS0wSsuPR9.bFlIV0XepJfvOy.WZ41kE4Rji16'),
(3, '0', 'alin@gmail.com', '$2y$10$b6uC8yerEEPWttHEWaMLOeso7R9q1vY3OG0sIE06dqZYiXxKFmfAa'),
(4, '0', 'akibakib1244@gmail.com', '$2y$10$gCSn/rVueACQMBojUGvdyOd.y7LkQ91TPSRO5kd4BIi1uFqDWoNKS'),
(5, '0', 'muktadir@gmail.com', '$2y$10$r7Fj9b3FWk.QSywFJNBk6O4dbg9UML3WdaVrs0MxjJll8dC2J3mXu'),
(6, '0', 'muktadir@iut-dhaka.edu', '$2y$10$PwglxZYwiorNjflawhNA2ud8pvjcb./5VmlcwSoCI8fQ92qsYw1t2'),
(7, '0', 'mdmukta@gmail.com', '$2y$10$nvgo7S382omsKQGqGAGOXubDVpl.7BmT.1GSOPClGfuoaL8vnR48K'),
(8, '0', 'moun@gmail.com', '$2y$10$BTHSvzBOjAxwqJJIDj3z.enMMzsO1dK2vFByt1bj8eu48cLoBPJaC'),
(9, 'alif', 'alif@iut-dhaka.edu', '$2y$10$3M5Cj/UsA60iM94Zk4pde.0QwpB0n8fHxhgFsKAZpCelzUeXS0yAy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_room`
--
ALTER TABLE `booked_room`
  ADD PRIMARY KEY (`booked_room_id`),
  ADD KEY `user_id_fk` (`user_id_fk`),
  ADD KEY `room_id_fk` (`room_id_fk`);

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `host_fk` (`host_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_room`
--
ALTER TABLE `booked_room`
  MODIFY `booked_room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `host`
--
ALTER TABLE `host`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_room`
--
ALTER TABLE `booked_room`
  ADD CONSTRAINT `room_id_fk` FOREIGN KEY (`room_id_fk`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id_fk`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `host_fk` FOREIGN KEY (`host_id`) REFERENCES `host` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
