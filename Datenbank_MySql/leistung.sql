-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2018 at 12:20 PM
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
(2000001, 'jogi.loew@hhu.de', '$2y$13$dpgf4MjTMYNaOA1I4.1efe9uhQnIK7krHrHOTdkIWVBlrCh5E90me', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Jogi', 'Löw', 1442998314, 1442998314, 'jolw201', '*', ''),
(2000002, 'klarissa.wolf@hhu.de', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Klarissa', 'Wolf', 1442998314, 1442998314, 'klawo202', '', ''),
(2000003, 'kim.akers@hhu.de', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Kim', 'Akers', 1442998314, 1442998314, 'kiake203', '', ''),
(2000004, 'andy.brauninger@hhu.de', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Andy', 'Brauninger', 1442998314, 1442998314, 'anbra204', '', ''),
(2000005, 'saisai@hhu.com', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'saiyinwuchari', 'saiyinwuchari', 1442998314, 1442998314, 'sasai205', '', ''),
(2000006, 'maggi.carttido@hhu.de', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Maggi', 'Carttido', 1442998314, 1442998314, 'magca206', '', ''),
(2000007, 'alex.darrow@hhu.de', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Alex', 'Darrow', 1442998314, 1442998314, 'aldar207', '', ''),
(2000008, 'qin.ying@hhu.de', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Qin', 'Ying', 1442998314, 1442998314, 'qying208', '', ''),
(2000009, 'qiyhi.gao@hhu.de', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Qizhi', 'Gao', 1442998314, 1442998314, 'qzgao209', '', ''),
(2000010, 'siwei.liu@hhu.de', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', 'Siwe', 'Liu', 1442998314, 1442998314, 'swliu210', '', '');

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
(2000010, '24.12.U1.52');

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
(2000002, '25.12.O1.49'),
(2000009, '25.12.O2.49');

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
(2000003);

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
  MODIFY `UebungsID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uebungsblaetter`
--
ALTER TABLE `uebungsblaetter`
  MODIFY `UebungsblatterID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uebungsgruppe`
--
ALTER TABLE `uebungsgruppe`
  MODIFY `UebungsgruppeID` int(32) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abgabe`
--
ALTER TABLE `abgabe`
  ADD CONSTRAINT `abgabe_ibfk_1` FOREIGN KEY (`Benutzer_MarterikelNr`) REFERENCES `benutzer` (`MarterikelNr`),
  ADD CONSTRAINT `abgabe_ibfk_2` FOREIGN KEY (`Korrektor_MarterikelNr`) REFERENCES `korrektor` (`marterikelnr`);

--
-- Constraints for table `benutzer_anmelden_klausur`
--
ALTER TABLE `benutzer_anmelden_klausur`
  ADD CONSTRAINT `benutzer_anmelden_klausur_ibfk_1` FOREIGN KEY (`Benutzer_MarterikelNr`) REFERENCES `benutzer` (`MarterikelNr`),
  ADD CONSTRAINT `benutzer_anmelden_klausur_ibfk_2` FOREIGN KEY (`KlausurID`) REFERENCES `klausur` (`KlausurID`);

--
-- Constraints for table `benutzer_teilnimmt_uebungsgruppe`
--
ALTER TABLE `benutzer_teilnimmt_uebungsgruppe`
  ADD CONSTRAINT `benutzer_teilnimmt_uebungsgruppe_ibfk_1` FOREIGN KEY (`Benuter_MarterikelNr`) REFERENCES `benutzer` (`MarterikelNr`),
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
  ADD CONSTRAINT `klausurnote_ibfk_1` FOREIGN KEY (`Benutzer_MarterikelNr`) REFERENCES `benutzer` (`MarterikelNr`),
  ADD CONSTRAINT `klausurnote_ibfk_2` FOREIGN KEY (`Mitarbeiter_MarterikelNr`) REFERENCES `mitarbeiter` (`marterikelnr`);

--
-- Constraints for table `korrektor`
--
ALTER TABLE `korrektor`
  ADD CONSTRAINT `korrektor_ibfk_1` FOREIGN KEY (`MarterikelNr`) REFERENCES `benutzer` (`MarterikelNr`);

--
-- Constraints for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD CONSTRAINT `mitarbeiter_ibfk_1` FOREIGN KEY (`MarterikelNr`) REFERENCES `benutzer` (`MarterikelNr`);

--
-- Constraints for table `modul_anmelden_benutzer`
--
ALTER TABLE `modul_anmelden_benutzer`
  ADD CONSTRAINT `modul_anmelden_benutzer_ibfk_1` FOREIGN KEY (`ModulID`) REFERENCES `modul` (`ModulID`),
  ADD CONSTRAINT `modul_anmelden_benutzer_ibfk_2` FOREIGN KEY (`Benutzer_MarterikelNr`) REFERENCES `benutzer` (`MarterikelNr`);

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
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`MarterikelNr`) REFERENCES `benutzer` (`MarterikelNr`);

--
-- Constraints for table `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`MarterikelNr`) REFERENCES `benutzer` (`MarterikelNr`);

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
