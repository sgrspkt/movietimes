-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2017 at 04:22 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movietimes`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_title` varchar(50) NOT NULL,
  `about_desc` varchar(50) NOT NULL,
  `about_thumbnail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_title`, `about_desc`, `about_thumbnail`) VALUES
(1, 'asdfsda', 'adf', ''),
(2, 'asdfsda', 'adf', ''),
(3, 'dfdsf', 'asdfdf', '17_10_19_23_10_36_Screenshot.png'),
(4, 'asdf', 'asdf', '17_10_19_24_10_42_Screenshot.png'),
(5, 'dfd', 'sdfsdf', '17_10_19_26_10_48_Screenshot.png'),
(6, 'sagar', 'sdfsdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ckpassword` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `facebook_url` varchar(50) NOT NULL,
  `twitter_url` varchar(50) NOT NULL,
  `instagram_url` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `ckpassword`, `email`, `phone`, `logo`, `facebook_url`, `twitter_url`, `instagram_url`, `role`) VALUES
(1, 'admin', 'admin@123', 'adf', 'sgr.sapkota5@gmail.com', 'adf', 'test', 'adf', 'adf', 'adf', 1),
(2, 'test', 'test@123', 'test@123', 'test@gmail.com', '124434343', 'test', 'alsdjflakjdf', 'alsdkjfladkjf', 'alsfkjladkfj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question_name` varchar(50) NOT NULL,
  `answer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(50) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `image_thumbnail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_id` int(11) NOT NULL,
  `hall_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `map` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_id`, `hall_name`, `location`, `map`) VALUES
(1, 'test', 'test', 'test'),
(2, 'asdasdf', 'test', 'test'),
(3, 'adf', 'adfffd', 'adfdfdd'),
(4, 'kumari', 'dhobi ghat', 'sdlfjaldfkjaf'),
(5, 'jaynepal', 'naxal', 'sdfddf'),
(6, 'qfx-civil', 'civil mall', 'alskdflkjf'),
(7, 'qfx-civil', 'civil mall', 'alskdflkjf'),
(8, 'qfx-civil', 'civil mall', 'alskdflkjf'),
(9, 'adfadf', 'adfadf', 'adfadf');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(50) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `movie_release_date` date NOT NULL,
  `thumbnail_image` varchar(50) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `trailor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `privacy_policy_id` int(11) NOT NULL,
  `privacy_policy_name` varchar(50) NOT NULL,
  `privacy_policy_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `shift_name` varchar(50) NOT NULL,
  `shift_time` time NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(50) NOT NULL,
  `slider_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `subscriber_id` int(11) NOT NULL,
  `subscriber_email` varchar(50) NOT NULL,
  `subscriber_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`),
  ADD KEY `language_movie_id` (`movie_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `shift_price` (`shift_id`,`hall_id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`privacy_policy_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `rating_movie_id` (`movie_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`),
  ADD KEY `shift_movie_id` (`movie_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `privacy_policy_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `language`
--
ALTER TABLE `language`
  ADD CONSTRAINT `language_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `shift`
--
ALTER TABLE `shift`
  ADD CONSTRAINT `shift_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
