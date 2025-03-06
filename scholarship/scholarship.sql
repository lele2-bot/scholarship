-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 02:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `scholars`
--

CREATE TABLE `scholars` (
  `school_id_number` varchar(15) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `maidenname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `street_and_brgy` varchar(100) NOT NULL,
  `town_city_municipality` varchar(100) NOT NULL,
  `province` varchar(20) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `street_and_brgy1` varchar(100) NOT NULL,
  `town_city_municipality1` varchar(100) NOT NULL,
  `province1` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `type_of_disability` varchar(200) NOT NULL,
  `citizenship` varchar(20) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tribal_member` varchar(100) NOT NULL,
  `school_last_attended` varchar(200) NOT NULL,
  `school_address` varchar(200) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `school_sector` varchar(10) NOT NULL,
  `fathers_name` varchar(100) NOT NULL,
  `mothers_name` varchar(100) NOT NULL,
  `fathers_address` varchar(200) NOT NULL,
  `mothers_address` varchar(200) NOT NULL,
  `fathers_occupation` varchar(200) NOT NULL,
  `mothers_occupation` varchar(200) NOT NULL,
  `gross_income` double NOT NULL,
  `no_of_siblings` int(11) NOT NULL,
  `other_educational_assistance` varchar(200) NOT NULL,
  `customfieldid` text NOT NULL,
  `COE_COR` text NOT NULL,
  `cert_of_indigency` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholars`
--

INSERT INTO `scholars` (`school_id_number`, `firstname`, `middlename`, `lastname`, `maidenname`, `dob`, `street_and_brgy`, `town_city_municipality`, `province`, `zipcode`, `street_and_brgy1`, `town_city_municipality1`, `province1`, `sex`, `type_of_disability`, `citizenship`, `mobilenumber`, `email`, `tribal_member`, `school_last_attended`, `school_address`, `year_level`, `school_sector`, `fathers_name`, `mothers_name`, `fathers_address`, `mothers_address`, `fathers_occupation`, `mothers_occupation`, `gross_income`, `no_of_siblings`, `other_educational_assistance`, `customfieldid`, `COE_COR`, `cert_of_indigency`) VALUES
('2000', 'jhayu', 'alavado', 'pajanil', '', '2001-02-06', 'diptan', 'basco', 'batanes', 3900, 'diptan', 'basco', 'batanes', 'Male', '', 'british', '09229922112', 'jhayu@gmail.com', '', 'jhayu alavado pajanil', 'diptan', '4th Year', 'public', 'marthius lee pajanil', 'marvin keith alavado', 'diptan', 'itbayat, batanes', 'dancer', 'kwek kwek vendor', 20, 15, 'no', 'Messenger_creation_16CCC439-D7C2-49DE-9783-FA5473D704DD.jpeg', 'Not Provided', 'Not Provided'),
('2000-2301-ab', 'jhayu', 'alavado', 'pajanil', '', '2001-02-06', 'diptan', 'basco', 'batanes', 3900, 'diptan', 'basco', 'batanes', 'Male', '', 'british', '09229922112', 'jhayu@gmail.com', '', 'jhayu alavado pajanil', 'diptan', '4th Year', 'public', 'marthius lee pajanil', 'marvin keith alavado', 'diptan', 'itbayat, batanes', 'dancer', 'kwek kwek vendor', 20, 15, 'no', 'Messenger_creation_16CCC439-D7C2-49DE-9783-FA5473D704DD.jpeg', 'Not Provided', 'Not Provided'),
('2002-2020-ai', 'jhayu', 'alavado', 'pajanil', '', '2002-02-06', 'diptan', 'basco', 'batanes', 3900, 'diptan', 'basco', 'batanes', 'none', '', 'spanish', '09229922112', 'jhayu@gmail.com', '', 'jhayu alavado pajanil', 'diptan', '1st Year', 'private', 'marthius lee pajanil', 'marvin keith alavado', 'diptan', 'itbayat, batanes', 'dancer', 'dancer', 100, 20, 'no', 'Daisy Ghost Keychain - #4 - Smiley Ghost.jpeg', 'Not Provided', 'Not Provided'),
('2020', 'louis', 'argonza', 'castle', '', '2001-03-05', 'beateria street', 'basco', 'batanes', 3900, 'kayhuvokan', 'basco', 'batanes', 'Male', '', 'filipino', '09229922112', 'yugeshvernama32@gmail.com', '', 'bsc', 'washington', '4th Year', 'public', 'Claire A N Paco', 'Claire A N Paco', 'beateria street', 'mahatao, batanes', 'farmer', 'farmer', 1000, 5, 'yes', 'Brown Vintage Ornament Paper Border_20241201_150546_0000.jpg', '', ''),
('2021', 'Claire', 'A N', 'Paco', 'xcvbnm', '1998-06-19', 'beateria street', 'basco', 'batanes', 3900, 'beateria street', 'basco', 'batanes', 'Male', 'tae', 'filipino', '09229922112', 'yugeshvernama32@gmail.com', 'hehe', 'Claire A N Paco', 'beateria street', '2nd Year', 'private', 'Claire A N Paco', 'Claire A N Paco', 'beateria street', 'beateria street', 'farmer', 'farmer', 1000, 5, 'no', 'Daisy Ghost Keychain - #4 - Smiley Ghost.jpeg', '', ''),
('2022', 'Claire', 'A N', 'Paco', '', '1999-11-19', 'beateria street', 'basco', 'batanes', 3900, 'beateria street', 'basco', 'batanes', 'none', '', 'filipino', '09229922112', 'lhelhepaco@gmail.com', '', 'Claire A N Paco', 'beateria street', '3rd Year', 'public', 'Claire A N Paco', 'Claire A N Paco', 'beateria street', 'mahatao, batanes', 'farmer', 'farmer', 1000, 5, 'none', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `scholarshipid` int(11) NOT NULL,
  `scholarshipname` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `eligibility_criteria` text NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `sponsor` varchar(150) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scholars`
--
ALTER TABLE `scholars`
  ADD PRIMARY KEY (`school_id_number`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`scholarshipid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
