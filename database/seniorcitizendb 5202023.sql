-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 05:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seniorcitizendb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Crisanto Amoguis', 'admin', 9304572670, 'crisantoamoguis@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-10-11 04:36:52'),
(2, 'Crisanto Escudero', 'crisanto', 9503405148, 'crisantoescuderoamoguis@gmail.com', '676cbe9b7e4eef1b1167453140fff10b', '2023-04-18 06:17:48'),
(5, 'Crisanto Escudero Amoguis', 'crisanto.amoguis', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'fbb494889c86812f23f482770bea8294', '2023-04-18 07:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `ID` int(5) NOT NULL,
  `ClassName` varchar(50) DEFAULT NULL,
  `Section` varchar(20) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`ID`, `ClassName`, `Section`, `CreationDate`) VALUES
(19, 'Crisanto E. Amoguis', 'Abachanan', '2022-11-17 07:54:24'),
(26, 'Crisanto E. Amogis', 'Anibongan', '2022-11-25 05:33:32'),
(27, 'Crisanto E. Amoguis', 'Bugsok', '2022-11-25 05:33:59'),
(28, 'Crisanto E. Amoguis', 'Cahayag', '2022-11-25 05:34:19'),
(29, 'Crisanto E. Amoguis', 'Canlangit', '2022-11-25 05:34:42'),
(30, 'Crisanto E. Amoguis', 'Canta-ub', '2022-11-25 05:35:05'),
(31, 'b', 'Casilay', '2023-03-30 03:26:50'),
(32, 'b', 'Danicop', '2023-03-30 03:26:59'),
(34, 'b', 'Dusita', '2023-03-30 03:27:15'),
(35, 'b', 'La Union', '2023-03-30 03:27:28'),
(37, 'b', 'Lataban', '2023-03-30 03:27:40'),
(39, 'b', 'Magsaysay', '2023-03-30 03:27:54'),
(40, 'b', 'Matin-ao', '2023-03-30 03:28:06'),
(41, 'b', 'Nan-od', '2023-03-30 03:28:12'),
(42, 'b', 'Poblacion', '2023-03-30 03:28:18'),
(43, 'b', 'Salvador', '2023-03-30 03:28:24'),
(44, 'b', 'San Isidro', '2023-03-30 03:28:47'),
(45, 'b', 'San Jose', '2023-03-30 03:28:56'),
(46, 'b', 'San Juan', '2023-03-30 03:29:07'),
(47, 'b', 'Santa Cruz', '2023-03-30 03:29:14'),
(48, 'b', 'Villa Garcia', '2023-03-30 03:29:19'),
(49, 'b', 'San Augustin', '2023-03-30 03:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `ID` int(5) NOT NULL,
  `barangay_id` bigint(250) DEFAULT NULL,
  `NoticeTitle` mediumtext DEFAULT NULL,
  `Barangay` varchar(100) DEFAULT NULL,
  `NoticeMsg` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`ID`, `barangay_id`, `NoticeTitle`, `Barangay`, `NoticeMsg`, `CreationDate`) VALUES
