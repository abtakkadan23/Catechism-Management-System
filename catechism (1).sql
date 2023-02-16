-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 05:03 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catechism`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminregisterfaculty`
--

CREATE TABLE `adminregisterfaculty` (
  `facregid` int(5) NOT NULL,
  `facultyid` int(10) NOT NULL,
  `facultyname` varchar(255) NOT NULL,
  `facultybname` varchar(255) NOT NULL,
  `facultygender` varchar(255) NOT NULL,
  `facultyhname` varchar(255) NOT NULL,
  `facultymobile` text NOT NULL,
  `facultydob` date NOT NULL,
  `facultyclass` int(5) NOT NULL,
  `facultydesig` varchar(255) NOT NULL,
  `facultyqualif` varchar(255) NOT NULL,
  `facultyjob` varchar(255) NOT NULL,
  `facultyfather` varchar(255) NOT NULL,
  `facultymother` varchar(255) NOT NULL,
  `role` int(5) NOT NULL,
  `status` int(5) NOT NULL,
  `facultyimage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminregisterfaculty`
--

INSERT INTO `adminregisterfaculty` (`facregid`, `facultyid`, `facultyname`, `facultybname`, `facultygender`, `facultyhname`, `facultymobile`, `facultydob`, `facultyclass`, `facultydesig`, `facultyqualif`, `facultyjob`, `facultyfather`, `facultymother`, `role`, `status`, `facultyimage`) VALUES
(47, 11086, 'Teena Varghese', 'Maria', 'Female', 'aafssgs', '7897897895', '2024-02-21', 0, 'Faculty', 'MCA', 'Teacher', 'Varghese TK', 'Seena Jose5', 2, 1, 'lincy.jpg'),
(48, 11087, 'Jibin Chacko', 'Thomas', 'Male', 'hsjajsdvsb', '9895865471', '1991-01-06', 0, 'Faculty', 'Bcom', 'Accountant', 'Chacko Thomas', 'Saramma Elizabeth', 2, 1, 'jibin.jpg'),
(49, 11088, 'Lincy Cheriyan', 'Sara', 'Female', 'iunet', '8241565475', '1986-01-01', 0, 'Faculty', 'PHD', 'Professor', 'Jonson CJ', 'Jeena V', 2, 1, 'lincy.jpg'),
(51, 11090, 'Jino Kunnumpirathu', 'Joseph', 'Male', 'Kunnumpurathu', '7984578456', '1982-01-10', 0, 'Faculty', 'PG', 'Teacher', 'Joseph KT', 'Jeena Mary', 2, 1, 'jibin.jpg'),
(53, 11094, 'Akash Anil', 'Thomson', 'Male', 'sssdff', '7894578457', '1992-05-12', 0, 'Asst. Faculty', 'PG', 'Teacher', 'Anil', 'Vincy', 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `adminregisterstudent`
--

CREATE TABLE `adminregisterstudent` (
  `studregid` int(5) NOT NULL,
  `studentid` int(5) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `studentbname` varchar(255) NOT NULL,
  `studentgender` varchar(255) NOT NULL,
  `studenthname` varchar(255) NOT NULL,
  `studentmobile` text NOT NULL,
  `studentdob` date NOT NULL,
  `studentclass` int(5) NOT NULL,
  `studentfather` varchar(255) NOT NULL,
  `studentmother` varchar(255) NOT NULL,
  `role` int(5) NOT NULL,
  `status` int(5) NOT NULL,
  `studentimage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminregisterstudent`
--

INSERT INTO `adminregisterstudent` (`studregid`, `studentid`, `studentname`, `studentbname`, `studentgender`, `studenthname`, `studentmobile`, `studentdob`, `studentclass`, `studentfather`, `studentmother`, `role`, `status`, `studentimage`) VALUES
(22, 11083, 'Amal Biju Thomas', 'Thomas', 'Male', 'Akkattu', '7902372177', '1999-12-19', 8, 'Biju A Thomas', 'Ansamma Devasia', 3, 1, 'download.jpg'),
(23, 11084, 'Abitmon Rajan', 'Abraham', 'Male', 'Charivukalayil', '8281281942', '2000-08-27', 7, 'Rajan CT', 'Jayamol Rajan', 3, 1, 'images.jpg'),
(24, 11085, 'Ann Mary', 'Anna', 'Female', 'Kizhakkayil', '7510554877', '2001-05-12', 7, 'Philip K', 'Nisha Philip', 3, 1, 'images1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `assoclass`
--

CREATE TABLE `assoclass` (
  `assoc_id` int(5) NOT NULL,
  `class_id` int(5) NOT NULL,
  `div_id` int(5) NOT NULL,
  `facid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assoclass`
--

INSERT INTO `assoclass` (`assoc_id`, `class_id`, `div_id`, `facid`) VALUES
(3, 3, 1, 11090),
(7, 2, 1, 11086),
(8, 8, 1, 11088);

-- --------------------------------------------------------

--
-- Table structure for table `catclass`
--

CREATE TABLE `catclass` (
  `classid` int(5) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catclass`
--

INSERT INTO `catclass` (`classid`, `class`) VALUES
(2, 2),
(3, 3),
(5, 5),
(7, 4),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `userid` int(5) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(5) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`userid`, `useremail`, `password`, `role`, `status`) VALUES
(11011, 'admin@catechism.com', 'admin', 1, 1),
(11083, 'abtakkadan@gmail.com', 'amal', 3, 1),
(11084, 'abitmonrajan@gmail.com', 'abit', 3, 1),
(11085, 'annmary@gmail.com', 'ann', 3, 1),
(11086, 'asdf@gmail.com', 'teenaa', 2, 1),
(11087, 'jibin@gmail.com', 'jibin', 2, 1),
(11088, 'lincy@gmail.com', 'lincy', 2, 1),
(11090, 'jino@gmail.com', 'jino', 2, 1),
(11091, 'deon@gmil.com', 'IT Professional', 3, 1),
(11092, 'deon@gmil.com', 'IT Professional', 3, 0),
(11093, 'deon@gmil.com', 'deon', 2, 1),
(11094, 'akash@gmail.com', 'akash', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_div`
--

CREATE TABLE `tbl_div` (
  `divid` int(5) NOT NULL,
  `division` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_div`
--

INSERT INTO `tbl_div` (`divid`, `division`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminregisterfaculty`
--
ALTER TABLE `adminregisterfaculty`
  ADD PRIMARY KEY (`facregid`),
  ADD KEY `facultyid` (`facultyid`);

--
-- Indexes for table `adminregisterstudent`
--
ALTER TABLE `adminregisterstudent`
  ADD PRIMARY KEY (`studregid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `assoclass`
--
ALTER TABLE `assoclass`
  ADD PRIMARY KEY (`assoc_id`);

--
-- Indexes for table `catclass`
--
ALTER TABLE `catclass`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tbl_div`
--
ALTER TABLE `tbl_div`
  ADD PRIMARY KEY (`divid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminregisterfaculty`
--
ALTER TABLE `adminregisterfaculty`
  MODIFY `facregid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `adminregisterstudent`
--
ALTER TABLE `adminregisterstudent`
  MODIFY `studregid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `assoclass`
--
ALTER TABLE `assoclass`
  MODIFY `assoc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `catclass`
--
ALTER TABLE `catclass`
  MODIFY `classid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11095;

--
-- AUTO_INCREMENT for table `tbl_div`
--
ALTER TABLE `tbl_div`
  MODIFY `divid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminregisterfaculty`
--
ALTER TABLE `adminregisterfaculty`
  ADD CONSTRAINT `facultyid` FOREIGN KEY (`facultyid`) REFERENCES `login_table` (`userid`);

--
-- Constraints for table `adminregisterstudent`
--
ALTER TABLE `adminregisterstudent`
  ADD CONSTRAINT `studentid` FOREIGN KEY (`studentid`) REFERENCES `login_table` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
