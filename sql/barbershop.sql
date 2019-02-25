-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 12:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barbershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `barbers`
--

CREATE TABLE `barbers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barbers`
--

INSERT INTO `barbers` (`id`, `name`, `bio`) VALUES
(4, 'Petras', 'Bla bla bla geriausias kirpejas greitai ir kokybiskai atlieka savo darba'),
(18, 'Jonas', 'blah blah blah cool guy'),
(19, 'Kostas', 'best barber working with us for 10 years');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `barber_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`barber_id`, `appointment_id`, `customer_name`, `date`) VALUES
(18, 42, 'Vardauskas Pavardauskas', '2019-02-25 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `visits` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_name`, `email`, `phone`, `visits`) VALUES
('grehbkjrg', 'elnrrgj', 'ljwengrjkln', 6),
('hwekjh', 'kwefjhbfejkwbh', '465+65+65', 2),
('jonas jonas', 'jlozysjlozys@fmaskn.coeo', '+6564654654', 1),
('Jonas Jonauskas', 'nvm@gmail.com', '86835654', 1),
('Jonas Lozis', 'bdksbfkasb', '86895465465', 1),
('Klientas Klientauskas', 'klientas@mail.com', '+3706085425', 1),
('Ponas Kostas', 'kostas@kostas.ly', '8683565464', 1),
('Ponas Ponauskas', 'ponas@emailas.ru', '112', 1),
('Vardauskas Pavardauskas', 'vardauskas@emial.com', '+3706089455', 4),
('Vardys Pavardys', 'nononoono@gmail.com', '+84984948984', 5);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_barber` tinyint(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `is_barber`, `username`, `password`) VALUES
(3, 'Administratorius', 0, 'admin', 'admin'),
(4, 'Petras', 1, 'petras', 'petras'),
(5, 'Jonas', 1, 'jonas', 'jonas'),
(16, 'Jonas', 1, 'jonas', 'jonas'),
(17, 'Jonas', 1, 'jonas', 'jonas'),
(18, 'Jonas', 1, 'jonas', 'jonas'),
(19, 'Kostas', 1, 'kostas', 'kostas'),
(20, 'andrius', 1, 'andrius', 'andrius'),
(21, 'Antanas', 1, 'antanas', 'antanas'),
(22, 'Antanas', 1, 'antanas', 'antanas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barbers`
--
ALTER TABLE `barbers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `customer_name` (`customer_name`),
  ADD KEY `barber_id` (`barber_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD UNIQUE KEY `customer_name` (`customer_name`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barbers`
--
ALTER TABLE `barbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barbers`
--
ALTER TABLE `barbers`
  ADD CONSTRAINT `barbers_ibfk_1` FOREIGN KEY (`id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`barber_id`) REFERENCES `barbers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
