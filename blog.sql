-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2018 at 03:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Cricket'),
(2, 'Football'),
(3, 'Basketball'),
(4, 'Kabaddi');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 3, 'dfghjkl', 'adrd@gmail.com', 'dryguhjilk', 'unapproved', '2018-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `contest_id` int(11) NOT NULL,
  `contest_title` varchar(255) NOT NULL,
  `contest_winner` int(11) NOT NULL,
  `contest_winnigs` int(11) NOT NULL,
  `contest_fees` int(11) NOT NULL,
  `total_teams` int(11) NOT NULL,
  `contest_post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`contest_id`, `contest_title`, `contest_winner`, `contest_winnigs`, `contest_fees`, `total_teams`, `contest_post_id`) VALUES
(9, 'Mega Contest', 567, 12345678, 10, 124000, 0),
(10, 'Head To Head', 456, 12345, 20, 24557, 0),
(11, 'Free Roll', 789, 9876, 15, 34365849, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_image1` text NOT NULL,
  `post_image2` text NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_contest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_author`, `post_content`, `post_image1`, `post_image2`, `post_status`, `post_date`, `post_category_id`, `post_tags`, `post_contest_id`) VALUES
(2, 'Ind Vs Aus', '3:00 pm', '  World Cup', 'india.png', 'australia.jpg', 'not started', '2018-10-05', 1, 'ind ,aus', 0),
(3, 'Ban Vs Pak', '5:00 pm', '  Triangular Series', 'bangladesh.png', 'pakistan.jpg', 'not started', '2018-10-05', 1, 'ban,pak', 0),
(4, 'South Africa Vs Zimababwe', '9:00 pm', 'Natwest series', 'sa.png', 'zimbabwe.png', 'not started', '2018-10-05', 1, 'sa,zim', 0),
(5, 'Nz Vs England', '11:00 pm', ' Don Bradman Series', 'nz.png', 'england.png', 'not started', '2018-10-05', 1, 'nz,eng', 0);

-- --------------------------------------------------------

--
-- Table structure for table `squad`
--

CREATE TABLE `squad` (
  `id` int(11) NOT NULL,
  `info` varchar(255) NOT NULL,
  `player` varchar(255) NOT NULL,
  `team` varchar(255) NOT NULL,
  `credits` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `squad`
--

INSERT INTO `squad` (`id`, `info`, `player`, `team`, `credits`) VALUES
(1, 'batsman', 'virat kohli', 'india', 10),
(2, 'batsman', 'rohit sharma', 'india', 10),
(3, 'batsman', 'shikhar dhawan', 'india', 9),
(4, 'wicketkeeper', 'm s dhoni', 'india', 9),
(5, 'bowler', 'jasprit bumrah', 'india', 9.5),
(6, 'bowler', 'bhuvaneshwar kumar', 'india', 9.5),
(7, 'bowler', 'yujvendra chahal', 'india', 9),
(8, 'all rounder', 'hardik pandya', 'india', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_role`, `user_firstname`, `user_lastname`, `user_email`, `user_image`) VALUES
(1, 'vivrockers', 'jarineee', 'admin', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`contest_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `squad`
--
ALTER TABLE `squad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `contest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `squad`
--
ALTER TABLE `squad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
