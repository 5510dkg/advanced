-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2016 at 03:18 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE IF NOT EXISTS `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `account_id` varchar(110) DEFAULT NULL COMMENT 'supplyid',
  `route_id` int(11) DEFAULT NULL COMMENT 'delivery methods',
  `vehicle_id` varchar(110) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `email` varchar(110) DEFAULT NULL,
  `landline_no` int(11) DEFAULT NULL,
  `mobile_no` int(11) DEFAULT NULL,
  `status` enum('Suspended','Active','Inactive') DEFAULT 'Suspended',
  `security_amt` decimal(10,2) DEFAULT NULL,
  `address_status` varchar(3) NOT NULL DEFAULT '0' COMMENT '0:diffrent;1:same as billing address',
  `mail_house_no` varchar(255) DEFAULT NULL,
  `mail_street_address` text,
  `mail_p_office` varchar(255) DEFAULT NULL,
  `mail_country_id` int(11) DEFAULT NULL,
  `mail_state_id` int(11) DEFAULT NULL,
  `mail_district_id` int(11) DEFAULT NULL,
  `mail_pincode` int(11) DEFAULT NULL,
  `panchjanya` int(11) DEFAULT NULL,
  `organiser` int(11) DEFAULT NULL,
  `add_house_no` varchar(255) DEFAULT NULL,
  `add_street_address` text,
  `add_p_office` varchar(255) DEFAULT NULL,
  `add_country_id` int(11) DEFAULT NULL,
  `add_state_id` int(11) DEFAULT NULL,
  `add_district_id` int(11) DEFAULT NULL,
  `add_pincode` int(11) DEFAULT NULL,
  `issue_start_date` date NOT NULL,
  `agency_type` enum('Single','Combined') NOT NULL,
  `comment` text NOT NULL,
  `commission` varchar(200) NOT NULL,
  `agency_combined_id` varchar(100) DEFAULT NULL COMMENT 'related to account_id in this table',
  `source` varchar(250) DEFAULT NULL,
  `train_no` varchar(250) DEFAULT NULL,
  `train_name` varchar(250) DEFAULT NULL,
  `billing_id` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id`, `name`, `account_id`, `route_id`, `vehicle_id`, `reference`, `email`, `landline_no`, `mobile_no`, `status`, `security_amt`, `address_status`, `mail_house_no`, `mail_street_address`, `mail_p_office`, `mail_country_id`, `mail_state_id`, `mail_district_id`, `mail_pincode`, `panchjanya`, `organiser`, `add_house_no`, `add_street_address`, `add_p_office`, `add_country_id`, `add_state_id`, `add_district_id`, `add_pincode`, `issue_start_date`, `agency_type`, `comment`, `commission`, `agency_combined_id`, `source`, `train_no`, `train_name`, `billing_id`) VALUES
(1, 'Sh Ram Agency', 'DL|S|00001', 1, 'by Bus', '', 'sr@ag.com', 12125454, 2147483647, 'Suspended', 10000.00, '1', '47/8', 'new rajpura near tesac road, new delhi', 'shalimar bagh', 1, 10, 130, 110121, 100, 500, '47/8', 'new rajpura near tesac road, new delhi', 'shalimar bagh', 1, 10, 130, 110121, '2016-04-09', 'Single', 'new agency opened because of high demand of magazine', '33', '', '', '', '', 'DL|S|00001'),
(2, 'sh shyam agency', 'DL|S|00002', 2, 'by Car', 'Sh Ram Agency', 'ssm@gmail.com', 12156848, 2147483647, 'Suspended', 5000.00, '1', '78/9', 'new kolkata street new junction, old delhi railway station', 'karol bagh', 1, 10, 138, 11122, 200, 50, '78/9', 'new kolkata street new junction, old delhi railway station', 'karol bagh', 1, 10, 138, 11122, '2016-04-06', 'Single', 'new agency ', '33', '', '', '', '', 'DL|S|00002'),
(3, 'sh shiv agency', 'UK|C|00003', 5, 'by cycle', 'Sh Ram Agency', 'shiv@im.ocm', 90123981, 2147483647, 'Suspended', 2000.00, '1', 'sh gurucharan singh', 'kailsh mountain, near mansarovar, Himalaya', 'mansarovar', 1, 35, 644, 965874, 989, 456, 'sh gurucharan singh', 'kailsh mountain, near mansarovar, Himalaya', 'mansarovar', 1, 35, 644, 965874, '2016-04-09', 'Combined', 'om', '33', 'DL|S|00001', 'NDLS', '145156', 'Shiva Express', 'DL|S|00001'),
(4, 'sh Vishnu agency', 'KL|S|00004', 1, 'by Bus', 'Shiva', 'vishnu@palanhare.com', 12312312, 2147483647, 'Active', 10000.00, '1', 'lotus road', 'lotus in deep ocean', 'indianocear', 1, 18, 294, 987878, 99, 458, 'lotus road', 'lotus in deep ocean', 'indianocear', 1, 18, 294, 987878, '2016-04-16', 'Single', 'ytrtryryrtyrytfytftftf', '33', '', '', '', '', 'KL|S|00004'),
(5, 'krishna agency', 'GJ|C|00005', 1, 'by Truck', 'Sh Ram Agency', 'kr@nasj.com', 13111111, 1111111111, 'Active', 121122.00, '1', '09/42', 'new street road new fedora complex', 'anantag', 1, 12, 141, 111111, 222, 332, '09/42', 'new street road new fedora complex', 'anantag', 1, 12, 141, 111111, '2016-04-08', 'Combined', '', '33', 'KL|S|00004', '', '', '', 'KL|S|00004'),
(6, 'plesk type', 'AR|S|00006', 2, 'by Car', 'Shiva', 'ij@mi.cm', 44444444, 2147483647, 'Active', 1111.00, '1', '123', 'asdasdasd', 'asdasdasd', 1, 3, 17, 123123, 1222, 11, '123', 'asdasdasd', 'asdasdasd', 1, 3, 17, 123123, '2016-04-09', 'Single', '123123', '11', '', '', '', '', 'AR|S|00006'),
(7, 'vinay lal aggarwal', 'AR|S|00007', 1, 'by car', 'Ram', 'bn2.com', 11111111, 2147483647, 'Active', 1231.00, '1', 'sh gurucharan singh', 'asdas ioutoassbadas', 'popopaosd', 1, 3, 32, 123133, 123, 111, 'sh gurucharan singh', 'asdas ioutoassbadas', 'popopaosd', 1, 3, 32, 123133, '2016-04-09', 'Single', '1212sadasdasdasdasd', '32', '', '', '', '', 'AR|S|00007'),
(8, 'new rail agency', 'HR|S|00008', 5, 'by Train', 'Sh Ram Agency', 'yui@gmaio.com', 98745632, 2147483647, 'Active', 6000.00, '1', '45/8', 'new kotla road, saket', 'saket', 1, 13, 191, 111112, 1222, 111, '45/8', 'new kotla road, saket', 'saket', 1, 13, 191, 111112, '2016-04-10', 'Single', 'new agency', '33', '', 'ANVT', '12469', 'Saheed Express', 'HR|S|00008');

-- --------------------------------------------------------

--
-- Table structure for table `agency_bill_book`
--

