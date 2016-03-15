-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `_bundle_size`
-- -------------------------------------------
DROP TABLE IF EXISTS `_bundle_size`;
CREATE TABLE IF NOT EXISTS `_bundle_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_method` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_method` (`delivery_method`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_country`
-- -------------------------------------------
DROP TABLE IF EXISTS `_country`;
CREATE TABLE IF NOT EXISTS `_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `name_2` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_delivery_methods`
-- -------------------------------------------
DROP TABLE IF EXISTS `_delivery_methods`;
CREATE TABLE IF NOT EXISTS `_delivery_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_department`
-- -------------------------------------------
DROP TABLE IF EXISTS `_department`;
CREATE TABLE IF NOT EXISTS `_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `sub_department` enum('No','Yes') DEFAULT 'No',
  `status` int(11) NOT NULL COMMENT '1: Active/0:Deactive',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_2` (`name`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_designation`
-- -------------------------------------------
DROP TABLE IF EXISTS `_designation`;
CREATE TABLE IF NOT EXISTS `_designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `designation_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `_designation_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `_department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_district`
-- -------------------------------------------
DROP TABLE IF EXISTS `_district`;
CREATE TABLE IF NOT EXISTS `_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`,`state_id`),
  KEY `state_id` (`state_id`),
  CONSTRAINT `_district_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `_state` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_license`
-- -------------------------------------------
DROP TABLE IF EXISTS `_license`;
CREATE TABLE IF NOT EXISTS `_license` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` enum('PJY','ORG','','') NOT NULL,
  `license` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_payment_mode`
-- -------------------------------------------
DROP TABLE IF EXISTS `_payment_mode`;
CREATE TABLE IF NOT EXISTS `_payment_mode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(110) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_postage_rate`
-- -------------------------------------------
DROP TABLE IF EXISTS `_postage_rate`;
CREATE TABLE IF NOT EXISTS `_postage_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` varchar(10) NOT NULL,
  `delivery_method` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_registered_post`
-- -------------------------------------------
DROP TABLE IF EXISTS `_registered_post`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_role_group`
-- -------------------------------------------
DROP TABLE IF EXISTS `_role_group`;
CREATE TABLE IF NOT EXISTS `_role_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1: Active/0:Deactive',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_state`
-- -------------------------------------------
DROP TABLE IF EXISTS `_state`;
CREATE TABLE IF NOT EXISTS `_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `_state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `_country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_sub_department`
-- -------------------------------------------
DROP TABLE IF EXISTS `_sub_department`;
CREATE TABLE IF NOT EXISTS `_sub_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `_sub_department_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `_weight`
-- -------------------------------------------
DROP TABLE IF EXISTS `_weight`;
CREATE TABLE IF NOT EXISTS `_weight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `weight` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `agency`
-- -------------------------------------------
DROP TABLE IF EXISTS `agency`;
CREATE TABLE IF NOT EXISTS `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `account_id` varchar(110) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL COMMENT 'delivery methods',
  `vehicle_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `agency_bill_book`
-- -------------------------------------------
DROP TABLE IF EXISTS `agency_bill_book`;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `agency_commission`
-- -------------------------------------------
DROP TABLE IF EXISTS `agency_commission`;
CREATE TABLE IF NOT EXISTS `agency_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`),
  CONSTRAINT `agency_commission_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `agency_copies_records`
