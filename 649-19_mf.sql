-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 25 2023 г., 13:27
-- Версия сервера: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Версия PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `649-19_mf`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `cat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_cat`, `cat`) VALUES
(2, 'Цветы'),
(3, 'Упаковка'),
(4, 'Дополнительно');

-- --------------------------------------------------------

--
-- Структура таблицы `chart`
--

CREATE TABLE `chart` (
  `id_chart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `count` int(11) NOT NULL COMMENT 'колво товара'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `chart`
--

INSERT INTO `chart` (`id_chart`, `id_user`, `id_prod`, `count`) VALUES
(8, 8, 12, 10),
(9, 8, 10, 1),
(10, 8, 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_chart` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Новый','Подтвержден','Удален') NOT NULL DEFAULT 'Новый',
  `reason` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id_order`, `id_chart`, `id_user`, `id_prod`, `count`, `time`, `status`, `reason`) VALUES
(5, NULL, 3, 10, 1, '2023-01-24 08:49:03', 'Новый', NULL),
(6, NULL, 3, 11, 1, '2023-01-24 08:49:03', 'Новый', NULL),
(7, NULL, 3, 10, 1, '2023-01-24 08:51:30', 'Новый', NULL),
(8, NULL, 3, 11, 1, '2023-01-24 08:51:30', 'Новый', NULL),
(9, NULL, 3, 12, 1, '2023-01-24 08:51:30', 'Новый', NULL),
(10, NULL, 3, 12, 1, '2023-01-24 08:52:00', 'Новый', NULL),
(11, NULL, 3, 12, 1, '2023-01-24 08:54:16', 'Новый', NULL),
(12, NULL, 3, 12, 2, '2023-01-24 08:54:28', 'Новый', NULL),
(13, NULL, 3, 12, 1, '2023-01-24 09:04:58', 'Новый', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `prod`
--

CREATE TABLE `prod` (
  `id_prod` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `prod`
--

INSERT INTO `prod` (`id_prod`, `photo`, `name`, `count`, `price`, `country`, `id_cat`, `color`, `time`) VALUES
(8, '/productImage/8nsP8lo8np014pyMNbSwQsH2SVdxy68HT7tBXIsIsXD7Of-peT.png', 'Кукуумбер', 83, 1241, 'Россия', 2, 'Синий', '2023-01-16 09:46:45'),
(9, '/productImage/ak2EJ9ffT2dSN_pWM0socGL4BxYU9WlZSS8zrjz18TDZbvnjQM.jpg', 'zdfghjk', 122, 123, 'Россия', 2, 'Синий', '2023-01-16 09:46:45'),
(10, '/productImage/jDeunU65zDVdtqrOA8iWBUtcme94UnGtlM4kpG8Q7VuP3UqSBI.jpg', 'Куку', 118, 6453, 'Россия', 2, 'фиолетовый', '2023-01-16 11:46:45'),
(11, '/productImage/Vcgq8ld3RLZ1VdhjFIQcS4qXSV5dvRVr9J5_O86V4k-A4yO21i.jpg', 'пленкаа полоска', 94, 50, 'Китай', 3, 'Прозрачный', '2023-01-17 06:51:45'),
(12, '/productImage/RwkSzGGqBFa86wbqM2bhQZw0Fh7w_bsUi_KKdAcmWP-5vDQ4-O.jpg', 'Мягкая игрушка мишка', 86, 500, 'Китай', 4, 'Бежевый', '2023-01-17 06:52:00');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_admin` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin', NULL, 'admin', 'admin@gmail.con', 'admin44', 1),
(2, 'Петр', 'Петров', NULL, 'petya', 'petya@gmail.com', 'petya11', 0),
(3, 'Анна', 'Шутова', 'Сановна', 'anya', 'okeankitow@gmail.com', 'hahaha112', 0),
(8, 'Алинчоус', 'Всем прив', 'как дела', 'helloword', 'kaka@popa.com', '123123', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Индексы таблицы `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id_chart`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_prod`),
  ADD KEY `id_user_2` (`id_user`,`id_prod`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `id_chart` (`id_chart`,`id_user`,`id_prod`,`count`),
  ADD KEY `id_chart_2` (`id_chart`,`id_user`,`id_prod`,`count`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_chart_3` (`id_chart`);

--
-- Индексы таблицы `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`,`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `chart`
--
ALTER TABLE `chart`
  MODIFY `id_chart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `prod`
--
ALTER TABLE `prod`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chart`
--
ALTER TABLE `chart`
  ADD CONSTRAINT `chart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chart_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `prod` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `prod` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `prod`
--
ALTER TABLE `prod`
  ADD CONSTRAINT `prod_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `category` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
