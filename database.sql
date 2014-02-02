-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2014 at 04:57 AM
-- Server version: 5.5.33-31.1
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `harngall_main`
--
CREATE DATABASE `harngall_main` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `harngall_main`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password`
--

CREATE TABLE IF NOT EXISTS `admin_password` (
  `id` int(11) NOT NULL,
  `pswd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_password`
--

INSERT INTO `admin_password` (`id`, `pswd`) VALUES
(1, 'c44cg6xxX');

-- --------------------------------------------------------

--
-- Table structure for table `art_category`
--

CREATE TABLE IF NOT EXISTS `art_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `art_category`
--

INSERT INTO `art_category` (`id`, `name`) VALUES
(2, 'Painting'),
(3, 'Photography'),
(4, 'Drawing'),
(5, 'Printmaking'),
(6, 'Assemblage / Collage'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `art_color`
--

CREATE TABLE IF NOT EXISTS `art_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `art_color`
--

INSERT INTO `art_color` (`id`, `name`) VALUES
(1, 'Beige'),
(2, 'Black'),
(3, 'Blue'),
(4, 'Brown'),
(5, 'Dark blue'),
(6, 'Dark green'),
(7, 'Dark red'),
(8, 'Green'),
(9, 'Grey'),
(10, 'Orange'),
(11, 'Pink'),
(12, 'Purple'),
(13, 'Red'),
(14, 'Turquoise'),
(15, 'Violet'),
(16, 'White'),
(17, 'Yellow'),
(18, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `art_medium`
--

CREATE TABLE IF NOT EXISTS `art_medium` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `art_medium`
--

INSERT INTO `art_medium` (`id`, `category_id`, `name`) VALUES
(1, 2, 'Acrylic'),
(2, 2, 'Aerosol Paint'),
(3, 2, 'Airbrush'),
(4, 2, 'Enamel'),
(5, 2, 'Encaustic Wax'),
(6, 2, 'Glaze'),
(7, 2, 'Gouache'),
(8, 2, 'Hot Wax'),
(9, 2, 'Household'),
(10, 2, 'Ink'),
(11, 2, 'Latex Paint'),
(12, 2, 'Magna Paint'),
(13, 2, 'Mixed Media'),
(14, 2, 'Oil'),
(15, 2, 'Oil Panel'),
(16, 2, 'Tempera'),
(17, 2, 'Watercolor'),
(18, 3, 'Black & White'),
(19, 3, 'C-type'),
(20, 3, 'Color'),
(21, 3, 'Digital'),
(22, 3, 'Dye Transfer'),
(23, 3, 'E-type'),
(24, 3, 'Full-spectrum'),
(25, 3, 'Gelatin Silver Process'),
(26, 3, 'Gicele'),
(27, 3, 'Lenticular'),
(28, 3, 'Photogram'),
(29, 3, 'Pinhole'),
(30, 3, 'Polaroid'),
(31, 3, 'Ray Print'),
(32, 4, 'Chalk'),
(33, 4, 'Charcoal'),
(34, 4, 'Colored Pencils'),
(35, 4, 'Conte'),
(36, 4, 'Crayon'),
(37, 4, 'Graphite'),
(38, 4, 'Oil Paster'),
(39, 4, 'Pastel'),
(40, 4, 'Pen And Ink'),
(41, 4, 'Pencil'),
(42, 4, 'Silverpoint'),
(43, 5, 'Brushes'),
(44, 5, 'Collagraph'),
(45, 5, 'Copper Etching Plate'),
(46, 5, 'Digital Print'),
(47, 5, 'Drawing'),
(48, 5, 'Drypoint'),
(49, 5, 'Engraving'),
(50, 5, 'Etching'),
(51, 5, 'Foil Imaging'),
(52, 5, 'Giclee Print'),
(53, 5, 'Glass'),
(54, 5, 'Ink'),
(55, 5, 'Linocuts'),
(56, 5, 'Lithography'),
(57, 5, 'Monotype'),
(58, 5, 'Painting'),
(59, 5, 'Screen-printing'),
(60, 5, 'Stencils'),
(61, 5, 'Watercolor'),
(62, 5, 'Woodcut'),
(63, 6, 'Decoupage'),
(64, 6, 'Digital'),
(65, 6, 'Encaustic'),
(66, 6, 'Fabric'),
(67, 6, 'Found Objects'),
(68, 6, 'Metail'),
(69, 6, 'Other'),
(70, 6, 'Painting'),
(71, 6, 'Paper'),
(72, 6, 'Photomontage'),
(73, 6, 'Wax'),
(74, 6, 'Wood');

-- --------------------------------------------------------

--
-- Table structure for table `art_orientation`
--

CREATE TABLE IF NOT EXISTS `art_orientation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `art_orientation`
--

INSERT INTO `art_orientation` (`id`, `name`) VALUES
(1, 'Landscape'),
(2, 'Portrait'),
(3, 'Square');

-- --------------------------------------------------------

--
-- Table structure for table `art_size`
--

CREATE TABLE IF NOT EXISTS `art_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `art_size`
--

INSERT INTO `art_size` (`id`, `name`) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `art_style`
--

CREATE TABLE IF NOT EXISTS `art_style` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `art_style`
--

INSERT INTO `art_style` (`id`, `name`) VALUES
(13, 'Surrealism'),
(2, 'Abstract'),
(3, 'Abstract Expressionism'),
(4, 'Art Deco'),
(5, 'Cubism'),
(6, 'Dada'),
(7, 'Expressionism'),
(8, 'Figurative'),
(9, 'Impressionism'),
(10, 'Pop Art'),
(11, 'Realism'),
(12, 'Street Art'),
(14, 'I am not sure');

-- --------------------------------------------------------

--
-- Table structure for table `art_subject`
--

CREATE TABLE IF NOT EXISTS `art_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `art_subject`
--

INSERT INTO `art_subject` (`id`, `name`) VALUES
(28, 'Other'),
(2, 'Abstract'),
(3, 'Animals'),
(4, 'Architecture'),
(5, 'Business'),
(6, 'Cartoon'),
(7, 'Children'),
(8, 'Cuisine'),
(9, 'Education'),
(10, 'Erotic'),
(11, 'Fantasy'),
(12, 'Fashion'),
(13, 'Figures & Nudes'),
(14, 'Food & Drink'),
(15, 'Health'),
(16, 'Humor'),
(17, 'Love'),
(18, 'Nature'),
(19, 'People'),
(20, 'Places'),
(21, 'Political'),
(22, 'Celebrity'),
(23, 'Religious'),
(24, 'Science'),
(25, 'Sports'),
(26, 'Transportation'),
(27, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `bf_activities`
--

CREATE TABLE IF NOT EXISTS `bf_activities` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `activity` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `deleted` tinyint(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bf_artwork`
--

CREATE TABLE IF NOT EXISTS `bf_artwork` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created` date NOT NULL DEFAULT '0000-00-00',
  `user_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `cat_id` int(11) NOT NULL,
  `medium_id` int(11) NOT NULL,
  `style_id` int(11) NOT NULL,
  `orientation_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `color_id` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `dimension_unit` int(11) NOT NULL,
  `framing` int(1) NOT NULL,
  `keywords` text,
  `curator_review` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded` datetime NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `deleteFlag` int(11) NOT NULL DEFAULT '0',
  `curatorFlag` int(11) NOT NULL DEFAULT '0',
  `sold` int(11) NOT NULL DEFAULT '0',
  `area` decimal(65,0) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


-- --------------------------------------------------------

--
-- Table structure for table `bf_artwork_submission`
--

CREATE TABLE IF NOT EXISTS `bf_artwork_submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `artwork1` varchar(100) DEFAULT NULL,
  `artwork2` varchar(100) DEFAULT NULL,
  `artwork3` varchar(100) DEFAULT NULL,
  `artwork4` varchar(100) DEFAULT NULL,
  `artwork5` varchar(100) DEFAULT NULL,
  `approved` smallint(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reviewed` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Table structure for table `bf_banner`
--

CREATE TABLE IF NOT EXISTS `bf_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `bf_banner`
--

INSERT INTO `bf_banner` (`id`, `image`, `link`) VALUES
(1, 'under500 (10).png', 'http://www.harngallery.com/under-500'),
(2, 'stafffavorites (14).png', 'http://www.harngallery.com/staff-favorites');

-- --------------------------------------------------------

--
-- Table structure for table `bf_contact`
--

CREATE TABLE IF NOT EXISTS `bf_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `bf_contactus`
--

CREATE TABLE IF NOT EXISTS `bf_contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `bf_countries`
--

CREATE TABLE IF NOT EXISTS `bf_countries` (
  `iso` char(2) NOT NULL DEFAULT 'US',
  `name` varchar(80) NOT NULL,
  `printable_name` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`iso`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_countries`
--

INSERT INTO `bf_countries` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES
('AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4),
('AL', 'ALBANIA', 'Albania', 'ALB', 8),
('DZ', 'ALGERIA', 'Algeria', 'DZA', 12),
('AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16),
('AD', 'ANDORRA', 'Andorra', 'AND', 20),
('AO', 'ANGOLA', 'Angola', 'AGO', 24),
('AI', 'ANGUILLA', 'Anguilla', 'AIA', 660),
('AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL),
('AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28),
('AR', 'ARGENTINA', 'Argentina', 'ARG', 32),
('AM', 'ARMENIA', 'Armenia', 'ARM', 51),
('AW', 'ARUBA', 'Aruba', 'ABW', 533),
('AU', 'AUSTRALIA', 'Australia', 'AUS', 36),
('AT', 'AUSTRIA', 'Austria', 'AUT', 40),
('AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31),
('BS', 'BAHAMAS', 'Bahamas', 'BHS', 44),
('BH', 'BAHRAIN', 'Bahrain', 'BHR', 48),
('BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50),
('BB', 'BARBADOS', 'Barbados', 'BRB', 52),
('BY', 'BELARUS', 'Belarus', 'BLR', 112),
('BE', 'BELGIUM', 'Belgium', 'BEL', 56),
('BZ', 'BELIZE', 'Belize', 'BLZ', 84),
('BJ', 'BENIN', 'Benin', 'BEN', 204),
('BM', 'BERMUDA', 'Bermuda', 'BMU', 60),
('BT', 'BHUTAN', 'Bhutan', 'BTN', 64),
('BO', 'BOLIVIA', 'Bolivia', 'BOL', 68),
('BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70),
('BW', 'BOTSWANA', 'Botswana', 'BWA', 72),
('BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL),
('BR', 'BRAZIL', 'Brazil', 'BRA', 76),
('IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL),
('BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96),
('BG', 'BULGARIA', 'Bulgaria', 'BGR', 100),
('BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854),
('BI', 'BURUNDI', 'Burundi', 'BDI', 108),
('KH', 'CAMBODIA', 'Cambodia', 'KHM', 116),
('CM', 'CAMEROON', 'Cameroon', 'CMR', 120),
('CA', 'CANADA', 'Canada', 'CAN', 124),
('CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132),
('KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136),
('CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140),
('TD', 'CHAD', 'Chad', 'TCD', 148),
('CL', 'CHILE', 'Chile', 'CHL', 152),
('CN', 'CHINA', 'China', 'CHN', 156),
('CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL),
('CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL),
('CO', 'COLOMBIA', 'Colombia', 'COL', 170),
('KM', 'COMOROS', 'Comoros', 'COM', 174),
('CG', 'CONGO', 'Congo', 'COG', 178),
('CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180),
('CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184),
('CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188),
('CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384),
('HR', 'CROATIA', 'Croatia', 'HRV', 191),
('CU', 'CUBA', 'Cuba', 'CUB', 192),
('CY', 'CYPRUS', 'Cyprus', 'CYP', 196),
('CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203),
('DK', 'DENMARK', 'Denmark', 'DNK', 208),
('DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262),
('DM', 'DOMINICA', 'Dominica', 'DMA', 212),
('DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214),
('EC', 'ECUADOR', 'Ecuador', 'ECU', 218),
('EG', 'EGYPT', 'Egypt', 'EGY', 818),
('SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222),
('GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226),
('ER', 'ERITREA', 'Eritrea', 'ERI', 232),
('EE', 'ESTONIA', 'Estonia', 'EST', 233),
('ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231),
('FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238),
('FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234),
('FJ', 'FIJI', 'Fiji', 'FJI', 242),
('FI', 'FINLAND', 'Finland', 'FIN', 246),
('FR', 'FRANCE', 'France', 'FRA', 250),
('GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254),
('PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258),
('TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL),
('GA', 'GABON', 'Gabon', 'GAB', 266),
('GM', 'GAMBIA', 'Gambia', 'GMB', 270),
('GE', 'GEORGIA', 'Georgia', 'GEO', 268),
('DE', 'GERMANY', 'Germany', 'DEU', 276),
('GH', 'GHANA', 'Ghana', 'GHA', 288),
('GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292),
('GR', 'GREECE', 'Greece', 'GRC', 300),
('GL', 'GREENLAND', 'Greenland', 'GRL', 304),
('GD', 'GRENADA', 'Grenada', 'GRD', 308),
('GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312),
('GU', 'GUAM', 'Guam', 'GUM', 316),
('GT', 'GUATEMALA', 'Guatemala', 'GTM', 320),
('GN', 'GUINEA', 'Guinea', 'GIN', 324),
('GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624),
('GY', 'GUYANA', 'Guyana', 'GUY', 328),
('HT', 'HAITI', 'Haiti', 'HTI', 332),
('HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL),
('VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336),
('HN', 'HONDURAS', 'Honduras', 'HND', 340),
('HK', 'HONG KONG', 'Hong Kong', 'HKG', 344),
('HU', 'HUNGARY', 'Hungary', 'HUN', 348),
('IS', 'ICELAND', 'Iceland', 'ISL', 352),
('IN', 'INDIA', 'India', 'IND', 356),
('ID', 'INDONESIA', 'Indonesia', 'IDN', 360),
('IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364),
('IQ', 'IRAQ', 'Iraq', 'IRQ', 368),
('IE', 'IRELAND', 'Ireland', 'IRL', 372),
('IL', 'ISRAEL', 'Israel', 'ISR', 376),
('IT', 'ITALY', 'Italy', 'ITA', 380),
('JM', 'JAMAICA', 'Jamaica', 'JAM', 388),
('JP', 'JAPAN', 'Japan', 'JPN', 392),
('JO', 'JORDAN', 'Jordan', 'JOR', 400),
('KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398),
('KE', 'KENYA', 'Kenya', 'KEN', 404),
('KI', 'KIRIBATI', 'Kiribati', 'KIR', 296),
('KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408),
('KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410),
('KW', 'KUWAIT', 'Kuwait', 'KWT', 414),
('KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417),
('LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418),
('LV', 'LATVIA', 'Latvia', 'LVA', 428),
('LB', 'LEBANON', 'Lebanon', 'LBN', 422),
('LS', 'LESOTHO', 'Lesotho', 'LSO', 426),
('LR', 'LIBERIA', 'Liberia', 'LBR', 430),
('LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434),
('LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438),
('LT', 'LITHUANIA', 'Lithuania', 'LTU', 440),
('LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442),
('MO', 'MACAO', 'Macao', 'MAC', 446),
('MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807),
('MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450),
('MW', 'MALAWI', 'Malawi', 'MWI', 454),
('MY', 'MALAYSIA', 'Malaysia', 'MYS', 458),
('MV', 'MALDIVES', 'Maldives', 'MDV', 462),
('ML', 'MALI', 'Mali', 'MLI', 466),
('MT', 'MALTA', 'Malta', 'MLT', 470),
('MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584),
('MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474),
('MR', 'MAURITANIA', 'Mauritania', 'MRT', 478),
('MU', 'MAURITIUS', 'Mauritius', 'MUS', 480),
('YT', 'MAYOTTE', 'Mayotte', NULL, NULL),
('MX', 'MEXICO', 'Mexico', 'MEX', 484),
('FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583),
('MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498),
('MC', 'MONACO', 'Monaco', 'MCO', 492),
('MN', 'MONGOLIA', 'Mongolia', 'MNG', 496),
('MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500),
('MA', 'MOROCCO', 'Morocco', 'MAR', 504),
('MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508),
('MM', 'MYANMAR', 'Myanmar', 'MMR', 104),
('NA', 'NAMIBIA', 'Namibia', 'NAM', 516),
('NR', 'NAURU', 'Nauru', 'NRU', 520),
('NP', 'NEPAL', 'Nepal', 'NPL', 524),
('NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528),
('AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530),
('NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540),
('NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554),
('NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558),
('NE', 'NIGER', 'Niger', 'NER', 562),
('NG', 'NIGERIA', 'Nigeria', 'NGA', 566),
('NU', 'NIUE', 'Niue', 'NIU', 570),
('NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574),
('MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580),
('NO', 'NORWAY', 'Norway', 'NOR', 578),
('OM', 'OMAN', 'Oman', 'OMN', 512),
('PK', 'PAKISTAN', 'Pakistan', 'PAK', 586),
('PW', 'PALAU', 'Palau', 'PLW', 585),
('PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL),
('PA', 'PANAMA', 'Panama', 'PAN', 591),
('PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598),
('PY', 'PARAGUAY', 'Paraguay', 'PRY', 600),
('PE', 'PERU', 'Peru', 'PER', 604),
('PH', 'PHILIPPINES', 'Philippines', 'PHL', 608),
('PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612),
('PL', 'POLAND', 'Poland', 'POL', 616),
('PT', 'PORTUGAL', 'Portugal', 'PRT', 620),
('PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630),
('QA', 'QATAR', 'Qatar', 'QAT', 634),
('RE', 'REUNION', 'Reunion', 'REU', 638),
('RO', 'ROMANIA', 'Romania', 'ROM', 642),
('RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643),
('RW', 'RWANDA', 'Rwanda', 'RWA', 646),
('SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654),
('KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659),
('LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662),
('PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666),
('VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670),
('WS', 'SAMOA', 'Samoa', 'WSM', 882),
('SM', 'SAN MARINO', 'San Marino', 'SMR', 674),
('ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678),
('SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682),
('SN', 'SENEGAL', 'Senegal', 'SEN', 686),
('CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL),
('SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690),
('SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694),
('SG', 'SINGAPORE', 'Singapore', 'SGP', 702),
('SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703),
('SI', 'SLOVENIA', 'Slovenia', 'SVN', 705),
('SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90),
('SO', 'SOMALIA', 'Somalia', 'SOM', 706),
('ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710),
('GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
('ES', 'SPAIN', 'Spain', 'ESP', 724),
('LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144),
('SD', 'SUDAN', 'Sudan', 'SDN', 736),
('SR', 'SURINAME', 'Suriname', 'SUR', 740),
('SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744),
('SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748),
('SE', 'SWEDEN', 'Sweden', 'SWE', 752),
('CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756),
('SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760),
('TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158),
('TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762),
('TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834),
('TH', 'THAILAND', 'Thailand', 'THA', 764),
('TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL),
('TG', 'TOGO', 'Togo', 'TGO', 768),
('TK', 'TOKELAU', 'Tokelau', 'TKL', 772),
('TO', 'TONGA', 'Tonga', 'TON', 776),
('TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780),
('TN', 'TUNISIA', 'Tunisia', 'TUN', 788),
('TR', 'TURKEY', 'Turkey', 'TUR', 792),
('TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795),
('TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796),
('TV', 'TUVALU', 'Tuvalu', 'TUV', 798),
('UG', 'UGANDA', 'Uganda', 'UGA', 800),
('UA', 'UKRAINE', 'Ukraine', 'UKR', 804),
('AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784),
('GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826),
('US', 'UNITED STATES', 'United States', 'USA', 840),
('UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL),
('UY', 'URUGUAY', 'Uruguay', 'URY', 858),
('UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860),
('VU', 'VANUATU', 'Vanuatu', 'VUT', 548),
('VE', 'VENEZUELA', 'Venezuela', 'VEN', 862),
('VN', 'VIET NAM', 'Viet Nam', 'VNM', 704),
('VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92),
('VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850),
('WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876),
('EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732),
('YE', 'YEMEN', 'Yemen', 'YEM', 887),
('ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894),
('ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716);

-- --------------------------------------------------------

--
-- Table structure for table `bf_curator`
--

CREATE TABLE IF NOT EXISTS `bf_curator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  `review` text,
  `photo` varchar(255) DEFAULT NULL,
  `on_flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


--
-- Table structure for table `bf_email_queue`
--

CREATE TABLE IF NOT EXISTS `bf_email_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_email` varchar(128) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `alt_message` text,
  `max_attempts` int(11) NOT NULL DEFAULT '3',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `date_published` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `bf_favourite_art`
--

CREATE TABLE IF NOT EXISTS `bf_favourite_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


--
-- Table structure for table `bf_favourite_artist`
--

CREATE TABLE IF NOT EXISTS `bf_favourite_artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `bf_featured`
--

CREATE TABLE IF NOT EXISTS `bf_featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `bf_homepage`
--

CREATE TABLE IF NOT EXISTS `bf_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bf_homepage`
--

INSERT INTO `bf_homepage` (`id`, `name`, `value`) VALUES
(1, 'about_us', '<h4>Connecting artists and customers around the world through a curated marketplace for affordable, original art.</h4>\n<p style="text-align: justify;">Harngallery.com was founded by a group of artists whose aim is to make the highest quality, original art accessible and affordable for all. We started to work in the complex yet exciting Chinese market in 2013 and then quickly went global in 2014. We now provide artists from around the world with an expertly curated environment in which to exhibit and sell their work. We give collectors (mainly from the US, Europe and Asia) the opportunity to purchase unique, fresh contemporary work that has the potential to be a valuable investment whilst supporting emerging artists.</p>\n<p style="text-align: justify;">Our head office is located at Unit 1010, 10/F, Miramar Tower, 132 Nathan Road, Tsim Sha Tsui, Kowloon, HK. If you have questions or comments, we are always happy to hear from you. Feel free to <a href="/contact-us">contact us</a>.<br /><br /><br /><br /><br /></p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>'),
(2, 'how_it_works', '<h4 style="text-align: left;">We connect artists and customers around the world through a curated marketplace for affordable, original art.</h4>\n<p style="text-align: justify;">Thank you for joining Harngallery.com. We are glad to have you and look forward to introducing the work of our artists to you.<br /><br />We are a unique online art gallery offering affordable art for sale from new, talented mid-career and emerging artists. Our expert panel carefully selects each artist and piece we exhibit so that you can purchase artwork with confidence. If you are an artist you can use our site to present your original artwork to art enthusiasts around the world. It is free to display your original fine art for sale.</p>\n<p style="text-align: left;">We offer <button class="btnGreen" style="cursor: default;">FREE SHIPPING</button> on all purchased artwork.</p>\n<p style="text-align: left;">For more details please check out our Guides where we have lots of answers to frequently asked questions:</p>\n<form action="/buyers-guide" method="get"><button class="btnHarn pull-left" type="submit">BUYER''S GUIDE</button></form>\n<p>&nbsp;</p>\n<form action="/artist-guide" method="get"><button class="btnHarn pull-left" type="submit">ARTIST''S GUIDE</button></form>\n<p style="text-align: left;"><br /><br />If you have questions or comments, we are always happy to hear from you. Feel free to <a href="/contact-us">contact us</a>.<br /><br /><br /><br /></p>'),
(3, 'privacy_policy', '<p style="text-align: justify;">Harn Gallery ("Harn Gallery," "we" or "our") provides this Privacy Policy to inform you of our policies and procedures regarding the collection, use and disclosure of personal information we receive from users of www.harngallery.com (the "Site"). Harn Gallery makes available through the Site an online service for selling and purchasing original works of art. This Privacy Policy applies only to information that you provide to us through the Site.<br /><br /></p>\n<h5 style="text-align: justify;">Information Collection and Use</h5>\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; In the course of using the Site, you may provide us with personally identifiable information, which refers to information about you that can be used to contact or identify you ("Personal Information"). Personal Information includes, but is not limited to, your name, phone number, email address, phone number and postal address. We use your Personal Information primarily to provide and improve the Site and to respond to your inquiries.<br />&nbsp;&nbsp;&nbsp; We may also request that you provide certain information, such as your zip code and personal preferences, which is typically considered "Non-Identifying Information" because it cannot, by itself, be used to contact or identify you.<br />&nbsp;&nbsp;&nbsp; We use your Personal Information (in some cases, in conjunction with your Non-Identifying Information) primarily to provide and improve the services, to complete your transactions and respond to your inquiries.<br />&nbsp;&nbsp;&nbsp; We also use your Personal Information to contact you with Harn Gallery newsletters, marketing or promotional materials and other information that may be of interest to you. If you decide at any time that you no longer wish to receive such communications from us, please follow the unsubscribe instructions provided in any of the communications.<br /><br /></p>\n<h5 style="text-align: justify;">Log Data</h5>\n<p style="text-align: justify;">When you visit the Site, whether as a Member or a non-registered user just browsing (any of these, a "Harn Gallery User"), our servers automatically record information that your browser sends whenever you visit a website ("Log Data"). This Log Data may include information such as your computer''s browser type or the webpage you were visiting before you came to our Site, pages of our Site that you visit, the time spent on those pages, information you search for on our Site, access times and dates, ads you click on during your use of the Site, your viewing preferences, bookmark habits and other statistics. We use this information to monitor and analyze use of the Site and for the Site''s technical administration, to increase our Site''s functionality and user-friendliness and to better tailor the Site to our visitors'' needs.<br /><br /></p>\n<h5 style="text-align: justify;">Cookies</h5>\n<p style="text-align: justify;">We only use "cookies" for login. A cookie is a small data file that we transfer to your computer''s hard disk for record-keeping purposes. We use cookies for only one purpose: we utilize cookies to save your login information for future logins to the Site.<br /><br /></p>\n<h5 style="text-align: justify;">Making Purchases and Listing Works via the Site</h5>\n<p style="text-align: justify;">If you purchase a work or other item or list a work for sale via the Site, we request certain Personal Information from you. You must provide contact information such as first and last name, address, city, zip, email and phone number. We do not collect any information about your Paypal account or credit cards. If we have trouble processing an order or listing a work for sale, we will use this information to contact you.<br /><br /></p>\n<h5 style="text-align: justify;">Information Sharing and Disclosure</h5>\n<p style="text-align: justify;">Harn Gallery Members. When you register for the Site and create an Account, your Personal Information (including, but not limited to, your name) will be publicly viewable via the Site. We recommend that you guard your sensitive information and we encourage you to think carefully about what information you post via the Site. If you choose to purchase Original Works of Art via the Site, we will share your name and postal address with the Member who listed the work for sale on the Site to enable that Member to ship the purchased work directly to you.<br /><br />Service Providers. We may employ third party companies and individuals to facilitate our Services, to provide our Services on our behalf, to perform Site-related services (e.g., without limitation, payment processing, billing and shipping services, maintenance services, database management, web analytics and improvement of the Site''s features) or to assist us in analyzing how our Site are used. These third parties have access to your Personal Information only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.<br /><br />Business Transfers. Harn Gallery may sell, transfer or otherwise share some or all of its assets, including your Personal Information, in connection with a merger, acquisition, reorganization or sale of assets or in the event of bankruptcy.<br /><br /></p>\n<h5 style="text-align: justify;">Changing or Deleting Your Information</h5>\n<p style="text-align: justify;">To completely delete all Personal Information you provide to Harn Gallery, you must contact us using <a href="/contact-us">www.harngallery.com/contact-us</a>. If you completely delete all such information, your account may be deactivated.<br /><br /></p>\n<h5 style="text-align: justify;">Security</h5>\n<p style="text-align: justify;">The security of your Personal Information is important to Harn Gallery. But remember that no method of transmission over the Internet, or method of electronic storage, is 100% secure. We will make any legally required disclosures of any breach of the security, confidentiality, or integrity of your unencrypted electronically stored "personal data" (as defined in applicable state statutes on security breach notification) to you via email or conspicuous posting on this Site in the most expedient time possible and without unreasonable delay, insofar as consistent with (i) the legitimate needs of law enforcement or (ii) any measures necessary to determine the scope of the breach and restore the reasonable integrity of the data system.<br /><br /></p>\n<h5 style="text-align: justify;">International Transfer</h5>\n<p style="text-align: justify;">Your information may be transferred to - and maintained on - computers located outside of your state, province, country or other governmental jurisdiction where the privacy laws may not be as protective as those in your jurisdiction.<br /><br /></p>\n<h5 style="text-align: justify;">Our Policy Toward Children</h5>\n<p style="text-align: justify;">This Site is not directed to children under 18. If a parent or guardian becomes aware that his or her child has provided us with Personal Information without their consent, he or she should contact us using <a href="/contact-us">www.harngallery.com/contact-us</a>.<br /><br /></p>\n<h5 style="text-align: justify;">Phishing</h5>\n<p style="text-align: justify;">Identity theft and the practice currently known as "phishing" are of great concern to Harn Gallery. Safeguarding information to help protect you from identity theft is a top priority. We do not and will not, at any time, request your credit card information, username, login password or national identification numbers in a non-secure or unsolicited e-mail or telephone communication.<br /><br /></p>\n<h5 style="text-align: justify;">Links to Other Sites</h5>\n<p style="text-align: justify;">Our Site contains links to other websites. If you choose to visit an advertiser by "clicking on" a banner ad or other type of advertisement, or click on another third party link, you will be directed to that third party''s website. The fact that we link to a website or present a banner ad or other type of advertisement is not an endorsement, authorization or representation of our affiliation with that third party, nor is it an endorsement of their privacy or information security policies or practices. We do not exercise control over third party websites. These other websites may place their own cookies or other files on your computer, collect data or solicit personal information from you. Other sites follow different rules regarding the use or disclosure of the personal information you submit to them. We encourage you to read the privacy policies or statements of the other websites you visit.<br /><br /></p>\n<h5 style="text-align: justify;">Contacting Us</h5>\n<p style="text-align: justify;">If you have any questions about this Privacy Policy, please contact us: <a href="/contact-us">www.harngallery.com/contact-us</a></p>'),
(4, 'buyers_guide', '<h5>Buying art has never been so easy!</h5>\n<p style="text-align: left;">1. Browse <a>www.harngallery.com</a> and find art you love. Place an order by clicking the &ldquo;Purchase&rdquo; button on the artwork page. Payment can be made by Paypal or credit card.<br />2. The artist will ship the artwork to your address by courier within 7 days. Shipping is free.<br />3. The artwork is delivered to your home or office.<br /><br /></p>\n<p style="text-align: center;"><img src="/uploads/buyprocess.png" alt="" /></p>\n<p style="text-align: center;"><button class="btnBlue" style="cursor: default;">1. PURCHASE</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btnBlue">2. FREE SHIPPING</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btnBlue" style="cursor: default;">3. HOME DELIVERY</button></p>\n<h4 style="text-align: left;"><br /><br />Delivery partners:<br /><br /><img src="/uploads/dhl.png" alt="" /><br /><br /><br />Payment methods:<br /><br /><img src="/uploads/pay.png" alt="" /></h4>\n<h4><br />FAQs</h4>\n<p><a href="#1">How much does shipping cost?</a><br /><a href="#2">Do you ship internationally?</a><br /> <a href="#3">How do you ship artwork?</a><br /> <a href="#4">What should I do if I receive a damaged piece of art?</a><br /> <a href="#5">Once I purchase a piece of art, how many days will it take to arrive?</a><br /> <a href="#6">What type of artwork do you exhibit?</a><br /> <a href="#7">How is artwork chosen for Harn Gallery?</a><br /> <a href="#8">How do I search for and purchase art at Harngallery.com?</a><br /> <a href="#9">What forms of payment do you accept? Will I be charged tax?</a><br /> <a href="#10">Does Harn Gallery have a physical gallery location?</a><br /> <a href="#11">How can I contact Harn Gallery?</a><br /> <a href="#12">How does you price artwork?</a><br /> <a href="#13">Is the artwork exhibited at Harn gallery a financial investment?</a><br /> <a href="#14">How much will it cost to commission an artwork?</a><br /> <a href="#15">Do I pay for commissioned artwork before or after the piece is complete? </a><br /> <a href="#16">How long does it take to commission an artwork?</a><br /> <a href="#17">When commissioning an artwork, can I have the artist work from a photo?</a><br /> &nbsp;</p>\n<p class="MsoNormal"><a name="1"></a><strong>How much does shipping cost?</strong><br /> We proudly offer free shipping to any location. Free shipping is automatically applied &ndash; no minimum purchase, coupons or promotion codes are required.</p>\n<p class="MsoNormal"><a name="2"></a><strong>Do you ship internationally?</strong><br /> Yes. We are happy to ship artwork to any destination in the world.</p>\n<p class="MsoNormal"><a name="3"></a><strong>How do you ship artwork?</strong><br /> All artwork is packaged in custom built art boxes to insure safe delivery. Artists send art via FedEx, UPS and other common carriers. All artwork is shipped fully insured. Please note, a signature is required for delivery.</p>\n<p class="MsoNormal"><a name="4"></a><strong>What should I do if I receive a damaged piece of art?</strong><br /> All artwork are shipped by artists in custom built art boxes to insure safe delivery, so receiving damaged art is a rare occurrence. If you receive a damaged piece of art, contact us within 24 hours at <a href="/contact-us">www.harngallery.com/contact-us</a></p>\n<p class="MsoNormal"><a name="5"></a><strong>Once I purchase a piece of art, how many days will it take to arrive?</strong><br /> Artwork is typically shipped within two to seven business days. Once your artwork is shipped, please allow two days to three weeks for delivery, depending on the destination country.</p>\n<p class="MsoNormal"><a name="6"></a><strong>What type of artwork do you exhibit?</strong><br /> Harngallery.com exhibits original art created by new and established artists from around the world.</p>\n<p class="MsoNormal"><a name="7"></a><strong>How is artwork chosen for Harn Gallery?</strong><br /> A panel of curators, headed by our gallery director Louis Guillaume, selects each artist we exhibit. Our curators are art business professionals who select the highest quality work for exhibition.</p>\n<p class="MsoNormal"><a name="8"></a><strong>How do I search for and purchase art at Harn Gallery?</strong><br /> You can use either the Browse Art page or the keyword search bar at the top of every page. To purchase a piece of art, simply click the "Purchase" button at the right of the piece and follow the onscreen directions.</p>\n<p class="MsoNormal"><a name="9"></a><strong>What forms of payment do you accept? Will I be charged tax?</strong><br /> We accept Visa, MasterCard, Discover, American Express and PayPal. You will not be charged tax.</p>\n<p class="MsoNormal"><a name="10"></a><strong>Does Harn Gallery have a physical gallery location?</strong><br /> We do not operate a physical gallery.</p>\n<p class="MsoNormal"><a name="11"></a><strong>How can I contact Harn Gallery?</strong><br /> You can contact us <a href="/contact-us">here</a>.</p>\n<p class="MsoNormal"><a name="12"></a><strong>How does you price artwork?</strong><br /> Artwork is priced using artist input and the expertise of our curators. When artists submit images of their work, they are asked to enter desired prices for each piece. That price is then compared to curator appraisal.</p>\n<p class="MsoNormal"><a name="13"></a><strong>Is the artwork exhibited at Harn gallery a financial investment?</strong><br /> Art can be a financial investment as the demand for a particular artist and/or piece of artwork grows. We created a special section with this purpose: <a href="/invest-in-art">http://www.harngallery.com/invest-in-art</a></p>\n<p class="MsoNormal"><a name="14"></a><strong>How much will it cost to commission an artwork?</strong><br /> Commissioned pieces are priced based on the size, medium, and complexity of the piece, and the artist''s sales history. Artist will spend time with you about to discuss the project and price.</p>\n<p class="MsoNormal"><a name="15"></a><strong>Do I pay for commissioned artwork before or after the piece is complete?</strong> <br /> Before the artist begins working on your commission, we take a 50% non-refundable deposit. This assures that the artist will be paid for their time and materials. Once the piece is complete, we will send you a high resolution image of the work. If you accept it, we will charge the remaining 50% and ship the piece to you. <br /> <br /> <a name="16"></a><strong>How long does it take to commission an artwork?</strong><br /> The time will vary depending on the size, medium, and complexity of the piece, and the artist''s schedule, but typically commissions take ten to twelve weeks to complete.</p>\n<p class="MsoNormal"><a name="17"></a><strong>When commissioning an artwork, can I have the artist work from a photo?</strong><br /> Photographs are great reference material when commissioning an artwork. If you don''t have a photograph, it''s not a problem. You will have the opportunity to speak one-on-one with the artist to describe exactly what you are looking for.</p>'),
(5, 'artists_guide', '<h5>Selling your art has never been so easy!&nbsp;</h5>\n<p>1. Register and upload your artwork on <a href="/">www.harngallery.com</a>.<br />2. Ship the artwork to the buyer.<br />3. Receive 80% of the selling price.</p>\n<p style="text-align: center;"><img src="/uploads/artistprocess1.png" alt="" /></p>\n<p style="text-align: center;"><button class="btnGreen" style="cursor: default;">1. UPLOAD ART</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btnGreen" style="cursor: default;">2. SHIP TO BUYER</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btnGreen" style="cursor: default;">3. GET PAID</button></p>\n<p style="text-align: center;"><button class="btnWhite">1. UPLOAD ART</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btnWhite">2. SHIP TO BUYER</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btnGreen2" style="cursor: default;">80%</button></p>\n<p style="text-align: left;"><strong><br />Harn Gallery is the most lucrative gallery for artists.</strong><br />We offer the artists the highest commission rates!&nbsp; You keep 80% of the selling price.<br />There are no start-up, listing or monthly fees. The only extra cost to you is for shipping.<br /><a href="#8">See some examples of costs and profit.</a></p>\n<h4 style="text-align: left;"><br />FAQs</h4>\n<p><a href="#1">I am having trouble registration application. It says my email address is already in use. What should I do?</a><br /> <a href="#2">How do I apply to exhibit my artwork at Harn Gallery?</a><br /> <a href="#3">Can artists living outside of the United States apply?</a><br /> <a href="#4">What does the application entail?</a><br /> <a href="#5">Is there an application fee?</a><br /> <a href="#6">What kind of artwork do you show?</a><br /> <a href="#7">How will you market my art?</a><br /> <a href="#8">What is your commission structure?</a><br /> <a href="#9">Who covers the costs of packaging and shipping the artwork to the Buyer&rsquo;s address?</a><br /> <a href="#10">Where is Harn Gallery based?</a><br /> <a href="#11">If I exhibit my work at Harn Gallery, may I seek other gallery representation?</a><br /> <a href="#12">How do I know when my artwork is sold? What do I do once it is sold?</a><br /> <a href="#13">When and how do I get paid for sold artwork?</a><br /> <a href="#14">Who owns the rights to my artwork once it is sold?</a><br /> <a href="#15">Can clients living outside of the United States purchase my art on Harn Gallery?</a><br /> <a href="#16">How do I submit more art if I am already exhibiting my work at Harn Gallery?</a><br /><a href="#21">What is a Curator''s review?</a><br /> <a href="#17">Do I need to sign my artwork?</a><br /> <a href="#18">Does Harn Gallery sell framed artwork?</a><br /> <a href="#19">May I place a link on my Harn Gallery profile page to my personal website?</a><br /> <a href="#20">Who should I contact with additional questions?</a><br /> <br /> &nbsp;</p>\n<p><strong><a name="1"></a>I am having trouble with the registration application. It says my email address is already in use. What should I do?</strong><br /> You cannot use the same email address for both a collector and an artist account. If you have already registered your email address as a Collector and would like to open an Artist&rsquo;s account please use a different email address.<br /> <br /> <strong><a name="2"></a>How do I apply to exhibit my artwork at Harn Gallery?</strong><br /> Please click the "Register" link at the top right of this page.<br /> <br /> <strong><a name="3"></a>Can artists living outside of the United States apply?</strong><br /> Yes. Our application is open to artists from around the world. <br /> <br /> <strong><a name="4"></a>What does the application entail?</strong><br /> The application is a simple, two-step process that takes about 5 minutes. The first page is for your contact information and artistic background. The second page asks that you upload five sample images of your artwork. Your application will then be reviewed within 2 days.<br /> <br /> <strong><a name="5"></a>Is there an application fee?</strong><br /> No. Registration is free. <br /> <br /> <strong><a name="6"></a>What kind of artwork do you show?</strong><br /> We exhibit art in every genre, style, size, and media. <br /> <br /> <strong><a name="7"></a>How will you market my art?</strong><br /> We promote our artists'' work in a number of ways. We manage a large online advertising campaign and we do a lot of search engine optimization. We have a large email list, and a popular Facebook page. <br /> <br /> <strong><a name="8"></a>What is your commission structure?</strong><br /> If you select &ldquo;Worldwide&rdquo; as the shipping option in the registration page, Harn Gallery will pay you 80% of the selling price.&nbsp; Pay for shipping and get your profit!<br /><br /><em>Example 1:</em><br />You live in New York City. <br />A buyer from New Orleans purchased one of your artworks. <br />Selling price: $850. <br />You keep 80% of this amount: $680. This is the amount you will receive from us.<br />You pay the shipping costs: $34 (based on Fedex rates in February 2014 for a 2kg or 4.5lbs weight artwork). <br />Your profit: $646.<br /><br /><br /><em>Example 2:</em><br />You live in London. <br />A buyer from Philadelphia purchased one of your artworks. <br />Selling price: $1,500. <br />You keep 80% of this amount: $1,200. This is the amount you will receive from us.<br />You pay the shipping costs: $168 (based on Fedex rates in February 2014 for a 2kg or 4.5lbs&nbsp;weight artwork). <br />Your profit: $1,032.<br /><br />If you want to ship your art to buyers located only in your country, you can select &ldquo;My country only&rdquo; in the registration page. In this case we will pay you 65% of the selling price. You would still be responsible for the shipping cost in this instance.<br /> <br /> <strong><a name="9"></a>Who covers the costs of packaging and shipping the artwork to the Buyer&rsquo;s address?</strong><br /> You (the artist) cover the cost of packaging and shipping the artwork to the Buyer.<br /> <br /> <strong><a name="10"></a>Where is Harn Gallery based?</strong><br /> Our main office is located in HK, although we are primarily a virtual gallery. <br /> <br /> <strong><a name="11"></a>If I exhibit my work at Harn Gallery, may I seek other gallery representation?</strong><br /> Yes. <br /> <br /> <strong><a name="12"></a>How do I know when my artwork is sold? What do I do once it is sold?</strong><br /> Once your art is sold, you will receive an email notifying you of the sale. <br /> <br /> <strong><a name="13"></a>When and how do I get paid for sold artwork?</strong><br /> We pay by Paypal or bank transfer 7 day after artwork is delivered to the client.<br /> <br /> <strong><a name="14"></a>Who owns the rights to my artwork once it is sold?</strong><br /> You retain the rights to your art after it is sold.<br /> <br /> <strong><a name="15"></a>Can clients living outside of the United States purchase my art on Harn Gallery?</strong><br /> Yes! We have many international customers.<br /> <br /> <strong><a name="16"></a>How do I submit more art if I am already exhibiting my work at Harn Gallery?</strong><br /> You can upload your artwork through your artist profile page using a quality JPEG or PNG file. The image must be in focus, true to the color of the art, and at least 770 pixels wide.<br /><br /><strong><a name="21"></a>What is a </strong><button class="btnGreen" style="cursor: default;">CURATOR''S REVIEW?</button><br />A curator''s review is a professional&rsquo;s opinion on your work. You will get more sales by adding a curator&rsquo;s review next to your artwork.<br /><br />Why?<br />More people tend to buy artwork with curator&rsquo;s reviews. For collectors buying art online, it is often valuable to get a professional&rsquo;s opinion.<br /><br />Who?<br />The reviews are written by our leading curator, Louis Guillaume. He has been a Director of the Harn Gallery for the past 2 years. He has over 7 years&rsquo; of experience working with emerging artists and curating exhibitions.<br /><br />How?<br />The purpose of each review is to highlight the positive aspects of your work. The review will emphasize its originality, the mastering of a technique, the use of light, movement, and emotions; it will link your artwork to famous artists and will explain how it relates to the history of art.<br /><br />Where?<br />Below is where the curator&rsquo;s Review will be added next to your artwork.<br /><br /><img src="/uploads/1112.png" alt="" /><br /><br /> <br /> <strong><a name="17"></a>Do I need to sign my artwork?</strong><br /> All art should be signed. It is important in identifying you as the creator. In addition, many collectors prefer to purchase signed artwork.<br /> <br /> <strong><a name="18"></a>Does Harn Gallery sell framed artwork?</strong><br /> We prefer to sell artwork unframed as our clients tend to like to frame their purchases themselves. That said, if you''d like to sell your art framed please let the visitors know by checking the &ldquo;Framed&rdquo; box when you upload the artwork.<br /> <br /> <strong><a name="19"></a>May I place a link on my Harn Gallery profile page to my personal website?</strong><br /> Yes.<br /> <br /> <strong><a name="20"></a>Who should I contact with additional questions?</strong><br /> Please use the contact form.</p>'),
(6, 'newsletter', '<p>By signing up to our weekly newsletter you will receive a <button class="btnPink" style="cursor: default;">$25 CREDIT</button> on your first purchase.<br />Be the first to <button class="btnGreen" style="cursor: default;">DISCOVER</button> emerging artists from around the world. <br />Get <button class="btnGreen" style="cursor: default;">SPECIAL PRICING</button> and promotions. <br />Enjoy <button class="btnGreen" style="cursor: default;">PRIORITY ACCESS</button> to exclusive offers and more.<br /><br /></p>'),
(7, 'copyright', '<p style="text-align: justify;">Harn Gallery, ("Harn Gallery") respects the intellectual property rights of others and expects its users to do the same.<br /><br />It is Harn Gallery''s policy, in appropriate circumstances and at its discretion, to disable and/or terminate the accounts of users who repeatedly infringe or are repeatedly charged with infringing the copyrights or other intellectual property rights of others.<br /><br />Harn Gallery will respond expeditiously to claims of copyright infringement committed using the Harn Gallery website (the "Site") that are reported via <a href="/contact-us">www.harngallery.com/contact-us</a>.<br /><br />If you are a copyright owner, or are authorized to act on behalf of one, or authorized to act under any exclusive right under copyright, please report alleged copyright infringements taking place on or through the Site by completing the following DMCA Notice of Alleged Infringement. Upon receipt of the notice as described below, Harn Gallery will take whatever action, in its sole discretion, it deems appropriate, including removal of the challenged material from the Site.</p>\n<h5 style="text-align: justify;"><br />DMCA Notice of Alleged Infringement ("Notice")</h5>\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Identify the copyrighted work that you claim has been infringed, or - if multiple copyrighted works are covered by this Notice - you may provide a representative list of the copyrighted works that you claim have been infringed.<br /><br />&nbsp;&nbsp;&nbsp; Identify (i) the material that you claim is infringing (or to be the subject of infringing activity) and that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit us to locate the material, including at a minimum, if applicable, the URL of the link shown on the Site where such material may be found, and (ii) the reference or link, to the material or activity that you claim to be infringing, that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit us to locate that reference or link, including at a minimum, if applicable, the URL of the link shown on the Site where such reference or link may be found.<br /><br />&nbsp;&nbsp;&nbsp; Provide your mailing address, telephone number, and, if available, email address.<br /><br />&nbsp;&nbsp;&nbsp; Include both of the following statements in the body of the Notice:<br /><br />"I hereby state that I have a good faith belief that the disputed use of the copyrighted material or reference or link to such material is not authorized by the copyright owner, its agent, or the law (e.g., as a fair use)."<br /><br />"I hereby state that the information in this Notice is accurate and, under penalty of perjury, that I am the owner, or authorized to act on behalf of the owner, of the copyright or of an exclusive right under the copyright that is allegedly infringed."<br /><br />&nbsp;&nbsp;&nbsp; Provide your full legal name and physical signature.<br /><br />Deliver this Notice, with all items completed, to:<br />French On Demand Ltd &ndash; Harn Gallery, Unit 1010, 10/F, Miramar Tower, 132 Nathan Road, Tsim Sha Tsui, Kowloon, Hong Kong (no zip/postal code for Hong Kong).<br /><br />&nbsp;</p>');
INSERT INTO `bf_homepage` (`id`, `name`, `value`) VALUES
(8, 'terms', '<p style="text-align: justify;">The Harn Gallery ("we" or "our") provides a service for selling and purchasing original works of art (the "Services") through our website, accessible at <a>www.harngallery.com</a> (the "Site"). Please read carefully the following terms and conditions ("Terms") and our Privacy Policy, which may be found at www.harngallery.com/privacy and which is incorporated by reference into these Terms. These Terms govern your access to and use of the Site and Services, and constitute a binding legal agreement between you and the Harn Gallery.<br /><br />YOU ACKNOWLEDGE AND AGREE THAT, BY ACCESSING OR USING THE SITE OR SERVICES OR BY SELLING OR PURCHASING A WORK ON OR THROUGH THE SITE OR SERVICES OR BY POSTING ANY CONTENT ON THE SITE, YOU ARE INDICATING THAT YOU HAVE READ, UNDERSTAND AND AGREE TO BE BOUND BY THESE TERMS. IF YOU DO NOT AGREE TO THESE TERMS, THEN YOU HAVE NO RIGHT TO ACCESS OR USE THE SITE OR SERVICES. If you accept or agree to these Terms on behalf of a company or other legal entity, you represent and warrant that you have the authority to bind that company or other legal entity to these Terms and, in such event, "you" and "your" will refer and apply to that company or other legal entity.</p>\n<h5 style="text-align: justify;"><br />Modification</h5>\n<p style="text-align: justify;">Harn Gallery reserves the right, at its sole discretion, to modify, discontinue or terminate the Site or Services or to modify these Terms, at any time and without prior notice. If we modify these Terms, we will post the modification on the Site or provide you with notice of the modification. By continuing to access or use the Site or Services after we have posted a modification on the Site or have provided you with notice of a modification, you are indicating that you agree to be bound by the modified Terms. If the modified Terms are not acceptable to you, your only recourse is to cease using the Site and Services.</p>\n<h5 style="text-align: justify;"><br />Eligibility</h5>\n<p style="text-align: justify;">The Site and Services are intended solely for persons who are 18 or older. Any access to or use of the Site or Services by anyone under 18 is expressly prohibited. By accessing or using the Site or Services you represent and warrant that you are 18 or older.</p>\n<h5 style="text-align: justify;"><br />Account Registration</h5>\n<p style="text-align: justify;">In order to list a work on the Site or to make a purchase through the Site, you must first create an account ("Account") by completing our registration process. During the registration process you will be required to provide certain information and you will establish a username and a password. Upon completion of our registration process you will become a "Member." You agree to provide accurate, current and complete information during the registration process and to update such information to keep it accurate, current and complete. Harn Gallery reserves the right to suspend or terminate your Account if any information provided during the registration process or thereafter proves to be inaccurate, not current or incomplete. You are responsible for safeguarding your password. You agree not to disclose your password to any third party and to take sole responsibility for any activities or actions under your Account, whether or not you have authorized such activities or actions. You will immediately notify Harn Gallery of any unauthorized use of your Account.</p>\n<h5 style="text-align: justify;"><br />Privacy</h5>\n<p style="text-align: justify;">See Harn Gallery&rsquo;s Privacy Policy at <a href="/privacy-policy">www.harngallery.com/privacy-policy</a> for information and notices concerning Harn Gallery&rsquo;s collection and use of your personal information.</p>\n<h5 style="text-align: justify;"><br />Seller Terms and Conditions<br /><br />Listing Works on the Site</h5>\n<p style="text-align: justify;">As a Member, you may submit listings for original works of art ("Original Works of Art") that you have created and that you desire to sell through the Site and Services. You may not submit listings for Original Works of Art that were created by another artist. In order for your listings to be accepted, you must provide Harn Gallery with all the information requested on the applicable page of our Site and you must comply with any other Harn Gallery requirements as identified on such page. Without limiting the generality of the foregoing, if you submit listings for sale you may be required to verify your identity by separately providing Harn Gallery with a copy of a government-issued ID or similar documentation. You acknowledge that your listings may not be immediately searchable by keyword or category for several hours (or up to 24 hours in some circumstances). The placement of your listings in search and browse results may be based on factors that include without limitation title, keywords and price.<br /><br />You acknowledge that Harn Gallery reserves the right to promote and market Original Works of Art through the use of sales and/or discounts. The sale or discount amount will apply to the listing price of Original Works of Art . You always retain the right to remove a listing for an Original Work of Art.<br /><br />If you want to remove a listing for an Original Work of Art or Digital Work from the Site you must go to your account, click on the image you want to delete and then click on Delete and follow the steps set forth on that page.</p>\n<h5 style="text-align: justify;"><br />Responsibility for Works</h5>\n<p style="text-align: justify;">You acknowledge and agree that you are solely responsible for all Original Works of Art that you make available through the Site and Services. Accordingly, you represent and warrant that: (i) as to Original Works of Art that you make available through the Site and Services, you are the creator of all such Original Works of Arts and you are the sole and exclusive owner of all such Original Works of Art; and (ii) the Original Works that you make available through the Site and Services nor Harn Gallery&rsquo;s use and exploitation thereof as contemplated under these Terms will infringe, misappropriate or violate a third party''s patent, copyright, trademark, trade secret, moral rights or other intellectual property rights, or rights of publicity or privacy, or result in the violation of any applicable law or regulation.</p>\n<h5 style="text-align: justify;"><br />Online Sales</h5>\n<p style="text-align: justify;">If you submit listings for Original Works of Art, you hereby appoint Harn Gallery as an independent non-exclusive reseller with the right to resell such Original Works of Art through the Site and Services and on third party websites and you hereby grant Harn Gallery a worldwide, transferable, nonexclusive, right and license, with a right to sublicense, to: (i) use, reproduce, distribute, publicly perform and publicly display copies of the Original Work of Art Sales via Online Sales channels; and (ii) access, view, use, crop, resize, copy, distribute, license, publicly display, publicly perform, transmit and broadcast copies of the Original Work of Art in any form, medium or technology now known or later developed for the purpose of promoting Harn Gallery, the Site and the Services. You acknowledge and agree that the foregoing license rights are granted on a royalty-free basis and that your sole compensation for the grant of such license rights, if any, will be in the form of the Artist Revenue Share (defined below), which is payable only upon the sale of an Original Work of Art via the Online Sales channel.<br /><br />As between you and Harn Gallery, Harn Gallery will be deemed the seller of any Original Works of Art that are purchased via Online Sales channels<br /><br />Harn Gallery will be responsible for collecting billing and shipping information from the purchaser and for processing payment for such purchases via the Site and Services.<br /><br />For Original Works of Art, Harn Gallery will provide you with the name and address of the purchaser and, unless otherwise instructed in writing by Harn Gallery, you will be responsible for shipping the purchased Original Work of Art directly to the purchaser. Harn Gallery will provide you with information regarding its preferred shippers. You agree to ship the purchased Original Work of Art to the purchaser within seven days following the date of purchase (the "Shipping Period"). If you do not ship the purchased Original Work of Art to the purchaser prior to the expiration of the Shipping Period, then the sale may be cancelled.<br /><br />You will send a photo or scanned copy of the shipping receipt with the tracking number to info@harngallery.com within seven days following the date of purchase (the "Shipping Period"). If you do not send this document prior to the expiration of the Shipping Period, then the sale may be cancelled.<br /><br />You will be paid 7 days after the artwork has been confirmed to have been successfully delivered to the purchaser. If you have selected &ldquo;Worldwide&rdquo; as the shipping option on the Harn Gallery registration page, Harn Gallery will take a 20% commission on the final sale price; you are entitled to 80% of the final sale price. If you have selected "My Country only" as the shipping option in the registration page, Harn Gallery will take a 35% commission on the final sale price; you are entitled to 65% of the final sale price. Depending on your preference, Harn Gallery will send you the payment by bank transfer or Paypal.<br />Purchaser Terms and Conditions<br />Purchases of Original Works of Art<br /><br />As a Member, you may purchase Original Works of Art that are listed by other Members on the Site. When you purchase such an Original Work of Art through the Site and Services, you are purchasing the work from Harn Gallery and not from the Member identified on the listing for such work. Prices for Original Works of Art will be as specified on the applicable listing. The Member identified on the listing of the Original Work of Art will ship the purchased work directly to you.<br />Order Cancellations<br /><br />Harn Gallery reserves the right to cancel any order for an Original Work of Art placed via the Site and Services if Harn Gallery determines, in its sole discretion, that the item is mispriced, out of stock, discontinued, or otherwise unavailable at the price listed via the Site and Services. If Harn Gallery cancels an order placed via the Site and Services, Harn Gallery will send you an email confirmation of such cancellation and you will not be charged for your order.</p>\n<h5 style="text-align: justify;"><br />Terms for both Sellers and Purchasers<br /><br />Transaction Restrictions</h5>\n<p style="text-align: justify;">If you are a Member and have submitted a listing for an Original Work of Art and have been contacted through the Site and Services by another Member with respect to purchasing either of the foregoing, you may not sell such Original Work of to such Member independent of the Site and Services. Similarly, if you are a Member and desire to purchase an Original Work of for which another Member has submitted a listing, you may not purchase such Original Work of Art or Digital Work from such Member independent of the Site and Services.<br />Color<br /><br />You understand and agree that Harn Gallery uses commercially reasonable efforts to display the colors of Original Works of Art accurately via the Site and Services. However, because individual computer monitors may display colors differently, Harn Gallery is not responsible for the color accuracy of any Original Works of Art displayed on the Site and Services, and disclaims all liability in this regard.</p>\n<h5 style="text-align: justify;"><br />Member Content</h5>\n<p style="text-align: justify;">In addition to submitting listings for Original Works of Art, Harn Gallery may, in its sole discretion, designate areas of the Site in which Members can post, upload, publish or submit text, graphics, audio, video, images of works of art or other content on or to the Site (individually or collectively, "Member Content"). "Member Content" excludes any images of Original Works of Art for which a Member submits a listing, as described under "Seller Terms and Conditions" above. Harn Gallery does not claim any ownership rights in any such Member Content and nothing in these Terms will be deemed to restrict any rights that a Member may have to use and exploit any such Member Content. By making available any Member Content on or through the Site and Services, (i) you grant Harn Gallery a worldwide, non-exclusive, transferable, royalty-free, commission-free license to crop, resize, publicly display, publicly perform, distribute, broadcast and transmit such Member Content on or through the Site and Services in any form, medium or technology now known or later developed, for the purpose of promoting Harn Gallery, the Site and Services, and (ii) you grant directly to other Members the right and license to view your Member Content on or through the Site and Services only in connection with such Member''s authorized use of the Site and Services. You reserve all other rights and licenses in and to any Member Content that you make available on or through the Site and Services.</p>\n<p style="text-align: justify;"><br />You acknowledge and agree that you are solely responsible for any Member Content that you make available on or through the Site. You represent and warrant that: (i) you are the sole and exclusive owner of all Member Content that you make available on the Site or that you have all rights, licenses, consents and releases that are necessary to make available such Member Content and to grant all rights and licenses in such Member Content as granted under these Terms; and (ii)neither the Member Content nor your making available any Member Content on the Site nor any use of any Member Content as permitted under these Terms will infringe, misappropriate or violate a third party''s patent, copyright, trademark, trade secret, moral rights or other intellectual property rights, or rights of publicity or privacy, or result in the violation of any applicable law or regulation.</p>\n<h5 style="text-align: justify;"><br />Harn Gallery Content</h5>\n<p style="text-align: justify;">Harn Gallery may also make available through the Site and Services text, graphics, audio, video and images of works of art (collectively, "Harn Gallery Content"), which is owned by Harn Gallery ("Harn Gallery-owned Content). Harn Gallery authorizes you to download, view and print &ldquo;Harn Gallery-owned Content" solely for your personal use in visiting the Site and, if you are a Member, in connection with exercising the rights granted to Members under these Terms. For Harn Gallery Licensed Content, the scope of your rights thereto will be solely as set forth in the applicable license agreement that governs the use of such content, as identified on the page of the Site where such content appears. Nothing in these Terms is intended to modify, restrict or limit the scope of your rights as to such Harn Gallery Licensed Content. No licenses or rights are granted to you by implication or otherwise under any intellectual property rights owned or controlled by Harn Gallery or its licensors, except for the licenses and rights expressly granted in these Terms.</p>\n<h5 style="text-align: justify;"><br />General Prohibitions</h5>\n<p style="text-align: justify;">You agree not to do any of the following:<br /><br />Post, upload, publish, submit or transmit any text, graphics, images, software, music, audio, video, information or other material that: (i)infringes, misappropriates or violates a third party''s patent, copyright, trademark, trade secret, moral rights or other intellectual property rights, or rights of publicity or privacy; (ii) violates, or encourages any conduct that would violate, any applicable law or regulation or would give rise to civil liability; (iii) is fraudulent, false, misleading or deceptive; (iv) is defamatory, obscene, pornographic, vulgar or offensive; (v)promotes discrimination, bigotry, racism, hatred, harassment or harm against any individual or group; (vi) is violent or threatening or promotes violence or actions that are threatening to any other person; (vii) harms minors in any way; or (viii) promotes illegal or harmful activities or substances.<br />Use, display, mirror or frame the Site, or any individual element within the Site, Harn Gallery&rsquo;s name, any Harn Gallery trademark, logo or other proprietary information, or the layout and design of any page or form contained on a page, without Harn gallery&rsquo;s express written consent;<br />Access, tamper with, or use non-public areas of the Site, Harn gallery&rsquo;s computer systems, or the technical delivery systems of Harn gallery&rsquo;s providers;<br />Attempt to probe, scan or test the vulnerability of any Harn Gallery system or network or breach any security or authentication measures;<br />Avoid, bypass, remove, deactivate, impair, descramble or otherwise circumvent any technological measure implemented by Harn Gallery to protect the Site, Services, Harn Gallery Content or Member Content;<br />Attempt to access or search the Site, Services, Harn Gallery Content or Member Content or download Harn Gallery Content or Member Content from the Site or Services through the use of any engine, software, tool, agent, device or mechanism (including spiders, robots, crawlers, data mining tools or the like) other than the software and/or search agents provided by Harn Gallery or other generally available third party web browsers;<br />Send any unsolicited or unauthorized advertising, promotional materials, email, junk mail, spam, chain letters or other form of solicitation;<br />Use any meta tags or other hidden text or metadata utilizing a Harn Gallery trademark, logo URL or product name without Harn Gallery&rsquo;s express written consent;<br />Use the Site, Services, Harn Gallery Content or Member Content for any commercial purpose or the benefit of any third party in any manner not otherwise permitted by these Terms;<br />Forge any TCP/IP packet header or any part of the header information in any email or newsgroup posting, or in any way use the Site, Services, Harn Gallery Content or Member Content to send altered, deceptive or false source-identifying information;<br />Attempt to decipher, decompile, disassemble or reverse engineer any of the software used to provide the Site, Services, Harn Gallery Content or Member Content;<br />Interfere with, or attempt to interfere with, the access of any user, host or network, including, without limitation, sending a virus, overloading, flooding, spamming, or mail-bombing the Site;<br />Collect or store any personally identifiable information from the Site or Services from other users of the Site or Services without their express permission;<br />Impersonate or misrepresent your affiliation with any person or entity;<br />Violate any applicable law or regulation; or<br />Encourage or enable any other individual to do any of the foregoing.<br /><br />Harn Gallery will have the right to investigate and prosecute violations of any of the above to the fullest extent of the law. Harn Gallery may involve and cooperate with law enforcement authorities in prosecuting users who violate these Terms. You acknowledge that Harn Galleryhas no obligation to monitor your access to or use of the Site or Services or to remove any Member Content, but has the right to do so for the purpose of operating the Site and Services, to ensure your compliance with these Terms, or to comply with applicable law or the order or requirement of a court, administrative agency or other governmental body. Harn Gallery reserves the right, at any time and without prior notice, to remove or disable access to any Member Content, listings for Original Works of Art or Digital Works, Harn Gallery Content or any other text, graphics, images, software, music, audio, video, information or other content or material that Harn Gallery, at its sole discretion, considers to be objectionable, in violation of these Terms or otherwise harmful to the Site or Services.</p>\n<h5 style="text-align: justify;"><br />Ownership</h5>\n<p style="text-align: justify;">The Site, Services and Harn Gallery Content are protected by copyright and trademarks. Except as expressly provided in these Terms, Harn Gallery and its licensors exclusively own all right, title and interest in and to the Site, Services and Harn Gallery Content, including all associated intellectual property rights. You will not remove, alter or obscure any copyright, trademark, service mark or other proprietary rights notices incorporated in or accompanying the Site, Services or Harn Gallery Content.</p>\n<h5 style="text-align: justify;"><br />Copyright Policy</h5>\n<p style="text-align: justify;">Harn Gallery respects copyright law and expects its users to do the same. It is Harn Gallery&rsquo;s policy to terminate in appropriate circumstances of Members or other Account holders who repeatedly infringe or are believed to be repeatedly infringing the rights of copyright holders.</p>\n<h5 style="text-align: justify;"><br />Links</h5>\n<p style="text-align: justify;">The Site may contain links to third-party websites or resources. You acknowledge and agree that Harn Gallery is not responsible or liable for: (i) the availability or accuracy of such websites or resources; or (ii) the content, products, or services on or available from such websites or resources. Links to such websites or resources do not imply any endorsement by Harn Gallery of such websites or resources or the content, products, or services available from such websites or resources. You acknowledge sole responsibility for and assume all risk arising from your use of any such websites or resources.</p>\n<h5 style="text-align: justify;"><br />Termination and Account Cancellation</h5>\n<p style="text-align: justify;">If you breach any of these Terms, Harn Gallery will have the right to suspend or disable your Account or terminate these Terms, at its sole discretion and without prior notice to you. Harn Gallery reserves the right to revoke your access to and use of the Site, Services, Harn Gallery Content and Member Content at any time, with or without cause. You may cancel your Account at any time by sending via the Contact form on www.harngallery.com/contact-us.</p>\n<h5 style="text-align: justify;"><br />Disclaimers</h5>\n<p style="text-align: justify;">THE SITE, SERVICES, HARN GALLERY CONTENT AND MEMBER CONTENT ARE PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED. WITHOUT LIMITING THE FOREGOING, HARN GALLERY EXPLICITLY DISCLAIMS ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE OR NON-INFRINGEMENT, AND ANY WARRANTIES ARISING OUT OF COURSE OF DEALING OR USAGE OF TRADE. HARN GALLERY MAKES NO WARRANTY THAT THE SITE, SERVICES, HARN GALLERY CONTENT OR MEMEBR CONTENT WILL MEET YOUR REQUIREMENTS OR BE AVAILABLE ON AN UNINTERRUPTED, SECURE, OR ERROR-FREE BASIS. HARN GALLERY MAKES NO WARRANTY REGARDING THE QUALITY OF ANY WORKS, SERVICES, CONTENT OR PRODUCTS PURCHASED OR OBTAINED THROUGH THE SITE OR SERVICES OR THE ACCURACY, TIMELINESS, TRUTHFULNESS, COMPLETENESS OR RELIABILITY OF ANY CONTENT OBTAINED THROUGH THE SITE OR SERVICES.</p>\n<p style="text-align: justify;">NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED FROM HARN GALLERY OR THROUGH THE SITE OR SERVICES, WILL CREATE ANY WARRANTY NOT EXPRESSLY MADE HEREIN.</p>\n<p style="text-align: justify;">YOU ARE SOLELY RESPONSIBLE FOR ALL OF YOUR COMMUNICATIONS AND INTERACTIONS WITH OTHER MEMBERS OR USERS OF THE SITE OR SERVICES AND WITH OTHER PERSONS WITH WHOM YOU COMMUNICATE OR INTERACT AS A RESULT OF YOUR USE OF THE SITE OR SERVICES. YOU UNDERSTAND THAT, EXCEPT AS EXPRESSLY SET FORTH IN THESE TERMS, HARN GALLERY DOES NOT SCREEN OR INQUIRE INTO THE BACKGROUND OF MEMBERS OR OTHER USERS OF THE SITE OR SERVICES, NOR DOES HARN GALLERY MAKE ANY ATTEMPT TO VERIFY THE STATEMENTS OF ANY MEMBERS OR USERS OF THE SITE OR SERVICES. HARN GALLERY MAKES NO REPRESENTATIONS OR WARRANTIES AS TO THE CONDUCT OF USERS OF THE SITE OR SERVICES.YOU AGREE TO TAKE REASONABLE PRECAUTIONS IN ALL COMMUNICATIONS AND INTERACTIONS WITH OTHER MEMBERS OR USERS OF THE SITE OR SERVICES AND WITH OTHER PERSONS WITH WHOM YOU COMMUNICATE OR INTERACT AS A RESULT OF YOUR USE OF THE SITE OR SERVICES, PARTICULARLY IF YOU DECIDE TO MEET OFFLINE OR IN PERSON.</p>\n<h5 style="text-align: justify;"><br />Indemnity</h5>\n<p style="text-align: justify;">You agree to defend, indemnify, and hold Harn Gallery, its officers, directors, employees and agents, harmless from and against any claims, liabilities, damages, losses, and expenses, including, without limitation, reasonable legal and accounting fees, arising out of or in any way connected with your access to or use of the Site, Services, Harn Gallery Content or Member Content, or your violation of these Terms.</p>\n<h5 style="text-align: justify;"><br />Limitation of Liability</h5>\n<p style="text-align: justify;">You acknowledge and agree that, to the maximum extent permitted by law, the entire risk arising out of your access to and use of the Site, Services, Harn Gallery Content and Member Content remains with you. Neither Harn Gallery nor any other party involved in creating, producing, or delivering the Site, Services, Harn Gallery Content or Member Content will be liable for any incidental, special, exemplary or consequential damages, including lost profits, loss of data or loss of goodwill, service interruption, computer damage or system failure or the cost of substitute products or services, or for any damages for personal or bodily injury or emotional distress arising out of or in connection with these Terms or from the use of or inability to use the Site, Services, Harn Gallery Content or Member Content, or from any communications, interactions or meetings with other Members or users of the Site or Services or other persons with whom you communicate or interact as a result of your use of the Site or Services, whether based on warranty, contract, tort (including negligence), product liability or any other legal theory, and whether or not Harn Gallery has been informed of the possibility of such damage, even if a limited remedy set forth herein is found to have failed of its essential purpose.</p>\n<h5 style="text-align: justify;"><br />Proprietary Rights Notices</h5>\n<p style="text-align: justify;">All trademarks, service marks, logos, trade names and any other proprietary designations of Harn Gallery used herein are trademarks or registered trademarks of Harn Gallery. Any other trademarks, service marks, logos, trade names and any other proprietary designations are the trademarks or registered trademarks of their respective parties.</p>\n<h5 style="text-align: justify;"><br />Controlling Law and Jurisdiction</h5>\n<p style="text-align: justify;">These Terms and any action related thereto will be governed by the laws of Hong Kong.</p>\n<h5 style="text-align: justify;"><br />Entire Agreement</h5>\n<p style="text-align: justify;">These Terms constitute the entire and exclusive understanding and agreement between Harn Gallery and you regarding the Site and Services and these Terms supersede and replace any and all prior oral or written understandings or agreements between Harn Gallery and you regarding the Site and Services.</p>\n<h5 style="text-align: justify;"><br />Assignment</h5>\n<p style="text-align: justify;">You may not assign or transfer these Terms, by operation of law or otherwise, without Harn Gallery&rsquo;s prior written consent. Any attempt by you to assign or transfer these Terms, without such consent, will be null and of no effect. Harn Gallery may assign or transfer these Terms, at its sole discretion, without restriction. Subject to the foregoing, these Terms will bind and inure to the benefit of the parties, their successors and permitted assigns.</p>\n<h5 style="text-align: justify;"><br />Contacting Harn Gallery</h5>\n<p style="text-align: justify;">If you have any questions about these Terms, please contact Harn Gallery via the Contact Us form on <a href="/contact-us">http://www.harngallery.com/contact-us</a>.<br /><br /><br /></p>'),
(9, 'stats', '<script type="text/javascript">\n\n  var _gaq = _gaq || [];\n  _gaq.push([''_setAccount'', ''UA-47160371-1'']);\n  _gaq.push([''_trackPageview'']);\n\n  (function() {\n    var ga = document.createElement(''script''); ga.type = ''text/javascript''; ga.async = true;\n    ga.src = (''https:'' == document.location.protocol ? ''https://ssl'' : ''http://www'') + ''.google-analytics.com/ga.js'';\n    var s = document.getElementsByTagName(''script'')[0]; s.parentNode.insertBefore(ga, s);\n  })();\n\n</script>'),
(10, 'commission_intro', '<p>Become part of the design process by commissioning your own unique piece of art. This is a gratifying, one-of-a-kind experience that you are sure to enjoy. Here is how the process works: </p>'),
(11, 'invest_intro', '<p>Art can be a great investment if it is purchased in a smart way. COMING SOON</p>'),
(12, 'invest_artist1', 'invest1.jpg'),
(13, 'invest_artist2', 'invest2.jpg'),
(14, 'invest_desc1', '<p>Artist 1 description. Blah blah blah blah blah. Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.</p>'),
(15, 'invest_desc2', '<p>Artist 2 description. Blah blah blah blah blah. Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.Blah blah blah blah blah.invest_desc2<br /><br /></p>'),
(16, 'commission_desc', '<p style="text-align: center;"><img src="/uploads/commissionthe24.png" alt="" /></p>\n<p style="text-align: center;">&nbsp; &nbsp;&nbsp; <button class="btnBlue" style="cursor: default;">1. Browse</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <button class="btnBlue" style="cursor: default;">2. CLICK</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btnBlue" style="cursor: default;">3. DISCUSS</button></p>\n<p><br /><br />1. Browse our gallery and find the artist whose work most interests you.<br />2.&nbsp;Click "Commission the artist" on the artist''s profile page (if there is no such link, the artist doesn''t accept commissions). <br />&nbsp;&nbsp;&nbsp; In the contact form, describe your vision of the piece you''d like the artist to create. <br />3. We will then coordinate a call with the artist to discuss the desired artwork, price and delivery time.<br /><br /></p>'),
(17, 'ntw_date_text', '27 January 2014');

-- --------------------------------------------------------

--
-- Table structure for table `bf_login_attempts`
--

CREATE TABLE IF NOT EXISTS `bf_login_attempts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL,
  `login` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `bf_members`
--

CREATE TABLE IF NOT EXISTS `bf_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `country` varchar(3) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `commission` int(11) DEFAULT NULL,
  `about` longtext,
  `photo` varchar(100) DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `token` varchar(25) NOT NULL,
  `ban` int(11) NOT NULL DEFAULT '0',
  `iia` int(11) NOT NULL DEFAULT '0',
  `iia_photo` varchar(255) DEFAULT NULL,
  `iia_desc` text,
  `reg_date1` datetime DEFAULT NULL,
  `reg_date2` datetime DEFAULT NULL,
  `ship_type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


--
-- Table structure for table `bf_messages`
--

CREATE TABLE IF NOT EXISTS `bf_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `bf_messages`
--

INSERT INTO `bf_messages` (`id`, `name`, `message`) VALUES
(1, 'registration_activation', '<p>Hi {firstname} <br /> please click the following link to activate your account. <br /><br /> {link}<br /><br /> Many Thanks <br /> Harn Gallery</p>'),
(2, 'artist_approval', '<p>Dear {firstname} {lastname} <br /> your application has been appoved. You can now sell your artworks in our gallery! <br /><br /> Please login to&nbsp;<a href="http://www.harngallery.com">www.harngallery.com</a> with your email address: {email} <br /><br /> Then click "Upload Art" in My Account<br /><br /> Regards <br /> Harn Gallery</p>'),
(3, 'artist_reject', '<p>Dear {firstname} {lastname} <br /> thank you again for your submission to our gallery. <br /><br /> Unfortunately we are unable to accept your Art at this time. Please be ensured that its quality is not called into question.<br />It is just that your work does not match the current artistic vision of the gallery. <br /><br /> We Wish you the best of luck in the future. <br /><br /> Please note that you can keep using your account by log in in at http://www.harngallery.com <br /><br /> Regards <br /> Harn Gallery</p>'),
(4, 'new_artwork_uploaded', '<p>Congratulations! Your art has been successfully uploaded. You can see your work at {link}</p>\n<p><a href="http://www.harngallery.com/members/upload_art">Upload more Art</a></p>'),
(5, 'sales_artist', '<p>Dear {artist_name}, <br /> a Collector purchased one of your artworks. <br /><br /> {artwork_title} <br /> {artwork_link} <br /><br /> In accordance with the <a href="http://www.harngallery.com/terms-of-service">Terms and Conditions</a> please follow these steps:<br /><br /> 1/ Within 7 days please ship the artwork by courier service (Fedex, DHL, UPS) to the following address:<br /><br /> {buyer_name} <br /> {shipping_address}<br /><br /> 2/ Send a photo (or scanned copy) of the shipping receipt with the tracking # to <a href="mailto:info@harngallery.com">info@harngallery.com</a>.<br /> You will receive ${price_after_commission} ({percentage_after_commission} of the selling price) as soon as the artwork is received by the Collector. <br /><br /> Failure to comply with the above conditions will result in the cancellation of the sale.<br /> <br /> Best regards, <br /> Harn Gallery</p>'),
(6, 'sales_collector', '<p>Dear Collector, <br /> the artwork {artwork_title} by {artist_name} you just purchased will be shipped by the Artist to your shipping address within 7 days.<br /><br /> Shipping Address: <br />{shipping_address} <br /> <br /> Regards,<br /> Harn Gallery</p>');

-- --------------------------------------------------------

--
-- Table structure for table `bf_new_this_week`
--

CREATE TABLE IF NOT EXISTS `bf_new_this_week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `bf_newsletter`
--

CREATE TABLE IF NOT EXISTS `bf_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `bf_permissions`
--

CREATE TABLE IF NOT EXISTS `bf_permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`permission_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bf_permissions`
--

INSERT INTO `bf_permissions` (`permission_id`, `name`, `description`, `status`) VALUES
(53, 'Members.Content.Edit', '', 'active'),
(2, 'Site.Content.View', 'Allow users to view the Content Context', 'active'),
(3, 'Site.Reports.View', 'Allow users to view the Reports Context', 'active'),
(4, 'Site.Settings.View', 'Allow users to view the Settings Context', 'active'),
(5, 'Site.Developer.View', 'Allow users to view the Developer Context', 'active'),
(6, 'Bonfire.Roles.Manage', 'Allow users to manage the user Roles', 'active'),
(7, 'Bonfire.Users.Manage', 'Allow users to manage the site Users', 'active'),
(8, 'Bonfire.Users.View', 'Allow users access to the User Settings', 'active'),
(9, 'Bonfire.Users.Add', 'Allow users to add new Users', 'active'),
(10, 'Bonfire.Database.Manage', 'Allow users to manage the Database settings', 'active'),
(11, 'Bonfire.Emailer.Manage', 'Allow users to manage the Emailer settings', 'active'),
(12, 'Bonfire.Logs.View', 'Allow users access to the Log details', 'active'),
(13, 'Bonfire.Logs.Manage', 'Allow users to manage the Log files', 'active'),
(14, 'Bonfire.Emailer.View', 'Allow users access to the Emailer settings', 'active'),
(15, 'Site.Signin.Offline', 'Allow users to login to the site when the site is offline', 'active'),
(16, 'Bonfire.Permissions.View', 'Allow access to view the Permissions menu unders Settings Context', 'active'),
(17, 'Bonfire.Permissions.Manage', 'Allow access to manage the Permissions in the system', 'active'),
(18, 'Bonfire.Roles.Delete', 'Allow users to delete user Roles', 'active'),
(19, 'Bonfire.Modules.Add', 'Allow creation of modules with the builder.', 'active'),
(20, 'Bonfire.Modules.Delete', 'Allow deletion of modules.', 'active'),
(21, 'Permissions.Administrator.Manage', 'To manage the access control permissions for the Administrator role.', 'active'),
(22, 'Permissions.Editor.Manage', 'To manage the access control permissions for the Editor role.', 'active'),
(50, 'Bonfire.Roles.Add', 'To add New Roles', 'active'),
(54, 'Members.Content.Delete', '', 'active'),
(24, 'Permissions.User.Manage', 'To manage the access control permissions for the User role.', 'active'),
(25, 'Permissions.Developer.Manage', 'To manage the access control permissions for the Developer role.', 'active'),
(49, 'Bonfire.Profiler.View', 'To view the Console Profiler Bar.', 'active'),
(27, 'Activities.Own.View', 'To view the users own activity logs', 'active'),
(28, 'Activities.Own.Delete', 'To delete the users own activity logs', 'active'),
(29, 'Activities.User.View', 'To view the user activity logs', 'active'),
(30, 'Activities.User.Delete', 'To delete the user activity logs, except own', 'active'),
(31, 'Activities.Module.View', 'To view the module activity logs', 'active'),
(32, 'Activities.Module.Delete', 'To delete the module activity logs', 'active'),
(33, 'Activities.Date.View', 'To view the users own activity logs', 'active'),
(34, 'Activities.Date.Delete', 'To delete the dated activity logs', 'active'),
(35, 'Bonfire.UI.Manage', 'Manage the Bonfire UI settings', 'active'),
(36, 'Bonfire.Settings.View', 'To view the site settings page.', 'active'),
(37, 'Bonfire.Settings.Manage', 'To manage the site settings.', 'active'),
(38, 'Bonfire.Activities.View', 'To view the Activities menu.', 'active'),
(39, 'Bonfire.Database.View', 'To view the Database menu.', 'active'),
(40, 'Bonfire.Migrations.View', 'To view the Migrations menu.', 'active'),
(41, 'Bonfire.Builder.View', 'To view the Modulebuilder menu.', 'active'),
(42, 'Bonfire.Roles.View', 'To view the Roles menu.', 'active'),
(43, 'Bonfire.Sysinfo.View', 'To view the System Information page.', 'active'),
(44, 'Bonfire.Translate.Manage', 'To manage the Language Translation.', 'active'),
(45, 'Bonfire.Translate.View', 'To view the Language Translate menu.', 'active'),
(46, 'Bonfire.UI.View', 'To view the UI/Keyboard Shortcut menu.', 'active'),
(52, 'Members.Content.Create', '', 'active'),
(51, 'Members.Content.View', '', 'active'),
(55, 'Members.Reports.View', '', 'active'),
(56, 'Members.Reports.Create', '', 'active'),
(57, 'Members.Reports.Edit', '', 'active'),
(58, 'Members.Reports.Delete', '', 'active'),
(59, 'Members.Settings.View', '', 'active'),
(60, 'Members.Settings.Create', '', 'active'),
(61, 'Members.Settings.Edit', '', 'active'),
(62, 'Members.Settings.Delete', '', 'active'),
(63, 'Members.Developer.View', '', 'active'),
(64, 'Members.Developer.Create', '', 'active'),
(65, 'Members.Developer.Edit', '', 'active'),
(66, 'Members.Developer.Delete', '', 'active'),
(67, 'Artwork.Content.View', '', 'active'),
(68, 'Artwork.Content.Create', '', 'active'),
(69, 'Artwork.Content.Edit', '', 'active'),
(70, 'Artwork.Content.Delete', '', 'active'),
(71, 'Artwork.Reports.View', '', 'active'),
(72, 'Artwork.Reports.Create', '', 'active'),
(73, 'Artwork.Reports.Edit', '', 'active'),
(74, 'Artwork.Reports.Delete', '', 'active'),
(75, 'Artwork.Settings.View', '', 'active'),
(76, 'Artwork.Settings.Create', '', 'active'),
(77, 'Artwork.Settings.Edit', '', 'active'),
(78, 'Artwork.Settings.Delete', '', 'active'),
(79, 'Artwork.Developer.View', '', 'active'),
(80, 'Artwork.Developer.Create', '', 'active'),
(81, 'Artwork.Developer.Edit', '', 'active'),
(82, 'Artwork.Developer.Delete', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `bf_role_permissions`
--

CREATE TABLE IF NOT EXISTS `bf_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_role_permissions`
--

INSERT INTO `bf_role_permissions` (`role_id`, `permission_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 24),
(1, 25),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(2, 2),
(2, 3),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 49);

-- --------------------------------------------------------

--
-- Table structure for table `bf_roles`
--

CREATE TABLE IF NOT EXISTS `bf_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  `login_destination` varchar(255) NOT NULL DEFAULT '/',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `default_context` varchar(255) NOT NULL DEFAULT 'content',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `bf_roles`
--

INSERT INTO `bf_roles` (`role_id`, `role_name`, `description`, `default`, `can_delete`, `login_destination`, `deleted`, `default_context`) VALUES
(1, 'Administrator', 'Has full control over every aspect of the site.', 0, 0, '/admin', 0, 'content'),
(2, 'Editor', 'Can handle day-to-day management, but does not have full power.', 0, 1, '', 0, 'content'),
(4, 'User', 'This is the default user with access to login.', 1, 0, '', 0, 'content'),
(6, 'Developer', 'Developers typically are the only ones that can access the developer tools. Otherwise identical to Administrators, at least until the site is handed off.', 0, 1, '', 0, 'content');

-- --------------------------------------------------------

--
-- Table structure for table `bf_schema_version`
--

CREATE TABLE IF NOT EXISTS `bf_schema_version` (
  `type` varchar(40) NOT NULL,
  `version` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_schema_version`
--

INSERT INTO `bf_schema_version` (`type`, `version`) VALUES
('core', 37),
('members_', 2),
('artwork_', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bf_sessions`
--

CREATE TABLE IF NOT EXISTS `bf_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bf_settings`
--

CREATE TABLE IF NOT EXISTS `bf_settings` (
  `name` varchar(30) NOT NULL,
  `module` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bf_settings`
--

INSERT INTO `bf_settings` (`name`, `module`, `value`) VALUES
('site.title', 'core', 'Harngallery'),
('site.system_email', 'core', 'zulkarnain.shariff@gmail.com'),
('site.status', 'core', '1'),
('site.list_limit', 'core', '25'),
('site.show_profiler', 'core', '1'),
('site.show_front_profiler', 'core', '1'),
('updates.do_check', 'core', '0'),
('updates.bleeding_edge', 'core', '0'),
('auth.allow_register', 'core', '0'),
('auth.login_type', 'core', 'email'),
('auth.use_usernames', 'core', '1'),
('auth.allow_remember', 'core', '1'),
('auth.remember_length', 'core', '1209600'),
('auth.do_login_redirect', 'core', '1'),
('auth.use_extended_profile', 'core', '0'),
('sender_email', 'email', 'zulkarnain.shariff@gmail.com'),
('protocol', 'email', 'sendmail'),
('mailpath', 'email', '/usr/sbin/sendmail'),
('smtp_host', 'email', ''),
('smtp_user', 'email', ''),
('smtp_pass', 'email', ''),
('smtp_port', 'email', ''),
('smtp_timeout', 'email', ''),
('mailtype', 'email', 'text'),
('site.languages', 'core', 'a:1:{i:0;s:7:"english";}'),
('ext.street_name', 'core', ''),
('auth.allow_name_change', 'core', '1'),
('auth.name_change_frequency', 'core', '1'),
('auth.name_change_limit', 'core', '1'),
('auth.password_min_length', 'core', '8'),
('auth.password_force_numbers', 'core', '0'),
('auth.password_force_symbols', 'core', '0'),
('auth.password_force_mixed_case', 'core', '0'),
('form_save', 'core.ui', 'ctrl+s/⌘+s'),
('goto_content', 'core.ui', 'alt+c'),
('auth.user_activation_method', 'core', '0'),
('auth.password_show_labels', 'core', '0'),
('password_iterations', 'users', '8'),
('ext.state', 'core', 'CA'),
('ext.country', 'core', 'US'),
('ext.type', 'core', 'small');

-- --------------------------------------------------------

--
-- Table structure for table `bf_slider`
--

CREATE TABLE IF NOT EXISTS `bf_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `bf_slider`
--

INSERT INTO `bf_slider` (`id`, `image`, `description`, `link`) VALUES
(1, 'slide1 (1).jpg', 'New and Noticeable this week 27 January 2014', 'http://www.harngallery.com/new-this-week'),
(2, 'slide2.png', 'Collection: Under $800', 'http://www.harngallery.com/under-500'),
(3, 'slide3.png', 'Get $25 Credit: Sign up to our Newsletter', 'http://www.harngallery.com/newsletter');

-- --------------------------------------------------------

--
-- Table structure for table `bf_staff_favourites`
--

CREATE TABLE IF NOT EXISTS `bf_staff_favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `bf_states`
--

CREATE TABLE IF NOT EXISTS `bf_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `abbrev` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bf_states`
--

INSERT INTO `bf_states` (`id`, `name`, `abbrev`) VALUES
(1, 'Alaska', 'AK'),
(2, 'Alabama', 'AL'),
(3, 'American Samoa', 'AS'),
(4, 'Arizona', 'AZ'),
(5, 'Arkansas', 'AR'),
(6, 'California', 'CA'),
(7, 'Colorado', 'CO'),
(8, 'Connecticut', 'CT'),
(9, 'Delaware', 'DE'),
(10, 'District of Columbia', 'DC'),
(11, 'Florida', 'FL'),
(12, 'Georgia', 'GA'),
(13, 'Guam', 'GU'),
(14, 'Hawaii', 'HI'),
(15, 'Idaho', 'ID'),
(16, 'Illinois', 'IL'),
(17, 'Indiana', 'IN'),
(18, 'Iowa', 'IA'),
(19, 'Kansas', 'KS'),
(20, 'Kentucky', 'KY'),
(21, 'Louisiana', 'LA'),
(22, 'Maine', 'ME'),
(23, 'Marshall Islands', 'MH'),
(24, 'Maryland', 'MD'),
(25, 'Massachusetts', 'MA'),
(26, 'Michigan', 'MI'),
(27, 'Minnesota', 'MN'),
(28, 'Mississippi', 'MS'),
(29, 'Missouri', 'MO'),
(30, 'Montana', 'MT'),
(31, 'Nebraska', 'NE'),
(32, 'Nevada', 'NV'),
(33, 'New Hampshire', 'NH'),
(34, 'New Jersey', 'NJ'),
(35, 'New Mexico', 'NM'),
(36, 'New York', 'NY'),
(37, 'North Carolina', 'NC'),
(38, 'North Dakota', 'ND'),
(39, 'Northern Mariana Islands', 'MP'),
(40, 'Ohio', 'OH'),
(41, 'Oklahoma', 'OK'),
(42, 'Oregon', 'OR'),
(43, 'Palau', 'PW'),
(44, 'Pennsylvania', 'PA'),
(45, 'Puerto Rico', 'PR'),
(46, 'Rhode Island', 'RI'),
(47, 'South Carolina', 'SC'),
(48, 'South Dakota', 'SD'),
(49, 'Tennessee', 'TN'),
(50, 'Texas', 'TX'),
(51, 'Utah', 'UT'),
(52, 'Vermont', 'VT'),
(53, 'Virgin Islands', 'VI'),
(54, 'Virginia', 'VA'),
(55, 'Washington', 'WA'),
(56, 'West Virginia', 'WV'),
(57, 'Wisconsin', 'WI'),
(58, 'Wyoming', 'WY'),
(59, 'Armed Forces Africa', 'AE'),
(60, 'Armed Forces Canada', 'AE'),
(61, 'Armed Forces Europe', 'AE'),
(62, 'Armed Forces Middle East', 'AE'),
(63, 'Armed Forces Pacific', 'AP');

-- --------------------------------------------------------

--
-- Table structure for table `bf_user_cookies`
--

CREATE TABLE IF NOT EXISTS `bf_user_cookies` (
  `user_id` bigint(20) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_on` datetime NOT NULL,
  KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bf_user_meta`
--

CREATE TABLE IF NOT EXISTS `bf_user_meta` (
  `meta_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) NOT NULL DEFAULT '',
  `meta_value` text,
  PRIMARY KEY (`meta_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `bf_users`
--

CREATE TABLE IF NOT EXISTS `bf_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `email` varchar(120) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password_hash` char(60) NOT NULL,
  `reset_hash` varchar(40) DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(40) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `reset_by` int(10) DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_message` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT '',
  `display_name_changed` date DEFAULT NULL,
  `timezone` char(4) NOT NULL DEFAULT 'UM6',
  `language` varchar(20) NOT NULL DEFAULT 'english',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activate_hash` varchar(40) NOT NULL DEFAULT '',
  `password_iterations` int(4) NOT NULL,
  `force_password_reset` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `bf_users`
--

INSERT INTO `bf_users` (`id`, `role_id`, `email`, `username`, `password_hash`, `reset_hash`, `last_login`, `last_ip`, `created_on`, `deleted`, `reset_by`, `banned`, `ban_message`, `display_name`, `display_name_changed`, `timezone`, `language`, `active`, `activate_hash`, `password_iterations`, `force_password_reset`) VALUES
(1, 1, 'zulkarnain.shariff@gmail.com', 'admin', '$P$BysEX4BbO5kLWGhZncIxsL6tXxXWH30', 'fb0c642fdb5dba59a8a4aeaefddee7f45cb5e148', '2013-11-26 18:42:34', '220.255.2.167', '2013-11-09 09:36:22', 0, 1384145787, 0, NULL, 'admin', NULL, 'UP8', 'english', 1, '', 8, 0),
(2, 1, 'lgkanlacas@yahoo.fr', 'LG', '$P$BJ.m3zXoh5MRnPoPF2iidLk.oKt2EJ1', NULL, '2013-11-10 08:30:35', '110.171.43.61', '2013-11-09 10:33:26', 0, NULL, 0, NULL, 'Louis-guillaume', NULL, 'UP8', 'english', 1, '', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bf_visits`
--

CREATE TABLE IF NOT EXISTS `bf_visits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `word` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_config`
--

CREATE TABLE IF NOT EXISTS `cart_config` (
  `config_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `config_order_number_prefix` varchar(50) NOT NULL DEFAULT '',
  `config_order_number_suffix` varchar(50) NOT NULL DEFAULT '',
  `config_increment_order_number` tinyint(1) NOT NULL DEFAULT '0',
  `config_min_order` smallint(5) NOT NULL DEFAULT '0',
  `config_quantity_decimals` tinyint(1) NOT NULL DEFAULT '0',
  `config_quantity_limited_by_stock` tinyint(1) NOT NULL DEFAULT '0',
  `config_increment_duplicate_items` tinyint(1) NOT NULL DEFAULT '0',
  `config_remove_no_stock_items` tinyint(1) NOT NULL DEFAULT '0',
  `config_auto_allocate_stock` tinyint(1) NOT NULL DEFAULT '0',
  `config_save_ban_shipping_items` tinyint(1) NOT NULL DEFAULT '0',
  `config_weight_type` varchar(25) NOT NULL DEFAULT '',
  `config_weight_decimals` tinyint(1) NOT NULL DEFAULT '0',
  `config_display_tax_prices` tinyint(1) NOT NULL DEFAULT '0',
  `config_price_inc_tax` tinyint(1) NOT NULL DEFAULT '0',
  `config_multi_row_duplicate_items` tinyint(1) NOT NULL DEFAULT '0',
  `config_dynamic_reward_points` tinyint(1) NOT NULL DEFAULT '0',
  `config_reward_point_multiplier` double(8,4) NOT NULL DEFAULT '0.0000',
  `config_reward_voucher_multiplier` double(8,4) NOT NULL DEFAULT '0.0000',
  `config_reward_voucher_ratio` smallint(5) NOT NULL DEFAULT '0',
  `config_reward_point_days_pending` smallint(5) NOT NULL DEFAULT '0',
  `config_reward_point_days_valid` smallint(5) NOT NULL DEFAULT '0',
  `config_reward_voucher_days_valid` smallint(5) NOT NULL DEFAULT '0',
  `config_custom_status_1` varchar(50) NOT NULL DEFAULT '',
  `config_custom_status_2` varchar(50) NOT NULL DEFAULT '',
  `config_custom_status_3` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`config_id`),
  KEY `config_id` (`config_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_data`
--

CREATE TABLE IF NOT EXISTS `cart_data` (
  `cart_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_data_user_fk` int(11) NOT NULL DEFAULT '0',
  `cart_data_array` text,
  `cart_data_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cart_data_readonly_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cart_data_id`),
  UNIQUE KEY `cart_data_id` (`cart_data_id`) USING BTREE,
  KEY `cart_data_user_fk` (`cart_data_user_fk`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `curr_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `curr_name` varchar(50) NOT NULL DEFAULT '',
  `curr_exchange_rate` double(8,4) NOT NULL DEFAULT '0.0000',
  `curr_symbol` varchar(25) NOT NULL DEFAULT '',
  `curr_symbol_suffix` tinyint(1) NOT NULL DEFAULT '0',
  `curr_thousand_separator` varchar(10) NOT NULL DEFAULT '',
  `curr_decimal_separator` varchar(10) NOT NULL DEFAULT '',
  `curr_status` tinyint(1) NOT NULL DEFAULT '0',
  `curr_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`curr_id`),
  KEY `curr_id` (`curr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_calculation`
--

CREATE TABLE IF NOT EXISTS `discount_calculation` (
  `disc_calculation_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `disc_calculation` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`disc_calculation_id`),
  UNIQUE KEY `disc_calculation_id` (`disc_calculation_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Note: Do not alter the order or id''s of records in table.' AUTO_INCREMENT=1;

--
-- Dumping data for table `discount_calculation`
--

INSERT INTO `discount_calculation` (`disc_calculation_id`, `disc_calculation`) VALUES
(1, 'Percentage Based'),
(2, 'Flat Fee'),
(3, 'New Value');

-- --------------------------------------------------------

--
-- Table structure for table `discount_columns`
--

CREATE TABLE IF NOT EXISTS `discount_columns` (
  `disc_column_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `disc_column` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`disc_column_id`),
  UNIQUE KEY `disc_column_id` (`disc_column_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Note: Do not alter the order or id''s of records in table.' AUTO_INCREMENT=1;

--
-- Dumping data for table `discount_columns`
--

INSERT INTO `discount_columns` (`disc_column_id`, `disc_column`) VALUES
(1, 'Item Price'),
(2, 'Item Shipping'),
(3, 'Summary Item Total'),
(4, 'Summary Shipping Total'),
(5, 'Summary Total'),
(6, 'Summary Total (Voucher)');

-- --------------------------------------------------------

--
-- Table structure for table `discount_group_items`
--

CREATE TABLE IF NOT EXISTS `discount_group_items` (
  `disc_group_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `disc_group_item_group_fk` int(11) NOT NULL DEFAULT '0',
  `disc_group_item_item_fk` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`disc_group_item_id`),
  UNIQUE KEY `disc_group_item_id` (`disc_group_item_id`) USING BTREE,
  KEY `disc_group_item_group_fk` (`disc_group_item_group_fk`) USING BTREE,
  KEY `disc_group_item_item_fk` (`disc_group_item_item_fk`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_groups`
--

CREATE TABLE IF NOT EXISTS `discount_groups` (
  `disc_group_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `disc_group` varchar(255) NOT NULL DEFAULT '',
  `disc_group_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`disc_group_id`),
  UNIQUE KEY `disc_group_id` (`disc_group_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_methods`
--

CREATE TABLE IF NOT EXISTS `discount_methods` (
  `disc_method_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `disc_method_type_fk` smallint(5) NOT NULL DEFAULT '0',
  `disc_method_column_fk` smallint(5) NOT NULL DEFAULT '0',
  `disc_method_calculation_fk` smallint(5) NOT NULL DEFAULT '0',
  `disc_method` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`disc_method_id`),
  UNIQUE KEY `disc_method_id` (`disc_method_id`) USING BTREE,
  KEY `disc_method_column_fk` (`disc_method_column_fk`) USING BTREE,
  KEY `disc_method_calculation_fk` (`disc_method_calculation_fk`) USING BTREE,
  KEY `disc_method_type_fk` (`disc_method_type_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Note: Do not alter the order or id''s of records in table.' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `discount_methods`
--

INSERT INTO `discount_methods` (`disc_method_id`, `disc_method_type_fk`, `disc_method_column_fk`, `disc_method_calculation_fk`, `disc_method`) VALUES
(1, 1, 1, 1, 'Item Price - Percentage Based'),
(2, 1, 1, 2, 'Item Price - Flat Fee'),
(3, 1, 1, 3, 'Item Price - New Value'),
(4, 1, 2, 1, 'Item Shipping - Percentage Based'),
(5, 1, 2, 2, 'Item Shipping - Flat Fee'),
(6, 1, 2, 3, 'Item Shipping - New Value'),
(7, 2, 3, 1, 'Summary Item Total - Percentage Based'),
(8, 2, 3, 2, 'Summary Item Total - Flat Fee'),
(9, 2, 4, 1, 'Summary Shipping Total - Percentage Based'),
(10, 2, 4, 2, 'Summary Shipping Total - Flat Fee'),
(11, 2, 4, 3, 'Summary Shipping Total - New Value'),
(12, 2, 5, 1, 'Summary Total - Percentage Based'),
(13, 2, 5, 2, 'Summary Total - Flat Fee'),
(14, 3, 6, 2, 'Summary Total - Flat Fee (Voucher)');

-- --------------------------------------------------------

--
-- Table structure for table `discount_tax_methods`
--

CREATE TABLE IF NOT EXISTS `discount_tax_methods` (
  `disc_tax_method_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `disc_tax_method` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`disc_tax_method_id`),
  UNIQUE KEY `disc_tax_method_id` (`disc_tax_method_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Note: Do not alter the order or id''s of records in table.' AUTO_INCREMENT=1;

--
-- Dumping data for table `discount_tax_methods`
--

INSERT INTO `discount_tax_methods` (`disc_tax_method_id`, `disc_tax_method`) VALUES
(1, 'Apply Tax Before Discount '),
(2, 'Apply Discount Before Tax'),
(3, 'Apply Discount Before Tax, Add Original Tax');

-- --------------------------------------------------------

--
-- Table structure for table `discount_types`
--

CREATE TABLE IF NOT EXISTS `discount_types` (
  `disc_type_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `disc_type` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`disc_type_id`),
  UNIQUE KEY `disc_type_id` (`disc_type_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Note: Do not alter the order or id''s of records in table.' AUTO_INCREMENT=1;

--
-- Dumping data for table `discount_types`
--

INSERT INTO `discount_types` (`disc_type_id`, `disc_type`) VALUES
(1, 'Item Discount'),
(2, 'Summary Discount'),
(3, 'Reward Voucher');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE IF NOT EXISTS `discounts` (
  `disc_id` int(11) NOT NULL AUTO_INCREMENT,
  `disc_type_fk` smallint(5) NOT NULL DEFAULT '0',
  `disc_method_fk` smallint(5) NOT NULL DEFAULT '0',
  `disc_tax_method_fk` tinyint(1) NOT NULL DEFAULT '0',
  `disc_user_acc_fk` int(11) NOT NULL DEFAULT '0',
  `disc_item_fk` int(11) NOT NULL DEFAULT '0' COMMENT 'Item / Product Id',
  `disc_group_fk` int(11) NOT NULL DEFAULT '0',
  `disc_location_fk` smallint(5) NOT NULL DEFAULT '0',
  `disc_zone_fk` smallint(5) NOT NULL DEFAULT '0',
  `disc_code` varchar(50) NOT NULL DEFAULT '' COMMENT 'Discount Code',
  `disc_description` varchar(255) NOT NULL DEFAULT '' COMMENT 'Name shown in cart when active',
  `disc_quantity_required` smallint(5) NOT NULL DEFAULT '0' COMMENT 'Quantity required for offer',
  `disc_quantity_discounted` smallint(5) NOT NULL DEFAULT '0' COMMENT 'Quantity affected by offer',
  `disc_value_required` double(8,2) NOT NULL DEFAULT '0.00',
  `disc_value_discounted` double(8,2) NOT NULL DEFAULT '0.00' COMMENT '% discount, flat fee discount, new set price - specified via calculation_fk',
  `disc_recursive` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Discount is repeatable multiple times on one item',
  `disc_non_combinable_discount` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Cannot be applied if any other discount is applied',
  `disc_void_reward_points` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Voids any current reward points',
  `disc_force_ship_discount` tinyint(1) NOT NULL DEFAULT '0',
  `disc_custom_status_1` varchar(50) NOT NULL DEFAULT '',
  `disc_custom_status_2` varchar(50) NOT NULL DEFAULT '',
  `disc_custom_status_3` varchar(50) NOT NULL DEFAULT '',
  `disc_usage_limit` smallint(5) NOT NULL DEFAULT '0' COMMENT 'Number of offers available',
  `disc_valid_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `disc_expire_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `disc_status` tinyint(1) NOT NULL DEFAULT '0',
  `disc_order_by` smallint(1) NOT NULL DEFAULT '100' COMMENT 'Default value of 100 to ensure non set ''order by'' values of zero are not before 1,2,3 etc.',
  PRIMARY KEY (`disc_id`),
  UNIQUE KEY `disc_id` (`disc_id`) USING BTREE,
  KEY `disc_item_fk` (`disc_item_fk`),
  KEY `disc_location_fk` (`disc_location_fk`),
  KEY `disc_zone_fk` (`disc_zone_fk`),
  KEY `disc_method_fk` (`disc_method_fk`) USING BTREE,
  KEY `disc_type_fk` (`disc_type_fk`),
  KEY `disc_group_fk` (`disc_group_fk`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE IF NOT EXISTS `item_stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_item_fk` int(11) NOT NULL DEFAULT '0',
  `stock_quantity` smallint(5) NOT NULL DEFAULT '0',
  `stock_auto_allocate_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stock_id`),
  UNIQUE KEY `stock_id` (`stock_id`) USING BTREE,
  KEY `stock_item_fk` (`stock_item_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `location_type`
--

CREATE TABLE IF NOT EXISTS `location_type` (
  `loc_type_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `loc_type_parent_fk` smallint(5) NOT NULL DEFAULT '0',
  `loc_type_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`loc_type_id`),
  UNIQUE KEY `loc_type_id` (`loc_type_id`),
  KEY `loc_type_parent_fk` (`loc_type_parent_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `location_zones`
--

CREATE TABLE IF NOT EXISTS `location_zones` (
  `lzone_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `lzone_name` varchar(50) NOT NULL DEFAULT '',
  `lzone_description` longtext NOT NULL,
  `lzone_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lzone_id`),
  UNIQUE KEY `lzone_id` (`lzone_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_type_fk` smallint(5) NOT NULL DEFAULT '0',
  `loc_parent_fk` int(11) NOT NULL DEFAULT '0',
  `loc_ship_zone_fk` smallint(5) NOT NULL DEFAULT '0',
  `loc_tax_zone_fk` smallint(5) NOT NULL DEFAULT '0',
  `loc_name` varchar(50) NOT NULL DEFAULT '',
  `loc_status` tinyint(1) NOT NULL DEFAULT '0',
  `loc_ship_default` tinyint(1) NOT NULL DEFAULT '0',
  `loc_tax_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`loc_id`),
  UNIQUE KEY `loc_id` (`loc_id`) USING BTREE,
  KEY `loc_type_fk` (`loc_type_fk`) USING BTREE,
  KEY `loc_tax_zone_fk` (`loc_tax_zone_fk`),
  KEY `loc_ship_zone_fk` (`loc_ship_zone_fk`),
  KEY `loc_parent_fk` (`loc_parent_fk`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `new_this_week`
--

CREATE TABLE IF NOT EXISTS `new_this_week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `ord_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `ord_artist_id` int(5) NOT NULL DEFAULT '0',
  `ord_artist_name` varchar(255) NOT NULL DEFAULT '',
  `ord_artist_email` varchar(255) NOT NULL DEFAULT '',
  `ord_artist_country` varchar(255) NOT NULL DEFAULT '',
  `ord_artwork_link` varchar(255) NOT NULL DEFAULT '',
  `ord_det_order_number_fk` varchar(25) NOT NULL DEFAULT '',
  `ord_det_cart_row_id` varchar(32) NOT NULL DEFAULT '',
  `ord_det_item_fk` int(11) NOT NULL DEFAULT '0',
  `ord_det_item_name` varchar(255) NOT NULL DEFAULT '',
  `ord_det_quantity` double(10,2) NOT NULL DEFAULT '0.00',
  `ord_det_price` double(10,2) NOT NULL DEFAULT '0.00',
  `ord_det_price_total` double(10,2) NOT NULL DEFAULT '0.00',
  `ord_det_status_message` varchar(255) NOT NULL DEFAULT '',
  `ord_det_quantity_cancelled` double(10,2) NOT NULL DEFAULT '0.00',
  `ord_det_shipped_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ord_det_id`),
  UNIQUE KEY `ord_det_id` (`ord_det_id`) USING BTREE,
  KEY `ord_det_order_number_fk` (`ord_det_order_number_fk`) USING BTREE,
  KEY `ord_det_item_fk` (`ord_det_item_fk`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
  `ord_status_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `ord_status_description` varchar(50) NOT NULL DEFAULT '',
  `ord_status_cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `ord_status_save_default` tinyint(1) NOT NULL DEFAULT '0',
  `ord_status_resave_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ord_status_id`),
  KEY `ord_status_id` (`ord_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`ord_status_id`, `ord_status_description`, `ord_status_cancelled`, `ord_status_save_default`, `ord_status_resave_default`) VALUES
(1, 'Awaiting Payment', 0, 1, 0),
(2, 'New Order', 0, 0, 1),
(3, 'Processing Order', 0, 0, 0),
(4, 'Order Complete', 0, 0, 0),
(5, 'Order Cancelled', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_summary`
--

CREATE TABLE IF NOT EXISTS `order_summary` (
  `ord_order_number` varchar(25) NOT NULL DEFAULT '',
  `ord_cart_data_fk` int(11) NOT NULL DEFAULT '0',
  `ord_collector` int(5) NOT NULL DEFAULT '0',
  `ord_item_summary_total` double(10,2) NOT NULL DEFAULT '0.00',
  `ord_item_summary_savings_total` double(10,2) NOT NULL DEFAULT '0.00',
  `ord_item_shipping_total` double(10,2) NOT NULL DEFAULT '0.00',
  `ord_total` double(10,2) NOT NULL DEFAULT '0.00',
  `ord_total_rows` int(10) NOT NULL DEFAULT '0',
  `ord_total_items` double(10,2) NOT NULL DEFAULT '0.00',
  `ord_currency` varchar(25) NOT NULL DEFAULT '',
  `ord_status` tinyint(1) NOT NULL DEFAULT '0',
  `ord_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ord_bill_name` varchar(75) NOT NULL DEFAULT '',
  `ord_bill_address_01` varchar(75) NOT NULL DEFAULT '',
  `ord_bill_address_02` varchar(75) NOT NULL DEFAULT '',
  `ord_bill_city` varchar(50) NOT NULL DEFAULT '',
  `ord_bill_state` varchar(50) NOT NULL DEFAULT '',
  `ord_bill_post_code` varchar(25) NOT NULL DEFAULT '',
  `ord_bill_country` varchar(50) NOT NULL DEFAULT '',
  `ord_ship_name` varchar(75) NOT NULL DEFAULT '',
  `ord_ship_address_01` varchar(75) NOT NULL DEFAULT '',
  `ord_ship_address_02` varchar(75) NOT NULL DEFAULT '',
  `ord_ship_city` varchar(50) NOT NULL DEFAULT '',
  `ord_ship_state` varchar(50) NOT NULL DEFAULT '',
  `ord_ship_post_code` varchar(25) NOT NULL DEFAULT '',
  `ord_ship_country` varchar(50) NOT NULL DEFAULT '',
  `ord_email` varchar(255) NOT NULL DEFAULT '',
  `ord_phone` varchar(25) NOT NULL DEFAULT '',
  `ord_comments` longtext NOT NULL,
  PRIMARY KEY (`ord_order_number`),
  UNIQUE KEY `ord_order_number` (`ord_order_number`) USING BTREE,
  KEY `ord_cart_data_fk` (`ord_cart_data_fk`) USING BTREE,
  KEY `ord_collector` (`ord_collector`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `reward_points_converted`
--

CREATE TABLE IF NOT EXISTS `reward_points_converted` (
  `rew_convert_id` int(10) NOT NULL AUTO_INCREMENT,
  `rew_convert_ord_detail_fk` int(10) NOT NULL DEFAULT '10',
  `rew_convert_discount_fk` varchar(50) NOT NULL DEFAULT '',
  `rew_convert_points` int(10) NOT NULL DEFAULT '10',
  `rew_convert_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`rew_convert_id`),
  UNIQUE KEY `rew_convert_id` (`rew_convert_id`) USING BTREE,
  KEY `rew_convert_discount_fk` (`rew_convert_discount_fk`),
  KEY `rew_convert_ord_detail_fk` (`rew_convert_ord_detail_fk`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_item_rules`
--

CREATE TABLE IF NOT EXISTS `shipping_item_rules` (
  `ship_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `ship_item_item_fk` int(11) NOT NULL DEFAULT '0',
  `ship_item_location_fk` smallint(5) NOT NULL DEFAULT '0',
  `ship_item_zone_fk` smallint(5) NOT NULL DEFAULT '0',
  `ship_item_value` double(8,4) DEFAULT NULL,
  `ship_item_separate` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicate if item should have a shipping rate calculated specifically for it.',
  `ship_item_banned` tinyint(1) NOT NULL DEFAULT '0',
  `ship_item_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ship_item_id`),
  UNIQUE KEY `ship_item_id` (`ship_item_id`) USING BTREE,
  KEY `ship_item_zone_fk` (`ship_item_zone_fk`) USING BTREE,
  KEY `ship_item_location_fk` (`ship_item_location_fk`) USING BTREE,
  KEY `ship_item_item_fk` (`ship_item_item_fk`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_options`
--

CREATE TABLE IF NOT EXISTS `shipping_options` (
  `ship_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `ship_name` varchar(50) NOT NULL DEFAULT '',
  `ship_description` varchar(50) NOT NULL DEFAULT '',
  `ship_location_fk` smallint(5) NOT NULL DEFAULT '0',
  `ship_zone_fk` smallint(5) NOT NULL DEFAULT '0',
  `ship_inc_sub_locations` tinyint(1) NOT NULL DEFAULT '0',
  `ship_tax_rate` double(7,4) DEFAULT NULL,
  `ship_discount_inclusion` tinyint(1) NOT NULL DEFAULT '0',
  `ship_status` tinyint(1) NOT NULL DEFAULT '0',
  `ship_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ship_id`),
  UNIQUE KEY `ship_id` (`ship_id`) USING BTREE,
  KEY `ship_zone_fk` (`ship_zone_fk`) USING BTREE,
  KEY `ship_location_fk` (`ship_location_fk`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_rates`
--

CREATE TABLE IF NOT EXISTS `shipping_rates` (
  `ship_rate_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `ship_rate_ship_fk` smallint(5) NOT NULL DEFAULT '0',
  `ship_rate_value` double(8,2) NOT NULL DEFAULT '0.00',
  `ship_rate_tare_wgt` double(8,2) NOT NULL DEFAULT '0.00',
  `ship_rate_min_wgt` double(8,2) NOT NULL DEFAULT '0.00',
  `ship_rate_max_wgt` double(8,2) NOT NULL DEFAULT '9999.00',
  `ship_rate_min_value` double(10,2) NOT NULL DEFAULT '0.00',
  `ship_rate_max_value` double(10,2) NOT NULL DEFAULT '9999.00',
  `ship_rate_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ship_rate_id`),
  UNIQUE KEY `ship_rate_id` (`ship_rate_id`) USING BTREE,
  KEY `ship_rate_ship_fk` (`ship_rate_ship_fk`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_favourites`
--

CREATE TABLE IF NOT EXISTS `staff_favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `tax_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `tax_location_fk` smallint(5) NOT NULL DEFAULT '0',
  `tax_zone_fk` smallint(5) NOT NULL DEFAULT '0',
  `tax_name` varchar(25) NOT NULL DEFAULT '',
  `tax_rate` double(7,4) NOT NULL DEFAULT '0.0000',
  `tax_status` tinyint(1) NOT NULL DEFAULT '0',
  `tax_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tax_id`),
  UNIQUE KEY `tax_id` (`tax_id`),
  KEY `tax_zone_fk` (`tax_zone_fk`),
  KEY `tax_location_fk` (`tax_location_fk`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `tax_item_rates`
--

CREATE TABLE IF NOT EXISTS `tax_item_rates` (
  `tax_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_item_item_fk` int(11) NOT NULL DEFAULT '0',
  `tax_item_location_fk` smallint(5) NOT NULL DEFAULT '0',
  `tax_item_zone_fk` smallint(5) NOT NULL DEFAULT '0',
  `tax_item_rate` double(7,4) NOT NULL DEFAULT '0.0000',
  `tax_item_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tax_item_id`),
  UNIQUE KEY `tax_item_id` (`tax_item_id`) USING BTREE,
  KEY `tax_item_zone_fk` (`tax_item_zone_fk`),
  KEY `tax_item_location_fk` (`tax_item_location_fk`),
  KEY `tax_item_item_fk` (`tax_item_item_fk`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
