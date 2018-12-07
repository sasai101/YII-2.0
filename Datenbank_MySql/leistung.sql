-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2018 at 03:20 PM
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
  `GesamtePunkt` int(32) DEFAULT NULL
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
(2000001, 'jogi.loew@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Jogi', 'Löw', 1442998314, 1543951436, 'jolw201', '*', '../../profiefoto/2000001.jpg'),
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
(2000013, 'ssasasa.sssss@hhu.de', '$2y$13$AmlKI0.B9jpCLTu3twxlxOSkJ9jgo3BvK8M07jZlEMCXqJBI9gJRG', NULL, '3xwbm6cS5nRQgo47yHNKq6SvVv6Q77QI', 'ssasasaaa', 'ssssss', 1543923603, 1543923960, 'ssss213', '*', '../../profiefoto/normal.jpg'),
(2000014, 'ssasasaaa.sadfsdaf@hhu.de', '$2y$13$X.uLRZ3R/sZEroYgSgk/dOWSG2MOi0xN/2r73qQpUCF9jHjXpJ2km', NULL, '7EZ-de823ZI9pYIIjsFjcvpMDVZ0SBzR', 'ssasasaaa', 'sadfsdaf', 1543925277, 1543925277, 'sasasa214', '*', '../../profiefoto/normal.jpg'),
(2000015, 'wuchariqwe.wuchariewq@hhu.de', '$2y$13$O9gW/D.HgiByGZ.EUZa.7uqy1dTezatQS7jcPzANjQXqgWVWdRcZS', NULL, 'O2MLX6IsEw1M9yez0a5WzXuctXVjb0yg', 'wuchariqwe', 'wuchariewq', 1543927459, 1543927459, 'qwe215', '*', '../../profiefoto/normal.jpg'),
(2000016, 'wang.dajun@hhu.de', '$2y$13$1TDtrYd/.Qhw9rE1kGe.ZeSCeMhXZUxotrLfyrChDO0cynHpOy8VK', NULL, 'CDyq4Rjc9TNRedo1PCkzo5nan4YoPFyn', 'wang', 'dajun', 1543927710, 1543927710, 'wang2016', '*', '../../profiefoto/normal.jpg'),
(2000017, 'sheng.daweii@hhu.de', '$2y$13$UNSNSF/IqJGGoeJ8UkpUQOX6PnhcuOKPhRevFN.2WXKuE2scoewni', '', '7d9imS8AzJY4GLuDh1bCNNjcKucQPbR5', 'sheng', 'daweii', 1543929368, 1543929368, 'dawei217', '*', '../../profiefoto/normal.jpg'),
(2000025, 'Alexander.Marianna@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Alexander', 'Marianna', 1543929376, 1543929376, 'Alexander225', '*', '../../profiefoto/normal.jpg'),
(2000035, 'Felix.Marlen@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Felix', 'Marlen', 1543929386, 1543929386, 'Felix235', '*', '../../profiefoto/normal.jpg'),
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
(2000192, 'Am??lie.Jonte@hhu.de', '$2y$13$zadxFJJ7h3qs1AdS0BrdDOyGDoV8lFpPxa3ly/2fT7HCltgaYyFPG', '', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Am??lie', 'Jonte', 1543929543, 1543929543, 'Am??lie392', '*', '../../profiefoto/normal.jpg'),
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
  `punkt3_0` int(32) NOT NULL,
  `punkt3_3` int(32) NOT NULL,
  `punkt3_7` int(32) NOT NULL,
  `punkt4_0` int(32) NOT NULL,
  `punkt5_0` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `klausurnote`
--

CREATE TABLE `klausurnote` (
  `KlausurnoteID` int(32) NOT NULL,
  `Mitarbeiter_MarterikelNr` int(32) NOT NULL,
  `Benutzer_MarterikelNr` int(32) NOT NULL,
  `Note` int(32) DEFAULT NULL,
  `Bezeichnung` varchar(255) NOT NULL,
  `Punkt` double(32,0) NOT NULL,
  `KorregierteZeit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2000004);

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
  `Bezeichnung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`ModulID`, `Bezeichnung`) VALUES
(1, 'Informatik I (Grundl. der Softwareentw. & Programmierung)'),
(2, 'Informatik II (Grundlagen der technischen Informatik)\r'),
(3, 'Programmierpraktikum (evtl. erst im 4. FS)'),
(4, 'Informatik III (Grundl. der Algorithmen & Datenstrukturen)'),
(5, 'Informatik IV (Grundl. der Theoretischen Informatik)'),
(6, 'C-Projekt');

-- --------------------------------------------------------

--
-- Table structure for table `modul_anmelden_benutzer`
--

CREATE TABLE `modul_anmelden_benutzer` (
  `ModulID` int(32) NOT NULL,
  `Benutzer_MarterikelNr` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modul_gehoert_klausurnote`
--

CREATE TABLE `modul_gehoert_klausurnote` (
  `Modul_ID` int(32) NOT NULL,
  `Klausurnote_ID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modul_leitet_professor`
--

CREATE TABLE `modul_leitet_professor` (
  `ModulID` int(32) NOT NULL,
  `Professor_MarterikelNr` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 1, 2000001, 'Theritische Informatik I'),
(2, 1, 2000001, 'Pratische Übung, JAVA-Programm'),
(3, 2, 2000002, 'Informatik II (Grundlagen der technischen Informat...\r\nInformatik II (Grundlagen der technischen Informat...\r\n'),
(4, 2, 2000002, 'Pratische Übung, Assemble'),
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
  `Deadline` int(11) DEFAULT NULL,
  `Ausgabedatum` int(11) DEFAULT NULL,
  `Datein` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uebungsgruppe`
--

CREATE TABLE `uebungsgruppe` (
  `UebungsgruppeID` int(32) NOT NULL,
  `UebungsID` int(32) NOT NULL,
  `Tutor_MarterikelNr` int(32) NOT NULL,
  `Anzahl_der_Personen` int(32) NOT NULL,
  `GruppenNr` int(32) NOT NULL,
  `Max_Person` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uebungsgruppe`
--

INSERT INTO `uebungsgruppe` (`UebungsgruppeID`, `UebungsID`, `Tutor_MarterikelNr`, `Anzahl_der_Personen`, `GruppenNr`, `Max_Person`) VALUES
(1, 1, 2000013, 2, 1, 20),
(2, 1, 2000014, 2, 2, 20),
(3, 1, 2000015, 2, 3, 20),
(4, 1, 2000016, 2, 4, 20),
(5, 1, 2000017, 2, 5, 20),
(6, 2, 2000025, 2, 1, 20),
(7, 2, 2000035, 2, 2, 20),
(8, 2, 2000036, 2, 3, 20),
(9, 2, 2000037, 2, 4, 20),
(10, 3, 2000038, 2, 1, 20),
(11, 3, 2000039, 2, 2, 20),
(12, 3, 2000040, 2, 3, 20),
(13, 3, 2000041, 2, 4, 20),
(14, 4, 2000042, 2, 1, 20),
(15, 4, 2000043, 2, 2, 20),
(16, 4, 2000044, 2, 3, 20),
(17, 4, 2000045, 2, 4, 20),
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
  ADD KEY `Korrektor-MarterikelNr` (`Korrektor_MarterikelNr`);

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
  ADD KEY `Mitarbeiter-MarterikelNr` (`Mitarbeiter_MarterikelNr`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `einzelaufgabe`
--
ALTER TABLE `einzelaufgabe`
  MODIFY `EinzelaufgabeID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klausur`
--
ALTER TABLE `klausur`
  MODIFY `KlausurID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klausurnote`
--
ALTER TABLE `klausurnote`
  MODIFY `KlausurnoteID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `ModulID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uebung`
--
ALTER TABLE `uebung`
  MODIFY `UebungsID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uebungsblaetter`
--
ALTER TABLE `uebungsblaetter`
  MODIFY `UebungsblatterID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uebungsgruppe`
--
ALTER TABLE `uebungsgruppe`
  MODIFY `UebungsgruppeID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abgabe`
--
ALTER TABLE `abgabe`
  ADD CONSTRAINT `abgabe_ibfk_1` FOREIGN KEY (`Benutzer_MarterikelNr`) REFERENCES `benutzer` (`marterikelnr`),
  ADD CONSTRAINT `abgabe_ibfk_2` FOREIGN KEY (`Korrektor_MarterikelNr`) REFERENCES `korrektor` (`marterikelnr`);

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
  ADD CONSTRAINT `einzelaufgabe_ibfk_1` FOREIGN KEY (`AbgabeID`) REFERENCES `abgabe` (`AbgabeID`),
  ADD CONSTRAINT `einzelaufgabe_ibfk_2` FOREIGN KEY (`UebungsblaetterID`) REFERENCES `uebungsblaetter` (`UebungsblatterID`);

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
  ADD CONSTRAINT `klausurnote_ibfk_2` FOREIGN KEY (`Mitarbeiter_MarterikelNr`) REFERENCES `mitarbeiter` (`marterikelnr`);

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
-- Constraints for table `modul_gehoert_klausurnote`
--
ALTER TABLE `modul_gehoert_klausurnote`
  ADD CONSTRAINT `modul_gehoert_klausurnote_ibfk_1` FOREIGN KEY (`Modul_ID`) REFERENCES `modul` (`ModulID`),
  ADD CONSTRAINT `modul_gehoert_klausurnote_ibfk_2` FOREIGN KEY (`Klausurnote_ID`) REFERENCES `klausurnote` (`KlausurnoteID`);

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
