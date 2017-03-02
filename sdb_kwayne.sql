-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: dagobah.engr.scu.edu
-- Generation Time: Mar 01, 2017 at 05:48 PM
-- Server version: 5.5.40
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sdb_kwayne`
--

-- --------------------------------------------------------

--
-- Table structure for table `AwardsInfo`
--

CREATE TABLE IF NOT EXISTS `AwardsInfo` (
  `AwardId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `Administer` varchar(100) NOT NULL,
  `YearReceived` year(4) NOT NULL,
  `AwardTitle` varchar(100) NOT NULL,
  `AwardDescript` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`AwardId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `AwardsInfo`
--

INSERT INTO `AwardsInfo` (`AwardId`, `UserId`, `Administer`, `YearReceived`, `AwardTitle`, `AwardDescript`) VALUES
(1, 1, 'President Barack Obama', 2013, 'Presidential Scholar Award', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `EducationInfo`
--

CREATE TABLE IF NOT EXISTS `EducationInfo` (
  `EduId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `School` varchar(100) DEFAULT NULL,
  `YearStart` year(4) DEFAULT NULL,
  `YearEnd` year(4) DEFAULT NULL,
  `Major` varchar(100) DEFAULT NULL,
  `Major1` varchar(100) DEFAULT NULL,
  `Minor` varchar(100) DEFAULT NULL,
  `Minor1` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`EduId`),
  UNIQUE KEY `UserId` (`UserId`),
  KEY `UserId_2` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `EducationInfo`
--

INSERT INTO `EducationInfo` (`EduId`, `UserId`, `School`, `YearStart`, `YearEnd`, `Major`, `Major1`, `Minor`, `Minor1`) VALUES
(1, 1, 'Santa Clara University', 2000, 2000, 'Web Design Engineering', NULL, 'Computer Science Engineering', 'Studio Art');

-- --------------------------------------------------------

--
-- Table structure for table `ExperienceInfo`
--

