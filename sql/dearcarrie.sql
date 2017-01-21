-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 21, 2017 at 08:50 PM
-- Server version: 5.6.28
-- PHP Version: 5.6.25

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
  `comment` varchar(255) NOT NULL,
  `published` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `postid`, `datetime`, `likes`, `comment`, `published`) VALUES
(4, 30, 7, '2016-12-02 16:43:15', 0, 'hahaha', 1),
(5, 30, 7, '2016-12-02 16:43:22', 0, 'test scroll', 1),
(7, 38, 13, '2016-12-02 16:51:54', 0, 'normal comment here', 1),
(10, 30, 6, '2016-12-07 15:09:07', 0, 'haha', 1),
(12, 40, 14, '2016-12-10 18:14:39', 0, 'newnenwenwe', 1),
(13, 40, 7, '2016-12-10 18:14:49', 0, 'morecomment', 1),
(15, 30, 14, '2016-12-14 18:31:19', 0, 'comment2', 1),
(16, 30, 14, '2017-01-18 07:33:00', 0, 'i like this', 1),
(17, 30, 7, '2017-01-18 10:26:57', 0, 'asdasdasd', 1),
(18, 30, 7, '2017-01-18 10:30:58', 0, 'aadsasdasd', 1),
(19, 40, 7, '2017-01-18 10:31:18', 0, 'asdsdasdasd', 1),
(20, 40, 7, '2017-01-18 10:31:20', 0, 'asdasdasd', 1),
(21, 40, 7, '2017-01-20 15:51:20', 0, 'lol', 1),
(22, 40, 5, '2017-01-20 15:52:22', 0, 'first', 1),
(23, 40, 5, '2017-01-20 15:53:03', 0, 'second', 1),
(24, 40, 5, '2017-01-20 15:54:34', 0, 'third', 1),
(25, 40, 5, '2017-01-20 15:55:37', 0, 'third', 1),
(26, 40, 5, '2017-01-20 15:55:54', 0, 'third', 1),
(27, 40, 5, '2017-01-20 15:56:03', 0, 'sixth', 1),
(28, 40, 5, '2017-01-20 15:56:16', 0, 'sixth', 1),
(29, 40, 5, '2017-01-20 15:57:09', 0, 'sixth', 1),
(30, 40, 5, '2017-01-20 15:57:10', 0, 'sixth', 1),
(31, 40, 5, '2017-01-20 15:57:15', 0, 'sixth', 1),
(32, 40, 5, '2017-01-20 15:57:16', 0, 'sixth', 1),
(33, 40, 5, '2017-01-20 15:59:22', 0, 'wtf', 1),
(34, 40, 5, '2017-01-20 16:00:15', 0, '13', 1),
(35, 40, 5, '2017-01-20 16:01:42', 0, '14', 1),
(36, 40, 5, '2017-01-20 16:02:30', 0, '15', 1),
(37, 40, 5, '2017-01-20 16:03:04', 0, '16', 1),
(38, 40, 5, '2017-01-20 16:03:29', 0, '17', 1),
(39, 40, 5, '2017-01-20 16:04:01', 0, 'This should be working', 1),
(40, 30, 7, '2017-01-20 16:04:28', 0, 'hi', 1);

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
(4, 40, '2016-12-10 18:14:50'),
(5, 40, '2016-12-10 18:14:53'),
(4, 30, '2017-01-18 10:29:37'),
(5, 30, '2017-01-18 10:30:48'),
(17, 40, '2017-01-18 10:31:23'),
(13, 40, '2017-01-18 10:31:25');

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
(12, 13),
(8, 3),
(9, 3),
(11, 3),
(12, 3),
(10, 3),
(10, 13),
(9, 13),
(12, 13),
(12, 4),
(9, 7),
(11, 7),
(12, 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `item` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  `from_user` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`item`, `type`, `seen`, `from_user`, `timestamp`) VALUES
(3, 'post_like', 1, 30, '2017-01-18 09:57:19'),
(4, 'comment_like', 1, 30, '2017-01-18 10:29:37'),
(4, 'comment_like', 1, 40, '2017-01-18 09:57:19'),
(5, 'comment_like', 0, 30, '2017-01-18 10:30:48'),
(5, 'comment_like', 1, 40, '2017-01-18 09:57:19'),
(6, 'post_like', 1, 30, '2017-01-18 09:57:19'),
(7, 'post_like', 1, 30, '2017-01-18 09:57:19'),
(7, 'post_like', 0, 40, '2017-01-18 10:31:16'),
(12, 'new_comment', 0, 40, '2017-01-18 09:57:19'),
(13, 'comment_like', 0, 40, '2017-01-18 10:31:25'),
(13, 'new_comment', 1, 40, '2017-01-18 09:57:19'),
(14, 'post_follow', 0, 30, '2017-01-18 09:57:19'),
(14, 'post_follow', 1, 40, '2017-01-18 09:57:19'),
(14, 'post_like', 0, 30, '2017-01-18 09:57:19'),
(14, 'post_like', 0, 40, '2017-01-18 09:57:19'),
(15, 'new_comment', 0, 30, '2017-01-18 09:57:19'),
(16, 'new_comment', 0, 30, '2017-01-18 09:57:19'),
(17, 'comment_like', 1, 40, '2017-01-18 10:31:23'),
(17, 'new_comment', 0, 30, '2017-01-18 10:26:57'),
(18, 'new_comment', 0, 30, '2017-01-18 10:30:58'),
(19, 'new_comment', 0, 40, '2017-01-18 10:31:18'),
(20, 'new_comment', 0, 40, '2017-01-18 10:31:20'),
(21, 'new_comment', 0, 40, '2017-01-20 15:51:20'),
(22, 'new_comment', 0, 40, '2017-01-20 15:52:22'),
(23, 'new_comment', 0, 40, '2017-01-20 15:53:03'),
(24, 'new_comment', 0, 40, '2017-01-20 15:54:34'),
(25, 'new_comment', 0, 40, '2017-01-20 15:55:37'),
(26, 'new_comment', 0, 40, '2017-01-20 15:55:54'),
(27, 'new_comment', 0, 40, '2017-01-20 15:56:03'),
(28, 'new_comment', 0, 40, '2017-01-20 15:56:16'),
(29, 'new_comment', 0, 40, '2017-01-20 15:57:09'),
(30, 'new_comment', 0, 40, '2017-01-20 15:57:10'),
(30, 'user_follow', 1, 40, '2017-01-20 15:42:20'),
(31, 'new_comment', 0, 40, '2017-01-20 15:57:15'),
(32, 'new_comment', 0, 40, '2017-01-20 15:57:16'),
(33, 'new_comment', 0, 40, '2017-01-20 15:59:22'),
(33, 'user_follow', 0, 30, '2017-01-18 09:57:19'),
(34, 'new_comment', 0, 40, '2017-01-20 16:00:15'),
(35, 'new_comment', 0, 40, '2017-01-20 16:01:42'),
(36, 'new_comment', 0, 40, '2017-01-20 16:02:30'),
(37, 'new_comment', 0, 40, '2017-01-20 16:03:04'),
(38, 'new_comment', 0, 40, '2017-01-20 16:03:29'),
(39, 'new_comment', 0, 40, '2017-01-20 16:04:01'),
(40, 'new_comment', 0, 30, '2017-01-20 16:04:28'),
(40, 'user_follow', 0, 30, '2017-01-21 07:35:45');

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
(2, 30, 'New', 'First Line<br />\nSecond line<br />\n<br />\nFourth line', '2017-01-20 09:43:29', 0, 0, 0, 50, 0),
(3, 30, 'fd', 'fdf', '2017-01-20 09:43:48', 0, 0, 0, 10, 1),
(4, 30, '111', '22222', '2017-01-20 09:43:54', 0, 0, 0, 9, 1),
(5, 30, 'fgfg', 'fgfgf', '2017-01-20 09:43:56', 0, 0, 0, 5, 1),
(6, 30, 'fgfg', 'fgfgf', '2016-11-30 11:55:41', 0, 0, 0, 0, 1),
(7, 30, 'fgfg', 'fgfgf', '2017-01-20 09:44:00', 0, 0, 0, 50, 1),
(8, 30, 'fgfg', 'fgfgf', '2016-11-30 12:01:20', 0, 0, 0, 0, 0),
(9, 30, 'fgfg', 'fgfgf', '2016-11-30 12:00:58', 0, 0, 0, 0, 0),
(10, 30, 'Title here', 'this is my story<br />\r\n<br />\r\nspace<br />\r\n<br />\r\none more time<br />\r\ntesting', '2016-11-30 12:00:30', 0, 0, 0, 0, 0),
(11, 30, 'hahahaha', 'lolololool', '2016-11-30 11:57:16', 0, 0, 0, 0, 0),
(12, 30, 'ok', 'change again', '2016-11-30 11:55:55', 0, 0, 0, 0, 0),
(13, 33, 'New title', 'So lame', '2016-12-02 15:16:13', 0, 0, 0, 0, 1),
(14, 33, 'bipolar test', 'alalalalalalla bipolar', '2016-12-10 18:26:31', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_follow`
--

CREATE TABLE `post_follow` (
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_follow`
--

INSERT INTO `post_follow` (`postid`, `userid`) VALUES
(14, 40),
(14, 30);

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
(6, 30, '2016-12-07 18:17:26'),
(14, 40, '2016-12-10 18:14:27'),
(3, 30, '2016-12-07 17:16:33'),
(7, 30, '2016-12-07 18:17:24'),
(6, 30, '2016-12-07 18:17:26'),
(14, 30, '2017-01-18 07:32:54'),
(7, 40, '2017-01-18 10:31:16');

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
  `itemid` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `seen` varchar(255) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `userid`, `itemid`, `comment`, `seen`, `type`, `date`) VALUES
