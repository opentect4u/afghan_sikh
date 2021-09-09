-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2021 at 11:19 AM
-- Server version: 5.7.35-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-24+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afghan_sikh`
--

-- --------------------------------------------------------

--
-- Table structure for table `md_country`
--

CREATE TABLE `md_country` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_country`
--

INSERT INTO `md_country` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'China', NULL, NULL),
(2, 'India', NULL, NULL),
(3, 'United States', NULL, NULL),
(4, 'Indonesia', NULL, NULL),
(5, 'Brazil', NULL, NULL),
(6, 'Pakistan', NULL, NULL),
(7, 'Nigeria', NULL, NULL),
(8, 'Bangladesh', NULL, NULL),
(9, 'Russia', NULL, NULL),
(10, 'Japan', NULL, NULL),
(11, 'Mexico', NULL, NULL),
(12, 'Philippines', NULL, NULL),
(13, 'Vietnam', NULL, NULL),
(14, 'Ethiopia', NULL, NULL),
(15, 'Egypt', NULL, NULL),
(16, 'Germany', NULL, NULL),
(17, 'Iran', NULL, NULL),
(18, 'Turkey', NULL, NULL),
(19, 'Democratic Republic of the Congo', NULL, NULL),
(20, 'Thailand', NULL, NULL),
(21, 'France', NULL, NULL),
(22, 'United Kingdom', NULL, NULL),
(23, 'Italy', NULL, NULL),
(24, 'Burma', NULL, NULL),
(25, 'South Africa', NULL, NULL),
(26, 'South Korea', NULL, NULL),
(27, 'Colombia', NULL, NULL),
(28, 'Spain', NULL, NULL),
(29, 'Ukraine', NULL, NULL),
(30, 'Tanzania', NULL, NULL),
(31, 'Kenya', NULL, NULL),
(32, 'Argentina', NULL, NULL),
(33, 'Algeria', NULL, NULL),
(34, 'Poland', NULL, NULL),
(35, 'Sudan', NULL, NULL),
(36, 'Uganda', NULL, NULL),
(37, 'Canada', NULL, NULL),
(38, 'Iraq', NULL, NULL),
(39, 'Morocco', NULL, NULL),
(40, 'Peru', NULL, NULL),
(41, 'Uzbekistan', NULL, NULL),
(42, 'Saudi Arabia', NULL, NULL),
(43, 'Malaysia', NULL, NULL),
(44, 'Venezuela', NULL, NULL),
(45, 'Nepal', NULL, NULL),
(46, 'Afghanistan', NULL, NULL),
(47, 'Yemen', NULL, NULL),
(48, 'North Korea', NULL, NULL),
(49, 'Ghana', NULL, NULL),
(50, 'Mozambique', NULL, NULL),
(51, 'Taiwan', NULL, NULL),
(52, 'Australia', NULL, NULL),
(53, 'Ivory Coast', NULL, NULL),
(54, 'Syria', NULL, NULL),
(55, 'Madagascar', NULL, NULL),
(56, 'Angola', NULL, NULL),
(57, 'Cameroon', NULL, NULL),
(58, 'Sri Lanka', NULL, NULL),
(59, 'Romania', NULL, NULL),
(60, 'Burkina Faso', NULL, NULL),
(61, 'Niger', NULL, NULL),
(62, 'Kazakhstan', NULL, NULL),
(63, 'Netherlands', NULL, NULL),
(64, 'Chile', NULL, NULL),
(65, 'Malawi', NULL, NULL),
(66, 'Ecuador', NULL, NULL),
(67, 'Guatemala', NULL, NULL),
(68, 'Mali', NULL, NULL),
(69, 'Cambodia', NULL, NULL),
(70, 'Senegal', NULL, NULL),
(71, 'Zambia', NULL, NULL),
(72, 'Zimbabwe', NULL, NULL),
(73, 'Chad', NULL, NULL),
(74, 'South Sudan', NULL, NULL),
(75, 'Belgium', NULL, NULL),
(76, 'Cuba', NULL, NULL),
(77, 'Tunisia', NULL, NULL),
(78, 'Guinea', NULL, NULL),
(79, 'Greece', NULL, NULL),
(80, 'Portugal', NULL, NULL),
(81, 'Rwanda', NULL, NULL),
(82, 'Czech Republic', NULL, NULL),
(83, 'Somalia', NULL, NULL),
(84, 'Haiti', NULL, NULL),
(85, 'Benin', NULL, NULL),
(86, 'Burundi', NULL, NULL),
(87, 'Bolivia', NULL, NULL),
(88, 'Hungary', NULL, NULL),
(89, 'Sweden', NULL, NULL),
(90, 'Belarus', NULL, NULL),
(91, 'Dominican Republic', NULL, NULL),
(92, 'Azerbaijan', NULL, NULL),
(93, 'Honduras', NULL, NULL),
(94, 'Austria', NULL, NULL),
(95, 'United Arab Emirates', NULL, NULL),
(96, 'Israel', NULL, NULL),
(97, 'Switzerland', NULL, NULL),
(98, 'Tajikistan', NULL, NULL),
(99, 'Bulgaria', NULL, NULL),
(100, 'Hong Kong (China)', NULL, NULL),
(101, 'Serbia', NULL, NULL),
(102, 'Papua New Guinea', NULL, NULL),
(103, 'Paraguay', NULL, NULL),
(104, 'Laos', NULL, NULL),
(105, 'Jordan', NULL, NULL),
(106, 'El Salvador', NULL, NULL),
(107, 'Eritrea', NULL, NULL),
(108, 'Libya', NULL, NULL),
(109, 'Togo', NULL, NULL),
(110, 'Sierra Leone', NULL, NULL),
(111, 'Nicaragua', NULL, NULL),
(112, 'Kyrgyzstan', NULL, NULL),
(113, 'Denmark', NULL, NULL),
(114, 'Finland', NULL, NULL),
(115, 'Slovakia', NULL, NULL),
(116, 'Singapore', NULL, NULL),
(117, 'Turkmenistan', NULL, NULL),
(118, 'Norway', NULL, NULL),
(119, 'Lebanon', NULL, NULL),
(120, 'Costa Rica', NULL, NULL),
(121, 'Central African Republic', NULL, NULL),
(122, 'Ireland', NULL, NULL),
(123, 'Georgia', NULL, NULL),
(124, 'New Zealand', NULL, NULL),
(125, 'Republic of the Congo', NULL, NULL),
(126, 'Palestine', NULL, NULL),
(127, 'Liberia', NULL, NULL),
(128, 'Croatia', NULL, NULL),
(129, 'Oman', NULL, NULL),
(130, 'Bosnia and Herzegovina', NULL, NULL),
(131, 'Puerto Rico', NULL, NULL),
(132, 'Kuwait', NULL, NULL),
(133, 'Moldov', NULL, NULL),
(134, 'Mauritania', NULL, NULL),
(135, 'Panama', NULL, NULL),
(136, 'Uruguay', NULL, NULL),
(137, 'Armenia', NULL, NULL),
(138, 'Lithuania', NULL, NULL),
(139, 'Albania', NULL, NULL),
(140, 'Mongolia', NULL, NULL),
(141, 'Jamaica', NULL, NULL),
(142, 'Namibia', NULL, NULL),
(143, 'Lesotho', NULL, NULL),
(144, 'Qatar', NULL, NULL),
(145, 'Macedonia', NULL, NULL),
(146, 'Slovenia', NULL, NULL),
(147, 'Botswana', NULL, NULL),
(148, 'Latvia', NULL, NULL),
(149, 'Gambia', NULL, NULL),
(150, 'Kosovo', NULL, NULL),
(151, 'Guinea-Bissau', NULL, NULL),
(152, 'Gabon', NULL, NULL),
(153, 'Equatorial Guinea', NULL, NULL),
(154, 'Trinidad and Tobago', NULL, NULL),
(155, 'Estonia', NULL, NULL),
(156, 'Mauritius', NULL, NULL),
(157, 'Swaziland', NULL, NULL),
(158, 'Bahrain', NULL, NULL),
(159, 'Timor-Leste', NULL, NULL),
(160, 'Djibouti', NULL, NULL),
(161, 'Cyprus', NULL, NULL),
(162, 'Fiji', NULL, NULL),
(163, 'Reunion (France)', NULL, NULL),
(164, 'Guyana', NULL, NULL),
(165, 'Comoros', NULL, NULL),
(166, 'Bhutan', NULL, NULL),
(167, 'Montenegro', NULL, NULL),
(168, 'Macau (China)', NULL, NULL),
(169, 'Solomon Islands', NULL, NULL),
(170, 'Western Sahara', NULL, NULL),
(171, 'Luxembourg', NULL, NULL),
(172, 'Suriname', NULL, NULL),
(173, 'Cape Verde', NULL, NULL),
(174, 'Malta', NULL, NULL),
(175, 'Guadeloupe (France)', NULL, NULL),
(176, 'Martinique (France)', NULL, NULL),
(177, 'Brunei', NULL, NULL),
(178, 'Bahamas', NULL, NULL),
(179, 'Iceland', NULL, NULL),
(180, 'Maldives', NULL, NULL),
(181, 'Belize', NULL, NULL),
(182, 'Barbados', NULL, NULL),
(183, 'French Polynesia (France)', NULL, NULL),
(184, 'Vanuatu', NULL, NULL),
(185, 'New Caledonia (France)', NULL, NULL),
(186, 'French Guiana (France)', NULL, NULL),
(187, 'Mayotte (France)', NULL, NULL),
(188, 'Samoa', NULL, NULL),
(189, 'Sao Tom and Principe', NULL, NULL),
(190, 'Saint Lucia', NULL, NULL),
(191, 'Guam (USA)', NULL, NULL),
(192, 'Curacao (Netherlands)', NULL, NULL),
(193, 'Saint Vincent and the Grenadines', NULL, NULL),
(194, 'Kiribati', NULL, NULL),
(195, 'United States Virgin Islands (USA)', NULL, NULL),
(196, 'Grenada', NULL, NULL),
(197, 'Tonga', NULL, NULL),
(198, 'Aruba (Netherlands)', NULL, NULL),
(199, 'Federated States of Micronesia', NULL, NULL),
(200, 'Jersey (UK)', NULL, NULL),
(201, 'Seychelles', NULL, NULL),
(202, 'Antigua and Barbuda', NULL, NULL),
(203, 'Isle of Man (UK)', NULL, NULL),
(204, 'Andorra', NULL, NULL),
(205, 'Dominica', NULL, NULL),
(206, 'Bermuda (UK)', NULL, NULL),
(207, 'Guernsey (UK)', NULL, NULL),
(208, 'Greenland (Denmark)', NULL, NULL),
(209, 'Marshall Islands', NULL, NULL),
(210, 'American Samoa (USA)', NULL, NULL),
(211, 'Cayman Islands (UK)', NULL, NULL),
(212, 'Saint Kitts and Nevis', NULL, NULL),
(213, 'Northern Mariana Islands (USA)', NULL, NULL),
(214, 'Faroe Islands (Denmark)', NULL, NULL),
(215, 'Sint Maarten (Netherlands)', NULL, NULL),
(216, 'Saint Martin (France)', NULL, NULL),
(217, 'Liechtenstein', NULL, NULL),
(218, 'Monaco', NULL, NULL),
(219, 'San Marino', NULL, NULL),
(220, 'Turks and Caicos Islands (UK)', NULL, NULL),
(221, 'Gibraltar (UK)', NULL, NULL),
(222, 'British Virgin Islands (UK)', NULL, NULL),
(223, 'Aland Islands (Finland)', NULL, NULL),
(224, 'Caribbean Netherlands (Netherlands)', NULL, NULL),
(225, 'Palau', NULL, NULL),
(226, 'Cook Islands (NZ)', NULL, NULL),
(227, 'Anguilla (UK)', NULL, NULL),
(228, 'Wallis and Futuna (France)', NULL, NULL),
(229, 'Tuvalu', NULL, NULL),
(230, 'Nauru', NULL, NULL),
(231, 'Saint Barthelemy (France)', NULL, NULL),
(232, 'Saint Pierre and Miquelon (France)', NULL, NULL),
(233, 'Montserrat (UK)', NULL, NULL),
(234, '\"Saint Helena', NULL, NULL),
(235, 'Svalbard and Jan Mayen (Norway)', NULL, NULL),
(236, 'Falkland Islands (UK)', NULL, NULL),
(237, 'Norfolk Island (Australia)', NULL, NULL),
(238, 'Christmas Island (Australia)', NULL, NULL),
(239, 'Niue (NZ)', NULL, NULL),
(240, 'Tokelau (NZ)', NULL, NULL),
(241, 'Vatican City', NULL, NULL),
(242, 'Cocos (Keeling) Islands (Australia)', NULL, NULL),
(243, 'Pitcairn Islands (UK)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_user_login`
--

CREATE TABLE `md_user_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('G','A') NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` enum('A','I','R') NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_user_login`
--

INSERT INTO `md_user_login` (`id`, `user_id`, `password`, `user_type`, `name`, `active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'testsc04@gmail.com', '$2y$10$Cw4EHykcP.yqZf1oX4vU/OqIY.C5TmWZ.iIBhQCNbkyKE1uI9dy.m', 'G', 'tt', 'A', 'sgfvergergf', NULL, '2021-08-19 03:53:28', '2021-08-19 03:53:28'),
(4, 'admin', '$2y$10$oFcavRqcLeqcdnzvHp1feO0qJjBWk7knH7QCg77h7Fk5CnZbY2dKS', 'A', 'Admin', 'A', 'admin', 'admin', '2021-08-20 18:30:00', '2021-08-20 18:30:00'),
(5, 'dsfgdrcsdfgvf@egsg.ghf', '$2y$10$lDZ.saes53XradC41CF9g.b6xakH1/QsIEzcFTZbnjGwI8YCi.PGi', 'G', 'fdgvdfgd', 'I', 'fdgvdfgd', NULL, '2021-08-25 02:00:52', '2021-08-25 02:00:52'),
(10, 'testsc07@gmail.com', '$2y$10$v5S1/73AEG5I7fWeA4HcTePIiy9mUobJ0qUMsyAOyjwpeMNOlQYNe', 'G', 'abcd test', 'A', 'abcd test', NULL, '2021-08-25 02:18:33', '2021-08-25 03:41:47'),
(11, 'root@dzgfsrg.dfgtfd', '$2y$10$RNZDbrl8nopF4wlsIclKV.4wf.3FbPVFir/ex8BoqHK7p3hJvPeYW', 'G', 'fgdgdg', 'I', 'fgdgdg', NULL, '2021-08-26 04:07:12', '2021-08-26 04:07:12'),
(12, 'testsc04xx@gmail.com', '$2y$10$rBH5gTnX5sMQAJi9dsEoQOvgbPfLopZi0AepBvOcIWGPGHg8z0i1y', 'G', 'szff', 'I', 'szff', NULL, '2021-08-31 23:49:31', '2021-08-31 23:49:31'),
(13, 'lkf6058dfgdf8@gmail.com', '$2y$10$bXblC6fqebMLC2hp3UNZEODDLYt.9R8GqsznQLrrCS0nGmMRhjAb6', 'G', 'fgvdgdgdg', 'I', 'fgvdgdgdg', NULL, '2021-08-31 23:51:47', '2021-08-31 23:51:47'),
(14, 'lkf60xbfgbd588@gmail.com', '$2y$10$Oct2eRny.ugcZy.M39pJSu9JCmC9vzhyvYTbqcl1NRqUDP2CfFiC2', 'G', 'rfgdhgghh', 'I', 'rfgdhgghh', NULL, '2021-09-01 00:15:54', '2021-09-01 00:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `td_birth_details`
--

CREATE TABLE `td_birth_details` (
  `id` int(11) NOT NULL,
  `generate_number` int(11) NOT NULL,
  `name_of_baby` varchar(100) NOT NULL,
  `gender_of_baby` enum('M','F','O') NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `baby_of_shri` varchar(100) NOT NULL,
  `baby_of_shrimati` varchar(100) NOT NULL,
  `name_of_gurdwara` int(11) NOT NULL,
  `date_of_issue` date NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_birth_details`
--

INSERT INTO `td_birth_details` (`id`, `generate_number`, `name_of_baby`, `gender_of_baby`, `place_of_birth`, `date_of_birth`, `baby_of_shri`, `baby_of_shrimati`, `name_of_gurdwara`, `date_of_issue`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 40034, 'asdfgsg', 'M', '2021-07-26', '2021-07-26', 'dfgdge', 'rdgergerg', 3, '2021-08-27', 'Historical Gurudwara Bara Sikh Sangat\n', NULL, '2021-08-27 02:15:10', '2021-08-27 02:15:10'),
(2, 65751, 'dfgrstb', 'M', '2021-07-26', '2021-07-26', 'gdgrtgregt', 'trgtrgrgr', 3, '2021-08-27', 'Historical Gurudwara Bara Sikh Sangat\n', NULL, '2021-08-27 03:18:19', '2021-08-27 03:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `td_death_details`
--

CREATE TABLE `td_death_details` (
  `id` int(11) NOT NULL,
  `generate_number` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_of_death` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` enum('M','F','O') NOT NULL,
  `cause_of_death` varchar(100) NOT NULL,
  `name_of_gurdwara` int(11) NOT NULL,
  `spouse_husband_son_daughter` varchar(100) NOT NULL,
  `date_of_issue` date NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_death_details`
--

INSERT INTO `td_death_details` (`id`, `generate_number`, `name`, `date_of_death`, `age`, `sex`, `cause_of_death`, `name_of_gurdwara`, `spouse_husband_son_daughter`, `date_of_issue`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 44967, 'xfgfdgdg', '2021-07-26', 54, 'M', 'fxgfzdgfd', 3, 'fdgdfgdg', '2021-08-27', 'Historical Gurudwara Bara Sikh Sangat\n', NULL, '2021-08-27 02:38:10', '2021-08-27 02:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `td_gurudwara_details`
--

CREATE TABLE `td_gurudwara_details` (
  `id` int(11) NOT NULL,
  `gurudwara_name` varchar(50) NOT NULL,
  `gurudwara_email` varchar(50) NOT NULL,
  `gurudwara_phone_no` int(11) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `gurudwara_address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `gurudwara_photo` varchar(50) DEFAULT NULL,
  `gurudwara_head_name` varchar(50) NOT NULL,
  `gurudwara_head_address` text NOT NULL,
  `gurudwara_head_phone_no` varchar(50) NOT NULL,
  `gurudwara_head_email` varchar(50) DEFAULT NULL,
  `gurudwara_head_photo` varchar(50) DEFAULT NULL,
  `gurudwara_letter_head` varchar(100) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_gurudwara_details`
--

INSERT INTO `td_gurudwara_details` (`id`, `gurudwara_name`, `gurudwara_email`, `gurudwara_phone_no`, `website`, `gurudwara_address`, `city`, `state`, `country`, `gurudwara_photo`, `gurudwara_head_name`, `gurudwara_head_address`, `gurudwara_head_phone_no`, `gurudwara_head_email`, `gurudwara_head_photo`, `gurudwara_letter_head`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'Historical Gurudwara Bara Sikh Sangat\n', 'testsc04@gmail.com', 3544534, 'sfg', 'sgfsfsw', 'drsgfvgeraf', 'gergfer', '2', '20210825123548_3_logo.jpg', 'retgersgt', 'regtertge', '324342443', 'dsfret344', NULL, '20210825123548_3_letter.jpg', 'sgfvergergf', NULL, '2021-08-19 03:53:28', '2021-08-25 07:05:48'),
(5, 'fdgvdfgd', 'dsfgdrcsdfgvf@egsg.ghf', 6551448, 'dsfsd', 'fdgrdrfg', 'rsgfrdsf', 'rdsgfdsg', '2', NULL, 'gbff', 'gfhfdg', '45545', 'bggff@gfg.hgh', NULL, NULL, 'fdgvdfgd', NULL, '2021-08-25 02:00:52', '2021-08-25 02:00:52'),
(10, 'abcd test', 'testsc07@gmail.com', 4554544, 'dfdrtger', 'fgfhftgh', 'dfgdgt', 'drgrtrdtg', '2', NULL, 'fdgtfgytry', 'gtfgtryrt', '56556', 'fgffhtghtf', NULL, NULL, 'abcd test', NULL, '2021-08-25 02:18:33', '2021-08-25 02:18:33'),
(11, 'fgdgdg', 'root@dzgfsrg.dfgtfd', 515154, NULL, 'vcb cgb', 'gfcbdfbgd', 'fcbvfdgv', '7', NULL, 'fcbdfgv', 'dfzgd', '545454', NULL, NULL, NULL, 'fgdgdg', NULL, '2021-08-26 04:07:12', '2021-08-26 04:07:12'),
(12, 'szff', 'testsc04xx@gmail.com', 2655451, NULL, 'dsfcsdf', 'asfesf', 'dsfsdfs', '2', NULL, 'dzfdsf', 'dzfsf', '54854865', NULL, NULL, NULL, 'szff', NULL, '2021-08-31 23:49:31', '2021-08-31 23:49:31'),
(13, 'fgvdgdgdg', 'lkf6058dfgdf8@gmail.com', 26548548, 'fbgfg', 'fbdgd', 'dfgrdfg', 'fxgfdgfdg', '2', NULL, 'fxgfdg', 'fdggd', '45955', 'fdgdt@etsey.tdyry', NULL, NULL, 'fgvdgdgdg', NULL, '2021-08-31 23:51:47', '2021-08-31 23:51:47'),
(14, 'rfgdhgghh', 'lkf60xbfgbd588@gmail.com', 51545421, 'fxgvfdgdgv', 'xcvfxdgsg', 'gfvdfgdg', 'dfgdfgvfd', '2', NULL, 'bbgfdggf', 'fcbgdghfgd', '1551665115', 'fgfdsgvgsfssdr@zrsgh.dfgts', NULL, NULL, 'rfgdhgghh', NULL, '2021-09-01 00:15:54', '2021-09-01 00:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `td_gurudwara_member`
--

CREATE TABLE `td_gurudwara_member` (
  `id` int(11) NOT NULL,
  `gurudwara_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `current_nationality` int(11) NOT NULL,
  `previous_nationality` int(11) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_gurudwara_member`
--

INSERT INTO `td_gurudwara_member` (`id`, `gurudwara_id`, `name`, `dob`, `email`, `phone`, `designation`, `current_nationality`, `previous_nationality`, `address`, `photo`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'fdg', '2021-08-02', 'dfsdf', 55858, 'designation 1', 2, 2, 'rfeferf', '20210826060329_3_memberlogo.jpg', NULL, NULL, NULL, NULL),
(2, 3, 'name member', '2021-07-26', NULL, 7898546, 'designation 22', 2, 2, 'dgdgdgt', '20210826063025_3_memberlogo.jpg', 'Test test 1', NULL, '2021-08-26 00:35:19', '2021-08-26 01:00:25'),
(3, 3, 'gdgdege', '2021-07-26', NULL, 454515, 'designation 3', 2, 2, 'dgdgdgt', '20210826060551_3_memberlogo.jpg', 'Test test 1', NULL, '2021-08-26 00:35:51', '2021-08-26 00:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `td_marriage_details`
--

CREATE TABLE `td_marriage_details` (
  `id` int(11) NOT NULL,
  `generate_number` int(11) NOT NULL,
  `ceremony_of_shri` varchar(100) NOT NULL,
  `son_of_shri` varchar(100) NOT NULL,
  `with_shrimati` varchar(100) NOT NULL,
  `daughter_of_shri` varchar(100) NOT NULL,
  `at_gurdwara` int(11) NOT NULL,
  `date_of_marriage` date NOT NULL,
  `shri_photo` varchar(100) NOT NULL,
  `shrimati_photo` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_marriage_details`
--

INSERT INTO `td_marriage_details` (`id`, `generate_number`, `ceremony_of_shri`, `son_of_shri`, `with_shrimati`, `daughter_of_shri`, `at_gurdwara`, `date_of_marriage`, `shri_photo`, `shrimati_photo`, `created_date`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 12534, 'sfgs', 'rdsfrf', 'rdafref', 'referf', 3, '2021-07-27', '20210826132429_3_shri_photo.jpg', '20210826132429_3_shrimati_photo.jpg', '2021-08-26', 'Historical Gurudwara Bara Sikh Sangat\n', NULL, '2021-08-26 07:54:29', '2021-08-26 07:54:29'),
(2, 30398, 'test one', 'test one 1', 'test 2', 'test 2', 3, '2021-08-02', '20210827085857_3_shri_photo.jpg', '20210827085857_3_shrimati_photo.jpg', '2021-08-27', 'Historical Gurudwara Bara Sikh Sangat\n', NULL, '2021-08-27 03:28:57', '2021-08-27 04:51:50'),
(3, 20982, 'dsgvdrfv', 'vdzfdgv', 'fdzgvdgvdf', 'sagfdrgfe', 3, '2021-08-02', '20210827085927_3_shri_photo.jpg', '20210827085927_3_shrimati_photo.jpg', '2021-08-27', 'Historical Gurudwara Bara Sikh Sangat\n', NULL, '2021-08-27 03:29:27', '2021-08-27 03:29:27'),
(4, 37906, 'fdbdfg', 'gddg', 'fdgdgtf', 'drgdgrgr', 3, '2021-07-26', '20210827090045_3_shri_photo.jpg', '20210827090045_3_shrimati_photo.jpg', '2021-08-27', 'Historical Gurudwara Bara Sikh Sangat\n', NULL, '2021-08-27 03:30:45', '2021-08-27 03:30:45'),
(5, 47765, 'test', 'test tset', 'test 1', 'test test 1', 3, '2021-07-26', '20210827092540_3_shri_photo.jpg', '20210827092540_3_shrimati_photo.jpg', '2021-08-27', 'Historical Gurudwara Bara Sikh Sangat\n', NULL, '2021-08-27 03:55:40', '2021-08-27 03:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `td_service_details`
--

CREATE TABLE `td_service_details` (
  `id` int(11) NOT NULL,
  `generate_user_id` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `givenname` varchar(50) NOT NULL,
  `gender` enum('M','F','O') NOT NULL,
  `date_of_birth` date NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `birth_country` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `previous_nationality` varchar(50) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `father_nationality` varchar(100) NOT NULL,
  `father_prev_nationality` varchar(50) NOT NULL,
  `father_birth_country` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `other_info` text NOT NULL,
  `active` enum('A','I','R') NOT NULL,
  `gurudwara_id` int(11) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `remark` text,
  `application_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_service_details`
--

INSERT INTO `td_service_details` (`id`, `generate_user_id`, `surname`, `givenname`, `gender`, `date_of_birth`, `birth_place`, `birth_country`, `nationality`, `previous_nationality`, `marital_status`, `religion`, `present_address`, `profession`, `father_name`, `father_nationality`, `father_prev_nationality`, `father_birth_country`, `mobile`, `email`, `other_info`, `active`, `gurudwara_id`, `purpose`, `remark`, `application_date`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'DSFDGF', 'DSFDGF', 'gvfdrdrg', 'M', '2012-08-10', 'sdfsg', '16', '18', '15', 'Divorced', 'dsgfdfgd', 'fxvfdgv', 'gdrfvd', 'fesfsf', '15', '16', '15', '345676645', 'dxfgdfhfhvgbhjfgj@q3rfrg.gf', 'gdrxghfdthyf', 'A', NULL, NULL, NULL, NULL, NULL, 'Admin', '2021-08-18 08:12:31', '2021-08-21 04:36:55'),
(2, 'abc145', 'sfbdgb', 'gbfhgdh', 'O', '2012-08-10', 'fdgbdfg', '18', '16', '18', 'Unmarried', 'dfgvdgdg', 'fdgvdgvdrgf', 'drgfedgf', 'drgfdrsgfser', '17', '13', '14', '4548855', 'test@gmail.com', 'rsgvergerg', 'A', 3, 'FINANCE', NULL, '2021-08-19', NULL, 'Admin', '2021-08-18 23:49:44', '2021-08-25 00:00:46'),
(3, '58985a093f0eb2ac1753300f686ce430', 'fgdhsfgd', 'gdhdh', 'O', '2021-02-10', 'fvgdfgvd', '16', '15', '17', 'Widowed', 'fxgbdhg', 'dfghftfrt', 'yhftyutry', 'gdhgtfh', '3', '3', '11', '45678', 'hgfxhfyj', 'fyhfyhfty', 'I', NULL, 'FAMILY DISPUTES', NULL, NULL, NULL, NULL, '2021-08-18 23:51:04', '2021-08-25 00:10:54'),
(4, 'd17e5794660d744df60ff3a6fe2aed39', 'sfgregtg', 'tget', 'F', '2012-05-10', 'rdgergegt', '14', '17', '17', 'Unmarried', 'ergtetgetg', 'dgetget', 'degvt', 'rdg', '18', '18', '15', '4545485', 'dfgdgt', 'fdgdgt', 'A', 3, 'FAMILY DISPUTES', NULL, '2021-08-19', NULL, NULL, '2021-08-18 23:52:36', '2021-08-25 00:16:31'),
(5, '12d2d59c3531262d41692e155951e16a', 'fgvdg', 'rdgrdgf', 'M', '2021-02-10', 'rsdgr', '3', '13', '2', 'Married', 'rdgvrre', 'gerregferfe', 'rsferfger', 'erferfef', '2', '16', '2', '56546546', 'xdfgdgf', 'sdgdgty', 'I', 3, NULL, NULL, NULL, NULL, NULL, '2021-08-18 23:54:15', '2021-08-24 23:55:09'),
(6, 'b42b2b758d115fdcc3109c2ffb27d87b', 'sfdgdg', 'fdzgdgf', 'M', '2021-02-10', 'sfgvdfzgv', '3', '16', '2', 'Unmarried', 'xfbvdfbdf', 'fdgvdfgvd', 'fgdgdgd', 'gfdsgdg', '4', '3', '14', '43567765', 'vdfgvdgvd', 'xfbgdfgvdf', 'I', 3, NULL, NULL, NULL, NULL, NULL, '2021-08-18 23:57:30', '2021-08-25 00:10:02'),
(7, 'aefa7bd889eb82aa6d258c82ce46d3e8', 'sfvgbd', 'bdfgdg', 'M', '2012-02-10', 'fgdrge', '1', '2', '2', 'Unmarried', 'fdbgvdbdg', 'fbdgbd', 'fdgzdgdg', 'fdgdg', '2', '2', '2', '56595956', 'fdgdgdgv', 'ffbgdfgd', 'A', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-19 00:02:39', '2021-08-19 00:02:39'),
(8, 'd8f66f249d2807afe5124be77607ad1d', 'sdfsf', 'rdgfrdfge', 'M', '2012-08-02', 'fgvd', '14', '15', '2', 'Unmarried', 'gfvrdzfgvd', 'fsgvdfsgv', 'dfgvfdsgv', 'dfgvdsf', '16', '1', '15', '54589548', 'fdgvzdfgvdgv', 'gvdfvdrfv', 'A', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-19 00:04:47', '2021-08-19 00:04:47'),
(9, '422a2fb6f5bf279b34efd6fa979f1309', 'sfvf', 'fdsvsvs', 'M', '2021-08-10', 'sfsrfg', '18', '19', '17', 'Unmarried', 'fdfdf', 'dsfdsf', 'fsdfsa', 'fsdfsf', '2', '16', '17', '54959851165', 'fvdgvd', 'dfsfsfsr', 'A', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-19 00:08:58', '2021-08-19 00:08:58'),
(10, 'abc145', 'sfbdgb', 'gbfhgdh', 'O', '2012-08-10', 'fdgbdfg', '18', '16', '18', 'Unmarried', 'dfgvdgdg', 'fdgvdgvdrgf', 'drgfedgf', 'drgfdrsgfser', '17', '13', '14', '4548855', 'grdgdrg', 'rsgvergerg', 'A', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-23 04:49:21', '2021-08-23 04:49:21'),
(11, 'abc145', 'sfbdgb', 'gbfhgdh', 'O', '2012-08-10', 'fdgbdfg', '18', '16', '18', 'Unmarried', 'dfgvdgdg', 'fdgvdgvdrgf', 'drgfedgf', 'drgfdrsgfser', '17', '13', '14', '4548855', 'grdgdrg', 'rsgvergerg', 'A', NULL, NULL, NULL, '2021-08-23', NULL, NULL, '2021-08-23 04:50:23', '2021-08-23 04:50:23'),
(12, 'abc145', 'sfbdgb', 'gbfhgdh', 'O', '2012-08-10', 'fdgbdfg', '18', '16', '18', 'Unmarried', 'dfgvdgdg', 'fdgvdgvdrgf', 'drgfedgf', 'drgfdrsgfser', '17', '13', '14', '4548855', 'grdgdrg', 'rsgvergerg', 'A', NULL, NULL, NULL, '2021-08-23', NULL, NULL, '2021-08-23 04:53:21', '2021-08-23 04:53:21'),
(13, 'abc145', 'sfbdgb', 'gbfhgdh', 'O', '2012-08-10', 'fdgbdfg', '18', '16', '18', 'Unmarried', 'dfgvdgdg', 'fdgvdgvdrgf', 'drgfedgf', 'drgfdrsgfser', '17', '13', '14', '4548855', 'grdgdrg', 'rsgvergerg test test', 'A', NULL, NULL, NULL, '2021-08-23', NULL, NULL, '2021-08-23 05:24:55', '2021-08-23 05:24:55'),
(14, '000004', 'sfgregtg', 'tget', 'F', '2012-05-10', 'rdgergegt', '14', '17', '17', 'Unmarried', 'ergtetgetg', 'dgetget', 'degvt', 'rdg', '18', '18', '15', '4545485', 'test@gmail.com', 'xcvxfb rdgdtytry', 'I', 3, NULL, NULL, '2021-08-25', NULL, NULL, '2021-08-25 01:00:43', '2021-08-25 01:00:43'),
(15, '000004', 'sfgregtg', 'tget', 'F', '2012-05-10', 'rdgergegt', '14', '17', '17', 'Unmarried', 'ergtetgetg', 'dgetget', 'degvt', 'rdg', '18', '18', '15', '4545485', 'test@gmail.com', 'test test info', 'I', 3, 'FINANCE', NULL, '2021-08-26', NULL, NULL, '2021-08-26 05:02:05', '2021-08-26 05:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `td_user_details`
--

CREATE TABLE `td_user_details` (
  `id` int(11) NOT NULL,
  `generate_user_id` varchar(50) DEFAULT NULL,
  `surname` varchar(50) NOT NULL,
  `givenname` varchar(50) NOT NULL,
  `gender` enum('M','F','O') NOT NULL,
  `date_of_birth` date NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `birth_country` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `previous_nationality` varchar(50) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `father_nationality` varchar(100) NOT NULL,
  `father_prev_nationality` varchar(50) NOT NULL,
  `father_birth_country` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `other_info` text NOT NULL,
  `active` enum('A','I','R') NOT NULL,
  `gurudwara_id` int(11) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `remark` text,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_user_details`
--

INSERT INTO `td_user_details` (`id`, `generate_user_id`, `surname`, `givenname`, `gender`, `date_of_birth`, `birth_place`, `birth_country`, `nationality`, `previous_nationality`, `marital_status`, `religion`, `present_address`, `profession`, `father_name`, `father_nationality`, `father_prev_nationality`, `father_birth_country`, `mobile`, `email`, `other_info`, `active`, `gurudwara_id`, `purpose`, `remark`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'DSFDGF', 'DSFDGF', 'gvfdrdrg', 'M', '2012-08-10', 'sdfsg', '16', '18', '15', 'Divorced', 'dsgfdfgd', 'fxvfdgv', 'gdrfvd', 'fesfsf', '15', '16', '15', '3456764', 'dxfgdfhfhvgbhjfgj@q3rfrg.gf', 'gdrxghfdthyf', 'A', NULL, NULL, NULL, NULL, 'Admin', '2021-08-18 08:12:31', '2021-08-21 04:36:55'),
(2, 'abc145', 'sfbdgb', 'gbfhgdh', 'O', '2012-08-10', 'fdgbdfg', '18', '16', '18', 'Unmarried', 'dfgvdgdg', 'fdgvdgvdrgf', 'drgfedgf', 'drgfdrsgfser', '17', '13', '14', '4548855', 'test@gmail.com', 'rsgvergerg', 'R', NULL, NULL, NULL, NULL, 'Admin', '2021-08-18 23:49:44', '2021-08-21 04:37:19'),
(3, '58985a093f0eb2ac1753300f686ce430', 'fgdhsfgd', 'gdhdh', 'O', '2021-02-10', 'fvgdfgvd', '16', '15', '17', 'Widowed', 'fxgbdhg', 'dfghftfrt', 'yhftyutry', 'gdhgtfh', '3', '3', '11', '45678', 'hgfxhfyj', 'fyhfyhfty', 'A', NULL, NULL, NULL, NULL, 'Admin', '2021-08-18 23:51:04', '2021-08-24 02:19:25'),
(4, '000004', 'sfgregtg', 'tget', 'F', '2012-05-10', 'rdgergegt', '14', '17', '17', 'Unmarried', 'ergtetgetg', 'dgetget', 'degvt', 'rdg', '18', '18', '15', '4545485', 'test1@gmail.com', 'fdgdgt', 'A', 3, NULL, NULL, NULL, NULL, '2021-08-18 23:52:36', '2021-08-24 04:21:44'),
(5, '12d2d59c3531262d41692e155951e16a', 'fgvdg', 'rdgrdgf', 'M', '2021-02-10', 'rsdgr', '3', '13', '2', 'Married', 'rdgvrre', 'gerregferfe', 'rsferfger', 'erferfef', '2', '16', '2', '56546546', 'xdfgdgf', 'sdgdgty', 'A', 3, NULL, NULL, NULL, NULL, '2021-08-18 23:54:15', '2021-08-24 06:57:19'),
(6, 'b42b2b758d115fdcc3109c2ffb27d87b', 'sfdgdg', 'fdzgdgf', 'M', '2021-02-10', 'sfgvdfzgv', '3', '16', '2', 'Unmarried', 'xfbvdfbdf', 'fdgvdfgvd', 'fgdgdgd', 'gfdsgdg', '4', '3', '14', '43567765', 'vdfgvdgvd', 'xfbgdfgvdf', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-18 23:57:30', '2021-08-18 23:57:30'),
(7, 'aefa7bd889eb82aa6d258c82ce46d3e8', 'sfvgbd', 'bdfgdg', 'M', '2012-02-10', 'fgdrge', '1', '2', '2', 'Unmarried', 'fdbgvdbdg', 'fbdgbd', 'fdgzdgdg', 'fdgdg', '2', '2', '2', '56595956', 'fdgdgdgv', 'ffbgdfgd', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-19 00:02:39', '2021-08-19 00:02:39'),
(8, 'd8f66f249d2807afe5124be77607ad1d', 'sdfsf', 'rdgfrdfge', 'M', '2012-08-02', 'fgvd', '14', '15', '2', 'Unmarried', 'gfvrdzfgvd', 'fsgvdfsgv', 'dfgvfdsgv', 'dfgvdsf', '16', '1', '15', '545891548', 'fdgvzdfgvdgv', 'gvdfvdrfv', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-19 00:04:47', '2021-08-19 00:04:47'),
(9, '422a2fb6f5bf279b34efd6fa979f1309', 'sfvf', 'fdsvsvs', 'M', '2021-08-10', 'sfsrfg', '18', '19', '17', 'Unmarried', 'fdfdf', 'dsfdsf', 'fsdfsa', 'fsdfsf', '2', '16', '17', '54959851165', 'fvdgvd', 'dfsfsfsr', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-19 00:08:58', '2021-08-19 00:08:58'),
(10, 'abc145', 'sfbdgb', 'gbfhgdh', 'O', '2012-08-10', 'fdgbdfg', '18', '16', '18', 'Unmarried', 'dfgvdgdg', 'fdgvdgvdrgf', 'drgfedgf', 'drgfdrsgfser', '17', '13', '14', '45488551', 'grdgdrg', 'rsgvergerg', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-23 04:49:21', '2021-08-23 04:49:21'),
(11, 'abc145', 'sfbdgb', 'gbfhgdh', 'O', '2012-08-10', 'fdgbdfg', '18', '16', '18', 'Unmarried', 'dfgvdgdg', 'fdgvdgvdrgf', 'drgfedgf', 'drgfdrsgfser', '17', '13', '14', '45148855', 'grdgdrg', 'rsgvergerg', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-23 04:50:23', '2021-08-23 04:50:23'),
(12, 'abc145', 'sfbdgb', 'gbfhgdh', 'O', '2012-08-10', 'fdgbdfg', '18', '16', '18', 'Unmarried', 'dfgvdgdg', 'fdgvdgvdrgf', 'drgfedgf', 'drgfdrsgfser', '17', '13', '14', '45418855', 'grdgdrg', 'rsgvergerg', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-23 04:53:21', '2021-08-23 04:53:21'),
(13, 'abc145', 'sfbdgb', 'gbfhgdh', 'O', '2012-08-10', 'fdgbdfg', '18', '16', '18', 'Unmarried', 'dfgvdgdg', 'fdgvdgvdrgf', 'drgfedgf', 'drgfdrsgfser', '17', '13', '14', '45488155', 'grdgdrg', 'rsgvergerg test test', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-23 05:24:55', '2021-08-23 05:24:55'),
(14, '4cac9137f0a8a8489604482c7c039cd3', 'tanmoy dada', 'fbgvfb', 'M', '2021-02-10', 'dfdsrgv', '15', '10', '17', 'Married', 'zdfbvzdfvbg', 'fdgvzdfgv', 'dfgvdf', 'dfzgvdf', '18', '17', '17', '155454854', 'dfgvdfgvd@ds.fdgv', 'ofhfvbgy ot', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 00:10:01', '2021-08-24 00:10:01'),
(15, NULL, 'dfgvfd', 'dfgvdfg', 'M', '2012-02-10', 'fdgvd', '17', '18', '18', 'Unmarried', 'fdd', 'dfvgdf', 'fxvfdvg', 'fdgvdf', '16', '17', '4', '55454', 'fvgfdgv', 'fdgvdgv', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 01:09:31', '2021-08-24 01:09:31'),
(16, NULL, 'xdfv', 'dfvdfzv', 'O', '2012-02-10', 'fvdf', '17', '16', '18', 'Married', 'xcvvfd', 'gbgfxhb', 'gfbgfbh', 'fdvgdfv', '2', '4', '13', '5545', 'fxvfdvdf', 'fdfvdf', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 01:14:40', '2021-08-24 01:14:40'),
(17, NULL, 'fdbvdfb', 'dfgvfdgv', 'M', '2012-02-10', 'fvdfv', '20', '16', '18', 'Married', 'fdvgfdv', 'fvfdzvgf', 'fdvdfvg', 'fdgvdfvg', '4', '4', '15', '5545', 'fdgvdgv', 'fdgvdgvd', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 01:15:55', '2021-08-24 01:15:55'),
(18, NULL, 'dsfvds', 'fdsvs', 'M', '2021-02-10', 'dfsvds', '21', '18', '18', 'Unmarried', 'sfds', 'dsfsf', 'dxfs', 'dsfvdsf', '16', '4', '16', '156565', 'dsfds@fgferg.sfrfee', 'sfrerfe', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 01:19:03', '2021-08-24 07:02:15'),
(19, '000019', 'fdgvdfg', 'fdgvdgv', 'F', '2021-02-10', 'fdgvdfgv', '18', '3', '16', 'Unmarried', 'fdgvdfzgv', 'fxvzdfgv', 'vzdfgvdzf', 'dxzfgvdfzg', '3', '16', '18', '65454', 'xsdfgd@refres.sgrfr', 'fxvdfzgv', 'A', 3, NULL, NULL, NULL, NULL, '2021-08-24 01:36:21', '2021-08-24 04:36:12'),
(20, '000020', 'tgbd', 'dfgdfgd', 'M', '2021-08-25', 'dfgvdg', '18', '20', '17', 'Married', 'fdgdg', 'dfgvdgv', 'dffgvrdgfe', 'rdgtre', '17', '5', '4', '5445848', 'dfgdgd@estsrt.fgdgd', 'sefsefrse', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 05:24:20', '2021-08-24 05:24:20'),
(21, '000021', 'dsfvs', 'sfsrf', 'M', '2021-08-10', 'dfgvrsf', '14', '16', '16', 'Married', 'rsdgfvrsgf', 'cbgfb', 'gf', 'gcbgfbh', '17', '17', '16', '155654', 'gbhgfhb', 'gfbhgfhbfg', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 05:26:17', '2021-08-24 05:26:17'),
(22, '000022', 'sdfsf', 'dsfsf', 'M', '2021-08-18', 'sfsf', '12', '14', '16', 'Unmarried', 'dsfvsdzv', 'sdfvsfgv', 'dsfsf', 'dsfsf', '17', '15', '16', '448565', 'sfsf', 'esfaeswf', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 05:30:43', '2021-08-24 05:30:43'),
(23, '000023', 'fdgvd', 'fdgvdgfe', 'M', '2021-08-10', 'fdgbvdfg', '18', '21', '15', 'Unmarried', 'fdgvdrgv', 'bdrgvde', 'dfgve', 'rdgfvdrg', '3', '4', '3', '2615', 'zdfgvdg', 'dfzgvdg', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 05:34:14', '2021-08-24 05:34:14'),
(24, '000024', 'fxvfdgv', 'fdsgvsd', 'M', '2021-08-04', 'fvdzfgv', '12', '17', '15', 'Unmarried', 'fgvfdgv', 'dxvfdzgvd', 'dgvdfxgvd', 'grdgfvdr', '17', '15', '15', '46954854', 'fsgvevedr', 'fsdfvrger', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 05:35:32', '2021-08-24 05:35:32'),
(25, '000025', 'dfgvd', 'dfgvdeg', 'M', '2021-07-28', 'rdsgfvrv', '14', '14', '15', 'Married', 'fdgvdg', 'fdgvdgvd', 'knnnk', 'nnkjm', '19', '17', '18', '15455', 'drsgfv', 'drgvdr', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 05:38:13', '2021-08-24 05:38:13'),
(26, '000026', 'zvsfdv', 'sfdf', 'F', '2021-08-02', 'dsfsfs', '10', '15', '16', 'Married', 'fdvsdfds', 'dfsvdsv', 'dsfsds', 'sefsefsw', '3', '15', '18', '161654', 'fddsds', 'sfsfsfsf', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 05:42:29', '2021-08-24 05:42:29'),
(27, '000027', 'dfdsf', 'ffsf', 'M', '2021-08-02', 'sdfsf', '10', '14', '13', 'Married', 'sfsff', 'dsfvsdf', 'dsffsf', 'sdffsf', '12', '13', '15', '614545451', 'sdfs@tsrgrs.fxdgfs', 'sdfgdrsgfegf', 'A', NULL, NULL, NULL, NULL, NULL, '2021-08-24 05:45:57', '2021-08-24 05:45:57'),
(28, '000028', 'test title', 'test name', 'M', '2021-08-10', 'egra', '2', '2', '2', 'Married', 'sfrergfve', 'home address', 'php developer', 'H maity', '2', '2', '2', '478545126', 'cmaity905@gmail.com', 'other test', 'I', NULL, NULL, NULL, NULL, NULL, '2021-08-24 23:30:41', '2021-08-24 23:30:41'),
(29, '000029', 'dfgdg', 'dfgdgtr', 'M', '2021-07-26', 'dfgvfdgvdr', '13', '14', '15', 'Married', 'dfgdrf', 'fdgdrf', 'dfzggvet', 'sdfsef', '14', '17', '20', '45545454', 'dfgdgfhb@cfgdtyh.drgdrg', 'xfgdfdfthf', 'I', NULL, NULL, NULL, NULL, NULL, '2021-08-26 02:15:53', '2021-08-26 02:15:53'),
(30, '000030', 'vfdgvfdgvdrf', 'fdgdfgg', 'M', '2021-08-30', 'xfgvfdgvd', '2', '2', '2', 'Married', 'dsfvdsgdsfrgv', 'fgfgrf', 'dfssrf', 'sfsrfr', '2', '2', '2', '2555262', 'dsfgdf@egsh.rrtrdt', 'fesrfewtfretfre', 'I', NULL, NULL, NULL, NULL, NULL, '2021-09-01 00:18:49', '2021-09-01 00:18:49'),
(31, '000031', 'xvbffdv', 'fvgfdgv', 'M', '2021-07-26', 'fgvdfgr', '2', '2', '2', 'Married', 'dfvdgvdv', 'fxvfdgd', 'dvfdvfv', 'dfdsdr', '2', '2', '2', '5258521', 'ffdggf@esgshg.ftgdf', 'dfgvdgdf', 'I', NULL, NULL, NULL, NULL, NULL, '2021-09-01 02:32:31', '2021-09-01 02:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `td_user_family_details`
--

CREATE TABLE `td_user_family_details` (
  `id` int(11) NOT NULL,
  `user_details_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('M','F','O') NOT NULL,
  `relation` varchar(50) NOT NULL,
  `current_citizenship` varchar(50) DEFAULT NULL,
  `previous_citizenship` varchar(50) DEFAULT NULL,
  `passport_no` varchar(50) DEFAULT NULL,
  `passport_date_of_issue` varchar(50) DEFAULT NULL,
  `passport_date_of_expiry` varchar(50) DEFAULT NULL,
  `other_doc_1` varchar(100) DEFAULT NULL,
  `other_doc_2` varchar(100) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_user_family_details`
--

INSERT INTO `td_user_family_details` (`id`, `user_details_id`, `email`, `first_name`, `middle_name`, `last_name`, `gender`, `relation`, `current_citizenship`, `previous_citizenship`, `passport_no`, `passport_date_of_issue`, `passport_date_of_expiry`, `other_doc_1`, `other_doc_2`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 9, NULL, 'dxgfvsgv', 'dfvfdgv', 'sfsf', 'M', 'Father', '16', '4', 'fbdfgvdzf', 'fesfesf', 'faefaed', 'fsdfsf', 'fsfsf', 'fdsvsvs', NULL, '2021-08-19 00:08:58', '2021-08-19 00:08:58'),
(2, 2, NULL, 'daf', 'fsefsef', 'esfsf', 'M', 'Father', '17', '17', 'ee34tt', '2021-02-12', '2021-02-12', 'sfrewrw', 'sdegtrstge', NULL, NULL, '2021-08-23 06:31:46', '2021-08-23 06:31:46'),
(3, 2, 'aefer@srgdth.drtd', 'daf', 'fsefsef', 'esfsf', 'M', 'Father', '17', '17', 'ee34tt', '2021-02-12', '2021-02-12', 'sfrewrw', 'sdegtrstge', NULL, NULL, '2021-08-23 06:32:20', '2021-08-23 06:32:20'),
(4, 28, 'test1@gmail.com', 'Hiralal', NULL, 'Maity', 'M', 'Father', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test name', NULL, '2021-08-24 23:30:41', '2021-08-24 23:30:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `md_country`
--
ALTER TABLE `md_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_user_login`
--
ALTER TABLE `md_user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `td_birth_details`
--
ALTER TABLE `td_birth_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_death_details`
--
ALTER TABLE `td_death_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_gurudwara_details`
--
ALTER TABLE `td_gurudwara_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_gurudwara_member`
--
ALTER TABLE `td_gurudwara_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_marriage_details`
--
ALTER TABLE `td_marriage_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_service_details`
--
ALTER TABLE `td_service_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_user_details`
--
ALTER TABLE `td_user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_user_family_details`
--
ALTER TABLE `td_user_family_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `md_country`
--
ALTER TABLE `md_country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
--
-- AUTO_INCREMENT for table `md_user_login`
--
ALTER TABLE `md_user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `td_birth_details`
--
ALTER TABLE `td_birth_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_death_details`
--
ALTER TABLE `td_death_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `td_gurudwara_member`
--
ALTER TABLE `td_gurudwara_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `td_marriage_details`
--
ALTER TABLE `td_marriage_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `td_service_details`
--
ALTER TABLE `td_service_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `td_user_details`
--
ALTER TABLE `td_user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `td_user_family_details`
--
ALTER TABLE `td_user_family_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