(81, 39, 'RELEASE OF PENSION', 'Anibongan', 'PENSION', '2023-05-18 17:24:21'),
(82, 60, 'RELEASE OF PENSION', 'Anibongan', 'PENSION', '2023-05-18 17:24:21'),
(83, 61, 'RELEASE OF PENSION', 'Anibongan', 'PENSION', '2023-05-18 17:24:21'),
(84, 74, 'RELEASE OF PENSION', 'Anibongan', 'PENSION', '2023-05-18 17:24:21'),
(85, 82, 'RELEASE OF PENSION', 'Anibongan', 'PENSION', '2023-05-18 17:24:21'),
(86, 83, 'RELEASE OF PENSION', 'Anibongan', 'PENSION', '2023-05-18 17:24:21'),
(87, 102, 'RELEASE OF PENSION', 'Anibongan', 'PENSION', '2023-05-18 17:24:21'),
(88, 26, 'RELEASE OF PENSION', 'Abachanan', 'WHAT: RELEASING PENSION\r\nWHERE: ABACHANAN COVERED COURT\r\nWHEN: JULY 22, 2023', '2023-05-19 11:04:50'),
(89, 32, 'RELEASE OF PENSION', 'Abachanan', 'WHAT: RELEASING PENSION\r\nWHERE: ABACHANAN COVERED COURT\r\nWHEN: JULY 22, 2023', '2023-05-19 11:04:50'),
(90, 35, 'RELEASE OF PENSION', 'Abachanan', 'WHAT: RELEASING PENSION\r\nWHERE: ABACHANAN COVERED COURT\r\nWHEN: JULY 22, 2023', '2023-05-19 11:04:51'),
(91, 38, 'RELEASE OF PENSION', 'Abachanan', 'WHAT: RELEASING PENSION\r\nWHERE: ABACHANAN COVERED COURT\r\nWHEN: JULY 22, 2023', '2023-05-19 11:04:51'),
(92, 65, 'RELEASE OF PENSION', 'Abachanan', 'WHAT: RELEASING PENSION\r\nWHERE: ABACHANAN COVERED COURT\r\nWHEN: JULY 22, 2023', '2023-05-19 11:04:51'),
(93, 72, 'RELEASE OF PENSION', 'Abachanan', 'WHAT: RELEASING PENSION\r\nWHERE: ABACHANAN COVERED COURT\r\nWHEN: JULY 22, 2023', '2023-05-19 11:04:51'),
(94, 79, 'RELEASE OF PENSION', 'Abachanan', 'WHAT: RELEASING PENSION\r\nWHERE: ABACHANAN COVERED COURT\r\nWHEN: JULY 22, 2023', '2023-05-19 11:04:51'),
(95, 27, 'RELEASE OF PENSION', 'Bugsok', 'Pension Released', '2023-05-19 11:15:27'),
(96, 33, 'RELEASE OF PENSION', 'Bugsok', 'Pension Released', '2023-05-19 11:15:27'),
(97, 52, 'RELEASE OF PENSION', 'Bugsok', 'Pension Released', '2023-05-19 11:15:27'),
(98, 59, 'RELEASE OF PENSION', 'Bugsok', 'Pension Released', '2023-05-19 11:15:27'),
(99, 68, 'RELEASE OF PENSION', 'Bugsok', 'Pension Released', '2023-05-19 11:15:27'),
(100, 92, 'RELEASE OF PENSION', 'Bugsok', 'Pension Released', '2023-05-19 11:15:27'),
(101, 40, 'RELEASE OF PENSION', 'Cahayag', 'Pension', '2023-05-19 11:16:02'),
(102, 97, 'RELEASE OF PENSION', 'Cahayag', 'Pension', '2023-05-19 11:16:02'),
(103, 41, 'RELEASE OF PENSION', 'Canlangit', 'Pension', '2023-05-19 11:16:57'),
(104, 78, 'RELEASE OF PENSION', 'Canlangit', 'Pension', '2023-05-19 11:16:57'),
(105, 94, 'RELEASE OF PENSION', 'Canlangit', 'Pension', '2023-05-19 11:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblonline_registration`
--

CREATE TABLE `tblonline_registration` (
  `ID` int(10) NOT NULL,
  `StuID` varchar(200) DEFAULT NULL,
  `SurName` varchar(200) DEFAULT NULL,
  `MiddleName` varchar(200) DEFAULT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `NickName` varchar(250) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Age` bigint(11) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Religion` varchar(200) DEFAULT NULL,
  `PoB` varchar(500) DEFAULT NULL,
  `ContactNumber` bigint(11) DEFAULT NULL,
  `CitiEmail` varchar(200) DEFAULT NULL,
  `CivilStatus` varchar(200) DEFAULT NULL,
  `PuAddress` varchar(200) DEFAULT NULL,
  `Barangay` varchar(200) DEFAULT NULL,
  `EduAt` varchar(200) DEFAULT NULL,
  `Skills` varchar(200) DEFAULT NULL,
  `Occupation` varchar(200) DEFAULT NULL,
  `AnIncome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoB` varchar(200) CHARACTER SET dec8 COLLATE dec8_swedish_ci DEFAULT NULL,
  `FcName` mediumtext DEFAULT NULL,
  `Relationship` mediumtext DEFAULT NULL,
  `FcAge` bigint(11) DEFAULT NULL,
  `FcCiviStatus` varchar(200) DEFAULT NULL,
  `FcIncome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fcoccupation` varchar(200) DEFAULT NULL,
  `AltenateNumber` bigint(11) DEFAULT NULL,
  `DateofAdmission` timestamp NULL DEFAULT current_timestamp(),
  `Pension` varchar(50) DEFAULT NULL,
  `Status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblonline_registration`
--

INSERT INTO `tblonline_registration` (`ID`, `StuID`, `SurName`, `MiddleName`, `FirstName`, `NickName`, `DOB`, `Age`, `Gender`, `Religion`, `PoB`, `ContactNumber`, `CitiEmail`, `CivilStatus`, `PuAddress`, `Barangay`, `EduAt`, `Skills`, `Occupation`, `AnIncome`, `NoB`, `FcName`, `Relationship`, `FcAge`, `FcCiviStatus`, `FcIncome`, `Fcoccupation`, `AltenateNumber`, `DateofAdmission`, `Pension`, `Status`) VALUES
(59, '2333', 'amoguis', 'escudero', 'crisanto', 'potpot', '2001-04-22', 78, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'Bugsok', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, '2023-03-18 03:11:10', 'No', 'Approved'),
(60, '1000231', 'ybanez', 'galinato', 'jennefer', 'jen', '2002-02-06', 78, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'jenneferybanez@gmail.com', 'Married', 'purok 2', 'Abachanan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, '2023-03-18 03:17:44', 'Yes', 'Approved'),
(61, '1002311', 'cadiz amoguis', 'de raizel', 'etrama', 'rai', '1222-02-24', 80, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 9503405148, '23@gmail.com', 'Married', 'purok 6- ilang-ilang', 'Anibongan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 930457267, '2023-03-22 12:40:38', 'Yes', 'Approved'),
(62, '12312131', 'amoguis', 'galinato', 'benimaru', 'jen', '2001-04-22', 80, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, '23@gmail.com', 'Single', 'purok 2', 'San Jose', 'college graduate', 'none', 'electro archon', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Married', '500000', 'tourism', 93045726700, '2023-03-27 01:55:18', 'Yes', 'Approved'),
(65, '14389', 'ogre', 'veldora', 'benimaru', 'rimuru-sama', '2001-04-27', 75, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'Married', 'purok 2', 'Abachanan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'gamer', 93045726711, '2023-03-27 02:36:34', 'Yes', 'Approved'),
(67, '12121212', 'Valintine', 'queen of nightmare', 'luminas', 'waifu', '2023-03-29', 78, 'Female', 'roman catholic', 'pilar, dagohoy, bohol', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'Married', 'purok 2', 'San Isidro', 'college graduate', 'none', 'teacher', '100000000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726777, '2023-03-27 09:21:28', 'Yes', 'Approved'),
(68, '1212121212', 'joestar', 'jojo', 'jonathan', 'jojo', '2001-03-29', 80, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'crisantoescuderoamoguis@gmail.com', 'Single', 'purok 6- ilang-ilang', 'San Augustin', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726700, '2023-03-27 09:58:53', 'No', 'Approved'),
(69, '3454', 'uzumaki', 'KYUGA', 'BURUTO', 'JIGEN', '2023-03-28', 78, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Divorced', 'purok 2', 'Anibongan', 'college graduate', 'none', 'electro archon', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Single', '500000', 'gamer', 93045726722, '2023-03-28 01:22:18', 'Yes', 'Approved'),
(70, '1000232', 'amoguis', 'duwetes', 'persinito', 'percy', '1956-07-13', 66, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405144, '23@gmail.com', 'Single', 'purok 2', 'Bugsok', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Married', '500000', 'tourism', 93045726777, '2023-03-28 01:25:37', 'No', 'Approved'),
(71, '01234', 'yaeger', 'titan', 'crisanto', 'ereh', '2023-03-28', 78, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405144, '23@gmail.com', 'Single', 'purok 2', 'Anibongan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726700, '2023-03-28 01:28:06', 'Yes', 'Approved'),
(72, '0012', 'yaeger', 'titan', 'crisanto', 'ereh', '2023-03-28', 80, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405144, '23@gmail.com', 'Single', 'purok 2', 'Anibongan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726700, '2023-03-28 01:28:48', 'Yes', 'Approved'),
(73, '1000235', 'cutin', 'labus', 'rizel', 'riz', '2023-03-22', 23, 'Female', 'roman catholic', 'pilar, dagohoy, bohol', 950340519, 'wefagreyerb@gmail.com', 'Divorced', 'purok 5', 'Canlangit', 'college graduate', 'singing', 'teacher', '20000', 'reisa', 'hinath', 'wife', 60, 'Divorced', '30000', 'tourism', 9668890202, '2023-03-28 09:38:49', 'No', 'Approved'),
(74, '00111', 'musne', 'escabusa', 'daisy', 'dys', '2000-04-29', 22, 'Female', 'roman catholic', 'abachanan sierra bullones bohol', 9668890202, 'musnedaisy06@gmail.com', 'Single', 'purok 5', 'Abachanan', 'college graduate', 'dancing and singing', 'student', '5000', 'none', 'jaime musne', 'father', 58, 'Married', '12000', 'farmer', 9563489765, '2023-03-28 12:29:45', 'No', 'Approved'),
(75, '00123', 'musne', 'esacabusa', 'daisy', 'dys', '2000-04-29', 80, 'Male', 'roman catholic', 'sierra, dagohoy, bohol', 9503405149, 'jia@gmail.com', 'Married', 'purok 5', 'San Augustin', 'college graduate', 'bow', 'teacher', '20000', 'crissa', 'hinat4', 'sister', 57, 'Married', '20000', 'farmer', 9668890202, '2023-03-29 01:39:06', 'No', 'Approved'),
(76, '1000232', 'caRSola', 'labrador', 'john cedrick', 'jc', '2001-05-21', 21, 'Male', 'roman catholic', 'batuan, bohol', 9503405148, '23@gmail.com', 'Single', 'purok 6 ', 'San Isidro', 'college graduate', 'none', 'teacher', '100000000', 'criss', 'jaime musne', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, '2023-03-30 07:02:13', 'Yes', 'Approved'),
(86, '1438911', 'yuji', 'ackherman', 'itadori', 'ereh', '2002-01-22', 21, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Single', 'purok 6 ', 'Anibongan', 'college graduate', 'none', 'teacher', '20000', 'reisa', 'karen kaye carias', 'sister', 60, 'Single', '12000', 'farmer', 93045726777, '2023-03-30 07:43:44', 'Yes', 'Approved'),
(87, '1000238', 'asds', 'gf', 'fdd', 'dd', '0555-04-06', 90, 'Male', 'roman catholic', 'abachanan sierra bullones bohol', 9503405140, '33@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'Matin-ao', 'college graduate', 'dancing and singing', 'teacher', '5000', 'none', 'fdgd', 'fdfd', 60, 'Single', '20000', 'tourism', 9304572677, '2023-03-31 07:11:42', 'Yes', 'Approved'),
(88, '1438911', 'revilla', 'pangan', 'leonida', 'lenlen', '1945-07-07', 77, 'Female', 'roman catholic', 'abachanan sierra bullones bohol', 9092947054, 'icciipritz@gmail.com', 'Married', 'purok 2', 'San Juan', 'college graduate', 'dancing', 'farming', '30000', 'gsis', 'adriel evan revilla', 'son', 15, 'Single', '30000', 'teacher', 9092947054, '2023-05-10 10:43:27', 'Yes', 'Approved'),
(89, '2332', 'daisy', 'escabusa', 'Musne', 'daiis', '1956-04-29', 67, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Married', 'purok 6 ', 'Danicop', 'college graduate', 'none', 'teacher', '5000', 'none', 'karen kaye carias', 'sister', 58, 'Single', '12000', 'gamer', 9304572677, '2023-05-12 05:50:23', 'Yes', 'Approved'),
(90, '0013', 'tonya', 'saguing', 'anthony', 'tony', '1956-04-05', 67, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 9675489765, 'seegmail@gmail.com', 'Divorced', 'purok 3', 'Cahayag', 'college graduate', 'dancing', 'teacher', '23000', 'fahjs', 'jovita saguing', 'mother', 78, 'Married', '30000', 'teacher', 9876546789, '2023-05-15 01:39:54', 'Yes', 'Approved'),
(91, NULL, 'kurosaki', 'intetsu', 'ichigo', 'hallow', '1976-05-16', 46, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'selenaescuderoamoguis@gmail.com', 'Married', 'purok - ilang-ilang', 'Bugsok', 'college graduate', 'none', 'teacher', '30000', 'none', 'haRITH', 'brother', 58, 'Married', '23333', 'tourism', 93045726777, '2023-05-15 15:16:48', 'Yes', 'Pending'),
(92, NULL, 'kazuma ', 'aqua', 'Megumin', 'itadori kun', '1948-04-16', 75, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, '23@gmail.com', 'Single', 'purok 6- ilang-ilang', 'San Isidro', 'college graduate', 'bow', 'farming', '1232331', 'gsis', 'crisanto amoguis', 'brother', 60, 'Single', '23333', 'tourism', 93045726777, '2023-05-15 15:18:24', 'Yes', 'Pending'),
(93, '13343423', 'q', 'q', 'q', 'a', '1934-05-17', 88, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Single', 'purok 2', 'Magsaysay', 'college graduate', 'bow', 'electro archon', '0', 'none', 'haRITH', 'brother', 60, 'Single', '99999999', 'tourism', 93045726711, '2023-05-15 15:57:24', 'Yes', 'Approved'),
(94, '122343', 'w ', 'w', 'w', 'w', '1956-04-16', 67, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405140, '23@gmail.com', 'Married', 'purok 2', 'La Union', 'college graduate', 'none', 'teacher', '?100,000', 'reisa', 'hinata', 'husband', 23, 'Single', '23333', 'tourism', 93045726700, '2023-05-15 16:02:57', 'Yes', 'Approved'),
(95, '122222', 'a', 'a', 'a', 'a', '1934-05-16', 89, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'selenaescuderoamoguis@gmail.com', 'Divorced', 'purok 6- ilang-ilang', 'Lataban', 'college graduate', 'none', 'teacher', '₱10,000,001', 'crissa', 'crisanto amoguis', 'fdfd', 60, 'Married', '99999999', 'tourism', 93045726700, '2023-05-15 16:39:41', 'Yes', 'Approved'),
(96, '12322223', 'z', 'z', 'z', 'z', '1932-05-17', 90, 'Female', 'roman catholic', 'pilar, dagohoy, bohol', 9503405149, 'selenaescuderoamoguis@gmail.com', 'Separated', 'purok 6- ilang-ilang', 'Canta-ub', 'college graduate', 'dancing and singing', 'anemo archon', '₱100,000,000', 'criss', 'hinath', 'husband', 58, 'Divorced', '₱12,003', 'gamer', 9304572677, '2023-05-15 17:03:54', 'Yes', 'Approved'),
(97, NULL, 'd', 'dd', 'd', 'd', '1945-04-22', 78, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, 'christianescuderoamoguis@gmail.com', 'Divorced', 'purok 6- ilang-ilang', 'Magsaysay', 'college graduate', 'bow', 'teacher', '₱30,000', 'gsis', 'hinata', 'brother', 60, 'Separated', '₱30,000', 'gamer', 93045726711, '2023-05-18 14:05:40', 'Yes', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'ABOUT US', '<div style=\"text-align: center;\"><font color=\"#7b8898\"><span style=\"font-size: 26px;\"><b>MISSION</b></span></font></div><div style=\"text-align: center;\"><font color=\"#7b8898\"><span style=\"font-size: 26px;\">MSWDO COMMITS TO CARE, PROTECT AND REHABILITATE</span></font></div><div style=\"text-align: center;\"><font color=\"#7b8898\"><span style=\"font-size: 26px;\">THAT SEGMENT OF SOCIETY WHO ARE PHYSICALLY, SOCIALLY</span></font></div><div style=\"text-align: center;\"><font color=\"#7b8898\"><span style=\"font-size: 26px;\">AND ECONOMICALLY DISADVANTAGE INDIVIDUALS,</span></font></div><div style=\"text-align: center;\"><font color=\"#7b8898\"><span style=\"font-size: 26px;\">FAMILIES, GROUPS OR COMMUNITIES THROUGH THE PROVISION</span></font></div><div style=\"text-align: center;\"><font color=\"#7b8898\"><span style=\"font-size: 26px;\">OF SOCIAL WORK INTERVENTIONS TO BECOME SELF-RELIANT</span></font></div><div style=\"text-align: center;\"><font color=\"#7b8898\"><span style=\"font-size: 26px;\">AND SOCIALLY ADJUSTED ONES IN ORDER TO ACHIEVE BETTER QUALITY LIFE.</span></font></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', 'Poblacion, Sierra Bullones Bohol 6320', 'mswdosierrabullones2020@gmail.com', 9856324009, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpublicnotice`
--

CREATE TABLE `tblpublicnotice` (
  `ID` int(5) NOT NULL,
  `NoticeTitle` varchar(200) DEFAULT NULL,
  `NoticeMessage` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpublicnotice`
--

INSERT INTO `tblpublicnotice` (`ID`, `NoticeTitle`, `NoticeMessage`, `CreationDate`) VALUES
(1, 'MEETING', 'We will have a meeting at Sierra Bullones, Bohol. On july 22, 2023.', '2022-01-20 09:11:57'),
(2, 'FREE CHECK-UP FOR SENIORS', 'THE MUNICIPALITY HEALTH CARE ARE CONDUCTING FREE CHECK UP FOR SENIORS.\r\nTHIS COMING AUGUST 5,2023 AT SIERRA BULONES COVERED COURT 8AMO-5PM.', '2022-02-02 19:04:10'),
(3, 'With Pension', 'You can now claim your monthly pension!', '2023-01-25 12:54:03'),
(7, 'RELEASING OF PENSION', 'AT COVERED COURT SIERRA BULLONES COVERED COURT.', '2023-05-15 03:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblsenior`
--

CREATE TABLE `tblsenior` (
  `ID` int(10) NOT NULL,
  `StuID` varchar(200) DEFAULT NULL,
  `SurName` varchar(200) DEFAULT NULL,
  `MiddleName` varchar(200) DEFAULT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `NickName` varchar(250) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Age` bigint(11) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Religion` varchar(200) DEFAULT NULL,
  `PoB` varchar(500) DEFAULT NULL,
  `ContactNumber` bigint(11) DEFAULT NULL,
  `CitiEmail` varchar(200) DEFAULT NULL,
  `CivilStatus` varchar(200) DEFAULT NULL,
  `PuAddress` varchar(200) DEFAULT NULL,
  `Barangay` varchar(200) DEFAULT NULL,
  `EduAt` varchar(200) DEFAULT NULL,
  `Skills` varchar(200) DEFAULT NULL,
  `Occupation` varchar(200) DEFAULT NULL,
  `AnIncome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoB` varchar(200) CHARACTER SET dec8 COLLATE dec8_swedish_ci DEFAULT NULL,
  `FcName` mediumtext DEFAULT NULL,
  `Relationship` mediumtext DEFAULT NULL,
  `FcAge` bigint(11) DEFAULT NULL,
  `FcCiviStatus` varchar(200) DEFAULT NULL,
  `FcIncome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fcoccupation` varchar(200) DEFAULT NULL,
  `AltenateNumber` bigint(11) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `DateofAdmission` timestamp NULL DEFAULT current_timestamp(),
  `Pension` varchar(50) DEFAULT NULL,
  `CheckBox` varchar(250) NOT NULL,
  `ControlNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsenior`
--

INSERT INTO `tblsenior` (`ID`, `StuID`, `SurName`, `MiddleName`, `FirstName`, `NickName`, `DOB`, `Age`, `Gender`, `Religion`, `PoB`, `ContactNumber`, `CitiEmail`, `CivilStatus`, `PuAddress`, `Barangay`, `EduAt`, `Skills`, `Occupation`, `AnIncome`, `NoB`, `FcName`, `Relationship`, `FcAge`, `FcCiviStatus`, `FcIncome`, `Fcoccupation`, `AltenateNumber`, `UserName`, `Password`, `Image`, `DateofAdmission`, `Pension`, `CheckBox`, `ControlNo`) VALUES
(26, '100023', 'ybanez', 'galinato', 'jennefer', 'jen', '2002-02-06', 21, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'jenneferybanez@gmail.com', 'Married', 'purok 2', 'Abachanan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, 'jen', '4db63cb2f0bde8c4a2582b0e66fe4c7a', '2d87b41f3de518367dc0e51f9dd03bf91679109849.jpg', '2023-03-18 03:24:09', 'No', '', NULL),
(27, '233311', 'amoguis', 'escudero', 'crisanto', 'potpot', '1958-04-22', 65, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'Bugsok', 'college graduate', 'none', 'teacher', '₱3,333', 'none', 'karen kaye carias', 'sister', 60, 'Single', '₱4,555', 'tourism', 9304572677, 'cris', '1bdaed9211d9f7baedca44e9e625f508', 'cd8bb776a249d9ef4a653893200d7aa81684222390jpeg', '2023-03-18 03:29:28', 'Yes', '', NULL),
(28, '233322', 'ybanez', 'galinato', 'christian', 'christian', '2000-02-22', 23, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, 'christianescuderoamoguis@gmail.com', 'Single', 'purok 6 ', 'Poblacion', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Male', '500000', 'tourism', 930457267, 'christian', '7a519571b67279d9e76688779719cbcb', '4adc5d889ea6860bd273d63abb7b7b7c1679110737.jpg', '2023-03-18 03:38:57', 'Yes', '', NULL),
(29, '1233432', 'amoguis', 'galinato', 'selena', 'selena', '1945-02-22', 78, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, 'selenaescuderoamoguis@gmail.com', 'Married', 'purok 2', 'San Augustin', 'college graduate', 'none', 'teacher', '30000', 'none', 'haRITH', 'brother', 60, 'Male', '500000', 'tourism', 930457267, 'selena', 'ec0b01f9a4cefe9de999a768fa46f393', '4adc5d889ea6860bd273d63abb7b7b7c1679113970.jpg', '2023-03-18 04:32:50', 'No', '', NULL),
(30, '1000232', 'musne', 'escabusa', 'daisy', 'daisy', '4444-04-04', -2421, 'Male', 'roman catholic', 'sierra, dagohoy, bohol', 950340514, 'daisy@gmail.com', 'Married', 'purok 2', 'Nan-od', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Male', '500000', 'tourism', 930457267, 'daisy', '1b3c2c45d0a977b508f637097a94cbfb', 'cf7ad5ac713eb5730e5ab64c254e717c1679114505.jpg', '2023-03-18 04:41:45', 'No', '', NULL),
(31, '23335', 'uzumaki', 'kyubii', 'naruto', 'naruto', '3333-03-31', -1310, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'christianescuderoamoguis@gmail.com', 'Divorced', 'purok 2', 'Salvador', 'college graduate', 'none', 'teacher', '30000', 'criss', 'hinata', 'wife', 60, 'Widowed', '500000', 'tourism', 930457267, 'naruto', '884ecc7ac05cb5d52aa970f523a3b7e6', '4cf6bbd0622ddb1f84d8ad519cbe0a801679114651.jpg', '2023-03-18 04:44:11', 'No', '', NULL),
(32, '10002334', 'ybanez', 'galinato', 'jennefer', 'jen', '2002-02-06', 21, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'jenneferybanez@gmail.com', 'Married', 'purok 2', 'Abachanan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, '123', '202cb962ac59075b964b07152d234b70', 'b03bffd09032838a5ede8ca054f808801679114886.jpg', '2023-03-18 04:48:06', 'No', '', NULL),
(33, '2333222', 'amoguis', 'escudero', 'tigreal', 'potpot', '2001-04-22', 22, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'Bugsok', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, 'tigreal', '1bdaed9211d9f7baedca44e9e625f508', 'cd8bb776a249d9ef4a653893200d7aa81683100439jpeg', '2023-03-18 04:52:53', 'Yes', '', NULL),
(34, '2333332', 'yaeger', 'amoguis', 'eren', 'ereh', '3333-03-31', -1310, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, 'jenneferybanez@gmail.com', 'Single', 'purok 6 sitio ilang-ilang', 'Poblacion', 'college graduate', 'none', 'teacher', '30000', 'criss', 'haRITH', 'brother', 60, 'Married', '500000', 'tourism', 930457267, 'eren', '291b74dec227f7ba5d04a1db8e99588b', 'a267e9e3961262e032bd8ad3cc8bd0041679153626.jpg', '2023-03-18 15:33:46', 'Yes', '', NULL),
(35, '143212', 'ackherman', 'yaeger', 'mikasa', 'mikasa', '1956-04-19', 67, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'selenaescuderoamoguis@gmail.com', 'Single', 'purok 6- ilang-ilang', 'Abachanan', 'college graduate', 'none', 'teacher', '30000', 'none', 'hinata', 'wife', 60, 'Male', '500000', 'tourism', 930457267, 'mikasa', '25bc1b7b8d1fd0caa4172a97800f7d63', '4b6e1d9c61691e3aafce074988010cc81683262562.jpg', '2023-03-18 15:36:18', 'Yes', '', NULL),
(36, '10002321', 'arlert', 'lionhart', 'armin', 'armin', '1945-05-24', 78, 'Female', 'roman catholic', 'sierra, dagohoy, bohol', 950340514, '23@gmail.com', 'Single', 'purok 6- ilang-ilang', 'San Jose', 'college graduate', 'none', 'teacher', '30000', 'none', 'hinata', 'wife', 60, 'Married', '500000', 'tourism', 930457267, 'armin', 'e13b730afeb315178e784c105d97bc05', 'c5e8d6d4016248dcf3d528874174bf4e1679153897.jpg', '2023-03-18 15:38:17', 'Yes', '', NULL),
(37, '111111112', 'ackherman', 'kennyy', 'levi', 'levi-kun', '1956-04-27', 67, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'selenaescuderoamoguis@gmail.com', 'Single', 'purok 6 ', 'San Augustin', 'college graduate', 'none', 'teacher', '30000', 'none', 'haRITH', 'brother', 60, 'Married', '500000', 'tourism', 930457267, 'levi', '3d9541b51b8c6dd4e263c98dce9e7320', 'a267e9e3961262e032bd8ad3cc8bd0041679154077.jpg', '2023-03-18 15:41:17', 'Yes', '', NULL),
(38, '14523', 'zoe', 'ackherman', 'hange', 'titan lover', '1111-11-11', 912, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, 'jenneferybanez@gmail.com', 'Married', 'purok 2', 'Abachanan', 'college graduate', 'none', 'teacher', '30000', 'none', 'haRITH', 'sister', 60, 'Male', '500000', 'tourism', 930457267, 'hange', '5af157be0486407ef44a212c8ef92cb0', '7d108db512f6a6a929cd0d0ad3b593e81679154323.jpg', '2023-03-18 15:45:23', 'Yes', '', NULL),
(39, '12132', 'kirstein', 'horsy', 'jean', 'jena', '0222-02-22', 1801, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, '23@gmail.com', 'Married', 'purok 6- ilang-ilang', 'Anibongan', 'college graduate', 'none', 'teacher', '₱5,555', 'none', 'hinata', 'brother', 60, 'Male', '₱2,500', 'tourism', 930457267, 'jean', 'a2faca5f819b9b2778e78abb889671ed', '4127d8af2ab3c9361753d026fea2e2761684223236jpeg', '2023-03-18 15:47:57', 'Yes', '', NULL),
(40, '14311', 'annie', 'arlert', 'leonhart', 'female titan', '1940-02-22', 83, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'selenaescuderoamoguis@gmail.com', 'Married', 'purok 2', 'Cahayag', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Married', '500000', 'tourism', 930457267, 'annie', 'd6074672bd5f62d6863bd319148bf8a6', '6dfe8354f0f8d8d2fe2fde10612516361679155025.jpg', '2023-03-18 15:57:05', 'No', '', NULL),
(41, '1232342', 'braun', 'armored', 'reiner', 'raynaarr', '1963-02-22', 60, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, 'crisantoescuderoamoguis@gmail.com', 'Single', 'purok 6- ilang-ilang', 'Canlangit', 'college graduate', 'none', 'teacher', '30000', 'none', 'hinata', 'brother', 60, 'Married', '500000', 'tourism', 930457267, 'reiner', 'c500b88b89d1ec3fe2ff0b2bb33b467f', 'c5e8d6d4016248dcf3d528874174bf4e1679155199.jpg', '2023-03-18 15:59:59', 'Yes', '', NULL),
(42, '123242', 'springer', 'boy upaw', 'connie', 'uoawe', '1111-11-11', 912, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'christianescuderoamoguis@gmail.com', 'Widowed', 'purok 6 ', 'Casilay', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Married', '500000', 'tourism', 930457267, 'connie', 'e574e76feb7a2a62fb0d19085a042342', '4adc5d889ea6860bd273d63abb7b7b7c1679155408.jpg', '2023-03-18 16:03:28', 'No', '', NULL),
(43, '143132432', 'amoguis', 'escudero', 'crisanto', 'cris', '1960-03-22', 63, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'jenneferybanez@gmail.com', 'Separated', 'purok 2', 'Danicop', 'college graduate', 'none', 'teacher', '30000', 'none', 'hinata', 'brother', 60, 'Divorced', '500000', 'tourism', 930457267, 'tytgudgtd', '7f4801e7ae707c6b89a25e431571c627', 'a01781d56dcc1f5820eefee152c4968b1679155606.jpg', '2023-03-18 16:06:46', 'Yes', '', NULL),
(44, '100469', 'uzumaki', 'kyubii', 'naruto', 'kyubiiii', '1111-11-11', 912, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'jenneferybanez@gmail.com', 'Married', 'purok 6- ilang-ilang', 'Dusita', 'college graduate', 'none', 'teacher', '30000', 'none', 'hinata', 'brother', 60, 'Male', '500000', 'tourism', 930457267, 'fjdkydtrdr', '31078ea20fbeb220ff5bf59f42480851', 'cf7ad5ac713eb5730e5ab64c254e717c1679155704.jpg', '2023-03-18 16:08:24', 'Yes', '', NULL),
(45, '143897', 'amoguis', 'arlert', 'selena', 'chian', '1934-11-11', 89, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, '23@gmail.com', 'Married', 'purok 2', 'Dusita', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Male', '500000', 'tourism', 930457267, 'plihfft', '4e0af8f7c1c6914f4e72516809786aab', '2d87b41f3de518367dc0e51f9dd03bf91679155880.jpg', '2023-03-18 16:11:20', 'No', '', NULL),
(46, '143556', 'yaeger', 'escabusa', 'jennefer', 'julian', '2322-03-04', -299, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, 'wefagreberb@gmail.com', 'Single', 'purok 6- ilang-ilang', 'La Union', 'college graduate', 'none', 'teacher', '30000', 'criss', 'hinata', 'brother', 60, 'Male', '500000', 'tourism', 930457267, 'hghfgdcnk', 'dec940239a299abf6ec2cd773e7210b1', '3caa549187ac7c3c571b4d037500388b1679155978.jpg', '2023-03-18 16:12:58', 'Yes', '', NULL),
(47, '11', 'baal', 'shogun', 'raiden', 'ei', '1990-04-14', 33, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, '213@gmail.com', 'Single', 'purok 2', 'Dusita', 'college graduate', 'none', 'electro archon', '100000000', 'none', 'crisanto amoguis', 'husband', 21, 'Male', '500000', 'gamer', 930457267, 'raiden123', 'ce7d8adf8f3607586841ef1add95b8c5', '9b81ee590d27c91277ce8f36280285e31679189368.jpg', '2023-03-19 01:29:28', 'Yes', '', NULL),
(48, '1002', 'barbatos', 'bard', 'venti', 'drumkenbard', '1923-12-05', 99, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, 'venti@gmail.com', 'Married', 'purok 2', 'La Union', 'college graduate', 'bow', 'anemo archon', '1232331', 'none', 'crisanto amoguis', 'brother', 21, 'Male', '500000', 'gamer', 930457267, 'venti', '54f3015e9b150906d315b9fe7d15d012', '00493b3f5af40f5e614214702e49cd8f1679189551.jpg', '2023-03-19 01:32:31', 'Yes', '', NULL),
(49, '2312', 'emiya', 'saber', 'shirou', 'shiroukun', '1143-11-11', 880, 'Male', 'roman catholic', 'sierra, dagohoy, bohol', 950340514, '23@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'Canta-ub', 'college graduate', 'none', 'teacher', '100000000', 'criss', 'karen kaye carias', 'brother', 60, 'Male', '500000', 'tourism', 930457267, 'shirou', '29aa9eea28b2a1adae5e6692f348575d', '7d108db512f6a6a929cd0d0ad3b593e81679316182.jpg', '2023-03-20 12:43:02', 'No', '', NULL),
(50, '14312', 'tohsaka', 'archer', 'rin', 'rinchan', '1114-03-31', 909, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, '23@gmail.com', 'Single', 'purok 2', 'Lataban', 'college graduate', 'none', 'teacher', '100000000', 'criss', 'hinata', 'sister', 60, 'Male', '500000', 'tourism', 930457267, 'rin', '39b141eaadd2200727484f4e0706e5f2', 'f015777eebefced3e397fefe3014a8391679317212.jpg', '2023-03-20 13:00:12', 'Yes', '', NULL),
(51, '1431315', 'matuo', 'emiya', 'sakura', 'sakura', '1111-11-11', 912, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, '23@gmail.com', 'Separated', 'purok 6 ', 'Magsaysay', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Married', '500000', 'tourism', 930457267, 'sakura', 'd1df49745f75a81137379b4bfe468258', '4adc5d889ea6860bd273d63abb7b7b7c1679317485.jpg', '2023-03-20 13:04:45', 'Yes', '', NULL),
(52, '1234113', 'itadori', 'sukuna', 'jin', 'itadorikun', '1945-05-20', 78, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, '23@gmail.com', 'Separated', 'purok 6- ilang-ilang', 'Bugsok', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Divorced', '500000', 'tourism', 930457267, 'jin', 'a90a8761632bae26b5517acb73f2ccca', 'cf7ad5ac713eb5730e5ab64c254e717c1679317923.jpg', '2023-03-20 13:12:03', 'Yes', '', NULL),
(53, '143111', 'kugisaki', 'doll', 'nobara', 'witch', '1113-03-11', 910, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 950340514, '23@gmail.com', 'Divorced', 'purok 2', 'Matin-ao', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Married', '500000', 'tourism', 930457267, 'nobara', 'db65e0492716540af5716c8a58fa063d', 'b03bffd09032838a5ede8ca054f808801679318066.jpg', '2023-03-20 13:14:26', 'Yes', '', NULL),
(54, '1232131', 'uzumaki', 'kyuga', 'buruto', 'buruto', '1234-11-11', 789, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'wefagreberb@gmail.com', 'Single', 'purok 2', 'Poblacion', 'college graduate', 'none', 'teacher', '30000', 'none', 'hinata', 'husband', 60, 'Married', '500000', 'tourism', 930457267, 'buroto', 'db5b093a79580a718018ad6c58bd4f68', '2d87b41f3de518367dc0e51f9dd03bf91679319351.jpg', '2023-03-20 13:35:51', 'Yes', '', NULL),
(55, '233312', 'uzumaki', 'ackherman', 'crisanto', 'chian', '2222-02-22', -199, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'christianescuderoamoguis@gmail.com', 'Single', 'purok 2', 'San Isidro', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Married', '500000', 'tourism', 930457267, 'crisantopapa', 'd47e2562bd82a43dc5a8cdc7aa67a79c', 'f015777eebefced3e397fefe3014a8391679319767.jpg', '2023-03-20 13:42:47', 'Yes', '', NULL),
(56, '456782', 'ybanez', 'galinato', 'jennefer', 'jen', '5432-04-05', -3409, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, '23@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'San Juan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Male', '500000', 'tourism', 930457267, 'jeneyyya', '019e5d94101ce02e74e7e263bd51d64d', '9a024b9a16bd3c4b1ddbd2440273861e1679320467.jpg', '2023-03-20 13:54:27', 'Yes', '', NULL),
(57, '1433456', 'amoguis', 'escudero', 'jennefer', 'chian', '1944-06-06', 79, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, '23@gmail.com', 'Married', 'purok 2', 'Santa Cruz', 'college graduate', 'none', 'electro archon', '30000', 'criss', 'hinata', 'brother', 21, 'Married', '500000', 'tourism', 930457267, 'shugonate', '333b9eaa9bd1fc3cb6e8f8ff21636d1a', '4b6e1d9c61691e3aafce074988010cc81683101088.jpg', '2023-03-20 14:01:28', 'Yes', '', NULL),
(58, '14389', 'ackherman', 'amoguis', 'crisantesimo', 'chian', '1962-05-22', 61, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, '23@gmail.com', 'Divorced', 'purok 2', 'Villa Garcia', 'college graduate', 'none', 'teacher', '30000', 'none', 'hinata', 'sister', 21, 'Married', '500000', 'tourism', 93045726722, 'admin564', '839463cd3b94ec1890d0ea45afd1bd4d', 'cd8bb776a249d9ef4a653893200d7aa81683252712jpeg', '2023-03-20 14:07:36', 'No', '', NULL),
(59, '2333234', 'escober', 'curiba', 'erwin', 'win', '2001-04-22', 22, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'Bugsok', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, 'erwin', '1bdaed9211d9f7baedca44e9e625f508', 'b03bffd09032838a5ede8ca054f808801679455004.jpg', '2023-03-22 03:16:44', 'No', '', NULL),
(60, '1002324', 'avenido', 'de rezel', 'gebee anne', 'rai', '1960-04-22', 63, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 9503405148, '23@gmail.com', 'Married', 'purok 6- ilang-ilang', 'Anibongan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 930457267, 'gebee ann', '1c6c6dca73e8aaca07ebba559690ca8f', 'b03bffd09032838a5ede8ca054f808801679541533.jpg', '2023-03-23 03:18:53', 'Yes', '', NULL),
(61, '1002325', 'cutin', 'labus', 'regine', 'gin', '1947-05-21', 76, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 9503405148, 'cutin@gmail.com', 'Married', 'purok 6- ilang-ilang', 'Anibongan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 930457267, 'cutin', 'b9669c2fad0fd500b82c8877914c2c47', 'b03bffd09032838a5ede8ca054f808801679546371.jpg', '2023-03-23 04:39:31', 'Yes', '', NULL),
(62, '12133', 'ogre', 'veldora', 'benimaru', 'rimuru-sama', '2001-04-27', 22, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'Married', 'purok 2', 'Santa Cruz', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'gamer', 93045726711, 'benimaru', '1bdaed9211d9f7baedca44e9e625f508', 'b03bffd09032838a5ede8ca054f808801679884660.jpg', '2023-03-27 02:37:40', 'Yes', '', NULL),
(63, '1438911121', 'veldora', 'storm dragon', 'tempest', 'veldora', '2222-12-22', -200, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Married', 'purok 2', 'San Jose', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726700, 'veldora', '46e865316349197ff1a59d210fa1485b', 'b03bffd09032838a5ede8ca054f808801679897779.jpg', '2023-03-27 06:16:19', 'Yes', '', NULL),
(64, '143123456543', 'veldora', 'storm dragon', 'tempest', 'veldora', '2222-12-22', -200, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Married', 'purok 2', 'San Jose', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726700, 'pots', '27f0734f61d686bc0e33f6abb5632e4f', '3ece237616aba643bf81dc468fcd67f61679899180.jpg', '2023-03-27 06:39:40', 'Yes', '', NULL),
(65, '100023123232', 'yamete', 'galinato', 'kudasay', 'jen', '2002-02-06', 21, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'jenneferybanez@gmail.com', 'Married', 'purok 2', 'Abachanan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, 'yemete', '3e9c2fa0bfd37bde136523ac5ae07c35', 'b03bffd09032838a5ede8ca054f808801679899310.jpg', '2023-03-27 06:41:50', 'Yes', '', NULL),
(66, '233312123434', 'veldora', 'storm dragon', 'tempest', 'veldora', '2222-12-22', -200, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Married', 'purok 2', 'San Jose', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726700, 'adminefed', 'c742a727dd81d2cec6bf0c9dbdbffb93', 'b03bffd09032838a5ede8ca054f808801679901160.jpg', '2023-03-27 07:12:40', 'Yes', '', NULL),
(67, '123456eeq2e', 'veldora', 'storm dragon', 'tempest', 'veldora', '2222-12-22', -200, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Married', 'purok 2', 'San Jose', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726700, 'qwereree', 'cb8d088b863d2d3fe0d0ae34a48e94c8', '2d87b41f3de518367dc0e51f9dd03bf91679901279.jpg', '2023-03-27 07:14:39', 'Yes', '', NULL),
(68, '1212323124', 'amoguis', 'escudero', 'crisantos', 'potpot', '1956-04-22', 67, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'Bugsok', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, 'gzsrhrhzd', '1bdaed9211d9f7baedca44e9e625f508', '3ece237616aba643bf81dc468fcd67f61679901478.jpg', '2023-03-27 07:17:58', 'No', '', NULL),
(70, '1438911121211', 'veldoraerwre', 'storm dragon', 'tempest', 'veldora', '1991-12-22', 31, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Married', 'purok 2', 'San Jose', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726700, 'adminsdfgrg', 'e214aae9eac6601f7feb92dc16750291', '3ece237616aba643bf81dc468fcd67f61679901701.jpg', '2023-03-27 07:21:41', 'Yes', '', NULL),
(71, '1231213232', 'amoguis', 'galinato', 'benimaru', 'jen', '1940-04-22', 83, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, '23@gmail.com', 'Single', 'purok 2', 'San Jose', 'college graduate', 'none', 'electro archon', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Married', '500000', 'tourism', 93045726700, 'admin45', '4dc106c4cb150d7b3645d17facba1896', 'b03bffd09032838a5ede8ca054f808801679902752.jpg', '2023-03-27 07:39:12', 'Yes', '', NULL),
(72, '100023w22', 'ybanez', 'galinato', 'jennefer', 'jen', '2002-02-06', 21, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'jenneferybanez@gmail.com', 'Married', 'purok 2', 'Abachanan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, 'adminhgyub', 'a167c7252851337536526ccbbf0a05c1', 'b03bffd09032838a5ede8ca054f808801679903254.jpg', '2023-03-27 07:47:34', 'Yes', '', NULL),
(73, 'tigreal121132', 'ogre', 'veldora', 'benimaru', 'rimuru-sama', '2001-04-28', 22, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'Married', 'purok 2', 'Santa Cruz', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'gamer', 93045726711, 'admin2343532', '1bdaed9211d9f7baedca44e9e625f508', 'b03bffd09032838a5ede8ca054f808801679903384.jpg', '2023-03-27 07:49:44', 'Yes', '', NULL),
(74, '10023241222', 'cadiz', 'de raizel', 'etrama', 'rai', '1956-05-20', 67, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 9503405148, '23@gmail.com', 'Married', 'purok 6- ilang-ilang', 'Anibongan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 930457267, 'admindfsdgdg', 'a93dc99af21ed0defcb7287581088d9f', 'b03bffd09032838a5ede8ca054f808801679903672.jpg', '2023-03-27 07:54:32', 'Yes', '', NULL),
(75, '123121312', 'amoguis', 'galinato', 'benimaru', 'jen', '1956-04-22', 67, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, '23@gmail.com', 'Single', 'purok 2', 'San Jose', 'college graduate', 'none', 'electro archon', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Married', '500000', 'tourism', 93045726700, 'adminwdwdww', '4fb8cbcbe23ba88ecb366debd92938af', 'b03bffd09032838a5ede8ca054f808801679903795.jpg', '2023-03-27 07:56:35', 'Yes', '', NULL),
(77, '12121212', 'Valintine', 'queen', 'luminas', 'waifu', '2023-03-29', 0, 'Female', 'roman catholic', 'pilar, dagohoy, bohol', 9503405148, 'crisantoescuderoamoguis@gmail.com', 'Married', 'purok 2', 'San Isidro', 'college graduate', 'none', 'teacher', '100000000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726777, 'luminasvalintine', '1bdaed9211d9f7baedca44e9e625f508', '6dfe8354f0f8d8d2fe2fde10612516361679910011.jpg', '2023-03-27 09:40:11', 'Yes', '', NULL),
(78, '1000235', 'cutin', 'labus', 'rizel', 'riz', '2023-03-22', 0, 'Female', 'roman catholic', 'pilar, dagohoy, bohol', 950340519, 'wefagreyerb@gmail.com', 'Divorced', 'purok 5', 'Canlangit', 'college graduate', 'singing', 'teacher', '20000', 'reisa', 'hinath', 'wife', 60, 'Divorced', '30000', 'tourism', 9668890202, 'rizel', 'b4b84d0825ef829fe537e5632acd3753', '66182d79a97f29d3653853f5a2c1f11a1679996523jpeg', '2023-03-28 09:42:03', 'No', '', NULL),
(79, '00111', 'musne', 'escabusa', 'daisy', 'dys', '2000-04-29', 23, 'Female', 'roman catholic', 'abachanan sierra bullones bohol', 9668890202, 'musnedaisy06@gmail.com', 'Single', 'purok 5', 'Abachanan', 'college graduate', 'dancing and singing', 'student', '5000', 'none', 'jaime musne', 'father', 58, 'Married', '12000', 'farmer', 9563489765, 'musne', 'df4b892324bbb648f27734b55c206b4b', '1e2f724109fee4134f669fe285a586fb1680006765.jpg', '2023-03-28 12:32:45', 'No', '', NULL),
(80, '00123', 'musne', 'esacabusa', 'daisy', 'dys', '2000-04-29', 23, 'Male', 'roman catholic', 'sierra, dagohoy, bohol', 9503405149, 'jia@gmail.com', 'Married', 'purok 5', 'San Augustin', 'college graduate', 'bow', 'teacher', '20000', 'crissa', 'hinat4', 'sister', 57, 'Married', '20000', 'farmer', 9668890202, 'jia', '1938b78d0e7f0eae2f30ace4dd555cce', 'cd8bb776a249d9ef4a653893200d7aa81680054041jpeg', '2023-03-29 01:40:41', 'No', '', NULL),
(82, '14389111121', 'yuji', 'ackherman', 'itadori', 'ereh', '1955-01-22', 68, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Single', 'purok 6 ', 'Anibongan', 'college graduate', 'none', 'teacher', '20000', 'reisa', 'karen kaye carias', 'sister', 60, 'Single', '12000', 'farmer', 93045726777, 'adminsfd', '82cd14edfbb73b4b63959f86abadac48', '4b6e1d9c61691e3aafce074988010cc81680182773.jpg', '2023-03-30 13:26:13', 'Yes', '', NULL),
(83, '0012111', 'yaeger', 'titan', 'crisanto', 'ereh', '1950-04-22', 73, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405144, '23@gmail.com', 'Single', 'purok 2', 'Anibongan', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Single', '500000', 'tourism', 93045726700, 'admindfgf', '18e56a999864a1ccf077e34c6cf9b65d', '4b6e1d9c61691e3aafce074988010cc81680182908.jpg', '2023-03-30 13:28:28', 'Yes', '', NULL),
(84, '1000238', 'santos', 'cruz', 'pedro', 'dd', '1946-04-06', 77, 'Male', 'roman catholic', 'abachanan sierra bullones bohol', 9503405140, '33@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'Matin-ao', 'college graduate', 'dancing and singing', 'teacher', '5000', 'none', 'fdgd', 'fdfd', 60, 'Single', '20000', 'tourism', 9304572677, 'cycy', '81dc9bdb52d04dc20036dbd8313ed055', '1e2f724109fee4134f669fe285a586fb1680247238.jpg', '2023-03-31 07:20:38', 'Yes', '', NULL),
(85, '1000227', 'delos reyes', 'renigado', 'evangeline', 'dd', '0555-04-06', 1468, 'Male', 'roman catholic', 'abachanan sierra bullones bohol', 9503405140, '33@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'Matin-ao', 'college graduate', 'dancing and singing', 'teacher', '5000', 'none', 'fdgd', 'fdfd', 60, 'Single', '20000', 'tourism', 9304572677, 'admin', 'f925916e2754e5e03f75dd58a5733251', 'cd8bb776a249d9ef4a653893200d7aa81680315046jpeg', '2023-04-01 02:10:46', 'Yes', '', NULL),
(86, '111133', 'cutin', 'labus', 'rizel', 'choi', '1950-04-22', 73, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405149, 'christianescuderoamoguis@gmail.com', 'Male', 'purok 2', 'San Isidro', 'college graduate', 'none', 'teacher', '9999999999', 'none', 'crisanto amoguis', 'brother', 76, 'Single', '9999991', 'tourism', 93045726777, 'nicole', '96cee49cfcb7ce7242660592c21e42f4', '4b6e1d9c61691e3aafce074988010cc81683263187.jpg', '2023-04-14 02:34:56', 'Yes', '', NULL),
(89, '100023812112', 'jaspe', 'pait', 'segundino', 'dd', '1930-04-06', 93, 'Male', 'roman catholic', 'abachanan sierra bullones bohol', 9503405140, '33@gmail.com', 'Married', 'purok 6 sitio ilang-ilang', 'Matin-ao', 'college graduate', 'dancing and singing', 'teacher', '5000', 'none', 'fdgd', 'fdfd', 60, 'Single', '20000', 'tourism', 9304572677, 'crisanto.amoguis12', 'fbb494889c86812f23f482770bea8294', '66182d79a97f29d3653853f5a2c1f11a1682493734jpeg', '2023-04-26 07:22:14', 'Yes', '', NULL),
(91, '0012312', 'musne', 'esacabusa', 'daisy', 'dys', '2000-04-29', 23, 'Male', 'roman catholic', 'sierra, dagohoy, bohol', 9503405149, 'jia@gmail.com', 'Married', 'purok 5', 'San Augustin', 'college graduate', 'bow', 'teacher', '20000', 'crissa', 'hinat4', 'sister', 57, 'Married', '20000', 'farmer', 9668890202, 'crisanto.amoguisfewfeg', 'fbb494889c86812f23f482770bea8294', '66182d79a97f29d3653853f5a2c1f11a1682572158jpeg', '2023-04-27 05:09:18', 'Yes', '', NULL),
(92, '1000232e3r33d', 'amoguis', 'duwetes', 'persinito', 'percy', '1956-07-13', 67, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405144, '23@gmail.com', 'Single', 'purok 2', 'Bugsok', 'college graduate', 'none', 'teacher', '30000', 'none', 'karen kaye carias', 'brother', 60, 'Married', '500000', 'tourism', 93045726777, 'crisanto.amoguis12132rthdxdf', 'fbb494889c86812f23f482770bea8294', '66182d79a97f29d3653853f5a2c1f11a1682572231jpeg', '2023-04-27 05:10:31', 'Yes', '', NULL),
(93, '1000232111111111', 'caRSola', 'labrador', 'john cedrick', 'jc', '2001-05-21', 22, 'Female', 'roman catholic', 'batuan, bohol', 9503405148, '23@gmail.com', 'Single', 'purok 6 ', 'San Isidro', 'college graduate', 'none', 'teacher', '100000000', 'criss', 'jaime musne', 'sister', 60, 'Single', '500000', 'tourism', 9304572677, 'crisanto.amoguiswsegrhdrgzvczdr', 'fbb494889c86812f23f482770bea8294', '66182d79a97f29d3653853f5a2c1f11a1682572426jpeg', '2023-04-27 05:13:46', 'Yes', '', NULL),
(94, '100023511', 'cutin', 'labus', 'rizel', 'riz', '1946-05-19', 77, 'Female', 'roman catholic', 'pilar, dagohoy, bohol', 9503405148, 'wefagreyerb@gmail.com', 'Divorced', 'purok 5', 'Canlangit', 'college graduate', 'singing', 'teacher', '20000', 'reisa', 'hinath', 'wife', 60, 'Divorced', '30000', 'tourism', 9668890202, 'ato', 'f82c8ac1ffceeeec429207780c548d80', 'cd8bb776a249d9ef4a653893200d7aa81683621157jpeg', '2023-05-09 08:32:37', 'No', '', NULL),
(95, '78678760976544332', 'revilla', 'pangan', 'leonida', 'lenlen', '1945-07-07', 78, 'Female', 'roman catholic', 'abachanan sierra bullones bohol', 9092947054, 'icciipritz@gmail.com', 'Married', 'purok 2', 'San Juan', 'college graduate', 'dancing', 'farming', '30000', 'gsis', 'adriel evan revilla', 'son', 15, 'Single', '30000', 'teacher', 9092947054, 'icciipritz', '5f4dcc3b5aa765d61d8327deb882cf99', '4b6e1d9c61691e3aafce074988010cc81683715763.jpg', '2023-05-10 10:49:23', 'Yes', '', NULL),
(96, '2332', 'daisy', 'escabusa', 'Musne', 'daiis', '1956-04-29', 67, 'Female', 'roman catholic', 'san miguel, dagohoy, bohol', 9503405148, '23@gmail.com', 'Married', 'purok 6 ', 'Danicop', 'college graduate', 'none', 'teacher', '5000', 'none', 'karen kaye carias', 'sister', 58, 'Single', '12000', 'gamer', 9304572677, 'sss', '8611d88be08089c3979c852e0dfe7fc9', 'cd8bb776a249d9ef4a653893200d7aa81683870729jpeg', '2023-05-12 05:52:09', 'Yes', '', NULL),
(97, '0013', 'tonya', 'saguing', 'anthony', 'tony', '1956-04-05', 67, 'Male', 'roman catholic', 'pilar, dagohoy, bohol', 9675489765, 'seegmail@gmail.com', 'Divorced', 'purok 3', 'Cahayag', 'college graduate', 'dancing', 'teacher', '23000', 'fahjs', 'jovita saguing', 'mother', 78, 'Married', '30000', 'teacher', 9876546789, 'tonya', '4b49843e805bef2ff6f76847737666fa', '1e2f724109fee4134f669fe285a586fb1684115022.jpg', '2023-05-15 01:43:42', 'Yes', '', NULL),
(98, '122222', 'a', 'c', 'a', 'q', '1934-05-16', 89, 'Male', 'roman catholic', 'san miguel, dagohoy, bohol', 950340514, 'selenaescuderoamoguis@gmail.com', 'Divorced', 'purok 6- ilang-ilang', 'Lataban', 'college graduate', 'none', 'teacher', '₱2,222,222', 'crissa', 'crisanto amoguis', 'fdfd', 60, 'Married', '₱12,222', 'tourism', 93045726700, 'yamete', 'deb6d6fca566cc0c95730e47888652a1', '4b6e1d9c61691e3aafce074988010cc81684221444.jpg', '2023-05-15 16:53:53', 'Yes', '', NULL),
(99, '12322223', 'z', 'z', 'z', 'z', '1932-05-17', 91, 'Female', 'roman catholic', 'pilar, dagohoy, bohol', 9503405149, 'selenaescuderoamoguis@gmail.com', 'Separated', 'purok 6- ilang-ilang', 'Canta-ub', 'college graduate', 'dancing and singing', 'anemo archon', '₱100,000,000', 'criss', 'hinath', 'husband', 58, 'Divorced', '₱1,308', 'gamer', 9304572677, 'hays', 'c077c0c45590a6cedfd965f6479541a6', 'cd8bb776a249d9ef4a653893200d7aa81684170726jpeg', '2023-05-15 17:12:06', 'Yes', '', NULL),
(100, '12322121', 'r', 'r', 'r', 'z', '1932-05-17', 91, 'Female', 'roman catholic', 'pilar, dagohoy, bohol', 9503405149, 'selenaescuderoamoguis@gmail.com', 'Separated', 'purok 6- ilang-ilang', 'Canta-ub', 'college graduate', 'dancing and singing', 'anemo archon', '₱100,000,000', 'criss', 'hinath', 'husband', 58, 'Divorced', '₱12,003', 'gamer', 9304572677, 'r', '7c92cf1eee8d99cc85f8355a3d6e4b86', '4b6e1d9c61691e3aafce074988010cc81684244927.jpg', '2023-05-16 13:48:47', 'Yes', '', '12334-123431'),
(101, '123243657', 't', 't', 't', 't', '1945-05-18', 78, 'Female', 'roman catholic', 'sierra, dagohoy, bohol', 950340514, '23@gmail.com', 'Single', 'purok 6- ilang-ilang', 'Lataban', 'college graduate', 'none', 'electro archon', '5000', 'fahjs', 'hinata', 'sister', 23, 'Married', '20000', 'gamer', 9304572670, 't', '83f1535f99ab0bf4e9d02dfd85d3e3f7', 'cd8bb776a249d9ef4a653893200d7aa81684247108jpeg', '2023-05-16 14:25:08', 'Yes', '', '123-1233'),
(102, '1232222312222', 'z', 'z', 'z', 'z', '1932-05-17', 91, 'Female', 'roman catholic', 'pilar, dagohoy, bohol', 9503405149, 'selenaescuderoamoguis@gmail.com', 'Separated', 'purok 6- ilang-ilang', 'Anibongan', 'college graduate', 'dancing and singing', 'anemo archon', '₱100,000,000', 'criss', 'hinath', 'husband', 58, 'Divorced', '₱12,003', 'gamer', 9304572677, 'criz', '362a6fd688ab51c77c083f1cd67d7f7e', 'cd8bb776a249d9ef4a653893200d7aa81684330131jpeg', '2023-05-17 13:28:51', 'Yes', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkbox`
--

CREATE TABLE `tbl_checkbox` (
  `ID` int(10) NOT NULL,
  `StuID` varchar(200) DEFAULT NULL,
  `SurName` varchar(200) DEFAULT NULL,
  `MiddleName` varchar(200) DEFAULT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `NickName` varchar(250) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Age` bigint(11) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Religion` varchar(200) DEFAULT NULL,
  `PoB` varchar(500) DEFAULT NULL,
  `ContactNumber` bigint(11) DEFAULT NULL,
  `CitiEmail` varchar(200) DEFAULT NULL,
  `CivilStatus` varchar(200) DEFAULT NULL,
  `PuAddress` varchar(200) DEFAULT NULL,
  `Barangay` varchar(200) DEFAULT NULL,
  `EduAt` varchar(200) DEFAULT NULL,
  `Skills` varchar(200) DEFAULT NULL,
  `Occupation` varchar(200) DEFAULT NULL,
  `AnIncome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoB` varchar(200) CHARACTER SET dec8 COLLATE dec8_swedish_ci DEFAULT NULL,
  `FcName` mediumtext DEFAULT NULL,
  `Relationship` mediumtext DEFAULT NULL,
  `FcAge` bigint(11) DEFAULT NULL,
  `FcCiviStatus` varchar(200) DEFAULT NULL,
  `FcIncome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fcoccupation` varchar(200) DEFAULT NULL,
  `AltenateNumber` bigint(11) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `DateofAdmission` timestamp NULL DEFAULT current_timestamp(),
  `Pension` varchar(50) DEFAULT NULL,
  `CheckBox` varchar(250) NOT NULL,
  `ControlNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotice`
--
ALTER TABLE `tblnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblonline_registration`
--
ALTER TABLE `tblonline_registration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpublicnotice`
--
ALTER TABLE `tblpublicnotice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsenior`
--
ALTER TABLE `tblsenior`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tblnotice`
--
ALTER TABLE `tblnotice`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tblonline_registration`
--
ALTER TABLE `tblonline_registration`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpublicnotice`
--
ALTER TABLE `tblpublicnotice`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsenior`
--
ALTER TABLE `tblsenior`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
