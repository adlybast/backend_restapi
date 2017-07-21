-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 03:46 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--
CREATE DATABASE IF NOT EXISTS `school` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `school`;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `capacity` int(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'Class 8D', 32, '2017-07-05 00:16:33', '2017-07-05 00:16:33'),
(2, 'Class 9C', 33, '2017-07-05 00:38:02', '2017-07-05 00:38:02'),
(3, 'Class 7A', 66, '2017-07-05 01:31:23', '2017-07-05 01:31:23'),
(8, 'Class 9F', 30, '2017-07-05 02:14:15', '2017-07-05 02:14:15'),
(9, 'Class 9F', 31, '2017-07-05 02:28:30', '2017-07-05 02:28:30'),
(12, 'tes', 2, '2017-07-18 23:12:58', '2017-07-18 23:14:04'),
(14, 'max', 211, '2017-07-18 23:14:29', '2017-07-20 22:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `class_id`, `created_at`, `updated_at`) VALUES
(6, 'anang', 'anang@gmail.com', 0, '2017-07-02 01:20:46', '2017-07-16 15:17:18'),
(7, 'qwe', 'anang@gmail.com', 0, '2017-07-02 03:44:36', '2017-07-16 15:41:36'),
(9, 'dsasah', 'anang@gmail.com', 0, '2017-07-16 11:14:46', '2017-07-20 20:38:18'),
(10, 'aesha', 'aesha@gmail.com', 1, '2017-07-02 01:20:46', '2017-07-20 22:54:58'),
(13, 'tes', 'aesha@gmail.com', 1, '2017-07-20 23:43:33', '2017-07-20 23:43:33'),
(14, 'tesm', 'aesha@gmail.com', 1, '2017-07-20 23:44:23', '2017-07-20 23:44:23'),
(15, 'poi', 'adlybast@gmail.com', 2, '2017-07-20 23:45:18', '2017-07-20 23:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$1$Dtqyvz7/$wZSaZbfHgn0UbLlVi1HHp0', 'Admin', '2017-07-20 08:44:55', '2015-12-25 10:35:16', '2015-12-25 10:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `users_authentication`
--

CREATE TABLE IF NOT EXISTS `users_authentication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users_authentication`
--

INSERT INTO `users_authentication` (`id`, `users_id`, `token`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, '$1$Ru3.Gw2.$pKjEAo1wdJtW8sQRz4GsB1', '2017-07-19 11:26:06', '2017-07-18 23:26:06', '2017-07-18 23:26:06'),
(2, 1, '$1$Bi4.035.$nnfHp5RGW7rkbk.h4k5kn0', '2017-07-19 13:17:20', '2017-07-19 01:17:20', '2017-07-19 01:17:20'),
(3, 1, '$1$fI..6q5.$.yTttsjD6RHPoUX2nvp8j.', '2017-07-19 13:30:27', '2017-07-19 01:18:40', '2017-07-19 01:30:27'),
(4, 1, '$1$3u4.OH2.$bJm.ZKGITZsYLgS9PxyXP/', '2017-07-20 19:36:35', '2017-07-20 07:36:36', '2017-07-20 07:36:36'),
(5, 1, '$1$aH1.bc2.$S840ZkGgavISho/fYufha/', '2017-07-20 19:36:35', '2017-07-20 07:36:37', '2017-07-20 07:36:37'),
(6, 1, '$1$xN5.mZ1.$OAWKJmpxlkJR/utaPc2cS1', '2017-07-20 19:36:39', '2017-07-20 07:36:39', '2017-07-20 07:36:39'),
(7, 1, '$1$.d1.tp5.$jUo4lUH8dJ8.ovTZxiMP0.', '2017-07-20 19:36:40', '2017-07-20 07:36:40', '2017-07-20 07:36:40'),
(8, 1, '$1$GL..XO0.$gYuYHj4ENQEuc2PFmSbOd/', '2017-07-21 11:54:59', '2017-07-20 08:44:55', '2017-07-20 23:54:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
