-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2016 at 04:05 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` varchar(55) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_by`, `created_time`, `updated_time`, `status`) VALUES
(1, 'WordPress', 'Rony Kader', '2016-05-22 11:39:15', '0000-00-00 00:00:00', 1),
(2, 'Codeigniter', 'Palash', '2016-05-22 12:10:00', '0000-00-00 00:00:00', 1),
(3, 'Laravel', 'Sagor', '2016-05-22 04:05:07', '0000-00-00 00:00:00', 1),
(4, 'OOP', 'Dalower', '2016-05-22 14:14:11', '0000-00-00 00:00:00', 1),
(5, 'Developer', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'Engineer', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'Mdeical', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'Doctors', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 'Bangladesh', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, 'Health', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_table`
--

CREATE TABLE IF NOT EXISTS `page_table` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_table`
--

INSERT INTO `page_table` (`id`, `title`, `body`, `created_time`) VALUES
(1, 'About', '&lt;p&gt;&lt;span&gt;&lt;strong&gt;Updated Page&lt;/strong&gt; Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, &lt;strong&gt;from a Lorem Ipsum passage&lt;/strong&gt;, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/span&gt;&lt;/p&gt;', '0000-00-00 00:00:00'),
(2, 'Team Member', '&lt;p&gt;&lt;span&gt;&lt;strong&gt;Th&amp;nbsp;&lt;/strong&gt;ns of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.&lt;/span&gt;&lt;/p&gt;', '0000-00-00 00:00:00'),
(3, 'Support', '&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE IF NOT EXISTS `post_table` (
  `id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `tag` varchar(55) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `author` varchar(55) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `name` varchar(120) NOT NULL DEFAULT 'just Testing'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`id`, `cat_id`, `tag`, `title`, `body`, `images`, `author`, `created_time`, `updated_time`, `status`, `name`) VALUES
(12, 1, '', 'WordPress is the best', '<p><span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</span></p>', 'uploads/2ec2d1d865.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'just Testing'),
(13, 3, '', 'Laravel is Awesome', '&lt;p&gt;&lt;span&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like&amp;nbsp;&lt;/span&gt;&lt;/p&gt;', 'uploads/92434f4a37.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'just Testing');

-- --------------------------------------------------------

--
-- Table structure for table `slogan_log`
--

CREATE TABLE IF NOT EXISTS `slogan_log` (
  `id` int(11) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slogan_log`
--

INSERT INTO `slogan_log` (`id`, `slogan`, `title`, `logo`) VALUES
(1, 'Blog Slogan now dynamic', 'Blog title now dynamic', 'uploads/logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `images` varchar(100) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `images`, `created_time`, `updated_time`, `status`) VALUES
(1, 'ronykader', 'rony@gmail.com', '123456', 'rony.jpg', '2016-05-22 08:18:21', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_table`
--
ALTER TABLE `page_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slogan_log`
--
ALTER TABLE `slogan_log`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `page_table`
--
ALTER TABLE `page_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `slogan_log`
--
ALTER TABLE `slogan_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
