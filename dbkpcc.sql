-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2022 at 09:10 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u881054525_dbkpcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_department`
--

CREATE TABLE `t_memc_department` (
  `dpt_id` int(11) NOT NULL,
  `dpt_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_department`
--

INSERT INTO `t_memc_department` (`dpt_id`, `dpt_name`) VALUES
(1, 'MEAL SUBSIDY'),
(19, 'LOGISTIC & WAREHOUSE'),
(20, 'WAFER MANUFACTURE'),
(21, 'INGOT & WAFER TECHNOLOGY'),
(22, 'INGOT & WAFER QUALITY CONTROL'),
(24, 'CELL TECHNOLOGY'),
(25, 'MODULE TECHNOLOGY'),
(26, 'CELL QUALITY CONTROL'),
(27, 'MODULE QUALITY CONTROL'),
(100, 'EHS'),
(102, 'FINANCE & ACCOUNTING'),
(103, 'PROCUREMENT'),
(104, 'CELL MANUFACTURE'),
(106, 'MODULE MANUFACTURE'),
(108, 'FACILITY'),
(109, 'CEO OFFICE'),
(110, 'SUPPLY CHAIN MGMT'),
(111, 'INFORMATION TECHNOLOGY'),
(112, 'HUMAN RESOURCE'),
(113, 'PLANNING & MATERIAL CONTROL'),
(114, 'CHINA SUPPORTING EMPLOYEE'),
(116, 'CELL OPERATION'),
(117, 'MODULE OPERATION'),
(118, 'INGOT MANUFACTURE 1'),
(119, 'INGOT PROCESS 1'),
(120, 'INGOT EQUIPMENT 1'),
(121, 'INGOT MANUFACTURE 2'),
(122, 'INGOT PROCESS 2'),
(123, 'INGOT EQUIPMENT 2'),
(124, 'SHAPING & RECLAIM MANUFACTURE'),
(125, 'SHAPING & RECLAIM PROCESS'),
(126, 'SHAPING & RECLAIM EQUIPMENT'),
(127, 'WAFER PROCESS'),
(128, 'WAFER EQUIPMENT'),
(129, 'INGOT & WAFER OPERATION CONTROL'),
(130, 'INGOT & WAFER OPERATION MANAGEMENT'),
(131, 'PURCHASING'),
(132, 'CEO'),
(133, 'CELL'),
(134, 'MODULE'),
(135, 'TEMPORARY NEW HIRE ID'),
(136, 'INGOT & WAFER OPERATION MGMT'),
(137, 'PLANNING & OPERATION'),
(138, 'CELL OPERATION 2'),
(139, 'CELL MANUFACTURE 2'),
(140, 'CELL TECHNOLOGY 2'),
(141, 'CELL QUALITY CONTROL 2'),
(143, 'INDUSTRIAL ENGINEERING OPERATION'),
(144, 'CELL MANUFACTURE 3'),
(145, 'CELL TECHNOLOGY 3'),
(146, 'MODULE EQUIPMENT'),
(147, 'MODULE PROCESS'),
(148, 'MODULE YE / NPI'),
(149, 'LOGISTIC'),
(150, 'WAREHOUSE'),
(151, 'PROJECT'),
(152, 'CELL QUALITY CONTROL 3'),
(153, 'CELL EQUIPMENT 3'),
(154, 'CELL PROCESS 3'),
(157, 'CELL OPERATION CONTROL'),
(158, 'CELL PROCESS 2'),
(159, 'CELL EQUIPMENT 2'),
(160, 'FACILITY (CELL)'),
(161, 'SECURITY'),
(162, 'INGOT / WAFER / MODULE QUALITY CONTROL'),
(163, 'CELL PROCESS'),
(164, 'CELL EQUIPMENT'),
(165, 'INGOT EQUIPMENT'),
(166, 'INGOT MANUFACTURE'),
(167, 'INGOT PROCESS'),
(168, 'CELL 3'),
(169, 'CELL QUALITY CONTROL CELL 2'),
(170, 'CELL QUALITY CONTROL CELL 3'),
(171, 'INDUSTRIAL ENGINEERING OPERATION 2'),
(172, 'CELL 2 MANUFACTURE'),
(173, 'CELL EQUIPMENT 4'),
(174, 'CELL MANUFACTURE 4'),
(175, 'CELL PROCESS 4'),
(176, 'CELL MANUFACTURE 1'),
(177, 'CELL EQUIPMENT 1'),
(178, 'CELL PROCESS 1'),
(179, 'INGOT & WAFER QUALITY CONROL'),
(180, 'CEO OFFICE 2'),
(181, 'HUMAN RESOURCE 2'),
(182, 'FACILITY - CELL 2'),
(183, 'WAREHOUSE - CELL 2'),
(184, 'FINANCE & ACCOUNTING 2'),
(185, 'PURCHASING 2'),
(186, 'PLANNING & MATERIAL CONTROL 2'),
(187, 'EHS 2'),
(188, 'PLANNING & OPERATION 2'),
(189, 'SECURITY 2'),
(190, 'WAREHOUSE - CELL 3'),
(191, 'FACILITY - CELL 3'),
(192, 'INFORMATION TECHNOLOGY 2'),
(193, 'LOGISTIC 2'),
(194, 'CELL 4 OPERATION'),
(195, 'CELL 1'),
(196, 'CELL 2'),
(197, 'INGOT & WAFER OPERATION'),
(198, 'INGOT'),
(199, 'CELL 4'),
(200, 'CELL 2 DEPT'),
(201, 'FACILITY DEPT'),
(202, 'CELL 3 DEPT'),
(203, 'INGOT MANUFACTURE - CRYSTAL PULLING'),
(204, 'FACILITY - GENERAL'),
(205, 'FACILITY - CELL 1'),
(206, 'WAFER QUALITY CONTROL'),
(207, 'INGOT TECHNOLOGY - SHAPING (CROP SAW)'),
(208, 'INGOT TECHNOLOGY - CRYSTAL PULLING'),
(209, 'WAREHOUSE - CELL 1'),
(210, 'INGOT QUALITY CONTROL'),
(211, 'INGOT MANUFACTURE - RECLAIM/MATERIAL'),
(212, 'WAREHOUSE - CELL 4'),
(213, 'INGOT MANUFACTURE - SHAPING (CROP SAW)'),
(214, 'INGOT MANUFACTURE - SHAPING (SQUARE)'),
(215, 'CELL QUALITY CONTROL 4'),
(216, 'FACILITY - CELL 4'),
(217, 'WAREHOUSE - WAFER'),
(218, 'INGOT TECHNOLOGY - RECLAIM'),
(219, 'INGOT MANUFACTURE - SHAPING (OD GRINDER)'),
(220, 'WAREHOUSE - INGOT'),
(221, 'CELL 1 DEPT'),
(222, 'CELL 4 DEPT'),
(223, 'CELL MANUFACURE 4'),
(224, 'CELL MANUFACURE 3'),
(225, 'INGOT & WAFER');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_access_right`
--

