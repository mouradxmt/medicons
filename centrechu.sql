-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2019 at 12:17 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `centrechu`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `numeroConsultation` int(255) NOT NULL,
  `dateConsultation` date DEFAULT NULL,
  `IP` int(32) NOT NULL,
  `codeMedecin` int(32) DEFAULT NULL,
  `etatConsultation` text NOT NULL,
  `journalCliniqueConsultation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`numeroConsultation`, `dateConsultation`, `IP`, `codeMedecin`, `etatConsultation`, `journalCliniqueConsultation`) VALUES
(1, '2090-12-30', 2, 2, 'Attente', 'En attente ...'),
(2, '2090-12-30', 1, 1, 'gaw', 'En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum En attente ... Lorem ipsum'),
(7, '2019-07-25', 3, 1, 'Attente', 'En attente...'),
(8, '2019-07-25', 6, 1, 'Attente', 'En attente...'),
(10, '2020-12-05', 6, 2, 'Attente', 'En attente...'),
(11, '2019-08-29', 7, 1, 'Confirme', 'Merci Mery , Tu n&#39;est pas malade');

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

CREATE TABLE `medecin` (
  `codeMedecin` int(32) NOT NULL,
  `nomMedecin` varchar(32) NOT NULL,
  `prenomMedecin` varchar(32) NOT NULL,
  `codeService` varchar(32) NOT NULL,
  `userId` int(50) NOT NULL,
  `sexeMedecin` varchar(50) NOT NULL,
  `adresseMedecin` varchar(255) NOT NULL,
  `dateNaissanceMedecin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`codeMedecin`, `nomMedecin`, `prenomMedecin`, `codeService`, `userId`, `sexeMedecin`, `adresseMedecin`, `dateNaissanceMedecin`) VALUES
(1, 'MERNOU', 'Safae', 'NEURO', 12, 'F', 'Somewhere in a place', '2019-07-20'),
(2, 'AHMADI', 'Ayoub', 'PEDO', 15, 'M', 'Chi blassa je sais pas ou', '2019-07-20'),
(3, 'Someone', 'Doctor', 'NEURO', 14, 'F', 'grwegergerwgwr', '2018-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `IP` int(16) NOT NULL,
  `nomPatient` varchar(32) NOT NULL,
  `prenomPatient` varchar(32) NOT NULL,
  `sexePatient` varchar(32) NOT NULL,
  `adressePatient` varchar(255) NOT NULL,
  `dateNaissancePatient` date NOT NULL,
  `userId` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`IP`, `nomPatient`, `prenomPatient`, `sexePatient`, `adressePatient`, `dateNaissancePatient`, `userId`) VALUES
(1, 'ALAMI', 'Ahmed', 'M', 'Somewhere in a place', '1998-07-15', 17),
(2, 'MANSOURI', 'Amine', 'M', 'Chiblassa in anywhere', '2001-03-02', 16),
(3, 'ALANSARI', 'Sarah', 'F', 'In Tokyo st.98', '2019-07-16', 10),
(6, 'Mtouaa', 'mourad', 'M', 'wwewrw', '1998-05-05', 12),
(7, 'aaaa', 'bbbb', 'F', 'aaaaaa', '2019-08-04', 21),
(8, 'monNom', 'monPrenom', 'M', 'Somewhere near Rte IDK. app. 5', '1921-01-01', 23);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `codeService` varchar(50) NOT NULL,
  `nomService` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`codeService`, `nomService`) VALUES
('CARDIO', 'Cardiologie'),
('GYNECO', 'Gynecologie'),
('NEPHRO', 'Nephrologie'),
('NEURO', 'Neurologie'),
('PEDO', 'Pedologie'),
('PNEUMO', 'Pneumologie'),
('URO', 'Urologie');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `state` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `state`) VALUES
(10, 'klj@gmail.com', '$2y$10$RT2Gq1MffyaV3rX8kwaUBe47yenU2lSUDjF3VURAUYdGrYuq5YxMi', 'patient', ''),
(12, 'sa@gmail.com', '$2y$10$BkQEcJkQoRe/pehGWdCq3uBPRNXDeA6x8DyRIF2iqxFNmTedDweHe', 'medecin', 'complet'),
(13, 'mourad@gmail.com', '$2y$10$x8NzMjezQimeY0hiNVGIE.bGhdcW.MDvLOTA1.ZnsEbuA4tWgmfQq', 'admin', 'incomplet'),
(14, 'safae@gmail.com', '$2y$10$UUqMvl.nsRW3v12HlXY0NueCh5u6CCi.xfHwatDEV2yJ43Hs3ESU6', 'medecin', 'complet'),
(15, 'ayoub@gmail.com', '$2y$10$x8NzMjezQimeY0hiNVGIE.bGhdcW.MDvLOTA1.ZnsEbuA4tWgmfQq', 'medecin', 'incomplet'),
(16, 'amine@gmail.com', '$2y$10$x8NzMjezQimeY0hiNVGIE.bGhdcW.MDvLOTA1.ZnsEbuA4tWgmfQq', 'patient', 'incomplet'),
(17, 'ahmed@gmail.com', '$2y$10$UUqMvl.nsRW3v12HlXY0NueCh5u6CCi.xfHwatDEV2yJ43Hs3ESU6', 'patient', 'incomplet'),
(18, 'hlki@gmail.com', '$2y$10$3QZ7HykCiheHXLn0zo9WBeFdf8AHtDB/jN1s0QZfbW/FvQsMilYyS', 'patient', 'incomplet'),
(19, 'admin@gmail.com', '$2y$10$UUqMvl.nsRW3v12HlXY0NueCh5u6CCi.xfHwatDEV2yJ43Hs3ESU6', 'admin', 'complet'),
(20, 'siham@gmail.com', '$2y$10$bnXMUUWMAIoc44pNoVz4BOvJyI8vIX8WD4G2wLvqTkOfN.yiNsYH6', 'medecin', 'incomplet'),
(21, 'aaaaa@gmail.com', '$2y$10$00ZUDnlzt5QqfW1Bi43DD.vVymy/qUvyZ31AoPeCl.xd9dPT5s6kG', 'patient', 'complet'),
(22, 'admin@gmail.com', '$2y$10$BkQEcJkQoRe/pehGWdCq3uBPRNXDeA6x8DyRIF2iqxFNmTedDweHe', 'admin', 'complet'),
(23, 'patient@gmail.com', '$2y$10$DYA32x8VlYXZz9SgFytSUunqWvsr5QcKxYTrrvVLoqw.dAQqgFEZi', 'patient', 'complet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`numeroConsultation`),
  ADD KEY `Code` (`codeMedecin`),
  ADD KEY `IP` (`IP`);

--
-- Indexes for table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`codeMedecin`),
  ADD KEY `Code_Service` (`codeService`),
  ADD KEY `FK_medecin_users` (`userId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`IP`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`codeService`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `numeroConsultation` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `codeMedecin` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `IP` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `FK_consultation_medecin` FOREIGN KEY (`codeMedecin`) REFERENCES `medecin` (`codeMedecin`),
  ADD CONSTRAINT `FK_consultation_patient` FOREIGN KEY (`IP`) REFERENCES `patient` (`IP`);

--
-- Constraints for table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `FK_medecin_service` FOREIGN KEY (`codeService`) REFERENCES `service` (`codeService`),
  ADD CONSTRAINT `FK_medecin_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `FK_patient_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
