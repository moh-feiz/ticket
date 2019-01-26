-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2019 at 03:12 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `name`) VALUES
(1, 'image/png', '15476514231542037450.png');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1547650823),
('m130524_201442_init', 1547650831),
('m190109_074712_create_subject_table', 1547650834),
('m190109_074755_create_stream_table', 1547650843),
('m190109_074834_create_media_table', 1547650844),
('m190109_074854_create_ticket_table', 1547650850),
('m190109_074909_create_rate_table', 1547650855),
('m190109_074924_add_fullname_column_role_column_media_id_column_avatar_column_mobile_column_to_user_table', 1547650883),
('m190109_080012_create_junction_table_for_user_and_subject_tables', 1547650894),
('m190109_085356_create_usersubject_table', 1547650900);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `text` text,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`id`, `user_id`, `title`, `subject_id`, `priority`, `status`, `created_at`) VALUES
(1, 5, 'مشکل سرعت بسیار پایین', 1, 1, 1, '2019-01-16 15:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `title`, `status`) VALUES
(1, 'پروژه ی 1', 1),
(2, 'پروژه ی 2', 1),
(3, 'پروژه ی 3', 1),
(4, 'پروژه ی 4', 1),
(5, 'پروژه ی 5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `user_type` tinyint(1) NOT NULL,
  `response` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `stream_id`, `media_id`, `user_type`, `response`, `created_at`) VALUES
(1, 1, NULL, 0, 'سرعت بسیار پایین میباشد لطفا رسیدگی کنید', '2019-01-16 15:09:00'),
(2, 1, NULL, 1, 'لطفا فایل مورد نیاز را بفرستید', '2019-01-16 15:09:38'),
(3, 1, 1, 0, 'فایل درخواستی ضمیمه شد', '2019-01-16 15:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '3',
  `media_id` int(11) DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `mobile` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `fullname`, `role`, `media_id`, `avatar`, `mobile`) VALUES
(1, 'admin', '1uGVLKLaJK5i0dZVaAybWJycX9DUpwm6', '$2y$13$iLC/n04CrMWlDMej.6ZxSurEyBgJJcYlKt9.lDxplbY1CvmVnlhQe', NULL, 'admin@gmail.com', 10, 1547650944, 1547650944, NULL, 1, NULL, NULL, NULL),
(2, 'expert1', 'hCzrgQ8kIYSgq1D8cimY6LCXU2kJ3Dy5', '$2y$13$sBkYv4eWpzDf3w.WmVFJre7DpC36Wte3C.VnqXt8Nqnl3/thqVILi', NULL, 'expert1@gmail.com', 10, 1547650976, 1547651258, NULL, 2, NULL, NULL, NULL),
(3, 'expert2', 'uo_y9dkPf2heDHWCRxdBs9XHVcsAmCDG', '$2y$13$hC5TOmxMgPk.1WiIHuidze2wV2iH/IhZccyTlPbaqc06shn9SGGPe', NULL, 'expert2@gmail.com', 10, 1547651003, 1547651231, NULL, 2, NULL, NULL, NULL),
(4, 'expert3', 'AUkqHdk6yaZoprPJ6Q2A1xNT9BD5quXY', '$2y$13$qgsgG0LBIeiOvazanNNaM.yC1hYJUWPAAn1Dv/huFQPxhIF3qTkKO', NULL, 'expert3@gmail.com', 10, 1547651021, 1547651241, NULL, 2, NULL, NULL, NULL),
(5, 'user1', 'ut7hxh9PzgPKHAgXOGqfs9S5IkKKH9Qj', '$2y$13$WT9TmbD24LaprIGaiyATHu51bdWaByO1CjVfG1WTMARJBx6kQvEwi', NULL, 'user1@gmail.com', 10, 1547651061, 1547651061, NULL, 3, NULL, NULL, NULL),
(6, 'user2', '_bfSVUBcWFx60WOZAvSD6GL5xnxZgL8x', '$2y$13$GjY0whTjhmZvu3zvxTuFUuKd0fDKkzF6.3xg/F.0E6xpFeJtLpp/S', NULL, 'user2@gmail.com', 10, 1547651082, 1547651082, NULL, 3, NULL, NULL, NULL),
(7, 'user3', '1mnmiwOvdk4VouyEv_EfodUGki8RrEp0', '$2y$13$7bW7JNy8rswIT4fetxZv8.nw5yKtM4NCz5WzvfMYI9182/XICzRga', NULL, 'user3@gmail.com', 10, 1547651104, 1547651104, NULL, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersubject`
--

CREATE TABLE `usersubject` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersubject`
--

INSERT INTO `usersubject` (`id`, `subject_id`, `user_id`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 4),
(4, 2, 2),
(5, 3, 2),
(6, 4, 2),
(7, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_subject`
--

CREATE TABLE `user_subject` (
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx-rate-stream_id` (`stream_id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-stream-user_id` (`user_id`),
  ADD KEY `idx-stream-subject_id` (`subject_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-ticket-stream_id` (`stream_id`),
  ADD KEY `idx-ticket-media_id` (`media_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `idx-user-media_id` (`media_id`);

--
-- Indexes for table `usersubject`
--
ALTER TABLE `usersubject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-usersubject-subject_id` (`subject_id`),
  ADD KEY `idx-usersubject-user_id` (`user_id`);

--
-- Indexes for table `user_subject`
--
ALTER TABLE `user_subject`
  ADD PRIMARY KEY (`user_id`,`subject_id`),
  ADD KEY `idx-user_subject-user_id` (`user_id`),
  ADD KEY `idx-user_subject-subject_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usersubject`
--
ALTER TABLE `usersubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `fk-rate-stream_id` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stream`
--
ALTER TABLE `stream`
  ADD CONSTRAINT `fk-stream-subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-stream-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk-ticket-media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-ticket-stream_id` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk-user-media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `usersubject`
--
ALTER TABLE `usersubject`
  ADD CONSTRAINT `fk-usersubject-subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-usersubject-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_subject`
--
ALTER TABLE `user_subject`
  ADD CONSTRAINT `fk-user_subject-subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user_subject-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
