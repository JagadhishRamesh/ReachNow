-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 08:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: reachnow
--

-- --------------------------------------------------------

--
-- Table structure for table admin
--

CREATE TABLE admin (
  adminid int(11) NOT NULL,
  adminname varchar(255) NOT NULL,
  adminpwd varchar(255) NOT NULL,
  timezones varchar(100) DEFAULT 'UTC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table admin
--

INSERT INTO admin (adminid, adminname, adminpwd, timezones) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'UTC'),
(2, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'UTC'),
(3, 'mason', '5c29c2e513aadfe372fd0af7553b5a6c', 'UTC'),
(4, 'sophia', '2ee0272b8e1a9705dc3ebe91c10b32f4', 'UTC'),
(5, 'william', 'fd820a2b4461bddd116c1518bc4b0f77', 'UTC');

-- --------------------------------------------------------

--
-- Table structure for table new_query
--

CREATE TABLE new_query (
  queryid int(11) NOT NULL,
  query_description text NOT NULL,
  affecting_people int(11) UNSIGNED NOT NULL,
  user_id int(10) UNSIGNED DEFAULT NULL,
  current_utc_time datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table new_query
--

INSERT INTO new_query (queryid, query_description, affecting_people, user_id, current_utc_time) VALUES
(1, 'Hospital Management ordered 355 masks to the B-Block. But we received only 300 Masks.\r\nKindly check this issue', 50, 4, '2020-07-03 09:30:02'),
(2, '\r\nShortage of Medical ventilators at A-Block.\r\nIf this situation continues for more than a week, Patients may suffer.', 25, 1, '2020-08-12 11:30:02'),
(3, 'We received 3 sets of PPE kits from Medicare industries. \r\nFirst two sets of kits are good. But the quality of the third set is not good.', 25, 2, '2020-08-10 03:48:49'),
(4, 'I suggest to move some of the patients from A to B or D Block.\r\nSo, we can manage the patients easily.\r\n\r\nBed allocated details:\r\n\r\nA-Block - 25/30\r\nB-Block - 05/30\r\nC-Block - 17/30\r\nD-Block - 07/30\r\nE-Block - 28/30\r\nE-Block - 13/30', 5, 3, '2020-08-01 06:15:28'),
(5, '\r\nHospital is still continuing to care for its tuberculosis patients.\r\nReports said that many patients have not been able to access treatment fot TB during this crisis', 50, 1, '2020-07-25 02:34:01'),
(6, 'I need a different exists and entry-points for Covid and non-Covid patients.', 1, 3, '2020-06-14 01:58:25'),
(7, 'D-Block does not have non-invasive ventilation oxygen support.\r\nThis may be need for us to treat the NIV support diseases.', 25, 2, '2020-07-18 09:04:55'),
(8, 'One Computer system is not working in hospital billing department.', 1, 5, '2020-08-05 10:18:19'),
(9, 'Not everyone is screened for COVID-19 symptoms at Operating room.\r\nThis may increase the risk factor as they enter our rooms.', 5, 3, '2020-08-03 08:15:46'),
(10, 'Staff members at the reception are not wearing the masks.\r\nThis may lead to increase the spread of the disease.', 5, 2, '2020-07-28 04:10:15');

-- --------------------------------------------------------

--
-- Table structure for table new_user_requests
--

CREATE TABLE new_user_requests (
  requestid int(11) NOT NULL,
  name varchar(255) NOT NULL,
  pwd varchar(255) NOT NULL,
  email varchar(50) NOT NULL,
  phone_number varchar(20) NOT NULL,
  comments text NOT NULL,
  approver_remarks text DEFAULT 'Pending',
  status varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table new_user_requests
--

INSERT INTO new_user_requests (requestid, name, pwd, email, phone_number, comments, approver_remarks, status) VALUES
(1, 'John', '61409aa1fd47d4a5332de23cbf59a36f', 'john@gmail.com', '8367286581', 'Hi Team, \r\n\r\nI am John.I am working as pediatrician at C-Block. \r\nMy Company ID is : H75785.\r\nPlease verify my identity and give the access to ReachNow.\r\n\r\nThank you\r\n\r\nYours sincerely\r\nMr. John', 'Have validated the identity and access granted to ReachNow', 'Approved'),
(2, 'Isabella', '194cd2f711cebc782ada13e259bf61dd', 'isabella@outlook.com', '8825385178', 'Hi Admin, \r\n\r\nI am Isabella, Psychiatrist at F-Block. \r\nMy Company ID is : H52861.\r\nKindly provide the access to ReachNow.\r\n\r\nThank you', 'Have validated the identity and access granted to ReachNow', 'Approved'),
(3, 'Justin', '06475174d922e7dcbb3ed34c0236dbdf', 'justin@outlook.com', '9751672450', 'Hi all, \r\n\r\nThis is Justin, Inpatient at B-Block. \r\nMy Application number is : APP8617356.\r\nPlease provide the access to ReachNow.\r\n\r\nThank you', 'Have validated the identity and access granted to ReachNow', 'Approved'),
(4, 'Victoria', 'dfee9e39474b6e292d66c7facba668e1', 'victoria@yahoo.com', '93621796429', 'Hi, \r\n\r\nI am Victoria, Cardiologist at B-Block. \r\nMy Company ID : H75389.\r\nPlease provide the access to ReachNow.\r\n\r\nThank you', 'Have validated the identity and access granted to ReachNow', 'Approved'),
(5, 'Kevin', 'f1cd318e412b5f7226e5f377a9544ff7', 'kevin@yahoo.com', '9572582178', 'Hi, \r\n\r\nThis is Kevin, Outpatient Taken care by Isabella. \r\nMy Application ID : APP6489321.\r\nI need access to ReachNow. Kindly do the needful for me.\r\n\r\nThank you', 'Have validated the identity and access granted to ReachNow', 'Approved'),
(6, 'Alexis', '79162b02a4adef009a7d8214aaaafec5', 'alexis@yahoo.com', '9538752329', 'Hi team, \r\n\r\nThis is Alexis. I need access to ReachNow.\r\n\r\nThank you', 'Pending', 'Pending'),
(7, 'Sean', '40d18d5a7ae85f9597a40f1306041fd1', 'seanreiley@gmail.com', '78356719064', 'Hi team, \r\n\r\nThis is Sean. I am Inpatient at G-Block.\r\nMy Application ID: APP64291\r\nI need access to ReachNow.\r\n\r\nThank you', 'Pending', 'Pending'),
(8, 'Jessica', '88e11caee979ba2bf6c1aa459b2cd77b', 'jessicaIvan@oulook.com', '7432781342', 'Hi all, \r\n\r\nThis is Jessica.I need access to ReachNow.\r\n\r\nThank you', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table reported_queries
--

CREATE TABLE reported_queries (
  queryid int(11) DEFAULT NULL,
  reported_users varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table reported_queries
--

INSERT INTO reported_queries (queryid, reported_users) VALUES
(3, '5.1.'),
(1, '2.'),
(9, '2.1.5.');

-- --------------------------------------------------------

--
-- Table structure for table report_threshold
--

CREATE TABLE report_threshold (
  threshold_size int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table report_threshold
--

INSERT INTO report_threshold (threshold_size) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table timezones
--

CREATE TABLE timezones (
  zoneid int(11) NOT NULL,
  zone varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table timezones
--

INSERT INTO timezones (zoneid, zone) VALUES
(1, 'Asia/Aden'),
(2, 'Asia/Almaty'),
(3, 'Asia/Amman'),
(4, 'Asia/Anadyr'),
(5, 'Asia/Aqtau'),
(6, 'Asia/Aqtobe'),
(7, 'Asia/Ashgabat'),
(8, 'Asia/Atyrau'),
(9, 'Asia/Baghdad'),
(10, 'Asia/Bahrain'),
(11, 'Asia/Baku'),
(12, 'Asia/Bangkok'),
(13, 'Asia/Barnaul'),
(14, 'Asia/Beirut'),
(15, 'Asia/Bishkek'),
(16, 'Asia/Brunei'),
(17, 'Asia/Chita'),
(18, 'Asia/Choibalsan'),
(19, 'Asia/Colombo'),
(20, 'Asia/Damascus'),
(21, 'Asia/Dhaka'),
(22, 'Asia/Dili'),
(23, 'Asia/Dubai'),
(24, 'Asia/Dushanbe'),
(25, 'Asia/Famagusta'),
(26, 'Asia/Gaza'),
(27, 'Asia/Hebron'),
(28, 'Asia/Ho_Chi_Minh'),
(29, 'Asia/Hong_Kong'),
(30, 'Asia/Hovd'),
(31, 'Asia/Irkutsk'),
(32, 'Asia/Jakarta'),
(33, 'Asia/Jayapura'),
(34, 'Asia/Jerusalem'),
(35, 'Asia/Kabul'),
(36, 'Asia/Kamchatka'),
(37, 'Asia/Karachi'),
(38, 'Asia/Kathmandu'),
(39, 'Asia/Khandyga'),
(40, 'Asia/Kolkata'),
(41, 'Asia/Krasnoyarsk'),
(42, 'Asia/Kuala_Lumpur'),
(43, 'Asia/Kuching'),
(44, 'Asia/Kuwait'),
(45, 'Asia/Macau'),
(46, 'Asia/Magadan'),
(47, 'Asia/Makassar'),
(48, 'Asia/Manila'),
(49, 'Asia/Muscat'),
(50, 'Asia/Nicosia'),
(51, 'Asia/Novokuznetsk'),
(52, 'Asia/Novosibirsk'),
(53, 'Asia/Omsk'),
(54, 'Asia/Oral'),
(55, 'Asia/Phnom_Penh'),
(56, 'Asia/Pontianak'),
(57, 'Asia/Pyongyang'),
(58, 'Asia/Qatar'),
(59, 'Asia/Qostanay'),
(60, 'Asia/Qyzylorda'),
(61, 'Asia/Riyadh'),
(62, 'Asia/Sakhalin'),
(63, 'Asia/Samarkand'),
(64, 'Asia/Seoul'),
(65, 'Asia/Shanghai'),
(66, 'Asia/Singapore'),
(67, 'Asia/Srednekolymsk'),
(68, 'Asia/Taipei'),
(69, 'Asia/Tashkent'),
(70, 'Asia/Tbilisi'),
(71, 'Asia/Tehran'),
(72, 'Asia/Thimphu'),
(73, 'Asia/Tokyo'),
(74, 'Asia/Tomsk'),
(75, 'Asia/Ulaanbaatar'),
(76, 'Asia/Urumqi'),
(77, 'Asia/Ust-Nera'),
(78, 'Asia/Vientiane'),
(79, 'Asia/Vladivostok'),
(80, 'Asia/Yakutsk'),
(81, 'Asia/Yangon'),
(82, 'Asia/Yekaterinburg'),
(83, 'Asia/Yerevan'),
(84, 'Africa/Abidjan'),
(85, 'Africa/Accra'),
(86, 'Africa/Addis_Ababa'),
(87, 'Africa/Algiers'),
(88, 'Africa/Asmara'),
(89, 'Africa/Bamako'),
(90, 'Africa/Bangui'),
(91, 'Africa/Banjul'),
(92, 'Africa/Bissau'),
(93, 'Africa/Blantyre'),
(94, 'Africa/Brazzaville'),
(95, 'Africa/Bujumbura'),
(96, 'Africa/Cairo'),
(97, 'Africa/Casablanca'),
(98, 'Africa/Ceuta'),
(99, 'Africa/Conakry'),
(100, 'Africa/Dakar'),
(101, 'Africa/Dar_es_Salaam'),
(102, 'Africa/Djibouti'),
(103, 'Africa/Douala'),
(104, 'Africa/El_Aaiun'),
(105, 'Africa/Freetown'),
(106, 'Africa/Gaborone'),
(107, 'Africa/Harare'),
(108, 'Africa/Johannesburg'),
(109, 'Africa/Juba'),
(110, 'Africa/Kampala'),
(111, 'Africa/Khartoum'),
(112, 'Africa/Kigali'),
(113, 'Africa/Kinshasa'),
(114, 'Africa/Lagos'),
(115, 'Africa/Libreville'),
(116, 'Africa/Lome'),
(117, 'Africa/Luanda'),
(118, 'Africa/Lubumbashi'),
(119, 'Africa/Lusaka'),
(120, 'Africa/Malabo'),
(121, 'Africa/Maputo'),
(122, 'Africa/Maseru'),
(123, 'Africa/Mbabane'),
(124, 'Africa/Mogadishu'),
(125, 'Africa/Monrovia'),
(126, 'Africa/Nairobi'),
(127, 'Africa/Ndjamena'),
(128, 'Africa/Niamey'),
(129, 'Africa/Nouakchott'),
(130, 'Africa/Ouagadougou'),
(131, 'Africa/Porto-Novo'),
(132, 'Africa/Sao_Tome'),
(133, 'Africa/Tripoli'),
(134, 'Africa/Tunis'),
(135, 'Africa/Windhoek'),
(136, 'America/Adak'),
(137, 'America/Anchorage'),
(138, 'America/Anguilla'),
(139, 'America/Antigua'),
(140, 'America/Araguaina'),
(141, 'America/Argentina/Buenos_Aires'),
(142, 'America/Argentina/Catamarca'),
(143, 'America/Argentina/Cordoba'),
(144, 'America/Argentina/Jujuy'),
(145, 'America/Argentina/La_Rioja'),
(146, 'America/Argentina/Mendoza'),
(147, 'America/Argentina/Rio_Gallegos'),
(148, 'America/Argentina/Salta'),
(149, 'America/Argentina/San_Juan'),
(150, 'America/Argentina/San_Luis'),
(151, 'America/Argentina/Tucuman'),
(152, 'America/Argentina/Ushuaia'),
(153, 'America/Aruba'),
(154, 'America/Asuncion'),
(155, 'America/Atikokan'),
(156, 'America/Bahia'),
(157, 'America/Bahia_Banderas'),
(158, 'America/Barbados'),
(159, 'America/Belem'),
(160, 'America/Belize'),
(161, 'America/Blanc-Sablon'),
(162, 'America/Boa_Vista'),
(163, 'America/Bogota'),
(164, 'America/Boise'),
(165, 'America/Cambridge_Bay'),
(166, 'America/Campo_Grande'),
(167, 'America/Cancun'),
(168, 'America/Caracas'),
(169, 'America/Cayenne'),
(170, 'America/Cayman'),
(171, 'America/Chicago'),
(172, 'America/Chihuahua'),
(173, 'America/Costa_Rica'),
(174, 'America/Creston'),
(175, 'America/Cuiaba'),
(176, 'America/Curacao'),
(177, 'America/Danmarkshavn'),
(178, 'America/Dawson'),
(179, 'America/Dawson_Creek'),
(180, 'America/Denver'),
(181, 'America/Detroit'),
(182, 'America/Dominica'),
(183, 'America/Edmonton'),
(184, 'America/Eirunepe'),
(185, 'America/El_Salvador'),
(186, 'America/Fort_Nelson'),
(187, 'America/Fortaleza'),
(188, 'America/Glace_Bay'),
(189, 'America/Goose_Bay'),
(190, 'America/Grand_Turk'),
(191, 'America/Grenada'),
(192, 'America/Guadeloupe'),
(193, 'America/Guatemala'),
(194, 'America/Guayaquil'),
(195, 'America/Guyana'),
(196, 'America/Halifax'),
(197, 'America/Havana'),
(198, 'America/Hermosillo'),
(199, 'America/Indiana/Indianapolis'),
(200, 'America/Indiana/Knox'),
(201, 'America/Indiana/Marengo'),
(202, 'America/Indiana/Petersburg'),
(203, 'America/Indiana/Tell_City'),
(204, 'America/Indiana/Vevay'),
(205, 'America/Indiana/Vincennes'),
(206, 'America/Indiana/Winamac'),
(207, 'America/Inuvik'),
(208, 'America/Iqaluit'),
(209, 'America/Jamaica'),
(210, 'America/Juneau'),
(211, 'America/Kentucky/Louisville'),
(212, 'America/Kentucky/Monticello'),
(213, 'America/Kralendijk'),
(214, 'America/La_Paz'),
(215, 'America/Lima'),
(216, 'America/Los_Angeles'),
(217, 'America/Lower_Princes'),
(218, 'America/Maceio'),
(219, 'America/Managua'),
(220, 'America/Manaus'),
(221, 'America/Marigot'),
(222, 'America/Martinique'),
(223, 'America/Matamoros'),
(224, 'America/Mazatlan'),
(225, 'America/Menominee'),
(226, 'America/Merida'),
(227, 'America/Metlakatla'),
(228, 'America/Mexico_City'),
(229, 'America/Miquelon'),
(230, 'America/Moncton'),
(231, 'America/Monterrey'),
(232, 'America/Montevideo'),
(233, 'America/Montserrat'),
(234, 'America/Nassau'),
(235, 'America/New_York'),
(236, 'America/Nipigon'),
(237, 'America/Nome'),
(238, 'America/Noronha'),
(239, 'America/North_Dakota/Beulah'),
(240, 'America/North_Dakota/Center'),
(241, 'America/North_Dakota/New_Salem'),
(242, 'America/Nuuk'),
(243, 'America/Ojinaga'),
(244, 'America/Panama'),
(245, 'America/Pangnirtung'),
(246, 'America/Paramaribo'),
(247, 'America/Phoenix'),
(248, 'America/Port-au-Prince'),
(249, 'America/Port_of_Spain'),
(250, 'America/Porto_Velho'),
(251, 'America/Puerto_Rico'),
(252, 'America/Punta_Arenas'),
(253, 'America/Rainy_River'),
(254, 'America/Rankin_Inlet'),
(255, 'America/Recife'),
(256, 'America/Regina'),
(257, 'America/Resolute'),
(258, 'America/Rio_Branco'),
(259, 'America/Santarem'),
(260, 'America/Santiago'),
(261, 'America/Santo_Domingo'),
(262, 'America/Sao_Paulo'),
(263, 'America/Scoresbysund'),
(264, 'America/Sitka'),
(265, 'America/St_Barthelemy'),
(266, 'America/St_Johns'),
(267, 'America/St_Kitts'),
(268, 'America/St_Lucia'),
(269, 'America/St_Thomas'),
(270, 'America/St_Vincent'),
(271, 'America/Swift_Current'),
(272, 'America/Tegucigalpa'),
(273, 'America/Thule'),
(274, 'America/Thunder_Bay'),
(275, 'America/Tijuana'),
(276, 'America/Toronto'),
(277, 'America/Tortola'),
(278, 'America/Vancouver'),
(279, 'America/Whitehorse'),
(280, 'America/Winnipeg'),
(281, 'America/Yakutat'),
(282, 'America/Yellowknife'),
(283, 'Antarctica/Casey'),
(284, 'Antarctica/Davis'),
(285, 'Antarctica/DumontDUrville'),
(286, 'Antarctica/Macquarie'),
(287, 'Antarctica/Mawson'),
(288, 'Antarctica/McMurdo'),
(289, 'Antarctica/Palmer'),
(290, 'Antarctica/Rothera'),
(291, 'Antarctica/Syowa'),
(292, 'Antarctica/Troll'),
(293, 'Antarctica/Vostok'),
(294, 'Australia/Adelaide'),
(295, 'Australia/Brisbane'),
(296, 'Australia/Broken_Hill'),
(297, 'Australia/Currie'),
(298, 'Australia/Darwin'),
(299, 'Australia/Eucla'),
(300, 'Australia/Hobart'),
(301, 'Australia/Lindeman'),
(302, 'Australia/Lord_Howe'),
(303, 'Australia/Melbourne'),
(304, 'Australia/Perth'),
(305, 'Australia/Sydney'),
(306, 'Atlantic/Azores'),
(307, 'Atlantic/Bermuda'),
(308, 'Atlantic/Canary'),
(309, 'Atlantic/Cape_Verde'),
(310, 'Atlantic/Faroe'),
(311, 'Atlantic/Madeira'),
(312, 'Atlantic/Reykjavik'),
(313, 'Atlantic/South_Georgia'),
(314, 'Atlantic/St_Helena'),
(315, 'Atlantic/Stanley'),
(316, 'Arctic/Longyearbyen'),
(317, 'Pacific/Apia'),
(318, 'Pacific/Auckland'),
(319, 'Pacific/Bougainville'),
(320, 'Pacific/Chatham'),
(321, 'Pacific/Chuuk'),
(322, 'Pacific/Easter'),
(323, 'Pacific/Efate'),
(324, 'Pacific/Enderbury'),
(325, 'Pacific/Fakaofo'),
(326, 'Pacific/Fiji'),
(327, 'Pacific/Funafuti'),
(328, 'Pacific/Galapagos'),
(329, 'Pacific/Gambier'),
(330, 'Pacific/Guadalcanal'),
(331, 'Pacific/Guam'),
(332, 'Pacific/Honolulu'),
(333, 'Pacific/Kiritimati'),
(334, 'Pacific/Kosrae'),
(335, 'Pacific/Kwajalein'),
(336, 'Pacific/Majuro'),
(337, 'Pacific/Marquesas'),
(338, 'Pacific/Midway'),
(339, 'Pacific/Nauru'),
(340, 'Pacific/Niue'),
(341, 'Pacific/Norfolk'),
(342, 'Pacific/Noumea'),
(343, 'Pacific/Pago_Pago'),
(344, 'Pacific/Palau'),
(345, 'Pacific/Pitcairn'),
(346, 'Pacific/Pohnpei'),
(347, 'Pacific/Port_Moresby'),
(348, 'Pacific/Rarotonga'),
(349, 'Pacific/Saipan'),
(350, 'Pacific/Tahiti'),
(351, 'Pacific/Tarawa'),
(352, 'Pacific/Tongatapu'),
(353, 'Pacific/Wake'),
(354, 'Pacific/Wallis');

-- --------------------------------------------------------

--
-- Table structure for table users
--

CREATE TABLE users (
  userid int(10) UNSIGNED NOT NULL,
  username varchar(100) NOT NULL,
  userpwd varchar(100) NOT NULL,
  timezone varchar(100) DEFAULT 'UTC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table users
--

INSERT INTO users (userid, username, userpwd, timezone) VALUES
(1, 'John', '61409aa1fd47d4a5332de23cbf59a36f', 'UTC'),
(2, 'Isabella', '194cd2f711cebc782ada13e259bf61dd', 'UTC'),
(3, 'Justin', '06475174d922e7dcbb3ed34c0236dbdf', 'UTC'),
(4, 'Victoria', 'dfee9e39474b6e292d66c7facba668e1', 'UTC'),
(5, 'Kevin', 'f1cd318e412b5f7226e5f377a9544ff7', 'UTC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table admin
--
ALTER TABLE admin
  ADD PRIMARY KEY (adminid);

--
-- Indexes for table new_query
--
ALTER TABLE new_query
  ADD PRIMARY KEY (queryid),
  ADD KEY FK_userid (user_id);

--
-- Indexes for table new_user_requests
--
ALTER TABLE new_user_requests
  ADD PRIMARY KEY (requestid),
  ADD UNIQUE KEY phone_number (phone_number);

--
-- Indexes for table reported_queries
--
ALTER TABLE reported_queries
  ADD KEY queryid (queryid);

--
-- Indexes for table timezones
--
ALTER TABLE timezones
  ADD PRIMARY KEY (zoneid);

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (userid);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table admin
--
ALTER TABLE admin
  MODIFY adminid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table new_query
--
ALTER TABLE new_query
  MODIFY queryid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table new_user_requests
--
ALTER TABLE new_user_requests
  MODIFY requestid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table timezones
--
ALTER TABLE timezones
  MODIFY zoneid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=355;

--
-- AUTO_INCREMENT for table users
--
ALTER TABLE users
  MODIFY userid int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table new_query
--
ALTER TABLE new_query
  ADD CONSTRAINT FK_userid FOREIGN KEY (user_id) REFERENCES users (userid);

--
-- Constraints for table reported_queries
--
ALTER TABLE reported_queries
  ADD CONSTRAINT reported_queries_ibfk_1 FOREIGN KEY (queryid) REFERENCES new_query (queryid);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