-- -------------------------------------------
DROP TABLE IF EXISTS `agency_copies_records`;
CREATE TABLE IF NOT EXISTS `agency_copies_records` (
  `agency_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `pachjanya` int(11) NOT NULL,
  `organiser` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `agency_id` (`agency_id`),
  CONSTRAINT `agency_copies_records_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `agency_creation_updation_records`
-- -------------------------------------------
DROP TABLE IF EXISTS `agency_creation_updation_records`;
CREATE TABLE IF NOT EXISTS `agency_creation_updation_records` (
  `agency_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:for new; 1:for updated',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`),
  CONSTRAINT `agency_creation_updation_records_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agency` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `agency_credit_note`
-- -------------------------------------------
DROP TABLE IF EXISTS `agency_credit_note`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `agency_receipt`
-- -------------------------------------------
DROP TABLE IF EXISTS `agency_receipt`;
CREATE TABLE IF NOT EXISTS `agency_receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `rcpt_date` date NOT NULL,
  `cr_amt` decimal(10,0) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_on` date NOT NULL,
  `created_on_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `agency_security_amt`
-- -------------------------------------------
DROP TABLE IF EXISTS `agency_security_amt`;
CREATE TABLE IF NOT EXISTS `agency_security_amt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agency_id` (`agency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `auth_assignment`
-- -------------------------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `auth_item`
-- -------------------------------------------
DROP TABLE IF EXISTS `auth_item`;
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
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `auth_item_child`
-- -------------------------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `auth_rule`
-- -------------------------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `commission_cal`
-- -------------------------------------------
DROP TABLE IF EXISTS `commission_cal`;
CREATE TABLE IF NOT EXISTS `commission_cal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lower_limit` int(11) NOT NULL,
  `upper_limit` int(11) NOT NULL,
  `amt` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `magazine_record_book`
-- -------------------------------------------
DROP TABLE IF EXISTS `magazine_record_book`;
CREATE TABLE IF NOT EXISTS `magazine_record_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `issue_type` enum('Regular','Special Edition') NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1: bill generated, 0:pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `migration`
-- -------------------------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ordinary_post_data`
-- -------------------------------------------
DROP TABLE IF EXISTS `ordinary_post_data`;
CREATE TABLE IF NOT EXISTS `ordinary_post_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `generated_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ordinary_posted_data`
-- -------------------------------------------
DROP TABLE IF EXISTS `ordinary_posted_data`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `railway_post_data`
-- -------------------------------------------
DROP TABLE IF EXISTS `railway_post_data`;
CREATE TABLE IF NOT EXISTS `railway_post_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `generated_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `railway_posted_data`
-- -------------------------------------------
DROP TABLE IF EXISTS `railway_posted_data`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `registered_post_data`
-- -------------------------------------------
DROP TABLE IF EXISTS `registered_post_data`;
CREATE TABLE IF NOT EXISTS `registered_post_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `generated_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `registered_posted_data`
-- -------------------------------------------
DROP TABLE IF EXISTS `registered_posted_data`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `user`
-- -------------------------------------------
DROP TABLE IF EXISTS `user`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE DATA _bundle_size
-- -------------------------------------------
INSERT INTO `_bundle_size` (`id`,`delivery_method`,`size`) VALUES
('1','5','150');
INSERT INTO `_bundle_size` (`id`,`delivery_method`,`size`) VALUES
('2','2','50');
INSERT INTO `_bundle_size` (`id`,`delivery_method`,`size`) VALUES
('3','1','10');



-- -------------------------------------------
-- TABLE DATA _country
-- -------------------------------------------
INSERT INTO `_country` (`id`,`name`) VALUES
('1','India');



-- -------------------------------------------
-- TABLE DATA _delivery_methods
-- -------------------------------------------
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('1','Ordinary Post','Active');
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('2','Registered Post','Active');
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('3','Courier','Active');
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('4','VPP','Active');
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('5','Rail','Active');
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('6','Airmail','Active');
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('7','Monthly Courier','Active');
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('8','Self Collection','Active');
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('9','Delivery Boys','Active');
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('10','Via Agent','Active');
INSERT INTO `_delivery_methods` (`id`,`name`,`status`) VALUES
('11','Others','Active');



-- -------------------------------------------
-- TABLE DATA _department
-- -------------------------------------------
INSERT INTO `_department` (`id`,`name`,`sub_department`,`status`) VALUES
('1','Editorial','Yes','1');
INSERT INTO `_department` (`id`,`name`,`sub_department`,`status`) VALUES
('2','Circulation','Yes','1');
INSERT INTO `_department` (`id`,`name`,`sub_department`,`status`) VALUES
('3','Distribution & Dispatch','No','1');
INSERT INTO `_department` (`id`,`name`,`sub_department`,`status`) VALUES
('4','Production','No','1');
INSERT INTO `_department` (`id`,`name`,`sub_department`,`status`) VALUES
('5','HR','No','1');
INSERT INTO `_department` (`id`,`name`,`sub_department`,`status`) VALUES
('6','IT','No','1');
INSERT INTO `_department` (`id`,`name`,`sub_department`,`status`) VALUES
('7','Finance','No','1');
INSERT INTO `_department` (`id`,`name`,`sub_department`,`status`) VALUES
('8','Operation','No','1');
INSERT INTO `_department` (`id`,`name`,`sub_department`,`status`) VALUES
('9','Advertisement','No','1');
INSERT INTO `_department` (`id`,`name`,`sub_department`,`status`) VALUES
('10','Administartor','No','1');



-- -------------------------------------------
-- TABLE DATA _designation
-- -------------------------------------------
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('2','10','MANAGING DIRECTOR');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('3','10','GENERAL MANAGER');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('4','9','MANAGER BUSINESS DEV.');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('5','9','SENIOR ASSISTANT');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('6','9','SALES EXECUTIVE');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('7','9','SALES HEAD');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('8','3','MANAGER CIR - EXT SALES');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('9','3','CIRCULATION EXECUTIVE');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('10','3','HEAD CLERK');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('11','3','TRAINEE-CIRCULATION');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('12','2','HEAD CLERK');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('13','2','SR.COMP.OPERATOR');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('14','4','ASSO. ART DIRECTOR');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('15','4','SR. PHOTOGRAPHER');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('16','4','Asst.Art Director');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('17','4','DTP OPRATER');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('18','4','EDITORIAL ASSTT.');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('19','4','SR. ARTIST');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('20','7','ACCOUNTANT');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('21','7','SENIOR ASSISTANT');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('22','6','WEB CORDINATOR');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('23','8','GROUP EDITOR');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('24','5','ASSTT. MANAGER HR & ADMIN');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('25','8','MANAGER');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('26','8','COMP. INCHARGE CUM PROG.');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('27','8','JUNIOR CLERK');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('28','8','PEON CUM DAFTARI');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('29','8','SWEEPER CUM PEON');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('30','8','PEON');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('31','1','EDITOR ORGANISER');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('32','1','JR. - SUB EDITOR');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('33','1','SENIOR CORR.');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('34','1','TRAINEE-EDITORIAL');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('35','1','EDITOR PJ');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('36','1','ASSTT. EDITOR');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('38','1','ASSOCIATE EDITOR');
INSERT INTO `_designation` (`id`,`department_id`,`designation_name`) VALUES
('39','1','SR.SUB-EDITOR');



-- -------------------------------------------
-- TABLE DATA _district
-- -------------------------------------------
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('547','Adilabad','32');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('565','Agra','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('141','Ahmedabad','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('348','Ahmednagar','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('403','Aizawl','24');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('478','Ajmer','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('349','Akola','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('283','Alappuzha','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('566','Aligarh','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('298','Alirajpur','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('567','Allahabad','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('640','Almora','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('479','Alwar','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('174','Ambala','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('568','Ambedkar Nagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('350','Amravati','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('142','Amreli','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('456','Amritsar','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('143','Anand','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('4','Anantapur','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('207','Anantnag','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('422','Angul','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('17','Anjaw','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('299','Anuppur','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('61','Araria','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('144','Aravalli','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('515','Ariyalur','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('62','Arwal','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('300','Ashoknagar','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('569','Auraiya','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('63','Aurangabad','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('351','Aurangabad','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('570','Azamgarh','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('253','Bagalkot','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('641','Bageshwar','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('571','Baghpat','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('572','Bahraich','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('34','Baksa','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('301','Balaghat','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('423','Balangir','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('424','Balasore','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('573','Ballia','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('100','Balod','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('101','Baloda Bazar','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('102','Balrampur','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('574','Balrampur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('145','Banaskantha (Palanpur)','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('575','Banda','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('208','Bandipora','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('254','Bangalore Rural','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('255','Bangalore Urban','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('64','Banka','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('653','Bankura','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('480','Banswara','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('576','Barabanki','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('209','Baramulla','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('481','Baran','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('577','Bareilly','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('425','Bargarh','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('482','Barmer','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('457','Barnala','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('35','Barpeta','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('302','Barwani','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('103','Bastar','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('578','Basti','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('458','Bathinda','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('352','Beed','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('65','Begusarai','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('256','Belgaum','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('257','Bellary','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('104','Bemetara','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('303','Betul','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('426','Bhadrak','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('66','Bhagalpur','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('353','Bhandara','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('483','Bharatpur','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('146','Bharuch','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('147','Bhavnagar','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('484','Bhilwara','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('579','Bhim Nagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('304','Bhind','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('175','Bhiwani','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('67','Bhojpur','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('305','Bhopal','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('258','Bidar','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('105','Bijapur','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('259','Bijapur','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('580','Bijnor','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('485','Bikaner','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('106','Bilaspur','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('195','Bilaspur','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('654','Birbhum','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('383','Bishnupur','22');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('229','Bokaro','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('36','Bongaigaon','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('148','Botad','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('427','Boudh','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('581','Budaun','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('210','Budgam','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('582','Bulandshahr','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('354','Buldhana','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('486','Bundi','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('655','Burdwan (Bardhaman)','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('306','Burhanpur','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('68','Buxar','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('37','Cachar','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('130','Central Delhi','10');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('260','Chamarajanagar','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('196','Chamba','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('642','Chamoli','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('643','Champawat','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('404','Champhai','24');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('583','Chandauli','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('384','Chandel','22');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('99','Chandigarh','6');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('355','Chandrapur','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('18','Changlang','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('230','Chatra','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('584','Chatrapati Sahuji Mahraj Nagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('516','Chennai','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('307','Chhatarpur','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('308','Chhindwara','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('149','Chhota Udepur','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('261','Chickmagalur','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('262','Chikballapur','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('38','Chirang','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('263','Chitradurga','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('585','Chitrakoot','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('5','Chittoor','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('487','Chittorgarh','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('385','Churachandpur','22');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('488','Churu','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('517','Coimbatore','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('656','Cooch Behar','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('518','Cuddalore','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('6','Cuddapah','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('428','Cuttack','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('127','Dadra & Nagar Haveli','8');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('150','Dahod','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('657','Dakshin Dinajpur (South Dinajpur)','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('264','Dakshina Kannada','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('128','Daman','9');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('309','Damoh','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('151','Dangs (Ahwa)','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('107','Dantewada (South Bastar)','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('69','Darbhanga','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('658','Darjeeling','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('39','Darrang','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('310','Datia','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('489','Dausa','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('265','Davangere','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('644','Dehradun','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('429','Deogarh','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('231','Deoghar','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('586','Deoria','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('152','Devbhoomi Dwarka','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('311','Dewas','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('557','Dhalai','33');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('108','Dhamtari','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('232','Dhanbad','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('312','Dhar','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('519','Dharmapuri','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('266','Dharwad','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('40','Dhemaji','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('430','Dhenkanal','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('490','Dholpur','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('41','Dhubri','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('356','Dhule','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('19','Dibang Valley','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('42','Dibrugarh','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('43','Dima Hasao','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('411','Dimapur','25');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('520','Dindigul','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('313','Dindori','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('129','Diu','9');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('211','Doda','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('233','Dumka','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('491','Dungarpur','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('109','Durg','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('70','East Champaran (Motihari)','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('131','East Delhi','10');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('392','East Garo Hills','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('7','East Godavari','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('393','East Jaintia Hills','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('20','East Kameng','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('394','East Khasi Hills','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('21','East Siang','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('511','East Sikkim','30');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('234','East Singhbhum','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('284','Ernakulam','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('521','Erode','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('587','Etah','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('588','Etawah','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('589','Faizabad','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('176','Faridabad','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('459','Faridkot','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('590','Farrukhabad','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('177','Fatehabad','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('460','Fatehgarh Sahib','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('591','Fatehpur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('461','Fazilka','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('462','Ferozepur','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('592','Firozabad','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('267','Gadag','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('357','Gadchiroli','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('431','Gajapati','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('212','Ganderbal','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('153','Gandhinagar','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('432','Ganjam','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('235','Garhwa','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('110','Gariaband','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('593','Gautam Buddha Nagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('71','Gaya','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('594','Ghaziabad','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('595','Ghazipur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('154','Gir Somnath','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('236','Giridih','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('44','Goalpara','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('237','Godda','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('45','Golaghat','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('558','Gomati','33');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('596','Gonda','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('358','Gondia','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('72','Gopalganj','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('597','Gorakhpur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('268','Gulbarga','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('238','Gumla','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('314','Guna','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('8','Guntur','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('463','Gurdaspur','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('178','Gurgaon','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('315','Gwalior','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('46','Hailakandi','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('197','Hamirpur','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('598','Hamirpur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('492','Hanumangarh','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('316','Harda','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('599','Hardoi','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('645','Haridwar','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('269','Hassan','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('600','Hathras','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('270','Haveri','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('239','Hazaribag','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('359','Hingoli','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('179','Hisar','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('659','Hooghly','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('317','Hoshangabad','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('464','Hoshiarpur','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('660','Howrah','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('548','Hyderabad','32');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('285','Idukki','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('386','Imphal East','22');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('387','Imphal West','22');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('318','Indore','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('319','Jabalpur','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('433','Jagatsinghapur','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('493','Jaipur','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('494','Jaisalmer','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('434','Jajpur','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('465','Jalandhar','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('601','Jalaun','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('360','Jalgaon','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('361','Jalna','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('495','Jalore','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('661','Jalpaiguri','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('213','Jammu','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('155','Jamnagar','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('240','Jamtara','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('73','Jamui','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('111','Janjgir-Champa','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('112','Jashpur','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('602','Jaunpur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('74','Jehanabad','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('320','Jhabua','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('180','Jhajjar','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('496','Jhalawar','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('603','Jhansi','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('435','Jharsuguda','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('497','Jhunjhunu','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('181','Jind','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('498','Jodhpur','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('47','Jorhat','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('156','Junagadh','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('604','Jyotiba Phule Nagar (J.P. Nagar)','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('113','Kabirdham (Kawardha)','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('157','Kachchh','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('75','Kaimur (Bhabua)','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('182','Kaithal','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('436','Kalahandi','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('49','Kamrup','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('48','Kamrup Metropolitan','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('522','Kanchipuram','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('437','Kandhamal','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('198','Kangra','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('114','Kanker (North Bastar)','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('605','Kannauj','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('286','Kannur','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('606','Kanpur Dehat','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('607','Kanpur Nagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('608','Kanshiram Nagar (Kasganj)','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('523','Kanyakumari','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('466','Kapurthala','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('452','Karaikal','27');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('499','Karauli','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('50','Karbi Anglong','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('214','Kargil','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('51','Karimganj','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('549','Karimnagar','32');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('183','Karnal','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('524','Karur','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('287','Kasaragod','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('215','Kathua','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('76','Katihar','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('321','Katni','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('609','Kaushambi','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('438','Kendrapara','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('439','Kendujhar (Keonjhar)','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('77','Khagaria','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('550','Khammam','32');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('322','Khandwa','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('323','Khargone','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('158','Kheda (Nadiad)','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('440','Khordha','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('559','Khowai','33');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('241','Khunti','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('199','Kinnaur','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('412','Kiphire','25');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('78','Kishanganj','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('216','Kishtwar','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('271','Kodagu','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('242','Koderma','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('413','Kohima','25');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('52','Kokrajhar','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('272','Kolar','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('405','Kolasib','24');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('362','Kolhapur','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('662','Kolkata','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('288','Kollam','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('115','Kondagaon','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('273','Koppal','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('441','Koraput','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('116','Korba','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('117','Korea (Koriya)','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('500','Kota','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('289','Kottayam','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('290','Kozhikode','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('9','Krishna','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('525','Krishnagiri','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('217','Kulgam','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('200','Kullu','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('218','Kupwara','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('10','Kurnool','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('184','Kurukshetra','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('22','Kurung Kumey','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('610','Kushinagar (Padrauna)','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('201','Lahaul & Spiti','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('53','Lakhimpur','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('611','Lakhimpur - Kheri','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('79','Lakhisarai','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('297','Lakshadweep','19');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('612','Lalitpur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('243','Latehar','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('363','Latur','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('406','Lawngtlai','24');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('219','Leh','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('244','Lohardaga','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('23','Lohit','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('24','Longding','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('414','Longleng','25');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('25','Lower Dibang Valley','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('26','Lower Subansiri','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('613','Lucknow','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('467','Ludhiana','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('407','Lunglei','24');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('80','Madhepura','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('81','Madhubani','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('526','Madurai','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('551','Mahabubnagar','32');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('614','Maharajganj','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('118','Mahasamund','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('453','Mahe','27');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('185','Mahendragarh','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('159','Mahisagar','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('615','Mahoba','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('616','Mainpuri','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('291','Malappuram','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('663','Malda','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('442','Malkangiri','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('408','Mamit','24');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('202','Mandi','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('324','Mandla','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('325','Mandsaur','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('274','Mandya','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('468','Mansa','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('617','Mathura','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('618','Mau','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('443','Mayurbhanj','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('552','Medak','32');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('619','Meerut','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('160','Mehsana','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('186','Mewat','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('620','Mirzapur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('469','Moga','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('415','Mokokchung','25');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('416','Mon','25');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('621','Moradabad','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('161','Morbi','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('326','Morena','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('54','Morigaon','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('470','Muktsar','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('364','Mumbai City','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('365','Mumbai Suburban','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('119','Mungeli','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('82','Munger (Monghyr)','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('664','Murshidabad','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('622','Muzaffarnagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('83','Muzaffarpur','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('275','Mysore','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('444','Nabarangpur','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('665','Nadia','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('55','Nagaon','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('527','Nagapattinam','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('501','Nagaur','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('366','Nagpur','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('646','Nainital','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('84','Nalanda','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('56','Nalbari','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('553','Nalgonda','32');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('528','Namakkal','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('367','Nanded','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('368','Nandurbar','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('120','Narayanpur','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('162','Narmada (Rajpipla)','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('327','Narsinghpur','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('369','Nashik','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('163','Navsari','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('85','Nawada','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('471','Nawanshahr','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('445','Nayagarh','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('328','Neemuch','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('11','Nellore','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('132','New Delhi','10');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('1','Nicobar','1');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('529','Nilgiris','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('554','Nizamabad','32');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('666','North 24 Parganas','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('2','North and Middle Andaman','1');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('133','North Delhi','10');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('134','North East Delhi','10');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('395','North Garo Hills','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('139','North Goa','11');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('512','North Sikkim','30');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('560','North Tripura','33');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('135','North West Delhi','10');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('446','Nuapada','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('370','Osmanabad','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('245','Pakur','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('292','Palakkad','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('246','Palamu','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('502','Pali','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('187','Palwal','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('188','Panchkula','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('164','Panchmahal (Godhra)','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('623','Panchsheel Nagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('189','Panipat','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('329','Panna','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('27','Papum Pare','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('371','Parbhani','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('667','Paschim Medinipur (West Medinipur)','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('165','Patan','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('293','Pathanamthitta','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('472','Pathankot','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('473','Patiala','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('86','Patna','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('647','Pauri Garhwal','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('530','Perambalur','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('417','Peren','25');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('418','Phek','25');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('624','Pilibhit','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('648','Pithoragarh','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('454','Pondicherry','27');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('220','Poonch','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('166','Porbandar','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('625','Prabuddh Nagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('12','Prakasam','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('503','Pratapgarh','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('626','Pratapgarh','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('531','Pudukkottai','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('221','Pulwama','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('372','Pune','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('668','Purba Medinipur (East Medinipur)','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('447','Puri','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('87','Purnia (Purnea)','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('669','Purulia','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('627','RaeBareli','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('276','Raichur','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('373','Raigad','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('121','Raigarh','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('122','Raipur','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('330','Raisen','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('331','Rajgarh','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('167','Rajkot','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('123','Rajnandgaon','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('222','Rajouri','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('504','Rajsamand','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('532','Ramanathapuram','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('223','Ramban','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('247','Ramgarh','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('277','Ramnagara','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('628','Rampur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('248','Ranchi','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('555','Rangareddy','32');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('332','Ratlam','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('374','Ratnagiri','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('448','Rayagada','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('224','Reasi','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('333','Rewa','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('190','Rewari','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('396','Ri Bhoi','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('191','Rohtak','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('88','Rohtas','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('649','Rudraprayag','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('474','Rupnagar','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('168','Sabarkantha (Himmatnagar)','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('334','Sagar','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('629','Saharanpur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('89','Saharsa','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('249','Sahibganj','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('409','Saiha','24');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('533','Salem','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('90','Samastipur','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('225','Samba','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('449','Sambalpur','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('375','Sangli','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('475','Sangrur','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('630','Sant Kabir Nagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('631','Sant Ravidas Nagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('91','Saran','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('476','SAS Nagar (Mohali)','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('376','Satara','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('335','Satna','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('505','Sawai Madhopur','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('336','Sehore','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('388','Senapati','22');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('337','Seoni','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('561','Sepahijala','33');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('250','Seraikela-Kharsawan','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('410','Serchhip','24');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('338','Shahdol','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('632','Shahjahanpur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('339','Shajapur','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('92','Sheikhpura','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('93','Sheohar','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('340','Sheopur','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('203','Shimla','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('278','Shimoga','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('341','Shivpuri','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('226','Shopian','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('633','Shravasti','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('634','Siddharth Nagar','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('342','Sidhi','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('506','Sikar','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('251','Simdega','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('377','Sindhudurg','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('343','Singrauli','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('204','Sirmaur (Sirmour)','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('507','Sirohi','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('192','Sirsa','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('94','Sitamarhi','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('635','Sitapur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('534','Sivaganga','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('57','Sivasagar','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('95','Siwan','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('205','Solan','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('378','Solapur','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('636','Sonbhadra','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('450','Sonepur','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('193','Sonipat','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('58','Sonitpur','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('670','South 24 Parganas','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('3','South Andaman','1');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('136','South Delhi','10');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('397','South Garo Hills','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('140','South Goa','11');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('513','South Sikkim','30');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('562','South Tripura','33');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('137','South West Delhi','10');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('398','South West Garo Hills','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('399','South West Khasi Hills','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('508','Sri Ganganagar','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('13','Srikakulam','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('227','Srinagar','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('124','Sukma','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('637','Sultanpur','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('451','Sundargarh','26');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('96','Supaul','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('125','Surajpur','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('169','Surat','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('170','Surendranagar','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('126','Surguja','7');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('389','Tamenglong','22');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('171','Tapi (Vyara)','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('477','Tarn Taran','28');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('28','Tawang','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('650','Tehri Garhwal','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('379','Thane','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('535','Thanjavur','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('536','Theni','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('294','Thiruvananthapuram','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('537','Thoothukudi (Tuticorin)','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('390','Thoubal','22');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('295','Thrissur','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('344','Tikamgarh','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('59','Tinsukia','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('29','Tirap','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('538','Tiruchirappalli','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('539','Tirunelveli','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('540','Tiruppur','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('541','Tiruvallur','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('542','Tiruvannamalai','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('543','Tiruvarur','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('509','Tonk','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('419','Tuensang','25');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('279','Tumkur','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('510','Udaipur','29');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('60','Udalguri','4');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('651','Udham Singh Nagar','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('228','Udhampur','15');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('280','Udupi','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('345','Ujjain','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('391','Ukhrul','22');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('346','Umaria','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('206','Una','14');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('563','Unakoti','33');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('638','Unnao','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('30','Upper Siang','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('31','Upper Subansiri','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('671','Uttar Dinajpur (North Dinajpur)','36');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('281','Uttara Kannada (Karwar)','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('652','Uttarkashi','35');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('172','Vadodara','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('97','Vaishali','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('173','Valsad','12');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('639','Varanasi','34');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('544','Vellore','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('347','Vidisha','20');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('545','Viluppuram','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('546','Virudhunagar','31');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('14','Visakhapatnam','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('15','Vizianagaram','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('556','Warangal','32');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('380','Wardha','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('381','Washim','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('296','Wayanad','18');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('98','West Champaran','5');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('138','West Delhi','10');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('400','West Garo Hills','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('16','West Godavari','2');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('401','West Jaintia Hills','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('32','West Kameng','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('402','West Khasi Hills','23');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('33','West Siang','3');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('514','West Sikkim','30');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('252','West Singhbhum','16');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('564','West Tripura','33');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('420','Wokha','25');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('282','Yadgir','17');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('194','Yamunanagar','13');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('455','Yanam','27');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('382','Yavatmal','21');
INSERT INTO `_district` (`id`,`name`,`state_id`) VALUES
('421','Zunheboto','25');



-- -------------------------------------------
-- TABLE DATA _license
-- -------------------------------------------
INSERT INTO `_license` (`id`,`product_id`,`license`) VALUES
('1','PJY','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77');
INSERT INTO `_license` (`id`,`product_id`,`license`) VALUES
('2','ORG','PRESS PACKET: DL(C)-01/1100/2015-17, lic.pre.pay. U(C) – 86/2015-17, RNI-795/1957');



-- -------------------------------------------
-- TABLE DATA _payment_mode
-- -------------------------------------------
INSERT INTO `_payment_mode` (`id`,`name`) VALUES
('1','PNB Online');
INSERT INTO `_payment_mode` (`id`,`name`) VALUES
('2','By Cash');
INSERT INTO `_payment_mode` (`id`,`name`) VALUES
('3','By Money Order');
INSERT INTO `_payment_mode` (`id`,`name`) VALUES
('4','By Cash');



-- -------------------------------------------
-- TABLE DATA _postage_rate
-- -------------------------------------------
INSERT INTO `_postage_rate` (`id`,`rate`,`delivery_method`) VALUES
('1','10','2');
INSERT INTO `_postage_rate` (`id`,`rate`,`delivery_method`) VALUES
('2','20','5');



-- -------------------------------------------
-- TABLE DATA _registered_post
-- -------------------------------------------
INSERT INTO `_registered_post` (`id`,`top_tempelate`,`wt`,`postage`,`tagline`,`sn_tag`,`pjy_name`,`org_name`) VALUES
('1','REGD PCKT: DL(C)-01/1102/2015-17, LIC.#: U(C) – 87/2015-17, RNI-32543/77. Licensed to post w/o prepmt at SRT
Ngr. PO Delhi. Issue Dt: 21/02/16. To be delivered at Window. 1/1 Sanskriti Bhavan, D. B. Gupta Marg,
Jhandewalan, N.D-55. PANCHJANYA','Wt','Postage','REGISTERED','S/N','PJY','ORG');



-- -------------------------------------------
-- TABLE DATA _role_group
-- -------------------------------------------
INSERT INTO `_role_group` (`id`,`name`,`status`) VALUES
('1','Admin','1');
INSERT INTO `_role_group` (`id`,`name`,`status`) VALUES
('2','User','1');
INSERT INTO `_role_group` (`id`,`name`,`status`) VALUES
('3','Approver','1');
INSERT INTO `_role_group` (`id`,`name`,`status`) VALUES
('4','Manager','1');



-- -------------------------------------------
-- TABLE DATA _state
-- -------------------------------------------
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('1','Andaman and Nicobar Island','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('2','Andhra Pradesh','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('3','Arunachal Pradesh','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('4','Assam','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('5','Bihar','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('6','Chandigarh','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('7','Chhattisgarh','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('8','Dadra and Nagar Haveli','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('9','Daman and Diu','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('10','Delhi','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('11','Goa','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('12','Gujarat','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('13','Haryana','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('14','Himachal Pradesh','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('15','Jammu and Kashmir','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('16','Jharkhand','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('17','Karnataka','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('18','Kerala','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('19','Lakshadweep','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('20','Madhya Pradesh','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('21','Maharashtra','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('22','Manipur','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('23','Meghalaya','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('24','Mizoram','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('25','Nagaland','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('26','Odisha','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('27','Puducherry','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('28','Punjab','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('29','Rajasthan','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('30','Sikkim','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('31','Tamil Nadu','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('32','Telangana','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('33','Tripura','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('34','Uttar Pradesh','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('35','Uttarakhand','1');
INSERT INTO `_state` (`id`,`name`,`country_id`) VALUES
('36','West Bengal','1');



-- -------------------------------------------
-- TABLE DATA _sub_department
-- -------------------------------------------
INSERT INTO `_sub_department` (`id`,`name`,`department_id`) VALUES
('1','Panchjanya-Print','1');
INSERT INTO `_sub_department` (`id`,`name`,`department_id`) VALUES
('2','Organiser-Print','1');
INSERT INTO `_sub_department` (`id`,`name`,`department_id`) VALUES
('3','Panchjanya-Digital','1');
INSERT INTO `_sub_department` (`id`,`name`,`department_id`) VALUES
('4','Organiser-Digital','1');
INSERT INTO `_sub_department` (`id`,`name`,`department_id`) VALUES
('5','Agency','2');
INSERT INTO `_sub_department` (`id`,`name`,`department_id`) VALUES
('6','Cluster','2');
INSERT INTO `_sub_department` (`id`,`name`,`department_id`) VALUES
('7','Subscription','2');



-- -------------------------------------------
-- TABLE DATA _weight
-- -------------------------------------------
INSERT INTO `_weight` (`id`,`name`,`weight`) VALUES
('1','PJY','0.07');
INSERT INTO `_weight` (`id`,`name`,`weight`) VALUES
('2','ORG','0.07');



-- -------------------------------------------
-- TABLE DATA agency
-- -------------------------------------------
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('32','NEW agncy','AR|C|0003','5','7','koijij','uuiu@g.com','897456210','2147483647','Active','989.00','1','yui','cfcfcf ytf vttydrt ct','123123321321','1','3','17','123654','78','789','yui','cfcfcf ytf vttydrt ct','123123321321','1','3','17','123654','2016-02-26','Combined','iomomomom','897','AS|09|78','ANVT','12154','SAMPOORN KRANTI');
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('33','Old Agency','GJ|C|0002','1','9','Potyiop','io','987456874','2147483647','Active','987.00','1','78/9','Pto bhiuo nhufgc vgvg  vyctr yvrdrd','tyreing','1','12','150','987456','988','78','78/9','Pto bhiuo nhufgc vgvg  vyctr yvrdrd','tyreing','1','12','150','987456','2016-02-09','Single','Post Office near','890789','AS|C|004','','','');
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('34','aer','HR|C|0004','2','9','uioplkjh','sres@sr.com','76678686','646546546','Active','9878.00','1','876876','crtcrcrcrdrd rd tr tr trdt rdsresaew','yrytrytr','1','13','183','5656565','98','87','876876','crtcrcrcrdrd rd tr tr trdt rdsresaew','yrytrytr','1','13','183','5656565','2016-02-11','Combined','PJY','8978','77577657','','','');
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('35','top ramen','GJ|S|0004','2','1','12','tos@njasjd.c','901831230','2147483647','Active','100.00','1','47/8','asjdasdnaskjn','1311213','1','12','141','1210146','100','20','47/8','asjdasdnaskjn','1311213','1','12','141','1210146','2016-02-21','Single','asdsa','5','','','','');
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('36','patanjali','HR|C|0005','2','1','asdasdas','nja@nd.com','2147483647','2147483647','Active','1020.00','1','d9-0912','indasndakjn','9090909090','1','13','176','121003','1002','1050','d9-0912','indasndakjn','9090909090','1','13','176','121003','2016-02-14','Combined','asdasdssdasdasdsdsdsd','20','019238','','','');
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('37','NEW agncy2','AR|C|0003','2','7','koijij','uuiu@g.com','897456210','2147483647','Active','989.00','1','yui','cfcfcf ytf vttydrt ct','123123321321','1','3','17','123654','789','789','yui','cfcfcf ytf vttydrt ct','123123321321','1','3','17','123654','2016-02-26','Combined','iomomomom','897','AS|09|78','','','');
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('38','patanjali','HR|C|0005','2','1','asdasdas','nja@nd.com','2147483647','2147483647','Active','1020.00','1','d9-0912','indasndakjn','9090909090','1','13','176','121003','1002','1050','d9-0912','indasndakjn','9090909090','1','13','176','121003','2016-02-14','Combined','asdasdssdasdasdsdsdsd','20','019238','','','');
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('39','Old Agency2','GJ|C|0002','2','9','Potyiop','io','987456874','2147483647','Active','987.00','1','78/9','Pto bhiuo nhufgc vgvg  vyctr yvrdrd','tyreing','1','12','150','987456','98','78','78/9','Pto bhiuo nhufgc vgvg  vyctr yvrdrd','tyreing','1','12','150','987456','2016-02-09','Combined','Post Office near','890789','AS|C|004','','','');
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('40','top ramen2','GJ|S|0004','2','1','12','tos@njasjd.c','901831230','2147483647','Active','100.00','1','47/8','asjdasdnaskjn','1311213','1','12','141','1210146','100','20','47/8','asjdasdnaskjn','1311213','1','12','141','1210146','2016-02-21','Single','asdsa','5','','','','');
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('41','Sh Gabbar Ji','DL|S|0010','5','2','Thakur','gab@gab.com','12100321','2147483647','Active','15000.00','1','45/8','S/O SH RAJNATH RAM, NEAR DR. GANDHI\'S HOUSE
ISHWAR NAGAR, SHYMALDAS LANE','Ishwar Nagar','1','10','133','110065','100','50','45/8','S/O SH RAJNATH RAM, NEAR DR. GANDHI\'S HOUSE
ISHWAR NAGAR, SHYMALDAS LANE','Ishwar Nagar','1','10','133','110065','2016-02-22','Single','New Agency','5','','NDLS','12556','Vaishali Express');
INSERT INTO `agency` (`id`,`name`,`account_id`,`route_id`,`vehicle_id`,`reference`,`email`,`landline_no`,`mobile_no`,`status`,`security_amt`,`address_status`,`mail_house_no`,`mail_street_address`,`mail_p_office`,`mail_country_id`,`mail_state_id`,`mail_district_id`,`mail_pincode`,`panchjanya`,`organiser`,`add_house_no`,`add_street_address`,`add_p_office`,`add_country_id`,`add_state_id`,`add_district_id`,`add_pincode`,`issue_start_date`,`agency_type`,`comment`,`commission`,`agency_combined_id`,`source`,`train_no`,`train_name`) VALUES
('42','asdasa','KA|S|0011','1','12312','12312','sdasda','231231231','23123123','Active','1299.00','1','asdasdas','dasdasdasd','asdasda','1','17','253','123123','11000','2000','asdasdas','dasdasdasd','asdasda','1','17','253','123123','2016-02-01','Single','12312','123123','','Sel','','123123');



-- -------------------------------------------
-- TABLE DATA agency_commission
-- -------------------------------------------
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('1','32','897','2016-02-12');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('2','33','890789','2016-02-12');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('3','32','897','2016-02-25');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('4','34','8978','2016-02-13');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('5','32','897','2016-02-12');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('6','32','897','2016-02-12');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('7','35','5','2016-02-12');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('8','36','20','2016-02-12');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('9','41','5','2016-02-16');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('10','32','897','2016-02-18');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('11','33','890789','2016-02-18');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('12','33','890789','2016-02-18');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('13','42','123123','2016-02-19');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('14','42','123123','2016-02-19');
INSERT INTO `agency_commission` (`id`,`agency_id`,`amount`,`date`) VALUES
('15','42','123123','2016-02-19');



-- -------------------------------------------
-- TABLE DATA agency_copies_records
-- -------------------------------------------
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('32','2016-02-12','789654123','789','1');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('33','2016-02-12','9889','7887','2');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('32','2016-02-12','789654123','789','3');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('34','2016-02-12','98','87','4');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('32','2016-02-12','789654123','789','5');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('32','2016-02-12','789654123','789','6');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('35','2016-02-12','100','20','7');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('36','2016-02-12','1002','1050','8');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('41','2016-02-16','100','50','9');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('32','2016-02-18','78','789','10');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('33','2016-02-18','988','78','11');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('33','2016-02-18','988','78','12');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('42','2016-02-19','11','2000','13');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('42','2016-02-19','11','2000','14');
INSERT INTO `agency_copies_records` (`agency_id`,`date`,`pachjanya`,`organiser`,`id`) VALUES
('42','2016-02-19','110000','2000','15');



-- -------------------------------------------
-- TABLE DATA agency_creation_updation_records
-- -------------------------------------------
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('32','2016-02-12','1','1','08:01:02');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('33','2016-02-12','0','2','08:11:54');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('32','2016-02-12','1','3','08:12:17');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('34','2016-02-12','0','4','08:14:37');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('32','2016-02-12','1','5','09:33:04');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('32','2016-02-12','1','6','09:33:17');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('35','2016-02-12','0','7','12:04:20');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('36','2016-02-12','0','8','12:06:40');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('41','2016-02-16','0','9','12:15:58');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('32','2016-02-18','1','10','05:54:44');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('33','2016-02-18','1','11','08:49:38');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('33','2016-02-18','1','12','09:38:53');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('42','2016-02-19','0','13','07:15:26');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('42','2016-02-19','1','14','07:15:43');
INSERT INTO `agency_creation_updation_records` (`agency_id`,`date`,`status`,`id`,`time`) VALUES
('42','2016-02-19','1','15','07:16:55');



-- -------------------------------------------
-- TABLE DATA agency_credit_note
-- -------------------------------------------
INSERT INTO `agency_credit_note` (`id`,`agency_id`,`return_date`,`issue_type`,`pjy`,`org`,`issue_date`,`return_type`) VALUES
('1','32','2016-03-20','Regular Edition','12','12','2016-02-21','0');
INSERT INTO `agency_credit_note` (`id`,`agency_id`,`return_date`,`issue_type`,`pjy`,`org`,`issue_date`,`return_type`) VALUES
('2','32','2016-03-06','Regular Edition','12','22','2016-02-21','0');



-- -------------------------------------------
-- TABLE DATA agency_receipt
-- -------------------------------------------
INSERT INTO `agency_receipt` (`id`,`agency_id`,`rcpt_date`,`cr_amt`,`payment_mode`,`comment`,`created_on`,`created_on_time`) VALUES
('1','32','2016-03-01','1000','1','New','2016-03-03','08:57:04');
INSERT INTO `agency_receipt` (`id`,`agency_id`,`rcpt_date`,`cr_amt`,`payment_mode`,`comment`,`created_on`,`created_on_time`) VALUES
('2','32','2016-03-14','2406','1','new','2016-03-08','10:34:40');



-- -------------------------------------------
-- TABLE DATA auth_assignment
-- -------------------------------------------
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-bundle-size','1','1458018977');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-country','1','1458018977');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-delivery-method','1','1458018977');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-department','1','1458018977');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-designation','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-district','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-license','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-payment-mode','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-postage-rate','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-state','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-sub-department','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('add-weight','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('Admin','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('agency-commission','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('create-agency','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('create-user','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('deactivate-agency','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-agency','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-agency-copies','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-bundle-size','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-country','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-delivery-method','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-department','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-designation','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-district','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-license','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-payment-mode','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-state','1','1458018978');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-sub-department','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-user','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('delete-weight','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('generate-bill','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('generate-labels','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-agency','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-agency-copies','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-agency-delivery-method','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-bundle-size','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-country','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-delivery-method','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-department','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-designation','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-district','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-license','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-payment-mode','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-postage-rate','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-state','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-sub-department','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-user','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('update-weight','1','1458018979');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('upload-credit-note','1','1458018980');
INSERT INTO `auth_assignment` (`item_name`,`user_id`,`created_at`) VALUES
('upload-receipt','1','1458018980');



-- -------------------------------------------
-- TABLE DATA auth_item
-- -------------------------------------------
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-bundle-size','1','add-bundle-size','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-country','1','add-country','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-delivery-method','1','add-delivery-method','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-department','1','add-department','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-designation','1','add-designation','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-district','1','add-district','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-license','1','add-license','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-payment-mode','1','add-payment-mode','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-postage-rate','1','add-postage-rate','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-state','1','add-state','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-sub-department','1','add-sub-department','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('add-weight','1','add-weight','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('Admin','1','Admin can do anything','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('agency-commission','1','agency-commission','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('create-agency','1','create-agency','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('create-user','1','Create User/Employee','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('deactivate-agency','1','deactivate-agency','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-agency','1','delete-agency','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-agency-copies','1','delete-agency-copies','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-bundle-size','1','delete-bundle-size','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-country','1','delete-country','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-delivery-method','1','delete-delivery-method','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-department','1','delete-department','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-designation','1','delete-designation','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-district','1','delete-district','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-license','1','delete-license','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-payment-mode','1','delete-payment-mode','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-state','1','delete-state','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-sub-department','1','delete-sub-department','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-user','1','gives permission to delete users','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('delete-weight','1','delete-weight','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('generate-bill','1','generate-bill','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('generate-labels','1','generate-labels','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-agency','1','update-agency','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-agency-copies','1','update-agency-copies','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-agency-delivery-method','1','update-agency-delivery-method','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-bundle-size','1','update-bundle-size','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-country','1','update-country','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-delivery-method','1','update-delivery-method','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-department','1','update-department','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-designation','1','update-designation','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-district','1','update-district','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-license','1','update-license','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-payment-mode','1','update-payment-mode','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-postage-rate','1','update-postage-rate','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-state','1','update-state','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-sub-department','1','update-sub-department','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-user','1','gives permission to update users','','','','');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('update-weight','1','update-weight','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('upload-credit-note','1','upload-credit-note','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('upload-receipt','1','upload-receipt','default','NuLL','0','0');
INSERT INTO `auth_item` (`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) VALUES
('view-agency','0','','default','NuLL','0','0');



