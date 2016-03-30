-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2016 at 09:22 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yuva_parivartan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dependants`
--

CREATE TABLE IF NOT EXISTS `dependants` (
  `id` int(11) NOT NULL,
  `center_list` text NOT NULL,
  `partner_list` text NOT NULL,
  `state_list` text NOT NULL,
  `district_list` text NOT NULL,
  `users_id` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dependants`
--

INSERT INTO `dependants` (`id`, `center_list`, `partner_list`, `state_list`, `district_list`, `users_id`) VALUES
(1, '["3"]', '["3"]', '["1"]', '["1"]', ''),
(2, '["2","3"]', '["3"]', '["1"]', '["1"]', '55'),
(3, '["3"]', '["3"]', '["1"]', '["1"]', '''24'''),
(4, '["1","2","3","4","5","6","7","8","9","10","11","12","13","14","16","20","21","22","23","24","26","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","57","58","59","60","61","62","63","64"]', '["1","2","3","4","5","6","7","8","9","10","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42"]', '["2","3","4","5","6","7","8","9","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42"]', '["2","3","4","5","6","7","8","9","10"]', '24'),
(5, '["3"]', '["3"]', '["1"]', '["1"]', '33'),
(6, '["3"]', '["3"]', '["1"]', '["1"]', '34'),
(7, '["1","2","3"]', '["2","3"]', '["1","2"]', '["1","2"]', '36'),
(8, '["3"]', '["3"]', '["1"]', '["1"]', '37'),
(9, '["1"]', '["2"]', '["2"]', '["2"]', '38'),
(10, '["3"]', '["3"]', '["1"]', '["1"]', '39'),
(11, '', '', '["1"]', '', '41'),
(12, '["1"]', '["1"]', '["1"]', '["1"]', '17'),
(13, '["1","2"]', '["1"]', '["1"]', '["1","2"]', '18'),
(14, '["1"]', '["1"]', '["1"]', '["1"]', '19'),
(15, '["1","2"]', '["1","2"]', '["1","2"]', '["1","2","3","4"]', '20'),
(16, '["1","2","3","4","5","6","7","8","9","10","11","12","13","14","16","20","21","22","23","24","26","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","57","58","59","60","61","62","63","64"]', '["1","2","3","4","5","6","7","8","9","10","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42"]', '["2","3","4","5","6","7","8","9","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41"]', '["2","3","4","5","6","7","8","9","10"]', '1'),
(17, '["1","3","4","31","62"]', '["2","23","43"]', '["5","7","9","10","11","12","13","14","15","16","17"]', '["8","10"]', '3'),
(18, '["1"]', '["1","2","3","4","5","6","7","8","9","10","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42"]', '["2","3","4","5","6","7","8","9","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41"]', '["2","3","4","5","6","7","8","9","10"]', '21'),
(19, '["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","26","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","57","58","59","60","61","62","63","64","65"]', '["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","53"]', '["1","2","3","4","5","6","7","8","9","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41"]', '["1","2","3","4","5","6","7","8","9","10","11"]', '22'),
(20, '["15"]', '["11"]', '["1"]', '["1"]', '23');

-- --------------------------------------------------------

--
-- Table structure for table `page_authentications`
--

