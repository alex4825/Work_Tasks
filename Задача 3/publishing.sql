-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 21 2022 г., 13:07
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `publishing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `Имя` varchar(50) NOT NULL,
  `Фамилия` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `Имя`, `Фамилия`) VALUES
(1, 'Тони', 'Старк'),
(2, 'Александр', 'Пушкин'),
(3, 'Билл', 'Гейтс'),
(4, 'Маркус', 'Зусак');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `ISBN` int NOT NULL,
  `Название` varchar(100) NOT NULL,
  `Автор` varchar(50) NOT NULL,
  `Автор2` varchar(50) NOT NULL,
  `Жанр` varchar(50) NOT NULL,
  `Жанр2` varchar(50) NOT NULL,
  `Колич_стр` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`ISBN`, `Название`, `Автор`, `Автор2`, `Жанр`, `Жанр2`, `Колич_стр`) VALUES
(24563, 'Капитанская дочка', 'Александр Пушкин', 'null', 'Роман', 'null', 168),
(65689, 'Построение роботов', 'Тони Старк', 'null', 'Фантастика', 'Техно', 1500),
(68784, 'Как стать учёным?', 'Тони Старк', 'Билл Гейтс', 'Фантастика', 'Драма', 9999),
(78974, 'Книжный вор', 'Маркус Зусак', 'null', 'Драма', 'null', 550);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
