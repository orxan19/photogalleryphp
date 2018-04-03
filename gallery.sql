-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 03 2018 г., 21:59
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`) VALUES
(9, 39, 'Orxann', 'Awesome'),
(10, 42, 'I am', 'Eminem is coool'),
(11, 42, 'secon', 'dsad'),
(14, 45, 'adsda', 'sadsds'),
(15, 45, 'adsdas', 'dsadasd');

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternate_text` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`) VALUES
(44, 'Fantastic penguins', '', '', '_large_image_2.jpg', '', 'image/jpeg', 309568),
(45, 'transform-origin', '', '', '_large_image_1.jpg', '', 'image/jpeg', 479843),
(46, 'super', '', '', '_large_image_3.jpg', '', 'image/jpeg', 165053),
(47, 'PNG', '', '', '_large_image_22.jpg', '', 'image/jpeg', 309568),
(48, 'testijng', '', '', 'images-7 copy.jpg', '', 'image/jpeg', 24140),
(49, '1', '', '', 'images-6.jpg', '', 'image/jpeg', 21886),
(50, '2', '', '', 'images-13.jpg', '', 'image/jpeg', 22082),
(51, '3', '', '', 'images-20 copy.jpg', '', 'image/jpeg', 22942),
(52, '4', '', '', 'images-37.jpg', '', 'image/jpeg', 20381),
(53, '5', '', '', 'images-36.jpg', '', 'image/jpeg', 21672),
(54, '6', '', '', 'images-29.jpg', '', 'image/jpeg', 25493),
(55, '7', '', '', 'images-23 copy.jpg', '', 'image/jpeg', 22792),
(57, 'Fantastic penguins', '', '', 'images-8 copy.jpg', '', 'image/jpeg', 20810),
(58, 'r', '', '', 'images-37 copy.jpg', '', 'image/jpeg', 20381),
(59, 'Fantastic penguins', '', '', 'images-42 copy.jpg', '', 'image/jpeg', 22401);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(59, '11111', '444', '2222', '333', 'images-4.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
