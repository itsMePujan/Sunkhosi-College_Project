-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 10, 2019 at 04:54 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunkoshi`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `Id` bigint(20) NOT NULL,
  `Title` text COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Summery` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`Id`, `Title`, `Description`, `Summery`, `image`, `date`) VALUES
(1, 'SUNKOSHi', 'Omnis qui eum ullam ', 'Reprehenderit praes', 'PROFILE-20190810040440615.png', '2019-08-10 19:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `category_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `added_by` bigint(20) NOT NULL,
  `is_main` bigint(20) DEFAULT NULL,
  `is_sub` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`, `summary`, `added_by`, `is_main`, `is_sub`, `created_at`, `updated_at`) VALUES
(11, 'Industrial', 'inactive', 'all Indrustries info', 1, 1, NULL, '2019-07-26 17:06:05', '2019-07-26 17:38:47'),
(12, 'Organizational', 'active', 'all organizational info', 1, 1, NULL, '2019-07-26 17:06:05', '2019-07-26 17:06:18'),
(20, 'Justin Wilkinson', 'active', 'Justin Wilkinson is the Property', 5, NULL, 11, '2019-08-07 11:26:22', NULL),
(21, 'Kelly Nelson', 'active', 'Kelly Nelson is the Property', 5, NULL, 12, '2019-08-07 11:26:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `is_seen` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `is_seen`, `Date`) VALUES
(1, 'Oren Wagner', 'sidu@mailinator.com', 'Numquam minus qui au', 'Cum rCum rerum id quam nCum rerum id quam nCum rerum id quam nCum rerum id quam nCum rerum id quam nCum rerum id quam nCum rerum id quam nCum rerum id quam nerum id quam n', 'Y', '2019-08-09'),
(2, 'Linus Moody', 'zahyn@mailinator.net', 'Aspernatur laborum i', 'Quam repellendus Co', 'Y', '2019-08-09'),
(3, 'Sebastian Lara', 'fumanulo@mailinator.net', 'Culpa quia quia nec', 'Ipsa Nam error null', 'Y', '2019-08-09'),
(4, 'Christine Sullivan', 'xibare@mailinator.com', 'Alias ullam velit ne', 'Rem corporis at nost', 'Y', '2019-08-09'),
(5, 'Tucker Avila', 'buxem@mailinator.com', 'Nihil pariatur Quam', 'Velit est exercitat', 'Y', '2019-08-09'),
(6, 'Zeph Bentley', 'tivo@mailinator.com', 'In eiusmod deleniti', 'Ullamco cillum exerc', 'Y', '2019-08-09'),
(7, 'Damian Maddox', 'cimaxer@mailinator.com', 'Tempor qui non nisi', 'Consequat Proident', 'Y', '2019-08-09'),
(8, 'Francis Mckay', 'cujep@mailinator.com', 'Quis quod assumenda', 'Assumenda qui conseq', 'Y', '2019-08-09'),
(9, 'Jelani Martin', 'kobifutas@mailinator.com', 'Eligendi quia ut rat', 'Quidem optio et fac', 'Y', '2019-08-09'),
(10, 'Ina Martin', 'dojyqo@mailinator.net', 'Atque laborum Reici', 'Necessitatibus velit', 'Y', '2019-08-09'),
(11, 'Axel Watkins', 'qufaqumusi@mailinator.net', 'Ad iure excepturi om', 'Ipsa expedita do re', 'Y', '2019-08-09'),
(12, 'Paula Kidd', 'wekociceh@mailinator.com', 'Voluptatem saepe sit', 'Qui labore sunt nisi', 'Y', '2019-08-09'),
(13, 'Caldwell Middleton', 'cagasofyl@mailinator.com', 'Odio est deserunt vo', 'Velit expedita volup', 'Y', '2019-08-09'),
(14, 'Caldwell Middleton', 'cagasofyl@mailinator.com', 'Odio est deserunt vo', 'Velit expedita volup', 'Y', '2019-08-09'),
(15, 'Yardley Wiggins', 'wusi@mailinator.net', 'Cupidatat labore ea', 'Rem sint dignissimos', 'N', '2019-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `date`) VALUES
(7, 'Cupiditate sit labor', 'In ab aliquip harum', '2019-08-10'),
(8, 'Fugiat excepteur qui', 'Est qui maiores aper', '2019-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `banner` enum('Yes','No') COLLATE utf8_unicode_ci DEFAULT 'No',
  `uploaded_by` bigint(20) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `image`, `banner`, `uploaded_by`, `added_date`, `updated_date`) VALUES
(11, 'Bridge', '', 'PROFILE-20190808064144699.jpg', 'Yes', 5, '2019-08-08 22:26:44', '0000-00-00 00:00:00'),
(12, 'Road', '', 'PROFILE-20190808064747945.jpg', 'Yes', 5, '2019-08-08 22:32:47', '0000-00-00 00:00:00'),
(13, 'Bridge', 'Most Beautiful Page Of Sunkoshi', 'PROFILE-20190808070613716.jpg   ', 'No', 5, '2019-08-08 22:51:13', '2019-08-08 23:50:00'),
(14, 'Voluptatum perspicia', 'Fugit vitae anim di', 'PROFILE-20190808080210546.jpg', 'No', 5, '2019-08-08 23:47:10', '0000-00-00 00:00:00'),
(15, 'Et omnis molestiae m', 'Ut modi obcaecati ne', 'PROFILE-20190809052601558.png', 'No', 5, '2019-08-09 21:11:01', '0000-00-00 00:00:00'),
(16, 'Labore nulla aute cu', 'Dolores voluptates q', 'PROFILE-201908090526115.png', 'No', 5, '2019-08-09 21:11:11', '0000-00-00 00:00:00'),
(17, 'Aute iure autem temp', 'Maxime pariatur Har', 'PROFILE-20190809052632426.png', 'No', 5, '2019-08-09 21:11:32', '0000-00-00 00:00:00'),
(18, 'Est dolorem dolorem', 'Consequuntur facere', 'PROFILE-20190809052638157.png', 'No', 5, '2019-08-09 21:11:38', '0000-00-00 00:00:00'),
(19, 'Velit id iusto vel', 'Maxime ad et velit a', 'PROFILE-20190810043215477.jpg', 'Yes', 5, '2019-08-10 20:17:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `info_org_ind`
--

CREATE TABLE `info_org_ind` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OwnerName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Contact` bigint(20) DEFAULT NULL,
  `Location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RegestrationNo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EstablishedDate` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Type` enum('Government','Private') COLLATE utf8mb4_unicode_ci DEFAULT 'Private',
  `IsBanned` enum('Banned','Not Banned') COLLATE utf8mb4_unicode_ci DEFAULT 'Not Banned',
  `Is_Indrustrial` bigint(20) DEFAULT NULL,
  `EmployeeCount` int(11) DEFAULT NULL,
  `IsPresent` enum('Present','Collapsed') COLLATE utf8mb4_unicode_ci DEFAULT 'Present',
  `UploadedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `DateInserted` datetime DEFAULT current_timestamp(),
  `DateUpdated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_org_ind`
--

INSERT INTO `info_org_ind` (`Id`, `Name`, `OwnerName`, `Contact`, `Location`, `RegestrationNo`, `EstablishedDate`, `Type`, `IsBanned`, `Is_Indrustrial`, `EmployeeCount`, `IsPresent`, `UploadedBy`, `DateInserted`, `DateUpdated`) VALUES
(10, 'Kelly Nelson', 'Seth Warner', 99, 'Rerum et libero ad r', 'Lorem aut facilis re', '1988-04-24', 'Private', 'Not Banned', 12, 82, 'Collapsed', 5, '2019-08-07 17:11:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsandevents`
--

CREATE TABLE `newsandevents` (
  `id` bigint(20) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `NorE` enum('News','Events') COLLATE utf8_unicode_ci NOT NULL,
  `UploadedBy` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsandevents`
--

INSERT INTO `newsandevents` (`id`, `title`, `description`, `image`, `NorE`, `UploadedBy`, `date`, `update_date`) VALUES
(3, 'Laura Downs', 'Omnis itaque accusam', '', 'Events', 5, '2019-08-10 08:45:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FathersName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MothersName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CitizenshipNo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Contact` bigint(20) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` enum('Male','Female','Others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Religion` enum('Hinduism','Buddhism','Christanity','Islam','Others') COLLATE utf8mb4_unicode_ci DEFAULT 'Hinduism',
  `Profession` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsAlive` enum('Alive','Dead') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LiteracyStatus` enum('Educated','Semieducated','Uneducated') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UploadedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `DateInserted` datetime DEFAULT current_timestamp(),
  `DateUpdated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','unactive') COLLATE utf8_unicode_ci DEFAULT 'active',
  `remember_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `activate_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `recovery_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `phone_number`, `address`, `email`, `password`, `image`, `role`, `status`, `remember_token`, `activate_token`, `recovery_token`, `created_at`, `updated_at`) VALUES
(5, 'Pujan Poudel', '9866012860', 'Baneshwor', 'pujanpoudelofficial@gmail.com', 'f5bc64a7b354ca7a1b38b8dcff8e57df42993064', 'PROFILE-20190807015059138.jpg', 'admin', 'active', 'ZRxM8LjrMkX1RkNdfAotlXD6fGwRylPbY8XBxxAPTzjlhoduB5hJ3SMIYGW0qQ5jQYT3Hhx7vzOiVECsrIahFHnXNQmGLRrktXty', NULL, 'H3SWpE69ve6fPMqK7z5nWmEk897W2nWuQnRiAVKNvp4PpWSAM1uLTGopFfoGHP1gPFgM3iWK4JdrJ39XfYzpZ7940LuvKzWybBYa', '2019-07-01 12:54:52', '2019-08-10 04:21:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `id` (`Id`),
  ADD KEY `id_2` (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`),
  ADD UNIQUE KEY `category_id` (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `info_org_ind`
--
ALTER TABLE `info_org_ind`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Id_2` (`Id`);

--
-- Indexes for table `newsandevents`
--
ALTER TABLE `newsandevents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `PersonalinfoID_2` (`Id`),
  ADD KEY `PersonalinfoID` (`Id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `Id_3` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `Id_4` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `info_org_ind`
--
ALTER TABLE `info_org_ind`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `newsandevents`
--
ALTER TABLE `newsandevents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
