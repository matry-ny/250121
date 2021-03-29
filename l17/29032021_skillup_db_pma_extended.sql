-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Мар 29 2021 г., 17:38
-- Версия сервера: 8.0.23
-- Версия PHP: 7.4.16

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `skillup_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `age`) VALUES
(1, 'Dmytro Kotenko', 32),
(2, 'Bart Simpson', 7),
(3, 'Homer Simpson', 40),
(4, 'Marge Simpson', 32),
(5, 'Meggie Simpson', 2),
(6, 'Snowball', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_contacts`
--

DROP TABLE IF EXISTS `user_contacts`;
CREATE TABLE IF NOT EXISTS `user_contacts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` enum('phone','email','address','fax') DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact` (`contact`),
  KEY `fk-user_contacts-user_id-users-id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_contacts`
--

INSERT INTO `user_contacts` (`id`, `type`, `contact`, `user_id`) VALUES
(13, 'phone', '+380123456766', 3),
(15, 'phone', '+380123456777', 3),
(16, 'phone', '+380123456700', 1),
(17, 'email', 'd.kotenko00@mail.com', 1),
(18, 'fax', '+380123456701', 1),
(19, 'phone', '+380123456702', 5),
(20, 'email', 'd.kotenko02@mail.com', 5),
(21, 'fax', '+380123456703', 5);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD CONSTRAINT `fk-user_contacts-user_id-users-id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
