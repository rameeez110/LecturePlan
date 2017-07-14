-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 08:22 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lectureplan`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `attachment_id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `attachment_type` varchar(255) NOT NULL,
  `attachment_title` varchar(255) NOT NULL,
  `attachment_meta` varchar(1000) NOT NULL,
  `attachment_tags` varchar(255) NOT NULL,
  `attachment_details` varchar(500) NOT NULL,
  PRIMARY KEY (`attachment_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`attachment_id`, `user_id`, `attachment_type`, `attachment_title`, `attachment_meta`, `attachment_tags`, `attachment_details`) VALUES
(6, 2, 'document', 'title', '1974-RobotoSpecimenBook.pdf', 'pdf,books,', 'this is nice pdf'),
(9, 2, 'image', 'njn', '5848-Capture.PNG', 'tag,', 'jfk'),
(10, 2, 'image', 'jgjg', '6918-Capture.PNG', 'ta,', 'jh'),
(11, 2, 'image', 'nmb n', '3699-account.PNG', 'pic,png,account,', 'no'),
(12, 2, 'image', 'Sample Attachment', '4212-Koh-Phi-Phi-the-beach.jpg', 'search,koh,image,', 'Sample image for testing');

-- --------------------------------------------------------

--
-- Table structure for table `attachment_tags`
--

CREATE TABLE IF NOT EXISTS `attachment_tags` (
  `attachment_tags_id` int(30) NOT NULL AUTO_INCREMENT,
  `attachment_tags` varchar(255) NOT NULL,
  `attachment_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  PRIMARY KEY (`attachment_tags_id`),
  KEY `attachment_id` (`attachment_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `attachment_tags`
--

INSERT INTO `attachment_tags` (`attachment_tags_id`, `attachment_tags`, `attachment_id`, `user_id`) VALUES
(1, 'pic', 11, 2),
(3, 'pdf', 11, 2),
(4, 'pop', 9, 2),
(5, 'search', 12, 2),
(6, 'koh', 12, 2),
(7, 'image', 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(30) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'English', 'English Teacher'),
(2, 'Professor', 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_unicode_ci,
  `userId` int(11) unsigned DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `message`, `userId`, `createDate`) VALUES
(29, 'io', 2, '2015-02-08 00:11:44'),
(30, 'ui', 2, '2015-02-08 00:11:54'),
(31, 'jippp', 2, '2015-02-08 00:13:23'),
(32, 'okkkk', 2, '2015-02-08 00:13:52'),
(33, 'ok', 2, '2015-02-08 00:19:50'),
(34, 'hi', 2, '2015-02-08 00:21:28'),
(35, 'hi', 2, '2015-02-08 00:22:20'),
(36, 'hello', 2, '2015-02-08 00:22:35'),
(37, 'hello', 2, '2015-02-08 00:22:43'),
(38, 'hello', 2, '2015-02-08 00:23:24'),
(39, 'kese ho?', 2, '2015-02-08 00:23:37'),
(40, 'where men', 2, '2015-02-08 00:24:09'),
(41, 'o bhai', 2, '2015-02-08 00:26:12'),
(42, 'ok', 2, '2015-02-08 00:27:00'),
(43, '', 2, '2015-02-08 00:31:13'),
(44, 'This is cool', 2, '2015-02-23 18:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `endorsement`
--

CREATE TABLE IF NOT EXISTS `endorsement` (
  `endorsement_id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id_endorsed` int(30) NOT NULL,
  `user_id_endorser` int(30) NOT NULL,
  `endorsement_meta` varchar(1000) NOT NULL,
  PRIMARY KEY (`endorsement_id`),
  KEY `user_id_endorsed` (`user_id_endorsed`,`user_id_endorser`),
  KEY `user_id_endorsed_2` (`user_id_endorsed`),
  KEY `user_id_endorser` (`user_id_endorser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `endorsement`
--

INSERT INTO `endorsement` (`endorsement_id`, `user_id_endorsed`, `user_id_endorser`, `endorsement_meta`) VALUES
(18, 2, 2, 'He is proficient in english'),
(20, 2, 2, 'Quite nice'),
(22, 2, 2, 'he is a lovely person');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `follow_id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id_follower` int(30) NOT NULL,
  `user_id_following` int(30) NOT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `user_id_follower` (`user_id_follower`,`user_id_following`),
  KEY `user_id_follower_2` (`user_id_follower`),
  KEY `user_id_following` (`user_id_following`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `like_id` int(30) NOT NULL AUTO_INCREMENT,
  `attachment_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `attachment_id` (`attachment_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`like_id`, `attachment_id`, `user_id`) VALUES
(146, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1498902197);

-- --------------------------------------------------------

--
-- Table structure for table `posts_comments_nm`
--

CREATE TABLE IF NOT EXISTS `posts_comments_nm` (
  `postId` int(11) unsigned NOT NULL,
  `commentId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`postId`,`commentId`),
  KEY `fk_posts_comments_comments` (`commentId`),
  KEY `fk_posts_comments_posts` (`postId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts_comments_nm`
--

INSERT INTO `posts_comments_nm` (`postId`, `commentId`) VALUES
(6, 1),
(10, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 6),
(7, 7),
(6, 8),
(7, 9),
(6, 10),
(10, 11),
(7, 12),
(11, 13),
(11, 14),
(11, 15),
(11, 16),
(11, 17),
(11, 18),
(10, 19),
(7, 20),
(11, 21),
(11, 22),
(11, 23),
(11, 24),
(7, 25),
(10, 26),
(11, 27),
(11, 28),
(11, 29),
(11, 30),
(11, 31),
(11, 32),
(11, 33),
(7, 34),
(7, 35),
(9, 36),
(9, 37),
(9, 38),
(9, 39),
(10, 40),
(11, 41),
(11, 42),
(9, 43),
(6, 44);

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE IF NOT EXISTS `share` (
  `share_id` int(30) NOT NULL AUTO_INCREMENT,
  `attachment_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  PRIMARY KEY (`share_id`),
  KEY `attachment_id` (`attachment_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`share_id`, `attachment_id`, `user_id`) VALUES
(6, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `attachment_id` int(30) NOT NULL,
  PRIMARY KEY (`tag_id`),
  KEY `user_id` (`user_id`,`attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `owner_name` varchar(50) NOT NULL,
  `owner_id` int(12) NOT NULL,
  `comment_id` int(12) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(12) DEFAULT NULL,
  `creator_id` int(12) DEFAULT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `user_email` varchar(128) DEFAULT NULL,
  `comment_text` text,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `owner_name` (`owner_name`,`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_file`
--

CREATE TABLE IF NOT EXISTS `uploaded_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin'),
(2, 'rameez', 'rameez@gmail.com', 'rameez');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_profile_id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `work_address` varchar(500) NOT NULL,
  `qualification` varchar(500) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_profile_id`),
  KEY `user_id` (`user_id`,`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_profile_id`, `user_id`, `category_id`, `profile_picture`, `age`, `gender`, `address`, `work_address`, `qualification`, `name`) VALUES
(1, 2, 2, 'images2019-19-2.jpg', 21, 'male', 'Karachi', 'Karachi', 'BSCS', 'shuja hasan');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `endorsement`
--
ALTER TABLE `endorsement`
  ADD CONSTRAINT `endorsement_ibfk_1` FOREIGN KEY (`user_id_endorsed`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `endorsement_ibfk_2` FOREIGN KEY (`user_id_endorser`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`user_id_follower`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`user_id_following`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`attachment_id`) REFERENCES `attachment` (`attachment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `share_ibfk_1` FOREIGN KEY (`attachment_id`) REFERENCES `attachment` (`attachment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `share_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
