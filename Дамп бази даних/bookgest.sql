-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 05 2019 г., 11:45
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bookgest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `coments`
--

CREATE TABLE `coments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `rating` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `coments`
--

INSERT INTO `coments` (`id`, `name`, `email`, `message`, `date`, `rating`) VALUES
(1, 'Nazar', 'naz.war@mail.ru', 'blablacar', '2019.08.02', 3),
(2, 'orlando', 'orlando@orlacn.orlanco', 'asdasdasdasdsd', '2019.08.02', 5),
(3, 'РЕйтинг', '2@2.com', 'еру иуіе ифин', '2019.08.02', 2),
(4, 'тест арифмет', '2@2.com', 'середнеє арифметичне', '2019.08.02', 4),
(5, 'Lead', 'lead@LEAD.COM', 'ASDAD2DASD3DADQW', '2019.08.04', 5),
(6, 'ref', 'ref@ref.com', 'asdas', '2019.08.04', 1),
(7, 'Test1', 'v.gladyo@gmail.com', 'asd', '2019.08.04', 2),
(8, '123', '2@2.com', 'hjk', '2019.08.04', 2),
(9, 'last_test', 'olegpro@gmail.com', 'Agilway', '2019.08.04', 5),
(10, 'фів', '2@2.com', 'asd', '2019.08.04', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `coments`
--
ALTER TABLE `coments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
