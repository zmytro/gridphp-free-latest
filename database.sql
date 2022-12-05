-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2022 at 03:16 PM
-- Server version: 8.0.24
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_lab2`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `room_no` int NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `employee_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`first_name`, `last_name`, `room_no`, `department_name`, `employee_id`) VALUES
('Дмитрий', 'Fiodorov', 17, 'IT-DEP', 1),
('Реук', 'Епур', 326, 'IT-SQM', 2),
('Ольга', 'Кутепов', 15, 'ARG', 3),
('Николай', 'Кутепов', 15, 'ARG', 4),
('Дмитрий', 'Кутепов', 8, 'IT', 5),
('Николай', 'Кутепов Старший', 15, 'IT', 6),
('dmitri', 'test', 123, 'testsqm', 7),
('dmitri', 'test', 123, 'testsqm', 8);

-- --------------------------------------------------------

--
-- Table structure for table `employees_pc`
--

CREATE TABLE `employees_pc` (
  `pc_id` int NOT NULL,
  `pc_name` varchar(50) NOT NULL,
  `core` varchar(50) NOT NULL,
  `hdd_size` varchar(50) NOT NULL,
  `ram_size` varchar(50) NOT NULL,
  `employee_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees_pc`
--

INSERT INTO `employees_pc` (`pc_id`, `pc_name`, `core`, `hdd_size`, `ram_size`, `employee_id`) VALUES
(1, 'Acer AN515-54', 'Intel Core i5 9300H', 'SSD 512GB', '8GB', 1),
(6498, 'Dell', 'Core i9', '128MB', '16TB', 1),
(8745, 'HP', 'Intel Core i11 15300HQ ', '128TB', '128TB', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'DimaFiodorov', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
