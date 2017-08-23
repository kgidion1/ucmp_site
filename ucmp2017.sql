-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2017 at 03:18 AM
-- Server version: 5.6.35-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ucmp2017`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`) VALUES
(1, 'ucmp.ug', '#ucmpadmin@2017');

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE IF NOT EXISTS `archives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `category` text NOT NULL,
  `filename` text NOT NULL,
  `year` text NOT NULL,
  `url` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `archives`
--

INSERT INTO `archives` (`id`, `fname`, `category`, `filename`, `year`, `url`) VALUES
(20, 'Presentations from the OGC and RLEXpo 2017', 'Presentations', '', '2017', 'https%3A%2F%2Fdrive.google.com%2Fopen%3Fid%3D0B0L-HfUKFVS7NUNUNC0tT2g0QnM'),
(21, 'Mineral Sector Retreat 2013, State House Entebbe', 'Workshops', '', '2017', 'https%3A%2F%2Fdrive.google.com%2Fopen%3Fid%3D0BzeYkIDA8GJiSU5FRDVSUVdKMUk'),
(22, 'Nile Basin Oil & Gas Summit 2012', 'Workshops', '', '2017', 'https%3A%2F%2Fdrive.google.com%2Fopen%3Fid%3D0BzeYkIDA8GJianJ3dm45SUNmeEk'),
(23, ' UCMP Closing the Gap Seminar September 2012', 'Seminars', '', '2017', 'https%3A%2F%2Fdrive.google.com%2Fopen%3Fid%3D0BzeYkIDA8GJiQkFnMXRHbXhuckk'),
(24, 'National Content Consultative Workshop, May 2013 Entebbe', 'Workshops', '', '2017', 'https%3A%2F%2Fdrive.google.com%2Fopen%3Fid%3D0BzeYkIDA8GJiMDNNX2MyeW8ydjA'),
(25, 'Mineral Wealth Conference October 2016', 'Presentations', '', '2017', 'https%3A%2F%2Fdrive.google.com%2Fdrive%2Ffolders%2F0BzeYkIDA8GJiTEx1eEZuQUlSOEU'),
(27, 'Presentations  OIl & Gas Convention 2016', 'Presentations', '', '2017', 'https%3A%2F%2Fdrive.google.com%2Fdrive%2Ffolders%2F0BzeYkIDA8GJiQnhNUzY0d2hBdDQ'),
(28, '7th UCMP ANNUAL GENERAL MEEETING', 'Workshops', '', '2017', 'https%3A%2F%2Fdrive.google.com%2Fopen%3Fid%3D0BzeYkIDA8GJiTGxMTjkybmR6Nzg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `filename` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `filename`, `url`) VALUES
(6, 'Mineral Wealth Conference (MWC2017)', '', 'http://mwc2016.ucmp.ug/');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `file`, `time_updated`) VALUES
(1, 'members.pdf', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `min_pet`
--

CREATE TABLE IF NOT EXISTS `min_pet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `file` text NOT NULL,
  `url` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `min_pet`
--

