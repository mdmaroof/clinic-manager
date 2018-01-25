-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2018 at 03:08 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `preleaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `visit_form`
--

CREATE TABLE `visit_form` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `disease` varchar(191) NOT NULL,
  `since` varchar(191) NOT NULL,
  `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visit_form`
--

INSERT INTO `visit_form` (`id`, `profile_id`, `disease`, `since`, `last_visit`) VALUES
(23, 112, 'Diabetes', '2 Week', '2018-01-25 14:03:08'),
(24, 113, 'Malaria', 'Last Month', '2018-01-25 14:04:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visit_form`
--
ALTER TABLE `visit_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visit_form_ibfk_1` (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visit_form`
--
ALTER TABLE `visit_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `visit_form`
--
ALTER TABLE `visit_form`
  ADD CONSTRAINT `visit_form_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