-- -------------------------------------------
-- TABLE DATA auth_item_child
-- -------------------------------------------
INSERT INTO `auth_item_child` (`parent`,`child`) VALUES
('Admin','create-user');



-- -------------------------------------------
-- TABLE DATA auth_rule
-- -------------------------------------------
INSERT INTO `auth_rule` (`name`,`data`,`created_at`,`updated_at`) VALUES
('Default','','','');



-- -------------------------------------------
-- TABLE DATA commission_cal
-- -------------------------------------------
INSERT INTO `commission_cal` (`id`,`lower_limit`,`upper_limit`,`amt`) VALUES
('1','0','50','10.00');
INSERT INTO `commission_cal` (`id`,`lower_limit`,`upper_limit`,`amt`) VALUES
('2','51','100','33.00');
INSERT INTO `commission_cal` (`id`,`lower_limit`,`upper_limit`,`amt`) VALUES
('3','101','500','33.00');
INSERT INTO `commission_cal` (`id`,`lower_limit`,`upper_limit`,`amt`) VALUES
('4','501','5000000','33.00');



-- -------------------------------------------
-- TABLE DATA migration
-- -------------------------------------------
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m000000_000000_base','1454562022');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m130524_201442_init','1454562025');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m140506_102106_rbac_init','1454586532');