CREATE TABLE IF NOT EXISTS `agency_bill_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `pjy` int(11) DEFAULT NULL,
  `org` int(11) DEFAULT NULL,
  `total_copies` varchar(30) DEFAULT NULL,
  `price_per_piece` varchar(40) DEFAULT NULL,
  `total_price` varchar(50) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `discounted_amt` decimal(10,2) DEFAULT NULL,
  `final_total` decimal(10,2) DEFAULT NULL,
  `credit_amt` decimal(10,2) DEFAULT NULL,
  `credited_date` date DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqueindex` (`agency_id`,`issue_date`),
  KEY `agency_id` (`agency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `agency_bill_book`
--

INSERT INTO `agency_bill_book` (`id`, `agency_id`, `issue_date`, `pjy`, `org`, `total_copies`, `price_per_piece`, `total_price`, `discount`, `discounted_amt`, `final_total`, `credit_amt`, `credited_date`, `created_on`) VALUES
(1, 4, '2016-03-06', 99, 458, '557', '15', '8355', 33.00, 2757.15, 5597.85, NULL, NULL, '2016-04-06 11:09:21'),
(2, 5, '2016-03-06', 222, 332, '554', '15', '8310', 33.00, 2742.30, 5567.70, NULL, NULL, '2016-04-06 11:09:22'),
(3, 6, '2016-03-06', 1222, 11, '1233', '15', '18495', 33.00, 6103.35, 12391.65, NULL, NULL, '2016-04-06 11:09:22'),
(4, 7, '2016-03-06', 123, 111, '234', '15', '3510', 33.00, 1158.30, 2351.70, NULL, NULL, '2016-04-06 11:09:22'),
(5, 8, '2016-03-06', 1222, 111, '1333', '15', '19995', 33.00, 6598.35, 13366.65, 30.00, '2016-04-07', '2016-04-06 11:09:22'),
(6, 4, '2016-03-13', 99, 458, '557', '15', '8355', 33.00, 2757.15, 5597.85, NULL, NULL, '2016-04-06 11:09:22'),
(7, 5, '2016-03-13', 222, 332, '554', '15', '8310', 33.00, 2742.30, 5372.70, 195.00, '2016-04-07', '2016-04-06 11:09:22'),
(8, 6, '2016-03-13', 1222, 11, '1233', '15', '18495', 33.00, 6103.35, 12391.65, NULL, NULL, '2016-04-06 11:09:22'),
(9, 7, '2016-03-13', 123, 111, '234', '15', '3510', 33.00, 1158.30, 2351.70, NULL, NULL, '2016-04-06 11:09:22'),
(10, 8, '2016-03-13', 1222, 111, '1333', '15', '19995', 33.00, 6598.35, 13396.65, NULL, NULL, '2016-04-06 11:09:22'),
(11, 4, '2016-03-20', 99, 458, '557', '15', '8355', 33.00, 2757.15, 5597.85, NULL, NULL, '2016-04-06 11:09:22'),
(12, 5, '2016-03-20', 222, 332, '554', '15', '8310', 33.00, 2742.30, 5567.70, NULL, NULL, '2016-04-06 11:09:22'),
(13, 6, '2016-03-20', 1222, 11, '1233', '15', '18495', 33.00, 6103.35, 12391.65, NULL, NULL, '2016-04-06 11:09:22'),
(14, 7, '2016-03-20', 123, 111, '234', '15', '3510', 33.00, 1158.30, 2351.70, NULL, NULL, '2016-04-06 11:09:22'),
(15, 8, '2016-03-20', 1222, 111, '1333', '15', '19995', 33.00, 6598.35, 13396.65, NULL, NULL, '2016-04-06 11:09:22'),
(16, 4, '2016-03-27', 99, 458, '557', '15', '8355', 33.00, 2757.15, 5597.85, NULL, NULL, '2016-04-06 11:09:22'),
(17, 5, '2016-03-27', 222, 332, '554', '15', '8310', 33.00, 2742.30, 5567.70, NULL, NULL, '2016-04-06 11:09:22'),
(18, 6, '2016-03-27', 1222, 11, '1233', '15', '18495', 33.00, 6103.35, 12391.65, NULL, NULL, '2016-04-06 11:09:22'),
(19, 7, '2016-03-27', 123, 111, '234', '15', '3510', 33.00, 1158.30, 2351.70, NULL, NULL, '2016-04-06 11:09:22'),
(20, 8, '2016-03-27', 1222, 111, '1333', '15', '19995', 33.00, 6598.35, 13396.65, NULL, NULL, '2016-04-06 11:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `agency_commission`
--

CREATE TABLE IF NOT EXISTS `agency_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `agency_copies_records`
--

CREATE TABLE IF NOT EXISTS `agency_copies_records` (
  `agency_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `pachjanya` int(11) NOT NULL,
  `organiser` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `agency_id` (`agency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `agency_creation_updation_records`
--

CREATE TABLE IF NOT EXISTS `agency_creation_updation_records` (
  `agency_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:for new; 1:for updated',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `agency_credit_note`
--

CREATE TABLE IF NOT EXISTS `agency_credit_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `issue_type` enum('Regular Edition','Special Edition') NOT NULL,
  `pjy` int(11) NOT NULL,
  `org` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `agency_credit_note`
--

INSERT INTO `agency_credit_note` (`id`, `agency_id`, `return_date`, `issue_type`, `pjy`, `org`, `issue_date`, `return_type`) VALUES
(1, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(2, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(3, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(4, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(5, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(6, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(7, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(8, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(9, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(10, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(11, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(12, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(13, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(14, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(15, 2, '2016-04-06', 'Regular Edition', 10, 50, '2016-03-13', 0),
(16, 4, '2016-04-04', 'Regular Edition', 66, 22, '2016-04-10', 0),
(17, 4, '2016-04-04', 'Regular Edition', 66, 22, '2016-04-10', 0),
(18, 8, '2016-03-01', 'Regular Edition', 1, 1, '2016-03-06', 0),
(19, 8, '2016-03-01', 'Regular Edition', 1, 1, '2016-03-06', 0),
(20, 5, '2016-03-01', 'Regular Edition', 1, 12, '2016-03-13', 0),
(21, 2, '2016-04-02', 'Regular Edition', 9, 5, '2016-04-03', 0),
(22, 2, '2016-04-02', 'Regular Edition', 9, 5, '2016-04-03', 0),
(23, 2, '2016-04-02', 'Regular Edition', 9, 5, '2016-04-03', 0),
(24, 1, '2016-04-06', 'Regular Edition', 4, 44, '2016-04-03', 0),
(25, 1, '2016-04-01', 'Regular Edition', 1, 1, '2016-04-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `agency_payment`
--

CREATE TABLE IF NOT EXISTS `agency_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `bill_number` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `month` date NOT NULL,
  `balance` float NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `payment_detail` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `agency_receipt`
--

CREATE TABLE IF NOT EXISTS `agency_receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `rcpt_date` date NOT NULL,
  `cr_amt` decimal(10,0) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_on` date NOT NULL,
  `created_on_time` time NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:pending,1:approved',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `agency_receipt`
--

INSERT INTO `agency_receipt` (`id`, `agency_id`, `rcpt_date`, `cr_amt`, `payment_mode`, `comment`, `created_on`, `created_on_time`, `status`) VALUES
(1, 2, '2016-04-02', 12, 3, 'asdasdasdas', '2016-04-07', '08:41:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `agency_security_amt`
--

CREATE TABLE IF NOT EXISTS `agency_security_amt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('access-mgmt', '1', 1459859587),
('access-mgmt', '16', 1460019871),
('add-bundle-size', '16', 1460019871),
('add-bundle-size', '18', 1459935598),
('add-country', '16', 1460019871),
('add-delivery-method', '16', 1460019871),
('add-department', '16', 1460019871),
('add-designation', '16', 1460019871),
('add-district', '16', 1460019871),
('add-district', '19', 1460019810),
('add-license', '1', 1459859587),
('add-license', '16', 1460019871),
('add-payment-mode', '16', 1460019871),
('add-payment-mode', '19', 1460019810),
('add-postage-rate', '16', 1460019871),
('add-postage-rate', '18', 1459935599),
('add-state', '16', 1460019871),
('add-sub-department', '16', 1460019871),
('add-weight', '16', 1460019871),
('Admin', '1', 1459859587),
('Admin', '16', 1460019871),
('agency-commission', '1', 1459859587),
('agency-commission', '16', 1460019871),
('create-agency', '10', 1459935691),
('create-agency', '16', 1460019871),
('create-agency', '19', 1460019810),
('create-user', '1', 1459859587),
('create-user', '16', 1460019871),
('deactivate-agency', '1', 1459859587),
('deactivate-agency', '10', 1459935691),
('deactivate-agency', '16', 1460019871),
('deactivate-agency', '19', 1460019810),
('delete-agency', '1', 1459859587),
('delete-agency', '10', 1459935691),
('delete-agency', '16', 1460019872),
('delete-agency-copies', '1', 1459859587),
('delete-agency-copies', '10', 1459935691),
('delete-agency-copies', '16', 1460019872),
('delete-bundle-size', '1', 1459859587),
('delete-bundle-size', '16', 1460019872),
('delete-country', '1', 1459859587),
('delete-country', '16', 1460019872),
('delete-delivery-method', '1', 1459859588),
('delete-delivery-method', '16', 1460019872),
('delete-department', '1', 1459859588),
('delete-department', '16', 1460019872),
('delete-designation', '1', 1459859588),
('delete-designation', '16', 1460019872),
('delete-district', '1', 1459859588),
('delete-district', '16', 1460019872),
('delete-license', '1', 1459859588),
('delete-license', '16', 1460019872),
('delete-payment-mode', '1', 1459859588),
('delete-payment-mode', '16', 1460019872),
('delete-state', '1', 1459859588),
('delete-state', '16', 1460019872),
('delete-sub-department', '1', 1459859588),
('delete-sub-department', '16', 1460019872),
('delete-user', '1', 1459859588),
('delete-user', '16', 1460019872),
('delete-weight', '1', 1459859588),
('delete-weight', '16', 1460019872),
('generate-bill', '16', 1460019872),
('generate-bill', '23', 1460022180),
('generate-labels', '16', 1460019872),
('generate-labels', '18', 1459935599),
('search-bill', '16', 1460019872),
('search-bill', '23', 1460022180),
('update-agency', '1', 1459859588),
('update-agency', '16', 1460019872),
('update-agency', '19', 1460019810),
('update-agency', '23', 1460022180),
('update-agency-copies', '1', 1459859588),
('update-agency-copies', '16', 1460019872),
('update-agency-copies', '19', 1460019810),
('update-agency-copies', '23', 1460022181),
('update-agency-delivery-method', '1', 1459859588),
('update-agency-delivery-method', '16', 1460019872),
('update-agency-delivery-method', '19', 1460019810),
('update-agency-delivery-method', '23', 1460022181),
('update-bundle-size', '1', 1459859588),
('update-bundle-size', '16', 1460019873),
('update-bundle-size', '19', 1460019810),
('update-country', '1', 1459859588),
('update-country', '16', 1460019873),
('update-delivery-method', '1', 1459859588),
('update-delivery-method', '16', 1460019873),
('update-delivery-method', '19', 1460019810),
('update-department', '1', 1459859588),
('update-department', '16', 1460019873),
('update-designation', '1', 1459859588),
('update-designation', '16', 1460019873),
('update-district', '1', 1459859588),
('update-district', '16', 1460019873),
('update-license', '1', 1459859588),
('update-license', '16', 1460019873),
('update-payment-mode', '1', 1459859588),
('update-payment-mode', '16', 1460019873),
('update-payment-mode', '19', 1460019810),
('update-postage-rate', '1', 1459859588),
('update-postage-rate', '16', 1460019873),
('update-state', '1', 1459859589),
('update-state', '16', 1460019873),
('update-sub-department', '1', 1459859589),
('update-sub-department', '16', 1460019873),
('update-user', '1', 1459859589),
('update-user', '16', 1460019873),
('update-weight', '1', 1459859589),
('update-weight', '16', 1460019873),
('upload-credit-note', '1', 1459859589),
('upload-credit-note', '16', 1460019873),
('upload-credit-note', '23', 1460022181),
('upload-receipt', '1', 1459859589),
('upload-receipt', '16', 1460019874),
('upload-receipt', '23', 1460022181),
('view-agency', '10', 1459935691),
('view-agency', '16', 1460019874),
('view-agency', '19', 1460019811),
('view-agency', '23', 1460022181);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('access-mgmt', 1, 'Access Management', NULL, 'NuLL', 0, 0),
('add-bundle-size', 1, 'add-bundle-size', NULL, 'NuLL', 0, 0),
('add-country', 1, 'add-country', NULL, 'NuLL', 0, 0),
('add-delivery-method', 1, 'add-delivery-method', NULL, 'NuLL', 0, 0),
('add-department', 1, 'add-department', NULL, 'NuLL', 0, 0),
('add-designation', 1, 'add-designation', NULL, 'NuLL', 0, 0),
('add-district', 1, 'add-district', NULL, 'NuLL', 0, 0),
('add-license', 1, 'add-license', NULL, 'NuLL', 0, 0),
('add-payment-mode', 1, 'add-payment-mode', NULL, 'NuLL', 0, 0),
('add-postage-rate', 1, 'add-postage-rate', NULL, 'NuLL', 0, 0),
('add-state', 1, 'add-state', NULL, 'NuLL', 0, 0),
('add-sub-department', 1, 'add-sub-department', NULL, 'NuLL', 0, 0),
('add-weight', 1, 'add-weight', NULL, 'NuLL', 0, 0),
('Admin', 1, 'Admin can do anything', NULL, NULL, NULL, NULL),
('agency-commission', 1, 'agency-commission', NULL, 'NuLL', 0, 0),
('create-agency', 1, 'create-agency', NULL, 'NuLL', 0, 0),
('create-user', 1, 'Create User/Employee', NULL, NULL, NULL, NULL),
('deactivate-agency', 1, 'deactivate-agency', NULL, 'NuLL', 0, 0),
('delete-agency', 1, 'delete-agency', NULL, 'NuLL', 0, 0),
('delete-agency-copies', 1, 'delete-agency-copies', NULL, 'NuLL', 0, 0),
('delete-bundle-size', 1, 'delete-bundle-size', NULL, 'NuLL', 0, 0),
('delete-country', 1, 'delete-country', NULL, 'NuLL', 0, 0),
('delete-delivery-method', 1, 'delete-delivery-method', NULL, 'NuLL', 0, 0),
('delete-department', 1, 'delete-department', NULL, 'NuLL', 0, 0),
('delete-designation', 1, 'delete-designation', NULL, 'NuLL', 0, 0),
('delete-district', 1, 'delete-district', NULL, 'NuLL', 0, 0),
('delete-license', 1, 'delete-license', NULL, 'NuLL', 0, 0),
('delete-payment-mode', 1, 'delete-payment-mode', NULL, 'NuLL', 0, 0),
('delete-state', 1, 'delete-state', NULL, 'NuLL', 0, 0),
('delete-sub-department', 1, 'delete-sub-department', NULL, 'NuLL', 0, 0),
('delete-user', 1, 'gives permission to delete users', NULL, NULL, NULL, NULL),
('delete-weight', 1, 'delete-weight', NULL, 'NuLL', 0, 0),
('generate-bill', 1, 'generate-bill', NULL, 'NuLL', 0, 0),
('generate-labels', 1, 'generate-labels', NULL, 'NuLL', 0, 0),
('search-bill', 1, 'view billing of agencies', NULL, 'NuLL', 0, 0),
('update-agency', 1, 'update-agency', NULL, 'NuLL', 0, 0),
('update-agency-copies', 1, 'update-agency-copies', NULL, 'NuLL', 0, 0),
('update-agency-delivery-method', 1, 'update-agency-delivery-method', NULL, 'NuLL', 0, 0),
('update-bundle-size', 1, 'update-bundle-size', NULL, 'NuLL', 0, 0),
('update-country', 1, 'update-country', NULL, 'NuLL', 0, 0),
('update-delivery-method', 1, 'update-delivery-method', NULL, 'NuLL', 0, 0),
('update-department', 1, 'update-department', NULL, 'NuLL', 0, 0),
('update-designation', 1, 'update-designation', NULL, 'NuLL', 0, 0),
('update-district', 1, 'update-district', NULL, 'NuLL', 0, 0),
('update-license', 1, 'update-license', NULL, 'NuLL', 0, 0),
('update-payment-mode', 1, 'update-payment-mode', NULL, 'NuLL', 0, 0),
('update-postage-rate', 1, 'update-postage-rate', NULL, 'NuLL', 0, 0),
('update-state', 1, 'update-state', NULL, 'NuLL', 0, 0),
('update-sub-department', 1, 'update-sub-department', NULL, 'NuLL', 0, 0),
('update-user', 1, 'gives permission to update users', NULL, NULL, NULL, NULL),
('update-weight', 1, 'update-weight', NULL, 'NuLL', 0, 0),
('upload-credit-note', 1, 'upload-credit-note', NULL, 'NuLL', 0, 0),
('upload-receipt', 1, 'upload-receipt', NULL, 'NuLL', 0, 0),
('view-agency', 1, 'view agency', NULL, 'NuLL', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', 'create-user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` date NOT NULL,
  `no_of_issue` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `commission_cal`
--

CREATE TABLE IF NOT EXISTS `commission_cal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lower_limit` int(11) NOT NULL,
  `upper_limit` int(11) NOT NULL,
  `amt` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `commission_cal`
--

INSERT INTO `commission_cal` (`id`, `lower_limit`, `upper_limit`, `amt`) VALUES
(1, 0, 50, 10.00),
(2, 51, 100, 33.00),
(3, 101, 500, 33.00),
(4, 501, 5000000, 33.00);

-- --------------------------------------------------------

--
-- Table structure for table `magazine_record_book`
--

CREATE TABLE IF NOT EXISTS `magazine_record_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `issue_type` enum('Regular','Special Edition') NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1: bill generated, 0:pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1454562022),
('m130524_201442_init', 1454562025),
('m140506_102106_rbac_init', 1454586532);

-- --------------------------------------------------------

--
-- Table structure for table `ordinary_posted_data`
--

CREATE TABLE IF NOT EXISTS `ordinary_posted_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `tempelate_id` int(11) NOT NULL,
  `wt` varchar(30) NOT NULL,
  `postage` varchar(30) NOT NULL,
  `address_bar` text NOT NULL,
  `sn` varchar(30) NOT NULL,
  `pjy` int(11) NOT NULL,
  `org` int(11) NOT NULL,
  `date` date NOT NULL,
  `ord_id` int(11) NOT NULL,
  `license` text,
  `bundle_size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `ordinary_posted_data`
--

INSERT INTO `ordinary_posted_data` (`id`, `agency_id`, `tempelate_id`, `wt`, `postage`, `address_bar`, `sn`, `pjy`, `org`, `date`, `ord_id`, `license`, `bundle_size`) VALUES
(1, 1, 1, '42', '420', '110121', '1', 100, 500, '2016-04-10', 1, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(2, 4, 1, '38.99', '389.9', '987878', '2', 99, 458, '2016-04-10', 1, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(3, 5, 1, '38.78', '387.8', '111111', '3', 222, 332, '2016-04-10', 1, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(4, 7, 1, '16.38', '163.8', '123133', '4', 123, 111, '2016-04-10', 1, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(5, 7, 1, '16.38', '163.8', '123133', '5', 123, 111, '2016-03-06', 2, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(6, 1, 1, '42', '420', '110121', '6', 100, 500, '2016-03-06', 2, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(7, 5, 1, '38.78', '387.8', '111111', '7', 222, 332, '2016-03-06', 2, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(8, 4, 1, '38.99', '389.9', '987878', '8', 99, 458, '2016-03-06', 2, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(9, 7, 1, '16.38', '163.8', '123133', '9', 123, 111, '2016-03-13', 3, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(10, 1, 1, '42', '420', '110121', '10', 100, 500, '2016-03-13', 3, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(11, 5, 1, '38.78', '387.8', '111111', '11', 222, 332, '2016-03-13', 3, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(12, 4, 1, '38.99', '389.9', '987878', '12', 99, 458, '2016-03-13', 3, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(13, 7, 1, '16.38', '163.8', '123133', '13', 123, 111, '2016-03-20', 4, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(14, 1, 1, '42', '420', '110121', '14', 100, 500, '2016-03-20', 4, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(15, 5, 1, '38.78', '387.8', '111111', '15', 222, 332, '2016-03-20', 4, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(16, 4, 1, '38.99', '389.9', '987878', '16', 99, 458, '2016-03-20', 4, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(17, 7, 1, '16.38', '163.8', '123133', '17', 123, 111, '2016-03-27', 5, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(18, 1, 1, '42', '420', '110121', '18', 100, 500, '2016-03-27', 5, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(19, 5, 1, '38.78', '387.8', '111111', '19', 222, 332, '2016-03-27', 5, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(20, 4, 1, '38.99', '389.9', '987878', '20', 99, 458, '2016-03-27', 5, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(21, 7, 1, '16.38', '163.8', '123133', '21', 123, 111, '2016-04-17', 6, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(22, 1, 1, '42', '420', '110121', '22', 100, 500, '2016-04-17', 6, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(23, 5, 1, '38.78', '387.8', '111111', '23', 222, 332, '2016-04-17', 6, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10),
(24, 4, 1, '38.99', '389.9', '987878', '24', 99, 458, '2016-04-17', 6, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ordinary_post_data`
--

CREATE TABLE IF NOT EXISTS `ordinary_post_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `generated_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ordinary_post_data`
--

INSERT INTO `ordinary_post_data` (`id`, `date`, `time`, `generated_date`) VALUES
(1, '2016-04-10', '09:02:21', '2016-04-06'),
(2, '2016-03-06', '11:07:47', '2016-04-06'),
(3, '2016-03-13', '11:07:53', '2016-04-06'),
(4, '2016-03-20', '11:07:58', '2016-04-06'),
(5, '2016-03-27', '11:08:03', '2016-04-06'),
(6, '2016-04-17', '07:17:08', '2016-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `railway_posted_data`
--

CREATE TABLE IF NOT EXISTS `railway_posted_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) DEFAULT NULL,
  `tempelate_id` int(11) DEFAULT NULL,
  `wt` varchar(50) DEFAULT NULL,
  `postage` varchar(50) DEFAULT NULL,
  `address_bar` varchar(255) DEFAULT NULL,
  `sn` varchar(250) DEFAULT NULL,
  `pjy` varchar(250) DEFAULT NULL,
  `org` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `rail_id` int(11) DEFAULT NULL,
  `train_no` varchar(250) DEFAULT NULL,
  `train_name` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `license` text NOT NULL,
  `bundle_size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `railway_posted_data`
--

INSERT INTO `railway_posted_data` (`id`, `agency_id`, `tempelate_id`, `wt`, `postage`, `address_bar`, `sn`, `pjy`, `org`, `date`, `rail_id`, `train_no`, `train_name`, `source`, `license`, `bundle_size`) VALUES
(1, 8, 1, '93.31', '933.1', '111112', '3', '1222', '111', '2016-04-10', 1, '12469', 'Saheed Express', 'ANVT', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 150),
(2, 3, 1, '101.15', '1011.5', '965874', '4', '989', '456', '2016-04-10', 1, '145156', 'Shiva Express', 'NDLS', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 150),
(3, 8, 1, '93.31', '933.1', '111112', '3', '1222', '111', '2016-03-06', 2, '12469', 'Saheed Express', 'ANVT', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 150),
(4, 3, 1, '101.15', '1011.5', '965874', '4', '989', '456', '2016-03-06', 2, '145156', 'Shiva Express', 'NDLS', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 150),
(5, 8, 1, '93.31', '933.1', '111112', '3', '1222', '111', '2016-03-13', 3, '12469', 'Saheed Express', 'ANVT', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 150),
(6, 3, 1, '101.15', '1011.5', '965874', '4', '989', '456', '2016-03-13', 3, '145156', 'Shiva Express', 'NDLS', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 150),
(7, 8, 1, '93.31', '933.1', '111112', '3', '1222', '111', '2016-03-20', 4, '12469', 'Saheed Express', 'ANVT', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 150),
(8, 3, 1, '101.15', '1011.5', '965874', '4', '989', '456', '2016-03-20', 4, '145156', 'Shiva Express', 'NDLS', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 150),
(9, 8, 1, '93.31', '933.1', '111112', '3', '1222', '111', '2016-03-27', 5, '12469', 'Saheed Express', 'ANVT', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 150),
(10, 3, 1, '101.15', '1011.5', '965874', '4', '989', '456', '2016-03-27', 5, '145156', 'Shiva Express', 'NDLS', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 150);

-- --------------------------------------------------------

--
-- Table structure for table `railway_post_data`
--

CREATE TABLE IF NOT EXISTS `railway_post_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `generated_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `railway_post_data`
--

INSERT INTO `railway_post_data` (`id`, `date`, `time`, `generated_date`) VALUES
(1, '2016-04-10', '10:19:00', '2016-04-06'),
(2, '2016-03-06', '11:07:16', '2016-04-06'),
(3, '2016-03-13', '11:07:25', '2016-04-06'),
(4, '2016-03-20', '11:07:30', '2016-04-06'),
(5, '2016-03-27', '11:07:37', '2016-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `registered_posted_data`
--

CREATE TABLE IF NOT EXISTS `registered_posted_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `tempelate_id` int(11) NOT NULL,
  `wt` varchar(30) NOT NULL,
  `postage` varchar(30) NOT NULL,
  `address_bar` text NOT NULL,
  `sn` varchar(30) NOT NULL,
  `pjy` int(11) NOT NULL,
  `org` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_price` varchar(20) NOT NULL,
  `post_id` int(11) NOT NULL,
  `license` text NOT NULL,
  `bundle_size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `registered_posted_data`
--

INSERT INTO `registered_posted_data` (`id`, `agency_id`, `tempelate_id`, `wt`, `postage`, `address_bar`, `sn`, `pjy`, `org`, `date`, `total_price`, `post_id`, `license`, `bundle_size`) VALUES
(1, 2, 1, '17.5', '175', 'sh shyam agency ,new kolkata street new junction, old delhi railway station', '1', 200, 50, '2016-04-10', '', 1, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 50),
(2, 6, 1, '86.31', '863.1', 'plesk type ,asdasdasd', '2', 1222, 11, '2016-04-10', '', 1, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 50),
(3, 6, 1, '86.31', '863.1', 'plesk type ,asdasdasd', '3', 1222, 11, '2016-03-06', '', 2, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 50),
(4, 2, 1, '17.5', '175', 'sh shyam agency ,new kolkata street new junction, old delhi railway station', '4', 200, 50, '2016-03-06', '', 2, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 50),
(5, 6, 1, '86.31', '863.1', 'plesk type ,asdasdasd', '5', 1222, 11, '2016-03-13', '', 3, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 50),
(6, 2, 1, '17.5', '175', 'sh shyam agency ,new kolkata street new junction, old delhi railway station', '6', 200, 50, '2016-03-13', '', 3, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 50),
(7, 6, 1, '86.31', '863.1', 'plesk type ,asdasdasd', '7', 1222, 11, '2016-03-20', '', 4, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 50),
(8, 2, 1, '17.5', '175', 'sh shyam agency ,new kolkata street new junction, old delhi railway station', '8', 200, 50, '2016-03-20', '', 4, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 50),
(9, 6, 1, '86.31', '863.1', 'plesk type ,asdasdasd', '9', 1222, 11, '2016-03-27', '', 5, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 50),
(10, 2, 1, '17.5', '175', 'sh shyam agency ,new kolkata street new junction, old delhi railway station', '10', 200, 50, '2016-03-27', '', 5, 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77', 50);

-- --------------------------------------------------------

--
-- Table structure for table `registered_post_data`
--

CREATE TABLE IF NOT EXISTS `registered_post_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `generated_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `registered_post_data`
--

INSERT INTO `registered_post_data` (`id`, `date`, `time`, `generated_date`) VALUES
(1, '2016-04-10', '09:02:56', '2016-04-06'),
(2, '2016-03-06', '11:08:13', '2016-04-06'),
(3, '2016-03-13', '11:08:17', '2016-04-06'),
(4, '2016-03-20', '11:08:22', '2016-04-06'),
(5, '2016-03-27', '11:08:27', '2016-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension_no` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` int(3) DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `role_group_id` int(3) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password_hash`, `email`, `mobile`, `extension_no`, `department_id`, `designation_id`, `role_group_id`, `deleted_at`, `status`, `created_at`, `updated_at`, `password_reset_token`, `auth_key`) VALUES
(1, 'Administrator', 'admin', '$2y$13$3yxj61lVqFYRW1C28Pj4T.cbm87Cyl0phYmaH6lGyvnacK1IwTl5a', 'admin@admina.com', NULL, '', 10, 0, 1, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(8, 'Sh. Parmanand Moharaiya', 'param', '$2y$13$JOwpdqVQ2G5ClJqqoKgJ8OSg084Ze9VxNmZD2YHIvrZYTTzQkCg1O', 'param.mohariya@bpdl.in ', '9810198101', '225', 10, 2, 1, NULL, 10, NULL, '2016-03-10 07:11:44', NULL, NULL),
(9, 'Sh. Jitender Mehta', 'jm', '$2y$13$dhLFfyFs4s8bFI.bvRXnK.KpcyxL9ArxfFjb2yH5l59X1fHK0ulpW', 'gm@bpdl.in', '9958801666', '', 10, 3, 1, NULL, 10, NULL, '0000-00-00 00:00:00', NULL, NULL),
(10, 'SH. DINESH KUMAR BHARTI', 'dinesh', '$2y$13$8h3eLFuHX4Yhw/X76LGyxujPa/T1ysgL34b7PLe.qctXBJMZJwOe2', 'dinesh.kumar@bpdl.in', '9958505350', '', 9, 4, 2, NULL, 10, NULL, '0000-00-00 00:00:00', NULL, NULL),
(11, 'SMT. ANJALI SINGH', 'anjali', 'anjali', 'anjali.singh@bpdl.in', '9868116043', '', 9, 5, 2, NULL, 10, NULL, NULL, NULL, NULL),
(12, 'SH. SAURABH TYAGI', 'saurabh', 'saurabh', 'saurabh.tyagi@bpdl.in', '8447729883', '', 9, 6, 2, NULL, 10, NULL, NULL, NULL, NULL),
(13, 'SH.SHASHI PRAKASH', 'shashi', 'shashi', 'shashi.prakasah@bpdl.in', '9958077979', '', 9, 7, 2, NULL, 10, NULL, NULL, NULL, NULL),
(14, 'SH. SOHAN PAL SHARMA', 'sohan', 'sohan', 'sohan.sharma@bpdl.in', '9868481196', '202', 3, 8, 2, NULL, 10, NULL, NULL, NULL, NULL),
(15, 'SH D S MATHUR', 'dsmathu', '$2y$13$dvda5GAsoXoBRhV8Of021.Wg.maGfKq3aDTZJiFJEuF8ubLmeBorO', 'dinesh.mathur@bpdl.in ', '9911172592', '', 3, 9, 2, NULL, 10, NULL, '2016-04-07 08:28:04', NULL, NULL),
(16, 'SH. SUNDER LAL', 'sunder', '$2y$13$l1kwF0/TIBGLB9JDvIDIteKC.qdILE.0BLLugooIAxHR2TlpelL7S', 'sunder.lal@bpdl.in', '9313588321', '', 3, 10, 2, NULL, 10, NULL, '0000-00-00 00:00:00', NULL, NULL),
(17, 'SH. YOGINDER KUMAR', 'yoginder', 'yoginder', 'yoginder@noemail.in', '9717745162', '', 3, 10, 2, NULL, 10, NULL, NULL, NULL, NULL),
(18, 'AJAY', 'ajay', '$2y$13$wJKik0bNNt7sz4B8hTcLGOLub/.bd6kNfNKmtrTaxIot1jU5qBewu', 'ajay@noemail.com', '9212327150', '', 3, 11, 2, NULL, 10, NULL, '2016-04-06 09:38:48', NULL, NULL),
(19, 'VIJAY', 'vijay1', '$2y$13$p8/hEYuwNUBzZ0P2AkRNk.oY45bShmbxPCbGXQ6SG411/zuMQ55jG', 'noemail@co.in', '9810098100', '', 3, 11, 2, NULL, 10, NULL, '0000-00-00 00:00:00', NULL, NULL),
(20, 'JITENDER', 'jitender1', 'jitender1', 'noemail1@ni.in', '7206553193', '', 3, 11, 2, NULL, 10, NULL, NULL, NULL, NULL),
(21, 'SH. RANA PRATAP SINGH', 'ranapratap', 'ranapratap', 'ranapratap.singh@bpdl.in', '9015622625', '', 2, 12, 2, NULL, 10, NULL, NULL, NULL, NULL),
(22, 'SH. UPENDER SINGH', 'upender', 'upender', 'upender.kumar@bpdl.in', '8130830803', '', 2, 12, 2, NULL, 10, NULL, NULL, NULL, NULL),
(23, 'SH. ARVIND KUMAR', 'arvind', '$2y$13$x/jRxQ8otl/IUOIkID2AG.DsimtUO09RziFkEUyounDu4TGOXnS2e', 'arvind.sinha@bpdl.in', '9818778110', '', 2, 13, 2, NULL, 10, NULL, '0000-00-00 00:00:00', NULL, NULL),
(24, 'SH. KARAN SINGH', 'karan', 'karan', 'karan.singh@bpdl.in', '9312698125', '', 2, 12, 2, NULL, 10, NULL, NULL, NULL, NULL),
(25, 'SH SHASHI MOHAN RAWAT', 'shashimohan', 'sashimohan', 'shashim.rawat@bpdl.in', '9717932622', '', 4, 14, 2, NULL, 10, NULL, NULL, NULL, NULL),
(26, 'SH. HEM RAJ GUPTA', 'hemraj', 'hemraj', 'hemraj.gupta@bpdl.in', '9818525527', '', 4, 15, 2, NULL, 10, NULL, NULL, NULL, NULL),
(27, 'SH. PARMOD KUMAR KAUSHIK', 'pramod', 'pramod', 'pramod.kaushik@bpdl.in', '9899256433', '', 4, 16, 2, NULL, 10, NULL, NULL, NULL, NULL),
(28, 'SH. MANOJ KUMAR SINGH', 'manoj', 'manoj', 'manoj.singh@bpdl.in', '8745851318', '', 4, 17, 2, NULL, 10, NULL, NULL, NULL, NULL),
(29, 'SH. HANUMANT CHAND', 'hanumant', 'hanumant', 'hanumant.chand@bpdl.in', '9873401069', '', 4, 18, 2, NULL, 10, NULL, NULL, NULL, NULL),
(30, 'SH. MANGAL SINGH', 'mangal', 'mangal', 'mangal.singh@bpdl.in', '9211310101', '', 4, 19, 2, NULL, 10, NULL, NULL, NULL, NULL),
(31, 'SH. RAJPAL SINGH RAWAT', 'rajpal', 'rajpal', 'rajpal.rawat@bpdl.in', '9871908408', '', 4, 19, 2, NULL, 10, NULL, NULL, NULL, NULL),
(32, 'SH. JANARDHAN SINHA', 'janardan', 'janardan', 'janardan.sinha@bpdl.in', '9868315367', '', 4, 19, 2, NULL, 10, NULL, NULL, NULL, NULL),
(33, 'SH. PARDEEP KUMAR', 'pardeep', 'pardeep', 'pradeep.aggarwal@bpdl.in', '9811941867', '', 7, 20, 2, NULL, 10, NULL, NULL, NULL, NULL),
(34, 'SH. SANJAY ARORA', 'sanjay', 'sanjay', 'sanjay.arora@bpdl.in', '9871195998', '', 7, 21, 2, NULL, 10, NULL, NULL, NULL, NULL),
(35, 'Ms. ISHA', 'isha', 'isha', 'isha.dagar@bpdl.in', '7838502036', '', 5, 24, 2, NULL, 10, NULL, NULL, NULL, NULL),
(36, 'SH. AMRIT AGGARWAL', 'amrit', 'amrit', 'amrit.aggarwal@bpdl.in', '9811593800', '', 6, 22, 2, NULL, 10, NULL, NULL, NULL, NULL),
(37, 'SH. JAGDISH DATTARAY UPASANE', 'jagdish', 'jagdish', 'jagdish.upasane@bpdl.in', '9958077979', '', 8, 23, 2, NULL, 10, NULL, NULL, NULL, NULL),
(38, 'SH. NARENDER SETHI', 'narendra', 'narandra', 'narender.sethi@bpdl.in', '8800996915', '', 8, 25, 4, NULL, 10, NULL, NULL, NULL, NULL),
(39, 'SH. ARUN KUMAR SINHA', 'arun', 'arun', 'arun.sinha@bpdl.in', '9810827333', '', 8, 26, 2, NULL, 10, NULL, NULL, NULL, NULL),
(40, 'SH. BHAGWATI PRASAD BANGWAL', 'bhagwati', 'bhagwati', 'noemail1@co.in', '9811593800', '', 8, 27, 2, NULL, 10, NULL, NULL, NULL, NULL),
(41, 'SH. CHANDER SHEKHAR', 'ch', 'ch', '9958037431', '9958037431', '', 8, 28, 2, NULL, 10, NULL, NULL, NULL, NULL),
(42, 'SH. NARESH KUMAR', 'naresh', 'naresh', '9958875790', '9958875790', '', 8, 28, 2, NULL, 10, NULL, NULL, NULL, NULL),
(43, 'SH. UMMEDU LAL', 'ummedu', 'ummedu', '9654802594', '9654802594', '', 8, 29, 2, NULL, 10, NULL, NULL, NULL, NULL),
(44, 'SH. JAGBEER SINGH NEGI', 'jagbeer', 'jagbeer', '9953301205', '9953301205', '', 8, 30, 2, NULL, 10, NULL, NULL, NULL, NULL),
(45, 'SH. PRAFULLA KETKAR', 'prafulla', 'prafulla', 'editor.organiser@bpdl.in', '9350104343', '', 1, 31, 2, NULL, 10, NULL, NULL, NULL, NULL),
(46, 'SH. NISHANT KUMAR AZAD', 'nishant', 'nishant', 'nishant.organiser@bpdl.in', '8860232237', '', 1, 32, 2, NULL, 10, NULL, NULL, NULL, NULL),
(47, 'SH. ANIKET RAJA', 'aniket', 'aniket', 'aniket.organiser@bpdl.in', '9958061237', '', 1, 33, 2, NULL, 10, NULL, NULL, NULL, NULL),
(48, 'SH. PRAMOD KUMAR SAINI', 'parmodkumar', 'pramodkumar', 'pramod.organiser@bpdl.in', '9818465946', '', 1, 34, 2, NULL, 10, NULL, NULL, NULL, NULL),
(49, 'SH. HITESH SHANKAR', 'hitesh', 'hitesh', 'editor.panchjanya@bpdl.in', '9868461676', '', 1, 35, 2, NULL, 10, NULL, NULL, NULL, NULL),
(50, 'SH. SURYA PRAKASH SEMWAL', 'surya', 'surya', 'suryaprakash.panchjanya@bpdl.in', '9810198102', '', 1, 36, 2, NULL, 10, NULL, NULL, NULL, NULL),
(51, 'SH. ADITYA BHARDWAJ', 'aditya', 'aditya', 'aditya.panchjanya@bpdl.in', '9968183297', '', 1, 33, 2, NULL, 10, NULL, NULL, NULL, NULL),
(52, 'SH. RAHUL SHARMA', 'rahulsharma', 'rahulsharma', 'rahul.panchjanya@bpdl.in', '9810835459', '', 1, 33, 2, NULL, 10, NULL, NULL, NULL, NULL),
(53, 'SH. ASWANI KUMAR MISHRA', 'aswani', 'aswani', 'ashwani.panchjanya@bpdl.in', '9015093657', '', 1, 32, 2, NULL, 10, NULL, NULL, NULL, NULL),
(54, 'SH. ALOK GOSWAMI', 'alok', 'alok', 'alok.panchjanya@bpdl.in', '9810040656', '', 1, 38, 2, NULL, 10, NULL, NULL, NULL, NULL),
(55, 'SH. ARUN KUMAR SINGH', 'aruns', 'aruns', 'aruns.panchjanya@bpdl.in', '9873794585', '', 1, 39, 2, NULL, 10, NULL, NULL, NULL, NULL),
(59, '', 'admin123', '$2y$13$s3UyrsQAq5hLGKWablAeZ.JJB6fAVOAZnmQW7NGexU5k.qY2TgGay', 'admin123@g.com', NULL, NULL, NULL, 0, NULL, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '78yYq6QEnD9yHiNjdTiuvob7TDMWS5QF');

-- --------------------------------------------------------

--
-- Table structure for table `_bundle_size`
--

CREATE TABLE IF NOT EXISTS `_bundle_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_method` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_method` (`delivery_method`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `_bundle_size`
--

INSERT INTO `_bundle_size` (`id`, `delivery_method`, `size`) VALUES
(1, 5, 150),
(2, 2, 50),
(3, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `_country`
--

CREATE TABLE IF NOT EXISTS `_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `name_2` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `_country`
--

INSERT INTO `_country` (`id`, `name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `_delivery_methods`
--

CREATE TABLE IF NOT EXISTS `_delivery_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `_delivery_methods`
--

INSERT INTO `_delivery_methods` (`id`, `name`, `status`) VALUES
(1, 'Ordinary Post', 'Active'),
(2, 'Registered Post', 'Active'),
(3, 'Courier', 'Active'),
(4, 'VPP', 'Active'),
(5, 'Rail', 'Active'),
(6, 'Airmail', 'Active'),
(7, 'Monthly Courier', 'Active'),
(8, 'Self Collection', 'Active'),
(9, 'Delivery Boys', 'Active'),
(10, 'Agent', 'Active'),
(11, 'Others', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `_department`
--

CREATE TABLE IF NOT EXISTS `_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `sub_department` enum('No','Yes') DEFAULT 'No',
  `status` int(11) NOT NULL COMMENT '1: Active/0:Deactive',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_2` (`name`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `_department`
--

INSERT INTO `_department` (`id`, `name`, `sub_department`, `status`) VALUES
(1, 'Editorial', 'Yes', 1),
(2, 'Circulation', 'Yes', 1),
(3, 'Distribution & Dispatch', 'No', 1),
(4, 'Production', 'No', 1),
(5, 'HR', 'No', 1),
(6, 'IT', 'No', 1),
(7, 'Finance', 'No', 1),
(8, 'Operation', 'No', 1),
(9, 'Advertisement', 'No', 1),
(10, 'Administartor', 'No', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_designation`
--

CREATE TABLE IF NOT EXISTS `_designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `designation_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `_designation`
--

INSERT INTO `_designation` (`id`, `department_id`, `designation_name`) VALUES
(2, 10, 'MANAGING DIRECTOR'),
(3, 10, 'GENERAL MANAGER'),
(4, 9, 'MANAGER BUSINESS DEV.'),
(5, 9, 'SENIOR ASSISTANT'),
(6, 9, 'SALES EXECUTIVE'),
(7, 9, 'SALES HEAD'),
(8, 3, 'MANAGER CIR - EXT SALES'),
(9, 3, 'CIRCULATION EXECUTIVE'),
(10, 3, 'HEAD CLERK'),
(11, 3, 'TRAINEE-CIRCULATION'),
(12, 2, 'HEAD CLERK'),
(13, 2, 'SR.COMP.OPERATOR'),
(14, 4, 'ASSO. ART DIRECTOR'),
(15, 4, 'SR. PHOTOGRAPHER'),
(16, 4, 'Asst.Art Director'),
(17, 4, 'DTP OPRATER'),
(18, 4, 'EDITORIAL ASSTT.'),
(19, 4, 'SR. ARTIST'),
(20, 7, 'ACCOUNTANT'),
(21, 7, 'SENIOR ASSISTANT'),
(22, 6, 'WEB CORDINATOR'),
(23, 8, 'GROUP EDITOR'),
(24, 5, 'ASSTT. MANAGER HR & ADMIN'),
(25, 8, 'MANAGER'),
(26, 8, 'COMP. INCHARGE CUM PROG.'),
(27, 8, 'JUNIOR CLERK'),
(28, 8, 'PEON CUM DAFTARI'),
(29, 8, 'SWEEPER CUM PEON'),
(30, 8, 'PEON'),
(31, 1, 'EDITOR ORGANISER'),
(32, 1, 'JR. - SUB EDITOR'),
(33, 1, 'SENIOR CORR.'),
(34, 1, 'TRAINEE-EDITORIAL'),
(35, 1, 'EDITOR PJ'),
(36, 1, 'ASSTT. EDITOR'),
(38, 1, 'ASSOCIATE EDITOR'),
(39, 1, 'SR.SUB-EDITOR');

-- --------------------------------------------------------

--
-- Table structure for table `_district`
--

CREATE TABLE IF NOT EXISTS `_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`,`state_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=672 ;

--
-- Dumping data for table `_district`
--

INSERT INTO `_district` (`id`, `name`, `state_id`) VALUES
(547, 'Adilabad', 32),
(565, 'Agra', 34),
(141, 'Ahmedabad', 12),
(348, 'Ahmednagar', 21),
(403, 'Aizawl', 24),
(478, 'Ajmer', 29),
(349, 'Akola', 21),
(283, 'Alappuzha', 18),
(566, 'Aligarh', 34),
(298, 'Alirajpur', 20),
(567, 'Allahabad', 34),
(640, 'Almora', 35),
(479, 'Alwar', 29),
(174, 'Ambala', 13),
(568, 'Ambedkar Nagar', 34),
(350, 'Amravati', 21),
(142, 'Amreli', 12),
(456, 'Amritsar', 28),
(143, 'Anand', 12),
(4, 'Anantapur', 2),
(207, 'Anantnag', 15),
(422, 'Angul', 26),
(17, 'Anjaw', 3),
(299, 'Anuppur', 20),
(61, 'Araria', 5),
(144, 'Aravalli', 12),
(515, 'Ariyalur', 31),
(62, 'Arwal', 5),
(300, 'Ashoknagar', 20),
(569, 'Auraiya', 34),
(63, 'Aurangabad', 5),
(351, 'Aurangabad', 21),
(570, 'Azamgarh', 34),
(253, 'Bagalkot', 17),
(641, 'Bageshwar', 35),
(571, 'Baghpat', 34),
(572, 'Bahraich', 34),
(34, 'Baksa', 4),
(301, 'Balaghat', 20),
(423, 'Balangir', 26),
(424, 'Balasore', 26),
(573, 'Ballia', 34),
(100, 'Balod', 7),
(101, 'Baloda Bazar', 7),
(102, 'Balrampur', 7),
(574, 'Balrampur', 34),
(145, 'Banaskantha (Palanpur)', 12),
(575, 'Banda', 34),
(208, 'Bandipora', 15),
(254, 'Bangalore Rural', 17),
(255, 'Bangalore Urban', 17),
(64, 'Banka', 5),
(653, 'Bankura', 36),
(480, 'Banswara', 29),
(576, 'Barabanki', 34),
(209, 'Baramulla', 15),
(481, 'Baran', 29),
(577, 'Bareilly', 34),
(425, 'Bargarh', 26),
(482, 'Barmer', 29),
(457, 'Barnala', 28),
(35, 'Barpeta', 4),
(302, 'Barwani', 20),
(103, 'Bastar', 7),
(578, 'Basti', 34),
(458, 'Bathinda', 28),
(352, 'Beed', 21),
(65, 'Begusarai', 5),
(256, 'Belgaum', 17),
(257, 'Bellary', 17),
(104, 'Bemetara', 7),
(303, 'Betul', 20),
(426, 'Bhadrak', 26),
(66, 'Bhagalpur', 5),
(353, 'Bhandara', 21),
(483, 'Bharatpur', 29),
(146, 'Bharuch', 12),
(147, 'Bhavnagar', 12),
(484, 'Bhilwara', 29),
(579, 'Bhim Nagar', 34),
(304, 'Bhind', 20),
(175, 'Bhiwani', 13),
(67, 'Bhojpur', 5),
(305, 'Bhopal', 20),
(258, 'Bidar', 17),
(105, 'Bijapur', 7),
(259, 'Bijapur', 17),
(580, 'Bijnor', 34),
(485, 'Bikaner', 29),
(106, 'Bilaspur', 7),
(195, 'Bilaspur', 14),
(654, 'Birbhum', 36),
(383, 'Bishnupur', 22),
(229, 'Bokaro', 16),
(36, 'Bongaigaon', 4),
(148, 'Botad', 12),
(427, 'Boudh', 26),
(581, 'Budaun', 34),
(210, 'Budgam', 15),
(582, 'Bulandshahr', 34),
(354, 'Buldhana', 21),
(486, 'Bundi', 29),
(655, 'Burdwan (Bardhaman)', 36),
(306, 'Burhanpur', 20),
(68, 'Buxar', 5),
(37, 'Cachar', 4),
(130, 'Central Delhi', 10),
(260, 'Chamarajanagar', 17),
(196, 'Chamba', 14),
(642, 'Chamoli', 35),
(643, 'Champawat', 35),
(404, 'Champhai', 24),
(583, 'Chandauli', 34),
(384, 'Chandel', 22),
(99, 'Chandigarh', 6),
(355, 'Chandrapur', 21),
(18, 'Changlang', 3),
(230, 'Chatra', 16),
(584, 'Chatrapati Sahuji Mahraj Nagar', 34),
(516, 'Chennai', 31),
(307, 'Chhatarpur', 20),
(308, 'Chhindwara', 20),
(149, 'Chhota Udepur', 12),
(261, 'Chickmagalur', 17),
(262, 'Chikballapur', 17),
(38, 'Chirang', 4),
(263, 'Chitradurga', 17),
(585, 'Chitrakoot', 34),
(5, 'Chittoor', 2),
(487, 'Chittorgarh', 29),
(385, 'Churachandpur', 22),
(488, 'Churu', 29),
(517, 'Coimbatore', 31),
(656, 'Cooch Behar', 36),
(518, 'Cuddalore', 31),
(6, 'Cuddapah', 2),
(428, 'Cuttack', 26),
(127, 'Dadra & Nagar Haveli', 8),
(150, 'Dahod', 12),
(657, 'Dakshin Dinajpur (South Dinajpur)', 36),
(264, 'Dakshina Kannada', 17),
(128, 'Daman', 9),
(309, 'Damoh', 20),
(151, 'Dangs (Ahwa)', 12),
(107, 'Dantewada (South Bastar)', 7),
(69, 'Darbhanga', 5),
(658, 'Darjeeling', 36),
(39, 'Darrang', 4),
(310, 'Datia', 20),
(489, 'Dausa', 29),
(265, 'Davangere', 17),
(644, 'Dehradun', 35),
(429, 'Deogarh', 26),
(231, 'Deoghar', 16),
(586, 'Deoria', 34),
(152, 'Devbhoomi Dwarka', 12),
(311, 'Dewas', 20),
(557, 'Dhalai', 33),
(108, 'Dhamtari', 7),
(232, 'Dhanbad', 16),
(312, 'Dhar', 20),
(519, 'Dharmapuri', 31),
(266, 'Dharwad', 17),
(40, 'Dhemaji', 4),
(430, 'Dhenkanal', 26),
(490, 'Dholpur', 29),
(41, 'Dhubri', 4),
(356, 'Dhule', 21),
(19, 'Dibang Valley', 3),
(42, 'Dibrugarh', 4),
(43, 'Dima Hasao', 4),
(411, 'Dimapur', 25),
(520, 'Dindigul', 31),
(313, 'Dindori', 20),
(129, 'Diu', 9),
(211, 'Doda', 15),
(233, 'Dumka', 16),
(491, 'Dungarpur', 29),
(109, 'Durg', 7),
(70, 'East Champaran (Motihari)', 5),
(131, 'East Delhi', 10),
(392, 'East Garo Hills', 23),
(7, 'East Godavari', 2),
(393, 'East Jaintia Hills', 23),
(20, 'East Kameng', 3),
(394, 'East Khasi Hills', 23),
(21, 'East Siang', 3),
(511, 'East Sikkim', 30),
(234, 'East Singhbhum', 16),
(284, 'Ernakulam', 18),
(521, 'Erode', 31),
(587, 'Etah', 34),
(588, 'Etawah', 34),
(589, 'Faizabad', 34),
(176, 'Faridabad', 13),
(459, 'Faridkot', 28),
(590, 'Farrukhabad', 34),
(177, 'Fatehabad', 13),
(460, 'Fatehgarh Sahib', 28),
(591, 'Fatehpur', 34),
(461, 'Fazilka', 28),
(462, 'Ferozepur', 28),
(592, 'Firozabad', 34),
(267, 'Gadag', 17),
(357, 'Gadchiroli', 21),
(431, 'Gajapati', 26),
(212, 'Ganderbal', 15),
(153, 'Gandhinagar', 12),
(432, 'Ganjam', 26),
(235, 'Garhwa', 16),
(110, 'Gariaband', 7),
(593, 'Gautam Buddha Nagar', 34),
(71, 'Gaya', 5),
(594, 'Ghaziabad', 34),
(595, 'Ghazipur', 34),
(154, 'Gir Somnath', 12),
(236, 'Giridih', 16),
(44, 'Goalpara', 4),
(237, 'Godda', 16),
(45, 'Golaghat', 4),
(558, 'Gomati', 33),
(596, 'Gonda', 34),
(358, 'Gondia', 21),
(72, 'Gopalganj', 5),
(597, 'Gorakhpur', 34),
(268, 'Gulbarga', 17),
(238, 'Gumla', 16),
(314, 'Guna', 20),
(8, 'Guntur', 2),
(463, 'Gurdaspur', 28),
(178, 'Gurgaon', 13),
(315, 'Gwalior', 20),
(46, 'Hailakandi', 4),
(197, 'Hamirpur', 14),
(598, 'Hamirpur', 34),
(492, 'Hanumangarh', 29),
(316, 'Harda', 20),
(599, 'Hardoi', 34),
(645, 'Haridwar', 35),
(269, 'Hassan', 17),
(600, 'Hathras', 34),
(270, 'Haveri', 17),
(239, 'Hazaribag', 16),
(359, 'Hingoli', 21),
(179, 'Hisar', 13),
(659, 'Hooghly', 36),
(317, 'Hoshangabad', 20),
(464, 'Hoshiarpur', 28),
(660, 'Howrah', 36),
(548, 'Hyderabad', 32),
(285, 'Idukki', 18),
(386, 'Imphal East', 22),
(387, 'Imphal West', 22),
(318, 'Indore', 20),
(319, 'Jabalpur', 20),
(433, 'Jagatsinghapur', 26),
(493, 'Jaipur', 29),
(494, 'Jaisalmer', 29),
(434, 'Jajpur', 26),
(465, 'Jalandhar', 28),
(601, 'Jalaun', 34),
(360, 'Jalgaon', 21),
(361, 'Jalna', 21),
(495, 'Jalore', 29),
(661, 'Jalpaiguri', 36),
(213, 'Jammu', 15),
(155, 'Jamnagar', 12),
(240, 'Jamtara', 16),
(73, 'Jamui', 5),
(111, 'Janjgir-Champa', 7),
(112, 'Jashpur', 7),
(602, 'Jaunpur', 34),
(74, 'Jehanabad', 5),
(320, 'Jhabua', 20),
(180, 'Jhajjar', 13),
(496, 'Jhalawar', 29),
(603, 'Jhansi', 34),
(435, 'Jharsuguda', 26),
(497, 'Jhunjhunu', 29),
(181, 'Jind', 13),
(498, 'Jodhpur', 29),
(47, 'Jorhat', 4),
(156, 'Junagadh', 12),
(604, 'Jyotiba Phule Nagar (J.P. Nagar)', 34),
(113, 'Kabirdham (Kawardha)', 7),
(157, 'Kachchh', 12),
(75, 'Kaimur (Bhabua)', 5),
(182, 'Kaithal', 13),
(436, 'Kalahandi', 26),
(49, 'Kamrup', 4),
(48, 'Kamrup Metropolitan', 4),
(522, 'Kanchipuram', 31),
(437, 'Kandhamal', 26),
(198, 'Kangra', 14),
(114, 'Kanker (North Bastar)', 7),
(605, 'Kannauj', 34),
(286, 'Kannur', 18),
(606, 'Kanpur Dehat', 34),
(607, 'Kanpur Nagar', 34),
(608, 'Kanshiram Nagar (Kasganj)', 34),
(523, 'Kanyakumari', 31),
(466, 'Kapurthala', 28),
(452, 'Karaikal', 27),
(499, 'Karauli', 29),
(50, 'Karbi Anglong', 4),
(214, 'Kargil', 15),
(51, 'Karimganj', 4),
(549, 'Karimnagar', 32),
(183, 'Karnal', 13),
(524, 'Karur', 31),
(287, 'Kasaragod', 18),
(215, 'Kathua', 15),
(76, 'Katihar', 5),
(321, 'Katni', 20),
(609, 'Kaushambi', 34),
(438, 'Kendrapara', 26),
(439, 'Kendujhar (Keonjhar)', 26),
(77, 'Khagaria', 5),
(550, 'Khammam', 32),
(322, 'Khandwa', 20),
(323, 'Khargone', 20),
(158, 'Kheda (Nadiad)', 12),
(440, 'Khordha', 26),
(559, 'Khowai', 33),
(241, 'Khunti', 16),
(199, 'Kinnaur', 14),
(412, 'Kiphire', 25),
(78, 'Kishanganj', 5),
(216, 'Kishtwar', 15),
(271, 'Kodagu', 17),
(242, 'Koderma', 16),
(413, 'Kohima', 25),
(52, 'Kokrajhar', 4),
(272, 'Kolar', 17),
(405, 'Kolasib', 24),
(362, 'Kolhapur', 21),
(662, 'Kolkata', 36),
(288, 'Kollam', 18),
(115, 'Kondagaon', 7),
(273, 'Koppal', 17),
(441, 'Koraput', 26),
(116, 'Korba', 7),
(117, 'Korea (Koriya)', 7),
(500, 'Kota', 29),
(289, 'Kottayam', 18),
(290, 'Kozhikode', 18),
(9, 'Krishna', 2),
(525, 'Krishnagiri', 31),
(217, 'Kulgam', 15),
(200, 'Kullu', 14),
(218, 'Kupwara', 15),
(10, 'Kurnool', 2),
(184, 'Kurukshetra', 13),
(22, 'Kurung Kumey', 3),
(610, 'Kushinagar (Padrauna)', 34),
(201, 'Lahaul & Spiti', 14),
(53, 'Lakhimpur', 4),
(611, 'Lakhimpur - Kheri', 34),
(79, 'Lakhisarai', 5),
(297, 'Lakshadweep', 19),
(612, 'Lalitpur', 34),
(243, 'Latehar', 16),
(363, 'Latur', 21),
(406, 'Lawngtlai', 24),
(219, 'Leh', 15),
(244, 'Lohardaga', 16),
(23, 'Lohit', 3),
(24, 'Longding', 3),
(414, 'Longleng', 25),
(25, 'Lower Dibang Valley', 3),
(26, 'Lower Subansiri', 3),
(613, 'Lucknow', 34),
(467, 'Ludhiana', 28),
(407, 'Lunglei', 24),
(80, 'Madhepura', 5),
(81, 'Madhubani', 5),
(526, 'Madurai', 31),
(551, 'Mahabubnagar', 32),
(614, 'Maharajganj', 34),
(118, 'Mahasamund', 7),
(453, 'Mahe', 27),
(185, 'Mahendragarh', 13),
(159, 'Mahisagar', 12),
(615, 'Mahoba', 34),
(616, 'Mainpuri', 34),
(291, 'Malappuram', 18),
(663, 'Malda', 36),
(442, 'Malkangiri', 26),
(408, 'Mamit', 24),
(202, 'Mandi', 14),
(324, 'Mandla', 20),
(325, 'Mandsaur', 20),
(274, 'Mandya', 17),
(468, 'Mansa', 28),
(617, 'Mathura', 34),
(618, 'Mau', 34),
(443, 'Mayurbhanj', 26),
(552, 'Medak', 32),
(619, 'Meerut', 34),
(160, 'Mehsana', 12),
(186, 'Mewat', 13),
(620, 'Mirzapur', 34),
(469, 'Moga', 28),
(415, 'Mokokchung', 25),
(416, 'Mon', 25),
(621, 'Moradabad', 34),
(161, 'Morbi', 12),
(326, 'Morena', 20),
(54, 'Morigaon', 4),
(470, 'Muktsar', 28),
(364, 'Mumbai City', 21),
(365, 'Mumbai Suburban', 21),
(119, 'Mungeli', 7),
(82, 'Munger (Monghyr)', 5),
(664, 'Murshidabad', 36),
(622, 'Muzaffarnagar', 34),
(83, 'Muzaffarpur', 5),
(275, 'Mysore', 17),
(444, 'Nabarangpur', 26),
(665, 'Nadia', 36),
(55, 'Nagaon', 4),
(527, 'Nagapattinam', 31),
(501, 'Nagaur', 29),
(366, 'Nagpur', 21),
(646, 'Nainital', 35),
(84, 'Nalanda', 5),
(56, 'Nalbari', 4),
(553, 'Nalgonda', 32),
(528, 'Namakkal', 31),
(367, 'Nanded', 21),
(368, 'Nandurbar', 21),
(120, 'Narayanpur', 7),
(162, 'Narmada (Rajpipla)', 12),
(327, 'Narsinghpur', 20),
(369, 'Nashik', 21),
(163, 'Navsari', 12),
(85, 'Nawada', 5),
(471, 'Nawanshahr', 28),
(445, 'Nayagarh', 26),
(328, 'Neemuch', 20),
(11, 'Nellore', 2),
(132, 'New Delhi', 10),
(1, 'Nicobar', 1),
(529, 'Nilgiris', 31),
(554, 'Nizamabad', 32),
(666, 'North 24 Parganas', 36),
(2, 'North and Middle Andaman', 1),
(133, 'North Delhi', 10),
(134, 'North East Delhi', 10),
(395, 'North Garo Hills', 23),
(139, 'North Goa', 11),
(512, 'North Sikkim', 30),
(560, 'North Tripura', 33),
(135, 'North West Delhi', 10),
(446, 'Nuapada', 26),
(370, 'Osmanabad', 21),
(245, 'Pakur', 16),
(292, 'Palakkad', 18),
(246, 'Palamu', 16),
(502, 'Pali', 29),
(187, 'Palwal', 13),
(188, 'Panchkula', 13),
(164, 'Panchmahal (Godhra)', 12),
(623, 'Panchsheel Nagar', 34),
(189, 'Panipat', 13),
(329, 'Panna', 20),
(27, 'Papum Pare', 3),
(371, 'Parbhani', 21),
(667, 'Paschim Medinipur (West Medinipur)', 36),
(165, 'Patan', 12),
(293, 'Pathanamthitta', 18),
(472, 'Pathankot', 28),
(473, 'Patiala', 28),
(86, 'Patna', 5),
(647, 'Pauri Garhwal', 35),
(530, 'Perambalur', 31),
(417, 'Peren', 25),
(418, 'Phek', 25),
(624, 'Pilibhit', 34),
(648, 'Pithoragarh', 35),
(454, 'Pondicherry', 27),
(220, 'Poonch', 15),
(166, 'Porbandar', 12),
(625, 'Prabuddh Nagar', 34),
(12, 'Prakasam', 2),
(503, 'Pratapgarh', 29),
(626, 'Pratapgarh', 34),
(531, 'Pudukkottai', 31),
(221, 'Pulwama', 15),
(372, 'Pune', 21),
(668, 'Purba Medinipur (East Medinipur)', 36),
(447, 'Puri', 26),
(87, 'Purnia (Purnea)', 5),
(669, 'Purulia', 36),
(627, 'RaeBareli', 34),
(276, 'Raichur', 17),
(373, 'Raigad', 21),
(121, 'Raigarh', 7),
(122, 'Raipur', 7),
(330, 'Raisen', 20),
(331, 'Rajgarh', 20),
(167, 'Rajkot', 12),
(123, 'Rajnandgaon', 7),
(222, 'Rajouri', 15),
(504, 'Rajsamand', 29),
(532, 'Ramanathapuram', 31),
(223, 'Ramban', 15),
(247, 'Ramgarh', 16),
(277, 'Ramnagara', 17),
(628, 'Rampur', 34),
(248, 'Ranchi', 16),
(555, 'Rangareddy', 32),
(332, 'Ratlam', 20),
(374, 'Ratnagiri', 21),
(448, 'Rayagada', 26),
(224, 'Reasi', 15),
(333, 'Rewa', 20),
(190, 'Rewari', 13),
(396, 'Ri Bhoi', 23),
(191, 'Rohtak', 13),
(88, 'Rohtas', 5),
(649, 'Rudraprayag', 35),
(474, 'Rupnagar', 28),
(168, 'Sabarkantha (Himmatnagar)', 12),
(334, 'Sagar', 20),
(629, 'Saharanpur', 34),
(89, 'Saharsa', 5),
(249, 'Sahibganj', 16),
(409, 'Saiha', 24),
(533, 'Salem', 31),
(90, 'Samastipur', 5),
(225, 'Samba', 15),
(449, 'Sambalpur', 26),
(375, 'Sangli', 21),
(475, 'Sangrur', 28),
(630, 'Sant Kabir Nagar', 34),
(631, 'Sant Ravidas Nagar', 34),
(91, 'Saran', 5),
(476, 'SAS Nagar (Mohali)', 28),
(376, 'Satara', 21),
(335, 'Satna', 20),
(505, 'Sawai Madhopur', 29),
(336, 'Sehore', 20),
(388, 'Senapati', 22),
(337, 'Seoni', 20),
(561, 'Sepahijala', 33),
(250, 'Seraikela-Kharsawan', 16),
(410, 'Serchhip', 24),
(338, 'Shahdol', 20),
(632, 'Shahjahanpur', 34),
(339, 'Shajapur', 20),
(92, 'Sheikhpura', 5),
(93, 'Sheohar', 5),
(340, 'Sheopur', 20),
(203, 'Shimla', 14),
(278, 'Shimoga', 17),
(341, 'Shivpuri', 20),
(226, 'Shopian', 15),
(633, 'Shravasti', 34),
(634, 'Siddharth Nagar', 34),
(342, 'Sidhi', 20),
(506, 'Sikar', 29),
(251, 'Simdega', 16),
(377, 'Sindhudurg', 21),
(343, 'Singrauli', 20),
(204, 'Sirmaur (Sirmour)', 14),
(507, 'Sirohi', 29),
(192, 'Sirsa', 13),
(94, 'Sitamarhi', 5),
(635, 'Sitapur', 34),
(534, 'Sivaganga', 31),
(57, 'Sivasagar', 4),
(95, 'Siwan', 5),
(205, 'Solan', 14),
(378, 'Solapur', 21),
(636, 'Sonbhadra', 34),
(450, 'Sonepur', 26),
(193, 'Sonipat', 13),
(58, 'Sonitpur', 4),
(670, 'South 24 Parganas', 36),
(3, 'South Andaman', 1),
(136, 'South Delhi', 10),
(397, 'South Garo Hills', 23),
(140, 'South Goa', 11),
(513, 'South Sikkim', 30),
(562, 'South Tripura', 33),
(137, 'South West Delhi', 10),
(398, 'South West Garo Hills', 23),
(399, 'South West Khasi Hills', 23),
(508, 'Sri Ganganagar', 29),
(13, 'Srikakulam', 2),
(227, 'Srinagar', 15),
(124, 'Sukma', 7),
(637, 'Sultanpur', 34),
(451, 'Sundargarh', 26),
(96, 'Supaul', 5),
(125, 'Surajpur', 7),
(169, 'Surat', 12),
(170, 'Surendranagar', 12),
(126, 'Surguja', 7),
(389, 'Tamenglong', 22),
(171, 'Tapi (Vyara)', 12),
(477, 'Tarn Taran', 28),
(28, 'Tawang', 3),
(650, 'Tehri Garhwal', 35),
(379, 'Thane', 21),
(535, 'Thanjavur', 31),
(536, 'Theni', 31),
(294, 'Thiruvananthapuram', 18),
(537, 'Thoothukudi (Tuticorin)', 31),
(390, 'Thoubal', 22),
(295, 'Thrissur', 18),
(344, 'Tikamgarh', 20),
(59, 'Tinsukia', 4),
(29, 'Tirap', 3),
(538, 'Tiruchirappalli', 31),
(539, 'Tirunelveli', 31),
(540, 'Tiruppur', 31),
(541, 'Tiruvallur', 31),
(542, 'Tiruvannamalai', 31),
(543, 'Tiruvarur', 31),
(509, 'Tonk', 29),
(419, 'Tuensang', 25),
(279, 'Tumkur', 17),
(510, 'Udaipur', 29),
(60, 'Udalguri', 4),
(651, 'Udham Singh Nagar', 35),
(228, 'Udhampur', 15),
(280, 'Udupi', 17),
(345, 'Ujjain', 20),
(391, 'Ukhrul', 22),
(346, 'Umaria', 20),
(206, 'Una', 14),
(563, 'Unakoti', 33),
(638, 'Unnao', 34),
(30, 'Upper Siang', 3),
(31, 'Upper Subansiri', 3),
(671, 'Uttar Dinajpur (North Dinajpur)', 36),
(281, 'Uttara Kannada (Karwar)', 17),
(652, 'Uttarkashi', 35),
(172, 'Vadodara', 12),
(97, 'Vaishali', 5),
(173, 'Valsad', 12),
(639, 'Varanasi', 34),
(544, 'Vellore', 31),
(347, 'Vidisha', 20),
(545, 'Viluppuram', 31),
(546, 'Virudhunagar', 31),
(14, 'Visakhapatnam', 2),
(15, 'Vizianagaram', 2),
(556, 'Warangal', 32),
(380, 'Wardha', 21),
(381, 'Washim', 21),
(296, 'Wayanad', 18),
(98, 'West Champaran', 5),
(138, 'West Delhi', 10),
(400, 'West Garo Hills', 23),
(16, 'West Godavari', 2),
(401, 'West Jaintia Hills', 23),
(32, 'West Kameng', 3),
(402, 'West Khasi Hills', 23),
(33, 'West Siang', 3),
(514, 'West Sikkim', 30),
(252, 'West Singhbhum', 16),
(564, 'West Tripura', 33),
(420, 'Wokha', 25),
(282, 'Yadgir', 17),
(194, 'Yamunanagar', 13),
(455, 'Yanam', 27),
(382, 'Yavatmal', 21),
(421, 'Zunheboto', 25);

-- --------------------------------------------------------

--
-- Table structure for table `_license`
--

CREATE TABLE IF NOT EXISTS `_license` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` enum('PJY','ORG','','') NOT NULL,
  `license` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `_license`
--

INSERT INTO `_license` (`id`, `product_id`, `license`) VALUES
(1, 'PJY', 'PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77'),
(2, 'ORG', 'PRESS PACKET: DL(C)-01/1100/2015-17, lic.pre.pay. U(C) – 86/2015-17, RNI-795/1957');

-- --------------------------------------------------------

--
-- Table structure for table `_payment_mode`
--

CREATE TABLE IF NOT EXISTS `_payment_mode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(110) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `_payment_mode`
--

INSERT INTO `_payment_mode` (`id`, `name`) VALUES
(1, 'PNB ONLINE'),
(2, 'CASH'),
(3, 'MONEY ORDER'),
(4, 'CHEQUE'),
(5, 'DEMAND DRAFT'),
(6, 'OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `_postage_rate`
--

CREATE TABLE IF NOT EXISTS `_postage_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` varchar(10) NOT NULL,
  `delivery_method` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `_postage_rate`
--

INSERT INTO `_postage_rate` (`id`, `rate`, `delivery_method`) VALUES
(1, '10', 2),
(2, '20', 5);

-- --------------------------------------------------------

--
-- Table structure for table `_registered_post`
--

CREATE TABLE IF NOT EXISTS `_registered_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `top_tempelate` text NOT NULL,
  `wt` varchar(30) NOT NULL,
  `postage` varchar(30) NOT NULL,
  `tagline` text NOT NULL,
  `sn_tag` varchar(50) NOT NULL,
  `pjy_name` varchar(50) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `_registered_post`
--

INSERT INTO `_registered_post` (`id`, `top_tempelate`, `wt`, `postage`, `tagline`, `sn_tag`, `pjy_name`, `org_name`) VALUES
(1, 'REGD PCKT: DL(C)-01/1102/2015-17, LIC.#: U(C) – 87/2015-17, RNI-32543/77. Licensed to post w/o prepmt at SRT\nNgr. PO Delhi. Issue Dt: 21/02/16. To be delivered at Window. 1/1 Sanskriti Bhavan, D. B. Gupta Marg,\nJhandewalan, N.D-55. PANCHJANYA', 'Wt', 'Postage', 'REGISTERED', 'S/N', 'PJY', 'ORG');

-- --------------------------------------------------------

--
-- Table structure for table `_role_group`
--

CREATE TABLE IF NOT EXISTS `_role_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1: Active/0:Deactive',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `_role_group`
--

INSERT INTO `_role_group` (`id`, `name`, `status`) VALUES
(1, 'Admin', 1),
(2, 'User', 1),
(3, 'Approver', 1),
(4, 'Manager', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_state`
--

CREATE TABLE IF NOT EXISTS `_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `_state`
--

INSERT INTO `_state` (`id`, `name`, `country_id`) VALUES
(1, 'Andaman and Nicobar Island', 1),
(2, 'Andhra Pradesh', 1),
(3, 'Arunachal Pradesh', 1),
(4, 'Assam', 1),
(5, 'Bihar', 1),
(6, 'Chandigarh', 1),
(7, 'Chhattisgarh', 1),
(8, 'Dadra and Nagar Haveli', 1),
(9, 'Daman and Diu', 1),
(10, 'Delhi', 1),
(11, 'Goa', 1),
(12, 'Gujarat', 1),
(13, 'Haryana', 1),
(14, 'Himachal Pradesh', 1),
(15, 'Jammu and Kashmir', 1),
(16, 'Jharkhand', 1),
(17, 'Karnataka', 1),
(18, 'Kerala', 1),
(19, 'Lakshadweep', 1),
(20, 'Madhya Pradesh', 1),
(21, 'Maharashtra', 1),
(22, 'Manipur', 1),
(23, 'Meghalaya', 1),
(24, 'Mizoram', 1),
(25, 'Nagaland', 1),
(26, 'Odisha', 1),
(27, 'Puducherry', 1),
(28, 'Punjab', 1),
(29, 'Rajasthan', 1),
(30, 'Sikkim', 1),
(31, 'Tamil Nadu', 1),
(32, 'Telangana', 1),
(33, 'Tripura', 1),
(34, 'Uttar Pradesh', 1),
(35, 'Uttarakhand', 1),
(36, 'West Bengal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `_sub_department`
--

CREATE TABLE IF NOT EXISTS `_sub_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `_sub_department`
--

INSERT INTO `_sub_department` (`id`, `name`, `department_id`) VALUES
(1, 'Panchjanya-Print', 1),
(2, 'Organiser-Print', 1),
(3, 'Panchjanya-Digital', 1),
(4, 'Organiser-Digital', 1),
(5, 'Agency', 2),
(6, 'Cluster', 2),
(7, 'Subscription', 2);

-- --------------------------------------------------------

--
-- Table structure for table `_weight`
--

CREATE TABLE IF NOT EXISTS `_weight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `weight` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `_weight`
--

INSERT INTO `_weight` (`id`, `name`, `weight`) VALUES
(1, 'PJY', '0.07'),
(2, 'ORG', '0.07');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agency_bill_book`
--
ALTER TABLE `agency_bill_book`
  ADD CONSTRAINT `agency` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `agency_commission`
--
ALTER TABLE `agency_commission`
  ADD CONSTRAINT `agency_commission_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `agency_copies_records`
--
ALTER TABLE `agency_copies_records`
  ADD CONSTRAINT `agency_copies_records_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `agency_creation_updation_records`
--
ALTER TABLE `agency_creation_updation_records`
  ADD CONSTRAINT `agency_creation_updation_records_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `_designation`
--
ALTER TABLE `_designation`
  ADD CONSTRAINT `_designation_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `_department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `_district`
--
ALTER TABLE `_district`
  ADD CONSTRAINT `_district_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `_state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `_state`
--
ALTER TABLE `_state`
  ADD CONSTRAINT `_state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `_country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `_sub_department`
--
ALTER TABLE `_sub_department`
  ADD CONSTRAINT `_sub_department_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
