-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 10:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metashare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` enum('founder','co-founder','') NOT NULL DEFAULT '',
  `phone` varchar(45) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$10$RSp/Li8NnWnED7.4.l3VCuy5O597nSzX0wbjmRZYpv5NLlx05u906',
  `image` varchar(255) NOT NULL DEFAULT 'profile.png',
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$10$ly.UyvwaDsYXIFoAMKjOVe88srLgQ.PLVI2g6B5iHRRPgVodpOJ2i',
  `status` enum('active','not-active') NOT NULL DEFAULT 'not-active',
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `git_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_bank` varchar(255) NOT NULL,
  `number_account` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `invitation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `invitation_id` int(10) UNSIGNED NOT NULL,
  `cover_image1` varchar(255) NOT NULL,
  `cover_image2` varchar(255) NOT NULL,
  `groom_name` varchar(255) NOT NULL,
  `groom_nickname` varchar(255) NOT NULL,
  `groom_address` text NOT NULL,
  `groom_father` varchar(255) NOT NULL,
  `groom_mother` varchar(255) NOT NULL,
  `groom_ig` varchar(255) NOT NULL,
  `groom_son` smallint(6) NOT NULL,
  `bride_name` varchar(255) NOT NULL,
  `bride_nickname` varchar(255) NOT NULL,
  `bridge_address` varchar(255) NOT NULL,
  `bride_father` varchar(255) NOT NULL,
  `bride_mother` varchar(255) NOT NULL,
  `bride_ig` varchar(255) NOT NULL,
  `bride_daughter` smallint(6) NOT NULL,
  `transaction_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invited_guest`
--

CREATE TABLE `invited_guest` (
  `guest_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `invitation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `love_story`
--

CREATE TABLE `love_story` (
  `story_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `story` text NOT NULL,
  `date` date NOT NULL,
  `invitation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `status` smallint(2) NOT NULL DEFAULT 0,
  `invitation_id` int(10) UNSIGNED NOT NULL,
  `guest_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_invitation`
--

CREATE TABLE `model_invitation` (
  `model_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(125) NOT NULL,
  `category` varchar(125) NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `cover` varchar(255) NOT NULL,
  `view_model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE `photo_gallery` (
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `invitaion_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `token_login`
--

CREATE TABLE `token_login` (
  `token_id` int(100) UNSIGNED NOT NULL,
  `access_token` text NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `active_period` datetime DEFAULT NULL,
  `description` enum('1','2','0') NOT NULL DEFAULT '0',
  `proof_payment` varchar(255) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `wedding_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `address` int(11) NOT NULL,
  `time` time NOT NULL,
  `maps` varchar(255) NOT NULL,
  `invitation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`git_id`),
  ADD KEY `gifts_invitation_id_index` (`invitation_id`);

--
-- Indexes for table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`invitation_id`),
  ADD KEY `invitation_transaction_id_index` (`transaction_id`);

--
-- Indexes for table `invited_guest`
--
ALTER TABLE `invited_guest`
  ADD PRIMARY KEY (`guest_id`),
  ADD KEY `invited_guest_invitation_id_index` (`invitation_id`);

--
-- Indexes for table `love_story`
--
ALTER TABLE `love_story`
  ADD PRIMARY KEY (`story_id`),
  ADD KEY `love_story_invitation_id_index` (`invitation_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_invitation_id_foreign` (`invitation_id`),
  ADD KEY `message_guest_id_foreign` (`guest_id`);

--
-- Indexes for table `model_invitation`
--
ALTER TABLE `model_invitation`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  ADD PRIMARY KEY (`gallery_id`),
  ADD KEY `photo_gallery_invitaion_id_index` (`invitaion_id`);

--
-- Indexes for table `token_login`
--
ALTER TABLE `token_login`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transaction_customer_id_index` (`customer_id`),
  ADD KEY `transaction_admin_id_index` (`admin_id`),
  ADD KEY `transaction_model_id_index` (`model_id`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`wedding_id`),
  ADD KEY `wedding_wedding_id_foreign_idx` (`invitation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `git_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `invitation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invited_guest`
--
ALTER TABLE `invited_guest`
  MODIFY `guest_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `love_story`
--
ALTER TABLE `love_story`
  MODIFY `story_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_invitation`
--
ALTER TABLE `model_invitation`
  MODIFY `model_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  MODIFY `gallery_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token_login`
--
ALTER TABLE `token_login`
  MODIFY `token_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `wedding_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gifts`
--
ALTER TABLE `gifts`
  ADD CONSTRAINT `gifts_invitation_id_foreign` FOREIGN KEY (`invitation_id`) REFERENCES `invitation` (`invitation_id`);

--
-- Constraints for table `invitation`
--
ALTER TABLE `invitation`
  ADD CONSTRAINT `invitation_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`);

--
-- Constraints for table `invited_guest`
--
ALTER TABLE `invited_guest`
  ADD CONSTRAINT `invited_guest_invitation_id_foreign` FOREIGN KEY (`invitation_id`) REFERENCES `invitation` (`invitation_id`);

--
-- Constraints for table `love_story`
--
ALTER TABLE `love_story`
  ADD CONSTRAINT `love_story_invitation_id_foreign` FOREIGN KEY (`invitation_id`) REFERENCES `invitation` (`invitation_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_guest_id_foreign` FOREIGN KEY (`guest_id`) REFERENCES `invited_guest` (`guest_id`),
  ADD CONSTRAINT `message_invitation_id_foreign` FOREIGN KEY (`invitation_id`) REFERENCES `invitation` (`invitation_id`);

--
-- Constraints for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  ADD CONSTRAINT `photo_gallery_invitaion_id_foreign` FOREIGN KEY (`invitaion_id`) REFERENCES `invitation` (`invitation_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `transaction_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `transaction_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `model_invitation` (`model_id`);

--
-- Constraints for table `wedding`
--
ALTER TABLE `wedding`
  ADD CONSTRAINT `wedding_wedding_id_foreign` FOREIGN KEY (`invitation_id`) REFERENCES `wedding` (`wedding_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