-- -------------------------------------------
-- TABLE DATA ordinary_post_data
-- -------------------------------------------
INSERT INTO `ordinary_post_data` (`id`,`date`,`time`,`generated_date`) VALUES
('1','2016-02-21','08:05:58','2016-02-19');
INSERT INTO `ordinary_post_data` (`id`,`date`,`time`,`generated_date`) VALUES
('2','2016-03-13','09:13:06','2016-03-08');



-- -------------------------------------------
-- TABLE DATA ordinary_posted_data
-- -------------------------------------------
INSERT INTO `ordinary_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`ord_id`,`license`,`bundle_size`) VALUES
('1','33','1','74.62','746.2','987456','1','988','78','2016-02-21','1','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','10');
INSERT INTO `ordinary_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`ord_id`,`license`,`bundle_size`) VALUES
('2','42','1','7840','78400','123123','2','11000','2000','2016-02-21','1','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','10');
INSERT INTO `ordinary_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`ord_id`,`license`,`bundle_size`) VALUES
('3','33','1','74.62','746.2','987456','3','988','78','2016-03-13','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','10');
INSERT INTO `ordinary_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`ord_id`,`license`,`bundle_size`) VALUES
('4','42','1','910','9100','123123','4','11000','2000','2016-03-13','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','10');