CREATE TABLE `t_memc_kpcc_access_right` (
  `AR_ID` int(11) NOT NULL,
  `AR_Level` int(11) DEFAULT NULL,
  `AR_Description` varchar(99) DEFAULT NULL,
  `AR_Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_kpcc_access_right`
--

INSERT INTO `t_memc_kpcc_access_right` (`AR_ID`, `AR_Level`, `AR_Description`, `AR_Status`) VALUES
(1, 0, 'Superuser', 0),
(2, 1, 'Admin', 1),
(3, 2, 'Head Of Department', 1),
(4, 3, 'Supervisor', 1),
(5, 4, 'Employee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_Access_Right`
--

CREATE TABLE `t_memc_kpcc_Access_Right` (
  `AR_ID` int(11) NOT NULL,
  `AR_Level` int(11) DEFAULT NULL,
  `AR_Description` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AR_Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_ActionPlan`
--

CREATE TABLE `t_memc_kpcc_ActionPlan` (
  `AP_ID` int(10) NOT NULL,
  `AP_Ei_ID` int(10) DEFAULT NULL,
  `AP_Pt_ID` int(11) DEFAULT NULL,
  `AP_Description` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AP_Date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AP_Status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_actionplan`
--

CREATE TABLE `t_memc_kpcc_actionplan` (
  `AP_ID` int(11) NOT NULL,
  `AP_Ei_ID` int(11) DEFAULT NULL,
  `AP_Pt_ID` int(11) DEFAULT NULL,
  `AP_Description` varchar(10000) DEFAULT NULL,
  `AP_Date` varchar(20) DEFAULT NULL,
  `AP_Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_kpcc_actionplan`
--

INSERT INTO `t_memc_kpcc_actionplan` (`AP_ID`, `AP_Ei_ID`, `AP_Pt_ID`, `AP_Description`, `AP_Date`, `AP_Status`) VALUES
(1, 1, 1, 'try edit ---- 2 -- edit 2 -- edit 3 -- testing function after update --- 19 july 2022', '2022-07-19', '2'),
(2, 2, 2, 'this is new test data -- 2', '2022-07-05', '2'),
(3, 3, 4, 'this is new action plan', '2022-07-26', '1'),
(4, 1, 4, 'try add ----- 3 ', '2022-07-16', '0'),
(5, 1, 1, 'testing project 2 row printing', '2022-07-05', '1'),
(6, 4, 1, '18 july 2022 testing\r\nmanagerial -- customer development -- strategy thinking -- target level 4 - Q4 2022 - core competencies -- score level 2 - project -- project', '2022-07-18', '0'),
(7, 5, 1, 'new action plan ', '2022-07-19', '1'),
(8, 6, 1, 'young talent action plan ', '2022-07-25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_category`
--

CREATE TABLE `t_memc_kpcc_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(200) DEFAULT NULL,
  `c_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_kpcc_category`
--

INSERT INTO `t_memc_kpcc_category` (`c_id`, `c_name`, `c_status`) VALUES
(1, 'KEY POSITION', 1),
(2, 'YOUNG TALENT', 1),
(3, 'BACKBONE TALENT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_competenciesdimension`
--

CREATE TABLE `t_memc_kpcc_competenciesdimension` (
  `Cd_ID` int(11) NOT NULL,
  `Cd_Cc_ID` int(11) DEFAULT NULL,
  `Cd_Name` varchar(255) DEFAULT NULL,
  `Cd_Definition` varchar(10000) DEFAULT NULL,
  `Cd_status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_memc_kpcc_competenciesdimension`
--

INSERT INTO `t_memc_kpcc_competenciesdimension` (`Cd_ID`, `Cd_Cc_ID`, `Cd_Name`, `Cd_Definition`, `Cd_status`) VALUES
(1, 1, '发展客户能力\nCustomer Development', '', '1'),
(2, 2, '质量管理\nQuality Management', '', '1'),
(3, 2, '生产管理  Production Management', '', '1'),
(4, 2, '生产管理\nProduction Management', '', '1'),
(5, 2, '环安管理\nEHS Management', '', '1'),
(6, 1, '发展个人能力\nPersonal Development', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_CompetenciesDimension`
--

CREATE TABLE `t_memc_kpcc_CompetenciesDimension` (
  `Cd_ID` int(11) NOT NULL,
  `Cd_Cc_ID` int(11) DEFAULT NULL,
  `Cd_Name` varchar(255) DEFAULT NULL,
  `Cd_Definition` varchar(10000) DEFAULT NULL,
  `Cd_status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_corecompetencies`
--

CREATE TABLE `t_memc_kpcc_corecompetencies` (
  `Cc_ID` int(11) NOT NULL,
  `Cc_name` varchar(255) DEFAULT NULL,
  `Cc_status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_memc_kpcc_corecompetencies`
--

INSERT INTO `t_memc_kpcc_corecompetencies` (`Cc_ID`, `Cc_name`, `Cc_status`) VALUES
(1, '管理类岗位管理能力库\n Managerial', '1'),
(2, '专业能力库\n Professional', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_CoreCompetencies`
--

CREATE TABLE `t_memc_kpcc_CoreCompetencies` (
  `Cc_ID` int(11) NOT NULL,
  `Cc_name` varchar(255) DEFAULT NULL,
  `Cc_status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_department`
--

CREATE TABLE `t_memc_kpcc_department` (
  `D_ID` int(11) NOT NULL,
  `D_DID` varchar(50) DEFAULT NULL,
  `D_HODID` varchar(50) DEFAULT NULL,
  `D_DPID` varchar(50) DEFAULT NULL,
  `D_Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_kpcc_department`
--

INSERT INTO `t_memc_kpcc_department` (`D_ID`, `D_DID`, `D_HODID`, `D_DPID`, `D_Status`) VALUES
(1, '1', 'L02798', '20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_Department`
--

CREATE TABLE `t_memc_kpcc_Department` (
  `D_ID` int(11) NOT NULL,
  `D_Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `D_HODID` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `D_HODNode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `D_Status` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_employee_category`
--

CREATE TABLE `t_memc_kpcc_employee_category` (
  `ec_id` int(11) NOT NULL,
  `ec_employee_id` varchar(200) DEFAULT NULL,
  `ec_category_id` int(11) DEFAULT NULL,
  `ec_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_kpcc_employee_category`
--

INSERT INTO `t_memc_kpcc_employee_category` (`ec_id`, `ec_employee_id`, `ec_category_id`, `ec_status`) VALUES
(1, 'L02798', 2, NULL),
(2, 'L03602', 2, NULL),
(3, 'L01892', 2, NULL),
(4, 'LT0895', 1, NULL),
(5, 'L03385', 1, NULL),
(6, 'LT0190', 1, NULL),
(7, 'L03590', 1, NULL),
(8, 'L03468', 1, NULL),
(9, 'L03048', 1, NULL),
(10, 'LT0871', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_employee_detail`
--

CREATE TABLE `t_memc_kpcc_employee_detail` (
  `EmpDetail_ID` int(11) NOT NULL,
  `EMP_D_ID` int(11) DEFAULT NULL,
  `Emp_ID` varchar(30) DEFAULT NULL,
  `Emp_P_ID` int(11) DEFAULT NULL,
  `Emp_Name` varchar(200) DEFAULT NULL,
  `Emp_Department` varchar(50) DEFAULT NULL,
  `Emp_JobBand` int(11) DEFAULT NULL,
  `EmpDetail_Status` int(11) DEFAULT NULL,
  `EmpAssign_Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_kpcc_employee_detail`
--

INSERT INTO `t_memc_kpcc_employee_detail` (`EmpDetail_ID`, `EMP_D_ID`, `Emp_ID`, `Emp_P_ID`, `Emp_Name`, `Emp_Department`, `Emp_JobBand`, `EmpDetail_Status`, `EmpAssign_Status`) VALUES
(1, 177, 'L02798', 3, 'Maximilian Parry', 'CELL EQUIPMENT 1', 5, 1, 1),
(2, 131, 'L03602', 3, 'Alaya Portillo', 'PURCHASING', 6, 1, 1),
(3, 174, 'L01892', 5, 'Alejandro Woodard', 'CELL MANUFACTURE 4', 7, 1, 1),
(4, 113, 'LT0895', 3, 'Precious Wheatley', 'PLANNING & MATERIAL CONTROL', 6, 1, 1),
(5, 109, 'L03385', NULL, 'Katrina Mueller', 'CEO OFFICE', 13, 1, 2),
(6, 159, 'LT0190', NULL, 'Donovan Peck', 'CELL EQUIPMENT 2', 5, 1, 2),
(7, 175, 'L03590', 5, 'Phoebe O\'Reilly', 'CELL PROCESS 4', 6, 2, 1),
(8, 175, 'L03468', NULL, 'Kiki Ashley', 'CELL PROCESS 4', 5, 1, 2),
(9, 143, 'L03048', NULL, 'Taha Duarte', 'INDUSTRIAL ENGINEERING OPERATION', 6, 1, 2),
(10, 153, 'LT0871', NULL, 'Rayhan Hopper', 'CELL EQUIPMENT 3', 5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_Employee_detail`
--

CREATE TABLE `t_memc_kpcc_Employee_detail` (
  `EmpDetail_ID` int(11) NOT NULL,
  `EMP_D_ID` int(11) DEFAULT NULL,
  `Emp_ID` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Emp_P_ID` int(11) DEFAULT NULL,
  `Emp_Name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Emp_Department` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Emp_JobBand` int(11) DEFAULT NULL,
  `EmpDetail_Status` int(11) DEFAULT NULL,
  `EmpAssign_Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_employee_item`
--

CREATE TABLE `t_memc_kpcc_employee_item` (
  `Ei_ID` int(11) NOT NULL,
  `Ei_EMP_ID` varchar(20) DEFAULT NULL,
  `Ei_Im_ID` int(11) DEFAULT NULL,
  `Ei_ToDo_Desc` mediumtext DEFAULT NULL,
  `Ei_Category` varchar(20) DEFAULT NULL,
  `Ei_Score` int(11) DEFAULT NULL,
  `Ei_Target_Score` int(11) DEFAULT NULL,
  `Ei_Status` int(11) DEFAULT NULL,
  `Ei_Quarter_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_kpcc_employee_item`
--

INSERT INTO `t_memc_kpcc_employee_item` (`Ei_ID`, `Ei_EMP_ID`, `Ei_Im_ID`, `Ei_ToDo_Desc`, `Ei_Category`, `Ei_Score`, `Ei_Target_Score`, `Ei_Status`, `Ei_Quarter_ID`) VALUES
(1, 'L03590', 2, NULL, 'sub', 7, 8, 0, 2),
(2, 'L03590', 1, NULL, 'core', 4, 2, 1, 3),
(3, 'LT0190', 1, NULL, 'core', 2, 4, 1, 2),
(4, 'L03385', 1, NULL, 'core', 2, 4, 1, 5),
(5, 'L03468', 11, NULL, 'core', 55, 53, 0, 3),
(6, 'L03602', 1, NULL, 'core', 2, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_Employee_item`
--

CREATE TABLE `t_memc_kpcc_Employee_item` (
  `Ei_ID` int(11) NOT NULL,
  `Ei_EMP_ID` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ei_Im_ID` int(11) DEFAULT NULL,
  `Ei_ToDo_Desc` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ei_Category` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ei_Score` int(11) DEFAULT NULL,
  `Ei_Target_Score` int(11) DEFAULT NULL,
  `Ei_Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_employee_profile`
--

CREATE TABLE `t_memc_kpcc_employee_profile` (
  `ep_id` int(11) NOT NULL,
  `ep_number` varchar(200) DEFAULT NULL,
  `ep_unit` varchar(200) DEFAULT NULL,
  `ep_workexperience` varchar(200) DEFAULT NULL,
  `ep_strength` varchar(200) DEFAULT NULL,
  `ep_weakness` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_kpcc_employee_profile`
--

INSERT INTO `t_memc_kpcc_employee_profile` (`ep_id`, `ep_number`, `ep_unit`, `ep_workexperience`, `ep_strength`, `ep_weakness`) VALUES
(1, 'L02798', 'LONGi KCH', 'Waiter', 'Good Communication', 'Weak Effective'),
(2, 'L03590', 'UNIT A', 'testing data', 'test', 'test'),
(3, 'L01892', 'UNIT B', 'testing working experience', 'my stregth', 'my weakness');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_Items`
--

CREATE TABLE `t_memc_kpcc_Items` (
  `Im_ID` int(11) NOT NULL,
  `Im_Cd_ID` int(11) DEFAULT NULL,
  `Im_UID` varchar(30) DEFAULT NULL,
  `Im_Name` varchar(1000) DEFAULT NULL,
  `Im_Definition` longtext DEFAULT NULL,
  `Im_Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_items`
--

CREATE TABLE `t_memc_kpcc_items` (
  `Im_ID` int(11) NOT NULL,
  `Im_Cd_ID` int(11) DEFAULT NULL,
  `Im_UID` varchar(30) DEFAULT NULL,
  `Im_Name` varchar(1000) DEFAULT NULL,
  `Im_Definition` longtext DEFAULT NULL,
  `Im_Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_memc_kpcc_items`
--

INSERT INTO `t_memc_kpcc_items` (`Im_ID`, `Im_Cd_ID`, `Im_UID`, `Im_Name`, `Im_Definition`, `Im_Status`) VALUES
(1, 1, 'cc001', 'Strategic Thinking', 'According to available data system, adopting multiple perspective thinking and innovating business modeling to DERIVE BEST STRATEGY decisions in various situations.', '1'),
(2, 2, 'cc002', 'Quality Control Management', 'Be able to develop management team of quality control, certification and system operation, coordinate the development and optimization of corresponding work', '1'),
(3, 3, 'cc003', 'Production Planning Management', 'Plan, adjust, and supervise the company\'s various businesses, use the company\'s manpower, financial, and material resources rationally to achieve goals.', '1'),
(4, 2, 'cc004', 'Quality risk management', 'Base on the group\'s business plan, establish a risk management system of quality,  the ability to prevent EHS risks', '1'),
(5, 2, 'cc005', 'Quality solving abilities', 'Base on current group situation, the ability to discover problems, find the root causes, and seek correct solutions through data mining.', '1'),
(6, 2, 'cc006', '\nPre-sale and after-sale technical support capabilities in overseas markets', 'Abilities to identify overseas market customer needs and product marketing technical support, customer complaint prevention, investigation and coordination capabilities.', '1'),
(7, 4, 'cc007', 'LEAN production problem solving ability', 'Base on current organization lean production situation, the ability to discover problems, find the root causes, and seek correct solutions through data mining.', '1'),
(8, 4, 'cc008', 'LEAN production policy and process flow planning capabilities', 'Base on existing group\'s business, combined with existing resources, the ability to formulate lean production promotion plans,  relevant policy and process that meet group control needs,', '1'),
(9, 5, 'cc009', 'EHS risk management', 'Base on the group\'s business plan, establish a risk management system of EHS,  the ability to prevent EHS risks', '1'),
(10, 6, 'cc010', 'Effective Communication', 'Master SEEK FIRST TO UNDERSTAND, good SELF EXPRESSION, apply appropriate COMMUNICATION TOOLS to achieve EFFECTIVE OUTCOME without barriers', '1'),
(11, 1, 'cc011', '\nCustomer Value-Added', 'Able to FORESEE own and customer\'s possible development trend, then PROACTIVELY ANTICPATE cusotmer needs with advance WIN-WIN strategy. ', '1'),
(12, 1, 'cc012', '\nChange and Innovation ', 'BEGIN WITH END IN MIND, able to ANTICIPATE FUTURE opportunities / challenges, DEVELOP NEW STRATEGY and CONSOLIDATING available resources to seize new LONGTERM BENEFITS.', '1'),
(13, 6, 'cc013', 'Strive for Excellent ', 'CONSTANTLY CHALLENGE oneself, SET GREATER GOALS, seek breakthrough to SURPASS PAST RESULT, in order to PURSUE EXCELLENT in business achievement', '1'),
(14, 6, 'cc014', 'Goal Management ', 'Able to DEVELOP and EXECUTE work plan based on organization goal. Able to IMPLEMENT EFFECTIVE PROCESS CONTROL to ensure the acheivement of business goal.', '1'),
(15, 6, 'cc015', 'Building Partnership', 'Able to build or maintain a FRIENDLY and HARMONIOUS RELATIONSHIP with those who contributed to the achievement of work-related goals', '1'),
(16, 5, 'cc016', 'EHS risk management', 'Base on the group\'s business plan, establish a risk management system of EHS,  the ability to prevent EHS risks', '1'),
(17, 5, 'cc017', 'EHS solving abilities', 'Base on current group situation, the ability to discover problems, find the root causes, and seek correct solutions through data mining.', '1'),
(18, 1, 'cc999', 'test', 'asd', '1'),
(19, 6, 'cc998', 'test2', 'asdasd', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_Items_lvl_desc`
--

CREATE TABLE `t_memc_kpcc_Items_lvl_desc` (
  `Im_lvl_ID` int(11) NOT NULL,
  `Im_lvl_Im_ID` int(11) DEFAULT NULL,
  `Im_lvl_Name` varchar(20) DEFAULT NULL,
  `Im_lvl_Description` varchar(1000) DEFAULT NULL,
  `Im_lvl_Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_items_lvl_desc`
--

CREATE TABLE `t_memc_kpcc_items_lvl_desc` (
  `Im_lvl_ID` int(11) NOT NULL,
  `Im_lvl_Im_ID` int(11) DEFAULT NULL,
  `Im_lvl_Name` varchar(20) DEFAULT NULL,
  `Im_lvl_Description` varchar(1000) DEFAULT NULL,
  `Im_lvl_Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_memc_kpcc_items_lvl_desc`
--

INSERT INTO `t_memc_kpcc_items_lvl_desc` (`Im_lvl_ID`, `Im_lvl_Im_ID`, `Im_lvl_Name`, `Im_lvl_Description`, `Im_lvl_Status`) VALUES
(1, 1, 'level 1', 'DERIVE BREAKTHROUGH STRATEGY by ASSESSING NEXT 3-5 YEARS industry trend. Integrating business practices, radical thinking, innovativing business model', '1'),
(2, 1, 'level 2', 'DERIVE BEST STRATEGY by balancing all the PROs & CONs of various factors, and identifying the practicality of various alternatives through SCENARIO STUDY', '1'),
(3, 1, 'level 3', 'MOBILIZE TEAM to identify the BEST STRATEGY PATH to ACHIEVE GOALS targetted by the organization via practising mutiple persepctive thinking', '1'),
(4, 1, 'level 4', 'APPLY MANAGEMENT TOOLS to make analyysis on business, markets, products & customers, in order to DISCOVER INDUSTRY PATTERN', '1'),
(5, 1, 'level 5', 'PERFORM ANALYSIS on industry, market, product and customer data to DISCOVER THEIR INTER-RELATIONSHIP', '1'),
(6, 2, 'level 1', 'Organize the estahblishment and improvement of organization quality management system; able to plan and manage the quality control management work to external party.', '1'),
(7, 2, 'level 2', 'Establish and improve the company\'s quality system/EHS system and process; be able to organize and formulate quality plans and goals setting.', '1'),
(8, 2, 'level 3', 'Be able to arrange and coordinate the supplier\'s on-site auditors and work; conduct on-site audits and assessment of suppliers; tracking non-conformance items improvment.', '1'),
(9, 2, 'level 4', 'Perform routine audit; be able to improve the tracking of non-conformance items in the routine audit.', '1'),
(10, 2, 'level 5', 'Participate in material revision; reviewing the validity of the document format.', '1'),
(11, 3, 'level 1', 'Able to formulate a breakthrough production plan, tap production potential; be able to guide employees to self-manage and take the initiative to prevent and solve problems; have strong production foresight ability, effectively link with the company\'s strategy, and formulate the company\'s production plan Management strategy.', '1'),
(12, 3, 'level 2', 'Be able to formulate short, medium and long-term demand plans, integrate resources from the aspects of orders, materials, production capacity, costs, etc., and guide production; be able to construct planning management system for the procution plant, formulate related systems, procedures, and methods.', '1'),
(13, 3, 'level 3', 'Able to formulate weekly and monthly plans; able to balance orders based on capacity, cost and quality; be able to coordinate and deal with abnormal situations, and organize teams to find the causes of problems and formulate improvement measures.', '1'),
(14, 3, 'level 4', 'Be able to formulate daily production plans, and place work orders based on demand and actual production; perform routinely supervision to the plan implementation; be able to coordinate or report abnormality.', '1'),
(15, 3, 'level 5', 'Able to carry out administrative support to plan management under the guidance, such as collecting feedback, and communicating plan instructions.', '1'),
(16, 4, 'level 1', 'Base the group\'s business plan, establish and promote at the group level the risk management system of quality to effectively prevent relevant risk', '1'),
(17, 4, 'level 2', 'Base the group\'s business plan, establish and promote within the fucntion of risk management system of quality to effectively prevent relevant risk.', '1'),
(18, 4, 'level 3', 'Proficient in the risk management knowledge, methods and tools of quality, be able to guide team members to effectively prevent relevant risks.', '1'),
(19, 4, 'level 4', 'Master the risk management knowledge, methods and tools of quality, be able to independently or guide team members under simple circumstances to effectively prevent relevant risks.', '1'),
(20, 4, 'level 5', 'Hold onto basic risk control knowledge, methods and tools of quality, and be able to complete the basic work under the guidance', '1'),
(21, 5, 'level 1', 'Base on current group\'s quality situation, the ability to discover problems, find the root causes through data mining, resolve systematic and overall problem.', '1'),
(22, 5, 'level 2', 'Base on current group\'s quality situation, the ability to discover problems and find the root causes through data mining, resolve internal problem.', '1'),
(23, 5, 'level 3', 'Proficient in quality data mining, problem analysis, problem-solving methods and tools, and solving general complex problems in the system.', '1'),
(24, 5, 'level 4', 'Master the system data mining, problem analysis, problem-solving methods and tools, and able to resolve common problem', '1'),
(25, 5, 'level 5', 'Hold onto basic system data mining, problem analysis, problem solving methods and tools, and be able to complete basic tasks under the guidance.', '1'),
(26, 6, 'level 1', 'Fully grasp the product performance, production process, and quality management process of the business unit, identify overseas customer needs, and train sales & marketing team customer service on related business processes and product technical knowledge, prevent, investigate, coordinate and handle customer complaints, and promote marketing of product technology.', '1'),
(27, 6, 'level 2', 'Master the product performance, production process, and quality management process of the business unit, be able to identify overseas customer needs, and train sales & marketing team\'s customer service on related business processes, product technical knowledge, prevent, investigate, coordinate and handle customer complaints, and assist in the marketing the products technology.', '1'),
(28, 6, 'level 3', 'Master the main product performance, production process, and quality management process of the business unit, be able to train the sales & marketing team\'s customer service on related business processes and product technical knowledge, and be able to investigate, coordinate and handle customer complaints.', '1'),
(29, 6, 'level 4', 'Master part of the product performance, production process, and quality management process of the business unit, be able to train the sales & marketing team\'s customer service on related  business process and product technical knowledge, and be able to investigate, coordinate and handle customer complaints', '1'),
(30, 6, 'level 5', 'Master part of the product performance, production process and quality management process of the business unit, and be able to train the sales & marketing team\'s customer service on related business process and product technical knowledge under the guidance.', '1'),
(31, 7, 'level 1', 'Base on current organization lean production situation, detect the problem, identified root cause, and solve the systematic and overall problem though data mining.', '1'),
(32, 7, 'level 2', 'Base on current organization lean production situation, identify the problem, root cause, and resolve production efficiency issue through data mining.', '1'),
(33, 7, 'level 3', 'Proficient in lean production data mining, problem analysis, problem solving methods and tools, and solving challenging problems.', '1'),
(34, 7, 'level 4', 'Familiar with lean production data mining, problem analysis, problem solving methods and tools, and solving common problems.', '1'),
(35, 7, 'level 5', 'Hold onto basic lean production data mining, problem analysis, problem solving methods and tools, and be able to complete basic tasks under the guidance.', '1'),
(36, 8, 'level 1', 'Base on existing group\'s business, combined with existing resources, formulate lean production promotion plans, relevant policy and process that meet group control needs, as well as promote implementation at the goup level.', '1'),
(37, 8, 'level 2', 'Base on existing group\'s business, combined with existing resources, formulate lean production promotion plans, and relevant policy and process that meet group control needs, as well as promote implementation within lean system.', '1'),
(38, 8, 'level 3', 'Proficient in lean production promotion, policy, process consgtruction method and tools, able to guide the team to complete more complex and challenging problems.', '1'),
(39, 8, 'level 4', 'Proficient in lean production promotion, policy, and process construction method and tools, able to to independently or guide the team to complete the task under simple circumstance.', '1'),
(40, 8, 'level 5', 'Hold onto the basic lean production system, process construction methods and tools, and be able to complete basic tasks under the guidance.', '1'),
(41, 9, 'level 1', 'Base the group\'s business plan, establish and promote at the group level the risk management system of EHS to effectively prevent relevant risk', '1'),
(42, 9, 'level 2', 'Base the group\'s business plan, establish and promote within the fucntion of risk management system of EHS to effectively prevent relevant risk.', '1'),
(43, 9, 'level 3', 'Proficient in the risk management knowledge, methods and tools of EHS, be able to guide team members to effectively prevent relevant risks.', '1'),
(44, 9, 'level 4', 'Master the risk management knowledge, methods and tools of EHS, be able to independently or guide team members under simple circumstances to effectively prevent relevant risks.', '1'),
(45, 9, 'level 5', 'Hold onto basic risk control knowledge, methods and tools of EHS, and be able to complete the basic work under the guidance', '1'),
(46, 10, 'level 1', 'Achieve desired outcome on COMPLICATED / SENSITIVE issues, with DIFFERENT LEVEL AUDIENCE, by applying RATIONAL ARGUEMENT, FACTS & relevant APPROACHES', '1'),
(47, 10, 'level 2', 'PERFORM FILTERING of confidential information and COMMUNICATE SELECTIVELY through NECESSARY DISCLOSURE approach that suits the audience', '1'),
(48, 10, 'level 3', 'Communicate COMPLICATED / SENSITIVE issues by applying RATIONAL ARGUEMENT, FACTS & relevant APPROACHES that suits the audience', '1'),
(49, 10, 'level 4', 'Master the skill to GRASP THE TRUE MESSAGE that people attempt to express but unclear, or failed to expressed publicly', '1'),
(50, 10, 'level 5', 'ABLE TO OBSERVE and ANTICIPATE POTENTIAL REACTIONS from the audience when expressing own message, and PREPARE TO RESPOND back effectively', '1'),
(51, 11, 'level 1', 'Able to establish long term WIN-WIN PARTNERSHIP, that exceed customer\'s satisfaction while defend OWN WIN', '1'),
(52, 11, 'level 2', 'Able to research customer\'s TRUE NEED, achieve cross functional SYNERGIZE that exceed customer\'s expectation', '1'),
(53, 11, 'level 3', 'Able to understand customer\'s NEED & identify the TRUE CAUSES to improve system & operation flawness', '1'),
(54, 11, 'level 4', 'Able to TAKE FULL RESPONSIBILITY and spend time & effort in solving CUSTOMER\'S NEED', '1'),
(55, 11, 'level 5', '', '1'),
(56, 12, 'level 1', 'FORESEE, FORECAST, ANTICIPATE FUTURE opportunities / challenges, working OUTSIDE OF OPERATION NORM to seize new LONGTERM BENEFITS', '1'),
(57, 12, 'level 2', 'Develop NEW POLICIES, MEASURES & WAYS, alignng  and consolidating AVAILABLE MEANS & RESOURCES to seize opportunity while BALANCING RISKS', '1'),
(58, 12, 'level 3', 'INTEGRATE AVAILABLE RESOURCES, apply SUSTAINABLE ACTIONS by maintaining INNOVATIVE SENSITIVITY to support company\'s strategies', '1'),
(59, 12, 'level 4', 'RECOGNIZE and PROMOTE INNOVATIONS / TRIALS among team while willing to CONFRONT FAILURE, promote team to VENTURE NEW IDEAS in own and OTHER FIELDS', '1'),
(60, 12, 'level 5', 'PAY ATTENTION by own self to any new technologies or methodology from external source, ASSESS FEASIBILITY / IMPACT to be applied internally by BALANCING RISK', '1'),
(61, 13, 'level 1', 'INVEST ONESELF\'s energy & resources, ABLE TO TAKE RISK, conduct DETAILED PLANNING in order to better ACHIEVE GOALS that had been set', '1'),
(62, 13, 'level 2', 'TAKE INITIATIVE to set CHALLENGING GOALS for oneself & apply PROACTIVE MEANS to accomplish them. MOBILIZE TEAM\'s pursuit of goals through goal setting', '1'),
(63, 13, 'level 3', 'LEAD AS EXAMPLE by VOLUNTARILY UNDERTAKE company\'s challenging goals. GUIDE TEAM to STRIVE FOR EXCELLENT by establishing good system & policy', '1'),
(64, 13, 'level 4', 'PROACTIVELY IMPROVE and RESOLVE WEAKNESS of operation\'s effectivenss, efficiency & quality, through enhancement of procedure, regulation or methodology.', '1'),
(65, 13, 'level 5', 'WILLINGLY ACCEPT tasks & responsibilities assigned to oneself, INVEST EXTRA time & effort to accomplish them accordingly', '1'),
(66, 14, 'level 1', 'Able to INCORPORATE NEW & INNOVATIVE APPROACH into goal management system to solve SYSTEMATICAL ISSUE, and lead the whole OPERATION SYSTEM to ensure effective goal achievement', '1'),
(67, 14, 'level 2', 'Able to PROMOTE THE SKILL in goal management to ensure TEAM MEMBER can effectively monitor & complete task with HIGH COMPLEXITY SYSTEMATICALLY.', '1'),
(68, 14, 'level 3', 'Able to MASTER THE SKILL in goal management to develop own working plan IDEPENDENTLY, and effectively monitor & complete task with HIGH COMPLEXITY', '1'),
(69, 14, 'level 4', 'Able to APPLY PROFICIENT SKILL in goal management to develop own working plan INDEPENDENTLY, and effectively monitor & complete task with MODERATE COMPLEXITY', '1'),
(70, 14, 'level 5', 'Able to APPLY FUNDAMENTAL SKILL in goal management to develop own working plan with SUPERVISION.', '1'),
(71, 15, 'level 1', 'BUILD VAST SOCIAL NETWORK by idenyifing the UNIQUE INDIVIDUAL characters, interests, & interaction styles of people from different background', '1'),
(72, 15, 'level 2', 'INCREASE SOCIAL NETWORK via indirect relationship with others,apply various SOCIAL INTERACTION SKILLS that accounts both SITUATIONAL & AUDIENCE factors', '1'),
(73, 15, 'level 3', 'BUILD RAPPORT, seek & create ENGAGEMENT OPPORTUNITY in unfamiliar environments, and BUILD FELLOWSHIP through informal interaction', '1'),
(74, 15, 'level 4', 'ESTABLISH FOUNDATION in advancing relatonship with partners at work by engaging CASUAL INTERACTION & idenyifing UNIQUE INDIVIDUAL characters & interest', '1'),
(75, 15, 'level 5', 'ACCEPT SOCIAL INVITATION by others and interact accordingly, but DOESN\'T PROACTIVELY expand or deliberately establish working relationship', '1'),
(76, 16, 'level 1', 'Base the group\'s business plan, establish and promote at the group level the risk management system of EHS to effectively prevent relevant risk', '1'),
(77, 16, 'level 2', 'Base the group\'s business plan, establish and promote within the fucntion of risk management system of EHS to effectively prevent relevant risk.', '1'),
(78, 16, 'level 3', 'Proficient in the risk management knowledge, methods and tools of EHS, be able to guide team members to effectively prevent relevant risks.', '1'),
(79, 16, 'level 4', 'Master the risk management knowledge, methods and tools of EHS, be able to independently or guide team members under simple circumstances to effectively prevent relevant risks.', '1'),
(80, 16, 'level 5', 'Hold onto basic risk control knowledge, methods and tools of EHS, and be able to complete the basic work under the guidance', '1'),
(81, 17, 'level 1', 'Base on current group\'s EHS situation, the ability to discover problems, find the root causes through data mining, resolve systematic and overall problem.', '1'),
(82, 17, 'level 2', 'Base on current group\'s EHS situation, the ability to discover problems and find the root causes through data mining, resolve internal problem.', '1'),
(83, 17, 'level 3', 'Proficient in EHS data mining, problem analysis, problem-solving methods and tools, and solving general complex problems in the system.', '1'),
(84, 17, 'level 4', 'Master the system data mining, problem analysis, problem-solving methods and tools, and able to resolve common problem', '1'),
(85, 17, 'level 5', 'Hold onto basic system data mining, problem analysis, problem solving methods and tools, and be able to complete basic tasks under the guidance.', '1'),
(86, 18, 'level 1', 'asd', 'a'),
(87, 18, 'level 2', 'asd', 'a'),
(88, 18, 'level 3', 'sad', 'a'),
(89, 18, 'level 4', 'das', 'a'),
(90, 18, 'level 5', '5', 'a'),
(91, 19, 'level 1', 'dasd', '1'),
(92, 19, 'level 2', 'asdasda', '1'),
(93, 19, 'level 3', 'asdas', '1'),
(94, 19, 'level 4', 'asdasd', '1'),
(95, 19, 'level 5', 'asd', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_PlanType`
--

CREATE TABLE `t_memc_kpcc_PlanType` (
  `Pt_ID` int(11) NOT NULL,
  `Pt_Name` varchar(1000) DEFAULT NULL,
  `Pt_Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_plantype`
--

CREATE TABLE `t_memc_kpcc_plantype` (
  `Pt_ID` int(11) NOT NULL,
  `Pt_Name` varchar(1000) DEFAULT NULL,
  `Pt_Status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_memc_kpcc_plantype`
--

INSERT INTO `t_memc_kpcc_plantype` (`Pt_ID`, `Pt_Name`, `Pt_Status`) VALUES
(1, 'Project', '1'),
(2, 'Courses', '1'),
(3, 'Coaching', '1'),
(4, 'Exposure', '1'),
(5, 'OJT', '1'),
(6, 'Others', '1'),
(7, 'project', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_quarter`
--

CREATE TABLE `t_memc_kpcc_quarter` (
  `Q_ID` int(11) NOT NULL,
  `Q_Name` varchar(20) DEFAULT NULL,
  `Q_Year` varchar(20) DEFAULT NULL,
  `Q_Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_kpcc_quarter`
--

INSERT INTO `t_memc_kpcc_quarter` (`Q_ID`, `Q_Name`, `Q_Year`, `Q_Status`) VALUES
(1, 'Q1', '2021', '1'),
(2, 'Q1', '2022', '1'),
(3, 'Q2', '2022', '1'),
(4, 'Q3', '2022', '1'),
(5, 'Q4', '2022', '1'),
(6, 'Q2', '2021', '1'),
(7, 'Q4', '2021', '1'),
(8, 'Q3', '2021', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_quarter_report`
--

CREATE TABLE `t_memc_kpcc_quarter_report` (
  `QR_ID` int(11) NOT NULL,
  `QR_Q_ID` int(11) DEFAULT NULL,
  `QR_E_ID` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QR_Mentor_Evaluation` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QR_PD_Summary` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `QR_Marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_memc_kpcc_quarter_report`
--

INSERT INTO `t_memc_kpcc_quarter_report` (`QR_ID`, `QR_Q_ID`, `QR_E_ID`, `QR_Mentor_Evaluation`, `QR_PD_Summary`, `QR_Marks`) VALUES
(1, 2, 'L03590', 'testing data mentors evaluation and suggestion  -- version 1 -- version 2', 'testing data personal development summary -- version 1 -- version 2 ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_Report_To`
--

CREATE TABLE `t_memc_kpcc_Report_To` (
  `RT_ID` int(11) NOT NULL,
  `RT_Emp_ID` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Report_To_Emp_ID` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_kpcc_report_to`
--

CREATE TABLE `t_memc_kpcc_report_to` (
  `RT_ID` int(11) NOT NULL,
  `RT_Emp_ID` varchar(30) DEFAULT NULL,
  `Report_To_Emp_ID` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_kpcc_report_to`
--

INSERT INTO `t_memc_kpcc_report_to` (`RT_ID`, `RT_Emp_ID`, `Report_To_Emp_ID`) VALUES
(1, 'L02798', 'L03048'),
(2, 'L03602', 'L03048'),
(3, 'L01892', 'LT0871'),
(4, 'LT0895', 'L03048'),
(5, 'L03590', 'L03048');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_position`
--

CREATE TABLE `t_memc_position` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_position`
--

INSERT INTO `t_memc_position` (`pos_id`, `pos_name`) VALUES
(3, 'Mfg Superintendent'),
(4, 'Mfg Training Eng'),
(5, 'Mfg Reporting Eng'),
(7, 'Mfg Engineer'),
(8, 'Mfg Imprvmt Eng'),
(9, 'Mfg Specialist'),
(13, 'JUNIOR ENGINEER'),
(14, 'SENIOR SUPERINTENDENT'),
(15, 'ENGINEER'),
(16, 'SENIOR ENGINEER'),
(17, 'STAFF SUPERINTENDENT'),
(18, 'Senior Staff Superintendent'),
(20, 'MANUFACTURING SPECIALIST'),
(21, 'Training Staff Engineer'),
(22, 'Site General Manager'),
(23, 'SITE QUALITY MANAGER'),
(25, 'IE/Planning Manager'),
(26, 'Principal Engineer'),
(29, 'Site EHS/Human Resource Senior Manager'),
(31, 'STAFF ENGINEER'),
(32, 'Site Manager IT'),
(33, 'Human Resource Executive'),
(34, 'SENIOR STAFF ENGINEER'),
(35, 'PURCHASING MANAGER'),
(37, 'Senior Executive'),
(38, 'SENIOR BUYER'),
(39, 'PA/Admin Manager'),
(40, 'Slicing Manager'),
(41, 'Shaping/Metrology Manager'),
(43, 'SENIOR PRINCIPAL ENGINEER'),
(44, 'TECHNICAL SPECIALIST'),
(45, 'EXECUTIVE'),
(46, 'SITE FINANCE MANAGER'),
(47, 'SENIOR TECHNICAL SPECIALIST'),
(48, 'WCS Senior Staff Engineer'),
(50, 'TECHNICIAN'),
(51, 'SENIOR TECHNICIAN'),
(53, 'Facility Technician'),
(56, 'Secretary'),
(57, 'Senior Staff - Security'),
(58, 'Assistant'),
(59, 'Junior Technician'),
(60, 'MANUFACTURING ASSISTANT III'),
(61, 'JUNIOR MANUFACTURING SPECIALIST'),
(62, 'MANUFACTURING ASSISTANT IV'),
(63, 'MANUFACTURING ASSISTANT II'),
(64, 'Manufacturing Assistance IV'),
(65, 'SECURITY GUARD 3'),
(68, 'Solar Wafer Process Engineer'),
(69, 'SENIOR ASSISTANT'),
(72, 'MANUFACTURING ASSISTANT V'),
(73, 'SENIOR MANUFACTURING SPECIALIST'),
(74, 'Assistant Technician'),
(75, 'INSPECTOR II'),
(77, 'Security III'),
(78, 'MANUFACTURING ASSISTANT I'),
(80, 'Junior Â Engineer'),
(81, 'INSPECTOR I'),
(82, 'Guest'),
(83, 'JUNIOR ASSISTANT I'),
(84, 'JUNIOR ASSISTANT II'),
(85, 'KPO Leader'),
(86, 'Director'),
(87, 'ACCOUNTANT'),
(88, 'Senior Manager'),
(89, 'Trainee'),
(90, 'KPO Member'),
(91, 'Acting Superintendent'),
(92, 'SECTION HEAD'),
(94, 'Buyer'),
(100, 'Manager'),
(101, 'MANUFACTURING INSPECTOR II'),
(102, 'MANUFACTURING INSPECTOR I'),
(103, 'MANUFACTURING INSPECTOR III'),
(104, 'MANUFACTURING INSPECTOR V'),
(105, 'MANUFACTURING INSPECTOR IV'),
(106, 'ASSISTANT I'),
(107, 'ASSISTANT II'),
(108, 'Contract Manufacturing Assistant'),
(109, 'FACILITY DIRECTOR'),
(110, 'CONTRACT PA/ADMIN MANAGER'),
(111, 'SENIOR DIRECTOR'),
(112, 'OPERATION DIRECTOR'),
(113, 'ENGINEERING SENIOR MANAGER'),
(115, 'DIRECTOR, ENGINEERING, PRODUCT & YIELD ENHANCEMENT'),
(116, 'LOGISTIC AND WAREHOUSE MANAGER'),
(117, 'PRODUCTIVITY IMPROVEMENT MANAGER'),
(118, 'SECTION MANAGER'),
(119, 'STAFF EXECUTIVE'),
(120, 'ACCOUNTING & COMPLIANCE MANAGER'),
(121, 'MANUFACTURING MANAGER'),
(122, 'SENIOR STAFF SECURITY'),
(123, 'JUNIOR EXECUTIVE'),
(124, 'ASSISTANT ENGINEER'),
(125, 'SECURITY GUARD 4'),
(126, 'ADMIN EXECUTIVE'),
(127, 'ENVIRONMENTAL ENGINEER'),
(128, 'HUMAN RESOURCE MANAGER'),
(129, 'INSPECTOR III'),
(130, 'SECURITY GUARD 2'),
(131, 'ASSISTANT EXECUTIVE'),
(132, 'ASSISTANT TECHNICIAN 2'),
(133, 'DRIVER 2'),
(134, 'DRIVER 3'),
(135, 'DRIVER 4'),
(136, 'DRIVER 5'),
(137, 'SENIOR DRIVER'),
(138, 'NEW HIRE'),
(227, 'CEO'),
(228, 'Chief Operating Officer'),
(229, 'Manager (Acting)'),
(230, 'Section Manager (Acting)'),
(231, 'Senior Staff Executive'),
(232, 'SECURITY GUARD 1'),
(233, 'Junior Assistant'),
(234, 'Inspector 2'),
(235, 'Inspector 1'),
(236, 'Cell Manufacture'),
(237, 'Cell & Module Quality Control'),
(238, 'Cell & Module Technology'),
(239, 'Cell & Module TechnologyÂ '),
(240, 'Planning & Material ControlÂ '),
(241, 'Ingot Manufacture'),
(242, 'Logistic & Warehouse'),
(243, 'Module Manufacture'),
(244, 'Planning & Material Control'),
(245, 'GETS INTERN'),
(260, 'CHIEF EXECUTIVE OFFICER'),
(261, 'Manufacturing Assistant'),
(262, 'Junior Inspector 1'),
(263, 'Junior Inspector 2'),
(264, 'Junior Inspector 3'),
(265, 'ASSISTANT 1'),
(267, 'ASSISTANT 2'),
(268, 'ASSISTANT TECHNICIAN 1'),
(269, 'DRIVER 1'),
(270, 'FELLOW'),
(271, 'INDUSTRIAL TRAINEE'),
(272, 'INSPECTOR 3'),
(273, 'JUNIOR ASSISTANT 1'),
(274, 'JUNIOR ASSISTANT 2'),
(275, 'JUNIOR BUYER'),
(276, 'JUNIOR SUPERINTENDENT'),
(277, 'MANUFACTURING ASSISTANT 1'),
(278, 'MANUFACTURING ASSISTANT 2'),
(279, 'MANUFACTURING ASSISTANT 3'),
(280, 'MANUFACTURING ASSISTANT-CONTRACT'),
(281, 'MEMBER OF TECHNICAL STAFF'),
(282, 'PRINCIPAL'),
(283, 'SENIOR ACCOUNTANT'),
(284, 'SENIOR FELLOW'),
(285, 'SENIOR INSPECTOR'),
(286, 'SENIOR MEMBER OF TECHNICAL STAFF'),
(287, 'SENIOR PRINCIPAL'),
(288, 'SENIOR STAFF ACCOUNTANT'),
(289, 'SENIOR STAFF BUYER'),
(290, 'STAFF ACCOUNTANT'),
(291, 'STAFF BUYER'),
(292, 'SUPERINTENDENT'),
(293, 'MANUFACTURING ASSISTANT - CONTRACT'),
(294, 'INSPECTOR'),
(295, 'SENIOR MANUFACTURING ASSISTANT'),
(296, 'CELL MANUFACTURE 2'),
(297, 'TECHNICAL EXPERT'),
(298, 'SENIOR SECURITY ASSISTANT'),
(299, 'Assembler'),
(300, 'ASSEMBLER 1'),
(301, 'SECURITY ASSISTANT'),
(302, 'TECHNCIAN'),
(303, 'SENIOR LEGAL COUNSEL'),
(304, ''),
(305, 'ASSEMBER'),
(306, 'INTERN');

-- --------------------------------------------------------

--
-- Table structure for table `t_memc_staff`
--

CREATE TABLE `t_memc_staff` (
  `stf_id` int(11) NOT NULL,
  `stf_password` varchar(200) DEFAULT NULL,
  `stf_name` varchar(200) DEFAULT NULL,
  `stf_position_id` int(11) DEFAULT NULL,
  `stf_department_id` int(11) DEFAULT NULL,
  `stf_report_to_user_id` int(11) DEFAULT NULL,
  `stf_type` varchar(20) DEFAULT NULL,
  `stf_employee_number` varchar(20) DEFAULT NULL,
  `stf_email` varchar(200) DEFAULT NULL,
  `stf_user_status` int(11) DEFAULT NULL,
  `stf_gender` varchar(20) DEFAULT NULL,
  `stf_shift_id` int(11) DEFAULT NULL,
  `stf_plant` varchar(20) DEFAULT NULL,
  `stf_position_category` varchar(20) DEFAULT NULL,
  `stf_grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_memc_staff`
--

INSERT INTO `t_memc_staff` (`stf_id`, `stf_password`, `stf_name`, `stf_position_id`, `stf_department_id`, `stf_report_to_user_id`, `stf_type`, `stf_employee_number`, `stf_email`, `stf_user_status`, `stf_gender`, `stf_shift_id`, `stf_plant`, `stf_position_category`, `stf_grade`) VALUES
(1, 'MD5PASSWORD', 'Maximilian Parry', 15, 177, 387, 'E', 'L02798', 'email@mail.com', 1, 'M', 6, 'CELL', 'EXE', 5),
(2, 'MD5PASSWORD', 'Alaya Portillo', 37, 131, 1467, 'E', 'L03602', 'email@mail.com', 1, 'F', 6, 'GENERAL', 'EXE', 6),
(3, 'MD5PASSWORD', 'Alejandro Woodard', 31, 174, 10655, 'E', 'L01892', 'email@mail.com', 1, 'M', 6, 'CELL4', 'EXE', 7),
(4, 'MD5PASSWORD', 'Dominika Mcgregor', 15, 139, 5334, 'E', 'LT0726', 'email@mail.com', 2, 'F', 5, 'CELL2', 'EXE', 5),
(5, 'MD5PASSWORD', 'Precious Wheatley', 16, 113, 121, 'E', 'LT0895', 'email@mail.com', 1, 'F', 5, 'GENERAL', 'EXE', 6),
(6, 'MD5PASSWORD', 'Katrina Mueller', 304, 109, 2, 'E', 'L03385', 'email@mail.com', 1, 'M', 6, 'GENERAL', 'MGR', 13),
(7, 'MD5PASSWORD', 'Donovan Peck', 15, 159, 5482, 'E', 'LT0190', 'email@mail.com', 1, 'M', 6, 'CELL2', 'EXE', 5),
(8, 'MD5PASSWORD', 'Phoebe O\'Reilly', 16, 175, 10641, 'E', 'L03590', 'email@mail.com', 1, 'M', 6, 'CELL4', 'EXE', 6),
(9, 'MD5PASSWORD', 'Kiki Ashley', 15, 175, 10643, 'E', 'L03468', 'email@mail.com', 1, 'M', 6, 'CELL4', 'EXE', 5),
(10, 'MD5PASSWORD', 'Taha Duarte', 16, 143, 19, 'E', 'L03048', 'email@mail.com', 1, 'M', 6, 'GENERAL', 'EXE', 6),
(11, 'MD5PASSWORD', 'Rayhan Hopper', 15, 153, 7083, 'E', 'LT0871', 'email@mail.com', 1, 'M', 5, 'CELL3', 'EXE', 5),
(12, 'MD5PASSWORD', 'Zoha Carroll', 15, 111, 9, 'E', 'LT1128', 'email@mail.com', 1, 'M', 6, 'GENERAL', 'EXE', 5),
(13, 'MD5PASSWORD', 'Charlie Morley', 100, 173, 2, 'E', 'L00021', 'email@mail.com', 2, 'M', 6, 'CELL4', 'MGR', 10),
(14, 'MD5PASSWORD', 'Roisin Duncan', 118, 143, 19, 'E', 'L00122', 'email@mail.com', 1, 'F', 5, 'GENERAL', 'MGR', 9),
(15, 'MD5PASSWORD', 'Denis Vu', 45, 150, 117, 'E', 'LT2315', 'email@mail.com', 1, 'M', 5, 'GENERAL', 'EXE', 5),
(16, 'MD5PASSWORD', 'Wilfred Daugherty', 118, 150, 5098, 'E', 'LT0515', 'email@mail.com', 1, 'M', 6, 'GENERAL', 'MGR', 9),
(17, 'MD5PASSWORD', 'Oscar Swan', 15, 108, 651, 'E', 'L03861', 'email@mail.com', 1, 'F', 6, 'CELL4', 'EXE', 5),
(18, 'MD5PASSWORD', 'Aman Cameron', 16, 100, 5098, 'E', 'L00047', 'email@mail.com', 1, 'M', 6, 'GENERAL', 'EXE', 6),
(19, 'MD5PASSWORD', 'Danica Bray', 100, 109, 2, 'E', 'LT0066', 'email@mail.com', 1, 'F', 6, 'GENERAL', 'MGR', 10),
(20, 'MD5PASSWORD', 'Emillie Bernard', 15, 26, 10231, 'E', 'LT1858', 'email@mail.com', 1, 'M', 6, 'CELL2', 'EXE', 5),
(21, 'MD5PASSWORD', 'Anya Christensen', 16, 108, 89, 'E', 'L00497', 'email@mail.com', 1, 'M', 6, 'CELL', 'EXE', 6),
(22, 'MD5PASSWORD', 'Roger Ramos', 16, 22, 591, 'E', 'L01714', 'email@mail.com', 2, 'F', 7, 'INGOTWAFER', 'EXE', 6),
(23, 'MD5PASSWORD', 'Isla-Grace Reader', 15, 177, 387, 'E', 'L00691', 'email@mail.com', 1, 'M', 2, 'CELL', 'EXE', 5),
(24, 'MD5PASSWORD', 'Sara Humphries', 31, 113, 7549, 'E', 'L00527', 'email@mail.com', 1, 'F', 6, 'GENERAL', 'EXE', 7),
(25, 'MD5PASSWORD', 'Jagoda Rios', 15, 174, 10655, 'E', 'L03628', 'email@mail.com', 1, 'F', 6, 'CELL4', 'EXE', 5),
(26, 'MD5PASSWORD', 'Keely Flores', 16, 108, 53, 'E', 'LT1040', 'email@mail.com', 2, 'M', 6, 'CELL3', 'EXE', 6),
(27, 'MD5PASSWORD', 'Jemma Decker', 15, 108, 89, 'E', 'L03463', 'email@mail.com', 1, 'F', 6, 'CELL', 'EXE', 5),
(28, 'MD5PASSWORD', 'Buddy Flynn', 15, 144, 7379, 'E', 'LT2250', 'email@mail.com', 1, 'M', 6, 'CELL3', 'EXE', 5),
(29, 'MD5PASSWORD', 'Natan Cisneros', 88, 196, 18, 'E', 'LT0067', 'email@mail.com', 1, 'M', 6, 'CELL2', 'MGR', 13),
(30, 'MD5PASSWORD', 'Maria Delgado', 16, 111, 9, 'E', 'LT2270', 'email@mail.com', 1, 'M', 6, 'GENERAL', 'EXE', 6),
(31, 'MD5PASSWORD', 'Jaylan Feeney', 15, 173, 10658, 'E', 'L03885', 'email@mail.com', 1, 'M', 6, 'CELL4', 'EXE', 5),
(32, 'MD5PASSWORD', 'Kaycee Ratcliffe', 15, 178, 381, 'E', 'L03400', 'email@mail.com', 1, 'M', 6, 'CELL', 'EXE', 5),
(33, 'MD5PASSWORD', 'Hashim Archer', 15, 159, 5482, 'E', 'LT0484', 'email@mail.com', 1, 'M', 3, 'CELL2', 'EXE', 5),
(34, 'MD5PASSWORD', 'Avi Conrad', 118, 26, 15, 'E', 'LT1794', 'email@mail.com', 2, 'F', 7, 'CELL3', 'MGR', 9),
(35, 'MD5PASSWORD', 'Maverick Dalton', 15, 154, 10229, 'E', 'LT0613', 'email@mail.com', 1, 'F', 6, 'CELL3', 'EXE', 5),
(36, 'MD5PASSWORD', 'Edward Cooke', 15, 108, 17, 'E', 'L03494', 'email@mail.com', 1, 'F', 6, 'GENERAL', 'EXE', 5),
(37, 'MD5PASSWORD', 'Aizah Berg', 15, 159, 5330, 'E', 'LT0043', 'email@mail.com', 1, 'F', 5, 'CELL2', 'EXE', 5),
(38, 'MD5PASSWORD', 'Harlen Hart', 15, 108, 651, 'E', 'L03567', 'email@mail.com', 1, 'M', 6, 'CELL4', 'EXE', 5),
(39, 'MD5PASSWORD', 'Cydney Carty', 92, 113, 7549, 'E', 'L00120', 'email@mail.com', 1, 'F', 6, 'GENERAL', 'EXE', 8),
(40, 'MD5PASSWORD', 'Rudy Goff', 88, 26, 18, 'E', 'L00014', 'email@mail.com', 1, 'F', 6, 'CELL', 'MGR', 12),
(41, 'MD5PASSWORD', 'Abigale Dudley', 16, 159, 5131, 'E', 'LT0252', 'email@mail.com', 2, 'M', 5, 'CELL2', 'EXE', 6),
(42, 'MD5PASSWORD', 'Dominic Hernandez', 15, 177, 848, 'E', 'L03448', 'email@mail.com', 1, 'M', 3, 'CELL', 'EXE', 5),
(43, 'MD5PASSWORD', 'Mikolaj Sierra', 15, 177, 387, 'E', 'L01141', 'email@mail.com', 1, 'M', 3, 'CELL', 'EXE', 5),
(44, 'MD5PASSWORD', 'Kaylum Stacey', 37, 109, 916, 'E', 'LT2261', 'email@mail.com', 1, 'M', 6, 'GENERAL', 'EXE', 6),
(45, 'MD5PASSWORD', 'Stacey Chamberlain', 15, 178, 3472, 'E', 'L03230', 'email@mail.com', 1, 'M', 6, 'CELL', 'EXE', 5),
(46, 'MD5PASSWORD', 'Charli Boyce', 15, 173, 10638, 'E', 'L03544', 'email@mail.com', 1, 'M', 1, 'CELL4', 'EXE', 5),
(47, 'MD5PASSWORD', 'Kimberly Klein', 100, 178, 8191, 'E', 'L02526', 'email@mail.com', 1, 'M', 6, 'CELL', 'MGR', 10),
(48, 'MD5PASSWORD', 'Elsa Devine', 16, 174, 10655, 'E', 'L03572', 'email@mail.com', 1, 'M', 6, 'CELL4', 'EXE', 6),
(49, 'MD5PASSWORD', 'Aj Millington', 15, 113, 7549, 'E', 'L01143', 'email@mail.com', 1, 'F', 6, 'GENERAL', 'EXE', 5),
(50, 'MD5PASSWORD', 'Elyse Golden', 15, 159, 4885, 'E', 'LT2469', 'email@mail.com', 1, 'M', 6, 'CELL2', 'EXE', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_memc_department`
--
ALTER TABLE `t_memc_department`
  ADD PRIMARY KEY (`dpt_id`);

--
-- Indexes for table `t_memc_kpcc_access_right`
--
ALTER TABLE `t_memc_kpcc_access_right`
  ADD PRIMARY KEY (`AR_ID`);

--
-- Indexes for table `t_memc_kpcc_Access_Right`
--
ALTER TABLE `t_memc_kpcc_Access_Right`
  ADD PRIMARY KEY (`AR_ID`);

--
-- Indexes for table `t_memc_kpcc_ActionPlan`
--
ALTER TABLE `t_memc_kpcc_ActionPlan`
  ADD PRIMARY KEY (`AP_ID`);

--
-- Indexes for table `t_memc_kpcc_actionplan`
--
ALTER TABLE `t_memc_kpcc_actionplan`
  ADD PRIMARY KEY (`AP_ID`);

--
-- Indexes for table `t_memc_kpcc_category`
--
ALTER TABLE `t_memc_kpcc_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `t_memc_kpcc_competenciesdimension`
--
ALTER TABLE `t_memc_kpcc_competenciesdimension`
  ADD PRIMARY KEY (`Cd_ID`);

--
-- Indexes for table `t_memc_kpcc_CompetenciesDimension`
--
ALTER TABLE `t_memc_kpcc_CompetenciesDimension`
  ADD PRIMARY KEY (`Cd_ID`);

--
-- Indexes for table `t_memc_kpcc_corecompetencies`
--
ALTER TABLE `t_memc_kpcc_corecompetencies`
  ADD PRIMARY KEY (`Cc_ID`);

--
-- Indexes for table `t_memc_kpcc_CoreCompetencies`
--
ALTER TABLE `t_memc_kpcc_CoreCompetencies`
  ADD PRIMARY KEY (`Cc_ID`);

--
-- Indexes for table `t_memc_kpcc_department`
--
ALTER TABLE `t_memc_kpcc_department`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `t_memc_kpcc_Department`
--
ALTER TABLE `t_memc_kpcc_Department`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `t_memc_kpcc_employee_category`
--
ALTER TABLE `t_memc_kpcc_employee_category`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `t_memc_kpcc_employee_detail`
--
ALTER TABLE `t_memc_kpcc_employee_detail`
  ADD PRIMARY KEY (`EmpDetail_ID`);

--
-- Indexes for table `t_memc_kpcc_Employee_detail`
--
ALTER TABLE `t_memc_kpcc_Employee_detail`
  ADD PRIMARY KEY (`EmpDetail_ID`);

--
-- Indexes for table `t_memc_kpcc_employee_item`
--
ALTER TABLE `t_memc_kpcc_employee_item`
  ADD PRIMARY KEY (`Ei_ID`);

--
-- Indexes for table `t_memc_kpcc_Employee_item`
--
ALTER TABLE `t_memc_kpcc_Employee_item`
  ADD PRIMARY KEY (`Ei_ID`);

--
-- Indexes for table `t_memc_kpcc_employee_profile`
--
ALTER TABLE `t_memc_kpcc_employee_profile`
  ADD PRIMARY KEY (`ep_id`);

--
-- Indexes for table `t_memc_kpcc_Items`
--
ALTER TABLE `t_memc_kpcc_Items`
  ADD PRIMARY KEY (`Im_ID`);

--
-- Indexes for table `t_memc_kpcc_items`
--
ALTER TABLE `t_memc_kpcc_items`
  ADD PRIMARY KEY (`Im_ID`);

--
-- Indexes for table `t_memc_kpcc_Items_lvl_desc`
--
ALTER TABLE `t_memc_kpcc_Items_lvl_desc`
  ADD PRIMARY KEY (`Im_lvl_ID`);

--
-- Indexes for table `t_memc_kpcc_items_lvl_desc`
--
ALTER TABLE `t_memc_kpcc_items_lvl_desc`
  ADD PRIMARY KEY (`Im_lvl_ID`);

--
-- Indexes for table `t_memc_kpcc_PlanType`
--
ALTER TABLE `t_memc_kpcc_PlanType`
  ADD PRIMARY KEY (`Pt_ID`);

--
-- Indexes for table `t_memc_kpcc_plantype`
--
ALTER TABLE `t_memc_kpcc_plantype`
  ADD PRIMARY KEY (`Pt_ID`);

--
-- Indexes for table `t_memc_kpcc_quarter`
--
ALTER TABLE `t_memc_kpcc_quarter`
  ADD PRIMARY KEY (`Q_ID`);

--
-- Indexes for table `t_memc_kpcc_quarter_report`
--
ALTER TABLE `t_memc_kpcc_quarter_report`
  ADD PRIMARY KEY (`QR_ID`);

--
-- Indexes for table `t_memc_kpcc_Report_To`
--
ALTER TABLE `t_memc_kpcc_Report_To`
  ADD PRIMARY KEY (`RT_ID`);

--
-- Indexes for table `t_memc_kpcc_report_to`
--
ALTER TABLE `t_memc_kpcc_report_to`
  ADD PRIMARY KEY (`RT_ID`);

--
-- Indexes for table `t_memc_position`
--
ALTER TABLE `t_memc_position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `t_memc_staff`
--
ALTER TABLE `t_memc_staff`
  ADD PRIMARY KEY (`stf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_memc_kpcc_access_right`
--
ALTER TABLE `t_memc_kpcc_access_right`
  MODIFY `AR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_Access_Right`
--
ALTER TABLE `t_memc_kpcc_Access_Right`
  MODIFY `AR_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_ActionPlan`
--
ALTER TABLE `t_memc_kpcc_ActionPlan`
  MODIFY `AP_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_actionplan`
--
ALTER TABLE `t_memc_kpcc_actionplan`
  MODIFY `AP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_category`
--
ALTER TABLE `t_memc_kpcc_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_competenciesdimension`
--
ALTER TABLE `t_memc_kpcc_competenciesdimension`
  MODIFY `Cd_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_CompetenciesDimension`
--
ALTER TABLE `t_memc_kpcc_CompetenciesDimension`
  MODIFY `Cd_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_corecompetencies`
--
ALTER TABLE `t_memc_kpcc_corecompetencies`
  MODIFY `Cc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_CoreCompetencies`
--
ALTER TABLE `t_memc_kpcc_CoreCompetencies`
  MODIFY `Cc_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_department`
--
ALTER TABLE `t_memc_kpcc_department`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_Department`
--
ALTER TABLE `t_memc_kpcc_Department`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_employee_category`
--
ALTER TABLE `t_memc_kpcc_employee_category`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_employee_detail`
--
ALTER TABLE `t_memc_kpcc_employee_detail`
  MODIFY `EmpDetail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_Employee_detail`
--
ALTER TABLE `t_memc_kpcc_Employee_detail`
  MODIFY `EmpDetail_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_employee_item`
--
ALTER TABLE `t_memc_kpcc_employee_item`
  MODIFY `Ei_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_Employee_item`
--
ALTER TABLE `t_memc_kpcc_Employee_item`
  MODIFY `Ei_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_employee_profile`
--
ALTER TABLE `t_memc_kpcc_employee_profile`
  MODIFY `ep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_Items`
--
ALTER TABLE `t_memc_kpcc_Items`
  MODIFY `Im_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_items`
--
ALTER TABLE `t_memc_kpcc_items`
  MODIFY `Im_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_Items_lvl_desc`
--
ALTER TABLE `t_memc_kpcc_Items_lvl_desc`
  MODIFY `Im_lvl_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_items_lvl_desc`
--
ALTER TABLE `t_memc_kpcc_items_lvl_desc`
  MODIFY `Im_lvl_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_PlanType`
--
ALTER TABLE `t_memc_kpcc_PlanType`
  MODIFY `Pt_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_plantype`
--
ALTER TABLE `t_memc_kpcc_plantype`
  MODIFY `Pt_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_quarter`
--
ALTER TABLE `t_memc_kpcc_quarter`
  MODIFY `Q_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_quarter_report`
--
ALTER TABLE `t_memc_kpcc_quarter_report`
  MODIFY `QR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_Report_To`
--
ALTER TABLE `t_memc_kpcc_Report_To`
  MODIFY `RT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_memc_kpcc_report_to`
--
ALTER TABLE `t_memc_kpcc_report_to`
  MODIFY `RT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_memc_staff`
--
ALTER TABLE `t_memc_staff`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
