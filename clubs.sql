-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table clubs.clubs: ~5 rows (approximately)
DELETE FROM `clubs`;
/*!40000 ALTER TABLE `clubs` DISABLE KEYS */;
INSERT INTO `clubs` (`id`, `club_name`, `adress`, `trainers_id`, `club_description`) VALUES
	(1, 'Karate Club Phoenix', 'Random Street 233/2', 1, 'This is a description of this certain club and it should give some more info about the club'),
	(2, 'Gym TRAIN', 'Random Street 332/2', 1, 'This is a description of this certain club and it should give some more info about the club'),
	(3, 'Football School', 'Our adress 2', 2, 'This is a description of this certain training and it should give some more info about the training'),
	(5, 'Basket Masters', 'IDK street 2', 1, 'This is a description of this certain club and it should give some more info about the club');
/*!40000 ALTER TABLE `clubs` ENABLE KEYS */;

-- Dumping data for table clubs.trainers: ~3 rows (approximately)
DELETE FROM `trainers`;
/*!40000 ALTER TABLE `trainers` DISABLE KEYS */;
INSERT INTO `trainers` (`id`, `trainer_name`, `email`, `password`, `trainer_lastname`) VALUES
	(1, 'Veljko', 'veljko@gmail.com', '$1$rasmusle$eNuE8Cc6AbNuoG.b6y76C1\n', 'Ilic'),
	(2, 'Pera', 'pera@gmail.com', '$1$rasmusle$eNuE8Cc6AbNuoG.b6y76C1\n', 'Peric');
/*!40000 ALTER TABLE `trainers` ENABLE KEYS */;

-- Dumping data for table clubs.trainings: ~7 rows (approximately)
DELETE FROM `trainings`;
/*!40000 ALTER TABLE `trainings` DISABLE KEYS */;
INSERT INTO `trainings` (`id`, `training_title`, `training_description`, `sport`, `clubs_id`) VALUES
	(3, 'Football Seniors', 'This is a description of this certain training and it should give some more info about the training', 'Football', 3),
	(5, 'Basketball Juniors', 'This is a description of this certain training and it should give some more info about the training', 'Basketball', 5),
	(10, 'Intense training', 'Here we describe the training and what goes on.', 'Karate', 1),
	(11, 'Weight Lifting Classes', 'This is a description of this certain training and it should give some more info about the training', 'Bodybuilding', 2),
	(12, 'Football Juniors', 'This is a description of this certain training and it should give some more info about the training', 'Football', 3),
	(25, 'Not intense training', 'This is a description of this certain training and it should give some more info about the training', 'Karate', 1);
/*!40000 ALTER TABLE `trainings` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