-- -------------------------------------------
-- TABLE DATA railway_post_data
-- -------------------------------------------
INSERT INTO `railway_post_data` (`id`,`date`,`time`,`generated_date`) VALUES
('1','2016-02-21','07:18:56','2016-02-18');
INSERT INTO `railway_post_data` (`id`,`date`,`time`,`generated_date`) VALUES
('2','2016-02-28','07:22:19','2016-02-18');
INSERT INTO `railway_post_data` (`id`,`date`,`time`,`generated_date`) VALUES
('3','2016-03-13','09:12:58','2016-03-08');



-- -------------------------------------------
-- TABLE DATA railway_posted_data
-- -------------------------------------------
INSERT INTO `railway_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`rail_id`,`train_no`,`train_name`,`source`,`license`,`bundle_size`) VALUES
('1','32','1','60.69','606.9','123654','9','78','789','2016-02-21','1','12154','SAMPOORN KRANTI','ANVT','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','150');
INSERT INTO `railway_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`rail_id`,`train_no`,`train_name`,`source`,`license`,`bundle_size`) VALUES
('2','41','1','10.5','105','110065','10','100','50','2016-02-21','1','12556','Vaishali Express','NDLS','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','150');
INSERT INTO `railway_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`rail_id`,`train_no`,`train_name`,`source`,`license`,`bundle_size`) VALUES
('3','32','1','60.69','606.9','123654','9','78','789','2016-02-28','2','12154','SAMPOORN KRANTI','ANVT','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','150');
INSERT INTO `railway_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`rail_id`,`train_no`,`train_name`,`source`,`license`,`bundle_size`) VALUES
('4','41','1','10.5','105','110065','10','100','50','2016-02-28','2','12556','Vaishali Express','NDLS','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','150');
INSERT INTO `railway_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`rail_id`,`train_no`,`train_name`,`source`,`license`,`bundle_size`) VALUES
('5','32','1','60.69','606.9','123654','31','78','789','2016-03-13','3','12154','SAMPOORN KRANTI','ANVT','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','150');
INSERT INTO `railway_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`rail_id`,`train_no`,`train_name`,`source`,`license`,`bundle_size`) VALUES
('6','41','1','10.5','105','110065','32','100','50','2016-03-13','3','12556','Vaishali Express','NDLS','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','150');



