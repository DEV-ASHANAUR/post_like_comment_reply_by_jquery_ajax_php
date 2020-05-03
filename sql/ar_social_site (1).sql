-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 10:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ar_social_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `c_comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `c_user_id` int(5) NOT NULL,
  `c_post_id` int(5) NOT NULL,
  `reply_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `c_comment`, `c_user_id`, `c_post_id`, `reply_id`, `created_at`) VALUES
(1, 'NiceðŸ˜ðŸ˜', 1, 33, 0, '2020-04-20 01:57:18'),
(2, 'MasshallahðŸ˜ðŸ˜', 1, 32, 0, '2020-04-20 02:01:06'),
(3, 'Ashanur tnxðŸ˜ðŸ˜', 2, 0, 1, '2020-04-20 02:01:46'),
(4, 'Ashanur ðŸ˜', 2, 0, 1, '2020-04-20 02:02:35'),
(5, 'Ashanur tnxðŸ˜ŽðŸ˜„', 2, 0, 2, '2020-04-20 02:03:10'),
(6, 'Hero The SuperStarðŸ˜ŽðŸ˜„ðŸ˜Ž', 2, 31, 0, '2020-04-20 02:03:55'),
(7, 'Are re Rasel Vai NakiðŸ˜ðŸ˜„', 2, 30, 0, '2020-04-20 02:04:28'),
(8, 'Nasim Tai nakiðŸ˜œðŸ˜Ž', 3, 0, 1, '2020-04-20 02:05:32'),
(9, 'Ashanur', 3, 1, 0, '2020-04-20 02:06:13'),
(10, 'Ashanur', 3, 1, 0, '2020-04-20 02:06:32'),
(11, 'Ashanur', 3, 1, 0, '2020-04-20 02:06:52'),
(12, 'Ashanur', 3, 1, 0, '2020-04-20 02:06:55'),
(13, 'Ashanur', 3, 1, 0, '2020-04-20 02:07:01'),
(14, 'sfsdf', 3, 26, 0, '2020-04-20 02:07:07'),
(15, 'fdhfgh', 3, 26, 0, '2020-04-20 02:08:04'),
(16, 'Shovo Naki reðŸ˜œðŸ˜œðŸ˜Ž', 3, 34, 0, '2020-04-20 02:08:58'),
(17, 'checkðŸ˜œðŸ˜Ž', 3, 26, 0, '2020-04-20 02:09:21'),
(18, 'Kire AshanurðŸ˜œðŸ˜Ž', 3, 27, 0, '2020-04-20 02:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`) VALUES
(2, 1, 2, '2020-04-18 00:11:15'),
(3, 1, 3, '2020-04-18 00:11:19'),
(4, 1, 18, '2020-04-18 00:11:23'),
(22, 1, 20, '2020-04-18 00:26:38'),
(24, 1, 19, '2020-04-18 00:27:14'),
(25, 1, 23, '2020-04-18 14:25:54'),
(26, 1, 22, '2020-04-18 14:25:58'),
(28, 1, 1, '2020-04-19 02:09:28'),
(29, 2, 29, '2020-04-19 02:16:13'),
(30, 2, 30, '2020-04-19 02:18:36'),
(32, 2, 28, '2020-04-19 02:20:57'),
(33, 2, 27, '2020-04-19 02:21:00'),
(34, 1, 32, '2020-04-19 02:27:30'),
(35, 3, 29, '2020-04-20 02:05:47'),
(36, 3, 28, '2020-04-20 02:05:49'),
(37, 3, 27, '2020-04-20 02:05:51'),
(38, 3, 26, '2020-04-20 02:05:53'),
(39, 3, 1, '2020-04-20 02:05:55'),
(40, 3, 34, '2020-04-20 02:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL,
  `p_title` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `p_details` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `p_image` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `p_likes` int(6) NOT NULL,
  `comments` int(5) NOT NULL,
  `user_id` int(6) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `p_title`, `p_details`, `p_image`, `p_likes`, `comments`, `user_id`, `created_at`) VALUES
(26, 'nice', 'dhgdðŸ˜ƒðŸ˜†', '5e9ac94491bd58.89575298.jpg', 1, 3, 1, '2020-04-18 15:32:52'),
(27, 'hghf', 'thfghfgðŸ˜ðŸ˜„ðŸ˜†', '5e9ad61aca0205.05616183.jpg', 2, 1, 1, '2020-04-18 16:27:38'),
(28, 'Breaking News', 'ðŸ˜œðŸ˜ŽLorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.', '5e9b3a770ec185.21019189.jpg', 2, 0, 1, '2020-04-18 23:35:51'),
(29, 'Lovely Friend..', 'ðŸ˜ŽLorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quamðŸ˜.', '5e9b5fcdc1dfe0.88364919.jpg', 2, 0, 1, '2020-04-19 02:15:09'),
(30, 'Rasel Boss..', 'ðŸ˜ŽðŸ˜ŽLorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam', '5e9b6081204976.77774110.jpg', 1, 1, 2, '2020-04-19 02:18:09'),
(31, 'Hero..', 'ðŸ˜ðŸ˜ðŸ˜ŽðŸ˜ŽLorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam', '5e9b61782cdcd2.16117661.jpg', 0, 1, 2, '2020-04-19 02:22:16'),
(32, 'MassAllhah..', 'ðŸ˜ðŸ˜Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam', '5e9b62980596c0.92894747.jpg', 1, 2, 2, '2020-04-19 02:27:04'),
(33, 'Glossary of Humanity', 'ðŸ˜ðŸ˜Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam', '5e9cad0f4f8da8.85848046.jpg', 0, 4, 1, '2020-04-20 01:57:03'),
(34, 'Glossary of Humanity', 'ðŸ˜ŽðŸ˜ŽLorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam.Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus officiis unde inventore velit fugit. Possimus assumenda magnam veniam quae impedit nobis voluptas tempore harum, sequi atque, itaque officia ea quam', '5e9cafc0250d99.32579608.jpg', 1, 1, 3, '2020-04-20 02:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `user_photo` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_about` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_birth` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_link` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_photo`, `user_password`, `user_about`, `user_birth`, `user_link`, `user_address`, `created_at`) VALUES
(1, 'Ashanur', 'ashanour009@gmail.com', '5e96103440dec9.36521329.jpg', 'admin', 'I\'am Md. Ashanaur Rahman. I am a student of Faridpur Polytechnic Institute Faridpur.Computer Department.', '1998-04-07', 'ashanur.xyz', 'Vhavanipur Rajbari Bangladesh', '2020-04-13 23:48:58'),
(2, 'Nasim', 'nasim009@gmail.com', '5e9614da070a62.68320194.jpg', 'admin', '', '2020-04-17', '', '', '2020-04-15 01:41:40'),
(3, 'Gm.Zeasn ', 'gm009@gmail.com', '', 'admin', '', '2020-04-07', '', '', '2020-04-17 15:31:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
