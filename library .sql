-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 12:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(5) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_category` varchar(20) NOT NULL,
  `book_image` varchar(50) NOT NULL,
  `book_status` varchar(15) NOT NULL,
  `shelf_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_category`, `book_image`, `book_status`, `shelf_id`) VALUES
(1, 'Harry Potter And The Philosopher,s Stone ', 'Fiction', 'images/harry1.png', 'Available', 1),
(2, 'Harry potter And The Chamber Of Secrets', 'Fiction', 'images/harry2.png', 'Available', 1),
(3, 'Harry Potter And The Prisoner Of Azkaban', 'Fiction', 'images/harry3.png', 'Available', 1),
(4, 'Harry Potter And The Goblet Of Fire', 'Fiction', 'images/harry4.png', 'Available', 1),
(5, 'Harry Potter And The Order Of The Phoenix', 'Fiction', 'images/harry5.png', 'Available', 1),
(6, 'Harry Potter And The Half-Blood Prince', 'Fiction', 'images/harry6.png', 'Available', 1),
(7, 'Harry Potter And The Deathly Hallows book', 'Fiction', 'images/harry7.png', 'Available', 1),
(8, 'World History Patterns Of Interaction', 'History', 'images/worldhistory.png', 'Available', 2),
(9, 'History Of Malaysia', 'History', 'images/historyofmalaysia.png', 'Available', 2),
(10, 'Encyclopedia Of Computer Science', 'Computer Science', 'images/computerscience.png', 'Available', 3),
(11, 'Explorations In Computing', 'Computer Science', 'images/explorecomputer.png', 'Available', 3),
(12, 'Scientific Computing For Scientists And Engineers', 'Computer Science', 'images/scientificcomputing.png', 'Available', 3);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `book_id` int(5) DEFAULT NULL,
  `borrow_book` varchar(50) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `borrow_name` varchar(30) NOT NULL,
  `borrow_phone` varchar(13) NOT NULL,
  `borrow_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `shelf_id` int(4) NOT NULL,
  `shelf_category` varchar(20) NOT NULL,
  `shelf_num` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`shelf_id`, `shelf_category`, `shelf_num`) VALUES
(1, 'Fiction', 1),
(2, 'History', 2),
(3, 'Computer Science', 3),
(4, 'Romance', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` int(6) NOT NULL,
  `user_phone_num` varchar(13) NOT NULL,
  `user_lavel` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `user_phone_num`, `user_lavel`, `email`) VALUES
(1, 'Rahman Bin Ayub', 111111, '0111111111', 'Staff', 'Rahman@gmail.com'),
(2, 'Ali Bin Abu', 999999, '011123456789', 'Member', 'AliAbu@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `shelf_id` (`shelf_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`shelf_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `shelf_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `shelf_id` FOREIGN KEY (`shelf_id`) REFERENCES `shelf` (`shelf_id`);

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
