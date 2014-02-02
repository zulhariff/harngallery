-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2013 at 01:34 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `art_category`
--

CREATE TABLE IF NOT EXISTS `art_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `art_category`
--

INSERT INTO `art_category` (`id`, `name`) VALUES
(1, 'All'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

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
(17, 'Yellow');

-- --------------------------------------------------------

--
-- Table structure for table `art_medium`
--

CREATE TABLE IF NOT EXISTS `art_medium` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `art_medium`
--

INSERT INTO `art_medium` (`id`, `category_id`, `name`) VALUES
(1, 1, 'All'),
(2, 2, 'All'),
(3, 2, 'Acrylic'),
(4, 2, 'Aerosol Paint'),
(5, 2, 'Airbrush'),
(6, 2, 'Enamel'),
(7, 2, 'Encaustic Wax'),
(8, 2, 'Glaze'),
(9, 2, 'Gouache'),
(10, 2, 'Hot Wax'),
(11, 2, 'Household'),
(12, 2, 'Ink'),
(13, 2, 'Latex Paint'),
(14, 2, 'Magna Paint'),
(15, 2, 'Mixed Media'),
(16, 2, 'Oil'),
(17, 2, 'Oil Panel'),
(18, 2, 'Tempera'),
(19, 2, 'Watercolor'),
(20, 3, 'All'),
(21, 3, 'Black & White'),
(22, 3, 'C-type'),
(23, 3, 'Color'),
(24, 3, 'Digital'),
(25, 3, 'Dye Transfer'),
(26, 3, 'E-type'),
(27, 3, 'Full-spectrum'),
(28, 3, 'Gelatin Silver Process'),
(29, 3, 'Gicele'),
(30, 3, 'Lenticular'),
(31, 3, 'Photogram'),
(32, 3, 'Pinhole'),
(33, 3, 'Polaroid'),
(34, 3, 'Ray Print'),
(35, 4, 'All'),
(36, 4, 'Chalk'),
(37, 4, 'Charcoal'),
(38, 4, 'Colored Pencils'),
(39, 4, 'Conte'),
(40, 4, 'Crayon'),
(41, 4, 'Graphite'),
(42, 4, 'Oil Paster'),
(43, 4, 'Pastel'),
(44, 4, 'Pen And Ink'),
(45, 4, 'Pencil'),
(46, 4, 'Silverpoint'),
(47, 5, 'All'),
(48, 5, 'Brushes'),
(49, 5, 'Collagraph'),
(50, 5, 'Copper Etching Plate'),
(51, 5, 'Digital Print'),
(52, 5, 'Drawing'),
(53, 5, 'Drypoint'),
(54, 5, 'Engraving'),
(55, 5, 'Etching'),
(56, 5, 'Foil Imaging'),
(57, 5, 'Giclee Print'),
(58, 5, 'Glass'),
(59, 5, 'Ink'),
(60, 5, 'Linocuts'),
(61, 5, 'Lithography'),
(62, 5, 'Monotype'),
(63, 5, 'Painting'),
(64, 5, 'Screen-printing'),
(65, 5, 'Stencils'),
(66, 5, 'Watercolor'),
(67, 5, 'Woodcut'),
(68, 6, 'All'),
(69, 6, 'Decoupage'),
(70, 6, 'Digital'),
(71, 6, 'Encaustic'),
(72, 6, 'Fabric'),
(73, 6, 'Found Objects'),
(74, 6, 'Metail'),
(75, 6, 'Other'),
(76, 6, 'Painting'),
(77, 6, 'Paper'),
(78, 6, 'Photomontage'),
(79, 6, 'Wax'),
(80, 6, 'Wood'),
(81, 7, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `art_orientation`
--

CREATE TABLE IF NOT EXISTS `art_orientation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `art_style`
--

INSERT INTO `art_style` (`id`, `name`) VALUES
(1, 'All'),
(2, 'Abstract'),
(3, 'Abstract Expressionism'),
(4, 'Art Deco'),
(5, 'Cubism'),
(6, 'Dada'),
(7, 'Expressionism'),
(8, 'Impressionism'),
(9, 'Pop Art'),
(10, 'Realism'),
(11, 'Street Art'),
(12, 'Surrealism');

-- --------------------------------------------------------

--
-- Table structure for table `art_subject`
--

