-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               5.7.33 - MySQL Community Server (GPL)
-- Serwer OS:                    Win64
-- HeidiSQL Wersja:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Zrzut struktury bazy danych grotnet
DROP DATABASE IF EXISTS `grotnet`;
CREATE DATABASE IF NOT EXISTS `grotnet` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;
USE `grotnet`;

-- Zrzut struktury tabela grotnet.brief
DROP TABLE IF EXISTS `brief`;
CREATE TABLE IF NOT EXISTS `brief` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `userAssigned` int(255) DEFAULT NULL,
  `tytul` varchar(255) DEFAULT NULL,
  `tresc` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `userSend` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `userAssigned` (`userAssigned`),
  KEY `userSend` (`userSend`),
  CONSTRAINT `FK_brief_user` FOREIGN KEY (`userSend`) REFERENCES `user` (`id`),
  CONSTRAINT `brief_ibfk_1` FOREIGN KEY (`status`) REFERENCES `statusbrief` (`id`),
  CONSTRAINT `brief_ibfk_2` FOREIGN KEY (`userAssigned`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Eksport danych został odznaczony.

-- Zrzut struktury tabela grotnet.statusbrief
DROP TABLE IF EXISTS `statusbrief`;
CREATE TABLE IF NOT EXISTS `statusbrief` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Eksport danych został odznaczony.

-- Zrzut struktury tabela grotnet.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `typUsera` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `typUsera` (`typUsera`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`typUsera`) REFERENCES `usertype` (`id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`typUsera`) REFERENCES `usertype` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Eksport danych został odznaczony.

-- Zrzut struktury tabela grotnet.usertype
DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Eksport danych został odznaczony.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