-- -------------------------------------------
-- TABLE DATA registered_post_data
-- -------------------------------------------
INSERT INTO `registered_post_data` (`id`,`date`,`time`,`generated_date`) VALUES
('1','2016-02-21','07:00:57','2016-02-18');
INSERT INTO `registered_post_data` (`id`,`date`,`time`,`generated_date`) VALUES
('2','2016-02-28','07:22:29','2016-02-18');
INSERT INTO `registered_post_data` (`id`,`date`,`time`,`generated_date`) VALUES
('3','2016-03-06','06:14:19','2016-02-29');
INSERT INTO `registered_post_data` (`id`,`date`,`time`,`generated_date`) VALUES
('4','2016-03-13','09:12:45','2016-03-08');



-- -------------------------------------------
-- TABLE DATA registered_posted_data
-- -------------------------------------------
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('1','33','1','74.62','746.2','987456','1','988','78','2016-02-21','','1','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('2','34','1','12.95','129.5','5656565','2','98','87','2016-02-21','','1','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('3','35','1','8.4','84','1210146','3','100','20','2016-02-21','','1','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('4','36','1','143.64','1436.4','121003','4','1002','1050','2016-02-21','','1','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('5','37','1','110.46','1104.6','123654','5','789','789','2016-02-21','','1','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('6','38','1','143.64','1436.4','121003','6','1002','1050','2016-02-21','','1','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('7','39','1','12.32','123.2','987456','7','98','78','2016-02-21','','1','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('8','40','1','8.4','84','1210146','8','100','20','2016-02-21','','1','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('9','33','1','74.62','746.2','987456','9','988','78','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('10','34','1','12.95','129.5','5656565','10','98','87','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('11','35','1','8.4','84','1210146','11','100','20','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('12','36','1','143.64','1436.4','121003','12','1002','1050','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('13','37','1','110.46','1104.6','123654','13','789','789','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('14','38','1','143.64','1436.4','121003','14','1002','1050','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('15','39','1','12.32','123.2','987456','15','98','78','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('16','40','1','8.4','84','1210146','16','100','20','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('17','40','1','8.4','84','1210146','16','100','20','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('18','40','1','8.4','84','1210146','16','100','20','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('19','40','1','8.4','84','1210146','16','100','20','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('20','40','1','8.4','84','1210146','16','100','20','2016-02-28','','2','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('21','34','1','12.95','129.5','aer ,crtcrcrcrdrd rd tr tr trdt rdsresaew','17','98','87','2016-03-06','','3','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('22','35','1','8.4','84','top ramen ,asjdasdnaskjn','18','100','20','2016-03-06','','3','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('23','36','1','143.64','1436.4','patanjali ,indasndakjn','19','1002','1050','2016-03-06','','3','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('24','37','1','110.46','1104.6','NEW agncy2 ,cfcfcf ytf vttydrt ct','20','789','789','2016-03-06','','3','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('25','38','1','143.64','1436.4','patanjali ,indasndakjn','21','1002','1050','2016-03-06','','3','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('26','39','1','12.32','123.2','Old Agency2 ,Pto bhiuo nhufgc vgvg  vyctr yvrdrd','22','98','78','2016-03-06','','3','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('27','40','1','8.4','84','top ramen2 ,asjdasdnaskjn','23','100','20','2016-03-06','','3','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('28','34','1','12.95','129.5','aer ,crtcrcrcrdrd rd tr tr trdt rdsresaew','24','98','87','2016-03-13','','4','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('29','35','1','8.4','84','top ramen ,asjdasdnaskjn','25','100','20','2016-03-13','','4','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('30','36','1','143.64','1436.4','patanjali ,indasndakjn','26','1002','1050','2016-03-13','','4','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('31','37','1','110.46','1104.6','NEW agncy2 ,cfcfcf ytf vttydrt ct','27','789','789','2016-03-13','','4','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('32','38','1','143.64','1436.4','patanjali ,indasndakjn','28','1002','1050','2016-03-13','','4','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('33','39','1','12.32','123.2','Old Agency2 ,Pto bhiuo nhufgc vgvg  vyctr yvrdrd','29','98','78','2016-03-13','','4','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');
INSERT INTO `registered_posted_data` (`id`,`agency_id`,`tempelate_id`,`wt`,`postage`,`address_bar`,`sn`,`pjy`,`org`,`date`,`total_price`,`post_id`,`license`,`bundle_size`) VALUES
('34','40','1','8.4','84','top ramen2 ,asjdasdnaskjn','30','100','20','2016-03-13','','4','PRESS PACKET: DL(C)-01/1102/2015-17, lic.pre.pay. U(C) – 87/2015-17, RNI-32543/77','50');



-- -------------------------------------------
-- TABLE DATA user
-- -------------------------------------------
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('1','Administrator','admin','$2y$13$lcE0OlOdfI.dqE66vOY7UeEc0fJ1RwT8VMjjlyiQLdSUL1WgLWGWq','admin@admin.com','','','10','0','1','','10','0000-00-00 00:00:00','0000-00-00 00:00:00','','VBP2C27T0RDl4ILutaDF_JYTsSPt3WD3');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('8','Sh. Parmanand Moharaiya','param','$2y$13$yYnMxruDUSv1iBK32e1.cOvNN/D6wlqsjWDlX9tfemGW23ODYHmqm','param.mohariya@bpdl.in ','9810198101','225','10','2','1','','10','','2016-03-10 07:11:44','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('9','Sh. Jitender Mehta','jm','jm','gm@bpdl.in','9958801666','','10','3','1','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('10','SH. DINESH KUMAR BHARTI','dinesh','dinesh','dinesh.kumar@bpdl.in','9958505350','','9','4','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('11','SMT. ANJALI SINGH','anjali','anjali','anjali.singh@bpdl.in','9868116043','','9','5','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('12','SH. SAURABH TYAGI','saurabh','saurabh','saurabh.tyagi@bpdl.in','8447729883','','9','6','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('13','SH.SHASHI PRAKASH','shashi','shashi','shashi.prakasah@bpdl.in','9958077979','','9','7','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('14','SH. SOHAN PAL SHARMA','sohan','sohan','sohan.sharma@bpdl.in','9868481196','202','3','8','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('15','SH D S MATHUR','dsmathur','dsmathur','dinesh.mathur@bpdl.in ','9911172592','','3','9','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('16','SH. SUNDER LAL','sunder','sunder','sunder.lal@bpdl.in','9313588321','','3','10','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('17','SH. YOGINDER KUMAR','yoginder','yoginder','yoginder@noemail.in','9717745162','','3','10','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('18','AJAY','ajay','ajay','ajay@noemail.com','9212327150','','3','11','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('19','VIJAY','vijay1','vijay1','noemail@co.in','9810098100','','3','11','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('20','JITENDER','jitender1','jitender1','noemail1@ni.in','7206553193','','3','11','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('21','SH. RANA PRATAP SINGH','ranapratap','ranapratap','ranapratap.singh@bpdl.in','9015622625','','2','12','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('22','SH. UPENDER SINGH','upender','upender','upender.kumar@bpdl.in','8130830803','','2','12','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('23','SH. ARVIND KUMAR','arvind','arvind','arvind.sinha@bpdl.in','9818778110','','2','13','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('24','SH. KARAN SINGH','karan','karan','karan.singh@bpdl.in','9312698125','','2','12','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('25','SH SHASHI MOHAN RAWAT','shashimohan','sashimohan','shashim.rawat@bpdl.in','9717932622','','4','14','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('26','SH. HEM RAJ GUPTA','hemraj','hemraj','hemraj.gupta@bpdl.in','9818525527','','4','15','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('27','SH. PARMOD KUMAR KAUSHIK','pramod','pramod','pramod.kaushik@bpdl.in','9899256433','','4','16','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('28','SH. MANOJ KUMAR SINGH','manoj','manoj','manoj.singh@bpdl.in','8745851318','','4','17','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('29','SH. HANUMANT CHAND','hanumant','hanumant','hanumant.chand@bpdl.in','9873401069','','4','18','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('30','SH. MANGAL SINGH','mangal','mangal','mangal.singh@bpdl.in','9211310101','','4','19','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('31','SH. RAJPAL SINGH RAWAT','rajpal','rajpal','rajpal.rawat@bpdl.in','9871908408','','4','19','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('32','SH. JANARDHAN SINHA','janardan','janardan','janardan.sinha@bpdl.in','9868315367','','4','19','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('33','SH. PARDEEP KUMAR','pardeep','pardeep','pradeep.aggarwal@bpdl.in','9811941867','','7','20','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('34','SH. SANJAY ARORA','sanjay','sanjay','sanjay.arora@bpdl.in','9871195998','','7','21','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('35','Ms. ISHA','isha','isha','isha.dagar@bpdl.in','7838502036','','5','24','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('36','SH. AMRIT AGGARWAL','amrit','amrit','amrit.aggarwal@bpdl.in','9811593800','','6','22','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('37','SH. JAGDISH DATTARAY UPASANE','jagdish','jagdish','jagdish.upasane@bpdl.in','9958077979','','8','23','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('38','SH. NARENDER SETHI','narendra','narandra','narender.sethi@bpdl.in','8800996915','','8','25','4','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('39','SH. ARUN KUMAR SINHA','arun','arun','arun.sinha@bpdl.in','9810827333','','8','26','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('40','SH. BHAGWATI PRASAD BANGWAL','bhagwati','bhagwati','noemail1@co.in','9811593800','','8','27','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('41','SH. CHANDER SHEKHAR','ch','ch','9958037431','9958037431','','8','28','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('42','SH. NARESH KUMAR','naresh','naresh','9958875790','9958875790','','8','28','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('43','SH. UMMEDU LAL','ummedu','ummedu','9654802594','9654802594','','8','29','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('44','SH. JAGBEER SINGH NEGI','jagbeer','jagbeer','9953301205','9953301205','','8','30','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('45','SH. PRAFULLA KETKAR','prafulla','prafulla','editor.organiser@bpdl.in','9350104343','','1','31','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('46','SH. NISHANT KUMAR AZAD','nishant','nishant','nishant.organiser@bpdl.in','8860232237','','1','32','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('47','SH. ANIKET RAJA','aniket','aniket','aniket.organiser@bpdl.in','9958061237','','1','33','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('48','SH. PRAMOD KUMAR SAINI','parmodkumar','pramodkumar','pramod.organiser@bpdl.in','9818465946','','1','34','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('49','SH. HITESH SHANKAR','hitesh','hitesh','editor.panchjanya@bpdl.in','9868461676','','1','35','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('50','SH. SURYA PRAKASH SEMWAL','surya','surya','suryaprakash.panchjanya@bpdl.in','9810198102','','1','36','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('51','SH. ADITYA BHARDWAJ','aditya','aditya','aditya.panchjanya@bpdl.in','9968183297','','1','33','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('52','SH. RAHUL SHARMA','rahulsharma','rahulsharma','rahul.panchjanya@bpdl.in','9810835459','','1','33','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('53','SH. ASWANI KUMAR MISHRA','aswani','aswani','ashwani.panchjanya@bpdl.in','9015093657','','1','32','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('54','SH. ALOK GOSWAMI','alok','alok','alok.panchjanya@bpdl.in','9810040656','','1','38','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('55','SH. ARUN KUMAR SINGH','aruns','aruns','aruns.panchjanya@bpdl.in','9873794585','','1','39','2','','10','','','','');
INSERT INTO `user` (`id`,`name`,`username`,`password_hash`,`email`,`mobile`,`extension_no`,`department_id`,`designation_id`,`role_group_id`,`deleted_at`,`status`,`created_at`,`updated_at`,`password_reset_token`,`auth_key`) VALUES
('56','a','a','$2y$13$3RcHTLxIRf3clgqHawYhUOt6Ni9wMj4cEP8gigHkc6t5dYauLhIge','a@a.com','1','','2','12','2','','10','2016-03-10 07:12:08','','','');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
