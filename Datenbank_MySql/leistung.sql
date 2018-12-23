-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2018 at 05:14 PM
-- Server version: 8.0.12
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leistung`
--

-- --------------------------------------------------------

--
-- Table structure for table `abgabe`
--

CREATE TABLE `abgabe` (
  `AbgabeID` int(32) NOT NULL,
  `Benutzer_MarterikelNr` int(32) NOT NULL,
  `Korrektor_MarterikelNr` int(32) NOT NULL,
  `KorregierteZeit` int(11) DEFAULT NULL,
  `AbgabeZeit` int(11) DEFAULT NULL,
  `GesamtePunkt` int(32) NOT NULL,
  `UebungsblaetterID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `anzahl_des_benutzers`
--

CREATE TABLE `anzahl_des_benutzers` (
  `id` int(11) NOT NULL,
  `Datum` varchar(255) NOT NULL,
  `Anzahlen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anzahl_des_benutzers`
--

INSERT INTO `anzahl_des_benutzers` (`id`, `Datum`, `Anzahlen`) VALUES
(1, '2018/6/15', '2'),
(2, '2018/6/16', '4'),
(3, '2018/6/17', '6'),
(4, '2018/6/18', '8'),
(5, '2018/6/19', '10'),
(6, '2018/6/20', '12'),
(7, '2018/6/21', '14'),
(8, '2018/6/22', '16'),
(9, '2018/6/23', '18'),
(10, '2018/6/24', '20'),
(11, '2018/6/25', '22'),
(12, '2018/6/26', '24'),
(13, '2018/6/27', '26'),
(14, '2018/6/28', '28'),
(15, '2018/6/29', '30'),
(16, '2018/6/30', '32'),
(17, '2018/7/1', '34'),
(18, '2018/7/2', '36'),
(19, '2018/7/3', '38'),
(20, '2018/7/4', '40'),
(21, '2018/7/5', '42'),
(22, '2018/7/6', '44'),
(23, '2018/7/7', '46'),
(24, '2018/7/8', '48'),
(25, '2018/7/9', '50'),
(26, '2018/7/10', '52'),
(27, '2018/7/11', '54'),
(28, '2018/7/12', '56'),
(29, '2018/7/13', '58'),
(30, '2018/7/14', '60'),
(31, '2018/7/15', '62'),
(32, '2018/7/16', '64'),
(33, '2018/7/17', '66'),
(34, '2018/7/18', '68'),
(35, '2018/7/19', '70'),
(36, '2018/7/20', '72'),
(37, '2018/7/21', '74'),
(38, '2018/7/22', '76'),
(39, '2018/7/23', '78'),
(40, '2018/7/24', '80'),
(41, '2018/7/25', '82'),
(42, '2018/7/26', '84'),
(43, '2018/7/27', '86'),
(44, '2018/7/28', '88'),
(45, '2018/7/29', '90'),
(46, '2018/7/30', '92'),
(47, '2018/7/31', '94'),
(48, '2018/8/1', '96'),
(49, '2018/8/2', '98'),
(50, '2018/8/3', '100'),
(51, '2018/8/4', '102'),
(52, '2018/8/5', '104'),
(53, '2018/8/6', '106'),
(54, '2018/8/7', '108'),
(55, '2018/8/8', '110'),
(56, '2018/8/9', '112'),
(57, '2018/8/10', '114'),
(58, '2018/8/11', '116'),
(59, '2018/8/12', '118'),
(60, '2018/8/13', '120'),
(61, '2018/8/14', '122'),
(62, '2018/8/15', '124'),
(63, '2018/8/16', '126'),
(64, '2018/8/17', '128'),
(65, '2018/8/18', '130'),
(66, '2018/8/19', '132'),
(67, '2018/8/20', '134'),
(68, '2018/8/21', '136'),
(69, '2018/8/22', '138'),
(70, '2018/8/23', '140'),
(71, '2018/8/24', '142'),
(72, '2018/8/25', '144'),
(73, '2018/8/26', '146'),
(74, '2018/8/27', '148'),
(75, '2018/8/28', '150'),
(76, '2018/8/29', '152'),
(77, '2018/8/30', '154'),
(78, '2018/8/31', '156'),
(79, '2018/9/1', '158'),
(80, '2018/9/2', '160'),
(81, '2018/9/3', '162'),
(82, '2018/9/4', '164'),
(83, '2018/9/5', '166'),
(84, '2018/9/6', '168'),
(85, '2018/9/7', '170'),
(86, '2018/9/8', '172'),
(87, '2018/9/9', '174'),
(88, '2018/9/10', '176'),
(89, '2018/9/11', '178'),
(90, '2018/9/12', '180'),
(91, '2018/9/13', '182'),
(92, '2018/9/14', '184'),
(93, '2018/9/15', '186'),
(94, '2018/9/16', '188'),
(95, '2018/9/17', '190'),
(96, '2018/9/18', '192'),
(97, '2018/9/19', '194'),
(98, '2018/9/20', '196'),
(99, '2018/9/21', '198'),
(100, '2018/9/22', '200'),
(101, '2018/9/23', '202'),
(102, '2018/9/24', '204'),
(103, '2018/9/25', '206'),
(104, '2018/9/26', '208'),
(105, '2018/9/27', '210'),
(106, '2018/9/28', '212'),
(107, '2018/9/29', '214'),
(108, '2018/9/30', '216'),
(109, '2018/10/1', '218'),
(110, '2018/10/2', '220'),
(111, '2018/10/3', '222'),
(112, '2018/10/4', '224'),
(113, '2018/10/5', '226'),
(114, '2018/10/6', '228'),
(115, '2018/10/7', '230'),
(116, '2018/10/8', '232'),
(117, '2018/10/9', '234'),
(118, '2018/10/10', '236'),
(119, '2018/10/11', '238'),
(120, '2018/10/12', '240'),
(121, '2018/10/13', '242'),
(122, '2018/10/14', '244'),
(123, '2018/10/15', '246'),
(124, '2018/12/16', '254');

-- --------------------------------------------------------

--
-- Table structure for table `benutzer`
--

CREATE TABLE `benutzer` (
  `MarterikelNr` int(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Vorname` varchar(255) NOT NULL,
  `Nachname` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `Benutzername` varchar(255) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Profiefoto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `benutzer`
--

INSERT INTO `benutzer` (`MarterikelNr`, `email`, `password_hash`, `password_reset_token`, `auth_key`, `Vorname`, `Nachname`, `created_at`, `updated_at`, `Benutzername`, `Passwort`, `Profiefoto`) VALUES
(2000001, 'jogi.loew@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Jogi', 'Löw', 1442998314, 1544908237, 'jolw201', '*', '../../profiefoto/2000001.jpg'),
(2000002, 'klarissa.wolf@hhu.de', '$2y$13$eNdcAIqmOnk.CQeW6wKCSu5cJMcGVNXMc799JwMkA95Xbh8FuHuz2', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Klarissa', 'Wolfe', 1442998314, 1543951571, 'klawo202', '*', '../../profiefoto/2000002.jpg'),
(2000003, 'kim.akers@hhu.de', '$2y$13$1gg.TAL6aL.8LDPlBhCtkO5f5HaW8fFR30PXLMq6arJHiERi5PQqO', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Kim', 'Akers', 1442998314, 1543840551, 'kiake203', '*', '../../profiefoto/normal.jpg'),
(2000004, 'andy.brauninger@hhu.de', '$2y$13$ggVOzXB2k7CBOw9GLTpLL.CF.V7bCOC91EWq8sYZ84J19EKi.Wds.', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Andy', 'Brauninger', 1442998314, 1442998314, 'anbra204', '*', '../../profiefoto/normal.jpg'),
(2000005, 'saisai@hhu.com', '$2y$13$dm5eD/PAyrrnZA2ttlrke.EoEQ7YY4DtKXiRJgB/kCULy1EBs73zC', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'saiyinwuchari', 'saiyinwuchari', 1442998314, 1543840483, 'sasai205', '*', '../../profiefoto/normal.jpg'),
(2000006, 'maggi.carttido@hhu.de', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Maggi', 'Carttido', 1442998314, 1442998314, 'magca206', '*', '../../profiefoto/normal.jpg'),
(2000007, 'alex.darrow@hhu.de', '$2y$13$drDmOQNTOjTCLKdpy3EkBeoVtVVLaoKqGAd2rGC9Ncr3CXSXElCC2', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Alex', 'Darrow', 1442998314, 1543840525, 'aldar207', '*', '../../profiefoto/normal.jpg'),
(2000008, 'qin.ying@hhu.de', '$2y$13$Ax5Unrds6sQJuqov3GFdFOnV3qTZb9KnpJJ/BPL.56Pnc5SQ29LHK', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Qin', 'Ying', 1442998314, 1543851616, 'qying208', '*', '../../profiefoto/normal.jpg'),
(2000009, 'qiyhi.gao@hhu.de', '$2y$13$yY1rlETD95969RLrVqLMAua95jlcbugLPY6XfC5g.soD0b3pe1UeG', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Qizhi', 'Gao', 1442998314, 1543851645, 'qzgao209', '*', '../../profiefoto/normal.jpg'),
(2000010, 'siwei.liu@hhu.de', '$2y$13$x5V9yKskPDunOYanWq59ROt4QqybAl/h471xhTjUfhtRuhW77MJ3C', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Siwe', 'Liuq', 1442998314, 1543874285, 'swliu210', '*', '../../profiefoto/normal.jpg'),
(2000011, 'wuchari.wuchari@hhu.de', '$2y$13$0Z0Om1WeaSArVKpNugNXce83VtzRN9i4ntUishohiyPF8txfcJDae', NULL, 'TxZdr4GAbP0ijr07_JUeXPlss3Skki3_', 'wuchari', 'wuchari', 1543919159, 1543919159, 'wuwu211', '*', '../../profiefoto/normal.jpg'),
(2000012, 'wuchari1.wuchari2@hhu.de', '$2y$13$iWA/KJ4LZjqlDC4wBFL0VOSIzT/.FKbVWp2yKxaIxG.Dl123CfkbK', NULL, 'ZfWb7k9TisSFLi96Xds_vMTnomk0xecF', 'wuchari1', 'wuchari2', 1543920663, 1543920663, 'wuwu212', '*', '../../profiefoto/normal.jpg'),
(2000013, 'ssasasa.sssss@hhu.de', '$2y$13$AmlKI0.B9jpCLTu3twxlxOSkJ9jgo3BvK8M07jZlEMCXqJBI9gJRG', NULL, '3xwbm6cS5nRQgo47yHNKq6SvVv6Q77QI', 'ssasasaaa', 'ssssss', 1543923603, 1545058091, 'ssss213', '*', '../../profiefoto/2000013.jpg'),
(2000014, 'ssasasaaa.sadfsdaf@hhu.de', '$2y$13$X.uLRZ3R/sZEroYgSgk/dOWSG2MOi0xN/2r73qQpUCF9jHjXpJ2km', NULL, '7EZ-de823ZI9pYIIjsFjcvpMDVZ0SBzR', 'ssasasaaa', 'sadfsdaf', 1543925277, 1545058174, 'sasasa214', '*', '../../profiefoto/2000014.jpg'),
(2000015, 'wuchariqwe.wuchariewq@hhu.de', '$2y$13$O9gW/D.HgiByGZ.EUZa.7uqy1dTezatQS7jcPzANjQXqgWVWdRcZS', NULL, 'O2MLX6IsEw1M9yez0a5WzXuctXVjb0yg', 'wuchariqwe', 'wuchariewq', 1543927459, 1543927459, 'qwe215', '*', '../../profiefoto/normal.jpg'),
(2000016, 'wang.dajun@hhu.de', '$2y$13$1TDtrYd/.Qhw9rE1kGe.ZeSCeMhXZUxotrLfyrChDO0cynHpOy8VK', NULL, 'CDyq4Rjc9TNRedo1PCkzo5nan4YoPFyn', 'wang', 'dajun', 1543927710, 1543927710, 'wang2016', '*', '../../profiefoto/normal.jpg'),
(2000017, 'sheng.daweii@hhu.de', '$2y$13$UNSNSF/IqJGGoeJ8UkpUQOX6PnhcuOKPhRevFN.2WXKuE2scoewni', '', '7d9imS8AzJY4GLuDh1bCNNjcKucQPbR5', 'sheng', 'daweii', 1543929368, 1543929368, 'dawei217', '*', '../../profiefoto/normal.jpg'),
(2000025, 'Alexander.Marianna@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Alexander', 'Marianna', 1543929376, 1543929376, 'Alexander225', '*', '../../profiefoto/normal.jpg'),
(2000035, 'Felix.Marlen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Felix', 'Marlen', 1543929386, 1545058267, 'Felix235', '*', '../../profiefoto/2000035.jpg'),
(2000036, 'Jakob.Janko@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Jakob', 'Janko', 1543929387, 1543929387, 'Jakob236', '*', '../../profiefoto/normal.jpg'),
(2000037, 'Elisabeth.Maroua@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Elisabeth', 'Maroua', 1543929388, 1543929388, 'Elisabeth237', '*', '../../profiefoto/normal.jpg'),
(2000038, 'Noah.Jannick@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Noah', 'Jannick', 1543929389, 1543929389, 'Noah238', '*', '../../profiefoto/normal.jpg'),
(2000039, 'Clara.Melin@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Clara', 'Melin', 1543929390, 1543929390, 'Clara239', '*', '../../profiefoto/normal.jpg'),
(2000040, 'Emma.Jarik@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Emma', 'Jarik', 1543929391, 1543929391, 'Emma240', '*', '../../profiefoto/normal.jpg'),
(2000041, 'Julius.Melinda@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Julius', 'Melinda', 1543929392, 1543929392, 'Julius241', '*', '../../profiefoto/normal.jpg'),
(2000042, 'Julian.Jaron@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Julian', 'Jaron', 1543929393, 1543929393, 'Julian242', '*', '../../profiefoto/normal.jpg'),
(2000043, 'Ella.Merit@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ella', 'Merit', 1543929394, 1543929394, 'Ella243', '*', '../../profiefoto/normal.jpg'),
(2000044, 'Helena.Javier@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Helena', 'Javier', 1543929395, 1543929395, 'Helena244', '*', '../../profiefoto/normal.jpg'),
(2000045, 'Benjamin.Merve@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Benjamin', 'Merve', 1543929396, 1543929396, 'Benjamin245', '*', '../../profiefoto/normal.jpg'),
(2000046, 'David.Jay@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'David', 'Jay', 1543929397, 1543929397, 'David246', '*', '../../profiefoto/normal.jpg'),
(2000047, 'Mia.Mey@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mia', 'Mey', 1543929398, 1543929398, 'Mia247', '*', '../../profiefoto/normal.jpg'),
(2000048, 'Leo.Jean@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Leo', 'Jean', 1543929399, 1543929399, 'Leo248', '*', '../../profiefoto/normal.jpg'),
(2000049, 'Karl.Mika@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Karl', 'Mika', 1543929400, 1543929400, 'Karl249', '*', '../../profiefoto/normal.jpg'),
(2000050, 'Ben.Jeremy@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ben', 'Jeremy', 1543929401, 1543929401, 'Ben250', '*', '../../profiefoto/normal.jpg'),
(2000051, 'Leon.Mimi@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Leon', 'Mimi', 1543929402, 1543929402, 'Leon251', '*', '../../profiefoto/normal.jpg'),
(2000052, 'Louis.Jim@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Louis', 'Jim', 1543929403, 1543929403, 'Louis252', '*', '../../profiefoto/normal.jpg'),
(2000053, 'Johann.Miray@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Johann', 'Miray', 1543929404, 1543929404, 'Johann253', '*', '../../profiefoto/normal.jpg'),
(2000054, 'Johannes.Joan@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Johannes', 'Joan', 1543929405, 1543929405, 'Johannes254', '*', '../../profiefoto/normal.jpg'),
(2000055, 'Theodor.Mona@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Theodor', 'Mona', 1543929406, 1543929406, 'Theodor255', '*', '../../profiefoto/normal.jpg'),
(2000056, 'Friedrich.Jochen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Friedrich', 'Jochen', 1543929407, 1543929407, 'Friedrich256', '*', '../../profiefoto/normal.jpg'),
(2000057, 'Jonas.Monika@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Jonas', 'Monika', 1543929408, 1543929408, 'Jonas257', '*', '../../profiefoto/normal.jpg'),
(2000058, 'Tim.Jon@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Tim', 'Jon', 1543929409, 1543929409, 'Tim258', '*', '../../profiefoto/normal.jpg'),
(2000059, 'Helene.Nadine@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Helene', 'Nadine', 1543929410, 1543929410, 'Helene259', '*', '../../profiefoto/normal.jpg'),
(2000060, 'Mila.Jonte@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mila', 'Jonte', 1543929411, 1543929411, 'Mila260', '*', '../../profiefoto/normal.jpg'),
(2000061, 'Luis.Nadja@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Luis', 'Nadja', 1543929412, 1543929412, 'Luis261', '*', '../../profiefoto/normal.jpg'),
(2000062, 'Elisa.Gernot@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Elisa', 'Gernot', 1543929413, 1543929413, 'Elisa262', '*', '../../profiefoto/normal.jpg'),
(2000063, 'Greta.Malea@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Greta', 'Malea', 1543929414, 1543929414, 'Greta263', '*', '../../profiefoto/normal.jpg'),
(2000064, 'Marlene.Gianluca@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Marlene', 'Gianluca', 1543929415, 1543929415, 'Marlene264', '*', '../../profiefoto/normal.jpg'),
(2000065, 'Henry.Malina@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Henry', 'Malina', 1543929416, 1543929416, 'Henry265', '*', '../../profiefoto/normal.jpg'),
(2000066, 'Leonard.Hagen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Leonard', 'Hagen', 1543929417, 1543929417, 'Leonard266', '*', '../../profiefoto/normal.jpg'),
(2000067, 'Lukas.Marei@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lukas', 'Marei', 1543929418, 1543929418, 'Lukas267', '*', '../../profiefoto/normal.jpg'),
(2000068, 'Moritz.Hani@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Moritz', 'Hani', 1543929419, 1543929419, 'Moritz268', '*', '../../profiefoto/normal.jpg'),
(2000069, 'Amelie.Marianna@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Amelie', 'Marianna', 1543929420, 1543929420, 'Amelie269', '*', '../../profiefoto/normal.jpg'),
(2000070, 'Levi.Herbert@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Levi', 'Herbert', 1543929421, 1543929421, 'Levi270', '*', '../../profiefoto/normal.jpg'),
(2000071, 'Theo.Marianne@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Theo', 'Marianne', 1543929422, 1543929422, 'Theo271', '*', '../../profiefoto/normal.jpg'),
(2000072, 'Antonia.Horst@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Antonia', 'Horst', 1543929423, 1543929423, 'Antonia272', '*', '../../profiefoto/normal.jpg'),
(2000073, 'Hannah.Marie-Louise@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Hannah', 'Marie-Louise', 1543929424, 1543929424, 'Hannah273', '*', '../../profiefoto/normal.jpg'),
(2000074, 'Lea.Ilya@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lea', 'Ilya', 1543929425, 1543929425, 'Lea274', '*', '../../profiefoto/normal.jpg'),
(2000075, 'Linus.Marion@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Linus', 'Marion', 1543929426, 1543929426, 'Linus275', '*', '../../profiefoto/normal.jpg'),
(2000076, 'Luisa.Issa@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Luisa', 'Issa', 1543929427, 1543929427, 'Luisa276', '*', '../../profiefoto/normal.jpg'),
(2000077, 'Mathilda.Marla@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mathilda', 'Marla', 1543929428, 1543929428, 'Mathilda277', '*', '../../profiefoto/normal.jpg'),
(2000078, 'Daniel.Jad@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Daniel', 'Jad', 1543929429, 1543929429, 'Daniel278', '*', '../../profiefoto/normal.jpg'),
(2000079, 'Oskar.Marlen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Oskar', 'Marlen', 1543929430, 1543929430, 'Oskar279', '*', '../../profiefoto/normal.jpg'),
(2000080, 'Lara.Janko@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lara', 'Janko', 1543929431, 1543929431, 'Lara280', '*', '../../profiefoto/normal.jpg'),
(2000081, 'Lina.Maroua@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lina', 'Maroua', 1543929432, 1543929432, 'Lina281', '*', '../../profiefoto/normal.jpg'),
(2000082, 'Frederik.Jannick@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Frederik', 'Jannick', 1543929433, 1543929433, 'Frederik282', '*', '../../profiefoto/normal.jpg'),
(2000083, 'Ida.Melin@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ida', 'Melin', 1543929434, 1543929434, 'Ida283', '*', '../../profiefoto/normal.jpg'),
(2000084, 'Josephine.Jarik@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Josephine', 'Jarik', 1543929435, 1543929435, 'Josephine284', '*', '../../profiefoto/normal.jpg'),
(2000085, 'Laura.Melinda@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Laura', 'Melinda', 1543929436, 1543929436, 'Laura285', '*', '../../profiefoto/normal.jpg'),
(2000086, 'Aaron.Jaron@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Aaron', 'Jaron', 1543929437, 1543929437, 'Aaron286', '*', '../../profiefoto/normal.jpg'),
(2000087, 'Niklas.Merit@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Niklas', 'Merit', 1543929438, 1543929438, 'Niklas287', '*', '../../profiefoto/normal.jpg'),
(2000088, 'Valentin.Javier@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Valentin', 'Javier', 1543929439, 1543929439, 'Valentin288', '*', '../../profiefoto/normal.jpg'),
(2000089, 'Frieda.Merve@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Frieda', 'Merve', 1543929440, 1543929440, 'Frieda289', '*', '../../profiefoto/normal.jpg'),
(2000090, 'Julia.Jay@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Julia', 'Jay', 1543929441, 1543929441, 'Julia290', '*', '../../profiefoto/normal.jpg'),
(2000091, 'Sarah.Mey@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Sarah', 'Mey', 1543929442, 1543929442, 'Sarah291', '*', '../../profiefoto/normal.jpg'),
(2000092, 'Viktoria.Jean@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Viktoria', 'Jean', 1543929443, 1543929443, 'Viktoria292', '*', '../../profiefoto/normal.jpg'),
(2000093, 'Bruno.Mika@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Bruno', 'Mika', 1543929444, 1543929444, 'Bruno293', '*', '../../profiefoto/normal.jpg'),
(2000094, 'Carl.Jeremy@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Carl', 'Jeremy', 1543929445, 1543929445, 'Carl294', '*', '../../profiefoto/normal.jpg'),
(2000095, 'Raphael.Mimi@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Raphael', 'Mimi', 1543929446, 1543929446, 'Raphael295', '*', '../../profiefoto/normal.jpg'),
(2000096, 'Katharina.Jim@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Katharina', 'Jim', 1543929447, 1543929447, 'Katharina296', '*', '../../profiefoto/normal.jpg'),
(2000097, 'Matilda.Miray@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Matilda', 'Miray', 1543929448, 1543929448, 'Matilda297', '*', '../../profiefoto/normal.jpg'),
(2000098, 'Maya.Joan@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Maya', 'Joan', 1543929449, 1543929449, 'Maya298', '*', '../../profiefoto/normal.jpg'),
(2000099, 'Pauline.Mona@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Pauline', 'Mona', 1543929450, 1543929450, 'Pauline299', '*', '../../profiefoto/normal.jpg'),
(2000100, 'Rosa.Jochen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Rosa', 'Jochen', 1543929451, 1543929451, 'Rosa300', '*', '../../profiefoto/normal.jpg'),
(2000101, 'Adrian.Monika@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Adrian', 'Monika', 1543929452, 1543929452, 'Adrian301', '*', '../../profiefoto/normal.jpg'),
(2000102, 'Jan.Jon@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Jan', 'Jon', 1543929453, 1543929453, 'Jan302', '*', '../../profiefoto/normal.jpg'),
(2000103, 'Liam.Nadine@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Liam', 'Nadine', 1543929454, 1543929454, 'Liam303', '*', '../../profiefoto/normal.jpg'),
(2000104, 'Luca.Jonte@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Luca', 'Jonte', 1543929455, 1543929455, 'Luca304', '*', '../../profiefoto/normal.jpg'),
(2000105, 'Ole.Nadja@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ole', 'Nadja', 1543929456, 1543929456, 'Ole305', '*', '../../profiefoto/normal.jpg'),
(2000106, 'Philipp.Gernot@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Philipp', 'Gernot', 1543929457, 1543929457, 'Philipp306', '*', '../../profiefoto/normal.jpg'),
(2000107, 'Vincent.Malea@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Vincent', 'Malea', 1543929458, 1543929458, 'Vincent307', '*', '../../profiefoto/normal.jpg'),
(2000108, 'Amalia.Gianluca@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Amalia', 'Gianluca', 1543929459, 1543929459, 'Amalia308', '*', '../../profiefoto/normal.jpg'),
(2000109, 'Josefine.Malina@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Josefine', 'Malina', 1543929460, 1543929460, 'Josefine309', '*', '../../profiefoto/normal.jpg'),
(2000110, 'Maja.Hagen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Maja', 'Hagen', 1543929461, 1543929461, 'Maja310', '*', '../../profiefoto/normal.jpg'),
(2000111, 'Paula.Marei@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Paula', 'Marei', 1543929462, 1543929462, 'Paula311', '*', '../../profiefoto/normal.jpg'),
(2000112, 'Sofia.Hani@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Sofia', 'Hani', 1543929463, 1543929463, 'Sofia312', '*', '../../profiefoto/normal.jpg'),
(2000113, 'Arthur.Marianna@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Arthur', 'Marianna', 1543929464, 1543929464, 'Arthur313', '*', '../../profiefoto/normal.jpg'),
(2000114, 'Benedikt.Herbert@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Benedikt', 'Herbert', 1543929465, 1543929465, 'Benedikt314', '*', '../../profiefoto/normal.jpg'),
(2000115, 'Finn.Marianne@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Finn', 'Marianne', 1543929466, 1543929466, 'Finn315', '*', '../../profiefoto/normal.jpg'),
(2000116, 'Joshua.Horst@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Joshua', 'Horst', 1543929467, 1543929467, 'Joshua316', '*', '../../profiefoto/normal.jpg'),
(2000117, 'Max.Marie-Louise@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Max', 'Marie-Louise', 1543929468, 1543929468, 'Max317', '*', '../../profiefoto/normal.jpg'),
(2000118, 'Alma.Ilya@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Alma', 'Ilya', 1543929469, 1543929469, 'Alma318', '*', '../../profiefoto/normal.jpg'),
(2000119, 'Hanna.Marion@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Hanna', 'Marion', 1543929470, 1543929470, 'Hanna319', '*', '../../profiefoto/normal.jpg'),
(2000120, 'Isabella.Issa@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Isabella', 'Issa', 1543929471, 1543929471, 'Isabella320', '*', '../../profiefoto/normal.jpg'),
(2000121, 'Leni.Marla@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Leni', 'Marla', 1543929472, 1543929472, 'Leni321', '*', '../../profiefoto/normal.jpg'),
(2000122, 'Martha.Jad@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Martha', 'Jad', 1543929473, 1543929473, 'Martha322', '*', '../../profiefoto/normal.jpg'),
(2000123, 'Stella.Marlen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Stella', 'Marlen', 1543929474, 1543929474, 'Stella323', '*', '../../profiefoto/normal.jpg'),
(2000124, 'Theresa.Janko@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Theresa', 'Janko', 1543929475, 1543929475, 'Theresa324', '*', '../../profiefoto/normal.jpg'),
(2000125, 'Valentina.Maroua@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Valentina', 'Maroua', 1543929476, 1543929476, 'Valentina325', '*', '../../profiefoto/normal.jpg'),
(2000126, 'Victoria.Jannick@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Victoria', 'Jannick', 1543929477, 1543929477, 'Victoria326', '*', '../../profiefoto/normal.jpg'),
(2000127, 'Ali.Melin@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ali', 'Melin', 1543929478, 1543929478, 'Ali327', '*', '../../profiefoto/normal.jpg'),
(2000128, 'Emir.Jarik@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Emir', 'Jarik', 1543929479, 1543929479, 'Emir328', '*', '../../profiefoto/normal.jpg'),
(2000129, 'Georg.Melinda@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Georg', 'Melinda', 1543929480, 1543929480, 'Georg329', '*', '../../profiefoto/normal.jpg'),
(2000130, 'Henrik.Jaron@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Henrik', 'Jaron', 1543929481, 1543929481, 'Henrik330', '*', '../../profiefoto/normal.jpg'),
(2000131, 'Justus.Merit@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Justus', 'Merit', 1543929482, 1543929482, 'Justus331', '*', '../../profiefoto/normal.jpg'),
(2000132, 'Leander.Javier@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Leander', 'Javier', 1543929483, 1543929483, 'Leander332', '*', '../../profiefoto/normal.jpg'),
(2000133, 'Luka.Merve@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Luka', 'Merve', 1543929484, 1543929484, 'Luka333', '*', '../../profiefoto/normal.jpg'),
(2000134, 'Milan.Jay@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Milan', 'Jay', 1543929485, 1543929485, 'Milan334', '*', '../../profiefoto/normal.jpg'),
(2000135, 'Simon.Mey@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Simon', 'Mey', 1543929486, 1543929486, 'Simon335', '*', '../../profiefoto/normal.jpg'),
(2000136, 'Tom.Jean@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Tom', 'Jean', 1543929487, 1543929487, 'Tom336', '*', '../../profiefoto/normal.jpg'),
(2000137, 'Alexandra.Mika@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Alexandra', 'Mika', 1543929488, 1543929488, 'Alexandra337', '*', '../../profiefoto/normal.jpg'),
(2000138, 'Emily.Jeremy@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Emily', 'Jeremy', 1543929489, 1543929489, 'Emily338', '*', '../../profiefoto/normal.jpg'),
(2000139, 'Lilly.Mimi@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lilly', 'Mimi', 1543929490, 1543929490, 'Lilly339', '*', '../../profiefoto/normal.jpg'),
(2000140, 'Ferdinand.Jim@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ferdinand', 'Jim', 1543929491, 1543929491, 'Ferdinand340', '*', '../../profiefoto/normal.jpg'),
(2000141, 'Konstantin.Miray@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Konstantin', 'Miray', 1543929492, 1543929492, 'Konstantin341', '*', '../../profiefoto/normal.jpg'),
(2000142, 'Richard.Joan@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Richard', 'Joan', 1543929493, 1543929493, 'Richard342', '*', '../../profiefoto/normal.jpg'),
(2000143, 'Samuel.Mona@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Samuel', 'Mona', 1543929494, 1543929494, 'Samuel343', '*', '../../profiefoto/normal.jpg'),
(2000144, 'Thomas.Jochen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Thomas', 'Jochen', 1543929495, 1543929495, 'Thomas344', '*', '../../profiefoto/normal.jpg'),
(2000145, 'Carla.Monika@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Carla', 'Monika', 1543929496, 1543929496, 'Carla345', '*', '../../profiefoto/normal.jpg'),
(2000146, 'Eva.Jon@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Eva', 'Jon', 1543929497, 1543929497, 'Eva346', '*', '../../profiefoto/normal.jpg'),
(2000147, 'Lena.Nadine@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lena', 'Nadine', 1543929498, 1543929498, 'Lena347', '*', '../../profiefoto/normal.jpg'),
(2000148, 'Leonie.Jonte@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Leonie', 'Jonte', 1543929499, 1543929499, 'Leonie348', '*', '../../profiefoto/normal.jpg'),
(2000149, 'Mina.Nadja@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mina', 'Nadja', 1543929500, 1543929500, 'Mina349', '*', '../../profiefoto/normal.jpg'),
(2000150, 'Zoe.Gernot@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Zoe', 'Gernot', 1543929501, 1543929501, 'Zoe350', '*', '../../profiefoto/normal.jpg'),
(2000151, 'Christian.Malea@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Christian', 'Malea', 1543929502, 1543929502, 'Christian351', '*', '../../profiefoto/normal.jpg'),
(2000152, 'Emilian.Gianluca@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Emilian', 'Gianluca', 1543929503, 1543929503, 'Emilian352', '*', '../../profiefoto/normal.jpg'),
(2000153, 'Fabian.Malina@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Fabian', 'Malina', 1543929504, 1543929504, 'Fabian353', '*', '../../profiefoto/normal.jpg'),
(2000154, 'Fritz.Hagen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Fritz', 'Hagen', 1543929505, 1543929505, 'Fritz354', '*', '../../profiefoto/normal.jpg'),
(2000155, 'Hugo.Marei@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Hugo', 'Marei', 1543929506, 1543929506, 'Hugo355', '*', '../../profiefoto/normal.jpg'),
(2000156, 'Leopold.Hani@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Leopold', 'Hani', 1543929507, 1543929507, 'Leopold356', '*', '../../profiefoto/normal.jpg'),
(2000157, 'Michael.Marianna@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Michael', 'Marianna', 1543929508, 1543929508, 'Michael357', '*', '../../profiefoto/normal.jpg'),
(2000158, 'Peter.Herbert@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Peter1', 'Herbert', 1543929509, 1544034600, 'Peter358', '*', '../../profiefoto/2000158.jpg'),
(2000159, 'Carlotta.Marianne@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Carlotta', 'Marianne', 1543929510, 1543929510, 'Carlotta359', '*', '../../profiefoto/normal.jpg'),
(2000160, 'Klara.Horst@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Klara', 'Horst', 1543929511, 1544034633, 'Klara360', '*', '../../profiefoto/2000160.jpg'),
(2000161, 'Romy.Marie-Louise@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Romy', 'Marie-Louise', 1543929512, 1543929512, 'Romy361', '*', '../../profiefoto/normal.jpg'),
(2000162, 'Adam.Ilya@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Adam', 'Ilya', 1543929513, 1543929513, 'Adam362', '*', '../../profiefoto/normal.jpg'),
(2000163, 'Caspar.Marion@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Caspar', 'Marion', 1543929514, 1543929514, 'Caspar363', '*', '../../profiefoto/normal.jpg'),
(2000164, 'Frederick.Issa@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Frederick', 'Issa', 1543929515, 1543929515, 'Frederick364', '*', '../../profiefoto/normal.jpg'),
(2000165, 'Gabriel.Marla@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Gabriel', 'Marla', 1543929516, 1543929516, 'Gabriel365', '*', '../../profiefoto/normal.jpg'),
(2000166, 'Joel.Jad@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Joel', 'Jad', 1543929517, 1543929517, 'Joel366', '*', '../../profiefoto/normal.jpg'),
(2000167, 'Martin.Marlen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Martin', 'Marlen', 1543929518, 1543929518, 'Martin367', '*', '../../profiefoto/normal.jpg'),
(2000168, 'Mateo.Janko@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mateo', 'Janko', 1543929519, 1543929519, 'Mateo368', '*', '../../profiefoto/normal.jpg'),
(2000169, 'Mattis.Maroua@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mattis', 'Maroua', 1543929520, 1543929520, 'Mattis369', '*', '../../profiefoto/normal.jpg'),
(2000170, 'Otto.Jannick@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Otto', 'Jannick', 1543929521, 1543929521, 'Otto370', '*', '../../profiefoto/normal.jpg'),
(2000171, 'Ada.Melin@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ada', 'Melin', 1543929522, 1543929522, 'Ada371', '*', '../../profiefoto/normal.jpg'),
(2000172, 'Aurelia.Jarik@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Aurelia', 'Jarik', 1543929523, 1543929523, 'Aurelia372', '*', '../../profiefoto/normal.jpg'),
(2000173, 'Leyla.Melinda@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Leyla', 'Melinda', 1543929524, 1543929524, 'Leyla373', '*', '../../profiefoto/normal.jpg'),
(2000174, 'Louisa.Jaron@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Louisa', 'Jaron', 1543929525, 1543929525, 'Louisa374', '*', '../../profiefoto/normal.jpg'),
(2000175, 'Louise.Merit@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Louise', 'Merit', 1543929526, 1543929526, 'Louise375', '*', '../../profiefoto/normal.jpg'),
(2000176, 'Luna.Javier@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Luna', 'Javier', 1543929527, 1543929527, 'Luna376', '*', '../../profiefoto/normal.jpg'),
(2000177, 'Nele.Merve@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Nele', 'Merve', 1543929528, 1543929528, 'Nele377', '*', '../../profiefoto/normal.jpg'),
(2000178, 'Andreas.Jay@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Andreas', 'Jay', 1543929529, 1543929529, 'Andreas378', '*', '../../profiefoto/normal.jpg'),
(2000179, 'August.Mey@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'August', 'Mey', 1543929530, 1543929530, 'August379', '*', '../../profiefoto/normal.jpg'),
(2000180, 'Eric.Jean@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Eric', 'Jean', 1543929531, 1543929531, 'Eric380', '*', '../../profiefoto/normal.jpg'),
(2000181, 'Erik.Mika@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Erik', 'Mika', 1543929532, 1543929532, 'Erik381', '*', '../../profiefoto/normal.jpg'),
(2000182, 'Kilian.Jeremy@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Kilian', 'Jeremy', 1543929533, 1543929533, 'Kilian382', '*', '../../profiefoto/normal.jpg'),
(2000183, 'Lasse.Mimi@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lasse', 'Mimi', 1543929534, 1543929534, 'Lasse383', '*', '../../profiefoto/normal.jpg'),
(2000184, 'Lucas.Jim@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lucas', 'Jim', 1543929535, 1543929535, 'Lucas384', '*', '../../profiefoto/normal.jpg'),
(2000185, 'Malik.Miray@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Malik', 'Miray', 1543929536, 1543929536, 'Malik385', '*', '../../profiefoto/normal.jpg'),
(2000186, 'Mats.Joan@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mats', 'Joan', 1543929537, 1543929537, 'Mats386', '*', '../../profiefoto/normal.jpg'),
(2000187, 'Mika.Mona@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mika', 'Mona', 1543929538, 1543929538, 'Mika387', '*', '../../profiefoto/normal.jpg'),
(2000188, 'Nicolas.Jochen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Nicolas', 'Jochen', 1543929539, 1543929539, 'Nicolas388', '*', '../../profiefoto/normal.jpg'),
(2000189, 'Robert.Monika@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Robert', 'Monika', 1543929540, 1543929540, 'Robert389', '*', '../../profiefoto/normal.jpg'),
(2000190, 'Sebastian.Jon@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Sebastian', 'Jon', 1543929541, 1543929541, 'Sebastian390', '*', '../../profiefoto/normal.jpg'),
(2000191, 'Amina.Nadine@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Amina', 'Nadine', 1543929542, 1543929542, 'Amina391', '*', '../../profiefoto/normal.jpg'),
(2000192, 'Amoelie.Jonte@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Amoelie', 'Jonte', 1543929543, 1543929543, 'Amoelie392', '*', '../../profiefoto/normal.jpg'),
(2000193, 'Ela.Nadja@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ela', 'Nadja', 1543929544, 1543929544, 'Ela393', '*', '../../profiefoto/normal.jpg'),
(2000194, 'Elise.Sabine@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Elise', 'Sabine', 1543929545, 1543929545, 'Elise394', '*', '../../profiefoto/normal.jpg'),
(2000195, 'Florentine.Manfred@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Florentine', 'Manfred', 1543929546, 1543929546, 'Florentine395', '*', '../../profiefoto/normal.jpg'),
(2000196, 'Lia.Safiya@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lia', 'Safiya', 1543929547, 1543929547, 'Lia396', '*', '../../profiefoto/normal.jpg'),
(2000197, 'Lotta.Mansur@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lotta', 'Mansur', 1543929548, 1543932894, 'Lotta397', '*', '../../profiefoto/normal.jpg'),
(2000198, 'Margarete.Salome@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Margarete', 'Salome', 1543929549, 1543929549, 'Margarete398', '*', '../../profiefoto/normal.jpg'),
(2000199, 'Nora.Maria@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Nora', 'Maria', 1543929550, 1543929550, 'Nora399', '*', '../../profiefoto/normal.jpg'),
(2000200, 'Olivia.Selina@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Olivia', 'Selina', 1543929551, 1543929551, 'Olivia400', '*', '../../profiefoto/normal.jpg'),
(2000201, 'Rose.Mark@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Rose', 'Mark', 1543929552, 1543929552, 'Rose401', '*', '../../profiefoto/normal.jpg'),
(2000202, 'Sara.Seraphine@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Sara', 'Seraphine', 1543929553, 1543929553, 'Sara402', '*', '../../profiefoto/normal.jpg'),
(2000203, 'Yasmin.Markus@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Yasmin', 'Markus', 1543929554, 1543929554, 'Yasmin403', '*', '../../profiefoto/normal.jpg'),
(2000204, 'Can.Sevim@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Can', 'Sevim', 1543929555, 1543929555, 'Can404', '*', '../../profiefoto/normal.jpg'),
(2000205, 'Emilio.Marlon@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Emilio', 'Marlon', 1543929556, 1543929556, 'Emilio405', '*', '../../profiefoto/normal.jpg'),
(2000206, 'Konrad.Sherin@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Konrad', 'Sherin', 1543929557, 1543929557, 'Konrad406', '*', '../../profiefoto/normal.jpg'),
(2000207, 'Philip.Marten@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Philip', 'Marten', 1543929558, 1543929558, 'Philip407', '*', '../../profiefoto/normal.jpg'),
(2000208, 'Wolfgang.Simone@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Wolfgang', 'Simone', 1543929559, 1543929559, 'Wolfgang408', '*', '../../profiefoto/normal.jpg'),
(2000209, 'Alina.Massimo@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Alina', 'Massimo', 1543929560, 1543929560, 'Alina409', '*', '../../profiefoto/normal.jpg'),
(2000210, 'Ava.Soleil@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ava', 'Soleil', 1543929561, 1543929561, 'Ava410', '*', '../../profiefoto/normal.jpg'),
(2000211, 'Elif.Mattes@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Elif', 'Mattes', 1543929562, 1543929562, 'Elif411', '*', '../../profiefoto/normal.jpg'),
(2000212, 'Elsa.Stephanie@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Elsa', 'Stephanie', 1543929563, 1543929563, 'Elsa412', '*', '../../profiefoto/normal.jpg'),
(2000213, 'Emilie.Mattheo@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Emilie', 'Mattheo', 1543929564, 1543929564, 'Emilie413', '*', '../../profiefoto/normal.jpg'),
(2000214, 'Felicitas.Stine@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Felicitas', 'Stine', 1543929565, 1543929565, 'Felicitas414', '*', '../../profiefoto/normal.jpg'),
(2000215, 'Franziska.Matthew@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Franziska', 'Matthew', 1543929566, 1543929566, 'Franziska415', '*', '../../profiefoto/normal.jpg'),
(2000216, 'Frida.Sultan@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Frida', 'Sultan', 1543929567, 1543929567, 'Frida416', '*', '../../profiefoto/normal.jpg'),
(2000217, 'Liv.Maxime@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Liv', 'Maxime', 1543929568, 1543929568, 'Liv417', '*', '../../profiefoto/normal.jpg'),
(2000218, 'Lotte.Suvi@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lotte', 'Suvi', 1543929569, 1543929569, 'Lotte418', '*', '../../profiefoto/normal.jpg'),
(2000219, 'Mira.Ma??l@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mira', 'Ma??l', 1543929570, 1543929570, 'Mira419', '*', '../../profiefoto/normal.jpg'),
(2000220, 'Miriam.Sylvie@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Miriam', 'Sylvie', 1543929571, 1543929571, 'Miriam420', '*', '../../profiefoto/normal.jpg'),
(2000221, 'Amir.Mehmet@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Amir', 'Mehmet', 1543929572, 1543929572, 'Amir421', '*', '../../profiefoto/normal.jpg'),
(2000222, 'Bela.S??meyra@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Bela', 'S??meyra', 1543929573, 1543929573, 'Bela422', '*', '../../profiefoto/normal.jpg'),
(2000223, 'Constantin.Melchior@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Constantin', 'Melchior', 1543929574, 1543929574, 'Constantin423', '*', '../../profiefoto/normal.jpg'),
(2000224, 'Efe.Tara@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Efe', 'Tara', 1543929575, 1543929575, 'Efe424', '*', '../../profiefoto/normal.jpg'),
(2000225, 'Franz.Melvin@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Franz', 'Melvin', 1543929576, 1543929576, 'Franz425', '*', '../../profiefoto/normal.jpg'),
(2000226, 'Hamza.Teodora@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Hamza', 'Teodora', 1543929577, 1543929577, 'Hamza426', '*', '../../profiefoto/normal.jpg'),
(2000227, 'Ibrahim.Mendel@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ibrahim', 'Mendel', 1543929578, 1543929578, 'Ibrahim427', '*', '../../profiefoto/normal.jpg'),
(2000228, 'Johan.Thanh@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Johan', 'Thanh', 1543929579, 1543929579, 'Johan428', '*', '../../profiefoto/normal.jpg'),
(2000229, 'Juri.Merdan@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Juri', 'Merdan', 1543929580, 1543929580, 'Juri429', '*', '../../profiefoto/normal.jpg'),
(2000230, 'Kian.Thea@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Kian', 'Thea', 1543929581, 1543929581, 'Kian430', '*', '../../profiefoto/normal.jpg'),
(2000231, 'Lennart.Mete@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lennart', 'Mete', 1543929582, 1543929582, 'Lennart431', '*', '../../profiefoto/normal.jpg'),
(2000232, 'Oscar.Theresia@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Oscar', 'Theresia', 1543929583, 1543929583, 'Oscar432', '*', '../../profiefoto/normal.jpg'),
(2000233, 'Rafael.Metehan@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Rafael', 'Metehan', 1543929584, 1543929584, 'Rafael433', '*', '../../profiefoto/normal.jpg'),
(2000234, 'Ruben.Tomma@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ruben', 'Tomma', 1543929585, 1543929585, 'Ruben434', '*', '../../profiefoto/normal.jpg');
INSERT INTO `benutzer` (`MarterikelNr`, `email`, `password_hash`, `password_reset_token`, `auth_key`, `Vorname`, `Nachname`, `created_at`, `updated_at`, `Benutzername`, `Passwort`, `Profiefoto`) VALUES
(2000235, 'Timo.Metin@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Timo', 'Metin', 1543929586, 1543929586, 'Timo435', '*', '../../profiefoto/normal.jpg'),
(2000236, 'Tobias.Toni@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Tobias', 'Toni', 1543929587, 1543929587, 'Tobias436', '*', '../../profiefoto/normal.jpg'),
(2000237, 'Victor.Mick@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Victor', 'Mick', 1543929588, 1543929588, 'Victor437', '*', '../../profiefoto/normal.jpg'),
(2000238, 'Amira.Ulrike@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Amira', 'Ulrike', 1543929589, 1543929589, 'Amira438', '*', '../../profiefoto/normal.jpg'),
(2000239, 'Annika.Mohammad@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Annika', 'Mohammad', 1543929590, 1543929590, 'Annika439', '*', '../../profiefoto/normal.jpg'),
(2000240, 'Christine.Valerie@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Christine', 'Valerie', 1543929591, 1543929591, 'Christine440', '*', '../../profiefoto/normal.jpg'),
(2000241, 'Henriette.Murat@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Henriette', 'Murat', 1543929592, 1543929592, 'Henriette441', '*', '../../profiefoto/normal.jpg'),
(2000242, 'kein.Vanessa@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'kein', 'Vanessa', 1543929593, 1543929593, 'kein442', '*', '../../profiefoto/normal.jpg'),
(2000243, 'Lisa.Nathan@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lisa', 'Nathan', 1543929594, 1543929594, 'Lisa443', '*', '../../profiefoto/normal.jpg'),
(2000244, 'Lucia.Vera@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lucia', 'Vera', 1543929595, 1543929595, 'Lucia444', '*', '../../profiefoto/normal.jpg'),
(2000245, 'Magdalena.Neel@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Magdalena', 'Neel', 1543929596, 1543929596, 'Magdalena445', '*', '../../profiefoto/normal.jpg'),
(2000246, 'Mara.Violetta@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mara', 'Violetta', 1543929597, 1543929597, 'Mara446', '*', '../../profiefoto/normal.jpg'),
(2000247, 'Nina.Nelson@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Nina', 'Nelson', 1543929598, 1543929598, 'Nina447', '*', '../../profiefoto/normal.jpg'),
(2000248, 'noch.Vivien@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'noch', 'Vivien', 1543929599, 1543929599, 'noch448', '*', '../../profiefoto/normal.jpg'),
(2000249, 'Noemi.Nicholas@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Noemi', 'Nicholas', 1543929600, 1543929600, 'Noemi449', '*', '../../profiefoto/normal.jpg'),
(2000250, 'Vorname.Vivienne@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Vorname', 'Vivienne', 1543929601, 1543929601, 'Vorname450', '*', '../../profiefoto/normal.jpg'),
(2000251, 'Zeynep.Nicolai@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Zeynep', 'Nicolai', 1543929602, 1543929602, 'Zeynep451', '*', '../../profiefoto/normal.jpg'),
(2000252, 'Antonio.Wilma@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Antonio', 'Wilma', 1543929603, 1543929603, 'Antonio452', '*', '../../profiefoto/normal.jpg'),
(2000253, 'Bastian.Nour@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Bastian', 'Nour', 1543929604, 1543929604, 'Bastian453', '*', '../../profiefoto/normal.jpg'),
(2000254, 'Christopher.Yade@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Christopher', 'Yade', 1543929605, 1543929605, 'Christopher454', '*', '../../profiefoto/normal.jpg'),
(2000255, 'Deniz.No??l@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Deniz', 'No??l', 1543929606, 1543929606, 'Deniz455', '*', '../../profiefoto/normal.jpg'),
(2000256, 'Florian.Yael@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Florian', 'Yael', 1543929607, 1543929607, 'Florian456', '*', '../../profiefoto/normal.jpg'),
(2000257, 'Gustav.Nuri@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Gustav', 'Nuri', 1543929608, 1544029746, 'Gustav457', '*', '../../profiefoto/2000257.jpg'),
(2000258, 'Jona.Yara@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Jona', 'Yara', 1543929609, 1543929609, 'Jona458', '*', '../../profiefoto/normal.jpg'),
(2000259, 'Jonah.Pablo@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Jonah', 'Pablo', 1543929610, 1543929610, 'Jonah459', '*', '../../profiefoto/normal.jpg'),
(2000260, 'Klaus.Yasmine@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Klaus', 'Yasmine', 1543929611, 1543929611, 'Klaus460', '*', '../../profiefoto/normal.jpg'),
(2000261, 'Lennox.Pars@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Lennox', 'Pars', 1543929612, 1543929612, 'Lennox461', '*', '../../profiefoto/normal.jpg'),
(2000262, 'Ludwig.Yumi@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Ludwig', 'Yumi', 1543929613, 1543929613, 'Ludwig462', '*', '../../profiefoto/normal.jpg'),
(2000263, 'Mio.Patrick@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mio', 'Patrick', 1543929614, 1543929614, 'Mio463', '*', '../../profiefoto/normal.jpg'),
(2000264, 'Mohamed.Zofia@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mohamed', 'Zofia', 1543929615, 1543929615, 'Mohamed464', '*', '../../profiefoto/normal.jpg'),
(2000265, 'Muhammed.Pavel@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Muhammed', 'Pavel', 1543929616, 1543929616, 'Muhammed465', '*', '../../profiefoto/normal.jpg'),
(2000266, 'Mustafa.Phil@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Mustafa', 'Phil', 1543929617, 1543929617, 'Mustafa466', '*', '../../profiefoto/normal.jpg'),
(2000267, 'Nils.Phong@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Nils', 'Phong', 1543929618, 1543929618, 'Nils467', '*', '../../profiefoto/normal.jpg'),
(2000268, 'Stefan.Quinn@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Stefan', 'Quinn', 1543929619, 1543929619, 'Stefan468', '*', '../../profiefoto/normal.jpg'),
(2000269, 'Viktor.Ron@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Viktor', 'Ron', 1543929620, 1543929620, 'Viktor469', '*', '../../profiefoto/normal.jpg'),
(2000270, 'Adele.Rubin@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Adele', 'Rubin', 1543929621, 1543929621, 'Adele470', '*', '../../profiefoto/normal.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `benutzer_anmelden_klausur`
--

CREATE TABLE `benutzer_anmelden_klausur` (
  `Benutzer_MarterikelNr` int(32) NOT NULL,
  `KlausurID` int(32) NOT NULL,
  `Anmeldungszeit` int(11) DEFAULT NULL,
  `Anmeldungsstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `benutzer_teilnimmt_uebungsgruppe`
--

CREATE TABLE `benutzer_teilnimmt_uebungsgruppe` (
  `Benuter_MarterikelNr` int(32) NOT NULL,
  `UebungsgruppeID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `benutzer_teilnimmt_uebungsgruppe`
--

INSERT INTO `benutzer_teilnimmt_uebungsgruppe` (`Benuter_MarterikelNr`, `UebungsgruppeID`) VALUES
(2000067, 8),
(2000068, 8),
(2000069, 8),
(2000070, 8),
(2000069, 9),
(2000070, 9),
(2000165, 14),
(2000166, 14),
(2000174, 18),
(2000175, 18),
(2000207, 19),
(2000208, 19),
(2000209, 20),
(2000210, 20),
(2000211, 21),
(2000073, 26),
(2000075, 26),
(2000071, 27),
(2000083, 27),
(2000079, 28),
(2000115, 28),
(2000115, 29),
(2000228, 29),
(2000229, 30),
(2000230, 30),
(2000231, 31),
(2000232, 31),
(2000233, 32),
(2000234, 32),
(2000235, 33),
(2000236, 33),
(2000237, 34),
(2000238, 34),
(2000239, 35),
(2000240, 35),
(2000241, 36),
(2000242, 36);

-- --------------------------------------------------------

--
-- Table structure for table `einzelaufgabe`
--

CREATE TABLE `einzelaufgabe` (
  `EinzelaufgabeID` int(32) NOT NULL,
  `AbgabeID` int(32) NOT NULL,
  `UebungsblaetterID` int(32) NOT NULL,
  `AufgabeNr` int(11) NOT NULL,
  `Text` text,
  `Datein` text,
  `Punkte` double(32,0) DEFAULT NULL,
  `Bewertung` varchar(255) DEFAULT NULL,
  `Max.Punkt` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `klausur`
--

CREATE TABLE `klausur` (
  `KlausurID` int(32) NOT NULL,
  `Mitarbeiter_MarterikelNr` int(32) NOT NULL,
  `ModulID` int(32) NOT NULL,
  `Kreditpunkt` int(32) NOT NULL,
  `Pruefungsdatum` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Raum` varchar(255) NOT NULL,
  `Bezeichnung` varchar(255) NOT NULL,
  `Max_Punkte` int(32) NOT NULL,
  `punkt1_0` int(32) NOT NULL,
  `punkt1_3` int(32) NOT NULL,
  `punkt1_7` int(32) NOT NULL,
  `punkt2_0` int(32) NOT NULL,
  `punkt2_3` int(32) NOT NULL,
  `punkt2_7` int(32) NOT NULL,
  `punkt3_0` int(32) NOT NULL,
  `punkt3_3` int(32) NOT NULL,
  `punkt3_7` int(32) NOT NULL,
  `punkt4_0` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klausur`
--

INSERT INTO `klausur` (`KlausurID`, `Mitarbeiter_MarterikelNr`, `ModulID`, `Kreditpunkt`, `Pruefungsdatum`, `Raum`, `Bezeichnung`, `Max_Punkte`, `punkt1_0`, `punkt1_3`, `punkt1_7`, `punkt2_0`, `punkt2_3`, `punkt2_7`, `punkt3_0`, `punkt3_3`, `punkt3_7`, `punkt4_0`) VALUES
(1, 2000001, 1, 15, '123123123', '12112', 'Hauptklausur', 100, 96, 90, 87, 83, 79, 77, 73, 68, 62, 50),
(3, 2000002, 2, 15, '123123123', '12112', 'Hauptklausur', 100, 96, 90, 87, 83, 79, 77, 73, 68, 62, 50),
(5, 2000003, 3, 15, '123123123', '12112', 'Hauptklausur', 100, 96, 90, 87, 83, 79, 77, 73, 68, 62, 50),
(6, 2000004, 4, 15, '123123123', '12112', 'Hauptklausur', 100, 96, 90, 87, 83, 79, 77, 73, 68, 62, 50),
(7, 2000005, 5, 15, '123123123', '12112', 'Hauptklausur', 100, 96, 90, 87, 83, 79, 77, 73, 68, 62, 50),
(8, 2000005, 6, 15, '123123123', '12112', 'Hauptklausur', 100, 96, 90, 87, 83, 79, 77, 73, 68, 62, 50),
(16, 2000001, 1, 13, '31.01.2019, 02:18', '12.21 6J', '1.Nachklausur', 100, 96, 90, 87, 83, 79, 77, 73, 68, 62, 50);

-- --------------------------------------------------------

--
-- Table structure for table `klausurnote`
--

CREATE TABLE `klausurnote` (
  `KlausurnoteID` int(32) NOT NULL,
  `Mitarbeiter_MarterikelNr` int(32) NOT NULL,
  `Benutzer_MarterikelNr` int(32) NOT NULL,
  `Note` double(32,1) DEFAULT NULL,
  `Bezeichnung` varchar(255) NOT NULL,
  `Punkt` double(32,1) DEFAULT NULL,
  `KorregierteZeit` int(11) DEFAULT NULL,
  `ModulID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klausurnote`
--

INSERT INTO `klausurnote` (`KlausurnoteID`, `Mitarbeiter_MarterikelNr`, `Benutzer_MarterikelNr`, `Note`, `Bezeichnung`, `Punkt`, `KorregierteZeit`, `ModulID`) VALUES
(1, 2000001, 2000084, 1.0, 'Hauptklausur', 100.0, 1545530368, 2),
(2, 2000001, 2000085, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(3, 2000001, 2000086, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(4, 2000001, 2000087, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(5, 2000001, 2000088, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(6, 2000001, 2000089, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(7, 2000001, 2000090, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(8, 2000001, 2000091, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(9, 2000001, 2000092, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(10, 2000001, 2000093, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(11, 2000001, 2000094, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(12, 2000001, 2000095, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(13, 2000001, 2000096, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(14, 2000001, 2000097, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(15, 2000001, 2000098, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(16, 2000001, 2000099, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(17, 2000001, 2000100, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(18, 2000001, 2000101, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(19, 2000001, 2000102, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(20, 2000001, 2000103, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(21, 2000001, 2000104, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(22, 2000001, 2000105, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(23, 2000001, 2000106, 1.0, 'Hauptklausur', 99.0, 123123456, 2),
(24, 2000001, 2000107, 1.0, 'Hauptklausur', 100.0, 123123456, 2),
(25, 2000001, 2000108, 1.3, 'Hauptklausur', 98.0, 123123456, 2),
(26, 2000001, 2000109, 1.3, 'Hauptklausur', 97.0, 123123456, 2),
(27, 2000001, 2000110, 1.3, 'Hauptklausur', 96.0, 123123456, 2),
(28, 2000001, 2000111, 1.3, 'Hauptklausur', 95.0, 123123456, 2),
(29, 2000001, 2000112, 1.3, 'Hauptklausur', 94.0, 123123456, 2),
(30, 2000001, 2000113, 1.3, 'Hauptklausur', 95.0, 123123456, 2),
(31, 2000001, 2000114, 1.3, 'Hauptklausur', 96.0, 123123456, 2),
(32, 2000001, 2000115, 1.3, 'Hauptklausur', 96.0, 123123456, 2),
(33, 2000001, 2000116, 1.3, 'Hauptklausur', 97.0, 123123456, 2),
(34, 2000001, 2000117, 1.3, 'Hauptklausur', 98.0, 123123456, 2),
(35, 2000001, 2000118, 1.3, 'Hauptklausur', 98.0, 123123456, 2),
(36, 2000001, 2000119, 1.3, 'Hauptklausur', 97.0, 123123456, 2),
(37, 2000001, 2000120, 1.3, 'Hauptklausur', 96.0, 123123456, 2),
(38, 2000001, 2000121, 1.3, 'Hauptklausur', 95.0, 123123456, 2),
(39, 2000001, 2000122, 1.3, 'Hauptklausur', 94.0, 123123456, 2),
(40, 2000001, 2000123, 1.3, 'Hauptklausur', 95.0, 123123456, 2),
(41, 2000001, 2000124, 1.3, 'Hauptklausur', 96.0, 123123456, 2),
(42, 2000001, 2000125, 1.3, 'Hauptklausur', 96.0, 123123456, 2),
(43, 2000001, 2000126, 1.3, 'Hauptklausur', 97.0, 123123456, 2),
(44, 2000001, 2000127, 1.3, 'Hauptklausur', 98.0, 123123456, 2),
(45, 2000001, 2000128, 1.3, 'Hauptklausur', 98.0, 123123456, 2),
(46, 2000001, 2000129, 2.0, 'Hauptklausur', 88.0, 123123456, 2),
(47, 2000001, 2000130, 2.0, 'Hauptklausur', 87.0, 123123456, 2),
(48, 2000001, 2000131, 2.0, 'Hauptklausur', 87.0, 123123456, 2),
(49, 2000001, 2000132, 2.0, 'Hauptklausur', 86.0, 123123456, 2),
(50, 2000001, 2000133, 2.0, 'Hauptklausur', 88.0, 123123456, 2),
(51, 2000001, 2000134, 2.0, 'Hauptklausur', 86.0, 123123456, 2),
(52, 2000001, 2000135, 2.0, 'Hauptklausur', 88.0, 123123456, 2),
(53, 2000001, 2000136, 2.0, 'Hauptklausur', 87.0, 123123456, 2),
(54, 2000001, 2000137, 2.0, 'Hauptklausur', 88.0, 123123456, 2),
(55, 2000001, 2000138, 2.0, 'Hauptklausur', 87.0, 123123456, 2),
(56, 2000001, 2000139, 3.0, 'Hauptklausur', 76.0, 123123456, 2),
(57, 2000001, 2000140, 3.0, 'Hauptklausur', 75.0, 123123456, 2),
(58, 2000001, 2000141, 3.0, 'Hauptklausur', 75.0, 123123456, 2),
(59, 2000001, 2000142, 3.0, 'Hauptklausur', 74.0, 123123456, 2),
(60, 2000001, 2000143, 3.0, 'Hauptklausur', 73.0, 123123456, 2),
(61, 2000001, 2000144, 3.0, 'Hauptklausur', 76.0, 123123456, 2),
(62, 2000001, 2000145, 3.0, 'Hauptklausur', 75.0, 123123456, 2),
(63, 2000001, 2000146, 3.0, 'Hauptklausur', 76.0, 123123456, 2),
(64, 2000001, 2000147, 3.0, 'Hauptklausur', 75.0, 123123456, 2),
(65, 2000001, 2000148, 3.0, 'Hauptklausur', 74.0, 123123456, 2),
(66, 2000001, 2000149, 3.0, 'Hauptklausur', 76.0, 123123456, 2),
(67, 2000001, 2000150, 2.3, 'Hauptklausur', 84.0, 123123456, 2),
(68, 2000001, 2000151, 2.3, 'Hauptklausur', 86.0, 123123456, 2),
(69, 2000001, 2000152, 2.3, 'Hauptklausur', 82.0, 123123456, 2),
(70, 2000001, 2000153, 2.3, 'Hauptklausur', 81.0, 123123456, 2),
(71, 2000001, 2000154, 2.3, 'Hauptklausur', 82.0, 123123456, 2),
(72, 2000001, 2000155, 2.3, 'Hauptklausur', 84.0, 123123456, 2),
(73, 2000001, 2000156, 2.3, 'Hauptklausur', 85.0, 123123456, 2),
(74, 2000001, 2000157, 2.3, 'Hauptklausur', 86.0, 123123456, 2),
(75, 2000001, 2000158, 2.3, 'Hauptklausur', 85.0, 123123456, 2),
(76, 2000001, 2000159, 2.3, 'Hauptklausur', 84.0, 123123456, 2),
(77, 2000001, 2000160, 2.3, 'Hauptklausur', 85.0, 123123456, 2),
(78, 2000001, 2000161, 2.3, 'Hauptklausur', 85.0, 123123456, 2),
(79, 2000001, 2000162, 2.3, 'Hauptklausur', 85.0, 123123456, 2),
(80, 2000001, 2000163, 4.0, 'Hauptklausur', 61.0, 123123456, 2),
(81, 2000001, 2000164, 4.0, 'Hauptklausur', 60.0, 123123456, 2),
(82, 2000001, 2000165, 4.0, 'Hauptklausur', 59.0, 123123456, 2),
(83, 2000001, 2000166, 4.0, 'Hauptklausur', 58.0, 123123456, 2),
(84, 2000001, 2000167, 4.0, 'Hauptklausur', 56.0, 123123456, 2),
(85, 2000001, 2000168, 4.0, 'Hauptklausur', 57.0, 123123456, 2),
(86, 2000001, 2000169, 4.0, 'Hauptklausur', 55.0, 123123456, 2),
(87, 2000001, 2000170, 4.0, 'Hauptklausur', 54.0, 123123456, 2),
(88, 2000001, 2000171, 4.0, 'Hauptklausur', 53.0, 123123456, 2),
(89, 2000001, 2000172, 4.0, 'Hauptklausur', 58.0, 123123456, 2),
(90, 2000001, 2000173, 4.0, 'Hauptklausur', 60.0, 123123456, 2),
(91, 2000001, 2000174, 4.0, 'Hauptklausur', 50.0, 123123456, 2),
(92, 2000001, 2000175, 4.0, 'Hauptklausur', 53.0, 123123456, 2),
(93, 2000001, 2000176, 4.0, 'Hauptklausur', 54.0, 123123456, 2),
(94, 2000001, 2000177, 5.0, 'Hauptklausur', 49.0, 123123456, 2),
(95, 2000001, 2000178, 5.0, 'Hauptklausur', 45.0, 123123456, 2),
(96, 2000001, 2000179, 5.0, 'Hauptklausur', 32.0, 123123456, 2),
(97, 2000001, 2000180, 5.0, 'Hauptklausur', 12.0, 123123456, 2),
(98, 2000001, 2000181, 5.0, 'Hauptklausur', 11.0, 123123456, 2),
(99, 2000001, 2000182, 5.0, 'Hauptklausur', 9.0, 123123456, 2),
(100, 2000001, 2000183, 5.0, 'Hauptklausur', 32.0, 123123456, 2),
(101, 2000002, 2000184, 1.0, 'Hauptklausur', 100.0, 1545530373, 1),
(102, 2000002, 2000185, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(103, 2000002, 2000186, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(104, 2000002, 2000187, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(105, 2000002, 2000188, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(106, 2000002, 2000189, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(107, 2000002, 2000190, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(108, 2000002, 2000191, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(109, 2000002, 2000192, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(110, 2000002, 2000193, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(111, 2000002, 2000194, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(112, 2000002, 2000195, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(113, 2000002, 2000196, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(114, 2000002, 2000197, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(115, 2000002, 2000198, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(116, 2000002, 2000199, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(117, 2000002, 2000200, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(118, 2000002, 2000201, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(119, 2000002, 2000202, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(120, 2000002, 2000203, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(121, 2000002, 2000204, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(122, 2000002, 2000205, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(123, 2000002, 2000206, 1.0, 'Hauptklausur', 99.0, 123123456, 1),
(124, 2000002, 2000207, 1.0, 'Hauptklausur', 100.0, 123123456, 1),
(125, 2000002, 2000208, 1.3, 'Hauptklausur', 98.0, 123123456, 1),
(126, 2000002, 2000209, 1.3, 'Hauptklausur', 97.0, 123123456, 1),
(127, 2000002, 2000210, 1.3, 'Hauptklausur', 96.0, 123123456, 1),
(128, 2000002, 2000211, 1.3, 'Hauptklausur', 95.0, 123123456, 1),
(129, 2000002, 2000212, 1.3, 'Hauptklausur', 94.0, 123123456, 1),
(130, 2000002, 2000213, 1.3, 'Hauptklausur', 95.0, 123123456, 1),
(131, 2000002, 2000214, 1.3, 'Hauptklausur', 96.0, 123123456, 1),
(132, 2000002, 2000215, 1.3, 'Hauptklausur', 96.0, 123123456, 1),
(133, 2000002, 2000216, 1.3, 'Hauptklausur', 97.0, 123123456, 1),
(134, 2000002, 2000217, 1.3, 'Hauptklausur', 98.0, 123123456, 1),
(135, 2000002, 2000218, 1.3, 'Hauptklausur', 98.0, 123123456, 1),
(136, 2000002, 2000219, 1.3, 'Hauptklausur', 97.0, 123123456, 1),
(137, 2000002, 2000220, 1.3, 'Hauptklausur', 96.0, 123123456, 1),
(138, 2000002, 2000221, 1.3, 'Hauptklausur', 95.0, 123123456, 1),
(139, 2000002, 2000222, 1.3, 'Hauptklausur', 94.0, 123123456, 1),
(140, 2000002, 2000223, 1.3, 'Hauptklausur', 95.0, 123123456, 1),
(141, 2000002, 2000224, 1.3, 'Hauptklausur', 96.0, 123123456, 1),
(142, 2000002, 2000225, 1.3, 'Hauptklausur', 96.0, 123123456, 1),
(143, 2000002, 2000226, 1.3, 'Hauptklausur', 97.0, 123123456, 1),
(144, 2000002, 2000227, 1.3, 'Hauptklausur', 98.0, 123123456, 1),
(145, 2000002, 2000228, 1.3, 'Hauptklausur', 98.0, 123123456, 1),
(146, 2000002, 2000229, 2.0, 'Hauptklausur', 88.0, 123123456, 1),
(147, 2000002, 2000230, 2.0, 'Hauptklausur', 87.0, 123123456, 1),
(148, 2000002, 2000231, 2.0, 'Hauptklausur', 87.0, 123123456, 1),
(149, 2000002, 2000232, 2.0, 'Hauptklausur', 86.0, 123123456, 1),
(150, 2000002, 2000233, 2.0, 'Hauptklausur', 88.0, 123123456, 1),
(151, 2000002, 2000234, 2.0, 'Hauptklausur', 86.0, 123123456, 1),
(152, 2000002, 2000235, 2.0, 'Hauptklausur', 88.0, 123123456, 1),
(153, 2000002, 2000236, 2.0, 'Hauptklausur', 87.0, 123123456, 1),
(154, 2000002, 2000237, 2.0, 'Hauptklausur', 88.0, 123123456, 1),
(155, 2000002, 2000238, 2.0, 'Hauptklausur', 87.0, 123123456, 1),
(156, 2000002, 2000239, 3.0, 'Hauptklausur', 76.0, 123123456, 1),
(157, 2000002, 2000240, 3.0, 'Hauptklausur', 75.0, 123123456, 1),
(158, 2000002, 2000241, 3.0, 'Hauptklausur', 75.0, 123123456, 1),
(159, 2000002, 2000242, 3.0, 'Hauptklausur', 74.0, 123123456, 1),
(160, 2000002, 2000243, 3.0, 'Hauptklausur', 73.0, 123123456, 1),
(161, 2000002, 2000244, 3.0, 'Hauptklausur', 76.0, 123123456, 1),
(162, 2000002, 2000245, 3.0, 'Hauptklausur', 75.0, 123123456, 1),
(163, 2000002, 2000246, 3.0, 'Hauptklausur', 76.0, 123123456, 1),
(164, 2000002, 2000247, 3.0, 'Hauptklausur', 75.0, 123123456, 1),
(165, 2000002, 2000248, 3.0, 'Hauptklausur', 74.0, 123123456, 1),
(166, 2000002, 2000249, 3.0, 'Hauptklausur', 76.0, 123123456, 1),
(167, 2000002, 2000250, 2.3, 'Hauptklausur', 84.0, 123123456, 1),
(168, 2000002, 2000251, 2.3, 'Hauptklausur', 86.0, 123123456, 1),
(169, 2000002, 2000252, 2.3, 'Hauptklausur', 82.0, 123123456, 1),
(170, 2000002, 2000253, 2.3, 'Hauptklausur', 81.0, 123123456, 1),
(171, 2000002, 2000254, 2.3, 'Hauptklausur', 82.0, 123123456, 1),
(172, 2000002, 2000255, 2.3, 'Hauptklausur', 84.0, 123123456, 1),
(173, 2000002, 2000256, 2.3, 'Hauptklausur', 85.0, 123123456, 1),
(174, 2000002, 2000257, 2.3, 'Hauptklausur', 86.0, 123123456, 1),
(175, 2000002, 2000258, 2.3, 'Hauptklausur', 85.0, 123123456, 1),
(176, 2000002, 2000259, 2.3, 'Hauptklausur', 84.0, 123123456, 1),
(177, 2000002, 2000260, 2.3, 'Hauptklausur', 85.0, 123123456, 1),
(178, 2000002, 2000261, 2.3, 'Hauptklausur', 85.0, 123123456, 1),
(179, 2000002, 2000262, 2.3, 'Hauptklausur', 85.0, 123123456, 1),
(180, 2000002, 2000263, 4.0, 'Hauptklausur', 61.0, 123123456, 1),
(181, 2000002, 2000264, 4.0, 'Hauptklausur', 60.0, 123123456, 1),
(182, 2000002, 2000265, 4.0, 'Hauptklausur', 59.0, 123123456, 1),
(183, 2000002, 2000266, 4.0, 'Hauptklausur', 58.0, 123123456, 1),
(184, 2000002, 2000267, 4.0, 'Hauptklausur', 56.0, 123123456, 1),
(185, 2000002, 2000268, 4.0, 'Hauptklausur', 57.0, 123123456, 1),
(186, 2000002, 2000269, 4.0, 'Hauptklausur', 55.0, 123123456, 1),
(187, 2000002, 2000270, 4.0, 'Hauptklausur', 54.0, 123123456, 1),
(188, 2000002, 2000084, 4.0, 'Hauptklausur', 53.0, 123123456, 1),
(189, 2000002, 2000085, 4.0, 'Hauptklausur', 58.0, 123123456, 1),
(190, 2000002, 2000086, 4.0, 'Hauptklausur', 60.0, 123123456, 1),
(191, 2000002, 2000087, 4.0, 'Hauptklausur', 50.0, 123123456, 1),
(192, 2000002, 2000088, 4.0, 'Hauptklausur', 53.0, 123123456, 1),
(193, 2000002, 2000089, 4.0, 'Hauptklausur', 54.0, 123123456, 1),
(194, 2000002, 2000090, 5.0, 'Hauptklausur', 49.0, 123123456, 1),
(195, 2000002, 2000091, 5.0, 'Hauptklausur', 45.0, 123123456, 1),
(196, 2000002, 2000092, 5.0, 'Hauptklausur', 32.0, 123123456, 1),
(197, 2000002, 2000093, 5.0, 'Hauptklausur', 12.0, 123123456, 1),
(198, 2000002, 2000094, 5.0, 'Hauptklausur', 11.0, 123123456, 1),
(199, 2000002, 2000095, 5.0, 'Hauptklausur', 9.0, 123123456, 1),
(200, 2000002, 2000096, 5.0, 'Hauptklausur', 32.0, 123123456, 1),
(201, 2000003, 2000097, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(202, 2000003, 2000098, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(203, 2000003, 2000099, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(204, 2000003, 2000100, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(205, 2000003, 2000101, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(206, 2000003, 2000102, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(207, 2000003, 2000103, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(208, 2000003, 2000104, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(209, 2000003, 2000105, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(210, 2000003, 2000106, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(211, 2000003, 2000107, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(212, 2000003, 2000108, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(213, 2000003, 2000109, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(214, 2000003, 2000110, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(215, 2000003, 2000111, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(216, 2000003, 2000112, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(217, 2000003, 2000113, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(218, 2000003, 2000114, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(219, 2000003, 2000115, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(220, 2000003, 2000116, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(221, 2000003, 2000117, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(222, 2000003, 2000118, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(223, 2000003, 2000119, 1.0, 'Hauptklausur', 99.0, 123123456, 3),
(224, 2000003, 2000120, 1.0, 'Hauptklausur', 100.0, 123123456, 3),
(225, 2000003, 2000121, 1.3, 'Hauptklausur', 98.0, 123123456, 3),
(226, 2000003, 2000122, 1.3, 'Hauptklausur', 97.0, 123123456, 3),
(227, 2000003, 2000123, 1.3, 'Hauptklausur', 96.0, 123123456, 3),
(228, 2000003, 2000124, 1.3, 'Hauptklausur', 95.0, 123123456, 3),
(229, 2000003, 2000125, 1.3, 'Hauptklausur', 94.0, 123123456, 3),
(230, 2000003, 2000126, 1.3, 'Hauptklausur', 95.0, 123123456, 3),
(231, 2000003, 2000127, 1.3, 'Hauptklausur', 96.0, 123123456, 3),
(232, 2000003, 2000128, 1.3, 'Hauptklausur', 96.0, 123123456, 3),
(233, 2000003, 2000129, 1.3, 'Hauptklausur', 97.0, 123123456, 3),
(234, 2000003, 2000130, 1.3, 'Hauptklausur', 98.0, 123123456, 3),
(235, 2000003, 2000131, 1.3, 'Hauptklausur', 98.0, 123123456, 3),
(236, 2000003, 2000132, 1.3, 'Hauptklausur', 97.0, 123123456, 3),
(237, 2000003, 2000133, 1.3, 'Hauptklausur', 96.0, 123123456, 3),
(238, 2000003, 2000134, 1.3, 'Hauptklausur', 95.0, 123123456, 3),
(239, 2000003, 2000135, 1.3, 'Hauptklausur', 94.0, 123123456, 3),
(240, 2000003, 2000136, 1.3, 'Hauptklausur', 95.0, 123123456, 3),
(241, 2000003, 2000137, 1.3, 'Hauptklausur', 96.0, 123123456, 3),
(242, 2000003, 2000138, 1.3, 'Hauptklausur', 96.0, 123123456, 3),
(243, 2000003, 2000139, 1.3, 'Hauptklausur', 97.0, 123123456, 3),
(244, 2000003, 2000140, 1.3, 'Hauptklausur', 98.0, 123123456, 3),
(245, 2000003, 2000141, 1.3, 'Hauptklausur', 98.0, 123123456, 3),
(246, 2000003, 2000142, 2.0, 'Hauptklausur', 88.0, 123123456, 3),
(247, 2000003, 2000143, 2.0, 'Hauptklausur', 87.0, 123123456, 3),
(248, 2000003, 2000144, 2.0, 'Hauptklausur', 87.0, 123123456, 3),
(249, 2000003, 2000145, 2.0, 'Hauptklausur', 86.0, 123123456, 3),
(250, 2000003, 2000146, 2.0, 'Hauptklausur', 88.0, 123123456, 3),
(251, 2000003, 2000147, 2.0, 'Hauptklausur', 86.0, 123123456, 3),
(252, 2000003, 2000148, 2.0, 'Hauptklausur', 88.0, 123123456, 3),
(253, 2000003, 2000149, 2.0, 'Hauptklausur', 87.0, 123123456, 3),
(254, 2000003, 2000150, 2.0, 'Hauptklausur', 88.0, 123123456, 3),
(255, 2000003, 2000151, 2.0, 'Hauptklausur', 87.0, 123123456, 3),
(256, 2000003, 2000152, 3.0, 'Hauptklausur', 76.0, 123123456, 3),
(257, 2000003, 2000153, 3.0, 'Hauptklausur', 75.0, 123123456, 3),
(258, 2000003, 2000154, 3.0, 'Hauptklausur', 75.0, 123123456, 3),
(259, 2000003, 2000155, 3.0, 'Hauptklausur', 74.0, 123123456, 3),
(260, 2000003, 2000156, 3.0, 'Hauptklausur', 73.0, 123123456, 3),
(261, 2000003, 2000157, 3.0, 'Hauptklausur', 76.0, 123123456, 3),
(262, 2000003, 2000158, 3.0, 'Hauptklausur', 75.0, 123123456, 3),
(263, 2000003, 2000159, 3.0, 'Hauptklausur', 76.0, 123123456, 3),
(264, 2000003, 2000160, 3.0, 'Hauptklausur', 75.0, 123123456, 3),
(265, 2000003, 2000161, 3.0, 'Hauptklausur', 74.0, 123123456, 3),
(266, 2000003, 2000162, 3.0, 'Hauptklausur', 76.0, 123123456, 3),
(267, 2000003, 2000163, 2.3, 'Hauptklausur', 84.0, 123123456, 3),
(268, 2000003, 2000164, 2.3, 'Hauptklausur', 86.0, 123123456, 3),
(269, 2000003, 2000165, 2.3, 'Hauptklausur', 82.0, 123123456, 3),
(270, 2000003, 2000166, 2.3, 'Hauptklausur', 81.0, 123123456, 3),
(271, 2000003, 2000167, 2.3, 'Hauptklausur', 82.0, 123123456, 3),
(272, 2000003, 2000168, 2.3, 'Hauptklausur', 84.0, 123123456, 3),
(273, 2000003, 2000169, 2.3, 'Hauptklausur', 85.0, 123123456, 3),
(274, 2000003, 2000170, 2.3, 'Hauptklausur', 86.0, 123123456, 3),
(275, 2000003, 2000171, 2.3, 'Hauptklausur', 85.0, 123123456, 3),
(276, 2000003, 2000172, 2.3, 'Hauptklausur', 84.0, 123123456, 3),
(277, 2000003, 2000173, 2.3, 'Hauptklausur', 85.0, 123123456, 3),
(278, 2000003, 2000174, 2.3, 'Hauptklausur', 85.0, 123123456, 3),
(279, 2000003, 2000175, 2.3, 'Hauptklausur', 85.0, 123123456, 3),
(280, 2000003, 2000176, 4.0, 'Hauptklausur', 61.0, 123123456, 3),
(281, 2000003, 2000177, 4.0, 'Hauptklausur', 60.0, 123123456, 3),
(282, 2000003, 2000178, 4.0, 'Hauptklausur', 59.0, 123123456, 3),
(283, 2000003, 2000179, 4.0, 'Hauptklausur', 58.0, 123123456, 3),
(284, 2000003, 2000180, 4.0, 'Hauptklausur', 56.0, 123123456, 3),
(285, 2000003, 2000181, 4.0, 'Hauptklausur', 57.0, 123123456, 3),
(286, 2000003, 2000182, 4.0, 'Hauptklausur', 55.0, 123123456, 3),
(287, 2000003, 2000183, 4.0, 'Hauptklausur', 54.0, 123123456, 3),
(288, 2000003, 2000184, 4.0, 'Hauptklausur', 53.0, 123123456, 3),
(289, 2000003, 2000185, 4.0, 'Hauptklausur', 58.0, 123123456, 3),
(290, 2000003, 2000186, 4.0, 'Hauptklausur', 60.0, 123123456, 3),
(291, 2000003, 2000187, 4.0, 'Hauptklausur', 50.0, 123123456, 3),
(292, 2000003, 2000188, 4.0, 'Hauptklausur', 53.0, 123123456, 3),
(293, 2000003, 2000189, 4.0, 'Hauptklausur', 54.0, 123123456, 3),
(294, 2000003, 2000190, 5.0, 'Hauptklausur', 49.0, 123123456, 3),
(295, 2000003, 2000191, 5.0, 'Hauptklausur', 45.0, 123123456, 3),
(296, 2000003, 2000192, 5.0, 'Hauptklausur', 32.0, 123123456, 3),
(297, 2000003, 2000193, 5.0, 'Hauptklausur', 12.0, 123123456, 3),
(298, 2000003, 2000194, 5.0, 'Hauptklausur', 11.0, 123123456, 3),
(299, 2000003, 2000195, 5.0, 'Hauptklausur', 9.0, 123123456, 3),
(300, 2000003, 2000196, 5.0, 'Hauptklausur', 32.0, 123123456, 3),
(301, 2000004, 2000197, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(302, 2000004, 2000198, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(303, 2000004, 2000199, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(304, 2000004, 2000200, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(305, 2000004, 2000201, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(306, 2000004, 2000202, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(307, 2000004, 2000203, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(308, 2000004, 2000204, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(309, 2000004, 2000205, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(310, 2000004, 2000206, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(311, 2000004, 2000207, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(312, 2000004, 2000208, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(313, 2000004, 2000209, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(314, 2000004, 2000210, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(315, 2000004, 2000211, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(316, 2000004, 2000212, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(317, 2000004, 2000213, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(318, 2000004, 2000214, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(319, 2000004, 2000215, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(320, 2000004, 2000216, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(321, 2000004, 2000217, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(322, 2000004, 2000218, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(323, 2000004, 2000219, 1.0, 'Hauptklausur', 99.0, 123123456, 4),
(324, 2000004, 2000220, 1.0, 'Hauptklausur', 100.0, 123123456, 4),
(325, 2000004, 2000221, 1.3, 'Hauptklausur', 98.0, 123123456, 4),
(326, 2000004, 2000222, 1.3, 'Hauptklausur', 97.0, 123123456, 4),
(327, 2000004, 2000223, 1.3, 'Hauptklausur', 96.0, 123123456, 4),
(328, 2000004, 2000224, 1.3, 'Hauptklausur', 95.0, 123123456, 4),
(329, 2000004, 2000225, 1.3, 'Hauptklausur', 94.0, 123123456, 4),
(330, 2000004, 2000226, 1.3, 'Hauptklausur', 95.0, 123123456, 4),
(331, 2000004, 2000227, 1.3, 'Hauptklausur', 96.0, 123123456, 4),
(332, 2000004, 2000228, 1.3, 'Hauptklausur', 96.0, 123123456, 4),
(333, 2000004, 2000229, 1.3, 'Hauptklausur', 97.0, 123123456, 4),
(334, 2000004, 2000230, 1.3, 'Hauptklausur', 98.0, 123123456, 4),
(335, 2000004, 2000231, 1.3, 'Hauptklausur', 98.0, 123123456, 4),
(336, 2000004, 2000232, 1.3, 'Hauptklausur', 97.0, 123123456, 4),
(337, 2000004, 2000233, 1.3, 'Hauptklausur', 96.0, 123123456, 4),
(338, 2000004, 2000234, 1.3, 'Hauptklausur', 95.0, 123123456, 4),
(339, 2000004, 2000235, 1.3, 'Hauptklausur', 94.0, 123123456, 4),
(340, 2000004, 2000236, 1.3, 'Hauptklausur', 95.0, 123123456, 4),
(341, 2000004, 2000237, 1.3, 'Hauptklausur', 96.0, 123123456, 4),
(342, 2000004, 2000238, 1.3, 'Hauptklausur', 96.0, 123123456, 4),
(343, 2000004, 2000239, 1.3, 'Hauptklausur', 97.0, 123123456, 4),
(344, 2000004, 2000240, 1.3, 'Hauptklausur', 98.0, 123123456, 4),
(345, 2000004, 2000241, 1.3, 'Hauptklausur', 98.0, 123123456, 4),
(346, 2000004, 2000242, 2.0, 'Hauptklausur', 88.0, 123123456, 4),
(347, 2000004, 2000243, 2.0, 'Hauptklausur', 87.0, 123123456, 4),
(348, 2000004, 2000244, 2.0, 'Hauptklausur', 87.0, 123123456, 4),
(349, 2000004, 2000245, 2.0, 'Hauptklausur', 86.0, 123123456, 4),
(350, 2000004, 2000246, 2.0, 'Hauptklausur', 88.0, 123123456, 4),
(351, 2000004, 2000247, 2.0, 'Hauptklausur', 86.0, 123123456, 4),
(352, 2000004, 2000248, 2.0, 'Hauptklausur', 88.0, 123123456, 4),
(353, 2000004, 2000249, 2.0, 'Hauptklausur', 87.0, 123123456, 4),
(354, 2000004, 2000250, 2.0, 'Hauptklausur', 88.0, 123123456, 4),
(355, 2000004, 2000251, 2.0, 'Hauptklausur', 87.0, 123123456, 4),
(356, 2000004, 2000252, 3.0, 'Hauptklausur', 76.0, 123123456, 4),
(357, 2000004, 2000253, 3.0, 'Hauptklausur', 75.0, 123123456, 4),
(358, 2000004, 2000254, 3.0, 'Hauptklausur', 75.0, 123123456, 4),
(359, 2000004, 2000255, 3.0, 'Hauptklausur', 74.0, 123123456, 4),
(360, 2000004, 2000256, 3.0, 'Hauptklausur', 73.0, 123123456, 4),
(361, 2000004, 2000257, 3.0, 'Hauptklausur', 76.0, 123123456, 4),
(362, 2000004, 2000258, 3.0, 'Hauptklausur', 75.0, 123123456, 4),
(363, 2000004, 2000259, 3.0, 'Hauptklausur', 76.0, 123123456, 4),
(364, 2000004, 2000260, 3.0, 'Hauptklausur', 75.0, 123123456, 4),
(365, 2000004, 2000261, 3.0, 'Hauptklausur', 74.0, 123123456, 4),
(366, 2000004, 2000262, 3.0, 'Hauptklausur', 76.0, 123123456, 4),
(367, 2000004, 2000263, 2.3, 'Hauptklausur', 84.0, 123123456, 4),
(368, 2000004, 2000264, 2.3, 'Hauptklausur', 86.0, 123123456, 4),
(369, 2000004, 2000265, 2.3, 'Hauptklausur', 82.0, 123123456, 4),
(370, 2000004, 2000266, 2.3, 'Hauptklausur', 81.0, 123123456, 4),
(371, 2000004, 2000267, 2.3, 'Hauptklausur', 82.0, 123123456, 4),
(372, 2000004, 2000268, 2.3, 'Hauptklausur', 84.0, 123123456, 4),
(373, 2000004, 2000269, 2.3, 'Hauptklausur', 85.0, 123123456, 4),
(374, 2000004, 2000270, 2.3, 'Hauptklausur', 86.0, 123123456, 4),
(375, 2000004, 2000120, 2.3, 'Hauptklausur', 85.0, 123123456, 4),
(376, 2000004, 2000121, 2.3, 'Hauptklausur', 84.0, 123123456, 4),
(377, 2000004, 2000122, 2.3, 'Hauptklausur', 85.0, 123123456, 4),
(378, 2000004, 2000123, 2.3, 'Hauptklausur', 85.0, 123123456, 4),
(379, 2000004, 2000124, 2.3, 'Hauptklausur', 85.0, 123123456, 4),
(380, 2000004, 2000125, 4.0, 'Hauptklausur', 61.0, 123123456, 4),
(381, 2000004, 2000126, 4.0, 'Hauptklausur', 60.0, 123123456, 4),
(382, 2000004, 2000127, 4.0, 'Hauptklausur', 59.0, 123123456, 4),
(383, 2000004, 2000128, 4.0, 'Hauptklausur', 58.0, 123123456, 4),
(384, 2000004, 2000129, 4.0, 'Hauptklausur', 56.0, 123123456, 4),
(385, 2000004, 2000130, 4.0, 'Hauptklausur', 57.0, 123123456, 4),
(386, 2000004, 2000131, 4.0, 'Hauptklausur', 55.0, 123123456, 4),
(387, 2000004, 2000132, 4.0, 'Hauptklausur', 54.0, 123123456, 4),
(388, 2000004, 2000133, 4.0, 'Hauptklausur', 53.0, 123123456, 4),
(389, 2000004, 2000134, 4.0, 'Hauptklausur', 58.0, 123123456, 4),
(390, 2000004, 2000135, 4.0, 'Hauptklausur', 60.0, 123123456, 4),
(391, 2000004, 2000136, 4.0, 'Hauptklausur', 50.0, 123123456, 4),
(392, 2000004, 2000137, 4.0, 'Hauptklausur', 53.0, 123123456, 4),
(393, 2000004, 2000138, 4.0, 'Hauptklausur', 54.0, 123123456, 4),
(394, 2000004, 2000139, 5.0, 'Hauptklausur', 49.0, 123123456, 4),
(395, 2000004, 2000140, 5.0, 'Hauptklausur', 45.0, 123123456, 4),
(396, 2000004, 2000141, 5.0, 'Hauptklausur', 32.0, 123123456, 4),
(397, 2000004, 2000142, 5.0, 'Hauptklausur', 12.0, 123123456, 4),
(398, 2000004, 2000143, 5.0, 'Hauptklausur', 11.0, 123123456, 4),
(399, 2000004, 2000144, 5.0, 'Hauptklausur', 9.0, 123123456, 4),
(400, 2000004, 2000145, 5.0, 'Hauptklausur', 32.0, 123123456, 4),
(401, 2000004, 2000146, 5.0, 'Hauptklausur', 2.0, 123123456, 4),
(402, 2000004, 2000147, 5.0, 'Hauptklausur', 12.0, 123123456, 4),
(403, 2000004, 2000148, 5.0, 'Hauptklausur', 12.0, 123123456, 4),
(404, 2000005, 2000084, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(405, 2000005, 2000085, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(406, 2000005, 2000086, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(407, 2000005, 2000087, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(408, 2000005, 2000088, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(409, 2000005, 2000089, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(410, 2000005, 2000090, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(411, 2000005, 2000091, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(412, 2000005, 2000092, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(413, 2000005, 2000093, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(414, 2000005, 2000094, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(415, 2000005, 2000095, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(416, 2000005, 2000096, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(417, 2000005, 2000097, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(418, 2000005, 2000098, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(419, 2000005, 2000099, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(420, 2000005, 2000100, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(421, 2000005, 2000101, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(422, 2000005, 2000102, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(423, 2000005, 2000103, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(424, 2000005, 2000104, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(425, 2000005, 2000105, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(426, 2000005, 2000106, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(427, 2000005, 2000107, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(428, 2000005, 2000108, 1.3, 'Hauptklausur', 98.0, 123123456, 5),
(429, 2000005, 2000109, 1.3, 'Hauptklausur', 97.0, 123123456, 5),
(430, 2000005, 2000110, 1.3, 'Hauptklausur', 96.0, 123123456, 5),
(431, 2000005, 2000111, 1.3, 'Hauptklausur', 95.0, 123123456, 5),
(432, 2000005, 2000112, 1.3, 'Hauptklausur', 94.0, 123123456, 5),
(433, 2000005, 2000113, 1.3, 'Hauptklausur', 95.0, 123123456, 5),
(434, 2000005, 2000114, 1.3, 'Hauptklausur', 96.0, 123123456, 5),
(435, 2000005, 2000115, 1.3, 'Hauptklausur', 96.0, 123123456, 5),
(436, 2000005, 2000116, 1.3, 'Hauptklausur', 97.0, 123123456, 5),
(437, 2000005, 2000117, 1.3, 'Hauptklausur', 98.0, 123123456, 5),
(438, 2000005, 2000118, 1.3, 'Hauptklausur', 98.0, 123123456, 5),
(439, 2000005, 2000119, 1.3, 'Hauptklausur', 97.0, 123123456, 5),
(440, 2000005, 2000120, 1.3, 'Hauptklausur', 96.0, 123123456, 5),
(441, 2000005, 2000121, 1.3, 'Hauptklausur', 95.0, 123123456, 5),
(442, 2000005, 2000122, 1.3, 'Hauptklausur', 94.0, 123123456, 5),
(443, 2000005, 2000123, 1.3, 'Hauptklausur', 95.0, 123123456, 5),
(444, 2000005, 2000124, 1.3, 'Hauptklausur', 96.0, 123123456, 5),
(445, 2000005, 2000125, 1.3, 'Hauptklausur', 96.0, 123123456, 5),
(446, 2000005, 2000126, 1.3, 'Hauptklausur', 97.0, 123123456, 5),
(447, 2000005, 2000127, 1.3, 'Hauptklausur', 98.0, 123123456, 5),
(448, 2000005, 2000128, 1.3, 'Hauptklausur', 98.0, 123123456, 5),
(449, 2000005, 2000129, 2.0, 'Hauptklausur', 88.0, 123123456, 5),
(450, 2000005, 2000130, 2.0, 'Hauptklausur', 87.0, 123123456, 5),
(451, 2000005, 2000131, 2.0, 'Hauptklausur', 87.0, 123123456, 5),
(452, 2000005, 2000132, 2.0, 'Hauptklausur', 86.0, 123123456, 5),
(453, 2000005, 2000133, 2.0, 'Hauptklausur', 88.0, 123123456, 5),
(454, 2000005, 2000134, 2.0, 'Hauptklausur', 86.0, 123123456, 5),
(455, 2000005, 2000135, 2.0, 'Hauptklausur', 88.0, 123123456, 5),
(456, 2000005, 2000136, 2.0, 'Hauptklausur', 87.0, 123123456, 5),
(457, 2000005, 2000137, 2.0, 'Hauptklausur', 88.0, 123123456, 5),
(458, 2000005, 2000138, 2.0, 'Hauptklausur', 87.0, 123123456, 5),
(459, 2000005, 2000139, 3.0, 'Hauptklausur', 76.0, 123123456, 5),
(460, 2000005, 2000140, 3.0, 'Hauptklausur', 75.0, 123123456, 5),
(461, 2000005, 2000141, 3.0, 'Hauptklausur', 75.0, 123123456, 5),
(462, 2000005, 2000142, 3.0, 'Hauptklausur', 74.0, 123123456, 5),
(463, 2000005, 2000143, 3.0, 'Hauptklausur', 73.0, 123123456, 5),
(464, 2000005, 2000144, 3.0, 'Hauptklausur', 76.0, 123123456, 5),
(465, 2000005, 2000145, 3.0, 'Hauptklausur', 75.0, 123123456, 5),
(466, 2000005, 2000146, 3.0, 'Hauptklausur', 76.0, 123123456, 5),
(467, 2000005, 2000147, 3.0, 'Hauptklausur', 75.0, 123123456, 5),
(468, 2000005, 2000148, 3.0, 'Hauptklausur', 74.0, 123123456, 5),
(469, 2000005, 2000149, 3.0, 'Hauptklausur', 76.0, 123123456, 5),
(470, 2000005, 2000150, 2.3, 'Hauptklausur', 84.0, 123123456, 5),
(471, 2000005, 2000151, 2.3, 'Hauptklausur', 86.0, 123123456, 5),
(472, 2000005, 2000152, 2.3, 'Hauptklausur', 82.0, 123123456, 5),
(473, 2000005, 2000153, 2.3, 'Hauptklausur', 81.0, 123123456, 5),
(474, 2000005, 2000154, 2.3, 'Hauptklausur', 82.0, 123123456, 5),
(475, 2000005, 2000155, 2.3, 'Hauptklausur', 84.0, 123123456, 5),
(476, 2000005, 2000156, 2.3, 'Hauptklausur', 85.0, 123123456, 5),
(477, 2000005, 2000157, 2.3, 'Hauptklausur', 86.0, 123123456, 5),
(478, 2000005, 2000158, 2.3, 'Hauptklausur', 85.0, 123123456, 5),
(479, 2000005, 2000159, 2.3, 'Hauptklausur', 84.0, 123123456, 5),
(480, 2000005, 2000160, 2.3, 'Hauptklausur', 85.0, 123123456, 5),
(481, 2000005, 2000161, 2.3, 'Hauptklausur', 85.0, 123123456, 5),
(482, 2000005, 2000162, 2.3, 'Hauptklausur', 85.0, 123123456, 5),
(483, 2000005, 2000163, 4.0, 'Hauptklausur', 61.0, 123123456, 5),
(484, 2000005, 2000164, 4.0, 'Hauptklausur', 60.0, 123123456, 5),
(485, 2000005, 2000165, 4.0, 'Hauptklausur', 59.0, 123123456, 5),
(486, 2000005, 2000166, 4.0, 'Hauptklausur', 58.0, 123123456, 5),
(487, 2000005, 2000167, 4.0, 'Hauptklausur', 56.0, 123123456, 5),
(488, 2000005, 2000168, 4.0, 'Hauptklausur', 57.0, 123123456, 5),
(489, 2000005, 2000169, 4.0, 'Hauptklausur', 55.0, 123123456, 5),
(490, 2000005, 2000170, 4.0, 'Hauptklausur', 54.0, 123123456, 5),
(491, 2000005, 2000171, 4.0, 'Hauptklausur', 53.0, 123123456, 5),
(492, 2000005, 2000172, 4.0, 'Hauptklausur', 58.0, 123123456, 5),
(493, 2000005, 2000173, 4.0, 'Hauptklausur', 60.0, 123123456, 5),
(494, 2000005, 2000174, 4.0, 'Hauptklausur', 50.0, 123123456, 5),
(495, 2000005, 2000175, 4.0, 'Hauptklausur', 53.0, 123123456, 5),
(496, 2000005, 2000176, 4.0, 'Hauptklausur', 54.0, 123123456, 5),
(497, 2000005, 2000177, 5.0, 'Hauptklausur', 49.0, 123123456, 5),
(498, 2000005, 2000178, 5.0, 'Hauptklausur', 45.0, 123123456, 5),
(499, 2000005, 2000179, 5.0, 'Hauptklausur', 32.0, 123123456, 5),
(500, 2000005, 2000180, 5.0, 'Hauptklausur', 12.0, 123123456, 5),
(501, 2000005, 2000181, 5.0, 'Hauptklausur', 11.0, 123123456, 5),
(502, 2000005, 2000182, 5.0, 'Hauptklausur', 9.0, 123123456, 5),
(503, 2000005, 2000183, 5.0, 'Hauptklausur', 32.0, 123123456, 5),
(504, 2000005, 2000184, 5.0, 'Hauptklausur', 2.0, 123123456, 5),
(505, 2000005, 2000185, 5.0, 'Hauptklausur', 12.0, 123123456, 5),
(506, 2000005, 2000186, 5.0, 'Hauptklausur', 12.0, 123123456, 5),
(507, 2000005, 2000187, 1.0, 'Hauptklausur', 100.0, 123123456, 5),
(508, 2000005, 2000188, 1.0, 'Hauptklausur', 99.0, 123123456, 5),
(509, 2000006, 2000216, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(510, 2000006, 2000217, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(511, 2000006, 2000218, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(512, 2000006, 2000219, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(513, 2000006, 2000220, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(514, 2000006, 2000221, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(515, 2000006, 2000222, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(516, 2000006, 2000223, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(517, 2000006, 2000224, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(518, 2000006, 2000225, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(519, 2000006, 2000226, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(520, 2000006, 2000227, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(521, 2000006, 2000228, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(522, 2000006, 2000229, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(523, 2000006, 2000230, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(524, 2000006, 2000231, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(525, 2000006, 2000232, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(526, 2000006, 2000233, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(527, 2000006, 2000234, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(528, 2000006, 2000235, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(529, 2000006, 2000236, 1.0, 'Hauptklausur', 99.0, 123123456, 6),
(530, 2000006, 2000237, 1.0, 'Hauptklausur', 100.0, 123123456, 6),
(531, 2000006, 2000238, 1.3, 'Hauptklausur', 98.0, 123123456, 6),
(532, 2000006, 2000239, 1.3, 'Hauptklausur', 97.0, 123123456, 6),
(533, 2000006, 2000240, 1.3, 'Hauptklausur', 96.0, 123123456, 6),
(534, 2000006, 2000241, 1.3, 'Hauptklausur', 95.0, 123123456, 6),
(535, 2000006, 2000242, 1.3, 'Hauptklausur', 94.0, 123123456, 6),
(536, 2000006, 2000243, 1.3, 'Hauptklausur', 95.0, 123123456, 6),
(537, 2000006, 2000244, 1.3, 'Hauptklausur', 96.0, 123123456, 6),
(538, 2000006, 2000245, 1.3, 'Hauptklausur', 96.0, 123123456, 6),
(539, 2000006, 2000246, 1.3, 'Hauptklausur', 97.0, 123123456, 6),
(540, 2000006, 2000247, 1.3, 'Hauptklausur', 98.0, 123123456, 6),
(541, 2000006, 2000248, 1.3, 'Hauptklausur', 98.0, 123123456, 6),
(542, 2000006, 2000249, 1.3, 'Hauptklausur', 97.0, 123123456, 6),
(543, 2000006, 2000250, 1.3, 'Hauptklausur', 96.0, 123123456, 6),
(544, 2000006, 2000251, 1.3, 'Hauptklausur', 95.0, 123123456, 6),
(545, 2000006, 2000252, 1.3, 'Hauptklausur', 94.0, 123123456, 6),
(546, 2000006, 2000253, 1.3, 'Hauptklausur', 95.0, 123123456, 6),
(547, 2000006, 2000254, 1.3, 'Hauptklausur', 96.0, 123123456, 6),
(548, 2000006, 2000255, 1.3, 'Hauptklausur', 96.0, 123123456, 6),
(549, 2000006, 2000256, 1.3, 'Hauptklausur', 97.0, 123123456, 6),
(550, 2000006, 2000257, 1.3, 'Hauptklausur', 98.0, 123123456, 6),
(551, 2000006, 2000258, 1.3, 'Hauptklausur', 98.0, 123123456, 6),
(552, 2000006, 2000259, 2.0, 'Hauptklausur', 88.0, 123123456, 6),
(553, 2000006, 2000260, 2.0, 'Hauptklausur', 87.0, 123123456, 6),
(554, 2000006, 2000261, 2.0, 'Hauptklausur', 87.0, 123123456, 6),
(555, 2000006, 2000262, 2.0, 'Hauptklausur', 86.0, 123123456, 6),
(556, 2000006, 2000263, 2.0, 'Hauptklausur', 88.0, 123123456, 6),
(557, 2000006, 2000264, 2.0, 'Hauptklausur', 86.0, 123123456, 6),
(558, 2000006, 2000265, 2.0, 'Hauptklausur', 88.0, 123123456, 6),
(559, 2000006, 2000266, 2.0, 'Hauptklausur', 87.0, 123123456, 6),
(560, 2000006, 2000267, 2.0, 'Hauptklausur', 88.0, 123123456, 6),
(561, 2000006, 2000268, 2.0, 'Hauptklausur', 87.0, 123123456, 6),
(562, 2000006, 2000269, 3.0, 'Hauptklausur', 76.0, 123123456, 6),
(563, 2000006, 2000270, 3.0, 'Hauptklausur', 75.0, 123123456, 6),
(564, 2000006, 2000084, 3.0, 'Hauptklausur', 75.0, 123123456, 6),
(565, 2000006, 2000085, 3.0, 'Hauptklausur', 74.0, 123123456, 6),
(566, 2000006, 2000086, 3.0, 'Hauptklausur', 73.0, 123123456, 6),
(567, 2000006, 2000087, 3.0, 'Hauptklausur', 76.0, 123123456, 6),
(568, 2000006, 2000088, 3.0, 'Hauptklausur', 75.0, 123123456, 6),
(569, 2000006, 2000089, 3.0, 'Hauptklausur', 76.0, 123123456, 6),
(570, 2000006, 2000090, 3.0, 'Hauptklausur', 75.0, 123123456, 6),
(571, 2000006, 2000091, 3.0, 'Hauptklausur', 74.0, 123123456, 6),
(572, 2000006, 2000092, 3.0, 'Hauptklausur', 76.0, 123123456, 6),
(573, 2000006, 2000093, 2.3, 'Hauptklausur', 84.0, 123123456, 6),
(574, 2000006, 2000094, 2.3, 'Hauptklausur', 86.0, 123123456, 6),
(575, 2000006, 2000095, 2.3, 'Hauptklausur', 82.0, 123123456, 6),
(576, 2000006, 2000096, 2.3, 'Hauptklausur', 81.0, 123123456, 6),
(577, 2000006, 2000097, 2.3, 'Hauptklausur', 82.0, 123123456, 6),
(578, 2000006, 2000098, 2.3, 'Hauptklausur', 84.0, 123123456, 6),
(579, 2000006, 2000098, 2.3, '1.Nachklausur', 84.0, 123123456, 1);

-- --------------------------------------------------------

--
-- Table structure for table `korrektor`
--

CREATE TABLE `korrektor` (
  `MarterikelNr` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korrektor`
--

INSERT INTO `korrektor` (`MarterikelNr`) VALUES
(2000004),
(2000111),
(2000112),
(2000113),
(2000115),
(2000116);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1542189981),
('m130524_201442_init', 1542189988);

-- --------------------------------------------------------

--
-- Table structure for table `mitarbeiter`
--

CREATE TABLE `mitarbeiter` (
  `MarterikelNr` int(32) NOT NULL,
  `Buero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mitarbeiter`
--

INSERT INTO `mitarbeiter` (`MarterikelNr`, `Buero`) VALUES
(2000001, '25.12.O1.51'),
(2000002, '24.12.U1.52'),
(2000003, '24.12.U1.12'),
(2000004, '24.12.U1.12'),
(2000005, '24.12.U1.51'),
(2000006, '24.12.O2.12');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `ModulID` int(32) NOT NULL,
  `Bezeichnung` varchar(255) NOT NULL,
  `Maximale_Person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`ModulID`, `Bezeichnung`, `Maximale_Person`) VALUES
(1, 'Informatik I(Grundl. der Softwareentw. & Programmierung)', 200),
(2, 'Informatik II (Grundlagen der technischen Informatik)', 200),
(3, 'Programmierpraktikum (evtl. erst im 4. FS)', 200),
(4, 'Informatik III (Grundl. der Algorithmen & Datenstrukturen)', 200),
(5, 'Informatik IV (Grundl. der Theoretischen Informatik)', 200),
(6, 'C-Projekt', 200);

-- --------------------------------------------------------

--
-- Table structure for table `modul_anmelden_benutzer`
--

CREATE TABLE `modul_anmelden_benutzer` (
  `ModulID` int(32) NOT NULL,
  `Benutzer_MarterikelNr` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modul_anmelden_benutzer`
--

INSERT INTO `modul_anmelden_benutzer` (`ModulID`, `Benutzer_MarterikelNr`) VALUES
(1, 2000065),
(1, 2000066),
(1, 2000067),
(1, 2000068),
(1, 2000069),
(1, 2000070),
(1, 2000071),
(1, 2000072),
(1, 2000073),
(1, 2000074),
(1, 2000075),
(1, 2000076),
(1, 2000077),
(1, 2000078),
(1, 2000079),
(1, 2000080),
(1, 2000081),
(1, 2000082),
(1, 2000083),
(1, 2000084),
(1, 2000085),
(1, 2000086),
(1, 2000087),
(1, 2000088),
(1, 2000089),
(1, 2000090),
(1, 2000091),
(1, 2000092),
(1, 2000093),
(1, 2000094),
(1, 2000095),
(1, 2000096),
(1, 2000097),
(1, 2000098),
(1, 2000099),
(1, 2000100),
(1, 2000101),
(1, 2000102),
(1, 2000103),
(1, 2000104),
(1, 2000105),
(1, 2000106),
(4, 2000106),
(1, 2000107),
(4, 2000107),
(1, 2000108),
(4, 2000108),
(1, 2000109),
(4, 2000109),
(1, 2000110),
(4, 2000110),
(1, 2000111),
(4, 2000111),
(1, 2000112),
(4, 2000112),
(1, 2000113),
(4, 2000113),
(1, 2000114),
(4, 2000114),
(1, 2000115),
(4, 2000115),
(1, 2000116),
(4, 2000116),
(1, 2000117),
(4, 2000117),
(1, 2000118),
(4, 2000118),
(1, 2000119),
(4, 2000119),
(1, 2000120),
(4, 2000120),
(1, 2000121),
(4, 2000121),
(1, 2000122),
(4, 2000122),
(1, 2000123),
(4, 2000123),
(1, 2000124),
(4, 2000124),
(1, 2000125),
(4, 2000125),
(1, 2000126),
(4, 2000126),
(1, 2000127),
(4, 2000127),
(1, 2000128),
(4, 2000128),
(1, 2000129),
(4, 2000129),
(1, 2000130),
(4, 2000130),
(1, 2000131),
(4, 2000131),
(1, 2000132),
(4, 2000132),
(1, 2000133),
(4, 2000133),
(1, 2000134),
(4, 2000134),
(1, 2000135),
(4, 2000135),
(1, 2000136),
(4, 2000136),
(1, 2000137),
(4, 2000137),
(1, 2000138),
(4, 2000138),
(1, 2000139),
(4, 2000139),
(1, 2000140),
(4, 2000140),
(1, 2000141),
(4, 2000141),
(1, 2000142),
(4, 2000142),
(1, 2000143),
(4, 2000143),
(1, 2000144),
(4, 2000144),
(1, 2000145),
(4, 2000145),
(1, 2000146),
(4, 2000146),
(1, 2000147),
(1, 2000148),
(1, 2000149),
(1, 2000150),
(1, 2000151),
(1, 2000152),
(1, 2000153),
(1, 2000154),
(1, 2000155),
(1, 2000156),
(1, 2000157),
(1, 2000158),
(1, 2000159),
(1, 2000160),
(1, 2000161),
(1, 2000162),
(1, 2000163),
(1, 2000164),
(2, 2000165),
(2, 2000166),
(3, 2000166),
(2, 2000167),
(3, 2000167),
(2, 2000168),
(3, 2000168),
(2, 2000169),
(3, 2000169),
(2, 2000170),
(3, 2000170),
(2, 2000171),
(3, 2000171),
(2, 2000172),
(3, 2000172),
(2, 2000173),
(3, 2000173),
(2, 2000174),
(3, 2000174),
(2, 2000175),
(3, 2000175),
(2, 2000176),
(3, 2000176),
(2, 2000177),
(3, 2000177),
(2, 2000178),
(3, 2000178),
(2, 2000179),
(3, 2000179),
(2, 2000180),
(3, 2000180),
(2, 2000181),
(3, 2000181),
(2, 2000182),
(3, 2000182),
(2, 2000183),
(3, 2000183),
(2, 2000184),
(3, 2000184),
(2, 2000185),
(3, 2000185),
(2, 2000186),
(3, 2000186),
(2, 2000187),
(3, 2000187),
(2, 2000188),
(3, 2000188),
(2, 2000189),
(3, 2000189),
(2, 2000190),
(3, 2000190),
(2, 2000191),
(3, 2000191),
(2, 2000192),
(3, 2000192),
(2, 2000193),
(3, 2000193),
(2, 2000194),
(3, 2000194),
(6, 2000194),
(2, 2000195),
(3, 2000195),
(6, 2000195),
(2, 2000196),
(3, 2000196),
(6, 2000196),
(2, 2000197),
(3, 2000197),
(6, 2000197),
(2, 2000198),
(3, 2000198),
(6, 2000198),
(2, 2000199),
(3, 2000199),
(6, 2000199),
(2, 2000200),
(3, 2000200),
(6, 2000200),
(2, 2000201),
(3, 2000201),
(6, 2000201),
(2, 2000202),
(3, 2000202),
(6, 2000202),
(2, 2000203),
(3, 2000203),
(6, 2000203),
(2, 2000204),
(3, 2000204),
(2, 2000205),
(3, 2000205),
(2, 2000206),
(3, 2000206),
(2, 2000207),
(3, 2000207),
(2, 2000208),
(3, 2000208),
(2, 2000209),
(3, 2000209),
(2, 2000210),
(3, 2000210),
(2, 2000211),
(3, 2000211),
(2, 2000212),
(3, 2000212),
(2, 2000213),
(3, 2000213),
(2, 2000214),
(3, 2000214),
(2, 2000215),
(3, 2000215),
(2, 2000216),
(3, 2000216),
(2, 2000217),
(2, 2000218),
(2, 2000219),
(2, 2000220),
(2, 2000221),
(2, 2000222),
(2, 2000223),
(2, 2000224),
(2, 2000225),
(2, 2000226),
(2, 2000227),
(2, 2000228),
(2, 2000229),
(2, 2000230),
(2, 2000231),
(2, 2000232),
(2, 2000233),
(2, 2000234),
(2, 2000235),
(2, 2000236),
(2, 2000237),
(2, 2000238),
(2, 2000239),
(2, 2000240),
(2, 2000241),
(2, 2000242),
(2, 2000243),
(2, 2000244),
(5, 2000244),
(2, 2000245),
(5, 2000245),
(2, 2000246),
(5, 2000246),
(2, 2000247),
(5, 2000247),
(2, 2000248),
(5, 2000248),
(2, 2000249),
(5, 2000249),
(2, 2000250),
(5, 2000250),
(2, 2000251),
(5, 2000251),
(2, 2000252),
(5, 2000252),
(2, 2000253),
(5, 2000253),
(2, 2000254),
(2, 2000255),
(2, 2000256),
(2, 2000257),
(2, 2000258),
(2, 2000259),
(2, 2000260),
(2, 2000261),
(2, 2000262),
(2, 2000263),
(2, 2000264),
(2, 2000265),
(2, 2000266),
(2, 2000267),
(2, 2000268),
(2, 2000269),
(2, 2000270);

-- --------------------------------------------------------

--
-- Table structure for table `modul_gehoert_klausurnote`
--

CREATE TABLE `modul_gehoert_klausurnote` (
  `Modul_ID` int(32) NOT NULL,
  `Klausurnote_ID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modul_gehoert_klausurnote`
--

INSERT INTO `modul_gehoert_klausurnote` (`Modul_ID`, `Klausurnote_ID`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(1, 130),
(1, 131),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(1, 136),
(1, 137),
(1, 138),
(1, 139),
(1, 140),
(1, 141),
(1, 142),
(1, 143),
(1, 144),
(1, 145),
(1, 146),
(1, 147),
(1, 148),
(1, 149),
(1, 150),
(1, 151),
(1, 152),
(1, 153),
(1, 154),
(1, 155),
(1, 156),
(1, 157),
(1, 158),
(1, 159),
(1, 160),
(1, 161),
(1, 162),
(1, 163),
(1, 164),
(1, 165),
(1, 166),
(1, 167),
(1, 168),
(1, 169),
(1, 170),
(1, 171),
(1, 172),
(1, 173),
(1, 174),
(1, 175),
(1, 176),
(1, 177),
(1, 178),
(1, 179),
(1, 180),
(1, 181),
(1, 182),
(1, 183),
(1, 184),
(1, 185),
(1, 186),
(1, 187),
(1, 188),
(1, 189),
(1, 190),
(1, 191),
(1, 192),
(1, 193),
(1, 194),
(1, 195),
(1, 196),
(1, 197),
(1, 198),
(1, 199),
(1, 200),
(3, 201),
(3, 202),
(3, 203),
(3, 204),
(3, 205),
(3, 206),
(3, 207),
(3, 208),
(3, 209),
(3, 210),
(3, 211),
(3, 212),
(3, 213),
(3, 214),
(3, 215),
(3, 216),
(3, 217),
(3, 218),
(3, 219),
(3, 220),
(3, 221),
(3, 222),
(3, 223),
(3, 224),
(3, 225),
(3, 226),
(3, 227),
(3, 228),
(3, 229),
(3, 230),
(3, 231),
(3, 232),
(3, 233),
(3, 234),
(3, 235),
(3, 236),
(3, 237),
(3, 238),
(3, 239),
(3, 240),
(3, 241),
(3, 242),
(3, 243),
(3, 244),
(3, 245),
(3, 246),
(3, 247),
(3, 248),
(3, 249),
(3, 250),
(3, 251),
(3, 252),
(3, 253),
(3, 254),
(3, 255),
(3, 256),
(3, 257),
(3, 258),
(3, 259),
(3, 260),
(3, 261),
(3, 262),
(3, 263),
(3, 264),
(3, 265),
(3, 266),
(3, 267),
(3, 268),
(3, 269),
(3, 270),
(3, 271),
(3, 272),
(3, 273),
(3, 274),
(3, 275),
(3, 276),
(3, 277),
(3, 278),
(3, 279),
(3, 280),
(3, 281),
(3, 282),
(3, 283),
(3, 284),
(3, 285),
(3, 286),
(3, 287),
(3, 288),
(3, 289),
(3, 290),
(3, 291),
(3, 292),
(3, 293),
(3, 294),
(3, 295),
(3, 296),
(3, 297),
(3, 298),
(3, 299),
(3, 300),
(4, 301),
(4, 302),
(4, 303),
(4, 304),
(4, 305),
(4, 306),
(4, 307),
(4, 308),
(4, 309),
(4, 310),
(4, 311),
(4, 312),
(4, 313),
(4, 314),
(4, 315),
(4, 316),
(4, 317),
(4, 318),
(4, 319),
(4, 320),
(4, 321),
(4, 322),
(4, 323),
(4, 324),
(4, 325),
(4, 326),
(4, 327),
(4, 328),
(4, 329),
(4, 330),
(4, 331),
(4, 332),
(4, 333),
(4, 334),
(4, 335),
(4, 336),
(4, 337),
(4, 338),
(4, 339),
(4, 340),
(4, 341),
(4, 342),
(4, 343),
(4, 344),
(4, 345),
(4, 346),
(4, 347),
(4, 348),
(4, 349),
(4, 350),
(4, 351),
(4, 352),
(4, 353),
(4, 354),
(4, 355),
(4, 356),
(4, 357),
(4, 358),
(4, 359),
(4, 360),
(4, 361),
(4, 362),
(4, 363),
(4, 364),
(4, 365),
(4, 366),
(4, 367),
(4, 368),
(4, 369),
(4, 370),
(4, 371),
(4, 372),
(4, 373),
(4, 374),
(4, 375),
(4, 376),
(4, 377),
(4, 378),
(4, 379),
(4, 380),
(4, 381),
(4, 382),
(4, 383),
(4, 384),
(4, 385),
(4, 386),
(4, 387),
(4, 388),
(4, 389),
(4, 390),
(4, 391),
(4, 392),
(4, 393),
(4, 394),
(4, 395),
(4, 396),
(4, 397),
(4, 398),
(4, 399),
(4, 400),
(4, 401),
(4, 402),
(4, 403),
(5, 404),
(5, 405),
(5, 406),
(5, 407),
(5, 408),
(5, 409),
(5, 410),
(5, 411),
(5, 412),
(5, 413),
(5, 414),
(5, 415),
(5, 416),
(5, 417),
(5, 418),
(5, 419),
(5, 420),
(5, 421),
(5, 422),
(5, 423),
(5, 424),
(5, 425),
(5, 426),
(5, 427),
(5, 428),
(5, 429),
(5, 430),
(5, 431),
(5, 432),
(5, 433),
(5, 434),
(5, 435),
(5, 436),
(5, 437),
(5, 438),
(5, 439),
(5, 440),
(5, 441),
(5, 442),
(5, 443),
(5, 444),
(5, 445),
(5, 446),
(5, 447),
(5, 448),
(5, 449),
(5, 450),
(5, 451),
(5, 452),
(5, 453),
(5, 454),
(5, 455),
(5, 456),
(5, 457),
(5, 458),
(5, 459),
(5, 460),
(5, 461),
(5, 462),
(5, 463),
(5, 464),
(5, 465),
(5, 466),
(5, 467),
(5, 468),
(5, 469),
(5, 470),
(5, 471),
(5, 472),
(5, 473),
(5, 474),
(5, 475),
(5, 476),
(5, 477),
(5, 478),
(5, 479),
(5, 480),
(5, 481),
(5, 482),
(5, 483),
(5, 484),
(5, 485),
(5, 486),
(5, 487),
(5, 488),
(5, 489),
(5, 490),
(5, 491),
(5, 492),
(5, 493),
(5, 494),
(5, 495),
(5, 496),
(5, 497),
(5, 498),
(5, 499),
(5, 500),
(5, 501),
(5, 502),
(5, 503),
(5, 504),
(5, 505),
(5, 506),
(5, 507),
(5, 508),
(6, 509),
(6, 510),
(6, 511),
(6, 512),
(6, 513),
(6, 514),
(6, 515),
(6, 516),
(6, 517),
(6, 518),
(6, 519),
(6, 520),
(6, 521),
(6, 522),
(6, 523),
(6, 524),
(6, 525),
(6, 526),
(6, 527),
(6, 528),
(6, 529),
(6, 530),
(6, 531),
(6, 532),
(6, 533),
(6, 534),
(6, 535),
(6, 536),
(6, 537),
(6, 538),
(6, 539),
(6, 540),
(6, 541),
(6, 542),
(6, 543),
(6, 544),
(6, 545),
(6, 546),
(6, 547),
(6, 548),
(6, 549),
(6, 550),
(6, 551),
(6, 552),
(6, 553),
(6, 554),
(6, 555),
(6, 556),
(6, 557),
(6, 558),
(6, 559),
(6, 560),
(6, 561),
(6, 562),
(6, 563),
(6, 564),
(6, 565),
(6, 566),
(6, 567),
(6, 568),
(6, 569),
(6, 570),
(6, 571),
(6, 572),
(6, 573),
(6, 574),
(6, 575),
(6, 576),
(6, 577),
(6, 578);

-- --------------------------------------------------------

--
-- Table structure for table `modul_leitet_professor`
--

CREATE TABLE `modul_leitet_professor` (
  `ModulID` int(32) NOT NULL,
  `Professor_MarterikelNr` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modul_leitet_professor`
--

INSERT INTO `modul_leitet_professor` (`ModulID`, `Professor_MarterikelNr`) VALUES
(1, 2000007),
(3, 2000007),
(4, 2000007),
(5, 2000007),
(6, 2000007),
(2, 2000008),
(2, 2000009),
(3, 2000009),
(1, 2000010),
(4, 2000010),
(5, 2000011),
(6, 2000012);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `MarterikelNr` int(32) NOT NULL,
  `Buero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`MarterikelNr`, `Buero`) VALUES
(2000007, '25.12.O1.49'),
(2000008, '25.12.O2.49'),
(2000009, '25.12.O2.50'),
(2000010, '25.12.O2.56'),
(2000011, '25.12.O2.20'),
(2000012, '25.12.O3.21');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `MarterikelNr` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`MarterikelNr`) VALUES
(2000013),
(2000014),
(2000015),
(2000016),
(2000017),
(2000025),
(2000035),
(2000036),
(2000037),
(2000038),
(2000039),
(2000040),
(2000041),
(2000042),
(2000043),
(2000044),
(2000045),
(2000046),
(2000047),
(2000048),
(2000049),
(2000050),
(2000051),
(2000052),
(2000053),
(2000054),
(2000055),
(2000056),
(2000057),
(2000058),
(2000059),
(2000060),
(2000061),
(2000062),
(2000063),
(2000064);

-- --------------------------------------------------------

--
-- Table structure for table `uebung`
--

CREATE TABLE `uebung` (
  `UebungsID` int(32) NOT NULL,
  `ModulID` int(32) NOT NULL,
  `Mitarbeiter_MarterikelNr` int(32) NOT NULL,
  `Bezeichnung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uebung`
--

INSERT INTO `uebung` (`UebungsID`, `ModulID`, `Mitarbeiter_MarterikelNr`, `Bezeichnung`) VALUES
(2, 1, 2000002, 'PratischeÜbung JAVA-Programm'),
(3, 2, 2000001, 'Theritische Informatik II'),
(5, 3, 2000003, 'Theritische Übung von Programmierpraktikum '),
(6, 4, 2000004, 'Übungen von Informatik III '),
(7, 5, 2000005, 'Übungen von Informatik IV'),
(8, 6, 2000006, 'Übungen von C Projekt');

-- --------------------------------------------------------

--
-- Table structure for table `uebungsblaetter`
--

CREATE TABLE `uebungsblaetter` (
  `UebungsblatterID` int(32) NOT NULL,
  `UebungsID` int(32) NOT NULL,
  `UebungsNr` int(32) NOT NULL,
  `Anzahl_der_Aufgabe` int(8) NOT NULL,
  `Deadline` varchar(32) DEFAULT NULL,
  `Ausgabedatum` int(11) NOT NULL,
  `Datein` varchar(225) NOT NULL,
  `GesamtePunkte` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uebungsblaetter`
--

INSERT INTO `uebungsblaetter` (`UebungsblatterID`, `UebungsID`, `UebungsNr`, `Anzahl_der_Aufgabe`, `Deadline`, `Ausgabedatum`, `Datein`, `GesamtePunkte`) VALUES
(69, 2, 2, 5, '22.12.2018, 22:16', 1544994600, '../../Uebung/Uebungsblaetter/Modul1/UebungsID2/Übungsblatt2.pdf', 25),
(70, 2, 3, 5, '30.12.2018, 14:22', 1544994616, '../../Uebung/Uebungsblaetter/Modul1/UebungsID2/Übungsblatt3.pdf', 25),
(71, 3, 1, 4, '11.12.2018, 23:53', 1544994686, '../../Uebung/Uebungsblaetter/Modul2/UebungsID3/Übungsblatt1.pdf', 25),
(72, 3, 2, 5, '13.12.2018, 23:53', 1544994697, '../../Uebung/Uebungsblaetter/Modul2/UebungsID3/Übungsblatt2.pdf', 25),
(73, 3, 3, 4, '28.12.2018, 23:53', 1544994711, '../../Uebung/Uebungsblaetter/Modul2/UebungsID3/Übungsblatt3.pdf', 25),
(76, 5, 1, 4, NULL, 1544994824, '../../Uebung/Uebungsblaetter/Modul3/UebungsID5/Übungsblatt1.pdf', 25),
(77, 5, 2, 5, NULL, 1544994837, '../../Uebung/Uebungsblaetter/Modul3/UebungsID5/Übungsblatt2.pdf', 25),
(78, 6, 1, 5, NULL, 1544994863, '../../Uebung/Uebungsblaetter/Modul4/UebungsID6/Übungsblatt1.pdf', 25),
(79, 6, 2, 5, NULL, 1544994876, '../../Uebung/Uebungsblaetter/Modul4/UebungsID6/Übungsblatt2.pdf', 25),
(80, 7, 1, 5, NULL, 1544994908, '../../Uebung/Uebungsblaetter/Modul5/UebungsID7/Übungsblatt1.pdf', 25),
(81, 7, 2, 5, NULL, 1544994919, '../../Uebung/Uebungsblaetter/Modul5/UebungsID7/Übungsblatt2.pdf', 28),
(82, 8, 1, 4, NULL, 1544994943, '../../Uebung/Uebungsblaetter/Modul6/UebungsID8/Übungsblatt1.pdf', 25),
(83, 8, 2, 5, NULL, 1544994953, '../../Uebung/Uebungsblaetter/Modul6/UebungsID8/Übungsblatt2.pdf', 25),
(84, 8, 3, 5, NULL, 1544994973, '../../Uebung/Uebungsblaetter/Modul6/UebungsID8/Übungsblatt3.pdf', 25),
(86, 3, 4, 5, '27.12.2018, 23:53', 1545042416, '../../Uebung/Uebungsblaetter/Modul2/UebungsID3/Übungsblatt4.pdf', 25),
(87, 2, 4, 4, '', 1545140274, '../../Uebung/Uebungsblaetter/Modul1/UebungsID2/Übungsblatt4.pdf', 25),
(88, 2, 5, 4, '29.12.2018, 22:24', 1545151313, '../../Uebung/Uebungsblaetter/Modul1/UebungsID2/Übungsblatt5.pdf', 25),
(89, 2, 6, 4, '01.01.2019, 00:00', 1545169667, '../../Uebung/Uebungsblaetter/Modul1/UebungsID2/Übungsblatt6.pdf', 25),
(98, 2, 6, 4, '20.12.2018, 23:35', 1545518166, '../../Uebung/Uebungsblaetter/Modul1/UebungsID2/Übungsblatt6.pdf', 25);

-- --------------------------------------------------------

--
-- Table structure for table `uebungsgruppe`
--

CREATE TABLE `uebungsgruppe` (
  `UebungsgruppeID` int(32) NOT NULL,
  `UebungsID` int(32) NOT NULL,
  `Tutor_MarterikelNr` int(32) NOT NULL,
  `Anzahl_der_Personen` int(32) DEFAULT NULL,
  `GruppenNr` int(32) NOT NULL,
  `Max_Person` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uebungsgruppe`
--

INSERT INTO `uebungsgruppe` (`UebungsgruppeID`, `UebungsID`, `Tutor_MarterikelNr`, `Anzahl_der_Personen`, `GruppenNr`, `Max_Person`) VALUES
(8, 2, 2000036, 2, 1, 20),
(9, 2, 2000037, 2, 2, 20),
(14, 3, 2000042, 2, 1, 20),
(18, 5, 2000046, 2, 1, 20),
(19, 5, 2000047, 2, 2, 20),
(20, 5, 2000048, 2, 3, 20),
(21, 5, 2000049, 2, 4, 20),
(22, 6, 2000050, 2, 1, 20),
(23, 6, 2000051, 2, 2, 20),
(24, 6, 2000052, 2, 3, 20),
(25, 6, 2000053, 2, 4, 20),
(26, 7, 2000054, 2, 1, 20),
(27, 7, 2000055, 2, 2, 20),
(28, 7, 2000056, 2, 3, 20),
(29, 7, 2000057, 2, 4, 20),
(30, 8, 2000058, 2, 1, 20),
(31, 8, 2000059, 2, 2, 20),
(32, 8, 2000060, 2, 3, 20),
(33, 8, 2000061, 2, 4, 20),
(34, 8, 2000062, 2, 5, 20),
(35, 8, 2000063, 2, 6, 20),
(36, 8, 2000064, 2, 7, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abgabe`
--
ALTER TABLE `abgabe`
  ADD PRIMARY KEY (`AbgabeID`),
  ADD KEY `Benutzer-MarterikelNr` (`Benutzer_MarterikelNr`),
  ADD KEY `Korrektor-MarterikelNr` (`Korrektor_MarterikelNr`),
  ADD KEY `UebungsblaetterID` (`UebungsblaetterID`);

--
-- Indexes for table `anzahl_des_benutzers`
--
ALTER TABLE `anzahl_des_benutzers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`MarterikelNr`),
  ADD KEY `MarterikelNr` (`MarterikelNr`),
  ADD KEY `MarterikelNr_2` (`MarterikelNr`),
  ADD KEY `MarterikelNr_3` (`MarterikelNr`),
  ADD KEY `MarterikelNr_4` (`MarterikelNr`),
  ADD KEY `MarterikelNr_5` (`MarterikelNr`),
  ADD KEY `MarterikelNr_6` (`MarterikelNr`),
  ADD KEY `MarterikelNr_7` (`MarterikelNr`),
  ADD KEY `MarterikelNr_8` (`MarterikelNr`),
  ADD KEY `MarterikelNr_9` (`MarterikelNr`),
  ADD KEY `MarterikelNr_10` (`MarterikelNr`),
  ADD KEY `MarterikelNr_11` (`MarterikelNr`);

--
-- Indexes for table `benutzer_anmelden_klausur`
--
ALTER TABLE `benutzer_anmelden_klausur`
  ADD PRIMARY KEY (`Benutzer_MarterikelNr`,`KlausurID`),
  ADD KEY `Klausur-ID` (`KlausurID`);

--
-- Indexes for table `benutzer_teilnimmt_uebungsgruppe`
--
ALTER TABLE `benutzer_teilnimmt_uebungsgruppe`
  ADD PRIMARY KEY (`Benuter_MarterikelNr`,`UebungsgruppeID`),
  ADD KEY `Übungsgruppe-ID` (`UebungsgruppeID`);

--
-- Indexes for table `einzelaufgabe`
--
ALTER TABLE `einzelaufgabe`
  ADD PRIMARY KEY (`EinzelaufgabeID`),
  ADD KEY `Abgabe-ID` (`AbgabeID`),
  ADD KEY `Übungsblätter-ID` (`UebungsblaetterID`);

--
-- Indexes for table `klausur`
--
ALTER TABLE `klausur`
  ADD PRIMARY KEY (`KlausurID`),
  ADD KEY `Mitarbeiter-MarterikelNr` (`Mitarbeiter_MarterikelNr`),
  ADD KEY `Modul-ID` (`ModulID`);

--
-- Indexes for table `klausurnote`
--
ALTER TABLE `klausurnote`
  ADD PRIMARY KEY (`KlausurnoteID`),
  ADD KEY `Benutzer-MarterikelNr` (`Benutzer_MarterikelNr`),
  ADD KEY `Mitarbeiter-MarterikelNr` (`Mitarbeiter_MarterikelNr`),
  ADD KEY `ModulID` (`ModulID`);

--
-- Indexes for table `korrektor`
--
ALTER TABLE `korrektor`
  ADD PRIMARY KEY (`MarterikelNr`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD PRIMARY KEY (`MarterikelNr`),
  ADD KEY `MarterikelNr` (`MarterikelNr`),
  ADD KEY `MarterikelNr_2` (`MarterikelNr`),
  ADD KEY `MarterikelNr_3` (`MarterikelNr`),
  ADD KEY `MarterikelNr_4` (`MarterikelNr`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`ModulID`),
  ADD KEY `Modul-ID` (`ModulID`),
  ADD KEY `Modul-ID_2` (`ModulID`),
  ADD KEY `Modul-ID_3` (`ModulID`);

--
-- Indexes for table `modul_anmelden_benutzer`
--
ALTER TABLE `modul_anmelden_benutzer`
  ADD PRIMARY KEY (`ModulID`,`Benutzer_MarterikelNr`),
  ADD KEY `Benutzer-MarterikelNr` (`Benutzer_MarterikelNr`);

--
-- Indexes for table `modul_gehoert_klausurnote`
--
ALTER TABLE `modul_gehoert_klausurnote`
  ADD PRIMARY KEY (`Modul_ID`,`Klausurnote_ID`),
  ADD KEY `Klausurnote-ID` (`Klausurnote_ID`);

--
-- Indexes for table `modul_leitet_professor`
--
ALTER TABLE `modul_leitet_professor`
  ADD PRIMARY KEY (`ModulID`,`Professor_MarterikelNr`),
  ADD KEY `Professor-MarterikelNr` (`Professor_MarterikelNr`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`MarterikelNr`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`MarterikelNr`);

--
-- Indexes for table `uebung`
--
ALTER TABLE `uebung`
  ADD PRIMARY KEY (`UebungsID`),
  ADD KEY `Mitarbeiter-MarterikelNr` (`Mitarbeiter_MarterikelNr`),
  ADD KEY `Modul-ID` (`ModulID`);

--
-- Indexes for table `uebungsblaetter`
--
ALTER TABLE `uebungsblaetter`
  ADD PRIMARY KEY (`UebungsblatterID`),
  ADD KEY `Übungs-ID` (`UebungsID`);

--
-- Indexes for table `uebungsgruppe`
--
ALTER TABLE `uebungsgruppe`
  ADD PRIMARY KEY (`UebungsgruppeID`),
  ADD KEY `Übungs-ID` (`UebungsID`),
  ADD KEY `Tutor-MarterikelNr` (`Tutor_MarterikelNr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abgabe`
--
ALTER TABLE `abgabe`
  MODIFY `AbgabeID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anzahl_des_benutzers`
--
ALTER TABLE `anzahl_des_benutzers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `einzelaufgabe`
--
ALTER TABLE `einzelaufgabe`
  MODIFY `EinzelaufgabeID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klausur`
--
ALTER TABLE `klausur`
  MODIFY `KlausurID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `klausurnote`
--
ALTER TABLE `klausurnote`
  MODIFY `KlausurnoteID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=580;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `ModulID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `uebung`
--
ALTER TABLE `uebung`
  MODIFY `UebungsID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `uebungsblaetter`
--
ALTER TABLE `uebungsblaetter`
  MODIFY `UebungsblatterID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `uebungsgruppe`
--
ALTER TABLE `uebungsgruppe`
  MODIFY `UebungsgruppeID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abgabe`
--
ALTER TABLE `abgabe`
  ADD CONSTRAINT `abgabe_ibfk_1` FOREIGN KEY (`Benutzer_MarterikelNr`) REFERENCES `benutzer` (`marterikelnr`),
  ADD CONSTRAINT `abgabe_ibfk_2` FOREIGN KEY (`Korrektor_MarterikelNr`) REFERENCES `korrektor` (`marterikelnr`),
  ADD CONSTRAINT `abgabe_ibfk_3` FOREIGN KEY (`UebungsblaetterID`) REFERENCES `uebungsblaetter` (`uebungsblatterid`);

--
-- Constraints for table `benutzer_anmelden_klausur`
--
ALTER TABLE `benutzer_anmelden_klausur`
  ADD CONSTRAINT `benutzer_anmelden_klausur_ibfk_1` FOREIGN KEY (`Benutzer_MarterikelNr`) REFERENCES `benutzer` (`marterikelnr`),
  ADD CONSTRAINT `benutzer_anmelden_klausur_ibfk_2` FOREIGN KEY (`KlausurID`) REFERENCES `klausur` (`KlausurID`);

--
-- Constraints for table `benutzer_teilnimmt_uebungsgruppe`
--
ALTER TABLE `benutzer_teilnimmt_uebungsgruppe`
  ADD CONSTRAINT `benutzer_teilnimmt_uebungsgruppe_ibfk_1` FOREIGN KEY (`Benuter_MarterikelNr`) REFERENCES `benutzer` (`marterikelnr`),
  ADD CONSTRAINT `benutzer_teilnimmt_uebungsgruppe_ibfk_2` FOREIGN KEY (`UebungsgruppeID`) REFERENCES `uebungsgruppe` (`UebungsgruppeID`);

--
-- Constraints for table `einzelaufgabe`
--
ALTER TABLE `einzelaufgabe`
  ADD CONSTRAINT `einzelaufgabe_ibfk_1` FOREIGN KEY (`AbgabeID`) REFERENCES `abgabe` (`AbgabeID`);

--
-- Constraints for table `klausur`
--
ALTER TABLE `klausur`
  ADD CONSTRAINT `klausur_ibfk_1` FOREIGN KEY (`Mitarbeiter_MarterikelNr`) REFERENCES `mitarbeiter` (`marterikelnr`),
  ADD CONSTRAINT `klausur_ibfk_2` FOREIGN KEY (`ModulID`) REFERENCES `modul` (`ModulID`);

--
-- Constraints for table `klausurnote`
--
ALTER TABLE `klausurnote`
  ADD CONSTRAINT `klausurnote_ibfk_1` FOREIGN KEY (`Benutzer_MarterikelNr`) REFERENCES `benutzer` (`marterikelnr`),
  ADD CONSTRAINT `klausurnote_ibfk_2` FOREIGN KEY (`Mitarbeiter_MarterikelNr`) REFERENCES `mitarbeiter` (`marterikelnr`),
  ADD CONSTRAINT `klausurnote_ibfk_3` FOREIGN KEY (`ModulID`) REFERENCES `modul` (`modulid`);

--
-- Constraints for table `korrektor`
--
ALTER TABLE `korrektor`
  ADD CONSTRAINT `korrektor_ibfk_1` FOREIGN KEY (`MarterikelNr`) REFERENCES `benutzer` (`marterikelnr`);

--
-- Constraints for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD CONSTRAINT `mitarbeiter_ibfk_1` FOREIGN KEY (`MarterikelNr`) REFERENCES `benutzer` (`marterikelnr`);

--
-- Constraints for table `modul_anmelden_benutzer`
--
ALTER TABLE `modul_anmelden_benutzer`
  ADD CONSTRAINT `modul_anmelden_benutzer_ibfk_1` FOREIGN KEY (`ModulID`) REFERENCES `modul` (`ModulID`),
  ADD CONSTRAINT `modul_anmelden_benutzer_ibfk_2` FOREIGN KEY (`Benutzer_MarterikelNr`) REFERENCES `benutzer` (`marterikelnr`);

--
-- Constraints for table `modul_leitet_professor`
--
ALTER TABLE `modul_leitet_professor`
  ADD CONSTRAINT `modul_leitet_professor_ibfk_1` FOREIGN KEY (`ModulID`) REFERENCES `modul` (`ModulID`),
  ADD CONSTRAINT `modul_leitet_professor_ibfk_2` FOREIGN KEY (`Professor_MarterikelNr`) REFERENCES `professor` (`marterikelnr`);

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`MarterikelNr`) REFERENCES `benutzer` (`marterikelnr`);

--
-- Constraints for table `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`MarterikelNr`) REFERENCES `benutzer` (`marterikelnr`);

--
-- Constraints for table `uebung`
--
ALTER TABLE `uebung`
  ADD CONSTRAINT `uebung_ibfk_1` FOREIGN KEY (`Mitarbeiter_MarterikelNr`) REFERENCES `mitarbeiter` (`marterikelnr`),
  ADD CONSTRAINT `uebung_ibfk_2` FOREIGN KEY (`ModulID`) REFERENCES `modul` (`ModulID`);

--
-- Constraints for table `uebungsblaetter`
--
ALTER TABLE `uebungsblaetter`
  ADD CONSTRAINT `uebungsblaetter_ibfk_1` FOREIGN KEY (`UebungsID`) REFERENCES `uebung` (`UebungsID`);

--
-- Constraints for table `uebungsgruppe`
--
ALTER TABLE `uebungsgruppe`
  ADD CONSTRAINT `uebungsgruppe_ibfk_1` FOREIGN KEY (`UebungsID`) REFERENCES `uebung` (`UebungsID`),
  ADD CONSTRAINT `uebungsgruppe_ibfk_2` FOREIGN KEY (`Tutor_MarterikelNr`) REFERENCES `tutor` (`marterikelnr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
