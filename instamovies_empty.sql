-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 08:23 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instamovies_empty`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `verification_code` varchar(7) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_verification`
--

CREATE TABLE `tbl_admin_verification` (
  `verification_id` int(11) NOT NULL,
  `verification_code` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `booking_id` int(255) NOT NULL,
  `booking_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticket_id` varchar(1000) NOT NULL,
  `user_id` int(255) NOT NULL,
  `show_id` int(10) NOT NULL,
  `show_date` date NOT NULL,
  `showtime_id` int(10) NOT NULL,
  `ticket_category` varchar(100) NOT NULL,
  `ticket_type` varchar(100) NOT NULL,
  `ticket_price` float NOT NULL,
  `seat_id` int(11) NOT NULL,
  `seat_number` varchar(100) NOT NULL,
  `total_seat_count` int(10) NOT NULL,
  `full_seat_count` int(10) NOT NULL,
  `kids_seat_count` int(10) NOT NULL,
  `total_amount` float NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings_publish`
--

CREATE TABLE `tbl_bookings_publish` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings_purchase`
--

CREATE TABLE `tbl_bookings_purchase` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings_temporary`
--

CREATE TABLE `tbl_bookings_temporary` (
  `id` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `show_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `showtime_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carousel`
--

CREATE TABLE `tbl_carousel` (
  `id` int(10) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `carousel_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_common_seat_categories`
--

CREATE TABLE `tbl_common_seat_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movies`
--

CREATE TABLE `tbl_movies` (
  `movie_id` int(10) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `category` varchar(200) NOT NULL,
  `running_time` time NOT NULL,
  `release_date` date NOT NULL,
  `language` varchar(200) NOT NULL,
  `director` varchar(100) NOT NULL,
  `synopsis` varchar(1000) NOT NULL,
  `casts` varchar(500) NOT NULL,
  `poster` longblob NOT NULL,
  `banner` longblob NOT NULL,
  `wallpaper` longblob NOT NULL,
  `trailer_url` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `avg_ratings` float NOT NULL,
  `total_ratings` float NOT NULL,
  `num_of_ratings` int(11) NOT NULL,
  `user_ip_addresses` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offers`
--

CREATE TABLE `tbl_offers` (
  `offer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` longtext NOT NULL,
  `image` longblob NOT NULL,
  `banner` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `payment_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `ticket_id` varchar(1000) NOT NULL,
  `process` varchar(100) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `sub_total` float NOT NULL,
  `service_tax` float NOT NULL,
  `paid_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refunds`
--

CREATE TABLE `tbl_refunds` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ticket_id` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seat_maps`
--

CREATE TABLE `tbl_seat_maps` (
  `seat_id` int(200) NOT NULL,
  `seat_category_id` int(11) NOT NULL,
  `seat_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shows`
--

CREATE TABLE `tbl_shows` (
  `show_id` int(2) NOT NULL,
  `theatre_id` int(10) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_showtimes`
--

CREATE TABLE `tbl_showtimes` (
  `showtime_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `starting_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_show_ticket_rates`
--

CREATE TABLE `tbl_show_ticket_rates` (
  `id` int(10) NOT NULL,
  `show_id` int(10) NOT NULL,
  `ticket_category_id` int(11) NOT NULL,
  `ticket_type` varchar(50) NOT NULL,
  `ticket_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theater_seat_categories`
--

CREATE TABLE `tbl_theater_seat_categories` (
  `seat_category_id` int(10) NOT NULL,
  `theatre_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `num_of_rows` int(11) NOT NULL,
  `num_of_columns` int(11) NOT NULL,
  `num_of_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatres`
--

CREATE TABLE `tbl_theatres` (
  `theatre_id` int(10) NOT NULL,
  `theatre_name` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` longblob NOT NULL,
  `Facilities` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `avg_ratings` float NOT NULL,
  `total_ratings` float NOT NULL,
  `num_of_ratings` int(11) NOT NULL,
  `user_ip_addresses` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` int(11) NOT NULL,
  `status` enum('inactive','active') NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `verification_code` (`verification_code`);

--
-- Indexes for table `tbl_admin_verification`
--
ALTER TABLE `tbl_admin_verification`
  ADD PRIMARY KEY (`verification_id`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_bookings_publish`
--
ALTER TABLE `tbl_bookings_publish`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `tbl_bookings_purchase`
--
ALTER TABLE `tbl_bookings_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bookings_temporary`
--
ALTER TABLE `tbl_bookings_temporary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_carousel`
--
ALTER TABLE `tbl_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_common_seat_categories`
--
ALTER TABLE `tbl_common_seat_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_movies`
--
ALTER TABLE `tbl_movies`
  ADD PRIMARY KEY (`movie_id`),
  ADD UNIQUE KEY `movie_name` (`movie_name`);

--
-- Indexes for table `tbl_offers`
--
ALTER TABLE `tbl_offers`
  ADD UNIQUE KEY `offer_id` (`offer_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_refunds`
--
ALTER TABLE `tbl_refunds`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_seat_maps`
--
ALTER TABLE `tbl_seat_maps`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  ADD PRIMARY KEY (`show_id`);

--
-- Indexes for table `tbl_showtimes`
--
ALTER TABLE `tbl_showtimes`
  ADD PRIMARY KEY (`showtime_id`);

--
-- Indexes for table `tbl_show_ticket_rates`
--
ALTER TABLE `tbl_show_ticket_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theater_seat_categories`
--
ALTER TABLE `tbl_theater_seat_categories`
  ADD PRIMARY KEY (`seat_category_id`);

--
-- Indexes for table `tbl_theatres`
--
ALTER TABLE `tbl_theatres`
  ADD PRIMARY KEY (`theatre_id`),
  ADD UNIQUE KEY `theatre_name` (`theatre_name`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin_verification`
--
ALTER TABLE `tbl_admin_verification`
  MODIFY `verification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `booking_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bookings_publish`
--
ALTER TABLE `tbl_bookings_publish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bookings_purchase`
--
ALTER TABLE `tbl_bookings_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bookings_temporary`
--
ALTER TABLE `tbl_bookings_temporary`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_carousel`
--
ALTER TABLE `tbl_carousel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_common_seat_categories`
--
ALTER TABLE `tbl_common_seat_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_movies`
--
ALTER TABLE `tbl_movies`
  MODIFY `movie_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_offers`
--
ALTER TABLE `tbl_offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_refunds`
--
ALTER TABLE `tbl_refunds`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_seat_maps`
--
ALTER TABLE `tbl_seat_maps`
  MODIFY `seat_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  MODIFY `show_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_showtimes`
--
ALTER TABLE `tbl_showtimes`
  MODIFY `showtime_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_show_ticket_rates`
--
ALTER TABLE `tbl_show_ticket_rates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_theater_seat_categories`
--
ALTER TABLE `tbl_theater_seat_categories`
  MODIFY `seat_category_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_theatres`
--
ALTER TABLE `tbl_theatres`
  MODIFY `theatre_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
