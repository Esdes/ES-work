-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 14 2019 г., 04:34
-- Версия сервера: 5.7.23
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ess_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$xCqfq3clM.dcErMmNjqYbugKBfhId7Ce2/pob.ZTwYTkH5Qn1wQFi', 'aremnegel@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Дизайн', '\\public\\images\\category\\social-media.jpg'),
(2, 'Программирование', '\\public\\images\\category\\programming.jpg'),
(3, 'Тексты', '\\public\\images\\category\\social-media.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `category_skill`
--

CREATE TABLE `category_skill` (
  `id` int(11) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL,
  `exist` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_skill`
--

INSERT INTO `category_skill` (`id`, `id_worker`, `id_category`, `id_skill`, `exist`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 1, 2, 0),
(3, 1, 1, 3, 1),
(4, 1, 1, 4, 1),
(5, 1, 1, 5, 0),
(6, 1, 1, 6, 1),
(7, 1, 1, 7, 1),
(8, 2, 1, 1, 1),
(9, 2, 1, 2, 0),
(10, 2, 1, 3, 1),
(11, 2, 1, 4, 1),
(12, 2, 1, 5, 0),
(13, 2, 1, 6, 0),
(14, 2, 1, 7, 1),
(15, 3, 1, 1, 0),
(16, 3, 1, 2, 1),
(17, 3, 1, 3, 0),
(18, 3, 1, 4, 0),
(19, 3, 1, 5, 1),
(20, 3, 1, 6, 0),
(21, 3, 1, 7, 0),
(22, 4, 1, 1, 0),
(23, 4, 1, 2, 0),
(24, 4, 1, 3, 0),
(25, 4, 1, 4, 0),
(26, 4, 1, 5, 0),
(27, 4, 1, 6, 0),
(28, 4, 1, 7, 0),
(29, 5, 1, 1, 0),
(30, 5, 1, 2, 0),
(31, 5, 1, 3, 0),
(32, 5, 1, 4, 0),
(33, 5, 1, 5, 0),
(34, 5, 1, 6, 0),
(35, 5, 1, 7, 0),
(36, 6, 1, 1, 0),
(37, 6, 1, 2, 0),
(38, 6, 1, 3, 0),
(39, 6, 1, 4, 0),
(40, 6, 1, 5, 0),
(41, 6, 1, 6, 0),
(42, 6, 1, 7, 0),
(43, 7, 1, 1, 0),
(44, 7, 1, 2, 0),
(45, 7, 1, 3, 0),
(46, 7, 1, 4, 0),
(47, 7, 1, 5, 0),
(48, 7, 1, 6, 0),
(49, 7, 1, 7, 0),
(50, 8, 1, 1, 0),
(51, 8, 1, 2, 0),
(52, 8, 1, 3, 0),
(53, 8, 1, 4, 0),
(54, 8, 1, 5, 0),
(55, 8, 1, 6, 0),
(56, 8, 1, 7, 0),
(57, 9, 1, 1, 0),
(58, 9, 1, 2, 0),
(59, 9, 1, 3, 0),
(60, 9, 1, 4, 0),
(61, 9, 1, 5, 0),
(62, 9, 1, 6, 0),
(63, 9, 1, 7, 0),
(64, 10, 1, 1, 0),
(65, 10, 1, 2, 0),
(66, 10, 1, 3, 0),
(67, 10, 1, 4, 0),
(68, 10, 1, 5, 0),
(69, 10, 1, 6, 0),
(70, 10, 1, 7, 0),
(71, 11, 1, 1, 0),
(72, 11, 1, 2, 0),
(73, 11, 1, 3, 0),
(74, 11, 1, 4, 0),
(75, 11, 1, 5, 0),
(76, 11, 1, 6, 0),
(77, 11, 1, 7, 0),
(78, 12, 1, 1, 0),
(79, 12, 1, 2, 0),
(80, 12, 1, 3, 0),
(81, 12, 1, 4, 0),
(82, 12, 1, 5, 0),
(83, 12, 1, 6, 0),
(84, 12, 1, 7, 0),
(85, 13, 1, 1, 0),
(86, 13, 1, 2, 0),
(87, 13, 1, 3, 0),
(88, 13, 1, 4, 0),
(89, 13, 1, 5, 0),
(90, 13, 1, 6, 0),
(91, 13, 1, 7, 0),
(92, 14, 1, 1, 0),
(93, 14, 1, 2, 0),
(94, 14, 1, 3, 0),
(95, 14, 1, 4, 0),
(96, 14, 1, 5, 0),
(97, 14, 1, 6, 0),
(98, 14, 1, 7, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `coment`
--

CREATE TABLE `coment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_comentator` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `data`) VALUES
(1, 'Новость 1', '	Статья́ — это жанр журналистики, в котором автор ставит задачу проанализировать общественные ситуации, процессы, явления, прежде всего с точки зрения закономерностей, лежащих в их основе.\r\n\r\n	Такому жанру как статья присуща ширина практических обобщений, глубокий анализ фактов и явлений, четкая социальная направленность[источник не указан 3458 дней]. В статье автор рассматривает отдельные ситуации как часть более широкого явления. Автор аргументирует и выстраивает свою позицию через систему фактов.\r\n\r\nВ статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы. Также в статье журналист обязательно должен интерпретировать факты (это могут быть цифры, дополнительная информация, которая будет правильно расставлять акценты и ярко раскрывать суть вопроса).\r\n\r\n	Отличительным аспектом статьи является её готовность. Если подготавливаемый материал так и не был опубликован (не вышел в тираж, не получил распространения), то такой труд относить к статье некорректно. Скорее всего данную работу можно назвать черновиком или заготовкой. Поэтому целью любой статьи является распространение содержащейся в ней информации.', '2019-04-09 13:42:04'),
(2, 'Новость 2', '	Статья́ — это жанр журналистики, в котором автор ставит задачу проанализировать общественные ситуации, процессы, явления, прежде всего с точки зрения закономерностей, лежащих в их основе.\r\n\r\n	Такому жанру как статья присуща ширина практических обобщений, глубокий анализ фактов и явлений, четкая социальная направленность[источник не указан 3458 дней]. В статье автор рассматривает отдельные ситуации как часть более широкого явления. Автор аргументирует и выстраивает свою позицию через систему фактов.\r\n\r\nВ статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы. Также в статье журналист обязательно должен интерпретировать факты (это могут быть цифры, дополнительная информация, которая будет правильно расставлять акценты и ярко раскрывать суть вопроса).\r\n\r\n	Отличительным аспектом статьи является её готовность. Если подготавливаемый материал так и не был опубликован (не вышел в тираж, не получил распространения), то такой труд относить к статье некорректно. Скорее всего данную работу можно назвать черновиком или заготовкой. Поэтому целью любой статьи является распространение содержащейся в ней информации.', '2019-04-09 14:15:37'),
(3, 'Новость 3', '	Статья́ — это жанр журналистики, в котором автор ставит задачу проанализировать общественные ситуации, процессы, явления, прежде всего с точки зрения закономерностей, лежащих в их основе.\r\n\r\n	Такому жанру как статья присуща ширина практических обобщений, глубокий анализ фактов и явлений, четкая социальная направленность[источник не указан 3458 дней]. В статье автор рассматривает отдельные ситуации как часть более широкого явления. Автор аргументирует и выстраивает свою позицию через систему фактов.\r\n\r\nВ статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы. Также в статье журналист обязательно должен интерпретировать факты (это могут быть цифры, дополнительная информация, которая будет правильно расставлять акценты и ярко раскрывать суть вопроса).\r\n\r\n	Отличительным аспектом статьи является её готовность. Если подготавливаемый материал так и не был опубликован (не вышел в тираж, не получил распространения), то такой труд относить к статье некорректно. Скорее всего данную работу можно назвать черновиком или заготовкой. Поэтому целью любой статьи является распространение содержащейся в ней информации.', '2019-04-09 14:33:43'),
(4, 'Новость 4', ' Статья́ — это жанр журналистики, в котором автор ставит задачу проанализировать общественные ситуации, процессы, явления, прежде всего с точки зрения закономерностей, лежащих в их основе.\r\n\r\nТакому жанру как статья присуща ширина практических обобщений, глубокий анализ фактов и явлений, четкая социальная направленность[источник не указан 3458 дней]. В статье автор рассматривает отдельные ситуации как часть более широкого явления. Автор аргументирует и выстраивает свою позицию через систему фактов.\r\n\r\nВ статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы. Также в статье журналист обязательно должен интерпретировать факты (это могут быть цифры, дополнительная информация, которая будет правильно расставлять акценты и ярко раскрывать суть вопроса).\r\n\r\nОтличительным аспектом статьи является её готовность. Если подготавливаемый материал так и не был опубликован (не вышел в тираж, не получил распространения), то такой труд относить к статье некорректно. Скорее всего данную работу можно назвать черновиком или заготовкой. Поэтому целью любой статьи является распространение содержащейся в ней информации.', '2019-04-09 14:35:19'),
(5, 'Новость 5', '	Статья́ — это жанр журналистики, в котором автор ставит задачу проанализировать общественные ситуации, процессы, явления, прежде всего с точки зрения закономерностей, лежащих в их основе.\r\n\r\n	Такому жанру как статья присуща ширина практических обобщений, глубокий анализ фактов и явлений, четкая социальная направленность[источник не указан 3458 дней]. В статье автор рассматривает отдельные ситуации как часть более широкого явления. Автор аргументирует и выстраивает свою позицию через систему фактов.\r\n\r\nВ статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы. Также в статье журналист обязательно должен интерпретировать факты (это могут быть цифры, дополнительная информация, которая будет правильно расставлять акценты и ярко раскрывать суть вопроса).\r\n\r\n	Отличительным аспектом статьи является её готовность. Если подготавливаемый материал так и не был опубликован (не вышел в тираж, не получил распространения), то такой труд относить к статье некорректно. Скорее всего данную работу можно назвать черновиком или заготовкой. Поэтому целью любой статьи является распространение содержащейся в ней информации.', '2019-04-09 14:38:47'),
(6, 'Новость 6', '	Статья́ — это жанр журналистики, в котором автор ставит задачу проанализировать общественные ситуации, процессы, явления, прежде всего с точки зрения закономерностей, лежащих в их основе.\r\n\r\n	Такому жанру как статья присуща ширина практических обобщений, глубокий анализ фактов и явлений, четкая социальная направленность[источник не указан 3458 дней]. В статье автор рассматривает отдельные ситуации как часть более широкого явления. Автор аргументирует и выстраивает свою позицию через систему фактов.\r\n\r\nВ статье выражается развернутая обстоятельная аргументированная концепция автора или редакции по поводу актуальной социологической проблемы. Также в статье журналист обязательно должен интерпретировать факты (это могут быть цифры, дополнительная информация, которая будет правильно расставлять акценты и ярко раскрывать суть вопроса).\r\n\r\n	Отличительным аспектом статьи является её готовность. Если подготавливаемый материал так и не был опубликован (не вышел в тираж, не получил распространения), то такой труд относить к статье некорректно. Скорее всего данную работу можно назвать черновиком или заготовкой. Поэтому целью любой статьи является распространение содержащейся в ней информации.', '2019-04-13 01:51:57');

-- --------------------------------------------------------

--
-- Структура таблицы `service_order`
--

CREATE TABLE `service_order` (
  `id` int(11) NOT NULL,
  `id_worker` int(11) DEFAULT NULL,
  `id_employer` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `confirmed` int(11) DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rate_exist` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `service_order`
--

INSERT INTO `service_order` (`id`, `id_worker`, `id_employer`, `id_category`, `title`, `content`, `confirmed`, `date`, `rate_exist`) VALUES
(1, 2, 4, 1, 'Заказ 1', 'заказ', 0, '2019-04-11 18:11:41', 0),
(2, 1, 6, 1, 'Заказ 2', 'заказ', 1, '2019-04-11 18:54:31', 1),
(3, 1, 4, 1, 'Заказ 3', 'заказ', 1, '2019-04-12 20:01:29', 1),
(4, NULL, 14, 2, 'Заказ 4', 'заказ', 0, '2019-04-12 20:01:40', 1),
(5, 3, 6, 1, 'Заказ 5', 'заказ', 1, '2019-04-12 20:01:52', 1),
(6, NULL, 14, 2, 'Заказ 6', 'заказ', 0, '2019-04-13 00:59:15', 1),
(7, 3, 6, 1, 'Заказ 7', 'заказ', 1, '2019-04-13 11:20:11', 1),
(8, 1, 4, 1, 'Заказ 8;', 'заказ', 1, '2019-04-13 11:21:24', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `skill`
--

INSERT INTO `skill` (`id`, `id_category`, `name`) VALUES
(1, 1, 'Веб-дизайн'),
(2, 1, 'Дизайн интерьера'),
(3, 1, 'Геймдизайн'),
(4, 1, 'Дизайн одежды'),
(5, 1, 'Логотипы'),
(6, 1, 'Книжный дизайн'),
(7, 1, 'Ландшафтный дизайн'),
(8, 2, 'Веб программирование'),
(9, 2, 'Мобильные приложения'),
(10, 2, 'Десктопные приложения'),
(11, 2, 'Системное программирование'),
(12, 2, 'Написание плагинов'),
(13, 2, 'Разработка игр');
(14, 3, 'Рерайтинг');
(15, 3, 'Статьи');
(16, 3, 'Переводы');
(17, 3, 'Сценарии');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'employer'),
(2, 'worker');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `info` text,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `online` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `free` tinyint(4) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `id_category`, `name`, `login`, `password`, `type`, `age`, `date_registration`, `info`, `mobile`, `email`, `online`, `free`, `rating`) VALUES
(1, 1, NULL, 'Worker1', '$2y$10$JBK317V7q3KwjnLYUZ4nDuo/U81GQGzh6vPvEiu8V9ToaTkMJHVWW', 2, NULL, '2019-04-11 00:48:30', NULL, NULL, 'test@te.te', '2019-04-13 22:00:35', 0, 36),
(2, 1, NULL, 'Worker2', '$2y$10$u52NdyGkPq10u94XWqCZsOHGabUUiKgL2OrWTvE8TvV0/LHcIT1BG', 2, NULL, '2019-04-11 02:40:54', '', '1234567899', 'test1@te.te', '2019-04-13 06:13:36', 0, 58),
(3, 1, NULL, 'Worker3', '$2y$10$LMWYhzDT.7b3g5dApJEOLO0ax6NFenX.TI8XV3bnZU/FR.70xF8FS', 2, NULL, '2019-04-11 02:41:17', NULL, NULL, 'test3@te.te', '2019-04-13 21:54:50', 0, -34),
(4, 1, NULL, 'Employer1', '$2y$10$FR1jWv8jLOKnVd2mX1vQUelLNxDBhRtH535cG1wutUbqyl/rh2QIW', 1, NULL, '2019-04-11 03:58:05', NULL, NULL, 'wdwe@e.ed', '2019-04-13 21:54:33', 0, 0),
(5, 1, NULL, 'Worker4', '$2y$10$eHchhk/sQXnVq.1Yjz8Q2Os/esNywBnWyp.RtLn5YGx26STlyfcUK', 2, NULL, '2019-04-14 04:18:38', NULL, NULL, 'worker4@wo.wo', '2019-04-14 01:18:38', 0, 0),
(6, 1, NULL, 'Employer2', '$2y$10$SL5L4LDoojZ2GzgPVv/GW.DJYBGI47dGalb0oG8MnEO5CZL5Vx6.y', 1, NULL, '2019-04-14 04:19:14', NULL, NULL, 'employer2@em.em', '2019-04-14 01:19:14', 0, 0),
(7, 1, NULL, 'Employer3', '$2y$10$DjZiDwN0gGfQzXOhemOnQ.y4lX4.tFsAU4qO6D9hL00zV.lxDoBlO', 1, NULL, '2019-04-14 04:19:53', NULL, NULL, 'employer3@em.em', '2019-04-14 01:19:53', 0, 0),
(8, 1, NULL, 'Worker5', '$2y$10$FctXrFyttz7TlSF4cj89KObJaQIZ7baPtfpESrYUBGvpsESC2g.BW', 2, NULL, '2019-04-14 04:27:28', NULL, NULL, 'worker5@wo.wo', '2019-04-14 01:27:28', 0, 0),
(9, 1, NULL, 'Worker6', '$2y$10$/UEX4AwBZHXP0YEmNyB03egNXASKVz5FYkp8k6CHh.gfT/Oq9/Ozm', 2, NULL, '2019-04-14 04:27:54', NULL, NULL, 'worker6@wo.wo', '2019-04-14 01:27:54', 0, 0),
(10, 1, NULL, 'Worker7', '$2y$10$LFhf4IFc8RbPxcdo3YCo8uE8PuOYOUetfuYFcyl7i7o0l4BCxQASS', 2, NULL, '2019-04-14 04:28:22', NULL, NULL, 'worker7@wo.wo', '2019-04-14 01:28:22', 0, 0),
(11, 1, NULL, 'Worker8', '$2y$10$xMejMrmvky2A87FlGVA9Ou3vKzuqYcQVwRTyu0dfQI3G1owQMc4f6', 2, NULL, '2019-04-14 04:28:46', NULL, NULL, 'worker8@wo.wo', '2019-04-14 01:28:46', 0, 0),
(12, 1, NULL, 'Worker9', '$2y$10$rDTO1PY9Nu4suV2H26Mmfe.l8Dyu9Kt53rfn2WPkrKizCRHkFMSua', 2, NULL, '2019-04-14 04:29:15', NULL, NULL, 'worker9@wo.wo', '2019-04-14 01:29:15', 0, 0),
(13, 1, NULL, 'Worker10', '$2y$10$.h6BP2/Vlf3971Z3/95B1eFcsNOcpyqHBxFBwTcN9/hVUkakBXyqu', 2, NULL, '2019-04-14 04:29:36', NULL, NULL, 'worker10@wo.wo', '2019-04-14 01:29:36', 0, 0),
(14, 1, NULL, 'Employer4', '$2y$10$VXji9yE536OVvfUDjRmhreK.LR4addbp4zcQ4o7jsC7snJKYqgKSS', 1, NULL, '2019-04-14 04:30:34', NULL, NULL, 'employer4@em.em', '2019-04-14 01:30:34', 0, 0),
(15, 1, NULL, 'Employer5', '$2y$10$p3IRKqziU3BhfikuT5tSGuRvQfZ1UGgn/AbgJym2QXVHW3Fvvm.um', 1, NULL, '2019-04-14 04:31:30', NULL, NULL, 'employer5@em.em', '2019-04-14 01:31:30', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `category_skill`
--
ALTER TABLE `category_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_worker` (`id_worker`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_skill` (`id_skill`);

--
-- Индексы таблицы `coment`
--
ALTER TABLE `coment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_worker` (`id_user`),
  ADD KEY `id_comentator` (`id_comentator`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Индексы таблицы `service_order`
--
ALTER TABLE `service_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_worker` (`id_worker`),
  ADD KEY `id_employer` (`id_employer`),
  ADD KEY `service_order_ibfk_5` (`id_category`);

--
-- Индексы таблицы `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `category_skill`
--
ALTER TABLE `category_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT для таблицы `coment`
--
ALTER TABLE `coment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT для таблицы `service_order`
--
ALTER TABLE `service_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_skill`
--
ALTER TABLE `category_skill`
  ADD CONSTRAINT `category_skill_ibfk_1` FOREIGN KEY (`id_worker`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_skill_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_skill_ibfk_3` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `coment`
--
ALTER TABLE `coment`
  ADD CONSTRAINT `coment_ibfk_1` FOREIGN KEY (`id_comentator`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `service_order`
--
ALTER TABLE `service_order`
  ADD CONSTRAINT `service_order_ibfk_3` FOREIGN KEY (`id_worker`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_order_ibfk_4` FOREIGN KEY (`id_employer`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `service_order_ibfk_5` FOREIGN KEY (`id_category`) REFERENCES `user` (`id_category`);

--
-- Ограничения внешнего ключа таблицы `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
