-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 10, 2017 at 06:15 AM
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
(40, 30, 7, '2017-01-20 16:04:28', 0, 'hi', 1),
(41, 30, 14, '2017-02-01 15:36:22', 0, 'aaaa', 1),
(42, 30, 15, '2017-02-02 14:28:41', 0, 'CAN&#039;T', 1),
(45, 30, 27, '2017-02-03 15:20:02', 0, 'dfsdf\r\nsdf\r\n\r\n\r\nsfdsdf', 1),
(46, 30, 26, '2017-02-03 15:29:54', 0, 'lll', 1),
(51, 52, 7, '2017-02-08 18:43:22', 0, 'asdas', 1);

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
(13, 40, '2017-01-18 10:31:25'),
(45, 30, '2017-02-03 15:24:39'),
(46, 30, '2017-02-03 15:29:56'),
(5, 52, '2017-02-08 18:43:53');

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
  `seen` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `to_user` int(11) NOT NULL,
  `from_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`seen`, `timestamp`, `item`, `type`, `to_user`, `from_user`) VALUES
(1, '2017-02-08 18:43:22', 7, 'comment_new', 30, 52),
(1, '2017-02-08 18:43:25', 7, 'post_like', 30, 52),
(1, '2017-02-08 18:43:27', 7, 'post_follow', 30, 52),
(1, '2017-02-08 18:43:53', 5, 'comment_like', 30, 52),
(1, '2017-02-08 18:55:10', 52, 'user_follow', 30, 52),
(1, '2017-02-08 18:55:25', 30, 'user_follow', 52, 30),
(1, '2017-02-08 19:06:10', 41, 'user_new_post', 30, 52),
(1, '2017-02-08 19:06:39', 7, 'post_follow', 30, 40),
(1, '2017-02-08 19:06:41', 7, 'post_like', 30, 40),
(1, '2017-02-08 19:06:43', 40, 'user_follow', 30, 40),
(0, '2017-02-08 19:07:01', 42, 'user_new_post', 52, 30),
(0, '2017-02-08 19:07:01', 42, 'user_new_post', 40, 30);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
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
(2, 30, 'Newwwww', 'First Line\r\n\r\n\r\n\r\nSecond line\r\nFourth line', '2017-02-02 15:53:20', 0, 0, 0, 50, 0),
(3, 30, 'fd', 'fdf', '2017-01-20 09:43:48', 0, 0, 0, 10, 1),
(4, 30, '111', '22222', '2017-02-08 17:55:00', 0, 0, 0, 13, 1),
(5, 30, 'fgfg', 'fgfgf', '2017-01-20 09:43:56', 0, 0, 0, 5, 1),
(6, 30, 'fgfg', 'fgfgf', '2016-11-30 11:55:41', 0, 0, 0, 0, 1),
(7, 30, 'fgfg', 'fgfgf', '2017-02-10 05:14:22', 0, 0, 0, 72, 1),
(8, 30, 'fgfg', 'fgfgf', '2016-11-30 12:01:20', 0, 0, 0, 0, 0),
(9, 30, 'fgfg', 'fgfgf', '2016-11-30 12:00:58', 0, 0, 0, 0, 0),
(10, 30, 'Title here', 'this is my story<br />\r\n<br />\r\nspace<br />\r\n<br />\r\none more time<br />\r\ntesting', '2016-11-30 12:00:30', 0, 0, 0, 0, 0),
(11, 30, 'hahahaha', 'lolololool', '2016-11-30 11:57:16', 0, 0, 0, 0, 0),
(12, 30, 'ok', 'change again', '2016-11-30 11:55:55', 0, 0, 0, 0, 0),
(13, 33, 'New title', 'So lame', '2017-02-08 16:50:07', 0, 0, 0, 6, 1),
(14, 33, 'bipolar test', 'alalalalalalla bipolar', '2016-12-10 18:26:31', 0, 0, 0, 0, 1),
(15, 30, 'test', 'I have pretty severe OCD. My main compulsions are counting (usually syllables), tapping, and having to move my body in certain ways - clenching my fists, rolling my eyes, sucking in my \r\n\r\nstomach, swallowing, bending a joint, etc. All day every day I sit counting and tapping and moving my body in weird ways over and over and over. Its makes my body hurt and makes me really self conscious in public because its probably quite noticeable&#039;&#039;&#039;', '2017-02-02 14:26:55', 0, 0, 0, 0, 1),
(16, 30, 'test long', 'Loneliness seems to trigger it. Or maybe its silence.\r\nI tend to have something on in the background. Music, the TV. While I dont consider myself an extremely social person I have maybe a total of 4 close friends, I do like to be around people. Especially when my mind starts trying to turn on me and become something its not. When the thoughts start racing in, or when the thoughts disappear completely.', '2017-02-02 14:18:10', 0, 0, 0, 0, 1),
(17, 30, 'test', '&#039;', '2017-02-02 14:23:38', 0, 0, 0, 0, 1),
(18, 30, 'test', 'I &#039;dont reall like this ca&#039;t won&#039;t', '2017-02-02 14:23:52', 0, 0, 0, 0, 1),
(19, 30, 'rwe', '&#039;', '2017-02-03 15:40:13', 0, 0, 0, 7, 1),
(20, 30, 'fsdf', '&quot;', '2017-02-02 14:25:20', 0, 0, 0, 0, 1),
(21, 30, 'fsdf', '(fgsfdfg\r\ngdfgdf\r\ng\r\n\r\ndfgdfgdfg', '2017-02-02 15:17:55', 0, 0, 0, 0, 1),
(22, 30, 'breaklines', 'I do love my boyfriend but sometimes he is just too much! Like today... He forgot that we had made a dinner plan and left me waiting in front of the restaurant for 25 mins! Like really??? \r\n\r\nI don&#039;t think I am a high-maintenance girl but lately he has been really lacking in the attention \r\n\r\nnew line again\r\n\r\nnew here\r\n\r\n', '2017-02-02 15:17:38', 0, 0, 0, 0, 1),
(23, 30, 'fdsfs', 'new&lt;br /&gt;\r\nf&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;br /&gt;\r\nsdfsdf&lt;br /&gt;\r\n&lt;br /&gt;\r\nsdofsdfsd', '2017-02-02 15:18:30', 0, 0, 0, 0, 1),
(24, 30, 'ne', 'fdsfsdf&lt;br /&gt;\r\n&lt;br /&gt;\r\nsdfsdf&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;br /&gt;\r\nsdfsdf&lt;br /&gt;\r\nsdf', '2017-02-02 16:35:15', 0, 0, 0, 1, 1),
(25, 30, 'werrwer', 'test this\r\n\r\nfdfdf\r\n\r\n\r\ndfdf\r\n\r\ndf', '2017-02-02 15:40:20', 0, 0, 0, 0, 1),
(26, 30, 'final br', 'adasdasd\r\nbbcvxcvx\r\n\r\nbreakkk\r\nline', '2017-02-03 15:33:04', 0, 0, 0, 10, 1),
(27, 30, 'tes&#039;', 'sdf', '2017-02-08 18:12:34', 0, 0, 0, 27, 1),
(28, 51, 'dsadsad post', '123', '2017-02-08 17:00:35', 0, 0, 0, 2, 1),
(29, 30, 'notification post', 'testing notifs', '2017-02-08 17:07:28', 0, 0, 0, 1, 1),
(30, 30, 'sfsdf', 'sdfsdfsdf', '2017-02-08 17:08:16', 0, 0, 0, 0, 1),
(31, 30, 'asd', 'asd', '2017-02-08 17:08:53', 0, 0, 0, 0, 1),
(32, 30, 'Aa', 'aaa', '2017-02-08 17:09:09', 0, 0, 0, 0, 1),
(33, 30, 'asd', 'asd', '2017-02-08 17:12:42', 0, 0, 0, 2, 1),
(34, 30, 'adasdas', 'dasd', '2017-02-08 17:12:47', 0, 0, 0, 1, 1),
(35, 30, 'test for real', '123', '2017-02-08 17:12:56', 0, 0, 0, 1, 1),
(36, 30, 'testAGN', '123', '2017-02-08 17:14:12', 0, 0, 0, 1, 1),
(37, 30, 'final', '123', '2017-02-08 17:15:59', 0, 0, 0, 2, 1),
(38, 30, '38', '123', '2017-02-08 17:18:33', 0, 0, 0, 2, 1),
(39, 30, '39', '123', '2017-02-08 17:24:51', 0, 0, 0, 2, 1),
(40, 30, '123', '123', '2017-02-08 18:43:45', 0, 0, 0, 12, 1),
(41, 52, '123', '123', '2017-02-08 19:06:23', 0, 0, 0, 2, 1),
(42, 30, 'jess new post', '123', '2017-02-08 19:07:01', 0, 0, 0, 1, 1);

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
(7, 52),
(7, 40);

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
(13, 30, '2017-02-02 07:47:07'),
(14, 30, '2017-02-02 07:48:13'),
(26, 30, '2017-02-03 15:36:21'),
(3, 52, '2017-02-08 17:26:34'),
(19, 30, '2017-02-08 17:52:00'),
(4, 30, '2017-02-08 17:54:53'),
(7, 52, '2017-02-08 18:43:25'),
(7, 40, '2017-02-08 19:06:41');

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
(13, 30, 7, 'test', '0', 'post', '2017-01-18 08:13:19'),
(14, 30, 12, 'hate it', '0', 'comment', '2017-01-22 06:37:01'),
(15, 30, 13, '', '0', 'post', '2017-02-08 16:47:01'),
(16, 30, 13, 'test new', '0', 'post', '2017-02-08 16:49:55'),
(17, 30, 7, 'test comment', '0', 'comment', '2017-02-08 16:50:07');

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
  `description` text NOT NULL,
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
(14, 'images/topics/7783148_eating.jpg', 'images/topics/8140691_eating.jpg', 'Substance Abuse & Addiction', 'Addiction is a chronic disease characterised by drug seeking and use that is compulsive, or difficult to control, despite harmful consequences. ', 'Addiction is a chronic disease characterised by drug seeking and use that is compulsive, or difficult to control, despite harmful consequences. The initial decision to take drugs is voluntary for most people, but repeated drug use can lead to brain changes that challenge an addicted person’s self-control and interfere with their ability to resist intense urges to take drugs. ', '2017-02-01 10:19:35', 0, 0, 'http://www.sana.org.sg', '+65 67321122', 'curated', 3, 0, 1),
(15, 'images/topics/8976659_comment_like.png', 'images/topics/2014246_comments.png', 'Why', 'wer', 'wer', '2017-02-02 10:43:08', 0, 0, 'wer', '', 'curated', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic_follow`
--

