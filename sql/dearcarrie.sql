-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 07:10 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

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
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `postid`, `datetime`, `likes`, `comment`) VALUES
(4, 30, 7, '2016-12-02 16:43:15', 0, 'hahaha'),
(5, 30, 7, '2016-12-02 16:43:22', 0, 'test scroll'),
(7, 38, 13, '2016-12-02 16:51:54', 0, 'normal comment here'),
(10, 30, 6, '2016-12-07 15:09:07', 0, 'haha');

--
-- Triggers `comments`
--
DELIMITER $$
CREATE TRIGGER `comment_notification` AFTER INSERT ON `comments` FOR EACH ROW INSERT INTO notifications (item, from_user, type)
VALUES (NEW.id, NEW.userid, 'new_comment')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_comment` AFTER DELETE ON `comments` FOR EACH ROW DELETE FROM notifications
WHERE item = OLD.id AND from_user = OLD.userid AND type = 'new_comment'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comment_like`
--

CREATE TABLE `comment_like` (
  `commentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_like`
--

INSERT INTO `comment_like` (`commentid`, `userid`, `datetime`) VALUES
(4, 30, '2016-12-07 18:02:12');

--
-- Triggers `comment_like`
--
DELIMITER $$
CREATE TRIGGER `comment_like_notification` AFTER INSERT ON `comment_like` FOR EACH ROW INSERT INTO notifications (item, from_user, type)
VALUES (NEW.commentid, NEW.userid, 'comment_like')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `comment_unlike_notification` AFTER DELETE ON `comment_like` FOR EACH ROW DELETE FROM notifications
WHERE item = OLD.commentid AND from_user = OLD.userid AND type = 'comment_like'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `curation`
--

CREATE TABLE `curation` (
  `topicid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curation`
--

INSERT INTO `curation` (`topicid`, `postid`) VALUES
(8, 3),
(9, 3),
(11, 3),
(12, 3),
(10, 3),
(10, 13),
(9, 13),
(12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `item` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  `from_user` int(11) NOT NULL
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
(2, 30, 'New', 'First Line<br />\nSecond line<br />\n<br />\nFourth line', '2017-01-11 06:08:52', 0, 0, 0, 0, 1),
(3, 30, 'fd', 'fdf', '2016-11-30 11:55:32', 0, 0, 0, 0, 1),
(4, 30, '111', '22222', '2016-11-30 11:55:35', 0, 0, 0, 0, 1),
(5, 30, 'fgfg', 'fgfgf', '2016-11-30 11:55:39', 0, 0, 0, 0, 1),
(6, 30, 'fgfg', 'fgfgf', '2016-11-30 11:55:41', 0, 0, 0, 0, 1),
(7, 30, 'fgfg', 'fgfgf', '2016-11-30 11:55:42', 0, 0, 0, 0, 1),
(8, 30, 'fgfg', 'fgfgf', '2017-01-11 06:09:00', 0, 0, 0, 0, 1),
(9, 30, 'fgfg', 'fgfgf', '2017-01-11 06:08:57', 0, 0, 0, 0, 1),
(10, 30, 'Title here', 'this is my story<br />\r\n<br />\r\nspace<br />\r\n<br />\r\none more time<br />\r\ntesting', '2017-01-11 06:09:10', 0, 0, 0, 0, 1),
(11, 30, 'hahahaha', 'lolololool', '2017-01-11 06:09:05', 0, 0, 0, 0, 1),
(12, 30, 'ok', 'change again', '2017-01-11 06:09:15', 0, 0, 0, 0, 1),
(13, 33, 'New title', 'So lame', '2016-12-02 15:16:13', 0, 0, 0, 0, 1),
(14, 30, 'bipolar test', 'alalalalalalla bipolar', '2016-12-08 15:58:47', 0, 0, 0, 0, 1),
(15, 30, 'search', 'search filter', '2016-12-23 11:19:39', 0, 0, 0, 0, 1),
(16, 34, 'trial', 'blog post', '2017-01-09 10:45:11', 0, 0, 0, 0, 1),
(17, 34, 'here', 'posting', '2017-01-09 10:46:33', 0, 0, 0, 0, 1),
(18, 34, 'testing', 'my story', '2017-01-09 10:46:51', 0, 0, 0, 0, 1),
(19, 34, 'add', 'again', '2017-01-09 10:52:38', 0, 0, 0, 0, 1),
(20, 34, 'strike', 'please', '2017-01-09 10:52:53', 0, 0, 0, 0, 1),
(21, 34, 'yes', 'alright', '2017-01-09 10:53:07', 0, 0, 0, 0, 1),
(22, 30, 'eat disorder', 'bulimia', '2017-01-11 06:08:16', 0, 0, 0, 0, 1),
(23, 30, 'great', 'again', '2017-01-11 06:08:25', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_follow`
--

CREATE TABLE `post_follow` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `post_follow`
--
DELIMITER $$
CREATE TRIGGER `post_follow_notification` AFTER INSERT ON `post_follow` FOR EACH ROW INSERT INTO notifications (item, from_user, type)
VALUES (NEW.postid, NEW.userid, 'post_follow')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `post_unfollow_notification` AFTER DELETE ON `post_follow` FOR EACH ROW DELETE FROM notifications
WHERE item = OLD.postid AND from_user = OLD.userid AND type = 'post_follow'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`postid`, `userid`, `datetime`) VALUES
(3, 30, '2016-12-07 17:16:33'),
(7, 30, '2016-12-07 18:17:24'),
(6, 30, '2016-12-07 18:17:26');

--
-- Triggers `post_like`
--
DELIMITER $$
CREATE TRIGGER `post_like_notifications` AFTER INSERT ON `post_like` FOR EACH ROW INSERT INTO notifications (item, from_user, type)
VALUES (NEW.postid, NEW.userid, 'post_like')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `post_unlike_notification` AFTER DELETE ON `post_like` FOR EACH ROW DELETE FROM notifications
WHERE item = OLD.postid AND from_user = OLD.userid AND type = 'post_like'
$$
DELIMITER ;

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `followers` int(11) NOT NULL DEFAULT '0',
  `posts` int(11) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `order_num` int(11) NOT NULL,
  `score` double NOT NULL DEFAULT '0',
  `published` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `main_image`, `background`, `title`, `short_desc`, `description`, `date`, `followers`, `posts`, `url`, `tel`, `type`, `order_num`, `score`, `published`) VALUES
(8, 'images/topics/4931553_eating.jpg', 'images/topics/5851188_foodbg.jpg', 'Eating Disorders', 'Stories about split personality', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,', '2016-12-04 16:30:41', 0, 0, 'www.split.commmmmm', '12345678', 'featured', 5, 0, 1),
(9, 'images/topics/9123645_split.jpg', 'images/topics/904009_split.jpg', 'Split Personality', 'Stories about split personality', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,', '2016-12-04 16:30:43', 0, 0, 'www.split.com', '+65 8888 5555', 'curated', 1, 0, 1),
(10, 'images/topics/9896764_love.jpg', 'images/topics/9629871_love.jpg', 'Love & Relationships', '123', '123', '2016-12-04 16:48:48', 0, 0, '123', '123', 'main', 2, 0, 1),
(11, 'images/topics/9484689_split.jpg', 'images/topics/3974277_splitbg.jpg', 'Split Personality', 'Stories about split personality', 'A collection of stories about split personality', '2016-12-02 18:06:19', 0, 0, 'www.split.com', '1234 5678', 'main', 1, 0, 1),
(12, 'images/topics/118669_stress.jpg', 'images/topics/1149696_stressbg.jpg', 'Stress', 'Tips to deal with stress', 'Stress & studies', '2016-12-04 16:46:23', 0, 0, 'http://www.stress.com', '5678 8888', 'main', 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic_follow`
--

CREATE TABLE `topic_follow` (
  `userid` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topic_follow`
--

INSERT INTO `topic_follow` (`userid`, `topicid`, `datetime`) VALUES
(30, 9, '2016-12-10 15:19:40');

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
  `description` varchar(255) NOT NULL,
  `datejoin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `affliate`, `image`, `description`, `datejoin`, `active`) VALUES
(30, 'Jess Tan', 'jess_tjl@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'website', 'images/default.svg', 'I love writing', '2016-12-01 08:49:41', 1),
(32, 'normal', 'normal@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/profile/5917602_dots.svg', 'im cool', '0000-00-00 00:00:00', 0),
(33, 'New Name', 'newuser@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/profile/5947141_dots.svg', 'New description', '0000-00-00 00:00:00', 1),
(34, 'Tan Jia Lin', 'jesswandering@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', 'lololololol', '0000-00-00 00:00:00', 1),
(35, 'Claudia', 'test@mail.commmmm', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', 'lalalal', '0000-00-00 00:00:00', 1),
(36, 'Tan Jia Lin', 'tjl@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-01 08:49:41', 1),
(37, 'testdate', 'testdate@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-02 11:24:44', 1),
(38, 'normal user', 'normaluser@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-02 16:51:45', 1),
(39, 'testprofile', 'prof@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-10 15:59:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_follow`
--

CREATE TABLE `user_follow` (
  `userid` int(11) NOT NULL,
  `follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_follow`
--

INSERT INTO `user_follow` (`userid`, `follower`) VALUES
(33, 30);

--
-- Triggers `user_follow`
--
DELIMITER $$
CREATE TRIGGER `user_follow_notification` AFTER INSERT ON `user_follow` FOR EACH ROW INSERT INTO notifications (item, from_user, type)
VALUES (NEW.userid, NEW.follower, 'user_follow')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `user_unfollow_notification` AFTER DELETE ON `user_follow` FOR EACH ROW DELETE FROM notifications
WHERE item = OLD.userid AND from_user = OLD.follower AND type = 'user_follow'
$$
DELIMITER ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
