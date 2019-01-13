-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2019 at 09:48 AM
-- Server version: 5.6.41
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaizan_khazana`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '2', 1448992778);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1448795791, 1448795791);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `capitalist`
--

CREATE TABLE `capitalist` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `long_description` text,
  `profile_photo` varchar(255) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capitalist`
--

INSERT INTO `capitalist` (`id`, `name`, `short_description`, `long_description`, `profile_photo`, `last_updated`) VALUES
(5, 'Nishant Goel', 'This is the test capitalist working  at metadesign solutions private limited', '', '1452408328_5691fe08b3db4.jpg', '2016-01-10 12:15:28'),
(6, 'Nishant Goel', 'This is the test capitalist working  at metadesign solutions private limited', '', '1452408346_5691fe1a7d0e8.jpg', '2016-01-10 12:15:46'),
(7, 'Nishant Goel', 'This is the test capitalist working  at metadesign solutions private limited', '', '1452408444_5691fe7c6c734.jpg', '2016-01-10 12:17:24'),
(8, 'Nishant Goel', 'This is the test capitalist working  at metadesign solutions private limited', '', '1452408454_5691fe86da9b3.jpg', '2016-01-10 12:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `tree` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `tree`, `lft`, `rgt`, `depth`, `name`, `icon`) VALUES
(23, 23, 1, 12, 0, 'Automobile', 'fa fa-apple'),
(24, 24, 1, 8, 0, 'IT Industry', 'fa fa-apple'),
(25, 23, 6, 11, 1, 'Category1.1', NULL),
(26, 23, 4, 5, 1, 'Category1.2', NULL),
(27, 23, 2, 3, 1, 'Category1.3', NULL),
(28, 23, 9, 10, 2, 'Category1.1.1', NULL),
(29, 23, 7, 8, 2, 'Category1.1.2', NULL),
(30, 24, 4, 7, 1, 'Category2.1', NULL),
(31, 24, 2, 3, 1, 'Category2.2', NULL),
(32, 24, 5, 6, 2, 'Category2.1.1', NULL),
(33, 33, 1, 2, 0, 'Mechanical Industry', 'fa fa-apple'),
(34, 34, 1, 2, 0, 'Daily life', 'fa fa-apple'),
(35, 35, 1, 2, 0, 'Agro Industry', 'fa fa-apple'),
(36, 36, 1, 4, 0, 'dsdsd', 'fa fa-apple'),
(37, 36, 2, 3, 1, 'dsdsd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `category_id`, `type`, `description`) VALUES
(1, 33, 2, 'dnnsndjs'),
(2, 23, 0, 'n ns dnsd '),
(3, 33, 3, 'dsndnsmdsmnd'),
(4, 33, 0, ''),
(5, 24, 3, ''),
(6, 33, 2, 'dsdsdd');

-- --------------------------------------------------------

--
-- Table structure for table `fairdetails`
--

CREATE TABLE `fairdetails` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kaizen`
--

CREATE TABLE `kaizen` (
  `id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text,
  `processarea` text,
  `category` int(11) NOT NULL,
  `attachmenttype` enum('image','video','pdf') DEFAULT NULL,
  `attachmentbefore` varchar(255) DEFAULT NULL,
  `attachmentafter` varchar(255) DEFAULT NULL,
  `attachmentprocessed` enum('0','1','2') DEFAULT '0' COMMENT '0=not processesd,1=processing,2=processed',
  `company` varchar(255) DEFAULT NULL,
  `currrentstage` varchar(255) DEFAULT NULL,
  `mode` enum('draft','submitted') DEFAULT NULL,
  `tangiblebenifits` text,
  `intengiblebenifits` text,
  `costsaving` double DEFAULT NULL COMMENT 'cost saving per year',
  `implementationdate` datetime DEFAULT NULL,
  `postedby` int(11) DEFAULT NULL,
  `posteddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `suggestedby` varchar(255) DEFAULT NULL,
  `approvedby` varchar(255) DEFAULT NULL,
  `recordstatus` int(11) DEFAULT '1' COMMENT '// 0= inactive, 1 = active',
  `attachmentother` varchar(255) DEFAULT NULL,
  `implemented_by` varchar(255) DEFAULT NULL,
  `problem_observed` text,
  `action_taken` text,
  `tags` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kaizen`
--

INSERT INTO `kaizen` (`id`, `type`, `name`, `subject`, `description`, `processarea`, `category`, `attachmenttype`, `attachmentbefore`, `attachmentafter`, `attachmentprocessed`, `company`, `currrentstage`, `mode`, `tangiblebenifits`, `intengiblebenifits`, `costsaving`, `implementationdate`, `postedby`, `posteddate`, `suggestedby`, `approvedby`, `recordstatus`, `attachmentother`, `implemented_by`, `problem_observed`, `action_taken`, `tags`) VALUES
(82, 0, 'Engineering Kaizen', 'This kaizen improved working of accelerator', 'This has improved the time of the manufacturing to just half.', 'Manufacturing', 23, 'image', '14493793665663c62616b5a.jpg', '14493793665663c62616dd7.jpg', '0', 'MDS', 'In development', 'draft', 'Good benefits', 'good benefits', 12, '2015-12-01 00:00:00', 2, '2015-12-05 18:30:00', 'mahim', '0', 1, NULL, NULL, NULL, NULL, NULL),
(83, 0, 'Engineering Kaizen', 'This kaizen improved working of accelerator', 'This has improved the time of the manufacturing to just half.', 'Manufacturing', 24, 'image', '14493793665663c62616b5a.jpg', '14493793665663c62616dd7.jpg', '0', 'MDS', 'In development', 'draft', 'Good benefits', 'good benefits', 12, '2015-12-01 00:00:00', 2, '2015-12-05 18:30:00', 'mahim', '0', 1, NULL, NULL, NULL, NULL, NULL),
(84, 0, 'Engineering Kaizen', 'This kaizen improved working of accelerator', 'This has improved the time of the manufacturing to just half.', 'Manufacturing', 33, 'image', '14493793665663c62616b5a.jpg', '14493793665663c62616dd7.jpg', '0', 'MDS', 'In development', 'draft', 'Good benefits', 'good benefits', 12, '2015-12-01 00:00:00', 2, '2015-12-05 18:30:00', 'mahim', '0', 1, NULL, NULL, NULL, NULL, NULL),
(86, 0, 'Engineering Kaizen', 'This kaizen improved working of accelerator', 'This has improved the time of the manufacturing to just half.', 'Manufacturing', 23, 'image', '14493793665663c62616b5a.jpg', '14493793665663c62616dd7.jpg', '0', 'MDS', 'In development', 'draft', 'Good benefits', 'good benefits', 12, '2015-12-01 00:00:00', 2, '2015-12-05 18:30:00', 'mahim', '0', 1, NULL, NULL, NULL, NULL, NULL),
(87, 0, 'Engineering Kaizen', 'This kaizen improved working of accelerator', 'This has improved the time of the manufacturing to just half.', 'Manufacturing', 24, 'image', '14493793665663c62616b5a.jpg', '14493793665663c62616dd7.jpg', '0', 'MDS', 'In development', 'draft', 'Good benefits', 'good benefits', 12, '2015-12-01 00:00:00', 2, '2015-12-05 18:30:00', 'mahim', '0', 1, NULL, NULL, NULL, NULL, NULL),
(88, 0, 'Engineering Kaizen', 'This kaizen improved working of accelerator', 'This has improved the time of the manufacturing to just half.', 'Manufacturing', 33, 'image', '14493793665663c62616b5a.jpg', '14493793665663c62616dd7.jpg', '0', 'MDS', 'In development', 'draft', 'Good benefits', 'good benefits', 12, '2015-12-01 00:00:00', 2, '2015-12-05 18:30:00', 'mahim', '0', 1, NULL, NULL, NULL, NULL, NULL),
(89, 0, 'Engineering Kaizen', 'This kaizen improved working of accelerator', 'This has improved the time of the manufacturing to just half.', 'Manufacturing', 23, 'image', '14493793665663c62616b5a.jpg', '14493793665663c62616dd7.jpg', '0', 'MDS', 'In development', 'draft', 'Good benefits', 'good benefits', 12, '2015-12-01 00:00:00', 2, '2015-12-05 18:30:00', 'mahim', '0', 1, NULL, NULL, NULL, NULL, NULL),
(90, 0, 'Engineering Kaizen', 'This kaizen improved working of accelerator', 'This has improved the time of the manufacturing to just half.', 'Manufacturing', 24, 'image', '14493793665663c62616b5a.jpg', '14493793665663c62616dd7.jpg', '0', 'MDS', 'In development', 'draft', 'Good benefits', 'good benefits', 12, '2015-12-01 00:00:00', 2, '2015-12-05 18:30:00', 'mahim', '0', 1, NULL, NULL, NULL, NULL, NULL),
(91, 0, 'Engineering Kaizen', 'This kaizen improved working of accelerator', 'This has improved the time of the manufacturing to just half.', 'Manufacturing', 33, 'image', '14493793665663c62616b5a.jpg', '14493793665663c62616dd7.jpg', '0', 'MDS', 'In development', 'draft', 'Good benefits', 'good benefits', 12, '2015-12-01 00:00:00', 2, '2015-12-05 18:30:00', 'mahim', '0', 1, NULL, NULL, NULL, NULL, NULL),
(92, 0, 'Test', 'test', '', '', 30, '', NULL, NULL, '0', '', '', 'draft', '', '', NULL, NULL, 2, '2015-12-25 18:30:00', '', '0', 1, '', NULL, NULL, NULL, NULL),
(93, 0, 'bjjbdjbf', 'bjbdbfdf', '', '', 33, '', NULL, NULL, '0', '', '', 'draft', '', '', NULL, NULL, 2, '2015-12-25 18:30:00', '', '0', 1, '1451150647567ecd375fc90.torrent', NULL, NULL, NULL, NULL),
(94, 0, 'dsdsd', 'dsds', 'dsdsd', 'sdsds', 31, 'video', NULL, NULL, '0', 'dsds', 'dsds', 'draft', 'ddsd', '323', 23, '2015-12-31 00:00:00', 2, '2015-12-25 18:30:00', 'dsds', '0', 1, '', NULL, NULL, NULL, NULL),
(95, 0, 'dsdsd', 'dsds', 'dsdsd', 'sdsds', 31, 'video', NULL, NULL, '0', 'dsds', 'dsds', 'draft', 'ddsd', '323', 23, '2015-12-31 00:00:00', 2, '2015-12-25 18:30:00', 'dsds', '0', 1, '', NULL, NULL, NULL, NULL),
(96, 0, 'cxxc', 'dsd', '', '', 31, '', NULL, NULL, '0', '', '', 'draft', '', '', NULL, NULL, 2, '2015-12-26 18:30:00', '', '0', 1, '', NULL, NULL, NULL, NULL),
(97, 0, 'dsdsb', 'bjdbsjbdj', 'bjb', '', 30, '', NULL, NULL, '0', '', '', 'draft', '', '', NULL, NULL, 2, '2015-12-26 18:30:00', '', '0', 1, '', NULL, NULL, NULL, NULL),
(98, 0, 'mdsdjs', 'djsjdb', '', '', 31, '', NULL, NULL, '0', '', '', 'draft', '', '', NULL, NULL, 2, '2015-12-26 18:30:00', '', '0', 1, '', NULL, NULL, NULL, NULL),
(99, 0, '', '', NULL, NULL, 31, 'image', NULL, NULL, '0', NULL, NULL, 'draft', NULL, NULL, NULL, NULL, 2, '2015-12-26 18:30:00', NULL, '0', 1, '', NULL, NULL, NULL, NULL),
(100, 0, 'nsdsjdnj', 'bjbjbj', 'bbjbjb', 'bjb', 31, 'image', NULL, NULL, '0', 'jbjbjbj', 'bjbjbjb', 'draft', 'bjb', 'jbjbjbjbj', 8, '2015-12-26 00:00:00', 2, '2015-12-26 18:30:00', 'jbjb', '0', 1, '', NULL, NULL, NULL, NULL),
(101, 0, 'bbhh', 'hhh h', ' h h h', '', 30, '', NULL, NULL, '0', '', '', 'draft', '', '', NULL, NULL, 2, '2015-12-26 18:30:00', '', '0', 1, '', NULL, NULL, NULL, NULL),
(102, 0, 'hh', 'h ', 'h', '', 25, '', NULL, NULL, '0', '', '', 'draft', '', '', NULL, NULL, 2, '2015-12-26 18:30:00', '', '0', 1, '1451215807567fcbbf8b95b.png', NULL, NULL, NULL, NULL),
(103, 0, 'Test', 'test', 'test', '', 33, '', NULL, NULL, '0', '', '', 'draft', '', '', NULL, NULL, 2, '2015-12-26 18:30:00', '', '0', 1, '1451215948567fcc4c19bd5.png', NULL, NULL, NULL, NULL),
(104, 0, 'testtest', 'bdhsbhdb', 'hvhvhvh', 'vvhvhvhv', 26, 'image', NULL, NULL, '0', 'hvhvh', 'vbbh', 'draft', 'hvhvhv', 'vhhv', 23, '2015-12-11 00:00:00', 2, '2015-12-26 18:30:00', 'jbbb', '0', 1, '', NULL, NULL, NULL, NULL),
(105, 0, 'njjbjbj', 'bjbbjbj', 'bjbj', '', 31, '', NULL, NULL, '0', '', '', 'draft', '', '', NULL, NULL, 2, '2015-12-26 18:30:00', '', '0', 1, '1451216296567fcda819b1d.png', NULL, NULL, NULL, NULL),
(106, 0, 'bkbbh', 'vhvvhv', 'vhvhvhkvh', 'vhvhvhvh', 26, 'image', NULL, NULL, '0', 'hvhvhvhvh', 'hvhvvhvh', 'draft', 'vhvhvh', 'hvhvhvh', 21, '2015-12-02 00:00:00', 2, '2015-12-26 18:30:00', 'jbbbk', '0', 1, '', NULL, NULL, NULL, NULL),
(107, 0, 'bjkb', 'hbhbhbhbh', 'bhbhbhbh', 'hbhkbhkbh', 31, 'image', '1451216658567fcf12f0655.jpg', '1451216658567fcf12f0708.jpg', '0', 'bhbhbhb', 'bhbhbhbh', 'draft', 'bhbhbkbkhb', 'hbhbbhb', 21, '2015-12-02 00:00:00', 2, '2015-12-26 18:30:00', 'njb', '0', 1, NULL, NULL, NULL, NULL, NULL),
(108, 0, 'NIshant', '', NULL, 'jjbbb', 31, 'image', '14525337445693e7f0d51a9.jpg', '14525337445693e7f0d528b.jpg', '0', 'bjbjbbbj', NULL, 'draft', 'bjjbjbjbb', ' bbhkbhbhkb', NULL, NULL, 2, '2016-01-10 18:30:00', NULL, '0', 1, NULL, 'G', 'hbbhkbhk', 'bjb', NULL),
(109, 0, 'gfgfg', '', NULL, 'fgfgf', 31, 'image', '14526611545695d9a249c6a.jpg', '14526611545695d9a249ddf.jpg', '0', '', NULL, 'draft', 'fgfg', 'gfgfg', NULL, NULL, 2, '2016-01-12 18:30:00', NULL, '0', 1, NULL, '', 'gfgfg', 'gfgfg', NULL),
(110, 1, 'sdsd', 'dsdsd', 'dsds', '', 27, 'image', NULL, NULL, '0', '', NULL, 'draft', '', '', NULL, NULL, 2, '2016-01-13 18:30:00', NULL, '0', 1, '1452754099569744b3cabfb.jpg', '', '', '', NULL),
(111, 0, 'sjbjsdb', '', '', 'bjbjbjb', 27, 'image', '145361947856a479162af02.jpg', '145361947856a479162b054.jpg', '0', 'jbjbjb', NULL, 'draft', 'njjn', 'jnjnjnjnjjnj', NULL, NULL, 2, '2016-01-23 18:30:00', NULL, '0', 1, NULL, 'bjbj', 'bjb', 'bjbjbjbjbjb', '[\"1\",\"2\",\"3\",\"4\"]'),
(112, 1, 'Test', 'dsdsd', '', '', 27, 'image', NULL, NULL, '0', '', NULL, 'draft', '', '', NULL, NULL, 2, '2016-01-23 18:30:00', NULL, '0', 1, '145362014656a47bb2ba033.jpg', '', '', '', '[\"1\",\"2\",\"3\",\"4\"]');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1446134619),
('m130524_201442_init', 1446134624),
('m140506_102106_rbac_init', 1448794877),
('m151123_080219_create_menu_table', 1448265810);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `created`) VALUES
(1, 'All', '2016-01-24 12:22:07'),
(2, 'Process Video', '2016-01-24 12:22:07'),
(3, 'Knowledge Bazar', '2016-01-24 12:22:07'),
(4, 'Idea Bazar', '2016-01-24 12:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `auth_key`, `password_hash`, `password_reset_token`, `status`, `created_at`, `updated_at`, `country`, `state`, `pincode`) VALUES
(2, 'Nishant', 'goel', 'nishant94goel@gmail.com', '1212121', NULL, 'LaAlGMn1yo_BdQ84nkj_Ui0qEqvi8aYh', '$2y$13$CKw.YXNl3A8tP.mNQlXiaeAYZor/Rsqd23Nlu/hhk9BOs.QqTqoWG', NULL, 10, 1446381708, 1446381708, NULL, NULL, NULL),
(3, 'Hardik', 'Goel', 'hardik@gmail.com', '1233232', NULL, 'j0cnMDyK1PGHhHKzkLVZPXDN1hk0ZfAY', '$2y$13$pTkpvZf7pkJ3vP2cBWZLpuDuSx.UiTx7u/.57sUIUl3a7yTBWNRkG', NULL, 10, 1446388508, 1446388508, NULL, NULL, NULL),
(4, 'dnsndjsnd', 'njsdjsdjsnd', 'jsdjnsjdnsjd@kdns.com', 'nsdnsnd', NULL, 'odiGAz94bmoqpKy6DpWwLYKDSve3bHcc', '$2y$13$3e5Gj8.0Bj.01RJANaYF1ecICuA32O8UmX7w6Wj4HOl5POS45eetS', NULL, 10, 1446389834, 1446389834, NULL, NULL, NULL),
(8, 'Nishant', 'Goel', 'nishant@metadesignsolutions.com', '2345678', NULL, 'LaAlGMn1yo_BdQ84nkj_Ui0qEqvi8aYh', '$2y$13$sqapD.Now9n9KBrd6f4HL.AN.ut9SZY9rDETCH1mpwncV/odzTzAy', NULL, 10, 1448992778, 1448992778, NULL, NULL, NULL),
(9, 'dssdsd', 'dsdsd', 'nishantgoel@metadesignsolutions.com', '12345', NULL, 'mRRFbHUGvMwgX83PpylEPYpxueSDKnYH', '$2y$13$3i7Yt4S6pD6VF.N71WvD7e7.vnxAV3C6jzBaBitg3qP8hVQePVELK', NULL, 10, 1449378110, 1449378110, NULL, NULL, NULL),
(12, 'fdfd', 'fdfdfdf', 'nishant94gffffoel@gmail.com', '434343', NULL, 'nABRkcmALwel7kZem_QxlIH8ePgBbExK', '$2y$13$Xfbqx7sYDxgXh.byoAZS7e110COl1oIx21TEGJZ5T3OVehT2eRk52', NULL, 10, 1450511995, 1450511995, '13', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `capitalist`
--
ALTER TABLE `capitalist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fairdetails`
--
ALTER TABLE `fairdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaizen`
--
ALTER TABLE `kaizen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posteddate` (`posteddate`),
  ADD KEY `posteddate_2` (`posteddate`),
  ADD KEY `postedby` (`postedby`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capitalist`
--
ALTER TABLE `capitalist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fairdetails`
--
ALTER TABLE `fairdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kaizen`
--
ALTER TABLE `kaizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

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
-- Constraints for table `kaizen`
--
ALTER TABLE `kaizen`
  ADD CONSTRAINT `kzcategory` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `kzpostuser` FOREIGN KEY (`postedby`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