(1, 30, 14, 'fasdads', '1', 'post', '2016-12-14 17:24:07'),
(2, 30, 14, 'dont like', '1', 'post', '2016-12-14 17:24:07'),
(3, 30, 14, '1', '0', 'post', '2016-12-14 17:24:07'),
(4, 30, 14, '2', '0', 'post', '2016-12-14 17:24:07'),
(5, 30, 40, 'ate ite', '0', 'comment', '2016-12-14 17:24:07'),
(6, 30, 30, 'lalalalala', '1', 'comment', '2016-12-14 17:24:07'),
(7, 30, 30, 'agn', '0', 'comment', '2016-12-14 17:24:07'),
(8, 30, 40, 'test', '1', 'comment', '2016-12-14 17:24:07'),
(9, 30, 15, 'laoaloaskdasd', '1', 'comment', '2016-12-14 17:24:07'),
(10, 30, 14, 'test\r\n\r\n\r\n\r\n', '0', 'comment', '2016-12-14 17:24:07'),
(11, 30, 14, 'hehehe', '0', 'post', '2017-01-18 08:12:03'),
(12, 30, 7, 'report', '0', 'post', '2017-01-18 08:12:19'),
(13, 30, 7, 'test', '0', 'post', '2017-01-18 08:13:19');

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
(10, 'images/topics/9896764_love.jpg', 'images/topics/9629871_love.jpg', 'Love & Relationships', '123', '123', '2016-12-14 18:38:35', 0, 0, '123', '123', 'main', 2, 0, 1),
(11, 'images/topics/9484689_split.jpg', 'images/topics/3974277_splitbg.jpg', 'Split Personality', 'Stories about split personality', 'A collection of stories about split personality', '2016-12-11 18:06:33', 0, 0, 'www.split.com', '', 'main', 1, 0, 1),
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
(30, 9, '2016-12-10 15:19:40'),
(30, 10, '2016-12-14 18:40:04'),
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
(32, 'normal', 'normal@mail.com', '202cb962ac59075b964b07152d234b70', 'expert', 'website', 'images/profile/5917602_dots.svg', 'im cool', '0000-00-00 00:00:00', 0),
(33, 'New Name', 'newuser@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/profile/5947141_dots.svg', 'New description', '0000-00-00 00:00:00', 1),
(35, 'Claudia', 'test@mail.commmmm', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', 'lalalal', '0000-00-00 00:00:00', 1),
(36, 'Tan Jia Lin', 'tjl@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-01 08:49:41', 1),
(37, 'testdate', 'testdate@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-02 11:24:44', 1),
(38, 'normal user', 'normaluser@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-02 16:51:45', 1),
(39, 'testprofile', 'prof@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-10 15:59:12', 1),
(40, 'notification', 'notification@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/avatar.png', '', '2016-12-10 18:13:59', 1),
(41, 'Kourtney', 'jesstjl@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2017-01-20 14:56:33', 1),
(42, 'khloe', 'jesstanjl@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2017-01-20 14:57:23', 1),
(49, 'Tan Jia Lin', 'jesswandering@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2017-01-20 15:17:16', 1);

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
(33, 30),
(33, 30),
(30, 40),
(40, 30);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`item`,`type`,`from_user`),
  ADD KEY `item` (`item`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