CREATE TABLE IF NOT EXISTS `ExperienceInfo` (
  `ExpId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `Company` varchar(100) DEFAULT NULL,
  `YearStart` year(4) DEFAULT NULL,
  `YearEnd` year(4) DEFAULT NULL,
  `JobRole` varchar(100) DEFAULT NULL,
  `JobDescript` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ExpId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ExperienceInfo`
--

INSERT INTO `ExperienceInfo` (`ExpId`, `UserId`, `Company`, `YearStart`, `YearEnd`, `JobRole`, `JobDescript`) VALUES
(1, 1, 'Preemadonna', 2014, NULL, 'UI Engineer, Resident Artist, Product Manager', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `InterestsInfo`
--

CREATE TABLE IF NOT EXISTS `InterestsInfo` (
  `InterestId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `Interest` varchar(100) DEFAULT NULL,
  `Level` enum('1','2','3','4','5') DEFAULT NULL,
  PRIMARY KEY (`InterestId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `InterestsInfo`
--

INSERT INTO `InterestsInfo` (`InterestId`, `UserId`, `Interest`, `Level`) VALUES
(1, 1, 'Web', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ProjectsInfo`
--

CREATE TABLE IF NOT EXISTS `ProjectsInfo` (
  `ProjId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `Organization` varchar(100) DEFAULT NULL,
  `YearStart` year(4) DEFAULT NULL,
  `YearEnd` year(4) DEFAULT NULL,
  `ProjectRole` varchar(100) DEFAULT NULL,
  `ProjectDescription` varchar(300) DEFAULT NULL,
  `ProjectName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ProjId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ProjectsInfo`
--

INSERT INTO `ProjectsInfo` (`ProjId`, `UserId`, `Organization`, `YearStart`, `YearEnd`, `ProjectRole`, `ProjectDescription`, `ProjectName`) VALUES
(1, 1, 'Santa Clara U. Senior Project', 2016, NULL, 'DB Designer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Resumes`
--

CREATE TABLE IF NOT EXISTS `Resumes` (
  `ResumeId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `ResumeTypeId` enum('busn','engr','dsgn','nonp','cust') NOT NULL,
  `eduType` enum('text','timeline') NOT NULL DEFAULT 'text',
  `expType` enum('text','timeline') NOT NULL DEFAULT 'text',
  `intType` enum('text','pie','bar','donut') NOT NULL DEFAULT 'text',
  `projType` enum('text','timeline') NOT NULL DEFAULT 'text',
  `skillType` enum('text','pie','bar','donut') NOT NULL DEFAULT 'text',
  `volunType` enum('text','timeline') NOT NULL DEFAULT 'text',
  PRIMARY KEY (`ResumeId`),
  UNIQUE KEY `UserId` (`UserId`),
  UNIQUE KEY `ResumeTypeId` (`ResumeTypeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Resumes`
--

INSERT INTO `Resumes` (`ResumeId`, `UserId`, `ResumeTypeId`, `eduType`, `expType`, `intType`, `projType`, `skillType`, `volunType`) VALUES
(1, 1, 'dsgn', 'text', 'text', 'text', 'text', 'text', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `ResumeTypes`
--

CREATE TABLE IF NOT EXISTS `ResumeTypes` (
  `ResumeTypeId` enum('busn','engr','dsgn','nonp','cust') NOT NULL,
  `First` enum('edu','exp','volun','proj','int','skill') NOT NULL,
  `Second` enum('edu','exp','volun','proj','int','skill') NOT NULL,
  `Third` enum('edu','exp','volun','proj','int','skill') NOT NULL,
  `Fourth` enum('edu','exp','volun','proj','int','skill') NOT NULL,
  `Fifth` enum('edu','exp','volun','proj','int','skill') NOT NULL,
  `Sixth` enum('edu','exp','volun','proj','int','skill') NOT NULL,
  PRIMARY KEY (`ResumeTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ResumeTypes`
--

INSERT INTO `ResumeTypes` (`ResumeTypeId`, `First`, `Second`, `Third`, `Fourth`, `Fifth`, `Sixth`) VALUES
('busn', 'edu', 'exp', 'proj', 'volun', 'skill', 'int'),
('engr', 'skill', 'edu', 'proj', 'exp', 'volun', 'int'),
('dsgn', 'edu', 'proj', 'skill', 'exp', 'volun', 'int'),
('nonp', 'volun', 'proj', 'exp', 'edu', 'skill', 'int');

-- --------------------------------------------------------

--
-- Table structure for table `SkillsInfo`
--

CREATE TABLE IF NOT EXISTS `SkillsInfo` (
  `SkillId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `Skill` varchar(50) DEFAULT NULL,
  `Proficiency` enum('1','2','3','4','5') DEFAULT NULL,
  PRIMARY KEY (`SkillId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `SkillsInfo`
--

INSERT INTO `SkillsInfo` (`SkillId`, `UserId`, `Skill`, `Proficiency`) VALUES
(1, 1, 'JS', '4');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `City` varchar(50) DEFAULT NULL,
  `State` varchar(2) NOT NULL,
  `Country` varchar(3) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `WebLink` varchar(100) DEFAULT NULL,
  `WebLink1` varchar(100) DEFAULT NULL,
  `Phone` varchar(11) NOT NULL,
  `Email1` varchar(100) DEFAULT NULL,
  `Objective` text,
  `Statement` text,
  `eduTypeDef` enum('text','timeline') DEFAULT NULL,
  `expTypeDef` enum('text','timeline') DEFAULT NULL,
  `intTypeDef` enum('text','pie','bar','donut') DEFAULT NULL,
  `projTypeDef` enum('text','timeline') DEFAULT NULL,
  `skillTypeDef` enum('text','pie','bar','donut') DEFAULT NULL,
  `volunTypeDef` enum('text','timeline') DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserId`, `FirstName`, `LastName`, `City`, `State`, `Country`, `Email`, `Password`, `WebLink`, `WebLink1`, `Phone`, `Email1`, `Objective`, `Statement`, `eduTypeDef`, `expTypeDef`, `intTypeDef`, `projTypeDef`, `skillTypeDef`, `volunTypeDef`) VALUES
(1, 'Kyra', 'Wayne', 'Santa Clara', 'CA', 'USA', 'kwayne@scu.edu', '00000979812', 'www.linkedin.com/in/kyrawayne', 'www.kyrawayne.com', '13609080831', 'kyrawayne.dev@gmail.com', 'To be the very best', 'To be the very best there ever was', 'text', 'text', 'text', 'text', 'text', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `VolunteerInfo`
--

CREATE TABLE IF NOT EXISTS `VolunteerInfo` (
  `VolunteerId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `Organization` varchar(100) DEFAULT NULL,
  `YearStart` year(4) DEFAULT NULL,
  `YearEnd` year(4) DEFAULT NULL,
  `JobRole` varchar(100) DEFAULT NULL,
  `JobDescript` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`VolunteerId`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `VolunteerInfo`
--

INSERT INTO `VolunteerInfo` (`VolunteerId`, `UserId`, `Organization`, `YearStart`, `YearEnd`, `JobRole`, `JobDescript`) VALUES
(1, 1, 'Kitsap County Medical Society', 2011, 2013, 'Assistant Exec. of Events', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AwardsInfo`
--
ALTER TABLE `AwardsInfo`
  ADD CONSTRAINT `AwardsInfo_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`);

--
-- Constraints for table `EducationInfo`
--
ALTER TABLE `EducationInfo`
  ADD CONSTRAINT `EducationInfo_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`);

--
-- Constraints for table `ExperienceInfo`
--
ALTER TABLE `ExperienceInfo`
  ADD CONSTRAINT `ExperienceInfo_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`);

--
-- Constraints for table `InterestsInfo`
--
ALTER TABLE `InterestsInfo`
  ADD CONSTRAINT `InterestsInfo_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`);

--
-- Constraints for table `ProjectsInfo`
--
ALTER TABLE `ProjectsInfo`
  ADD CONSTRAINT `ProjectsInfo_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`);

--
-- Constraints for table `Resumes`
--
ALTER TABLE `Resumes`
  ADD CONSTRAINT `Resumes_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`),
  ADD CONSTRAINT `Resumes_ibfk_2` FOREIGN KEY (`ResumeTypeId`) REFERENCES `ResumeTypes` (`ResumeTypeId`);

--
-- Constraints for table `SkillsInfo`
--
ALTER TABLE `SkillsInfo`
  ADD CONSTRAINT `SkillsInfo_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`);

--
-- Constraints for table `VolunteerInfo`
--
ALTER TABLE `VolunteerInfo`
  ADD CONSTRAINT `VolunteerInfo_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
