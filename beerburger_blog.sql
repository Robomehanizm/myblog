-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 09 2020 г., 04:33
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `beerburger_blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--
-- Создание: Сен 09 2020 г., 00:02
-- Последнее обновление: Сен 09 2020 г., 00:26
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `op` longtext NOT NULL,
  `img` varchar(225) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `id_user`, `op`, `img`, `time`) VALUES
(5, 9, 'ПРИВЕЕЕТ СТРАНАААА', 'img/09-09-20people_101_flag_auto_front_white_700.jpg', '2020-09-09 00:08:04.366289'),
(6, 9, 'Да да, ставьте лайки. Ах да тут же нет лайков....', 'img/09-09-20maxresdefault.jpg', '2020-09-09 00:09:49.736839'),
(7, 8, 'Скоро НОВЫЙ ТРЕК', 'img/09-09-2029jeLLvjvOM0TaR9J4Yd.promo.jpg', '2020-09-09 00:22:27.125580'),
(8, 8, 'ХПХХПХПХПХП', 'img/09-09-201417015814_0102.jpg', '2020-09-09 00:25:35.494510');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Сен 08 2020 г., 22:36
-- Последнее обновление: Сен 09 2020 г., 01:00
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `podpis` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `podpis`) VALUES
(8, 'himyend', '977f5e185404259b95a598ed8fbb8f10', 'Gerich', '_9_'),
(9, 'germaximov01', '81dc9bdb52d04dc20036dbd8313ed055', 'Robomehanizm', '_10_');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
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
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