INSERT INTO `min_pet` (`id`, `name`, `category`, `file`, `url`) VALUES
(4, 'Licence Fees Effective  1st July 2016', '1', '14865452731-licence-fees-eff-1st-july-2016.pdf', ''),
(10, 'Presentations from the OGC and RLEXpo 2017', '2', '', 'https://drive.google.com/open?id=0B0L-HfUKFVS7NUNUNC0tT2g0QnM'),
(13, 'Requirements-for-mineral-licenses', '1', '14954545292_Requirements-for-mineral-licenses.pdf', ''),
(14, 'Localities-of-Minerals-of-Uganda', '1', '1495454637Localities-of-Minerals-of-Uganda.pdf', ''),
(15, 'Mining-Regulations-2004', '1', '1495454718Mining-Regulations-2004.pdf', ''),
(16, 'Mining-Act-2003', '1', '1495454772Mining-Act-2003.pdf', ''),
(17, 'Mineral-Policy-of-Uganda', '1', '1495454846Mineral-Policy-of-Uganda.pdf', ''),
(18, 'Uganda-Mining-Investment-Presentation', '1', '1495455488Uganda-Mining-Investment-Presentation.pdf', ''),
(19, 'Frequently-Asked-Questions-on-Ugandas-Oil-&-Gas-Sector-Dec-2014', '2', '1495455807frequently-asked-questions-on-ugandas-oil-and-gas-sector-dec-2014.pdf', ''),
(20, 'Industrial-Baseline-Study', '2', '1495455850Industrial-Baseline-Study.pdf', ''),
(21, 'National-Content-Opportunities-and-Lessons', '2', '1495455918National-Content-Opportunities-and-Lessons.pdf', ''),
(22, 'Petroleum-Discoveries-In-Ugandas-Albertine-Graben-2015', '2', '1495456150Petroleum-Discoveries-In-Ugandas-Albertine-Graben-2015.pdf', ''),
(23, 'Ugandas-First-Licensing-Round-For-Petroleum-Exploration', '2', '1495456278Ugandas-First-Licensing-Round-For-Petroleum-Exploration.pdf', ''),
(24, 'Blocks-For-The-First-Licening-Round-for-Petroleum-exploration-in-uganda-2015', '2', '1495456448Blocks-For-The-First-Licening-Round-for-Petroleum-exploration-in-uganda-2015.pdf', ''),
(25, 'Status-of-Licensing-in-the-Albertine-Graben-of-Uganda-2015', '2', '1495456480Status-of-Licensing-in-the-Albertine-Graben-of-Uganda-2015.pdf', ''),
(26, 'The-National-Oil-&-Gas-policy-for-Uganda-2008', '2', '1495456565The-National-Oil-&-Gas-policy-for-Uganda-2008.pdf', ''),
(27, 'Introduction-to-the-Uganda-Oil-Refinery-Project-october-2013', '2', '1495456856Introduction-to-the-Uganda-Oil-Refinery-Project-october-2013.pdf', ''),
(28, 'The-Petroleum-Exploration-Development-and-Production-Act-2013 (PEDP)', '2', '1495457076The-Petroleum-Exploration-Development-and-Production-Act-2013_(PEDP).pdf', ''),
(29, 'The-Petroleum-Refining-Conversion-Transmission-and-Midstram-Storage-act-2013', '2', '1495457107The-Petroleum-Refining-Conversion-Transmission-and-Midstram-Storage-act-2013.pdf', ''),
(30, 'UNBS & MEMD CATALOGUE OF UGANDA STANDARDS ON PETROLEUM', '2', '1496059402Catalogue_of_Uganda_Standards_on_Petroleum.pdf', ''),
(31, 'Gazetted Midstream National Content Regulations', '2', '1496060614Gazetted_Midstream_National_Content_Regulations.pdf', ''),
(32, 'Gazzetted Midstream General Regulations', '2', '1496060673Gazzetted_Midstream_General_Regulations.pdf', ''),
(33, 'Upstream General 2016', '2', '1496060744Upstream_General_2016.pdf', ''),
(34, 'Upstream HSC 2016', '2', '1496060766Upstream_HSC_2016.pdf', ''),
(35, 'Upstream Metering 2016', '2', '1496060798Upstream_Metering_2016.pdf', ''),
(36, 'Upstream National Content 2016', '2', '1496060823Upstream_National_Content_2016.pdf', ''),
(37, 'Gazzetted Midstream HSE Regulations', '2', '1496060878Gazzetted_Midstream_HSE_Regulations.pdf', ''),
(38, 'National Suppliers Database_2017_PARTIAL_LIST_19TH_JUNE_2017', '2', '1498116879National_Suppliers_Database_2017_PARTIAL_LIST_19TH_JUNE_2017.pdf', ''),
(39, 'National Suppliers Database_2017_PARTIAL_LIST_27TH_JUNE_2017', '2', '1498743597NSD_2017_PARTIAL_LIST_27TH_JUNE_2017.pdf', ''),
(40, 'National Suppliers Database_2017_3RD_JULY', '2', '1499257343National_Suppliers_Database_2017_3RD_JULY.pdf', ''),
(41, 'OIL AND GAS INFRASTRUCTRE FOR THE DISCOVERIES OF  ALBERTINE GRABEN', '2', '1499341057Infrastructure_map.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `url`) VALUES
(5, 'Uganda gears up for oil local content participation ', ' <p><a href="http://www.observer.ug/business/53107-uganda-gears-up-for-oil-local-content-participation.html">Click here for full story</a></p>\r\n', 'http://www.observer.ug/business/53107-uganda-gears-up-for-oil-local-content-participation.html'),
(6, 'Supplier database to promote transparency in oil, gas sector', ' <p><a href="http://www.monitor.co.ug/Business/Commodities/Supplier-database-to-promote-transparency-in-oil--gas-sector/688610-4000256-i6dmqfz/index.html">Click here for full story</a></p>\r\n', 'http://www.monitor.co.ug/Business/Commodities/Supplier-database-to-promote-transparency-in-oil--gas-sector/688610-4000256-i6dmqfz/index.html'),
(10, 'Iranâ€™s Mostazafan Foundation seeks mining, oil investment opportunities in Uganda', ' ', 'http://ucmp.ug/publications.php'),
(11, 'The Uganda Chamber of Mines and Petroleum (UCMP) elects new board', ' ', 'http://ucmp.ug/publications.php');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo`) VALUES
(2, 'The ', '1487075747Great_Lakes_Carriers.png'),
(3, 'SKA ENERGY UGANDA', '1495788919SKA-Uganda_(Pantone).jpg'),
(4, 'Phoenix Insurance', '14957890091_(1).png'),
(5, 'Spedag Interfreight', '14957890411_(2).jpg'),
(6, 'PWC', '14957890691_(2).png'),
(7, 'Toyota', '14957891261_(3).JPG'),
(8, 'Threeways Shipping', '14957891611_(3).png'),
(9, 'Union Logistics ', '14957892341_(4).jpg'),
(10, 'UAP Insurance', '14957892821_(4).png'),
(11, 'ATIA', '14957893511_(5).jpg'),
(12, 'AFro FReight', '14957893711_(5).png'),
(13, 'AGR', '14957893851_(6).jpg'),
(14, 'Bollore Logistics', '14957893991_(6).png'),
(15, 'FAbrication Systrms', '14957894411_(7).jpg'),
(16, 'e360', '14957894561_(7).png'),
(17, 'OGAS Solution', '14957894841_(8).jpg'),
(18, 'EA CHains', '14957895651_(8).png'),
(19, 'FEIL', '14957895921_(9).png'),
(20, 'uia', '14957896921_(10).png'),
(21, 'intertek', '14957897781_(11).png'),
(22, 'Lets go Travel', '14957914701_(12).png'),
(23, 'Grass Savoye', '14957919281_(13).png'),
(24, 'Gold Star Insurance', '1495791971goldstar-black-logo.jpg'),
(25, 'saaka', '1495792093saka_logoooo.png'),
(26, 'Unifreight', '1495792630Unifreight-Logo-current.png');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `cover` text NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `cover`, `file`) VALUES
(4, 'Unearthing the wealth in the Pearl', '1485008265UCMP_Magazine_Issue_1.pdf', '1485008265UCMP_Magazine_Issue_1.jpg'),
(5, 'Seizing the Opportunities', '1485008305UCMP_Magazine_Issue_2.pdf', '1485008305UCMP_Magazine_Issue_2.jpg'),
(10, 'The Oil Trinity', '1486464350UCMP_Magazine_Issue_3.pdf', '1486464350Issue_3.jpg'),
(11, 'Let the Work Begin', '1486465416UCMP_Magazine_Issue_4.pdf', '1486465416Issue_4.jpg'),
(12, 'Mergers', '1486465603UCMP_Magazine_Issue_5.pdf', '1486465603Issue_5.jpg'),
(13, 'Comeback Kid', '1486466153UCMP_Magazine_Issue_6.pdf', '1486466153Issue_6.jpg'),
(21, 'Kilembe on Sale', '1486476640UCMP_Magazine_Issue_7.pdf', '1486476640Issue_7.jpg'),
(22, 'Court Battle', '1486476722UCMP_Magazine_Issue_8.pdf', '1486476722Issue_8.jpg'),
(25, 'Legal Reforms', '1487071059UCMP_Magazine_Issue_9.pdf', '1487071059Issue_9.jpg'),
(26, 'Brigdette Radebe', '1487071420UCMP_Magazine_issue_10.pdf', '1487071420issue_10.jpg'),
(27, 'Karamoja', '1487153625UCMP_Magazine_Issue_11.pdf', '1487153625Issue_11.jpg'),
(32, 'Law Review', '1487155744UCMP_Magazine_Issue_12.pdf', '1487155744Issue_12_.jpg'),
(33, 'Uganda Alert to Oil Price Drop', '1488882763UCMP_Magazine_Issue_13-compressed.pdf', '1488882763issue_13.jpg'),
(42, 'Caution', '1488896244UCMP_Magazine_Issue_14.pdf', '1488896244Issue_14.jpg'),
(43, 'Local Content', '1488896439UCMP_Magazine_Issue_15_April_2016___Local_Content.pdf', '1488896439Issue_15.jpg'),
(44, 'Uganda Marble', '1488896532UCMP_Magazine_Issue_16_October,_2016.pdf', '1488896532Issue_16.jpg'),
(49, 'The Stage is Now Set', '1494946692issue_17_mobile_2.pdf', '1494946692Issue_17.png'),
(50, 'The Uganda Chamber of Mines and Petroleum (UCMP) elects new board', '1499939460Press_Release_AGM_Meet.pdf', '1499939460Prestatement_UCMP_Image.png'),
(51, 'Iranâ€™s Mostazafan Foundation seeks mining, oil investment opportunities in Uganda', '1499939914Press_Release_Iranian_Meet.pdf', '1499939914Prestatement_UCMP_Image.png');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `caption` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `filename`, `caption`) VALUES
(24, '1494596717web_4.jpg', 'Delegates Group Photo at The joint Oil & Gas Convention and Regional Logistics Expo 2017'),
(26, '1494597340presidents.jpg', 'H.E Teodoro Obiang Nguema of Equatorial Guinea and H.E Yoweri Museveni at the recently Concluded Oil & Gas Convention'),
(31, '1494599251KARAMOJA-SYMPOIUM-TWO.jpg', 'Pre Karamoja Minning Symposium Private Sector Engagment '),
(37, '14946003461487164598website-2.jpg', 'Debate at The Mineral Wealth Conference 2016 Chaired By Hon. Richard Kaijuka UCMP Vice Chairman'),
(38, '1499334271memebers-slider.png', 'The elected Uganda Chamber of Mines & Pretroleum Office Bearers from the Annual General Meeeting');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