CREATE TABLE IF NOT EXISTS `art_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `art_subject`
--

INSERT INTO `art_subject` (`id`, `name`) VALUES
(1, 'All'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `bf_activities`
--

INSERT INTO `bf_activities` (`activity_id`, `user_id`, `activity`, `module`, `created_on`, `deleted`) VALUES
(1, 1, 'logged in from: 220.255.2.146', 'users', '2013-11-09 10:31:14', 0),
(2, 1, 'updated their profile: admin', 'users', '2013-11-09 10:32:00', 0),
(3, 1, 'logged in from: 220.255.2.173', 'users', '2013-11-09 10:32:12', 0),
(4, 1, 'created a new Administrator: Louis-guillaume', 'users', '2013-11-09 10:33:26', 0),
(5, 1, 'App settings saved from: 220.255.2.117', 'core', '2013-11-09 10:40:01', 0),
(6, 1, 'App settings saved from: 220.255.2.158', 'core', '2013-11-09 10:41:09', 0),
(7, 1, 'logged in from: 220.255.2.147', 'users', '2013-11-10 04:57:11', 0),
(8, 1, 'logged in from: 220.255.2.145', 'users', '2013-11-10 05:04:32', 0),
(9, 2, 'logged in from: 110.171.43.61', 'users', '2013-11-10 08:30:36', 0),
(10, 1, 'logged in from: 220.255.2.124', 'users', '2013-11-17 10:27:56', 0),
(11, 1, 'Created Module: Members : 220.255.2.141', 'modulebuilder', '2013-11-17 10:37:02', 0),
(12, 1, 'logged in from: 220.255.2.167', 'users', '2013-11-19 17:34:53', 0),
(13, 1, 'logged in from: 220.255.2.156', 'users', '2013-11-21 13:05:41', 0),
(14, 1, 'Created Module: Artwork : 220.255.2.122', 'modulebuilder', '2013-11-24 18:50:08', 0),
(15, 1, 'logged in from: 220.255.2.167', 'users', '2013-11-26 18:42:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bf_artwork`
--

CREATE TABLE IF NOT EXISTS `bf_artwork` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
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
  `date_uploaded` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `bf_artwork`
--