CREATE TABLE IF NOT EXISTS `page_authentications` (
  `id` int(11) NOT NULL,
  `authentication` varchar(100) NOT NULL,
  `approve_to` varchar(100) NOT NULL,
  `level_id` varchar(100) NOT NULL,
  `notify_to` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=389 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_authentications`
--

INSERT INTO `page_authentications` (`id`, `authentication`, `approve_to`, `level_id`, `notify_to`) VALUES
(27, 'users/create', '', '2', '[]'),
(28, 'users/update', '', '2', '[]'),
(29, 'users/index', '', '2', '[]'),
(35, 'user-levels/create', '', '2', '[]'),
(36, 'user-levels/update', '', '2', '[]'),
(37, 'user-levels/index', '', '2', '[]'),
(47, 'states/index', '', '17', '[]'),
(48, 'approval/approvals', '', '17', '[]'),
(148, 'notifications/notifications', '', '17', '[]'),
(149, 'users/index', '', '17', '[]'),
(150, 'users/view', '', '17', '[]'),
(151, 'user-levels/index', '', '17', '[]'),
(152, 'user-levels/view', '', '17', '[]'),
(153, 'candidate/index', '', '17', '[]'),
(154, 'candidate/view', '', '17', '[]'),
(155, 'states/view', '', '17', '[]'),
(156, 'district/index', '', '17', '[]'),
(157, 'district/view', '', '17', '[]'),
(158, 'partners/index', '', '17', '[]'),
(159, 'partners/view', '', '17', '[]'),
(160, 'centers/index', '', '17', '[]'),
(161, 'centers/view', '', '17', '[]'),
(162, 'courses/index', '', '17', '[]'),
(163, 'courses/view', '', '17', '[]'),
(164, 'financial-year/index', '', '17', '[]'),
(165, 'financial-year/view', '', '17', '[]'),
(166, 'modules/index', '', '17', '[]'),
(167, 'modules/view', '', '17', '[]'),
(168, 'quota/index', '', '17', '[]'),
(169, 'quota/view', '', '17', '[]'),
(170, 'brand-names/index', '', '17', '[]'),
(171, 'brand-names/view', '', '17', '[]'),
(172, 'sector/index', '', '17', '[]'),
(173, 'sector/view', '', '17', '[]'),
(174, 'employer/index', '', '17', '[]'),
(175, 'employer/view', '', '17', '[]'),
(176, 'smart-center-type/index', '', '17', '[]'),
(177, 'smart-center-type/view', '', '17', '[]'),
(178, 'qualification/index', '', '17', '[]'),
(179, 'qualification/view', '', '17', '[]'),
(180, 'position/index', '', '17', '[]'),
(181, 'position/view', '', '17', '[]'),
(182, 'designation/index', '', '17', '[]'),
(183, 'designation/view', '', '17', '[]'),
(184, 'nsdc-broad-economic-sector/index', '', '17', '[]'),
(185, 'nsdc-broad-economic-sector/view', '', '17', '[]'),
(186, 'sector-skill-council/index', '', '17', '[]'),
(187, 'sector-skill-council/view', '', '17', '[]'),
(188, 'job-role/index', '', '17', '[]'),
(189, 'job-role/view', '', '17', '[]'),
(190, 'annual-targets/index', '', '17', '[]'),
(191, 'annual-targets/view', '', '17', '[]'),
(192, 'employee/index', '', '17', '[]'),
(193, 'employee/view', '', '17', '[]'),
(194, 'batch/index', '', '17', '[]'),
(195, 'batch/view', '', '17', '[]'),
(196, 'job-details/index', '', '17', '[]'),
(197, 'job-details/view', '', '17', '[]'),
(198, 'contact-person-details/index', '', '17', '[]'),
(199, 'contact-person-details/view', '', '17', '[]'),
(205, 'users/profile', '', '17', '[]'),
(227, 'users/create', '', '17', '[]'),
(228, 'users/update', '', '17', '[]'),
(229, 'user-levels/create', '', '17', '[]'),
(230, 'user-levels/update', '', '17', '[]'),
(231, 'candidate/create', '', '17', '[]'),
(232, 'candidate/update', '', '17', '[]'),
(233, 'candidate/block-enable', '', '17', '[]'),
(234, 'candidate/block-disable', '', '17', '[]'),
(235, 'candidate/graph-placed-student-distribution', '', '17', '[]'),
(236, 'candidate/graph-joined-student-distribution', '', '17', '[]'),
(237, 'candidate/graph-gender-distribution', '', '17', '[]'),
(238, 'states/create', '', '17', '[]'),
(239, 'states/update', '', '17', '[]'),
(240, 'district/create', '', '17', '[]'),
(241, 'district/update', '', '17', '[]'),
(242, 'district/district-wise-report', '', '17', '[]'),
(243, 'district/export-all', '', '17', '[]'),
(244, 'partners/create', '', '17', '[]'),
(245, 'partners/update', '', '17', '[]'),
(246, 'centers/create', '', '17', '[]'),
(247, 'centers/update', '', '17', '[]'),
(248, 'centers/block-enable', '', '17', '[]'),
(249, 'centers/block-disable', '', '17', '[]'),
(250, 'centers/graph-smart-center-distribution', '', '17', '[]'),
(251, 'centers/graph-center-wise-candidate-comparison', '', '17', '[]'),
(252, 'centers/center-wise-report', '', '17', '[]'),
(253, 'courses/create', '', '17', '[]'),
(254, 'courses/update', '', '17', '[]'),
(255, 'courses/block-enable', '', '17', '[]'),
(256, 'courses/block-disable', '', '17', '[]'),
(257, 'financial-year/create', '', '17', '[]'),
(258, 'financial-year/update', '', '17', '[]'),
(259, 'modules/create', '', '17', '[]'),
(260, 'modules/update', '', '17', '[]'),
(261, 'modules/block-enable', '', '17', '[]'),
(262, 'modules/block-disable', '', '17', '[]'),
(263, 'quota/create', '', '17', '[]'),
(264, 'quota/update', '', '17', '[]'),
(265, 'quota/allotment', '', '17', '[]'),
(266, 'brand-names/create', '', '17', '[]'),
(267, 'brand-names/update', '', '17', '[]'),
(268, 'sector/create', '', '17', '[]'),
(269, 'sector/update', '', '17', '[]'),
(270, 'employer/create', '', '17', '[]'),
(271, 'employer/update', '', '17', '[]'),
(272, 'employer/block-enable', '', '17', '[]'),
(273, 'employer/block-disable', '', '17', '[]'),
(274, 'employer/sector-wise-placement-companies', '', '17', '[]'),
(275, 'smart-center-type/create', '', '17', '[]'),
(276, 'smart-center-type/update', '', '17', '[]'),
(277, 'qualification/create', '', '17', '[]'),
(278, 'qualification/update', '', '17', '[]'),
(279, 'position/create', '', '17', '[]'),
(280, 'position/update', '', '17', '[]'),
(281, 'designation/create', '', '17', '[]'),
(282, 'designation/update', '', '17', '[]'),
(283, 'nsdc-broad-economic-sector/create', '', '17', '[]'),
(284, 'nsdc-broad-economic-sector/update', '', '17', '[]'),
(285, 'sector-skill-council/create', '', '17', '[]'),
(286, 'sector-skill-council/update', '', '17', '[]'),
(287, 'job-role/create', '', '17', '[]'),
(288, 'job-role/update', '', '17', '[]'),
(289, 'annual-targets/create', '', '17', '[]'),
(290, 'annual-targets/update', '', '17', '[]'),
(291, 'employee/create', '', '17', '[]'),
(292, 'employee/update', '', '17', '[]'),
(293, 'employee/block-enable', '', '17', '[]'),
(294, 'employee/block-disable', '', '17', '[]'),
(295, 'batch/create', '', '17', '[]'),
(296, 'batch/update', '', '17', '[]'),
(297, 'batch/block-enable', '', '17', '[]'),
(298, 'batch/block-disable', '', '17', '[]'),
(299, 'job-details/create', '', '17', '[]'),
(300, 'job-details/update', '', '17', '[]'),
(301, 'job-details/block-enable', '', '17', '[]'),
(302, 'job-details/block-disable', '', '17', '[]'),
(303, 'contact-person-details/create', '', '17', '[]'),
(304, 'contact-person-details/update', '', '17', '[]'),
(305, 'contact-person-details/block-enable', '', '17', '[]'),
(306, 'contact-person-details/block-disable', '', '17', '[]'),
(307, 'followup/create', '', '17', '[]'),
(308, 'followup/update', '', '17', '[]'),
(309, 'followup/index', '', '17', '[]'),
(310, 'followup/view', '', '17', '[]'),
(311, 'candidate/create', '', '18', '[]'),
(312, 'candidate/update', '', '18', '[]'),
(313, 'candidate/index', '', '18', '[]'),
(314, 'candidate/view', '', '18', '[]'),
(315, 'candidate/block-enable', '', '18', '[]'),
(316, 'candidate/block-disable', '', '18', '[]'),
(317, 'candidate/graph-placed-student-distribution', '', '18', '[]'),
(318, 'candidate/graph-joined-student-distribution', '', '18', '[]'),
(319, 'candidate/graph-gender-distribution', '', '18', '[]'),
(320, 'states/create', '1', '18', '[]'),
(321, 'states/update', '', '18', '[]'),
(322, 'states/index', '', '18', '[]'),
(323, 'states/view', '', '18', '[]'),
(324, 'users/view', '', '2', '[]'),
(325, 'user-levels/view', '', '2', '[]'),
(326, 'block/create', '', '2', '[]'),
(327, 'block/update', '', '2', '[]'),
(328, 'block/index', '', '2', '[]'),
(329, 'block/view', '', '2', '[]'),
(330, 'cluster-data/create', '', '2', '[]'),
(331, 'cluster-data/update', '', '2', '[]'),
(332, 'cluster-data/index', '', '2', '[]'),
(333, 'cluster-data/view', '', '2', '[]'),
(334, 'cluster-master/create', '', '2', '[]'),
(335, 'cluster-master/update', '', '2', '[]'),
(336, 'cluster-master/index', '', '2', '[]'),
(337, 'cluster-master/view', '', '2', '[]'),
(341, 'house-hold/create', '', '2', '[]'),
(342, 'house-hold/update', '', '2', '[]'),
(343, 'house-hold/index', '', '2', '[]'),
(344, 'house-hold/view', '', '2', '[]'),
(345, 'household-data/create', '', '2', '[]'),
(346, 'household-data/update', '', '2', '[]'),
(347, 'household-data/index', '', '2', '[]'),
(348, 'household-data/view', '', '2', '[]'),
(349, 'vfa-data/create', '', '2', '[]'),
(350, 'vfa-data/update', '', '2', '[]'),
(351, 'vfa-data/index', '', '2', '[]'),
(352, 'vfa-data/view', '', '2', '[]'),
(353, 'vfa-master/create', '', '2', '[]'),
(354, 'vfa-master/update', '', '2', '[]'),
(355, 'vfa-master/index', '', '2', '[]'),
(356, 'vfa-master/view', '', '2', '[]'),
(357, 'distict/create', '', '2', '[]'),
(358, 'distict/update', '', '2', '[]'),
(359, 'distict/index', '', '2', '[]'),
(360, 'distict/view', '', '2', '[]'),
(361, 'household-data/graph-of-household-data', '', '2', '[]'),
(362, 'household-data/graph-cluster-name-wise-household', '', '2', '[]'),
(363, 'household-data/table-of-ppi', '', '2', '[]'),
(372, 'vfa-data/graph-of-vfa-data', '', '2', '[]'),
(373, 'vfa-data/total-households-enrolled', '', '2', '[]'),
(374, 'vfa-data/number-member-planning', '', '2', '[]'),
(375, 'vfa-data/number-of-awareness', '', '2', '[]'),
(376, 'vfa-data/number-of-training', '', '2', '[]'),
(377, 'vfa-data/avg-number-member', '', '2', '[]'),
(378, 'vfa-data/household-trained', '', '2', '[]'),
(379, 'vfa-data/new-rng-established', '', '2', '[]'),
(380, 'cluster-data/cluster-wise-member-attendance-in-va-meeting', '', '2', '[]'),
(381, 'cluster-data/number-of-rng-established', '', '2', '[]'),
(382, 'cluster-data/hectare-of-land-food-production', '', '2', '[]'),
(383, 'cluster-data/hectare-of-land-non-food-production', '', '2', '[]'),
(384, 'cluster-data/quintals-food-production', '', '2', '[]'),
(385, 'cluster-data/quintals-non-food-production', '', '2', '[]'),
(386, 'cluster-data/number-of-farmers', '', '2', '[]'),
(387, 'cluster-data/number-production-companies', '', '2', '[]'),
(388, 'household-data/graph-of-ppi', '', '2', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `user_level` varchar(100) NOT NULL,
  `states` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `districts` text NOT NULL,
  `partners` text NOT NULL,
  `centers` text NOT NULL,
  `mobile_number` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `password`, `confirm_password`, `user_level`, `states`, `email`, `user_type`, `districts`, `partners`, `centers`, `mobile_number`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin', '2', '', 'admin', 'Admin', '', '', '', '8866177723'),
(21, 'lasi', 'lasi', 'lasi', 'lasi', 'lasi', '17', '', '', 'Others', '', '', '', ''),
(22, 'MM', 'mm', 'mm', 'mm', 'mm', '2', '', '', '', '', '', '', ''),
(23, 'miral', 'miral', 'miral', 'miral', 'miral', '2', '', 'miral', 'Admin', '', '', '', ''),
(24, 'mi', 'mi', 'mi', 'mi', 'mi', '18', '', 'mi', 'Others', '', '', '', 'mi'),
(25, 'miral', 'bhalani', 'miral', '89', '96', '', '', 'miral', '', '', '', '', '886');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE IF NOT EXISTS `user_levels` (
  `id` int(11) NOT NULL,
  `level_name` varchar(100) NOT NULL,
  `level_authentications` text NOT NULL,
  `level_type` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`id`, `level_name`, `level_authentications`, `level_type`) VALUES
(2, 'Full Access', 'users/create,users/update,users/view,users/index,user-levels/create,user-levels/update,user-levels/view,user-levels/index,candidate/create,candidate/update,candidate/view,candidate/index,centers/create,centers/update,centers/view,centers/index,courses/create,courses/update,courses/view,courses/index,dependants/create,dependants/update,dependants/view,dependants/index,employee/create,employee/update,employee/view,employee/index,partners/create,partners/update,partners/view,partners/index,states/create,states/update,states/view,states/index,training_calendar/create,training_calendar/update,training_calendar/view,training_calendar/index,district/create,district/update,district/view,district/index,quota/create,quota/update,quota/view,quota/index,quota/allotment,employer/create,employer/update,employer/view,employer/index,financial-year/create,financial-year/update,financial-year/view,financial-year/index,modules/create,modules/update,modules/view,modules/index,sector/create,sector/update,sector/view,sector/index,user-type/create,user-type/update,user-type/view,user-type/index,centers/center-wise-report,district/district-wise-report,district/export-all,smart-center-type/create,smart-center-type/update,smart-center-type/view,smart-center-type/index,qualification/create,qualification/update,qualification/view,qualification/index,annual-targets/create,annual-targets/update,annual-targets/view,annual-targets/index,position/create,position/update,position/view,position/index,brand-names/create,brand-names/update,brand-names/view,brand-names/index,designation/create,designation/update,designation/view,designation/index,nsdc-broad-economic-sector/create,nsdc-broad-economic-sector/update,nsdc-broad-economic-sector/view,nsdc-broad-economic-sector/index,sector-skill-council/create,sector-skill-council/update,sector-skill-council/view,sector-skill-council/index,job-role/create,job-role/update,job-role/view,job-role/index,candidate/graph-gender-distribution,employer/sector-wise-placement-companies,centers/graph-smart-center-distribution,centers/graph-center-wise-candidate-comparison,candidate/graph-joined-student-distribution,candidate/graph-placed-student-distribution', '3'),
(17, 'Access 1', '', ''),
(18, 'Test level1', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dependants`
--
ALTER TABLE `dependants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_authentications`
--
ALTER TABLE `page_authentications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dependants`
--
ALTER TABLE `dependants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `page_authentications`
--
ALTER TABLE `page_authentications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=389;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
