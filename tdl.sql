-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 06:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `desciption` varchar(255) NOT NULL,
  `ordering` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catName`, `desciption`, `ordering`) VALUES
(1, 'SOFTWARE ENGINEERING', 'SOFTWARE ENGINEERING  هندسة برمجيات', NULL),
(2, 'Object Oriented Programming ', 'Object Oriented Programming برمجة غرضية', NULL),
(3, 'لغة إنجليزية 1', '', NULL),
(4, 'التوجية المهني و التميز', '', NULL),
(5, 'مقدمة تطبيقات الحاسب', '', NULL),
(6, 'الرياضيات', '', NULL),
(7, 'الفيزياء', '', NULL),
(8, 'مهارات التعلم', '', NULL),
(9, 'الكتابة الفنية', '', NULL),
(10, 'لغة إنجليزية 2', '', NULL),
(11, 'الدراسات الإسلامية', '', NULL),
(12, 'تجميع الحاسب وتشغيلة', '', NULL),
(13, 'تطبيقات الحاب المتقدمة', '', NULL),
(14, 'الخوارزميات والمنطق', '', NULL),
(15, 'لغة إنجليزية 3', '', NULL),
(16, 'مبادى برمجة صفحات الويب', '', NULL),
(17, 'اساسيات برمجة الحاسب', '', NULL),
(18, 'مبادئ قواعد البيانات', '', NULL),
(19, 'لغة إنجليزية 4', '', NULL),
(20, 'برمجة الأنترنت', '', NULL),
(21, 'برمجة الحاسب', '', NULL),
(22, 'برمجة قواعد بيانات', '', NULL),
(23, 'هندسة البرمجيات', '', NULL),
(24, 'السلوك الوظيفي ومهارات الأتصال', '', NULL),
(25, 'التأهيل للشهادات الأحترافية', '', NULL),
(26, 'تقنيات الأنترنت المتقدمة', '', NULL),
(27, 'برمجة الأجهزة الذكية', '', NULL),
(28, 'مشروع التخرج', '', NULL),
(29, 'التدريب التعاوني', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fileId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `addDate` date NOT NULL,
  `fileDir` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileId`, `title`, `description`, `tags`, `addDate`, `fileDir`, `catId`, `userId`) VALUES
(14, 'تكليف', 'التكليف الرابع لمقرر قواعد بيانات عملي', '', '2022-10-18', '3757_5493_WEE.png', 22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL COMMENT 'identify for user',
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `groupId` int(11) NOT NULL DEFAULT 0,
  `ragStatus` int(11) NOT NULL DEFAULT 0 COMMENT 'user Approval'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`, `fullName`, `university`, `phone`, `groupId`, `ragStatus`) VALUES
(1, 'jehad', '1234', 'mamam', 'amama', '010jasa', 1, 1),
(2, 'sasaasas', 'a196e4a483501d22174122616cf23a2052c46f0b', 'asmmasm', 'aassasa', '21221', 0, 1),
(3, 'jehhad', '618dcdfb0cd9ae4481164961c4796dd8e3930c8d', 'mnamna', 'anan', '211', 0, 1),
(4, 'salma', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'salmaaaa', 'ununun', '52182112', 0, 1),
(5, 'salmaa', '8cb2237d0679ca88db6464eac60da96345513964', 'salma asas', 'ununnun', '213323', 0, 1),
(6, 'tawaf', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'sggagasg', 'gagsag', '83838', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileId`),
  ADD KEY `cartforgin` (`catId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identify for user', AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `USERforgin` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartforgin` FOREIGN KEY (`catId`) REFERENCES `categories` (`catId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