INSERT INTO `bf_artwork` (`id`, `image`, `title`, `description`, `created`, `user_id`, `price`, `cat_id`, `medium_id`, `style_id`, `orientation_id`, `size_id`, `color_id`, `height`, `width`, `dimension_unit`, `framing`, `keywords`, `curator_review`, `status`, `date_uploaded`) VALUES
(7, '1.JPG', 'Nice ', 'This is a beautiful painting', '2013-11-27', 1, 123, 2, 4, 2, NULL, NULL, 4, 500, 400, 1, 1, 'meh', NULL, NULL, '0000-00-00 00:00:00'),
(8, '3.jpeg', 'Bleh', 'Preety', '2013-01-04', 1, 145, 3, 18, 3, NULL, NULL, 7, 100, 100, 1, 1, '', NULL, NULL, '0000-00-00 00:00:00'),
(9, '4.png', 'Meh', '', '2013-01-17', 1, 232, 3, 32, 4, NULL, NULL, 7, 100, 200, 1, 1, '', NULL, NULL, '0000-00-00 00:00:00'),
(10, '234jhtykjhdfg.jpg', 'Colours', 'Colours', '2013-01-17', 2, 1600, 6, 70, 4, NULL, NULL, 17, 200, 340, 2, 1, '', NULL, NULL, '0000-00-00 00:00:00'),
(11, 'ART-HK-12-first-look-II-AM-04.jpg', 'Happy', 'Happy', '2010-02-17', 2, 600, 2, 5, 9, NULL, NULL, 3, 300, 400, 1, 1, '', NULL, NULL, '0000-00-00 00:00:00'),
(12, '23423fdas.jpg', 'Psyche', 'Psyche', '2013-01-03', 2, 300, 5, 52, 4, NULL, NULL, 7, 150, 150, 1, 1, '', NULL, NULL, '0000-00-00 00:00:00'),
(13, 'leaf-art-wallpaper.jpg', 'Leaf', 'Leaf', '2013-01-31', 2, 200, 2, 11, 5, NULL, NULL, 5, 150, 150, 1, 1, '', NULL, NULL, '0000-00-00 00:00:00'),
(14, 'art.jpg', 'Skull', 'Skull', '2013-01-18', 3, 300, 2, 5, 4, NULL, NULL, 2, 100, 200, 1, 1, '', NULL, NULL, '0000-00-00 00:00:00'),
(15, 'art-workshop-graphic.jpg', 'Pallette', 'Pallette', '2013-01-12', 3, 439, 2, 3, 10, NULL, NULL, 3, 300, 340, 1, 1, '', NULL, NULL, '0000-00-00 00:00:00'),
(16, 'abstract_art_paintings_me.jpg', 'Blur', 'Blur', '2013-03-07', 3, 1530, 2, 5, 3, NULL, NULL, 3, 300, 400, 1, 1, '', NULL, NULL, '0000-00-00 00:00:00'),
(17, '1.JPG', 'Artwork Title', 'Artwor Description', '2013-01-02', 17, 1200, 2, 3, 2, NULL, NULL, 17, 120, 60, 1, 1, 'abstract, expressionism', NULL, NULL, '0000-00-00 00:00:00'),
(18, '11.jpg', 'titre du tableau', 'rerwerwer r wer wrw er', '2013-01-08', 18, 1500, 2, 3, 10, NULL, NULL, 4, 120, 30, 1, 1, 'computer', NULL, NULL, '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `bf_artwork_submission`
--

INSERT INTO `bf_artwork_submission` (`id`, `member_id`, `artwork1`, `artwork2`, `artwork3`, `artwork4`, `artwork5`, `approved`, `status`, `created`, `reviewed`) VALUES
(27, 1, '1.JPG', '2.jpg', '3.jpeg', '4.png', '5.jpg', 1, 1, '2013-11-30 10:46:16', '2013-11-30 10:46:16'),
(28, 2, '2344123dsafh.jpg', 'ART-HK-12-first-look-II-AM-04.jpg', 'art-wallpaper.jpg', 'bankrupt-detroit-could-sell-its-billion-dollar-art-collection.jpg', 'collections_main.jpg', 0, 1, '2013-11-30 16:35:35', '2013-11-30 16:35:35'),
(29, 2, '5-art-of-π.png', '23423fdas.jpg', 'abstract_art_paintings_me.jpg', '234123gag.jpg', '01.jpg', 1, 1, '2013-11-30 18:46:18', '2013-11-30 18:46:18'),
(30, 3, 'Digital-Art-Wallpapers-1024x640.jpg', 'bankrupt-detroit-could-sell-its-billion-dollar-art-collection.jpg', 'art.jpg', 'art-workshop-graphic.jpg', 'art-wallpaper.jpg', 1, 1, '2013-12-01 17:38:58', '2013-12-01 17:38:58'),
(38, 17, '1.JPG', '2.jpg', '3.jpeg', '4.png', '5.jpg', 1, 1, '2013-12-02 05:52:11', '2013-12-02 05:52:11'),
(39, 18, '1.JPG', '1.jpg', '2.jpg', '6.jpg', '9.jpg', 1, 1, '2013-12-02 14:32:03', '2013-12-02 14:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `bf_banner`
--

CREATE TABLE IF NOT EXISTS `bf_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bf_favourite_art`
--

CREATE TABLE IF NOT EXISTS `bf_favourite_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bf_favourite_artist`
--

CREATE TABLE IF NOT EXISTS `bf_favourite_artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bf_featured`
--

CREATE TABLE IF NOT EXISTS `bf_featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bf_featured`
--

INSERT INTO `bf_featured` (`id`, `artwork_id`) VALUES
(2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `bf_homepage`
--

CREATE TABLE IF NOT EXISTS `bf_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `bf_homepage`
--

INSERT INTO `bf_homepage` (`id`, `name`, `value`) VALUES
(1, 'about_us', 'about_us'),
(2, 'how_it_works', 'how_it_works'),
(3, 'privacy_policy', 'privacy_policy'),
(4, 'buyers_guide', 'buyers_guide'),
(5, 'artists_guide', 'artists_guide'),
(6, 'newsletter', 'newsletter'),
(7, 'copyright', 'copyright'),
(8, 'terms', 'terms'),
(9, 'stats', 'stats'),
(10, 'commission_intro', 'commission_intro'),
(11, 'invest_intro', 'invest_intro'),
(12, 'invest_artist1', 'invest_artist1'),
(13, 'invest_artist2', 'invest_artist2'),
(14, 'invest_desc1', 'invest_desc1'),
(15, 'invest_desc2', 'invest_desc2'),
(16, 'commission_desc', 'commission_desc');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bf_login_attempts`
--

INSERT INTO `bf_login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(6, '220.255.2.147', 'zulkarnain.shariff@gmail.com', '2013-11-26 18:42:26');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `bf_members`
--

INSERT INTO `bf_members` (`id`, `firstname`, `lastname`, `email`, `pswd`, `dob`, `country`, `address1`, `address2`, `phone`, `city`, `postal`, `type`, `commission`, `about`, `photo`, `verified`, `token`) VALUES
(1, 'Zulkarnain', 'Shariff', 'zulkarnain.shariff1@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-01-31', 'CS', 'Lorong Ah Soo', '145', '3223', 'Singapore', '1234', 1, 1, 'This is about me. Blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah.Blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah.Blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah.Blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah.Blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah. Blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah.', '8hfgjsg.jpg', 1, 'cI3sbvJeQRa9C2U0'),
(2, 'Zulkarnain2', 'Shariff', 'zulkarnain.shariff2@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1980-06-20', 'SG', '112', '239023', '9234039', 'Singapore', '2323423', 1, 1, 'Blah lbha blkablkja adksfjadls f.adsjf;alkdjf kl;lasdfj ads.fa.ds', '32hs.jpg', 1, 'MrN2W1HnYCocBv9s'),
(3, 'Zulkarnain', 'Shariff', 'zulkarnain.shariff3@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1984-07-13', 'TL', '111', '145', '1', 'Singapore', '12312', 1, 1, 'Test test test. test test test test test. test test test test test. test test test test test. test test test test test. test test test test test. test test test test test. test test test test test. test test test test test. test test test test test. test test test', '23423ghhz.jpg', 1, 'y3fhYCnxeHEqOD6i'),
(17, 'user1', 'user1', 'lgkanlacas@yahoo.fr', '1bf712d65d51014ae8130d4e49cafd81', '1984-06-12', 'SG', '68 wilkie', '05', '765432', 'singapore', '876543', 1, 1, 'Leonardo di ser Piero da Vinci (Italian pronunciation: [leoˈnardo da vˈvintʃi] About this sound pronunciation (help·info); April 15, 1452 – May 2, 1519, Old Style) was an Italian Renaissance polymath: painter, sculptor, architect, musician, mathematician, engineer, inventor, anatomist, geologist, cartographer, botanist, and writer. His genius, perhaps more than that of any other figure, epitomized the Renaissance humanist ideal. Leonardo has often been described as the archetype of the Renaissance Man, a man of "unquenchable curiosity" and "feverishly inventive imagination".[1] He is widely considered to be one of the greatest painters of all time and perhaps the most diversely talented person ever to have lived.[2] According to art historian Helen Gardner, the scope and depth of his interests were without precedent and "his mind and personality seem to us superhuman, the man himself mysterious and remote".[1] Marco Rosci states that while there is much speculation about Leonardo, his vision of the world is essentially logical rather than mysterious, and that the empirical methods he employed were unusual for his time.[3]\n\nBorn out of wedlock to a notary, Piero da Vinci, and a peasant woman, Caterina, in Vinci in the region of Florence, Leonardo was educated in the studio of the renowned Florentine painter, Verrocchio. Much of his earlier working life was spent in the service of Ludovico il Moro in Milan. He later worked in Rome, Bologna and Venice, and he spent his last years in France at the home awarded him by Francis I.', 'paula.jpg', 1, 'PIQ3iNvzhqjEUT4x'),
(9, 'Zulkarnain', 'Shariff', 'zulkarnain.shariff4@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-01-09', 'TT', 'test', 'test', 'test', 'stest', '131', 1, 1, 'Test testtest', 'byron29n-1-web.jpg', 1, 'wrDFbA4GKHQIvqWz'),
(11, 'Zulkarnain', 'Shariff', 'zulkarnain.shariff@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-01-01', 'VN', 'Test', 'test', '12312', '12312', '31312', 1, 1, 'Test', 'byron29n-1-web.jpg', 1, 'nmv49qxAGVrKYwFU'),
(18, 'nadia', 'belkacem', 'contact@frenchvoila.com', '1bf712d65d51014ae8130d4e49cafd81', '1990-01-10', 'US', '4234fer', '45345', '5354353453', 'fsfsfdf', '4354534534', 1, 1, 'about me......', 'paula.jpg', 1, 'Lo2VTuGtSnzX9JO0');

-- --------------------------------------------------------

--
-- Table structure for table `bf_messages`
--

CREATE TABLE IF NOT EXISTS `bf_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bf_messages`
--

INSERT INTO `bf_messages` (`id`, `name`, `message`) VALUES
(1, 'registration_activation', 'registration_activation'),
(2, 'artist_approval', 'artist_approval'),
(3, 'artist_reject', 'artist_reject'),
(4, 'new_artwork_uploaded', 'new_artwork_uploaded'),
(5, 'sales_artist', 'sales_artist'),
(6, 'sales_collector', 'sales_collector');

-- --------------------------------------------------------

--
-- Table structure for table `bf_newsletter`
--

CREATE TABLE IF NOT EXISTS `bf_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bf_new_this_week`
--

CREATE TABLE IF NOT EXISTS `bf_new_this_week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bf_new_this_week`
--

INSERT INTO `bf_new_this_week` (`id`, `artwork_id`) VALUES
(2, 7),
(3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `bf_permissions`
--

CREATE TABLE IF NOT EXISTS `bf_permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`permission_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

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
  `desc` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bf_staff_favourites`
--

CREATE TABLE IF NOT EXISTS `bf_staff_favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bf_staff_favourites`
--

INSERT INTO `bf_staff_favourites` (`id`, `artwork_id`) VALUES
(3, 8),
(2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `bf_states`
--

CREATE TABLE IF NOT EXISTS `bf_states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `abbrev` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bf_users`
--

INSERT INTO `bf_users` (`id`, `role_id`, `email`, `username`, `password_hash`, `reset_hash`, `last_login`, `last_ip`, `created_on`, `deleted`, `reset_by`, `banned`, `ban_message`, `display_name`, `display_name_changed`, `timezone`, `language`, `active`, `activate_hash`, `password_iterations`, `force_password_reset`) VALUES
(1, 1, 'zulkarnain.shariff@gmail.com', 'admin', '$P$BysEX4BbO5kLWGhZncIxsL6tXxXWH30', 'fb0c642fdb5dba59a8a4aeaefddee7f45cb5e148', '2013-11-26 18:42:34', '220.255.2.167', '2013-11-09 09:36:22', 0, 1384145787, 0, NULL, 'admin', NULL, 'UP8', 'english', 1, '', 8, 0),
(2, 1, 'lgkanlacas@yahoo.fr', 'LG', '$P$BJ.m3zXoh5MRnPoPF2iidLk.oKt2EJ1', NULL, '2013-11-10 08:30:35', '110.171.43.61', '2013-11-09 10:33:26', 0, NULL, 0, NULL, 'Louis-guillaume', NULL, 'UP8', 'english', 1, '', 8, 0);

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

--
-- Dumping data for table `bf_user_cookies`
--

INSERT INTO `bf_user_cookies` (`user_id`, `token`, `created_on`) VALUES
(1, 'HOIxiumvuys5OwTIgHPq0G4t2KxwkfDM230jAmZt6VNngcpjXcdtXTa9aPeVWLxP3tCMB3HHRtczWRgdi3khn6ZUZqGPpk1CyGnll6yMNX2jBJ0C13FeMFJnmEWiDmZT', '2013-11-17 06:28:11'),
(1, 'yNSRSdorjkzcPEKku6tDAc7mCiHvpGsNQ9DcEkdQtPZRmLfQrMHa0XCvjARANCFeMQB9IuamMQAq6KlCCcRLMZueCeYSJ8LJYw8Ors0LdukgHCuAtTYjYT2QT3btpMUq', '2013-11-26 16:37:02');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bf_user_meta`
--

INSERT INTO `bf_user_meta` (`meta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'street_name', ''),
(2, 1, 'state', ''),
(3, 1, 'country', 'SG'),
(4, 2, 'street_name', ''),
(5, 2, 'state', 'SC'),
(6, 2, 'country', 'US'),
(7, 2, 'type', 'small');

-- --------------------------------------------------------

--
-- Table structure for table `new_this_week`
--

CREATE TABLE IF NOT EXISTS `new_this_week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff_favourites`
--

CREATE TABLE IF NOT EXISTS `staff_favourites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artwork_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
