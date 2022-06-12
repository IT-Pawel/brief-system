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
  `tytul` varchar(255) DEFAULT NULL,
  `tresc` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `userSend` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `userSendID` (`userSend`),
  KEY `status` (`status`),
  CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `statusbrief` (`id`),
  CONSTRAINT `userSendID` FOREIGN KEY (`userSend`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli grotnet.brief: ~0 rows (około)
DELETE FROM `brief`;
/*!40000 ALTER TABLE `brief` DISABLE KEYS */;
/*!40000 ALTER TABLE `brief` ENABLE KEYS */;

-- Zrzut struktury tabela grotnet.statusbrief
DROP TABLE IF EXISTS `statusbrief`;
CREATE TABLE IF NOT EXISTS `statusbrief` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli grotnet.statusbrief: ~2 rows (około)
DELETE FROM `statusbrief`;
/*!40000 ALTER TABLE `statusbrief` DISABLE KEYS */;
INSERT INTO `statusbrief` (`id`, `nazwa`) VALUES
	(1, 'wyslane'),
	(2, 'przyjete');
/*!40000 ALTER TABLE `statusbrief` ENABLE KEYS */;

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
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `typUsera` (`typUsera`),
  CONSTRAINT `userTypeCheck` FOREIGN KEY (`typUsera`) REFERENCES `usertype` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli grotnet.user: ~1 rows (około)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `haslo`, `imie`, `nazwisko`, `typUsera`) VALUES
	(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Weronika123', 'Grotek', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Zrzut struktury tabela grotnet.usertype
DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli grotnet.usertype: ~3 rows (około)
DELETE FROM `usertype`;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` (`id`, `nazwa`) VALUES
	(1, 'admin'),
	(2, 'pracownik'),
	(3, 'klient');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
