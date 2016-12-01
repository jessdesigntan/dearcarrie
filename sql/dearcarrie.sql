-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2016 at 06:46 AM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dearcarrie`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `likes` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment_like`
--

CREATE TABLE `comment_like` (
  `commentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `curation`
--

CREATE TABLE `curation` (
  `topicid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `score` double NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0',
  `comments` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `published` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `title`, `description`, `timestamp`, `score`, `likes`, `comments`, `views`, `published`) VALUES
(2, 30, 'New', 'First Line<br />\nSecond line<br />\n<br />\nFourth line', '2016-11-30 12:01:27', 0, 0, 0, 0, 0),
(3, 30, 'fd', 'fdf', '2016-11-30 11:55:32', 0, 0, 0, 0, 1),
(4, 30, '111', '22222', '2016-11-30 11:55:35', 0, 0, 0, 0, 1),
(5, 30, 'fgfg', 'fgfgf', '2016-11-30 11:55:39', 0, 0, 0, 0, 1),
(6, 30, 'fgfg', 'fgfgf', '2016-11-30 11:55:41', 0, 0, 0, 0, 1),
(7, 30, 'fgfg', 'fgfgf', '2016-11-30 11:55:42', 0, 0, 0, 0, 1),
(8, 30, 'fgfg', 'fgfgf', '2016-11-30 12:01:20', 0, 0, 0, 0, 0),
(9, 30, 'fgfg', 'fgfgf', '2016-11-30 12:00:58', 0, 0, 0, 0, 0),
(10, 30, 'Title here', 'this is my story<br />\r\n<br />\r\nspace<br />\r\n<br />\r\none more time<br />\r\ntesting', '2016-11-30 12:00:30', 0, 0, 0, 0, 0),
(11, 30, 'hahahaha', 'lolololool', '2016-11-30 11:57:16', 0, 0, 0, 0, 0),
(12, 30, 'ok', 'change again', '2016-11-30 11:55:55', 0, 0, 0, 0, 0),
(13, 33, 'newnewnewnew', 'newnewnewnewnewnewnewnewnewnewnewnewnewnewnewnewnewnewnewnewnewnewnewnew', '2016-11-30 11:55:48', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `followers` int(11) NOT NULL,
  `posts` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `order_num` int(11) NOT NULL,
  `score` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'normal',
  `affliate` varchar(255) DEFAULT 'website',
  `image` varchar(255) NOT NULL DEFAULT 'images/default.svg',
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `affliate`, `image`, `description`) VALUES
(30, 'Jess Tan', 'jess_tjl@hotmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 'website', 'images/default.svg', 'I love writing'),
(32, 'normal', 'normal@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', 'im cool'),
(33, 'new', 'newuser@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', 'this is my desc'),
(34, 'Tan Jia Lin', 'jesswandering@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', 'lololololol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
