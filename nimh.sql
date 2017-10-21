-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2017 at 09:11 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nimh`
--

-- --------------------------------------------------------

--
-- Table structure for table `kit_costs`
--

CREATE TABLE `kit_costs` (
  `type` varchar(10) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kit_costs`
--

INSERT INTO `kit_costs` (`type`, `cost`) VALUES
('Type 1', 8000),
('Type 2', 7000),
('Type 3', 6800),
('Type 4', 9500);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_number` int(11) NOT NULL,
  `registration_date` varchar(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `village` varchar(300) NOT NULL,
  `district` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `gname` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `fincome` varchar(11) NOT NULL,
  `level` varchar(300) NOT NULL,
  `Recommended_Kit` varchar(10) NOT NULL,
  `aadhar` varchar(12) NOT NULL,
  `caste` varchar(5) NOT NULL,
  `escort` varchar(200) NOT NULL,
  `ephone` int(11) NOT NULL,
  `esc_pic` varchar(100) NOT NULL,
  `a_proof` varchar(100) NOT NULL,
  `d_proof` varchar(100) NOT NULL,
  `i_proof` varchar(100) NOT NULL,
  `date_given` varchar(20) NOT NULL,
  `cost` int(11) NOT NULL,
  `subsidy_provided` int(11) NOT NULL,
  `outbeneficiary` int(11) NOT NULL,
  `expenses` int(11) NOT NULL,
  `total_paid` int(11) NOT NULL,
  `days_stayed` int(11) NOT NULL,
  `travel_allowance` int(11) NOT NULL,
  `accompanied` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_number`, `registration_date`, `fname`, `lname`, `picture`, `age`, `sex`, `address`, `village`, `district`, `state`, `gname`, `phone`, `fincome`, `level`, `Recommended_Kit`, `aadhar`, `caste`, `escort`, `ephone`, `esc_pic`, `a_proof`, `d_proof`, `i_proof`, `date_given`, `cost`, `subsidy_provided`, `outbeneficiary`, `expenses`, `total_paid`, `days_stayed`, `travel_allowance`, `accompanied`) VALUES