CREATE TABLE `topic_follow` (
  `userid` int(11) NOT NULL,
  `topicid` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `description` varchar(255) NOT NULL,
  `datejoin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `affliate`, `image`, `description`, `datejoin`, `active`) VALUES
(30, 'Jess Tan', 'jess_tjl@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'website', 'images/profile/589b4ac7046b8.jpg', 'I love writing', '2016-12-01 08:49:41', 1),
(35, 'Claudia', 'test@mail.commmmm', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', 'lalalal', '0000-00-00 00:00:00', 1),
(36, 'Tan Jia Lin', 'tjl@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-01 08:49:41', 1),
(37, 'testdate', 'testdate@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-02 11:24:44', 1),
(38, 'normal user', 'normaluser@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-02 16:51:45', 1),
(39, 'testprofile', 'prof@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2016-12-10 15:59:12', 1),
(40, 'notification', 'notification@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/avatar.png', '', '2016-12-10 18:13:59', 1),
(41, 'Kourtney', 'jesstjl@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2017-01-20 14:56:33', 1),
(42, 'khloe', 'jesstanjl@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2017-01-20 14:57:23', 1),
(49, 'Tan Jia Lin', 'jesswandering@gmail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2017-01-20 15:17:16', 1),
(50, 'sdf', 'j@mail.com', '202cb962ac59075b964b07152d234b70', 'normal', 'website', 'images/default.svg', '', '2017-02-08 16:52:34', 1),
(51, 'dsasdasd', '1235@mail.com', '25d55ad283aa400af464c76d713c07ad', 'normal', 'website', 'images/default.svg', '', '2017-02-08 16:54:46', 1),
(52, 'admin', 'admin@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'normal', 'website', 'images/default.svg', '', '2017-02-08 17:00:57', 1);

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
(40, 30),
(30, 52),
(52, 30),
(30, 40);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
