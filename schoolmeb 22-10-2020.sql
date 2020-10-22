-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 05:50 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_account_entry`
--

CREATE TABLE `ac_account_entry` (
  `account_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` varchar(255) NOT NULL,
  `date_of_entry` date NOT NULL,
  `debit_account_title` varchar(255) NOT NULL,
  `credit_account_title` varchar(255) NOT NULL,
  `debit_amount` float NOT NULL,
  `credit_amount` float NOT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_account_entry`
--

INSERT INTO `ac_account_entry` (`account_id`, `user_id`, `user_date`, `date_of_entry`, `debit_account_title`, `credit_account_title`, `debit_amount`, `credit_amount`, `comments`) VALUES
(1, '2', '2020-10-10 15:39:53', '2020-10-10', '9000', '9000', 123123, 99090, '090'),
(2, '2', '2020-10-13 11:24:29', '2020-10-13', '9000', '12312', 12312300, 31231, '123123'),
(3, '2', '2020-10-19 12:07:59', '2020-10-19', '20120786', '1234567677', 200, 180, '232'),
(4, '2', '2020-10-21 15:39:26', '2020-10-21', '20120786', '12938', 100, 100, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `ac_annual_appraisal`
--

CREATE TABLE `ac_annual_appraisal` (
  `increment_form_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gr_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `old_salary` int(11) NOT NULL,
  `salary_increment` int(20) NOT NULL,
  `new_salary` int(20) NOT NULL,
  `aproved_by` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_annual_appraisal`
--

INSERT INTO `ac_annual_appraisal` (`increment_form_id`, `user_id`, `user_date`, `gr_number`, `name`, `old_salary`, `salary_increment`, `new_salary`, `aproved_by`, `date`, `comment`, `type`) VALUES
(73, 2, '2020-08-24 05:25:52', '4', 'Kashif', 500000, 20000, 70000, 'irfan', '2020-08-26', 'for hard working', '0'),
(74, 2, '2020-08-24 07:13:08', '5', 'Waleed', 15000, 15000, 30000, 'irfan', '2020-08-14', 'ffgggf', 'Staff'),
(75, 2, '2020-08-24 07:15:21', '3', 'Sir', 9000, 8000, 17000, 'irfan', '2020-07-31', 'YTT', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `ac_asset_liab`
--

CREATE TABLE `ac_asset_liab` (
  `ac_asset_liab_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_of_ac_asset_liab` date NOT NULL,
  `account_id` int(11) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ac_asset_liab_by_scction` varchar(255) NOT NULL,
  `ac_asset_liab_amount` float NOT NULL,
  `check_by` varchar(255) NOT NULL,
  `paid_using` varchar(255) DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `comments` varchar(100) DEFAULT NULL,
  `check_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_asset_liab`
--

INSERT INTO `ac_asset_liab` (`ac_asset_liab_id`, `user_id`, `user_date`, `date_of_ac_asset_liab`, `account_id`, `account_title`, `type`, `ac_asset_liab_by_scction`, `ac_asset_liab_amount`, `check_by`, `paid_using`, `paid_amount`, `comments`, `check_date`) VALUES
(1, '2', '2020-08-18 14:27:46', '2020-08-18', 5024, 'WALEED', '', 'A', 2000, 'Irfan', '', 0, '', '2020-08-18'),
(2, '2', '2020-08-21 12:24:10', '2020-08-21', 2147483647, 'SARFARAZ2', '', '2112', 42342, '23423', '444', 44, '44', '2020-08-17'),
(3, '2', '2020-08-21 12:25:57', '2020-08-21', 2147483647, 'SARFARAZ2', '', '1', 2, '12', '21', 21, '21', '2020-08-21'),
(4, '2', '2020-08-21 12:30:46', '2020-08-21', 2147483647, 'SARFARAZ2', 'Liability', 'A', 10, '212', '123', 1231, '13231', '2020-08-21'),
(5, '2', '2020-08-22 04:19:21', '2020-08-22', 2147483647, 'SARFARAZ2', 'Liability', 'A', 444, 'rwer', 'rwer', 34534, '345', '2020-08-22'),
(6, '2', '2020-08-22 06:21:39', '2020-08-22', 76857, 'WALEED', 'Assets', 'Boys', 1000, 'Irfan', '', 0, '', '2020-08-22'),
(7, '2', '2020-08-22 06:22:02', '2020-08-22', 12345678, 'ARHAM', 'Assets', 'Boys', 550, 'rwer', '', 0, '', '2020-08-22'),
(8, '2', '2020-08-22 06:22:35', '2020-08-22', 12345678, 'ARHAM', 'Assets', 'Boys', 70, 'r', '', 0, '', '2020-08-22'),
(9, '2', '2020-08-24 04:41:53', '2020-08-24', 76857, 'WALEED', 'Assets', 'Montessori', 1000, 'irfan', 'any 2', 1000, '345', '2020-09-02'),
(10, '2', '2020-08-27 07:27:40', '2020-08-27', 12938333, 'SHAH', 'Equity', 'Boys', 2390, 'Irfan', '', 0, '', '2020-08-27'),
(11, '2', '2020-08-27 07:30:01', '2020-08-27', 2147483647, 'DANISH', 'Equity', 'Boys', 2870, 'Irfan', '', 0, '', '2020-08-27'),
(12, '2', '2020-08-27 07:30:49', '2020-08-27', 2147483647, 'SARFARAZ2', 'Liability', 'Boys', 6740, 'Irfan', '', 0, '', '2020-08-27'),
(13, '2', '2020-08-27 07:31:27', '2020-08-27', 1234567677, 'SARFARAZ', 'Liability', 'Boys', 568, 'Irfan', '', 0, '', '2020-08-27'),
(14, '2', '2020-08-27 09:14:34', '2020-08-27', 2147483647, 'SARFARAZ2', 'Liability', 'Boys', 1250, 'Irfan', '', 0, '', '2020-08-27'),
(15, '2', '2020-08-27 09:15:20', '2020-08-27', 2147483647, 'WALEED', 'Assets', 'Boys', 30, 'Irfan', '', 0, '', '2020-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `ac_bro_sis_discount`
--

CREATE TABLE `ac_bro_sis_discount` (
  `bro_sis_discount_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gr_num_1` varchar(255) NOT NULL,
  `gr_num_2` varchar(255) NOT NULL,
  `discounted_fee_2` int(11) NOT NULL,
  `gr_num_3` varchar(255) NOT NULL,
  `discounted_fee_3` int(11) NOT NULL,
  `gr_num_4` varchar(255) NOT NULL,
  `discounted_fee_4` int(11) NOT NULL,
  `gr_num_5` varchar(255) NOT NULL,
  `discounted_fee_5` int(11) NOT NULL,
  `school_1` varchar(255) NOT NULL,
  `school_2` varchar(255) NOT NULL,
  `school_3` varchar(255) NOT NULL,
  `school_4` varchar(255) NOT NULL,
  `school_5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_bro_sis_discount`
--

INSERT INTO `ac_bro_sis_discount` (`bro_sis_discount_id`, `user_id`, `user_date`, `gr_num_1`, `gr_num_2`, `discounted_fee_2`, `gr_num_3`, `discounted_fee_3`, `gr_num_4`, `discounted_fee_4`, `gr_num_5`, `discounted_fee_5`, `school_1`, `school_2`, `school_3`, `school_4`, `school_5`) VALUES
(1, 1, '2020-07-22 06:32:12', '11', '1', 1, '1', 1, '1', 1, '1', 11, '1', '1', '1', '1', '1'),
(2, 2, '2020-07-22 06:34:30', '', '', 0, '', 0, '', 0, '', 0, '', '', '', '', ''),
(3, 2, '2020-07-22 06:38:43', '1', '2', 12, '3', 13, '4', 14, '5', 15, '11', '2', '3', '4', '5'),
(4, 2, '2020-07-22 06:39:42', '1', '2', 12, '3', 13, '4', 14, '5', 15, '11', '2', '3', '4', '5'),
(5, 2, '2020-07-22 07:03:18', '1', '2', 12, '3', 13, '4', 14, '5', 15, '11', '2', '3', '4', '5'),
(6, 2, '2020-07-22 07:04:11', '1', '2', 12, '3', 13, '4', 14, '5', 15, '11', '2', '3', '4', '5');

-- --------------------------------------------------------

--
-- Table structure for table `ac_budgeting`
--

CREATE TABLE `ac_budgeting` (
  `estimated_budget_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date` date NOT NULL,
  `salary` int(20) DEFAULT NULL,
  `ke_bill_school` int(20) DEFAULT NULL,
  `ke_bill_lawn` int(20) DEFAULT NULL,
  `phone_bill` int(20) DEFAULT NULL,
  `water_tax` int(20) DEFAULT NULL,
  `eobi` int(20) DEFAULT NULL,
  `social_security` int(20) DEFAULT NULL,
  `gratuity` int(20) DEFAULT NULL,
  `leave_encasement` int(20) DEFAULT NULL,
  `property_tax` int(20) DEFAULT NULL,
  `petty_cash` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_budgeting`
--

INSERT INTO `ac_budgeting` (`estimated_budget_id`, `user_id`, `user_date`, `date`, `salary`, `ke_bill_school`, `ke_bill_lawn`, `phone_bill`, `water_tax`, `eobi`, `social_security`, `gratuity`, `leave_encasement`, `property_tax`, `petty_cash`) VALUES
(1111, 11, '2020-07-07 19:00:00', '2020-07-06', 1111, 1111, 1111, 1111, 1111, 1111, 1111, 1111, 1111, 1111, 1111),
(1116, 1, '2020-07-21 05:44:13', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1117, 2, '2020-07-21 05:47:48', '2020-07-21', 32132, 213213, 332434, 444, 444, 444, 444, 444, 444, 444, 444);

-- --------------------------------------------------------

--
-- Table structure for table `ac_employee_loan`
--

CREATE TABLE `ac_employee_loan` (
  `employee_loan_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `loan_amount` float NOT NULL,
  `loan_start` date NOT NULL,
  `laon_installment` float NOT NULL,
  `type` varchar(255) NOT NULL,
  `laon_installment_amount` float NOT NULL,
  `outstanding` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_employee_loan`
--

INSERT INTO `ac_employee_loan` (`employee_loan_id`, `user_id`, `user_date`, `employee_id`, `employee_name`, `loan_amount`, `loan_start`, `laon_installment`, `type`, `laon_installment_amount`, `outstanding`) VALUES
(21, '2', '2020-10-14 09:21:59', 6, 'Talal', 5000, '2020-04-01', 5, 'Staff', 1000, 0),
(22, '2', '2020-10-14 09:01:27', 6, 'Talal', 2000, '2020-06-01', 3, 'Staff', 666.667, 0),
(24, '2', '2020-10-05 04:13:33', 34, 'Sir Tayyab', 1000, '2020-10-01', 2, 'Teacher', 500, 0),
(25, '2', '2020-10-05 05:40:42', 6, 'Talal', 800, '2020-10-01', 1, 'Staff', 800, 0),
(27, '2', '2020-10-15 07:10:46', 6, 'Talal', 2300, '2020-10-01', 3, 'staff', 766.667, 0),
(28, '2', '2020-10-16 13:01:31', 36, 'Sir Waseem', 1000, '2020-10-01', 2, 'teacher', 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ac_fees_concession`
--

CREATE TABLE `ac_fees_concession` (
  `fees_concession_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` int(11) NOT NULL,
  `community` varchar(255) DEFAULT NULL,
  `phone` int(20) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `monthly_income` int(11) NOT NULL,
  `eligible` varchar(255) NOT NULL,
  `address_guardian` varchar(1000) NOT NULL,
  `previously_granted_freeship` varchar(255) NOT NULL,
  `number_of_dependents` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ac_fee_calculated`
--

CREATE TABLE `ac_fee_calculated` (
  `fee_calculated_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `annual_fee` int(11) NOT NULL,
  `amount` float NOT NULL,
  `zakat_adjustment` float DEFAULT NULL,
  `from_account` varchar(255) NOT NULL,
  `std_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ac_fee_card`
--

CREATE TABLE `ac_fee_card` (
  `fee_card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `from_year` int(11) NOT NULL,
  `till_year` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `cell` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_fee_card`
--

INSERT INTO `ac_fee_card` (`fee_card_id`, `user_id`, `user_date`, `from_year`, `till_year`, `name`, `father_name`, `class`, `section`, `address`, `phone`, `cell`) VALUES
(5, 2, '2020-07-24 04:00:24', 2020, 2021, 'Waleed Asad', 'AsadUllah', '8th', 'C', 'al Aziziya ,jeddah , karachi', '03111043612', '0988');

-- --------------------------------------------------------

--
-- Table structure for table `ac_fee_collection`
--

CREATE TABLE `ac_fee_collection` (
  `fee_collection_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `which_month` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `studend_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `month_fee` int(11) DEFAULT NULL,
  `month_con` int(11) DEFAULT NULL,
  `admission_fee` int(11) DEFAULT NULL,
  `admission_con` int(11) DEFAULT NULL,
  `exam_fee` int(11) DEFAULT NULL,
  `exam_con` int(11) DEFAULT NULL,
  `misc_fee` int(11) DEFAULT NULL,
  `misc_con` int(11) DEFAULT NULL,
  `other_fee` int(11) DEFAULT NULL,
  `other_con` int(11) DEFAULT NULL,
  `annual_fee` int(11) DEFAULT NULL,
  `annual_con` int(11) DEFAULT NULL,
  `monfee` int(11) DEFAULT NULL,
  `admfee` int(11) DEFAULT NULL,
  `examfee` int(11) DEFAULT NULL,
  `miscfee` int(11) DEFAULT NULL,
  `specialfee` int(11) DEFAULT NULL,
  `annualfee` int(11) DEFAULT NULL,
  `feesibdisc` int(11) DEFAULT NULL,
  `feeza` int(11) DEFAULT NULL,
  `fee` int(11) NOT NULL,
  `concsession_id` int(11) NOT NULL DEFAULT 0,
  `generate_id` int(11) NOT NULL DEFAULT 0,
  `balance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_fee_collection`
--

INSERT INTO `ac_fee_collection` (`fee_collection_id`, `user_id`, `user_date`, `which_month`, `year`, `class_id`, `class_name`, `section`, `studend_id`, `student_name`, `month_fee`, `month_con`, `admission_fee`, `admission_con`, `exam_fee`, `exam_con`, `misc_fee`, `misc_con`, `other_fee`, `other_con`, `annual_fee`, `annual_con`, `monfee`, `admfee`, `examfee`, `miscfee`, `specialfee`, `annualfee`, `feesibdisc`, `feeza`, `fee`, `concsession_id`, `generate_id`, `balance`) VALUES
(48, '2', '2020-09-06 20:37:37', 'September', 2020, 19, '2', 'Girls', 92, 'Danish Khan', 500, 0, 0, 0, 0, 0, 800, 0, 900, 0, 1000, 0, 500, 0, 0, 800, 900, 1000, 0, 0, 3200, 0, 8, 0),
(49, '2', '2020-09-06 20:37:37', 'September', 2020, 19, '2', 'Girls', 55, 'Waleed Asad', 500, 100, 0, 0, 0, 0, 800, 70, 900, 60, 1000, 50, 400, 0, 0, 730, 840, 950, 40, 30, 2850, 2, 8, 0),
(50, '2', '2020-09-06 20:37:37', 'September', 2020, 19, '2', 'Girls', 61, 'Waleed Asad', 500, 0, 0, 0, 0, 0, 800, 0, 900, 0, 1000, 0, 500, 0, 0, 800, 900, 1000, 0, 0, 3200, 0, 8, 0),
(51, '2', '2020-09-06 20:40:12', 'November', 2020, 19, '2', 'Girls', 92, 'Danish Khan', 500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 0, 0, 0, 0, 0, 0, 0, 500, 0, 11, 4400),
(52, '2', '2020-09-06 20:40:12', 'November', 2020, 19, '2', 'Girls', 55, 'Waleed Asad', 500, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 400, 0, 0, 0, 0, 0, 40, 30, 330, 2, 11, 1850),
(53, '2', '2020-09-06 20:40:12', 'November', 2020, 19, '2', 'Girls', 61, 'Waleed Asad', 500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 0, 0, 0, 0, 0, 0, 0, 500, 0, 11, 0),
(66, '2', '2020-09-06 21:38:57', 'December', 2020, 19, '2', 'Girls', 92, 'Danish Khan', 500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 0, 0, 0, 0, 0, 0, 0, 500, 0, 12, 1700),
(67, '2', '2020-09-06 21:38:57', 'December', 2020, 19, '2', 'Girls', 55, 'Waleed Asad', 500, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 400, 0, 0, 0, 0, 0, 40, 30, 330, 2, 12, 2180),
(68, '2', '2020-09-06 21:38:57', 'December', 2020, 19, '2', 'Girls', 61, 'Waleed Asad', 500, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 0, 0, 0, 0, 0, 0, 0, 500, 0, 12, 500),
(69, '2', '2020-09-08 06:47:15', 'September', 2020, 25, '4', 'Boys', 80, 'Zain Yousuf', 850, 200, 550, 100, 1000, 500, 0, 0, 50, 0, 1000, 500, 650, 450, 500, 0, 50, 500, 100, 200, 1850, 4, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ac_fee_collection_done`
--

CREATE TABLE `ac_fee_collection_done` (
  `fee_collection_done_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `fee_total` float NOT NULL,
  `amount_pay` float NOT NULL,
  `balance` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `voucher_no` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_fee_collection_done`
--

INSERT INTO `ac_fee_collection_done` (`fee_collection_done_id`, `user_id`, `user_date`, `student_id`, `student_name`, `class_id`, `class_name`, `section`, `fee_total`, `amount_pay`, `balance`, `date`, `voucher_no`, `month`, `year`) VALUES
(7, '2', '2020-09-07 11:38:35', 92, 'Danish Khan', 19, '2', 'Girls', 3200, 1500, 1700, '2020-09-07', 48, 'September', 2020),
(8, '2', '2020-09-07 11:38:47', 55, 'Waleed Asad', 19, '2', 'Girls', 2850, 1000, 1850, '2020-09-07', 49, 'September', 2020),
(9, '2', '2020-09-07 11:38:59', 61, 'Waleed Asad', 19, '2', 'Girls', 3200, 3200, 0, '2020-09-07', 50, 'September', 2020),
(10, '2', '2020-09-07 11:39:42', 92, 'Danish Khan', 19, '2', 'Girls', 3200, 500, 2700, '2020-09-07', 48, 'September', 2020),
(11, '2', '2020-09-07 12:49:01', 61, 'Waleed Asad', 19, '2', 'Girls', 500, 100, 400, '2020-09-07', 68, 'December', 2020),
(12, '2', '2020-09-07 12:49:12', 61, 'Waleed Asad', 19, '2', 'Girls', 500, 100, 400, '2020-09-07', 68, 'December', 2020),
(13, '2', '2020-09-07 12:50:16', 61, 'Waleed Asad', 19, '2', 'Girls', 500, 50, 450, '2020-09-07', 68, 'December', 2020),
(14, '2', '2020-09-07 12:52:50', 61, 'Waleed Asad', 19, '2', 'Girls', 500, 50, 450, '2020-09-07', 68, 'December', 2020),
(15, '2', '2020-09-07 12:53:14', 61, 'Waleed Asad', 19, '2', 'Girls', 500, 600, -100, '2020-09-07', 68, 'December', 2020),
(16, '2', '2020-09-07 12:53:22', 61, 'Waleed Asad', 19, '2', 'Girls', 500, 100, 400, '2020-09-07', 68, 'December', 2020),
(17, '2', '2020-09-07 12:53:35', 61, 'Waleed Asad', 19, '2', 'Girls', 500, 1000, -500, '2020-09-07', 68, 'December', 2020),
(18, '2', '2020-09-08 08:52:18', 92, 'Danish Khan', 19, '2', 'Girls', 500, 1000, -500, '2020-09-08', 66, 'December', 2020),
(19, '2', '2020-09-08 08:56:52', 92, 'Danish Khan', 19, '2', 'Girls', 500, 400, 100, '2020-09-08', 66, 'December', 2020),
(20, '2', '2020-09-08 09:48:49', 80, 'Zain Yousuf', 25, '4', 'Boys', 1850, 1500, 350, '2020-09-08', 69, 'September', 2020),
(21, '2', '2020-09-12 09:27:51', 92, 'Danish Khan', 19, '2', 'Girls', 500, 500, 0, '2020-09-12', 66, 'December', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `ac_fee_module`
--

CREATE TABLE `ac_fee_module` (
  `fee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` varchar(255) NOT NULL,
  `s_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `fee_month_name` varchar(255) NOT NULL,
  `gr_num` varchar(255) NOT NULL,
  `fees_month` int(20) NOT NULL,
  `admission_fee` int(20) DEFAULT NULL,
  `exam` int(20) DEFAULT NULL,
  `fine` int(20) DEFAULT NULL,
  `mics` int(20) DEFAULT NULL,
  `total` int(20) NOT NULL,
  `date` date NOT NULL,
  `cashier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_fee_module`
--

INSERT INTO `ac_fee_module` (`fee_id`, `user_id`, `user_date`, `category`, `s_no`, `name`, `class`, `fee_month_name`, `gr_num`, `fees_month`, `admission_fee`, `exam`, `fine`, `mics`, `total`, `date`, `cashier`) VALUES
(14, 2, '2020-07-28 07:39:38', 'boy', 60, 'fff', '8th', '', '087', 90, 0, 0, 0, 0, 90, '2020-07-28', 'kashif');

-- --------------------------------------------------------

--
-- Table structure for table `ac_generate_fee_class`
--

CREATE TABLE `ac_generate_fee_class` (
  `generate_fee_class_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `which_month` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `admission` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL,
  `mics` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `annual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_generate_fee_class`
--

INSERT INTO `ac_generate_fee_class` (`generate_fee_class_id`, `user_id`, `user_date`, `class_id`, `date`, `which_month`, `year`, `month`, `admission`, `exam`, `mics`, `other`, `annual`) VALUES
(5, '2', '2020-09-02 10:42:37', 21, '2020-09-04', 'September', 2020, 'yes', 'no', 'no', 'no', 'no', 'no'),
(6, '2', '2020-09-02 10:32:19', 19, '2020-07-09', 'July', 2020, 'yes', 'yes', 'no', 'no', 'no', 'no'),
(7, '2', '2020-09-02 10:05:54', 24, '2020-10-02', 'October', 2020, 'yes', 'no', 'yes', 'no', 'no', 'no'),
(8, '2', '2020-09-02 10:06:31', 19, '2020-09-01', 'September', 2020, 'yes', 'no', 'no', 'yes', 'yes', 'yes'),
(9, '2', '2020-09-04 06:01:37', 22, '2020-10-01', 'October', 2020, 'yes', 'yes', 'no', 'no', 'no', 'yes'),
(10, '2', '2020-09-04 06:07:15', 22, '2020-09-05', 'September', 2020, 'yes', 'no', 'no', 'no', 'no', 'no'),
(11, '2', '2020-09-07 10:15:16', 19, '2020-11-07', 'November', 2020, 'yes', 'no', 'no', 'no', 'no', 'no'),
(12, '2', '2020-09-07 10:29:22', 19, '2020-12-07', 'December', 2020, 'yes', 'no', 'no', 'no', 'no', 'no'),
(13, '2', '2020-09-07 11:31:01', 19, '2021-01-01', 'January', 2021, 'yes', 'no', 'no', 'no', 'no', 'yes'),
(14, '2', '2020-09-08 09:46:50', 25, '2020-09-10', 'September', 2020, 'yes', 'yes', 'yes', 'no', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `ac_generate_fee_student`
--

CREATE TABLE `ac_generate_fee_student` (
  `generate_fee_student_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `which_month` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `admission` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL,
  `mics` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `annual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_generate_fee_student`
--

INSERT INTO `ac_generate_fee_student` (`generate_fee_student_id`, `user_id`, `user_date`, `student_id`, `student_name`, `class_id`, `class_name`, `date`, `which_month`, `year`, `month`, `admission`, `exam`, `mics`, `other`, `annual`) VALUES
(3, '2', '2020-09-02 11:17:42', 92, 'Danish Khan', '24', '3', '2020-09-10', 'September', 2020, 'yes', 'yes', 'no', 'no', '200', 'no'),
(4, '2', '2020-09-02 09:20:49', 58, 'Waleed Asad', '24', '3', '2020-10-09', 'October', 2020, 'yes', 'no', 'no', 'no', '600', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `ac_hall_booking`
--

CREATE TABLE `ac_hall_booking` (
  `hall_booking` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `date_booking` date NOT NULL,
  `rent` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `date_event` date NOT NULL,
  `guest` varchar(255) NOT NULL,
  `waiter` varchar(255) NOT NULL,
  `female_waiter` varchar(255) NOT NULL,
  `is_adv_given` varchar(255) NOT NULL,
  `noc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_hall_booking`
--

INSERT INTO `ac_hall_booking` (`hall_booking`, `user_id`, `user_date`, `name`, `address`, `phone`, `date_booking`, `rent`, `advance`, `location`, `date_event`, `guest`, `waiter`, `female_waiter`, `is_adv_given`, `noc`) VALUES
(10, 2, '2020-08-18 18:45:20', 'Waleed Asad', 'al Aziziya ,jeddah , karachi', '03111043612', '2020-07-24', 900, 7777, '55', '2020-07-07', '555', 'yes', 'yes', 'yes', NULL),
(11, 2, '2020-08-18 18:46:02', 'arham', 'block 15', '03111', '2020-08-18', 11, 11, '11', '2020-08-28', '20', 'yes', 'yes', 'yes', NULL),
(13, 2, '2020-09-12 09:01:54', 'arham', 'block 15', '03174721487', '2020-09-26', 21345, 121, 'kharadar', '2020-09-19', '55', 'yes', 'yes', 'yes', NULL),
(14, 2, '2020-09-12 12:54:28', 'arham', 'block 15', '03174721487', '2020-09-12', 700, 600, 'kharadar', '2020-09-21', '55', 'yes', 'yes', 'yes', 90);

-- --------------------------------------------------------

--
-- Table structure for table `ac_payroll_calculation`
--

CREATE TABLE `ac_payroll_calculation` (
  `payroll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `which_month` varchar(225) NOT NULL,
  `which_year` int(11) NOT NULL,
  `gr_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `basic_salary` varchar(255) NOT NULL,
  `house_ra` int(20) NOT NULL,
  `utility` int(20) NOT NULL,
  `convey_allow` int(20) NOT NULL,
  `gross_salary` int(20) NOT NULL,
  `loan` int(20) NOT NULL,
  `i_t` int(20) NOT NULL,
  `s_w_f` int(20) NOT NULL,
  `leave_pay` int(20) NOT NULL,
  `net_pay` float NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'staff',
  `paid_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_payroll_calculation`
--

INSERT INTO `ac_payroll_calculation` (`payroll_id`, `user_id`, `user_date`, `which_month`, `which_year`, `gr_number`, `name`, `designation`, `attendance`, `basic_salary`, `house_ra`, `utility`, `convey_allow`, `gross_salary`, `loan`, `i_t`, `s_w_f`, `leave_pay`, `net_pay`, `type`, `paid_status`) VALUES
(262, 2, '2020-10-15 06:54:08', '09', 2020, '1', 'waledd', '14', '0', '17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(263, 2, '2020-10-15 06:54:08', '09', 2020, '2', 'waledd', '', '0', '17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(264, 2, '2020-10-15 06:54:08', '09', 2020, '3', 'wa', 'offoe', '0', '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(265, 2, '2020-10-15 06:54:08', '09', 2020, '4', 'Kashif', 'FOD', '0', '500000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(266, 2, '2020-10-15 06:54:08', '09', 2020, '5', 'Waleed Asad', 'IT boy', '0', '15000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(267, 2, '2020-10-15 06:54:08', '09', 2020, '6', 'Talal', 'cashier', '19', '15000', 500, 1000, 600, 17100, 800, 2631, 658, 0, 13011.5, 'staff', 0),
(268, 2, '2020-10-15 07:11:04', '11', 2020, '1', 'waledd', '14', '0', '17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(269, 2, '2020-10-15 07:11:04', '11', 2020, '2', 'waledd', '', '0', '17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(270, 2, '2020-10-15 07:11:04', '11', 2020, '3', 'wa', 'offoe', '0', '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(271, 2, '2020-10-15 07:11:04', '11', 2020, '4', 'Kashif', 'FOD', '0', '500000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(272, 2, '2020-10-15 07:11:04', '11', 2020, '5', 'Waleed Asad', 'IT boy', '0', '15000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(273, 2, '2020-10-15 07:11:04', '11', 2020, '6', 'Talal', 'cashier', '0', '15000', 500, 1000, 600, 17100, 1567, 0, 0, 0, 15533.3, 'staff', 0),
(274, 2, '2020-10-15 07:11:26', '12', 2020, '1', 'waledd', '14', '0', '17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(275, 2, '2020-10-15 07:11:26', '12', 2020, '2', 'waledd', '', '0', '17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(276, 2, '2020-10-15 07:11:26', '12', 2020, '3', 'wa', 'offoe', '0', '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(277, 2, '2020-10-15 07:11:26', '12', 2020, '4', 'Kashif', 'FOD', '0', '500000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(278, 2, '2020-10-15 07:11:26', '12', 2020, '5', 'Waleed Asad', 'IT boy', '0', '15000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'staff', 0),
(279, 2, '2020-10-15 07:43:50', '12', 2020, '6', 'Talal', 'cashier', '0', '15000', 500, 1000, 600, 17100, 1567, 0, 0, 0, 15533.3, 'staff', 1),
(296, 2, '2020-10-16 14:56:53', '09', 2020, '6', 'Talal', 'cashier', '19', '15000', 500, 1000, 600, 17100, 1567, 2631, 658, 2631, 12244.9, 'staff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ac_profit_loss_expenditure`
--

CREATE TABLE `ac_profit_loss_expenditure` (
  `expenditure_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `salaries_sec_a` int(20) NOT NULL,
  `salaries_pry_a` int(20) NOT NULL,
  `salaries_pry_b` int(20) NOT NULL,
  `salaries_mcc` int(20) NOT NULL,
  `salaries_mis_01` int(20) NOT NULL,
  `salaries_mis_03` int(20) NOT NULL,
  `salaries_mdc` int(20) NOT NULL,
  `medical_sec_a` int(20) NOT NULL,
  `medical_pry_a` int(20) NOT NULL,
  `medical_pry_b` int(20) NOT NULL,
  `medical_mcc` int(20) NOT NULL,
  `medical_mis_01` int(20) NOT NULL,
  `medical_mis_03` int(20) NOT NULL,
  `medical_mdc` int(20) NOT NULL,
  `eobi_sec_a` int(20) NOT NULL,
  `eobi_pry_a` int(20) NOT NULL,
  `eobi_pry_b` int(20) NOT NULL,
  `eobi_mcc` int(20) NOT NULL,
  `eobi_mis01` int(20) NOT NULL,
  `eobi_mis03` int(20) NOT NULL,
  `eobi_mdc` int(20) NOT NULL,
  `social_security_sec_a` int(20) NOT NULL,
  `social_security_pry_a` int(20) NOT NULL,
  `social_security_pry_b` int(20) NOT NULL,
  `social_security_mcc` int(20) NOT NULL,
  `social_security_mis01` int(20) NOT NULL,
  `social_security_mis03` int(20) NOT NULL,
  `social_security_mdc` int(20) NOT NULL,
  `telephone_sec_a` int(20) NOT NULL,
  `telephone_pry_a` int(20) NOT NULL,
  `telephone_pry_b` int(20) NOT NULL,
  `telephone_mcc` int(20) NOT NULL,
  `telephone_mis01` int(20) NOT NULL,
  `telephone_mis03` int(20) NOT NULL,
  `telephone_mdc` int(20) NOT NULL,
  `utility_sec_a` int(20) NOT NULL,
  `utility_pry_a` int(20) NOT NULL,
  `utility_pry_b` int(20) NOT NULL,
  `utility_mcc` int(20) NOT NULL,
  `utility_mis01` int(20) NOT NULL,
  `utility_mis03` int(20) NOT NULL,
  `utility_mdc` int(20) NOT NULL,
  `printing_sec_a` int(20) NOT NULL,
  `printing_pry_a` int(20) NOT NULL,
  `printing_pry_b` int(20) NOT NULL,
  `printing_mcc` int(20) NOT NULL,
  `printing_mis01` int(20) NOT NULL,
  `printing_mis03` int(20) NOT NULL,
  `printing_mdc` int(20) NOT NULL,
  `entertainment_sec_a` int(20) NOT NULL,
  `entertainment_pry_a` int(20) NOT NULL,
  `entertainment_pry_b` int(20) NOT NULL,
  `entertainment_mcc` int(20) NOT NULL,
  `entertainment_mis01` int(20) NOT NULL,
  `entertainment_mis03` int(20) NOT NULL,
  `entertainment_mdc` int(20) NOT NULL,
  `conveyance_sec_a` int(20) NOT NULL,
  `conveyance_pry_a` int(20) NOT NULL,
  `conveyance_pry_b` int(20) NOT NULL,
  `conveyance_mcc` int(20) NOT NULL,
  `conveyance_mis01` int(20) NOT NULL,
  `conveyance_mis03` int(20) NOT NULL,
  `conveyance_mdc` int(20) NOT NULL,
  `advertisement_sec_a` int(20) NOT NULL,
  `advertisement_pry_a` int(20) NOT NULL,
  `advertisement_pry_b` int(20) NOT NULL,
  `advertisement_mcc` int(20) NOT NULL,
  `advertisement_mis01` int(20) NOT NULL,
  `advertisement_mis03` int(20) NOT NULL,
  `advertisement_mdc` int(20) NOT NULL,
  `repair_sec_a` int(20) NOT NULL,
  `repair_pry_a` int(20) NOT NULL,
  `repair_pry_b` int(20) NOT NULL,
  `repair_mcc` int(20) NOT NULL,
  `repair_mis01` int(20) NOT NULL,
  `repair_mis03` int(20) NOT NULL,
  `repair_mdc` int(20) NOT NULL,
  `game_sec_a` int(20) NOT NULL,
  `game_pry_a` int(20) NOT NULL,
  `game_pey_b` int(20) NOT NULL,
  `game_mcc` int(20) NOT NULL,
  `game_mis01` int(20) NOT NULL,
  `game_mis03` int(20) NOT NULL,
  `game_mdc` int(20) NOT NULL,
  `laboratory_sec_a` int(20) NOT NULL,
  `laboratory_pry_a` int(20) NOT NULL,
  `laboratory_pry_b` int(20) NOT NULL,
  `laboratory_mcc` int(20) NOT NULL,
  `laboratory_mis01` int(20) NOT NULL,
  `laboratory_mis03` int(20) NOT NULL,
  `laboratory_mdc` int(20) NOT NULL,
  `paper_sec_a` int(20) NOT NULL,
  `paper_pry_a` int(20) NOT NULL,
  `paper_pry_b` int(20) NOT NULL,
  `paper_mcc` int(20) NOT NULL,
  `paper_mis01` int(20) NOT NULL,
  `paper_mis03` int(20) NOT NULL,
  `paper_mdc` int(20) NOT NULL,
  `water_sec_a` int(20) NOT NULL,
  `water_pry_a` int(20) NOT NULL,
  `water_pry_b` int(20) NOT NULL,
  `water_pry_mcc` int(20) NOT NULL,
  `water_mis01` int(20) NOT NULL,
  `water_mis03` int(20) NOT NULL,
  `water_mdc` int(20) NOT NULL,
  `bank_sec_a` int(20) NOT NULL,
  `bank_pry_a` int(20) NOT NULL,
  `bank_pry_b` int(20) NOT NULL,
  `bank_mcc` int(20) NOT NULL,
  `bank_mis01` int(20) NOT NULL,
  `bank_mis03` int(20) NOT NULL,
  `bank_mdc` int(20) NOT NULL,
  `miscellaneous_sec_a` int(20) NOT NULL,
  `miscellaneous_pry_a` int(20) NOT NULL,
  `miscellaneous_pry_b` int(20) NOT NULL,
  `miscellaneous_mcc` int(20) NOT NULL,
  `miscellaneous_mis01` int(20) NOT NULL,
  `miscellaneous_mis03` int(20) NOT NULL,
  `miscellaneous_mdc` int(20) NOT NULL,
  `electric_sec_a` int(20) NOT NULL,
  `electric_pry_a` int(20) NOT NULL,
  `electric_pry_b` int(20) NOT NULL,
  `electric_mcc` int(20) NOT NULL,
  `electric_mis01` int(20) NOT NULL,
  `electric_mis03` int(20) NOT NULL,
  `electric_mdc` int(20) NOT NULL,
  `property_sec_a` int(20) NOT NULL,
  `property_pry_a` int(20) NOT NULL,
  `property_pry_b` int(20) NOT NULL,
  `property_mcc` int(20) NOT NULL,
  `property_mis01` int(20) NOT NULL,
  `property_mis03` int(20) NOT NULL,
  `poperty_mdc` int(20) NOT NULL,
  `computer_sec_a` int(20) NOT NULL,
  `computer_pry_a` int(20) NOT NULL,
  `computer_pry_b` int(20) NOT NULL,
  `computer_mcc` int(20) NOT NULL,
  `computer_mis01` int(20) NOT NULL,
  `computer_mis03` int(20) NOT NULL,
  `computer_mdc` int(20) NOT NULL,
  `internet_sec_a` int(20) NOT NULL,
  `internet_pry_a` int(20) NOT NULL,
  `internet_pry_b` int(20) NOT NULL,
  `internet_mcc` int(20) NOT NULL,
  `internet_mis01` int(20) NOT NULL,
  `internet_mis03` int(20) NOT NULL,
  `internet_mdc` int(20) NOT NULL,
  `renewal_sec_a` int(20) NOT NULL,
  `renewal_pry_a` int(20) NOT NULL,
  `renewal_pry_b` int(20) NOT NULL,
  `renewal_mcc` int(20) NOT NULL,
  `renewal_mis01` int(20) NOT NULL,
  `renewal_mis03` int(20) NOT NULL,
  `renewal_mdc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_profit_loss_expenditure`
--

INSERT INTO `ac_profit_loss_expenditure` (`expenditure_id`, `user_id`, `user_date`, `month`, `year`, `salaries_sec_a`, `salaries_pry_a`, `salaries_pry_b`, `salaries_mcc`, `salaries_mis_01`, `salaries_mis_03`, `salaries_mdc`, `medical_sec_a`, `medical_pry_a`, `medical_pry_b`, `medical_mcc`, `medical_mis_01`, `medical_mis_03`, `medical_mdc`, `eobi_sec_a`, `eobi_pry_a`, `eobi_pry_b`, `eobi_mcc`, `eobi_mis01`, `eobi_mis03`, `eobi_mdc`, `social_security_sec_a`, `social_security_pry_a`, `social_security_pry_b`, `social_security_mcc`, `social_security_mis01`, `social_security_mis03`, `social_security_mdc`, `telephone_sec_a`, `telephone_pry_a`, `telephone_pry_b`, `telephone_mcc`, `telephone_mis01`, `telephone_mis03`, `telephone_mdc`, `utility_sec_a`, `utility_pry_a`, `utility_pry_b`, `utility_mcc`, `utility_mis01`, `utility_mis03`, `utility_mdc`, `printing_sec_a`, `printing_pry_a`, `printing_pry_b`, `printing_mcc`, `printing_mis01`, `printing_mis03`, `printing_mdc`, `entertainment_sec_a`, `entertainment_pry_a`, `entertainment_pry_b`, `entertainment_mcc`, `entertainment_mis01`, `entertainment_mis03`, `entertainment_mdc`, `conveyance_sec_a`, `conveyance_pry_a`, `conveyance_pry_b`, `conveyance_mcc`, `conveyance_mis01`, `conveyance_mis03`, `conveyance_mdc`, `advertisement_sec_a`, `advertisement_pry_a`, `advertisement_pry_b`, `advertisement_mcc`, `advertisement_mis01`, `advertisement_mis03`, `advertisement_mdc`, `repair_sec_a`, `repair_pry_a`, `repair_pry_b`, `repair_mcc`, `repair_mis01`, `repair_mis03`, `repair_mdc`, `game_sec_a`, `game_pry_a`, `game_pey_b`, `game_mcc`, `game_mis01`, `game_mis03`, `game_mdc`, `laboratory_sec_a`, `laboratory_pry_a`, `laboratory_pry_b`, `laboratory_mcc`, `laboratory_mis01`, `laboratory_mis03`, `laboratory_mdc`, `paper_sec_a`, `paper_pry_a`, `paper_pry_b`, `paper_mcc`, `paper_mis01`, `paper_mis03`, `paper_mdc`, `water_sec_a`, `water_pry_a`, `water_pry_b`, `water_pry_mcc`, `water_mis01`, `water_mis03`, `water_mdc`, `bank_sec_a`, `bank_pry_a`, `bank_pry_b`, `bank_mcc`, `bank_mis01`, `bank_mis03`, `bank_mdc`, `miscellaneous_sec_a`, `miscellaneous_pry_a`, `miscellaneous_pry_b`, `miscellaneous_mcc`, `miscellaneous_mis01`, `miscellaneous_mis03`, `miscellaneous_mdc`, `electric_sec_a`, `electric_pry_a`, `electric_pry_b`, `electric_mcc`, `electric_mis01`, `electric_mis03`, `electric_mdc`, `property_sec_a`, `property_pry_a`, `property_pry_b`, `property_mcc`, `property_mis01`, `property_mis03`, `poperty_mdc`, `computer_sec_a`, `computer_pry_a`, `computer_pry_b`, `computer_mcc`, `computer_mis01`, `computer_mis03`, `computer_mdc`, `internet_sec_a`, `internet_pry_a`, `internet_pry_b`, `internet_mcc`, `internet_mis01`, `internet_mis03`, `internet_mdc`, `renewal_sec_a`, `renewal_pry_a`, `renewal_pry_b`, `renewal_mcc`, `renewal_mis01`, `renewal_mis03`, `renewal_mdc`) VALUES
(1, 2, '2020-07-25 06:10:09', 'jan', '2020', 1, 1, 1, 2, 3, 45, 2, -8, -7, -7, -17, -16, -16, -11, -20, 17, 13, 17, 22, 16, 17, 22, 20, 19, 23, 18, 15, 15, 19, 18, 21, 19, 17, 19, 16, 13, 21, 21, 21, 30, 16, 16, 23, 20, 17, 17, 9, 14, 17, -9, -8, -8, -9, 8, 11, 9, 9, 13, -12, 14, 15, 18, 17, 15, 18, 18, 14, 19, 14, 14, 15, 13, 9, 8, 14, 12, 8, 12, 12, 8, 7, 14, 11, 9, 10, 7, 8, 22, 26, 17, 8, 20, 12, 12, 10, 8, 12, 11, 5, 8, 11, 4, 10, 13, 12, 4, 8, 9, 13, 8, 8, 11, 15, 9, 5, 8, 9, 9, 9, 9, 12, 8, 9, 8, 11, 9, 12, 8, 10, 23, 12, 8, 11, 13, 15, 12, 0, 14, 8, 15, 14, 9, 9, 9, 12, 12, 7, 0, 0, 10, 10, 7, 8, 13);

-- --------------------------------------------------------

--
-- Table structure for table `ac_receivable_chart_of_account`
--

CREATE TABLE `ac_receivable_chart_of_account` (
  `char_of_account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `account` varchar(255) NOT NULL,
  `acount_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `report_data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_receivable_chart_of_account`
--

INSERT INTO `ac_receivable_chart_of_account` (`char_of_account_id`, `user_id`, `user_date`, `account`, `acount_name`, `type`, `detail`, `report_data`) VALUES
(15, 2, '2020-07-28 05:29:55', '20120786', 'muhammad waleed asad', 'Revenue', 'Summary', '2020-07-28'),
(16, 2, '2020-07-28 05:27:19', '20120786', 'waleed asad', 'Revenue', 'Summary', '2020-07-28'),
(17, 2, '2020-08-20 07:00:26', '12938', 'WALEED', 'Revenue', 'Detail', '2020-08-20'),
(18, 2, '2020-08-20 07:00:47', '76857', 'WALEED', 'Assets', 'Summary', '2020-08-21'),
(19, 2, '2020-08-21 11:03:00', '12345678', 'ARHAM', 'Assets', 'Detail', '2020-08-22'),
(20, 2, '2020-08-21 11:03:50', '1234567677', 'SARFARAZ', 'Liability', 'Detail', '2020-08-22'),
(21, 2, '2020-08-22 05:14:34', '123456767789', 'SARFARAZ2', 'Liability', 'Detail', '2020-08-22'),
(22, 2, '2020-08-21 11:04:30', '123456767788', 'SARFARAZ3', 'Expenses', 'Detail', '2020-08-22'),
(24, 2, '2020-08-22 04:21:43', '123456767799', 'WALEED', 'Assets', 'Detail', '2020-08-22'),
(26, 2, '2020-08-27 07:29:42', '123456767799009', 'DANISH', 'Equity', 'Detail', '2020-08-27'),
(523, 2, '2020-08-31 05:31:46', '11', 'AMEEN1', 'Revenue', 'Summary', '2005-05-20'),
(524, 2, '2020-08-31 05:31:46', '12', 'AMEEN2', 'Revenue', 'Summary', '2005-06-20'),
(525, 2, '2020-08-31 05:31:46', '13', 'AMEEN3', 'Revenue', 'Summary', '2005-07-20'),
(526, 2, '2020-08-31 05:31:46', '13', 'AMEEN4', 'Revenue', 'Summary', '2005-08-20'),
(527, 2, '2020-08-31 05:31:46', '13', 'AMEEN5', 'Revenue', 'Summary', '2005-09-20'),
(528, 2, '2020-08-31 05:31:46', '13', 'AMEEN6', 'Revenue', 'Summary', '2005-10-20'),
(529, 2, '2020-08-31 05:31:46', '13', 'AMEEN7', 'Revenue', 'Summary', '2005-11-20'),
(530, 2, '2020-08-31 05:36:45', '11', 'AMEEN1', 'Revenue', 'Summary', '2005-05-20'),
(531, 2, '2020-08-31 05:36:45', '12', 'AMEEN2', 'Revenue', 'Summary', '2005-06-20'),
(532, 2, '2020-08-31 05:36:45', '13', 'AMEEN3', 'Revenue', 'Summary', '2005-07-20'),
(533, 2, '2020-08-31 05:36:45', '13', 'AMEEN4', 'Revenue', 'Summary', '2005-08-20'),
(534, 2, '2020-08-31 05:36:45', '13', 'AMEEN5', 'Revenue', 'Summary', '2005-09-20'),
(535, 2, '2020-08-31 05:36:45', '13', 'AMEEN6', 'Revenue', 'Summary', '2005-10-20'),
(536, 2, '2020-08-31 05:36:45', '13', 'AMEEN7', 'Revenue', 'Summary', '2005-11-20'),
(537, 2, '2020-08-31 09:28:18', '21', 'AMEEN1', 'Revenue', 'Summary', '0000-00-00'),
(538, 2, '2020-08-31 09:28:18', '22', 'AMEEN2', 'Revenue', 'Summary', '0000-00-00'),
(539, 2, '2020-08-31 09:28:18', '23', 'AMEEN3', 'Revenue', 'Summary', '0000-00-00'),
(540, 2, '2020-08-31 09:28:18', '24', 'AMEEN4', 'Revenue', 'Summary', '0000-00-00'),
(541, 2, '2020-08-31 09:28:18', '25', 'AMEEN5', 'Revenue', 'Summary', '0000-00-00'),
(542, 2, '2020-08-31 09:28:18', '26', 'AMEEN6', 'Revenue', 'Summary', '0000-00-00'),
(543, 2, '2020-08-31 09:28:18', '27', 'AMEEN7', 'Revenue', 'Summary', '0000-00-00'),
(544, 2, '2020-08-31 09:29:28', '21', 'AMEEN1', 'Revenue', 'Summary', '0000-00-00'),
(545, 2, '2020-08-31 09:29:28', '22', 'AMEEN2', 'Revenue', 'Summary', '0000-00-00'),
(546, 2, '2020-08-31 09:29:28', '23', 'AMEEN3', 'Revenue', 'Summary', '0000-00-00'),
(547, 2, '2020-08-31 09:29:28', '24', 'AMEEN4', 'Revenue', 'Summary', '0000-00-00'),
(548, 2, '2020-08-31 09:29:28', '25', 'AMEEN5', 'Revenue', 'Summary', '0000-00-00'),
(549, 2, '2020-08-31 09:29:28', '26', 'AMEEN6', 'Revenue', 'Summary', '0000-00-00'),
(550, 2, '2020-08-31 09:29:28', '27', 'AMEEN7', 'Revenue', 'Summary', '0000-00-00'),
(551, 2, '2020-08-31 09:32:33', '21', 'AMEEN1', 'Revenue', 'Summary', '0000-00-00'),
(552, 2, '2020-08-31 09:32:33', '22', 'AMEEN2', 'Revenue', 'Summary', '0000-00-00'),
(553, 2, '2020-08-31 09:32:33', '23', 'AMEEN3', 'Revenue', 'Summary', '0000-00-00'),
(554, 2, '2020-08-31 09:32:33', '24', 'AMEEN4', 'Revenue', 'Summary', '0000-00-00'),
(555, 2, '2020-08-31 09:32:33', '25', 'AMEEN5', 'Revenue', 'Summary', '0000-00-00'),
(556, 2, '2020-08-31 09:32:33', '26', 'AMEEN6', 'Revenue', 'Summary', '0000-00-00'),
(557, 2, '2020-08-31 09:32:33', '27', 'AMEEN7', 'Revenue', 'Summary', '0000-00-00'),
(558, 2, '2020-08-31 09:35:20', '21', 'AMEEN1', 'Revenue', 'Summary', '0000-00-00'),
(559, 2, '2020-08-31 09:35:20', '22', 'AMEEN2', 'Revenue', 'Summary', '0000-00-00'),
(560, 2, '2020-08-31 09:35:20', '23', 'AMEEN3', 'Revenue', 'Summary', '0000-00-00'),
(561, 2, '2020-08-31 09:35:20', '24', 'AMEEN4', 'Revenue', 'Summary', '0000-00-00'),
(562, 2, '2020-08-31 09:35:20', '25', 'AMEEN5', 'Revenue', 'Summary', '0000-00-00'),
(563, 2, '2020-08-31 09:35:20', '26', 'AMEEN6', 'Revenue', 'Summary', '0000-00-00'),
(564, 2, '2020-08-31 09:35:20', '27', 'AMEEN7', 'Revenue', 'Summary', '0000-00-00'),
(565, 2, '2020-08-31 09:36:12', '21', 'AMEEN1', 'Revenue', 'Summary', '2020-08-31'),
(566, 2, '2020-08-31 09:36:12', '22', 'AMEEN2', 'Revenue', 'Summary', '2020-09-01'),
(567, 2, '2020-08-31 09:36:12', '23', 'AMEEN3', 'Revenue', 'Summary', '2020-09-02'),
(568, 2, '2020-08-31 09:36:12', '24', 'AMEEN4', 'Revenue', 'Summary', '2020-09-03'),
(569, 2, '2020-08-31 09:36:12', '25', 'AMEEN5', 'Revenue', 'Summary', '2020-09-04'),
(570, 2, '2020-08-31 09:36:12', '26', 'AMEEN6', 'Revenue', 'Summary', '2020-09-05'),
(571, 2, '2020-08-31 09:36:12', '27', 'AMEEN7', 'Revenue', 'Summary', '2020-09-06'),
(572, 2, '2020-09-12 07:37:58', '21', 'AMEEN1', 'Revenue', 'Summary', '2020-08-31'),
(573, 2, '2020-09-12 07:37:59', '22', 'AMEEN2', 'Revenue', 'Summary', '2020-09-01'),
(574, 2, '2020-09-12 07:37:59', '23', 'AMEEN3', 'Revenue', 'Summary', '2020-09-02'),
(575, 2, '2020-09-12 07:37:59', '24', 'AMEEN4', 'Revenue', 'Summary', '2020-09-03'),
(576, 2, '2020-09-12 07:37:59', '25', 'AMEEN5', 'Revenue', 'Summary', '2020-09-04'),
(577, 2, '2020-09-12 07:37:59', '26', 'AMEEN6', 'Revenue', 'Summary', '2020-09-05'),
(578, 2, '2020-09-12 07:37:59', '27', 'AMEEN7', 'Revenue', 'Summary', '2020-09-06'),
(579, 2, '2020-09-12 09:21:11', '121', 'hall noc charges', 'Expenses', 'Detail', '2020-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `ac_rev_exp`
--

CREATE TABLE `ac_rev_exp` (
  `rev_exp_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_of_rev_exp` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `account` int(20) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `exp_by_scction` varchar(255) NOT NULL,
  `exp_amount` float NOT NULL,
  `check_by` varchar(255) NOT NULL,
  `paid_using` varchar(255) DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `check_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_rev_exp`
--

INSERT INTO `ac_rev_exp` (`rev_exp_id`, `user_id`, `user_date`, `date_of_rev_exp`, `type`, `account`, `account_title`, `exp_by_scction`, `exp_amount`, `check_by`, `paid_using`, `paid_amount`, `comments`, `check_date`) VALUES
(2, '2', '2020-08-20 08:52:39', '2020-06-20', 'Revenue', 5024, 'WALEED', 'Girls', 4000, 'Irfan', '', 0, '', '2020-08-20'),
(3, '2', '2020-08-20 08:52:59', '2020-08-20', 'Expenses', 5024, 'WALEED', 'Boys', 5000, 'Irfan', '', 0, '', '2020-08-20'),
(4, '2', '2020-08-20 08:53:15', '2020-08-20', 'Revenue', 5024, 'WALEED', 'Boys', 600, 'Irfan', '', 0, '', '2020-08-20'),
(5, '2', '2020-08-20 08:53:26', '2020-08-20', 'Revenue', 5024, 'IRFAN', 'Boys', 600, 'Irfan', '', 0, '', '2020-08-20'),
(6, '2', '2020-08-20 08:53:33', '2020-08-20', 'Expenses', 5024, 'IRFAN', 'Boys', 600, 'Irfan', '', 0, '', '2020-08-20'),
(7, '2', '2020-08-20 08:54:13', '2020-08-20', 'Expenses', 5024, 'IRFAN', 'Girls', 600, 'Irfan', '', 0, '', '2020-08-20'),
(8, '2', '2020-08-24 04:50:53', '2020-08-24', 'Revenue', 12938, 'WALEED', 'Girls College', 1000, 'irfan', 'any ', 200, '13231', '2020-08-24'),
(9, '2', '2020-08-27 09:08:15', '2020-08-27', 'Revenue', 20120786, 'muhammad waleed asad', 'Boys', 10900, 'Irfan', '', 0, '', '2020-08-27'),
(10, '2', '2020-08-27 09:08:42', '2020-08-27', 'Expenses', 2147483647, 'SARFARAZ3', 'Boys', 450, 'Irfan', '', 0, '', '2020-08-27'),
(11, '2', '2020-09-12 09:22:21', '2020-09-12', 'Expenses', 121, 'hall noc charges', 'Boys', 121, 'irfan', 'cash', 21, '', '2020-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `ac_std_fee_collected`
--

CREATE TABLE `ac_std_fee_collected` (
  `std_fee_collected_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `std_id` int(11) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `fee_collected_date` date NOT NULL,
  `fee_collected_from_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_std_fee_collected`
--

INSERT INTO `ac_std_fee_collected` (`std_fee_collected_id`, `user_id`, `user_date`, `std_id`, `std_name`, `class`, `fee_collected_date`, `fee_collected_from_account`) VALUES
(1, '2', '2020-08-17 09:46:29', 44, '114', '114', '2020-08-17', '11'),
(2, '2', '2020-08-17 09:45:45', 11, '11', '11', '2020-08-17', '11');

-- --------------------------------------------------------

--
-- Table structure for table `ac_std_fee_detail`
--

CREATE TABLE `ac_std_fee_detail` (
  `std_fee_detail_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `std_id` int(11) NOT NULL,
  `actual_fee` float NOT NULL,
  `concession` float DEFAULT NULL,
  `zakat_adjustment` float DEFAULT NULL,
  `from_zakat_account` varchar(255) DEFAULT NULL,
  `from_zakat_account_id` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `annual_charges_recived` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_std_fee_detail`
--

INSERT INTO `ac_std_fee_detail` (`std_fee_detail_id`, `user_id`, `user_date`, `std_id`, `actual_fee`, `concession`, `zakat_adjustment`, `from_zakat_account`, `from_zakat_account_id`, `remarks`, `annual_charges_recived`) VALUES
(2, '2', '2020-08-17 09:12:45', 33, 333, 0, 0, '', 0, '', 33);

-- --------------------------------------------------------

--
-- Table structure for table `ac_zakat`
--

CREATE TABLE `ac_zakat` (
  `zakat_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `period` varchar(255) NOT NULL,
  `doner_gr` int(11) NOT NULL DEFAULT 1,
  `doner` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `date_of_donation` date NOT NULL,
  `year` year(4) NOT NULL DEFAULT 2020,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ac_zakat`
--

INSERT INTO `ac_zakat` (`zakat_id`, `user_id`, `user_date`, `period`, `doner_gr`, `doner`, `amount`, `purpose`, `date_of_donation`, `year`, `comment`) VALUES
(5, '2', '2020-10-16 15:54:53', '2 month', 1, 'Irfan Ahmed', 2000, 'student fee', '2020-10-16', 2020, 'testing'),
(7, '2', '2020-10-16 16:43:26', '3 month', 2, 'Waleed Asad', 680, 'anything', '2020-10-16', 2020, ''),
(8, '2', '2020-10-20 06:52:22', '2 month', 1, 'Irfan Ahmed', 800, 'xyz2', '2020-11-26', 2020, 'for students'),
(9, '2', '2020-10-20 06:55:10', '3 month', 2, 'Waleed Asad', 700, 'student fee', '2020-11-20', 2020, 'testing'),
(10, '2', '2020-10-21 05:16:46', '2 nonth', 1, 'Irfan Ahmed', 800, 'anything', '2021-01-21', 2021, 'ee'),
(16, '2', '2020-10-21 05:25:47', '2 month', 2, 'Waleed Asad', 2000, 'anything', '2021-03-12', 2021, ''),
(17, '2', '2020-10-21 05:50:40', '2 nonth', 1, 'Irfan Ahmed', 1300, '', '2022-01-21', 2022, 'for students'),
(18, '2', '2020-10-21 05:51:01', '2 nonth', 1, 'Irfan Ahmed', 600, '', '2023-05-21', 2023, 'for students'),
(19, '2', '2020-10-21 05:51:32', '3 month', 2, 'Waleed Asad', 8600, 'anything', '2022-10-21', 2022, ''),
(22, '2', '2020-10-21 05:56:08', 'll', 2, 'Waleed Asad', 7866, '', '2023-07-21', 2023, '');

-- --------------------------------------------------------

--
-- Table structure for table `ac_zakat_form`
--

CREATE TABLE `ac_zakat_form` (
  `zakat_form_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `gr_num` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `grand_father` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `community_name` varchar(255) DEFAULT NULL,
  `grandian_cnic` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `grandian_occupation` varchar(255) NOT NULL,
  `grandian_salary` float NOT NULL,
  `eligible` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `free_ship` varchar(255) NOT NULL,
  `dependents` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_zakat_form`
--

INSERT INTO `ac_zakat_form` (`zakat_form_id`, `user_id`, `user_date`, `name`, `class`, `gr_num`, `father_name`, `grand_father`, `surname`, `community_name`, `grandian_cnic`, `contact`, `grandian_occupation`, `grandian_salary`, `eligible`, `relationship`, `address`, `free_ship`, `dependents`) VALUES
(26, 2, '2020-08-21 09:04:19', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 'yes', '1', '1', 'yes', 1),
(27, 2, '2020-08-21 09:30:23', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'Shakir ullah', 'Ullah', 'urdu speaking', '2147483647', '03111043612', 'cleark', 50000, 'no', 'Asad and Father', 'isalam', 'yes', 1111),
(28, 2, '2020-08-21 09:14:59', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'dada', 'Ullah', 't', '2147483647', '6', 'cleark', 6, 'yes', '6', 'isalam', 'yes', 6),
(30, 2, '2020-08-21 09:29:29', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'dsasd', 'Ullah', 'qweqw', '2147483647', 'qweqw', 'cleark', 88, 'yes', '88', 'isalam', 'yes', 88),
(31, 2, '2020-08-21 09:29:29', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'dsasd', 'Ullah', 'qweqw', '2147483647', 'qweqw', 'cleark', 88, 'yes', '88', 'isalam', 'yes', 88),
(32, 2, '2020-08-21 09:29:29', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'dsasd', 'Ullah', 'qweqw', '2147483647', 'qweqw', 'cleark', 88, 'yes', '88', 'isalam', 'yes', 88),
(33, 2, '2020-08-21 09:29:29', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'dsasd', 'Ullah', 'qweqw', '2147483647', 'qweqw', 'cleark', 88, 'yes', '88', 'isalam', 'yes', 88),
(38, 2, '2020-08-21 09:29:29', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'dsasd', 'Ullah', 'qweqw', '2147483647', 'qweqw', 'cleark', 88, 'yes', '88', 'isalam', 'yes', 88),
(39, 2, '2020-08-21 09:29:29', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'dsasd', 'Ullah', 'qweqw', '2147483647', 'qweqw', 'cleark', 88, 'yes', '88', 'isalam', 'yes', 88),
(40, 2, '2020-08-21 09:29:29', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'dsasd', 'Ullah', 'qweqw', '2147483647', 'qweqw', 'cleark', 88, 'yes', '88', 'isalam', 'yes', 88),
(41, 2, '2020-08-21 10:10:55', 'Waleed Asad', '7', '59', 'Muhammad AsadUllah', 'weqe', 'Ullah', 'qweqw', '2147483647', '111', 'cleark', 200, 'yes', '123', 'isalam', 'yes', 11),
(42, 2, '2020-08-21 10:37:04', 'Waleed Asad', '7', '59', 'Muhammad AsadUllah', 'wa', 'Ullah', 'asdas', '2147483647', 'sdfsd', 'cleark', 40, 'yes', '44444', 'isalam', 'yes', 2),
(43, 2, '2020-08-21 09:29:29', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'dsasd', 'Ullah', 'qweqw', '2147483647', 'qweqw', 'cleark', 88, 'yes', '88', 'isalam', 'yes', 88),
(44, 2, '2020-08-21 09:29:29', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', 'dsasd', 'Ullah', 'qweqw', '2147483647', 'qweqw', 'cleark', 88, 'yes', '88', 'isalam', 'yes', 88),
(45, 2, '2020-08-21 10:37:04', 'Waleed Asad', '7', '59', 'Muhammad AsadUllah', 'wa', 'Ullah', 'asdas', '2147483647', 'sdfsd', 'cleark', 40, 'yes', '44444', 'isalam', 'yes', 2),
(46, 2, '2020-08-21 10:37:04', 'Waleed Asad', '7', '59', 'Muhammad AsadUllah', 'wa', 'Ullah', 'asdas', '2147483647', 'sdfsd', 'cleark', 40, 'yes', '44444', 'isalam', 'yes', 2),
(47, 2, '2020-08-21 10:10:55', 'Waleed Asad', '7', '59', 'Muhammad AsadUllah', 'weqe', 'Ullah', 'qweqw', '2147483647', '111', 'cleark', 200, 'yes', '123', 'isalam', 'yes', 11),
(48, 2, '2020-08-21 10:48:57', 'Waleed Asad', '7', '57', 'Muhammad AsadUllah', '1', 'Ullah', '1', '2147483647', '1', 'cleark', 1, 'yes', '1', 'isalam', 'yes', 1),
(49, 2, '2020-08-21 10:53:17', 'Waleed Asad', '7', '58', 'Muhammad AsadUllah', '1', 'Ullah', '1', '2147483647', '1', 'cleark', 1, 'yes', '1', 'isalam', 'yes', 1),
(50, 2, '2020-08-24 04:52:52', 'asdas', '0', '78', '11', '11', '11', '11', '111', '11', '1111', 11, 'yes', '11', '11', 'yes', 1),
(51, 2, '2020-08-26 07:22:47', 'Waleed Asad', '7', '57', 'Muhammad AsadUllah', 'dd', 'Ullah', 'sdfsd', '2147483647', 'sdfs', 'cleark', 33, 'yes', '33', 'isalam', 'yes', 33);

-- --------------------------------------------------------

--
-- Table structure for table `ad_add_user`
--

CREATE TABLE `ad_add_user` (
  `add_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `gr_no` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `cpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_add_user`
--

INSERT INTO `ad_add_user` (`add_user_id`, `user_id`, `user_date`, `name`, `e_mail`, `gr_no`, `account`, `pass`, `cpass`) VALUES
(22, 2, '2020-10-13 10:12:29', 'Kashif', 'kashif@gmail.com', '4', 'account', '$2y$10$by4m5PE4nZhjHJxRK68Xx.kTDvmjieak5ntxPyOyM3rbm4mXN8AZy', '$2y$10$8wTSkUyrNDRIa9bVAHR5X.6aKcmRUlFjVjERlz0ShFUejRYlpc2VW'),
(23, 2, '2020-10-13 10:12:44', 'Zain Yousuf', 'zain@gmail.com', '80', 'student', 'waleed11', '$2y$10$R7TXyCZ6JuzH4H3f1deBee4JdawL1e2XznsuRFgATBo7FvoLos5ze'),
(24, 2, '2020-10-13 10:12:39', 'Muhammad Yousuf', 'youduf@gmail.com', '80', 'parent', '$2y$10$F7Y5.BCSLyFDrUvN40/i4.ixom0ry63CmBBEabClBp88mrA8V.zWi', '$2y$10$YS1IRBRUu/mOV.VppcNykuh5XTXMFPWyD7YcsLJteUtXbP1AAqQae'),
(25, 2, '2020-10-13 10:12:59', 'Sir Mudassir', 'mudassir@gmail.com', '3', 'teacher', '$2y$10$tQfBWMWw35CibFK7RmVb3OIt4txu/woFFmzshz6YO0GB7opaj3.j.', '$2y$10$KAfyQSFb4w.AxnMnPN1UnOWAlJpGZGZ.8LaMMqhiv8.c.G8OLJtdK'),
(26, 2, '2020-10-13 10:12:34', 'Waleed Asad', 'waleed@gmail.com', '5', 'admin', '$2y$10$QJskH/fzWQY2.EfYp5Ab3OXDPTnahI0osWEnx9AopuasuqLRTjcIW', '$2y$10$Dj4Wnmzpvt1IjNjCGlm.9uWyRxs9oT3BA6W.Mjl2UAR0jcHHhCmyS'),
(27, 2, '2020-10-13 09:24:04', 'arham', 'arham@gmail.com', '38', 'teacher', '$2y$10$7.aFmWZV.LBw02MCHQGzjuRyIGBSnX0n6orjAMaBJM2f2f5y0xqvm', '$2y$10$Aw7nwRtgw4Bd3fO2RUxJHehVcQz0D0Y3Yu1XKDbygTFgxSHL0wtTS'),
(28, 2, '2020-10-13 09:43:31', 'Kashif', 'kashif2@gmail.com', '4', 'admin', '$2y$10$ja6ssOs/Qp.TKT2BlC59I.1zVST6U/VrQtYb7M83Q4EtWrgWenHx6', '$2y$10$jIfHVhhhJcvhU7PqAVfs3.EufrUkUuG4D16NP0kxwIcMQmon1R1FG'),
(29, 2, '2020-10-14 05:47:08', 'asdas', 'asdass@gmail.com', '78', 'student', '$2y$10$bv3ermwJWL7ZsXFaA6Xaf.t7FFfZOUvpKETu9vQuHhK5P0m5tnuD2', '$2y$10$s4.5jL9hCQbkWfDLtyysWOeIV4bmBIGmeaq1KV/dEtetD0LhO8Uui');

-- --------------------------------------------------------

--
-- Table structure for table `ad_admission`
--

CREATE TABLE `ad_admission` (
  `addmission_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `class` int(11) NOT NULL,
  `GR_No` varchar(255) NOT NULL,
  `name_of_student` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `cell_no` varchar(225) NOT NULL,
  `e_mail` varchar(255) DEFAULT NULL,
  `ice_no` varchar(255) NOT NULL,
  `occupation_of_father` varchar(255) DEFAULT NULL,
  `monthly_income` int(11) DEFAULT NULL,
  `cnic_guradian` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `date_of_birth_words` varchar(255) NOT NULL,
  `admission_saught` varchar(255) NOT NULL,
  `admission_granted` varchar(255) NOT NULL,
  `last_school_class` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `memon` varchar(255) DEFAULT NULL,
  `which_memon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_admission`
--

INSERT INTO `ad_admission` (`addmission_id`, `user_id`, `user_time`, `class`, `GR_No`, `name_of_student`, `father_name`, `surname`, `guardian_name`, `relationship`, `religion`, `address`, `phone`, `cell_no`, `e_mail`, `ice_no`, `occupation_of_father`, `monthly_income`, `cnic_guradian`, `date_of_birth`, `place_of_birth`, `date_of_birth_words`, `admission_saught`, `admission_granted`, `last_school_class`, `profile_picture`, `memon`, `which_memon`) VALUES
(55, 0, '2020-09-02 11:26:54', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'home', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '123', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/407545_unnamed.jpg', NULL, NULL),
(56, 0, '2020-09-02 11:27:01', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'block 15', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '123', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/344248_4476.jpg', NULL, NULL),
(57, 0, '2020-08-05 05:48:51', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/25131_red.PNG', NULL, NULL),
(58, 0, '2020-08-05 05:49:02', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/998767_waleedmask2.jpg', NULL, NULL),
(59, 0, '2020-08-05 05:51:10', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/715872_waleedmask2.jpg', NULL, NULL),
(60, 0, '2020-08-05 05:51:24', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/195850_waleedmask2.jpg', NULL, NULL),
(61, 0, '2020-08-05 05:52:55', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/971755_waleedmask2.jpg', NULL, NULL),
(62, 0, '2020-08-05 05:54:05', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/192621_100738129_677167519792340_1495201634702065664_n.jpg', NULL, NULL),
(63, 0, '2020-08-05 05:55:00', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/650897_100738129_677167519792340_1495201634702065664_n.jpg', NULL, NULL),
(64, 0, '2020-08-05 05:55:22', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/509355_100738129_677167519792340_1495201634702065664_n.jpg', NULL, NULL),
(65, 0, '2020-08-05 05:55:30', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/270120_100738129_677167519792340_1495201634702065664_n.jpg', NULL, NULL),
(66, 0, '2020-08-05 05:56:10', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/876911_100738129_677167519792340_1495201634702065664_n.jpg', NULL, NULL),
(67, 0, '2020-08-05 05:56:21', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/814047_100738129_677167519792340_1495201634702065664_n.jpg', NULL, NULL),
(68, 0, '2020-08-05 05:56:32', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/325346_dua.PNG', NULL, NULL),
(69, 0, '2020-08-05 06:00:37', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/836589_dua.PNG', NULL, NULL),
(70, 0, '2020-08-05 06:03:39', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/437104_dua.PNG', NULL, NULL),
(71, 0, '2020-08-05 06:05:44', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/321760_dua.PNG', NULL, NULL),
(72, 0, '2020-08-05 06:06:43', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/930921_dua.PNG', NULL, NULL),
(73, 0, '2020-08-05 06:07:01', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/42008_dua.PNG', NULL, NULL),
(74, 0, '2020-08-08 04:51:34', 7, 'ep1866051', 'Waleed Asad', 'Muhammad AsadUllah', 'Ullah', 'Muhammad AsadUllah', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleed@gamil.com', '03111043612', 'cleark', 100000, '2147483647', '2020-08-27', 'karachi', 'six december ninty ninteen nine ', '9th', '8th', 'guid line / 8th', 'uploads/454423_', NULL, NULL),
(75, 0, '2020-08-08 04:57:14', 0, 'BO2001076', 'waleed', 'asad', 'waleed', 'Shakir', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleedstudent3@gamil.com', '03111043612', 'cleark', 90909, '2147483647', '2020-08-23', 'karachi', 'hauakaaaka', 'asdasdas', '8th', 'adasda', 'uploads/539511_waleedmask2.jpg', NULL, NULL),
(76, 0, '2020-08-08 04:58:16', 0, 'BO2001076', 'waleed', 'asad', 'waleed', 'Shakir', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleedstudent3@gamil.com', '03111043612', 'cleark', 90909, '2147483647', '2020-08-23', 'karachi', 'hauakaaaka', 'asdasdas', '8th', 'adasda', 'uploads/463690_waleedmask2.jpg', NULL, NULL),
(77, 0, '2020-08-08 04:58:48', 0, 'BO2001076', 'waleed', 'asad', 'waleed', 'Shakir', 'Father', 'isalam', 'isalam', '03111043612', '03111043612', 'waleedstudent30@gamil.com', '03111043612', 'cleark', 90909, '2147483647', '2020-08-23', 'karachi', 'hauakaaaka', 'asdasdas', '8th', 'adasda', 'uploads/284877_waleedmask2.jpg', NULL, NULL),
(78, 0, '2020-08-18 17:07:18', 0, 'asdas', 'asdas', '11', '11', '11', '11', '11', '11', '11', '11', 'wakleed@gmail.com', '11', '1111', 1111, '111', '2020-07-30', '111', '1111', '1111', '111', '111', 'uploads/508670_4476.jpg', NULL, NULL),
(80, 0, '2020-08-31 06:05:55', 1, '79', 'Zain Yousuf', 'Muhammad Yousuf', 'Yousuf', 'Muhammad Yousuf', 'Father', 'Isalam', 'block 15', '03174721487', '03174721487', 'zain@gmail.com', '03174721487', 'Book Shop', 400, '34324', '2020-07-30', 'karachi', 'ten oct 1999', '8', '7', 'guid line ', 'uploads/761978_4476.jpg', NULL, NULL),
(81, 2, '2020-08-31 06:14:13', 0, '42002', '0344-9999999', 'teacher', 'class', '12', '8/23/2020', '12000', 'block 5', 'comment', '', '', '', '', 0, '0', '0000-00-00', '', '', '', '', '', '', NULL, NULL),
(82, 0, '2020-08-31 10:38:31', 1, '82', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'home', '03174721487', '03174721487', 'kashif@gmail.com', '11', 'Book Shop', 300, '2147483647', '2020-09-21', 'Karachi', 'ten oct 1999', '1111', '7', 'guid line ', 'uploads/461003_4476.jpg', NULL, NULL),
(83, 0, '2020-08-31 10:39:38', 1, '82', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'home', '03174721487', '03174721487', 'kashif@gmail.com', '11', 'Book Shop', 300, '2147483647', '2020-09-21', 'Karachi', 'ten oct 1999', '1111', '7', 'guid line ', 'uploads/351337_unnamed.jpg', NULL, NULL),
(84, 0, '2020-08-31 10:41:59', 1, '82', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'home', '03174721487', '03174721487', 'kashif@gmail.com', '11', 'Book Shop', 300, '420101111111111', '2020-09-21', 'Karachi', 'ten oct 1999', '1111', '7', 'guid line ', 'uploads/682132_4476.jpg', NULL, NULL),
(85, 0, '2020-08-31 10:42:49', 1, '82', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'home', '03174721487', '03174721487', 'kashif@gmail.com', '11', 'Book Shop', 300, '420101111111111', '2020-09-21', 'Karachi', 'ten oct 1999', '1111', '7', 'guid line ', 'uploads/18582_unnamed.jpg', NULL, NULL),
(86, 0, '2020-08-31 10:44:29', 1, '82', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'home', '03174721487', '03174721487', 'kashif@gmail.com', '11', 'Book Shop', 300, '420101111111111', '2020-09-21', 'Karachi', 'ten oct 1999', '1111', '7', 'guid line ', 'uploads/386043_4476.jpg', NULL, NULL),
(87, 0, '2020-08-31 10:44:38', 1, '82', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'home', '03174721487', '03174721487', 'kashif@gmail.com', '11', 'Book Shop', 300, '420101111111111', '2020-09-21', 'Karachi', 'ten oct 1999', '1111', '7', 'guid line ', 'uploads/271910_4476.jpg', NULL, NULL),
(88, 0, '2020-08-31 10:44:56', 1, '82', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'home', '03174721487', '03174721487', 'kashif@gmail.com', '11', 'Book Shop', 300, '420101111111112', '2020-09-21', 'Karachi', 'ten oct 1999', '1111', '7', 'guid line ', 'uploads/136090_4476.jpg', NULL, NULL),
(89, 0, '2020-08-31 10:47:04', 1, '89', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'block 15', '03174721487', '03174721487', 'danishkhan@gmail.com', '11', 'Book Shop', 989, '421011111111111118', '2020-08-22', 'Karachi', 'ten oct 1999', '1111', '111', 'guid line ', 'uploads/779799_4476.jpg', NULL, NULL),
(90, 0, '2020-08-31 10:48:02', 1, '89', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'block 15', '03174721487', '03174721487', 'danishkhan@gmail.com', '11', 'Book Shop', 989, '421011111111111118', '2020-08-22', 'Karachi', 'ten oct 1999', '1111', '111', 'guid line ', 'uploads/742294_4476.jpg', NULL, NULL),
(91, 0, '2020-08-31 10:48:17', 1, '89', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'block 15', '03174721487', '03174721487', 'danishkhan@gmail.com', '11', 'Book Shop', 989, '421011111111111118', '2020-08-22', 'Karachi', 'ten oct 1999', '1111', '111', 'guid line ', 'uploads/969127_unnamed.jpg', NULL, NULL),
(92, 0, '2020-08-31 10:48:29', 1, '89', 'Danish Khan', 'Zubair Khan', 'Yousuf', 'Zubair Khan', 'Father', 'Isalam', 'block 15', '03174721487', '03174721487', 'danishkhan@gmail.com', '11', 'Book Shop', 989, '421011111111111118', '2020-08-22', 'Karachi', 'ten oct 1999', '1111', '111', 'guid line ', 'uploads/841585_unnamed.jpg', NULL, NULL),
(94, 0, '2020-09-12 11:18:39', 1, '93', 'Danish Khan', 'Muhammad Yousuf', 'Khan', 'Muhammad Yousuf', 'Father', 'Isalam', 'block 15', '03174721487', '03174721487', 'danishkhan@gmail.com', '03174721487', 'Book Shop', 5545, '34534', '2020-09-30', 'Karachi', 'ten oct 1999', '1111', 'df', 'guid line ', 'uploads/225578_background.JPG', NULL, NULL),
(95, 0, '2020-09-14 08:21:41', 1, '95', 'Ameen Uddin', 'Zia Uddin', 'Syed', 'Zia Uddin', 'Father', 'Islam', 'block 14, F.B Area , karachi', '03174721487', '03174721487', 'ameen@gmail.com', '03174721487', 'driver', 30000, '4290909645645', '1999-01-14', 'Karachi', 'ten oct 1999', '4', '4 a', 'guid line ', 'uploads/106610_background.JPG', 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `ad_annual_appraisal`
--

CREATE TABLE `ad_annual_appraisal` (
  `annual_appraisal` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_num` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `potential` varchar(255) DEFAULT NULL,
  `honesty` varchar(255) DEFAULT NULL,
  `productivity` varchar(255) DEFAULT NULL,
  `atendance` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_annual_appraisal`
--

INSERT INTO `ad_annual_appraisal` (`annual_appraisal`, `user_id`, `user_date`, `id_num`, `name`, `position`, `potential`, `honesty`, `productivity`, `atendance`, `type`) VALUES
(14, 2, '2020-07-28 04:53:32', 'RM0107', 'Waleed Asad', 'designer', 'Good', 'Excellent', 'Satisfactory', 'Excellent', ''),
(16, 2, '2020-07-28 11:55:25', 'RM0107', 'eqqe', 'designer', 'Unsatisfactory', 'Satisfactory', 'Good', 'Excellent', ''),
(17, 2, '2020-08-20 06:03:22', '4', 'Kashif', 'FOD', 'Excellent', 'Excellent', 'Excellent', 'Excellent', ''),
(18, 2, '2020-08-20 06:05:35', '4', 'Kashif', 'FOD', 'Excellent', 'Good', 'Excellent', 'Satisfactory', ''),
(19, 2, '2020-08-22 10:20:23', '4', 'Kashif', 'FOD', 'Excellent', 'Excellent', 'Excellent', 'Excellent', ''),
(20, 2, '2020-08-24 06:55:07', '5', 'Waleed Asad', 'IT boy', 'Excellent', 'Excellent', 'Excellent', 'Good', ''),
(21, 2, '2020-08-24 06:28:17', '3', 'wa', 'offoe', '', '', '', '', ''),
(22, 2, '2020-08-24 06:30:36', '3', 'wa', 'offoe', '', '', '', '', ''),
(23, 2, '2020-08-24 06:32:13', '4', 'Kashif', 'FOD', '', 'Good', '', '', ''),
(24, 2, '2020-08-24 09:26:38', '', '', '', '', '', '', '', ''),
(25, 2, '2020-08-24 09:45:55', '', '', '', '', '', '', '', ''),
(26, 2, '2020-08-24 09:49:29', '', '', '', '', '', '', '', ''),
(27, 2, '2020-08-24 09:51:09', '', '', '', '', '', '', '', ''),
(28, 2, '2020-08-24 09:53:18', '', '', '', '', '', '', '', ''),
(29, 2, '2020-08-24 09:54:52', '', '', '', '', '', '', '', ''),
(30, 2, '2020-08-24 09:55:58', '', '', '', '', '', '', '', ''),
(31, 2, '2020-08-31 06:37:11', '3', 'Sir Mudassir', 'Teacher', 'Excellent', 'Good', 'Good', 'Excellent', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `ad_assign_student_class`
--

CREATE TABLE `ad_assign_student_class` (
  `assign_student_class_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `gr_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `assign_class` varchar(255) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_assign_student_class`
--

INSERT INTO `ad_assign_student_class` (`assign_student_class_id`, `user_id`, `user_date`, `gr_no`, `name`, `date`, `assign_class`, `comment`) VALUES
(1, '2', '2020-09-01 04:24:11', '62', 'Waleed Asad', '2020-09-01', '5', 'jh'),
(2, '2', '2020-09-01 04:24:26', '60', 'Waleed Asad', '2020-09-01', '21', 'k'),
(3, '2', '2020-09-01 08:53:05', '59', 'Waleed Asad', '2020-09-01', '22', 'jiye'),
(4, '2', '2020-09-01 09:04:13', '58', 'Waleed Asad', '2020-09-01', '24', 'boy class 3 '),
(5, '2', '2020-09-01 09:17:57', '58', 'Waleed Asad', '2020-09-01', '23', ''),
(6, '2', '2020-09-02 04:59:53', '92', 'Danish Khan', '2020-09-02', '19', ''),
(7, '2', '2020-09-02 09:25:12', '55', 'Waleed Asad', '2020-09-02', '19', ''),
(8, '2', '2020-09-07 11:19:39', '61', 'Waleed Asad', '2020-09-07', '19', ''),
(10, '2', '2020-09-08 09:41:35', '80', 'Zain Yousuf', '2020-09-08', '25', ''),
(11, '2', '2020-09-12 08:54:09', '58', 'Waleed Asad', '2020-09-12', '25', ''),
(12, '2', '2020-09-14 09:04:22', '95', 'Ameen Uddin', '2020-09-14', '26', ''),
(13, '2', '2020-09-14 09:09:42', '95', 'Ameen Uddin', '2020-09-14', '25', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `ad_class`
--

CREATE TABLE `ad_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_class`
--

INSERT INTO `ad_class` (`class_id`, `class_name`, `section`, `comment`) VALUES
(18, '1', 'Girls', ''),
(19, '2', 'Girls', ''),
(20, '3', 'Girls', ''),
(21, '4', 'Girls', ''),
(22, '1', 'Boys', ''),
(23, '2', 'Boys', ''),
(24, '3', 'Boys', ''),
(25, '4 a', 'Boys', ''),
(26, '4 c', 'Boys', '');

-- --------------------------------------------------------

--
-- Table structure for table `ad_class_fee`
--

CREATE TABLE `ad_class_fee` (
  `class_fee_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `monthly_fee` int(11) NOT NULL,
  `admission_fee` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  `special` int(11) NOT NULL,
  `annual` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `date_of_setting` date NOT NULL,
  `section_name` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_class_fee`
--

INSERT INTO `ad_class_fee` (`class_fee_id`, `user_id`, `user_date`, `monthly_fee`, `admission_fee`, `exam`, `misc`, `special`, `annual`, `class_id`, `class_name`, `date_of_setting`, `section_name`, `comment`) VALUES
(2, '2', '2020-09-01 07:58:53', 5000, 1000, 2000, 11, 9, 7, 24, '3', '2020-09-01', 'Boys', ''),
(3, '2', '2020-09-01 08:02:12', 1, 1, 1, 1, 1, 1, 21, '4', '2020-09-01', 'Girls', '1'),
(4, '2', '2020-09-02 09:22:39', 500, 600, 700, 800, 900, 1000, 19, '2', '2020-09-02', 'Girls', 'testing'),
(5, '2', '2020-09-04 06:05:36', 1800, 200, 100, 50, 50, 100, 22, '1', '2020-09-04', 'Boys', '1'),
(6, '2', '2020-09-08 09:42:42', 850, 550, 1000, 100, 50, 1000, 25, '4', '2020-09-08', 'Boys', ''),
(7, '2', '2020-09-12 09:11:49', 199, 960, 231, 214, 765, 543, 26, '4 b', '2020-09-12', 'Boys', '');

-- --------------------------------------------------------

--
-- Table structure for table `ad_course_planning`
--

CREATE TABLE `ad_course_planning` (
  `course_planning_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `class` varchar(255) NOT NULL,
  `subject` varchar(10000) NOT NULL,
  `date` varchar(255) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `details` varchar(20000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_course_planning`
--

INSERT INTO `ad_course_planning` (`course_planning_id`, `user_id`, `user_date`, `class`, `subject`, `date`, `title`, `details`) VALUES
(11, 2, '2020-09-14 07:32:19', '26', '2', 'Week 1', 'lesson 1', '');

-- --------------------------------------------------------

--
-- Table structure for table `ad_employee_attendance`
--

CREATE TABLE `ad_employee_attendance` (
  `employee_attendance_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `id_num` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_employee_attendance`
--

INSERT INTO `ad_employee_attendance` (`employee_attendance_id`, `user_id`, `user_date`, `name`, `id_num`, `status`, `date`) VALUES
(1, '2', '2020-08-22 07:34:13', 'Kashif', '444', 'Excused', '2020-08-22'),
(2, '2', '2020-08-22 07:34:22', 'Kashif', '444', 'Absent', '2020-08-22'),
(3, '2', '2020-08-22 07:34:30', 'Kashif', '444', 'Present', '2020-08-22'),
(5, '2', '2020-08-24 05:52:36', 'waledd', '2', 'Alerts on Absences', '2020-08-24'),
(6, '2', '2020-08-24 05:56:04', 'Kashif', '4', 'Late', '2020-08-24'),
(7, '2', '2020-08-24 06:52:02', 'Waleed Asad', '5', 'Late', '2020-08-24'),
(9, '2', '2020-09-15 04:30:49', 'Talal', '6', 'Present', '2020-09-01'),
(10, '2', '2020-09-15 04:32:58', 'Talal', '6', 'Present', '2020-09-02'),
(11, '2', '2020-09-15 04:33:15', 'Talal', '6', 'Present', '2020-09-03'),
(12, '2', '2020-09-15 04:33:34', 'Talal', '6', 'Present', '2020-09-04'),
(13, '2', '2020-09-15 04:35:17', 'Talal', '6', 'Present', '2020-09-05'),
(14, '2', '2020-09-15 04:35:37', 'Talal', '6', 'Absent', '2020-09-07'),
(15, '2', '2020-09-15 04:37:12', 'Talal', '6', 'Present', '2020-09-09'),
(16, '2', '2020-09-15 04:37:23', 'Talal', '6', 'Present', '2020-09-10'),
(17, '2', '2020-09-15 04:37:29', 'Talal', '6', 'Present', '2020-09-11'),
(18, '2', '2020-09-15 04:37:39', 'Talal', '6', 'Late', '2020-09-12'),
(19, '2', '2020-09-15 04:37:51', 'Talal', '6', 'Present', '2020-09-14'),
(20, '2', '2020-09-15 04:38:52', 'Talal', '6', 'Present', '2020-09-15'),
(21, '2', '2020-09-15 04:39:03', 'Talal', '6', 'Present', '2020-09-16'),
(22, '2', '2020-09-15 04:39:13', 'Talal', '6', 'Absent', '2020-09-17'),
(23, '2', '2020-09-15 04:39:22', 'Talal', '6', 'Late', '2020-09-18'),
(24, '2', '2020-09-15 04:39:34', 'Talal', '6', 'Excused', '2020-09-19'),
(25, '2', '2020-09-15 04:39:44', 'Talal', '6', 'Present', '2020-09-21'),
(26, '2', '2020-09-15 04:39:51', 'Talal', '6', 'Present', '2020-09-22'),
(27, '2', '2020-09-15 04:40:07', 'Talal', '6', 'Present', '2020-09-23'),
(28, '2', '2020-09-15 04:40:18', 'Talal', '6', 'Present', '2020-09-24'),
(29, '2', '2020-09-15 04:40:26', 'Talal', '6', 'Present', '2020-09-25'),
(30, '2', '2020-09-15 04:40:34', 'Talal', '6', 'Absent', '2020-09-26'),
(31, '2', '2020-09-15 04:41:09', 'Talal', '6', 'Present', '2020-09-28'),
(32, '2', '2020-09-15 04:41:22', 'Talal', '6', 'Absent', '2020-09-29'),
(33, '2', '2020-09-15 04:41:35', 'Talal', '6', 'Present', '2020-09-30'),
(34, '2', '2020-09-15 07:18:29', 'Talal', '6', 'Present', '2020-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `ad_employee_record`
--

CREATE TABLE `ad_employee_record` (
  `employee_record_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `gr_no` varchar(255) DEFAULT NULL,
  `cnic` int(20) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `assigned_section` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `start` date NOT NULL,
  `salary` float NOT NULL,
  `house` float NOT NULL,
  `utility` float NOT NULL,
  `allow` float NOT NULL,
  `gross` float NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_employee_record`
--

INSERT INTO `ad_employee_record` (`employee_record_id`, `user_id`, `user_date`, `name`, `gr_no`, `cnic`, `position`, `assigned_section`, `age`, `start`, `salary`, `house`, `utility`, `allow`, `gross`, `phone_number`, `address`, `comment`) VALUES
(1, '2', '2020-08-15 07:49:21', 'waledd', '11', 12, '14', '15', 16, '2020-08-15', 17, 0, 0, 0, 0, '13', '18', '19'),
(2, '2', '2020-08-15 07:49:44', 'waledd', '', 122, '', '15', 0, '2020-08-15', 17, 0, 0, 0, 0, '133', '', ''),
(3, '2', '2020-08-15 08:13:14', 'wa', NULL, 42101, 'offoe', '4', 4, '2020-08-15', 4, 0, 0, 0, 0, '0311', '4', '4'),
(4, '2', '2020-08-20 04:48:56', 'Kashif', 'MP9898', 2147483647, 'FOD', 'Boys', 35, '2020-08-20', 500000, 0, 0, 0, 0, '03111043612', '', ''),
(5, '2', '2020-08-24 06:24:27', 'Waleed Asad', '11', 2147483647, 'IT boy', 'Girls', 23, '2020-08-24', 15000, 0, 0, 0, 0, '03111043612', 'Block 16 , F.b Area Karachi', 'New boy'),
(6, '2', '2020-09-15 04:11:03', 'Talal', '12', 2147483647, 'cashier', 'Boys', 25, '2020-09-15', 15000, 500, 1000, 600, 17100, '03111043612', 'block 15, F.B Area , karachi', '');

-- --------------------------------------------------------

--
-- Table structure for table `ad_fee_concession`
--

CREATE TABLE `ad_fee_concession` (
  `fee_concession_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_id` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `monthly_con` int(11) DEFAULT NULL,
  `admission_con` int(11) DEFAULT NULL,
  `exam_con` int(11) DEFAULT NULL,
  `misc_con` int(11) DEFAULT NULL,
  `special_con` int(11) DEFAULT NULL,
  `annual_con` int(11) DEFAULT NULL,
  `sibling_dis` int(11) DEFAULT NULL,
  `zakat_adj` int(11) DEFAULT NULL,
  `from_zakat_account_id` int(11) DEFAULT NULL,
  `from_zakat_account_name` varchar(255) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_fee_concession`
--

INSERT INTO `ad_fee_concession` (`fee_concession_id`, `user_id`, `user_date`, `student_id`, `student_name`, `monthly_con`, `admission_con`, `exam_con`, `misc_con`, `special_con`, `annual_con`, `sibling_dis`, `zakat_adj`, `from_zakat_account_id`, `from_zakat_account_name`, `comment`) VALUES
(1, '2', '2020-10-18 10:35:27', '94', 'Danish Khan', 10, 10, 10, 10, 10, 10, 10, 10, 1, '1', '1'),
(2, '2', '2020-10-18 10:34:27', '55', 'Waleed Asad', 100, 90, 80, 70, 60, 50, 40, 30, 1, '1', 'testing'),
(4, '2', '2020-10-18 10:34:03', '80', 'Zain Yousuf', 200, 100, 500, 50, 0, 500, 100, 200, 2, NULL, ''),
(6, '2', '2020-10-18 10:36:23', '95', 'Ameen Uddin', 100, 10, 12, 21, 0, 21, 121, 200, 1, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `ad_inquiry`
--

CREATE TABLE `ad_inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `handled_id` int(11) NOT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `internal_comments` varchar(1000) DEFAULT NULL,
  `action` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_inquiry`
--

INSERT INTO `ad_inquiry` (`inquiry_id`, `name`, `number`, `email`, `address`, `date`, `handled_id`, `comments`, `internal_comments`, `action`) VALUES
(1, 'arham', '3123', 'waleedasas27@gmail.com', '23312', '2020-08-26', 23, '232', '232', '232');

-- --------------------------------------------------------

--
-- Table structure for table `ad_parent`
--

CREATE TABLE `ad_parent` (
  `parent_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `guardian_name` varchar(255) NOT NULL,
  `cnic_guradian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_parent`
--

INSERT INTO `ad_parent` (`parent_id`, `user_id`, `user_date`, `guardian_name`, `cnic_guradian`) VALUES
(1, 'CSC', '2020-08-31 10:41:59', 'Zubair Khan', '420101111111111'),
(2, 'CSC', '2020-08-31 10:42:49', 'Zubair Khan', '420101111111111'),
(3, 'CSC', '2020-08-31 10:48:02', 'Zubair Khan', '421011111111111118'),
(4, 'CSC', '2020-09-12 08:50:14', 'Zubair Khan', '5646545646'),
(5, 'CSC', '2020-09-12 11:18:39', 'Muhammad Yousuf', '34534'),
(6, 'CSC', '2020-09-14 08:13:11', 'Zia Uddin', '4210176341207'),
(7, 'CSC', '2020-09-14 08:18:47', 'Zia Uddin', '4290909645645');

-- --------------------------------------------------------

--
-- Table structure for table `ad_parent_child`
--

CREATE TABLE `ad_parent_child` (
  `parent_child_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `parent_name` varchar(255) NOT NULL,
  `child_id` int(11) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `update_date` date NOT NULL,
  `parent_cnic` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_parent_child`
--

INSERT INTO `ad_parent_child` (`parent_child_id`, `user_id`, `user_date`, `parent_name`, `child_id`, `child_name`, `relationship`, `update_date`, `parent_cnic`) VALUES
(1, '2', '2020-08-18 17:56:37', '33', 33, '33', 'Son', '2020-08-16', '0'),
(2, '2', '2020-08-18 17:58:22', '33', 33, '33', 'Son', '2020-08-16', '0'),
(3, '2', '2020-08-20 05:32:09', 'asad', 77, 'waleed', 'Son', '2020-08-20', '0'),
(4, '2', '2020-08-20 05:35:41', '11', 78, 'asdas', 'Son', '2020-08-20', '0'),
(5, '2', '2020-08-24 06:06:09', 'Muhammad', 70, 'Waleed', 'Son', '2020-08-20', '0'),
(6, '2', '2020-08-24 06:54:35', 'Muhammad AsadUllah', 64, 'Waleed Asad', 'Daughter', '2020-08-20', '0'),
(7, '2', '2020-08-24 06:04:30', 'Muhammad AsadUllah', 0, '58', 'Daughter', '2020-08-24', '0'),
(8, '2', '2020-08-24 06:06:27', 'Muhammad AsadUllah', 0, '58', 'Daughter', '2020-08-25', '0'),
(9, '2', '2020-08-24 06:07:52', 'Muhammad AsadUllah', 0, '59', 'Daughter', '2020-08-29', '0'),
(10, '2', '2020-08-24 06:11:57', 'Muhammad AsadUllah', 0, '56', 'Son', '2020-08-24', '0'),
(11, '2', '2020-08-24 06:13:37', 'Muhammad AsadUllah', 59, 'Waleed Asad', 'Son', '2020-08-24', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ad_school_leaving_certificate`
--

CREATE TABLE `ad_school_leaving_certificate` (
  `school_leaving_certificate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `place_birth` varchar(255) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `birth_word` varchar(255) NOT NULL,
  `last_school` varchar(1000) NOT NULL,
  `date_of_admission` date NOT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `conduct` varchar(255) DEFAULT NULL,
  `leaving_date` date NOT NULL,
  `class_studing` varchar(255) NOT NULL,
  `since` varchar(255) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_school_leaving_certificate`
--

INSERT INTO `ad_school_leaving_certificate` (`school_leaving_certificate_id`, `user_id`, `user_date`, `name`, `surname`, `place_birth`, `date_of_birth`, `birth_word`, `last_school`, `date_of_admission`, `progress`, `conduct`, `leaving_date`, `class_studing`, `since`, `reason`, `remarks`) VALUES
(37, 2, '2020-07-28 05:18:43', 'Waleed Asad', 'Ullah', 'Karachi', '1999-12-06', 'six december ninteen ninty nine', 'guid line', '2020-07-28', 'good', 'Almas', '2020-07-28', '7th', '2019', 'me nhi batao ga', 'jane do');

-- --------------------------------------------------------

--
-- Table structure for table `ad_section`
--

CREATE TABLE `ad_section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_section`
--

INSERT INTO `ad_section` (`section_id`, `section_name`, `comment`) VALUES
(3, 'Boys', ''),
(4, 'Girls', ''),
(5, 'Montessori', ''),
(6, 'Girls College', ''),
(8, 'Boys kharaadar', '');

-- --------------------------------------------------------

--
-- Table structure for table `ad_std_attendance`
--

CREATE TABLE `ad_std_attendance` (
  `std_attendance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `gr_no` varchar(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_std_attendance`
--

INSERT INTO `ad_std_attendance` (`std_attendance_id`, `user_id`, `user_date`, `name`, `gr_no`, `status`, `class`, `date`) VALUES
(17, 2, '2020-07-29 03:44:25', 'hassan', '0', 'Present', 'montessori', '2020-07-25'),
(18, 2, '2020-07-29 03:58:42', 'Faisal', 'MP890', 'Present', '8', '2020-07-25'),
(19, 2, '2020-07-29 03:59:01', 'Waleed Asad2', 'EP1866051', 'Absent', 'montessori', '2020-07-29'),
(20, 2, '2020-08-04 06:57:01', 'eqqe', 'EP1866051', 'Present', 'montessori', '2020-08-04'),
(21, 2, '2020-08-04 07:05:52', 'abc', 'MP890', 'Present', 'montessori', '2020-08-04'),
(22, 2, '2020-08-22 09:33:42', 'Waleed Asad', '7', 'Excused', '7', '2020-08-22'),
(23, 2, '2020-08-24 05:42:32', 'Waleed Asad', '7', 'Absent', '7', '2020-08-24'),
(24, 2, '2020-08-24 05:44:27', 'Waleed Asad', '7', 'Absent', '7', '2020-08-24'),
(25, 2, '2020-08-24 06:47:40', 'Waleed Asad', '7', 'Late', '7', '2020-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `ad_student_fee`
--

CREATE TABLE `ad_student_fee` (
  `student_fee_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admitted_class` varchar(255) NOT NULL,
  `admission_fee` float NOT NULL,
  `activities_fee` float NOT NULL,
  `tution_fee` float NOT NULL,
  `total` float NOT NULL,
  `gr_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_student_fee`
--

INSERT INTO `ad_student_fee` (`student_fee_id`, `user_id`, `user_date`, `admitted_class`, `admission_fee`, `activities_fee`, `tution_fee`, `total`, `gr_no`) VALUES
(1, '2', '2020-08-15 08:08:42', '6th', 1000, 500, 2000, 3500, 'EP180066'),
(2, '2', '2020-08-15 08:11:04', '6th', 1000, 500, 2000, 3500, 'EP180066');

-- --------------------------------------------------------

--
-- Table structure for table `ad_subject`
--

CREATE TABLE `ad_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_subject`
--

INSERT INTO `ad_subject` (`subject_id`, `subject_name`, `class_id`, `class_name`, `comment`) VALUES
(1, 'Maths', 76, 'class name ', 'ee'),
(2, 'Maths 2', 76, 'class name ', 'ee'),
(3, 'Maths 3', 76, 'class name ', 'ee');

-- --------------------------------------------------------

--
-- Table structure for table `ad_teacher_assign`
--

CREATE TABLE `ad_teacher_assign` (
  `teacher_assign_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `assign_class` varchar(255) NOT NULL,
  `assign_subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_teacher_assign`
--

INSERT INTO `ad_teacher_assign` (`teacher_assign_id`, `user_id`, `user_date`, `teacher_id`, `teacher_name`, `assign_class`, `assign_subject`) VALUES
(36, '2', '2020-09-14 10:51:15', 3, 'Sir Mudassir', '25', 'Maths'),
(37, '2', '2020-09-14 10:55:02', 3, 'Sir Mudassir', '25', 'Maths 2'),
(38, '2', '2020-10-10 12:22:18', 2, 'Sir Mudassir', '18', 'Maths 2');

-- --------------------------------------------------------

--
-- Table structure for table `ad_teacher_attendance`
--

CREATE TABLE `ad_teacher_attendance` (
  `teacher_attendance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `id_num` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_teacher_attendance`
--

INSERT INTO `ad_teacher_attendance` (`teacher_attendance_id`, `user_id`, `user_date`, `name`, `id_num`, `status`, `date`) VALUES
(5, 2, '2020-10-05 04:27:51', 'Sir Tayyab', '34', 'Present', '2020-09-01'),
(7, 2, '2020-10-05 04:33:56', 'Sir Tayyab', '34', 'Present', '2020-09-08'),
(8, 2, '2020-10-05 04:28:23', 'Sir Tayyab', '34', 'Absent', '2020-08-04'),
(9, 2, '2020-10-05 04:28:47', 'Sir Tayyab', '34', 'Absent', '2020-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `ad_teacher_class`
--

CREATE TABLE `ad_teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `comments` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_teacher_class`
--

INSERT INTO `ad_teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `comments`) VALUES
(1, 1, 2, 'irfan teaching maths'),
(2, 2, 3, 'waleed teaching english'),
(3, 1, 3, 'irfan teaching maths');

-- --------------------------------------------------------

--
-- Table structure for table `ad_teacher_records`
--

CREATE TABLE `ad_teacher_records` (
  `Teacher_records_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `cnic` int(20) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `office` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `start` date NOT NULL,
  `salary` float NOT NULL,
  `house` int(11) DEFAULT NULL,
  `utility` int(11) DEFAULT NULL,
  `allow` int(11) DEFAULT NULL,
  `gross` int(11) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `comment` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_teacher_records`
--

INSERT INTO `ad_teacher_records` (`Teacher_records_id`, `user_id`, `user_date`, `name`, `cnic`, `position`, `office`, `age`, `start`, `salary`, `house`, `utility`, `allow`, `gross`, `phone_number`, `address`, `comment`) VALUES
(1, 1, '2020-08-18 13:47:12', 'Waleed Asad', 2147483647, 'teacher', 'class', 30, '2020-07-28', 60000, NULL, NULL, NULL, 0, '03111043612', 'al Aziziya ,jeddah , karachi', 'New hiring '),
(2, 2, '2020-08-18 13:47:17', 'Sir Mudassir', 2147483647, 'Teacher', 'raad room 1', 45, '2020-08-08', 9000, NULL, NULL, NULL, 0, '03111043612', '21321', 'chemistry'),
(3, 2, '2020-08-18 13:47:22', 'Sir Mudassir', 2147483647, 'Teacher', 'raad room 1', 45, '2020-08-08', 9000, NULL, NULL, NULL, 0, '03111043612', '21321', 'chemistry'),
(32, 2, '2020-08-31 05:57:47', 'Faizan Khan', 42002, 'teacher', 'class', 12, '0000-00-00', 12000, NULL, NULL, NULL, 0, '0344-9999999', 'block 5', ''),
(33, 2, '2020-08-31 05:58:26', 'Faizan Khan', 42002, 'teacher', 'class', 12, '0000-00-00', 12000, NULL, NULL, NULL, 0, '0344-9999999', 'block 5', 'comment'),
(34, 2, '2020-09-14 12:19:40', 'Sir Tayyab', 2147483647, 'Teacher', 'Class', 34, '2020-09-14', 1700, 500, 700, 300, 0, '03111043612', 'block 14, F.B Area , karachi', ''),
(35, 2, '2020-09-14 12:26:48', 'Sir Aslam', 2147483647, 'teacher', 'Class', 38, '2020-09-14', 15000, 2000, 1000, 1500, 19500, '03111043612', 'block 14, F.B Area , karachi', ''),
(36, 2, '2020-10-05 04:47:04', 'Sir Waseem', 2147483647, 'Teacher', 'Class', 50, '2020-10-05', 12000, 700, 300, 700, 2900, '03111043612', '11', ''),
(37, 2, '2020-10-05 04:53:00', 'arham', 5647474, 'teacher', 'Class', 45, '2020-10-05', 1500, 200, 100000, 2000, 0, '03111043612', '11', ''),
(38, 2, '2020-10-13 09:03:35', 'arham', 3232323, '23232', '32323', 2323, '2020-10-13', 23232, 23232, 23232, 3232, 3232, '23232323', '2323', '2323'),
(39, 2, '2020-10-13 09:03:40', 'arham', 3232323, '23232', '32323', 2323, '2020-10-13', 23232, 23232, 23232, 3232, 3232, '23232323', '2323', '2323'),
(40, 2, '2020-10-13 09:06:30', 'arham', 3232323, '23232', '32323', 2323, '2020-10-13', 23232, 23232, 23232, 3232, 3232, '23232323', '2323', '2323'),
(41, 2, '2020-10-13 09:06:35', 'arham', 3232323, '23232', '32323', 2323, '2020-10-13', 23232, 23232, 23232, 3232, 3232, '23232323', '2323', '2323');

-- --------------------------------------------------------

--
-- Table structure for table `ad_timetable`
--

CREATE TABLE `ad_timetable` (
  `time_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doner_zakat`
--

CREATE TABLE `doner_zakat` (
  `doner_id` int(11) NOT NULL,
  `doner_name` varchar(255) NOT NULL,
  `Donar_number` varchar(255) DEFAULT NULL,
  `Doner_address` varchar(255) DEFAULT NULL,
  `Doner_preferences` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doner_zakat`
--

INSERT INTO `doner_zakat` (`doner_id`, `doner_name`, `Donar_number`, `Doner_address`, `Doner_preferences`, `comments`) VALUES
(1, 'Irfan Ahmed', '', '', '', ''),
(2, 'Waleed Asad', '03111043612', 'R-998 , Block16, F.B Area, Karachi', 'anything', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_for_user_id` varchar(255) NOT NULL,
  `feedback_by_user_id` varchar(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_for_user_id`, `feedback_by_user_id`, `text`, `rating`, `date`) VALUES
(7, '2', 'Sir Mudassir', 'asdf', 'Average', '2020-08-25'),
(8, '', 'Waleed Asad', 'erge', 'Excellent', '2020-08-25'),
(9, '2', 'Waleed Asad', 'kk', 'Excellent', '2020-08-25'),
(10, '2', 'Kashif', 'good boy\r\n', 'Excellent', '2020-08-25'),
(11, '2', 'Sir Mudassir', 'jh', 'Excellent', '2020-08-25'),
(12, '2', 'ss', '', 'Average', '2020-08-26'),
(13, '2', 'Kashif', 'gfhgfgh', 'Average', '2020-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `link_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE `procurement` (
  `prourement_id` int(11) NOT NULL,
  `by_user` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `expected_price` float NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `date_req` date NOT NULL,
  `approval_status` varchar(255) NOT NULL,
  `date_approved` date DEFAULT NULL,
  `done_by` varchar(255) DEFAULT NULL,
  `on_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procurement`
--

INSERT INTO `procurement` (`prourement_id`, `by_user`, `item`, `description`, `expected_price`, `item_quantity`, `date_req`, `approval_status`, `date_approved`, `done_by`, `on_date`, `status`) VALUES
(1, '2', 'Cup', 'For tea', 4, 15, '2020-08-26', 'yes', '2020-08-26', 'anybody', '2020-08-31', 'Order Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `right_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `form_prioirty` int(11) NOT NULL,
  `form_location` varchar(255) NOT NULL,
  `insert_form` int(11) NOT NULL,
  `edit_form` int(11) NOT NULL,
  `delete_form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`right_id`, `user_type_id`, `user_type`, `form_name`, `icon`, `form_prioirty`, `form_location`, `insert_form`, `edit_form`, `delete_form`) VALUES
(9, 2, 'student', 'Feed Back', 'Students-mod-feedback.php', 1, 'Students-mod-feedback.php', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `th_announcement`
--

CREATE TABLE `th_announcement` (
  `announcement_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `internal_comments` varchar(255) DEFAULT NULL,
  `section` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `all_or_specific` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `th_announcement`
--

INSERT INTO `th_announcement` (`announcement_id`, `user_id`, `user_date`, `title`, `date`, `description`, `internal_comments`, `section`, `class`, `all_or_specific`) VALUES
(1, '2', '2020-08-18 15:55:53', '12', '2020-08-18', '12d', NULL, '', '', NULL),
(4, '2', '2020-08-18 15:55:41', '12', '2020-08-18', '12', NULL, '', '', NULL),
(5, '2', '2020-08-18 16:23:59', '12', '2020-08-18', '2121', '', '123123', '123123', ''),
(6, '2', '2020-08-18 16:28:20', '12', '2020-08-18', '2121', '', '123123', '123123', ''),
(7, '2', '2020-08-18 16:28:23', '12', '2020-08-18', '2121', '', '123123', '123123', 'All'),
(8, '2', '2020-08-18 16:29:41', '12', '2020-08-18', '2121', '', '123123', '123123', 'All'),
(9, '2', '2020-08-18 16:29:47', '12', '2020-08-18', '2121', 'ff', '123123', '123123', 'All'),
(10, '2', '2020-08-18 16:31:09', '12', '2020-08-18', '2121', 'ff', '123123', '123123', 'All'),
(11, '2', '2020-08-25 08:53:33', 'Picnic', '2020-08-25', 'picnic ho rahe hai ajao sub', 'ff', '123123', '4', 'All');

-- --------------------------------------------------------

--
-- Table structure for table `th_blog`
--

CREATE TABLE `th_blog` (
  `th_blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(255) NOT NULL,
  `img_link` varchar(2000) NOT NULL,
  `description` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `th_blog`
--

INSERT INTO `th_blog` (`th_blog_id`, `user_id`, `user_date`, `title`, `img_link`, `description`) VALUES
(15, 2, '2020-07-28 08:45:57', 'Picnic', 'https://www.mykidsway.com/wp-content/uploads/2018/03/essay-on-school-picnic.jpg', 'Picnic arrange on 3 aug for student , charges only 500/- , Murree'),
(17, 2, '2020-08-18 17:08:49', 'qweqwe', 'uploads/515331_4476.jpg', 'wq'),
(18, 2, '2020-08-18 17:29:31', 'qweqwe', 'uploads/449643_unnamed.jpg', 'wqDsdsafsdf'),
(19, 2, '2020-08-18 17:29:33', 'qweqwe', 'uploads/23594_unnamed.jpg', 'wqDsdsafsdf'),
(20, 2, '2020-08-18 17:29:34', 'qweqwe', 'uploads/826314_unnamed.jpg', 'wqDsdsafsdf'),
(21, 2, '2020-08-18 17:29:35', 'qweqwe', 'uploads/89386_unnamed.jpg', 'wqDsdsafsdf');

-- --------------------------------------------------------

--
-- Table structure for table `th_gradebook`
--

CREATE TABLE `th_gradebook` (
  `gardebook_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `student_id` int(11) NOT NULL,
  `student_subject_id` int(11) NOT NULL,
  `student_subject_name` varchar(255) NOT NULL,
  `student_grade` varchar(255) NOT NULL,
  `student_letter_grade` varchar(255) NOT NULL,
  `student_teacher_comment` varchar(255) DEFAULT NULL,
  `semester` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `current_class` varchar(255) NOT NULL,
  `internal_comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `th_home_work`
--

CREATE TABLE `th_home_work` (
  `th_home_work_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `class` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `work` varchar(1000) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `th_home_work`
--

INSERT INTO `th_home_work` (`th_home_work_id`, `user_id`, `user_date`, `class`, `subject`, `date`, `work`, `file`) VALUES
(8, 2, '2020-07-24 05:41:58', '8th', 'Maths', '2020-07-24', 'do exe 4.8 and test of 4.1 on monady ', NULL),
(11, 2, '2020-07-28 08:32:24', '6th', 'PST', '2020-07-28', 'do exe 4.8 and test of 4.1 on monady ', NULL),
(12, 2, '2020-08-04 06:12:42', '6', 'chemistry', '2020-08-04', 'chemistry is hard', NULL),
(13, 2, '2020-08-04 06:36:04', '3', 'physics', '2020-08-04', 'test on monday chapter 1', NULL),
(14, 2, '2020-08-04 06:44:25', '444', 'Maths2', '2020-08-04', 'do practice all exe', NULL),
(15, 2, '2020-08-04 07:01:42', '6th', 'PST', '2020-08-04', 'do all', NULL),
(16, 2, '2020-08-04 07:03:23', '6th', 'PST', '2020-08-04', 'do all', NULL),
(29, 2, '2020-08-19 08:16:47', '3', 'werwer', '2020-08-19', 'werwer', 'assets/home_work/326957_'),
(30, 2, '2020-08-19 08:18:54', '', 'sadsad', '2020-08-19', 'asdasd', 'assets/home_work/341195_'),
(31, 2, '2020-08-19 08:19:37', '', 'sadsad', '2020-08-19', 'asdasd', 'assets/home_work/226108_'),
(32, 2, '2020-08-19 08:20:14', '', 'asd', '2020-08-19', 'asd', ''),
(33, 2, '2020-08-19 08:21:31', '', 'asdasd', '2020-08-19', 'asdasd', ''),
(34, 2, '2020-08-19 08:21:47', '', 'asdasd', '2020-08-19', 'asdasd', 'assets/home_work/773609_339405_rufus-3.11(2).exe');

-- --------------------------------------------------------

--
-- Table structure for table `th_report_card`
--

CREATE TABLE `th_report_card` (
  `report_card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(255) NOT NULL,
  `gr_no` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `marks_obtained` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `th_report_card`
--

INSERT INTO `th_report_card` (`report_card_id`, `user_id`, `user_date`, `name`, `gr_no`, `subject`, `marks_obtained`, `total_marks`) VALUES
(1, 2, '2020-08-06 07:52:20', 'Waleed Asad', 'EP1866051', 'Maths', 70, 100),
(2, 2, '2020-08-06 08:46:15', 'Waleed Asad', 'EP1866051', 'PST', 78, 80),
(3, 2, '2020-08-06 08:55:42', 'Waleed Asad', 'EP1866053', 'PST', 60, 80),
(4, 2, '2020-08-06 08:56:13', 'Waleed Asad', 'EP1866051', 'Science', 33, 50),
(5, 2, '2020-08-06 09:02:14', 'Waleed Asad', 'EP1866051', 'Science', 33, 50),
(6, 2, '2020-08-20 07:43:53', 'Waleed Asad', '64', 'Maths 2', 500, 1000),
(7, 2, '2020-08-22 10:48:12', 'Waleed Asad', '55', 'Maths', 44444, 444);

-- --------------------------------------------------------

--
-- Table structure for table `th_video_lecture`
--

CREATE TABLE `th_video_lecture` (
  `th_video_lecture_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `class` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(3000) NOT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `th_video_lecture`
--

INSERT INTO `th_video_lecture` (`th_video_lecture_id`, `user_id`, `user_date`, `class`, `subject`, `title`, `link`, `comment`) VALUES
(8, 2, '2020-08-20 07:48:08', '8', 'Maths 2', 'Complex Numbers', 'https://www.youtube.com/watch?v=Eh0Lm6foIkU', 'maths work'),
(9, 2, '2020-08-06 04:02:45', '8th', 'Maths', 'Introduction To Sets', 'https://www.youtube.com/watch?v=05Z_dudVav0', 'maths work'),
(10, 2, '2020-08-06 04:04:46', '8th', 'Chemistry', 'Introduction to Chemistry', 'https://www.youtube.com/watch?v=eueLxxU0CrI', 'chemistry'),
(11, 2, '2020-08-06 04:05:58', '8th', 'Chemistry', 'Atomic mass & amu', 'https://www.youtube.com/watch?v=dUWVHcjrv9o', 'chemistry'),
(26, 2, '2020-08-06 06:09:29', '6', 'Physics', 'Electric generator (A.C. & D.C.)', 'https://www.youtube.com/watch?v=FpzlZq_wDL4', 'new video'),
(27, 2, '2020-08-06 09:06:43', '8th', 'Maths2', 'modal test', 'https://www.youtube.com/watch?v=-CmwjC_1mQA', 'new video');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` varchar(255) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `user_date`, `user_id`, `type_name`, `comment`) VALUES
(6, '2020-10-13 06:25:35', '2', 'student', 'for students'),
(7, '2020-10-13 08:16:28', '2', 'account', 'for account '),
(8, '2020-10-13 08:16:42', '2', 'teacher', 'for teacher portal '),
(9, '2020-10-13 08:17:07', '2', 'admin', 'for mangement all data entry '),
(10, '2020-10-14 05:33:41', '2', 'parent', 'for student deatil show in parent account just');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_account_entry`
--
ALTER TABLE `ac_account_entry`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `ac_annual_appraisal`
--
ALTER TABLE `ac_annual_appraisal`
  ADD PRIMARY KEY (`increment_form_id`),
  ADD UNIQUE KEY `increment_form_id` (`increment_form_id`),
  ADD UNIQUE KEY `increment_form_id_2` (`increment_form_id`);

--
-- Indexes for table `ac_asset_liab`
--
ALTER TABLE `ac_asset_liab`
  ADD PRIMARY KEY (`ac_asset_liab_id`);

--
-- Indexes for table `ac_bro_sis_discount`
--
ALTER TABLE `ac_bro_sis_discount`
  ADD PRIMARY KEY (`bro_sis_discount_id`);

--
-- Indexes for table `ac_budgeting`
--
ALTER TABLE `ac_budgeting`
  ADD PRIMARY KEY (`estimated_budget_id`),
  ADD UNIQUE KEY `estimated_budget_id` (`estimated_budget_id`);

--
-- Indexes for table `ac_employee_loan`
--
ALTER TABLE `ac_employee_loan`
  ADD PRIMARY KEY (`employee_loan_id`);

--
-- Indexes for table `ac_fees_concession`
--
ALTER TABLE `ac_fees_concession`
  ADD PRIMARY KEY (`fees_concession_id`);

--
-- Indexes for table `ac_fee_calculated`
--
ALTER TABLE `ac_fee_calculated`
  ADD PRIMARY KEY (`fee_calculated_id`);

--
-- Indexes for table `ac_fee_card`
--
ALTER TABLE `ac_fee_card`
  ADD PRIMARY KEY (`fee_card_id`);

--
-- Indexes for table `ac_fee_collection`
--
ALTER TABLE `ac_fee_collection`
  ADD PRIMARY KEY (`fee_collection_id`),
  ADD UNIQUE KEY `which_month` (`which_month`,`year`,`studend_id`);

--
-- Indexes for table `ac_fee_collection_done`
--
ALTER TABLE `ac_fee_collection_done`
  ADD PRIMARY KEY (`fee_collection_done_id`);

--
-- Indexes for table `ac_fee_module`
--
ALTER TABLE `ac_fee_module`
  ADD PRIMARY KEY (`fee_id`),
  ADD UNIQUE KEY `fee_id` (`fee_id`),
  ADD UNIQUE KEY `fee_id_2` (`fee_id`);

--
-- Indexes for table `ac_generate_fee_class`
--
ALTER TABLE `ac_generate_fee_class`
  ADD PRIMARY KEY (`generate_fee_class_id`),
  ADD UNIQUE KEY `class_id_2` (`class_id`,`which_month`,`year`);

--
-- Indexes for table `ac_generate_fee_student`
--
ALTER TABLE `ac_generate_fee_student`
  ADD PRIMARY KEY (`generate_fee_student_id`);

--
-- Indexes for table `ac_hall_booking`
--
ALTER TABLE `ac_hall_booking`
  ADD PRIMARY KEY (`hall_booking`);

--
-- Indexes for table `ac_payroll_calculation`
--
ALTER TABLE `ac_payroll_calculation`
  ADD PRIMARY KEY (`payroll_id`),
  ADD UNIQUE KEY `payroll_id` (`payroll_id`);

--
-- Indexes for table `ac_profit_loss_expenditure`
--
ALTER TABLE `ac_profit_loss_expenditure`
  ADD PRIMARY KEY (`expenditure_id`);

--
-- Indexes for table `ac_receivable_chart_of_account`
--
ALTER TABLE `ac_receivable_chart_of_account`
  ADD PRIMARY KEY (`char_of_account_id`);

--
-- Indexes for table `ac_rev_exp`
--
ALTER TABLE `ac_rev_exp`
  ADD PRIMARY KEY (`rev_exp_id`);

--
-- Indexes for table `ac_std_fee_collected`
--
ALTER TABLE `ac_std_fee_collected`
  ADD PRIMARY KEY (`std_fee_collected_id`);

--
-- Indexes for table `ac_std_fee_detail`
--
ALTER TABLE `ac_std_fee_detail`
  ADD PRIMARY KEY (`std_fee_detail_id`);

--
-- Indexes for table `ac_zakat`
--
ALTER TABLE `ac_zakat`
  ADD PRIMARY KEY (`zakat_id`);

--
-- Indexes for table `ac_zakat_form`
--
ALTER TABLE `ac_zakat_form`
  ADD PRIMARY KEY (`zakat_form_id`),
  ADD UNIQUE KEY `zakat_form_id` (`zakat_form_id`);

--
-- Indexes for table `ad_add_user`
--
ALTER TABLE `ad_add_user`
  ADD PRIMARY KEY (`add_user_id`);

--
-- Indexes for table `ad_admission`
--
ALTER TABLE `ad_admission`
  ADD PRIMARY KEY (`addmission_id`),
  ADD UNIQUE KEY `user_time` (`user_time`);

--
-- Indexes for table `ad_annual_appraisal`
--
ALTER TABLE `ad_annual_appraisal`
  ADD PRIMARY KEY (`annual_appraisal`),
  ADD UNIQUE KEY `annual_appraisal` (`annual_appraisal`),
  ADD UNIQUE KEY `annual_appraisal_2` (`annual_appraisal`),
  ADD UNIQUE KEY `annual_appraisal_3` (`annual_appraisal`);

--
-- Indexes for table `ad_assign_student_class`
--
ALTER TABLE `ad_assign_student_class`
  ADD PRIMARY KEY (`assign_student_class_id`);

--
-- Indexes for table `ad_class`
--
ALTER TABLE `ad_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `ad_class_fee`
--
ALTER TABLE `ad_class_fee`
  ADD PRIMARY KEY (`class_fee_id`);

--
-- Indexes for table `ad_course_planning`
--
ALTER TABLE `ad_course_planning`
  ADD PRIMARY KEY (`course_planning_id`);

--
-- Indexes for table `ad_employee_attendance`
--
ALTER TABLE `ad_employee_attendance`
  ADD PRIMARY KEY (`employee_attendance_id`);

--
-- Indexes for table `ad_employee_record`
--
ALTER TABLE `ad_employee_record`
  ADD PRIMARY KEY (`employee_record_id`);

--
-- Indexes for table `ad_fee_concession`
--
ALTER TABLE `ad_fee_concession`
  ADD PRIMARY KEY (`fee_concession_id`);

--
-- Indexes for table `ad_inquiry`
--
ALTER TABLE `ad_inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `ad_parent`
--
ALTER TABLE `ad_parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `ad_parent_child`
--
ALTER TABLE `ad_parent_child`
  ADD PRIMARY KEY (`parent_child_id`);

--
-- Indexes for table `ad_school_leaving_certificate`
--
ALTER TABLE `ad_school_leaving_certificate`
  ADD PRIMARY KEY (`school_leaving_certificate_id`);

--
-- Indexes for table `ad_section`
--
ALTER TABLE `ad_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `ad_std_attendance`
--
ALTER TABLE `ad_std_attendance`
  ADD PRIMARY KEY (`std_attendance_id`);

--
-- Indexes for table `ad_student_fee`
--
ALTER TABLE `ad_student_fee`
  ADD PRIMARY KEY (`student_fee_id`);

--
-- Indexes for table `ad_subject`
--
ALTER TABLE `ad_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `ad_teacher_assign`
--
ALTER TABLE `ad_teacher_assign`
  ADD PRIMARY KEY (`teacher_assign_id`);

--
-- Indexes for table `ad_teacher_attendance`
--
ALTER TABLE `ad_teacher_attendance`
  ADD PRIMARY KEY (`teacher_attendance_id`);

--
-- Indexes for table `ad_teacher_class`
--
ALTER TABLE `ad_teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `ad_teacher_records`
--
ALTER TABLE `ad_teacher_records`
  ADD PRIMARY KEY (`Teacher_records_id`),
  ADD UNIQUE KEY `Teacher_records_id` (`Teacher_records_id`);

--
-- Indexes for table `ad_timetable`
--
ALTER TABLE `ad_timetable`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `doner_zakat`
--
ALTER TABLE `doner_zakat`
  ADD PRIMARY KEY (`doner_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `procurement`
--
ALTER TABLE `procurement`
  ADD PRIMARY KEY (`prourement_id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`right_id`);

--
-- Indexes for table `th_announcement`
--
ALTER TABLE `th_announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `th_blog`
--
ALTER TABLE `th_blog`
  ADD PRIMARY KEY (`th_blog_id`);

--
-- Indexes for table `th_gradebook`
--
ALTER TABLE `th_gradebook`
  ADD PRIMARY KEY (`gardebook_id`);

--
-- Indexes for table `th_home_work`
--
ALTER TABLE `th_home_work`
  ADD PRIMARY KEY (`th_home_work_id`);

--
-- Indexes for table `th_report_card`
--
ALTER TABLE `th_report_card`
  ADD PRIMARY KEY (`report_card_id`);

--
-- Indexes for table `th_video_lecture`
--
ALTER TABLE `th_video_lecture`
  ADD PRIMARY KEY (`th_video_lecture_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_account_entry`
--
ALTER TABLE `ac_account_entry`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ac_annual_appraisal`
--
ALTER TABLE `ac_annual_appraisal`
  MODIFY `increment_form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `ac_asset_liab`
--
ALTER TABLE `ac_asset_liab`
  MODIFY `ac_asset_liab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ac_bro_sis_discount`
--
ALTER TABLE `ac_bro_sis_discount`
  MODIFY `bro_sis_discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ac_budgeting`
--
ALTER TABLE `ac_budgeting`
  MODIFY `estimated_budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1118;

--
-- AUTO_INCREMENT for table `ac_employee_loan`
--
ALTER TABLE `ac_employee_loan`
  MODIFY `employee_loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ac_fee_calculated`
--
ALTER TABLE `ac_fee_calculated`
  MODIFY `fee_calculated_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ac_fee_card`
--
ALTER TABLE `ac_fee_card`
  MODIFY `fee_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ac_fee_collection`
--
ALTER TABLE `ac_fee_collection`
  MODIFY `fee_collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `ac_fee_collection_done`
--
ALTER TABLE `ac_fee_collection_done`
  MODIFY `fee_collection_done_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ac_fee_module`
--
ALTER TABLE `ac_fee_module`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ac_generate_fee_class`
--
ALTER TABLE `ac_generate_fee_class`
  MODIFY `generate_fee_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ac_generate_fee_student`
--
ALTER TABLE `ac_generate_fee_student`
  MODIFY `generate_fee_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ac_hall_booking`
--
ALTER TABLE `ac_hall_booking`
  MODIFY `hall_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ac_payroll_calculation`
--
ALTER TABLE `ac_payroll_calculation`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `ac_profit_loss_expenditure`
--
ALTER TABLE `ac_profit_loss_expenditure`
  MODIFY `expenditure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ac_receivable_chart_of_account`
--
ALTER TABLE `ac_receivable_chart_of_account`
  MODIFY `char_of_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=580;

--
-- AUTO_INCREMENT for table `ac_rev_exp`
--
ALTER TABLE `ac_rev_exp`
  MODIFY `rev_exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ac_std_fee_collected`
--
ALTER TABLE `ac_std_fee_collected`
  MODIFY `std_fee_collected_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ac_std_fee_detail`
--
ALTER TABLE `ac_std_fee_detail`
  MODIFY `std_fee_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ac_zakat`
--
ALTER TABLE `ac_zakat`
  MODIFY `zakat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ac_zakat_form`
--
ALTER TABLE `ac_zakat_form`
  MODIFY `zakat_form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `ad_add_user`
--
ALTER TABLE `ad_add_user`
  MODIFY `add_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ad_admission`
--
ALTER TABLE `ad_admission`
  MODIFY `addmission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `ad_annual_appraisal`
--
ALTER TABLE `ad_annual_appraisal`
  MODIFY `annual_appraisal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ad_assign_student_class`
--
ALTER TABLE `ad_assign_student_class`
  MODIFY `assign_student_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ad_class`
--
ALTER TABLE `ad_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ad_class_fee`
--
ALTER TABLE `ad_class_fee`
  MODIFY `class_fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ad_course_planning`
--
ALTER TABLE `ad_course_planning`
  MODIFY `course_planning_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ad_employee_attendance`
--
ALTER TABLE `ad_employee_attendance`
  MODIFY `employee_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ad_employee_record`
--
ALTER TABLE `ad_employee_record`
  MODIFY `employee_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ad_fee_concession`
--
ALTER TABLE `ad_fee_concession`
  MODIFY `fee_concession_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ad_inquiry`
--
ALTER TABLE `ad_inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ad_parent`
--
ALTER TABLE `ad_parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ad_parent_child`
--
ALTER TABLE `ad_parent_child`
  MODIFY `parent_child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ad_school_leaving_certificate`
--
ALTER TABLE `ad_school_leaving_certificate`
  MODIFY `school_leaving_certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `ad_section`
--
ALTER TABLE `ad_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ad_std_attendance`
--
ALTER TABLE `ad_std_attendance`
  MODIFY `std_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ad_student_fee`
--
ALTER TABLE `ad_student_fee`
  MODIFY `student_fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ad_subject`
--
ALTER TABLE `ad_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ad_teacher_assign`
--
ALTER TABLE `ad_teacher_assign`
  MODIFY `teacher_assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ad_teacher_attendance`
--
ALTER TABLE `ad_teacher_attendance`
  MODIFY `teacher_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ad_teacher_class`
--
ALTER TABLE `ad_teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ad_teacher_records`
--
ALTER TABLE `ad_teacher_records`
  MODIFY `Teacher_records_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `ad_timetable`
--
ALTER TABLE `ad_timetable`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doner_zakat`
--
ALTER TABLE `doner_zakat`
  MODIFY `doner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
  MODIFY `prourement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `right_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `th_announcement`
--
ALTER TABLE `th_announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `th_blog`
--
ALTER TABLE `th_blog`
  MODIFY `th_blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `th_gradebook`
--
ALTER TABLE `th_gradebook`
  MODIFY `gardebook_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `th_home_work`
--
ALTER TABLE `th_home_work`
  MODIFY `th_home_work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `th_report_card`
--
ALTER TABLE `th_report_card`
  MODIFY `report_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `th_video_lecture`
--
ALTER TABLE `th_video_lecture`
  MODIFY `th_video_lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