(20, '', 'fdsf', 'jhkjh', 'C:/xampp/htdocs/NIMH/profile_pics/635408_1499000857549.png', 0, 'Male', 'jhkjh', 'jhkjh', 'kjhkjh', 'jhkj', 'jhkjh', '5465', '5465', 'jhkjh', '', '54', 'ST', 'khlkjh', 4654, 'C:/xampp/htdocs/NIMH/escort_pics/635408_1499000857549.png', 'C:/xampp/htdocs/NIMH/aadhar_proof/635408_1499000857549.png', 'C:/xampp/htdocs/NIMH/disability_proof/635408_1499000857549.png', 'C:/xampp/htdocs/NIMH/income_proof/635408_1499000857549.png', '', 0, 0, 0, 0, 0, 0, 0, 'Yes'),
(26, '', 'Abcd', 'Ldfds', 'C:/xampp/htdocs/NIMH/profile_pics/1.jpg', 45, 'Male', 'Hyderabad', 'Village', 'Hyderabad', 'Telangana', 'Defgh', '2147483647', '150000', 'abc', '', '2147483647', 'ST', 'skoiod', 1234567890, 'C:/xampp/htdocs/NIMH/escort_pics/1.jpg', 'C:/xampp/htdocs/NIMH/aadhar_proof/1.jpg', 'C:/xampp/htdocs/NIMH/disability_proof/1.jpg', 'C:/xampp/htdocs/NIMH/income_proof/1.jpg', '', 0, 0, 0, 0, 0, 0, 0, ''),
(27, '', 'rajeev', 'fs', 'C:/xampp/htdocs/NIMH/profile_pics/1.jpg', 23, 'Male', 'fsfsf', 'fwsf', 'Hyderabad', 'Telangana', 'hhh', '1234567890', '150000', 'ssff', '', '2147483647', 'ST', 'fdfsdf', 1234567890, 'C:/xampp/htdocs/NIMH/escort_pics/1.jpg', 'C:/xampp/htdocs/NIMH/aadhar_proof/1.jpg', 'C:/xampp/htdocs/NIMH/disability_proof/1.jpg', 'C:/xampp/htdocs/NIMH/income_proof/1.jpg', '', 0, 0, 0, 0, 0, 0, 0, ''),
(31, '', 'Uzma', 'Farhath', 'C:/xampp/htdocs/NIMH/profile_pics/code geass lamperouge lelouch cc 1600x1200 wallpaper_www.wallpaper', 20, 'Female', 'sfd', 'ugig', 'gig', 'gygyg', 'dfgfsgs', '2147483647', '6541215', 'moderate', 'Type 4', '2147483647', 'OBC', 'fsdf', 1324654654, 'C:/xampp/htdocs/NIMH/escort_pics/224760.jpg', 'C:/xampp/htdocs/NIMH/aadhar_proof/lelouch-lamperouge-and-c-c-code-geass-4661.jpg', 'C:/xampp/htdocs/NIMH/disability_proof/224760.jpg', 'C:/xampp/htdocs/NIMH/income_proof/224760.jpg', '', 0, 0, 0, 0, 0, 0, 0, ''),
(32, '', 'Sukanya', 'Reddy', 'profile_pics/ryuzaki.jpg', 20, 'Male', 'Reddy Nagar, Miryalguda', 'Miryalguda', 'Miryalguda', 'Telangana', 'Venkat Reddy', '9642904048', '10,00,000', 'moderate', 'Type 4', '123456781234', 'OC', 'Suhas', 2147483647, 'C:/xampp/htdocs/NIMH/escort_pics/no-game-no-life-anime-sora-shiro-1920x1080.jpg', 'C:/xampp/htdocs/NIMH/aadhar_proof/lelouch-lamperouge-and-c-c-code-geass-4661.jpg', 'C:/xampp/htdocs/NIMH/disability_proof/no-game-no-life-anime-sora-shiro-1920x1080.jpg', 'C:/xampp/htdocs/NIMH/income_proof/code-geass-lelouch-wallpaper-2.jpg', '16/10/2017', 9500, 9500, 70000, 9000, 88500, 2, 0, 'no'),
(33, '', 'Sukanya', 'Reddy', 'fsdfdsf', 20, 'female', 'dfsd', 'hghg', 'yguyg', 'uyguyg', 'uyguy', '9642904048', '22154', 'moderate', 'Type 2', '123456781234', 'OC', 'fsdfsdf', 9642904, 'fff', 'hjhiu', 'iuhiug', 'igigiy', '12/04/2011', 546, 454, 0, 0, 0, 0, 0, ''),
(34, '', 'Sukanya', 'jjj', 'C:/xampp/htdocs/NIMH/profile_pics/15319273_721058238043544_2550808104569483410_n.jpg', 23, '', 'errete', 'sdgrd', 'sfdfd', '`rgret', 'fewrwew', 'werewrwewr', 'eadfesdfsd', 'sdfsdfsd', 'sdfsdff', '234545644343', 'ST', 'wefwef', 0, 'C:/xampp/htdocs/NIMH/escort_pics/15319273_721058238043544_2550808104569483410_n.jpg', 'C:/xampp/htdocs/NIMH/aadhar_proof/15319273_721058238043544_2550808104569483410_n.jpg', 'C:/xampp/htdocs/NIMH/disability_proof/15319273_721058238043544_2550808104569483410_n.jpg', 'C:/xampp/htdocs/NIMH/income_proof/15319273_721058238043544_2550808104569483410_n.jpg', '', 0, 0, 0, 0, 0, 0, 0, ''),
(50, '04/25/15', 'Suhas', 'Suhas', '', 21, 'Male', 'Suncity', 'Rangareddy', 'Rangareddy', 'Telangana', 'Sukanya', '9642904048', '100000', 'moderate', 'Type 4', '123412341234', 'BC', 'sukanya', 2147483647, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kit_costs`
--
ALTER TABLE `kit_costs`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
