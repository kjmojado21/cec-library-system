-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 07:31 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cec_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `book_desc` varchar(1000) NOT NULL,
  `book_genre` varchar(255) NOT NULL,
  `book_img` varchar(255) DEFAULT NULL,
  `book_count` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_code`, `book_desc`, `book_genre`, `book_img`, `book_count`) VALUES
(1, 'The Da Vinci Code', '0-385-50420-9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat nulla tincidunt dapibus luctus. Maecenas et odio quis neque euismod molestie a quis nibh. Quisque id ante elementum, finibus ante ac, bibendum dui. Ut luctus neque at tortor consequat faucibus vitae vel ipsum. In lobortis mi dolor, id feugiat leo facilisis a. Nulla id pulvinar libero, in accumsan est. Nunc efficitur feugiat dolor eget iaculis. Integer nisi ligula, maximus sit amet metus sed, iaculis finibus neque. Praesent elementum, ante vitae ultrices pretium, lacus nulla blandit nunc, at pharetra nisl orci vitae lacus.\r\n\r\nDonec lobortis vehicula luctus. Pellentesque suscipit, sem vitae commodo ultricies, nisi risus scelerisque elit, vitae rutrum magna risus at diam. Nullam nec luctus nisl, eu rhoncus quam. Mauris molestie ornare risus, sit amet posuere nulla ullamcorper tristique. Nullam finibus, nulla id tempus molestie, magna magna semper massa, eu congue lectus urna tincidunt diam. Quisque elementum semper f', 'Fiction', 'davinci.jpg', '5'),
(2, 'The Haunting of Hill House', '0-385-50420-9', 'sample', 'Horror', 'Jackson-HauntingHillHouse.jpg', '2'),
(4, 'The bible', '0-385-50420-9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Legend', NULL, '10'),
(5, 'Almanac', '0-385-50420-9', 'lorem', 'Nonfiction', NULL, '1'),
(7, 'sample', 'sample', 'sample', 'Science Fiction', NULL, '4'),
(8, 'The Da Vinci Code', '0-385-50420-9', 'Book Summary', 'Tall Tale', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `borrow_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_borrowed` date DEFAULT NULL,
  `date_returned` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'BORROWED',
  `penalty` varchar(255) NOT NULL DEFAULT 'NO PENALTY'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`borrow_id`, `student_id`, `book_id`, `date_borrowed`, `date_returned`, `status`, `penalty`) VALUES
(1, 2, 2, '2021-10-17', NULL, 'BORROWED', 'NO PENALTY');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Information Technology Department'),
(2, 'Tourism Department'),
(3, 'Hotel and Restaurant Management department');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre`) VALUES
(11, 'Drama'),
(12, 'Fable'),
(13, 'Fairy Tale'),
(14, 'Fantasy'),
(15, 'Fiction'),
(16, 'Fiction in Verse'),
(17, 'Folklore'),
(18, 'Historical Fiction'),
(19, 'Horror'),
(20, 'Humor'),
(21, 'Legend'),
(22, 'Mystery'),
(23, 'Mythology'),
(24, 'Poetry'),
(25, 'Realistic Fiction'),
(26, 'Science Fiction'),
(27, 'Short Story'),
(28, 'Tall Tale'),
(29, 'Biography/Autobiography'),
(30, 'Essay'),
(31, 'Narrative Nonfiction'),
(32, 'Nonfiction'),
(33, 'Speech');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'A'),
(2, 'user_1', 'user', 'S'),
(3, 'user_2', 'user', 'S'),
(4, 'user_3', 'user', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `fname`, `lname`, `birthdate`, `contact_info`, `department`, `picture`, `login_id`) VALUES
(1, 'Kurt John', 'Mojado', '2021-10-14', '09334673525', 'Information Technology Department', NULL, 1),
(2, 'Fumino', 'Iijima', '2021-10-14', '09334673525', 'Hotel and Restaurant Management department', NULL, 2),
(3, 'Barry', 'Manilow', '2021-10-14', '09334673525', 'Information Technology Department', NULL, 3),
(4, 'Kurt John', 'Mojado', '2021-10-20', '09334673525', 'Information Technology Department', NULL, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
